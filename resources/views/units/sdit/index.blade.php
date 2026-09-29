@extends('layouts.sdit')

@section('title', 'SDIT Al-Amin Sindangkasih - Sekolah Dasar Islam Terpadu')
@section('meta_description', 'Official Landing Page SDIT Al-Amin Sindangkasih - Sekolah Dasar Islam Terpadu berakhlak mulia, tahfidz Al-Qur\'an, sains modern, dan berwawasan global.')

@section('content')

    <!-- ==========================================
         1. HERO SECTION: Mirrored from Reference Design
         (Where Little Minds Grow & Bright Futures Begin)
         ========================================== -->
    <section id="hero" class="relative pt-6 pb-16 sm:pt-10 sm:pb-24 lg:pt-12 lg:pb-28 bg-[#fafbfc] overflow-hidden">
        
        <!-- School Building Photo Background Overlay (Subtle, Clean & Blended) -->
        <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden">
            @php
                $bgGedung = null;
                if ($setting && !empty($setting->hero_bg_image)) {
                    $bgGedung = $unit->getAdminImageUrl($setting->hero_bg_image);
                } elseif ($pengaturan && !empty($pengaturan->background_login)) {
                    $bgGedung = $pengaturan->getAdminImageUrl($pengaturan->background_login);
                }
            @endphp
            
            @if($bgGedung)
                <!-- School Building Image with Light Exposure & Blur -->
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-[0.14] scale-105 transform mix-blend-multiply transition-all duration-700 filter saturate-[1.1]" 
                     style="background-image: url('{{ $bgGedung }}');">
                </div>
            @endif

            <!-- Soft Multi-stop Gradient Wash (Keeps content highly legible, clean & bright) -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#fafbfc] via-[#fafbfc]/85 to-[#fafbfc]/70"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-[#fafbfc]/90 via-transparent to-[#fafbfc]"></div>

            <!-- Soft pastel glow in top right behind photo -->
            <div class="absolute -top-24 -right-24 w-96 sm:w-[500px] h-96 sm:h-[500px] bg-amber-100/60 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-0 w-72 sm:w-[400px] h-72 sm:h-[400px] bg-blue-100/40 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl 2xl:max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-center">
                
                <!-- Left Text Content (lg:col-span-5) -->
                <div class="lg:col-span-5 text-center lg:text-left order-2 lg:order-1 pt-1 sm:pt-2 lg:pt-0" data-aos="fade-right">
                    
                    <!-- Decorative Paper Airplane Doodle & Small Tag -->
                    <div class="flex items-center justify-center lg:justify-start gap-3 mb-3 sm:mb-4">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-slate-200/80 shadow-sm text-[#192b56] text-xs font-fredoka font-semibold">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse shrink-0"></span>
                            <span class="truncate max-w-[280px] sm:max-w-none">{{ $setting->hero_tag ?? ('Tahun Ajaran ' . ($activePPDB->tahun_ajaran ?? date('Y').'/'.(date('Y')+1)) . ' • Penerimaan Santri Baru') }}</span>
                        </div>
                    </div>

                    <!-- Main Headline with Color Highlights & Heart Doodle -->
                    <div class="relative">
                        <h1 class="font-fredoka text-2xl sm:text-5xl lg:text-[46px] xl:text-[54px] font-bold text-[#192b56] leading-[1.2] sm:leading-[1.12] mb-4 sm:mb-5 tracking-tight">
                            @if($setting && $setting->hero_title_prefix)
                                <span>{{ $setting->hero_title_prefix }}</span>
                                <span class="text-amber-500 inline-block align-middle">
                                    <svg class="inline-block w-6 h-6 sm:w-10 sm:h-10 ml-1 sm:ml-1.5 text-amber-400 -mt-1 sm:-mt-2 animate-bounce-slow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                                    </svg>
                                </span>
                                <br class="hidden sm:inline">
                                <span class="text-teal-600">{{ $setting->hero_title_highlight ?? 'Qurani & Generasi Unggul' }}</span>
                            @else
                                <span>Membina Karakter</span>
                                <span class="text-amber-500 inline-block align-middle">
                                    <svg class="inline-block w-6 h-6 sm:w-10 sm:h-10 ml-1 sm:ml-1.5 text-amber-400 -mt-1 sm:-mt-2 animate-bounce-slow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                                    </svg>
                                </span>
                                <br class="hidden sm:inline">
                                <span class="text-teal-600">Qur'ani</span> & <span class="text-[#192b56]">Generasi Unggul</span>
                            @endif
                        </h1>
                    </div>

                    <!-- Subtitle Description -->
                    <p class="font-quicksand font-bold text-slate-500 text-xs sm:text-base lg:text-lg leading-relaxed mb-6 sm:mb-8 max-w-xl mx-auto lg:mx-0 px-2 sm:px-0">
                        {{ $setting->hero_description ?? 'SDIT Al-Amin menghadirkan pendidikan Islam terpadu yang memadukan penguatan aqidah dan tahfidz Al-Qur\'an dengan keunggulan sains, teknologi, serta kurikulum nasional secara terintegrasi.' }}
                    </p>

                    <!-- Action Buttons (Pill Primary Navy + Outline) -->
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-center lg:justify-start gap-3 sm:gap-4 mb-8 sm:mb-10 font-fredoka px-4 sm:px-0">
                        <a href="/register" class="inline-flex items-center justify-center gap-2.5 px-6 sm:px-7 py-3.5 rounded-full bg-[#192b56] hover:bg-[#121f3f] text-white font-bold text-xs sm:text-sm lg:text-base shadow-lg shadow-blue-950/20 hover:shadow-xl transition-all transform hover:-translate-y-0.5 active:scale-95 text-center">
                            <i class="ti ti-calendar-event text-base sm:text-lg text-amber-400"></i>
                            <span>Daftar / Observasi Santri</span>
                        </a>
                        <a href="#program" class="inline-flex items-center justify-center gap-2 px-6 sm:px-7 py-3.5 rounded-full bg-white hover:bg-slate-50 text-[#192b56] border-2 border-slate-200 font-bold text-xs sm:text-sm lg:text-base shadow-sm hover:border-[#192b56] transition-all active:scale-95 text-center">
                            <span>Program Unggulan</span>
                            <i class="ti ti-arrow-down text-sm sm:text-base"></i>
                        </a>
                    </div>

                    <!-- 3 Feature Badges with Soft Icons (Mirroring Bottom Hero in Image) -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 pt-6 border-t border-slate-200/80 text-left">
                        
                        <!-- Item 1: Aman & Terbimbing -->
                        <div class="flex items-start gap-2.5 sm:gap-3 p-2.5 sm:p-0 rounded-2xl sm:rounded-none bg-slate-50/70 sm:bg-transparent">
                            <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-base sm:text-lg shrink-0 shadow-sm">
                                <i class="ti ti-shield-check"></i>
                            </div>
                            <div>
                                <h4 class="font-fredoka font-bold text-xs text-slate-800 leading-snug">Aman & Terbimbing</h4>
                                <p class="font-quicksand font-semibold text-[10px] sm:text-[11px] text-slate-400 leading-tight mt-0.5">Prioritas keselamatan & kenyamanan santri.</p>
                            </div>
                        </div>

                        <!-- Item 2: Guru Berdedikasi -->
                        <div class="flex items-start gap-2.5 sm:gap-3 p-2.5 sm:p-0 rounded-2xl sm:rounded-none bg-slate-50/70 sm:bg-transparent">
                            <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-rose-50 text-rose-500 flex items-center justify-center text-base sm:text-lg shrink-0 shadow-sm">
                                <i class="ti ti-heart"></i>
                            </div>
                            <div>
                                <h4 class="font-fredoka font-bold text-xs text-slate-800 leading-snug">Asatidz Berdedikasi</h4>
                                <p class="font-quicksand font-semibold text-[10px] sm:text-[11px] text-slate-400 leading-tight mt-0.5">Pendidik tersertifikasi, hufadz & penuh kasih.</p>
                            </div>
                        </div>

                        <!-- Item 3: Belajar Menyenangkan -->
                        <div class="flex items-start gap-2.5 sm:gap-3 p-2.5 sm:p-0 rounded-2xl sm:rounded-none bg-slate-50/70 sm:bg-transparent">
                            <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-base sm:text-lg shrink-0 shadow-sm">
                                <i class="ti ti-star"></i>
                            </div>
                            <div>
                                <h4 class="font-fredoka font-bold text-xs text-slate-800 leading-snug">Active & Fun Learning</h4>
                                <p class="font-quicksand font-semibold text-[10px] sm:text-[11px] text-slate-400 leading-tight mt-0.5">Sains aplikatif & pembiasaan sunnah.</p>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Right Visual Column (Freestanding Dynamic Model - UKURAN SUPER JUMBO) -->
                <!-- order-1 on mobile so model stays at the top, order-2 on desktop -->
                <div class="lg:col-span-7 relative flex justify-center items-end order-1 lg:order-2 pt-2 sm:pt-4 lg:pt-0 mb-4 sm:mb-6 lg:mb-0" data-aos="fade-left">
                    <div class="relative w-full max-w-[360px] sm:max-w-xl lg:max-w-none flex justify-center items-end">
                        
                        <!-- 1. Ambient Background Glows & Fluid Organic Shape (DI BELAKANG MODEL: z-0) -->
                        <div class="absolute inset-0 pointer-events-none z-0 flex items-center justify-center">
                            <!-- Fluid Organic Splash in Golden Amber & Soft Yellow (Compact Size) -->
                            <div class="w-[260px] h-[280px] sm:w-[360px] sm:h-[400px] lg:w-[400px] lg:h-[450px] rounded-[52%_48%_68%_32%/45%_55%_45%_55%] bg-gradient-to-tr from-amber-400 via-amber-300 to-yellow-200 opacity-90 shadow-2xl shadow-amber-500/25 transform -rotate-6 animate-pulse-soft"></div>
                            
                            <!-- Soft Deep Backlight Aura -->
                            <div class="absolute -top-8 -right-8 w-44 sm:w-56 h-44 sm:h-56 rounded-full bg-amber-300/40 blur-2xl"></div>
                            <div class="absolute -bottom-8 -left-8 w-44 sm:w-56 h-44 sm:h-56 rounded-full bg-blue-400/25 blur-2xl"></div>
                            <div class="absolute top-1/3 -left-6 w-32 sm:w-40 h-32 sm:h-40 rounded-full bg-teal-300/30 blur-xl"></div>
                        </div>

                        <!-- 2. Playful Doodle Sparkles & Confetti Around the Model -->
                        <!-- A. Golden Stars & Sparkles -->
                        <div class="absolute top-2 right-4 sm:-top-4 sm:right-6 text-amber-400 text-xl sm:text-2xl z-20 animate-pulse pointer-events-none">
                            <i class="ti ti-sparkles"></i>
                        </div>
                        <div class="absolute bottom-24 left-2 sm:bottom-36 sm:-left-10 text-teal-500 text-lg sm:text-xl z-20 animate-pulse pointer-events-none" style="animation-delay: 1s;">
                            <i class="ti ti-star-filled"></i>
                        </div>
                        
                        <!-- B. Confetti Polka Dots in SDIT Colors -->
                        <div class="absolute top-12 left-4 sm:top-12 sm:left-4 w-2.5 sm:w-3 h-2.5 sm:h-3 rounded-full bg-amber-400/90 shadow-sm pointer-events-none animate-ping" style="animation-duration: 3.5s;"></div>
                        <div class="absolute bottom-20 right-2 sm:bottom-28 sm:-right-4 w-3 sm:w-3.5 h-3 sm:h-3.5 rounded-full bg-[#192b56]/80 shadow-sm pointer-events-none"></div>
                        <div class="absolute top-1/2 left-1 sm:-left-6 w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full bg-teal-400/90 pointer-events-none"></div>

                        <!-- 3. Floating Interactive Micro-Badges -->
                        <!-- Badge A: Mobile di bottom-left agar tidak nutupin wajah, Desktop di top-left z-0 -->
                        <div class="absolute bottom-2 -left-1 sm:bottom-auto sm:top-6 sm:-left-6 lg:top-8 lg:-left-6 xl:top-10 xl:-left-8 bg-white/95 backdrop-blur-md px-3 sm:px-4 py-1.5 sm:py-2.5 rounded-2xl shadow-xl border border-amber-200/90 flex items-center gap-2 sm:gap-3 animate-bounce-slow z-20 lg:z-0 transform -rotate-2 sm:-rotate-3 hover:rotate-0 transition-transform max-w-[190px] sm:max-w-[240px]">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-gradient-to-tr from-amber-500 to-yellow-400 text-white flex items-center justify-center text-sm sm:text-xl shadow-md shrink-0">
                                <i class="{{ $setting->hero_badge_icon ?? 'ti ti-sparkles' }}"></i>
                            </div>
                            <div>
                                <div class="flex items-center gap-1">
                                    <span class="font-fredoka font-bold text-[10px] sm:text-sm text-[#192b56] whitespace-nowrap leading-tight">{{ $setting->hero_badge_text ?? 'Penerimaan Santri Baru' }}</span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse shrink-0"></span>
                                </div>
                                <span class="font-quicksand font-bold text-[8px] sm:text-[11px] text-amber-600 block leading-tight">{{ $setting->hero_badge_status ?? 'Gelombang 1 Dibuka' }}</span>
                            </div>
                        </div>

                        <!-- Badge B: Bottom-Right Tahfidz Mutqin / Target (z-20) -->
                        <div class="absolute bottom-2 -right-1 sm:bottom-4 sm:-right-2 lg:bottom-6 lg:right-0 xl:-right-4 bg-white/95 backdrop-blur-md px-3 sm:px-4 py-1.5 sm:py-2.5 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-2 sm:gap-3 animate-bounce-slow z-20 transform rotate-2 hover:rotate-0 transition-transform" style="animation-delay: 1.2s;">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-sm sm:text-xl shadow-sm shrink-0">
                                <i class="ti ti-book-2"></i>
                            </div>
                            <div>
                                <div class="font-fredoka font-bold text-[10px] sm:text-sm text-[#192b56] leading-tight">
                                    Tahfidz 3 Juz
                                </div>
                                <div class="flex items-center gap-0.5 sm:gap-1 text-amber-400 text-[8px] sm:text-[10px]">
                                    <div class="flex">
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-filled"></i>
                                    </div>
                                    <span class="font-quicksand font-bold text-[8px] sm:text-[10px] text-slate-400 ml-0.5">Mutqin</span>
                                </div>
                            </div>
                        </div>

                        <!-- Badge C: Bottom-Left Pill (Active & Fun Learning) -->
                        <div class="hidden sm:flex absolute -bottom-3 left-4 sm:left-2 lg:left-0 bg-[#192b56] text-white px-4 py-2 rounded-full shadow-lg items-center gap-2 z-20 text-xs font-fredoka font-bold animate-pulse-soft">
                            <span class="w-2 h-2 rounded-full bg-amber-400 animate-ping"></span>
                            <span>Sekolah Ramah Anak</span>
                        </div>

                        <!-- 4. Model Transparan Lepas Bebas - UKURAN JUMBO MAKSIMAL -->
                        @php
                            $sditModelImg = ($setting && $setting->hero_model_image)
                                ? $unit->getAdminImageUrl($setting->hero_model_image)
                                : (($pengaturan && $pengaturan->model_1)
                                    ? $pengaturan->getAdminImageUrl($pengaturan->model_1)
                                    : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_3) : 'https://placehold.co/500x650?text=Santri+SDIT'));
                        @endphp
                        <img 
                            src="{{ $sditModelImg }}" 
                            alt="Santri SDIT Al-Amin" 
                            class="relative z-10 w-full min-w-[290px] xs:min-w-[340px] sm:min-w-[440px] lg:min-w-[560px] max-w-[440px] sm:max-w-[700px] lg:max-w-[950px] xl:max-w-[1100px] max-h-[500px] sm:max-h-[660px] lg:max-h-[740px] xl:max-h-[780px] h-auto object-contain drop-shadow-[0_20px_35px_rgba(25,43,86,0.22)] animate-float-gentle scale-110 sm:scale-105 lg:scale-110 xl:scale-115 origin-bottom"
                        >

                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- ==========================================
         2. PRAKATA / SAMBUTAN RESMI KEPALA UNIT
         ========================================== -->
    <section id="tentang" class="py-16 sm:py-20 lg:py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                
                <!-- Left: Foto Kepala Sekolah dengan Ornamen Elegan & Modern -->
                <div class="lg:col-span-5 flex justify-center items-center" data-aos="fade-right">
                    <div class="relative w-full max-w-[320px] sm:max-w-[360px] lg:max-w-[400px] flex justify-center items-end">
                        
                        <!-- 1. Ambient Background Layer: Soft Fluid Organic Blob & Aura (Amber & Deep Navy) -->
                        <div class="absolute inset-0 pointer-events-none z-0 flex items-center justify-center">
                            <!-- Elegant Fluid Organic Shape -->
                            <div class="w-[260px] h-[280px] sm:w-[320px] sm:h-[340px] rounded-[58%_42%_65%_35%/48%_56%_44%_52%] bg-gradient-to-tr from-amber-400/80 via-amber-200/60 to-blue-100/70 opacity-90 shadow-2xl shadow-amber-500/15 transform rotate-6 animate-pulse-soft"></div>
                            
                            <!-- Soft Deep Backlight Aura -->
                            <div class="absolute -top-6 -right-6 w-40 sm:w-48 h-40 sm:h-48 rounded-full bg-amber-300/30 blur-2xl"></div>
                            <div class="absolute -bottom-6 -left-6 w-40 sm:w-48 h-40 sm:h-48 rounded-full bg-[#192b56]/15 blur-2xl"></div>
                            <div class="absolute top-1/2 -left-4 w-28 h-28 rounded-full bg-teal-300/25 blur-xl"></div>
                        </div>

                        <!-- 2. Subtle Elegant Floating Accent Ornaments -->
                        <!-- A. Golden Star Accent (Top Right) -->
                        <div class="absolute -top-3 right-2 sm:right-4 text-amber-500 text-xl sm:text-2xl z-20 animate-pulse pointer-events-none">
                            <i class="ti ti-sparkles"></i>
                        </div>
                        
                        <!-- B. Subtle Geometric Accents (Teal & Navy) -->
                        <div class="absolute top-1/3 -left-3 sm:-left-5 w-6 h-6 rounded-lg bg-teal-500/10 border border-teal-500/30 flex items-center justify-center text-teal-600 text-xs z-20 shadow-sm pointer-events-none animate-bounce-slow">
                            <i class="ti ti-award"></i>
                        </div>
                        <div class="absolute bottom-24 -right-2 sm:-right-4 w-3 h-3 rounded-full bg-[#192b56]/60 shadow-sm pointer-events-none"></div>
                        <div class="absolute top-12 left-4 w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full bg-amber-400/80 shadow-sm pointer-events-none animate-ping" style="animation-duration: 3.5s;"></div>

                        <!-- 3. Floating Modern Micro-Badges -->
                        <!-- Badge A: Floating Leadership / Experience Badge (Top Left: z-0 di belakang foto agar tidak menutupi bahu/badan kepala sekolah) -->
                        <div class="absolute top-2 -left-4 sm:top-6 sm:-left-8 bg-white/95 backdrop-blur-md px-3 sm:px-3.5 py-1.5 sm:py-2 rounded-2xl shadow-xl border border-amber-200/80 flex items-center gap-2 sm:gap-2.5 animate-bounce-slow z-0 transform -rotate-3 hover:rotate-0 transition-transform max-w-[170px] sm:max-w-[210px]">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-gradient-to-tr from-amber-500 to-amber-400 text-white flex items-center justify-center text-xs sm:text-sm shadow-sm shrink-0">
                                <i class="ti ti-certificate"></i>
                            </div>
                            <div>
                                <div class="font-fredoka font-bold text-[10px] sm:text-xs text-[#192b56] leading-tight">
                                    Pendidikan Unggul
                                </div>
                                <div class="font-quicksand font-bold text-[8px] sm:text-[9px] text-amber-600 leading-tight">Berakhlak & Prestasi</div>
                            </div>
                        </div>

                        <!-- Badge B: Floating Qurani & Sains Badge (Bottom Right: z-20 di pojok kanan bawah) -->
                        <div class="absolute -bottom-3 -right-2 sm:-bottom-4 sm:-right-6 bg-white/95 backdrop-blur-md px-3 sm:px-3.5 py-1.5 sm:py-2 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-2 sm:gap-2.5 animate-bounce-slow z-20 transform rotate-2 hover:rotate-0 transition-transform" style="animation-delay: 1.2s;">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-blue-50 text-[#192b56] flex items-center justify-center text-xs sm:text-sm shadow-sm shrink-0">
                                <i class="ti ti-school"></i>
                            </div>
                            <div>
                                <div class="flex items-center gap-1">
                                    <span class="font-fredoka font-bold text-[10px] sm:text-xs text-[#192b56]">SDIT Al-Amin</span>
                                    <div class="flex text-[8px] text-amber-400">
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-filled"></i>
                                    </div>
                                </div>
                                <div class="font-quicksand font-bold text-[8px] sm:text-[9px] text-slate-400 leading-tight">Terakreditasi A</div>
                            </div>
                        </div>

                        <!-- 4. Foto Kepala Sekolah (Transparan Model Lepas atau Framed Modern) -->
                        @php
                            $fotoKepala = null;
                            if ($setting && $setting->prakata_custom_foto) {
                                $fotoKepala = $unit->getAdminImageUrl($setting->prakata_custom_foto);
                            } elseif ($kepalaSekolah && $kepalaSekolah->foto) {
                                $fotoKepala = $kepalaSekolah->getAdminImageUrl($kepalaSekolah->foto);
                            } elseif ($pengaturan && $pengaturan->model_2) {
                                $fotoKepala = $pengaturan->getAdminImageUrl($pengaturan->model_2);
                            }
                        @endphp

                        @if($fotoKepala)
                            <img 
                                src="{{ $fotoKepala }}" 
                                alt="{{ $setting->prakata_custom_nama ?? ($kepalaSekolah->nama_lengkap ?? 'Kepala Sekolah') }}" 
                                class="relative z-10 w-full max-w-[240px] sm:max-w-[290px] lg:max-w-[320px] max-h-[440px] h-auto object-contain drop-shadow-[0_20px_35px_rgba(25,43,86,0.18)] animate-float-gentle"
                            >
                        @else
                            <div class="relative z-10 w-[240px] sm:w-[280px] h-[340px] sm:h-[380px] rounded-3xl overflow-hidden border-4 border-white shadow-2xl bg-slate-100 flex items-center justify-center">
                                <img 
                                    src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=600&auto=format&fit=crop" 
                                    alt="Kepala Sekolah SDIT" 
                                    class="w-full h-full object-cover object-top"
                                >
                            </div>
                        @endif

                    </div>
                </div>

                <!-- Right: Sambutan -->
                <div class="lg:col-span-7 text-center lg:text-left" data-aos="fade-left">
                    <span class="font-fredoka font-bold text-xs text-amber-500 uppercase tracking-wider block mb-2">
                        {{ $setting->prakata_tag ?? 'SAMBUTAN KEPALA UNIT' }}
                    </span>
                    <h2 class="font-fredoka text-2xl sm:text-3xl lg:text-4xl font-bold text-[#192b56] leading-tight mb-4">
                        {{ $setting->prakata_title ?? 'Menyiapkan Generasi Pemimpin Berkarakter Robbani & Berdaya Saing Global' }}
                    </h2>

                    @if($setting && $setting->prakata_quote)
                        <div class="p-4 rounded-2xl bg-blue-50/70 border-l-4 border-[#192b56] font-quicksand font-bold text-[#192b56] text-xs sm:text-sm mb-4 text-left italic">
                            "{{ $setting->prakata_quote }}"
                        </div>
                    @endif

                    <div class="font-quicksand font-bold text-slate-600 text-xs sm:text-sm leading-relaxed space-y-3 mb-6 text-left">
                        @if($setting && $setting->prakata_content)
                            {!! nl2br(e($setting->prakata_content)) !!}
                        @else
                            <p>
                                <em>"Assalamu’alaikum Warahmatullahi Wabarakatuh."</em>
                            </p>
                            <p>
                                Puji syukur kita panjatkan ke hadirat Allah SWT. Selamat datang di portal resmi <strong>SDIT Al-Amin Sindangkasih</strong>. Kami meyakini bahwa usia sekolah dasar adalah fase krusial dalam menancapkan pondasi aqidah, kecintaan pada Al-Qur'an, dan pembentukan pola pikir ilmiah.
                            </p>
                            <p>
                                Dengan komitmen keterpaduan kurikulum nasional dan nilai-nilai kepesantrenan, kami mendidik santri agar tidak hanya cerdas secara akademis, namun memiliki jiwa mandiri, santun, dan siap menjadi teladan bagi lingkungannya.
                            </p>
                        @endif
                    </div>

                    <!-- Profile Signoff -->
                    <div class="inline-flex items-center gap-3 p-3 rounded-2xl bg-white border border-slate-200 text-left shadow-sm">
                        <div class="w-10 h-10 rounded-xl bg-[#192b56] text-amber-400 flex items-center justify-center text-lg">
                            <i class="ti ti-user"></i>
                        </div>
                        <div>
                            <h4 class="font-fredoka font-bold text-sm text-[#192b56]">
                                {{ $setting->prakata_custom_nama ?? ($kepalaSekolah->nama_lengkap ?? 'Nu\'man Ihsanda, S.Pd.I., M.Pd.') }}
                            </h4>
                            <span class="font-quicksand text-xs font-bold text-slate-400">
                                {{ $setting->prakata_custom_jabatan ?? 'Kepala Unit SDIT Al-Amin' }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- ==========================================
         3. OUR PROGRAMS (Mobile Slider & Desktop Grid)
         ========================================== -->
    @php
        $programs = (!empty($setting->custom_programs) && count($setting->custom_programs) > 0)
            ? $setting->custom_programs
            : [
                [
                    'title' => 'Tahfidz & Tahsin Al-Qur\'an',
                    'badge' => 'Kelas 1 - 6 • Target 3 Juz',
                    'desc'  => 'Bimbingan talaqqi tajwid makhraj, muroja\'ah harian berirama, dan sertifikasi tahfidz mutqin.',
                    'icon'  => 'ti ti-book-2',
                    'color' => 'teal',
                    'image' => 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=600&auto=format&fit=crop'
                ],
                [
                    'title' => 'Fun Science & Coding Robotik',
                    'badge' => 'Eksplorasi Teknologi',
                    'desc'  => 'Eksperimen sains aplikatif, logika pemecahan masalah, coding dasar, dan robotika ramah anak.',
                    'icon'  => 'ti ti-robot',
                    'color' => 'amber',
                    'image' => 'https://images.unsplash.com/photo-1581092921461-eab62e97a780?q=80&w=600&auto=format&fit=crop'
                ],
                [
                    'title' => 'Bilingual Language Day',
                    'badge' => 'Bahasa Arab & Inggris',
                    'desc'  => 'Pembiasaan percakapan harian dwibahasa melalui active storytelling, vocabulary cards, dan presentasi santri.',
                    'icon'  => 'ti ti-language',
                    'color' => 'blue',
                    'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=600&auto=format&fit=crop'
                ],
                [
                    'title' => 'Bina Karakter & Kepanduan SIT',
                    'badge' => 'Kemandirian & Adab',
                    'desc'  => 'Pramuka Sekolah Islam Terpadu, kemah ukhuwah, shalat dhuha berjamaah, dan pembiasaan adab mulia.',
                    'icon'  => 'ti ti-compass',
                    'color' => 'rose',
                    'image' => 'https://images.unsplash.com/photo-1529390079861-591de354faf5?q=80&w=600&auto=format&fit=crop'
                ],
            ];
    @endphp
    <section id="program" class="py-16 sm:py-20 lg:py-24 bg-slate-50/60 relative overflow-hidden" x-data="{ activeProgSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            
            <!-- Section Header (Left title, right link) -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 sm:mb-16">
                <div>
                    <span class="font-fredoka font-bold text-xs sm:text-sm text-teal-600 uppercase tracking-wider block mb-2">
                        {{ $setting->program_tag ?? 'OUR PROGRAMS' }}
                    </span>
                    <h2 class="font-fredoka text-2xl sm:text-4xl lg:text-[40px] font-bold text-[#192b56] leading-tight max-w-xl">
                        {{ $setting->program_title ?? 'Programs Designed for Every Stage of Growth' }}
                    </h2>
                </div>
                <div class="max-w-md text-left md:text-right">
                    <p class="font-quicksand font-bold text-xs sm:text-sm text-slate-500 mb-3">
                        {{ $setting->program_description ?? 'Kurikulum terpadu mendampingi ananda dari kelas 1 hingga 6 dengan stimulasi kognitif, hafalan Qur\'an mutqin, serta penguatan adab Islami.' }}
                    </p>
                    <a href="#biaya" class="inline-flex items-center gap-1.5 font-fredoka font-bold text-xs sm:text-sm text-[#192b56] hover:text-amber-500 transition-colors">
                        <span>Lihat Seluruh Kurikulum</span>
                        <i class="ti ti-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Mobile Swipe Hint -->
            <div class="flex items-center justify-center gap-1.5 text-[11px] font-fredoka text-slate-600 bg-white shadow-sm py-1.5 px-3 rounded-full w-fit mx-auto mb-4 md:hidden border border-slate-200/60">
                <i class="ti ti-hand-swipe text-sm animate-pulse text-amber-500"></i>
                <span>Geser untuk melihat program lainnya</span>
            </div>

            <!-- Program Cards: Mobile Slider (snap-x) & Desktop 4-Cols Grid -->
            <div 
                id="programSlider"
                class="flex md:grid md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-7 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-6 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar"
                @scroll="activeProgSlide = Math.round($el.scrollLeft / ($el.offsetWidth * 0.8))"
            >
                @foreach($programs as $idx => $p)
                    <div class="min-w-[82%] sm:min-w-[70%] md:min-w-0 snap-center bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group hover:-translate-y-1">
                        
                        <!-- Top Image & Floating Icon Container -->
                        <div class="relative h-48 sm:h-52 overflow-hidden bg-slate-100">
                            <img 
                                src="{{ !empty($p['image']) ? (str_starts_with($p['image'], 'http') ? $p['image'] : $unit->getAdminImageUrl($p['image'])) : 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=600&auto=format&fit=crop' }}" 
                                alt="{{ $p['title'] }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            >
                            
                            <!-- Floating Circular Icon Button -->
                            @php
                                $sditIcon = $p['icon'] ?? 'ti ti-star';
                                $sditIconClass = str_starts_with($sditIcon, 'ti ') ? $sditIcon : (str_starts_with($sditIcon, 'ti-') ? 'ti ' . $sditIcon : 'ti ti-' . $sditIcon);
                            @endphp
                            <div class="absolute -bottom-4 left-6 w-11 h-11 rounded-full bg-white shadow-md border border-slate-100 flex items-center justify-center text-lg z-10 {{ $idx == 0 ? 'text-teal-600' : ($idx == 1 ? 'text-amber-500' : ($idx == 2 ? 'text-blue-600' : 'text-rose-500')) }}">
                                <i class="{{ $sditIconClass }}"></i>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 pt-7 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="font-fredoka font-bold text-lg text-[#192b56] mb-1 group-hover:text-amber-500 transition-colors">
                                    {{ $p['title'] }}
                                </h3>
                                <span class="font-fredoka text-[11px] font-semibold text-slate-400 block mb-3">
                                    {{ $p['badge'] ?? 'Kelas 1 - 6' }}
                                </span>
                                <p class="font-quicksand font-semibold text-xs sm:text-sm text-slate-500 leading-relaxed mb-6">
                                    {{ $p['desc'] }}
                                </p>
                            </div>

                            <!-- Learn More Link -->
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                                <a href="#biaya" class="font-fredoka font-bold text-xs text-[#192b56] hover:text-amber-500 transition-colors inline-flex items-center gap-1">
                                    <span>Pelajari Rincian</span>
                                    <i class="ti ti-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Mobile Dots Indicator Only -->
            @if(count($programs) > 1)
                <div class="flex items-center justify-center gap-2 mt-4 md:hidden">
                    @foreach($programs as $pIdx => $pItem)
                        <button 
                            @click="document.getElementById('programSlider').scrollTo({ left: document.getElementById('programSlider').offsetWidth * 0.8 * {{ $pIdx }}, behavior: 'smooth' })" 
                            :class="activeProgSlide === {{ $pIdx }} ? 'w-6 bg-[#192b56]' : 'w-2 bg-slate-300'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Slide {{ $pIdx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif

        </div>
    </section>



    <!-- ==========================================
         4. STATS & COUNTER BAR (Tailored to SDIT Deep Navy Blue)
         ========================================== -->
    <section class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            <div class="bg-[#192b56] text-white rounded-3xl p-8 sm:p-12 shadow-xl shadow-blue-950/20 relative overflow-hidden">
                
                <div class="absolute top-4 left-6 text-amber-400/40 text-lg animate-pulse-soft">
                    <i class="ti ti-star-filled"></i>
                </div>
                <div class="absolute bottom-4 right-8 text-teal-400/40 text-xl animate-pulse-soft">
                    <i class="ti ti-sparkles"></i>
                </div>
                <div class="absolute top-1/2 right-1/4 w-2 h-2 rounded-full bg-pink-400/40"></div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 divide-y-2 md:divide-y-0 md:divide-x-2 divide-blue-800/60 text-center relative z-10">
                    
                    <div class="flex flex-col items-center pt-4 md:pt-0">
                        <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-amber-400 text-xl mb-3">
                            <i class="ti ti-mood-smile"></i>
                        </div>
                        <div class="font-fredoka text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight">
                            {{ $setting->stat_1_val ?? '15+' }}
                        </div>
                        <span class="font-quicksand font-bold text-xs sm:text-sm text-slate-300 mt-1">
                            {{ $setting->stat_1_label ?? 'Tahun Dedikasi' }}
                        </span>
                    </div>

                    <div class="flex flex-col items-center pt-4 md:pt-0">
                        <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-teal-400 text-xl mb-3">
                            <i class="ti ti-users"></i>
                        </div>
                        <div class="font-fredoka text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight">
                            {{ $setting->stat_2_val ?? '650+' }}
                        </div>
                        <span class="font-quicksand font-bold text-xs sm:text-sm text-slate-300 mt-1">
                            {{ $setting->stat_2_label ?? 'Santri & Alumni' }}
                        </span>
                    </div>

                    <div class="flex flex-col items-center pt-4 md:pt-0">
                        <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-rose-400 text-xl mb-3">
                            <i class="ti ti-heart"></i>
                        </div>
                        <div class="font-fredoka text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight">
                            {{ $setting->stat_3_val ?? '35+' }}
                        </div>
                        <span class="font-quicksand font-bold text-xs sm:text-sm text-slate-300 mt-1">
                            {{ $setting->stat_3_label ?? 'Dewan Guru & Hufadz' }}
                        </span>
                    </div>

                    <div class="flex flex-col items-center pt-4 md:pt-0">
                        <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-amber-400 text-xl mb-3">
                            <i class="ti ti-building-community"></i>
                        </div>
                        <div class="font-fredoka text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight">
                            {{ $setting->stat_4_val ?? 'A' }}
                        </div>
                        <span class="font-quicksand font-bold text-xs sm:text-sm text-slate-300 mt-1">
                            {{ $setting->stat_4_label ?? 'Akreditasi BAN-SM' }}
                        </span>
                    </div>

                </div>

            </div>
        </div>
    </section>



    <!-- ==========================================
         5. FASILITAS & SARANA BELAJAR (Mobile Slider & Desktop Grid)
         ========================================== -->
    @php
        $fasilitasItems = (!empty($setting->custom_fasilitas) && count($setting->custom_fasilitas) > 0)
            ? $setting->custom_fasilitas
            : [
                [
                    'tag' => 'RUANG KELAS',
                    'name' => 'Ruang Belajar Digital & Multimedia',
                    'desc' => 'Kelas ber-AC dilengkapi proyektor smart display, pencahayaan alami optimal, dan loker buku santri.',
                    'image' => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=600&auto=format&fit=crop'
                ],
                [
                    'tag' => 'LITERASI',
                    'name' => 'Perpustakaan & Pojok Baca Digital',
                    'desc' => 'Koleksi ribuan buku cerita edukatif, ensiklopedia Islam, dan akses literasi digital yang nyaman.',
                    'image' => 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=600&auto=format&fit=crop'
                ],
                [
                    'tag' => 'LABORATORIUM',
                    'name' => 'Laboratorium Komputer & Coding',
                    'desc' => 'Perangkat komputer terkini untuk pengenalan teknologi informasi, dasar koding, dan CBT asesmen.',
                    'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop'
                ],
                [
                    'tag' => 'IBADAH & OLAHRAGA',
                    'name' => 'Masjid Kampus & Lapangan Olahraga',
                    'desc' => 'Pusat pembinaan shalat berjamaah, pembiasaan dzikir pagi petang, serta lapangan olahraga multifungsi.',
                    'image' => 'https://images.unsplash.com/photo-1544717302-de2939b7ef71?q=80&w=600&auto=format&fit=crop'
                ]
            ];
    @endphp
    <section id="fasilitas" class="py-16 sm:py-20 bg-white relative overflow-hidden" x-data="{ activeFacSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12" data-aos="fade-up">
                <div>
                    <span class="font-fredoka font-bold text-xs sm:text-sm text-teal-600 uppercase tracking-wider block mb-2">
                        {{ $setting->fasilitas_tag ?? 'SARANA & PRASARANA' }}
                    </span>
                    <h2 class="font-fredoka text-2xl sm:text-4xl font-bold text-[#192b56] leading-tight max-w-xl">
                        {{ $setting->fasilitas_title ?? 'Fasilitas Belajar Representatif & Ramah Anak' }}
                    </h2>
                </div>
                <div class="max-w-md text-left md:text-right">
                    <p class="font-quicksand font-bold text-xs sm:text-sm text-slate-500">
                        {{ $setting->fasilitas_description ?? 'Didukung lingkungan kampus pesantren yang asri, tenang, aman, serta sarana modern untuk menunjang pembelajaran aktif.' }}
                    </p>
                </div>
            </div>

            <!-- Mobile Swipe Hint -->
            <div class="flex items-center justify-center gap-1.5 text-[11px] font-fredoka text-slate-600 bg-slate-50 border border-slate-200/70 py-1.5 px-3 rounded-full w-fit mx-auto mb-4 md:hidden">
                <i class="ti ti-hand-swipe text-sm animate-pulse text-teal-600"></i>
                <span>Geser untuk melihat fasilitas</span>
            </div>

            <!-- Fasilitas: Mobile Slider & Desktop 4-Cols Grid -->
            <div 
                id="fasilitasSlider"
                class="flex md:grid md:grid-cols-2 lg:grid-cols-4 gap-6 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-6 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar"
                @scroll="activeFacSlide = Math.round($el.scrollLeft / ($el.offsetWidth * 0.8))"
            >
                @foreach($fasilitasItems as $fIdx => $f)
                    <div class="min-w-[82%] sm:min-w-[70%] md:min-w-0 snap-center bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ ($fIdx + 1) * 80 }}">
                        <div class="h-44 sm:h-48 overflow-hidden relative bg-slate-100">
                            <img 
                                src="{{ !empty($f['image']) ? (str_starts_with($f['image'], 'http') ? $f['image'] : $unit->getAdminImageUrl($f['image'])) : 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=600&auto=format&fit=crop' }}" 
                                alt="{{ $f['name'] ?? 'Fasilitas SDIT' }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            >
                            <span class="absolute top-3 left-3 bg-[#192b56]/85 backdrop-blur-md text-amber-400 font-fredoka font-bold text-[9px] px-2.5 py-1 rounded-full uppercase tracking-wider shadow-sm">
                                {{ $f['tag'] ?? 'FASILITAS' }}
                            </span>
                        </div>
                        <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="font-fredoka font-bold text-base sm:text-lg text-[#192b56] mb-1.5 group-hover:text-amber-500 transition-colors">
                                    {{ $f['name'] }}
                                </h3>
                                <p class="font-quicksand font-semibold text-xs sm:text-sm text-slate-500 leading-relaxed">
                                    {{ $f['desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Mobile Dots Indicator Only -->
            @if(count($fasilitasItems) > 1)
                <div class="flex items-center justify-center gap-2 mt-4 md:hidden">
                    @foreach($fasilitasItems as $fDotIdx => $fDotItem)
                        <button 
                            @click="document.getElementById('fasilitasSlider').scrollTo({ left: document.getElementById('fasilitasSlider').offsetWidth * 0.8 * {{ $fDotIdx }}, behavior: 'smooth' })" 
                            :class="activeFacSlide === {{ $fDotIdx }} ? 'w-6 bg-[#192b56]' : 'w-2 bg-slate-300'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Fasilitas {{ $fDotIdx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif

        </div>
    </section>



    <!-- ==========================================
         6. TESTIMONIAL WALI SANTRI (Mobile Slider & Desktop 3-Cols Grid)
         ========================================== -->
    @php
        $testiData = (!empty($setting->custom_testimoni) && count($setting->custom_testimoni) > 0)
            ? $setting->custom_testimoni
            : [
                [
                    'nama' => 'Ibu Sarah Meilani, S.E.',
                    'role' => 'Orang Tua Santri Kelas 4 SDIT',
                    'quote' => 'SDIT Al-Amin memberikan suasana belajar yang sangat nyaman bagi putra kami. Perkembangan hafalannya sangat baik, akhlaknya santun di rumah, dan ustadz-ustadzahnya selalu komunikatif mendampingi setiap tahap belajarnya.'
                ],
                [
                    'nama' => 'Bpk. H. Rian Gunawan, S.T.',
                    'role' => 'Orang Tua dari Aisya Nurul Fikri (Kelas 2 SDIT)',
                    'quote' => 'Alhamdulillah, semenjak bersekolah di SDIT Al-Amin, ananda semakin mandiri dalam beribadah shalat dan hafalan juz 30-nya fasih berirama. Guru-gurunya sangat perhatian dan sabar.'
                ],
                [
                    'nama' => 'Bunda dr. Dian Pratiwi, Sp.A',
                    'role' => 'Orang Tua dari Fatih Al-Farabi (Kelas 5 SDIT)',
                    'quote' => 'Perpaduan seimbang antara tahfidz Al-Qur\'an dan kurikulum sains modern. Anak tidak jenuh karena pembelajarannya variatif, interaktif, dan lingkungan pertemanannya sangat positif.'
                ]
            ];
    @endphp
    <section id="testimoni" class="py-16 sm:py-20 lg:py-24 bg-[#fafbfc] relative overflow-hidden" x-data="{ activeTestiSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16" data-aos="fade-up">
                <span class="font-fredoka font-bold text-xs sm:text-sm text-teal-600 uppercase tracking-wider block mb-2">
                    {{ $setting->testimoni_tag ?? 'TESTIMONI WALI SANTRI' }}
                </span>
                <h2 class="font-fredoka text-2xl sm:text-4xl font-bold text-[#192b56] mb-3 leading-tight">
                    {{ $setting->testimoni_title ?? 'Apa Kata Ayah & Bunda?' }}
                </h2>
                <p class="font-quicksand font-bold text-xs sm:text-sm text-slate-500">
                    {{ $setting->testimoni_description ?? 'Pengalaman dan ketulusan para orang tua yang mempercayakan amanah pendidikan dasar buah hatinya di SDIT Al-Amin.' }}
                </p>
            </div>

            <!-- Mobile Swipe Hint -->
            <div class="flex items-center justify-center gap-1.5 text-[11px] font-fredoka text-slate-600 bg-white shadow-sm py-1.5 px-3 rounded-full w-fit mx-auto mb-4 md:hidden border border-slate-200/60">
                <i class="ti ti-hand-swipe text-sm animate-pulse text-amber-500"></i>
                <span>Geser untuk melihat testimoni lainnya</span>
            </div>

            <!-- Testimonials: Mobile Slider & Desktop 3-Cols Grid -->
            <div 
                id="testiSlider"
                class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-6 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar"
                @scroll="activeTestiSlide = Math.round($el.scrollLeft / ($el.offsetWidth * 0.85))"
            >
                @foreach($testiData as $tIdx => $t)
                    <div class="min-w-[85%] sm:min-w-[70%] md:min-w-0 snap-center bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between relative group" data-aos="fade-up" data-aos-delay="{{ ($tIdx + 1) * 80 }}">
                        
                        <!-- Top Quote Icon & 5 Stars -->
                        <div>
                            <div class="flex items-center justify-between mb-5">
                                <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center text-xl font-serif">
                                    “
                                </div>
                                <div class="flex text-amber-400 text-xs gap-0.5">
                                    <i class="ti ti-star-filled"></i>
                                    <i class="ti ti-star-filled"></i>
                                    <i class="ti ti-star-filled"></i>
                                    <i class="ti ti-star-filled"></i>
                                    <i class="ti ti-star-filled"></i>
                                </div>
                            </div>

                            <p class="font-quicksand font-bold text-xs sm:text-sm text-slate-700 leading-relaxed italic mb-6">
                                "{{ $t['quote'] }}"
                            </p>
                        </div>

                        <!-- Profile Info -->
                        <div class="flex items-center gap-3.5 pt-4 border-t border-slate-100">
                            <div class="w-11 h-11 rounded-full bg-[#192b56] text-amber-400 font-fredoka font-bold flex items-center justify-center text-base shadow-sm shrink-0">
                                {{ substr($t['nama'], 0, 1) }}
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="font-fredoka font-bold text-sm text-[#192b56] truncate">
                                    {{ $t['nama'] }}
                                </h4>
                                <p class="font-quicksand font-semibold text-[11px] text-slate-400 truncate">
                                    {{ $t['role'] }}
                                </p>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Mobile Dots Indicator Only -->
            @if(count($testiData) > 1)
                <div class="flex items-center justify-center gap-2 mt-4 md:hidden">
                    @foreach($testiData as $tDotIdx => $tDotItem)
                        <button 
                            @click="document.getElementById('testiSlider').scrollTo({ left: document.getElementById('testiSlider').offsetWidth * 0.85 * {{ $tDotIdx }}, behavior: 'smooth' })" 
                            :class="activeTestiSlide === {{ $tDotIdx }} ? 'w-6 bg-[#192b56]' : 'w-2 bg-slate-300'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Testimoni {{ $tDotIdx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif

        </div>
    </section>



    <!-- ==========================================
         7. DEWAN ASATIDZ & TENAGA PENDIDIK SDIT (Interactive Slider & Grid)
         ========================================== -->
    <section id="guru" class="py-16 sm:py-20 lg:py-24 bg-white relative overflow-hidden" x-data="{ 
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
                    <span class="font-fredoka font-bold text-xs sm:text-sm text-teal-600 uppercase tracking-wider block mb-2">
                        TENAGA PENDIDIK & HUFADZ
                    </span>
                    <h2 class="font-fredoka text-2xl sm:text-4xl font-bold text-[#192b56] mb-2">
                        Dewan Asatidz & Guru SDIT
                    </h2>
                    <p class="font-quicksand font-bold text-xs sm:text-sm text-slate-500 max-w-xl">
                        Pendidik tersertifikasi, hufadz mutqin, dan berdedikasi tinggi membersamai tumbuh kembang aqidah, akhlak, dan kecerdasan intelektual santri.
                    </p>
                </div>

                <!-- Slider Navigation Arrows -->
                @if(count($staff) > 1)
                    <div class="flex items-center gap-2">
                        <button 
                            @click="scroll(-1)" 
                            class="w-10 h-10 rounded-full bg-white border border-slate-200 text-slate-700 hover:text-[#192b56] hover:border-[#192b56] hover:bg-slate-50 shadow-sm flex items-center justify-center transition-all active:scale-95" 
                            aria-label="Previous Guru"
                        >
                            <i class="ti ti-chevron-left text-lg"></i>
                        </button>
                        <button 
                            @click="scroll(1)" 
                            class="w-10 h-10 rounded-full bg-[#192b56] text-white hover:bg-[#121f3f] shadow-md flex items-center justify-center transition-all active:scale-95" 
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
                @php
                    $badgeColors = [
                        ['bg' => 'bg-teal-50', 'text' => 'text-teal-700', 'border' => 'border-teal-200', 'badge' => 'bg-teal-600'],
                        ['bg' => 'bg-amber-50', 'text' => 'text-amber-700', 'border' => 'border-amber-200', 'badge' => 'bg-amber-500'],
                        ['bg' => 'bg-blue-50', 'text' => 'text-blue-700', 'border' => 'border-blue-200', 'badge' => 'bg-[#192b56]'],
                        ['bg' => 'bg-rose-50', 'text' => 'text-rose-700', 'border' => 'border-rose-200', 'badge' => 'bg-rose-500'],
                    ];
                @endphp

                @forelse($staff as $idx => $guru)
                    @php $color = $badgeColors[$idx % count($badgeColors)]; @endphp
                    <div class="guru-card min-w-[240px] sm:min-w-[260px] md:min-w-[280px] snap-start bg-white rounded-3xl border border-slate-100 p-5 text-center shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center group shrink-0" data-aos="fade-up" data-aos-delay="{{ ($idx + 1) * 60 }}">
                        
                        <!-- Teacher Photo with Curved Card -->
                        <div class="w-full h-52 sm:h-56 rounded-2xl {{ $color['bg'] }} overflow-hidden mb-4 shadow-sm relative flex items-center justify-center">
                            @if($guru->foto)
                                <img src="{{ $guru->getAdminImageUrl($guru->foto) }}" alt="{{ $guru->nama_lengkap }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 p-4">
                                    <div class="w-20 h-20 rounded-full bg-white shadow-sm flex items-center justify-center {{ $color['text'] }} mb-2 group-hover:scale-110 transition-transform">
                                        <i class="ti ti-user text-4xl"></i>
                                    </div>
                                    <span class="font-fredoka text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Asatidz SDIT</span>
                                </div>
                            @endif
                        </div>

                        <!-- Role Badge -->
                        <span class="inline-block px-3 py-1 rounded-full text-[9px] sm:text-[10px] font-fredoka font-bold {{ $color['badge'] }} text-white mb-2 shadow-sm">
                            {{ $guru->jabatan->nama_jabatan ?? 'Guru SDIT' }}
                        </span>

                        <!-- Teacher Name -->
                        <h3 class="font-fredoka font-bold text-sm sm:text-base text-[#192b56] line-clamp-1 leading-snug">
                            {{ $guru->nama_lengkap }}
                        </h3>

                        <p class="font-quicksand font-bold text-[10px] sm:text-[11px] text-slate-400 mt-1">
                            {{ $guru->pendidikan_terakhir ? 'Lulusan ' . $guru->pendidikan_terakhir : 'Pendidik Sekolah Dasar Islam' }}
                        </p>
                    </div>
                @empty
                    <div class="w-full py-12 text-center text-slate-400 italic">
                        Data dewan guru belum tersedia.
                    </div>
                @endforelse
            </div>

            <!-- Dots Indicator -->
            @if(count($staff) > 1)
                <div class="flex items-center justify-center gap-2 mt-4">
                    @foreach($staff->take(8) as $gIdx => $gItem)
                        <button 
                            @click="document.getElementById('guruSlider').scrollTo({ left: (document.getElementById('guruSlider').querySelector('.guru-card')?.offsetWidth + 24) * {{ $gIdx }}, behavior: 'smooth' })" 
                            :class="currentGuru === {{ $gIdx }} ? 'w-7 bg-[#192b56]' : 'w-2 bg-slate-300 hover:bg-slate-400'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Guru {{ $gIdx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif
        </div>
    </section>



    <!-- ==========================================
         7. BERITA & KEGIATAN SDIT (Seperti di TK, dengan Slider Mobile & Grid Desktop)
         ========================================== -->
    <section id="berita" class="py-16 sm:py-20 lg:py-24 bg-[#fafbfc] relative overflow-hidden" x-data="{ activeNewsSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-4 sm:gap-6" data-aos="fade-up">
                <div>
                    <div class="text-teal-600 font-fredoka font-bold text-xs sm:text-sm tracking-wide uppercase mb-2">
                        Dokumentasi & Kabar Terkini
                    </div>
                    <h2 class="font-fredoka text-2xl sm:text-4xl font-bold text-[#192b56]">
                        Berita & Kegiatan SDIT
                    </h2>
                </div>
                <a href="/berita" class="inline-flex items-center gap-2 text-xs font-fredoka font-bold text-[#192b56] hover:text-amber-500 uppercase tracking-wider transition-colors">
                    <span>Lihat Semua Berita</span>
                    <i class="ti ti-arrow-right text-base"></i>
                </a>
            </div>

            <!-- Mobile Swipe Hint -->
            <div class="flex items-center justify-center gap-1.5 text-[11px] font-fredoka text-slate-600 bg-slate-100 py-1.5 px-3 rounded-full w-fit mx-auto mb-4 md:hidden">
                <i class="ti ti-hand-swipe text-sm animate-pulse"></i>
                <span>Geser untuk melihat berita</span>
            </div>

            <!-- Blog Cards Grid & Slider -->
            <div 
                id="newsSlider"
                class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-6 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar"
                @scroll="activeNewsSlide = Math.round($el.scrollLeft / ($el.offsetWidth * 0.85))"
            >
                @forelse($news as $idx => $item)
                    <div class="min-w-[85%] sm:min-w-[70%] md:min-w-0 snap-center bg-white rounded-3xl border border-slate-100 p-5 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group {{ $loop->last && count($news) % 2 != 0 ? 'md:col-span-2 lg:col-span-1' : '' }}" data-aos="fade-up">
                        <div>
                            <!-- News Image -->
                            <div class="w-full h-44 sm:h-48 rounded-2xl overflow-hidden bg-slate-100 mb-4 relative">
                                <a href="{{ route('news.show', $item->slug) }}">
                                    <img src="{{ $item->getAdminImageUrl($item->image, 'posts') }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full bg-blue-50 flex items-center justify-center text-[#192b56]\'><i class=\'ti ti-photo text-4xl\'></i></div>';">
                                </a>
                                <div class="absolute top-3 left-3 bg-[#192b56] text-amber-400 font-fredoka font-bold text-[9px] sm:text-[10px] px-2.5 sm:px-3 py-1 rounded-full shadow-sm">
                                    {{ $item->created_at ? $item->created_at->translatedFormat('d M Y') : 'News' }}
                                </div>
                            </div>

                            <h3 class="font-fredoka font-bold text-base sm:text-lg text-[#192b56] group-hover:text-amber-500 transition-colors line-clamp-2 leading-snug mb-2">
                                <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                            </h3>

                            <p class="font-quicksand font-semibold text-slate-500 text-xs line-clamp-3 leading-relaxed mb-4 sm:mb-6">
                                {{ strip_tags($item->content) }}
                            </p>
                        </div>

                        <!-- Read More Link -->
                        <div class="pt-3.5 border-t border-slate-100 flex items-center justify-between">
                            <span class="font-fredoka text-[10px] sm:text-[11px] font-bold text-teal-600">
                                {{ $item->category->name ?? 'Kegiatan SDIT' }}
                            </span>
                            <a href="{{ route('news.show', $item->slug) }}" class="font-fredoka font-bold text-xs text-[#192b56] hover:text-amber-500 flex items-center gap-1 transition-colors">
                                <span>Baca Selengkapnya</span>
                                <i class="ti ti-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-slate-400 italic">
                        Belum ada artikel kegiatan SDIT.
                    </div>
                @endforelse
            </div>

            <!-- Mobile Slider Dots Indicator -->
            @if(count($news) > 1)
                <div class="flex items-center justify-center gap-2 mt-4 md:hidden">
                    @foreach($news as $nIdx => $nItem)
                        <button 
                            @click="document.getElementById('newsSlider').scrollTo({ left: document.getElementById('newsSlider').offsetWidth * 0.85 * {{ $nIdx }}, behavior: 'smooth' })" 
                            :class="activeNewsSlide === {{ $nIdx }} ? 'w-6 bg-[#192b56]' : 'w-2 bg-slate-300'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Berita {{ $nIdx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif
        </div>
    </section>



    <!-- ==========================================
         8. CALL TO ACTION BANNER (Clean, Elegant & Mobile-Friendly)
         ========================================== -->
    <section class="py-10 sm:py-14 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            
            <div class="bg-[#fef8eb] border border-amber-200/80 rounded-3xl sm:rounded-[2.5rem] p-6 sm:p-10 lg:p-12 flex flex-col md:flex-row items-center justify-between gap-6 sm:gap-8 relative overflow-hidden shadow-sm" data-aos="fade-up">
                
                <!-- Left: Smiling Sun Doodle + Title + Description -->
                <div class="flex flex-col sm:flex-row items-center sm:items-start md:items-center gap-4 sm:gap-6 text-center sm:text-left w-full md:w-auto">
                    <!-- Smiling Sun Doodle Icon -->
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-amber-200/60 text-amber-500 flex items-center justify-center text-3xl sm:text-4xl shrink-0 shadow-inner">
                        <i class="ti ti-sun animate-spin" style="animation-duration: 20s;"></i>
                    </div>
                    <div>
                        <h3 class="font-fredoka font-bold text-xl sm:text-2xl lg:text-3xl text-[#192b56] mb-1.5 leading-tight">
                            {{ $setting->cta_title ?? 'Ready to Get Started?' }}
                        </h3>
                        <p class="font-quicksand font-bold text-xs sm:text-sm text-slate-500 max-w-lg leading-relaxed">
                            {{ $setting->cta_description ?? 'Mari jadikan putra-putri tercinta bagian dari generasi Qur\'ani unggul di SDIT Al-Amin.' }}
                        </p>
                    </div>
                </div>

                <!-- Right: Action Buttons (Stacked full-width on mobile, neat pill on desktop) -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full md:w-auto shrink-0 font-fredoka">
                    <a href="{{ $setting->cta_button_url ?? '/register' }}" class="inline-flex items-center justify-center gap-2 px-6 sm:px-8 py-3.5 sm:py-4 rounded-full bg-[#192b56] hover:bg-[#121f3f] text-white font-bold text-xs sm:text-sm shadow-md shadow-blue-950/20 hover:shadow-xl transition-all transform hover:-translate-y-0.5 active:scale-95 text-center">
                        <i class="ti ti-calendar text-base text-amber-400"></i>
                        <span>{{ $setting->cta_button_text ?? 'Daftar Santri Baru Sekarang!' }}</span>
                    </a>

                    @if(!empty($setting->unit_whatsapp))
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->unit_whatsapp) }}?text={{ urlencode($setting->cta_wa_text ?? 'Halo Admin SDIT Al-Amin, saya ingin menanyakan pendaftaran santri baru.') }}" target="_blank" class="inline-flex items-center justify-center gap-2 px-5 sm:px-6 py-3.5 sm:py-4 rounded-full bg-white hover:bg-slate-50 text-emerald-600 border border-emerald-200/90 font-bold text-xs sm:text-sm shadow-sm hover:shadow-md transition-all active:scale-95 text-center">
                            <i class="ti ti-brand-whatsapp text-lg"></i>
                            <span>Chat WhatsApp</span>
                        </a>
                    @endif
                </div>

            </div>

        </div>
    </section>



    <!-- ==========================================
         7. RINCIAN BIAYA PENDIDIKAN (PPDB)
         ========================================== -->
    @if(isset($biayaList) && $biayaList->count() > 0)
    <section id="biaya" class="py-16 sm:py-20 bg-[#fafbfc] border-t border-slate-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <span class="font-fredoka font-bold text-xs text-teal-600 uppercase tracking-wider block mb-2">RINCIAN BIAYA PENDIDIKAN</span>
                <h2 class="font-fredoka text-2xl sm:text-3xl font-bold text-[#192b56]">Estimasi Biaya Masuk SDIT Al-Amin</h2>
                <p class="font-quicksand font-bold text-xs sm:text-sm text-slate-400 mt-1">Tahun Ajaran {{ $activePPDB->tahun_ajaran ?? '2026/2027' }} • Transparan & Bebas Pungutan Liar</p>
            </div>

            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden p-6 sm:p-8">
                <div class="divide-y divide-slate-100">
                    @php $totalBiaya = 0; @endphp
                    @foreach($biayaList as $b)
                        @php $totalBiaya += $b->jumlah; @endphp
                        <div class="py-3.5 flex items-center justify-between font-quicksand">
                            <span class="font-semibold text-xs sm:text-sm text-slate-600">{{ $b->jenis_biaya }}</span>
                            <span class="font-bold text-xs sm:text-sm text-[#192b56]">Rp {{ number_format($b->jumlah, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                    <div class="pt-4 mt-2 flex items-center justify-between font-fredoka border-t-2 border-[#192b56]">
                        <span class="font-bold text-sm sm:text-base text-[#192b56]">Total Estimasi Biaya</span>
                        <span class="font-bold text-base sm:text-xl text-teal-700">Rp {{ number_format($totalBiaya, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="mt-6 p-4 rounded-2xl bg-amber-50 border border-amber-200/70 text-center">
                    <p class="font-quicksand font-bold text-xs text-amber-900">
                        * Biaya dapat dicicil sesuai ketentuan panitia PSB. Tersedia jalur beasiswa tahfidz dan prestasi untuk santri berpotensi.
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endif

@endsection
