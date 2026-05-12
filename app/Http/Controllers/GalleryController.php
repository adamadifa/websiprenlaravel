<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;
use App\Models\GalleryPhoto;
use App\Models\PengaturanUmum;
use App\Models\Unit;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $agent = new \Jenssegers\Agent\Agent();
        $pengaturan = PengaturanUmum::first();
        $units = Unit::where('status', 1)->get();
        $albums = GalleryAlbum::withCount('photos')->latest()->paginate(12);

        $view = $agent->isMobile() ? 'mobile.gallery.index' : 'pages.gallery.index';
        return view($view, compact('pengaturan', 'units', 'albums'));
    }

    public function show($id)
    {
        $agent = new \Jenssegers\Agent\Agent();
        $pengaturan = PengaturanUmum::first();
        $units = Unit::where('status', 1)->get();
        $album = GalleryAlbum::with('photos')->findOrFail($id);

        $view = $agent->isMobile() ? 'mobile.gallery.show' : 'pages.gallery.show';
        return view($view, compact('pengaturan', 'units', 'album'));
    }
}
