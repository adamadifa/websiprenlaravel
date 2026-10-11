<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Peserta — Al Amin Got Talent (AGT 2026)</title>
    
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
            box-shadow: 0 4px 20px -2px rgba(234, 179, 8, 0.35);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-luxury-gold:hover {
            background: linear-gradient(135deg, #ffffff 0%, #facc15 50%, #d97706 100%);
            transform: translateY(-1px);
            box-shadow: 0 8px 25px -2px rgba(234, 179, 8, 0.5);
        }
    </style>
</head>

<body class="selection:bg-amber-400 selection:text-amber-950 flex flex-col justify-between">

    <!-- Ambient Lighting Backdrop -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[850px] h-[400px] bg-amber-500/12 blur-[150px] rounded-full"></div>
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[600px] h-[500px] bg-rose-900/25 blur-[160px] rounded-full"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[400px] bg-rose-950/30 blur-[140px] rounded-full"></div>
    </div>

    <!-- Header Navbar AGT -->
    <header class="relative z-20 border-b border-amber-500/20 bg-[#220308]/92 backdrop-blur-xl py-4">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between">
            <a href="{{ route('agt.direct') }}" class="flex items-center group">
                <img src="{{ asset('images/agt/logo-agt.png') }}" 
                     alt="Logo Al Amin Got Talent" 
                     class="h-9 sm:h-11 w-auto object-contain filter drop-shadow-[0_2px_8px_rgba(234,179,8,0.4)] group-hover:scale-105 transition-all">
            </a>

            <div class="flex items-center gap-3">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs font-bold text-white">{{ $user->name }}</span>
                    <span class="text-[10px] text-amber-300/70 font-mono">{{ $pendaftaranAgt->nomor_register }}</span>
                </div>

                <form action="{{ route('agt.logout.direct') }}" method="POST">
                    @csrf
                    <button type="submit" 
                            title="Keluar"
                            class="px-3.5 py-2 rounded-xl bg-white/5 hover:bg-rose-900/40 text-stone-300 hover:text-rose-200 border border-white/10 hover:border-rose-500/30 text-xs font-semibold flex items-center gap-2 transition active:scale-95 cursor-pointer">
                        <i class="ti ti-logout text-base"></i>
                        <span class="hidden sm:inline">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-10 flex-1 w-full space-y-6 sm:space-y-8">
        
        <!-- Welcome Hero Banner AGT Style -->
        <div class="p-6 sm:p-8 rounded-3xl glass-panel relative overflow-hidden border border-amber-500/30 shadow-2xl">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
                <div class="space-y-2 max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-300 text-xs font-semibold">
                        <i class="ti ti-trophy text-amber-400"></i>
                        <span>Akun Resmi Peserta AGT 2026</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white font-cinzel leading-tight">
                        Ahlan Wa Sahlan, <br class="hidden sm:inline">
                        <span class="text-amber-300">{{ $pendaftaranAgt->nama_lengkap }}</span>!
                    </h2>
                    <p class="text-xs sm:text-sm text-stone-300 leading-relaxed">
                        Data pendaftaran Anda telah tersimpan dengan aman di sistem. Pantau nomor registrasi, cabang lomba, dan bukti pembayaran di bawah ini.
                    </p>
                </div>

                <!-- Registration Quick Card -->
                <div class="p-5 rounded-2xl bg-black/40 border border-amber-500/30 flex flex-col justify-center min-w-[240px]">
                    <span class="text-[10px] text-stone-400 uppercase tracking-widest font-mono">NOMOR REGISTRASI</span>
                    <span class="font-mono text-2xl font-black text-amber-300 tracking-wider my-1">
                        {{ $pendaftaranAgt->nomor_register }}
                    </span>
                    <div class="flex items-center gap-2 mt-2 pt-2 border-t border-white/10 text-xs text-stone-300">
                        <i class="ti ti-school text-amber-400"></i>
                        <span>{{ $pendaftaranAgt->jenjangPendidikan->jenjang_pendidikan ?? 'Semua Jenjang' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid Cards: Informasi Detail & Status Pembayaran -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Card 1: Data Profil & Akun Peserta -->
            <div class="p-6 rounded-3xl glass-panel border border-white/10 shadow-xl space-y-4">
                <div class="flex items-center gap-3 pb-3 border-b border-white/10">
                    <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-300 flex items-center justify-center font-bold">
                        <i class="ti ti-user text-base"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm sm:text-base text-white">Data Peserta / Tim</h3>
                        <p class="text-[11px] text-stone-400">Identitas yang terdaftar</p>
                    </div>
                </div>

                <div class="space-y-3 text-xs">
                    <div>
                        <span class="text-[10px] text-stone-400 block uppercase font-mono">Nama Lengkap</span>
                        <span class="font-semibold text-white">{{ $pendaftaranAgt->nama_lengkap }}</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-stone-400 block uppercase font-mono">Asal Sekolah / Lembaga</span>
                        <span class="font-semibold text-stone-200">{{ $pendaftaranAgt->asal_sekolah }}</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-stone-400 block uppercase font-mono">Nomor WhatsApp Aktif</span>
                        <span class="font-semibold text-amber-300 font-mono">{{ $pendaftaranAgt->no_hp }}</span>
                    </div>
                    @if($pendaftaranAgt->alamat_rumah)
                    <div>
                        <span class="text-[10px] text-stone-400 block uppercase font-mono">Alamat</span>
                        <span class="text-stone-300">{{ $pendaftaranAgt->alamat_rumah }}</span>
                    </div>
                    @endif
                </div>

                <!-- Box Kredensial Login Akun -->
                <div class="pt-3 border-t border-white/10" x-data="{ showPass: false, copiedUser: false, copiedPass: false }">
                    <div class="flex items-center gap-2 mb-2.5">
                        <i class="ti ti-key text-amber-400 text-sm"></i>
                        <span class="text-[11px] font-bold text-amber-300 uppercase tracking-wider font-mono">Kredensial Login Peserta</span>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-black/50 border border-amber-500/20 space-y-2.5 text-xs">
                        <!-- Username / No Register -->
                        <div>
                            <span class="text-[10px] text-stone-400 block uppercase font-mono">Username (No. Registrasi)</span>
                            <div class="flex items-center justify-between mt-0.5">
                                <span class="font-mono font-bold text-white text-xs sm:text-sm select-all">{{ $user->username }}</span>
                                <button type="button" 
                                        @click="navigator.clipboard.writeText('{{ $user->username }}'); copiedUser = true; setTimeout(() => copiedUser = false, 2000)" 
                                        class="px-2 py-0.5 rounded-lg bg-white/10 hover:bg-white/20 text-stone-300 hover:text-white text-[10px] font-mono flex items-center gap-1 transition">
                                    <i class="ti" :class="copiedUser ? 'ti-check text-emerald-400' : 'ti-copy'"></i>
                                    <span x-text="copiedUser ? 'Disalin' : 'Salin'"></span>
                                </button>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="pt-2 border-t border-white/5">
                            <span class="text-[10px] text-stone-400 block uppercase font-mono">Password Akun</span>
                            <div class="flex items-center justify-between mt-0.5">
                                @if(session('agt_reg_password'))
                                    <!-- Jika baru saja registrasi, tampilkan password plain text yang baru dibuat -->
                                    <div class="flex items-center gap-2">
                                        <span class="font-mono font-bold text-amber-300 text-xs sm:text-sm select-all" 
                                              x-text="showPass ? '{{ session('agt_reg_password') }}' : '••••••••'"></span>
                                        <button type="button" @click="showPass = !showPass" class="text-stone-400 hover:text-amber-300 transition">
                                            <i class="ti text-sm" :class="showPass ? 'ti-eye-off' : 'ti-eye'"></i>
                                        </button>
                                    </div>
                                    <button type="button" 
                                            @click="navigator.clipboard.writeText('{{ session('agt_reg_password') }}'); copiedPass = true; setTimeout(() => copiedPass = false, 2000)" 
                                            class="px-2 py-0.5 rounded-lg bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 text-[10px] font-mono flex items-center gap-1 transition">
                                        <i class="ti" :class="copiedPass ? 'ti-check text-emerald-400' : 'ti-copy'"></i>
                                        <span x-text="copiedPass ? 'Disalin' : 'Salin'"></span>
                                    </button>
                                @else
                                    <div class="flex items-center gap-2">
                                        <span class="font-mono font-semibold text-stone-300 text-xs">
                                            Tersimpan aman (Password saat registrasi)
                                        </span>
                                    </div>
                                    <a href="{{ route('password') }}" class="px-2 py-0.5 rounded-lg bg-white/10 hover:bg-white/20 text-stone-300 hover:text-white text-[10px] font-mono flex items-center gap-1 transition">
                                        <i class="ti ti-edit text-xs"></i>
                                        <span>Ubah</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <p class="text-[10px] text-stone-400 mt-2">
                        Gunakan username (nomor registrasi/no WA) dan password di atas untuk login kembali ke dashboard ini.
                    </p>
                </div>
            </div>

            <!-- Card 2: Cabang Perlombaan yang Diikuti -->
            <div class="p-6 rounded-3xl glass-panel border border-white/10 shadow-xl space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-white/10">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-300 flex items-center justify-center font-bold">
                            <i class="ti ti-medal text-base"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm sm:text-base text-white">Cabang Perlombaan</h3>
                            <p class="text-[11px] text-stone-400">Lomba yang diikuti</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-amber-300 bg-amber-500/10 px-2.5 py-1 rounded-lg border border-amber-500/20">
                        {{ $pendaftaranAgt->perlombaan->count() }} Lomba
                    </span>
                </div>

                <div class="space-y-2.5 max-h-[220px] overflow-y-auto pr-1">
                    @forelse($pendaftaranAgt->perlombaan as $lomba)
                        <div class="p-3 rounded-2xl bg-black/30 border border-white/5 flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2.5">
                                <i class="ti ti-sparkles text-amber-400"></i>
                                <span class="font-semibold text-stone-200">{{ $lomba->jenis_perlombaan }}</span>
                            </div>
                            <span class="font-mono text-amber-300/90 text-[11px]">
                                {{ $lomba->biaya_pendaftaran > 0 ? 'Rp ' . number_format($lomba->biaya_pendaftaran, 0, ',', '.') : 'Gratis' }}
                            </span>
                        </div>
                    @empty
                        <p class="text-xs text-stone-400 italic">Belum ada lomba terpilih.</p>
                    @endforelse
                </div>

                <div class="pt-3 border-t border-white/10 flex justify-between items-center text-xs">
                    <span class="text-stone-300 font-medium">Total Biaya Pendaftaran:</span>
                    @php
                        $totalBiaya = $pendaftaranAgt->perlombaan->sum('biaya_pendaftaran');
                    @endphp
                    <span class="font-mono text-sm font-bold text-amber-400">
                        {{ $totalBiaya > 0 ? 'Rp ' . number_format($totalBiaya, 0, ',', '.') : 'Gratis' }}
                    </span>
                </div>
            </div>

            <!-- Card 3: Status Berkas & Aksi -->
            <div class="p-6 rounded-3xl glass-panel border border-white/10 shadow-xl space-y-4 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-3 pb-3 border-b border-white/10 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-300 flex items-center justify-center font-bold">
                            <i class="ti ti-receipt-2 text-base"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm sm:text-base text-white">Status & Pembayaran</h3>
                            <p class="text-[11px] text-stone-400">Kelengkapan pendaftaran</p>
                        </div>
                    </div>

                    <div class="space-y-3 text-xs">
                        <div class="p-3.5 rounded-2xl bg-black/40 border border-white/5 flex items-center justify-between">
                            <span class="text-stone-300">Status Registrasi:</span>
                            <span class="px-2.5 py-1 rounded-full bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 font-bold text-[11px]">
                                <i class="ti ti-circle-check text-xs mr-1"></i> Terdaftar
                            </span>
                        </div>

                        <div class="p-3.5 rounded-2xl bg-black/40 border border-white/5 flex items-center justify-between">
                            <span class="text-stone-300">Bukti Pembayaran:</span>
                            @if($pendaftaranAgt->bukti_pembayaran)
                                <a href="{{ asset('storage/' . $pendaftaranAgt->bukti_pembayaran) }}" target="_blank" class="text-amber-400 hover:underline flex items-center gap-1 font-semibold">
                                    <i class="ti ti-file-text"></i> Lihat Berkas
                                </a>
                            @else
                                <span class="text-amber-300/70 italic text-[11px]">Belum diunggah</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- WhatsApp Action -->
                @php
                    $daftarLombaText = $pendaftaranAgt->perlombaan->pluck('jenis_perlombaan')->implode(', ');
                    $waMessage = "Halo Panitia Al Amin Got Talent (AGT 2026),\n" .
                                 "Saya peserta dengan data:\n" .
                                 "- No. Registrasi: {$pendaftaranAgt->nomor_register}\n" .
                                 "- Nama: {$pendaftaranAgt->nama_lengkap}\n" .
                                 "- Cabang Lomba: {$daftarLombaText}\n\n" .
                                 "Ingin konfirmasi pendaftaran. Terima kasih!";
                    $waUrl = "https://wa.me/6281234567890?text=" . urlencode($waMessage);
                @endphp
                <div class="pt-3 space-y-2">
                    <a href="{{ $waUrl }}" target="_blank" class="w-full btn-luxury-gold py-3 px-4 rounded-2xl text-xs uppercase tracking-wider flex items-center justify-center gap-2 cursor-pointer shadow-lg active:scale-95">
                        <i class="ti ti-brand-whatsapp text-base"></i>
                        <span>Hubungi Panitia AGT</span>
                    </a>
                    <a href="{{ route('agt.success.global', ['nomor' => $pendaftaranAgt->nomor_register]) }}" class="w-full py-2.5 px-4 rounded-xl bg-white/5 hover:bg-white/10 text-stone-300 hover:text-white border border-white/10 text-xs flex items-center justify-center gap-1.5 transition">
                        <i class="ti ti-ticket text-sm text-amber-400"></i>
                        <span>Lihat Bukti Tiket Registrasi</span>
                    </a>
                </div>
            </div>

        </div>

    </main>

    <!-- Footer AGT -->
    <footer class="relative z-10 border-t border-white/10 py-6 text-center text-xs text-stone-500">
        <p>&copy; {{ date('Y') }} Al Amin Got Talent (AGT 2026) — Pesantren Persatuan Islam 80 Sindangkasih.</p>
    </footer>

</body>
</html>
