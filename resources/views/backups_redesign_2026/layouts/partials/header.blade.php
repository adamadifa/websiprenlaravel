<header
    x-data="{ scrolled: false, sidebarOpen: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 })"
    :class="scrolled ? 'bg-white/80 backdrop-blur shadow-lg' : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-[9999] transition-all duration-300 py-6"
>
    <div class="container mx-auto px-6 lg:px-12 flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="block">
            <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/64?text=Logo' }}" alt="Logo" class="h-16 w-auto">
        </a>

        @php
            $isDarkHeroPage = request()->is('tentang-pesantren*', 'gallery-kegiatan*', 'guru-tendik*', 'berita', 'spmb*');
        @endphp
        <!-- Desktop Navigation -->
        <nav 
            class="hidden md:flex items-center space-x-6 font-semibold transition-colors duration-300"
            :class="(scrolled || {{ $isDarkHeroPage ? 'false' : 'true' }}) ? 'text-gray-600' : 'text-white'"
        >
            <a href="/" class="flex items-center gap-1.5 hover:text-teal-600 transition-colors {{ request()->is('/') ? 'text-teal-600 font-semibold border-b-2 border-teal-600 pb-1' : '' }}">
                <i class="ti ti-smart-home text-base"></i>
                <span>Home</span>
            </a>
            <a href="/tentang-pesantren" class="flex items-center gap-1.5 hover:text-yellow-400 transition-colors {{ request()->is('tentang-pesantren*') ? 'text-yellow-400 font-semibold border-b-2 border-yellow-400 pb-1' : '' }}">
                <i class="ti ti-info-circle text-base"></i>
                <span>Tentang Pesantren</span>
            </a>
            <a href="/gallery-kegiatan" class="flex items-center gap-1.5 hover:text-yellow-400 transition-colors {{ request()->is('gallery-kegiatan*') ? 'text-yellow-400 font-semibold border-b-2 border-yellow-400 pb-1' : '' }}">
                <i class="ti ti-photo text-base"></i>
                <span>Galeri Kegiatan</span>
            </a>
            <a href="/guru-tendik" class="flex items-center gap-1.5 hover:text-yellow-400 transition-colors {{ request()->is('guru-tendik*') ? 'text-yellow-400 font-semibold border-b-2 border-yellow-400 pb-1' : '' }}">
                <i class="ti ti-users text-base"></i>
                <span>Guru & Tendik</span>
            </a>
            <a href="/spmb" class="flex items-center gap-1.5 hover:text-yellow-400 transition-colors {{ request()->is('spmb*') ? 'text-yellow-400 font-semibold border-b-2 border-yellow-400 pb-1' : '' }}">
                <i class="ti ti-school text-base"></i>
                <span>SPMB</span>
            </a>
            <a href="/fintren" class="flex items-center gap-1.5 bg-gradient-to-r from-teal-500 to-teal-600 text-white px-4 py-2 rounded-lg font-semibold hover:from-teal-600 hover:to-teal-700 transition-all duration-300 shadow-md hover:shadow-lg">
                <i class="ti ti-wallet text-base"></i>
                <span>FINTREN</span>
            </a>
        </nav>

        <!-- Right Side -->
        <div class="hidden md:flex items-center space-x-4">
            <a 
                href="/login" 
                class="flex items-center gap-1.5 font-semibold px-4 py-2 rounded-lg transition-colors duration-300"
                :class="(scrolled || !{{ $isDarkHeroPage ? 'true' : 'false' }}) ? 'text-teal-600 hover:bg-teal-50' : 'text-white hover:bg-white/10'"
            >
                <i class="ti ti-login text-base"></i>
                <span>Masuk</span>
            </a>
            <a href="/register" class="flex items-center gap-1.5 bg-teal-700 text-white font-semibold px-4 py-2 rounded-lg hover:bg-teal-850 shadow-md">
                <i class="ti ti-user-plus text-base"></i>
                <span>Daftar Sekarang</span>
            </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <button
            class="md:hidden ml-auto p-2 rounded focus:outline-none focus:ring-2 focus:ring-teal-400 transition-colors duration-300"
            :class="(scrolled || !{{ request()->is('tentang-pesantren*', 'spmb*') ? 'true' : 'false' }}) ? 'text-gray-700' : 'text-white'"
            @click="sidebarOpen = true"
        >
            <i class="ti ti-menu-2 text-3xl"></i>
        </button>
    </div>

    <!-- Mobile Sidebar (Off-canvas) -->
    <div
        x-show="sidebarOpen"
        class="fixed inset-0 z-[10000] md:hidden"
        style="display: none;"
    >
        <div class="fixed inset-0 bg-black/50" @click="sidebarOpen = false"></div>
        <div class="fixed inset-y-0 right-0 w-64 bg-white shadow-xl p-6 transform transition-transform" x-transition:enter="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="translate-x-0" x-transition:leave-end="translate-x-full">
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : '/assets/images/logo/alamin.png' }}" alt="Logo" class="w-12 h-12 object-contain" onerror="this.src='https://placehold.co/48?text=Logo'">
                <span class="font-extrabold text-lg text-teal-800 leading-tight">{{ $pengaturan->nama_sekolah ?? 'Al Amin' }}<br><span class="text-sm font-normal text-gray-500">{{ $pengaturan->alamat_sekolah ?? 'Sindangkasih - Ciamis' }}</span></span>
            </div>
            <p class="text-gray-500 text-sm mb-6 leading-relaxed">
                {{ $pengaturan->alamat_sekolah ?? '' }}
            </p>
            <nav class="flex flex-col space-y-4">
                <a href="/" class="flex items-center gap-2 text-gray-700 font-medium hover:text-teal-600">
                    <i class="ti ti-smart-home text-lg text-gray-400 group-hover:text-teal-600"></i>
                    <span>Home</span>
                </a>
                <a href="/tentang-pesantren" class="flex items-center gap-2 text-gray-700 font-medium hover:text-teal-600">
                    <i class="ti ti-info-circle text-lg text-gray-400 group-hover:text-teal-600"></i>
                    <span>Tentang Pesantren</span>
                </a>
                <a href="/gallery-kegiatan" class="flex items-center gap-2 text-gray-700 font-medium hover:text-teal-600">
                    <i class="ti ti-photo text-lg text-gray-400 group-hover:text-teal-600"></i>
                    <span>Galeri Kegiatan</span>
                </a>
                <a href="/guru-tendik" class="flex items-center gap-2 text-gray-700 font-medium hover:text-teal-600">
                    <i class="ti ti-users text-lg text-gray-400 group-hover:text-teal-600"></i>
                    <span>Guru & Tendik</span>
                </a>
                <a href="/spmb" class="flex items-center gap-2 text-gray-700 font-medium hover:text-teal-600">
                    <i class="ti ti-school text-lg text-gray-400 group-hover:text-teal-600"></i>
                    <span>SPMB</span>
                </a>
                <a href="/fintren" class="flex items-center gap-2 text-teal-600 font-bold">
                    <i class="ti ti-wallet text-lg"></i>
                    <span>FINTREN</span>
                </a>
                <hr>
                <a href="/login" class="flex items-center gap-2 text-gray-700 font-medium">
                    <i class="ti ti-login text-lg text-gray-400"></i>
                    <span>Masuk</span>
                </a>
                <a href="/register" class="flex items-center justify-center gap-2 bg-teal-600 text-white text-center font-semibold px-4 py-2.5 rounded-lg shadow-sm">
                    <i class="ti ti-user-plus text-lg"></i>
                    <span>Daftar</span>
                </a>
            </nav>
        </div>
    </div>
</header>
