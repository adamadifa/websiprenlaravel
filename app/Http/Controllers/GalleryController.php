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
        $pengaturan = PengaturanUmum::first();
        $units = Unit::where('status', 1)->get();
        $albums = GalleryAlbum::withCount('photos')->latest()->paginate(12);

        return view('pages.gallery.index', compact('pengaturan', 'units', 'albums'));
    }

    public function show($id)
    {
        $pengaturan = PengaturanUmum::first();
        $units = Unit::where('status', 1)->get();
        $album = GalleryAlbum::with('photos')->findOrFail($id);

        return view('pages.gallery.show', compact('pengaturan', 'units', 'album'));
    }
}
