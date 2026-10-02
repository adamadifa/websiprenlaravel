@extends('layouts.mobile')

@section('title', $post->title . ' - ' . ($pengaturan->nama_sekolah ?? 'Al Amin'))
@section('meta_description', Str::limit(strip_tags($post->content), 160))
@section('meta_image', $post->getAdminImageUrl($post->image, 'posts'))

@section('content')
<div class="bg-[#faf9f6] min-h-screen">
    
    <!-- Top Navigation / Back Bar -->
    <div class="bg-[#062d27] px-4 py-3 border-b border-emerald-900/60 flex items-center justify-between text-xs text-white">
        <a href="{{ route('news.index') }}" class="inline-flex items-center gap-1.5 text-emerald-200/90 hover:text-white font-bold font-poppins">
            <i class="ti ti-arrow-left text-sm"></i>
            <span>Kembali ke Berita</span>
        </a>
        <span class="px-2.5 py-0.5 rounded-full bg-emerald-800/80 text-[#bef264] font-bold text-[10px] font-poppins border border-emerald-600/30">
            {{ $post->category->name ?? 'Berita' }}
        </span>
    </div>

    <!-- Article Header -->
    <header class="px-5 pt-5 pb-3 bg-white border-b border-stone-200/60">
        <h1 class="text-lg sm:text-xl font-black text-gray-900 leading-snug tracking-tight mb-2.5 font-poppins">
            {!! html_entity_decode($post->title) !!}
        </h1>

        <div class="flex flex-wrap items-center gap-x-2 text-[11px] text-gray-400 font-poppins">
            <span class="font-semibold text-emerald-800">Redaksi Pesantren</span>
            <span>•</span>
            <time datetime="{{ $post->created_at ? $post->created_at->toIso8601String() : '' }}">
                {{ $post->created_at ? $post->created_at->translatedFormat('d M Y, H:i') : '-' }} WIB
            </time>
        </div>
    </header>

    <!-- Featured Image -->
    @if($post->image)
    <figure class="px-5 my-4">
        <div class="overflow-hidden rounded-2xl bg-stone-100 border border-stone-200 shadow-xs">
            <img 
                src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" 
                alt="" 
                class="w-full h-auto max-h-[260px] object-cover"
                onerror="this.onerror=null; this.parentElement.parentElement.style.display='none';"
            >
        </div>
        <figcaption class="mt-1 text-[10px] text-gray-400 italic text-center font-poppins">
            Dokumentasi: {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}
        </figcaption>
    </figure>
    @endif

    <!-- Article Content -->
    <article class="px-5 py-3">
        <div class="bg-white p-5 rounded-3xl border border-stone-200/80 shadow-xs">
            <div class="prose prose-sm prose-slate max-w-none text-gray-700 leading-relaxed font-normal
                        prose-headings:font-bold prose-headings:font-poppins prose-headings:text-gray-900
                        prose-p:mb-3 prose-p:leading-relaxed
                        prose-a:text-emerald-800 prose-a:font-semibold
                        prose-img:rounded-xl prose-img:my-3 prose-img:border prose-img:border-stone-100">
                {!! $post->content !!}
            </div>
        </div>
    </article>

    <!-- Share Section -->
    <div class="mx-5 my-4 p-4 rounded-2xl bg-white border border-stone-200/80 shadow-xs">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-bold text-gray-800 font-poppins">Bagikan artikel ini:</span>
            <button onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan berhasil disalin!');" class="text-xs text-emerald-800 font-bold font-poppins flex items-center gap-1">
                <i class="ti ti-link"></i> Salin Link
            </button>
        </div>
        <div class="grid grid-cols-3 gap-2">
            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}" target="_blank" class="py-2 px-2 bg-emerald-50 text-emerald-800 border border-emerald-100 rounded-xl flex items-center justify-center gap-1.5 text-xs font-bold font-poppins active:scale-95 transition-all">
                <i class="ti ti-brand-whatsapp text-sm text-[#128C7E]"></i> WA
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="py-2 px-2 bg-stone-50 text-stone-700 border border-stone-200 rounded-xl flex items-center justify-center gap-1.5 text-xs font-bold font-poppins active:scale-95 transition-all">
                <i class="ti ti-brand-facebook text-sm text-[#1877F2]"></i> FB
            </a>
            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ url()->current() }}" target="_blank" class="py-2 px-2 bg-stone-50 text-stone-700 border border-stone-200 rounded-xl flex items-center justify-center gap-1.5 text-xs font-bold font-poppins active:scale-95 transition-all">
                <i class="ti ti-brand-x text-xs"></i> X
            </a>
        </div>
    </div>

    <!-- Related News -->
    <section class="px-5 pt-4 pb-12">
        <div class="flex items-center justify-between mb-3">
            <h2 class="text-xs font-bold text-gray-900 uppercase tracking-wider font-poppins flex items-center gap-1.5">
                <span class="w-1.5 h-3.5 bg-emerald-800 rounded-sm"></span>
                Berita Terkait Lainnya
            </h2>
            <a href="{{ route('news.index') }}" class="text-xs font-bold text-emerald-800 font-poppins">Lihat Semua</a>
        </div>
        
        <div class="space-y-3">
            @foreach($recentPosts->take(4) as $recent)
            <a href="{{ route('news.show', $recent->slug) }}" class="p-3 bg-white rounded-2xl border border-stone-200/80 shadow-xs flex gap-3 items-center active:scale-[0.98] transition-all">
                <div class="shrink-0 w-16 h-14 rounded-xl overflow-hidden bg-stone-100 border border-stone-200">
                    @if($recent->image)
                        <img 
                            src="{{ $recent->getAdminImageUrl($recent->image, 'posts') }}" 
                            alt="" 
                            class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full flex items-center justify-center bg-stone-100 text-stone-300\'><i class=\'ti ti-photo text-sm\'></i></div>';"
                        >
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-stone-100 text-stone-300">
                            <i class="ti ti-photo text-sm"></i>
                        </div>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-xs font-bold text-gray-900 line-clamp-2 leading-snug mb-1 font-poppins">
                        {{ $recent->title }}
                    </h3>
                    <span class="text-[10px] text-gray-400 font-poppins">
                        {{ $recent->created_at ? $recent->created_at->translatedFormat('d M Y') : '-' }}
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </section>

</div>
@endsection
