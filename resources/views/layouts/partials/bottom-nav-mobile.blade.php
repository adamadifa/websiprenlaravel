<div class="fixed bottom-0 left-0 right-0 bg-[#062d27]/95 backdrop-blur-xl border-t border-emerald-800/60 shadow-[0_-10px_30px_rgba(0,0,0,0.25)] z-[100] px-4 pb-[env(safe-area-inset-bottom,14px)] pt-2 md:hidden">
    <div class="flex items-center justify-between max-w-md mx-auto">
        
        <!-- 1. Beranda -->
        <a href="/" class="flex flex-col items-center gap-1 min-w-[58px] transition-all active:scale-90 {{ request()->is('/') ? 'text-[#bef264]' : 'text-emerald-200/60 hover:text-emerald-100' }}">
            <div class="relative">
                <i class="ti ti-smart-home text-2xl"></i>
                @if(request()->is('/'))
                    <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-[#bef264] rounded-full shadow-[0_0_8px_#bef264]"></div>
                @endif
            </div>
            <span class="text-[9px] font-bold tracking-tight font-poppins">Beranda</span>
        </a>

        <!-- 2. Berita -->
        <a href="/berita" class="flex flex-col items-center gap-1 min-w-[58px] transition-all active:scale-90 {{ request()->is('berita*') ? 'text-[#bef264]' : 'text-emerald-200/60 hover:text-emerald-100' }}">
            <div class="relative">
                <i class="ti ti-news text-2xl"></i>
                @if(request()->is('berita*'))
                    <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-[#bef264] rounded-full shadow-[0_0_8px_#bef264]"></div>
                @endif
            </div>
            <span class="text-[9px] font-bold tracking-tight font-poppins">Berita</span>
        </a>

        <!-- 3. Floating Center Action (SPMB Daftar) -->
        <a href="/register" class="flex flex-col items-center -mt-7 mb-1 group">
            <div class="w-13 h-13 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] rounded-2xl shadow-lg shadow-lime-500/30 flex items-center justify-center border-4 border-[#062d27] transition-all active:scale-90 p-3">
                <i class="ti ti-user-plus text-2xl font-black"></i>
            </div>
            <span class="text-[9px] font-black text-[#bef264] tracking-tight font-poppins mt-0.5">Daftar</span>
        </a>

        <!-- 4. SiportuApp -->
        <a href="/siportu" class="flex flex-col items-center gap-1 min-w-[58px] transition-all active:scale-90 {{ request()->is('siportu*') ? 'text-[#bef264]' : 'text-emerald-200/60 hover:text-emerald-100' }}">
            <div class="relative">
                <i class="ti ti-device-mobile text-2xl"></i>
                @if(request()->is('siportu*'))
                    <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-[#bef264] rounded-full shadow-[0_0_8px_#bef264]"></div>
                @endif
            </div>
            <span class="text-[9px] font-bold tracking-tight font-poppins">Siportu</span>
        </a>

        <!-- 5. Masuk / Portal -->
        <a href="/login" class="flex flex-col items-center gap-1 min-w-[58px] transition-all active:scale-90 {{ request()->is('login*') ? 'text-[#bef264]' : 'text-emerald-200/60 hover:text-emerald-100' }}">
            <div class="relative">
                <i class="ti ti-login text-2xl"></i>
                @if(request()->is('login*'))
                    <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-[#bef264] rounded-full shadow-[0_0_8px_#bef264]"></div>
                @endif
            </div>
            <span class="text-[9px] font-bold tracking-tight font-poppins">Masuk</span>
        </a>

    </div>
</div>
