<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Post;
use App\Models\Karyawan;
use App\Models\Pengumuman;
use App\Models\PrestasiSiswa;
use App\Models\PengaturanUmum;
use App\Models\PilarPendidikan;
use App\Models\ProgramUnggulan;
use App\Models\Testimonial;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class UnitLandingController extends Controller
{
    /**
     * Mapping slug to unit code and configuration
     */
    protected $unitMap = [
        'tk' => [
            'kode_unit' => 'U01',
            'alias'     => 'TK Calisa Rabbani',
            'view'      => 'units.tk.index',
            'theme'     => 'tk'
        ],
        'diniyah' => [
            'kode_unit' => 'U02',
            'alias'     => 'Madrasah Diniyah Ula',
            'view'      => 'units.diniyah.index',
            'theme'     => 'diniyah'
        ],
        'sdit' => [
            'kode_unit' => 'U03',
            'alias'     => 'SDIT Al-Amin',
            'view'      => 'units.sdit.index',
            'theme'     => 'sdit'
        ],
        'mts' => [
            'kode_unit' => 'U04',
            'alias'     => 'MTs Persis Sindangkasih',
            'view'      => 'units.mts.index',
            'theme'     => 'mts'
        ],
        'ma' => [
            'kode_unit' => 'U05',
            'alias'     => 'MA Al-Amin Sindangkasih',
            'view'      => 'units.ma.index',
            'theme'     => 'ma'
        ],
        'asrama' => [
            'kode_unit' => 'U07',
            'alias'     => 'Asrama Santri Al-Amin',
            'view'      => 'units.asrama.index',
            'theme'     => 'asrama'
        ],
    ];

    /**
     * Landing Page TK Calisa Rabbani
     */
    public function tk(Request $request)
    {
        return $this->renderUnitLanding('tk', $request);
    }

    /**
     * Generic Landing Page for specific unit slug
     */
    public function show(Request $request, $slug)
    {
        if (!isset($this->unitMap[$slug])) {
            abort(404, 'Unit tidak ditemukan');
        }

        return $this->renderUnitLanding($slug, $request);
    }

    /**
     * Render unit landing page with populated dynamic database models
     */
    protected function renderUnitLanding(string $slug, Request $request)
    {
        $config = $this->unitMap[$slug];
        $kodeUnit = $config['kode_unit'];

        $unit = Unit::with('landingSetting')->where('kode_unit', $kodeUnit)->firstOrFail();
        $setting = $unit->landingSetting;
        $pengaturan = PengaturanUmum::first();

        // 1. Staff & Teachers (Guru & Tendik) of this unit
        // Urutan: Kepala Unit (J07) -> Kepala Tata Usaha (J10) -> Wakil Kepala Unit (J08) -> Guru (J09) -> Lainnya (Staff/Kebersihan/dsb)
        $staff = Karyawan::where('kode_unit', $kodeUnit)
            ->where('status', 1)
            ->with('jabatan')
            ->orderByRaw("
                CASE 
                    WHEN kode_jabatan = 'J07' THEN 1 
                    WHEN kode_jabatan = 'J10' THEN 2 
                    WHEN kode_jabatan = 'J08' THEN 3 
                    WHEN kode_jabatan = 'J09' THEN 4 
                    ELSE 5 
                END ASC, nama_lengkap ASC
            ")
            ->get();

        // Kepala Sekolah / Kepala Unit
        $kepalaSekolah = Karyawan::where('kode_unit', $kodeUnit)
            ->where('kode_jabatan', 'J07')
            ->with('jabatan')
            ->first() ?? $staff->first();

        // 2. Posts & News filtered by kode_unit, fallback to general if empty
        $news = Post::where('kode_unit', $kodeUnit)->latest()->take(6)->get();
        if ($news->isEmpty()) {
            $news = Post::latest()->take(6)->get();
        }

        // 3. Announcements
        $pengumuman = Pengumuman::latest()->take(5)->get();

        // 4. Achievements (Prestasi)
        $prestasi = PrestasiSiswa::latest()->take(10)->get();

        // 5. Pillars & Featured Programs
        $pilar = PilarPendidikan::orderBy('urutan')->get();
        $unggulan = ProgramUnggulan::orderBy('urutan')->get();

        // 6. Testimonials
        $testimonials = Testimonial::where('status', 1)->latest()->take(6)->get();

        // 7. Active PPDB & Rincian Biaya Pendidikan
        $activePPDB = \App\Models\Tahunajaranppdb::where('status', 1)->first() 
            ?? \App\Models\Tahunajaranppdb::latest()->first();

        $biayaList = collect();
        $biayaNonAsrama = collect();
        $biayaAsrama = collect();
        if ($activePPDB) {
            $biayaList = \Illuminate\Support\Facades\DB::table('konfigurasi_biaya')
                ->join('konfigurasi_biaya_detail', 'konfigurasi_biaya.kode_biaya', '=', 'konfigurasi_biaya_detail.kode_biaya')
                ->join('jenis_biaya', 'konfigurasi_biaya_detail.kode_jenis_biaya', '=', 'jenis_biaya.kode_jenis_biaya')
                ->where('konfigurasi_biaya.kode_unit', $kodeUnit)
                ->where('konfigurasi_biaya.kode_ta', $activePPDB->kode_ta)
                ->where('konfigurasi_biaya.tingkat', 1)
                ->where('konfigurasi_biaya.is_pindahan', 0)
                ->select(
                    'konfigurasi_biaya_detail.kode_jenis_biaya',
                    'konfigurasi_biaya_detail.jumlah',
                    'jenis_biaya.jenis_biaya',
                    'konfigurasi_biaya.asrama'
                )
                ->orderBy('konfigurasi_biaya_detail.kode_jenis_biaya', 'asc')
                ->get();

            $biayaNonAsrama = $biayaList->where('asrama', 0)->values();
            $biayaAsrama = $biayaList->where('asrama', 1)->values();
        }

        // 8. Other active units for quick navigation
        $otherUnits = Unit::where('status', 1)
            ->whereNotIn('kode_unit', ['U00', 'U06', $kodeUnit])
            ->get();

        $viewName = view()->exists($config['view']) ? $config['view'] : 'units.default';

        return view($viewName, compact(
            'unit',
            'setting',
            'pengaturan',
            'staff',
            'kepalaSekolah',
            'news',
            'pengumuman',
            'prestasi',
            'pilar',
            'unggulan',
            'testimonials',
            'activePPDB',
            'biayaList',
            'biayaNonAsrama',
            'biayaAsrama',
            'otherUnits',
            'config'
        ));
    }
}
