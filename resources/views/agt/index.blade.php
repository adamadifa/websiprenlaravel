<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Al Amin Got Talent (AGT 2026) — Festival & Kompetisi Pelajar Santri Nasional</title>
    
    <!-- Meta & SEO Tags -->
    <meta name="description" content="Official Portal Al Amin Got Talent (AGT 2026) Pesantren Persatuan Islam 80 Sindangkasih. Panggung prestisius unjuk bakat Qur'ani, Sains, Seni, Bahasa, dan Kreativitas Pelajar Santri.">
    <meta name="keywords" content="Al Amin Got Talent, AGT 2026, Pesantren Al Amin Sindangkasih, Lomba Santri, MHQ, Pidato 3 Bahasa, Olimpiade Sains, Nasyid, Hadroh, Kaligrafi">
    <meta property="og:title" content="Al Amin Got Talent 2026 — Time to Shine Like a Star">
    <meta property="og:description" content="Total Hadiah Puluhan Juta Rupiah, Trophy Juara Umum, dan Golden Ticket Beasiswa Pendidikan Pesantren Al Amin.">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}">

    <!-- Modern Typography: Plus Jakarta Sans, Anton (Broadway Heavy), Cinzel & Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Cinzel:wght@600;700;800;900&family=Cormorant+Garamond:ital,wght@0,600;1,600&family=Montserrat:wght@800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Tailwind CSS (via Vite) & Alpine.js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            --bg-deep: #220308;
            --bg-card: rgba(58, 8, 18, 0.75);
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
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        .font-serif-elegant {
            font-family: 'Cormorant Garamond', Georgia, serif;
        }

        /* Subtle Luxury Radial Glows (Nuansa Merah Gelap / Crimson Stage Velvet) */
        .stage-glow {
            background: 
                radial-gradient(ellipse 60% 40% at 50% 0%, rgba(245, 158, 11, 0.18) 0%, rgba(0, 0, 0, 0) 70%),
                radial-gradient(circle at 50% 25%, rgba(190, 18, 60, 0.45) 0%, rgba(34, 3, 8, 0.98) 75%),
                linear-gradient(180deg, #1c0206 0%, #2b040b 50%, #200307 100%);
        }

        /* Glassmorphism Card Style (Merah Gelap Elegan Transparan) */
        .glass-panel {
            background: rgba(48, 6, 14, 0.72);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(245, 158, 11, 0.22);
            box-shadow: 0 10px 30px -5px rgba(20, 1, 4, 0.6);
        }

        .glass-panel:hover {
            border-color: rgba(245, 158, 11, 0.45);
            background: rgba(64, 8, 19, 0.82);
        }

        /* Elegant Gold Gradient Text */
        .text-gold-gradient {
            background: linear-gradient(135deg, #fef9c3 0%, #facc15 35%, #ca8a04 70%, #eab308 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Clean Luxury Button */
        .btn-luxury-gold {
            background: linear-gradient(135deg, #fef08a 0%, #eab308 50%, #ca8a04 100%);
            color: #1a080a;
            font-weight: 700;
            box-shadow: 0 4px 20px -2px rgba(234, 179, 8, 0.35), inset 0 1px 1px rgba(255, 255, 255, 0.6);
            transition: all 0.25s ease;
        }

        .btn-luxury-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px -2px rgba(234, 179, 8, 0.5), inset 0 1px 2px rgba(255, 255, 255, 0.8);
            background: linear-gradient(135deg, #ffffff 0%, #facc15 50%, #d97706 100%);
        }

        .btn-luxury-outline {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(245, 158, 11, 0.3);
            color: #fef08a;
            transition: all 0.25s ease;
        }

        .btn-luxury-outline:hover {
            background: rgba(245, 158, 11, 0.1);
            border-color: rgba(245, 158, 11, 0.6);
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* Marquee Bulb Subtle Pulsing */
        .marquee-bulb-track {
            position: absolute;
            inset: 6px;
            width: calc(100% - 12px);
            height: calc(100% - 12px);
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
            stroke-width: 9;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 0.1 26;
            animation: marqueeDotPulse 1.8s infinite ease-in-out;
            filter: drop-shadow(0 0 5px #fde047) drop-shadow(0 0 10px #eab308) drop-shadow(0 0 16px #ca8a04);
        }

        @keyframes marqueeDotPulse {
            0%, 100% {
                opacity: 1;
                filter: drop-shadow(0 0 6px #fef08a) drop-shadow(0 0 12px #eab308) drop-shadow(0 0 20px #ca8a04);
            }
            50% {
                opacity: 0.65;
                filter: drop-shadow(0 0 3px #fef08a) drop-shadow(0 0 6px #ca8a04);
            }
        }

        /* Luxury Theatrical Logo Styles */
        .logo-theater-crest {
            background: radial-gradient(circle at 35% 30%, #4a0910 0%, #1f0307 70%, #0a0103 100%);
            box-shadow: 
                0 0 0 2px #d97706,
                0 0 16px rgba(245, 158, 11, 0.45),
                inset 0 0 8px rgba(0,0,0,0.8);
        }

        .text-logo-gold {
            background: linear-gradient(135deg, #ffffff 0%, #fef08a 30%, #eab308 65%, #b45309 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.9));
        }

        /* 3D Bold Gold Broadway Typography (Identik dengan Gambar Referensi) */
        .font-broadway {
            font-family: 'Anton', 'Montserrat', sans-serif;
            letter-spacing: 0.03em;
        }

        .text-3d-talent {
            background: linear-gradient(180deg, #fffbeb 0%, #fef08a 25%, #facc15 50%, #eab308 75%, #ca8a04 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            /* 3D Beveled Shadow layers */
            filter: 
                drop-shadow(0 1px 0 #854d0e)
                drop-shadow(0 2px 0 #713f12)
                drop-shadow(0 3px 0 #582f0e)
                drop-shadow(0 4px 0 #3d1a00)
                drop-shadow(0 8px 10px rgba(0,0,0,0.9));
        }

        .marquee-frame-board {
            background: radial-gradient(circle at 50% 40%, #581c20 0%, #2b0408 60%, #150103 100%);
            border: 5px solid #d97706;
            outline: 6px solid #451a03;
            box-shadow: 
                0 0 0 10px #b45309,
                0 0 0 13px #2d0f02,
                0 20px 50px rgba(0,0,0,0.95),
                inset 0 0 45px rgba(0,0,0,0.9);
        }

        /* ================= THEATER CURTAIN TIED-UP ANIMATIONS ================= */
        /* Left Curtain Wrapper */
        .curtain-wrapper-left {
            position: absolute;
            top: 0; left: 0; bottom: 0;
            width: 50%;
            z-index: 20;
            pointer-events: none;
            overflow: hidden;
            animation: drapeLeft 2.2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.6s;
            filter: drop-shadow(15px 0 20px rgba(0,0,0,0.8));
        }

        @keyframes drapeLeft {
            0% {
                width: 50%;
                clip-path: polygon(
                    0% 0%, 100% 0%, 
                    100% 10%, 100% 20%, 100% 30%, 100% 40%, 100% 50%, 
                    100% 60%, 100% 70%, 100% 80%, 100% 90%, 100% 100%, 
                    0% 100%
                );
            }
            100% {
                width: 12%;
                clip-path: polygon(
                    0% 0%, 100% 0%, 
                    99% 10%, 97% 20%, 92% 30%, 82% 42%, 68% 52%, 
                    55% 60%, 58% 68%, 66% 76%, 76% 85%, 88% 95%, 95% 100%, 
                    0% 100%
                );
            }
        }

        /* Left Curtain Content (Folds) */
        .css-curtain-left {
            width: 50vw;
            height: 100%;
            background: repeating-linear-gradient(
                90deg,
                #170001 0vw,
                #52050c 1.5vw,
                #8a0815 3vw,
                #6b0711 4.5vw,
                #170001 6vw
            );
            transform-origin: left;
            animation: squishLeft 2.2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.6s;
        }

        @keyframes squishLeft {
            0% { transform: scaleX(1); }
            100% { transform: scaleX(0.24); }
        }

        /* Right Curtain Wrapper */
        .curtain-wrapper-right {
            position: absolute;
            top: 0; right: 0; bottom: 0;
            width: 50%;
            z-index: 20;
            pointer-events: none;
            overflow: hidden;
            animation: drapeRight 2.2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.6s;
            filter: drop-shadow(-15px 0 20px rgba(0,0,0,0.8));
        }

        @keyframes drapeRight {
            0% {
                width: 50%;
                clip-path: polygon(
                    0% 0%, 100% 0%, 100% 100%, 0% 100%, 
                    0% 90%, 0% 80%, 0% 70%, 0% 60%, 
                    0% 50%, 0% 40%, 0% 30%, 0% 20%, 0% 10%
                );
            }
            100% {
                width: 12%;
                clip-path: polygon(
                    0% 0%, 100% 0%, 100% 100%, 5% 100%, 
                    12% 95%, 24% 85%, 34% 76%, 42% 68%, 
                    45% 60%, 32% 52%, 18% 42%, 8% 30%, 3% 20%, 1% 10%
                );
            }
        }

        /* Right Curtain Content (Folds) */
        .css-curtain-right {
            width: 50vw;
            height: 100%;
            position: absolute;
            right: 0;
            background: repeating-linear-gradient(
                -90deg,
                #170001 0vw,
                #52050c 1.5vw,
                #8a0815 3vw,
                #6b0711 4.5vw,
                #170001 6vw
            );
            transform-origin: right;
            animation: squishRight 2.2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.6s;
        }

        @keyframes squishRight {
            0% { transform: scaleX(1); }
            100% { transform: scaleX(0.24); }
        }

        /* Realistic Curtain Tie-Back Sash / Rope (Fixed to the curtain) */
        .curtain-tieback-left {
            position: absolute;
            top: 57%;
            left: 0;
            width: 100%;
            height: 38px;
            z-index: 25;
            pointer-events: none;
            opacity: 0;
            animation: tiebackFadeIn 2.2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.8s;
            transform: rotate(-8deg);
        }

        .curtain-tieback-right {
            position: absolute;
            top: 57%;
            right: 0;
            width: 100%;
            height: 38px;
            z-index: 25;
            pointer-events: none;
            opacity: 0;
            animation: tiebackFadeIn 2.2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.8s;
            transform: rotate(8deg);
        }

        @keyframes tiebackFadeIn {
            0%, 50% {
                opacity: 0;
                transform: scale(0.7) translateY(10px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* Responsive Curtain Behavior on Mobile (Tirai Membuka Lalu Langsung Hilang Sempurna) */
        @media (max-width: 640px) {
            .curtain-wrapper-left {
                animation: mobileOpenLeft 1.8s cubic-bezier(0.25, 1, 0.5, 1) forwards;
                animation-delay: 0.4s;
            }
            .curtain-wrapper-right {
                animation: mobileOpenRight 1.8s cubic-bezier(0.25, 1, 0.5, 1) forwards;
                animation-delay: 0.4s;
            }
            .css-curtain-left {
                animation: mobileSquishLeft 1.8s cubic-bezier(0.25, 1, 0.5, 1) forwards;
                animation-delay: 0.4s;
            }
            .css-curtain-right {
                animation: mobileSquishRight 1.8s cubic-bezier(0.25, 1, 0.5, 1) forwards;
                animation-delay: 0.4s;
            }

            @keyframes mobileOpenLeft {
                0% {
                    width: 50%;
                    opacity: 1;
                }
                75% {
                    width: 10%;
                    opacity: 0.9;
                }
                100% {
                    width: 0%;
                    opacity: 0;
                    visibility: hidden;
                    display: none;
                }
            }

            @keyframes mobileOpenRight {
                0% {
                    width: 50%;
                    opacity: 1;
                }
                75% {
                    width: 10%;
                    opacity: 0.9;
                }
                100% {
                    width: 0%;
                    opacity: 0;
                    visibility: hidden;
                    display: none;
                }
            }

            @keyframes mobileSquishLeft {
                0% {
                    transform: scaleX(1);
                    opacity: 1;
                }
                75% {
                    transform: scaleX(0.2);
                    opacity: 0.8;
                }
                100% {
                    transform: scaleX(0);
                    opacity: 0;
                }
            }

            @keyframes mobileSquishRight {
                0% {
                    transform: scaleX(1);
                    opacity: 1;
                }
                75% {
                    transform: scaleX(0.2);
                    opacity: 0.8;
                }
                100% {
                    transform: scaleX(0);
                    opacity: 0;
                }
            }

            .curtain-tieback-left, .curtain-tieback-right {
                opacity: 0 !important;
                display: none !important;
            }
        }

        /* Animasi Navbar Reveal Bersamaan dengan Papan Judul Al Amin Got Talent */
        .navbar-curtain-reveal {
            opacity: 0;
            pointer-events: none;
            animation: navbarRevealAnim 0.9s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            animation-delay: 0.6s; /* Muncul bersamaan saat tirai mulai membuka dan tulisan AGT tersibak */
        }

        @keyframes navbarRevealAnim {
            0% {
                opacity: 0;
                transform: translateY(-20px);
                pointer-events: none;
            }
            100% {
                opacity: 1;
                transform: translateY(0);
                pointer-events: auto;
            }
        }

        @media (max-width: 640px) {
            .navbar-curtain-reveal {
                animation-delay: 0.4s; /* Sinkron dengan mobile tirai & judul */
            }
        }

        /* Smooth Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 7px;
        }
        ::-webkit-scrollbar-track {
            background: #090203;
        }
        ::-webkit-scrollbar-thumb {
            background: #4c0519;
            border-radius: 999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #eab308;
        }
    </style>
</head>

<body class="selection:bg-amber-400 selection:text-amber-950 font-sans antialiased" x-data="{
    scrolled: false,
    mobileMenuOpen: false,
    activeTab: 'all',
    searchQuery: '',
    selectedComp: null,
    showJuknisModal: false,
    showRegisterModal: false,
    showPosterModal: false,
    selectedPoster: null,
    posterLoaded: false,
    posterError: false,
    selectedCompForReg: null,
    regData: {
        nama_peserta: '',
        asal_sekolah: '',
        id_lomba: '',
        no_wa: '',
        email: '',
        kategori_jenjang: 'SMP/MTs'
    },
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
        this.scrolled = window.pageYOffset > 50;
    },
    initCountdown() {
        const target = new Date('2027-01-16T08:00:00+07:00').getTime();
        const updateTimer = () => {
            const now = new Date().getTime();
            const diff = target - now;
            if (diff <= 0) {
                this.days = '00';
                this.hours = '00';
                this.minutes = '00';
                this.seconds = '00';
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
        this.posterLoaded = false;
        this.posterError = false;
        this.showPosterModal = true;
    },
    openJuknis(comp) {
        this.selectedComp = comp;
        this.showJuknisModal = true;
    },
    openRegister(comp = null) {
        let url = '{{ route('agt.register.direct') }}';
        if (comp && comp.id) {
            url += '?lomba=' + comp.id;
        }
        window.location.href = url;
    },
    submitToWa() {
        if(!this.regData.nama_peserta || !this.regData.asal_sekolah || !this.regData.no_wa) {
            alert('Silakan lengkapi nama peserta, asal sekolah, dan nomor WhatsApp!');
            return;
        }
        const lombaTitle = this.selectedCompForReg ? this.selectedCompForReg.title : 'Perlombaan AGT 2026';
        const text = encodeURIComponent(
            `*PENDAFTARAN AL AMIN GOT TALENT (AGT 2026)*\n` +
            `==============================\n` +
            `*Nama Lengkap/Tim:* ${this.regData.nama_peserta}\n` +
            `*Asal Sekolah/Pesantren:* ${this.regData.asal_sekolah}\n` +
            `*Cabang Lomba:* ${lombaTitle}\n` +
            `*Jenjang/Kategori:* ${this.regData.kategori_jenjang}\n` +
            `*No. WhatsApp:* ${this.regData.no_wa}\n` +
            `*Email:* ${this.regData.email || '-'}\n` +
            `==============================\n` +
            `Mohon konfirmasi pendaftaran dan instruksi selanjutnya. Terima kasih!`
        );
        window.open(`https://wa.me/6285284693063?text=${text}`, '_blank');
        this.showRegisterModal = false;
    }
}" x-init="initApp()">

    <!-- ==============================================================
         1. SEAMLESS DYNAMIC NAVBAR (TRANSPARENT AT TOP -> GLASS ON SCROLL)
         ============================================================== -->
    <header class="navbar-curtain-reveal fixed top-0 left-0 right-0 z-50 transition-all duration-300 ease-in-out"
            :class="scrolled ? 'bg-[#220308]/95 backdrop-blur-xl border-b border-amber-500/20 shadow-2xl py-2.5' : 'bg-transparent border-b border-transparent py-3 sm:py-4'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-4">
            
            <!-- Logo & Theatrical Identity -->
            <a href="#hero" class="flex items-center shrink-0 group">
                <img src="{{ asset('images/agt/logo-agt.png') }}" 
                     alt="Logo Al Amin Got Talent" 
                     class="h-10 sm:h-12 md:h-13 w-auto object-contain filter drop-shadow-[0_2px_10px_rgba(234,179,8,0.45)] group-hover:scale-105 group-hover:drop-shadow-[0_4px_20px_rgba(250,204,21,0.7)] transition-all duration-300">
            </a>

            <!-- Desktop Menu (Centered, Neat, & Elegant) -->
            <nav class="hidden md:flex items-center gap-7 text-xs font-semibold uppercase tracking-wider text-stone-200">
                <a href="#hero" class="hover:text-amber-400 transition-colors py-1">Beranda</a>
                <a href="#cabang-lomba" class="hover:text-amber-400 transition-colors py-1">Cabang Lomba</a>
            </nav>

            <!-- Action Buttons & Hamburger Toggle -->
            <div class="flex items-center gap-2.5 sm:gap-3 shrink-0">
                <a href="{{ url('/') }}" class="hidden lg:inline-flex items-center gap-1.5 text-xs text-stone-300 hover:text-white font-medium px-3 py-1.5 rounded-full hover:bg-white/5 transition">
                    <i class="ti ti-arrow-left text-sm"></i>
                    <span>Portal Utama</span>
                </a>

                @auth
                    <!-- Jika Sudah Login: Tampilkan Tombol Dashboard Peserta -->
                    <a href="{{ route('dashboard') }}" class="btn-luxury-gold px-4 sm:px-5 py-2 sm:py-2 rounded-full text-[11px] sm:text-xs uppercase tracking-wider flex items-center gap-1.5 sm:gap-2 cursor-pointer active:scale-95 shadow-md">
                        <i class="ti ti-layout-dashboard text-xs sm:text-sm"></i>
                        <span>Dashboard</span>
                    </a>
                @else
                    <!-- Jika Belum Login: Masuk & Daftar Sebelahan Langsung -->
                    <a href="{{ route('agt.login.direct') }}" class="inline-flex items-center gap-1.5 text-xs text-amber-300 hover:text-amber-200 font-semibold px-3.5 py-1.5 sm:py-2 rounded-full bg-amber-500/15 hover:bg-amber-500/25 border border-amber-500/30 transition shadow-xs">
                        <i class="ti ti-login text-sm"></i>
                        <span>Masuk</span>
                    </a>

                    <button @click="openRegister()" class="btn-luxury-gold px-4 sm:px-5 py-1.5 sm:py-2 rounded-full text-[11px] sm:text-xs uppercase tracking-wider flex items-center gap-1.5 sm:gap-2 cursor-pointer active:scale-95 shadow-md">
                        <i class="ti ti-sparkles text-xs sm:text-sm"></i>
                        <span>Daftar</span>
                    </button>
                @endauth

                <!-- Hamburger Button (Mobile Only) -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="md:hidden w-9 h-9 rounded-xl bg-white/5 border border-amber-500/25 text-amber-300 hover:text-white flex items-center justify-center transition active:scale-95">
                    <i class="ti" :class="mobileMenuOpen ? 'ti-x text-lg' : 'ti-menu-2 text-lg'"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Drawer Overlay -->
        <div x-show="mobileMenuOpen" 
             x-cloak 
             @click.away="mobileMenuOpen = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden absolute top-full left-0 right-0 bg-[#2b040c]/98 backdrop-blur-2xl border-b border-amber-500/30 px-6 py-5 shadow-2xl space-y-3 z-50">
            
            <nav class="flex flex-col space-y-2 text-sm font-semibold uppercase tracking-wider text-stone-200">
                <a @click="mobileMenuOpen = false" href="#hero" class="px-3 py-2 rounded-xl hover:bg-white/5 hover:text-amber-400 flex items-center justify-between transition">
                    <span>Beranda</span>
                    <i class="ti ti-chevron-right text-xs text-stone-500"></i>
                </a>
                <a @click="mobileMenuOpen = false" href="#cabang-lomba" class="px-3 py-2 rounded-xl hover:bg-white/5 hover:text-amber-400 flex items-center justify-between transition">
                    <span>Cabang Perlombaan</span>
                    <i class="ti ti-chevron-right text-xs text-stone-500"></i>
                </a>

                @auth
                    <a href="{{ route('dashboard') }}" class="px-3.5 py-2.5 rounded-xl bg-amber-500/20 text-amber-300 hover:bg-amber-500/30 flex items-center justify-between transition border border-amber-500/40 font-bold">
                        <span class="flex items-center gap-2"><i class="ti ti-layout-dashboard text-base"></i> Dashboard Peserta</span>
                        <i class="ti ti-chevron-right text-xs text-amber-400"></i>
                    </a>
                @else
                    <a href="{{ route('agt.login.direct') }}" class="px-3 py-2 rounded-xl bg-amber-500/15 text-amber-300 hover:bg-amber-500/25 flex items-center justify-between transition border border-amber-500/30">
                        <span class="flex items-center gap-2"><i class="ti ti-login"></i> Masuk Akun Peserta</span>
                        <i class="ti ti-chevron-right text-xs text-amber-400"></i>
                    </a>
                @endauth
            </nav>

            <div class="pt-3 border-t border-white/10 flex items-center justify-between gap-3 text-xs">
                <a href="{{ url('/') }}" class="text-stone-400 hover:text-white flex items-center gap-1.5">
                    <i class="ti ti-arrow-left"></i>
                    <span>Portal Al-Amin</span>
                </a>
                <a href="https://wa.me/6285284693063" target="_blank" class="text-emerald-400 hover:text-emerald-300 font-semibold flex items-center gap-1">
                    <i class="ti ti-brand-whatsapp text-sm"></i>
                    <span>Hotline WA</span>
                </a>
            </div>
        </div>
    </header>

    <!-- ==============================================================
         2. HERO SECTION WITH ANIMATED THEATER CURTAINS (PAS 1 LAYAR PENUH)
         ============================================================== -->
    <section id="hero" class="relative h-screen max-h-screen pt-24 sm:pt-28 pb-4 sm:pb-5 px-3 sm:px-4 flex flex-col justify-between items-center overflow-hidden stage-glow">
        
        <!-- Subtle Backdrop Atmosphere -->
        <div class="absolute inset-0 z-0 opacity-20 bg-cover bg-center mix-blend-screen pointer-events-none" 
             style="background-image: url('{{ asset('images/agt/stage_backdrop.jpg') }}');">
        </div>

        <!-- ================= THEATER CURTAINS LAYER (ANIMATED OPENING) ================= -->
        <!-- Left Velvet Curtain Drape (Pure CSS) -->
        <div class="curtain-wrapper-left">
            <div class="css-curtain-left"></div>
            <!-- Gold Sash Tie-Back (Memeluk Lipatan Tirai Kiri) -->
            <div class="curtain-tieback-left">
                <div class="relative w-full h-full flex items-center justify-end pr-2">
                    <div class="h-3 w-28 bg-gradient-to-r from-amber-600 via-yellow-300 to-amber-700 rounded-full shadow-[0_3px_10px_rgba(0,0,0,0.9),0_0_8px_rgba(245,158,11,0.6)] border-y border-amber-200/80"></div>
                    <div class="absolute right-0 top-1/2 -translate-y-1/2 flex flex-col items-center">
                        <div class="w-4 h-4 rounded-full bg-gradient-to-br from-yellow-100 via-amber-400 to-amber-800 border border-yellow-200 shadow-md"></div>
                        <div class="w-1.5 h-4 bg-gradient-to-b from-amber-400 to-amber-700 rounded-b shadow-sm -mt-0.5"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Velvet Curtain Drape (Pure CSS) -->
        <div class="curtain-wrapper-right">
            <div class="css-curtain-right"></div>
            <!-- Gold Sash Tie-Back (Memeluk Lipatan Tirai Kanan) -->
            <div class="curtain-tieback-right">
                <div class="relative w-full h-full flex items-center justify-start pl-2">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 flex flex-col items-center">
                        <div class="w-4 h-4 rounded-full bg-gradient-to-br from-yellow-100 via-amber-400 to-amber-800 border border-yellow-200 shadow-md"></div>
                        <div class="w-1.5 h-4 bg-gradient-to-b from-amber-400 to-amber-700 rounded-b shadow-sm -mt-0.5"></div>
                    </div>
                    <div class="h-3 w-28 bg-gradient-to-r from-amber-600 via-yellow-300 to-amber-700 rounded-full shadow-[0_3px_10px_rgba(0,0,0,0.9),0_0_8px_rgba(245,158,11,0.6)] border-y border-amber-200/80"></div>
                </div>
            </div>
        </div>

        <!-- Elegant Overhead Spotlight Rays -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[850px] h-[450px] bg-amber-500/10 blur-[130px] rounded-full pointer-events-none z-1"></div>

        <!-- Konten Utama Hero (Dirancang Proporsional Fit 1 Layar) -->
        <div class="relative z-20 max-w-4xl mx-auto text-center flex flex-col items-center justify-center my-auto w-full">
            
            <!-- Category Tag (Desktop/Tablet Only - Disembunyikan di Mobile) -->
            <div class="hidden sm:inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-500/10 border border-amber-400/25 text-amber-300 text-xs font-medium uppercase tracking-widest mb-3 sm:mb-4 shadow-sm backdrop-blur-md" data-aos="fade-down" data-aos-delay="500">
                <i class="ti ti-sparkles text-amber-400 text-xs"></i>
                <span>Ajang Kreasi & Prestasi Pelajar Santri se-Priangan Timur</span>
            </div>

            <!-- Broadway Marquee Theater Sign Badge (Format Responsif: Vertikal Memanjang Elegan di Mobile, Horizontal Gagah di Desktop) -->
            <div class="relative inline-block w-full max-w-xs sm:max-w-2xl lg:max-w-3xl my-auto" data-aos="zoom-in" data-aos-duration="900" data-aos-delay="400">
                
                <!-- Props Ornamen Di Belakang Frame (Desktop Only) -->
                <div class="hidden sm:block absolute -top-8 left-10 sm:left-16 opacity-45 text-amber-200 text-3xl sm:text-4xl pointer-events-none -rotate-12">
                    <i class="ti ti-piano"></i>
                </div>
                <div class="hidden sm:block absolute -top-8 right-10 sm:right-16 opacity-45 text-amber-200 text-3xl sm:text-4xl pointer-events-none rotate-12">
                    <i class="ti ti-wand"></i>
                </div>

                <!-- Frame Utama Marquee Papan Teater (Rasio Vertikal Ramping & Tinggi Memanjang di Mobile, Melebar di Desktop) -->
                <div class="relative marquee-frame-board rounded-[2.2rem] sm:rounded-[3.2rem] px-5 sm:px-16 pt-7 sm:pt-7 pb-8 sm:pb-8 shadow-2xl">
                    
                    <!-- Jalur Garis Track & Deretan Lampu Neon SVG (100% Presisi dan Mengikuti Keliling Sudut) -->
                    <svg class="marquee-bulb-track" xmlns="http://www.w3.org/2000/svg">
                        <rect x="5" y="5" width="calc(100% - 10px)" height="calc(100% - 10px)" rx="34" ry="34" class="marquee-track-line" />
                        <rect x="5" y="5" width="calc(100% - 10px)" height="calc(100% - 10px)" rx="34" ry="34" class="marquee-dots-line" />
                    </svg>

                    <!-- Mikrofon Emas Kiri (Terletak Pas di Sisi Luar Bingkai) -->
                    <div class="absolute -left-3.5 sm:-left-6 top-1/2 -translate-y-1/2 w-8 h-8 sm:w-16 sm:h-16 rounded-xl sm:rounded-2xl bg-gradient-to-tr from-amber-700 via-yellow-300 to-amber-500 border border-yellow-200 sm:border-2 shadow-[0_4px_15px_rgba(0,0,0,0.95),0_0_12px_rgba(234,179,8,0.7)] flex items-center justify-center -rotate-12 z-20">
                        <i class="ti ti-microphone text-amber-950 text-sm sm:text-3xl drop-shadow"></i>
                    </div>

                    <!-- Mikrofon Emas Kanan (Terletak Pas di Sisi Luar Bingkai) -->
                    <div class="absolute -right-3.5 sm:-right-6 top-1/2 -translate-y-1/2 w-8 h-8 sm:w-16 sm:h-16 rounded-xl sm:rounded-2xl bg-gradient-to-tl from-amber-700 via-yellow-300 to-amber-500 border border-yellow-200 sm:border-2 shadow-[0_4px_15px_rgba(0,0,0,0.95),0_0_12px_rgba(234,179,8,0.7)] flex items-center justify-center rotate-12 z-20">
                        <i class="ti ti-microphone text-amber-950 text-sm sm:text-3xl drop-shadow"></i>
                    </div>

                    <!-- Sub-header: PESANTREN PERSIS 80 AL AMIN PRESENT -->
                    <div class="relative z-10 mb-2 sm:mb-2 text-center">
                        <span class="inline-flex items-center gap-1.5 text-[9px] sm:text-xs font-bold text-amber-300 tracking-[0.25em] sm:tracking-[0.32em] uppercase drop-shadow-[0_2px_4px_rgba(0,0,0,0.9)]">
                            <span class="h-px w-3 sm:w-6 bg-amber-400/60"></span>
                            PESANTREN PERSIS 80 AL AMIN PRESENT
                            <span class="h-px w-3 sm:w-6 bg-amber-400/60"></span>
                        </span>
                    </div>

                    <!-- Judul Utama: Logo Gambar Resmi Emas Al Amin Got Talent di Tengah Papan -->
                    <div class="relative z-10 px-2 sm:px-6 py-2 sm:py-3 flex items-center justify-center">
                        <img src="{{ asset('images/agt/logo-agt.png') }}" 
                             alt="Al Amin Got Talent" 
                             class="w-full max-w-[270px] sm:max-w-[460px] md:max-w-[540px] lg:max-w-[580px] h-auto object-contain filter drop-shadow-[0_4px_25px_rgba(234,179,8,0.55)] hover:scale-[1.02] transition-transform duration-500">
                    </div>

                </div>

                <!-- Banner Pita Bawah: All Talent , All Champion -->
                <div class="relative -mt-3 sm:-mt-5 z-20 flex justify-center">
                    <div class="inline-flex items-center gap-1.5 sm:gap-2.5 px-4 sm:px-10 py-1 sm:py-2 rounded-lg sm:rounded-xl bg-gradient-to-r from-amber-950 via-black to-amber-950 border border-yellow-400 sm:border-2 shadow-[0_4px_15px_rgba(0,0,0,0.9),0_0_12px_rgba(234,179,8,0.6)]">
                        <i class="ti ti-sparkles text-yellow-300 text-[10px] sm:text-sm"></i>
                        <span class="font-broadway text-[10px] sm:text-sm text-yellow-300 tracking-[0.18em] sm:tracking-[0.25em] uppercase">
                            All Talent , All Champion
                        </span>
                        <i class="ti ti-sparkles text-yellow-300 text-[10px] sm:text-sm"></i>
                    </div>
                </div>

            </div>

            <!-- Event Details Pill Bar (Rapi & Seimbang di Mobile) -->
            <div class="mt-3 sm:mt-4 flex flex-wrap items-center justify-center gap-1.5 sm:gap-3" data-aos="fade-up" data-aos-delay="600">
                <div class="flex items-center gap-1.5 px-3 sm:px-4 py-1.5 sm:py-2 rounded-xl bg-white/[0.05] border border-amber-500/25 text-[11px] sm:text-sm text-stone-100 font-medium backdrop-blur-md shadow-sm">
                    <i class="ti ti-calendar-event text-amber-400 text-xs sm:text-base"></i>
                    <span>16–17 Jan 2027</span>
                </div>
                <div class="flex items-center gap-1.5 px-3 sm:px-4 py-1.5 sm:py-2 rounded-xl bg-white/[0.05] border border-amber-500/25 text-[11px] sm:text-sm text-stone-100 font-medium backdrop-blur-md shadow-sm">
                    <i class="ti ti-map-pin text-amber-400 text-xs sm:text-base"></i>
                    <span>Sindangkasih, Ciamis</span>
                </div>
                <div class="flex items-center gap-1.5 px-3 sm:px-4 py-1.5 sm:py-2 rounded-xl bg-white/[0.05] border border-amber-500/25 text-[11px] sm:text-sm text-stone-100 font-medium backdrop-blur-md shadow-sm">
                    <i class="ti ti-trophy text-amber-400 text-xs sm:text-base"></i>
                    <span>{{ count($competitions) }} Cabang Lomba</span>
                </div>
            </div>

            <!-- Luxury Theatrical Countdown Timer (Elegan & Pas di Mobile) -->
            <div class="mt-2.5 sm:mt-4 max-w-xs sm:max-w-md w-full mx-auto" data-aos="fade-up" data-aos-delay="700">
                <div class="relative px-3.5 sm:px-5 py-2 sm:py-3 rounded-xl sm:rounded-2xl bg-gradient-to-b from-[#2a060d]/85 via-[#180306]/90 to-[#0b0103]/95 border border-amber-500/35 shadow-[0_8px_25px_rgba(0,0,0,0.8),inset_0_1px_1px_rgba(251,191,36,0.3)] backdrop-blur-xl">
                    
                    <!-- Header Timer Elegan dengan Garis Emas Halus -->
                    <div class="flex items-center justify-center gap-1.5 sm:gap-2 mb-1.5">
                        <span class="h-px w-4 sm:w-6 bg-gradient-to-r from-transparent to-amber-400/60"></span>
                        <span class="text-[9px] sm:text-[11px] font-bold text-amber-300 tracking-[0.18em] sm:tracking-[0.25em] uppercase flex items-center gap-1 font-cinzel">
                            <i class="ti ti-hourglass-empty text-amber-400 text-[10px] sm:text-xs animate-spin-slow"></i>
                            Hitung Mundur Lomba
                        </span>
                        <span class="h-px w-4 sm:w-6 bg-gradient-to-l from-transparent to-amber-400/60"></span>
                    </div>
                    
                    <!-- Kotak Digit Waktu Luxury Gold Bevel -->
                    <div class="grid grid-cols-4 gap-1.5 sm:gap-2 text-white">
                        <!-- Hari -->
                        <div class="relative flex flex-col items-center justify-center py-1 sm:py-2 px-1 rounded-lg sm:rounded-xl bg-gradient-to-b from-white/[0.07] to-black/60 border border-amber-400/20 shadow-inner group">
                            <span class="text-base sm:text-2xl font-black font-sans tracking-tight text-transparent bg-clip-text bg-gradient-to-b from-amber-100 via-amber-300 to-amber-500 drop-shadow" x-text="days">00</span>
                            <span class="text-[8px] sm:text-[9px] text-amber-200/60 uppercase font-medium tracking-wider">Hari</span>
                        </div>
                        <!-- Jam -->
                        <div class="relative flex flex-col items-center justify-center py-1 sm:py-2 px-1 rounded-lg sm:rounded-xl bg-gradient-to-b from-white/[0.07] to-black/60 border border-amber-400/20 shadow-inner group">
                            <span class="text-base sm:text-2xl font-black font-sans tracking-tight text-transparent bg-clip-text bg-gradient-to-b from-amber-100 via-amber-300 to-amber-500 drop-shadow" x-text="hours">00</span>
                            <span class="text-[8px] sm:text-[9px] text-amber-200/60 uppercase font-medium tracking-wider">Jam</span>
                        </div>
                        <!-- Menit -->
                        <div class="relative flex flex-col items-center justify-center py-1 sm:py-2 px-1 rounded-lg sm:rounded-xl bg-gradient-to-b from-white/[0.07] to-black/60 border border-amber-400/20 shadow-inner group">
                            <span class="text-base sm:text-2xl font-black font-sans tracking-tight text-transparent bg-clip-text bg-gradient-to-b from-amber-100 via-amber-300 to-amber-500 drop-shadow" x-text="minutes">00</span>
                            <span class="text-[8px] sm:text-[9px] text-amber-200/60 uppercase font-medium tracking-wider">Mnt</span>
                        </div>
                        <!-- Detik -->
                        <div class="relative flex flex-col items-center justify-center py-1 sm:py-2 px-1 rounded-lg sm:rounded-xl bg-gradient-to-b from-white/[0.07] to-black/60 border border-amber-400/20 shadow-inner group">
                            <span class="text-base sm:text-2xl font-black font-sans tracking-tight text-transparent bg-clip-text bg-gradient-to-b from-amber-100 via-amber-300 to-amber-500 drop-shadow" x-text="seconds">00</span>
                            <span class="text-[8px] sm:text-[9px] text-amber-200/60 uppercase font-medium tracking-wider">Dtk</span>
                        </div>
                    </div>

                </div>
            </div>


        </div>

        <!-- Spacer Bawah Supaya Konten Nyaman dan Proporsional di Dasar Layar -->
        <div class="w-full h-2"></div>

        <!-- Seamless Blend Overlay Menuju Section Bawah (Deep Theatrical Floor & Gradient Merge) -->
        <div class="absolute bottom-0 left-0 right-0 h-20 sm:h-24 bg-gradient-to-t from-[#200307] to-transparent pointer-events-none z-5"></div>
        <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 w-[85%] max-w-5xl h-16 bg-radial from-amber-500/10 via-rose-900/35 to-transparent blur-2xl pointer-events-none z-5"></div>

    </section>


    <!-- ==============================================================
         3. STATS & REWARDS SHOWCASE (CLEAN RECTANGULAR CARDS - SEAMLESS BLEND)
         ============================================================== -->
    {{-- [DI-HIDE SEMENTARA] SECTION 3. STATS & REWARDS SHOWCASE (Rp 35jt, Trophy, Golden Ticket, Piagam)
    <section id="hadiah" class="pt-10 sm:pt-14 pb-16 sm:pb-20 bg-gradient-to-b from-[#090203] via-[#0c0305] to-[#090203] relative z-20">
        <!-- Ambient Stage Glow Penghubung Natural Antar Section (Stage Floor Spotlight) -->
        <div class="absolute -top-16 left-1/2 -translate-x-1/2 w-[800px] h-[160px] bg-gradient-to-r from-transparent via-amber-500/12 to-transparent blur-[80px] pointer-events-none"></div>
        <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-amber-500/20 to-transparent pointer-events-none opacity-40"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                
                <div class="p-5 sm:p-6 rounded-2xl glass-panel group transition-all" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-11 h-11 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center text-2xl mb-3.5 border border-amber-500/20">
                        <i class="ti ti-cash"></i>
                    </div>
                    <span class="text-xl sm:text-2xl font-bold text-white block tracking-tight">{{ $prizePool['total_uang'] }}</span>
                    <span class="text-xs text-stone-400 font-medium">Uang Pembinaan Juara</span>
                </div>

                <div class="p-5 sm:p-6 rounded-2xl glass-panel group transition-all" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-11 h-11 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center text-2xl mb-3.5 border border-amber-500/20">
                        <i class="ti ti-trophy"></i>
                    </div>
                    <span class="text-xl sm:text-2xl font-bold text-white block tracking-tight">{{ $prizePool['total_trophy'] }}</span>
                    <span class="text-xs text-stone-400 font-medium">Piala & Trophy Eksklusif</span>
                </div>

                <div class="p-5 sm:p-6 rounded-2xl glass-panel group transition-all" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-11 h-11 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center text-2xl mb-3.5 border border-amber-500/20">
                        <i class="ti ti-ticket"></i>
                    </div>
                    <span class="text-xl sm:text-2xl font-bold text-white block tracking-tight">Golden Ticket</span>
                    <span class="text-xs text-stone-400 font-medium">Beasiswa Masuk Pesantren</span>
                </div>

                <div class="p-5 sm:p-6 rounded-2xl glass-panel group transition-all" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-11 h-11 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center text-2xl mb-3.5 border border-amber-500/20">
                        <i class="ti ti-certificate"></i>
                    </div>
                    <span class="text-xl sm:text-2xl font-bold text-white block tracking-tight">Piagam Ber-SK</span>
                    <span class="text-xs text-stone-400 font-medium">Sertifikat Resmi Terakreditasi</span>
                </div>

            </div>
        </div>
    </section>
    --}}


    <!-- ==============================================================
         4. DAFTAR CABANG PERLOMBAAN (CLEAN GRID & TAB FILTER)
         ============================================================== -->
    <section id="cabang-lomba" class="py-20 sm:py-28 bg-gradient-to-b from-[#200307] via-[#2a040b] to-[#1c0205] relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-12" data-aos="fade-up">
                <span class="text-xs font-semibold text-amber-400 uppercase tracking-widest block mb-2">
                    CABANG KOMPETISI
                </span>
                <h2 class="font-cinzel text-3xl sm:text-4xl font-bold text-white mb-3 tracking-tight">
                    Pilih Kategori & Tunjukkan Bakat
                </h2>
                <p class="text-xs sm:text-sm text-stone-300 font-normal leading-relaxed">
                    Setiap cabang dirancang untuk menguji keilmuan, kefasihan, serta kreativitas seni santri dan pelajar.
                </p>

                <!-- Filter Tabs (Dinamis Sesuai Jenjang Database - Swipeable di Mobile) -->
                <div class="mt-6 sm:mt-8 flex justify-center w-full">
                    <div class="flex items-center gap-1.5 p-1.5 rounded-2xl bg-[#34060e] border border-amber-500/25 max-w-full overflow-x-auto no-scrollbar scroll-smooth shadow-inner">
                        <button @click="activeTab = 'all'" 
                                :class="activeTab === 'all' ? 'bg-amber-400 text-amber-950 font-bold shadow-sm' : 'text-stone-300 hover:text-white'"
                                class="px-3.5 sm:px-4 py-2 rounded-xl text-xs font-medium whitespace-nowrap transition cursor-pointer shrink-0">
                            Semua Cabang ({{ count($competitions) }})
                        </button>
                        @foreach($availableCategories as $catSlug => $catLabel)
                            <button @click="activeTab = '{{ $catSlug }}'" 
                                    :class="activeTab === '{{ $catSlug }}' ? 'bg-amber-400 text-amber-950 font-bold shadow-sm' : 'text-stone-300 hover:text-white'"
                                    class="px-3.5 sm:px-4 py-2 rounded-xl text-xs font-medium whitespace-nowrap transition cursor-pointer shrink-0">
                                {{ $catLabel }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Competitions Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7">
                @foreach($competitions as $comp)
                    <div x-show="activeTab === 'all' || activeTab === '{{ $comp['category'] }}'" 
                         x-transition.opacity
                         class="group rounded-2xl glass-panel overflow-hidden transition-all duration-300 flex flex-col justify-between hover:-translate-y-1 hover:border-amber-500/40 relative shadow-xl"
                         data-aos="fade-up">
                        
                        <!-- Poster Preview Section (Header Card - Format 16:9 Full View) -->
                        <div class="relative w-full aspect-video overflow-hidden bg-gradient-to-br from-[#1c0307] via-black to-[#140306] cursor-pointer group/poster flex items-center justify-center"
                             @click="openPoster({{ json_encode($comp) }})">
                            
                            <!-- Poster Graphic (Tampil Penuh 16:9) -->
                            <img src="{{ $comp['poster'] }}" 
                                 alt="Poster {{ $comp['title'] }}"
                                 onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.classList.remove('hidden');"
                                 class="w-full h-full object-contain group-hover/poster:scale-105 transition-transform duration-500">
                            
                            <!-- Fallback Theatrical Artwork Banner (Jika File Gambar Poster Belum Diupload) -->
                            <div class="hidden absolute inset-0 w-full h-full flex flex-col items-center justify-center p-4 text-center bg-gradient-to-b from-[#3a0812] via-[#1c0307] to-[#0a0103] group-hover/poster:scale-105 transition-transform duration-500">
                                <div class="w-12 h-12 rounded-2xl bg-amber-500/10 border border-amber-400/30 flex items-center justify-center text-amber-300 text-xl mb-1.5 shadow-lg">
                                    <i class="ti {{ $comp['icon'] }}"></i>
                                </div>
                                <span class="text-[10px] font-bold text-amber-200/90 tracking-widest uppercase font-cinzel line-clamp-1">POSTER RESMI</span>
                                <span class="text-[9px] text-stone-400">Klik untuk melihat detail & juknis</span>
                            </div>

                            <!-- Gradient Shadow Overlay di Atas Poster -->
                            <div class="absolute inset-0 bg-gradient-to-t from-[#140306] via-transparent to-black/60 pointer-events-none"></div>

                            <!-- Floating Badges di Atas Poster -->
                            <div class="absolute top-3 left-3 right-3 flex items-center justify-between gap-2 pointer-events-none">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider bg-black/70 text-amber-300 border border-amber-400/30 backdrop-blur-md shadow-md">
                                    <i class="ti ti-star text-amber-400 text-[11px]"></i>
                                    {{ $comp['category_label'] }}
                                </span>
                                <span class="text-[11px] font-medium text-stone-200 bg-black/70 px-2.5 py-1 rounded-lg border border-white/10 backdrop-blur-md flex items-center gap-1 shadow-md">
                                    <i class="ti ti-users text-amber-400"></i>
                                    {{ $comp['quota'] }}
                                </span>
                            </div>

                            <!-- Hover Overlay: "Lihat Poster Penuh" -->
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover/poster:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-2 backdrop-blur-xs">
                                <span class="px-3.5 py-1.5 rounded-xl bg-amber-400/90 text-amber-950 font-bold text-xs flex items-center gap-1.5 shadow-lg transform -translate-y-1 group-hover/poster:translate-y-0 transition-transform">
                                    <i class="ti ti-zoom-in text-sm"></i>
                                    Lihat Poster
                                </span>
                            </div>
                        </div>

                        <!-- Body Card Content -->
                        <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex items-start gap-3 mb-2.5">
                                    <div class="w-9 h-9 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center text-lg border border-amber-500/20 shrink-0 mt-0.5">
                                        <i class="ti {{ $comp['icon'] }}"></i>
                                    </div>
                                    <h3 class="font-bold text-base sm:text-lg text-white group-hover:text-amber-300 transition-colors leading-snug">
                                        {{ $comp['title'] }}
                                    </h3>
                                </div>

                                <p class="text-xs text-stone-400 leading-relaxed line-clamp-2 mb-4">
                                    {{ $comp['description'] }}
                                </p>
                            </div>

                            <!-- Footer Info & Actions -->
                            <div class="pt-3.5 border-t border-white/5 space-y-3">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-stone-400">Registrasi:</span>
                                    <span class="font-semibold text-amber-300 font-mono">{{ $comp['fee'] }}</span>
                                </div>

                                <div class="grid grid-cols-2 gap-2">
                                    <button @click="openJuknis({{ json_encode($comp) }})" class="py-2.5 px-3 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-white font-medium text-xs border border-white/10 transition flex items-center justify-center gap-1.5 cursor-pointer">
                                        <i class="ti ti-file-text text-amber-400"></i>
                                        <span>Juknis</span>
                                    </button>
                                    
                                    <button @click="openRegister({{ json_encode($comp) }})" class="btn-luxury-gold py-2.5 px-3 rounded-xl text-xs flex items-center justify-center gap-1.5 cursor-pointer active:scale-95">
                                        <i class="ti ti-sparkles text-xs"></i>
                                        <span>Daftar</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </section>


    {{-- [DI-HIDE SEMENTARA] 5. TIMELINE JADWAL ACARA (RANGKAIAN KEGIATAN)
    <section id="timeline" class="py-20 bg-[#0c0305] border-t border-amber-500/15 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center max-w-xl mx-auto mb-12" data-aos="fade-up">
                <span class="text-xs font-semibold text-amber-400 uppercase tracking-widest block mb-2">
                    JADWAL & AGENDA
                </span>
                <h2 class="font-cinzel text-3xl sm:text-4xl font-bold text-white mb-2 tracking-tight">
                    Rangkaian Kegiatan AGT 2026
                </h2>
                <p class="text-xs sm:text-sm text-stone-400">
                    Pastikan Anda mencatat setiap tahapan penting berikut ini.
                </p>
            </div>

            <div class="space-y-4">
                @foreach($timeline as $t)
                    <div class="p-5 sm:p-6 rounded-2xl glass-panel flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 group hover:border-amber-400/40 transition-all" data-aos="fade-up">
                        <div class="flex items-start sm:items-center gap-4">
                            <div class="w-11 h-11 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center text-xl shrink-0 border border-amber-500/20">
                                <i class="ti {{ $t['icon'] }}"></i>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-xs font-semibold text-amber-400 uppercase">{{ $t['phase'] }}</span>
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-white/5 text-stone-300 border border-white/10">{{ $t['badge'] }}</span>
                                </div>
                                <h3 class="font-bold text-base text-white group-hover:text-amber-300 transition-colors">
                                    {{ $t['title'] }}
                                </h3>
                                <p class="text-xs text-stone-400 mt-0.5">
                                    {{ $t['desc'] }}
                                </h3>
                            </div>
                        </div>

                        <div class="shrink-0 px-3.5 py-1.5 rounded-xl bg-black/40 border border-white/5 text-xs font-mono text-amber-300 font-semibold flex items-center gap-1.5 self-end sm:self-center">
                            <i class="ti ti-calendar text-xs"></i>
                            <span>{{ $t['date'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    --}}


    {{-- [DI-HIDE SEMENTARA] 6. REWARD BANNER BEASISWA / APRESIASI KHUSUS JUARA
    <section class="py-16 bg-[#090203] relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="rounded-3xl bg-gradient-to-r from-[#24060b] via-[#380912] to-[#1c0408] p-8 sm:p-12 border border-amber-500/30 relative overflow-hidden" data-aos="zoom-in">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <div class="lg:col-span-8 space-y-3.5 text-left">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-400/10 text-amber-300 text-xs font-semibold uppercase tracking-wider border border-amber-400/25">
                            <i class="ti ti-award"></i>
                            Apresiasi Khusus Juara
                        </span>
                        
                        <h2 class="font-cinzel text-2xl sm:text-4xl font-bold text-white tracking-tight leading-snug">
                            Dapatkan <span class="text-gold-gradient">Golden Ticket Beasiswa</span> Pendidikan
                        </h2>

                        <p class="text-xs sm:text-sm text-stone-300 leading-relaxed max-w-2xl font-normal">
                            Para peraih juara 1 dan Juara Umum berhak atas rekomendasi bebas biaya masuk ke jenjang MTs Persis 80 atau MA Al-Amin Sindangkasih untuk Tahun Ajaran 2027/2028.
                        </p>

                        <div class="pt-2 flex flex-wrap gap-2 text-xs text-stone-300">
                            <span class="px-3 py-1 rounded-lg bg-black/30 border border-white/10 flex items-center gap-1.5">
                                <i class="ti ti-check text-amber-400"></i> Sertifikat Ber-SK
                            </span>
                            <span class="px-3 py-1 rounded-lg bg-black/30 border border-white/10 flex items-center gap-1.5">
                                <i class="ti ti-check text-amber-400"></i> Trophy Juara
                            </span>
                            <span class="px-3 py-1 rounded-lg bg-black/30 border border-white/10 flex items-center gap-1.5">
                                <i class="ti ti-check text-amber-400"></i> Asrama Transit Peserta
                            </span>
                        </div>
                    </div>

                    <div class="lg:col-span-4 text-center lg:text-right">
                        <button @click="openRegister()" class="btn-luxury-gold w-full py-3.5 px-6 rounded-xl text-xs sm:text-sm uppercase tracking-wider cursor-pointer">
                            Daftarkan Sekolah Anda
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </section>
    --}}


    {{-- [DI-HIDE SEMENTARA] 7. FAQ ACCORDION (PERTANYAAN UMUM)
    <section id="faq" class="py-20 bg-[#0c0305] border-t border-amber-500/15">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-xs font-semibold text-amber-400 uppercase tracking-widest block mb-2">
                    TANYA JAWAB
                </span>
                <h2 class="font-cinzel text-3xl font-bold text-white mb-2">
                    Pertanyaan Umum
                </h2>
                <p class="text-xs text-stone-400">
                    Informasi seputar pendaftaran, teknis pelaksanaan, dan akomodasi.
                </p>
            </div>

            <div class="space-y-3">
                @foreach($faqs as $idx => $faq)
                    <div x-data="{ open: {{ $idx === 0 ? 'true' : 'false' }} }" 
                         class="rounded-xl glass-panel overflow-hidden" 
                         data-aos="fade-up">
                        
                        <button @click="open = !open" class="w-full p-4 sm:p-5 text-left flex items-center justify-between gap-4 font-semibold text-xs sm:text-sm text-white hover:text-amber-300 transition-colors cursor-pointer">
                            <span class="flex items-center gap-2.5">
                                <span class="text-amber-400 font-mono text-xs">0{{ $idx + 1 }}.</span>
                                <span>{{ $faq['q'] }}</span>
                            </span>
                            <i class="ti text-base text-stone-400 transition-transform duration-200 shrink-0" :class="open ? 'ti-chevron-up rotate-180 text-amber-400' : 'ti-chevron-down'"></i>
                        </button>

                        <div x-show="open" x-collapse class="px-5 pb-5 text-xs text-stone-300/90 leading-relaxed border-t border-white/5 pt-3.5">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    --}}


    <!-- ==============================================================
         8. FOOTER
         ============================================================== -->
    <footer class="bg-[#180205] text-stone-300 pt-14 pb-10 border-t border-amber-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 pb-10 border-b border-white/5">
                
                <div class="lg:col-span-5 space-y-3">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center font-cinzel font-bold text-sm border border-amber-400/30">
                            AGT
                        </div>
                        <span class="font-cinzel font-bold text-base text-white">AL AMIN <span class="text-amber-400">GOT TALENT</span></span>
                    </div>
                    <p class="text-xs leading-relaxed text-stone-400 max-w-sm">
                        Festival kompetisi bakat dan sains santri pelajar tingkat regional dan nasional di Pesantren Persatuan Islam 80 Sindangkasih.
                    </p>
                </div>

                <div class="lg:col-span-3 space-y-2 text-xs">
                    <h4 class="font-semibold text-stone-200 uppercase tracking-wider mb-3">Tautan Cepat</h4>
                    <ul class="space-y-1.5">
                        <li><a href="#hero" class="hover:text-amber-400 transition-colors">Beranda</a></li>
                        <li><a href="#cabang-lomba" class="hover:text-amber-400 transition-colors">Cabang Perlombaan</a></li>
                    </ul>
                </div>

                <div class="lg:col-span-4 space-y-2 text-xs">
                    <h4 class="font-semibold text-stone-200 uppercase tracking-wider mb-3">Kontak Panitia</h4>
                    <p class="flex items-start gap-2 text-stone-400">
                        <i class="ti ti-map-pin text-amber-400 text-sm mt-0.5"></i>
                        <span>Jl. Raya Sindangkasih No. 80, Ciamis, Jawa Barat</span>
                    </p>
                    <p class="flex items-center gap-2 text-stone-400">
                        <i class="ti ti-brand-whatsapp text-emerald-400 text-sm"></i>
                        <span>Hotline: 0812-3456-7890</span>
                    </p>
                </div>

            </div>

            <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-[11px] text-stone-500">
                <p>&copy; {{ date('Y') }} Al Amin Got Talent (AGT). Pesantren Persatuan Islam 80 Sindangkasih.</p>
                <p>Domain: <span class="text-amber-400 font-mono">agt.persis80alamin.com</span></p>
            </div>
        </div>
    </footer>


    <!-- ==============================================================
         MODAL: DETAIL JUKNIS
         ============================================================== -->
    <div x-show="showJuknisModal" 
         x-cloak 
         class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/85 backdrop-blur-md"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
        
        <div @click.away="showJuknisModal = false" class="relative w-full max-w-xl rounded-2xl bg-[#140306] border border-amber-500/30 p-6 text-white shadow-2xl overflow-hidden">
            
            <div class="flex items-start justify-between gap-3 pb-3.5 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center text-xl border border-amber-500/20 shrink-0">
                        <i class="ti" :class="selectedComp ? selectedComp.icon : 'ti-trophy'"></i>
                    </div>
                    <div>
                        <span class="text-[10px] font-semibold text-amber-400 uppercase tracking-wider block" x-text="selectedComp ? selectedComp.category_label : 'JUKNIS'"></span>
                        <h3 class="font-bold text-base text-white" x-text="selectedComp ? selectedComp.title : 'Petunjuk Teknis'"></h3>
                    </div>
                </div>
                <button @click="showJuknisModal = false" class="w-7 h-7 rounded-lg bg-white/5 hover:bg-white/10 text-stone-400 hover:text-white flex items-center justify-center text-sm transition cursor-pointer">
                    <i class="ti ti-x"></i>
                </button>
            </div>

            <div class="py-4 space-y-3.5 max-h-[60vh] overflow-y-auto pr-1 text-xs">
                
                <div class="grid grid-cols-3 gap-2 font-medium">
                    <div class="p-2.5 rounded-xl bg-black/30 border border-white/5">
                        <span class="text-[10px] text-stone-400 block">Biaya</span>
                        <span class="text-amber-300 font-semibold" x-text="selectedComp ? selectedComp.fee : '-'"></span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-black/30 border border-white/5">
                        <span class="text-[10px] text-stone-400 block">Durasi</span>
                        <span class="text-amber-300 font-semibold" x-text="selectedComp ? selectedComp.durasi : '-'"></span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-black/30 border border-white/5">
                        <span class="text-[10px] text-stone-400 block">Peserta</span>
                        <span class="text-amber-300 font-semibold" x-text="selectedComp ? selectedComp.target_peserta : '-'"></span>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold text-amber-400 text-xs uppercase tracking-wider mb-2">
                        Ketentuan & Kriteria Penilaian:
                    </h4>
                    <ul class="space-y-1.5 text-stone-300">
                        <template x-for="(item, i) in (selectedComp ? selectedComp.juknis : [])" :key="i">
                            <li class="flex items-start gap-2 bg-black/20 p-2 rounded-lg border border-white/5">
                                <i class="ti ti-circle-check text-amber-400 text-xs mt-0.5 shrink-0"></i>
                                <span x-text="item"></span>
                            </li>
                        </template>
                    </ul>
                </div>

                <div class="p-3 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-between gap-3 text-xs">
                    <div>
                        <span class="text-stone-400 block text-[11px]">Narahubung Lomba:</span>
                        <span class="font-semibold text-amber-300" x-text="selectedComp ? selectedComp.cp : '-'"></span>
                    </div>
                    <a :href="'https://wa.me/6285284693063?text=' + encodeURIComponent('Halo Panitia AGT, ingin tanya teknis lomba ' + (selectedComp ? selectedComp.title : ''))" target="_blank" class="px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-xs flex items-center gap-1">
                        <i class="ti ti-brand-whatsapp text-sm"></i>
                        <span>Chat WA</span>
                    </a>
                </div>
            </div>

            <div class="pt-3 border-t border-white/10 flex flex-wrap items-center justify-between gap-2.5">
                <div>
                    <template x-if="selectedComp && selectedComp.juknis_url">
                        <a :href="selectedComp.juknis_url" target="_blank" download class="px-3.5 py-2 rounded-xl bg-amber-500/15 hover:bg-amber-500/25 text-amber-300 font-semibold text-xs border border-amber-500/30 transition flex items-center gap-1.5 shadow-sm">
                            <i class="ti ti-file-download text-sm"></i>
                            <span>Unduh Juknis Resmi (PDF)</span>
                        </a>
                    </template>
                </div>
                <div class="flex items-center gap-2">
                    <button @click="showJuknisModal = false" class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-white font-medium text-xs transition cursor-pointer">
                        Tutup
                    </button>
                    <button @click="showJuknisModal = false; openRegister(selectedComp)" class="btn-luxury-gold px-5 py-2 rounded-xl text-xs flex items-center gap-1.5 cursor-pointer">
                        <i class="ti ti-sparkles text-xs"></i>
                        <span>Daftar Lomba Ini</span>
                    </button>
                </div>
            </div>

        </div>
    </div>


    <!-- ==============================================================
         MODAL: PREVIEW POSTER CABANG LOMBA (LIGHTBOX MODAL)
         ============================================================== -->
    <div x-show="showPosterModal" 
         x-cloak 
         class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-3 sm:p-5 bg-black/90 backdrop-blur-lg"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
        
        <div @click.away="showPosterModal = false" class="relative w-full max-w-2xl rounded-3xl bg-[#140306] border border-amber-500/40 p-5 sm:p-6 text-white shadow-[0_20px_60px_rgba(0,0,0,0.9)] overflow-hidden">
            
            <!-- Modal Header -->
            <div class="flex items-start justify-between gap-3 pb-3 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center text-xl border border-amber-500/20 shrink-0">
                        <i class="ti" :class="selectedPoster ? selectedPoster.icon : 'ti-photo'"></i>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-amber-400 uppercase tracking-wider block" x-text="selectedPoster ? selectedPoster.category_label : 'POSTER LOMBA'"></span>
                        <h3 class="font-bold text-base sm:text-lg text-white" x-text="selectedPoster ? selectedPoster.title : 'Poster Perlombaan'"></h3>
                    </div>
                </div>
                <button @click="showPosterModal = false" class="w-8 h-8 rounded-xl bg-white/5 hover:bg-white/10 text-stone-400 hover:text-white flex items-center justify-center text-base transition cursor-pointer">
                    <i class="ti ti-x"></i>
                </button>
            </div>

            <!-- Poster Display Container (Full View 16:9) -->
            <div class="py-4 flex flex-col items-center justify-center">
                <div class="relative w-full aspect-video rounded-2xl overflow-hidden border border-amber-500/30 bg-black/80 shadow-inner flex items-center justify-center">
                    
                    <!-- Loading Spinner saat poster sedang di-load -->
                    <div x-show="!posterLoaded && !posterError" class="absolute inset-0 flex items-center justify-center">
                        <div class="w-8 h-8 border-2 border-amber-400/20 border-t-amber-400 rounded-full animate-spin"></div>
                    </div>

                    <!-- Gambar Poster Penuh (16:9 Object Contain - Tidak Terpotong) -->
                    <img :src="selectedPoster ? selectedPoster.poster : ''" 
                         :alt="selectedPoster ? selectedPoster.title : 'Poster'"
                         x-show="!posterError"
                         x-on:load="posterLoaded = true"
                         x-on:error="posterError = true; posterLoaded = false"
                         class="w-full h-full object-contain mx-auto transition-opacity duration-300"
                         :class="posterLoaded ? 'opacity-100' : 'opacity-0'">
                    
                    <!-- Fallback Poster Theatrical Art (Jika Gambar Gagal Dimuat / Belum Diupload) -->
                    <div x-show="posterError" class="w-full h-full p-6 text-center flex flex-col items-center justify-center bg-gradient-to-b from-[#2a060d] via-[#150205] to-[#080102]">
                        <div class="w-16 h-16 rounded-3xl bg-amber-500/10 border-2 border-amber-400/40 flex items-center justify-center text-amber-300 text-3xl mb-2 shadow-[0_0_30px_rgba(245,158,11,0.2)]">
                            <i class="ti" :class="selectedPoster ? selectedPoster.icon : 'ti-award'"></i>
                        </div>
                        <span class="text-[11px] font-bold text-amber-400 tracking-[0.25em] uppercase font-cinzel mb-1">
                            POSTER RESMI CABANG LOMBA
                        </span>
                        <h4 class="font-bold text-base sm:text-lg text-white max-w-md mb-1" x-text="selectedPoster ? selectedPoster.title : ''"></h4>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-400/10 border border-amber-400/25 text-amber-300 text-[11px] font-medium">
                            <i class="ti ti-calendar-event"></i>
                            <span>16 – 17 Januari 2027</span>
                        </div>
                        <p class="text-[11px] text-stone-400 max-w-sm mt-2 line-clamp-2" x-text="selectedPoster ? selectedPoster.description : ''"></p>
                    </div>

                </div>

                <!-- Detail Meta Bawah Poster -->
                <div class="w-full mt-3 flex flex-wrap items-center justify-between gap-2 px-1 text-xs">
                    <span class="text-stone-300 flex items-center gap-1.5">
                        <i class="ti ti-ticket text-amber-400"></i>
                        <span>Biaya: <strong class="text-amber-300" x-text="selectedPoster ? selectedPoster.fee : '-'"></strong></span>
                    </span>
                    <span class="text-stone-300 flex items-center gap-1.5">
                        <i class="ti ti-users text-amber-400"></i>
                        <span>Kuota: <strong class="text-stone-200" x-text="selectedPoster ? selectedPoster.quota : '-'"></strong></span>
                    </span>
                    <span class="text-stone-300 flex items-center gap-1.5">
                        <i class="ti ti-trophy text-amber-400"></i>
                        <span>Total Hadiah: <strong class="text-amber-300">Trophy + Beasiswa</strong></span>
                    </span>
                </div>
            </div>

            <!-- Modal Action Buttons -->
            <div class="pt-3 border-t border-white/10 flex flex-wrap items-center justify-between gap-2">
                <a :href="selectedPoster ? selectedPoster.poster : '#'" 
                   target="_blank" 
                   download 
                   class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-stone-300 hover:text-white font-medium text-xs transition flex items-center gap-1.5">
                    <i class="ti ti-download text-sm text-amber-400"></i>
                    <span>Unduh Poster</span>
                </a>

                <div class="flex items-center gap-2">
                    <button @click="showPosterModal = false; openJuknis(selectedPoster)" class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-white font-medium text-xs border border-white/10 transition flex items-center gap-1.5 cursor-pointer">
                        <i class="ti ti-file-text text-amber-400"></i>
                        <span>Baca Juknis</span>
                    </button>
                    
                    <button @click="showPosterModal = false; openRegister(selectedPoster)" class="btn-luxury-gold px-5 py-2 rounded-xl text-xs flex items-center gap-1.5 cursor-pointer active:scale-95">
                        <i class="ti ti-sparkles text-xs"></i>
                        <span>Daftar Sekarang</span>
                    </button>
                </div>
            </div>

        </div>
    </div>


    <!-- ==============================================================
         MODAL: PENDAFTARAN CEPAT (WHATSAPP FORM)
         ============================================================== -->
    <div x-show="showRegisterModal" 
         x-cloak 
         class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/85 backdrop-blur-md"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
        
        <div @click.away="showRegisterModal = false" class="relative w-full max-w-lg rounded-2xl bg-[#140306] border border-amber-500/30 p-6 text-white shadow-2xl overflow-hidden">
            
            <div class="flex items-start justify-between gap-3 pb-3 border-b border-white/10">
                <div>
                    <span class="text-[10px] font-semibold text-amber-400 uppercase tracking-wider block">FORMULIR REGISTRASI</span>
                    <h3 class="font-bold text-lg text-white">Al Amin Got Talent 2026</h3>
                </div>
                <button @click="showRegisterModal = false" class="w-7 h-7 rounded-lg bg-white/5 hover:bg-white/10 text-stone-400 hover:text-white flex items-center justify-center text-sm transition cursor-pointer">
                    <i class="ti ti-x"></i>
                </button>
            </div>

            <form @submit.prevent="submitToWa()" class="py-4 space-y-3.5 text-xs">
                
                <div class="space-y-1">
                    <label class="font-semibold text-stone-300">Cabang Perlombaan <span class="text-rose-500">*</span></label>
                    <select x-model="regData.id_lomba" required class="w-full py-2.5 px-3 rounded-xl bg-black/50 border border-white/15 text-white focus:border-amber-400 outline-none transition text-xs">
                        <option value="">-- Pilih Cabang Lomba --</option>
                        @foreach($competitions as $c)
                            <option value="{{ $c['id'] }}">{{ $c['title'] }} ({{ $c['category_label'] }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-1">
                    <label class="font-semibold text-stone-300">Nama Lengkap / Tim <span class="text-rose-500">*</span></label>
                    <input type="text" x-model="regData.nama_peserta" required placeholder="Nama peserta atau nama grup" class="w-full py-2.5 px-3 rounded-xl bg-black/50 border border-white/15 text-white placeholder-stone-600 focus:border-amber-400 outline-none transition text-xs">
                </div>

                <div class="space-y-1">
                    <label class="font-semibold text-stone-300">Asal Sekolah / Pesantren <span class="text-rose-500">*</span></label>
                    <input type="text" x-model="regData.asal_sekolah" required placeholder="Nama sekolah / pesantren asal" class="w-full py-2.5 px-3 rounded-xl bg-black/50 border border-white/15 text-white placeholder-stone-600 focus:border-amber-400 outline-none transition text-xs">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="font-semibold text-stone-300">No. WhatsApp <span class="text-rose-500">*</span></label>
                        <input type="tel" x-model="regData.no_wa" required placeholder="08xxxxxxxxxx" class="w-full py-2.5 px-3 rounded-xl bg-black/50 border border-white/15 text-white placeholder-stone-600 focus:border-amber-400 outline-none transition text-xs">
                    </div>

                    <div class="space-y-1">
                        <label class="font-semibold text-stone-300">Email (Opsional)</label>
                        <input type="email" x-model="regData.email" placeholder="nama@email.com" class="w-full py-2.5 px-3 rounded-xl bg-black/50 border border-white/15 text-white placeholder-stone-600 focus:border-amber-400 outline-none transition text-xs">
                    </div>
                </div>

                <div class="p-3 bg-amber-500/10 border border-amber-500/20 rounded-xl text-[11px] text-stone-400">
                    Format pendaftaran akan langsung dibuatkan dan diteruskan ke admin WhatsApp panitia AGT untuk nomor registrasi dan instruksi pembayaran.
                </div>

                <div class="pt-2 border-t border-white/10 flex items-center justify-end gap-2.5">
                    <button type="button" @click="showRegisterModal = false" class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-white font-medium text-xs transition cursor-pointer">
                        Batal
                    </button>
                    <button type="submit" class="btn-luxury-gold px-5 py-2 rounded-xl text-xs flex items-center gap-1.5 cursor-pointer">
                        <i class="ti ti-brand-whatsapp text-sm"></i>
                        <span>Kirim ke WhatsApp</span>
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- Floating WhatsApp Hotline Button -->
    <a href="https://wa.me/6285284693063?text={{ urlencode('Halo Panitia Al Amin Got Talent (AGT 2026), saya ingin konsultasi pendaftaran lomba.') }}" target="_blank" class="fixed bottom-6 right-6 z-40 w-12 h-12 bg-emerald-600 hover:bg-emerald-500 text-white rounded-full flex items-center justify-center shadow-xl hover:scale-105 active:scale-95 transition-all" title="Hotline WhatsApp AGT">
        <i class="ti ti-brand-whatsapp text-2xl"></i>
    </a>

    <!-- AOS (Animate On Scroll) Initialization -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script>
        window.addEventListener('load', function() {
            AOS.init({
                duration: 700,
                once: true,
                offset: 20,
                easing: 'ease-out-cubic',
            });
        });
    </script>
</body>
</html>
