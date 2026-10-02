<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MA Al-Amin Sindangkasih - Madrasah Aliyah Unggul & Pesantren')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}">
    <link rel="shortcut icon" href="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}" type="image/x-icon">
    
    @include('layouts.partials.seo')

    <!-- Google Fonts: Plus Jakarta Sans, DM Sans, Urbanist -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..900;1,9..40,400..900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=Urbanist:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    
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
                        softgreen: {
                            50: '#f4f8f6',
                            100: '#e5f0ec',
                            200: '#cce2d9',
                            300: '#a3cdbe',
                            400: '#71b19d',
                            500: '#4a957f',
                            600: '#387865',
                            700: '#2d6052',
                            800: '#285a48',
                            900: '#1f4537',
                            950: '#112820',
                        }
                    },
                    fontFamily: {
                        sans: ['DM Sans', 'Plus Jakarta Sans', 'sans-serif'],
                        heading: ['Urbanist', 'DM Sans', 'sans-serif'],
                        inter: ['DM Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'DM Sans', 'Plus Jakarta Sans', sans-serif; }
        .font-heading { font-family: 'Urbanist', 'DM Sans', sans-serif; }
        .font-inter { font-family: 'DM Sans', sans-serif; }

        /* Custom Scrollbar hide */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* Soft Elegant Sage/Pine Green Palette (Like EduLearn Modern Reference) */
        .bg-green-soft-main { background-color: #285a48 !important; }
        .bg-green-soft-dark { background-color: #1f4537 !important; }
        .bg-green-soft-light { background-color: #f2f7f4 !important; }
        
        .text-green-soft-main { color: #285a48 !important; }
        .text-green-soft-dark { color: #1f4537 !important; }
        
        .border-green-soft-main { border-color: #285a48 !important; }

        .btn-primary-green {
            background-color: #285a48 !important;
            color: #ffffff !important;
            border-radius: 0.75rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        .btn-primary-green:hover {
            background-color: #1f4537 !important;
            color: #ffffff !important;
        }

        .btn-accent-gold {
            background-color: #f59e0b !important;
            color: #183329 !important;
            border-radius: 0.75rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            transition: all 0.2s ease;
        }
        .btn-accent-gold:hover {
            background-color: #d97706 !important;
            color: #112820 !important;
        }

        .btn-nav-gold {
            background-color: #f59e0b !important;
            color: #183329 !important;
            border-radius: 9999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            transition: all 0.2s ease;
        }
        .btn-nav-gold:hover {
            background-color: #d97706 !important;
            color: #112820 !important;
        }
    </style>
</head>
<body class="antialiased bg-[#fafcfb] text-slate-800 overflow-x-hidden selection:bg-[#cce2d9] selection:text-[#1f4537]">

    <!-- 1. Top Bar / Header Nav (Soft Deep Pine Green) -->
    <header 
        x-data="{ scrolled: false, mobileMenu: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
        :class="scrolled ? 'py-3' : 'py-3.5 sm:py-4'"
        class="sticky top-0 left-0 right-0 z-50 transition-all duration-300 shadow-lg shadow-[#1f4537]/15 border-b border-[#346d59]"
        style="background: linear-gradient(135deg, #285a48 0%, #1f4537 100%) !important;"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex justify-between items-center">
            
            <!-- Logo & Brand Identity (Brand on Left) -->
            <a href="{{ route('unit.show', 'ma') }}" class="flex items-center gap-3.5 group">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-white border border-emerald-200/40 shadow-sm flex items-center justify-center p-1.5 group-hover:scale-105 transition-transform shrink-0">
                    <img src="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}" alt="Logo MA Al-Amin" class="w-full h-full object-contain">
                </div>
                <div>
                    <div class="font-inter font-extrabold text-lg sm:text-xl tracking-tight leading-none text-white">
                        <span>MA</span> <span class="text-amber-400">Al-Amin</span>
                    </div>
                    <span class="text-[9px] sm:text-[10px] font-bold text-emerald-200/80 tracking-wider uppercase block mt-1">Madrasah Aliyah</span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden lg:flex items-center gap-4 xl:gap-6 font-inter font-semibold text-emerald-100 text-xs xl:text-sm whitespace-nowrap">
                <a href="#hero" class="hover:text-amber-400 transition-colors py-1">Beranda</a>
                <a href="#prakata" class="hover:text-amber-400 transition-colors py-1">Prakata</a>
                <a href="#fasilitas" class="hover:text-amber-400 transition-colors py-1">Fasilitas</a>
                <a href="#layanan" class="hover:text-amber-400 transition-colors py-1">Program</a>
                <a href="#guru" class="hover:text-amber-400 transition-colors py-1">Guru & Staff</a>
                <a href="#testimoni" class="hover:text-amber-400 transition-colors py-1">Testimoni</a>
                <a href="#berita" class="hover:text-amber-400 transition-colors py-1">Berita</a>
                <a href="#biaya" class="hover:text-amber-400 transition-colors py-1 text-amber-400">Biaya</a>
            </nav>

            <!-- Right Contacts & Action Button -->
            <div class="hidden lg:flex items-center gap-4 xl:gap-5 font-inter shrink-0">
                <!-- Phone / Whatsapp Call Us Anytime -->
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', ($setting->unit_whatsapp ?? '081223344556')) }}" target="_blank" class="flex items-center gap-2 text-xs text-emerald-100 hover:text-amber-400 font-semibold transition-colors group">
                    <div class="w-8 h-8 rounded-full bg-amber-400/20 text-amber-400 flex items-center justify-center text-sm border border-amber-400/30 group-hover:scale-105 transition-transform">
                        <i class="ti ti-brand-whatsapp"></i>
                    </div>
                    <div class="text-left leading-tight hidden xl:block">
                        <div class="text-[9px] text-emerald-300 font-medium">Konsultasi PSB</div>
                        <span class="font-bold text-white text-xs">{{ $setting->unit_whatsapp ?? '(0265) 771234' }}</span>
                    </div>
                </a>
                
                <!-- Book Now / Daftar Button -->
                <a href="{{ $setting->cta_button_url ?? '/register' }}" class="btn-nav-gold px-5 xl:px-6 py-2 xl:py-2.5 rounded-full font-bold text-xs shadow-md shadow-amber-500/30 hover:shadow-lg transition-all transform hover:-translate-y-0.5 whitespace-nowrap" style="background-color: #f59e0b !important; color: #022c22 !important;">
                    Daftar Santri Baru
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="flex items-center gap-2.5 lg:hidden">
                <a href="/register" class="btn-nav-gold px-3.5 py-1.5 rounded-full font-inter font-bold text-[11px] shadow-sm" style="background-color: #f59e0b !important; color: #022c22 !important;">
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
            class="lg:hidden border-b border-[#346d59] shadow-2xl px-6 py-6 font-inter text-emerald-100 max-h-[calc(100vh-80px)] overflow-y-auto"
            style="background-color: #285a48 !important;"
        >
            <div class="flex flex-col gap-2 text-sm">
                <a @click="mobileMenu = false" href="#hero" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Beranda</span>
                    <i class="ti ti-chevron-right text-emerald-300 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#prakata" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Prakata Mudir</span>
                    <i class="ti ti-chevron-right text-emerald-300 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#fasilitas" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Fasilitas</span>
                    <i class="ti ti-chevron-right text-emerald-300 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#layanan" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Program Unggulan</span>
                    <i class="ti ti-chevron-right text-emerald-300 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#guru" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Guru & Staff</span>
                    <i class="ti ti-chevron-right text-emerald-300 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#testimoni" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Testimoni</span>
                    <i class="ti ti-chevron-right text-emerald-300 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#berita" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between">
                    <span>Berita</span>
                    <i class="ti ti-chevron-right text-emerald-300 text-sm"></i>
                </a>
                <a @click="mobileMenu = false" href="#biaya" class="py-2.5 px-3 rounded-xl hover:bg-white/10 hover:text-amber-400 transition-colors flex items-center justify-between text-amber-400">
                    <span>Rincian Biaya</span>
                    <i class="ti ti-chevron-right text-emerald-300 text-sm"></i>
                </a>
                
                <div class="pt-4 border-t border-white/10 flex flex-col gap-2.5">
                    <a href="/register" class="w-full py-3 rounded-full font-bold text-center shadow-md shadow-amber-500/20" style="background-color: #f59e0b !important; color: #183329 !important;">
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

    <!-- Footer Mirrored from Reference (Soft Deep Pine Green Tone #18352b) -->
    <footer class="bg-[#18352b] text-white pt-16 pb-12 border-t border-[#254f40] relative overflow-hidden font-inter">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 pb-12 border-b border-white/10">
                
                <!-- Col 1: Brand Info (lg:col-span-4) -->
                <div class="lg:col-span-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-xl bg-white p-1.5 shadow-md flex items-center justify-center shrink-0">
                            <img src="{{ $unit && $unit->logo ? $unit->getAdminImageUrl($unit->logo) : ($pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico')) }}" alt="MA Al-Amin" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h3 class="font-inter font-bold text-xl text-white leading-tight">MA Al-Amin Sindangkasih</h3>
                            <p class="font-inter font-semibold text-xs text-amber-400">Madrasah Aliyah Terakreditasi</p>
                        </div>
                    </div>
                    <p class="text-emerald-100/80 text-xs sm:text-sm leading-relaxed mb-6">
                        Lembaga pendidikan Islam tingkat menengah atas di bawah naungan Pesantren Persatuan Islam 80 Sindangkasih, mencetak santri ulama kaffah, berakhlak karimah, tafaqquh fiddin, dan siap menuju perguruan tinggi terbaik.
                    </p>
                    <div class="flex items-center gap-2 text-emerald-200">
                        <a href="{{ $setting->unit_instagram ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-emerald-900/60 hover:bg-[#f59e0b] hover:text-[#022c22] flex items-center justify-center transition-all border border-emerald-800">
                            <i class="ti ti-brand-instagram text-lg"></i>
                        </a>
                        <a href="{{ $setting->unit_facebook ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-emerald-900/60 hover:bg-[#f59e0b] hover:text-[#022c22] flex items-center justify-center transition-all border border-emerald-800">
                            <i class="ti ti-brand-facebook text-lg"></i>
                        </a>
                        <a href="{{ $setting->unit_youtube ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-emerald-900/60 hover:bg-[#f59e0b] hover:text-[#022c22] flex items-center justify-center transition-all border border-emerald-800">
                            <i class="ti ti-brand-youtube text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links (lg:col-span-2) -->
                <div class="lg:col-span-2">
                    <h4 class="font-inter font-bold text-sm text-white uppercase tracking-wider mb-4 text-amber-400">Quick Links</h4>
                    <ul class="font-medium text-xs sm:text-sm text-emerald-100/80 space-y-2.5">
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
                    <ul class="font-medium text-xs sm:text-sm text-emerald-100/80 space-y-2.5">
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Tahfidz & Dirasah Islamiyah</a></li>
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Penguasaan Kitab Turats</a></li>
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Sains, Riset & Olimpiade</a></li>
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Bilingual Arab & Inggris</a></li>
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Bimbingan Masuk PTN & Timur Tengah</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact Us (lg:col-span-3) -->
                <div class="lg:col-span-3">
                    <h4 class="font-inter font-bold text-sm text-white uppercase tracking-wider mb-4 text-amber-400">Contact Us</h4>
                    <div class="text-xs sm:text-sm text-emerald-100/80 space-y-3">
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
                            <span>{{ $setting->unit_email ?? 'ma@persisalamin.com' }}</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left text-xs text-emerald-300/70">
                <div>
                    &copy; {{ date('Y') }} <strong>MA Al-Amin Sindangkasih</strong>. All rights reserved.
                </div>
                <div class="flex items-center gap-4 text-emerald-300/70">
                    <a href="/" class="hover:text-white transition-colors">Pesantren Al-Amin</a>
                    <span>•</span>
                    <a href="{{ route('unit.mts.short') }}" class="hover:text-white transition-colors">MTs</a>
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
    <a href="https://wa.me/{{ $unitWaNum }}?text=Halo%20Admin%20MA%20Al-Amin%20Sindangkasih,%20saya%20ingin%20tanya%20seputar%20penerimaan%20santri%20baru" target="_blank" class="fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-50 w-12 h-12 sm:w-14 sm:h-14 bg-[#25D366] hover:bg-[#1ebd59] text-white rounded-full flex items-center justify-center shadow-xl hover:scale-110 active:scale-95 transition-all" aria-label="WhatsApp Admin">
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
