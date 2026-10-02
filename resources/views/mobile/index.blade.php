@extends('layouts.mobile')

@section('title', 'Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis | Pesantren Persis Unggulan')
@section('meta_description', 'Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis adalah Pondok Pesantren Persis terbaik dan unggulan di Kabupaten Ciamis, Jawa Barat. Menyelenggarakan jenjang pendidikan TK, SDIT, MTs, dan MA berkarakter Qur\'ani & berprestasi.')

@section('content')
<!-- Hero Section Mobile (Signature Deep Emerald & Lime Aesthetic) -->
<section class="relative bg-[#062d27] text-white pt-5 pb-12 px-5 overflow-hidden border-b border-emerald-900/60">
    <!-- Ambient Background Texture -->
    @if($pengaturan && !empty($pengaturan->background_login))
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20">
            <img 
                src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                alt="Al Amin" 
                class="w-full h-full object-cover grayscale mix-blend-luminosity scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#062d27] via-[#062d27]/80 to-[#062d27]/60"></div>
        </div>
    @endif

    <!-- Ambient Glow Circles -->
    <div class="absolute -top-24 -right-24 w-60 h-60 bg-[#bef264]/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 -left-20 w-52 h-52 bg-emerald-600/15 rounded-full blur-2xl pointer-events-none"></div>

    <div class="relative z-10" data-aos="fade-down">
        <!-- Top Institution Pill Badge -->
        <div class="inline-flex items-center gap-2 bg-emerald-800/60 border border-emerald-600/40 px-3.5 py-1.5 rounded-full text-[10px] font-bold text-emerald-200 mb-4 font-poppins">
            <span class="w-1.5 h-1.5 rounded-full bg-[#bef264] animate-pulse"></span>
            <span>PPI 80 Al Amin Sindangkasih</span>
        </div>

        <!-- Main Headline -->
        <h1 class="text-2xl xs:text-3xl font-black font-poppins text-white leading-[1.2] tracking-tight mb-3">
            Pendidikan Islam Terpadu, <span class="text-[#bef264]">Tafaqquh Fiddien</span> & Berprestasi
        </h1>

        <!-- Short Subtitle -->
        <p class="text-xs text-emerald-100/80 font-normal leading-relaxed mb-6 font-sans">
            Membina generasi Rabbani yang berakhlak mulia, berilmu mendalam, mandiri, dan berwawasan masa depan.
        </p>

        <!-- Quick Primary Action Buttons -->
        <div class="grid grid-cols-2 gap-2.5 mb-6">
            <a 
                href="/register" 
                class="flex items-center justify-center gap-1.5 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black text-xs py-3 px-3 rounded-xl shadow-lg shadow-lime-500/20 active:scale-95 transition-all font-poppins"
            >
                <i class="ti ti-user-plus text-sm"></i>
                <span>Daftar SPMB</span>
            </a>
            <a 
                href="/siportu" 
                class="flex items-center justify-center gap-1.5 bg-emerald-800/60 hover:bg-emerald-700/60 text-emerald-100 font-bold text-xs py-3 px-3 rounded-xl border border-emerald-600/40 active:scale-95 transition-all font-poppins"
            >
                <i class="ti ti-device-mobile text-sm text-[#bef264]"></i>
                <span>SiportuApp</span>
            </a>
        </div>

        <!-- Hero Photo Horizontal Slider (Desktop Gallery Marquee adapted for Mobile) -->
        @php
            $defaultHeroPhotosMobile = [
                'https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=600&q=80',
                'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=600&q=80',
                'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80',
                'https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=600&q=80',
                'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=600&q=80',
                'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=600&q=80',
            ];

            $heroPhotoList = [];
            if (isset($heroGalleryPhotos) && $heroGalleryPhotos->count() > 0) {
                foreach ($heroGalleryPhotos as $hp) {
                    if (!empty($hp->path)) {
                        $heroPhotoList[] = [
                            'url' => $hp->getAdminImageUrl($hp->path),
                            'caption' => $hp->caption ?: 'Dokumentasi Santri',
                        ];
                    }
                }
            }

            if (empty($heroPhotoList)) {
                if ($pengaturan && !empty($pengaturan->model_2)) {
                    $heroPhotoList[] = [
                        'url' => $pengaturan->getAdminImageUrl($pengaturan->model_2),
                        'caption' => 'Santri PPI 80 Al Amin',
                    ];
                }
                foreach ($defaultHeroPhotosMobile as $dp) {
                    $heroPhotoList[] = [
                        'url' => $dp,
                        'caption' => 'Aktivitas Santri PPI 80',
                    ];
                }
            }
        @endphp

        <div 
            class="mt-2"
            x-data="{
                activeIndex: 0,
                total: {{ count($heroPhotoList) }},
                interval: null,
                isPaused: false,
                init() {
                    this.startAutoPlay();
                },
                startAutoPlay() {
                    if (this.interval) clearInterval(this.interval);
                    this.interval = setInterval(() => {
                        if (!this.isPaused && this.total > 1) {
                            this.next();
                        }
                    }, 3200);
                },
                next() {
                    this.activeIndex = (this.activeIndex + 1) % this.total;
                    this.scrollToSlide();
                },
                prev() {
                    this.activeIndex = (this.activeIndex - 1 + this.total) % this.total;
                    this.scrollToSlide();
                },
                goTo(index) {
                    this.activeIndex = index;
                    this.scrollToSlide();
                },
                scrollToSlide() {
                    const container = this.$refs.sliderTrack;
                    if (!container) return;
                    const card = container.children[this.activeIndex];
                    if (card) {
                        const offsetLeft = card.offsetLeft - (container.offsetWidth - card.offsetWidth) / 2;
                        container.scrollTo({ left: offsetLeft, behavior: 'smooth' });
                    }
                },
                onScroll() {
                    const container = this.$refs.sliderTrack;
                    if (!container) return;
                    const scrollLeft = container.scrollLeft;
                    const cardWidth = container.children[0]?.offsetWidth || 1;
                    const newIndex = Math.round(scrollLeft / (cardWidth + 12));
                    if (newIndex >= 0 && newIndex < this.total) {
                        this.activeIndex = newIndex;
                    }
                }
            }"
            @mouseenter="isPaused = true"
            @mouseleave="isPaused = false"
            @touchstart="isPaused = true"
            @touchend="setTimeout(() => { isPaused = false }, 3500)"
        >
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#bef264] animate-pulse"></span>
                    <span class="text-[10px] font-bold text-white font-poppins">Dokumentasi & Aktivitas Santri</span>
                </div>
                
                <!-- Slide Dots Indicator -->
                <div class="flex items-center gap-1">
                    @foreach($heroPhotoList as $idx => $ph)
                        <button 
                            @click="goTo({{ $idx }})"
                            class="h-1.5 rounded-full transition-all duration-300"
                            :class="activeIndex === {{ $idx }} ? 'w-4 bg-[#bef264]' : 'w-1.5 bg-white/30'"
                            aria-label="Slide {{ $idx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            </div>

            <!-- Horizontal Auto-playing Photo Carousel Track -->
            <div 
                x-ref="sliderTrack"
                @scroll.debounce.100ms="onScroll()"
                class="flex gap-3 overflow-x-auto no-scrollbar snap-x snap-mandatory -mx-5 px-5 pb-1 scroll-smooth"
            >
                @foreach($heroPhotoList as $index => $photo)
                    <div 
                        class="shrink-0 w-[84%] xs:w-[270px] snap-center relative rounded-2xl overflow-hidden border shadow-xl bg-emerald-950/60 aspect-[16/10] group transition-all duration-300"
                        :class="activeIndex === {{ $index }} ? 'border-[#bef264]/70 ring-1 ring-[#bef264]/40' : 'border-emerald-700/40 opacity-90'"
                    >
                        <img 
                            src="{{ $photo['url'] }}" 
                            alt="{{ $photo['caption'] }}" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-[#062d27]/95 via-black/20 to-transparent flex items-end p-3">
                            <div class="flex items-center justify-between w-full text-white">
                                <span class="text-[10px] font-semibold truncate font-poppins">{{ $photo['caption'] }}</span>
                                <span class="text-[9px] bg-black/50 backdrop-blur-md px-2 py-0.5 rounded-full text-emerald-200 border border-white/10 shrink-0 ml-2 font-mono">
                                    {{ $index + 1 }}/{{ count($heroPhotoList) }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Main Mobile Body Content -->
<div class="px-5 pt-6 pb-24 bg-[#faf9f6] min-h-screen space-y-8">

    <!-- 1. JENJANG PENDIDIKAN (4 Units) -->
    @php
        $unitLinksMobile = [
            'U01' => '/tk',
            'U02' => '/diniyah',
            'U03' => '/sdit',
            'U04' => '/mts',
            'U05' => '/ma',
            'U07' => '/unit/asrama',
        ];
        $unitDisplayNamesMobile = [
            'U01' => 'TK Calisa Rabbani',
            'U02' => 'Diniyah Ula',
            'U03' => 'SDIT Al Amin',
            'U04' => 'MTs Persis 80',
            'U05' => 'MA Persis 80',
            'U07' => 'Asrama Santri',
        ];
        $unitShortDescs = [
            'U01' => 'Pendidikan Usia Dini',
            'U03' => 'Dasar Islam Terpadu',
            'U04' => 'Madrasah Tsanawiyah',
            'U05' => 'Madrasah Aliyah Kader',
        ];
        $displayUnitsMobile = $units->filter(fn($u) => $u->kode_unit !== 'U02');
    @endphp

    <div class="space-y-3" data-aos="fade-up">
        <div class="flex items-center justify-between pb-1 font-poppins">
            <div>
                <span class="text-[9px] font-bold uppercase tracking-widest text-emerald-800 block">Jenjang Pendidikan</span>
                <h2 class="text-base font-black text-[#062d27]">Pilihan Lembaga & Madrasah</h2>
            </div>
            <a href="/spmb" class="text-[10px] font-bold text-emerald-800 hover:text-emerald-950 flex items-center gap-0.5">
                <span>Info SPMB</span>
                <i class="ti ti-arrow-right text-[10px]"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 gap-2.5">
            @foreach($displayUnitsMobile as $unit)
                @php
                    $link = $unitLinksMobile[$unit->kode_unit] ?? ('/unit/' . strtolower($unit->kode_unit));
                    $unitTitle = $unitDisplayNamesMobile[$unit->kode_unit] ?? ucwords(strtolower($unit->nama_unit));
                    $sDesc = $unitShortDescs[$unit->kode_unit] ?? 'Kurikulum Terpadu';
                @endphp
                <a 
                    href="{{ $link }}" 
                    class="bg-white p-3 rounded-2xl border border-stone-200/80 shadow-xs hover:border-emerald-500/40 hover:shadow-sm transition-all flex items-center justify-between gap-3 group active:scale-[0.98]"
                >
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-11 h-11 bg-stone-50 rounded-xl border border-stone-100 flex items-center justify-center p-1.5 shrink-0 group-hover:scale-105 transition-transform shadow-2xs">
                            @if($unit->logo)
                                <img src="{{ $unit->getAdminImageUrl($unit->logo) }}" alt="{{ $unitTitle }}" class="w-full h-full object-contain">
                            @else
                                <div class="w-full h-full bg-[#062d27] text-[#bef264] rounded-lg flex items-center justify-center font-bold">
                                    <i class="ti ti-school text-base"></i>
                                </div>
                            @endif
                        </div>

                        <div class="min-w-0">
                            <div class="flex items-center gap-1.5 mb-0.5">
                                <span class="text-[8px] font-extrabold uppercase tracking-wider text-[#062d27] bg-[#bef264]/40 border border-[#bef264]/70 px-1.5 py-0.5 rounded-md font-poppins shrink-0">
                                    {{ $unit->kode_unit }}
                                </span>
                                <h3 class="text-xs sm:text-sm font-bold text-[#062d27] font-poppins leading-tight truncate">
                                    {{ $unitTitle }}
                                </h3>
                            </div>
                            <p class="text-[11px] text-stone-500 leading-normal">
                                {{ $sDesc }}
                            </p>
                        </div>
                    </div>

                    <div class="shrink-0 flex items-center gap-1 text-[9px] font-bold text-emerald-800 bg-emerald-50 border border-emerald-200/80 px-2.5 py-1 rounded-full group-hover:bg-[#062d27] group-hover:text-[#bef264] group-hover:border-[#062d27] transition-all font-poppins shadow-2xs">
                        <span>Kunjungi</span>
                        <i class="ti ti-external-link text-[10px]"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- 2. SIPORTUAPP SPOTLIGHT BANNER MOBILE -->
    <div class="bg-gradient-to-br from-[#062d27] via-[#09352e] to-[#062d27] text-white p-5 rounded-3xl border border-emerald-800/80 shadow-md relative overflow-hidden" data-aos="fade-up">
        <!-- Deco glow -->
        <div class="absolute -top-10 -right-10 w-36 h-36 bg-[#bef264]/15 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex items-start gap-4">
            <!-- Mockup Thumbnail -->
            <div class="w-20 shrink-0 rounded-xl overflow-hidden border border-emerald-500/40 shadow-lg bg-emerald-950">
                <img 
                    src="{{ asset('images/siportu-mockup.png') }}" 
                    alt="SiportuApp" 
                    class="w-full h-auto object-cover"
                >
            </div>

            <!-- Content -->
            <div class="flex-1 min-w-0">
                <div class="inline-flex items-center gap-1.5 bg-[#bef264] text-[#062d27] text-[8px] font-black uppercase px-2 py-0.5 rounded-full mb-1.5 font-poppins">
                    <i class="ti ti-device-mobile text-[9px]"></i>
                    <span>Aplikasi Wali Santri</span>
                </div>

                <h3 class="text-sm font-black text-white font-poppins leading-tight mb-1">
                    SiportuApp PPI 80
                </h3>
                <p class="text-[10px] text-emerald-100/75 leading-relaxed font-sans mb-3">
                    Pantau presensi santri, cek tagihan syahriyah, dan kontrol tabungan digital langsung dari ponsel Anda.
                </p>

                <a 
                    href="/siportu" 
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-[#bef264] hover:text-white transition-colors font-poppins"
                >
                    <span>Buka Info Siportu</span>
                    <i class="ti ti-arrow-right text-xs"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- 3. BERITA TERBARU (Horizontal Snap Scroll) -->
    <div class="space-y-3" data-aos="fade-up">
        <div class="flex items-center justify-between pb-1 font-poppins">
            <div>
                <span class="text-[9px] font-bold uppercase tracking-widest text-emerald-800 block">Warta & Kabar</span>
                <h2 class="text-base font-black text-[#062d27]">Berita Terbaru</h2>
            </div>
            <a href="/berita" class="text-[10px] font-bold text-emerald-800 hover:text-emerald-950 flex items-center gap-0.5">
                <span>Lihat Semua</span>
                <i class="ti ti-arrow-right text-[10px]"></i>
            </a>
        </div>

        <div class="flex gap-4 overflow-x-auto no-scrollbar snap-x snap-mandatory -mx-5 px-5 pb-2">
            @foreach($news as $item)
                <a 
                    href="{{ route('news.show', $item->slug) }}" 
                    class="shrink-0 w-[260px] snap-start bg-white rounded-2xl overflow-hidden border border-stone-200/80 shadow-xs flex flex-col active:scale-[0.98] transition-transform group"
                >
                    <div class="h-36 overflow-hidden relative bg-stone-100">
                        <img 
                            src="{{ $item->getAdminImageUrl($item->image, 'posts') }}" 
                            alt="" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                            onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full bg-stone-100 flex items-center justify-center text-stone-300\'><i class=\'ti ti-photo text-3xl\'></i></div>';"
                        >
                        <div class="absolute top-2.5 left-2.5">
                            <span class="px-2 py-0.5 bg-[#062d27]/90 backdrop-blur-md rounded-md text-[8px] font-black text-[#bef264] uppercase font-poppins">
                                Berita
                            </span>
                        </div>
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h4 class="text-xs font-bold text-[#062d27] font-poppins line-clamp-2 leading-snug mb-2 group-hover:text-emerald-800 transition-colors">
                            {{ $item->title }}
                        </h4>
                        <div class="flex items-center gap-1.5 text-[10px] text-stone-400 font-medium">
                            <i class="ti ti-calendar text-emerald-700"></i>
                            <span>{{ $item->created_at ? $item->created_at->translatedFormat('d M Y') : '-' }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- 4. PROGRAM UNGGULAN (Clean Stacked Cards) -->
    @if(isset($unggulan) && $unggulan->isNotEmpty())
    <div class="space-y-3" data-aos="fade-up">
        <div class="flex items-center justify-between pb-1 font-poppins">
            <div>
                <span class="text-[9px] font-bold uppercase tracking-widest text-emerald-800 block">Kurikulum & Pembinaan</span>
                <h2 class="text-base font-black text-[#062d27]">Program Unggulan</h2>
            </div>
            <span class="text-[10px] font-extrabold text-emerald-900 bg-[#bef264] px-2 py-0.5 rounded shadow-xs">
                Kaderisasi
            </span>
        </div>

        <div class="space-y-3">
            @php
                $mobileIconList = ['ti-book-2', 'ti-language', 'ti-user-check', 'ti-award', 'ti-flask-2'];
            @endphp
            @foreach($unggulan as $index => $item)
                @php
                    $iconName = $mobileIconList[$index % count($mobileIconList)];
                @endphp
                <div class="bg-white p-4 rounded-2xl border border-stone-200/80 shadow-xs flex items-start gap-3.5">
                    <div class="w-11 h-11 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center shrink-0 font-bold text-lg">
                        <i class="ti {{ $iconName }}"></i>
                    </div>
                    <div class="min-w-0 flex-1">
                        <h3 class="text-xs font-bold text-[#062d27] font-poppins mb-1 leading-snug">
                            {{ $item->nama_program }}
                        </h3>
                        <p class="text-[11px] text-stone-500 leading-relaxed line-clamp-2">
                            {{ $item->deskripsi }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- 5. PRESTASI SISWA (Vertical Ticker Marquee) -->
    @if(isset($prestasi) && $prestasi->isNotEmpty())
    <div class="space-y-3" data-aos="fade-up">
        <div class="flex items-center justify-between pb-1 font-poppins">
            <div>
                <span class="text-[9px] font-bold uppercase tracking-widest text-emerald-800 block">Torehan Juara</span>
                <h2 class="text-base font-black text-[#062d27]">Prestasi Santri</h2>
            </div>
            <div class="flex items-center gap-1 text-[10px] font-bold text-amber-700 bg-amber-50 border border-amber-200/60 px-2 py-0.5 rounded-full">
                <i class="ti ti-trophy text-xs text-amber-600"></i>
                <span>{{ $prestasi->count() }} Prestasi</span>
            </div>
        </div>

        <div class="relative h-72 overflow-hidden rounded-2xl bg-stone-100/70 p-3 border border-stone-200/80">
            <!-- Fade Overlay -->
            <div class="absolute inset-x-0 top-0 h-8 bg-gradient-to-b from-[#faf9f6] to-transparent z-10 pointer-events-none"></div>
            <div class="absolute inset-x-0 bottom-0 h-8 bg-gradient-to-t from-[#faf9f6] to-transparent z-10 pointer-events-none"></div>

            <div class="animate-marquee-vertical space-y-2.5">
                @foreach($prestasi as $item)
                <div class="flex items-center gap-3 p-3 bg-white rounded-xl border border-stone-200/60 shadow-xs">
                    <div class="shrink-0 w-10 h-10 rounded-xl overflow-hidden bg-stone-100 border border-stone-200">
                        @if($item->foto)
                            <img src="{{ $item->getAdminImageUrl($item->foto) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-[#062d27] text-[#bef264] font-black text-xs font-poppins">
                                {{ substr($item->nama_siswa, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-xs font-bold text-[#062d27] truncate font-poppins">{{ $item->prestasi }}</h3>
                        <p class="text-[10px] text-stone-400 font-semibold uppercase mt-0.5 truncate">{{ $item->nama_siswa }}</p>
                    </div>
                    <div class="text-amber-500 shrink-0">
                        <i class="ti ti-trophy text-xl"></i>
                    </div>
                </div>
                @endforeach

                {{-- Duplicate for continuous ticker loop --}}
                @foreach($prestasi as $item)
                <div class="flex items-center gap-3 p-3 bg-white rounded-xl border border-stone-200/60 shadow-xs">
                    <div class="shrink-0 w-10 h-10 rounded-xl overflow-hidden bg-stone-100 border border-stone-200">
                        @if($item->foto)
                            <img src="{{ $item->getAdminImageUrl($item->foto) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-[#062d27] text-[#bef264] font-black text-xs font-poppins">
                                {{ substr($item->nama_siswa, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-xs font-bold text-[#062d27] truncate font-poppins">{{ $item->prestasi }}</h3>
                        <p class="text-[10px] text-stone-400 font-semibold uppercase mt-0.5 truncate">{{ $item->nama_siswa }}</p>
                    </div>
                    <div class="text-amber-500 shrink-0">
                        <i class="ti ti-trophy text-xl"></i>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- 6. GURU & TENAGA PENDIDIK (Horizontal Scroll Cards) -->
    @if(isset($gurus) && $gurus->isNotEmpty())
    <div class="space-y-3" data-aos="fade-up">
        <div class="flex items-center justify-between pb-1 font-poppins">
            <div>
                <span class="text-[9px] font-bold uppercase tracking-widest text-emerald-800 block">Pendidik & Asatidz</span>
                <h2 class="text-base font-black text-[#062d27]">Guru & Tenaga Kependidikan</h2>
            </div>
            <a href="/guru-tendik" class="text-[10px] font-bold text-emerald-800 hover:text-emerald-950 flex items-center gap-0.5">
                <span>Semua Guru</span>
                <i class="ti ti-arrow-right text-[10px]"></i>
            </a>
        </div>

        <div class="flex gap-3.5 overflow-x-auto no-scrollbar snap-x snap-mandatory -mx-5 px-5 pb-2">
            @foreach($gurus as $guru)
                @php
                    $jabatan = ($guru->jabatan && $guru->jabatan->nama_jabatan != 'Undifined') 
                        ? $guru->jabatan->nama_jabatan 
                        : 'Tenaga Pendidik';
                    $unitName = $guru->unit->nama_unit ?? ($units->firstWhere('kode_unit', $guru->kode_unit)->nama_unit ?? null);
                @endphp
                <div class="shrink-0 w-48 snap-start">
                    <div class="bg-white p-3 rounded-2xl border border-stone-200/80 shadow-xs flex flex-col h-full group">
                        <!-- Photo -->
                        <div class="relative w-full aspect-[4/4.5] rounded-xl overflow-hidden bg-stone-100 mb-2.5">
                            @if($guru->foto)
                                <img 
                                    src="{{ $guru->getAdminImageUrl($guru->foto) }}" 
                                    alt="{{ $guru->nama_lengkap }}" 
                                    class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300"
                                >
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-[#062d27] to-[#0e4e43] flex flex-col items-center justify-center text-white p-3">
                                    <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-[#bef264]">
                                        <i class="ti ti-user text-2xl"></i>
                                    </div>
                                    <span class="text-[8px] font-bold uppercase tracking-widest text-emerald-200/70 mt-1.5 font-poppins">PPI 80</span>
                                </div>
                            @endif

                            @if($unitName)
                                <div class="absolute top-2 left-2">
                                    <span class="px-2 py-0.5 rounded-full text-[8px] font-extrabold uppercase bg-white/95 backdrop-blur-md text-emerald-900 border border-emerald-100 shadow-xs font-poppins">
                                        {{ $unitName }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Name & Jabatan -->
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="font-bold text-[#062d27] text-xs font-poppins truncate" title="{{ $guru->nama_lengkap }}">
                                    {{ $guru->nama_lengkap }}
                                </h3>
                                <p class="text-[10px] text-emerald-700 font-semibold mt-0.5 truncate">{{ $jabatan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- 7. SEBARAN ALUMNI (Horizontal Card Slider) -->
    @if(isset($alumni) && $alumni->isNotEmpty())
    <div class="bg-white p-5 rounded-3xl border border-stone-200/80 shadow-xs space-y-3" data-aos="fade-up">
        <div class="flex items-center justify-between pb-1 font-poppins">
            <div>
                <span class="text-[9px] font-bold uppercase tracking-widest text-emerald-800 block">Jejak Langkah Santri</span>
                <h2 class="text-sm font-black text-[#062d27]">Sebaran Alumni di Kampus</h2>
            </div>
            <div class="flex items-center gap-1 text-[10px] text-stone-400 font-medium">
                <span>Geser</span>
                <i class="ti ti-arrow-narrow-right text-sm text-emerald-700"></i>
            </div>
        </div>

        <div class="flex gap-3 overflow-x-auto no-scrollbar snap-x snap-mandatory py-1 -mx-1 px-1">
            @foreach($alumni as $item)
                <div class="shrink-0 w-24 h-18 bg-stone-50/90 hover:bg-white border border-stone-200/70 hover:border-emerald-500/40 rounded-2xl p-2 flex flex-col items-center justify-center shadow-2xs transition-all snap-start" title="{{ $item->nama_universitas }}">
                    <img src="{{ $item->getAdminImageUrl($item->logo) }}" alt="{{ $item->nama_universitas }}" class="h-8 w-auto object-contain max-w-[70px]">
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- 8. TESTIMONI WALI & ALUMNI (Horizontal Snap Scroll) -->
    @if(isset($testimonials) && $testimonials->isNotEmpty())
    <div class="space-y-3" data-aos="fade-up">
        <div class="flex items-center justify-between pb-1 font-poppins">
            <div>
                <span class="text-[9px] font-bold uppercase tracking-widest text-emerald-800 block">Kisah & Ulasan</span>
                <h2 class="text-base font-black text-[#062d27]">Apa Kata Wali Santri?</h2>
            </div>
            <i class="ti ti-quote text-emerald-700 text-lg"></i>
        </div>

        <div class="flex gap-4 overflow-x-auto no-scrollbar snap-x snap-mandatory -mx-5 px-5 pb-2">
            @foreach($testimonials as $testi)
            <div class="shrink-0 w-[88%] snap-center">
                <div class="bg-white p-5 rounded-2xl border border-stone-200/80 shadow-xs flex flex-col justify-between h-full">
                    <p class="text-stone-600 italic text-xs leading-relaxed mb-4">
                        "{{ $testi->testimoni }}"
                    </p>
                    <div class="flex items-center gap-3 pt-3 border-t border-stone-100">
                        <div class="shrink-0">
                            @if($testi->foto)
                                <img src="{{ $testi->getAdminImageUrl($testi->foto) }}" alt="{{ $testi->nama }}" class="w-9 h-9 rounded-full object-cover border border-emerald-100">
                            @else
                                <div class="w-9 h-9 rounded-full bg-[#062d27] flex items-center justify-center text-[#bef264] font-bold text-xs font-poppins">
                                    {{ collect(explode(' ', $testi->nama))->map(fn($n) => substr($n, 0, 1))->take(2)->join('') }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <h4 class="font-bold text-[#062d27] text-xs font-poppins">{{ $testi->nama }}</h4>
                            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-wider">Wali Santri / Alumni</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- 9. CTA SPMB BANNER MOBILE -->
    <div class="bg-gradient-to-br from-[#062d27] to-[#0a4037] text-white p-6 rounded-3xl border border-emerald-800 shadow-xl text-center space-y-3" data-aos="zoom-in">
        <div class="inline-flex items-center gap-1.5 bg-[#bef264]/20 border border-[#bef264]/40 text-[#bef264] px-3 py-1 rounded-full text-[9px] font-bold font-poppins">
            <i class="ti ti-sparkles text-xs"></i>
            <span>Penerimaan Santri Baru</span>
        </div>
        <h3 class="text-base font-black text-white font-poppins leading-tight">
            Daftarkan Putra-Putri Anda di Pesantren Al Amin
        </h3>
        <p class="text-xs text-emerald-100/75 leading-relaxed font-sans">
            Wujudkan cita-cita ananda menjadi generasi berkarakter Qur'ani, berakhlak mulia, dan berwawasan luas.
        </p>
        <div class="pt-2 flex flex-col gap-2">
            <a 
                href="/register" 
                class="w-full inline-flex items-center justify-center gap-2 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black text-xs py-3 rounded-xl shadow-md transition-all font-poppins"
            >
                <i class="ti ti-user-plus text-sm"></i>
                <span>Daftar Santri Baru Sekarang</span>
            </a>
            <a 
                href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" 
                target="_blank"
                class="w-full inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/15 text-white font-bold text-xs py-2.5 rounded-xl border border-white/15 transition-all font-poppins"
            >
                <i class="ti ti-brand-whatsapp text-sm text-[#bef264]"></i>
                <span>Konsultasi SPMB via WhatsApp</span>
            </a>
        </div>
    </div>

</div>

<style>
    @keyframes marquee-vertical {
        0% { transform: translateY(0); }
        100% { transform: translateY(-50%); }
    }
    .animate-marquee-vertical {
        animation: marquee-vertical 24s linear infinite;
    }
    .animate-marquee-vertical:hover {
        animation-play-state: paused;
    }
</style>
@endsection
