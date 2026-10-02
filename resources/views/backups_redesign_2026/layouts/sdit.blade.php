<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SDIT Al-Amin Sindangkasih - Sekolah Dasar Islam Terpadu')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}">
    <link rel="shortcut icon" href="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}" type="image/x-icon">
    
    @include('layouts.partials.seo')

    <!-- Google Fonts: Plus Jakarta Sans, Fredoka, Quicksand -->
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

        /* Floating & Doodling Animations */
        @keyframes float-gentle {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .animate-float-gentle { animation: float-gentle 4.5s ease-in-out infinite; }

        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
        .animate-bounce-slow { animation: bounce-slow 3s ease-in-out infinite; }

        @keyframes pulse-soft {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.85; transform: scale(1.05); }
        }
        .animate-pulse-soft { animation: pulse-soft 3s ease-in-out infinite; }

        /* Custom Scrollbar hide */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="antialiased bg-[#fafbfc] text-slate-700 overflow-x-hidden selection:bg-amber-400 selection:text-blue-950">

    <!-- 1. Top Announcement Bar (Mirroring Design: Hidden on Mobile, Visible on Desktop) -->
    <div class="hidden sm:block bg-[#192b56] text-white py-2 px-4 text-xs font-medium border-b border-blue-900/40 relative z-50">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-1.5 sm:gap-4 text-center sm:text-left">
            <div class="flex items-center justify-center gap-2">
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-amber-400 text-[#192b56] text-[10px]">
                    <i class="ti ti-bell-filled"></i>
                </span>
                <span class="text-slate-200">
                    Penerimaan Santri Baru (PSB) Tahun Ajaran <strong>{{ $activePPDB->tahun_ajaran ?? '2026/2027' }}</strong> Telah Dibuka!
                </span>
            </div>
            <a href="#biaya" class="inline-flex items-center gap-1 font-fredoka font-semibold text-amber-300 hover:text-white transition-colors">
                <span>Jadwal Observasi & Seleksi</span>
                <i class="ti ti-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    <!-- 2. Sticky Modern Navbar SDIT -->
    <header 
        x-data="{ scrolled: false, mobileMenu: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
        :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-sm py-3' : 'bg-transparent py-4 sm:py-5'"
        class="sticky top-0 left-0 right-0 z-40 transition-all duration-300 border-b border-slate-100"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex justify-between items-center">
            
            <!-- Logo & Brand Identity (Dominan Navy + Gold SDIT) -->
            <a href="{{ route('unit.show', 'sdit') }}" class="flex items-center gap-3 group">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center justify-center p-1.5 group-hover:scale-105 transition-transform shrink-0">
                    <img src="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}" alt="Logo SDIT Al-Amin" class="w-full h-full object-contain">
                </div>
                <div>
                    <div class="font-fredoka font-bold text-xl sm:text-2xl tracking-tight leading-none text-[#192b56]">
                        <span>SDIT</span> <span class="text-amber-500">Al-Amin</span>
                    </div>
                    <span class="text-[9px] sm:text-[10px] font-bold text-slate-500 tracking-wider uppercase block mt-1">Sekolah Dasar Islam Terpadu</span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden lg:flex items-center gap-6 xl:gap-8 font-fredoka font-semibold text-slate-600 text-xs xl:text-sm">
                <a href="#hero" class="hover:text-[#192b56] transition-colors">Beranda</a>
                <a href="#tentang" class="hover:text-[#192b56] transition-colors">Tentang</a>
                <a href="#program" class="hover:text-[#192b56] transition-colors">Program</a>
                <a href="#fasilitas" class="hover:text-[#192b56] transition-colors">Fasilitas</a>
                <a href="#testimoni" class="hover:text-[#192b56] transition-colors">Testimoni</a>
                <a href="#guru" class="hover:text-[#192b56] transition-colors">Guru & Staf</a>
                <a href="#berita" class="hover:text-[#192b56] transition-colors">Berita</a>
                <a href="#biaya" class="hover:text-[#192b56] transition-colors">Biaya</a>
            </nav>

            <!-- Right Contacts & Action Buttons (Navy Pill Button) -->
            <div class="hidden lg:flex items-center gap-4 font-fredoka">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', ($setting->unit_whatsapp ?? '081223344556')) }}" target="_blank" class="flex items-center gap-1.5 text-xs text-slate-600 hover:text-[#192b56] font-semibold transition-colors">
                    <div class="w-7 h-7 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm">
                        <i class="ti ti-brand-whatsapp"></i>
                    </div>
                    <span>{{ $setting->unit_whatsapp ?? '(0265) 771234' }}</span>
                </a>
                
                <a href="/register" class="px-5 xl:px-6 py-2 xl:py-2.5 rounded-full bg-[#192b56] hover:bg-[#121f3f] text-white font-bold text-xs shadow-md shadow-blue-950/20 hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                    Daftar Santri Baru
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="flex items-center gap-2 lg:hidden">
                <a href="/register" class="px-3.5 py-1.5 rounded-full bg-[#192b56] text-white font-fredoka font-bold text-[11px] shadow-sm">
                    Daftar
                </a>
                <button 
                    @click="mobileMenu = !mobileMenu" 
                    class="w-10 h-10 rounded-xl bg-slate-100 text-[#192b56] flex items-center justify-center active:scale-95 transition-transform"
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
            class="lg:hidden bg-white/98 backdrop-blur-xl border-b border-slate-200 shadow-xl px-6 py-6 font-fredoka text-slate-700 max-h-[calc(100vh-80px)] overflow-y-auto"
        >
            <div class="flex flex-col gap-3 text-sm">
                <a @click="mobileMenu = false" href="#hero" class="py-2.5 px-3 rounded-xl hover:bg-slate-50 hover:text-[#192b56] transition-colors flex items-center justify-between">
                    <span>Beranda</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#tentang" class="py-2.5 px-3 rounded-xl hover:bg-slate-50 hover:text-[#192b56] transition-colors flex items-center justify-between">
                    <span>Tentang & Sambutan</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#program" class="py-2.5 px-3 rounded-xl hover:bg-slate-50 hover:text-[#192b56] transition-colors flex items-center justify-between">
                    <span>Program Unggulan</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#fasilitas" class="py-2.5 px-3 rounded-xl hover:bg-slate-50 hover:text-[#192b56] transition-colors flex items-center justify-between">
                    <span>Fasilitas & Lingkungan</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#testimoni" class="py-2.5 px-3 rounded-xl hover:bg-slate-50 hover:text-[#192b56] transition-colors flex items-center justify-between">
                    <span>Testimoni Orang Tua</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#guru" class="py-2.5 px-3 rounded-xl hover:bg-slate-50 hover:text-[#192b56] transition-colors flex items-center justify-between">
                    <span>Dewan Asatidz / Guru</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#berita" class="py-2.5 px-3 rounded-xl hover:bg-slate-50 hover:text-[#192b56] transition-colors flex items-center justify-between">
                    <span>Berita & Kegiatan</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#biaya" class="py-2.5 px-3 rounded-xl hover:bg-slate-50 hover:text-[#192b56] transition-colors flex items-center justify-between">
                    <span>Rincian Biaya Pendidikan</span>
                    <i class="ti ti-chevron-right text-slate-400 text-sm"></i>
                </a>
                
                <div class="pt-4 border-t border-slate-100 flex flex-col gap-2.5">
                    <a href="/register" class="w-full py-3 rounded-xl bg-[#192b56] text-white text-center font-bold shadow-md shadow-blue-950/20">
                        Daftar Santri Baru
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Dynamic Content -->
    <main>
        @yield('content')
    </main>

    <!-- 3. Modern SDIT Footer -->
    <footer class="bg-[#142346] text-white pt-16 pb-10 border-t border-blue-900/50 relative overflow-hidden">
        <!-- Subtle Decorative Background Waves & Shapes -->
        <div class="absolute inset-0 pointer-events-none opacity-5">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon points="0,0 100,0 50,100" fill="currentColor" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 pb-12 border-b border-blue-900/60">
                
                <!-- Col 1: Brand Info (lg:col-span-4) -->
                <div class="lg:col-span-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-white p-1.5 shadow-md flex items-center justify-center shrink-0">
                            <img src="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}" alt="SDIT Al-Amin" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h3 class="font-fredoka font-bold text-xl text-white leading-tight">SDIT Al-Amin</h3>
                            <p class="font-quicksand font-bold text-xs text-amber-400">Sindangkasih • Ciamis</p>
                        </div>
                    </div>
                    <p class="font-quicksand text-slate-300 text-xs sm:text-sm leading-relaxed mb-6">
                        Sekolah Dasar Islam Terpadu yang berkomitmen membina generasi Qur'ani, berakhlak mulia, cerdas, berwawasan global, dan berprestasi akademik unggul.
                    </p>
                    <div class="flex items-center gap-2 text-slate-400">
                        <a href="{{ $setting->unit_instagram ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-blue-900/50 hover:bg-amber-400 hover:text-[#192b56] flex items-center justify-center transition-all">
                            <i class="ti ti-brand-instagram text-lg"></i>
                        </a>
                        <a href="{{ $setting->unit_facebook ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-blue-900/50 hover:bg-amber-400 hover:text-[#192b56] flex items-center justify-center transition-all">
                            <i class="ti ti-brand-facebook text-lg"></i>
                        </a>
                        <a href="{{ $setting->unit_youtube ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-blue-900/50 hover:bg-amber-400 hover:text-[#192b56] flex items-center justify-center transition-all">
                            <i class="ti ti-brand-youtube text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links (lg:col-span-2) -->
                <div class="lg:col-span-2">
                    <h4 class="font-fredoka font-bold text-sm text-white uppercase tracking-wider mb-4 text-amber-400">Navigasi</h4>
                    <ul class="font-quicksand font-semibold text-xs sm:text-sm text-slate-300 space-y-2.5">
                        <li><a href="#hero" class="hover:text-amber-400 transition-colors">Beranda</a></li>
                        <li><a href="#tentang" class="hover:text-amber-400 transition-colors">Tentang Kami</a></li>
                        <li><a href="#program" class="hover:text-amber-400 transition-colors">Program Unggulan</a></li>
                        <li><a href="#fasilitas" class="hover:text-amber-400 transition-colors">Fasilitas Sekolah</a></li>
                        <li><a href="#guru" class="hover:text-amber-400 transition-colors">Dewan Guru</a></li>
                    </ul>
                </div>

                <!-- Col 3: Informasi PPDB (lg:col-span-3) -->
                <div class="lg:col-span-3">
                    <h4 class="font-fredoka font-bold text-sm text-white uppercase tracking-wider mb-4 text-amber-400">Pendaftaran (PSB)</h4>
                    <ul class="font-quicksand font-semibold text-xs sm:text-sm text-slate-300 space-y-2.5">
                        <li><a href="/register" class="hover:text-amber-400 transition-colors">Formulir Pendaftaran Online</a></li>
                        <li><a href="#biaya" class="hover:text-amber-400 transition-colors">Rincian Biaya Pendidikan</a></li>
                        <li><a href="#testimoni" class="hover:text-amber-400 transition-colors">Testimoni Orang Tua</a></li>
                        <li><a href="/" class="hover:text-amber-400 transition-colors">Portal Utama Pesantren Al-Amin</a></li>
                    </ul>
                </div>

                <!-- Col 4: Kontak & Alamat (lg:col-span-3) -->
                <div class="lg:col-span-3">
                    <h4 class="font-fredoka font-bold text-sm text-white uppercase tracking-wider mb-4 text-amber-400">Kontak Kami</h4>
                    <div class="font-quicksand text-xs sm:text-sm text-slate-300 space-y-3">
                        <div class="flex items-start gap-2.5">
                            <i class="ti ti-map-pin text-amber-400 text-base shrink-0 mt-0.5"></i>
                            <span>Komplek Pesantren Persatuan Islam 80 Al-Amin, Sindangkasih, Ciamis, Jawa Barat</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i class="ti ti-phone text-amber-400 text-base shrink-0"></i>
                            <span>{{ $setting->unit_phone ?? '(0265) 771234' }}</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i class="ti ti-brand-whatsapp text-emerald-400 text-base shrink-0"></i>
                            <span>{{ $setting->unit_whatsapp ?? '081223344556' }}</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i class="ti ti-mail text-amber-400 text-base shrink-0"></i>
                            <span>{{ $setting->unit_email ?? 'sdit@persisalamin.com' }}</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left text-xs text-slate-400 font-quicksand font-semibold">
                <div>
                    &copy; {{ date('Y') }} <strong>SDIT Al-Amin Sindangkasih</strong>. Seluruh hak cipta dilindungi.
                </div>
                <div class="flex items-center gap-4 text-slate-400">
                    <a href="/" class="hover:text-white transition-colors">Pesantren Al-Amin</a>
                    <span>•</span>
                    <a href="{{ route('unit.tk') }}" class="hover:text-white transition-colors">TK Calisa</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Action (Identical to TK layout for fast contact on mobile) -->
    @php
        $unitWaNum = ($setting && $setting->unit_whatsapp) ? preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $setting->unit_whatsapp)) : ($pengaturan->telepon ?? '081223344556');
    @endphp
    <a href="https://wa.me/{{ $unitWaNum }}?text=Halo%20Admin%20SDIT%20Al-Amin,%20saya%20ingin%20tanya%20seputar%20pendaftaran%20santri%20baru" target="_blank" class="fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-50 w-12 h-12 sm:w-14 sm:h-14 bg-[#25D366] hover:bg-[#1ebd59] text-white rounded-full flex items-center justify-center shadow-xl hover:scale-110 active:scale-95 transition-all" aria-label="WhatsApp Admin">
        <i class="ti ti-brand-whatsapp text-2xl sm:text-3xl"></i>
    </a>

    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({
                duration: 700,
                once: true,
                offset: 30
            });
        });
    </script>
</body>
</html>
