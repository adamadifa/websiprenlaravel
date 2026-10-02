<header
    x-data="{ scrolled: false, sidebarOpen: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    :class="scrolled ? 'bg-[#062d27]/95 backdrop-blur-md shadow-xl border-b border-emerald-800/40 py-4' : 'bg-transparent py-6'"
    class="fixed top-0 left-0 right-0 z-[9999] transition-all duration-300"
>
    <div class="container mx-auto px-6 lg:px-12 flex justify-between items-center">
        <!-- Logo Only (Clean) -->
        <a href="/" class="block group">
            <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/64?text=Logo' }}" alt="Logo {{ $pengaturan->nama_sekolah ?? 'Pesantren Al Amin' }}" class="h-12 md:h-14 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center space-x-7 font-semibold text-white/90 text-sm">
            <a href="/" class="flex items-center gap-1.5 transition-colors {{ request()->is('/') ? 'text-[#bef264] font-bold' : 'hover:text-[#bef264]' }}">
                <span>Home</span>
            </a>
            <a href="/tentang-pesantren" class="flex items-center gap-1.5 transition-colors {{ request()->is('tentang-pesantren*') ? 'text-[#bef264] font-bold' : 'hover:text-[#bef264]' }}">
                <span>Tentang Pesantren</span>
            </a>
            <a href="/gallery-kegiatan" class="flex items-center gap-1.5 transition-colors {{ request()->is('gallery-kegiatan*') ? 'text-[#bef264] font-bold' : 'hover:text-[#bef264]' }}">
                <span>Galeri</span>
            </a>
            <a href="/guru-tendik" class="flex items-center gap-1.5 transition-colors {{ request()->is('guru-tendik*') ? 'text-[#bef264] font-bold' : 'hover:text-[#bef264]' }}">
                <span>Guru & Tendik</span>
            </a>
            <a href="/berita" class="flex items-center gap-1.5 transition-colors {{ request()->is('berita*') ? 'text-[#bef264] font-bold' : 'hover:text-[#bef264]' }}">
                <span>Berita</span>
            </a>
            <a href="/siportu" class="flex items-center gap-1.5 bg-emerald-700/60 hover:bg-emerald-600 text-emerald-200 hover:text-white px-3.5 py-1.5 rounded-lg text-xs font-bold border border-emerald-500/30 transition-all shadow-sm {{ request()->is('siportu*') ? 'ring-2 ring-[#bef264] text-white' : '' }}">
                <i class="ti ti-device-mobile text-sm text-[#bef264]"></i>
                <span>SiportuApp</span>
            </a>
        </nav>

        <!-- Right Side CTA -->
        <div class="hidden md:flex items-center space-x-3">
            <a 
                href="/login" 
                class="flex items-center gap-1.5 text-xs font-bold text-white/90 hover:text-white hover:bg-white/10 px-4 py-2.5 rounded-xl border border-white/15 transition-all"
            >
                <i class="ti ti-login text-base"></i>
                <span>Masuk</span>
            </a>
            <a href="/register" class="flex items-center gap-1.5 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] text-xs font-extrabold px-5 py-2.5 rounded-xl shadow-md shadow-lime-500/10 hover:shadow-lime-500/20 transition-all font-poppins">
                <i class="ti ti-user-plus text-base"></i>
                <span>Daftar Santri</span>
            </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <button
            class="lg:hidden ml-auto p-2 rounded-xl bg-white/10 text-white hover:bg-white/20 focus:outline-none transition-colors duration-300"
            @click="sidebarOpen = true"
            aria-label="Open Menu"
        >
            <i class="ti ti-menu-2 text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Sidebar (Off-canvas) -->
    <div
        x-show="sidebarOpen"
        class="fixed inset-0 z-[10000] lg:hidden"
        style="display: none;"
    >
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="sidebarOpen = false"></div>
        <div class="fixed inset-y-0 right-0 w-72 bg-[#062d27] text-white shadow-2xl p-6 border-l border-emerald-800/50 flex flex-col justify-between transform transition-transform" x-transition:enter="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="translate-x-0" x-transition:leave-end="translate-x-full">
            <div>
                <div class="flex items-center justify-between gap-3 mb-6 pb-4 border-b border-emerald-800/60">
                    <a href="/" class="block">
                        <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : '/assets/images/logo/alamin.png' }}" alt="Logo" class="h-10 w-auto object-contain" onerror="this.src='https://placehold.co/48?text=Logo'">
                    </a>
                    <button @click="sidebarOpen = false" class="text-emerald-300 hover:text-white p-1 rounded-lg">
                        <i class="ti ti-x text-2xl"></i>
                    </button>
                </div>

                <nav class="flex flex-col space-y-3 font-medium text-sm">
                    <a href="/" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-white hover:bg-emerald-800/50 {{ request()->is('/') ? 'bg-emerald-800/80 text-[#bef264] font-bold' : '' }}">
                        <i class="ti ti-smart-home text-lg text-emerald-300"></i>
                        <span>Home</span>
                    </a>
                    <a href="/tentang-pesantren" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-white hover:bg-emerald-800/50 {{ request()->is('tentang-pesantren*') ? 'bg-emerald-800/80 text-[#bef264] font-bold' : '' }}">
                        <i class="ti ti-info-circle text-lg text-emerald-300"></i>
                        <span>Tentang Pesantren</span>
                    </a>
                    <a href="/gallery-kegiatan" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-white hover:bg-emerald-800/50 {{ request()->is('gallery-kegiatan*') ? 'bg-emerald-800/80 text-[#bef264] font-bold' : '' }}">
                        <i class="ti ti-photo text-lg text-emerald-300"></i>
                        <span>Galeri Kegiatan</span>
                    </a>
                    <a href="/guru-tendik" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-white hover:bg-emerald-800/50 {{ request()->is('guru-tendik*') ? 'bg-emerald-800/80 text-[#bef264] font-bold' : '' }}">
                        <i class="ti ti-users text-lg text-emerald-300"></i>
                        <span>Guru & Tendik</span>
                    </a>
                    <a href="/berita" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-white hover:bg-emerald-800/50 {{ request()->is('berita*') ? 'bg-emerald-800/80 text-[#bef264] font-bold' : '' }}">
                        <i class="ti ti-news text-lg text-emerald-300"></i>
                        <span>Berita</span>
                    </a>
                    <a href="/siportu" class="flex items-center gap-2.5 px-3 py-2 rounded-xl bg-emerald-800/50 text-[#bef264] font-bold border border-emerald-600/40 {{ request()->is('siportu*') ? 'ring-2 ring-[#bef264]' : '' }}">
                        <i class="ti ti-device-mobile text-lg text-[#bef264]"></i>
                        <span>SiportuApp</span>
                    </a>
                </nav>
            </div>

            <div class="pt-6 border-t border-emerald-800/60 space-y-3">
                <a href="/login" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl border border-white/20 text-white font-semibold text-sm hover:bg-white/10 transition-colors">
                    <i class="ti ti-login text-lg"></i>
                    <span>Masuk</span>
                </a>
                <a href="/register" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl bg-[#bef264] text-[#062d27] font-bold text-sm hover:bg-[#a3e635] shadow-lg transition-colors">
                    <i class="ti ti-user-plus text-lg"></i>
                    <span>Daftar Santri Baru</span>
                </a>
            </div>
        </div>
    </div>
</header>
