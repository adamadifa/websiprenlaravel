<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PengaturanUmum;
use App\Models\Unit;
use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

class NewsController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $pengaturan = PengaturanUmum::first();
        $units = Unit::where('status', 1)->get();
        $posts = Post::latest()->paginate(9);

        if ($agent->isMobile()) {
            return view('mobile.news.index', compact('pengaturan', 'units', 'posts'));
        }

        return view('pages.news.index', compact('pengaturan', 'units', 'posts'));
    }

    public function show($slug)
    {
        $agent = new Agent();
        $pengaturan = PengaturanUmum::first();
        $post = Post::where('slug', $slug)->firstOrFail();
        
        // Fetch recent posts for the sidebar
        $recentPosts = Post::where('id', '!=', $post->id)
            ->latest()
            ->limit(5)
            ->get();
        
        // Fetch units for footer
        $units = Unit::where('status', 1)->get();

        if ($agent->isMobile()) {
            return view('mobile.news.show', compact('pengaturan', 'post', 'recentPosts', 'units'));
        }

        return view('pages.news.show', compact('pengaturan', 'post', 'recentPosts', 'units'));
    }
}
