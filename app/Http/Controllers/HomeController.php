<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Unit;
use App\Models\Pengumuman;
use App\Models\PrestasiSiswa;
use App\Models\PengaturanUmum;
use App\Models\PilarPendidikan;
use App\Models\SebaranAlumni;
use App\Models\ProgramUnggulan;
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
        $news = Post::latest()->take(3)->get();
        $pengumuman = Pengumuman::latest()->take(5)->get();
        $prestasi = PrestasiSiswa::latest()->take(20)->get();
        $pilar = PilarPendidikan::orderBy('urutan')->get();
        $alumni = SebaranAlumni::all();
        $unggulan = ProgramUnggulan::orderBy('urutan')->get();
        $testimonials = Testimonial::where('status', 1)->latest()->get();

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
            'testimonials'
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

        if ($agent->isMobile()) {
            return view('mobile.about', compact('pengaturan', 'about', 'visi', 'misi', 'units'));
        }

        return view('pages.about', compact('pengaturan', 'about', 'visi', 'misi', 'units'));
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
}
