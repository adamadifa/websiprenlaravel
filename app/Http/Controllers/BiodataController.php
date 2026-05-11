<?php

namespace App\Http\Controllers;

use App\Models\Asalsekolah;
use App\Models\District;
use App\Models\Pendaftaranonline;
use App\Models\Penghasilanortu;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Unit;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;
use Jenssegers\Agent\Agent;

class BiodataController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $user = Auth::user();
        $pendaftaran = Pendaftaranonline::where('no_register', $user->username)->first();
        
        if (!$pendaftaran) {
            return redirect()->route('dashboard')->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        $provinsi = Province::orderBy('name')->get();
        $penghasilan_ortu = Penghasilanortu::all();
        $units = Unit::all();
        $pendidikan = ['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'];

        if ($agent->isMobile()) {
            return view('mobile.biodata.index', compact('pendaftaran', 'provinsi', 'penghasilan_ortu', 'units', 'pendidikan'));
        }

        return view('pages.dashboard.biodata', compact('pendaftaran', 'provinsi', 'penghasilan_ortu', 'units', 'pendidikan'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $pendaftaran = Pendaftaranonline::where('no_register', $user->username)->first();

        if (!$pendaftaran) {
            return back()->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        $data = $request->only([
            'nisn', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 
            'anak_ke', 'jumlah_saudara', 'alamat', 'id_province', 'id_regency', 
            'id_district', 'id_village', 'no_kk', 'kode_pos',
            'nik_ayah', 'nama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah',
            'nik_ibu', 'nama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu',
            'no_hp'
        ]);
        
        $pendaftaran->update($data);

        return back()->with('success', 'Biodata berhasil diperbarui.');
    }

    public function cetak()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftaranonline::where('pendaftaran_online.no_register', $user->username)
            ->join('unit', 'unit.kode_unit', 'pendaftaran_online.kode_unit')
            ->leftJoin('provinces', 'provinces.id', 'pendaftaran_online.id_province')
            ->leftJoin('regencies', 'regencies.id', 'pendaftaran_online.id_regency')
            ->leftJoin('districts', 'districts.id', 'pendaftaran_online.id_district')
            ->leftJoin('villages', 'villages.id', 'pendaftaran_online.id_village')
            ->join('konfigurasi_tahunajaran_ppdb', 'konfigurasi_tahunajaran_ppdb.kode_ta', 'pendaftaran_online.kode_ta')
            ->select(
                'pendaftaran_online.*',
                'nama_unit',
                'tahun_ajaran',
                'provinces.name as provinsi',
                'regencies.name as kabupaten',
                'districts.name as kecamatan',
                'villages.name as desa'
            )
            ->first();

        if (!$pendaftaran) {
            return redirect()->route('dashboard')->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        $pengaturan = \App\Models\PengaturanUmum::first();
        
        // Convert logo to base64
        $logoPath = base_path('../siprenpas/public/storage/' . $pengaturan->logo);
        $logoBase64 = '';
        if (file_exists($logoPath)) {
            $logoData = base64_encode(file_get_contents($logoPath));
            $logoBase64 = 'data:image/' . pathinfo($logoPath, PATHINFO_EXTENSION) . ';base64,' . $logoData;
        }

        $pdf = Pdf::loadView('pages.dashboard.cetak_biodata', compact('pendaftaran', 'pengaturan', 'logoBase64'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('formulir-pendaftaran-' . $pendaftaran->no_register . '.pdf');
    }

    public function getRegency(Request $request)
    {
        $regencies = Regency::where('province_id', $request->id_province)->orderBy('name')->get();
        $html = '<option value="">Pilih Kabupaten / Kota</option>';
        foreach ($regencies as $regency) {
            $selected = $regency->id == $request->id_regency ? 'selected' : '';
            $html .= '<option value="' . $regency->id . '" ' . $selected . '>' . $regency->name . '</option>';
        }
        return response($html);
    }

    public function getDistrict(Request $request)
    {
        $districts = District::where('regency_id', $request->id_regency)->orderBy('name')->get();
        $html = '<option value="">Pilih Kecamatan</option>';
        foreach ($districts as $district) {
            $selected = $district->id == $request->id_district ? 'selected' : '';
            $html .= '<option value="' . $district->id . '" ' . $selected . '>' . $district->name . '</option>';
        }
        return response($html);
    }

    public function getVillage(Request $request)
    {
        $villages = Village::where('district_id', $request->id_district)->orderBy('name')->get();
        $html = '<option value="">Pilih Desa / Kelurahan</option>';
        foreach ($villages as $village) {
            $selected = $village->id == $request->id_village ? 'selected' : '';
            $html .= '<option value="' . $village->id . '" ' . $selected . '>' . $village->name . '</option>';
        }
        return response($html);
    }

    public function getAsalsekolah(Request $request)
    {
        $schools = Asalsekolah::where('kode_unit', $request->kode_unit)->orderBy('nama_asal_sekolah')->get();
        $html = '<option value="">Pilih Asal Sekolah</option>';
        foreach ($schools as $school) {
            $selected = $school->kode_asal_sekolah == $request->kode_asal_sekolah ? 'selected' : '';
            $html .= '<option value="' . $school->kode_asal_sekolah . '" ' . $selected . '>' . $school->nama_asal_sekolah . '</option>';
        }
        return response($html);
    }
}
