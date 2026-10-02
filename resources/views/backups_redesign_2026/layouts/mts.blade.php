<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MTs Persis Sindangkasih - Madrasah Tsanawiyah Unggul')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}">
    <link rel="shortcut icon" href="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}" type="image/x-icon">
    
    @include('layouts.partials.seo')

    <!-- Google Fonts: Plus Jakarta Sans, Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Tailwind CSS Script & Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brown: {
                            50: '#efebe9',
                            100: '#d7ccc8',
                            200: '#bcaaa4',
                            300: '#a1887f',
                            400: '#8d6e63',
                            500: '#795548',
                            600: '#6d4c41',
                            700: '#5d4037',
                            800: '#4e342e',
                            900: '#3e2723',
                            950: '#271714',
                        }
                    },
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        /* Custom Scrollbar hide */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* Explicit Utility Colors Fallback */
        .bg-brown-dark { background-color: #3e2723 !important; }
        .bg-brown-medium { background-color: #4e342e !important; }
        .bg-brown-warm { background-color: #5d4037 !important; }
        .bg-brown-soft { background-color: #efebe9 !important; }
        .bg-amber-gold { background-color: #f59e0b !important; }
        
        .text-brown-dark { color: #3e2723 !important; }
        .text-brown-medium { color: #5d4037 !important; }
        .text-brown-light { color: #8d6e63 !important; }
        
        .border-brown-dark { border-color: #3e2723 !important; }
        .border-brown-medium { border-color: #5d4037 !important; }

        .btn-primary-brown {
            background-color: #3e2723 !important;
            color: #ffffff !important;
            border-radius: 0.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        .btn-primary-brown:hover {
            background-color: #271714 !important;
            color: #ffffff !important;
        }

        .btn-accent-gold {
            background-color: #f59e0b !important;
            color: #2d1b18 !important;
            border-radius: 0.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            transition: all 0.2s ease;
        }
        .btn-accent-gold:hover {
            background-color: #d97706 !important;
            color: #1a0f0d !important;
        }

        .btn-nav-gold {
            background-color: #f59e0b !important;
            color: #ffffff !important;
            border-radius: 9999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            transition: all 0.2s ease;
        }
        .btn-nav-gold:hover {
            background-color: #d97706 !important;
            color: #ffffff !important;
        }
    </style>
</head>
<body class="antialiased bg-[#fdfcfb] text-slate-800 overflow-x-hidden selection:bg-[#d7ccc8] selection:text-[#3e2723]">

    <!-- 1. Top Bar / Header Nav (Dark Chocolate Brown Theme) -->
    <header 
        x-data="{ scrolled: false, mobileMenu: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
        :class="scrolled ? 'py-3' : 'py-3.5 sm:py-4'"
        class="sticky top-0 left-0 right-0 z-50 transition-all duration-300 shadow-xl shadow-[#271714]/30 border-b border-[#4e342e]"
        style="background-color: #3e2723 !important;"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex justify-between items-center">
            
            <!-- Logo & Brand Identity (Brand on Left) -->
            <a href="{{ route('unit.show', 'mts') }}" class="flex items-center gap-3.5 group">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-white border border-stone-200/40 shadow-sm flex items-center justify-center p-1.5 group-hover:scale-105 transition-transform shrink-0">
                    <img src="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}" alt="Logo MTs Persis" class="w-full h-full object-contain">
                </div>
                <div>
                    <div class="font-inter font-extrabold text-lg sm:text-xl tracking-tight leading-none text-white">
                        <span>MTs</span> <span class="text-amber-400">Persis</span>
                    </div>
                    <span class="text-[9px] sm:text-[10px] font-bold text-stone-300 tracking-wider uppercase block mt-1">Madrasah Tsanawiyah</span>
                </div>
            </a>

            <!-- Desktop Nav Links (Identik dengan SDIT: Ringkas, Rapi, & Pas di Layar) -->
            <nav class="hidden lg:flex items-center gap-4 xl:gap-6 font-inter font-semibold text-stone-200 text-xs xl:text-sm whitespace-nowrap">
                <a href="#hero" class="hover:text-amber-400 transition-colors py-1">Beranda</a>
                <a href="#prakata" class="hover:text-amber-400 transition-colors py-1">Prakata</a>
                <a href="#fasilitas" class="hover:text-amber-400 transition-colors py-1">Fasilitas</a>
                <a href="#layanan" class="hover:text-amber-400 transition-colors py-1">Program</a>
                <a href="#guru" class="hover:text-amber-400 transition-colors py-1">Guru & Staff</a>
                <a href="#testimoni" class="hover:text-amber-400 transition-colors py-1">Testimoni</a>
                <a href="#berita" class="hover:text-amber-400 transition-colors py-1">Berita</a>
                <a href="#biaya" class="hover:text-amber-400 transition-colors py-1 text-amber-400">Biaya</a>
            </nav>

            <!-- Right Contacts & Action Button (Yellow Gold Pill / Warm Amber Button) -->
            <div class="hidden lg:flex items-center gap-4 xl:gap-5 font-inter shrink-0">
                <!-- Phone / Whatsapp Call Us Anytime -->
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', ($setting->unit_whatsapp ?? '081223344556')) }}" target="_blank" class="flex items-center gap-2 text-xs text-stone-200 hover:text-amber-400 font-semibold transition-colors group">
                    <div class="w-8 h-8 rounded-full bg-amber-400/20 text-amber-400 flex items-center justify-center text-sm border border-amber-400/30 group-hover:scale-105 transition-transform">
                        <i class="ti ti-brand-whatsapp"></i>
                    </div>
                    <div class="text-left leading-tight hidden xl:block">
                        <div class="text-[9px] text-stone-400 font-medium">Konsultasi PSB</div>
                        <span class="font-bold text-white text-xs">{{ $setting->unit_whatsapp ?? '(0265) 771234' }}</span>
                    </div>
                </a>
                
                <!-- Book Now / Daftar Button (Warm Golden Yellow Rounded Pill) -->
                <a href="{{ $setting->cta_button_url ?? '/register' }}" class="btn-nav-gold px-5 xl:px-6 py-2 xl:py-2.5 rounded-full font-bold text-xs shadow-md shadow-amber-500/30 hover:shadow-lg transition-all transform hover:-translate-y-0.5 whitespace-nowrap" style="background-color: #f59e0b !important; color: #1e1210 !important;">
                    Daftar Santri Baru
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="flex items-center gap-2.5 lg:hidden">
                <a href="/register" class="btn-nav-gold px-3.5 py-1.5 rounded-full font-inter font-bold text-[11px] shadow-sm" style="background-color: #f59e0b !important; color: #1e1210 !important;">
                    Daftar
                </a>
                <button 
                    @click="mobileMenu = !mobileMenu" 
                    class="w-10 h-10 rounded-xl bg-white/10 text-white hover:bg-white/20 flex items-center justify-center active:scale-95 transition-all"
                    aria-label="Toggle Menu"
                >
                    <i :class="mobileMenu ? 'ti ti-x' : 'ti ti-menu-2'" class="text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown (Identik SDIT) -->
        <div 
            x-show="mobileMenu" 
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="lg:hidden border-b border-[#4e342e] shadow-2xl px-6 py-6 font-inter text-stone-200 max-h-[calc(100vh-80px)] overflow-y-auto"
            style="background-color: #3e2723 !important;"
        >
            <div class="flex flex-col gap-2 text-sm">
                <a @click="mobileMenu = false" href="#hero" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Beranda</span>
                    <i class="ti ti-chevron-right text-stone-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#prakata" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Prakata Mudir</span>
                    <i class="ti ti-chevron-right text-stone-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#fasilitas" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Fasilitas</span>
                    <i class="ti ti-chevron-right text-stone-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#layanan" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Program Unggulan</span>
                    <i class="ti ti-chevron-right text-stone-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#guru" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Guru & Staff</span>
                    <i class="ti ti-chevron-right text-stone-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#testimoni" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Testimoni</span>
                    <i class="ti ti-chevron-right text-stone-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#berita" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Berita</span>
                    <i class="ti ti-chevron-right text-stone-400 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#biaya" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between text-amber-400">
                    <span>Rincian Biaya</span>
                    <i class="ti ti-chevron-right text-stone-400 text-sm"></i>
                </a>
                
                <div class="pt-4 border-t border-white/10 flex flex-col gap-2.5">
                    <a href="/register" class="w-full py-3 rounded-full font-bold text-center shadow-md shadow-amber-500/20" style="background-color: #f59e0b !important; color: #1e1210 !important;">
                        Daftar Santri Baru
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Mirrored from Reference (Clean Multi-column Dark Chocolate/Espresso Footer) -->
    <footer class="bg-[#2d1b18] text-white pt-16 pb-12 border-t border-stone-800 relative overflow-hidden font-inter">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 pb-12 border-b border-stone-800">
                
                <!-- Col 1: Brand Info (lg:col-span-4) -->
                <div class="lg:col-span-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-xl bg-white p-1.5 shadow-md flex items-center justify-center shrink-0">
                            <img src="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}" alt="MTs Persis" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h3 class="font-inter font-bold text-xl text-white leading-tight">MTs Persis Sindangkasih</h3>
                            <p class="font-inter font-semibold text-xs text-amber-400">Madrasah Tsanawiyah Terakreditasi</p>
                        </div>
                    </div>
                    <p class="text-stone-300 text-xs sm:text-sm leading-relaxed mb-6">
                        Lembaga pendidikan Islam tingkat lanjutan pertama di bawah naungan Pesantren Persatuan Islam 80 Sindangkasih, mencetak santri berakhlak mulia, tafaqquh fiddin, dan berdaya saing tinggi.
                    </p>
                    <div class="flex items-center gap-2 text-stone-400">
                        <a href="{{ $setting->unit_instagram ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-stone-800 hover:bg-[#f59e0b] hover:text-[#2d1b18] flex items-center justify-center transition-all">
                            <i class="ti ti-brand-instagram text-lg"></i>
                        </a>
                        <a href="{{ $setting->unit_facebook ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-stone-800 hover:bg-[#f59e0b] hover:text-[#2d1b18] flex items-center justify-center transition-all">
                            <i class="ti ti-brand-facebook text-lg"></i>
                        </a>
                        <a href="{{ $setting->unit_youtube ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-stone-800 hover:bg-[#f59e0b] hover:text-[#2d1b18] flex items-center justify-center transition-all">
                            <i class="ti ti-brand-youtube text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links (lg:col-span-2) -->
                <div class="lg:col-span-2">
                    <h4 class="font-inter font-bold text-sm text-white uppercase tracking-wider mb-4 text-amber-400">Quick Links</h4>
                    <ul class="font-medium text-xs sm:text-sm text-stone-300 space-y-2.5">
                        <li><a href="#hero" class="hover:text-amber-400 transition-colors">Home</a></li>
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Services</a></li>
                        <li><a href="#tentang" class="hover:text-amber-400 transition-colors">About Us</a></li>
                        <li><a href="#biaya" class="hover:text-amber-400 transition-colors">Pricing</a></li>
                        <li><a href="#testimoni" class="hover:text-amber-400 transition-colors">Reviews</a></li>
                    </ul>
                </div>

                <!-- Col 3: Our Services (lg:col-span-3) -->
                <div class="lg:col-span-3">
                    <h4 class="font-inter font-bold text-sm text-white uppercase tracking-wider mb-4 text-amber-400">Program Kami</h4>
                    <ul class="font-medium text-xs sm:text-sm text-stone-300 space-y-2.5">
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Tahfidz & Dirasah Islamiyah</a></li>
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Penguasaan Kitab Mu'tabarah</a></li>
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Sains Terapan & Laboratorium</a></li>
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Bilingual Arab & Inggris</a></li>
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Kepanduan & Life Skills</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact Us (lg:col-span-3) -->
                <div class="lg:col-span-3">
                    <h4 class="font-inter font-bold text-sm text-white uppercase tracking-wider mb-4 text-amber-400">Contact Us</h4>
                    <div class="text-xs sm:text-sm text-stone-300 space-y-3">
                        <div class="flex items-start gap-2.5">
                            <i class="ti ti-map-pin text-amber-400 text-base shrink-0 mt-0.5"></i>
                            <span>Komplek Pesantren Persatuan Islam 80 Sindangkasih, Ciamis, Jawa Barat</span>
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
                            <span>{{ $setting->unit_email ?? 'mts@persisalamin.com' }}</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left text-xs text-stone-400">
                <div>
                    &copy; {{ date('Y') }} <strong>MTs Persis Sindangkasih</strong>. All rights reserved.
                </div>
                <div class="flex items-center gap-4 text-stone-400">
                    <a href="/" class="hover:text-white transition-colors">Pesantren Al-Amin</a>
                    <span>•</span>
                    <a href="{{ route('unit.sdit.short') }}" class="hover:text-white transition-colors">SDIT</a>
                    <span>•</span>
                    <a href="{{ route('unit.tk') }}" class="hover:text-white transition-colors">TK Calisa</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Action -->
    @php
        $unitWaNum = ($setting && $setting->unit_whatsapp) ? preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $setting->unit_whatsapp)) : ($pengaturan->telepon ?? '081223344556');
    @endphp
    <a href="https://wa.me/{{ $unitWaNum }}?text=Halo%20Admin%20MTs%20Persis%20Sindangkasih,%20saya%20ingin%20tanya%20seputar%20penerimaan%20santri%20baru" target="_blank" class="fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-50 w-12 h-12 sm:w-14 sm:h-14 bg-[#25D366] hover:bg-[#1ebd59] text-white rounded-full flex items-center justify-center shadow-xl hover:scale-110 active:scale-95 transition-all" aria-label="WhatsApp Admin">
        <i class="ti ti-brand-whatsapp text-2xl sm:text-3xl"></i>
    </a>

    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const isMobile = window.innerWidth < 768;
            AOS.init({
                duration: 500,
                once: true,
                offset: isMobile ? 0 : 40,
                delay: 0,
            });
            // Refresh AOS setelah semua gambar & aset selesai dimuat agar kalkulasi posisi offset akurat
            window.addEventListener('load', () => {
                AOS.refresh();
            });
            // Re-refresh setelah delay singkat untuk mengantisipasi gambar lazy / dinamis
            setTimeout(() => {
                AOS.refresh();
            }, 800);
        });
    </script>
</body>
</html>
