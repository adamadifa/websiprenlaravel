@extends('layouts.mobile')

@section('title', 'Berita Pesantren - ' . ($pengaturan->nama_sekolah ?? 'Al Amin'))

@section('content')
<!-- Hero Section -->
<div class="bg-[#062d27] pt-6 pb-10 px-5 relative overflow-hidden text-white border-b border-emerald-900/60">
    <div class="relative z-10" data-aos="fade-down">
        <div class="flex items-center gap-2 text-[10px] text-emerald-300 font-bold uppercase tracking-wider mb-2 font-poppins">
            Pusat Informasi & Warta
        </div>
        <h1 class="text-2xl font-black text-white leading-tight mb-2 font-poppins">
            Berita <span class="text-[#bef264]">Pesantren</span>
        </h1>
        <p class="text-xs text-emerald-100/80 font-normal leading-relaxed">
            Ikuti kabar terkini dan informasi resmi seputar kegiatan {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}.
        </p>
    </div>
</div>

<div class="px-5 pt-6 pb-24 bg-[#faf9f6] min-h-screen">
    @if($posts->count() > 0)
        @php
            $isFirstPageMobile = method_exists($posts, 'currentPage') ? ($posts->currentPage() == 1) : true;
            $featuredMobile = $isFirstPageMobile ? $posts->first() : null;
            $remainingMobile = $isFirstPageMobile ? $posts->slice(1) : $posts;
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
                                alt="" 
                                class="w-full h-full object-cover"
                                onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full bg-stone-100 flex items-center justify-center text-stone-300\'><i class=\'ti ti-photo text-5xl\'></i></div>';"
                            >
                        @else
                            <div class="w-full h-full bg-stone-100 flex items-center justify-center text-stone-300">
                                <i class="ti ti-photo text-5xl"></i>
                            </div>
                        @endif

                        <div class="absolute top-3 left-3 flex gap-1.5 z-10">
                            <span class="inline-flex items-center gap-1 bg-[#bef264] text-[#062d27] text-[9px] font-black uppercase px-2.5 py-1 rounded-full shadow-sm font-poppins">
                                <i class="ti ti-sparkles text-[10px]"></i> Terbaru
                            </span>
                        </div>

                        <div class="absolute inset-x-0 bottom-0 pt-6 pb-2 px-3.5 bg-gradient-to-t from-black/75 via-black/20 to-transparent flex items-center text-white/90 text-[10px] font-medium font-poppins pointer-events-none">
                            <i class="ti ti-calendar-event text-emerald-300 mr-1.5"></i>
                            {{ $featuredMobile->created_at ? $featuredMobile->created_at->translatedFormat('d M Y') : '-' }}
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <span class="text-[10px] font-bold text-emerald-800 uppercase tracking-wider font-poppins block mb-1">
                            {{ $featuredMobile->category->name ?? 'Warta Utama' }}
                        </span>
                        <h2 class="text-base font-black text-gray-900 leading-snug mb-2 font-poppins">
                            {!! html_entity_decode($featuredMobile->title) !!}
                        </h2>
                        <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed font-normal mb-3">
                            {{ Str::limit(strip_tags($featuredMobile->content), 100) }}
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

        <!-- Other News Grid (Compact Cards) -->
        <div class="space-y-4 mb-8">
            @foreach($remainingMobile as $item)
            <a href="{{ route('news.show', $item->slug) }}" class="block p-3.5 bg-white rounded-2xl border border-stone-200/80 shadow-xs active:scale-[0.98] transition-all" data-aos="fade-up">
                <div class="flex gap-3.5 items-center">
                    <div class="relative shrink-0 w-24 h-20 rounded-xl overflow-hidden bg-stone-100 border border-stone-200">
                        @if($item->image)
                            <img 
                                src="{{ $item->getAdminImageUrl($item->image, 'posts') }}" 
                                alt="" 
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
                        <h3 class="text-xs font-bold text-gray-900 leading-snug line-clamp-2 mb-1.5 font-poppins">
                            {!! html_entity_decode($item->title) !!}
                        </h3>
                        <span class="text-[10px] text-gray-400 font-poppins flex items-center gap-1">
                            <i class="ti ti-calendar-event text-emerald-700"></i>
                            {{ $item->created_at ? $item->created_at->translatedFormat('d M Y') : '-' }}
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

    @else
        <div class="py-16 text-center bg-white rounded-3xl border border-dashed border-stone-300 p-6" data-aos="fade-up">
            <i class="ti ti-photo-off text-4xl text-emerald-800/40 mb-3 block"></i>
            <p class="text-gray-500 font-medium text-xs">Belum ada berita untuk ditampilkan.</p>
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
