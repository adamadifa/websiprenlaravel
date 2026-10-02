<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Unit;
use App\Models\Karyawan;
use App\Models\Pengumuman;
use App\Models\PrestasiSiswa;
use App\Models\PengaturanUmum;
use App\Models\PilarPendidikan;
use App\Models\SebaranAlumni;
use App\Models\ProgramUnggulan;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $pengaturan = PengaturanUmum::first();
        $units = Unit::where('status', 1)->get();
        $news = Post::latest()->take(5)->get();
        $pengumuman = Pengumuman::latest()->take(5)->get();
        $prestasi = PrestasiSiswa::latest()->take(20)->get();
        $pilar = PilarPendidikan::orderBy('urutan')->get();
        $alumni = SebaranAlumni::all();
        $unggulan = ProgramUnggulan::orderBy('urutan')->get();
        $testimonials = Testimonial::where('status', 1)->latest()->get();
        $gurus = Karyawan::with(['jabatan', 'unit'])
            ->where('status', 1)
            ->orderByRaw("CASE WHEN foto IS NOT NULL AND foto != '' THEN 0 ELSE 1 END")
            ->take(20)
            ->get();
        
        $heroGalleryPhotos = GalleryPhoto::where('is_hero', true)->latest()->get();
        if ($heroGalleryPhotos->isEmpty()) {
            $heroGalleryPhotos = GalleryPhoto::latest()->take(8)->get();
        }

        $view = $agent->isMobile() ? 'mobile.index' : 'index';

        return view($view, compact(
            'pengaturan',
            'units',
            'news',
            'pengumuman',
            'prestasi',
            'pilar',
            'alumni',
            'unggulan',
            'testimonials',
            'gurus',
            'heroGalleryPhotos'
        ));
    }

    public function about()
    {
        $agent = new Agent();
        $pengaturan = PengaturanUmum::first();
        $about = \App\Models\Page::where('slug', 'tentang-pesantren')->first();
        $visi = \App\Models\Visi::first();
        $misi = \App\Models\Misi::all();
        $units = Unit::where('status', 1)->get();
        $pilar = \App\Models\PilarPendidikan::orderBy('urutan')->get();
        $unggulan = \App\Models\ProgramUnggulan::orderBy('urutan')->get();

        if ($agent->isMobile()) {
            return view('mobile.about', compact('pengaturan', 'about', 'visi', 'misi', 'units', 'pilar', 'unggulan'));
        }

        return view('pages.about', compact('pengaturan', 'about', 'visi', 'misi', 'units', 'pilar', 'unggulan'));
    }

    public function spmb()
    {
        $agent = new Agent();
        $pengaturan = PengaturanUmum::first();
        $units = Unit::where('status', 1)->get();

        if ($agent->isMobile()) {
            return view('mobile.spmb', compact('pengaturan', 'units'));
        }

        return view('pages.spmb', compact('pengaturan', 'units'));
    }

    public function siportu()
    {
        $agent = new Agent();
        $pengaturan = PengaturanUmum::first();
        $units = Unit::where('status', 1)->get();

        if ($agent->isMobile()) {
            return view('mobile.siportu', compact('pengaturan', 'units'));
        }

        return view('pages.siportu', compact('pengaturan', 'units'));
    }
}
