@extends('layouts.mobile')

@section('title', 'SiportuApp - Portal Digital Wali Santri ' . ($pengaturan->nama_sekolah ?? 'Al Amin'))
@section('meta_description', 'Aplikasi portal digital wali santri untuk memantau presensi, tagihan syahriyah, tabungan digital, dan perkembangan santri di Pesantren Al Amin.')

@section('content')
<!-- Mobile Masthead -->
<div class="bg-[#062d27] pt-8 pb-10 px-6 relative overflow-hidden text-white font-poppins border-b border-emerald-900/60">
    <!-- Ambient Glow -->
    <div class="absolute -top-20 -right-20 w-48 h-48 bg-[#bef264]/15 rounded-full blur-2xl pointer-events-none"></div>

    <div class="relative z-10" data-aos="fade-down">
        <div class="flex items-center gap-2 text-[10px] text-[#bef264] font-bold uppercase tracking-widest mb-2.5">
            <span>Portal Digital Wali Santri</span>
            <span class="text-white/30">•</span>
            <span>PPI 80</span>
        </div>
        <h1 class="text-2xl font-black text-white leading-tight mb-2.5 tracking-tight font-poppins">
            Siportu<span class="text-[#bef264]">App</span>
        </h1>
        <p class="text-xs text-emerald-100/80 font-normal leading-relaxed font-sans">
            Sistem Informasi & Portal Terpadu untuk memantau kehadiran, tagihan syahriyah, tabungan saku, dan perkembangan santri secara langsung.
        </p>
    </div>
</div>

<div class="px-5 pt-6 pb-24 bg-[#faf9f6] min-h-screen space-y-7">

    <!-- 1. Interactive Mockup Feature Display Card -->
    <div class="bg-[#062d27] p-6 rounded-3xl border border-emerald-800/80 shadow-lg text-white relative overflow-hidden" data-aos="fade-up">
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-[#bef264]/10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10">
            <div class="flex items-center justify-between pb-3 mb-4 border-b border-emerald-800/60 text-[10px] font-poppins">
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#bef264] animate-pulse"></span>
                    <span class="font-extrabold uppercase tracking-widest text-[#bef264]">Live Mobile App</span>
                </div>
                <span class="text-emerald-300/70 font-bold uppercase text-[9px]">Versi 2.0</span>
            </div>

            <!-- Image Mockup Display -->
            <div class="flex justify-center my-4">
                <div class="w-full max-w-[240px] drop-shadow-2xl rounded-3xl overflow-hidden border-2 border-emerald-600/30">
                    <img 
                        src="{{ asset('images/siportu-mockup.png') }}" 
                        alt="SiportuApp Mobile Mockup" 
                        class="w-full h-auto object-contain"
                    >
                </div>
            </div>

            <div class="text-center pt-2">
                <h3 class="text-sm font-black text-white font-poppins mb-1">Kemudahan Akses Kapan Saja</h3>
                <p class="text-[11px] text-emerald-100/75 leading-relaxed font-sans mb-4">
                    Seluruh informasi penting tentang buah hati Anda kini dapat diakses dalam genggaman secara cepat, akurat, dan transparan.
                </p>

                <div class="flex gap-2">
                    <a 
                        href="/login" 
                        class="flex-1 inline-flex items-center justify-center gap-1.5 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black text-xs py-2.5 rounded-xl shadow-md transition-all font-poppins"
                    >
                        <i class="ti ti-login text-sm"></i>
                        <span>Akses Portal</span>
                    </a>
                    <a 
                        href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" 
                        target="_blank"
                        class="inline-flex items-center justify-center gap-1 bg-white/10 text-white font-bold text-xs px-3 py-2.5 rounded-xl border border-white/15 font-poppins"
                    >
                        <i class="ti ti-brand-whatsapp text-sm text-[#bef264]"></i>
                        <span>WA TU</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. 8 Layanan Utama Grid -->
    <div class="space-y-3" data-aos="fade-up">
        <div class="flex items-center justify-between pb-1 font-poppins">
            <div>
                <span class="text-[9px] font-bold uppercase tracking-widest text-emerald-800 block">Fitur Aplikasi</span>
                <h2 class="text-base font-black text-[#062d27]">8 Layanan Utama SiportuApp</h2>
            </div>
            <span class="text-[10px] font-extrabold text-emerald-900 bg-[#bef264] px-2 py-0.5 rounded shadow-xs">
                Lengkap
            </span>
        </div>

        <div class="grid grid-cols-2 gap-3">
            
            <!-- 1. Tagihan -->
            <div class="bg-white p-4 rounded-2xl border border-stone-200/80 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center mb-2.5">
                        <i class="ti ti-credit-card text-xl"></i>
                    </div>
                    <h3 class="text-xs font-bold text-[#062d27] font-poppins mb-1">Tagihan & SPP</h3>
                    <p class="text-[11px] text-stone-500 leading-snug">Rincian syahriyah, asrama, & kwitansi digital.</p>
                </div>
                <div class="mt-2 pt-2 border-t border-stone-100 flex items-center justify-between">
                    <span class="text-[9px] font-bold text-teal-700 bg-teal-50 px-1.5 py-0.5 rounded">Aktif</span>
                </div>
            </div>

            <!-- 2. Presensi -->
            <div class="bg-white p-4 rounded-2xl border border-stone-200/80 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-2.5">
                        <i class="ti ti-calendar-check text-xl"></i>
                    </div>
                    <h3 class="text-xs font-bold text-[#062d27] font-poppins mb-1">Presensi Santri</h3>
                    <p class="text-[11px] text-stone-500 leading-snug">Absensi kelas, shalat jamaah & halaqah.</p>
                </div>
                <div class="mt-2 pt-2 border-t border-stone-100 flex items-center justify-between">
                    <span class="text-[9px] font-bold text-blue-700 bg-blue-50 px-1.5 py-0.5 rounded">Realtime</span>
                </div>
            </div>

            <!-- 3. Tabungan -->
            <div class="bg-white p-4 rounded-2xl border border-stone-200/80 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-2.5">
                        <i class="ti ti-wallet text-xl"></i>
                    </div>
                    <h3 class="text-xs font-bold text-[#062d27] font-poppins mb-1">Tabungan Santri</h3>
                    <p class="text-[11px] text-stone-500 leading-snug">Uang saku cashless & limit jajan aman.</p>
                </div>
                <div class="mt-2 pt-2 border-t border-stone-100 flex items-center justify-between">
                    <span class="text-[9px] font-bold text-amber-700 bg-amber-50 px-1.5 py-0.5 rounded">Cashless</span>
                </div>
            </div>

            <!-- 4. Raport -->
            <div class="bg-white p-4 rounded-2xl border border-stone-200/80 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-2.5">
                        <i class="ti ti-book-2 text-xl"></i>
                    </div>
                    <h3 class="text-xs font-bold text-[#062d27] font-poppins mb-1">E-Raport</h3>
                    <p class="text-[11px] text-stone-500 leading-snug">Capaian nilai diniyah & hafalan Al-Qur'an.</p>
                </div>
                <div class="mt-2 pt-2 border-t border-stone-100 flex items-center justify-between">
                    <span class="text-[9px] font-bold text-indigo-700 bg-indigo-50 px-1.5 py-0.5 rounded">Soon</span>
                </div>
            </div>

            <!-- 5. Laporan -->
            <div class="bg-white p-4 rounded-2xl border border-stone-200/80 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center mb-2.5">
                        <i class="ti ti-report-analytics text-xl"></i>
                    </div>
                    <h3 class="text-xs font-bold text-[#062d27] font-poppins mb-1">Laporan Ibadah</h3>
                    <p class="text-[11px] text-stone-500 leading-snug">Evaluasi mutaba'ah ibadah harian santri.</p>
                </div>
                <div class="mt-2 pt-2 border-t border-stone-100 flex items-center justify-between">
                    <span class="text-[9px] font-bold text-rose-700 bg-rose-50 px-1.5 py-0.5 rounded">Soon</span>
                </div>
            </div>

            <!-- 6. Berita -->
            <div class="bg-white p-4 rounded-2xl border border-stone-200/80 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-2.5">
                        <i class="ti ti-news text-xl"></i>
                    </div>
                    <h3 class="text-xs font-bold text-[#062d27] font-poppins mb-1">Warta & Libur</h3>
                    <p class="text-[11px] text-stone-500 leading-snug">Edaran resmi & jadwal perizinan santri.</p>
                </div>
                <div class="mt-2 pt-2 border-t border-stone-100 flex items-center justify-between">
                    <span class="text-[9px] font-bold text-emerald-700 bg-emerald-50 px-1.5 py-0.5 rounded">Aktif</span>
                </div>
            </div>

            <!-- 7. Pelanggaran -->
            <div class="bg-white p-4 rounded-2xl border border-stone-200/80 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center mb-2.5">
                        <i class="ti ti-alert-triangle text-xl"></i>
                    </div>
                    <h3 class="text-xs font-bold text-[#062d27] font-poppins mb-1">Kedisiplinan & BK</h3>
                    <p class="text-[11px] text-stone-500 leading-snug">Bimbingan konseling & catatan akhlak.</p>
                </div>
                <div class="mt-2 pt-2 border-t border-stone-100 flex items-center justify-between">
                    <span class="text-[9px] font-bold text-orange-700 bg-orange-50 px-1.5 py-0.5 rounded">Soon</span>
                </div>
            </div>

            <!-- 8. Prestasi -->
            <div class="bg-white p-4 rounded-2xl border border-stone-200/80 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-2.5">
                        <i class="ti ti-trophy text-xl"></i>
                    </div>
                    <h3 class="text-xs font-bold text-[#062d27] font-poppins mb-1">Prestasi Santri</h3>
                    <p class="text-[11px] text-stone-500 leading-snug">Arsip kejuaraan tahfizh, pidato, & sains.</p>
                </div>
                <div class="mt-2 pt-2 border-t border-stone-100 flex items-center justify-between">
                    <span class="text-[9px] font-bold text-purple-700 bg-purple-50 px-1.5 py-0.5 rounded">Soon</span>
                </div>
            </div>

        </div>
    </div>

    <!-- 3. Panduan 3 Langkah Singkat -->
    <div class="bg-white p-6 rounded-2xl border border-stone-200/80 shadow-xs" data-aos="fade-up">
        <div class="flex items-center justify-between pb-3 mb-4 border-b border-stone-100 font-poppins">
            <div>
                <span class="text-[9px] font-bold uppercase tracking-widest text-emerald-800 block">Panduan Cepat</span>
                <h2 class="text-base font-black text-[#062d27]">3 Langkah Aktivasi</h2>
            </div>
            <span class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center text-xs font-bold">
                <i class="ti ti-info-circle"></i>
            </span>
        </div>

        <div class="space-y-4">
            <div class="flex items-start gap-3">
                <div class="w-6 h-6 rounded-full bg-[#062d27] text-[#bef264] text-xs font-black flex items-center justify-center flex-shrink-0 font-poppins">
                    1
                </div>
                <div>
                    <h4 class="text-xs font-bold text-gray-900 font-poppins">Gunakan NIS & Nomor WA</h4>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Siapkan NIS ananda dan nomor telepon wali yang terdaftar resmi.</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <div class="w-6 h-6 rounded-full bg-[#062d27] text-[#bef264] text-xs font-black flex items-center justify-center flex-shrink-0 font-poppins">
                    2
                </div>
                <div>
                    <h4 class="text-xs font-bold text-gray-900 font-poppins">Buka Web Portal / Aplikasi</h4>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Masuk ke halaman login SiportuApp dan masukkan data login Anda.</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <div class="w-6 h-6 rounded-full bg-[#062d27] text-[#bef264] text-xs font-black flex items-center justify-center flex-shrink-0 font-poppins">
                    3
                </div>
                <div>
                    <h4 class="text-xs font-bold text-gray-900 font-poppins">Mulai Pantau & Bayar</h4>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Akses data presensi, keuangan syahriyah, dan tabungan santri kapan saja.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Support Contact Card -->
    <div class="bg-gradient-to-br from-[#062d27] to-[#09352e] p-6 rounded-2xl text-white border border-emerald-800 shadow-md text-center" data-aos="fade-up">
        <div class="w-10 h-10 rounded-xl bg-[#bef264] text-[#062d27] flex items-center justify-center mx-auto mb-3 font-bold">
            <i class="ti ti-headset text-xl"></i>
        </div>
        <h3 class="text-sm font-black font-poppins mb-1">Butuh Bantuan Akun?</h3>
        <p class="text-[11px] text-emerald-100/75 leading-relaxed mb-4">
            Hubungi panitia atau bagian Tata Usaha jika nomor handphone wali belum terdaftar di sistem.
        </p>
        <a 
            href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" 
            target="_blank"
            class="inline-flex items-center justify-center gap-2 w-full bg-[#bef264] text-[#062d27] font-black text-xs py-3 rounded-xl shadow-md transition-all font-poppins"
        >
            <i class="ti ti-brand-whatsapp text-base"></i>
            <span>Chat Helpdesk WhatsApp</span>
        </a>
    </div>

</div>
@endsection
