@extends('layouts.ma')

@section('title', 'MA Al-Amin Sindangkasih - Madrasah Aliyah Unggul & Pesantren')
@section('meta_description', 'Official Landing Page MA Al-Amin Sindangkasih - Madrasah Aliyah modern berbasis pesantren, tafaqquh fiddin, tahfidz Al-Qur\'an, sains riset teknologi, dan kurikulum nasional.')

@section('content')

    <!-- ==============================================================
         1. HERO SECTION (Identik dengan Gambar Acuan Antixor)
         - Kiri: Headline besar, Subtitle, 2 CTA Button, 3 Feature Badges
         - Kanan: Foto Model Santri dengan Badge Bulat Melayang "100% Terakreditasi"
         - Background: Soft emerald tone dengan nuansa hijau sidebar siprenpas elegan
         ============================================================== -->
    <section id="hero" class="relative pt-6 pb-12 sm:pt-16 sm:pb-24 lg:pt-20 lg:pb-24 min-h-[580px] lg:min-h-[660px] lg:flex lg:items-center bg-[#fbfdfc] overflow-hidden">
        
        <!-- Full Landscape Background Image for Desktop (lg and up) -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden hidden lg:block">
            <img 
                src="{{ !empty($setting->hero_background_image) ? $unit->getAdminImageUrl($setting->hero_background_image) : asset('images/mts/bg-bright.jpg') }}" 
                alt="Background MA" 
                class="w-full h-full object-cover object-center opacity-85"
            >
            <div class="absolute inset-0 z-0" style="background: linear-gradient(to right, #fbfdfc 0%, #fbfdfc 48%, rgba(251, 253, 252, 0.15) 100%);"></div>
        </div>

        <!-- Mobile Background Image -->
        <div class="absolute top-0 left-0 right-0 h-[380px] sm:h-[480px] lg:hidden pointer-events-none overflow-hidden z-0">
            <img 
                src="{{ !empty($setting->hero_background_image) ? $unit->getAdminImageUrl($setting->hero_background_image) : asset('images/mts/bg-bright.jpg') }}" 
                alt="Background MA" 
                class="w-full h-full object-cover object-center opacity-[0.10]"
            >
            <div class="absolute inset-0 bg-gradient-to-b from-[#fbfdfc]/60 via-transparent to-[#fbfdfc]"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Left Text Column (lg:col-span-7) -->
                <div class="lg:col-span-7 text-center lg:text-left order-2 lg:order-1" data-aos="fade-right">
                    
                    @if(!empty($setting->hero_tag))
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#e5f0ec] text-[#285a48] font-bold text-xs uppercase tracking-wider mb-4 border border-[#cce2d9] shadow-sm">
                            <i class="ti ti-school text-[#285a48] text-sm"></i>
                            <span>{{ $setting->hero_tag }}</span>
                        </div>
                    @else
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#e5f0ec] text-[#285a48] font-bold text-xs uppercase tracking-wider mb-4 border border-[#cce2d9] shadow-sm">
                            <i class="ti ti-school text-[#285a48] text-sm"></i>
                            <span>MA AL-AMIN SINDANGKASIH</span>
                        </div>
                    @endif

                    <!-- Main Headline (Font Heading Rounded Style ala EduLearn) -->
                    <h1 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-extrabold text-[#1f4537] leading-[1.2] lg:leading-[1.12] mb-4 sm:mb-5 tracking-tight">
                        {{ $setting->hero_title_prefix ?? 'Pendidikan Islam Unggul' }} <br class="hidden sm:inline">
                        <span class="text-[#285a48]">{{ $setting->hero_title_highlight ?? 'Mencetak Ulama' }}</span>
                        <span class="text-[#4a957f]">dan Cendekia</span>
                    </h1>

                    <!-- Subtitle / Tagline -->
                    <p class="font-normal text-stone-600 text-sm sm:text-base lg:text-lg leading-relaxed mb-6 sm:mb-8 max-w-xl mx-auto lg:mx-0">
                        {{ $setting->hero_description ?? 'Membentuk santri Madrasah Aliyah berwawasan global, tafaqquh fiddin, tahfidz Al-Qur\'an, sains riset, serta siap bersaing menembus perguruan tinggi terbaik nasional & internasional.' }}
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-center lg:justify-start gap-3 sm:gap-4 mb-8 sm:mb-12 font-inter">
                        <a href="/register" class="btn-primary-green px-7 py-3.5 rounded-xl font-bold text-sm shadow-md hover:shadow-lg transition-all text-center flex items-center justify-center gap-2" style="background-color: #285a48 !important; color: #ffffff !important;">
                            <span>Daftar Santri Baru</span>
                            <i class="ti ti-arrow-right"></i>
                        </a>

                        <a href="#prakata" class="px-5 py-3.5 rounded-xl bg-white hover:bg-[#e5f0ec]/50 text-[#285a48] border border-stone-300 font-semibold text-sm shadow-sm transition-all flex items-center justify-center gap-2.5">
                            <div class="w-6 h-6 rounded-full bg-[#e5f0ec] text-[#285a48] flex items-center justify-center text-xs">
                                <i class="ti ti-player-play-filled"></i>
                            </div>
                            <span>Profil Madrasah</span>
                        </a>
                    </div>

                    <!-- 3 Feature Badges on Bottom (Dinamis dari Pengaturan Hero Section) -->
                    @php
                        $defaultHeroFeatMa = [
                            ['icon' => 'ti-book', 'title' => 'Kurikulum Terpadu', 'desc' => 'Kemenag & Pesantren'],
                            ['icon' => 'ti-certificate', 'title' => 'Pendidik Berdedikasi', 'desc' => 'Hufadz & Akademisi'],
                            ['icon' => 'ti-shield-check', 'title' => 'Lingkungan Kondusif', 'desc' => 'Boarding & Full Day'],
                        ];
                        $heroFeatMa = (!empty($setting->hero_features) && count($setting->hero_features) > 0)
                            ? $setting->hero_features
                            : $defaultHeroFeatMa;
                    @endphp
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 pt-5 sm:pt-6 border-t border-stone-200 text-left">
                        @foreach($heroFeatMa as $hfIdx => $hfItem)
                            @php
                                $hIcon = $hfItem['icon'] ?? 'ti-book';
                                $hIconClass = str_starts_with($hIcon, 'ti ') ? $hIcon : (str_starts_with($hIcon, 'ti-') ? 'ti ' . $hIcon : 'ti ti-' . $hIcon);
                            @endphp
                            <div class="flex items-center gap-3 p-3.5 rounded-2xl bg-white sm:bg-transparent border border-stone-200/80 sm:border-0 shadow-sm sm:shadow-none">
                                <div class="w-11 h-11 rounded-xl bg-[#e5f0ec] text-[#285a48] flex items-center justify-center text-xl shrink-0" style="background-color: #e5f0ec !important; color: #285a48 !important;">
                                    <i class="{{ $hIconClass }}"></i>
                                </div>
                                <div>
                                    <h4 class="font-heading font-bold text-sm text-[#1f4537] leading-snug">{{ $hfItem['title'] ?? '' }}</h4>
                                    <span class="text-xs text-stone-500">{{ $hfItem['desc'] ?? '' }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <!-- Right Visual Column (Mobile Only: lg:hidden) -->
                <div class="lg:hidden relative flex justify-center items-center order-1" data-aos="fade-down">
                    <div class="relative w-full max-w-[280px] sm:max-w-[340px] flex justify-center items-end pt-4">
                        
                        <!-- Soft Ambient Radial Glow behind model -->
                        <div class="absolute inset-0 bg-[#e5f0ec]/70 rounded-full blur-2xl transform scale-90 -z-10"></div>

                        <!-- Mobile Floating Badge -->
                        <div class="absolute top-6 sm:top-8 -right-3 sm:-right-6 bg-white/95 backdrop-blur-md w-20 h-20 sm:w-22 sm:h-22 rounded-full shadow-xl border-2 border-[#cce2d9] flex flex-col items-center justify-center text-center p-2 z-20" data-aos="fade-down" data-aos-delay="200">
                            <span class="font-heading font-black text-base sm:text-lg text-[#1f4537] leading-none">{{ $setting->hero_badge_text ?? '100%' }}</span>
                            <span class="font-bold text-[8px] sm:text-[9px] text-stone-500 uppercase leading-tight mt-1">{{ $setting->hero_badge_subtext ?? 'Akreditasi Unggul' }}</span>
                        </div>

                        <!-- Mobile Model Photo -->
                        <img 
                            src="{{ !empty($setting->hero_model_image) ? $unit->getAdminImageUrl($setting->hero_model_image) : asset('images/mts/santri-model.png') }}" 
                            alt="Santri MA Al-Amin" 
                            class="relative z-10 w-full h-auto max-h-[350px] sm:max-h-[440px] object-contain object-bottom drop-shadow-[0_15px_30px_rgba(31,69,55,0.18)]"
                        >
                    </div>
                </div>

            </div>
        </div>

        <!-- DESKTOP MODEL SANTRI + FLOATING BADGE -->
        <div class="hidden lg:flex absolute bottom-0 right-0 lg:right-[2%] xl:right-[6%] w-[42%] xl:w-[38%] max-w-[580px] z-10 pointer-events-none justify-end" data-aos="fade-left" data-aos-duration="1000">
            <img 
                src="{{ !empty($setting->hero_model_image) ? $unit->getAdminImageUrl($setting->hero_model_image) : asset('images/mts/santri-model.png') }}" 
                alt="Santri MA Al-Amin" 
                class="w-auto h-auto max-h-[75vh] xl:max-h-[80vh] object-contain object-bottom drop-shadow-[0_20px_40px_rgba(31,69,55,0.20)]"
            >
        </div>

        <!-- Floating Badge Melayang Bulat di Desktop -->
        <div class="hidden lg:flex absolute top-20 right-[39%] xl:right-[36%] z-20" data-aos="fade-down" data-aos-delay="200">
            <div class="bg-white/95 backdrop-blur-md w-24 h-24 xl:w-28 xl:h-28 rounded-full shadow-2xl border-2 border-[#cce2d9] flex flex-col items-center justify-center text-center p-2.5">
                <span class="font-heading font-black text-xl xl:text-2xl text-[#1f4537] leading-none">{{ $setting->hero_badge_text ?? '100%' }}</span>
                <span class="font-bold text-[9px] xl:text-[10px] text-stone-500 uppercase leading-tight mt-1">{{ $setting->hero_badge_subtext ?? 'Akreditasi Unggul' }}</span>
            </div>
        </div>

    </section>

    <!-- ==============================================================
         STATISTIK UTAMA (Under Hero Section ala EduLearn)
         4 Metric Cards Interaktif dengan Angka Tebal & Label Jelas
         ============================================================== -->
    <section class="relative z-20 -mt-6 sm:-mt-8 lg:-mt-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl shadow-[#1f4537]/5 border border-stone-200/80 p-5 sm:p-7 lg:p-8" data-aos="fade-up" data-aos-offset="0">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 divide-y-2 sm:divide-y-0 sm:divide-x-2 divide-stone-100">
                
                <!-- Stat 1 -->
                <div class="flex items-center gap-3.5 sm:gap-4 pt-2 sm:pt-0 sm:px-3">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-[#e5f0ec] text-[#285a48] flex items-center justify-center text-2xl sm:text-3xl shrink-0 shadow-sm">
                        <i class="ti ti-calendar-time"></i>
                    </div>
                    <div>
                        <div class="font-heading font-black text-2xl sm:text-3xl lg:text-4xl text-[#1f4537] leading-none tracking-tight">
                            {{ $setting->stat_1_val ?? '18+' }}
                        </div>
                        <span class="text-xs sm:text-sm font-semibold text-stone-500 mt-1 block leading-tight">
                            {{ $setting->stat_1_label ?? 'Tahun Berkhidmat' }}
                        </span>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="flex items-center gap-3.5 sm:gap-4 pt-2 sm:pt-0 sm:px-3">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center text-2xl sm:text-3xl shrink-0 shadow-sm">
                        <i class="ti ti-school"></i>
                    </div>
                    <div>
                        <div class="font-heading font-black text-2xl sm:text-3xl lg:text-4xl text-[#1f4537] leading-none tracking-tight">
                            {{ $setting->stat_2_val ?? '100%' }}
                        </div>
                        <span class="text-xs sm:text-sm font-semibold text-stone-500 mt-1 block leading-tight">
                            {{ $setting->stat_2_label ?? 'Tembus PTN & LN' }}
                        </span>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="flex items-center gap-3.5 sm:gap-4 pt-4 sm:pt-0 sm:px-3">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-[#e5f0ec] text-[#285a48] flex items-center justify-center text-2xl sm:text-3xl shrink-0 shadow-sm">
                        <i class="ti ti-book-2"></i>
                    </div>
                    <div>
                        <div class="font-heading font-black text-2xl sm:text-3xl lg:text-4xl text-[#1f4537] leading-none tracking-tight">
                            {{ $setting->stat_3_val ?? '30 Juz' }}
                        </div>
                        <span class="text-xs sm:text-sm font-semibold text-stone-500 mt-1 block leading-tight">
                            {{ $setting->stat_3_label ?? 'Tahfidz Al-Qur\'an' }}
                        </span>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="flex items-center gap-3.5 sm:gap-4 pt-4 sm:pt-0 sm:px-3">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl sm:text-3xl shrink-0 shadow-sm">
                        <i class="ti ti-users"></i>
                    </div>
                    <div>
                        <div class="font-heading font-black text-2xl sm:text-3xl lg:text-4xl text-[#1f4537] leading-none tracking-tight">
                            {{ $setting->stat_4_val ?? '42+' }}
                        </div>
                        <span class="text-xs sm:text-sm font-semibold text-stone-500 mt-1 block leading-tight">
                            {{ $setting->stat_4_label ?? 'Asatidz Berpengalaman' }}
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==============================================================
         PRAKATA MUDIR — Clean editorial layout
         ============================================================== -->
    @if(!empty($setting->prakata_content))
    <section id="prakata" class="py-14 sm:py-16 lg:py-20 bg-[#fbfdfc] border-b border-stone-200/60 relative overflow-hidden">
        
        <!-- Subtle Ambient Background Light -->
        <div class="absolute top-1/2 left-0 w-72 h-72 bg-emerald-100/30 rounded-full blur-3xl pointer-events-none -z-0"></div>
        <div class="absolute bottom-0 right-0 w-80 h-80 bg-stone-200/20 rounded-full blur-3xl pointer-events-none -z-0"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">
                
                <!-- Photo & Mudir Profile Card -->
                <div class="lg:col-span-4 flex justify-center" data-aos="fade-right">
                    <div class="relative w-full max-w-[280px] sm:max-w-xs lg:max-w-none">
                        
                        <!-- Glow behind photo frame -->
                        <div class="absolute inset-0 rounded-3xl bg-[#cce2d9]/60 blur-xl transform scale-95 pointer-events-none"></div>

                        <div class="relative z-10 rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl bg-stone-100 border-4 border-white">
                            <img 
                                src="{{ !empty($setting->prakata_custom_foto) ? $unit->getAdminImageUrl($setting->prakata_custom_foto) : asset('images/mts/santri-model.png') }}" 
                                alt="{{ $setting->prakata_custom_nama ?? 'Mudir MA Al-Amin' }}" 
                                class="w-full aspect-[3/4] object-cover object-top"
                            >
                            
                            <!-- Bottom floating name plate -->
                            <div class="absolute bottom-3 left-3 right-3 sm:bottom-4 sm:left-4 sm:right-auto">
                                <div class="bg-[#1f4537]/95 backdrop-blur-md rounded-xl px-4 py-2.5 shadow-lg border border-[#346d59]">
                                    <p class="font-heading font-bold text-sm text-white leading-tight">{{ $setting->prakata_custom_nama ?? 'Mudir MA Al-Amin' }}</p>
                                    <p class="text-xs text-amber-300 mt-0.5 uppercase tracking-wider font-semibold">{{ $setting->prakata_custom_jabatan ?? 'Mudir MA Al-Amin' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Text & Message Content -->
                <div class="lg:col-span-8 text-left" data-aos="fade-left">
                    
                    <!-- Tag / Badge -->
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#e5f0ec] text-[#285a48] font-bold text-xs uppercase tracking-widest mb-3.5 border border-[#cce2d9]">
                        <i class="ti ti-message-2 text-[#285a48] text-sm"></i>
                        <span>{{ $setting->prakata_tag ?? 'Prakata Mudir' }}</span>
                    </div>

                    <!-- Main Title -->
                    <h2 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1f4537] mb-4 sm:mb-6 leading-snug lg:leading-tight">
                        {{ $setting->prakata_title ?? 'Membentuk Generasi Pemimpin yang Berilmu, Beradab, dan Siap Berkontribusi' }}
                    </h2>

                    <!-- Quote Box with Emerald/Amber Accent -->
                    <div class="relative bg-[#f4f8f6] border-l-4 border-[#285a48] rounded-r-2xl p-4 sm:p-5 mb-5 sm:mb-6 shadow-sm">
                        <i class="ti ti-quote text-2xl sm:text-3xl text-[#71b19d] absolute top-2 right-3 pointer-events-none opacity-60"></i>
                        <p class="font-medium text-sm sm:text-base text-stone-700 italic leading-relaxed relative z-10 pr-6">
                            "{{ $setting->prakata_quote ?? 'Madrasah Aliyah Al-Amin adalah wadah pengkaderan generasi muda Islam untuk menjadi intelektual berakhlak mulia yang bermanfaat bagi umat.' }}"
                        </p>
                    </div>

                    @if(!empty($setting->prakata_content))
                        <div class="text-sm sm:text-base text-stone-600 leading-relaxed mb-6 space-y-3.5">
                            {!! nl2br(e($setting->prakata_content)) !!}
                        </div>
                    @endif

                    <!-- Signature & Avatar Footer -->
                    <div class="flex items-center gap-3.5 pt-4 border-t border-stone-200/80">
                        <div class="w-11 h-11 rounded-full bg-[#285a48] text-amber-400 flex items-center justify-center font-heading font-extrabold text-sm shrink-0 shadow-sm">
                            {{ substr($setting->prakata_custom_nama ?? 'M', 0, 1) }}
                        </div>
                        <div>
                            <p class="font-heading font-bold text-sm text-[#1f4537] leading-snug">{{ $setting->prakata_custom_nama ?? 'Mudir MA Al-Amin' }}</p>
                            <p class="text-xs text-stone-500 font-medium">{{ $setting->prakata_custom_jabatan ?? 'Mudir MA Al-Amin Sindangkasih' }}</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    @endif

    <!-- ==========================================
         3. FASILITAS & SARANA BELAJAR (Mobile Slider & Desktop Grid)
         ========================================== -->
    @php
        $fasilitasItems = (!empty($setting->custom_fasilitas) && count($setting->custom_fasilitas) > 0)
            ? $setting->custom_fasilitas
            : [
                [
                    'tag' => 'RUANG KELAS',
                    'name' => 'Ruang Belajar Digital & Smart Class',
                    'desc' => 'Ruang belajar ber-AC representatif dilengkapi proyektor smart display, wifi terdedikasi, dan loker santri.',
                    'image' => 'images/mts/bg-bright.jpg'
                ],
                [
                    'tag' => 'ASRAMA SANTRI',
                    'name' => 'Gedung Asrama Putra & Putri',
                    'desc' => 'Komplek asrama terpisah yang nyaman, teratur, serta dibimbing langsung musyrif 24 jam penuh.',
                    'image' => 'images/mts/section4-santri.jpg'
                ],
                [
                    'tag' => 'PUSAT IBADAH',
                    'name' => 'Masjid Kampus & Halaqah Quran',
                    'desc' => 'Pusat shalat fardhu berjamaah, pembinaan tahfidz Al-Qur\'an, kajian kitab kuning dan hadits mu\'tabarah.',
                    'image' => 'images/mts/santri-model.png'
                ],
                [
                    'tag' => 'SAINS & RISET',
                    'name' => 'Laboratorium Komputer & IPA Terpadu',
                    'desc' => 'Fasilitas praktikum kimia, fisika, biologi, serta lab komputer modern untuk riset sains dan simulasi UTBK.',
                    'image' => 'images/mts/bg-bright.jpg'
                ]
            ];
    @endphp
    <section id="fasilitas" class="py-16 sm:py-20 bg-white relative overflow-hidden" x-data="{ activeFacSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 md:mb-12" data-aos="fade-up">
                <div>
                    <span class="font-bold text-xs sm:text-sm text-[#285a48] uppercase tracking-wider block mb-2">
                        {{ $setting->fasilitas_tag ?? 'SARANA & PRASARANA' }}
                    </span>
                    <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-[#1f4537] leading-tight max-w-xl">
                        {{ $setting->fasilitas_title ?? 'Fasilitas Belajar Representatif & Modern' }}
                    </h2>
                </div>
                <div class="max-w-md text-left md:text-right">
                    <p class="font-medium text-xs sm:text-sm text-stone-500">
                        {{ $setting->fasilitas_description ?? 'Didukung ekosistem kampus pesantren yang asri, tenang, aman, serta sarana modern untuk mengoptimalkan potensi akademik santri.' }}
                    </p>
                </div>
            </div>

            <!-- Mobile Swipe Hint -->
            <div class="flex items-center justify-center gap-1.5 text-[11px] font-semibold text-[#285a48] bg-[#f4f8f6] border border-[#cce2d9] py-1.5 px-3.5 rounded-full w-fit mx-auto mb-4 md:hidden">
                <i class="ti ti-hand-swipe text-sm animate-pulse text-[#285a48]"></i>
                <span>Geser untuk melihat fasilitas</span>
            </div>

            <!-- Fasilitas: Mobile Slider & Desktop Grid -->
            <div 
                id="fasilitasSlider"
                class="flex md:grid md:grid-cols-2 lg:grid-cols-4 gap-6 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-6 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar"
                @scroll="activeFacSlide = Math.round($el.scrollLeft / ($el.offsetWidth * 0.8))"
            >
                @foreach($fasilitasItems as $fIdx => $f)
                    @php
                        $fName = $f['name'] ?? $f['title'] ?? 'Fasilitas Unggulan';
                        $fDesc = $f['desc'] ?? $f['deskripsi'] ?? '';
                        $fImg = !empty($f['image']) ? (str_starts_with($f['image'], 'http') ? $f['image'] : (file_exists(public_path($f['image'])) ? asset($f['image']) : $unit->getAdminImageUrl($f['image']))) : 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=600&auto=format&fit=crop';
                    @endphp
                    <div class="min-w-[82%] sm:min-w-[70%] md:min-w-0 snap-center bg-white rounded-3xl border border-stone-200/80 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ ($fIdx + 1) * 80 }}">
                        <div class="h-44 sm:h-48 overflow-hidden relative bg-stone-100">
                            <img 
                                src="{{ $fImg }}" 
                                alt="{{ $fName }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            >
                            <span class="absolute top-3 left-3 bg-[#1f4537]/90 backdrop-blur-md text-amber-400 font-bold text-[9px] px-2.5 py-1 rounded-full uppercase tracking-wider shadow-sm">
                                {{ $f['tag'] ?? 'FASILITAS' }}
                            </span>
                        </div>
                        <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="font-heading font-bold text-base sm:text-lg text-[#1f4537] mb-1.5 group-hover:text-[#285a48] transition-colors">
                                    {{ $fName }}
                                </h3>
                                <p class="text-xs sm:text-sm text-stone-500 leading-relaxed">
                                    {{ $fDesc }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Mobile Dots Indicator -->
            @if(count($fasilitasItems) > 1)
                <div class="flex items-center justify-center gap-2 mt-4 md:hidden">
                    @foreach($fasilitasItems as $fDotIdx => $fDotItem)
                        <button 
                            @click="document.getElementById('fasilitasSlider').scrollTo({ left: document.getElementById('fasilitasSlider').offsetWidth * 0.8 * {{ $fDotIdx }}, behavior: 'smooth' })" 
                            :class="activeFacSlide === {{ $fDotIdx }} ? 'w-6 bg-[#285a48]' : 'w-2 bg-stone-300'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Fasilitas {{ $fDotIdx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

    <!-- ==============================================================
         2. SECTION 2: OUR SERVICES (Container Hijau Sidebar Siprenpas #064e3b)
         - Sisi Kiri: Judul "Our Services", Deskripsi, Tombol "Lihat Biaya"
         - Sisi Kanan: List Vertikal di Mobile, 2x3 Grid Putih Bersih di Desktop
         ============================================================== -->
    <section id="layanan" class="py-12 sm:py-16 bg-[#fbfdfc]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            
            <!-- Large Container Card in Soft Pine Green Tone (#285a48 to #1f4537) -->
            <div class="rounded-3xl sm:rounded-[2.5rem] bg-[#285a48] text-white p-6 sm:p-12 lg:p-14 shadow-2xl relative" style="background: linear-gradient(135deg, #285a48 0%, #1f4537 100%) !important; color: #ffffff !important;" data-aos="fade-up">
                
                <!-- Subtle Background Texture -->
                <div class="absolute inset-0 overflow-hidden rounded-3xl sm:rounded-[2.5rem] pointer-events-none">
                    <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-white/5"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center relative z-10">
                    
                    <!-- Left Sidebar (lg:col-span-4): Title, Description, Button -->
                    <div class="lg:col-span-4 text-center lg:text-left flex flex-col justify-between h-full">
                        <div>
                            <span class="text-amber-400 font-bold text-xs uppercase tracking-wider block mb-2">
                                {{ $setting->program_tag ?? 'PROGRAM UNGGULAN' }}
                            </span>
                            <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-white leading-tight mb-3 sm:mb-4">
                                {{ $setting->program_title ?? 'Program & Layanan Pendidikan' }}
                            </h2>
                            <p class="text-[#cce2d9] text-xs sm:text-sm leading-relaxed mb-6 sm:mb-8">
                                {{ $setting->program_description ?? 'Dari kurikulum madrasah terpadu, tahfidz Al-Qur\'an, hingga bimbingan tembus PTN & beasiswa luar negeri — kami membina santri secara holistik.' }}
                            </p>
                        </div>

                        <!-- Yellow Action Button -->
                        <div class="mb-6 lg:mb-0">
                            <a href="#biaya" class="btn-accent-gold inline-flex items-center justify-center px-6 py-3.5 rounded-xl font-bold text-xs sm:text-sm shadow-md transition-all w-full sm:w-auto" style="background-color: #f59e0b !important; color: #183329 !important;">
                                <span>Lihat Seluruh Biaya</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Grid (lg:col-span-8): Vertical list on mobile, 2x3 Grid on Desktop -->
                    <div class="lg:col-span-8">
                        @php
                            if (!empty($setting->custom_programs) && count($setting->custom_programs) > 0) {
                                $programs = $setting->custom_programs;
                                $useModel = false;
                            } else {
                                $programs = $unggulan;
                                $useModel = true;
                            }
                        @endphp

                        <!-- MOBILE VIEW (List Cards Vertikal Sesuai Acuan Screenshot) -->
                        <div class="flex flex-col gap-3 md:hidden">
                            @forelse($programs as $idx => $s)
                                @php
                                    if ($useModel) {
                                        $pTitle = $s->nama_program ?? '';
                                        $pDesc  = $s->deskripsi ?? '';
                                        $pIcon  = null;
                                    } else {
                                        $pTitle = $s['title'] ?? $s['nama_program'] ?? '';
                                        $pDesc  = $s['desc'] ?? $s['deskripsi'] ?? '';
                                        $pIcon  = $s['icon'] ?? null;
                                    }
                                    if (!empty($pIcon)) {
                                        $iconClass = str_starts_with($pIcon, 'ti ') ? $pIcon : (str_starts_with($pIcon, 'ti-') ? 'ti ' . $pIcon : 'ti ti-' . $pIcon);
                                    } else {
                                        $icons = ['ti ti-book-2','ti ti-certificate','ti ti-shield-check','ti ti-language','ti ti-lamp','ti ti-device-laptop'];
                                        $iconClass = $icons[$loop->index % count($icons)];
                                    }
                                @endphp
                                <div class="bg-white rounded-2xl p-4 sm:p-5 flex items-center gap-4 shadow-sm border border-white/10 text-stone-800 transition-all">
                                    <!-- Icon Box Rounded Light -->
                                    <div class="w-12 h-12 rounded-xl bg-[#e5f0ec] text-[#285a48] flex items-center justify-center text-2xl shrink-0">
                                        <i class="{{ $iconClass }}"></i>
                                    </div>
                                    <!-- Text Content -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-heading font-bold text-sm sm:text-base text-[#1f4537] leading-snug truncate">
                                            {{ $pTitle }}
                                        </h3>
                                        <p class="text-xs text-stone-500 mt-0.5 truncate">
                                            {{ $pDesc }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-emerald-200 text-sm py-4">Program belum tersedia.</div>
                            @endforelse
                        </div>

                        <!-- DESKTOP VIEW (2x3 Grid Putih Bersih) -->
                        <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse($programs as $idx => $s)
                                @php
                                    if ($useModel) {
                                        $pTitle = $s->nama_program ?? '';
                                        $pDesc  = $s->deskripsi ?? '';
                                        $pIcon  = null;
                                    } else {
                                        $pTitle = $s['title'] ?? $s['nama_program'] ?? '';
                                        $pDesc  = $s['desc'] ?? $s['deskripsi'] ?? '';
                                        $pIcon  = $s['icon'] ?? null;
                                    }
                                    if (!empty($pIcon)) {
                                        $iconClass = str_starts_with($pIcon, 'ti ') ? $pIcon : (str_starts_with($pIcon, 'ti-') ? 'ti ' . $pIcon : 'ti ti-' . $pIcon);
                                    } else {
                                        $icons = ['ti ti-book-2','ti ti-language','ti ti-lamp','ti ti-device-laptop','ti ti-certificate','ti ti-shield-check'];
                                        $iconClass = $icons[$loop->index % count($icons)];
                                    }
                                @endphp
                                <div class="bg-white rounded-3xl p-6 text-stone-800 shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group border border-stone-100 min-h-[220px]">
                                    <div>
                                        <div class="w-12 h-12 rounded-2xl bg-[#e5f0ec] text-[#285a48] flex items-center justify-center text-2xl mb-4 group-hover:scale-110 group-hover:bg-[#285a48] group-hover:text-amber-400 transition-all shadow-sm">
                                            <i class="{{ $iconClass }}"></i>
                                        </div>
                                        <h3 class="font-heading font-bold text-base text-[#1f4537] mb-2 leading-snug group-hover:text-[#285a48] transition-colors">{{ $pTitle }}</h3>
                                        <p class="text-xs text-stone-500 leading-relaxed line-clamp-3">{{ $pDesc }}</p>
                                    </div>
                                    <div class="pt-3 mt-3 border-t border-stone-100 flex items-center justify-between text-[11px] font-bold text-[#387865]">
                                        <span>Program Unggulan</span>
                                        <i class="ti ti-check text-[#285a48] text-sm"></i>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-3 text-center text-emerald-200 text-sm py-6">Program belum tersedia.</div>
                            @endforelse
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ==========================================
         6. DEWAN ASATIDZ & TENAGA PENDIDIK MA
         ========================================== -->
    <section id="guru" class="py-16 sm:py-20 lg:py-24 bg-stone-50/60 relative overflow-hidden" x-data="{ 
        currentGuru: 0,
        scroll(dir) {
            const el = document.getElementById('guruSlider');
            const step = el.querySelector('.guru-card')?.offsetWidth + 24 || 280;
            el.scrollBy({ left: dir * step, behavior: 'smooth' });
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 sm:mb-12" data-aos="fade-up">
                <div>
                    <span class="font-bold text-xs sm:text-sm text-[#285a48] uppercase tracking-wider block mb-2">
                        DEWAN ASATIDZ & PEMBINA
                    </span>
                    <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-[#1f4537] mb-2">
                        Dewan Asatidz & Guru MA Al-Amin
                    </h2>
                    <p class="text-xs sm:text-sm text-stone-500 max-w-xl">
                        Pendidik berkompeten, magister ilmu syar'i & sains umum, hufadz mutqin, serta alumni universitas ternama dalam dan luar negeri.
                    </p>
                </div>

                <!-- Slider Navigation Arrows -->
                @if(isset($staff) && count($staff) > 1)
                    <div class="flex items-center gap-2">
                        <button 
                            @click="scroll(-1)" 
                            class="w-10 h-10 rounded-full bg-white border border-stone-200 text-stone-700 hover:text-[#285a48] hover:border-[#285a48] hover:bg-stone-50 shadow-sm flex items-center justify-center transition-all active:scale-95" 
                            aria-label="Previous Guru"
                        >
                            <i class="ti ti-chevron-left text-lg"></i>
                        </button>
                        <button 
                            @click="scroll(1)" 
                            class="w-10 h-10 rounded-full bg-[#285a48] text-white hover:bg-[#1f4537] shadow-md flex items-center justify-center transition-all active:scale-95" 
                            aria-label="Next Guru"
                        >
                            <i class="ti ti-chevron-right text-lg"></i>
                        </button>
                    </div>
                @endif
            </div>

            <!-- Teachers Cards Slider Track -->
            <div 
                id="guruSlider"
                class="flex gap-6 overflow-x-auto snap-x snap-mandatory pb-6 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar scroll-smooth"
                @scroll="currentGuru = Math.round($el.scrollLeft / ($el.querySelector('.guru-card')?.offsetWidth || 260))"
            >
                @forelse($staff ?? [] as $idx => $guru)
                    <div class="guru-card min-w-[240px] sm:min-w-[260px] md:min-w-[280px] snap-start bg-white rounded-3xl border border-stone-200/80 p-5 text-center shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center group shrink-0" data-aos="fade-up" data-aos-delay="{{ ($idx + 1) * 60 }}">
                        
                        <!-- Teacher Photo -->
                        <div class="w-full h-52 sm:h-56 rounded-2xl bg-stone-100 overflow-hidden mb-4 shadow-sm relative flex items-center justify-center">
                            @if($guru->foto)
                                <img src="{{ $guru->getAdminImageUrl($guru->foto) }}" alt="{{ $guru->nama_lengkap }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-stone-400 p-4">
                                    <div class="w-20 h-20 rounded-full bg-white shadow-sm flex items-center justify-center text-[#285a48] mb-2 group-hover:scale-110 transition-transform">
                                        <i class="ti ti-user text-4xl"></i>
                                    </div>
                                    <span class="text-[11px] font-semibold text-stone-400 uppercase tracking-wider">Asatidz MA</span>
                                </div>
                            @endif
                        </div>

                        <!-- Role Badge -->
                        <span class="inline-block px-3 py-1 rounded-full text-[9px] sm:text-[10px] font-bold bg-[#285a48] text-amber-400 mb-2 shadow-sm">
                            {{ $guru->jabatan->nama_jabatan ?? 'Asatidz MA' }}
                        </span>

                        <!-- Teacher Name -->
                        <h3 class="font-heading font-bold text-sm sm:text-base text-[#1f4537] line-clamp-1 leading-snug">
                            {{ $guru->nama_lengkap }}
                        </h3>
                    </div>
                @empty
                    <div class="col-span-full py-8 text-center text-stone-400 text-sm font-inter w-full">
                        Data dewan guru dan asatidz sedang diperbarui.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ==============================================================
         7. SECTION 7: WHAT OUR CLIENTS SAY (Testimoni Orang Tua & Alumni)
         ============================================================== -->
    <section id="testimoni" class="py-14 sm:py-20 bg-white" x-data="{ currentIdx: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-center">
                
                <!-- Left: 3 Small Gallery Photos -->
                <div class="lg:col-span-6" data-aos="fade-right" data-aos-offset="0">
                    <div class="grid grid-cols-3 gap-2.5 sm:gap-4">
                        <div class="rounded-xl sm:rounded-2xl overflow-hidden h-36 sm:h-64 shadow-md bg-stone-100">
                            <img 
                                src="{{ !empty($setting->testimoni_image_1) ? $unit->getAdminImageUrl($setting->testimoni_image_1) : asset('images/mts/section4-santri.jpg') }}" 
                                alt="Kegiatan Santri 1" 
                                class="w-full h-full object-cover"
                            >
                        </div>
                        <div class="rounded-xl sm:rounded-2xl overflow-hidden h-36 sm:h-64 shadow-md bg-stone-100 mt-2.5 sm:mt-6">
                            <img 
                                src="{{ !empty($setting->testimoni_image_2) ? $unit->getAdminImageUrl($setting->testimoni_image_2) : asset('images/mts/bg-bright.jpg') }}" 
                                alt="Kegiatan Santri 2" 
                                class="w-full h-full object-cover"
                            >
                        </div>
                        <div class="rounded-xl sm:rounded-2xl overflow-hidden h-36 sm:h-64 shadow-md bg-stone-100">
                            <img 
                                src="{{ !empty($setting->testimoni_image_3) ? $unit->getAdminImageUrl($setting->testimoni_image_3) : asset('images/mts/santri-model.png') }}" 
                                alt="Kegiatan Santri 3" 
                                class="w-full h-full object-cover"
                            >
                        </div>
                    </div>
                </div>

                <!-- Right: Testimonial Quote & Info -->
                <div class="lg:col-span-6" data-aos="fade-left" data-aos-offset="0">
                    <span class="text-[#285a48] font-bold text-xs uppercase tracking-wider block mb-1 sm:mb-2">{{ $setting->testimoni_tag ?? 'TESTIMONI WALI & ALUMNI' }}</span>
                    <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-[#1f4537] mb-4 sm:mb-6">
                        {{ $setting->testimoni_title ?? 'Apa Kata Wali Santri & Alumni MA?' }}
                    </h2>

                    @php
                        $testimoniList = (!empty($setting->custom_testimoni) && count($setting->custom_testimoni) > 0)
                            ? $setting->custom_testimoni
                            : [
                                [
                                    'nama' => 'Bpk. H. Rahmat Hidayat, M.Si.',
                                    'role' => 'Orang Tua dari Fauzan Adzim (Alumni MA Al-Amin - Lolos Kedokteran PTN)',
                                    'quote' => 'Alhamdulillah, MA Al-Amin berhasil mengantarkan ananda memiliki hafalan Al-Qur\'an sekaligus prestasi sains yang luar biasa hingga lolos PTN impian.',
                                    'avatar' => null
                                ],
                                [
                                    'nama' => 'Ibu Dra. Hj. Siti Nurhasanah',
                                    'role' => 'Orang Tua dari Hanif Ar-Rasyid (Santri Kelas XII MA)',
                                    'quote' => 'Kombinasi pendalaman kitab tafsir, hadits, dan pembinaan kepemimpinan di MA Al-Amin sangat membentuk kemandirian dan integritas kepribadian anak kami.',
                                    'avatar' => null
                                ],
                                [
                                    'nama' => 'Ust. Ilham Ramadhan, Lc.',
                                    'role' => 'Alumni MA Al-Amin (Mahasiswa Universitas Al-Azhar Kairo Mesir)',
                                    'quote' => 'Bekal bahasa Arab dan dirasah Islamiyah dari asatidz di MA Al-Amin menjadi kunci kemudahan saya menempuh seleksi beasiswa kuliah ke Timur Tengah.',
                                    'avatar' => null
                                ]
                            ];
                    @endphp

                    <!-- Quote Box Slider -->
                    <div class="mb-6 relative min-h-[170px] sm:min-h-[150px]">
                        @foreach($testimoniList as $idx => $t)
                        @php
                            $namaTesti = $t['nama'] ?? $t['name'] ?? 'Wali Santri';
                            $roleTesti = $t['role'] ?? 'Orang Tua Santri MA';
                            $quoteTesti = $t['quote'] ?? $t['text'] ?? '';
                            $avatarTesti = !empty($t['avatar']) 
                                ? (str_starts_with($t['avatar'], 'http') ? $t['avatar'] : $unit->getAdminImageUrl($t['avatar'])) 
                                : null;
                        @endphp
                        <div x-show="currentIdx === {{ $idx }}" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="w-full">
                            <!-- 5 Stars Rating -->
                            <div class="flex items-center gap-1 text-amber-400 text-sm mb-3">
                                <i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i>
                            </div>

                            <p class="italic text-stone-600 text-sm sm:text-base leading-relaxed mb-5">
                                "{{ $quoteTesti }}"
                            </p>

                            <!-- Parent Info with Avatar / Initials -->
                            <div class="flex items-center gap-3 pt-2">
                                @if($avatarTesti)
                                    <img src="{{ $avatarTesti }}" alt="{{ $namaTesti }}" class="w-11 h-11 rounded-full object-cover border-2 border-stone-200 shrink-0">
                                @else
                                    <div class="w-11 h-11 rounded-full bg-[#e5f0ec] text-[#285a48] font-bold flex items-center justify-center text-sm shrink-0 border border-[#cce2d9]">
                                        {{ substr($namaTesti, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="font-heading font-bold text-sm text-[#1f4537]">
                                        {{ $namaTesti }}
                                    </div>
                                    <div class="text-xs text-stone-500 font-medium">
                                        {{ $roleTesti }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Slide Navigation Controls & Indicators -->
                    <div class="flex items-center justify-between pt-4 border-t border-stone-100">
                        <!-- Dots Indicator -->
                        <div class="flex items-center gap-1.5">
                            @foreach($testimoniList as $idx => $t)
                                <button @click="currentIdx = {{ $idx }}" class="h-2 rounded-full transition-all duration-300" :class="currentIdx === {{ $idx }} ? 'w-6 bg-[#285a48]' : 'w-2 bg-stone-200 hover:bg-stone-300'"></button>
                            @endforeach
                        </div>

                        <!-- Arrow Buttons -->
                        <div class="flex items-center gap-2">
                            <button @click="currentIdx = currentIdx > 0 ? currentIdx - 1 : {{ count($testimoniList) - 1 }}" class="w-9 h-9 rounded-full border border-stone-300 text-stone-600 hover:border-[#285a48] hover:text-[#285a48] hover:bg-stone-50 flex items-center justify-center transition-colors" title="Sebelumnya">
                                <i class="ti ti-arrow-left"></i>
                            </button>
                            <button @click="currentIdx = currentIdx < {{ count($testimoniList) - 1 }} ? currentIdx + 1 : 0" class="w-9 h-9 rounded-full bg-[#285a48] text-white flex items-center justify-center shadow-sm hover:bg-[#1f4537] transition-colors" title="Selanjutnya">
                                <i class="ti ti-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ==============================================================
         SECTION BERITA TERKINI (Slider Mobile & Grid Desktop)
         ============================================================== -->
    @if(isset($news) && $news->count() > 0)
    <section id="berita" class="py-16 sm:py-20 lg:py-24 bg-[#fafcfb] border-t border-stone-200/60 relative overflow-hidden" x-data="{ activeNewsSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-4 sm:gap-6" data-aos="fade-up" data-aos-offset="0">
                <div>
                    <span class="font-bold text-xs sm:text-sm text-[#285a48] uppercase tracking-wider block mb-2">
                        Dokumentasi & Kabar Terkini
                    </span>
                    <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-[#1f4537]">
                        Berita & Kegiatan MA Al-Amin
                    </h2>
                </div>
                <a href="/berita" class="inline-flex items-center gap-2 text-xs font-bold text-[#285a48] hover:text-[#1f4537] uppercase tracking-wider transition-colors">
                    <span>Lihat Semua Berita</span>
                    <i class="ti ti-arrow-right text-base"></i>
                </a>
            </div>

            <!-- Mobile Swipe Hint -->
            <div class="flex items-center justify-center gap-1.5 text-[11px] font-semibold text-[#285a48] bg-[#f4f8f6] py-1.5 px-3.5 rounded-full w-fit mx-auto mb-4 md:hidden border border-[#cce2d9]">
                <i class="ti ti-hand-swipe text-sm animate-pulse text-[#285a48]"></i>
                <span>Geser untuk melihat berita lainnya</span>
            </div>

            <!-- Blog Cards Grid & Slider -->
            <div 
                id="newsSlider"
                class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-6 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar"
                @scroll="activeNewsSlide = Math.round($el.scrollLeft / ($el.offsetWidth * 0.85))"
            >
                @forelse($news as $idx => $post)
                    <div class="min-w-[85%] sm:min-w-[70%] md:min-w-0 snap-center bg-white rounded-3xl border border-stone-200/80 p-5 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group {{ $loop->last && count($news) % 2 != 0 ? 'md:col-span-2 lg:col-span-1' : '' }}" data-aos="fade-up" data-aos-offset="0">
                        <div>
                            <!-- News Image -->
                            <div class="w-full h-44 sm:h-48 rounded-2xl overflow-hidden bg-stone-100 mb-4 relative">
                                <a href="{{ route('news.show', $post->slug ?? $post->id) }}">
                                    <img 
                                        src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" 
                                        alt="{{ $post->judul ?? $post->title }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                                        onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full bg-[#f4f8f6] flex items-center justify-center text-[#285a48]\'><i class=\'ti ti-photo text-4xl\'></i></div>';"
                                    >
                                </a>
                                <div class="absolute top-3 left-3 bg-[#1f4537] text-amber-400 font-bold text-[9px] sm:text-[10px] px-2.5 sm:px-3 py-1 rounded-full shadow-sm">
                                    {{ $post->created_at ? \Carbon\Carbon::parse($post->created_at)->translatedFormat('d M Y') : 'Berita MA' }}
                                </div>
                            </div>

                            <h3 class="font-heading font-bold text-base sm:text-lg text-[#1f4537] group-hover:text-[#285a48] transition-colors line-clamp-2 leading-snug mb-2">
                                <a href="{{ route('news.show', $post->slug ?? $post->id) }}">{{ $post->judul ?? $post->title }}</a>
                            </h3>

                            <p class="text-stone-500 text-xs line-clamp-3 leading-relaxed mb-4 sm:mb-6">
                                {{ strip_tags($post->isi ?? $post->content ?? '') }}
                            </p>
                        </div>

                        <!-- Read More Link -->
                        <div class="pt-3.5 border-t border-stone-100 flex items-center justify-between">
                            <span class="text-[10px] sm:text-[11px] font-bold text-[#285a48]">
                                {{ $post->category->name ?? 'Kegiatan Santri' }}
                            </span>
                            <a href="{{ route('news.show', $post->slug ?? $post->id) }}" class="font-bold text-xs text-[#285a48] hover:text-[#1f4537] flex items-center gap-1 transition-colors">
                                <span>Baca Selengkapnya</span>
                                <i class="ti ti-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-stone-400 italic">
                        Belum ada artikel kegiatan MA Al-Amin.
                    </div>
                @endforelse
            </div>

            <!-- Mobile Slider Dots Indicator -->
            @if(count($news) > 1)
                <div class="flex items-center justify-center gap-2 mt-4 md:hidden">
                    @foreach($news as $nIdx => $nItem)
                        <button 
                            @click="document.getElementById('newsSlider').scrollTo({ left: document.getElementById('newsSlider').offsetWidth * 0.85 * {{ $nIdx }}, behavior: 'smooth' })" 
                            :class="activeNewsSlide === {{ $nIdx }} ? 'w-6 bg-[#285a48]' : 'w-2 bg-stone-300'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Berita {{ $nIdx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif

        </div>
    </section>
    @endif

    <!-- ==============================================================
         8. RINCIAN BIAYA PENDIDIKAN (BOARDING / ASRAMA & FULL DAY)
         ============================================================== -->
    <section id="biaya" class="py-16 sm:py-20 lg:py-24 bg-[#f8fbf9] border-t border-stone-200/80" x-data="{ biayaTab: 'asrama' }">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12" data-aos="fade-up">
                <span class="font-bold text-xs sm:text-sm text-[#285a48] uppercase tracking-wider block mb-2">
                    INFORMASI PEMBIAYAAN PSB
                </span>
                <h2 class="font-heading text-2xl sm:text-4xl font-extrabold text-[#1f4537] mb-3 leading-tight">
                    Rincian Estimasi Biaya Pendidikan MA
                </h2>
                <p class="text-xs sm:text-sm text-stone-500">
                    Tahun Ajaran {{ $activePPDB->tahun_ajaran ?? '2026/2027' }} • Transparan, Akuntabel, dan Tersedia Skema Keringanan / Beasiswa Prestasi
                </p>

                <!-- Toggle Tab: Asrama (Boarding) vs Non-Asrama (Full Day) -->
                <div class="inline-flex flex-col sm:flex-row items-stretch sm:items-center p-1.5 rounded-2xl bg-stone-200/80 mt-6 shadow-inner border border-stone-300/60 w-full sm:w-auto gap-1 sm:gap-0">
                    <button 
                        @click="biayaTab = 'asrama'" 
                        :class="biayaTab === 'asrama' ? 'bg-[#285a48] text-amber-400 shadow-md' : 'text-stone-600 hover:text-[#285a48]'"
                        class="px-5 sm:px-7 py-2.5 rounded-xl font-heading font-bold text-xs sm:text-sm transition-all duration-200 flex items-center justify-center gap-2"
                    >
                        <i class="ti ti-home text-base"></i>
                        <span>Program Asrama (Boarding)</span>
                    </button>
                    <button 
                        @click="biayaTab = 'non_asrama'" 
                        :class="biayaTab === 'non_asrama' ? 'bg-[#285a48] text-amber-400 shadow-md' : 'text-stone-600 hover:text-[#285a48]'"
                        class="px-5 sm:px-7 py-2.5 rounded-xl font-heading font-bold text-xs sm:text-sm transition-all duration-200 flex items-center justify-center gap-2"
                    >
                        <i class="ti ti-school text-base"></i>
                        <span>Full Day (Non-Asrama)</span>
                    </button>
                </div>
            </div>

            <!-- Content Card: Asrama (Boarding) -->
            <div x-show="biayaTab === 'asrama'" x-transition.opacity class="bg-white rounded-2xl sm:rounded-[2rem] border border-stone-200 shadow-lg p-5 sm:p-10" data-aos="fade-up">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-5 sm:pb-6 mb-5 sm:mb-6 border-b border-stone-100 gap-4">
                    <div>
                        <div class="inline-block px-3 py-1 rounded-full text-[10px] font-bold bg-[#e5f0ec] text-[#285a48] uppercase tracking-wider mb-2">
                            Santri Mukim / Asrama
                        </div>
                        <h3 class="font-heading font-extrabold text-base sm:text-xl text-[#1f4537]">
                            Estimasi Masuk Program Asrama (Boarding)
                        </h3>
                        <p class="text-xs text-stone-500 mt-0.5">
                            Sudah termasuk asrama, konsumsi 3x sehari, pembinaan tahfidz 24 jam, perlengkapan & program kepesantrenan.
                        </p>
                    </div>
                    @php
                        $totalAsrama = isset($biayaAsrama) && $biayaAsrama->count() > 0 ? $biayaAsrama->sum('jumlah') : 28500000;
                    @endphp
                    <div class="sm:text-right shrink-0 bg-stone-50 sm:bg-transparent p-3 sm:p-0 rounded-xl">
                        <span class="text-[11px] text-stone-400 font-semibold block">Total Biaya Masuk</span>
                        <span class="font-heading font-black text-xl sm:text-2xl text-[#1f4537]">Rp {{ number_format($totalAsrama, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3 font-sans">
                    @if(isset($biayaAsrama) && $biayaAsrama->count() > 0)
                        @foreach($biayaAsrama as $b)
                            <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm">
                                <span class="text-stone-600 font-medium flex items-center gap-2">
                                    <i class="ti ti-check text-[#285a48] text-sm"></i>
                                    {{ $b->jenis_biaya }}
                                </span>
                                <span class="font-bold text-[#1f4537]">Rp {{ number_format($b->jumlah, 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    @else
                        <!-- Fallback Sample -->
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">Pendaftaran & Seleksi</span><span class="font-bold text-[#1f4537]">Rp 350.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">Infaq Pengembangan</span><span class="font-bold text-[#1f4537]">Rp 5.000.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">Sarana & Prasarana</span><span class="font-bold text-[#1f4537]">Rp 2.500.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">SPP & Pembinaan (Asrama)</span><span class="font-bold text-[#1f4537]">Rp 15.000.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">Seragam & Atribut</span><span class="font-bold text-[#1f4537]">Rp 1.350.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">Kegiatan Orientasi Santri</span><span class="font-bold text-[#1f4537]">Rp 1.600.000</span></div>
                    @endif
                </div>

                <div class="mt-6 sm:mt-8 p-4 sm:p-5 rounded-2xl bg-[#f4f8f6] border border-[#cce2d9] flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 text-stone-700 text-xs text-left w-full sm:w-auto">
                        <i class="ti ti-info-circle text-[#285a48] text-2xl shrink-0"></i>
                        <span>* Biaya masuk asrama dapat diangsur dan sudah mencakup konsumsi serta laundry santri.</span>
                    </div>
                    <a href="{{ $setting->cta_button_url ?? '/register' }}" class="btn-accent-gold w-full sm:w-auto px-5 py-2.5 rounded-xl font-bold text-xs shadow-md shrink-0 whitespace-nowrap text-center" style="background-color: #f59e0b !important; color: #183329 !important;">
                        Daftar Asrama
                    </a>
                </div>
            </div>

            <!-- Content Card: Non-Asrama (Full Day) -->
            <div x-show="biayaTab === 'non_asrama'" x-cloak x-transition.opacity class="bg-white rounded-2xl sm:rounded-[2rem] border border-stone-200 shadow-lg p-5 sm:p-10" data-aos="fade-up">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-5 sm:pb-6 mb-5 sm:mb-6 border-b border-stone-100 gap-4">
                    <div>
                        <div class="inline-block px-3 py-1 rounded-full text-[10px] font-bold bg-stone-100 text-stone-800 uppercase tracking-wider mb-2">
                            Santri Non-Mukim / Full Day
                        </div>
                        <h3 class="font-heading font-extrabold text-base sm:text-xl text-[#1f4537]">
                            Estimasi Masuk Full Day (Non-Asrama)
                        </h3>
                        <p class="text-xs text-stone-500 mt-0.5">
                            Pembelajaran intensif madrasah aliyah hingga sore hari tanpa menginap di asrama.
                        </p>
                    </div>
                    @php
                        $totalNonAsrama = isset($biayaNonAsrama) && $biayaNonAsrama->count() > 0 ? $biayaNonAsrama->sum('jumlah') : 13500000;
                    @endphp
                    <div class="sm:text-right shrink-0 bg-stone-50 sm:bg-transparent p-3 sm:p-0 rounded-xl">
                        <span class="text-[11px] text-stone-400 font-semibold block">Total Biaya Masuk</span>
                        <span class="font-heading font-black text-xl sm:text-2xl text-[#1f4537]">Rp {{ number_format($totalNonAsrama, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3 font-sans">
                    @if(isset($biayaNonAsrama) && $biayaNonAsrama->count() > 0)
                        @foreach($biayaNonAsrama as $b)
                            <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm">
                                <span class="text-stone-600 font-medium flex items-center gap-2">
                                    <i class="ti ti-check text-[#285a48] text-sm"></i>
                                    {{ $b->jenis_biaya }}
                                </span>
                                <span class="font-bold text-[#1f4537]">Rp {{ number_format($b->jumlah, 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    @else
                        <!-- Fallback Sample -->
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">Pendaftaran & Seleksi</span><span class="font-bold text-[#1f4537]">Rp 350.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">Infaq Pengembangan</span><span class="font-bold text-[#1f4537]">Rp 3.500.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">Sarana & Prasarana</span><span class="font-bold text-[#1f4537]">Rp 1.500.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">SPP Madrasah</span><span class="font-bold text-[#1f4537]">Rp 4.200.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">Seragam & Atribut</span><span class="font-bold text-[#1f4537]">Rp 1.150.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100 text-xs sm:text-sm"><span class="text-stone-600">Kegiatan Santri Baru</span><span class="font-bold text-[#1f4537]">Rp 1.300.000</span></div>
                    @endif
                </div>

                <div class="mt-6 sm:mt-8 p-4 sm:p-5 rounded-2xl bg-stone-100 border border-stone-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 text-stone-700 text-xs text-left w-full sm:w-auto">
                        <i class="ti ti-info-circle text-stone-600 text-2xl shrink-0"></i>
                        <span>* Program Full Day cocok bagi santri berdomisili sekitar pesantren yang diantar jemput keluarga.</span>
                    </div>
                    <a href="{{ $setting->cta_button_url ?? '/register' }}" class="btn-primary-green w-full sm:w-auto px-5 py-2.5 rounded-xl font-bold text-xs shadow-md shrink-0 whitespace-nowrap text-center" style="background-color: #285a48 !important; color: #ffffff !important;">
                        Daftar Full Day
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- ==============================================================
         9. BANNER CTA (Call to Action MA Al-Amin - Soft Pine Green)
         ============================================================== -->
    <section class="py-10 sm:py-16 bg-[#fafcfb]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            
            <div class="rounded-3xl sm:rounded-[2.5rem] bg-[#285a48] text-white p-6 sm:p-12 lg:p-14 shadow-2xl relative overflow-hidden flex flex-col lg:flex-row items-center justify-between gap-6 lg:gap-12" style="background: linear-gradient(135deg, #285a48 0%, #1f4537 100%) !important; color: #ffffff !important;" data-aos="fade-up">
                
                <!-- Subtle Background Texture -->
                <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-white/5 pointer-events-none"></div>

                <!-- Left Column: Tag, Headline, Subtext -->
                <div class="text-left sm:text-center lg:text-left max-w-2xl relative z-10 w-full">
                    <span class="text-amber-400 font-bold text-xs uppercase tracking-wider block mb-2">
                        PENERIMAAN SANTRI BARU MA
                    </span>
                    <h2 class="font-heading text-xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-tight mb-2.5 sm:mb-3">
                        {{ $setting->cta_title ?? 'Mulai Langkah Sukses Menuju Masa Depan Gemilang' }}
                    </h2>
                    <p class="text-[#cce2d9] text-xs sm:text-sm leading-relaxed">
                        {{ $setting->cta_description ?? 'Bergabunglah bersama keluarga besar MA Al-Amin Sindangkasih. Pendaftaran santri baru kini dibuka dengan kuota terbatas.' }}
                    </p>
                </div>

                <!-- Right Column: Buttons -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 shrink-0 w-full sm:w-auto relative z-10">
                    <a href="{{ $setting->cta_button_url ?? '/register' }}" class="btn-accent-gold w-full sm:w-auto inline-flex items-center justify-center px-7 py-3.5 rounded-xl font-bold text-xs sm:text-sm shadow-md transition-all text-center" style="background-color: #f59e0b !important; color: #183329 !important;">
                        <span>{{ $setting->cta_button_text ?? 'Daftar Santri Baru' }}</span>
                    </a>

                    @php
                        $maWa = ($setting && $setting->unit_whatsapp) ? preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $setting->unit_whatsapp)) : ($pengaturan->telepon ?? '081223344556');
                        $maWaMsg = ($setting && $setting->cta_wa_text) ? urlencode($setting->cta_wa_text) : urlencode('Halo Admin MA Al-Amin Sindangkasih, saya ingin konsultasi pendaftaran santri baru.');
                    @endphp
                    @if(!empty($maWa))
                        <a href="https://wa.me/{{ $maWa }}?text={{ $maWaMsg }}" target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-[#cce2d9] border border-white/20 font-bold text-xs sm:text-sm shadow-sm transition-all text-center">
                            <i class="ti ti-brand-whatsapp text-emerald-300 text-base"></i>
                            <span>Konsultasi PSB</span>
                        </a>
                    @endif
                </div>

            </div>

        </div>
    </section>

@endsection
