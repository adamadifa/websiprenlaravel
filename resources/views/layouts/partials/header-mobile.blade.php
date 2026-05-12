@php
    $isDarkPage = request()->is('berita*', 'gallery-kegiatan*', 'tentang-pesantren*', 'guru-tendik*');
@endphp

<header 
    x-data="{ scrolled: false, sidebarOpen: false }" 
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 })"
    :class="scrolled 
        ? ({{ $isDarkPage ? 'true' : 'false' }} ? 'bg-teal-900/95 backdrop-blur-md shadow-xl py-3' : 'bg-white/95 backdrop-blur-md shadow-xl py-3') 
        : ({{ $isDarkPage ? 'true' : 'false' }} ? 'bg-teal-900 py-4' : 'bg-white shadow-sm py-4')"
    class="fixed top-0 left-0 right-0 z-[100] transition-all duration-300 px-6"
>
    <div class="flex justify-between items-center max-w-lg mx-auto">
        <!-- Logo -->
        <a href="/" class="flex items-center">
            <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center p-1.5 transition-transform active:scale-95">
                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/56?text=Logo' }}" alt="Logo" class="w-full h-full object-contain">
            </div>
        </a>

        <!-- Mobile Menu Toggle -->
        <button 
            @click="sidebarOpen = true"
            class="w-10 h-10 rounded-xl flex items-center justify-center transition-all shadow-sm border active:scale-90"
            :class="scrolled 
                ? ({{ $isDarkPage ? 'true' : 'false' }} ? 'text-white bg-white/10 border-white/10' : 'text-teal-900 bg-teal-50 border-teal-100') 
                : ({{ $isDarkPage ? 'true' : 'false' }} ? 'text-white bg-white/10 border-white/10' : 'text-teal-900 bg-teal-50 border-teal-100')"
        >
            <i class="ti ti-menu-2 text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Sidebar (Off-canvas) -->
    <template x-teleport="body">
        <div x-show="sidebarOpen" class="fixed inset-0 z-[9999]" x-cloak>
            <!-- Backdrop -->
            <div 
                x-show="sidebarOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-teal-950/40 backdrop-blur-sm"
                @click="sidebarOpen = false"
            ></div>

            <!-- Sidebar Content -->
            <div 
                x-show="sidebarOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="fixed inset-y-0 right-0 w-[80%] max-w-xs bg-white shadow-2xl flex flex-col"
            >
                <!-- Header -->
                <div class="p-6 flex justify-between items-center border-b border-gray-50">
                    <div class="flex items-center gap-3">
                        <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/40?text=Logo' }}" alt="Logo" class="w-8 h-8 object-contain">
                        <span class="font-black text-teal-950">Menu Utama</span>
                    </div>
                    <button @click="sidebarOpen = false" class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400">
                        <i class="ti ti-x text-xl"></i>
                    </button>
                </div>

                <!-- Navigation Links -->
                <div class="flex-1 overflow-y-auto p-6 space-y-2">
                    <a href="/" class="flex items-center gap-4 p-4 rounded-2xl {{ request()->is('/') ? 'bg-teal-50 text-teal-700 font-bold' : 'text-gray-600 font-medium' }}">
                        <i class="ti ti-smart-home text-xl"></i>
                        <span>Beranda</span>
                    </a>
                    <a href="/tentang-pesantren" class="flex items-center gap-4 p-4 rounded-2xl {{ request()->is('tentang-pesantren*') ? 'bg-teal-50 text-teal-700 font-bold' : 'text-gray-600 font-medium' }}">
                        <i class="ti ti-info-circle text-xl"></i>
                        <span>Tentang Pesantren</span>
                    </a>
                    <a href="/gallery-kegiatan" class="flex items-center gap-4 p-4 rounded-2xl {{ request()->is('gallery-kegiatan*') ? 'bg-teal-50 text-teal-700 font-bold' : 'text-gray-600 font-medium' }}">
                        <i class="ti ti-photo text-xl"></i>
                        <span>Galeri Kegiatan</span>
                    </a>
                    <a href="/guru-tendik" class="flex items-center gap-4 p-4 rounded-2xl {{ request()->is('guru-tendik*') ? 'bg-teal-50 text-teal-700 font-bold' : 'text-gray-600 font-medium' }}">
                        <i class="ti ti-users text-xl"></i>
                        <span>Guru & Tendik</span>
                    </a>
                    <a href="/berita" class="flex items-center gap-4 p-4 rounded-2xl {{ request()->is('berita*') ? 'bg-teal-50 text-teal-700 font-bold' : 'text-gray-600 font-medium' }}">
                        <i class="ti ti-news text-xl"></i>
                        <span>Berita & Informasi</span>
                    </a>
                    <hr class="my-4 border-gray-50">
                    <a href="/login" class="flex items-center gap-4 p-4 rounded-2xl text-teal-600 font-bold">
                        <i class="ti ti-login text-xl"></i>
                        <span>Masuk Akun</span>
                    </a>
                    <a href="/register" class="flex items-center justify-center gap-2 p-4 rounded-2xl bg-teal-600 text-white font-black shadow-lg shadow-teal-600/20 mt-4">
                        <span>Daftar Sekarang</span>
                        <i class="ti ti-arrow-right text-lg"></i>
                    </a>
                </div>

                <!-- Footer -->
                <div class="p-6 border-t border-gray-50 text-center">
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">© 2024 Al Amin Pesantren</p>
                </div>
            </div>
        </div>
    </template>
</header>
