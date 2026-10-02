@extends('layouts.frontend')
@section('title', 'Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis | Pesantren Persis Unggulan')
@section('meta_description', 'Pesantren Persatuan Islam 80 Al Amin Sindangkasih Ciamis adalah Pondok Pesantren Persis terbaik dan unggulan di Kabupaten Ciamis, Jawa Barat. Menyelenggarakan jenjang pendidikan TK, SDIT, MTs, dan MA berkarakter Qur\'ani & berprestasi.')

@section('content')
    {{-- HERO SECTION --}}
    @include('layouts.partials.hero')

    {{-- HIGHLIGHT UNIT / JENJANG PENDIDIKAN --}}
    @php
        $unitLinks = [
            'U01' => '/tk',
            'U02' => '/diniyah',
            'U03' => '/sdit',
            'U04' => '/mts',
            'U05' => '/ma',
            'U07' => '/unit/asrama',
        ];

        $unitDisplayNames = [
            'U01' => 'TK Calisa Rabbani',
            'U02' => 'Madrasah Diniyah Ula',
            'U03' => 'SDIT Al Amin',
            'U04' => 'MTs Persis 80',
            'U05' => 'MA Persis 80',
            'U07' => 'Asrama Santri',
        ];

        $unitDescriptions = [
            'U01' => 'Pendidikan Usia Dini & Karakter',
            'U02' => 'Madrasah Diniyah Takmiliyah',
            'U03' => 'Pendidikan Dasar Islam Terpadu',
            'U04' => 'Pendidikan Menengah Pertama',
            'U05' => 'Pendidikan Menengah Atas',
        ];

        $unitIcons = [
            'U01' => ['icon' => 'ti-school', 'bg' => 'bg-emerald-900 text-[#bef264]'],
            'U02' => ['icon' => 'ti-book-2', 'bg' => 'bg-[#062d27] text-emerald-300'],
            'U03' => ['icon' => 'ti-building-arch', 'bg' => 'bg-emerald-800 text-[#bef264]'],
            'U04' => ['icon' => 'ti-certificate', 'bg' => 'bg-emerald-900 text-emerald-200'],
            'U05' => ['icon' => 'ti-award', 'bg' => 'bg-[#062d27] text-[#bef264]'],
        ];

        // MDU (U02) disembunyikan sementara sesuai permintaan
        $displayUnits = $units->filter(fn($u) => $u->kode_unit !== 'U02');
    @endphp

    <section id="jenjang-pendidikan" class="relative -mt-8 z-20 container mx-auto px-6 lg:px-12">
        <div class="bg-white rounded-2xl p-5 lg:py-5 lg:px-7 shadow-xl border border-gray-100">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-6 divide-y sm:divide-y-0 lg:divide-x divide-gray-100">
                @forelse($displayUnits as $index => $unit)
                    @php
                        $link = $unitLinks[$unit->kode_unit] ?? ('/unit/' . strtolower($unit->kode_unit));
                        $unitTitle = $unitDisplayNames[$unit->kode_unit] ?? ucwords(strtolower($unit->nama_unit));
                        $desc = $unitDescriptions[$unit->kode_unit] ?? ($unit->keterangan ?: 'Integrasi kurikulum pesantren & nasional.');
                        $iconData = $unitIcons[$unit->kode_unit] ?? ['icon' => 'ti-school', 'bg' => 'bg-emerald-900 text-[#bef264]'];
                    @endphp
                    <a href="{{ $link }}" class="flex items-center gap-3.5 pt-3.5 sm:pt-0 lg:px-3.5 first:pt-0 first:px-0 group transition-all hover:bg-emerald-50/40 p-3 rounded-xl border border-transparent hover:border-emerald-200/60">
                        @if($unit->logo)
                            <div class="w-12 h-12 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-center p-2 shrink-0 group-hover:scale-105 transition-transform shadow-2xs">
                                <img src="{{ $unit->getAdminImageUrl($unit->logo) }}" alt="{{ $unitTitle }}" class="w-full h-full object-contain">
                            </div>
                        @else
                            <div class="w-12 h-12 rounded-xl {{ $iconData['bg'] }} flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform shadow-2xs">
                                <i class="ti {{ $iconData['icon'] }} text-2xl"></i>
                            </div>
                        @endif

                        <div class="min-w-0 flex-1 overflow-hidden">
                            <div class="flex items-center justify-between gap-1.5 mb-0.5">
                                <h3 class="font-bold text-gray-900 text-sm lg:text-[14.5px] font-poppins group-hover:text-emerald-800 transition-colors whitespace-nowrap truncate">
                                    {{ $unitTitle }}
                                </h3>
                                <span class="inline-flex items-center gap-1 text-[9.5px] font-bold text-emerald-800 bg-emerald-50 border border-emerald-200/80 px-2.5 py-0.5 rounded-full group-hover:bg-[#062d27] group-hover:text-[#bef264] group-hover:border-[#062d27] transition-all font-poppins shadow-2xs shrink-0 whitespace-nowrap">
                                    <span>Kunjungi</span>
                                    <i class="ti ti-external-link text-[10px]"></i>
                                </span>
                            </div>
                            <p class="text-xs text-gray-500 leading-normal whitespace-nowrap truncate">
                                {{ $desc }}
                            </p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full py-4 text-center">
                        <p class="text-xs text-gray-400 italic">Belum ada unit pendidikan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- PROGRAM UNGGULAN (2 KOLOM: KIRI CARD 2X2, KANAN MODEL) --}}
    <section class="py-20 lg:py-24 bg-[#fbfbf9] relative overflow-hidden" data-aos="fade-up">
        <!-- Subtle decorative glow background -->
        <div class="absolute top-0 right-0 -mr-24 -mt-24 w-96 h-96 bg-emerald-100/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -ml-24 -mb-24 w-96 h-96 bg-lime-100/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
                
                <!-- Left: Headline + 2x2 Grid of Cards (Style Sesuai Referensi) -->
                <div class="lg:col-span-7 flex flex-col justify-center">
                    
                    <div class="mb-8">
                        <span class="text-xs font-bold uppercase tracking-widest text-emerald-800 block mb-2 font-poppins">
                            Program Unggulan Pesantren
                        </span>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-gray-900 font-poppins leading-[1.2] mb-3.5">
                            Pendidikan Holistik untuk Masa Depan <span class="text-emerald-800">Generasi Rabbani</span>
                        </h2>
                        <p class="text-gray-500 text-sm sm:text-base leading-relaxed">
                            Membina santri dengan integrasi kurikulum kepesantrenan, tahfizh Al-Qur'an, bahasa asing, dan sains modern.
                        </p>
                    </div>

                    @php
                        $cardStyles = [
                            // Card 1: Clean White
                            0 => [
                                'bg_class'    => 'bg-white',
                                'border_card' => 'border-t border-l border-r border-gray-200/70',
                                'border_tab'  => 'border-b border-r border-gray-200/70',
                                'border_btn'  => 'border border-gray-200 shadow-sm',
                                'shadow'      => 'shadow-lg shadow-gray-200/40',
                                'icon_wrap'   => 'text-gray-900',
                                'icon'        => 'ti-user-check',
                                'title_color' => 'text-gray-900',
                                'desc_color'  => 'text-gray-500',
                                'btn_bg'      => 'bg-white text-gray-900 hover:bg-gray-50',
                                'svg_text'    => 'text-white',
                                'has_rings'   => false,
                            ],
                            // Card 2: Vibrant Lime Green with Concentric Rings
                            1 => [
                                'bg_class'    => 'bg-[#bef264]',
                                'border_card' => 'border-t border-l border-r border-[#a3e635]',
                                'border_tab'  => 'border-b border-r border-[#a3e635]',
                                'border_btn'  => 'border border-[#a3e635]',
                                'shadow'      => 'shadow-lg shadow-lime-900/10',
                                'icon_wrap'   => 'text-[#062d27]',
                                'icon'        => 'ti-book-2',
                                'title_color' => 'text-[#062d27]',
                                'desc_color'  => 'text-[#062d27]/85 font-medium',
                                'btn_bg'      => 'bg-[#bef264] text-[#062d27] hover:bg-[#a3e635]',
                                'svg_text'    => 'text-[#bef264]',
                                'has_rings'   => true,
                                'ring_color'  => 'border-[#a3e635]/60',
                            ],
                            // Card 3: Deep Dark Forest Green
                            2 => [
                                'bg_class'    => 'bg-[#062d27]',
                                'border_card' => 'border-t border-l border-r border-emerald-900/80',
                                'border_tab'  => 'border-b border-r border-emerald-900/80',
                                'border_btn'  => 'border border-[#0e443b]',
                                'shadow'      => 'shadow-xl shadow-emerald-950/20',
                                'icon_wrap'   => 'text-[#bef264]',
                                'icon'        => 'ti-language',
                                'title_color' => 'text-white',
                                'desc_color'  => 'text-emerald-100/75',
                                'btn_bg'      => 'bg-[#062d27] text-white hover:bg-[#0c3933]',
                                'svg_text'    => 'text-[#062d27]',
                                'has_rings'   => false,
                            ],
                            // Card 4: Deep Emerald / Dark Teal
                            3 => [
                                'bg_class'    => 'bg-[#0c3933]',
                                'border_card' => 'border-t border-l border-r border-emerald-800/80',
                                'border_tab'  => 'border-b border-r border-emerald-800/80',
                                'border_btn'  => 'border border-[#15544a]',
                                'shadow'      => 'shadow-xl shadow-emerald-950/20',
                                'icon_wrap'   => 'text-emerald-300',
                                'icon'        => 'ti-flask-2',
                                'title_color' => 'text-white',
                                'desc_color'  => 'text-emerald-100/75',
                                'btn_bg'      => 'bg-[#0c3933] text-white hover:bg-[#062d27]',
                                'svg_text'    => 'text-[#0c3933]',
                                'has_rings'   => true,
                                'ring_color'  => 'border-emerald-600/20',
                            ],
                        ];
                    @endphp

                    <!-- 2x2 Grid of Cards (Susun 2-2 Kebawah Sesuai Referensi) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6">
                        @foreach($unggulan as $index => $item)
                            @php
                                $style = $cardStyles[$index % count($cardStyles)];
                            @endphp
                            <div class="group flex flex-col justify-between hover:-translate-y-1.5 transition-all duration-300">
                                
                                <!-- UPPER CARD BODY -->
                                <div class="relative {{ $style['bg_class'] }} {{ $style['border_card'] }} {{ $style['shadow'] }} rounded-t-[2rem] rounded-bl-[1.75rem] p-6 sm:p-7 pb-5 sm:pb-6 overflow-hidden min-h-[190px] flex flex-col justify-between">
                                    
                                    {{-- Concentric Decorative Circles for Watermark Effect --}}
                                    @if(!empty($style['has_rings']))
                                        <div class="absolute -bottom-8 -right-8 w-36 h-36 rounded-full border-[14px] {{ $style['ring_color'] }} pointer-events-none"></div>
                                        <div class="absolute -bottom-3 -right-3 w-20 h-20 rounded-full border-[10px] {{ $style['ring_color'] }} pointer-events-none"></div>
                                    @endif

                                    <div class="relative z-10">
                                        <!-- Top Icon (Clean Line Art Style) -->
                                        <div class="w-10 h-10 flex items-center justify-start {{ $style['icon_wrap'] }} text-3xl mb-3.5 group-hover:scale-110 transition-transform">
                                            <i class="ti {{ $style['icon'] }}"></i>
                                        </div>

                                        <!-- Title -->
                                        <h3 class="text-base sm:text-lg font-bold {{ $style['title_color'] }} font-poppins mb-1.5 leading-snug">
                                            {{ $item->nama_program }}
                                        </h3>

                                        <!-- Description -->
                                        <p class="text-xs sm:text-[13px] {{ $style['desc_color'] }} leading-relaxed line-clamp-3">
                                            {{ $item->deskripsi }}
                                        </p>
                                    </div>
                                </div>

                                <!-- BOTTOM ROW: NOTCH (BUTTON) ON LEFT + EXTENSION WITH INVERTED CURVE FILLET ON RIGHT -->
                                <div class="flex items-start -mt-[1px]">
                                    
                                    <!-- Left Notch: Standalone Pill Button (Explore More >) -->
                                    <div class="pt-2.5 pr-2.5 shrink-0">
                                        <a href="#jenjang-pendidikan" class="inline-flex items-center gap-1.5 px-4 sm:px-5 py-2 sm:py-2.5 rounded-full {{ $style['btn_bg'] }} {{ $style['border_btn'] }} {{ $style['shadow'] }} text-[11px] sm:text-xs font-bold font-poppins transition-all duration-300 group-hover:gap-2">
                                            <span>Explore More</span>
                                            <i class="ti ti-chevron-right text-[10px] sm:text-xs font-bold"></i>
                                        </a>
                                    </div>

                                    <!-- Right Dropped Extension + Concave Inverted Corner SVG -->
                                    <div class="flex-1 relative {{ $style['bg_class'] }} {{ $style['border_tab'] }} {{ $style['shadow'] }} h-11 sm:h-12 rounded-bl-[1.5rem] rounded-br-[2rem]">
                                        <!-- Inverted Fillet (Lengkungan Masuk / Concave Curve) -->
                                        <svg class="absolute top-0 -left-[19.5px] w-5 h-5 {{ $style['svg_text'] }} pointer-events-none" viewBox="0 0 20 20" fill="none">
                                            <path d="M0 0 C11.046 0 20 8.954 20 20 V0 H0 Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right: Visual Showcase (Model Standalone with Animated Ornaments & Glowing Atmosphere) -->
                <div class="lg:col-span-5 relative flex items-center justify-center min-h-[460px] lg:min-h-[520px]">
                    
                    <!-- Atmospheric Radial Glow Backdrop -->
                    <div class="absolute w-[320px] sm:w-[400px] h-[320px] sm:h-[400px] bg-gradient-to-tr from-emerald-300/45 via-lime-200/35 to-teal-100/25 rounded-full blur-3xl pointer-events-none animate-pulse-glow z-0"></div>

                    <!-- Concentric Animated Decorative Rings -->
                    <div class="absolute w-[340px] sm:w-[420px] h-[340px] sm:h-[420px] rounded-full border-2 border-dashed border-emerald-400/35 pointer-events-none animate-spin-slow z-0"></div>
                    <div class="absolute w-[260px] sm:w-[330px] h-[260px] sm:h-[330px] rounded-full border border-emerald-500/25 pointer-events-none animate-spin-reverse z-0 flex items-start justify-center">
                        <!-- Orbiting Accent Dot -->
                        <div class="w-3 h-3 rounded-full bg-[#bef264] border-2 border-emerald-800 shadow-sm -mt-1.5"></div>
                    </div>

                    <!-- Subtle Pattern Matrix Accent -->
                    <div class="absolute top-4 right-6 grid grid-cols-4 gap-2 opacity-25 pointer-events-none z-0">
                        @for($i=0; $i<12; $i++)
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-800"></span>
                        @endfor
                    </div>

                    <!-- Sparkle Accents -->
                    <div class="absolute top-8 left-8 text-emerald-600 text-xl pointer-events-none animate-pulse z-0">
                        <i class="ti ti-sparkles"></i>
                    </div>
                    <div class="absolute bottom-20 right-8 text-lime-500 text-lg pointer-events-none animate-pulse z-0" style="animation-delay: 1.2s;">
                        <i class="ti ti-sparkles"></i>
                    </div>

                    <!-- Standalone Model Image (No rigid box background) -->
                    <div class="relative z-10 flex flex-col items-center">
                        <img 
                            src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_3) : 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1000&q=80' }}" 
                            alt="Santri Pesantren Al Amin" 
                            class="max-h-[440px] sm:max-h-[500px] lg:max-h-[540px] w-auto object-contain drop-shadow-[0_25px_35px_rgba(6,45,39,0.20)] animate-float"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1000&q=80';"
                        >
                        <!-- Soft Ground Ambient Shadow -->
                        <div class="w-48 sm:w-60 h-5 bg-emerald-950/15 rounded-[100%] blur-md -mt-2.5 pointer-events-none scale-y-75"></div>
                    </div>

                    <!-- Floating Glass Card 1 (Top Left) -->
                    <div class="absolute top-10 -left-2 sm:-left-6 bg-white/90 backdrop-blur-md rounded-2xl p-3 sm:p-3.5 border border-white/80 shadow-xl shadow-emerald-950/10 flex items-center gap-3 z-20 animate-float">
                        <div class="w-10 h-10 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center shrink-0 shadow-sm">
                            <i class="ti ti-certificate text-xl"></i>
                        </div>
                        <div>
                            <div class="text-[11px] sm:text-xs font-black text-gray-900 font-poppins">Kurikulum Terpadu</div>
                            <div class="text-[10px] text-gray-500">Pesantren & Sains</div>
                        </div>
                    </div>

                    <!-- Floating Glass Card 2 (Bottom Right) -->
                    <div class="absolute bottom-10 -right-2 sm:-right-6 bg-white/90 backdrop-blur-md rounded-2xl p-3 sm:p-3.5 border border-white/80 shadow-xl shadow-emerald-950/10 flex items-center gap-3 z-20 animate-float-delayed">
                        <div class="w-10 h-10 rounded-xl bg-[#bef264] text-[#062d27] flex items-center justify-center shrink-0 shadow-sm">
                            <i class="ti ti-award text-xl"></i>
                        </div>
                        <div>
                            <div class="text-[11px] sm:text-xs font-black text-gray-900 font-poppins">Generasi Qur'ani</div>
                            <div class="text-[10px] text-gray-500">Berakhlak & Mandiri</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- SEBARAN ALUMNI (DI BAWAH PROGRAM UNGGULAN) --}}
    <section class="py-14 lg:py-16 bg-white border-t border-gray-100">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="text-center mb-8">
                <span class="text-xs uppercase font-bold tracking-widest text-gray-400 font-poppins">Sebaran Alumni di Perguruan Tinggi</span>
            </div>
            
            <div x-data="{ activeId: null }" class="overflow-hidden relative py-2">
                <div class="absolute inset-y-0 left-0 w-24 sm:w-36 bg-gradient-to-r from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
                <div class="absolute inset-y-0 right-0 w-24 sm:w-36 bg-gradient-to-l from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
                
                <div class="flex items-center animate-marquee">
                    @foreach($alumni as $index => $item)
                        <div 
                            @click="activeId = (activeId === 'alumni-{{ $item->id }}' ? null : 'alumni-{{ $item->id }}')"
                            :class="activeId === 'alumni-{{ $item->id }}' ? 'grayscale-0 opacity-100 scale-110 drop-shadow-md' : 'grayscale opacity-60 hover:opacity-85'"
                            class="mx-8 sm:mx-12 cursor-pointer transition-all duration-300 shrink-0 flex items-center justify-center select-none"
                            title="{{ $item->nama_universitas }} (Klik untuk melihat warna)"
                        >
                            <img src="{{ $item->getAdminImageUrl($item->logo) }}" alt="{{ $item->nama_universitas }}" class="h-14 sm:h-16 lg:h-20 w-auto max-w-[180px] object-contain">
                        </div>
                    @endforeach
                    @foreach($alumni as $index => $item)
                        <div 
                            @click="activeId = (activeId === 'alumni-{{ $item->id }}' ? null : 'alumni-{{ $item->id }}')"
                            :class="activeId === 'alumni-{{ $item->id }}' ? 'grayscale-0 opacity-100 scale-110 drop-shadow-md' : 'grayscale opacity-60 hover:opacity-85'"
                            class="mx-8 sm:mx-12 cursor-pointer transition-all duration-300 shrink-0 flex items-center justify-center select-none"
                            title="{{ $item->nama_universitas }} (Klik untuk melihat warna)"
                        >
                            <img src="{{ $item->getAdminImageUrl($item->logo) }}" alt="{{ $item->nama_universitas }}" class="h-14 sm:h-16 lg:h-20 w-auto max-w-[180px] object-contain">
                        </div>
                    @endforeach
                    @if($alumni->isEmpty())
                        <div class="flex gap-14 sm:gap-20 items-center">
                            <img src="https://upload.wikimedia.org/wikipedia/id/0/09/Logo_UPI.png" class="h-14 sm:h-16 lg:h-20 w-auto grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer object-contain" alt="UPI">
                            <img src="https://upload.wikimedia.org/wikipedia/id/thumb/0/01/Logo_Unsil.png/600px-Logo_Unsil.png" class="h-14 sm:h-16 lg:h-20 w-auto grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer object-contain" alt="Unsil">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Sakarya_University_logo.png/800px-Sakarya_University_logo.png" class="h-14 sm:h-16 lg:h-20 w-auto grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer object-contain" alt="Sakarya">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Al-Azhar_University_logo.png/600px-Al-Azhar_University_logo.png" class="h-14 sm:h-16 lg:h-20 w-auto grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer object-contain" alt="Al-Azhar">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- BERITA & DAFTAR PRESTASI (2 KOLOM: KIRI BERITA, KANAN PRESTASI) --}}
    <section class="py-16 lg:py-20 bg-gray-50/60 border-t border-gray-100" data-aos="fade-up">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                
                <!-- Left Column: Berita & Kegiatan (1 Hero Card + 2x2 Grid Sesuai Referensi) -->
                <div class="lg:col-span-7 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200/80">
                        <div>
                            <span class="text-emerald-700 font-bold text-xs uppercase tracking-widest mb-1 block font-poppins">Informasi</span>
                            <h2 class="text-2xl font-black text-gray-900 font-poppins">Berita & Kegiatan</h2>
                        </div>
                        <a href="{{ route('news.index') }}" class="inline-flex items-center gap-1.5 text-emerald-800 font-bold text-xs uppercase tracking-wider hover:text-emerald-600 transition-colors">
                            <span>Lihat Semua</span>
                            <i class="ti ti-arrow-right text-xs"></i>
                        </a>
                    </div>

                    @if($news->isNotEmpty())
                        @php 
                            $mainNews = $news->first(); 
                            $secondaryNews = $news->skip(1)->take(4);
                        @endphp
                        
                        <div class="grid grid-cols-1 sm:grid-cols-12 gap-3.5 sm:gap-4">
                            <!-- 1 Large Card (Left) -->
                            <div class="sm:col-span-6 flex">
                                <a href="{{ route('news.show', $mainNews->slug) }}" class="group relative w-full rounded-3xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 flex flex-col justify-end p-5 sm:p-6 min-h-[340px] sm:min-h-[400px]">
                                    <!-- Background Cover Image -->
                                    <img 
                                        src="{{ $mainNews->getAdminImageUrl($mainNews->image, 'posts') }}" 
                                        alt="" 
                                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                        onerror="this.onerror=null; this.outerHTML='<div class=\'absolute inset-0 w-full h-full bg-emerald-950 flex items-center justify-center text-emerald-300/30\'><i class=\'ti ti-photo text-6xl\'></i></div>';"
                                    >
                                    <!-- Gradient Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/40 to-transparent"></div>
                                    
                                    <!-- Text Content -->
                                    <div class="relative z-10">
                                        <h3 class="text-white font-bold text-sm sm:text-base lg:text-lg font-poppins leading-snug line-clamp-3 group-hover:text-[#bef264] transition-colors">
                                            {{ $mainNews->title }}
                                        </h3>
                                        <div class="flex items-center gap-2 text-white/80 text-[11px] sm:text-xs mt-3 font-medium">
                                            <i class="ti ti-calendar text-xs sm:text-sm"></i>
                                            <span>{{ $mainNews->created_at->translatedFormat('d F Y') }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- 4 Cards arranged in 2x2 Grid (Right) -->
                            <div class="sm:col-span-6 grid grid-cols-2 gap-3 sm:gap-3.5">
                                @foreach($secondaryNews as $item)
                                    <a href="{{ route('news.show', $item->slug) }}" class="group relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col justify-end p-3 sm:p-3.5 min-h-[160px] sm:min-h-[190px]">
                                        <!-- Background Cover Image -->
                                        <img 
                                            src="{{ $item->getAdminImageUrl($item->image, 'posts') }}" 
                                            alt="" 
                                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            onerror="this.onerror=null; this.outerHTML='<div class=\'absolute inset-0 w-full h-full bg-emerald-950 flex items-center justify-center text-emerald-300/30\'><i class=\'ti ti-photo text-4xl\'></i></div>';"
                                        >
                                        <!-- Gradient Overlay -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/35 to-transparent"></div>
                                        
                                        <!-- Text Content -->
                                        <div class="relative z-10">
                                            <h4 class="text-white font-bold text-xs font-poppins leading-snug line-clamp-2 group-hover:text-[#bef264] transition-colors">
                                                {{ $item->title }}
                                            </h4>
                                            <div class="flex items-center gap-1.5 text-white/75 text-[10px] mt-1.5 font-medium">
                                                <i class="ti ti-calendar text-[11px]"></i>
                                                <span>{{ $item->created_at->translatedFormat('d F Y') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="py-12 text-center bg-white rounded-2xl border border-dashed border-gray-200">
                            <p class="text-gray-400 text-xs italic">Belum ada berita terbaru.</p>
                        </div>
                    @endif
                </div>

                <!-- Right Column: Daftar Prestasi (Dengan Vertical Marquee Animasi ke Atas) -->
                <div class="lg:col-span-5 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200/80">
                        <div>
                            <span class="text-amber-600 font-bold text-xs uppercase tracking-widest mb-1 block font-poppins">Pencapaian Santri</span>
                            <h2 class="text-2xl font-black text-gray-900 font-poppins">Daftar Prestasi</h2>
                        </div>
                        <div class="flex items-center gap-1.5 text-amber-600 text-xs font-bold font-poppins">
                            <i class="ti ti-trophy text-base"></i>
                            <span>Prestasi Terkini</span>
                        </div>
                    </div>

                    @if($prestasi->isNotEmpty())
                        <div class="relative h-[360px] sm:h-[400px] overflow-hidden rounded-3xl p-1">
                            <!-- Gradient Fade Overlays (Top & Bottom) -->
                            <div class="absolute inset-x-0 top-0 h-10 bg-gradient-to-b from-gray-50/90 via-gray-50/50 to-transparent z-10 pointer-events-none"></div>
                            <div class="absolute inset-x-0 bottom-0 h-10 bg-gradient-to-t from-gray-50/90 via-gray-50/50 to-transparent z-10 pointer-events-none"></div>

                            <div class="animate-marquee-vertical space-y-3.5">
                                @foreach($prestasi as $item)
                                    <div class="bg-white rounded-2xl p-3.5 sm:p-4 border border-gray-100 shadow-sm hover:shadow-lg hover:border-amber-200/80 transition-all duration-300 flex items-center gap-3.5 group">
                                        
                                        <!-- Foto Santri / Fallback Icon User -->
                                        @if($item->foto)
                                            <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl overflow-hidden border-2 border-emerald-600/30 shadow-sm shrink-0 bg-gray-100">
                                                <img src="{{ $item->getAdminImageUrl($item->foto) }}" alt="{{ $item->nama_siswa }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                            </div>
                                        @else
                                            <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-[#062d27] to-[#0e3a33] text-[#bef264] border-2 border-emerald-700/40 flex flex-col items-center justify-center shrink-0 shadow-sm group-hover:scale-105 transition-transform duration-300">
                                                <i class="ti ti-user text-2xl"></i>
                                            </div>
                                        @endif

                                        <!-- Detail Konten Prestasi -->
                                        <div class="min-w-0 flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-amber-50 text-amber-800 border border-amber-200/70">
                                                    <i class="ti ti-trophy text-amber-600 text-xs"></i>
                                                    <span>{{ $item->tingkat ?? 'Prestasi' }}</span>
                                                </span>
                                                @php
                                                    $unitName = $item->unit->nama_unit ?? ($units->firstWhere('kode_unit', $item->kode_unit)->nama_unit ?? $item->kode_unit);
                                                @endphp
                                                @if($unitName)
                                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-100">
                                                        {{ $unitName }}
                                                    </span>
                                                @endif
                                            </div>
                                            <h4 class="font-bold text-gray-900 text-xs sm:text-sm font-poppins line-clamp-1 group-hover:text-emerald-800 transition-colors">
                                                {{ $item->prestasi }}
                                            </h4>
                                            <p class="text-xs text-gray-500 font-medium flex items-center gap-1.5 mt-0.5">
                                                <i class="ti ti-user-check text-emerald-700 text-xs"></i>
                                                <span>{{ $item->nama_siswa }}</span>
                                            </p>
                                        </div>

                                    </div>
                                @endforeach

                                {{-- Duplicate items for seamless infinite loop --}}
                                @foreach($prestasi as $item)
                                    <div class="bg-white rounded-2xl p-3.5 sm:p-4 border border-gray-100 shadow-sm hover:shadow-lg hover:border-amber-200/80 transition-all duration-300 flex items-center gap-3.5 group">
                                        
                                        <!-- Foto Santri / Fallback Icon User -->
                                        @if($item->foto)
                                            <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl overflow-hidden border-2 border-emerald-600/30 shadow-sm shrink-0 bg-gray-100">
                                                <img src="{{ $item->getAdminImageUrl($item->foto) }}" alt="{{ $item->nama_siswa }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                            </div>
                                        @else
                                            <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-[#062d27] to-[#0e3a33] text-[#bef264] border-2 border-emerald-700/40 flex flex-col items-center justify-center shrink-0 shadow-sm group-hover:scale-105 transition-transform duration-300">
                                                <i class="ti ti-user text-2xl"></i>
                                            </div>
                                        @endif

                                        <!-- Detail Konten Prestasi -->
                                        <div class="min-w-0 flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-amber-50 text-amber-800 border border-amber-200/70">
                                                    <i class="ti ti-trophy text-amber-600 text-xs"></i>
                                                    <span>{{ $item->tingkat ?? 'Prestasi' }}</span>
                                                </span>
                                                @php
                                                    $unitName = $item->unit->nama_unit ?? ($units->firstWhere('kode_unit', $item->kode_unit)->nama_unit ?? $item->kode_unit);
                                                @endphp
                                                @if($unitName)
                                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-100">
                                                        {{ $unitName }}
                                                    </span>
                                                @endif
                                            </div>
                                            <h4 class="font-bold text-gray-900 text-xs sm:text-sm font-poppins line-clamp-1 group-hover:text-emerald-800 transition-colors">
                                                {{ $item->prestasi }}
                                            </h4>
                                            <p class="text-xs text-gray-500 font-medium flex items-center gap-1.5 mt-0.5">
                                                <i class="ti ti-user-check text-emerald-700 text-xs"></i>
                                                <span>{{ $item->nama_siswa }}</span>
                                            </p>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="py-12 text-center bg-white rounded-2xl border border-dashed border-gray-200">
                            <p class="text-gray-400 text-xs italic">Belum ada daftar prestasi yang ditampilkan.</p>
                    @endif
                </div>

            </div>
        </div>
    </section>

    {{-- GURU & TENAGA PENDIDIK (SLIDER) --}}
    @if(isset($gurus) && $gurus->isNotEmpty())
        <section class="py-20 lg:py-24 bg-white relative overflow-hidden border-t border-gray-100" data-aos="fade-up">
            <!-- Subtle background ambient glow -->
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-emerald-50/70 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-amber-50/60 rounded-full blur-3xl pointer-events-none"></div>

            <div class="container mx-auto px-6 lg:px-12 relative z-10"
                 x-data="{
                    scrollContainer: null,
                    init() {
                        this.scrollContainer = this.$refs.guruSlider;
                    },
                    prev() {
                        if (this.scrollContainer) {
                            this.scrollContainer.scrollBy({ left: -340, behavior: 'smooth' });
                        }
                    },
                    next() {
                        if (this.scrollContainer) {
                            this.scrollContainer.scrollBy({ left: 340, behavior: 'smooth' });
                        }
                    }
                 }">
                
                <!-- Section Header with Slider Navigation -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                    <div class="max-w-2xl">
                        <span class="text-xs font-bold uppercase tracking-widest text-emerald-800 block mb-2 font-poppins">
                            Asatidz & Asatidzah
                        </span>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-gray-900 font-poppins mb-3">
                            Guru & Tenaga Pendidik
                        </h2>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Membimbing para santri dengan ketulusan hati, keilmuan mendalam, serta keteladanan akhlak mulia di setiap jenjang pendidikan Pesantren Al Amin.
                        </p>
                    </div>

                    <!-- Slider Controls -->
                    <div class="flex items-center gap-3 shrink-0">
                        <button @click="prev()" 
                                class="w-12 h-12 rounded-2xl bg-white border border-gray-200 text-gray-700 hover:text-emerald-800 hover:border-emerald-600 hover:bg-emerald-50/50 flex items-center justify-center shadow-sm hover:shadow transition-all duration-300 active:scale-95 group"
                                aria-label="Sebelumnya">
                            <i class="ti ti-chevron-left text-xl group-hover:-translate-x-0.5 transition-transform"></i>
                        </button>
                        <button @click="next()" 
                                class="w-12 h-12 rounded-2xl bg-[#062d27] text-white hover:bg-[#0a463d] flex items-center justify-center shadow-md shadow-emerald-950/20 transition-all duration-300 active:scale-95 group"
                                aria-label="Selanjutnya">
                            <i class="ti ti-chevron-right text-xl group-hover:translate-x-0.5 transition-transform"></i>
                        </button>
                    </div>
                </div>

                <!-- Slider Track -->
                <div x-ref="guruSlider" 
                     class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory py-4 -mx-6 px-6 sm:mx-0 sm:px-0 scrollbar-none">
                    @foreach($gurus as $guru)
                        @php
                            $jabatan = ($guru->jabatan && $guru->jabatan->nama_jabatan != 'Undifined') 
                                ? $guru->jabatan->nama_jabatan 
                                : 'Tenaga Pendidik';
                            $unitName = $guru->unit->nama_unit ?? ($units->firstWhere('kode_unit', $guru->kode_unit)->nama_unit ?? null);
                        @endphp
                        <div class="shrink-0 w-64 sm:w-72 lg:w-76 snap-start">
                            <div class="bg-white rounded-3xl p-4 border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-emerald-950/5 hover:-translate-y-1.5 transition-all duration-300 flex flex-col h-full group">
                                
                                <!-- Card Image / Avatar Wrapper -->
                                <div class="relative w-full aspect-[4/4.8] rounded-2xl overflow-hidden bg-gradient-to-b from-gray-100 to-emerald-950/5 mb-4">
                                    @if($guru->foto)
                                        <img src="{{ $guru->getAdminImageUrl($guru->foto) }}" 
                                             alt="{{ $guru->nama_lengkap }}" 
                                             class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <!-- Sleek Fallback Portrait with Emerald Gradient & Pattern -->
                                        <div class="w-full h-full bg-gradient-to-br from-[#062d27] via-[#093a32] to-[#0e4e43] relative flex flex-col items-center justify-center text-white p-6 overflow-hidden">
                                            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#bef264_1px,transparent_1px)] [background-size:16px_16px]"></div>
                                            <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-3xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-[#bef264] shadow-inner relative z-10 group-hover:scale-110 transition-transform duration-500">
                                                <i class="ti ti-user text-3xl sm:text-4xl"></i>
                                            </div>
                                            <div class="mt-4 text-center relative z-10">
                                                <span class="text-[10px] font-bold tracking-widest uppercase text-emerald-200/80 block">Asatidz Al Amin</span>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Floating Unit Badge on Photo -->
                                    @if($unitName)
                                        <div class="absolute top-3 left-3">
                                            <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-white/95 backdrop-blur-md text-emerald-900 border border-emerald-100 shadow-sm">
                                                {{ $unitName }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Card Information -->
                                <div class="flex-1 flex flex-col justify-between">
                                    <div>
                                        <h3 class="font-bold text-gray-900 text-sm sm:text-base font-poppins group-hover:text-emerald-800 transition-colors line-clamp-1" title="{{ $guru->nama_lengkap }}">
                                            {{ $guru->nama_lengkap }}
                                        </h3>
                                        <p class="text-xs text-emerald-700 font-semibold mt-1 flex items-center gap-1.5">
                                            <i class="ti ti-id-badge-2 text-xs"></i>
                                            <span class="truncate">{{ $jabatan }}</span>
                                        </p>
                                    </div>

                                    <div class="pt-3.5 mt-3.5 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                                        <span class="text-[11px] font-medium flex items-center gap-1 text-gray-500">
                                            <i class="ti ti-school text-emerald-600"></i>
                                            <span class="truncate">{{ $unitName ?? 'Pesantren' }}</span>
                                        </span>
                                        <span class="w-7 h-7 rounded-lg bg-gray-50 group-hover:bg-emerald-50 group-hover:text-emerald-700 flex items-center justify-center text-gray-400 transition-colors">
                                            <i class="ti ti-arrow-up-right text-sm"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    {{-- TESTIMONI (SECTION PALING BAWAH) --}}
    @if($testimonials->isNotEmpty())
        <section class="py-20 lg:py-24 bg-gray-50/70 border-t border-gray-100 relative overflow-hidden" data-aos="fade-up">
            <div class="container mx-auto px-6 lg:px-12 relative z-10">
                
                <div class="text-center max-w-2xl mx-auto mb-14">
                    <span class="text-xs font-bold uppercase tracking-widest text-emerald-800 block mb-2 font-poppins">
                        Kata Mereka
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-gray-900 font-poppins mb-3">
                        Testimoni Wali Santri & Alumni
                    </h2>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Pengalaman dan kesan nyata dari para orang tua dan alumni mengenai proses pendidikan di Pesantren Al Amin.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                    @foreach($testimonials->take(3) as $testi)
                        <div class="bg-white rounded-3xl p-7 lg:p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-emerald-950/5 transition-all duration-300 flex flex-col justify-between hover:-translate-y-1">
                            <div>
                                <!-- Rating & Quote Icon -->
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-1 text-amber-400">
                                        <i class="ti ti-star-filled text-sm"></i>
                                        <i class="ti ti-star-filled text-sm"></i>
                                        <i class="ti ti-star-filled text-sm"></i>
                                        <i class="ti ti-star-filled text-sm"></i>
                                        <i class="ti ti-star-filled text-sm"></i>
                                    </div>
                                    <i class="ti ti-quote text-2xl text-emerald-200"></i>
                                </div>

                                <!-- Testimonial Text -->
                                <blockquote class="text-gray-700 text-xs sm:text-sm leading-relaxed mb-6 italic">
                                    "{{ $testi->testimoni }}"
                                </blockquote>
                            </div>

                            <!-- Author Info -->
                            <div class="flex items-center gap-3.5 pt-4 border-t border-gray-100">
                                <div class="shrink-0">
                                    @if($testi->foto)
                                        <img src="{{ $testi->getAdminImageUrl($testi->foto) }}" alt="{{ $testi->nama }}" class="w-11 h-11 rounded-full object-cover shadow border border-emerald-100">
                                    @else
                                        <div class="w-11 h-11 rounded-full bg-[#062d27] text-[#bef264] flex items-center justify-center font-bold text-xs shadow">
                                            {{ collect(explode(' ', $testi->nama))->map(fn($n) => substr($n, 0, 1))->take(2)->join('') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-bold text-gray-900 text-sm font-poppins truncate">{{ $testi->nama }}</h4>
                                    <span class="text-[11px] text-gray-400 font-medium">Wali Santri / Alumni</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    <style>
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 30s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }

        @keyframes floatGentle {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        @keyframes floatGentleReverse {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(8px); }
        }
        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        @keyframes spinReverseSlow {
            from { transform: rotate(360deg); }
            to { transform: rotate(0deg); }
        }
        @keyframes pulseGlow {
            0%, 100% { transform: scale(1); opacity: 0.65; }
            50% { transform: scale(1.08); opacity: 0.95; }
        }

        .animate-float {
            animation: floatGentle 5s ease-in-out infinite;
        }
        .animate-float-delayed {
            animation: floatGentleReverse 6s ease-in-out infinite;
            animation-delay: 1.5s;
        }
        .animate-spin-slow {
            animation: spinSlow 35s linear infinite;
        }
        .animate-spin-reverse {
            animation: spinReverseSlow 45s linear infinite;
        }
        .animate-pulse-glow {
            animation: pulseGlow 4s ease-in-out infinite;
        }

        @keyframes marqueeVertical {
            0% { transform: translateY(0); }
            100% { transform: translateY(-50%); }
        }
        .animate-marquee-vertical {
            animation: marqueeVertical 25s linear infinite;
        }
        .animate-marquee-vertical:hover {
            animation-play-state: paused;
        }

        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-none {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endsection
