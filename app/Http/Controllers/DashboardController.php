<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaranonline;
use App\Models\PengaturanUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Jenssegers\Agent\Agent;

class DashboardController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $user = Auth::user();
        $pengaturan = PengaturanUmum::first();
        
        // Fetch registration details
        $pendaftaran = Pendaftaranonline::where('pendaftaran_online.no_register', $user->username)
            ->join('unit', 'unit.kode_unit', 'pendaftaran_online.kode_unit')
            ->join('konfigurasi_tahunajaran_ppdb', 'konfigurasi_tahunajaran_ppdb.kode_ta', 'pendaftaran_online.kode_ta')
            ->select('pendaftaran_online.*', 'unit.nama_unit', 'konfigurasi_tahunajaran_ppdb.tahun_ajaran')
            ->first();

        // Calculate Steps
        $steps = [
            'registrasi' => [
                'status' => 'completed',
                'title' => 'Registrasi Akun',
                'desc' => 'Pendaftaran akun berhasil dilakukan.',
                'date' => $pendaftaran->created_at
            ],
            'biodata' => [
                'status' => 'pending',
                'title' => 'Lengkapi Biodata',
                'desc' => 'Lengkapi data pribadi dan orang tua.',
            ],
            'pembayaran' => [
                'status' => 'locked',
                'title' => 'Pembayaran',
                'desc' => 'Konfirmasi biaya pendaftaran.',
            ],
            'cetak' => [
                'status' => 'locked',
                'title' => 'Cetak Formulir',
                'desc' => 'Cetak bukti pendaftaran Anda.',
            ]
        ];

        // Check Biodata Status (check if some key fields are filled)
        if (!empty($pendaftaran->tempat_lahir) && !empty($pendaftaran->nik_ayah) && !empty($pendaftaran->id_village)) {
            $steps['biodata']['status'] = 'completed';
        }

        // Check Payment Status
        $payment = \Illuminate\Support\Facades\DB::table('pendaftaran_online_bayar')
            ->where('no_register', $user->username)
            ->first();

        if ($payment) {
            if ($payment->status === 'approved') {
                $steps['pembayaran']['status'] = 'completed';
            } else {
                $steps['pembayaran']['status'] = 'process';
                $steps['pembayaran']['desc'] = 'Menunggu verifikasi admin.';
            }
        } elseif ($steps['biodata']['status'] === 'completed') {
            $steps['pembayaran']['status'] = 'pending';
        }

        // Check Cetak Status
        if ($steps['pembayaran']['status'] === 'completed') {
            $steps['cetak']['status'] = 'pending';
        }

        // Calculate Percentage
        $totalSteps = count($steps);
        $completedSteps = collect($steps)->where('status', 'completed')->count();
        $progress = round(($completedSteps / $totalSteps) * 100);

        if ($agent->isMobile()) {
            return view('mobile.dashboard.index', compact('user', 'pengaturan', 'pendaftaran', 'steps', 'progress'));
        }

        return view('pages.dashboard.index', compact('user', 'pengaturan', 'pendaftaran', 'steps', 'progress'));
    }
}
