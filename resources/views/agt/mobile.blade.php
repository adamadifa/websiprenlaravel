<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Al Amin Got Talent (AGT 2026) — Mobile Portal</title>
    
    <!-- Meta & SEO Tags -->
    <meta name="description" content="Portal Mobile Resmi Al Amin Got Talent (AGT 2026) Pesantren Persis 80 Sindangkasih. Panggung kompetisi bergengsi santri & pelajar tingkat nasional.">
    <meta name="theme-color" content="#220308">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}">

    <!-- Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Cinzel:wght@600;700;800;900&family=Montserrat:wght@800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Great+Vibes&display=swap" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <!-- Tailwind CSS & Alpine.js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            --bg-deep: #220308;
            --bg-card: rgba(58, 8, 18, 0.78);
            --gold-light: #fef08a;
            --gold-main: #eab308;
            --gold-dark: #a16207;
            --crimson-soft: #9f1239;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-deep);
            color: #f1f5f9;
            overflow-x: hidden;
            letter-spacing: -0.01em;
            -webkit-tap-highlight-color: transparent;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        .font-broadway {
            font-family: 'Anton', 'Montserrat', sans-serif;
            letter-spacing: 0.03em;
        }

        .font-signature {
            font-family: 'Great Vibes', cursive;
            font-weight: 400;
        }

        .stage-glow {
            background: 
                radial-gradient(circle at 50% 20%, rgba(190, 18, 60, 0.5) 0%, rgba(34, 3, 8, 0.98) 75%),
                linear-gradient(180deg, #1c0206 0%, #2b040b 50%, #200307 100%);
        }

        .glass-panel {
            background: rgba(48, 6, 14, 0.75);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(245, 158, 11, 0.22);
            box-shadow: 0 8px 24px -4px rgba(20, 1, 4, 0.55);
        }

        .text-gold-gradient {
            background: linear-gradient(135deg, #fef9c3 0%, #facc15 35%, #ca8a04 70%, #eab308 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-3d-talent {
            background: linear-gradient(180deg, #fffbeb 0%, #fef08a 25%, #facc15 50%, #eab308 75%, #ca8a04 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: 
                drop-shadow(0 1px 0 #854d0e)
                drop-shadow(0 2px 0 #713f12)
                drop-shadow(0 3px 0 #582f0e)
                drop-shadow(0 4px 6px rgba(0,0,0,0.9));
        }

        .btn-luxury-gold {
            background: linear-gradient(135deg, #fef08a 0%, #eab308 50%, #ca8a04 100%);
            color: #1a080a;
            font-weight: 700;
            box-shadow: 0 4px 18px -2px rgba(234, 179, 8, 0.35), inset 0 1px 1px rgba(255, 255, 255, 0.6);
        }

        .btn-luxury-gold:active {
            transform: scale(0.97);
            background: linear-gradient(135deg, #ffffff 0%, #facc15 50%, #d97706 100%);
        }

        .btn-luxury-outline {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(245, 158, 11, 0.3);
            color: #fef08a;
        }

        .btn-luxury-outline:active {
            transform: scale(0.97);
            background: rgba(245, 158, 11, 0.15);
        }

        /* Marquee Bulb Track SVG */
        .marquee-bulb-track {
            position: absolute;
            inset: 5px;
            width: calc(100% - 10px);
            height: calc(100% - 10px);
            pointer-events: none;
            overflow: visible;
        }

        .marquee-track-line {
            fill: none;
            stroke: rgba(245, 158, 11, 0.45);
            stroke-width: 2;
        }

        .marquee-dots-line {
            fill: none;
            stroke: #fffbeb;
            stroke-width: 8;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 0.1 22;
            animation: marqueeDotPulse 1.8s infinite ease-in-out;
            filter: drop-shadow(0 0 4px #fde047) drop-shadow(0 0 8px #eab308);
        }

        @keyframes marqueeDotPulse {
            0%, 100% {
                opacity: 1;
                filter: drop-shadow(0 0 5px #fef08a) drop-shadow(0 0 10px #eab308);
            }
            50% {
                opacity: 0.65;
                filter: drop-shadow(0 0 2px #fef08a) drop-shadow(0 0 5px #ca8a04);
            }
        }

        /* Animasi Glow Halus & Elegan untuk Kata Got */
        .got-signature-glow {
            animation: gotGlowPulse 2.8s infinite ease-in-out;
        }

        @keyframes gotGlowPulse {
            0%, 100% {
                filter: 
                    drop-shadow(0 3px 5px rgba(0,0,0,0.95))
                    drop-shadow(0 0 3px rgba(254, 240, 138, 0.35))
                    drop-shadow(0 0 8px rgba(234, 179, 8, 0.25));
            }
            50% {
                filter: 
                    drop-shadow(0 3px 5px rgba(0,0,0,0.95))
                    drop-shadow(0 0 6px rgba(254, 240, 138, 0.65))
                    drop-shadow(0 0 14px rgba(234, 179, 8, 0.45));
            }
        }

        .marquee-frame-board {
            background: radial-gradient(circle at 50% 40%, #581c20 0%, #2b0408 60%, #150103 100%);
            border: 4px solid #d97706;
            border-radius: 2.8rem;
            box-shadow: 
                0 0 0 5px #451a03,
                0 0 0 10px #b45309,
                0 0 0 13px #2d0f02,
                0 15px 35px rgba(0,0,0,0.95),
                inset 0 0 30px rgba(0,0,0,0.9);
        }

        /* ================= MOBILE CURTAIN ANIMATION ================= */
        /* Tirai mobile terbuka halus lalu langsung lenyap sepenuhnya (display:none) */
        .curtain-wrapper-left {
            position: absolute;
            top: 0; left: 0; bottom: 0;
            width: 50%;
            z-index: 40;
            pointer-events: none;
            overflow: hidden;
            animation: mobileOpenLeft 1.5s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.3s;
        }

        .css-curtain-left {
            width: 50vw;
            height: 100%;
            background: repeating-linear-gradient(
                90deg,
                #170001 0vw,
                #52050c 3vw,
                #8a0815 6vw,
                #6b0711 9vw,
                #170001 12vw
            );
            transform-origin: left;
            animation: mobileSquishLeft 1.5s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.3s;
        }

        .curtain-wrapper-right {
            position: absolute;
            top: 0; right: 0; bottom: 0;
            width: 50%;
            z-index: 40;
            pointer-events: none;
            overflow: hidden;
            animation: mobileOpenRight 1.5s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.3s;
        }

        .css-curtain-right {
            width: 50vw;
            height: 100%;
            position: absolute;
            right: 0;
            background: repeating-linear-gradient(
                -90deg,
                #170001 0vw,
                #52050c 3vw,
                #8a0815 6vw,
                #6b0711 9vw,
                #170001 12vw
            );
            transform-origin: right;
            animation: mobileSquishRight 1.5s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.3s;
        }

        @keyframes mobileOpenLeft {
            0% { width: 50%; opacity: 1; }
            70% { width: 12%; opacity: 0.8; }
            99% { width: 0%; opacity: 0; }
            100% { width: 0%; opacity: 0; display: none; }
        }

        @keyframes mobileOpenRight {
            0% { width: 50%; opacity: 1; }
            70% { width: 12%; opacity: 0.8; }
            99% { width: 0%; opacity: 0; }
            100% { width: 0%; opacity: 0; display: none; }
        }

        @keyframes mobileSquishLeft {
            0% { transform: scaleX(1); opacity: 1; }
            70% { transform: scaleX(0.2); opacity: 0.8; }
            100% { transform: scaleX(0); opacity: 0; }
        }

        @keyframes mobileSquishRight {
            0% { transform: scaleX(1); opacity: 1; }
            70% { transform: scaleX(0.2); opacity: 0.8; }
            100% { transform: scaleX(0); opacity: 0; }
        }

        /* Animasi Navbar Reveal Bersamaan dengan Papan Judul Al Amin Got Talent */
        .navbar-curtain-reveal {
            opacity: 0;
            pointer-events: none;
            animation: navbarRevealAnim 0.8s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.4s; /* Sinkron saat tirai mulai terbuka bersama judul */
        }

        @keyframes navbarRevealAnim {
            0% {
                opacity: 0;
                transform: translateY(-16px);
                pointer-events: none;
            }
            100% {
                opacity: 1;
                transform: translateY(0);
                pointer-events: auto;
            }
        }

        /* Hide horizontal scrollbar for tabs */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="selection:bg-amber-400 selection:text-amber-950 font-sans antialiased pb-20" x-data="{
    scrolled: false,
    mobileMenuOpen: false,
    activeTab: 'all',
    selectedComp: null,
    showJuknisModal: false,
    showPosterModal: false,
    selectedPoster: null,
    days: '00',
    hours: '00',
    minutes: '00',
    seconds: '00',
    initApp() {
        this.initCountdown();
        this.checkScroll();
        window.addEventListener('scroll', () => this.checkScroll());
    },
    checkScroll() {
        this.scrolled = window.pageYOffset > 30;
    },
    initCountdown() {
        const target = new Date('2027-01-16T08:00:00+07:00').getTime();
        const updateTimer = () => {
            const now = new Date().getTime();
            const diff = target - now;
            if (diff <= 0) {
                this.days = '00'; this.hours = '00'; this.minutes = '00'; this.seconds = '00';
                return;
            }
            this.days = String(Math.floor(diff / (1000 * 60 * 60 * 24))).padStart(2, '0');
            this.hours = String(Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
            this.minutes = String(Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
            this.seconds = String(Math.floor((diff % (1000 * 60)) / 1000)).padStart(2, '0');
        };
        updateTimer();
        setInterval(updateTimer, 1000);
    },
    openPoster(comp) {
        this.selectedPoster = comp;
        this.showPosterModal = true;
    },
    openJuknis(comp) {
        this.selectedComp = comp;
        this.showJuknisModal = true;
    },
    goToRegister(comp = null) {
        let url = '{{ route('agt.register.direct') }}';
        if (comp && comp.id) {
            url += '?lomba=' + comp.id;
        }
        window.location.href = url;
    }
}" x-init="initApp()">

    <!-- ==============================================================
         1. MOBILE NAVBAR (CLEAN, COMPACT, DEDICATED)
         ============================================================== -->
    <header class="navbar-curtain-reveal fixed top-0 left-0 right-0 z-50 transition-all duration-300"
            :class="scrolled ? 'bg-[#220308]/95 backdrop-blur-xl border-b border-amber-500/20 py-2.5 shadow-xl' : 'bg-transparent py-3.5'">
        <div class="px-4 flex items-center justify-between">
            
            <!-- Logo & Brand Header (Logo Gambar Resmi AGT) -->
            <a href="#hero" class="flex items-center group">
                <img src="{{ asset('images/agt/logo-agt.png') }}" 
                     alt="Logo Al Amin Got Talent" 
                     class="h-10 xs:h-12 w-auto object-contain filter drop-shadow-[0_2px_8px_rgba(234,179,8,0.45)] group-active:scale-95 transition-all">
            </a>

            <!-- Right Actions -->
            <div class="flex items-center gap-1.5 sm:gap-2">
                @auth
                    <!-- Sudah Login: Tombol Dashboard -->
                    <a href="{{ route('dashboard') }}" class="btn-luxury-gold px-3.5 py-1.5 rounded-full text-[11px] uppercase tracking-wider flex items-center gap-1 shadow cursor-pointer active:scale-95">
                        <i class="ti ti-layout-dashboard text-xs"></i>
                        <span>Dashboard</span>
                    </a>
                @else
                    <!-- Belum Login: Masuk & Daftar Sebelahan Langsung -->
                    <a href="{{ route('agt.login.direct') }}" class="inline-flex items-center gap-1 text-[11px] text-amber-300 hover:text-white font-semibold px-2.5 py-1.5 rounded-full bg-amber-500/15 border border-amber-500/30 transition">
                        <i class="ti ti-login text-xs"></i>
                        <span>Masuk</span>
                    </a>

                    <button @click="goToRegister()" class="btn-luxury-gold px-3 py-1.5 rounded-full text-[11px] uppercase tracking-wider flex items-center gap-1 shadow cursor-pointer active:scale-95">
                        <i class="ti ti-sparkles text-xs"></i>
                        <span>Daftar</span>
                    </button>
                @endauth

                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="w-9 h-9 rounded-xl bg-white/5 border border-amber-500/25 text-amber-300 flex items-center justify-center active:scale-95 transition">
                    <i class="ti" :class="mobileMenuOpen ? 'ti-x text-lg' : 'ti-menu-2 text-lg'"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" 
             x-cloak 
             @click.away="mobileMenuOpen = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-3"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-3"
             class="absolute top-full left-0 right-0 bg-[#120205]/98 backdrop-blur-2xl border-b border-amber-500/30 px-5 py-4 space-y-2 shadow-2xl">
            
            <a @click="mobileMenuOpen = false" href="#hero" class="px-3 py-2.5 rounded-xl hover:bg-white/5 flex items-center justify-between text-xs font-semibold text-stone-200 uppercase tracking-wider">
                <span>Beranda</span>
                <i class="ti ti-chevron-right text-xs text-stone-500"></i>
            </a>
            <a @click="mobileMenuOpen = false" href="#cabang-lomba" class="px-3 py-2.5 rounded-xl hover:bg-white/5 flex items-center justify-between text-xs font-semibold text-stone-200 uppercase tracking-wider">
                <span>Cabang Lomba</span>
                <i class="ti ti-chevron-right text-xs text-stone-500"></i>
            </a>

            @auth
                <a href="{{ route('dashboard') }}" class="px-3 py-2.5 rounded-xl bg-amber-500/20 text-amber-300 hover:bg-amber-500/30 flex items-center justify-between text-xs font-bold border border-amber-500/40">
                    <span class="flex items-center gap-2"><i class="ti ti-layout-dashboard text-sm"></i> Dashboard Peserta</span>
                    <i class="ti ti-chevron-right text-xs text-amber-400"></i>
                </a>
            @else
                <a href="{{ route('agt.login.direct') }}" class="px-3 py-2.5 rounded-xl bg-amber-500/15 text-amber-300 hover:bg-amber-500/25 flex items-center justify-between text-xs font-semibold border border-amber-500/30">
                    <span class="flex items-center gap-2"><i class="ti ti-login"></i> Masuk Akun Peserta</span>
                    <i class="ti ti-chevron-right text-xs text-amber-400"></i>
                </a>
            @endauth

            <div class="pt-3 border-t border-white/10 flex items-center justify-between text-xs">
                <a href="{{ url('/') }}" class="text-stone-400 hover:text-white flex items-center gap-1.5">
                    <i class="ti ti-arrow-left"></i>
                    <span>Portal Al-Amin</span>
                </a>
                <a href="https://wa.me/6281234567890" target="_blank" class="text-emerald-400 font-semibold flex items-center gap-1">
                    <i class="ti ti-brand-whatsapp text-sm"></i>
                    <span>Hotline WA</span>
                </a>
            </div>
        </div>
    </header>


    <!-- ==============================================================
         2. MOBILE HERO SECTION (VERTIKAL TINGGI MEMANJANG, FIT 1 SCREEN)
         ============================================================== -->
    <section id="hero" class="relative min-h-screen pt-24 pb-4 px-3 flex flex-col justify-start items-center overflow-hidden stage-glow">
        
        <!-- Backdrop Atmosphere -->
        <div class="absolute inset-0 z-0 opacity-15 bg-cover bg-center mix-blend-screen pointer-events-none" 
             style="background-image: url('{{ asset('images/agt/stage_backdrop.jpg') }}');">
        </div>

        <!-- ================= MOBILE CURTAINS (LANGSUNG HILANG SETELAH MEMBUKA) ================= -->
        <div class="curtain-wrapper-left">
            <div class="css-curtain-left"></div>
        </div>
        <div class="curtain-wrapper-right">
            <div class="css-curtain-right"></div>
        </div>

        <!-- Ambient Spotlight -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-72 h-72 bg-amber-500/15 blur-[80px] rounded-full pointer-events-none"></div>

        <!-- Konten Utama Hero (Jarak pas dengan navbar, tetap padat ke bawah) -->
        <div class="relative z-20 w-full max-w-[325px] px-2 text-center flex flex-col items-center">
            
            <!-- Broadway Marquee Theater Sign Badge (Format Vertikal Memanjang & Lebih Tinggi) -->
            <div class="relative w-full flex flex-col items-center">
                
                <!-- Frame Utama Marquee Papan Teater (Tinggi Dijaga & Tetap Rounded Proporsional) -->
                <div class="relative w-full marquee-frame-board px-4 pt-7 pb-8 shadow-2xl flex flex-col justify-between items-center" style="min-height: 290px;">
                    
                    <!-- Track Lampu Neon Mengelilingi Bingkai -->
                    <svg class="marquee-bulb-track" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="4" width="calc(100% - 8px)" height="calc(100% - 8px)" rx="32" ry="32" class="marquee-track-line" />
                        <rect x="4" y="4" width="calc(100% - 8px)" height="calc(100% - 8px)" rx="32" ry="32" class="marquee-dots-line" />
                    </svg>

                    <!-- Mikrofon Emas Kiri (Ukuran Pas & Proporsional di Sisi Bingkai) -->
                    <div class="absolute -left-3.5 top-1/2 -translate-y-1/2 w-9 h-9 rounded-xl bg-gradient-to-tr from-amber-700 via-yellow-300 to-amber-500 border border-yellow-200 shadow-xl flex items-center justify-center -rotate-12 z-20">
                        <i class="ti ti-microphone text-amber-950 text-base drop-shadow"></i>
                    </div>

                    <!-- Mikrofon Emas Kanan (Ukuran Pas & Proporsional di Sisi Bingkai) -->
                    <div class="absolute -right-3.5 top-1/2 -translate-y-1/2 w-9 h-9 rounded-xl bg-gradient-to-tl from-amber-700 via-yellow-300 to-amber-500 border border-yellow-200 shadow-xl flex items-center justify-center rotate-12 z-20">
                        <i class="ti ti-microphone text-amber-950 text-base drop-shadow"></i>
                    </div>

                    <!-- Sub-header: PESANTREN PERSIS 80 AL AMIN PRESENT -->
                    <div class="relative z-10 pt-1 text-center">
                        <span class="inline-flex items-center gap-2 text-[10px] font-bold text-amber-300 tracking-[0.25em] uppercase drop-shadow-[0_2px_4px_rgba(0,0,0,0.9)]">
                            <span class="h-px w-4 bg-amber-400/70"></span>
                            PESANTREN PERSIS 80 AL AMIN PRESENT
                            <span class="h-px w-4 bg-amber-400/70"></span>
                        </span>
                    </div>

                    <!-- Judul Utama: Logo Gambar Resmi Emas Al Amin Got Talent di Tengah Frame -->
                    <div class="relative z-10 my-auto py-3 text-center w-full flex items-center justify-center">
                        <img src="{{ asset('images/agt/logo-agt.png') }}" 
                             alt="Al Amin Got Talent" 
                             class="w-full max-w-[280px] h-auto object-contain filter drop-shadow-[0_4px_18px_rgba(234,179,8,0.55)]">
                    </div>

                    <!-- Bottom Accent Spacing -->
                    <div class="w-full h-1"></div>

                </div>

                <!-- Ribbon Pita Bawah: All Talent , All Champion -->
                <div class="relative -mt-4 z-20 flex justify-center">
                    <div class="inline-flex items-center gap-2 px-5 py-1.5 rounded-xl bg-gradient-to-r from-amber-950 via-black to-amber-950 border border-yellow-400 shadow-[0_4px_16px_rgba(0,0,0,0.95),0_0_10px_rgba(234,179,8,0.5)]">
                        <i class="ti ti-sparkles text-yellow-300 text-xs"></i>
                        <span class="font-broadway text-[11px] text-yellow-300 tracking-[0.2em] uppercase">
                            All Talent , All Champion
                        </span>
                        <i class="ti ti-sparkles text-yellow-300 text-xs"></i>
                    </div>
                </div>

            </div>

            <!-- Event Details Pill Bar -->
            <div class="mt-4 flex items-center justify-center gap-1.5">
                <div class="flex items-center gap-1 px-2.5 py-1 rounded-lg bg-white/[0.05] border border-amber-500/25 text-[10px] text-stone-100 font-medium">
                    <i class="ti ti-calendar-event text-amber-400 text-xs"></i>
                    <span>16–17 Jan 2027</span>
                </div>
                <div class="flex items-center gap-1 px-2.5 py-1 rounded-lg bg-white/[0.05] border border-amber-500/25 text-[10px] text-stone-100 font-medium">
                    <i class="ti ti-map-pin text-amber-400 text-xs"></i>
                    <span>Sindangkasih</span>
                </div>
                <div class="flex items-center gap-1 px-2.5 py-1 rounded-lg bg-white/[0.05] border border-amber-500/25 text-[10px] text-stone-100 font-medium">
                    <i class="ti ti-trophy text-amber-400 text-xs"></i>
                    <span>{{ count($competitions) }} Lomba</span>
                </div>
            </div>

            <!-- Mobile Countdown Timer -->
            <div class="mt-3.5 w-full">
                <div class="relative px-3 py-1.5 rounded-xl bg-gradient-to-b from-[#2a060d]/85 via-[#180306]/90 to-[#0b0103]/95 border border-amber-500/35 shadow-lg backdrop-blur-md">
                    <div class="flex items-center justify-center gap-1 mb-1">
                        <span class="text-[9px] font-bold text-amber-300 tracking-[0.18em] uppercase flex items-center gap-1 font-cinzel">
                            <i class="ti ti-hourglass-empty text-amber-400 text-[10px]"></i>
                            Hitung Mundur Lomba
                        </span>
                    </div>
                    
                    <div class="grid grid-cols-4 gap-1 text-white">
                        <div class="flex flex-col items-center justify-center py-1 px-0.5 rounded-lg bg-white/[0.07] border border-amber-400/20">
                            <span class="text-sm font-black text-amber-300 leading-tight" x-text="days">00</span>
                            <span class="text-[7px] text-amber-200/60 uppercase">Hari</span>
                        </div>
                        <div class="flex flex-col items-center justify-center py-1 px-0.5 rounded-lg bg-white/[0.07] border border-amber-400/20">
                            <span class="text-sm font-black text-amber-300 leading-tight" x-text="hours">00</span>
                            <span class="text-[7px] text-amber-200/60 uppercase">Jam</span>
                        </div>
                        <div class="flex flex-col items-center justify-center py-1 px-0.5 rounded-lg bg-white/[0.07] border border-amber-400/20">
                            <span class="text-sm font-black text-amber-300 leading-tight" x-text="minutes">00</span>
                            <span class="text-[7px] text-amber-200/60 uppercase">Mnt</span>
                        </div>
                        <div class="flex flex-col items-center justify-center py-1 px-0.5 rounded-lg bg-white/[0.07] border border-amber-400/20">
                            <span class="text-sm font-black text-amber-300 leading-tight" x-text="seconds">00</span>
                            <span class="text-[7px] text-amber-200/60 uppercase">Dtk</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Subtle Floor Shadow Gradient -->
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-[#200307] to-transparent pointer-events-none z-5"></div>
    </section>


    <!-- ==============================================================
         3. MOBILE STATS & REWARDS (2x2 COMPACT GRID)
         ============================================================== -->
    {{-- [DI-HIDE SEMENTARA] SECTION 3. MOBILE STATS & REWARDS (2x2 COMPACT GRID)
    <section id="hadiah" class="pt-6 pb-12 bg-gradient-to-b from-[#090203] via-[#0d0305] to-[#090203] relative z-20 px-4">
        <div class="grid grid-cols-2 gap-3 max-w-sm mx-auto">
            
            <div class="p-3.5 rounded-xl glass-panel">
                <div class="w-8 h-8 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center text-lg mb-2 border border-amber-500/20">
                    <i class="ti ti-cash"></i>
                </div>
                <span class="text-base font-bold text-white block tracking-tight">{{ $prizePool['total_uang'] }}</span>
                <span class="text-[10px] text-stone-400 font-medium">Uang Pembinaan</span>
            </div>

            <div class="p-3.5 rounded-xl glass-panel">
                <div class="w-8 h-8 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center text-lg mb-2 border border-amber-500/20">
                    <i class="ti ti-trophy"></i>
                </div>
                <span class="text-base font-bold text-white block tracking-tight">{{ $prizePool['total_trophy'] }}</span>
                <span class="text-[10px] text-stone-400 font-medium">Trophy & Piala</span>
            </div>

            <div class="p-3.5 rounded-xl glass-panel">
                <div class="w-8 h-8 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center text-lg mb-2 border border-amber-500/20">
                    <i class="ti ti-ticket"></i>
                </div>
                <span class="text-base font-bold text-white block tracking-tight">Golden Ticket</span>
                <span class="text-[10px] text-stone-400 font-medium">Beasiswa Pesantren</span>
            </div>

            <div class="p-3.5 rounded-xl glass-panel">
                <div class="w-8 h-8 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center text-lg mb-2 border border-amber-500/20">
                    <i class="ti ti-certificate"></i>
                </div>
                <span class="text-base font-bold text-white block tracking-tight">Piagam Ber-SK</span>
                <span class="text-[10px] text-stone-400 font-medium">Sertifikat Nasional</span>
            </div>

        </div>
    </section>
    --}}


    <!-- ==============================================================
         4. MOBILE CABANG PERLOMBAAN (SWIPEABLE TABS & TOUCH-OPTIMIZED CARDS)
         ============================================================== -->
    <section id="cabang-lomba" class="py-12 bg-gradient-to-b from-[#200307] via-[#2a040b] to-[#1c0205] px-4">
        <div class="max-w-sm mx-auto">
            
            <!-- Section Header -->
            <div class="text-center mb-6">
                <span class="text-[10px] font-semibold text-amber-400 uppercase tracking-widest block mb-1">
                    CABANG KOMPETISI
                </span>
                <h2 class="font-cinzel text-2xl font-bold text-white mb-2">
                    Pilih Cabang Lomba
                </h2>
                <p class="text-xs text-stone-300">
                    Ketuk poster lomba untuk melihat pratinjau dan juknis teknis lengkap.
                </p>

                <!-- Filter Tabs (Horizontal Scrollable) -->
                <div class="mt-4 flex items-center gap-1.5 p-1 rounded-xl bg-[#34060e] border border-amber-500/25 overflow-x-auto no-scrollbar shadow-inner">
                    <button @click="activeTab = 'all'" 
                            :class="activeTab === 'all' ? 'bg-amber-400 text-amber-950 font-bold' : 'text-stone-300'"
                            class="px-3 py-1.5 rounded-lg text-[11px] whitespace-nowrap shrink-0 transition">
                        Semua ({{ count($competitions) }})
                    </button>
                    @foreach($availableCategories as $catSlug => $catLabel)
                        <button @click="activeTab = '{{ $catSlug }}'" 
                                :class="activeTab === '{{ $catSlug }}' ? 'bg-amber-400 text-amber-950 font-bold' : 'text-stone-300'"
                                class="px-3 py-1.5 rounded-lg text-[11px] whitespace-nowrap shrink-0 transition">
                            {{ $catLabel }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- List Cards Cabang Lomba -->
            <div class="space-y-4">
                @foreach($competitions as $comp)
                    <div x-show="activeTab === 'all' || activeTab === '{{ $comp['category'] }}'"
                         class="rounded-2xl glass-panel overflow-hidden border border-amber-500/20 shadow-lg">
                        
                        <!-- Poster Preview Section (Header Card) -->
                        <div class="relative w-full h-44 overflow-hidden bg-black cursor-pointer"
                             @click="openPoster({{ json_encode($comp) }})">
                            
                            <img src="{{ $comp['poster'] }}" 
                                 alt="Poster {{ $comp['title'] }}"
                                 onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.classList.remove('hidden');"
                                 class="w-full h-full object-cover object-center">
                            
                            <!-- Fallback Banner jika belum ada poster -->
                            <div class="hidden absolute inset-0 w-full h-full flex flex-col items-center justify-center p-3 text-center bg-gradient-to-b from-[#3a0812] to-[#0a0103]">
                                <i class="ti {{ $comp['icon'] }} text-3xl text-amber-400 mb-1"></i>
                                <span class="text-xs font-bold text-amber-200 uppercase font-cinzel">POSTER RESMI</span>
                                <span class="text-[9px] text-stone-400">Ketuk untuk detail & juknis</span>
                            </div>

                            <!-- Gradient Shadow Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-[#140306] via-transparent to-black/60 pointer-events-none"></div>

                            <!-- Badges -->
                            <div class="absolute top-2.5 left-2.5 right-2.5 flex items-center justify-between pointer-events-none">
                                <span class="px-2 py-0.5 rounded-md text-[9px] font-bold uppercase tracking-wider bg-black/80 text-amber-300 border border-amber-400/30">
                                    {{ $comp['category_label'] }}
                                </span>
                                <span class="text-[10px] font-medium text-stone-200 bg-black/80 px-2 py-0.5 rounded-md border border-white/10">
                                    {{ $comp['quota'] }}
                                </span>
                            </div>

                            <!-- Tap to zoom overlay hint -->
                            <div class="absolute bottom-2.5 right-2.5">
                                <span class="px-2 py-1 rounded-lg bg-black/75 text-amber-300 text-[10px] font-medium flex items-center gap-1 border border-amber-500/30">
                                    <i class="ti ti-zoom-in"></i> Lihat Poster
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-4">
                            <div class="flex items-start gap-2.5 mb-2">
                                <div class="w-8 h-8 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center text-base border border-amber-500/20 shrink-0 mt-0.5">
                                    <i class="ti {{ $comp['icon'] }}"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-sm text-white leading-snug">
                                        {{ $comp['title'] }}
                                    </h3>
                                    <span class="text-[11px] text-amber-300 font-mono font-semibold">{{ $comp['fee'] }}</span>
                                </div>
                            </div>

                            <p class="text-[11px] text-stone-400 leading-relaxed mb-3">
                                {{ $comp['description'] }}
                            </p>

                            <!-- Actions -->
                            <div class="grid grid-cols-2 gap-2 pt-2 border-t border-white/5">
                                <button @click="openJuknis({{ json_encode($comp) }})" class="py-2 px-2.5 rounded-xl bg-white/[0.04] text-white font-medium text-xs border border-white/10 flex items-center justify-center gap-1">
                                    <i class="ti ti-file-text text-amber-400"></i>
                                    <span>Juknis</span>
                                </button>
                                
                                <button @click="goToRegister({{ json_encode($comp) }})" class="btn-luxury-gold py-2 px-2.5 rounded-xl text-xs flex items-center justify-center gap-1">
                                    <i class="ti ti-sparkles text-xs"></i>
                                    <span>Daftar</span>
                                </button>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </section>


    {{-- [DI-HIDE SEMENTARA] 5. MOBILE TIMELINE (VERTICAL STEPPERS)
    <section id="timeline" class="py-12 bg-gradient-to-b from-[#090203] via-[#0c0305] to-[#090203] px-4">
        <div class="max-w-sm mx-auto">
            <div class="text-center mb-6">
                <span class="text-[10px] font-semibold text-amber-400 uppercase tracking-widest block mb-1">
                    AGENDA ACARA
                </span>
                <h2 class="font-cinzel text-2xl font-bold text-white">
                    Timeline Perlombaan
                </h2>
            </div>

            <div class="space-y-4">
                @foreach($timeline as $t)
                    <div class="p-4 rounded-xl glass-panel relative">
                        <div class="flex items-center justify-between mb-1.5">
                            <span class="text-[10px] font-bold text-amber-400 uppercase font-mono">{{ $t['phase'] }}</span>
                            <span class="px-2 py-0.5 rounded-md bg-amber-500/10 text-amber-300 border border-amber-500/20 text-[9px] font-semibold">
                                {{ $t['badge'] }}
                            </span>
                        </div>
                        <h4 class="font-bold text-sm text-white mb-1">{{ $t['title'] }}</h4>
                        <span class="text-[11px] text-amber-200/80 font-medium block mb-1.5 flex items-center gap-1">
                            <i class="ti ti-calendar text-xs"></i> {{ $t['date'] }}
                        </span>
                        <p class="text-[11px] text-stone-400 leading-relaxed">{{ $t['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    --}}


    {{-- [DI-HIDE SEMENTARA] 6. MOBILE FAQ (ACCORDION)
    <section id="faq" class="py-12 bg-[#090203] px-4">
        <div class="max-w-sm mx-auto" x-data="{ openFaq: null }">
            <div class="text-center mb-6">
                <span class="text-[10px] font-semibold text-amber-400 uppercase tracking-widest block mb-1">
                    TANYA JAWAB
                </span>
                <h2 class="font-cinzel text-2xl font-bold text-white">
                    Frequently Asked Questions
                </h2>
            </div>

            <div class="space-y-2.5">
                @foreach($faqs as $idx => $faq)
                    <div class="rounded-xl glass-panel overflow-hidden">
                        <button @click="openFaq = openFaq === {{ $idx }} ? null : {{ $idx }}" 
                                class="w-full p-3.5 text-left flex items-center justify-between gap-2 text-xs font-semibold text-stone-200">
                            <span>{{ $faq['q'] }}</span>
                            <i class="ti ti-chevron-down transition-transform text-amber-400" :class="openFaq === {{ $idx }} ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="openFaq === {{ $idx }}" x-collapse class="px-3.5 pb-3.5 text-[11px] text-stone-400 leading-relaxed border-t border-white/5 pt-2">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    --}}


    <!-- ==============================================================
         7. MOBILE FOOTER
         ============================================================== -->
    <footer class="py-8 bg-[#180205] border-t border-amber-500/20 text-center px-4">
        <div class="max-w-sm mx-auto space-y-3">
            <span class="font-broadway text-base text-gold-gradient block">AL AMIN GOT TALENT 2026</span>
            <p class="text-[10px] text-stone-500 leading-relaxed">
                Pesantren Persatuan Islam 80 Sindangkasih, Ciamis, Jawa Barat.<br>
                Official Event & Registration Portal.
            </p>
            <div class="pt-2 text-[9px] text-stone-600">
                &copy; {{ date('Y') }} Pesantren Al-Amin Sindangkasih. All rights reserved.
            </div>
        </div>
    </footer>


    <!-- ==============================================================
         MODAL: LIHAT POSTER LOMBA PENUH
         ============================================================== -->
    <div x-show="showPosterModal" 
         x-cloak 
         class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-3 bg-black/90 backdrop-blur-md"
         x-transition.opacity>
        
        <div @click.away="showPosterModal = false" class="relative w-full max-w-sm rounded-2xl bg-[#140306] border border-amber-500/30 overflow-hidden shadow-2xl">
            <div class="flex items-center justify-between p-3 border-b border-white/10">
                <span class="text-xs font-bold text-white truncate max-w-[200px]" x-text="selectedPoster ? selectedPoster.title : 'Poster Lomba'"></span>
                <button @click="showPosterModal = false" class="w-7 h-7 rounded-lg bg-white/10 text-white flex items-center justify-center text-xs">
                    <i class="ti ti-x"></i>
                </button>
            </div>

            <div class="p-2 max-h-[70vh] overflow-y-auto flex items-center justify-center bg-black/40">
                <template x-if="selectedPoster">
                    <img :src="selectedPoster.poster" :alt="selectedPoster.title" class="max-w-full max-h-[65vh] object-contain rounded-lg">
                </template>
            </div>

            <div class="p-3 border-t border-white/10 flex items-center gap-2">
                <button @click="showPosterModal = false; openJuknis(selectedPoster)" class="flex-1 py-2 rounded-xl bg-white/10 text-white text-xs font-medium flex items-center justify-center gap-1">
                    <i class="ti ti-file-text text-amber-400"></i> Juknis
                </button>
                <button @click="goToRegister(selectedPoster)" class="flex-1 btn-luxury-gold py-2 rounded-xl text-xs font-bold flex items-center justify-center gap-1">
                    <i class="ti ti-sparkles"></i> Daftar Sekarang
                </button>
            </div>
        </div>
    </div>


    <!-- ==============================================================
         MODAL: JUKNIS DETAIL
         ============================================================== -->
    <div x-show="showJuknisModal" 
         x-cloak 
         class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-3 bg-black/90 backdrop-blur-md"
         x-transition.opacity>
        
        <div @click.away="showJuknisModal = false" class="relative w-full max-w-sm rounded-2xl bg-[#140306] border border-amber-500/30 p-4 shadow-2xl space-y-3">
            <div class="flex items-center justify-between pb-2 border-b border-white/10">
                <div>
                    <span class="text-[9px] font-bold text-amber-400 uppercase">PETUNJUK TEKNIS</span>
                    <h3 class="font-bold text-sm text-white" x-text="selectedComp ? selectedComp.title : ''"></h3>
                </div>
                <button @click="showJuknisModal = false" class="w-6 h-6 rounded-md bg-white/10 text-white flex items-center justify-center text-xs">
                    <i class="ti ti-x"></i>
                </button>
            </div>

            <template x-if="selectedComp">
                <div class="space-y-2 text-xs">
                    <div class="p-2.5 rounded-xl bg-black/40 border border-white/5 space-y-1">
                        <div class="flex justify-between text-[11px]"><span class="text-stone-400">Target:</span> <span class="text-white font-medium" x-text="selectedComp.target_peserta"></span></div>
                        <div class="flex justify-between text-[11px]"><span class="text-stone-400">Biaya:</span> <span class="text-amber-300 font-bold" x-text="selectedComp.fee"></span></div>
                        <div class="flex justify-between text-[11px]"><span class="text-stone-400">Hadiah:</span> <span class="text-white" x-text="selectedComp.hadiah"></span></div>
                    </div>

                    <div>
                        <span class="font-bold text-amber-300 text-[11px] block mb-1">Ketentuan Pokok:</span>
                        <ul class="space-y-1 text-[11px] text-stone-300 list-disc pl-4">
                            <template x-for="(j, i) in selectedComp.juknis" :key="i">
                                <li x-text="j"></li>
                            </template>
                        </ul>
                    </div>

                    <template x-if="selectedComp.juknis_url">
                        <a :href="selectedComp.juknis_url" target="_blank" class="block w-full py-2 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-300 text-center text-xs font-semibold">
                            <i class="ti ti-download"></i> Unduh Dokumen PDF
                        </a>
                    </template>
                </div>
            </template>

            <div class="pt-2 border-t border-white/10">
                <button @click="goToRegister(selectedComp)" class="w-full btn-luxury-gold py-2 rounded-xl text-xs font-bold flex items-center justify-center gap-1">
                    <i class="ti ti-sparkles"></i> Lanjut Registrasi
                </button>
            </div>
        </div>
    </div>


    <!-- ==============================================================
         STICKY BOTTOM MOBILE NAVIGATION BAR
         ============================================================== -->
    <nav class="fixed bottom-0 left-0 right-0 z-40 bg-[#120205]/95 backdrop-blur-xl border-t border-amber-500/20 py-2 px-3 shadow-2xl flex items-center justify-around text-[10px]">
        <a href="#hero" class="flex flex-col items-center gap-0.5 text-amber-400 font-semibold">
            <i class="ti ti-home text-base"></i>
            <span>Beranda</span>
        </a>
        <a href="#cabang-lomba" class="flex flex-col items-center gap-0.5 text-stone-400 hover:text-white">
            <i class="ti ti-trophy text-base"></i>
            <span>Lomba</span>
        </a>
        <a href="{{ route('agt.register.direct') }}" class="flex flex-col items-center gap-0.5 -mt-4 bg-gradient-to-tr from-amber-600 via-yellow-400 to-amber-500 text-amber-950 font-bold p-2.5 rounded-full shadow-lg border-2 border-[#120205] active:scale-95">
            <i class="ti ti-pencil text-lg leading-none"></i>
        </a>
        <a href="#timeline" class="flex flex-col items-center gap-0.5 text-stone-400 hover:text-white">
            <i class="ti ti-calendar text-base"></i>
            <span>Agenda</span>
        </a>
        <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Panitia AGT 2026, saya ingin bertanya seputar lomba.') }}" target="_blank" class="flex flex-col items-center gap-0.5 text-stone-400 hover:text-emerald-400">
            <i class="ti ti-brand-whatsapp text-base"></i>
            <span>Bantuan</span>
        </a>
    </nav>

</body>
</html>
