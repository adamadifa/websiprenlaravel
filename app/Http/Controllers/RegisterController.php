<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaranonline;
use App\Models\Tahunajaranppdb;
use App\Models\User;
use App\Models\Userpendaftar;
use App\Models\Unit;
use App\Models\PengaturanUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Jenssegers\Agent\Agent;

class RegisterController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $pengaturan = PengaturanUmum::first();
        $units = Unit::where('status', 1)->get();

        if ($agent->isMobile()) {
            return view('mobile.auth.register', compact('pengaturan', 'units'));
        }

        return view('pages.auth.register', compact('pengaturan', 'units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'jenis_kelamin' => ['required', 'string', 'in:L,P'],
            'no_hp' => ['required', 'string', 'max:15'],
            'kode_unit' => ['required', 'string'],
        ]);

        $ta_aktif = Tahunajaranppdb::where('status', 1)->first();
        if (!$ta_aktif) {
            return back()->with('error', 'Tahun ajaran PPDB belum dikonfigurasi.');
        }

        $ta_pendaftaran = substr($ta_aktif->tahun_ajaran, 2, 2);
        $lastpendaftaran = Pendaftaranonline::select('no_register')
            ->where('kode_ta', $ta_aktif->kode_ta)
            ->where('kode_unit', $request->kode_unit)
            ->orderBy('no_register', 'desc')
            ->first();
        
        $last_no_register = $lastpendaftaran != null ? $lastpendaftaran->no_register : '';
        $format = "OL" . $request->kode_unit . $ta_pendaftaran;
        
        // Buat kode manual logic
        $nomor_baru = intval(substr($last_no_register, strlen($format))) + 1;
        $nomor_baru_plus_nol = str_pad($nomor_baru, 3, "0", STR_PAD_LEFT);
        $no_register = $format . $nomor_baru_plus_nol;

        DB::beginTransaction();
        try {
            $pendaftar = Pendaftaranonline::create([
                'no_register' => $no_register,
                'tanggal_register' => now(),
                'nama_lengkap' => $request->name,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_hp' => $request->no_hp,
                'kode_unit' => $request->kode_unit,
                'kode_ta' => $ta_aktif->kode_ta,
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $no_register,
                'password' => Hash::make($request->password),
                'kode_unit' => $request->kode_unit,
            ]);

            // Note: assignRole depends on spatie/laravel-permission. 
            // In the backend it's used. If this project doesn't have it, we might need a workaround or check if it's installed.
            if (method_exists($user, 'assignRole')) {
                $user->assignRole('pendaftar');
            }

            Userpendaftar::create([
                'no_register' => $no_register,
                'id_user' => $user->id,
            ]);

            DB::commit();

            // Auto login or redirect to login
            return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login dengan No. Register: ' . $no_register);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Registrasi gagal: ' . $e->getMessage());
        }
    }
}
