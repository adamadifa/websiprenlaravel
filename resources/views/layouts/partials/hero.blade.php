<section class="relative pt-32 pb-16 lg:pb-24 bg-[#062d27] text-white overflow-hidden">
    <!-- Background Image from Pengaturan with Dark Emerald Overlay -->
    @if($pengaturan && !empty($pengaturan->background_login))
        <div class="absolute inset-0 z-0 pointer-events-none">
            <img 
                src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                alt="Pesantren Al Amin Background" 
                class="w-full h-full object-cover object-center opacity-40 scale-105 transform"
            >
            <!-- Rich Gradient Overlays for High Legibility and Atmosphere -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#062d27]/95 via-[#062d27]/80 to-[#062d27]/55"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#062d27] via-transparent to-[#062d27]/70"></div>
        </div>
    @endif

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-10 items-center">
            
            <!-- Left Column: Hero Content & CTA -->
            <div class="lg:col-span-6 flex flex-col items-start text-left" data-aos="fade-right">

                <!-- Main Title with Accent Color -->
                <h1 class="text-3xl sm:text-4xl lg:text-[3.25rem] font-black font-poppins leading-[1.14] tracking-tight mb-6 text-white">
                    Pendidikan Islam Terpadu, <span class="text-[#bef264]">Tafaqquh Fiddien</span> & Berprestasi
                </h1>

                <!-- Subtitle / Description -->
                <p class="text-emerald-100/80 text-sm sm:text-base lg:text-lg leading-relaxed max-w-xl mb-8 font-normal">
                    Membina santri dengan pemahaman dinul Islam yang mendalam, berkarakter akhlakul karimah, mandiri, serta berwawasan ilmu pengetahuan modern.
                </p>

                <!-- CTA Button -->
                <div class="flex flex-wrap items-center gap-4 mb-10 w-full sm:w-auto">
                    <a href="/register" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-extrabold px-7 py-3.5 rounded-xl shadow-lg shadow-lime-500/20 hover:shadow-lime-500/30 hover:-translate-y-0.5 active:translate-y-0 transition-all text-xs sm:text-sm uppercase tracking-wider font-poppins">
                        <span>Pendaftaran Santri Baru</span>
                        <i class="ti ti-arrow-up-right text-base font-bold"></i>
                    </a>
                    <a href="#jenjang-pendidikan" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/15 text-white font-semibold px-6 py-3.5 rounded-xl border border-white/15 transition-all text-sm">
                        <span>Program Pendidikan</span>
                        <i class="ti ti-chevron-down text-base"></i>
                    </a>
                </div>

                <!-- Unit Badges -->
                <div class="w-full pt-6 border-t border-emerald-800/50">
                    <p class="text-[10px] sm:text-[11px] uppercase tracking-[0.2em] text-emerald-300/60 font-bold mb-4">
                        Jenjang Pendidikan
                    </p>
                    <div class="flex flex-wrap items-center gap-5 sm:gap-6 text-emerald-200 text-xs sm:text-sm font-semibold opacity-90">
                        <a href="/tk" class="flex items-center gap-2 hover:text-[#bef264] transition-colors">
                            <i class="ti ti-school text-base text-[#bef264]"></i>
                            <span>TK Calisa</span>
                        </a>
                        <a href="/sdit" class="flex items-center gap-2 hover:text-[#bef264] transition-colors">
                            <i class="ti ti-building-arch text-base text-[#bef264]"></i>
                            <span>SDIT Al Amin</span>
                        </a>
                        <a href="/mts" class="flex items-center gap-2 hover:text-[#bef264] transition-colors">
                            <i class="ti ti-certificate text-base text-[#bef264]"></i>
                            <span>MTs Persis 80</span>
                        </a>
                        <a href="/ma" class="flex items-center gap-2 hover:text-[#bef264] transition-colors">
                            <i class="ti ti-award text-base text-[#bef264]"></i>
                            <span>MA Persis 80</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Dual Vertical Marquee Activity Photo Columns (Left marquee down, Right marquee up) -->
            <div class="lg:col-span-6 w-full" data-aos="fade-left" data-aos-delay="150">
                @php
                    $defaultPhotosLeft = [
                        'https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=600&q=80',
                        'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=600&q=80',
                        'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80',
                        'https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=600&q=80',
                    ];

                    $defaultPhotosRight = [
                        'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=600&q=80',
                        'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=600&q=80',
                        'https://images.unsplash.com/photo-1534644107580-3a4dbd494a95?auto=format&fit=crop&w=600&q=80',
                        'https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=600&q=80',
                    ];

                    $dbHeroPhotos = isset($heroGalleryPhotos) && $heroGalleryPhotos->count() > 0
                        ? $heroGalleryPhotos 
                        : \App\Models\GalleryPhoto::where('is_hero', true)->latest()->get();

                    if ($dbHeroPhotos->isEmpty()) {
                        $dbHeroPhotos = \App\Models\GalleryPhoto::latest()->take(8)->get();
                    }

                    $customPhotoUrls = [];
                    foreach ($dbHeroPhotos as $hp) {
                        if (!empty($hp->path)) {
                            $customPhotoUrls[] = $hp->getAdminImageUrl($hp->path);
                        }
                    }

                    if (count($customPhotoUrls) > 0) {
                        if (count($customPhotoUrls) === 1) {
                            $photosLeft = [$customPhotoUrls[0], $customPhotoUrls[0], $customPhotoUrls[0]];
                            $photosRight = [$customPhotoUrls[0], $customPhotoUrls[0], $customPhotoUrls[0]];
                        } else {
                            $half = (int) ceil(count($customPhotoUrls) / 2);
                            $photosLeft = array_slice($customPhotoUrls, 0, $half);
                            $photosRight = array_slice($customPhotoUrls, $half);

                            while (count($photosLeft) < 3) {
                                $photosLeft = array_merge($photosLeft, $photosLeft);
                            }
                            while (count($photosRight) < 3) {
                                $photosRight = array_merge($photosRight, $photosRight);
                            }
                        }
                    } else {
                        $photosLeft = $defaultPhotosLeft;
                        $photosRight = $defaultPhotosRight;
                    }
                @endphp

                <div class="relative h-[480px] sm:h-[540px] overflow-hidden">
                    
                    <!-- Gradient Masks for Smooth Flow into Hero Background -->
                    <div class="absolute inset-x-0 top-0 h-16 sm:h-20 bg-gradient-to-b from-[#062d27] via-[#062d27]/70 to-transparent z-20 pointer-events-none"></div>
                    <div class="absolute inset-x-0 bottom-0 h-16 sm:h-20 bg-gradient-to-t from-[#062d27] via-[#062d27]/70 to-transparent z-20 pointer-events-none"></div>

                    <div class="grid grid-cols-2 gap-3 sm:gap-4 h-full">
                        
                        <!-- Column 1: Marquee DOWN -->
                        <div class="overflow-hidden relative h-full">
                            <div class="animate-marquee-down space-y-3 sm:space-y-4">
                                @foreach($photosLeft as $img)
                                    <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden bg-emerald-950/60 aspect-[4/5] shadow-lg shrink-0">
                                        <img 
                                            src="{{ $img }}" 
                                            alt="Kegiatan Santri" 
                                            class="w-full h-full object-cover"
                                            loading="lazy"
                                        >
                                    </div>
                                @endforeach

                                @foreach($photosLeft as $img)
                                    <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden bg-emerald-950/60 aspect-[4/5] shadow-lg shrink-0">
                                        <img 
                                            src="{{ $img }}" 
                                            alt="Kegiatan Santri" 
                                            class="w-full h-full object-cover"
                                            loading="lazy"
                                        >
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Column 2: Marquee UP -->
                        <div class="overflow-hidden relative h-full">
                            <div class="animate-marquee-up space-y-3 sm:space-y-4">
                                @foreach($photosRight as $img)
                                    <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden bg-emerald-950/60 aspect-[4/5] shadow-lg shrink-0">
                                        <img 
                                            src="{{ $img }}" 
                                            alt="Kegiatan Santri" 
                                            class="w-full h-full object-cover"
                                            loading="lazy"
                                        >
                                    </div>
                                @endforeach

                                @foreach($photosRight as $img)
                                    <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden bg-emerald-950/60 aspect-[4/5] shadow-lg shrink-0">
                                        <img 
                                            src="{{ $img }}" 
                                            alt="Kegiatan Santri" 
                                            class="w-full h-full object-cover"
                                            loading="lazy"
                                        >
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
