<footer class="bg-white pt-32 pb-10">
    <!-- CTA Section -->
    <div class="container mx-auto mb-16 px-6 lg:px-12" data-aos="fade-up">
        <div class="rounded-[2.5rem] bg-gradient-to-r from-teal-950 to-teal-800 text-white p-8 md:p-12 shadow-2xl relative group border border-white/5 overflow-visible">
            <!-- Decorative Glow -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_50%,rgba(20,184,166,0.1),transparent)] pointer-events-none"></div>
            
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 relative z-10">
                <div class="flex-1 text-center lg:text-left">
                    <h3 class="text-2xl md:text-4xl font-black mb-4 font-poppins leading-tight">
                        Wujudkan <span class="text-yellow-400 text-shadow-sm">Masa Depan</span> <br class="hidden md:block"> Rabbani Bersama Kami
                    </h3>
                    <p class="text-teal-100/60 text-sm md:text-base max-w-md mx-auto lg:mx-0">
                        Pendaftaran santri baru telah dibuka. Mari bergabung menjadi bagian dari keluarga besar Al Amin.
                    </p>
                    
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 mt-8">
                        <a href="/register" class="bg-white text-teal-950 font-black px-10 py-4 rounded-xl shadow-xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1 uppercase tracking-widest text-xs">
                            Daftar Sekarang
                        </a>
                        <a href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" class="flex items-center gap-2 text-white font-bold px-6 py-4 rounded-xl hover:bg-white/10 transition-all text-sm">
                            <i class="ti ti-brand-whatsapp text-xl text-yellow-400"></i>
                            Hubungi Admin
                        </a>
                    </div>
                </div>

                <div class="relative lg:w-1/3 flex justify-center lg:justify-end items-end h-full">
                    <div class="absolute bottom-0 w-64 h-64 bg-teal-400/10 rounded-full blur-3xl -mb-32"></div>
                    <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_4) : 'https://placehold.co/400x500?text=Model' }}" alt="Model" class="relative z-20 w-full max-w-[320px] lg:max-w-[380px] h-auto drop-shadow-[0_20px_50px_rgba(0,0,0,0.5)] transform hover:scale-105 transition-all duration-700 -mb-20 lg:-mb-24 -mt-16 lg:-mt-24 pointer-events-none">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Main -->
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-16">
            <!-- Info -->
            <div class="md:col-span-1">
                <div class="flex items-center gap-4 mb-8">
                    <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/64?text=Logo' }}" alt="Logo" class="w-14 h-14 object-contain">
                    <div>
                        <div class="font-black text-xl text-teal-900 leading-none">{{ $pengaturan->nama_sekolah ?? 'Al Amin' }}</div>
                        <div class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mt-1">Pesantren Persatuan Islam 80</div>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mb-8 leading-relaxed">
                    {{ $pengaturan->alamat_sekolah ?? 'Sindangkasih - Ciamis, Jawa Barat' }}
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-teal-500 hover:text-white transition-all shadow-sm">
                        <i class="ti ti-brand-facebook text-xl"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-teal-500 hover:text-white transition-all shadow-sm">
                        <i class="ti ti-brand-instagram text-xl"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-teal-500 hover:text-white transition-all shadow-sm">
                        <i class="ti ti-brand-youtube text-xl"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-teal-500 hover:text-white transition-all shadow-sm">
                        <i class="ti ti-brand-tiktok text-xl"></i>
                    </a>
                </div>
            </div>

            <!-- Links -->
            <div class="md:col-span-1">
                <h4 class="font-bold text-gray-800 mb-6">Quick Links</h4>
                <ul class="text-gray-600 text-sm space-y-3">
                    <li><a href="#" class="hover:text-teal-700">Home</a></li>
                    <li><a href="#" class="hover:text-teal-700">About Us</a></li>
                    <li><a href="#" class="hover:text-teal-700">Admission</a></li>
                    <li><a href="#" class="hover:text-teal-700">News</a></li>
                </ul>
            </div>

            <!-- Links -->
            <div class="md:col-span-1">
                <h4 class="font-bold text-gray-800 mb-6">Academic</h4>
                <ul class="text-gray-600 text-sm space-y-3">
                    <li><a href="#" class="hover:text-teal-700">Curriculum</a></li>
                    <li><a href="#" class="hover:text-teal-700">Facility</a></li>
                    <li><a href="#" class="hover:text-teal-700">Gallery</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="md:col-span-1">
                <h4 class="font-bold text-gray-800 mb-6">Contact Us</h4>
                <ul class="text-gray-600 text-sm space-y-3">
                    <li class="flex items-center gap-2">
                        <span class="text-teal-700 font-semibold">T:</span> {{ $pengaturan->telepon ?? '081322058570' }}
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-teal-700 font-semibold">E:</span> {{ $pengaturan->email ?? 'persis.alamin80@mail.com' }}
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-teal-700 font-semibold">W:</span> {{ $pengaturan->website ?? 'pesantren-alamin80.sch.id' }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-200 mt-16 pt-8 flex flex-col md:flex-row justify-between items-center text-gray-600 text-xs">
            <span>© 2024 Pesantren Al Amin. All rights reserved.</span>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a href="#" class="hover:text-teal-700">Legal</a>
                <a href="#" class="hover:text-teal-700">Site Map</a>
            </div>
        </div>
    </div>
</footer>
