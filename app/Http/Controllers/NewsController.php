<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PengaturanUmum;
use App\Models\Unit;
use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $agent = new Agent();
        $pengaturan = PengaturanUmum::first();
        $units = Unit::where('status', 1)->get();
        $categories = \App\Models\Category::withCount('posts')->get();

        $query = Post::with('category')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $categorySlug = $request->category;
            $query->whereHas('category', function($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $posts = $query->paginate(9)->withQueryString();

        if ($agent->isMobile()) {
            return view('mobile.news.index', compact('pengaturan', 'units', 'posts', 'categories'));
        }

        return view('pages.news.index', compact('pengaturan', 'units', 'posts', 'categories'));
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
