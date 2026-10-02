@php
    $isDarkPage = true; // All public mobile pages now share the signature deep emerald theme
@endphp

<header 
    x-data="{ scrolled: false, sidebarOpen: false }" 
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 })"
    :class="scrolled 
        ? 'bg-[#062d27]/95 backdrop-blur-md shadow-xl border-b border-emerald-800/40 py-3' 
        : 'bg-[#062d27] py-3.5 border-b border-emerald-900/60'"
    class="fixed top-0 left-0 right-0 z-[100] transition-all duration-300 px-5"
>
    <div class="flex justify-between items-center max-w-lg mx-auto">
        <!-- Logo -->
        <a href="/" class="flex items-center gap-2.5">
            <div class="w-10 h-10 bg-white/10 border border-white/20 rounded-xl flex items-center justify-center p-1 backdrop-blur-sm transition-transform active:scale-95">
                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/40?text=Logo' }}" alt="Logo" class="w-full h-full object-contain">
            </div>
            <div class="flex flex-col">
                <span class="text-xs font-black text-white font-poppins leading-tight">PPI 80 Al Amin</span>
                <span class="text-[9px] font-bold text-[#bef264] uppercase tracking-wider">Sindangkasih</span>
            </div>
        </a>

        <!-- Right Side Quick Actions & Mobile Menu Toggle -->
        <div class="flex items-center gap-2">
            <a 
                href="/siportu" 
                class="hidden xs:inline-flex items-center gap-1 bg-emerald-800/60 hover:bg-emerald-700 text-emerald-200 px-2.5 py-1 rounded-lg text-[10px] font-bold border border-emerald-600/40 transition-all {{ request()->is('siportu*') ? 'ring-2 ring-[#bef264] text-white' : '' }}"
            >
                <i class="ti ti-device-mobile text-xs text-[#bef264]"></i>
                <span>Siportu</span>
            </a>

            <button 
                @click="sidebarOpen = true"
                class="w-9 h-9 rounded-xl flex items-center justify-center transition-all bg-white/10 hover:bg-white/20 text-white border border-white/15 active:scale-90 shadow-sm"
                aria-label="Buka Menu"
            >
                <i class="ti ti-menu-2 text-xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Sidebar (Off-canvas Drawer) -->
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
                class="fixed inset-0 bg-black/60 backdrop-blur-sm"
                @click="sidebarOpen = false"
            ></div>

            <!-- Sidebar Drawer Content -->
            <div 
                x-show="sidebarOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="fixed inset-y-0 right-0 w-[85%] max-w-xs bg-[#062d27] text-white shadow-2xl flex flex-col border-l border-emerald-800/60"
            >
                <!-- Drawer Header -->
                <div class="p-5 flex justify-between items-center border-b border-emerald-800/60">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-white/10 p-1 flex items-center justify-center border border-white/15">
                            <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/40?text=Logo' }}" alt="Logo" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <div class="font-black text-white text-xs font-poppins">Al Amin Pesantren</div>
                            <div class="text-[9px] text-[#bef264] font-bold uppercase tracking-wider">Menu Navigasi</div>
                        </div>
                    </div>
                    <button @click="sidebarOpen = false" class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center text-white/80 transition-colors">
                        <i class="ti ti-x text-lg"></i>
                    </button>
                </div>

                <!-- Navigation Links -->
                <div class="flex-1 overflow-y-auto p-5 space-y-1.5 font-poppins">
                    <a href="/" class="flex items-center gap-3.5 px-3.5 py-3 rounded-xl transition-all text-xs font-bold {{ request()->is('/') ? 'bg-[#bef264] text-[#062d27]' : 'text-emerald-100 hover:bg-white/10' }}">
                        <i class="ti ti-smart-home text-base {{ request()->is('/') ? 'text-[#062d27]' : 'text-[#bef264]' }}"></i>
                        <span>Beranda</span>
                    </a>

                    <a href="/tentang-pesantren" class="flex items-center gap-3.5 px-3.5 py-3 rounded-xl transition-all text-xs font-bold {{ request()->is('tentang-pesantren*') ? 'bg-[#bef264] text-[#062d27]' : 'text-emerald-100 hover:bg-white/10' }}">
                        <i class="ti ti-info-circle text-base {{ request()->is('tentang-pesantren*') ? 'text-[#062d27]' : 'text-[#bef264]' }}"></i>
                        <span>Tentang Pesantren</span>
                    </a>

                    <a href="/gallery-kegiatan" class="flex items-center gap-3.5 px-3.5 py-3 rounded-xl transition-all text-xs font-bold {{ request()->is('gallery-kegiatan*') ? 'bg-[#bef264] text-[#062d27]' : 'text-emerald-100 hover:bg-white/10' }}">
                        <i class="ti ti-photo text-base {{ request()->is('gallery-kegiatan*') ? 'text-[#062d27]' : 'text-[#bef264]' }}"></i>
                        <span>Galeri Kegiatan</span>
                    </a>

                    <a href="/guru-tendik" class="flex items-center gap-3.5 px-3.5 py-3 rounded-xl transition-all text-xs font-bold {{ request()->is('guru-tendik*') ? 'bg-[#bef264] text-[#062d27]' : 'text-emerald-100 hover:bg-white/10' }}">
                        <i class="ti ti-users text-base {{ request()->is('guru-tendik*') ? 'text-[#062d27]' : 'text-[#bef264]' }}"></i>
                        <span>Guru & Tendik</span>
                    </a>

                    <a href="/berita" class="flex items-center gap-3.5 px-3.5 py-3 rounded-xl transition-all text-xs font-bold {{ request()->is('berita*') ? 'bg-[#bef264] text-[#062d27]' : 'text-emerald-100 hover:bg-white/10' }}">
                        <i class="ti ti-news text-base {{ request()->is('berita*') ? 'text-[#062d27]' : 'text-[#bef264]' }}"></i>
                        <span>Berita & Informasi</span>
                    </a>

                    <a href="/siportu" class="flex items-center gap-3.5 px-3.5 py-3 rounded-xl transition-all text-xs font-bold {{ request()->is('siportu*') ? 'bg-[#bef264] text-[#062d27]' : 'bg-emerald-800/40 text-[#bef264] border border-emerald-600/30' }}">
                        <i class="ti ti-device-mobile text-base"></i>
                        <span>SiportuApp (Wali Santri)</span>
                    </a>

                    <hr class="my-3 border-emerald-800/60">

                    <!-- Quick Action Buttons -->
                    <div class="space-y-2 pt-1">
                        <a href="/login" class="flex items-center justify-center gap-2 p-3 rounded-xl bg-white/10 hover:bg-white/15 text-white font-bold text-xs border border-white/15 transition-all">
                            <i class="ti ti-login text-base"></i>
                            <span>Masuk Akun</span>
                        </a>
                        <a href="/register" class="flex items-center justify-center gap-2 p-3 rounded-xl bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black text-xs shadow-md transition-all">
                            <i class="ti ti-user-plus text-base"></i>
                            <span>Daftar Santri Baru</span>
                        </a>
                    </div>
                </div>

                <!-- Drawer Footer -->
                <div class="p-4 border-t border-emerald-800/60 text-center">
                    <p class="text-[9px] text-emerald-200/50 font-bold uppercase tracking-widest">© {{ date('Y') }} PPI 80 Al Amin</p>
                </div>
            </div>
        </div>
    </template>
</header>
