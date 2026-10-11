<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Registrasi Peserta — Al Amin Got Talent (AGT 2026)</title>
    
    <!-- Meta & SEO Tags -->
    <meta name="description" content="Formulir resmi pendaftaran peserta Al Amin Got Talent (AGT 2026). Pilih cabang lomba sesuai jenjang pendidikan Anda.">
    
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
            overflow-x: hidden;
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

        .glass-panel-active {
            background: rgba(76, 10, 23, 0.9);
            border-color: rgba(234, 179, 8, 0.75);
            box-shadow: 0 0 25px rgba(234, 179, 8, 0.25), inset 0 1px 1px rgba(254, 240, 138, 0.4);
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

        /* Checkbox Custom Tick */
        input[type="checkbox"]:checked {
            background-color: #eab308;
            border-color: #fef08a;
        }
    </style>
</head>

<body class="selection:bg-amber-400 selection:text-amber-950 min-h-screen relative flex flex-col justify-between"
      x-data="{
          allPerlombaan: {{ json_encode($perlombaanList) }},
          selectedJenjang: '{{ $preselectedJenjang ?? '' }}',
          selectedLombaIds: {{ json_encode($preselectedLomba ? [(int)$preselectedLomba] : []) }},
          
          init() {
              if (this.selectedLombaIds.length > 0 && !this.selectedJenjang) {
                  const pre = this.allPerlombaan.find(p => p.id == this.selectedLombaIds[0]);
                  if (pre) this.selectedJenjang = String(pre.id_jenjang);
              }
          },

          // Filter perlombaan yang cocok dengan jenjang yang dipilih
          get availablePerlombaan() {
              if (!this.selectedJenjang) return [];
              return this.allPerlombaan.filter(p => p.id_jenjang == this.selectedJenjang);
          },

          // Cek apakah lomba terpilih
          isSelected(id) {
              return this.selectedLombaIds.includes(Number(id));
          },

          // Toggle pilihan lomba
          toggleLomba(id) {
              const numId = Number(id);
              if (this.isSelected(numId)) {
                  this.selectedLombaIds = this.selectedLombaIds.filter(x => x !== numId);
              } else {
                  this.selectedLombaIds.push(numId);
              }
          },

          // Saat user mengganti jenjang
          onJenjangChange() {
              // Reset pilihan lomba yang tidak sesuai jenjang baru
              this.selectedLombaIds = this.selectedLombaIds.filter(id => {
                  const p = this.allPerlombaan.find(item => item.id == id);
                  return p && p.id_jenjang == this.selectedJenjang;
              });
          },

          // Hitung total biaya pendaftaran dari lomba yang dipilih
          get totalBiaya() {
              return this.selectedLombaIds.reduce((total, id) => {
                  const p = this.allPerlombaan.find(item => item.id == id);
                  return total + (p ? parseFloat(p.biaya_pendaftaran || 0) : 0);
              }, 0);
          },

          // Format rupiah
          formatRupiah(number) {
              if (number <= 0) return 'Gratis';
              return 'Rp ' + new Intl.NumberFormat('id-ID').format(number);
          },

          // Validasi & Kirim Form
          validationError: '',
          submitForm(event) {
              if (!this.selectedJenjang) {
                  this.validationError = 'Silakan pilih Jenjang Pendidikan terlebih dahulu pada Langkah 1.';
                  document.getElementById('step-1')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
                  return;
              }
              if (this.selectedLombaIds.length === 0) {
                  this.validationError = 'Silakan pilih minimal 1 Cabang Perlombaan pada Langkah 2.';
                  document.getElementById('step-2')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
                  return;
              }
              this.validationError = '';
              event.target.closest('form').submit();
          }
      }">

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
                <a href="{{ route('agt.login.direct') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-amber-500/15 hover:bg-amber-500/25 text-amber-300 hover:text-amber-200 text-xs border border-amber-500/30 transition">
                    <i class="ti ti-login text-sm"></i>
                    <span>Masuk / Login</span>
                </a>
                <a href="{{ route('agt.direct') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-white/5 hover:bg-white/10 text-stone-300 hover:text-white text-xs border border-white/10 transition">
                    <i class="ti ti-arrow-left text-sm text-amber-400"></i>
                    <span class="hidden sm:inline">Kembali ke Beranda</span>
                    <span class="sm:hidden">Kembali</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 py-8 sm:py-12 w-full">
        
        <!-- Header Formulir -->
        <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-amber-500/10 border border-amber-400/25 text-amber-300 text-xs font-semibold uppercase tracking-wider mb-3">
                <i class="ti ti-clipboard-list text-amber-400"></i>
                <span>Formulir Pendaftaran Multi-Lomba</span>
            </div>
            <h2 class="font-cinzel text-2xl sm:text-4xl font-extrabold text-white tracking-tight mb-2">
                Pendaftaran Al Amin Got Talent 2026
            </h2>
            <p class="text-xs sm:text-sm text-stone-400 leading-relaxed">
                Pilih jenjang pendidikan Anda, lalu centang satu atau beberapa cabang lomba sekaligus yang ingin Anda ikuti dalam satu formulir pendaftaran.
            </p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 rounded-2xl bg-rose-950/80 border border-rose-500/40 text-rose-200 text-xs shadow-lg">
                <div class="flex items-center gap-2 font-bold mb-1 text-sm text-rose-300">
                    <i class="ti ti-alert-triangle text-base"></i>
                    <span>Terdapat Kesalahan Pengisian:</span>
                </div>
                <ul class="list-disc list-inside space-y-1 pl-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('agt.register.direct.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 sm:space-y-8">
            @csrf

            <!-- STEP 1: PILIH JENJANG PENDIDIKAN -->
            <div id="step-1" class="p-6 sm:p-8 rounded-3xl glass-panel shadow-2xl relative overflow-hidden transition-all duration-300"
                 :class="validationError && !selectedJenjang ? 'ring-2 ring-rose-500 shadow-[0_0_25px_rgba(244,63,94,0.3)]' : ''">
                <div class="flex items-center gap-3 pb-4 mb-5 border-b border-white/10">
                    <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-300 flex items-center justify-center font-bold text-sm">
                        1
                    </div>
                    <div>
                        <h3 class="font-bold text-base sm:text-lg text-white">Pilih Jenjang Pendidikan</h3>
                        <p class="text-[11px] text-stone-400">Cabang perlombaan akan disesuaikan otomatis dengan jenjang yang dipilih</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3">
                    @foreach($jenjangList as $jenjang)
                        <label class="relative cursor-pointer">
                            <input type="radio" 
                                   name="id_jenjang" 
                                   value="{{ $jenjang->id }}" 
                                   x-model="selectedJenjang" 
                                   @change="onJenjangChange(); validationError = ''" 
                                   required 
                                   class="sr-only">
                            <div class="p-4 rounded-2xl border transition-all text-center flex flex-col items-center justify-center gap-1.5"
                                 :class="selectedJenjang == '{{ $jenjang->id }}' 
                                     ? 'bg-amber-400 text-amber-950 border-amber-300 font-bold shadow-[0_0_20px_rgba(234,179,8,0.35)] scale-[1.02]' 
                                     : 'bg-black/40 text-stone-300 border-white/10 hover:border-amber-400/40 hover:bg-black/60'">
                                <i class="ti ti-school text-xl" :class="selectedJenjang == '{{ $jenjang->id }}' ? 'text-amber-950' : 'text-amber-400'"></i>
                                <span class="text-xs sm:text-sm">{{ $jenjang->jenjang_pendidikan }}</span>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- STEP 2: PILIH BEBERAPA CABANG PERLOMBAAN SEKALIGUS -->
            <div id="step-2" class="p-6 sm:p-8 rounded-3xl glass-panel shadow-2xl relative overflow-hidden transition-all duration-300" 
                 :class="validationError && selectedLombaIds.length === 0 ? 'ring-2 ring-rose-500 shadow-[0_0_25px_rgba(244,63,94,0.3)]' : ''"
                 x-show="selectedJenjang" 
                 x-transition.opacity>
                
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 mb-5 border-b border-white/10">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-300 flex items-center justify-center font-bold text-sm">
                            2
                        </div>
                        <div>
                            <h3 class="font-bold text-base sm:text-lg text-white">Pilih Cabang Perlombaan</h3>
                            <p class="text-[11px] text-stone-400">Anda dapat memilih 1 atau lebih cabang lomba sekaligus</p>
                        </div>
                    </div>
                    
                    <span class="text-xs text-amber-300 font-medium px-3 py-1 rounded-xl bg-amber-500/10 border border-amber-500/20 self-start sm:self-auto">
                        Terpilih: <strong class="text-white" x-text="selectedLombaIds.length"></strong> Lomba
                    </span>
                </div>

                <!-- Alert jika jenjang ini belum ada perlombaan -->
                <template x-if="availablePerlombaan.length === 0">
                    <div class="p-6 rounded-2xl bg-black/40 border border-white/10 text-center text-xs text-stone-400">
                        <i class="ti ti-info-circle text-2xl text-amber-400 mb-2 block"></i>
                        Belum ada data perlombaan untuk jenjang ini di sistem database. Silakan pilih jenjang lainnya.
                    </div>
                </template>

                <!-- Grid Pilihan Multi Cabang Lomba -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" x-show="availablePerlombaan.length > 0">
                    <template x-for="lomba in availablePerlombaan" :key="lomba.id">
                        <div @click="toggleLomba(lomba.id)"
                             class="p-4 rounded-2xl border transition-all duration-200 cursor-pointer flex flex-col justify-between gap-3 relative group"
                             :class="isSelected(lomba.id) ? 'glass-panel-active' : 'bg-black/40 border-white/10 hover:border-amber-400/30 hover:bg-black/60'">
                            
                            <div class="flex items-start gap-3">
                                <!-- Checkbox visual -->
                                <div class="w-5 h-5 rounded-md border flex items-center justify-center transition shrink-0 mt-0.5"
                                     :class="isSelected(lomba.id) ? 'bg-amber-400 border-amber-300 text-amber-950 font-black' : 'border-white/20 bg-black/50 text-transparent'">
                                    <i class="ti ti-check text-xs"></i>
                                </div>

                                <div class="flex-1">
                                    <h4 class="font-bold text-sm text-white group-hover:text-amber-300 transition-colors leading-snug" x-text="lomba.jenis_perlombaan"></h4>
                                    <span class="text-[10px] text-stone-400 block mt-0.5" x-text="lomba.jenjang_pendidikan ? lomba.jenjang_pendidikan.jenjang_pendidikan : ''"></span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-2.5 border-t border-white/5 text-xs">
                                <span class="text-stone-400 text-[11px]">Biaya:</span>
                                <span class="font-mono font-bold" 
                                      :class="isSelected(lomba.id) ? 'text-amber-300' : 'text-stone-200'"
                                      x-text="parseFloat(lomba.biaya_pendaftaran) > 0 ? ('Rp ' + new Intl.NumberFormat('id-ID').format(lomba.biaya_pendaftaran)) : 'Gratis'"></span>
                            </div>

                            <!-- Hidden Checkbox Input for Form Submission -->
                            <input type="checkbox" 
                                   name="lomba_ids[]" 
                                   :value="lomba.id" 
                                   :checked="isSelected(lomba.id)" 
                                   class="sr-only">
                        </div>
                    </template>
                </div>

                <!-- Ringkasan Biaya Sticky / Highlight -->
                <div class="mt-6 p-4 rounded-2xl bg-gradient-to-r from-amber-950/60 via-[#180306] to-black border border-amber-500/30 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-xs">
                    <div class="flex items-center gap-2">
                        <i class="ti ti-receipt text-amber-400 text-lg"></i>
                        <span>Total Biaya Pendaftaran:</span>
                    </div>
                    <div class="text-right">
                        <span class="text-base sm:text-xl font-bold font-mono text-amber-300" x-text="formatRupiah(totalBiaya)"></span>
                        <span class="text-[10px] text-stone-400 block" x-show="selectedLombaIds.length > 0">Untuk <span x-text="selectedLombaIds.length"></span> cabang lomba</span>
                    </div>
                </div>

            </div>

            <!-- STEP 3: IDENTITAS PESERTA -->
            <div class="p-6 sm:p-8 rounded-3xl glass-panel shadow-2xl relative overflow-hidden"
                 x-show="selectedJenjang"
                 x-transition.opacity>
                
                <div class="flex items-center gap-3 pb-4 mb-5 border-b border-white/10">
                    <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-300 flex items-center justify-center font-bold text-sm">
                        3
                    </div>
                    <div>
                        <h3 class="font-bold text-base sm:text-lg text-white">Data Diri & Asal Lembaga</h3>
                        <p class="text-[11px] text-stone-400">Pastikan nomor WhatsApp aktif untuk verifikasi dan informasi teknis perlombaan</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    
                    <!-- Nama Lengkap -->
                    <div class="space-y-1.5 sm:col-span-2">
                        <label class="font-semibold text-stone-200">
                            Nama Lengkap Peserta / Nama Tim <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="nama_lengkap" 
                               value="{{ old('nama_lengkap') }}" 
                               required 
                               placeholder="Masukkan nama lengkap peserta atau grup" 
                               class="w-full py-2.5 px-3.5 rounded-xl bg-[#1a0206]/80 border border-amber-500/20 text-white placeholder-stone-500 focus:border-amber-400 focus:ring-1 focus:ring-amber-400 outline-none transition text-xs">
                    </div>

                    <!-- Asal Sekolah -->
                    <div class="space-y-1.5 sm:col-span-2">
                        <label class="font-semibold text-stone-200">
                            Asal Sekolah / Pondok Pesantren <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="asal_sekolah" 
                               value="{{ old('asal_sekolah') }}" 
                               required 
                               placeholder="Nama SD/MI/SMP/MTs/Pesantren asal" 
                               class="w-full py-2.5 px-3.5 rounded-xl bg-[#1a0206]/80 border border-amber-500/20 text-white placeholder-stone-500 focus:border-amber-400 focus:ring-1 focus:ring-amber-400 outline-none transition text-xs">
                    </div>

                    <!-- No WhatsApp (Full Width) -->
                    <div class="space-y-1.5 sm:col-span-2">
                        <label class="font-semibold text-stone-200">
                            Nomor WhatsApp Aktif <span class="text-rose-500">*</span>
                        </label>
                        <input type="tel" 
                               name="no_hp" 
                               value="{{ old('no_hp') }}" 
                               required 
                               placeholder="Contoh: 081234567890" 
                               class="w-full py-2.5 px-3.5 rounded-xl bg-[#1a0206]/80 border border-amber-500/20 text-white placeholder-stone-500 focus:border-amber-400 focus:ring-1 focus:ring-amber-400 outline-none transition text-xs">
                    </div>

                    <!-- Password Akun Peserta -->
                    <div class="space-y-1.5" x-data="{ showPass: false }">
                        <label class="font-semibold text-stone-200 flex items-center justify-between">
                            <span>Password Akun <span class="text-rose-500">*</span></span>
                            <span class="text-[10px] text-amber-400/80 font-normal">Min. 6 Karakter</span>
                        </label>
                        <div class="relative">
                            <input :type="showPass ? 'text' : 'password'" 
                                   name="password" 
                                   required 
                                   placeholder="Buat password login Anda" 
                                   class="w-full py-2.5 pl-3.5 pr-10 rounded-xl bg-[#1a0206]/80 border border-amber-500/20 text-white placeholder-stone-500 focus:border-amber-400 focus:ring-1 focus:ring-amber-400 outline-none transition text-xs">
                            <button type="button" 
                                    @click="showPass = !showPass" 
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 hover:text-amber-300 transition">
                                <i class="ti text-sm" :class="showPass ? 'ti-eye-off' : 'ti-eye'"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="space-y-1.5" x-data="{ showConfirm: false }">
                        <label class="font-semibold text-stone-200">
                            Konfirmasi Password <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <input :type="showConfirm ? 'text' : 'password'" 
                                   name="password_confirmation" 
                                   required 
                                   placeholder="Ulangi password di atas" 
                                   class="w-full py-2.5 pl-3.5 pr-10 rounded-xl bg-[#1a0206]/80 border border-amber-500/20 text-white placeholder-stone-500 focus:border-amber-400 focus:ring-1 focus:ring-amber-400 outline-none transition text-xs">
                            <button type="button" 
                                    @click="showConfirm = !showConfirm" 
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 hover:text-amber-300 transition">
                                <i class="ti text-sm" :class="showConfirm ? 'ti-eye-off' : 'ti-eye'"></i>
                            </button>
                        </div>
                    </div>



                    <!-- Alamat Rumah / Domisili -->
                    <div class="space-y-1.5 sm:col-span-2">
                        <label class="font-semibold text-stone-200">
                            Alamat Domisili / Rumah (Opsional)
                        </label>
                        <textarea name="alamat_rumah" 
                                  rows="2" 
                                  placeholder="Alamat domisili peserta..." 
                                  class="w-full py-2.5 px-3.5 rounded-xl bg-[#1a0206]/80 border border-amber-500/20 text-white placeholder-stone-500 focus:border-amber-400 focus:ring-1 focus:ring-amber-400 outline-none transition text-xs">{{ old('alamat_rumah') }}</textarea>
                    </div>

                    <!-- Upload Bukti Pembayaran (Opsional) -->
                    <div class="space-y-2 sm:col-span-2 pt-3 border-t border-white/10" x-data="{ fileName: '' }">
                        <div class="flex items-center justify-between">
                            <label class="font-semibold text-stone-200 flex items-center gap-1.5">
                                <i class="ti ti-receipt text-amber-400 text-sm"></i>
                                <span>Bukti Transfer / Pembayaran Pendaftaran</span>
                                <span class="text-stone-400 font-normal text-[11px]">(Opsional)</span>
                            </label>
                            <span class="text-[10px] text-amber-400/80">JPG, PNG, JPEG, PDF maks 5MB</span>
                        </div>
                        <div class="relative border-2 border-dashed border-amber-500/30 hover:border-amber-400/60 rounded-2xl p-4 bg-black/40 hover:bg-black/60 transition text-center group cursor-pointer">
                            <input type="file" 
                                   name="bukti_pembayaran" 
                                   accept="image/*,.pdf" 
                                   @change="fileName = $event.target.files.length ? $event.target.files[0].name : ''"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="flex flex-col items-center justify-center gap-1.5 pointer-events-none">
                                <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-300 flex items-center justify-center text-lg group-hover:scale-110 transition">
                                    <i class="ti ti-upload" x-show="!fileName"></i>
                                    <i class="ti ti-file-check text-emerald-400" x-show="fileName" style="display: none;"></i>
                                </div>
                                <div class="text-xs text-stone-300">
                                    <span x-show="!fileName">Pilih atau seret file struk / transfer pembayaran ke sini</span>
                                    <span x-show="fileName" class="text-amber-300 font-semibold" style="display: none;" x-text="fileName"></span>
                                </div>
                                <p class="text-[10px] text-stone-500" x-show="!fileName">Bisa diunggah sekarang atau menyusul melalui konfirmasi WhatsApp</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- VALIDATION NOTIFICATION BANNER (Jika belum pilih jenjang / lomba) -->
            <div x-show="validationError" 
                 x-transition 
                 class="p-4 rounded-2xl bg-rose-950/90 border border-rose-500/60 text-rose-200 text-xs sm:text-sm flex items-center justify-between gap-3 shadow-2xl">
                <div class="flex items-center gap-2.5">
                    <i class="ti ti-alert-circle text-rose-400 text-lg flex-shrink-0"></i>
                    <span x-text="validationError" class="font-medium"></span>
                </div>
                <button type="button" @click="validationError = ''" class="text-stone-400 hover:text-white p-1">
                    <i class="ti ti-x text-base"></i>
                </button>
            </div>

            <!-- SUBMIT BUTTON & DISCLAIMER -->
            <div class="p-6 rounded-3xl bg-[#2b040c] border border-amber-500/30 shadow-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-xs text-stone-300 max-w-lg">
                    Dengan menekan tombol pendaftaran, data akan disimpan ke sistem dan Anda akan menerima nomor registrasi resmi beserta petunjuk selanjutnya.
                </div>

                <div class="flex flex-col items-center sm:items-end gap-1.5 w-full sm:w-auto">
                    <button type="button" 
                            @click="submitForm($event)"
                            class="btn-luxury-gold px-8 py-3.5 rounded-2xl text-xs sm:text-sm uppercase tracking-wider flex items-center justify-center gap-2 cursor-pointer shadow-xl w-full sm:w-auto active:scale-95 transition-all">
                        <i class="ti ti-check text-base"></i>
                        <span>Kirim Pendaftaran</span>
                    </button>
                    <!-- Hint info jika belum lengkap -->
                    <span x-show="!selectedJenjang || selectedLombaIds.length === 0" 
                          class="text-[11px] text-amber-300/80 italic text-center sm:text-right">
                        * Pilih jenjang & cabang lomba terlebih dahulu
                    </span>
                    <div class="text-[11px] text-stone-400 mt-1">
                        Sudah punya akun? <a href="{{ route('agt.login.direct') }}" class="text-amber-300 hover:underline font-semibold">Masuk / Login di sini</a>
                    </div>
                </div>
            </div>

        </form>

    </main>

    <!-- Footer -->
    <footer class="relative z-10 border-t border-white/10 py-6 text-center text-xs text-stone-500">
        <p>&copy; {{ date('Y') }} Al Amin Got Talent (AGT). Pesantren Persatuan Islam 80 Sindangkasih.</p>
    </footer>

</body>
</html>
