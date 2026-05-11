@extends('layouts.mobile')

@section('title', $post->title . ' - Al Amin')
@section('meta_description', Str::limit(strip_tags($post->content), 160))
@section('meta_image', $post->getAdminImageUrl($post->image, 'posts'))

@section('content')
<!-- Hero/Header Section -->
<div class="bg-teal-900 pt-8 pb-10 px-6 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
    </div>
    
    <div class="relative z-10" data-aos="fade-down">
        <!-- Breadcrumb & Category -->
        <div class="flex items-center justify-between mb-0">
            <span class="bg-white/10 backdrop-blur-md text-white text-[10px] font-black px-4 py-2 rounded-full uppercase tracking-widest border border-white/10">
                {{ $post->category->name ?? 'Berita' }}
            </span>
            <div class="flex items-center gap-2 text-[10px] text-white font-bold uppercase tracking-widest">
                <a href="/" class="text-white/80">Beranda</a>
                <i class="ti ti-chevron-right text-[8px] text-teal-500"></i>
                <span class="text-white">Detail</span>
            </div>
        </div>
    </div>
</div>

<div class="px-6 pt-10 pb-20 bg-gray-50/50 min-h-screen">

    <!-- Article Title -->
    <div class="mb-8" data-aos="fade-up">
        <h1 class="text-2xl font-black text-teal-950 leading-tight mb-4">{{ $post->title }}</h1>
        <div class="flex items-center gap-4 text-[10px] text-gray-400 font-bold uppercase tracking-widest">
            <div class="flex items-center gap-1.5">
                <i class="ti ti-calendar-event text-teal-600 text-sm"></i>
                <span>{{ $post->created_at->format('d M Y') }}</span>
            </div>
            <div class="flex items-center gap-1.5">
                <i class="ti ti-user text-teal-600 text-sm"></i>
                <span>Admin</span>
            </div>
        </div>
    </div>

    <!-- Featured Image -->
    <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl shadow-teal-900/10 mb-10" data-aos="zoom-in">
        <img src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" alt="{{ $post->title }}" class="w-full h-auto object-cover max-h-[300px]">
        <div class="absolute inset-0 bg-gradient-to-t from-teal-900/20 to-transparent"></div>
    </div>

    <!-- Article Content -->
    <div class="prose prose-sm prose-teal max-w-none mb-16 text-gray-600 leading-relaxed font-medium" data-aos="fade-up">
        {!! $post->content !!}
    </div>

    <!-- Share Section -->
    <div class="bg-teal-50 p-8 rounded-[2.5rem] mb-16" data-aos="fade-up">
        <div class="text-center mb-6">
            <h3 class="text-sm font-black text-teal-950 uppercase tracking-widest">Bagikan Berita</h3>
            <div class="h-1 w-8 bg-teal-200 mx-auto mt-2 rounded-full"></div>
        </div>
        <div class="flex justify-center gap-4">
            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-[#25D366] shadow-sm active:scale-95 transition-all">
                <i class="ti ti-brand-whatsapp text-2xl"></i>
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-[#1877F2] shadow-sm active:scale-95 transition-all">
                <i class="ti ti-brand-facebook text-2xl"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ url()->current() }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-[#1DA1F2] shadow-sm active:scale-95 transition-all">
                <i class="ti ti-brand-twitter text-2xl"></i>
            </a>
        </div>
    </div>

    <!-- Related News -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-lg font-black text-teal-950 font-poppins">Berita Lainnya</h2>
            <a href="/berita" class="text-[10px] font-black text-teal-600 uppercase">Lihat Semua</a>
        </div>
        
        <div class="space-y-6">
            @foreach($recentPosts->take(3) as $recent)
            <a href="{{ route('news.show', $recent->slug) }}" class="flex gap-4 group">
                <div class="shrink-0 w-20 h-20 rounded-2xl overflow-hidden shadow-sm">
                    <img src="{{ $recent->getAdminImageUrl($recent->image, 'posts') }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="flex-1 py-1">
                    <h4 class="text-xs font-black text-teal-950 line-clamp-2 leading-snug mb-2 group-hover:text-teal-600 transition-colors">{{ $recent->title }}</h4>
                    <span class="text-[9px] text-gray-400 font-bold uppercase tracking-wider">{{ $recent->created_at->format('d M Y') }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

<style>
    .prose p { margin-bottom: 1.5rem; }
    .prose img { border-radius: 1.5rem; margin: 2rem 0; }
    .prose h2, .prose h3 { color: #042d27; font-weight: 900; margin-top: 2rem; margin-bottom: 1rem; }
</style>
@endsection
