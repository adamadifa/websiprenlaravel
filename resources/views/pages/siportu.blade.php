@extends('layouts.frontend')

@section('title', 'SiportuApp - Portal Digital Wali Santri ' . ($pengaturan->nama_sekolah ?? 'Pesantren Al Amin'))
@section('meta_description', 'SiportuApp adalah aplikasi portal digital resmi untuk orang tua dan wali santri ' . ($pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin') . ' untuk memantau presensi, tagihan, tabungan digital, dan perkembangan santri.')

@section('content')
<!-- Hero Section -->
<section class="relative pt-28 sm:pt-32 pb-16 sm:pb-24 bg-[#062d27] text-white border-b border-emerald-900/60 overflow-hidden">
    <!-- Ambient Background Overlay -->
    @if($pengaturan && !empty($pengaturan->background_login))
        <div class="absolute inset-0 z-0 pointer-events-none opacity-15">
            <img 
                src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                alt="Pesantren Al Amin" 
                class="w-full h-full object-cover grayscale mix-blend-luminosity scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#062d27] via-[#062d27]/90 to-[#062d27]/70"></div>
        </div>
    @endif

    <!-- Ambient Glow Circles -->
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-[#bef264]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -left-40 w-96 h-96 bg-emerald-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        
        <!-- Top Bar: Navigation & Breadcrumbs -->
        <div class="flex flex-wrap items-center justify-between gap-3 mb-8 pb-3 border-b border-emerald-800/40" data-aos="fade-down">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#bef264] animate-pulse"></span>
                <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-emerald-300 font-poppins">
                    Sistem Informasi & Portal Orang Tua PPI 80
                </span>
            </div>

            <nav class="flex items-center gap-2 text-emerald-300/70 text-[11px] sm:text-xs font-bold uppercase tracking-wider font-poppins">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <i class="ti ti-chevron-right text-[9px] text-emerald-400/60"></i>
                <span class="text-[#bef264]">SiportuApp</span>
            </nav>
        </div>

        <!-- Main Hero Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Hero Content (lg:col-span-7) -->
            <div class="lg:col-span-7 space-y-6" data-aos="fade-right">
                
                <div class="inline-flex items-center gap-2 bg-emerald-800/60 border border-emerald-600/40 text-emerald-200 px-4 py-1.5 rounded-full text-xs font-bold font-poppins">
                    <i class="ti ti-device-mobile text-sm text-[#bef264]"></i>
                    <span>Inovasi Digital Layanan Pesantren</span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-poppins text-white tracking-tight leading-[1.2]">
                    Pantau Tumbuh Kembang & Keuangan Santri <span class="text-[#bef264]">Dalam Satu Genggaman</span>
                </h1>

                <p class="text-emerald-100/85 text-sm sm:text-base lg:text-lg leading-relaxed font-normal max-w-2xl">
                    <strong class="text-white font-semibold">SiportuApp</strong> menghubungkan orang tua/wali dengan kehidupan santri di pesantren secara <em>real-time</em>. Dari monitoring kehadiran kelas, cek tagihan syahriyah, kontrol tabungan saku digital, hingga laporan nilai dan capaian hafalan Al-Qur'an.
                </p>

                <!-- Value Highlights Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2">
                    <div class="p-3 rounded-2xl bg-emerald-900/40 border border-emerald-800/60">
                        <div class="flex items-center gap-2 text-[#bef264] font-bold text-xs mb-1">
                            <i class="ti ti-bolt text-base"></i>
                            <span>Real-Time Sync</span>
                        </div>
                        <p class="text-[11px] text-emerald-200/70">Notifikasi presensi & pembayaran instan</p>
                    </div>

                    <div class="p-3 rounded-2xl bg-emerald-900/40 border border-emerald-800/60">
                        <div class="flex items-center gap-2 text-[#bef264] font-bold text-xs mb-1">
                            <i class="ti ti-wallet text-base"></i>
                            <span>Cashless Pocket</span>
                        </div>
                        <p class="text-[11px] text-emerald-200/70">Tabungan santri aman & terkontrol</p>
                    </div>

                    <div class="col-span-2 sm:col-span-1 p-3 rounded-2xl bg-emerald-900/40 border border-emerald-800/60">
                        <div class="flex items-center gap-2 text-[#bef264] font-bold text-xs mb-1">
                            <i class="ti ti-shield-check text-base"></i>
                            <span>Transparan</span>
                        </div>
                        <p class="text-[11px] text-emerald-200/70">Kwitansi digital & mutasi otomatis</p>
                    </div>
                </div>

                <!-- Action CTAs -->
                <div class="flex flex-wrap items-center gap-4 pt-4">
                    <a 
                        href="/login" 
                        class="inline-flex items-center justify-center gap-2 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black text-sm px-7 py-3.5 rounded-2xl shadow-lg shadow-lime-500/20 hover:shadow-lime-500/30 transition-all font-poppins"
                    >
                        <i class="ti ti-login text-lg"></i>
                        <span>Akses Portal Siportu</span>
                    </a>

                    <a 
                        href="https://wa.me/{{ $pengaturan->telepon ?? '' }}?text=Halo%20Admin,%20saya%20ingin%20bertanya%20seputar%20akses%20SiportuApp%20Wali%20Santri" 
                        target="_blank"
                        class="inline-flex items-center justify-center gap-2 bg-emerald-800/50 hover:bg-emerald-700/60 text-white font-bold text-sm px-6 py-3.5 rounded-2xl border border-emerald-600/40 transition-all font-poppins"
                    >
                        <i class="ti ti-brand-whatsapp text-lg text-[#bef264]"></i>
                        <span>Bantuan Wali Santri</span>
                    </a>
                </div>

            </div>

            <!-- Right Hero Image Display (lg:col-span-5) -->
            <div class="lg:col-span-5 flex justify-center lg:justify-end relative" data-aos="fade-left" data-aos-delay="150">
                
                <!-- Ambient Backdrop Glow behind Phone -->
                <div class="absolute inset-0 bg-gradient-to-tr from-[#bef264]/20 to-emerald-500/20 rounded-full blur-3xl scale-95 pointer-events-none"></div>

                <!-- Phone Mockup Container -->
                <div class="relative z-10 max-w-[320px] sm:max-w-[360px] drop-shadow-2xl transition-transform duration-500 hover:scale-[1.02]">
                    <img 
                        src="{{ asset('images/siportu-mockup.png') }}" 
                        alt="SiportuApp Tampilan Antarmuka Aplikasi Wali Santri" 
                        class="w-full h-auto object-contain rounded-[44px]"
                    >

                    <!-- Floating Badge: Presensi -->
                    <div class="hidden sm:flex absolute -left-8 top-28 bg-[#062d27]/95 backdrop-blur-md border border-emerald-600/40 p-3 rounded-2xl shadow-2xl items-center gap-3 animate-bounce duration-1000" style="animation-duration: 4s;">
                        <div class="w-9 h-9 rounded-xl bg-blue-500/20 text-blue-400 flex items-center justify-center">
                            <i class="ti ti-calendar-check text-xl"></i>
                        </div>
                        <div>
                            <div class="text-[10px] text-emerald-300/80 font-medium">Presensi Santri</div>
                            <div class="text-xs font-bold text-white font-poppins">Hadir Kelas Tepat Waktu</div>
                        </div>
                    </div>

                    <!-- Floating Badge: Tagihan Lunas -->
                    <div class="hidden sm:flex absolute -right-6 bottom-32 bg-[#062d27]/95 backdrop-blur-md border border-emerald-600/40 p-3 rounded-2xl shadow-2xl items-center gap-3 animate-bounce duration-1000" style="animation-duration: 5s;">
                        <div class="w-9 h-9 rounded-xl bg-emerald-500/20 text-[#bef264] flex items-center justify-center">
                            <i class="ti ti-circle-check text-xl"></i>
                        </div>
                        <div>
                            <div class="text-[10px] text-emerald-300/80 font-medium">Syahriyah Terverifikasi</div>
                            <div class="text-xs font-bold text-white font-poppins">Kwitansi Digital Siap</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- 8 Fitur Layanan Utama Section -->
<section class="py-16 sm:py-24 bg-[#faf9f6] text-slate-800 relative">
    <div class="container mx-auto px-6 lg:px-12">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 bg-[#062d27] text-[#bef264] px-4 py-1.5 rounded-full text-xs font-bold mb-3 font-poppins shadow-xs">
                <i class="ti ti-apps text-sm"></i>
                <span>Fitur & Fasilitas Lengkap</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black font-poppins text-[#062d27] leading-tight mb-4">
                8 Layanan Utama Dalam SiportuApp
            </h2>
            <p class="text-stone-600 text-sm sm:text-base leading-relaxed">
                Dirancang khusus untuk memberikan kemudahan, transparansi, dan kecepatan akses bagi orang tua santri {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}.
            </p>
        </div>

        <!-- 8 Services Grid (Exact Match to the App Mockup Icons) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- 1. Tagihan -->
            <div class="bg-white p-6 rounded-3xl border border-stone-200/80 shadow-xs hover:shadow-md hover:border-emerald-500/40 transition-all group" data-aos="fade-up" data-aos-delay="50">
                <div class="w-14 h-14 rounded-2xl bg-teal-50 border border-teal-100 flex items-center justify-center text-teal-600 mb-5 group-hover:scale-110 group-hover:bg-teal-600 group-hover:text-white transition-all">
                    <i class="ti ti-credit-card text-2xl"></i>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-extrabold text-[#062d27] font-poppins">Tagihan & SPP</h3>
                    <span class="text-[10px] font-bold text-teal-700 bg-teal-100/70 px-2 py-0.5 rounded-full">Aktif</span>
                </div>
                <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                    Rincian tagihan syahriyah bulanan, DSP, uang asrama, riwayat pembayaran, serta konfirmasi transfer dengan kwitansi digital otomatis.
                </p>
            </div>

            <!-- 2. Presensi -->
            <div class="bg-white p-6 rounded-3xl border border-stone-200/80 shadow-xs hover:shadow-md hover:border-blue-500/40 transition-all group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600 mb-5 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all">
                    <i class="ti ti-calendar-check text-2xl"></i>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-extrabold text-[#062d27] font-poppins">Presensi Santri</h3>
                    <span class="text-[10px] font-bold text-blue-700 bg-blue-100/70 px-2 py-0.5 rounded-full">Realtime</span>
                </div>
                <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                    Pemantauan absensi harian santri saat jam madrasah, shalat berjamaah 5 waktu, dan kegiatan halaqah tahfizh Al-Qur'an.
                </p>
            </div>

            <!-- 3. Tabungan Digital -->
            <div class="bg-white p-6 rounded-3xl border border-stone-200/80 shadow-xs hover:shadow-md hover:border-amber-500/40 transition-all group" data-aos="fade-up" data-aos-delay="150">
                <div class="w-14 h-14 rounded-2xl bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600 mb-5 group-hover:scale-110 group-hover:bg-amber-600 group-hover:text-white transition-all">
                    <i class="ti ti-wallet text-2xl"></i>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-extrabold text-[#062d27] font-poppins">Tabungan Santri</h3>
                    <span class="text-[10px] font-bold text-amber-700 bg-amber-100/70 px-2 py-0.5 rounded-full">Cashless</span>
                </div>
                <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                    Manajemen uang saku santri secara digital. Orang tua dapat membatasi kuota jajan santri di kantin pesantren tanpa risiko hilang tunai.
                </p>
            </div>

            <!-- 4. Raport Santri -->
            <div class="bg-white p-6 rounded-3xl border border-stone-200/80 shadow-xs hover:shadow-md hover:border-indigo-500/40 transition-all group" data-aos="fade-up" data-aos-delay="200">
                <div class="w-14 h-14 rounded-2xl bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-600 mb-5 group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                    <i class="ti ti-book-2 text-2xl"></i>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-extrabold text-[#062d27] font-poppins">E-Raport Digital</h3>
                    <span class="text-[10px] font-bold text-indigo-700 bg-indigo-100/70 px-2 py-0.5 rounded-full">Soon</span>
                </div>
                <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                    Rekapitulasi nilai evaluasi belajar semester santri, pencapaian kurikulum kepesantrenan (Diniyah) serta riwayat hafalan Al-Qur'an.
                </p>
            </div>

            <!-- 5. Laporan Karakter -->
            <div class="bg-white p-6 rounded-3xl border border-stone-200/80 shadow-xs hover:shadow-md hover:border-rose-500/40 transition-all group" data-aos="fade-up" data-aos-delay="250">
                <div class="w-14 h-14 rounded-2xl bg-rose-50 border border-rose-100 flex items-center justify-center text-rose-600 mb-5 group-hover:scale-110 group-hover:bg-rose-600 group-hover:text-white transition-all">
                    <i class="ti ti-report-analytics text-2xl"></i>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-extrabold text-[#062d27] font-poppins">Laporan Karakter</h3>
                    <span class="text-[10px] font-bold text-rose-700 bg-rose-100/70 px-2 py-0.5 rounded-full">Soon</span>
                </div>
                <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                    Catatan mutaba'ah ibadah yaumiyah, perkembangan adab dan akhlak santri di asrama hasil bimbingan para asatidz dan musyrif.
                </p>
            </div>

            <!-- 6. Berita & Pengumuman -->
            <div class="bg-white p-6 rounded-3xl border border-stone-200/80 shadow-xs hover:shadow-md hover:border-emerald-500/40 transition-all group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-14 h-14 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 mb-5 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                    <i class="ti ti-news text-2xl"></i>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-extrabold text-[#062d27] font-poppins">Warta & Informasi</h3>
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-100/70 px-2 py-0.5 rounded-full">Aktif</span>
                </div>
                <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                    Surat edaran resmi pesantren, kalender akademik, jadwal perizinan kepulangan santri, dan galeri agenda kegiatan terbaru.
                </p>
            </div>

            <!-- 7. Pelanggaran & Disiplin -->
            <div class="bg-white p-6 rounded-3xl border border-stone-200/80 shadow-xs hover:shadow-md hover:border-orange-500/40 transition-all group" data-aos="fade-up" data-aos-delay="350">
                <div class="w-14 h-14 rounded-2xl bg-orange-50 border border-orange-100 flex items-center justify-center text-orange-600 mb-5 group-hover:scale-110 group-hover:bg-orange-600 group-hover:text-white transition-all">
                    <i class="ti ti-alert-triangle text-2xl"></i>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-extrabold text-[#062d27] font-poppins">Bimbingan & Disiplin</h3>
                    <span class="text-[10px] font-bold text-orange-700 bg-orange-100/70 px-2 py-0.5 rounded-full">Soon</span>
                </div>
                <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                    Transparansi catatan tata tertib dan konseling pembinaan akhlak agar wali santri dan pihak pesantren dapat berkolaborasi solutif.
                </p>
            </div>

            <!-- 8. Prestasi Santri -->
            <div class="bg-white p-6 rounded-3xl border border-stone-200/80 shadow-xs hover:shadow-md hover:border-purple-500/40 transition-all group" data-aos="fade-up" data-aos-delay="400">
                <div class="w-14 h-14 rounded-2xl bg-purple-50 border border-purple-100 flex items-center justify-center text-purple-600 mb-5 group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all">
                    <i class="ti ti-trophy text-2xl"></i>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-extrabold text-[#062d27] font-poppins">Prestasi Santri</h3>
                    <span class="text-[10px] font-bold text-purple-700 bg-purple-100/70 px-2 py-0.5 rounded-full">Soon</span>
                </div>
                <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                    Rekam jejak dan piagam penghargaan santri dalam musabaqah tahfizh, pidato 3 bahasa, olimpiade sains, dan kejuaraan olahraga.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- Keunggulan & Mengapa SiportuApp Section -->
<section class="py-16 sm:py-20 bg-white border-y border-stone-200/80">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Info Area (lg:col-span-6) -->
            <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
                <div class="inline-flex items-center gap-2 bg-[#bef264]/20 border border-[#bef264]/40 text-[#062d27] px-3.5 py-1.5 rounded-full text-xs font-bold font-poppins">
                    <i class="ti ti-sparkles text-sm text-[#062d27]"></i>
                    <span>Sinergi Pesantren & Orang Tua</span>
                </div>

                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black font-poppins text-[#062d27] leading-tight">
                    Mendampingi Ananda Menjadi Generasi Rabbani dengan Ketenangan Hati
                </h2>

                <p class="text-stone-600 text-sm sm:text-base leading-relaxed">
                    Menitipkan buah hati di pondok pesantren bukan berarti kehilangan kendali atas kesehariannya. SiportuApp hadir sebagai jembatan silaturahmi digital yang menghubungkan wali santri dengan seluruh ekosistem Pesantren Al Amin secara transparan.
                </p>

                <!-- Benefits List -->
                <div class="space-y-4 pt-2">
                    <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-stone-50 border border-stone-200/60">
                        <div class="w-8 h-8 rounded-xl bg-[#062d27] text-[#bef264] flex-shrink-0 flex items-center justify-center font-bold text-sm">
                            <i class="ti ti-check"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#062d27] font-poppins">Bebas Was-was</h4>
                            <p class="text-stone-500 text-xs leading-relaxed">Pantau kehadiran santri di kelas dan halaqah subuh/maghrib setiap saat.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-stone-50 border border-stone-200/60">
                        <div class="w-8 h-8 rounded-xl bg-[#062d27] text-[#bef264] flex-shrink-0 flex items-center justify-center font-bold text-sm">
                            <i class="ti ti-check"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#062d27] font-poppins">Keuangan Transparan & Tanpa Antre</h4>
                            <p class="text-stone-500 text-xs leading-relaxed">Bayar syahriyah via transfer bank tanpa harus konfirmasi manual yang memakan waktu.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-stone-50 border border-stone-200/60">
                        <div class="w-8 h-8 rounded-xl bg-[#062d27] text-[#bef264] flex-shrink-0 flex items-center justify-center font-bold text-sm">
                            <i class="ti ti-check"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#062d27] font-poppins">Pendidikan Karakter Terukur</h4>
                            <p class="text-stone-500 text-xs leading-relaxed">Dapatkan evaluasi hafalan dan mutaba'ah ibadah secara berkala dari pembimbing.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right 3-Step Guide (lg:col-span-6) -->
            <div class="lg:col-span-6 bg-[#062d27] text-white p-8 sm:p-10 rounded-3xl border border-emerald-800/60 shadow-xl relative overflow-hidden" data-aos="fade-left">
                <!-- Ambient Deco -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-[#bef264]/10 rounded-full blur-2xl pointer-events-none"></div>

                <div class="relative z-10">
                    <div class="flex items-center justify-between pb-4 mb-6 border-b border-emerald-800/60 font-poppins">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#bef264]"></span>
                            <span class="text-xs font-bold uppercase tracking-widest text-[#bef264]">Panduan Penggunaan</span>
                        </div>
                        <span class="text-emerald-300/70 text-xs font-medium">3 Langkah Mudah</span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-black text-white font-poppins mb-6">
                        Cara Mulai Menggunakan SiportuApp
                    </h3>

                    <div class="space-y-6">
                        
                        <!-- Step 1 -->
                        <div class="flex gap-4 items-start">
                            <div class="w-9 h-9 rounded-xl bg-[#bef264] text-[#062d27] flex-shrink-0 flex items-center justify-center font-black font-poppins text-sm shadow-md">
                                1
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white font-poppins mb-1">Siapkan NIS & Nomor Terdaftar</h4>
                                <p class="text-xs text-emerald-100/70 leading-relaxed font-sans">
                                    Gunakan Nomor Induk Santri (NIS) ananda dan nomor WhatsApp wali yang telah terdaftar resmi di sistem data santri pesantren.
                                </p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex gap-4 items-start">
                            <div class="w-9 h-9 rounded-xl bg-emerald-700 text-white flex-shrink-0 flex items-center justify-center font-black font-poppins text-sm border border-emerald-500/40 shadow-md">
                                2
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white font-poppins mb-1">Masuk Melalui Portal / Aplikasi</h4>
                                <p class="text-xs text-emerald-100/70 leading-relaxed font-sans">
                                    Buka link portal SiportuApp pada browser ponsel Anda atau instal aplikasi resmi yang dibagikan panitia pengelola IT.
                                </p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex gap-4 items-start">
                            <div class="w-9 h-9 rounded-xl bg-emerald-700 text-white flex-shrink-0 flex items-center justify-center font-black font-poppins text-sm border border-emerald-500/40 shadow-md">
                                3
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white font-poppins mb-1">Mulai Pantau & Bayar Syahriyah</h4>
                                <p class="text-xs text-emerald-100/70 leading-relaxed font-sans">
                                    Nikmati kemudahan cek presensi harian, transaksi tabungan digital anak, dan informasi tagihan tanpa batas waktu.
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- Bottom Quick Support Button -->
                    <div class="mt-8 pt-6 border-t border-emerald-800/60 flex flex-wrap items-center justify-between gap-4">
                        <div class="text-xs text-emerald-200/80">
                            Kendala saat login atau nomor belum terdaftar?
                        </div>
                        <a 
                            href="https://wa.me/{{ $pengaturan->telepon ?? '' }}?text=Halo%20Admin,%20saya%20memerlukan%20bantuan%20aktivasi%20akun%20SiportuApp" 
                            target="_blank"
                            class="inline-flex items-center gap-1.5 text-xs font-bold text-[#bef264] hover:underline font-poppins"
                        >
                            <span>Hubungi TU / Helpdesk</span>
                            <i class="ti ti-arrow-right text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Call to Action Banner Section -->
<section class="py-14 sm:py-20 bg-[#faf9f6]">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="bg-gradient-to-r from-[#062d27] via-[#09352e] to-[#062d27] rounded-3xl p-8 sm:p-14 border border-emerald-800/60 shadow-xl text-white relative overflow-hidden text-center max-w-5xl mx-auto" data-aos="zoom-in">
            
            <div class="relative z-10 max-w-2xl mx-auto space-y-5">
                <div class="inline-flex items-center gap-2 bg-[#bef264]/20 border border-[#bef264]/40 text-[#bef264] px-4 py-1.5 rounded-full text-xs font-bold font-poppins">
                    <i class="ti ti-device-mobile-check text-sm"></i>
                    <span>Portal Resmi Wali Santri PPI 80</span>
                </div>

                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black font-poppins text-white leading-tight">
                    Sudah Memiliki Akun Wali Santri?
                </h2>

                <p class="text-emerald-100/85 text-xs sm:text-sm lg:text-base leading-relaxed font-normal">
                    Masuk sekarang untuk mengakses informasi tagihan, mutasi tabungan saku santri, dan rekapitulasi kehadiran ananda secara langsung.
                </p>

                <div class="flex flex-wrap items-center justify-center gap-4 pt-3">
                    <a 
                        href="/login" 
                        class="inline-flex items-center justify-center gap-2 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black text-sm px-8 py-3.5 rounded-2xl shadow-lg shadow-lime-500/20 transition-all font-poppins"
                    >
                        <i class="ti ti-login text-lg"></i>
                        <span>Masuk ke Siportu</span>
                    </a>

                    <a 
                        href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" 
                        target="_blank"
                        class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white font-bold text-sm px-7 py-3.5 rounded-2xl border border-white/20 transition-all font-poppins"
                    >
                        <i class="ti ti-brand-whatsapp text-lg text-[#bef264]"></i>
                        <span>Tanya Admin Helpdesk</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
