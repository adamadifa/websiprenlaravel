@extends('layouts.frontend')
@section('title', 'Berita & Artikel - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin'))
@section('meta_description', 'Kumpulan kabar terkini, rilis agenda santri, prestasi akademik, warta unit, dan artikel pendidikan Islam dari ' . ($pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin') . ' Sindangkasih Ciamis.')

@section('content')
<!-- Hero / Header Section Premium Glassmorphism -->
<section class="relative pt-32 sm:pt-36 pb-16 lg:pb-20 bg-gradient-to-b from-[#041e1a] via-[#062d27] to-[#0a3a33] text-white border-b border-emerald-800/40 overflow-hidden">
    <!-- Ambient Lighting & Glow -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#bef264]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 right-0 w-[30rem] h-[30rem] bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
    
    @if($pengaturan && !empty($pengaturan->background_login))
        <div class="absolute inset-0 z-0 pointer-events-none opacity-15">
            <img 
                src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                alt="" 
                class="w-full h-full object-cover grayscale mix-blend-luminosity scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#041e1a] via-[#062d27]/90 to-[#041e1a]/80"></div>
        </div>
    @endif

    <!-- Geometric Grid Background Pattern -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#10b9810a_1px,transparent_1px),linear-gradient(to_bottom,#10b9810a_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] pointer-events-none"></div>

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        
        <!-- Top Breadcrumb & Live Tag -->
        <div class="flex flex-wrap items-center justify-between gap-3 mb-8 pb-4 border-b border-emerald-700/30" data-aos="fade-down">
            <div class="flex items-center gap-2.5">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/15 border border-emerald-400/20 text-[#bef264] text-[11px] sm:text-xs font-black uppercase tracking-wider font-poppins shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-[#bef264] animate-pulse"></span>
                    Warta & Publikasi Resmi
                </span>
            </div>

            <nav class="flex items-center gap-2 text-emerald-200/70 text-xs font-semibold uppercase tracking-wider font-poppins">
                <a href="/" class="hover:text-white transition-colors flex items-center gap-1">
                    <i class="ti ti-home text-sm"></i> Beranda
                </a>
                <i class="ti ti-chevron-right text-[10px] text-emerald-400/50"></i>
                <span class="text-[#bef264] font-bold">Warta Berita</span>
            </nav>
        </div>

        <!-- Main Hero Headline & Search / Filter Controls -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-end">
            <div class="lg:col-span-7" data-aos="fade-up">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-poppins text-white tracking-tight leading-[1.15] mb-4">
                    Kabar Terkini & <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#bef264] via-emerald-300 to-teal-200">
                        Warta Pesantren
                    </span>
                </h1>
                <p class="text-emerald-100/80 text-sm sm:text-base leading-relaxed max-w-xl font-normal">
                    Pusat kabar resmi, kegiatan santri, prestasi institusi, dan khazanah keislaman {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}.
                </p>
            </div>

            <!-- Search Form -->
            <div class="lg:col-span-5" data-aos="fade-up" data-aos-delay="100">
                <form action="{{ route('news.index') }}" method="GET" class="relative group">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="relative flex items-center">
                        <i class="ti ti-search absolute left-4 text-emerald-300 text-lg group-focus-within:text-[#bef264] transition-colors pointer-events-none"></i>
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Cari berita, agenda, atau kata kunci..." 
                            class="w-full pl-12 pr-28 py-3.5 bg-white/10 hover:bg-white/15 focus:bg-white/20 text-white placeholder-emerald-200/50 text-sm rounded-2xl border border-emerald-500/30 focus:border-[#bef264] focus:outline-none focus:ring-2 focus:ring-[#bef264]/30 backdrop-blur-md transition-all font-poppins"
                        >
                        <button type="submit" class="absolute right-2 px-4 py-2 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black text-xs font-poppins rounded-xl shadow-md transition-all flex items-center gap-1">
                            <span>Cari</span>
                            <i class="ti ti-arrow-right text-xs"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Categories Pill Bar -->
        @if(isset($categories) && $categories->count() > 0)
            <div class="mt-8 pt-6 border-t border-emerald-700/30 flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none" data-aos="fade-up" data-aos-delay="150">
                <span class="text-xs font-bold text-emerald-300/80 shrink-0 font-poppins mr-1 flex items-center gap-1">
                    <i class="ti ti-category"></i> Kategori:
                </span>
                
                <a href="{{ route('news.index', request()->only('search')) }}" 
                   class="shrink-0 px-4 py-1.5 rounded-full text-xs font-bold font-poppins transition-all {{ !request('category') ? 'bg-[#bef264] text-[#062d27] shadow-md' : 'bg-emerald-900/60 text-emerald-200 hover:bg-emerald-800/80 hover:text-white border border-emerald-700/40' }}">
                    Semua Berita
                </a>

                @foreach($categories as $cat)
                    <a href="{{ route('news.index', array_merge(request()->only('search'), ['category' => $cat->slug])) }}" 
                       class="shrink-0 px-4 py-1.5 rounded-full text-xs font-bold font-poppins transition-all flex items-center gap-1.5 {{ request('category') == $cat->slug ? 'bg-[#bef264] text-[#062d27] shadow-md' : 'bg-emerald-900/60 text-emerald-200 hover:bg-emerald-800/80 hover:text-white border border-emerald-700/40' }}">
                        <span>{{ $cat->name }}</span>
                        @if(isset($cat->posts_count))
                            <span class="text-[10px] opacity-75 px-1.5 py-0.2 rounded-full {{ request('category') == $cat->slug ? 'bg-[#062d27]/20 text-[#062d27]' : 'bg-white/10 text-white' }}">
                                {{ $cat->posts_count }}
                            </span>
                        @endif
                    </a>
                @endforeach
            </div>
        @endif

    </div>
</section>

<!-- News Content Section -->
<section class="py-14 sm:py-20 bg-[#faf9f6] text-slate-800 relative">
    <div class="container mx-auto px-6 lg:px-12">
        
        <!-- Search/Filter Active Feedback -->
        @if(request('search') || request('category'))
            <div class="mb-8 p-4 rounded-2xl bg-white border border-stone-200/90 shadow-xs flex flex-wrap items-center justify-between gap-3" data-aos="fade-up">
                <div class="flex items-center gap-2 text-sm text-stone-700 font-poppins">
                    <i class="ti ti-filter text-emerald-800 text-base"></i>
                    <span>Menampilkan hasil filter:</span>
                    @if(request('search'))
                        <span class="font-bold text-emerald-900 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200/60">
                            "{{ request('search') }}"
                        </span>
                    @endif
                    @if(request('category'))
                        <span class="font-bold text-emerald-900 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200/60">
                            Kategori: {{ request('category') }}
                        </span>
                    @endif
                </div>
                <a href="{{ route('news.index') }}" class="text-xs font-bold text-red-600 hover:text-red-700 flex items-center gap-1 font-poppins">
                    <i class="ti ti-x"></i> Reset Filter
                </a>
            </div>
        @endif

        @if($posts->count() > 0)
            @php
                $isFirstPage = method_exists($posts, 'currentPage') ? ($posts->currentPage() == 1) : true;
                $hasFilter = request()->filled('search') || request()->filled('category');
                $featuredPost = ($isFirstPage && !$hasFilter) ? $posts->first() : null;
                $gridPosts = ($featuredPost) ? $posts->slice(1) : $posts;
            @endphp

            <!-- FEATURED HERO EDITORIAL POST (First page only without filters) -->
            @if($featuredPost)
            <div class="mb-14 sm:mb-16" data-aos="fade-up">
                <div class="group relative bg-white rounded-3xl overflow-hidden border border-stone-200/80 shadow-md hover:shadow-2xl transition-all duration-500 grid grid-cols-1 lg:grid-cols-12">
                    
                    <!-- Left Column: Big Image Display with Overlay Effects -->
                    <div class="lg:col-span-7 relative min-h-[320px] sm:min-h-[400px] lg:min-h-[440px] overflow-hidden bg-stone-900">
                        @if($featuredPost->image)
                            <img 
                                src="{{ $featuredPost->getAdminImageUrl($featuredPost->image, 'posts') }}" 
                                alt="{{ $featuredPost->title }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full bg-stone-100 flex items-center justify-center text-stone-300\'><i class=\'ti ti-photo text-6xl\'></i></div>';"
                            >
                        @else
                            <div class="w-full h-full bg-gradient-to-tr from-[#062d27] to-emerald-900 flex items-center justify-center text-white/30">
                                <i class="ti ti-news text-7xl"></i>
                            </div>
                        @endif

                        <!-- Dark Gradient Overlay for Readability -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/25 to-transparent pointer-events-none"></div>

                        <!-- Top Floating Badges -->
                        <div class="absolute top-5 left-5 z-10 flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-[#bef264] text-[#062d27] text-xs font-black uppercase font-poppins shadow-md">
                                <i class="ti ti-sparkles text-xs"></i>
                                Headline Utama
                            </span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full bg-[#062d27]/85 backdrop-blur-md text-emerald-200 text-xs font-bold font-poppins border border-white/20 shadow-sm">
                                {{ $featuredPost->category->name ?? 'Warta Berita' }}
                            </span>
                        </div>

                        <!-- Bottom Metadata in Image -->
                        <div class="absolute bottom-5 left-5 right-5 text-white flex items-center justify-between text-xs font-medium font-poppins pointer-events-none">
                            <span class="flex items-center gap-2 bg-black/40 backdrop-blur-md px-3 py-1.5 rounded-xl border border-white/15">
                                <i class="ti ti-calendar text-[#bef264]"></i>
                                {{ $featuredPost->created_at ? $featuredPost->created_at->translatedFormat('l, d F Y') : '-' }}
                            </span>
                            <span class="flex items-center gap-1.5 bg-black/40 backdrop-blur-md px-3 py-1.5 rounded-xl border border-white/15">
                                <i class="ti ti-clock text-[#bef264]"></i>
                                {{ max(1, ceil(str_word_count(strip_tags($featuredPost->content)) / 200)) }} mnt baca
                            </span>
                        </div>
                    </div>

                    <!-- Right Column: Editorial Body -->
                    <div class="lg:col-span-5 p-7 sm:p-9 lg:p-10 flex flex-col justify-between bg-white relative">
                        <div class="relative z-10">
                            <div class="flex items-center gap-2.5 text-xs text-stone-400 font-semibold font-poppins mb-3">
                                <span class="flex items-center gap-1 text-emerald-800 bg-emerald-50 px-2.5 py-1 rounded-md border border-emerald-100">
                                    <i class="ti ti-user-circle text-sm"></i>
                                    Redaksi Pesantren
                                </span>
                                <span>•</span>
                                <span class="text-stone-500">Kategori {{ $featuredPost->category->name ?? 'Publikasi' }}</span>
                            </div>

                            <h2 class="text-2xl sm:text-3xl font-black font-poppins text-stone-900 group-hover:text-emerald-800 transition-colors leading-[1.25] mb-4">
                                <a href="{{ route('news.show', $featuredPost->slug) }}" class="hover:underline decoration-emerald-500 underline-offset-4">
                                    {!! html_entity_decode($featuredPost->title) !!}
                                </a>
                            </h2>

                            <p class="text-stone-600 text-sm sm:text-base leading-relaxed line-clamp-4 font-normal mb-6">
                                {{ Str::limit(strip_tags($featuredPost->content), 200) }}
                            </p>
                        </div>

                        <div class="pt-6 border-t border-stone-100 flex items-center justify-between gap-3">
                            <a href="{{ route('news.show', $featuredPost->slug) }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-[#062d27] hover:bg-emerald-900 text-white text-xs font-extrabold font-poppins transition-all shadow-md group/btn transform hover:-translate-y-0.5">
                                <span>Baca Selengkapnya</span>
                                <i class="ti ti-arrow-right text-sm group-hover/btn:translate-x-1.5 transition-transform"></i>
                            </a>
                            <span class="text-xs font-bold text-stone-400 font-poppins uppercase tracking-wider">
                                #WartaAlAmin
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- ARTICLE GRID HEADER -->
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-stone-200" data-aos="fade-up">
                <div class="flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-emerald-700"></span>
                    <h2 class="text-lg sm:text-xl font-black font-poppins text-stone-900">
                        {{ $featuredPost ? 'Daftar Artikel Terbaru' : 'Semua Hasil Berita' }}
                    </h2>
                </div>
                <span class="text-xs font-semibold text-stone-500 font-poppins">
                    Menampilkan {{ $posts->count() }} dari {{ $posts->total() }} berita
                </span>
            </div>

            <!-- ARTICLE GRID CARDS -->
            @if($gridPosts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($gridPosts as $index => $post)
                    <article class="group bg-white rounded-3xl overflow-hidden border border-stone-200/80 shadow-xs hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between" 
                             data-aos="fade-up" 
                             data-aos-delay="{{ ($index % 3) * 100 }}">
                        
                        <div>
                            <!-- Card Image Area -->
                            <div class="p-3.5 pb-0">
                                <a href="{{ route('news.show', $post->slug) }}" class="block relative aspect-[16/10] rounded-2xl overflow-hidden bg-stone-100 shadow-inner">
                                    @if($post->image)
                                        <img 
                                            src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" 
                                            alt="{{ $post->title }}" 
                                            class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700"
                                            loading="lazy"
                                            onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full bg-stone-100 flex items-center justify-center text-stone-300\'><i class=\'ti ti-photo text-5xl\'></i></div>';"
                                        >
                                    @else
                                        <div class="w-full h-full bg-gradient-to-tr from-emerald-800 to-teal-700 flex items-center justify-center text-white/30">
                                            <i class="ti ti-photo text-5xl"></i>
                                        </div>
                                    @endif

                                    <!-- Category Pill -->
                                    <div class="absolute top-3 left-3 z-10">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-[#062d27]/90 backdrop-blur-md text-[#bef264] text-[10px] font-black uppercase tracking-wider font-poppins border border-emerald-500/30 shadow-xs">
                                            {{ $post->category->name ?? 'Berita' }}
                                        </span>
                                    </div>

                                    <!-- Bottom Gradient Bar -->
                                    <div class="absolute inset-x-0 bottom-0 pt-8 pb-2.5 px-3.5 bg-gradient-to-t from-black/75 via-black/25 to-transparent flex items-center justify-between text-white/95 text-[11px] font-medium font-poppins pointer-events-none">
                                        <span class="flex items-center gap-1.5">
                                            <i class="ti ti-calendar text-emerald-300"></i>
                                            {{ $post->created_at ? $post->created_at->translatedFormat('d M Y') : '-' }}
                                        </span>
                                        <span class="text-[10px] text-white/80 bg-white/20 backdrop-blur-xs px-2 py-0.5 rounded-md">
                                            {{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }} mnt
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <!-- Card Body -->
                            <div class="p-6">
                                <h3 class="text-base sm:text-lg font-black font-poppins text-stone-900 group-hover:text-emerald-800 transition-colors leading-snug mb-2.5 line-clamp-2 min-h-[3.25rem]">
                                    <a href="{{ route('news.show', $post->slug) }}">
                                        {!! html_entity_decode($post->title) !!}
                                    </a>
                                </h3>

                                <p class="text-xs sm:text-sm text-stone-500 line-clamp-3 leading-relaxed font-normal mb-2">
                                    {{ Str::limit(strip_tags($post->content), 120) }}
                                </p>
                            </div>
                        </div>

                        <!-- Card Footer Action -->
                        <div class="px-6 pb-6 pt-0">
                            <div class="pt-4 border-t border-stone-100 flex items-center justify-between">
                                <a href="{{ route('news.show', $post->slug) }}" class="text-xs font-bold text-emerald-800 font-poppins group-hover:text-emerald-950 transition-colors flex items-center gap-1">
                                    <span>Baca Berita</span>
                                </a>
                                <a href="{{ route('news.show', $post->slug) }}" class="w-9 h-9 rounded-full bg-emerald-50 group-hover:bg-[#bef264] text-emerald-800 group-hover:text-[#062d27] flex items-center justify-center transition-all duration-300 group-hover:scale-110 shadow-xs" aria-label="Baca berita">
                                    <i class="ti ti-arrow-right text-base group-hover:translate-x-0.5 transition-transform"></i>
                                </a>
                            </div>
                        </div>

                    </article>
                @endforeach
            </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="py-20 text-center bg-white rounded-3xl border border-dashed border-stone-300 p-8 shadow-xs max-w-2xl mx-auto" data-aos="fade-up">
                <div class="w-20 h-20 bg-emerald-50 text-emerald-800 rounded-3xl flex items-center justify-center mx-auto mb-5 text-3xl shadow-inner">
                    <i class="ti ti-article-off"></i>
                </div>
                <h3 class="text-xl sm:text-2xl font-black font-poppins text-stone-900 mb-2">Tidak Ditemukan Berita</h3>
                <p class="text-stone-500 text-sm max-w-md mx-auto mb-6">
                    @if(request('search'))
                        Tidak ada berita yang cocok dengan kata kunci <strong>"{{ request('search') }}"</strong>. Coba gunakan kata kunci lainnya.
                    @else
                        Saat ini belum ada artikel atau berita yang dipublikasikan dalam kategori ini.
                    @endif
                </p>
                <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-[#062d27] text-white text-xs font-bold font-poppins hover:bg-emerald-900 transition-all shadow-sm">
                    <i class="ti ti-arrow-left"></i>
                    <span>Kembali ke Semua Berita</span>
                </a>
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
