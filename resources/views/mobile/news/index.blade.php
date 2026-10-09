@extends('layouts.mobile')

@section('title', 'Berita Pesantren - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Al Amin'))

@section('content')
<!-- Hero Section Mobile with Gradient & Pattern -->
<div class="bg-gradient-to-b from-[#041e1a] via-[#062d27] to-[#0a3a33] pt-7 pb-8 px-5 relative overflow-hidden text-white border-b border-emerald-800/40">
    <div class="absolute -top-10 -right-10 w-44 h-44 bg-[#bef264]/10 rounded-full blur-2xl pointer-events-none"></div>
    
    <div class="relative z-10" data-aos="fade-down">
        <div class="flex items-center gap-1.5 text-[10px] text-[#bef264] font-black uppercase tracking-wider mb-2 font-poppins">
            <span class="w-2 h-2 rounded-full bg-[#bef264] animate-pulse"></span>
            Warta & Kabar Terkini
        </div>
        <h1 class="text-2xl font-black text-white leading-tight mb-2 font-poppins">
            Berita & <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#bef264] to-emerald-300">Artikel</span>
        </h1>
        <p class="text-xs text-emerald-100/80 font-normal leading-relaxed mb-4">
            Pusat kabar dan rilis kegiatan santri {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}.
        </p>

        <!-- Search Bar Mobile -->
        <form action="{{ route('news.index') }}" method="GET" class="relative">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <i class="ti ti-search absolute left-3.5 top-1/2 -translate-y-1/2 text-emerald-300 text-base pointer-events-none"></i>
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                placeholder="Cari kabar atau artikel..." 
                class="w-full pl-10 pr-20 py-2.5 bg-white/10 text-white placeholder-emerald-200/50 text-xs rounded-xl border border-emerald-500/30 focus:border-[#bef264] focus:outline-none backdrop-blur-md font-poppins"
            >
            <button type="submit" class="absolute right-1.5 top-1/2 -translate-y-1/2 px-3 py-1 bg-[#bef264] text-[#062d27] font-black text-[11px] font-poppins rounded-lg shadow-sm">
                Cari
            </button>
        </form>
    </div>
</div>

<!-- Categories Filter Horizontal Scroll -->
@if(isset($categories) && $categories->count() > 0)
<div class="bg-emerald-950/80 border-b border-emerald-900/60 px-5 py-2.5 flex items-center gap-2 overflow-x-auto scrollbar-none">
    <a href="{{ route('news.index', request()->only('search')) }}" 
       class="shrink-0 px-3 py-1 rounded-full text-[11px] font-bold font-poppins {{ !request('category') ? 'bg-[#bef264] text-[#062d27] shadow-xs' : 'bg-emerald-900/80 text-emerald-200 border border-emerald-800' }}">
        Semua
    </a>
    @foreach($categories as $cat)
        <a href="{{ route('news.index', array_merge(request()->only('search'), ['category' => $cat->slug])) }}" 
           class="shrink-0 px-3 py-1 rounded-full text-[11px] font-bold font-poppins flex items-center gap-1 {{ request('category') == $cat->slug ? 'bg-[#bef264] text-[#062d27] shadow-xs' : 'bg-emerald-900/80 text-emerald-200 border border-emerald-800' }}">
            <span>{{ $cat->name }}</span>
            @if(isset($cat->posts_count))
                <span class="text-[9px] opacity-75">({{ $cat->posts_count }})</span>
            @endif
        </a>
    @endforeach
</div>
@endif

<div class="px-5 pt-6 pb-24 bg-[#faf9f6] min-h-screen">
    
    @if(request('search') || request('category'))
        <div class="mb-4 p-3 bg-white rounded-xl border border-stone-200 shadow-xs flex items-center justify-between text-xs font-poppins">
            <span class="text-stone-600 truncate">Filter: <strong>{{ request('search') ?? request('category') }}</strong></span>
            <a href="{{ route('news.index') }}" class="text-red-600 font-bold shrink-0 ml-2">Reset</a>
        </div>
    @endif

    @if($posts->count() > 0)
        @php
            $isFirstPageMobile = method_exists($posts, 'currentPage') ? ($posts->currentPage() == 1) : true;
            $hasFilterMobile = request()->filled('search') || request()->filled('category');
            $featuredMobile = ($isFirstPageMobile && !$hasFilterMobile) ? $posts->first() : null;
            $remainingMobile = ($featuredMobile) ? $posts->slice(1) : $posts;
        @endphp

        <!-- Featured News Mobile (Top Highlight) -->
        @if($featuredMobile)
            <div class="mb-6" data-aos="fade-up">
                <a href="{{ route('news.show', $featuredMobile->slug) }}" class="block bg-white rounded-3xl overflow-hidden border border-stone-200/90 shadow-md active:scale-[0.98] transition-all">
                    <!-- Photo Cover -->
                    <div class="relative aspect-[16/10] bg-stone-100 overflow-hidden">
                        @if($featuredMobile->image)
                            <img 
                                src="{{ $featuredMobile->getAdminImageUrl($featuredMobile->image, 'posts') }}" 
                                alt="{{ $featuredMobile->title }}" 
                                class="w-full h-full object-cover"
                                onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full bg-stone-100 flex items-center justify-center text-stone-300\'><i class=\'ti ti-photo text-5xl\'></i></div>';"
                            >
                        @else
                            <div class="w-full h-full bg-gradient-to-tr from-emerald-900 to-teal-800 flex items-center justify-center text-white/30">
                                <i class="ti ti-photo text-5xl"></i>
                            </div>
                        @endif

                        <div class="absolute top-3 left-3 flex gap-1.5 z-10">
                            <span class="inline-flex items-center gap-1 bg-[#bef264] text-[#062d27] text-[9px] font-black uppercase px-2.5 py-1 rounded-full shadow-sm font-poppins">
                                <i class="ti ti-sparkles text-[10px]"></i> Headline
                            </span>
                            <span class="inline-flex items-center bg-[#062d27]/85 backdrop-blur-md text-emerald-200 text-[9px] font-bold px-2.5 py-1 rounded-full border border-white/20 font-poppins">
                                {{ $featuredMobile->category->name ?? 'Warta' }}
                            </span>
                        </div>

                        <div class="absolute inset-x-0 bottom-0 pt-6 pb-2 px-3.5 bg-gradient-to-t from-black/75 via-black/20 to-transparent flex items-center justify-between text-white/95 text-[10px] font-medium font-poppins pointer-events-none">
                            <span class="flex items-center gap-1">
                                <i class="ti ti-calendar text-emerald-300"></i>
                                {{ $featuredMobile->created_at ? $featuredMobile->created_at->translatedFormat('d M Y') : '-' }}
                            </span>
                            <span>{{ max(1, ceil(str_word_count(strip_tags($featuredMobile->content)) / 200)) }} mnt</span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h2 class="text-base font-black text-stone-900 leading-snug mb-2 font-poppins">
                            {!! html_entity_decode($featuredMobile->title) !!}
                        </h2>
                        <p class="text-xs text-stone-500 line-clamp-2 leading-relaxed font-normal mb-3">
                            {{ Str::limit(strip_tags($featuredMobile->content), 110) }}
                        </p>
                        <div class="flex items-center justify-between text-xs font-bold text-emerald-800 font-poppins pt-2 border-t border-stone-100">
                            <span>Baca Selengkapnya</span>
                            <div class="w-6 h-6 rounded-full bg-emerald-50 text-emerald-800 flex items-center justify-center">
                                <i class="ti ti-arrow-right text-xs"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        <!-- Other News Grid (Compact Modern Cards) -->
        <div class="space-y-3.5 mb-8">
            @foreach($remainingMobile as $item)
            <a href="{{ route('news.show', $item->slug) }}" class="block p-3.5 bg-white rounded-2xl border border-stone-200/80 shadow-xs active:scale-[0.98] transition-all" data-aos="fade-up">
                <div class="flex gap-3.5 items-center">
                    <div class="relative shrink-0 w-24 h-20 rounded-xl overflow-hidden bg-stone-100 border border-stone-200 shadow-2xs">
                        @if($item->image)
                            <img 
                                src="{{ $item->getAdminImageUrl($item->image, 'posts') }}" 
                                alt="{{ $item->title }}" 
                                class="w-full h-full object-cover"
                                onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full flex items-center justify-center bg-stone-100 text-stone-300\'><i class=\'ti ti-photo text-2xl\'></i></div>';"
                            >
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-stone-100 text-stone-300">
                                <i class="ti ti-photo text-2xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-[9px] font-bold text-emerald-800 uppercase tracking-wider font-poppins block mb-0.5">
                            {{ $item->category->name ?? 'Berita' }}
                        </span>
                        <h3 class="text-xs font-bold text-stone-900 leading-snug line-clamp-2 mb-1.5 font-poppins">
                            {!! html_entity_decode($item->title) !!}
                        </h3>
                        <span class="text-[10px] text-stone-400 font-poppins flex items-center gap-1">
                            <i class="ti ti-calendar text-emerald-700"></i>
                            {{ $item->created_at ? $item->created_at->translatedFormat('d M Y') : '-' }}
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

    @else
        <div class="py-16 text-center bg-white rounded-3xl border border-dashed border-stone-300 p-6" data-aos="fade-up">
            <i class="ti ti-article-off text-4xl text-emerald-800/40 mb-3 block"></i>
            <h3 class="text-sm font-bold text-stone-800 mb-1 font-poppins">Belum Ada Berita</h3>
            <p class="text-stone-400 text-xs">Belum ada warta atau berita yang sesuai filter.</p>
        </div>
    @endif

    <!-- Pagination -->
    @if($posts->hasPages())
        <div class="flex justify-center">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
