<footer class="bg-[#062d27] text-white pt-20 pb-12 border-t border-emerald-800/40">
    <!-- CTA Card Section -->
    <div class="container mx-auto mb-16 px-6 lg:px-12" data-aos="fade-up">
        <div class="rounded-3xl bg-gradient-to-r from-[#0d3f37] to-[#08332c] text-white p-8 md:p-12 lg:pb-0 shadow-2xl relative group border border-emerald-700/40 overflow-hidden">
            <!-- Decorative Ambient Glow -->
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-[#bef264]/10 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 relative z-10">
                <div class="flex-1 text-center lg:text-left lg:py-8">
                    <span class="inline-block text-[#bef264] text-xs uppercase font-extrabold tracking-[0.25em] mb-2 font-poppins">Penerimaan Santri Baru</span>
                    <h3 class="text-2xl sm:text-3xl md:text-4xl font-black mb-4 font-poppins leading-tight">
                        Wujudkan Masa Depan <span class="text-[#bef264]">Generasi Rabbani</span> Bersama Kami
                    </h3>
                    <p class="text-emerald-100/75 text-sm sm:text-base max-w-xl mx-auto lg:mx-0 leading-relaxed">
                        Pendaftaran santri baru dan mutasi telah dibuka. Raih kesempatan belajar dengan lingkungan islami yang asri dan berprestasi.
                    </p>
                    
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 mt-8">
                        <a href="/register" class="bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black px-8 py-3.5 rounded-xl shadow-lg shadow-lime-500/10 hover:shadow-lime-500/25 transition-all transform hover:-translate-y-0.5 uppercase tracking-wider text-xs font-poppins">
                            Daftar Sekarang
                        </a>
                        <a href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" target="_blank" class="flex items-center gap-2 bg-white/10 hover:bg-white/15 text-white font-bold px-6 py-3.5 rounded-xl border border-white/15 transition-all text-xs uppercase tracking-wider">
                            <i class="ti ti-brand-whatsapp text-lg text-[#bef264]"></i>
                            Hubungi Admin
                        </a>
                    </div>
                </div>

                @php
                    $ctaModel = null;
                    if ($pengaturan) {
                        if (!empty($pengaturan->model_1)) {
                            $ctaModel = $pengaturan->getAdminImageUrl($pengaturan->model_1);
                        } elseif (!empty($pengaturan->model_2)) {
                            $ctaModel = $pengaturan->getAdminImageUrl($pengaturan->model_2);
                        } elseif (!empty($pengaturan->model_3)) {
                            $ctaModel = $pengaturan->getAdminImageUrl($pengaturan->model_3);
                        } elseif (!empty($pengaturan->model_4)) {
                            $ctaModel = $pengaturan->getAdminImageUrl($pengaturan->model_4);
                        }
                    }
                @endphp

                <div class="relative lg:w-5/12 flex justify-center lg:justify-end items-end self-end mt-6 lg:mt-0">
                    <!-- Glow effect behind model -->
                    <div class="absolute bottom-0 w-60 h-60 bg-[#bef264]/15 rounded-full blur-3xl pointer-events-none"></div>
                    
                    @if($ctaModel)
                        <img 
                            src="{{ $ctaModel }}" 
                            alt="Santri Pesantren Al Amin" 
                            class="relative z-10 max-h-[300px] sm:max-h-[360px] lg:max-h-[420px] w-auto object-contain drop-shadow-[0_20px_45px_rgba(0,0,0,0.5)] transform hover:scale-105 transition-transform duration-500 pointer-events-none"
                            onerror="this.onerror=null; this.src='https://placehold.co/400x500?text=Model';"
                        >
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Main Navigation -->
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 lg:gap-16">
            
            <!-- School Info & Socials -->
            <div class="md:col-span-1">
                <div class="flex items-center gap-3 mb-6">
                    <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/64?text=Logo' }}" alt="Logo" class="w-12 h-12 object-contain">
                    <div>
                        <div class="font-black text-lg text-white leading-none font-poppins">{{ $pengaturan->nama_sekolah ?? 'Al Amin' }}</div>
                        <div class="text-[10px] font-bold text-emerald-300/80 uppercase tracking-widest mt-1">Persatuan Islam 80</div>
                    </div>
                </div>
                <p class="text-emerald-100/70 text-xs sm:text-sm mb-6 leading-relaxed">
                    {{ $pengaturan->alamat_sekolah ?? 'Jln. Raya Ancol 1 No. 27 Kecamatan Sindangkasih Kabupaten Ciamis' }}
                </p>
                <div class="flex gap-3">
                    <a href="{{ $pengaturan->facebook ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-emerald-200 hover:bg-[#bef264] hover:text-[#062d27] transition-all shadow-sm" aria-label="Facebook">
                        <i class="ti ti-brand-facebook text-lg"></i>
                    </a>
                    <a href="{{ $pengaturan->instagram ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-emerald-200 hover:bg-[#bef264] hover:text-[#062d27] transition-all shadow-sm" aria-label="Instagram">
                        <i class="ti ti-brand-instagram text-lg"></i>
                    </a>
                    <a href="{{ $pengaturan->youtube ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-emerald-200 hover:bg-[#bef264] hover:text-[#062d27] transition-all shadow-sm" aria-label="YouTube">
                        <i class="ti ti-brand-youtube text-lg"></i>
                    </a>
                    <a href="{{ $pengaturan->tiktok ?? '#' }}" target="_blank" class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-emerald-200 hover:bg-[#bef264] hover:text-[#062d27] transition-all shadow-sm" aria-label="TikTok">
                        <i class="ti ti-brand-tiktok text-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="md:col-span-1">
                <h4 class="font-bold text-white text-sm uppercase tracking-wider mb-5 font-poppins">Navigasi Utama</h4>
                <ul class="text-emerald-100/70 text-xs sm:text-sm space-y-3 font-medium">
                    <li><a href="/" class="hover:text-[#bef264] transition-colors">Beranda</a></li>
                    <li><a href="/tentang-pesantren" class="hover:text-[#bef264] transition-colors">Tentang Pesantren</a></li>
                    <li><a href="/spmb" class="hover:text-[#bef264] transition-colors">Informasi SPMB</a></li>
                    <li><a href="/berita" class="hover:text-[#bef264] transition-colors">Berita & Informasi</a></li>
                    <li><a href="/gallery-kegiatan" class="hover:text-[#bef264] transition-colors">Galeri Kegiatan</a></li>
                </ul>
            </div>

            <!-- Academic Units -->
            <div class="md:col-span-1">
                <h4 class="font-bold text-white text-sm uppercase tracking-wider mb-5 font-poppins">Jenjang Pendidikan</h4>
                <ul class="text-emerald-100/70 text-xs sm:text-sm space-y-3 font-medium">
                    <li><a href="/tk" class="hover:text-[#bef264] transition-colors">TK Calisa Rabbani</a></li>
                    <li><a href="/sdit" class="hover:text-[#bef264] transition-colors">SDIT Al Amin</a></li>
                    <li><a href="/mts" class="hover:text-[#bef264] transition-colors">MTs Persis Sindangkasih</a></li>
                    <li><a href="/ma" class="hover:text-[#bef264] transition-colors">MA Persis Sindangkasih</a></li>
                    <li><a href="/siportu" class="hover:text-[#bef264] transition-colors">SiportuApp Wali Santri</a></li>
                </ul>
            </div>

            <!-- Fast Contact Support -->
            <div class="md:col-span-1">
                <div class="rounded-2xl bg-[#09352e] border border-emerald-700/40 p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-8 h-8 rounded-lg bg-[#bef264] text-[#062d27] flex items-center justify-center">
                            <i class="ti ti-headset text-lg font-bold"></i>
                        </div>
                        <span class="text-[10px] font-extrabold uppercase tracking-widest text-[#bef264]">Layanan Informasi</span>
                    </div>
                    <p class="text-emerald-100/75 text-xs leading-relaxed mb-4">
                        Ada pertanyaan seputar kurikulum, asrama, atau pendaftaran? Tim kami siap membantu Anda.
                    </p>
                    <a href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" target="_blank" class="inline-flex items-center justify-center gap-2 w-full bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-bold py-2.5 rounded-xl text-xs uppercase tracking-wider transition-all font-poppins shadow-md">
                        <i class="ti ti-brand-whatsapp text-base"></i>
                        <span>Chat WhatsApp</span>
                    </a>
                </div>
            </div>

        </div>

        <div class="border-t border-emerald-800/40 mt-14 pt-8 flex flex-col md:flex-row justify-between items-center text-emerald-200/50 text-xs">
            <span>© {{ date('Y') }} {{ $pengaturan->nama_sekolah ?? 'Pesantren Al Amin' }}. All rights reserved.</span>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a href="#" class="hover:text-emerald-200 transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-emerald-200 transition-colors">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>
</footer>
