@extends('layouts.tk')

@section('title', 'TK Calisa Rabbani - Sekolah Ramah Anak & Berkarakter Qurani')
@section('meta_description', 'Official Landing Page TK Calisa Rabbani Pesantren Al-Amin Sindangkasih - Pendidikan Anak Usia Dini Berbasis Karakter Islami, Calistung Ceria, & Tahfidz Quran.')

@section('content')

    <!-- ==========================================
         1. HERO SECTION: Foto Model Transparan Tanpa Card Belakang
         ========================================== -->
    <section id="hero" class="relative pt-24 pb-14 sm:pt-32 sm:pb-20 lg:pt-36 lg:pb-28 bg-gradient-to-b from-[#fef8eb] via-[#fffdfa] to-white overflow-hidden">
        <!-- Playful Animated Sun & Subtle Glow -->
        <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden">
            <!-- Sun Top Left -->
            <div class="absolute top-16 left-4 sm:top-20 sm:left-10 w-16 h-16 sm:w-24 sm:h-24 text-amber-400 animate-sun opacity-60">
                <svg viewBox="0 0 100 100" fill="currentColor">
                    <circle cx="50" cy="50" r="22" fill="#fbbf24" />
                    <g stroke="#fbbf24" stroke-width="4" stroke-linecap="round">
                        <line x1="50" y1="12" x2="50" y2="22" /><line x1="50" y1="78" x2="50" y2="88" />
                        <line x1="12" y1="50" x2="22" y2="50" /><line x1="78" y1="50" x2="88" y2="50" />
                        <line x1="23" y1="23" x2="30" y2="30" /><line x1="70" y1="70" x2="77" y2="77" />
                        <line x1="23" y1="77" x2="30" y2="70" /><line x1="70" y1="30" x2="77" y2="23" />
                    </g>
                </svg>
            </div>
            <div class="absolute -top-32 -right-32 w-72 sm:w-[450px] lg:w-[500px] h-72 sm:h-[450px] lg:h-[500px] bg-amber-200/40 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 left-1/4 w-60 sm:w-[350px] lg:w-[400px] h-60 sm:h-[350px] lg:h-[400px] bg-teal-100/35 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Left Text Content (order-2 on mobile, order-1 on desktop) -->
                <div class="lg:col-span-7 text-center lg:text-left order-2 lg:order-1" data-aos="fade-right">
                    
                    <!-- Authentic Editorial Tag / Badge -->
                    <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-2xl bg-white/90 border border-amber-200/80 shadow-sm mb-6">
                        <div class="w-6 h-6 rounded-lg bg-amber-400 text-amber-950 flex items-center justify-center text-xs shadow-inner">
                            <i class="ti ti-sparkles"></i>
                        </div>
                        <span class="font-fredoka font-semibold text-xs tracking-wider text-slate-700 uppercase">
                            {{ $setting->hero_tag ?? ('Tahun Ajaran ' . ($activePPDB->tahun_ajaran ?? date('Y').'/'.(date('Y')+1)) . ' • Penerimaan Santri Baru') }}
                        </span>
                    </div>

                    <h1 class="font-fredoka text-3xl sm:text-5xl lg:text-[56px] font-bold text-slate-800 leading-[1.12] mb-4 sm:mb-6">
                        @if($setting && $setting->hero_title_prefix)
                            {{ $setting->hero_title_prefix }} <br class="hidden sm:inline">
                            <span class="text-teal-500">{{ $setting->hero_title_highlight ?? 'Qurani' }}</span><span class="text-amber-500">!</span>
                        @else
                            Tumbuh Ceria, Mandiri, & <br class="hidden sm:inline">
                            <span class="text-teal-500">Berkarakter</span> <span class="text-pink-500">Qur'ani</span><span class="text-amber-500">!</span>
                        @endif
                    </h1>

                    <p class="font-quicksand font-bold text-slate-500 text-sm sm:text-base lg:text-lg leading-relaxed mb-6 sm:mb-8 max-w-xl mx-auto lg:mx-0">
                        {{ $setting->hero_description ?? 'TK Calisa Rabbani menghadirkan suasana belajar usia dini yang ramah anak, memadukan stimulasi motorik kreatif, tahfidz Juz 30 berirama, dan calistung ceria tanpa paksaan.' }}
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-center lg:justify-start gap-3 sm:gap-4">
                        <a href="/register" class="px-6 sm:px-8 py-3.5 sm:py-4 bg-gradient-to-r from-amber-500 via-orange-500 to-amber-600 hover:from-amber-600 hover:to-orange-600 text-white font-fredoka font-bold text-xs sm:text-sm rounded-full shadow-lg shadow-amber-500/30 hover:scale-105 active:scale-95 transition-all flex items-center justify-center gap-2">
                            <span>Daftar Santri Baru</span>
                            <i class="ti ti-arrow-right text-base sm:text-lg"></i>
                        </a>
                        <a href="#biaya" class="px-5 sm:px-7 py-3.5 sm:py-4 bg-white hover:bg-slate-50 text-slate-700 font-fredoka font-bold text-xs sm:text-sm rounded-full border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center justify-center gap-2">
                            <i class="ti ti-receipt-2 text-amber-500 text-base sm:text-lg"></i>
                            <span>Investasi Biaya</span>
                        </a>
                    </div>

                    <!-- Highlight Badges -->
                    <div class="grid grid-cols-3 gap-2 sm:gap-4 mt-8 sm:mt-10 pt-6 sm:pt-8 border-t border-slate-200/60 max-w-lg mx-auto lg:mx-0 font-fredoka">
                        <div class="text-center lg:text-left">
                            <div class="text-xl sm:text-2xl lg:text-3xl font-bold text-amber-500">{{ $setting->stat_1_val ?? '100%' }}</div>
                            <div class="font-quicksand text-[10px] sm:text-xs font-bold text-slate-400 uppercase mt-0.5">{{ $setting->stat_1_label ?? 'Ramah Anak' }}</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-xl sm:text-2xl lg:text-3xl font-bold text-teal-500">{{ $setting->stat_2_val ?? 'Juz 30' }}</div>
                            <div class="font-quicksand text-[10px] sm:text-xs font-bold text-slate-400 uppercase mt-0.5">{{ $setting->stat_2_label ?? 'Tahfidz Ceria' }}</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-xl sm:text-2xl lg:text-3xl font-bold text-pink-500">{{ $setting->stat_3_val ?? 'Sentra' }}</div>
                            <div class="font-quicksand text-[10px] sm:text-xs font-bold text-slate-400 uppercase mt-0.5">{{ $setting->stat_3_label ?? 'Kreativitas' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Right Visual: Model Transparan Berdiri Sendiri (order-1 on mobile, order-2 on desktop) -->
                <div class="lg:col-span-5 relative flex justify-center items-end mt-2 mb-6 lg:mt-0 lg:mb-0 order-1 lg:order-2" data-aos="fade-left">
                    <div class="relative w-full max-w-[280px] sm:max-w-sm lg:max-w-md flex justify-center">
                        
                        <!-- Floating Cute Playful Sticker Badge (DI BELAKANG FOTO: z-0) -->
                        <div class="absolute top-2 -left-4 sm:top-6 sm:-left-12 lg:top-8 lg:-left-16 bg-white/95 backdrop-blur-md px-2.5 sm:px-3.5 py-2 sm:py-3 rounded-2xl shadow-lg border border-amber-200 animate-bounce-gentle z-0 flex items-center gap-2 sm:gap-3 transform -rotate-3 hover:rotate-0 transition-transform max-w-[175px] sm:max-w-[210px] lg:max-w-none">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-gradient-to-tr from-amber-400 via-orange-400 to-amber-500 text-white flex items-center justify-center text-sm sm:text-lg shadow-sm shrink-0">
                                <i class="{{ $setting->hero_badge_icon ?? 'ti ti-palette' }}"></i>
                            </div>
                            <div>
                                <div class="flex items-center gap-1 mb-0.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span class="font-fredoka font-semibold text-[8px] sm:text-[10px] text-amber-900 uppercase tracking-wider">{{ $unit->nama_unit ?? 'TK Calisa Rabbani' }}</span>
                                </div>
                                <div class="font-fredoka font-bold text-[11px] sm:text-xs text-slate-800 leading-tight">
                                    {{ $setting->hero_badge_text ?? 'Pendaftaran Baru' }}
                                </div>
                                <div class="mt-0.5 inline-flex items-center gap-1 px-2 py-0.5 bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-fredoka font-bold text-[8px] sm:text-[9px] rounded-full uppercase tracking-wider shadow-sm">
                                    <span>{{ $setting->hero_badge_status ?? 'Buka Sekarang' }}</span>
                                    <i class="ti ti-sparkles text-[8px]"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Activity Badge (Pojok Kanan Bawah Model: z-20) -->
                        <div class="absolute bottom-2 -right-2 sm:bottom-4 sm:-right-4 lg:bottom-6 lg:-right-10 bg-white/95 backdrop-blur-sm px-2.5 sm:px-3.5 py-1.5 sm:py-2.5 rounded-2xl shadow-lg border border-amber-100 flex items-center gap-2 sm:gap-2.5 animate-bounce-gentle z-20">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-sm sm:text-base">
                                <i class="ti ti-mood-smile"></i>
                            </div>
                            <div>
                                <div class="font-fredoka font-bold text-[10px] sm:text-xs text-slate-800">Fun & Play</div>
                                <div class="font-quicksand font-bold text-[8px] sm:text-[10px] text-slate-400">Belajar Ceria</div>
                            </div>
                        </div>

                        <!-- Model Foto Transparan Langsung (DI DEPAN BADGE: z-10) -->
                        <img 
                            src="{{ ($setting && $setting->hero_model_image) ? $unit->getAdminImageUrl($setting->hero_model_image) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_1) : 'https://placehold.co/500x650?text=Model+Kids') }}" 
                            alt="Santri Cilik TK" 
                            class="relative z-10 w-full max-w-[260px] sm:max-w-[340px] lg:max-w-[420px] h-auto object-contain drop-shadow-[0_20px_30px_rgba(0,0,0,0.12)] animate-float-model"
                        >
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- ==========================================
         2. PRAKATA KEPALA SEKOLAH
         ========================================== -->
    <section id="prakata" class="py-16 sm:py-20 lg:py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                
                <!-- Left: Foto Kepala Sekolah / Model Transparan Berdiri Bebas dengan Ornamen Lucu Warna-Warni -->
                <div class="lg:col-span-5 relative flex justify-center items-center order-1" data-aos="fade-right">
                    <div class="relative w-full max-w-[270px] sm:max-w-xs lg:max-w-sm flex justify-center mb-8 lg:mb-0">
                        
                        <!-- Dreamy Colorful Ambient Glow Shadows (DI BELAKANG FOTO: z-0, Blur Halus Tanpa Border/Lingkaran Keras) -->
                        <div class="absolute inset-0 pointer-events-none z-0 flex items-center justify-center">
                            <!-- Center Multi-Color Soft Blend Shadow -->
                            <div class="w-60 h-72 sm:w-72 sm:h-88 rounded-full bg-gradient-to-tr from-amber-200/45 via-pink-200/40 to-teal-200/45 blur-3xl transform scale-110"></div>
                            <!-- Warm Amber/Yellow Glow (Bottom Left) -->
                            <div class="absolute -bottom-8 -left-8 w-44 h-44 sm:w-52 sm:h-52 rounded-full bg-amber-300/45 blur-2xl"></div>
                            <!-- Fresh Mint Teal Glow (Top Right) -->
                            <div class="absolute -top-10 -right-8 w-44 h-44 sm:w-52 sm:h-52 rounded-full bg-teal-300/40 blur-2xl"></div>
                            <!-- Sweet Pink Glow (Mid Left) -->
                            <div class="absolute top-1/4 -left-10 w-40 h-40 sm:w-48 sm:h-48 rounded-full bg-pink-300/45 blur-2xl"></div>
                        </div>

                        <!-- Ornamen Doodle Kartun Lucu (z-20 di sekeliling model) -->
                        <!-- A. Pelangi Lucu Mini (Top Right) -->
                        <div class="absolute -top-6 -right-3 sm:-top-8 sm:-right-6 w-16 h-14 sm:w-20 sm:h-16 z-20 animate-bounce-gentle pointer-events-none" style="animation-delay: 0.4s;">
                            <svg viewBox="0 0 100 70" class="w-full h-full drop-shadow-sm">
                                <path d="M 15,65 A 35,35 0 0,1 85,65" fill="none" stroke="#f43f5e" stroke-width="6.5" stroke-linecap="round" />
                                <path d="M 22,65 A 28,28 0 0,1 78,65" fill="none" stroke="#fbbf24" stroke-width="6.5" stroke-linecap="round" />
                                <path d="M 29,65 A 21,21 0 0,1 71,65" fill="none" stroke="#10b981" stroke-width="6.5" stroke-linecap="round" />
                                <path d="M 36,65 A 14,14 0 0,1 64,65" fill="none" stroke="#38bdf8" stroke-width="6.5" stroke-linecap="round" />
                                <!-- Awan mini pelangi kiri -->
                                <circle cx="16" cy="64" r="8" fill="#ffffff" />
                                <circle cx="23" cy="61" r="9" fill="#ffffff" />
                                <!-- Awan mini pelangi kanan -->
                                <circle cx="77" cy="61" r="9" fill="#ffffff" />
                                <circle cx="84" cy="64" r="8" fill="#ffffff" />
                            </svg>
                        </div>

                        <!-- B. Bunga Ceria Daisy (Top Left) -->
                        <div class="absolute -top-4 left-3 sm:-top-6 sm:left-1 w-10 h-10 sm:w-12 sm:h-12 z-20 animate-bounce-gentle pointer-events-none" style="animation-delay: 1.1s;">
                            <svg viewBox="0 0 100 100" class="w-full h-full drop-shadow-sm">
                                <circle cx="50" cy="27" r="16" fill="#f472b6" />
                                <circle cx="72" cy="43" r="16" fill="#f472b6" />
                                <circle cx="64" cy="69" r="16" fill="#f472b6" />
                                <circle cx="36" cy="69" r="16" fill="#f472b6" />
                                <circle cx="28" cy="43" r="16" fill="#f472b6" />
                                <circle cx="50" cy="50" r="14" fill="#f59e0b" />
                                <circle cx="46" cy="46" r="3" fill="#ffffff" />
                            </svg>
                        </div>

                        <!-- C. Bintang Kartun Tersenyum (Right Mid) -->
                        <div class="absolute top-1/3 -right-5 sm:-right-7 w-8 h-8 sm:w-10 sm:h-10 z-20 animate-pulse pointer-events-none">
                            <svg viewBox="0 0 100 100" class="w-full h-full drop-shadow-sm">
                                <path d="M 50,5 L 62,38 L 97,42 L 70,66 L 78,100 L 50,81 L 22,100 L 30,66 L 3,42 L 38,38 Z" fill="#fbbf24" stroke="#f59e0b" stroke-width="3" stroke-linejoin="round" />
                                <circle cx="43" cy="49" r="3" fill="#78350f" />
                                <circle cx="57" cy="49" r="3" fill="#78350f" />
                                <path d="M 45,56 Q 50,61 55,56" fill="none" stroke="#78350f" stroke-width="2.5" stroke-linecap="round" />
                            </svg>
                        </div>

                        <!-- D. Kilauan Bintang Pink & Teal (Sparkles) -->
                        <div class="absolute bottom-20 -left-5 sm:-left-7 w-7 h-7 sm:w-8 sm:h-8 z-20 animate-pulse pointer-events-none" style="animation-delay: 0.7s;">
                            <svg viewBox="0 0 24 24" class="w-full h-full text-pink-400 drop-shadow-sm" fill="currentColor">
                                <path d="M12 2L14.5 9.5L22 12L14.5 14.5L12 22L9.5 14.5L2 12L9.5 9.5L12 2Z" />
                            </svg>
                        </div>
                        <div class="absolute top-1/2 -left-4 sm:-left-5 w-5 h-5 sm:w-6 sm:h-6 z-20 animate-pulse pointer-events-none" style="animation-delay: 1.4s;">
                            <svg viewBox="0 0 24 24" class="w-full h-full text-teal-400 drop-shadow-sm" fill="currentColor">
                                <path d="M12 2L14 10L22 12L14 14L12 22L10 14L2 12L10 10L12 2Z" />
                            </svg>
                        </div>

                        <!-- E. Confetti Dots Polka Warna-Warni Melayang -->
                        <div class="absolute top-14 right-1 w-3 h-3 rounded-full bg-pink-400/90 shadow-sm pointer-events-none animate-ping" style="animation-duration: 3s;"></div>
                        <div class="absolute bottom-28 -right-2 w-3.5 h-3.5 rounded-full bg-amber-400/90 shadow-sm pointer-events-none"></div>
                        <div class="absolute bottom-10 left-3 w-2.5 h-2.5 rounded-full bg-teal-400/90 pointer-events-none"></div>
                        <div class="absolute top-24 left-1 w-2.5 h-2.5 rounded-full bg-purple-400/80 pointer-events-none"></div>
                        <div class="absolute -top-1 right-20 w-3 h-3 rounded-full bg-rose-400/80 pointer-events-none"></div>

                        <!-- 3. Floating Badges (z-20) -->
                        <!-- Floating Since/Dedicated Badge (Top Left) -->
                        <div class="absolute top-5 -left-3 sm:top-8 sm:-left-5 w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-tr from-amber-400 to-amber-300 border-4 border-white shadow-lg flex flex-col items-center justify-center text-amber-950 font-fredoka leading-none z-20 transform -rotate-6 hover:rotate-0 transition-transform">
                            <span class="text-[9px] sm:text-[10px] font-bold uppercase tracking-wider">Dedicated</span>
                            <span class="text-sm sm:text-base font-extrabold mt-0.5">2009</span>
                        </div>

                        <!-- Floating Loving Teacher Badge (Bottom Right) -->
                        <div class="absolute -bottom-3 -right-2 sm:-bottom-4 sm:-right-5 bg-white/95 backdrop-blur-md px-3 sm:px-3.5 py-1.5 sm:py-2 rounded-2xl shadow-lg border-2 border-amber-200/90 flex items-center gap-2 sm:gap-2.5 animate-bounce-gentle z-20 transform rotate-2 hover:rotate-0 transition-transform">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-gradient-to-tr from-pink-400 to-rose-500 text-white flex items-center justify-center text-xs sm:text-sm shadow-sm shrink-0">
                                <i class="ti ti-heart-handshake"></i>
                            </div>
                            <div>
                                <div class="flex items-center gap-1">
                                    <span class="font-fredoka font-bold text-[10px] sm:text-xs text-slate-800">Guru Ramah</span>
                                    <div class="flex text-[8px] sm:text-[9px] text-amber-400">
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-filled"></i>
                                    </div>
                                </div>
                                <div class="font-quicksand font-bold text-[8px] sm:text-[9px] text-pink-600">Penuh Kasih Sayang</div>
                            </div>
                        </div>

                        <!-- 4. Foto Kepala Sekolah Transparan (z-10 di atas blob) -->
                        @if($setting && $setting->prakata_custom_foto)
                            <img 
                                src="{{ $unit->getAdminImageUrl($setting->prakata_custom_foto) }}" 
                                alt="{{ $setting->prakata_custom_nama ?? 'Kepala Sekolah' }}" 
                                class="relative z-10 w-full max-w-[240px] sm:max-w-[300px] h-auto object-contain drop-shadow-[0_18px_25px_rgba(0,0,0,0.12)] animate-float-model"
                            >
                        @elseif($kepalaSekolah && $kepalaSekolah->foto)
                            <img 
                                src="{{ $kepalaSekolah->getAdminImageUrl($kepalaSekolah->foto) }}" 
                                alt="{{ $kepalaSekolah->nama_lengkap }}" 
                                class="relative z-10 w-full max-w-[240px] sm:max-w-[300px] h-auto object-contain drop-shadow-[0_18px_25px_rgba(0,0,0,0.12)] animate-float-model"
                            >
                        @else
                            <img 
                                src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_2) : 'https://placehold.co/400x550?text=Kepala+Sekolah' }}" 
                                alt="Kepala Unit TK" 
                                class="relative z-10 w-full max-w-[240px] sm:max-w-[320px] h-auto object-contain drop-shadow-[0_18px_25px_rgba(0,0,0,0.12)] animate-float-model"
                            >
                        @endif
                    </div>
                </div>

                <!-- Right: Sambutan & Prakata (order-2 on mobile & desktop) -->
                <div class="lg:col-span-7 order-2 text-center lg:text-left" data-aos="fade-left">
                    <div class="inline-block text-amber-600 font-fredoka font-semibold text-xs sm:text-sm tracking-wide mb-2">
                        {{ $setting->prakata_tag ?? 'Prakata Kepala Sekolah' }}
                    </div>

                    <h2 class="font-fredoka text-2xl sm:text-4xl lg:text-[40px] font-bold text-slate-800 leading-tight mb-4">
                        {{ $setting->prakata_title ?? 'Membangun Pondasi Emas Generasi Rabbani Sejak Dini' }}
                    </h2>

                    @if($setting && $setting->prakata_quote)
                        <div class="p-3 sm:p-4 rounded-2xl bg-amber-50/70 border-l-4 border-amber-400 font-quicksand font-bold text-amber-900 text-xs sm:text-sm mb-4 text-left italic">
                            "{{ $setting->prakata_quote }}"
                        </div>
                    @endif

                    <div class="font-quicksand font-bold text-slate-600 text-xs sm:text-sm lg:text-base leading-relaxed space-y-3 sm:space-y-4 mb-6 sm:mb-8 text-left">
                        @if($setting && $setting->prakata_content)
                            {!! nl2br(e($setting->prakata_content)) !!}
                        @else
                            <p>
                                <em>"Assalamu’alaikum Warahmatullahi Wabarakatuh."</em>
                            </p>
                            <p>
                                Selamat datang di <strong>TK Calisa Rabbani Pesantren Persatuan Islam 80 Al-Amin</strong>. Kami meyakini bahwa setiap anak lahir dengan fitrah kebaikan dan potensi luar biasa. Pada fase usia emas (<em>golden age</em>), pendekatan kasih sayang, keteladanan adab, dan stimulasi multi-kecerdasan menjadi kunci tumbuh kembang yang optimal.
                            </p>
                            <p>
                                Bersama para asatidzah yang sabar dan penuh dedikasi, kami berkomitmen mendampingi putra-putri tercinta agar mencintai Al-Qur'an, memiliki sopan santun yang luhur, berani bereksplorasi, serta siap melangkah ke jenjang pendidikan selanjutnya dengan gembira dan percaya diri.
                            </p>
                        @endif
                    </div>

                    <!-- Profil Singkat Kepala Sekolah -->
                    <div class="flex items-center gap-3 sm:gap-4 p-3.5 sm:p-4 rounded-2xl bg-[#fffbf5] border border-amber-200/80 max-w-md mx-auto lg:mx-0 text-left">
                        <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-amber-500 text-white flex items-center justify-center font-fredoka font-bold text-lg sm:text-xl shadow-md shrink-0">
                            {{ substr(($setting->prakata_custom_nama ?? ($kepalaSekolah->nama_lengkap ?? 'L')), 0, 1) }}
                        </div>
                        <div>
                            <h4 class="font-fredoka font-bold text-slate-800 text-sm sm:text-base leading-snug">
                                {{ $setting->prakata_custom_nama ?? ($kepalaSekolah->nama_lengkap ?? 'Lela Siti Sophiah, S.H.I') }}
                            </h4>
                            <span class="font-quicksand font-bold text-[11px] sm:text-xs text-amber-700">
                                {{ $setting->prakata_custom_jabatan ?? 'Kepala Unit TK Calisa Rabbani' }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- ==========================================
         3. PROGRAM UNGGULAN TK (Slider di Mobile & Grid di Desktop)
         ========================================== -->
    <section id="program-unggulan" class="py-16 sm:py-20 lg:py-24 bg-[#fdfbf7] relative overflow-hidden" x-data="{ activeSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <!-- Header -->
            <div class="text-center max-w-xl mx-auto mb-8 sm:mb-16" data-aos="fade-up">
                <div class="text-amber-600 font-fredoka font-semibold text-xs sm:text-sm tracking-wide mb-2">
                    {{ $setting->program_tag ?? 'Kurikulum & Pembelajaran' }}
                </div>
                <h2 class="font-fredoka text-2xl sm:text-4xl font-bold text-slate-800 mb-2 sm:mb-3">
                    {{ $setting->program_title ?? 'Program Unggulan TK' }}
                </h2>
                <p class="font-quicksand font-bold text-slate-500 text-xs sm:text-sm">
                    {{ $setting->program_description ?? "Kombinasi kurikulum PAUD terpadu, penanaman nilai tauhid, tahfidz Al-Qur'an, dan stimulasi motorik ramah anak." }}
                </p>
            </div>

            <!-- Mobile Swipe Hint -->
            <div class="flex items-center justify-center gap-1.5 text-[11px] font-fredoka text-amber-700 bg-amber-100/60 py-1.5 px-3 rounded-full w-fit mx-auto mb-4 md:hidden">
                <i class="ti ti-hand-swipe text-sm animate-pulse"></i>
                <span>Geser untuk melihat program</span>
            </div>

            <!-- 3 Notepad/Polaroid Cards: Mobile Horizontal Slider (snap-x) & Desktop 3-Cols Grid -->
            <div 
                id="programSlider"
                class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-8 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-6 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar"
                @scroll="activeSlide = Math.round($el.scrollLeft / ($el.offsetWidth * 0.85))"
            >
                @php
                    $defaultPrograms = [
                        [
                            'title' => 'Tahfidz & Doa Harian',
                            'badge' => 'Target: Juz 30',
                            'desc' => 'Bimbingan hafalan surat-surat pendek, doa harian, dan hadits adab dengan metode talaqqi ceria berirama.',
                            'item_1' => 'Talaqqi',
                            'item_2' => 'Tahsin & Adab',
                            'icon' => 'ti ti-book-2',
                            'image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=600&auto=format&fit=crop',
                        ],
                        [
                            'title' => 'Calistung Ceria (Fun Literacy)',
                            'badge' => 'Usia: 3-6 Tahun',
                            'desc' => 'Mengenal huruf, kata, membaca suku kata, dan berhitung angka melalui permainan edukatif yang mengasyikkan.',
                            'item_1' => 'Sentra',
                            'item_2' => 'Interaktif',
                            'icon' => 'ti ti-pencil',
                            'image' => 'https://images.unsplash.com/photo-1544717302-de2939b7ef71?q=80&w=600&auto=format&fit=crop',
                        ],
                        [
                            'title' => 'Adab, Motorik & Outing Class',
                            'badge' => 'Karakter Rabbani',
                            'desc' => 'Praktek shalat dhuha bersama, pembiasaan kemandirian, senam motorik, manasik haji cilik, dan eksplorasi alam terbuka.',
                            'item_1' => 'Harian',
                            'item_2' => 'Outbound',
                            'icon' => 'ti ti-compass',
                            'image' => 'https://images.unsplash.com/photo-1596495578065-6e0763fa1178?q=80&w=600&auto=format&fit=crop',
                        ],
                    ];

                    $programStyles = [
                        ['bg' => 'bg-[#f0f9ff]', 'border' => 'border-sky-100', 'badge_bg' => 'bg-sky-500', 'title_hover' => 'group-hover:text-sky-600', 'border_b' => 'border-sky-200/60', 'icon_bg' => 'bg-sky-400', 'dot' => 'bg-sky-500'],
                        ['bg' => 'bg-[#f0fdf4]', 'border' => 'border-emerald-100', 'badge_bg' => 'bg-emerald-500', 'title_hover' => 'group-hover:text-emerald-600', 'border_b' => 'border-emerald-200/60', 'icon_bg' => 'bg-emerald-400', 'dot' => 'bg-emerald-500'],
                        ['bg' => 'bg-[#fdf2f8]', 'border' => 'border-pink-100', 'badge_bg' => 'bg-pink-500', 'title_hover' => 'group-hover:text-pink-600', 'border_b' => 'border-pink-200/60', 'icon_bg' => 'bg-pink-400', 'dot' => 'bg-pink-500'],
                    ];

                    $programList = (!empty($setting->custom_programs) && count($setting->custom_programs) > 0)
                        ? $setting->custom_programs
                        : $defaultPrograms;
                @endphp

                @foreach($programList as $pIdx => $pVal)
                    @php
                        $pStyle = $programStyles[$pIdx % count($programStyles)];
                        $pImage = !empty($pVal['image']) 
                            ? (str_starts_with($pVal['image'], 'http') ? $pVal['image'] : $unit->getAdminImageUrl($pVal['image']))
                            : 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=600&auto=format&fit=crop';
                    @endphp
                    <div class="min-w-[85%] sm:min-w-[70%] md:min-w-0 snap-center {{ $pStyle['bg'] }} rounded-[2rem] sm:rounded-[2.5rem] border {{ $pStyle['border'] }} p-5 sm:p-6 shadow-sm flex flex-col justify-between group hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 {{ $loop->last && count($programList) % 2 != 0 ? 'md:col-span-2 lg:col-span-1' : '' }}" data-aos="fade-up" data-aos-delay="{{ ($pIdx + 1) * 100 }}">
                        <div>
                            <div class="w-full h-44 sm:h-52 rounded-2xl sm:rounded-3xl overflow-hidden bg-white mb-5 sm:mb-6 shadow-inner relative">
                                <img src="{{ $pImage }}" alt="{{ $pVal['title'] ?? 'Program' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @if(!empty($pVal['badge']))
                                    <div class="absolute bottom-3 left-3 {{ $pStyle['badge_bg'] }} text-white font-fredoka font-bold text-[10px] sm:text-[11px] px-3 py-1 rounded-full shadow-sm">
                                        {{ $pVal['badge'] }}
                                    </div>
                                @endif
                            </div>

                            <h3 class="font-fredoka font-bold text-lg sm:text-xl text-slate-800 mb-2 {{ $pStyle['title_hover'] }} transition-colors">
                                {{ $pVal['title'] ?? 'Nama Program' }}
                            </h3>
                            <p class="font-quicksand font-semibold text-slate-500 text-xs leading-relaxed mb-5 sm:mb-6">
                                {{ $pVal['desc'] ?? '' }}
                            </p>

                            @if(!empty($pVal['item_1']) || !empty($pVal['item_2']))
                                <div class="flex items-center gap-4 sm:gap-6 text-[10px] sm:text-[11px] font-fredoka font-semibold text-slate-400 border-t {{ $pStyle['border_b'] }} pt-3 sm:pt-4 mb-4">
                                    @if(!empty($pVal['item_1']))
                                        <span>Metode: <strong class="text-slate-700">{{ $pVal['item_1'] }}</strong></span>
                                    @endif
                                    @if(!empty($pVal['item_2']))
                                        <span>Fokus: <strong class="text-slate-700">{{ $pVal['item_2'] }}</strong></span>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="flex justify-start">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full {{ $pStyle['icon_bg'] }} text-white flex items-center justify-center shadow-md">
                                <i class="{{ $pVal['icon'] ?? 'ti ti-star' }} text-base sm:text-lg"></i>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Mobile Slider Dots Indicator -->
            @if(count($programList) > 1)
                <div class="flex items-center justify-center gap-2 mt-3 md:hidden">
                    @foreach($programList as $pDotIdx => $pDotVal)
                        @php $pStyle = $programStyles[$pDotIdx % count($programStyles)]; @endphp
                        <button 
                            @click="document.getElementById('programSlider').scrollTo({ left: document.getElementById('programSlider').offsetWidth * 0.85 * {{ $pDotIdx }}, behavior: 'smooth' })" 
                            :class="activeSlide === {{ $pDotIdx }} ? 'w-6 {{ $pStyle['dot'] }}' : 'w-2 bg-slate-300'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Slide {{ $pDotIdx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif
        </div>
    </section>



    <!-- ==========================================
         4. FASILITAS BELAJAR TK (Slider di Mobile & Grid di Desktop)
         ========================================== -->
    <section id="fasilitas" class="py-16 sm:py-20 lg:py-24 bg-white relative overflow-hidden" x-data="{ activeFacSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <!-- Header -->
            <div class="text-center max-w-xl mx-auto mb-8 sm:mb-16" data-aos="fade-up">
                <div class="text-amber-600 font-fredoka font-semibold text-xs sm:text-sm tracking-wide mb-2">
                    {{ $setting->fasilitas_tag ?? 'Lingkungan & Sarana' }}
                </div>
                <h2 class="font-fredoka text-2xl sm:text-4xl font-bold text-slate-800 mb-2 sm:mb-3">
                    {{ $setting->fasilitas_title ?? 'Fasilitas Ramah Anak' }}
                </h2>
                <p class="font-quicksand font-bold text-slate-500 text-xs sm:text-sm">
                    {{ $setting->fasilitas_description ?? 'Sarana belajar dan arena bermain yang bersih, aman, nyaman, dan mendukung eksplorasi motorik santri.' }}
                </p>
            </div>

            <!-- Mobile Swipe Hint -->
            <div class="flex items-center justify-center gap-1.5 text-[11px] font-fredoka text-amber-700 bg-amber-100/60 py-1.5 px-3 rounded-full w-fit mx-auto mb-4 md:hidden">
                <i class="ti ti-hand-swipe text-sm animate-pulse"></i>
                <span>Geser untuk melihat fasilitas</span>
            </div>

            <!-- 3 Stamp/Polaroid Style Facility Cards: Mobile Horizontal Slider (snap-x) & Desktop 3-Cols Grid -->
            <div 
                id="fasilitasSlider"
                class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-8 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-6 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar"
                @scroll="activeFacSlide = Math.round($el.scrollLeft / ($el.offsetWidth * 0.85))"
            >
                @php
                    $defaultFasilitas = [
                        [
                            'tag' => 'RUANG KELAS',
                            'name' => 'Ruang Belajar Ber-AC & Nyaman',
                            'desc' => 'Ruang kelas berpendingin udara dengan pencahayaan alami yang cerah dan media peraga edukatif lengkap.',
                            'image' => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=600&auto=format&fit=crop',
                            'washi' => 'washi-tape-cyan',
                            'btn' => 'from-sky-400 to-cyan-400 text-white',
                            'dot' => 'bg-sky-500',
                            'bg_img' => 'bg-sky-100',
                        ],
                        [
                            'tag' => 'PLAYGROUND',
                            'name' => 'Area Bermain & Stimulasi Motorik',
                            'desc' => 'Wahana permainan luar dan dalam ruangan yang aman untuk melatih ketangkasan serta sosialisasi santri.',
                            'image' => 'https://images.unsplash.com/photo-1588072432836-e10032774350?q=80&w=600&auto=format&fit=crop',
                            'washi' => 'washi-tape-yellow',
                            'btn' => 'from-amber-400 to-yellow-500 text-amber-950',
                            'dot' => 'bg-amber-500',
                            'bg_img' => 'bg-amber-100',
                        ],
                        [
                            'tag' => 'IBADAH',
                            'name' => 'Sentra Ibadah & Tempat Wudhu Cilik',
                            'desc' => 'Tempat wudhu khusus anak dan ruang shalat berjamaah untuk menanamkan kedisiplinan ibadah sejak dini.',
                            'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=600&auto=format&fit=crop',
                            'washi' => 'washi-tape-pink',
                            'btn' => 'from-rose-400 to-pink-500 text-white',
                            'dot' => 'bg-pink-500',
                            'bg_img' => 'bg-rose-100',
                        ],
                    ];

                    $fasilitasStyles = [
                        ['washi' => 'washi-tape-cyan', 'btn' => 'from-sky-400 to-cyan-400 text-white', 'dot' => 'bg-sky-500', 'bg_img' => 'bg-sky-100'],
                        ['washi' => 'washi-tape-yellow', 'btn' => 'from-amber-400 to-yellow-500 text-amber-950', 'dot' => 'bg-amber-500', 'bg_img' => 'bg-amber-100'],
                        ['washi' => 'washi-tape-pink', 'btn' => 'from-rose-400 to-pink-500 text-white', 'dot' => 'bg-pink-500', 'bg_img' => 'bg-rose-100'],
                    ];

                    $fasilitasList = (!empty($setting->custom_fasilitas) && count($setting->custom_fasilitas) > 0)
                        ? $setting->custom_fasilitas
                        : $defaultFasilitas;
                @endphp

                @foreach($fasilitasList as $fIdx => $fItem)
                    @php
                        $style = $fasilitasStyles[$fIdx % count($fasilitasStyles)];
                        $fImage = !empty($fItem['image']) 
                            ? (str_starts_with($fItem['image'], 'http') ? $fItem['image'] : $unit->getAdminImageUrl($fItem['image']))
                            : 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=600&auto=format&fit=crop';
                    @endphp
                    <div class="min-w-[85%] sm:min-w-[70%] md:min-w-0 snap-center relative bg-white rounded-3xl p-4 sm:p-5 shadow-lg border border-slate-100 flex flex-col items-center text-center group hover:-translate-y-1.5 transition-all duration-300 {{ $loop->last && count($fasilitasList) % 2 != 0 ? 'md:col-span-2 lg:col-span-1' : '' }}" data-aos="fade-up" data-aos-delay="{{ ($fIdx + 1) * 100 }}">
                        <div class="absolute -top-3 w-24 h-6 {{ $style['washi'] }} rounded-sm shadow-sm flex items-center justify-center text-[9px] font-bold opacity-90 uppercase">
                            {{ $fItem['tag'] ?? 'FASILITAS' }}
                        </div>
                        <div class="w-full h-44 sm:h-52 rounded-2xl overflow-hidden {{ $style['bg_img'] }} mb-4 relative">
                            <img src="{{ $fImage }}" alt="{{ $fItem['name'] ?? 'Fasilitas' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="w-full py-2.5 sm:py-3 px-4 rounded-2xl bg-gradient-to-r {{ $style['btn'] }} font-fredoka font-bold text-xs sm:text-sm shadow-md mb-2">
                            {{ $fItem['name'] ?? 'Nama Fasilitas' }}
                        </div>
                        <p class="font-quicksand text-xs text-slate-500 font-medium">{{ $fItem['desc'] ?? '' }}</p>
                    </div>
                @endforeach

            </div>

            <!-- Mobile Slider Dots Indicator -->
            @if(count($fasilitasList) > 1)
                <div class="flex items-center justify-center gap-2 mt-3 md:hidden">
                    @foreach($fasilitasList as $dotIdx => $dotItem)
                        @php $style = $fasilitasStyles[$dotIdx % count($fasilitasStyles)]; @endphp
                        <button 
                            @click="document.getElementById('fasilitasSlider').scrollTo({ left: document.getElementById('fasilitasSlider').offsetWidth * 0.85 * {{ $dotIdx }}, behavior: 'smooth' })" 
                            :class="activeFacSlide === {{ $dotIdx }} ? 'w-6 {{ $style['dot'] }}' : 'w-2 bg-slate-300'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Fasilitas {{ $dotIdx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif
        </div>
    </section>



    <!-- ==========================================
         5. BANNER CALL TO ACTION
         ========================================== -->
    <section class="py-12 sm:py-16 bg-[#fdfbf7] relative overflow-visible">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10" data-aos="fade-up">
            <div class="rounded-[2.5rem] sm:rounded-[3rem] bg-gradient-to-r from-amber-500 via-orange-500 to-amber-600 text-white p-6 sm:p-10 lg:p-14 shadow-2xl relative overflow-visible border-4 border-white/60">
                <!-- Decorative Glow & Background Pattern -->
                <div class="absolute -top-24 -left-24 w-72 h-72 bg-white/15 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-24 right-1/4 w-80 h-80 bg-yellow-300/20 rounded-full blur-3xl pointer-events-none"></div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                    
                    <!-- Left Text & Actions -->
                    <div class="lg:col-span-8 text-center lg:text-left">
                        <div class="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-1 sm:py-1.5 rounded-full bg-white/20 backdrop-blur-md text-amber-100 font-fredoka font-semibold text-[10px] sm:text-xs uppercase tracking-wider mb-3 sm:mb-4 border border-white/25 shadow-sm">
                            <i class="ti ti-sparkles text-yellow-300 text-xs sm:text-sm"></i>
                            <span>Penerimaan Santri Baru TK Calisa Rabbani</span>
                        </div>

                        <h2 class="font-fredoka text-2xl sm:text-4xl lg:text-[44px] font-bold text-white mb-3 sm:mb-4 leading-tight">
                            Mulai Langkah Emas Si Kecil <br class="hidden sm:inline">
                            Bersama <span class="text-yellow-200 underline decoration-wavy decoration-yellow-300/60 decoration-2">TK Calisa Rabbani!</span>
                        </h2>

                        <p class="font-quicksand font-bold text-amber-100 text-xs sm:text-base leading-relaxed max-w-xl mx-auto lg:mx-0 mb-6 sm:mb-8 opacity-95">
                            Bimbing ananda tercinta menjadi generasi mandiri, ceria, santun, dan cinta Al-Qur'an sejak usia dini. Kuota kelas terbatas setiap tahun ajaran.
                        </p>

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-center lg:justify-start gap-3 sm:gap-4">
                            <a href="/register" class="px-6 sm:px-8 py-3.5 sm:py-4 bg-slate-900 hover:bg-black text-white font-fredoka font-bold text-xs sm:text-sm rounded-2xl shadow-xl hover:scale-105 active:scale-95 transition-all flex items-center justify-center gap-2">
                                <span>Daftar Online Sekarang</span>
                                <i class="ti ti-arrow-right text-base sm:text-lg text-yellow-400"></i>
                            </a>
                            <a href="https://wa.me/{{ $pengaturan->telepon ?? '089654052437' }}?text=Halo%20Admin%20TK%20Calisa%20Rabbani,%20saya%20ingin%20tanya%20informasi%20pendaftaran" target="_blank" class="px-5 sm:px-7 py-3.5 sm:py-4 bg-white/95 hover:bg-white text-amber-950 font-fredoka font-bold text-xs sm:text-sm rounded-2xl shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all flex items-center justify-center gap-2">
                                <i class="ti ti-brand-whatsapp text-emerald-600 text-xl sm:text-2xl"></i>
                                <span>WhatsApp Admin TK</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Single Popping Model -->
                    <div class="lg:col-span-4 relative flex justify-center lg:justify-end items-end">
                        <div class="relative w-full max-w-[220px] sm:max-w-[280px] lg:max-w-[320px] -mt-4 sm:-mt-8 lg:-mt-24 lg:-mb-14">
                            <!-- Floating Badge on Model -->
                            <div class="absolute -top-3 -left-3 bg-white text-slate-800 p-2 sm:p-2.5 rounded-2xl shadow-xl border border-amber-200 hidden sm:flex items-center gap-2 z-20 animate-bounce-gentle">
                                <span class="text-base sm:text-xl">🎒</span>
                                <span class="font-fredoka font-bold text-[10px] sm:text-xs text-amber-900">Ayo Gabung!</span>
                            </div>

                            <img 
                                src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_4) : 'https://placehold.co/400x500?text=Model+Kid' }}" 
                                alt="Santri TK Calisa" 
                                class="relative z-10 w-full h-auto object-contain drop-shadow-[0_20px_40px_rgba(0,0,0,0.3)] transform hover:scale-105 transition-transform duration-500"
                            >
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- ==========================================
         6. TESTIMONI WALI SANTRI (Slider di Mobile & Grid di Desktop)
         ========================================== -->
    <section id="testimoni" class="py-16 sm:py-20 lg:py-24 bg-white relative overflow-hidden" x-data="{ activeTestiSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <!-- Header -->
            <div class="text-center max-w-xl mx-auto mb-8 sm:mb-16" data-aos="fade-up">
                <div class="text-amber-600 font-fredoka font-semibold text-xs sm:text-sm tracking-wide mb-2">
                    {{ $setting->testimoni_tag ?? 'Testimoni & Pengalaman' }}
                </div>
                <h2 class="font-fredoka text-2xl sm:text-4xl font-bold text-slate-800 mb-2 sm:mb-3">
                    {{ $setting->testimoni_title ?? 'Apa Kata Orang Tua Santri?' }}
                </h2>
                <p class="font-quicksand font-bold text-slate-500 text-xs sm:text-sm">
                    {{ $setting->testimoni_description ?? 'Cerita kebahagiaan dan perkembangan karakter ananda tercinta di TK Calisa Rabbani.' }}
                </p>
            </div>

            <!-- Mobile Swipe Hint -->
            <div class="flex items-center justify-center gap-1.5 text-[11px] font-fredoka text-amber-700 bg-amber-100/60 py-1.5 px-3 rounded-full w-fit mx-auto mb-4 md:hidden">
                <i class="ti ti-hand-swipe text-sm animate-pulse"></i>
                <span>Geser untuk melihat testimoni</span>
            </div>

            <!-- Speech Bubble Cards: Mobile Horizontal Slider (snap-x) & Desktop 3-Cols Grid -->
            <div 
                id="testiSlider"
                class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-8 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-6 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar"
                @scroll="activeTestiSlide = Math.round($el.scrollLeft / ($el.offsetWidth * 0.85))"
            >
                @php
                    $bubbleColors = [
                        ['bg' => 'bg-amber-400', 'text' => 'text-amber-950', 'icon' => 'bg-amber-500', 'dot' => 'bg-amber-500'],
                        ['bg' => 'bg-rose-400', 'text' => 'text-white', 'icon' => 'bg-rose-500', 'dot' => 'bg-rose-500'],
                        ['bg' => 'bg-teal-400', 'text' => 'text-white', 'icon' => 'bg-teal-500', 'dot' => 'bg-teal-500'],
                    ];

                    $testiList = collect();
                    if (!empty($setting->custom_testimoni) && count($setting->custom_testimoni) > 0) {
                        foreach ($setting->custom_testimoni as $ct) {
                            $testiList->push((object)[
                                'nama' => $ct['nama'] ?? 'Wali Santri',
                                'role' => $ct['role'] ?? 'Wali Santri',
                                'testimoni' => $ct['quote'] ?? '',
                                'foto' => $ct['avatar'] ?? null,
                            ]);
                        }
                    } else {
                        $testiList = $testimonials;
                    }
                @endphp

                @forelse($testiList as $i => $testi)
                    @php 
                        $bColor = $bubbleColors[$i % count($bubbleColors)];
                        $tFoto = !empty($testi->foto)
                            ? (str_starts_with($testi->foto, 'http') ? $testi->foto : $unit->getAdminImageUrl($testi->foto))
                            : null;
                    @endphp
                    <div class="min-w-[85%] sm:min-w-[70%] md:min-w-0 snap-center flex flex-col justify-between {{ $loop->last && count($testiList) % 2 != 0 ? 'md:col-span-2 lg:col-span-1' : '' }}" data-aos="fade-up" data-aos-delay="{{ ($i + 1) * 100 }}">
                        <!-- Speech Bubble -->
                        <div class="{{ $bColor['bg'] }} {{ $bColor['text'] }} p-6 sm:p-8 rounded-[2rem] sm:rounded-[2.5rem] shadow-md relative mb-5 sm:mb-6 flex-1 flex flex-col justify-center">
                            <p class="font-quicksand font-bold text-xs sm:text-sm leading-relaxed">
                                "{{ $testi->testimoni }}"
                            </p>
                            <!-- Bubble Arrow Triangle -->
                            <div class="absolute -bottom-2.5 sm:-bottom-3 left-8 sm:left-10 w-5 h-5 sm:w-6 sm:h-6 {{ $bColor['bg'] }} transform rotate-45"></div>
                        </div>

                        <!-- Parent Info -->
                        <div class="flex items-center gap-3 sm:gap-4 pl-4">
                            @if($tFoto)
                                <img src="{{ $tFoto }}" alt="{{ $testi->nama }}" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover border-2 border-white shadow-sm shrink-0">
                            @else
                                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full {{ $bColor['icon'] }} text-white font-fredoka font-bold flex items-center justify-center text-sm sm:text-base shadow-sm shrink-0">
                                    {{ substr($testi->nama ?? 'W', 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <h4 class="font-fredoka font-bold text-slate-800 text-xs sm:text-sm lg:text-base">{{ $testi->nama }}</h4>
                                <span class="font-quicksand font-bold text-[10px] sm:text-[11px] text-slate-400">{{ $testi->role ?? 'Wali Santri' }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-8 text-center text-slate-400 italic">
                        Belum ada testimoni.
                    </div>
                @endforelse
            </div>

            <!-- Mobile Slider Dots Indicator -->
            @if(count($testiList) > 1)
                <div class="flex items-center justify-center gap-2 mt-4 md:hidden">
                    @foreach($testiList as $idx => $item)
                        @php $bColor = $bubbleColors[$idx % count($bubbleColors)]; @endphp
                        <button 
                            @click="document.getElementById('testiSlider').scrollTo({ left: document.getElementById('testiSlider').offsetWidth * 0.85 * {{ $idx }}, behavior: 'smooth' })" 
                            :class="activeTestiSlide === {{ $idx }} ? 'w-6 {{ $bColor['dot'] }}' : 'w-2 bg-slate-300'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Testimoni {{ $idx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif
        </div>
    </section>



    <!-- ==========================================
         7. BERITA & KEGIATAN TK (Slider di Mobile & Grid di Desktop)
         ========================================== -->
    <section id="berita" class="py-16 sm:py-20 lg:py-24 bg-[#fdfbf7] relative overflow-hidden" x-data="{ activeNewsSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-16 gap-4 sm:gap-6" data-aos="fade-up">
                <div>
                    <div class="text-amber-600 font-fredoka font-semibold text-xs sm:text-sm tracking-wide mb-2">
                        Dokumentasi & Kabar Terkini
                    </div>
                    <h2 class="font-fredoka text-2xl sm:text-4xl font-bold text-slate-800">
                        Berita & Kegiatan TK
                    </h2>
                </div>
                <a href="/berita" class="inline-flex items-center gap-2 text-xs font-fredoka font-bold text-amber-600 hover:text-amber-700 uppercase tracking-wider">
                    <span>Lihat Semua Berita</span>
                    <i class="ti ti-arrow-right text-base"></i>
                </a>
            </div>

            <!-- Mobile Swipe Hint -->
            <div class="flex items-center justify-center gap-1.5 text-[11px] font-fredoka text-amber-700 bg-amber-100/60 py-1.5 px-3 rounded-full w-fit mx-auto mb-4 md:hidden">
                <i class="ti ti-hand-swipe text-sm animate-pulse"></i>
                <span>Geser untuk melihat berita</span>
            </div>

            <!-- Blog Cards: Mobile Horizontal Slider (snap-x) & Desktop 3-Cols Grid -->
            <div 
                id="newsSlider"
                class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-8 overflow-x-auto md:overflow-visible snap-x snap-mandatory pb-6 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar"
                @scroll="activeNewsSlide = Math.round($el.scrollLeft / ($el.offsetWidth * 0.85))"
            >
                @forelse($news as $idx => $item)
                    <div class="min-w-[85%] sm:min-w-[70%] md:min-w-0 snap-center bg-white rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 p-4 sm:p-5 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group {{ $loop->last && count($news) % 2 != 0 ? 'md:col-span-2 lg:col-span-1' : '' }}" data-aos="fade-up">
                        <div>
                            <!-- News Image -->
                            <div class="w-full h-44 sm:h-48 rounded-[1.5rem] sm:rounded-[2rem] overflow-hidden bg-slate-100 mb-4 sm:mb-5 relative">
                                <a href="{{ route('news.show', $item->slug) }}">
                                    <img src="{{ $item->getAdminImageUrl($item->image, 'posts') }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full bg-amber-100 flex items-center justify-center text-amber-500\'><i class=\'ti ti-photo text-4xl\'></i></div>';">
                                </a>
                                <div class="absolute top-3 left-3 bg-amber-400 text-amber-950 font-fredoka font-bold text-[9px] sm:text-[10px] px-2.5 sm:px-3 py-1 rounded-full shadow-sm">
                                    {{ $item->created_at ? $item->created_at->translatedFormat('d M Y') : 'News' }}
                                </div>
                            </div>

                            <h3 class="font-fredoka font-bold text-base sm:text-lg text-slate-800 group-hover:text-amber-600 transition-colors line-clamp-2 leading-snug mb-2">
                                <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                            </h3>

                            <p class="font-quicksand font-semibold text-slate-500 text-xs line-clamp-3 leading-relaxed mb-4 sm:mb-6">
                                {{ strip_tags($item->content) }}
                            </p>
                        </div>

                        <!-- Read More Link -->
                        <div class="pt-3.5 sm:pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="font-fredoka text-[10px] sm:text-[11px] font-bold text-amber-600">
                                {{ $item->category->name ?? 'Kegiatan' }}
                            </span>
                            <a href="{{ route('news.show', $item->slug) }}" class="font-fredoka font-bold text-xs text-slate-700 hover:text-amber-500 flex items-center gap-1">
                                <span>Baca Selengkapnya</span>
                                <i class="ti ti-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-slate-400 italic">
                        Belum ada artikel kegiatan TK.
                    </div>
                @endforelse
            </div>

            <!-- Mobile Slider Dots Indicator -->
            @if(count($news) > 1)
                <div class="flex items-center justify-center gap-2 mt-4 md:hidden">
                    @foreach($news as $nIdx => $nItem)
                        <button 
                            @click="document.getElementById('newsSlider').scrollTo({ left: document.getElementById('newsSlider').offsetWidth * 0.85 * {{ $nIdx }}, behavior: 'smooth' })" 
                            :class="activeNewsSlide === {{ $nIdx }} ? 'w-6 bg-amber-500' : 'w-2 bg-slate-300'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Berita {{ $nIdx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif
        </div>
    </section>



    <!-- ==========================================
         8. DAFTAR GURU & TENAGA PENDIDIK (Slider di Mobile & Grid di Desktop)
         ========================================== -->
    <section id="guru" class="py-16 sm:py-20 lg:py-24 bg-white relative overflow-hidden" x-data="{ activeGuruSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="text-center max-w-xl mx-auto mb-8 sm:mb-16" data-aos="fade-up">
                <div class="text-amber-600 font-fredoka font-semibold text-xs sm:text-sm tracking-wide mb-2">
                    Tenaga Pendidik & Pengasuh
                </div>
                <h2 class="font-fredoka text-2xl sm:text-4xl font-bold text-slate-800 mb-2 sm:mb-3">
                    Daftar Guru & Asatidzah
                </h2>
                <p class="font-quicksand font-bold text-slate-500 text-xs sm:text-sm">
                    Pendidik yang sabar, berakhlak mulia, dan berpengalaman dalam membersamai tumbuh kembang anak usia dini.
                </p>
            </div>

            <!-- Mobile Swipe Hint -->
            <div class="flex items-center justify-center gap-1.5 text-[11px] font-fredoka text-amber-700 bg-amber-100/60 py-1.5 px-3 rounded-full w-fit mx-auto mb-4 md:hidden">
                <i class="ti ti-hand-swipe text-sm animate-pulse"></i>
                <span>Geser untuk melihat daftar guru</span>
            </div>

            <!-- Teachers Cards: Mobile Horizontal Slider (snap-x) & Desktop Grid -->
            <div 
                id="guruSlider"
                class="flex sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-8 overflow-x-auto sm:overflow-visible snap-x snap-mandatory pb-6 sm:pb-0 -mx-4 px-4 sm:mx-0 sm:px-0 no-scrollbar"
                @scroll="activeGuruSlide = Math.round($el.scrollLeft / ($el.offsetWidth * 0.85))"
            >
                @php
                    $pastelColors = [
                        ['bg' => 'bg-[#ecfeff]', 'border' => 'border-cyan-200', 'badge' => 'bg-cyan-500', 'accent' => 'text-cyan-600', 'dot' => 'bg-cyan-500'],
                        ['bg' => 'bg-[#fef9c3]', 'border' => 'border-amber-200', 'badge' => 'bg-amber-500', 'accent' => 'text-amber-600', 'dot' => 'bg-amber-500'],
                        ['bg' => 'bg-[#fce7f3]', 'border' => 'border-pink-200', 'badge' => 'bg-pink-500', 'accent' => 'text-pink-600', 'dot' => 'bg-pink-500'],
                        ['bg' => 'bg-[#f0fdf4]', 'border' => 'border-emerald-200', 'badge' => 'bg-emerald-500', 'accent' => 'text-emerald-600', 'dot' => 'bg-emerald-500'],
                    ];
                @endphp

                @forelse($staff as $idx => $guru)
                    @php $color = $pastelColors[$idx % count($pastelColors)]; @endphp
                    <div class="min-w-[80%] sm:min-w-0 snap-center {{ $color['bg'] }} {{ $color['border'] }} border-2 rounded-[2rem] sm:rounded-[2.5rem] p-5 sm:p-6 text-center shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center group" data-aos="fade-up" data-aos-delay="{{ ($idx + 1) * 80 }}">
                        
                        <!-- Teacher Photo in Arch Shape -->
                        <div class="w-full h-48 sm:h-56 rounded-[1.5rem] sm:rounded-[2rem] bg-white overflow-hidden mb-4 sm:mb-5 shadow-sm relative">
                            @if($guru->foto)
                                <img src="{{ $guru->getAdminImageUrl($guru->foto) }}" alt="{{ $guru->nama_lengkap }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-slate-50 text-slate-400">
                                    <span class="font-fredoka text-4xl sm:text-5xl font-bold {{ $color['accent'] }}">{{ substr($guru->nama_lengkap, 0, 1) }}</span>
                                    <span class="font-fredoka text-[10px] text-slate-400 uppercase mt-2">Ustadzah TK</span>
                                </div>
                            @endif
                        </div>

                        <!-- Role Badge -->
                        <span class="inline-block px-3 py-1 rounded-full text-[9px] sm:text-[10px] font-fredoka font-bold {{ $color['badge'] }} text-white mb-2 shadow-sm">
                            {{ $guru->jabatan->nama_jabatan ?? 'Guru TK' }}
                        </span>

                        <!-- Teacher Name -->
                        <h3 class="font-fredoka font-bold text-sm sm:text-base text-slate-800 line-clamp-1 leading-snug">
                            {{ $guru->nama_lengkap }}
                        </h3>

                        <p class="font-quicksand font-bold text-[10px] sm:text-[11px] text-slate-400 mt-1">
                            {{ $guru->pendidikan_terakhir ? 'Lulusan ' . $guru->pendidikan_terakhir : 'Pendidik PAUD / TK' }}
                        </p>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-slate-400 italic">
                        Data guru belum tersedia.
                    </div>
                @endforelse
            </div>

            <!-- Mobile Slider Dots Indicator -->
            @if(count($staff) > 1)
                <div class="flex items-center justify-center gap-2 mt-4 sm:hidden">
                    @foreach($staff as $gIdx => $gItem)
                        @php $color = $pastelColors[$gIdx % count($pastelColors)]; @endphp
                        <button 
                            @click="document.getElementById('guruSlider').scrollTo({ left: document.getElementById('guruSlider').offsetWidth * 0.85 * {{ $gIdx }}, behavior: 'smooth' })" 
                            :class="activeGuruSlide === {{ $gIdx }} ? 'w-6 {{ $color['dot'] }}' : 'w-2 bg-slate-300'" 
                            class="h-2 rounded-full transition-all duration-300"
                            aria-label="Guru {{ $gIdx + 1 }}"
                        ></button>
                    @endforeach
                </div>
            @endif
        </div>
    </section>



    <!-- ==========================================
         9. RINCIAN BIAYA ATAU INVESTASI PENDIDIKAN
         ========================================== -->
    <section id="biaya" class="py-16 sm:py-20 lg:py-24 bg-[#fdfbf7] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="text-center max-w-xl mx-auto mb-10 sm:mb-16" data-aos="fade-up">
                <div class="text-amber-600 font-fredoka font-semibold text-xs sm:text-sm tracking-wide mb-2">
                    Informasi Biaya & Pendaftaran
                </div>
                <h2 class="font-fredoka text-2xl sm:text-4xl font-bold text-slate-800 mb-2 sm:mb-3">
                    Investasi Pendidikan
                </h2>
                <div class="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-1 rounded-full bg-amber-100 text-amber-900 font-fredoka text-[11px] sm:text-xs font-bold mb-3">
                    <i class="ti ti-calendar-event text-amber-600"></i>
                    <span>Tahun Ajaran PPDB {{ $activePPDB->tahun_ajaran ?? date('Y').'/'.(date('Y')+1) }}</span>
                </div>
                <p class="font-quicksand font-bold text-slate-500 text-xs sm:text-sm">
                    Rincian pembiayaan pendidikan santri baru transparan dan terjangkau untuk bekal masa depan ananda.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 items-start max-w-6xl mx-auto">
                
                <!-- Left: Dynamic Fee Table from Database -->
                <div class="lg:col-span-7 bg-white rounded-[2rem] sm:rounded-[2.5rem] p-5 sm:p-8 border border-slate-100 shadow-xl flex flex-col justify-between" data-aos="fade-right">
                    <div>
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4 mb-5 sm:mb-6 pb-4 border-b border-slate-100">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center text-lg sm:text-xl shadow-sm shrink-0">
                                    <i class="ti ti-receipt-2"></i>
                                </div>
                                <div>
                                    <h3 class="font-fredoka font-bold text-base sm:text-xl text-slate-800 leading-none">Rincian Komponen Biaya</h3>
                                    <span class="font-quicksand text-[10px] sm:text-[11px] font-bold text-slate-400">Tahun PPDB {{ $activePPDB->tahun_ajaran ?? '-' }}</span>
                                </div>
                            </div>
                            <span class="self-start sm:self-auto px-3 py-1 bg-teal-50 text-teal-700 font-fredoka font-bold text-[10px] sm:text-xs rounded-full border border-teal-200">
                                Santri Baru (Tingkat 1)
                            </span>
                        </div>

                        <!-- Table of Fees -->
                        <div class="overflow-x-auto -mx-1 sm:mx-0">
                            <table class="w-full text-left font-quicksand text-xs sm:text-sm min-w-[280px]">
                                <thead>
                                    <tr class="text-slate-400 font-fredoka text-[10px] sm:text-[11px] uppercase tracking-wider border-b border-slate-100">
                                        <th class="py-2.5 sm:py-3 px-2 sm:px-3">No</th>
                                        <th class="py-2.5 sm:py-3 px-2 sm:px-3">Komponen Biaya</th>
                                        <th class="py-2.5 sm:py-3 px-2 sm:px-3 text-right">Nominal</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 font-bold text-slate-700">
                                    @php $totalBiaya = 0; @endphp
                                    @forelse($biayaList as $idx => $biayaItem)
                                        @php $totalBiaya += $biayaItem->jumlah; @endphp
                                        <tr class="hover:bg-amber-50/50 transition-colors">
                                            <td class="py-2.5 sm:py-3 px-2 sm:px-3 text-slate-400 font-normal w-8 sm:w-10">{{ $idx + 1 }}</td>
                                            <td class="py-2.5 sm:py-3 px-2 sm:px-3 font-semibold text-slate-800">{{ $biayaItem->jenis_biaya }}</td>
                                            <td class="py-2.5 sm:py-3 px-2 sm:px-3 text-right font-fredoka text-slate-900 whitespace-nowrap">
                                                Rp {{ number_format($biayaItem->jumlah, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="py-8 text-center text-slate-400 italic">
                                                Rincian biaya untuk tahun PPDB ini belum dikonfigurasi.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                @if($biayaList->isNotEmpty())
                                    <tfoot>
                                        <tr class="border-t-2 border-slate-200 bg-amber-50/60 font-fredoka">
                                            <td colspan="2" class="py-3 sm:py-3.5 px-3 sm:px-4 font-bold text-amber-950 text-xs sm:text-base">
                                                Total Estimasi Investasi Awal
                                            </td>
                                            <td class="py-3 sm:py-3.5 px-3 sm:px-4 text-right font-bold text-amber-900 text-sm sm:text-lg whitespace-nowrap">
                                                Rp {{ number_format($totalBiaya, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>

                        <div class="mt-4 p-3 rounded-2xl bg-slate-50 border border-slate-100 text-[10px] sm:text-[11px] text-slate-500 font-medium">
                            <i class="ti ti-info-circle text-amber-500 mr-1"></i>
                            Biaya sudah mencakup pendaftaran, infaq pembangunan, sarana prasarana, seragam lengkap, media pembelajaran, dan kegiatan awal.
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <a href="/register" class="w-full py-3.5 sm:py-4 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-fredoka font-bold rounded-2xl shadow-lg hover:shadow-xl text-center text-xs sm:text-sm uppercase tracking-wider transition-all flex items-center justify-center gap-2">
                            <span>Daftar & Amankan Kuota Sekarang</span>
                            <i class="ti ti-arrow-right text-base sm:text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Right: Brosur Digital & WhatsApp Konsultasi -->
                <div class="lg:col-span-5 flex flex-col gap-6" data-aos="fade-left">
                    
                    <!-- Brosur Download Banner / Button Card -->
                    <div class="bg-white rounded-[2rem] sm:rounded-[2.5rem] p-5 sm:p-8 border border-slate-100 shadow-xl flex flex-col justify-between">
                        <div class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-5">
                            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl sm:text-2xl shadow-sm shrink-0">
                                <i class="ti ti-file-text"></i>
                            </div>
                            <div>
                                <h3 class="font-fredoka font-bold text-base sm:text-lg text-slate-800 leading-tight">Brosur Resmi TK Calisa</h3>
                                <p class="font-quicksand text-[11px] sm:text-xs text-slate-400 font-semibold mt-0.5">Profil, program, kurikulum & jadwal PPDB</p>
                            </div>
                        </div>

                        <p class="font-quicksand text-xs text-slate-500 font-medium leading-relaxed mb-5 sm:mb-6">
                            Unduh brosur digital dalam format PDF / Gambar untuk panduan lengkap pendaftaran santri baru TK Calisa Rabbani.
                        </p>

                        @if($unit && $unit->brosur_unit)
                            <a href="{{ $unit->getAdminImageUrl($unit->brosur_unit) }}" target="_blank" class="w-full py-3.5 sm:py-4 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-fredoka font-bold rounded-2xl shadow-md hover:shadow-lg text-center text-xs uppercase tracking-wider transition-all flex items-center justify-center gap-2">
                                <i class="ti ti-download text-base sm:text-lg"></i>
                                <span>Download Brosur TK</span>
                            </a>
                        @else
                            <a href="https://wa.me/{{ $pengaturan->telepon ?? '089654052437' }}?text=Halo%20Admin%20TK%20Calisa%20Rabbani,%20saya%20ingin%20minta%20brosur%20pendaftaran%20TK" target="_blank" class="w-full py-3.5 sm:py-4 bg-amber-500 hover:bg-amber-600 text-white font-fredoka font-bold rounded-2xl shadow-md hover:shadow-lg text-center text-xs uppercase tracking-wider transition-all flex items-center justify-center gap-2">
                                <i class="ti ti-download text-base sm:text-lg"></i>
                                <span>Minta Brosur via WhatsApp</span>
                            </a>
                        @endif
                    </div>

                    <!-- Fast Consultation Box -->
                    <div class="rounded-[2rem] sm:rounded-[2.5rem] bg-gradient-to-br from-emerald-500 via-teal-600 to-emerald-700 text-white p-5 sm:p-8 shadow-xl relative overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-yellow-300 animate-ping"></span>
                                <span class="font-fredoka text-[10px] sm:text-[11px] font-bold text-emerald-100 uppercase tracking-wider">Fast Response</span>
                            </div>
                            <h4 class="font-fredoka font-bold text-lg sm:text-xl text-white mb-2 leading-tight">
                                {{ $setting->cta_title ?? 'Butuh Bantuan / Skema Pembayaran Bertahap?' }}
                            </h4>
                            <p class="font-quicksand font-bold text-xs text-emerald-100/90 leading-relaxed mb-5 sm:mb-6">
                                {{ $setting->cta_description ?? 'Hubungi admin PPDB TK Calisa Rabbani untuk konsultasi rincian biaya, potongan beasiswa, atau jadwal observasi ananda.' }}
                            </p>
                            @php
                                $unitWa = ($setting && $setting->unit_whatsapp) ? preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $setting->unit_whatsapp)) : ($pengaturan->telepon ?? '089654052437');
                                $waMsg = ($setting && $setting->cta_wa_text) ? urlencode($setting->cta_wa_text) : urlencode('Halo Admin TK Calisa Rabbani, saya ingin tanya rincian biaya pendaftaran santri baru');
                            @endphp
                            <a href="https://wa.me/{{ $unitWa }}?text={{ $waMsg }}" target="_blank" class="w-full py-3 sm:py-3.5 bg-white hover:bg-emerald-50 text-emerald-900 font-fredoka font-bold rounded-2xl shadow-lg text-center text-xs uppercase tracking-wider transition-all flex items-center justify-center gap-2">
                                <i class="ti ti-brand-whatsapp text-emerald-600 text-lg sm:text-xl"></i>
                                <span>Hubungi Admin via WhatsApp</span>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection
