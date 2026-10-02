<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'TK Calisa Rabbani - Al Amin')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}">
    <link rel="shortcut icon" href="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}" type="image/x-icon">
    
    @include('layouts.partials.seo')

    <!-- Fonts: Fredoka, Plus Jakarta Sans, Quicksand -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Tailwind Scripts and Styles -->
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-fredoka { font-family: 'Fredoka', cursive, sans-serif; }
        .font-quicksand { font-family: 'Quicksand', sans-serif; }

        /* Smooth Floating Animations */
        @keyframes float-model {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float-model { animation: float-model 5s ease-in-out infinite; }

        @keyframes sun-spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .animate-sun { animation: sun-spin 25s linear infinite; }

        @keyframes bounce-gentle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
        .animate-bounce-gentle { animation: bounce-gentle 3.5s ease-in-out infinite; }

        /* Washi tape effect */
        .washi-tape-cyan { background: rgba(56, 189, 248, 0.85); transform: rotate(-3deg); }
        .washi-tape-yellow { background: rgba(250, 204, 21, 0.9); transform: rotate(2deg); }
        .washi-tape-pink { background: rgba(244, 114, 182, 0.85); transform: rotate(-2deg); }

        /* Hide scrollbar for clean horizontal sliders */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="antialiased bg-[#fffdfa] text-slate-700 overflow-x-hidden">

    <!-- Top Sticky Header TK -->
    <header 
        x-data="{ scrolled: false, mobileMenu: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
        :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-sm py-2.5 sm:py-3.5' : 'bg-transparent py-3 sm:py-5'"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex justify-between items-center">
            <!-- Brand Logo -->
            <a href="{{ route('unit.tk') }}" class="flex items-center gap-2.5 sm:gap-3 group">
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-amber-400/20 border border-amber-300 flex items-center justify-center p-1.5 sm:p-2 shadow-sm group-hover:scale-105 transition-transform">
                    <img src="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}" alt="TK Calisa" class="w-full h-full object-contain">
                </div>
                <div>
                    <div class="font-fredoka font-bold text-xl sm:text-2xl tracking-tight leading-none">
                        <span class="text-amber-500">Ca</span><span class="text-teal-500">li</span><span class="text-pink-500">sa</span>
                    </div>
                    <span class="text-[9px] sm:text-[10px] font-bold text-amber-900 tracking-wider uppercase block mt-0.5">TK Calisa Rabbani</span>
                </div>
            </a>

            <!-- Nav Links -->
            <nav class="hidden lg:flex items-center gap-5 xl:gap-7 font-fredoka font-semibold text-slate-700 text-xs xl:text-sm">
                <a href="#hero" class="hover:text-amber-500 transition-colors">Beranda</a>
                <a href="#prakata" class="hover:text-amber-500 transition-colors">Prakata</a>
                <a href="#program-unggulan" class="hover:text-amber-500 transition-colors">Program</a>
                <a href="#fasilitas" class="hover:text-amber-500 transition-colors">Fasilitas</a>
                <a href="#testimoni" class="hover:text-amber-500 transition-colors">Testimoni</a>
                <a href="#berita" class="hover:text-amber-500 transition-colors">Berita</a>
                <a href="#guru" class="hover:text-amber-500 transition-colors">Guru</a>
                <a href="#biaya" class="hover:text-amber-500 transition-colors">Biaya</a>
            </nav>

            <!-- Right Buttons -->
            <div class="hidden lg:flex items-center gap-3 font-fredoka">
                <a href="/register" class="px-5 xl:px-6 py-2 xl:py-2.5 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-bold text-xs shadow-md shadow-amber-500/25 hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                    Daftar Sekarang
                </a>
                <a href="/" title="Kembali ke Web Pesantren" class="w-9 h-9 xl:w-10 xl:h-10 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-700 flex items-center justify-center transition-colors">
                    <i class="ti ti-arrow-back-up text-lg"></i>
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="flex items-center gap-2 lg:hidden">
                <a href="/register" class="px-3.5 py-1.5 rounded-full bg-amber-500 text-white font-fredoka font-bold text-[11px] shadow-sm">
                    Daftar
                </a>
                <button 
                    @click="mobileMenu = !mobileMenu" 
                    class="w-10 h-10 rounded-xl bg-amber-100 text-amber-900 flex items-center justify-center active:scale-95 transition-transform"
                    aria-label="Toggle Menu"
                >
                    <i :class="mobileMenu ? 'ti ti-x' : 'ti ti-menu-2'" class="text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div 
            x-show="mobileMenu" 
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="lg:hidden bg-white/98 backdrop-blur-xl border-b border-amber-100 shadow-xl px-6 py-6 font-fredoka text-slate-700 max-h-[calc(100vh-80px)] overflow-y-auto"
        >
            <div class="flex flex-col gap-3 text-sm sm:text-base">
                <a @click="mobileMenu = false" href="#hero" class="py-2 px-3 rounded-xl hover:bg-amber-50 hover:text-amber-600 transition-colors flex items-center justify-between">
                    <span>Beranda</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#prakata" class="py-2 px-3 rounded-xl hover:bg-amber-50 hover:text-amber-600 transition-colors flex items-center justify-between">
                    <span>Prakata Kepala Sekolah</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#program-unggulan" class="py-2 px-3 rounded-xl hover:bg-amber-50 hover:text-amber-600 transition-colors flex items-center justify-between">
                    <span>Program Unggulan TK</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#fasilitas" class="py-2 px-3 rounded-xl hover:bg-amber-50 hover:text-amber-600 transition-colors flex items-center justify-between">
                    <span>Fasilitas Ramah Anak</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#testimoni" class="py-2 px-3 rounded-xl hover:bg-amber-50 hover:text-amber-600 transition-colors flex items-center justify-between">
                    <span>Testimoni Orang Tua</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#berita" class="py-2 px-3 rounded-xl hover:bg-amber-50 hover:text-amber-600 transition-colors flex items-center justify-between">
                    <span>Berita & Kegiatan TK</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#guru" class="py-2 px-3 rounded-xl hover:bg-amber-50 hover:text-amber-600 transition-colors flex items-center justify-between">
                    <span>Daftar Guru & Pengasuh</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#biaya" class="py-2 px-3 rounded-xl hover:bg-amber-50 hover:text-amber-600 transition-colors flex items-center justify-between">
                    <span>Investasi & Rincian Biaya</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <div class="pt-4 mt-2 border-t border-slate-100 flex flex-col gap-2.5">
                    <a href="/register" class="text-center py-3 bg-gradient-to-r from-amber-500 to-orange-500 text-white rounded-2xl font-bold text-sm shadow-md flex items-center justify-center gap-2">
                        <span>Daftar Santri Baru</span>
                        <i class="ti ti-arrow-right"></i>
                    </a>
                    <a href="/" class="text-center py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-2xl font-bold text-xs flex items-center justify-center gap-1.5 transition-colors">
                        <i class="ti ti-arrow-back-up"></i>
                        <span>Website Utama Pesantren</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer TK Calisa Rabbani -->
    <footer class="bg-[#faf5eb] pt-14 sm:pt-20 pb-10 sm:pb-12 relative overflow-hidden border-t-4 border-amber-200">
        <!-- Subtle Glow Background -->
        <div class="absolute -top-20 -left-20 w-80 h-80 bg-amber-200/30 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-teal-100/30 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            
            <!-- Top Footer Card / Brand Intro -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-10 mb-12 font-fredoka">
                
                <!-- Col 1: Brand & Bio (lg:col-span-4) -->
                <div class="sm:col-span-2 lg:col-span-4 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 rounded-2xl bg-amber-400 border border-amber-300 flex items-center justify-center p-2 shadow-md">
                                <img src="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : asset('favicon.ico') }}" alt="TK Calisa" class="w-full h-full object-contain">
                            </div>
                            <div>
                                <div class="font-bold text-2xl tracking-tight leading-none">
                                    <span class="text-amber-500">Ca</span><span class="text-teal-500">li</span><span class="text-pink-500">sa</span>
                                </div>
                                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block mt-0.5">TK Calisa Rabbani</span>
                            </div>
                        </div>
                        <p class="font-quicksand font-semibold text-xs sm:text-sm text-slate-600 leading-relaxed mb-6">
                            Pendidikan Anak Usia Dini Terpadu berbasis fitrah anak, adab Islami, tahfidz Al-Qur'an surat pendek juz 30, dan stimulasi motorik ceria.
                        </p>
                    </div>

                    <!-- Social Media Links -->
                    <div>
                        <span class="text-[11px] font-fredoka font-bold text-amber-900 uppercase tracking-wider block mb-2.5">Ikuti Media Sosial Kami:</span>
                        <div class="flex items-center gap-2.5">
                            <a href="{{ $pengaturan->facebook ?? '#' }}" target="_blank" class="w-10 h-10 rounded-2xl bg-white shadow-sm border border-amber-200/60 flex items-center justify-center text-slate-600 hover:text-white hover:bg-blue-600 hover:border-blue-600 transition-all duration-300" aria-label="Facebook">
                                <i class="ti ti-brand-facebook text-xl"></i>
                            </a>
                            <a href="{{ $pengaturan->instagram ?? '#' }}" target="_blank" class="w-10 h-10 rounded-2xl bg-white shadow-sm border border-amber-200/60 flex items-center justify-center text-slate-600 hover:text-white hover:bg-gradient-to-tr hover:from-amber-500 hover:via-pink-500 hover:to-purple-600 transition-all duration-300" aria-label="Instagram">
                                <i class="ti ti-brand-instagram text-xl"></i>
                            </a>
                            <a href="{{ $pengaturan->youtube ?? '#' }}" target="_blank" class="w-10 h-10 rounded-2xl bg-white shadow-sm border border-amber-200/60 flex items-center justify-center text-slate-600 hover:text-white hover:bg-red-600 hover:border-red-600 transition-all duration-300" aria-label="YouTube">
                                <i class="ti ti-brand-youtube text-xl"></i>
                            </a>
                            <a href="https://wa.me/{{ $pengaturan->telepon ?? '089654052437' }}" target="_blank" class="w-10 h-10 rounded-2xl bg-white shadow-sm border border-amber-200/60 flex items-center justify-center text-slate-600 hover:text-white hover:bg-emerald-500 hover:border-emerald-500 transition-all duration-300" aria-label="WhatsApp">
                                <i class="ti ti-brand-whatsapp text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Navigasi Cepat (lg:col-span-2) -->
                <div class="lg:col-span-2">
                    <h4 class="font-bold text-sm sm:text-base text-slate-800 mb-3 sm:mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        <span>Navigasi</span>
                    </h4>
                    <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-quicksand font-bold">
                        <li><a href="#hero" class="hover:text-amber-600 transition-colors flex items-center gap-1.5"><i class="ti ti-chevron-right text-[10px] text-amber-500"></i>Beranda</a></li>
                        <li><a href="#prakata" class="hover:text-amber-600 transition-colors flex items-center gap-1.5"><i class="ti ti-chevron-right text-[10px] text-amber-500"></i>Prakata</a></li>
                        <li><a href="#program-unggulan" class="hover:text-amber-600 transition-colors flex items-center gap-1.5"><i class="ti ti-chevron-right text-[10px] text-amber-500"></i>Program</a></li>
                        <li><a href="#fasilitas" class="hover:text-amber-600 transition-colors flex items-center gap-1.5"><i class="ti ti-chevron-right text-[10px] text-amber-500"></i>Fasilitas</a></li>
                        <li><a href="#testimoni" class="hover:text-amber-600 transition-colors flex items-center gap-1.5"><i class="ti ti-chevron-right text-[10px] text-amber-500"></i>Testimoni</a></li>
                        <li><a href="#guru" class="hover:text-amber-600 transition-colors flex items-center gap-1.5"><i class="ti ti-chevron-right text-[10px] text-amber-500"></i>Guru TK</a></li>
                        <li><a href="#biaya" class="hover:text-amber-600 transition-colors flex items-center gap-1.5"><i class="ti ti-chevron-right text-[10px] text-amber-500"></i>Biaya PPDB</a></li>
                    </ul>
                </div>

                <!-- Col 3: Jenjang Lainnya (lg:col-span-2) -->
                <div class="lg:col-span-2">
                    <h4 class="font-bold text-sm sm:text-base text-slate-800 mb-3 sm:mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-teal-400"></span>
                        <span>Unit Pendidikan</span>
                    </h4>
                    <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-quicksand font-bold">
                        <li><a href="/unit/sdit" class="hover:text-teal-600 transition-colors flex items-center gap-1.5"><i class="ti ti-arrow-up-right text-[10px] text-teal-500"></i>SDIT Al-Amin</a></li>
                        <li><a href="/unit/mts" class="hover:text-teal-600 transition-colors flex items-center gap-1.5"><i class="ti ti-arrow-up-right text-[10px] text-teal-500"></i>MTs Persis</a></li>
                        <li><a href="/unit/ma" class="hover:text-teal-600 transition-colors flex items-center gap-1.5"><i class="ti ti-arrow-up-right text-[10px] text-teal-500"></i>MA Al-Amin</a></li>
                        <li><a href="/" class="hover:text-teal-600 transition-colors flex items-center gap-1.5"><i class="ti ti-arrow-up-right text-[10px] text-teal-500"></i>Pesantren Pusat</a></li>
                    </ul>
                </div>

                <!-- Col 4: Kontak & Alamat (lg:col-span-4) -->
                <div class="sm:col-span-2 lg:col-span-4">
                    <h4 class="font-bold text-sm sm:text-base text-slate-800 mb-3 sm:mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-pink-400"></span>
                        <span>Hubungi Kami</span>
                    </h4>
                    <div class="space-y-2.5 text-xs sm:text-sm text-slate-600 font-quicksand font-semibold bg-white/70 backdrop-blur-sm p-4 rounded-2xl border border-amber-200/70 shadow-xs">
                        <div class="flex items-start gap-2.5">
                            <div class="w-7 h-7 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center shrink-0 mt-0.5">
                                <i class="ti ti-map-pin text-sm"></i>
                            </div>
                            <span class="leading-relaxed">{{ $pengaturan->alamat_sekolah ?? 'Dusun Ancol 1 RT 04/01, Sindangkasih, Ciamis, Jawa Barat' }}</span>
                        </div>
                        <div class="flex items-center gap-2.5 pt-1 border-t border-slate-100">
                            <div class="w-7 h-7 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                <i class="ti ti-phone text-sm"></i>
                            </div>
                            <a href="tel:{{ $pengaturan->telepon ?? '089654052437' }}" class="hover:text-emerald-700 transition-colors font-bold">{{ $pengaturan->telepon ?? '089654052437' }}</a>
                        </div>
                        <div class="flex items-center gap-2.5 pt-1 border-t border-slate-100">
                            <div class="w-7 h-7 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center shrink-0">
                                <i class="ti ti-mail text-sm"></i>
                            </div>
                            <a href="mailto:{{ $pengaturan->email ?? 'tkcalisa@pesantrenalamin.sch.id' }}" class="break-all hover:text-sky-700 transition-colors">{{ $pengaturan->email ?? 'tkcalisa@pesantrenalamin.sch.id' }}</a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="border-t border-amber-200/80 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left text-xs font-quicksand font-bold text-slate-500">
                <div>
                    &copy; {{ date('Y') }} <span class="font-fredoka text-slate-700">TK Calisa Rabbani</span> • Pesantren Persatuan Islam 80 Al-Amin Sindangkasih.
                </div>
                <div class="flex items-center gap-4 text-[11px] text-slate-400">
                    <a href="#hero" class="hover:text-amber-600 transition-colors">Kembali ke Atas ↑</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Action -->
    <a href="https://wa.me/{{ $pengaturan->telepon ?? '089654052437' }}?text=Halo%20Admin%20TK%20Calisa%20Rabbani,%20saya%20ingin%20tanya%20seputar%20pendaftaran" target="_blank" class="fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-50 w-12 h-12 sm:w-14 sm:h-14 bg-[#25D366] hover:bg-[#1ebd59] text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 active:scale-95 transition-all" aria-label="WhatsApp Admin">
        <i class="ti ti-brand-whatsapp text-2xl sm:text-3xl"></i>
    </a>

    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true,
                offset: 30,
                easing: 'ease-out'
            });
        });
    </script>
</body>
</html>
