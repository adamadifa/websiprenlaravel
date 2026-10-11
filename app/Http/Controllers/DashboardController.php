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
        

        // Cek apakah user adalah peserta Got Talent (AGT)
        $pendaftaranAgt = \App\Models\PendaftaranGotTalent::with(['jenjangPendidikan', 'perlombaan'])
            ->where('nomor_register', $user->username)
            ->orWhere('email', $user->email)
            ->first();

        if ($pendaftaranAgt) {
            return view('agt.dashboard', compact('user', 'pengaturan', 'pendaftaranAgt'));
        }

        // Fetch registration details PPDB
        $pendaftaran = Pendaftaranonline::where('pendaftaran_online.no_register', $user->username)
            ->join('unit', 'unit.kode_unit', 'pendaftaran_online.kode_unit')
            ->join('konfigurasi_tahunajaran_ppdb', 'konfigurasi_tahunajaran_ppdb.kode_ta', 'pendaftaran_online.kode_ta')
            ->select('pendaftaran_online.*', 'unit.nama_unit', 'konfigurasi_tahunajaran_ppdb.tahun_ajaran')
            ->first();

        if (!$pendaftaran) {
            $pendaftaranObj = (object)[
                'nama_lengkap' => $pendaftaranAgt ? $pendaftaranAgt->nama_lengkap : $user->name,
                'no_register' => $pendaftaranAgt ? $pendaftaranAgt->nomor_register : $user->username,
                'tahun_ajaran' => date('Y') . '/' . (date('Y') + 1),
                'nama_unit' => $pendaftaranAgt ? 'Al Amin Got Talent (' . ($pendaftaranAgt->jenjangPendidikan->jenjang_pendidikan ?? 'AGT') . ')' : 'Peserta Got Talent',
                'foto' => null,
                'nisn' => null,
                'jenis_kelamin' => $pendaftaranAgt ? ($pendaftaranAgt->jenis_kelamin ?? 'L') : 'L',
                'asal_sekolah' => $pendaftaranAgt ? $pendaftaranAgt->asal_sekolah : '-',
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'no_hp' => $pendaftaranAgt ? $pendaftaranAgt->no_hp : '-',
            ];

            $steps = [
                'registrasi' => [
                    'status' => 'completed',
                    'title' => 'Registrasi Pendaftaran',
                    'desc' => 'Pendaftaran perlombaan berhasil disimpan.',
                    'date' => $pendaftaranAgt ? $pendaftaranAgt->created_at : now()
                ],
                'biodata' => [
                    'status' => 'completed',
                    'title' => 'Data Diri & Asal Lembaga',
                    'desc' => $pendaftaranAgt ? $pendaftaranAgt->asal_sekolah : 'Data telah terisi.',
                ],
                'pembayaran' => [
                    'status' => 'completed',
                    'title' => 'Bukti Pendaftaran / Konfirmasi',
                    'desc' => 'Pendaftaran aktif di sistem.',
                ]
            ];

            $progress = 100;

            if ($agent->isMobile()) {
                return view('mobile.dashboard.index', [
                    'user' => $user,
                    'pengaturan' => $pengaturan,
                    'pendaftaran' => $pendaftaranObj,
                    'steps' => $steps,
                    'progress' => $progress
                ]);
            }

            return view('pages.dashboard.index', [
                'user' => $user,
                'pengaturan' => $pengaturan,
                'pendaftaran' => $pendaftaranObj,
                'steps' => $steps,
                'progress' => $progress
            ]);
        }

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
