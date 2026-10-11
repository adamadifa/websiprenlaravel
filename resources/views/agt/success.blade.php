<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Berhasil — Al Amin Got Talent (AGT 2026)</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}">

    <!-- Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Cinzel:wght@600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Tailwind CSS (via Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg-deep: #220308;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-deep);
            background: linear-gradient(180deg, #1f0307 0%, #2b040b 50%, #200307 100%);
            color: #f1f5f9;
        }

        .font-cinzel { font-family: 'Cinzel', serif; }
        .font-broadway { font-family: 'Anton', 'Montserrat', sans-serif; }

        .glass-panel {
            background: rgba(48, 6, 14, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(245, 158, 11, 0.25);
            box-shadow: 0 10px 30px -5px rgba(20, 1, 4, 0.6);
        }

        .btn-luxury-gold {
            background: linear-gradient(135deg, #fef08a 0%, #eab308 50%, #ca8a04 100%);
            color: #1a080a;
            font-weight: 700;
            box-shadow: 0 4px 20px -2px rgba(234, 179, 8, 0.35);
        }

        .btn-luxury-gold:hover {
            background: linear-gradient(135deg, #ffffff 0%, #facc15 50%, #d97706 100%);
        }
    </style>
</head>

<body class="selection:bg-amber-400 selection:text-amber-950 min-h-screen relative flex flex-col justify-between p-4 sm:p-6">
    
    <!-- Ambient Light Backdrop -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[750px] h-[350px] bg-amber-500/10 blur-[140px] rounded-full"></div>
    </div>

    <div class="relative z-10 max-w-xl mx-auto my-auto w-full text-center">
        
        <!-- Icon Success Card -->
        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-3xl bg-emerald-500/10 border-2 border-emerald-400/40 text-emerald-400 flex items-center justify-center text-3xl sm:text-4xl mx-auto mb-5 shadow-[0_0_30px_rgba(52,211,153,0.3)]">
            <i class="ti ti-circle-check"></i>
        </div>

        <span class="text-xs font-bold text-amber-400 uppercase tracking-widest block mb-1">
            PENDAFTARAN BERHASIL DISIMPAN
        </span>
        <h1 class="font-cinzel text-2xl sm:text-3xl font-bold text-white mb-2">
            Selamat Datang di AGT 2026!
        </h1>
        <p class="text-xs text-stone-400 mb-6">
            Data registrasi Anda telah tercatat secara resmi di pangkalan data Al Amin Got Talent 2026.
        </p>

        <!-- Ticket Card Box -->
        <div class="p-6 sm:p-8 rounded-3xl glass-panel text-left shadow-2xl relative overflow-hidden border border-amber-500/35 mb-6">
            
            <div class="flex items-center justify-between pb-4 border-b border-white/10 mb-4">
                <div>
                    <span class="text-[10px] text-stone-400 block uppercase font-mono">NOMOR REGISTRASI</span>
                    <span class="font-mono text-xl sm:text-2xl font-black text-amber-300 tracking-wider">
                        {{ $pendaftaran->nomor_register }}
                    </span>
                </div>
                <div class="px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-semibold">
                    Terdaftar
                </div>
            </div>

            <!-- Detail Peserta -->
            <div class="space-y-2 text-xs">
                <div class="flex justify-between py-1 border-b border-white/5">
                    <span class="text-stone-400">Nama Peserta / Tim:</span>
                    <strong class="text-white text-right">{{ $pendaftaran->nama_lengkap }}</strong>
                </div>
                <div class="flex justify-between py-1 border-b border-white/5">
                    <span class="text-stone-400">Jenjang:</span>
                    <span class="text-amber-300 font-semibold">{{ $pendaftaran->jenjangPendidikan->jenjang_pendidikan ?? '-' }}</span>
                </div>
                <div class="flex justify-between py-1 border-b border-white/5">
                    <span class="text-stone-400">Asal Sekolah:</span>
                    <span class="text-white text-right">{{ $pendaftaran->asal_sekolah }}</span>
                </div>
                <div class="flex justify-between py-1 border-b border-white/5">
                    <span class="text-stone-400">WhatsApp:</span>
                    <span class="text-stone-200 font-mono">{{ $pendaftaran->no_hp }}</span>
                </div>
            </div>

            <!-- Daftar Lomba yang Diikuti -->
            <div class="mt-4 pt-3 border-t border-white/10">
                <span class="text-[11px] font-bold text-amber-300 uppercase tracking-wider block mb-2">
                    Cabang Perlombaan yang Diikuti ({{ $pendaftaran->perlombaan->count() }}):
                </span>
                <ul class="space-y-1.5 text-xs text-stone-300">
                    @foreach($pendaftaran->perlombaan as $lomba)
                        <li class="flex items-center justify-between bg-black/40 p-2.5 rounded-xl border border-white/5">
                            <span class="flex items-center gap-1.5">
                                <i class="ti ti-sparkles text-amber-400 text-xs"></i>
                                <span>{{ $lomba->jenis_perlombaan }}</span>
                            </span>
                            <span class="font-mono font-bold text-amber-300">
                                {{ $lomba->formatted_fee }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Total Biaya -->
            <div class="mt-4 pt-3 border-t border-amber-500/20 flex items-center justify-between text-xs">
                <span class="font-semibold text-stone-300">Total Biaya Pendaftaran:</span>
                <span class="font-mono text-base font-bold text-amber-400">
                    {{ $totalBiaya > 0 ? 'Rp ' . number_format($totalBiaya, 0, ',', '.') : 'Gratis' }}
                </span>
            </div>

        </div>

        <!-- WhatsApp Confirmation Button & Action -->
        @php
            $daftarLombaText = $pendaftaran->perlombaan->pluck('jenis_perlombaan')->implode(', ');
            $waMessage = "Halo Panitia Al Amin Got Talent (AGT 2026),\n" .
                         "Saya telah mendaftar dengan rincian berikut:\n" .
                         "- No. Registrasi: {$pendaftaran->nomor_register}\n" .
                         "- Nama: {$pendaftaran->nama_lengkap}\n" .
                         "- Asal: {$pendaftaran->asal_sekolah}\n" .
                         "- Cabang Lomba: {$daftarLombaText}\n" .
                         "- Total Biaya: " . ($totalBiaya > 0 ? 'Rp ' . number_format($totalBiaya, 0, ',', '.') : 'Gratis') . "\n\n" .
                         "Mohon instruksi selanjutnya. Terima kasih!";
            $waUrl = "https://wa.me/6281234567890?text=" . urlencode($waMessage);
        @endphp

        <div class="space-y-3">
            <a href="{{ $waUrl }}" target="_blank" class="w-full btn-luxury-gold py-3 px-6 rounded-2xl text-xs sm:text-sm uppercase tracking-wider flex items-center justify-center gap-2 cursor-pointer shadow-xl active:scale-95">
                <i class="ti ti-brand-whatsapp text-lg"></i>
                <span>Konfirmasi ke WhatsApp Panitia</span>
            </a>

            <div class="flex items-center justify-center gap-3">
                <button onclick="window.print()" class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-stone-300 hover:text-white text-xs border border-white/10 flex items-center gap-1.5 transition">
                    <i class="ti ti-printer text-sm"></i>
                    <span>Cetak Bukti</span>
                </button>
                <a href="{{ route('agt.direct') }}" class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-stone-300 hover:text-white text-xs border border-white/10 flex items-center gap-1.5 transition">
                    <i class="ti ti-home text-sm"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>

    </div>

    <footer class="relative z-10 py-4 text-center text-[11px] text-stone-600">
        &copy; {{ date('Y') }} Pesantren Persatuan Islam 80 Sindangkasih — Al Amin Got Talent
    </footer>

</body>
</html>
