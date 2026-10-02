@extends('layouts.frontend')

@section('title', 'Berita & Artikel - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Al Amin'))
@section('meta_description', 'Kumpulan berita terbaru, agenda santri, prestasi, dan artikel pendidikan Islam dari ' . ($pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin') . ' Sindangkasih.')

@section('content')
<!-- Hero / Header Section -->
<section class="relative pt-28 sm:pt-32 pb-10 sm:pb-12 bg-[#062d27] text-white border-b border-emerald-900/60 overflow-hidden">
    <!-- Ambient Background Overlay -->
    @if($pengaturan && !empty($pengaturan->background_login))
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20">
            <img 
                src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                alt="" 
                class="w-full h-full object-cover grayscale mix-blend-luminosity scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#062d27] via-[#062d27]/90 to-[#062d27]/70"></div>
        </div>
    @endif

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        
        <!-- Top Bar: Indicator & Breadcrumbs -->
        <div class="flex flex-wrap items-center justify-between gap-3 mb-6 pb-3 border-b border-emerald-800/40" data-aos="fade-down">
            <div class="flex items-center gap-2">
                <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-emerald-300 font-poppins">
                    Pusat Publikasi & Kabar
                </span>
            </div>

            <nav class="flex items-center gap-2 text-emerald-300/70 text-[11px] sm:text-xs font-bold uppercase tracking-wider font-poppins">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <i class="ti ti-chevron-right text-[9px] text-emerald-400/60"></i>
                <span class="text-[#bef264]">Berita & Artikel</span>
            </nav>
        </div>

        <!-- Hero Title Area -->
        <div class="max-w-4xl">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-poppins text-white tracking-tight leading-[1.2] mb-3" data-aos="fade-up">
                Berita & <span class="text-[#bef264]">Artikel</span>
            </h1>
            <p class="text-emerald-100/85 text-xs sm:text-sm lg:text-base leading-relaxed max-w-2xl font-normal" data-aos="fade-up" data-aos-delay="100">
                Ikuti perkembangan terkini, rilis program pendidikan, prestasi, dan dokumentasi kabar seputar {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}.
            </p>
        </div>

    </div>
</section>

<!-- News Content Section -->
<section class="py-14 sm:py-20 bg-[#faf9f6] text-slate-800 relative">
    <div class="container mx-auto px-6 lg:px-12">
        
        @if($posts->count() > 0)
            @php
                $isFirstPage = method_exists($posts, 'currentPage') ? ($posts->currentPage() == 1) : true;
                $featuredPost = $isFirstPage ? $posts->first() : null;
                $gridPosts = $isFirstPage ? $posts->slice(1) : $posts;
            @endphp

            <!-- FEATURED HERO POST (Only on First Page) -->
            @if($featuredPost)
            <div class="mb-14 sm:mb-16" data-aos="fade-up">
                <div class="group bg-white rounded-3xl overflow-hidden border border-stone-200/90 shadow-md hover:shadow-2xl transition-all duration-300 grid grid-cols-1 lg:grid-cols-12 relative">
                    <!-- Left: Large Cover Image -->
                    <div class="lg:col-span-7 relative aspect-[16/10] lg:aspect-auto lg:min-h-[380px] overflow-hidden bg-stone-100 p-3 sm:p-4">
                        <div class="w-full h-full rounded-2xl overflow-hidden relative bg-stone-100">
                            @if($featuredPost->image)
                                <img 
                                    src="{{ $featuredPost->getAdminImageUrl($featuredPost->image, 'posts') }}" 
                                    alt="" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                    onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full bg-stone-100 flex items-center justify-center text-stone-300\'><i class=\'ti ti-photo text-6xl\'></i></div>';"
                                >
                            @else
                                <div class="w-full h-full bg-stone-100 flex items-center justify-center text-stone-300">
                                    <i class="ti ti-photo text-6xl"></i>
                                </div>
                            @endif

                            <!-- Gradient & Floating Badges -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent pointer-events-none"></div>
                            
                            <div class="absolute top-4 left-4 z-10 flex flex-wrap gap-2">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#bef264] text-[#062d27] text-xs font-black uppercase font-poppins shadow-md">
                                    <i class="ti ti-sparkles text-xs"></i>
                                    Berita Terbaru
                                </span>
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full bg-[#062d27]/85 backdrop-blur-md text-white text-xs font-bold uppercase font-poppins border border-white/20">
                                    {{ $featuredPost->category->name ?? 'Warta Utama' }}
                                </span>
                            </div>

                            <div class="absolute bottom-4 left-4 text-white/90 text-xs font-medium font-poppins flex items-center gap-2 pointer-events-none">
                                <i class="ti ti-calendar-event text-[#bef264]"></i>
                                <span>{{ $featuredPost->created_at ? $featuredPost->created_at->translatedFormat('l, d F Y') : '-' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Editorial Content -->
                    <div class="lg:col-span-5 p-6 sm:p-8 lg:p-10 flex flex-col justify-between bg-white">
                        <div>
                            <div class="flex items-center gap-3 text-xs text-gray-400 font-medium font-poppins mb-3">
                                <span class="flex items-center gap-1.5 text-emerald-800 font-semibold">
                                    <i class="ti ti-user-circle text-base"></i>
                                    Redaksi Pesantren
                                </span>
                                <span>•</span>
                                <span class="flex items-center gap-1 text-gray-500">
                                    <i class="ti ti-clock text-xs"></i>
                                    {{ max(1, ceil(str_word_count(strip_tags($featuredPost->content)) / 200)) }} mnt baca
                                </span>
                            </div>

                            <h2 class="text-xl sm:text-2xl lg:text-3xl font-black font-poppins text-gray-900 group-hover:text-emerald-800 transition-colors leading-tight mb-4">
                                <a href="{{ route('news.show', $featuredPost->slug) }}">
                                    {!! html_entity_decode($featuredPost->title) !!}
                                </a>
                            </h2>

                            <p class="text-gray-600 text-sm sm:text-base leading-relaxed line-clamp-3 sm:line-clamp-4 font-normal mb-6">
                                {{ Str::limit(strip_tags($featuredPost->content), 180) }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-stone-100 flex items-center justify-between">
                            <a href="{{ route('news.show', $featuredPost->slug) }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#062d27] hover:bg-[#0d4d43] text-white text-xs font-bold font-poppins transition-all group/btn shadow-sm">
                                <span>Baca Artikel Lengkap</span>
                                <i class="ti ti-arrow-right text-sm group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                            <span class="text-xs text-gray-400 font-poppins">#WartaAlAmin</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- ARTICLE GRID -->
            @if($gridPosts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($gridPosts as $index => $post)
                    <div class="group bg-white rounded-3xl overflow-hidden border border-stone-200/90 shadow-xs hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col" 
                         data-aos="fade-up" 
                         data-aos-delay="{{ ($index % 3) * 100 }}">
                        
                        <!-- Inset Photo Frame with Floating Badges -->
                        <div class="p-3 pb-0 sm:p-3.5 sm:pb-0">
                            <a href="{{ route('news.show', $post->slug) }}" class="block relative aspect-[16/10] rounded-2xl overflow-hidden bg-stone-100">
                                @if($post->image)
                                    <img 
                                        src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" 
                                        alt="" 
                                        class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700"
                                        loading="lazy"
                                        onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full bg-stone-100 flex items-center justify-center text-stone-300\'><i class=\'ti ti-photo text-5xl\'></i></div>';"
                                    >
                                @else
                                    <div class="w-full h-full bg-stone-100 flex items-center justify-center text-stone-300">
                                        <i class="ti ti-photo text-5xl"></i>
                                    </div>
                                @endif

                                <!-- Category Badge -->
                                <div class="absolute top-3 left-3 z-10">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-[#062d27]/85 backdrop-blur-md text-[#bef264] text-[10px] font-bold uppercase tracking-wider font-poppins border border-emerald-500/30 shadow-sm">
                                        {{ $post->category->name ?? 'Berita' }}
                                    </span>
                                </div>

                                <!-- Date Chip at Bottom -->
                                <div class="absolute inset-x-0 bottom-0 pt-8 pb-2.5 px-3 bg-gradient-to-t from-black/70 via-black/20 to-transparent flex items-center justify-between text-white/90 text-[11px] font-medium font-poppins pointer-events-none">
                                    <span class="flex items-center gap-1">
                                        <i class="ti ti-calendar-event text-emerald-300"></i>
                                        {{ $post->created_at ? $post->created_at->translatedFormat('d M Y') : '-' }}
                                    </span>
                                    <span class="text-[10px] text-white/70">
                                        {{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }} mnt
                                    </span>
                                </div>
                            </a>
                        </div>

                        <!-- Content Info Box -->
                        <div class="p-5 sm:p-6 flex flex-col flex-1 bg-white">
                            <!-- Title -->
                            <h3 class="text-base sm:text-lg font-bold font-poppins text-gray-900 group-hover:text-emerald-800 transition-colors leading-snug mb-2.5 line-clamp-2 min-h-[2.75rem] flex items-center">
                                <a href="{{ route('news.show', $post->slug) }}">
                                    {!! html_entity_decode($post->title) !!}
                                </a>
                            </h3>

                            <!-- Excerpt -->
                            <p class="text-xs sm:text-sm text-gray-500 line-clamp-2 leading-relaxed font-normal mb-5">
                                {{ Str::limit(strip_tags($post->content), 110) }}
                            </p>

                            <!-- Footer Action -->
                            <div class="mt-auto pt-3.5 border-t border-stone-100 flex items-center justify-between">
                                <a href="{{ route('news.show', $post->slug) }}" class="text-xs font-bold text-emerald-800 font-poppins group-hover:text-emerald-950 transition-colors flex items-center gap-1">
                                    <span>Baca Selengkapnya</span>
                                </a>
                                <a href="{{ route('news.show', $post->slug) }}" class="w-8 h-8 rounded-full bg-emerald-50 group-hover:bg-[#bef264] text-emerald-800 group-hover:text-[#062d27] flex items-center justify-center transition-all group-hover:scale-110 shadow-xs" aria-label="Baca berita">
                                    <i class="ti ti-arrow-right text-sm group-hover:translate-x-0.5 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

        @else
            <div class="py-20 text-center bg-white rounded-3xl border border-dashed border-stone-300 p-8" data-aos="fade-up">
                <div class="w-16 h-16 bg-emerald-50 text-emerald-800 rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl shadow-xs">
                    <i class="ti ti-photo-off"></i>
                </div>
                <h3 class="text-xl font-bold font-poppins text-gray-900 mb-1">Belum Ada Berita</h3>
                <p class="text-gray-500 text-sm max-w-md mx-auto">Saat ini belum ada artikel atau warta yang dipublikasikan.</p>
            </div>
        @endif

        <!-- Pagination -->
        @if($posts->hasPages())
            <div class="mt-14 flex justify-center">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
