<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk Akun Peserta — Al Amin Got Talent (AGT 2026)</title>
    
    <!-- Meta & SEO Tags -->
    <meta name="description" content="Portal login resmi peserta Al Amin Got Talent (AGT 2026). Akses data pendaftaran, cetak bukti nomor peserta, dan info teknis perlombaan.">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}">

    <!-- Typography: Plus Jakarta Sans, Anton & Cinzel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Cinzel:wght@600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Tailwind CSS (via Vite) & Alpine.js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            --bg-deep: #220308;
            --gold-light: #fef08a;
            --gold-main: #eab308;
            --gold-dark: #a16207;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-deep);
            background: linear-gradient(180deg, #1f0307 0%, #2b040b 50%, #200307 100%);
            color: #f1f5f9;
            min-height: 100vh;
            letter-spacing: -0.01em;
        }

        .font-cinzel { font-family: 'Cinzel', serif; }
        .font-broadway { font-family: 'Anton', 'Montserrat', sans-serif; }

        .glass-panel {
            background: rgba(48, 6, 14, 0.78);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(245, 158, 11, 0.22);
            box-shadow: 0 10px 30px -5px rgba(20, 1, 4, 0.6);
        }

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

        .logo-theater-crest {
            background: radial-gradient(circle at 35% 30%, #4a0910 0%, #1f0307 70%, #0a0103 100%);
            box-shadow: 0 0 0 2px #d97706, 0 0 16px rgba(245, 158, 11, 0.45);
        }
    </style>
</head>

<body class="selection:bg-amber-400 selection:text-amber-950 min-h-screen relative flex flex-col justify-between">

    <!-- Ambient Lighting Backdrop -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[850px] h-[400px] bg-amber-500/12 blur-[150px] rounded-full"></div>
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[600px] h-[500px] bg-rose-900/25 blur-[160px] rounded-full"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[400px] bg-rose-950/30 blur-[140px] rounded-full"></div>
    </div>

    <!-- Header Navbar -->
    <header class="relative z-20 border-b border-amber-500/20 bg-[#220308]/92 backdrop-blur-xl py-4">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between">
            <a href="{{ route('agt.direct') }}" class="flex items-center group">
                <img src="{{ asset('images/agt/logo-agt.png') }}" 
                     alt="Logo Al Amin Got Talent" 
                     class="h-9 sm:h-11 w-auto object-contain filter drop-shadow-[0_2px_8px_rgba(234,179,8,0.4)] group-hover:scale-105 transition-all">
            </a>

            <div class="flex items-center gap-2">
                <a href="{{ route('agt.register.direct') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-amber-500/15 hover:bg-amber-500/25 text-amber-300 hover:text-amber-200 text-xs border border-amber-500/30 transition">
                    <i class="ti ti-user-plus text-sm"></i>
                    <span>Daftar Peserta</span>
                </a>
                <a href="{{ route('agt.direct') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-white/5 hover:bg-white/10 text-stone-300 hover:text-white text-xs border border-white/10 transition">
                    <i class="ti ti-arrow-left text-sm text-amber-400"></i>
                    <span class="hidden sm:inline">Kembali ke Beranda</span>
                    <span class="sm:hidden">Kembali</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10 max-w-md mx-auto px-4 sm:px-6 py-10 sm:py-16 w-full flex-1 flex flex-col justify-center">
        
        <!-- Form Container -->
        <div class="p-6 sm:p-8 rounded-3xl glass-panel shadow-2xl relative overflow-hidden border border-amber-500/30">
            
            <div class="text-center mb-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-amber-500/10 border border-amber-400/25 text-amber-300 text-xs font-semibold uppercase tracking-wider mb-3">
                    <i class="ti ti-lock-access text-amber-400"></i>
                    <span>Masuk Akun Peserta</span>
                </div>
                <h2 class="font-cinzel text-2xl sm:text-3xl font-extrabold text-white tracking-tight mb-1.5">
                    Login AGT 2026
                </h2>
                <p class="text-xs text-stone-400 leading-relaxed">
                    Masuk menggunakan Nomor Registrasi (contoh: <span class="text-amber-300 font-mono">GT260001</span>), Email, atau Nomor WhatsApp yang telah didaftarkan.
                </p>
            </div>

            <!-- Error Alerts -->
            @if ($errors->any())
                <div class="mb-5 p-3.5 rounded-2xl bg-rose-950/80 border border-rose-500/40 text-rose-200 text-xs shadow-lg">
                    <div class="flex items-center gap-2 font-bold mb-1 text-xs text-rose-300">
                        <i class="ti ti-alert-triangle text-sm"></i>
                        <span>Gagal Masuk:</span>
                    </div>
                    <ul class="list-disc list-inside space-y-0.5 pl-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-5 p-3.5 rounded-2xl bg-emerald-950/80 border border-emerald-500/40 text-emerald-200 text-xs shadow-lg flex items-center gap-2">
                    <i class="ti ti-circle-check text-emerald-400 text-base"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Form Login -->
            <form action="{{ route('agt.login.direct.post') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Username / No Registrasi / No HP -->
                <div class="space-y-1.5">
                    <label class="font-semibold text-stone-200 text-xs flex items-center justify-between">
                        <span>Nomor Registrasi / Email / No WhatsApp <span class="text-rose-500">*</span></span>
                    </label>
                    <div class="relative">
                        <input type="text" 
                               name="username" 
                               value="{{ old('username') }}" 
                               required 
                               autofocus
                               placeholder="Contoh: GT260001 atau 081234567890" 
                               class="w-full py-2.5 pl-9 pr-3.5 rounded-xl bg-[#1a0206]/80 border border-amber-500/20 text-white placeholder-stone-500 focus:border-amber-400 focus:ring-1 focus:ring-amber-400 outline-none transition text-xs">
                        <i class="ti ti-user absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-sm"></i>
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-1.5" x-data="{ showPass: false }">
                    <label class="font-semibold text-stone-200 text-xs flex items-center justify-between">
                        <span>Password <span class="text-rose-500">*</span></span>
                    </label>
                    <div class="relative">
                        <input :type="showPass ? 'text' : 'password'" 
                               name="password" 
                               required 
                               placeholder="Masukkan password Anda" 
                               class="w-full py-2.5 pl-9 pr-10 rounded-xl bg-[#1a0206]/80 border border-amber-500/20 text-white placeholder-stone-500 focus:border-amber-400 focus:ring-1 focus:ring-amber-400 outline-none transition text-xs">
                        <i class="ti ti-lock absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-sm"></i>
                        <button type="button" 
                                @click="showPass = !showPass" 
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 hover:text-amber-300 transition">
                            <i class="ti text-sm" :class="showPass ? 'ti-eye-off' : 'ti-eye'"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between pt-1 text-xs">
                    <label class="flex items-center gap-2 cursor-pointer text-stone-300">
                        <input type="checkbox" name="remember" class="rounded bg-black/50 border-amber-500/30 text-amber-500 focus:ring-amber-400 text-xs">
                        <span>Ingat saya di perangkat ini</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full btn-luxury-gold py-3 rounded-xl text-xs sm:text-sm uppercase tracking-wider flex items-center justify-center gap-2 cursor-pointer shadow-xl active:scale-95 transition-all">
                        <i class="ti ti-login text-base"></i>
                        <span>Masuk ke Akun Peserta</span>
                    </button>
                </div>
            </form>

            <!-- Bottom Register Link -->
            <div class="mt-6 pt-5 border-t border-white/10 text-center text-xs text-stone-400">
                Belum mendaftar sebagai peserta? <br>
                <a href="{{ route('agt.register.direct') }}" class="text-amber-300 hover:underline font-bold inline-flex items-center gap-1 mt-1">
                    <span>Daftar Sekarang di Sini</span>
                    <i class="ti ti-arrow-right text-xs"></i>
                </a>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <footer class="relative z-10 border-t border-white/10 py-6 text-center text-xs text-stone-500">
        <p>&copy; {{ date('Y') }} Al Amin Got Talent (AGT). Pesantren Persatuan Islam 80 Sindangkasih.</p>
    </footer>

</body>
</html>
