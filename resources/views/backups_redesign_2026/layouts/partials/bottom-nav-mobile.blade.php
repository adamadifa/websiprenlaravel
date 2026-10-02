<div class="fixed bottom-0 left-0 right-0 bg-white/80 backdrop-blur-2xl border-t border-slate-100 shadow-[0_-10px_30px_rgba(0,0,0,0.05)] z-[100] px-4 pb-[env(safe-area-inset-bottom,16px)] pt-3 md:hidden">
    <div class="flex items-center justify-between max-w-lg mx-auto">
        <!-- Home -->
        <a href="/" class="flex flex-col items-center gap-1 min-w-[64px] transition-all active:scale-90 {{ request()->is('/') ? 'text-teal-600' : 'text-slate-400' }}">
            <div class="relative">
                <i class="ti ti-smart-home text-2xl"></i>
                @if(request()->is('/'))
                    <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-teal-500 rounded-full"></div>
                @endif
            </div>
            <span class="text-[10px] font-bold tracking-tight">Beranda</span>
        </a>

        <!-- Berita -->
        <a href="/berita" class="flex flex-col items-center gap-1 min-w-[64px] transition-all active:scale-90 {{ request()->is('berita*') ? 'text-teal-600' : 'text-slate-400' }}">
            <div class="relative">
                <i class="ti ti-news text-2xl"></i>
                @if(request()->is('berita*'))
                    <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-teal-500 rounded-full"></div>
                @endif
            </div>
            <span class="text-[10px] font-bold tracking-tight">Berita</span>
        </a>

        <!-- Main Action (Floating) -->
        <a href="/register" class="flex flex-col items-center -mt-8 mb-2">
            <div class="w-14 h-14 bg-teal-600 rounded-2xl shadow-lg shadow-teal-600/30 flex items-center justify-center text-white border-4 border-white transition-all active:scale-90">
                <i class="ti ti-user-plus text-2xl"></i>
            </div>
            <span class="text-[10px] font-black text-teal-700 tracking-tight">Daftar</span>
        </a>

        <!-- Guru & Tendik -->
        <a href="/guru-tendik" class="flex flex-col items-center gap-1 min-w-[64px] transition-all active:scale-90 {{ request()->is('guru-tendik*') ? 'text-teal-600' : 'text-slate-400' }}">
            <div class="relative">
                <i class="ti ti-users text-2xl"></i>
                @if(request()->is('guru-tendik*'))
                    <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-teal-500 rounded-full"></div>
                @endif
            </div>
            <span class="text-[10px] font-bold tracking-tight">Guru</span>
        </a>

        <!-- Login -->
        <a href="/login" class="flex flex-col items-center gap-1 min-w-[64px] transition-all active:scale-90 {{ request()->is('login*') ? 'text-teal-600' : 'text-slate-400' }}">
            <div class="relative">
                <i class="ti ti-login text-2xl"></i>
                @if(request()->is('login*'))
                    <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-teal-500 rounded-full"></div>
                @endif
            </div>
            <span class="text-[10px] font-bold tracking-tight">Masuk</span>
        </a>
    </div>
</div>
