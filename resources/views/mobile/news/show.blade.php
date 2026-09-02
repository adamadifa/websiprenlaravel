@extends('layouts.mobile')

@section('title', $post->title . ' - Al Amin')
@section('meta_description', Str::limit(strip_tags($post->content), 160))
@section('meta_image', $post->getAdminImageUrl($post->image, 'posts'))

@section('content')
<div class="bg-white min-h-screen">
    
    <!-- Top Navigation / Breadcrumb -->
    <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between text-xs">
        <a href="{{ route('news.index') }}" class="inline-flex items-center gap-1 text-slate-600 font-medium">
            <i class="ti ti-arrow-left text-sm text-teal-700"></i>
            <span>Kembali ke Berita</span>
        </a>
        <span class="px-2 py-0.5 rounded bg-teal-50 text-teal-800 font-medium text-[11px] border border-teal-100">
            {{ $post->category->name ?? 'Berita' }}
        </span>
    </div>

    <!-- Article Header -->
    <header class="px-4 pt-4 pb-2">
        <h1 class="text-xl sm:text-2xl font-bold text-slate-900 leading-snug tracking-tight mb-3">
            {!! html_entity_decode($post->title) !!}
        </h1>

        <div class="flex flex-wrap items-center gap-x-2 gap-y-1 text-xs text-slate-500 pb-3 border-b border-slate-100">
            <span class="font-medium text-slate-700">Redaksi Al-Amin</span>
            <span class="text-slate-300">•</span>
            <time datetime="{{ $post->created_at->toIso8601String() }}">
                {{ $post->created_at->translatedFormat('d M Y, H:i') }} WIB
            </time>
        </div>
    </header>

    <!-- Featured Image -->
    @if($post->image)
    <figure class="px-4 my-3">
        <div class="overflow-hidden rounded-lg bg-slate-100 border border-slate-200">
            <img 
                src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" 
                alt="{{ $post->title }}" 
                class="w-full h-auto max-h-[260px] object-cover"
                onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-[180px] bg-slate-50 flex items-center justify-center text-slate-400\'><i class=\'ti ti-photo text-3xl\'></i></div>';"
            >
        </div>
        <figcaption class="mt-1 text-[11px] text-slate-400 italic">
            Dokumentasi: Pesantren Al-Amin
        </figcaption>
    </figure>
    @endif

    <!-- Article Content -->
    <article class="px-4 py-2">
        <div class="prose prose-sm prose-slate max-w-none text-slate-700 leading-relaxed font-normal
                    prose-headings:font-bold prose-headings:text-slate-900
                    prose-p:mb-4 prose-p:leading-relaxed
                    prose-a:text-teal-700 prose-a:font-medium
                    prose-img:rounded-lg prose-img:my-4 prose-img:border prose-img:border-slate-100">
            {!! $post->content !!}
        </div>
    </article>

    <!-- Share Section -->
    <div class="mx-4 my-6 p-4 rounded-xl bg-slate-50 border border-slate-200">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-semibold text-slate-700">Bagikan artikel ini:</span>
            <button onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan berhasil disalin!');" class="text-xs text-teal-700 font-semibold flex items-center gap-1">
                <i class="ti ti-link"></i> Salin Link
            </button>
        </div>
        <div class="grid grid-cols-3 gap-2">
            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}" target="_blank" class="py-2 px-3 bg-white border border-slate-200 rounded-lg flex items-center justify-center gap-1.5 text-xs font-medium text-[#128C7E] active:bg-slate-100">
                <i class="ti ti-brand-whatsapp text-base"></i> WhatsApp
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="py-2 px-3 bg-white border border-slate-200 rounded-lg flex items-center justify-center gap-1.5 text-xs font-medium text-[#1877F2] active:bg-slate-100">
                <i class="ti ti-brand-facebook text-base"></i> Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ url()->current() }}" target="_blank" class="py-2 px-3 bg-white border border-slate-200 rounded-lg flex items-center justify-center gap-1.5 text-xs font-medium text-slate-800 active:bg-slate-100">
                <i class="ti ti-brand-x text-sm"></i> Twitter
            </a>
        </div>
    </div>

    <!-- Related News -->
    <section class="px-4 pt-4 pb-8 border-t border-slate-100">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-bold text-slate-900 flex items-center gap-1.5">
                <span class="w-1.5 h-3.5 bg-teal-600 rounded-sm"></span>
                Berita Terkait Lainnya
            </h2>
            <a href="{{ route('news.index') }}" class="text-xs font-semibold text-teal-700">Lihat Semua</a>
        </div>
        
        <div class="divide-y divide-slate-100">
            @foreach($recentPosts->take(4) as $recent)
            <a href="{{ route('news.show', $recent->slug) }}" class="py-3 flex gap-3 items-start first:pt-0">
                <div class="shrink-0 w-20 h-16 rounded-lg overflow-hidden bg-slate-100 border border-slate-200">
                    @if($recent->image)
                        <img src="{{ $recent->getAdminImageUrl($recent->image, 'posts') }}" alt="{{ $recent->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                            <i class="ti ti-photo text-base"></i>
                        </div>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-xs font-medium text-slate-900 line-clamp-2 leading-snug mb-1">
                        {{ $recent->title }}
                    </h3>
                    <span class="text-[10px] text-slate-400">
                        {{ $recent->created_at->translatedFormat('d M Y') }}
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </section>

</div>
@endsection

