<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - {{ $pengaturan->nama_sekolah ?? 'Pesantren Al Amin' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Montserrat:wght@400;500;600;700;800;900&family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-[#faf9f6] text-stone-800 font-sans selection:bg-[#bef264] selection:text-[#062d27] antialiased" x-data="{ sidebarOpen: true }">

    <div class="flex min-h-screen">
        <!-- ============================================ -->
        <!-- SIDEBAR -->
        <!-- ============================================ -->
        <aside class="w-[260px] bg-white border-r border-stone-200/80 flex flex-col h-screen sticky top-0 shrink-0 shadow-2xs z-30">
            
            <!-- School Brand Header -->
            <div class="flex items-center justify-between px-5 h-[72px] border-b border-stone-100">
                <a href="/dashboard" class="flex items-center gap-3">
                    @php
                        $pengaturanUmum = $pengaturan ?? \App\Models\PengaturanUmum::first();
                        $logoUrl = optional($pengaturanUmum)->logo
                            ? config('app.admin_url') . '/storage/' . $pengaturanUmum->logo
                            : asset('assets/img/logo/persisalamin.png');
                    @endphp
                    <div class="w-10 h-10 rounded-xl bg-[#062d27] p-1.5 flex items-center justify-center border border-emerald-800/40 shadow-xs shrink-0">
                        <img src="{{ $logoUrl }}" class="w-full h-full object-contain" alt="Logo">
                    </div>
                    <div>
                        <span class="font-extrabold text-sm text-[#062d27] tracking-tight block font-montserrat leading-tight">Portal SPMB</span>
                        <span class="text-[11px] text-stone-400 font-semibold block leading-none mt-0.5">Pesantren Al Amin</span>
                    </div>
                </a>
            </div>

            <!-- User Selector / Quick Card -->
            <div class="px-4 pt-5 pb-3">
                <div class="flex items-center gap-3 p-3 rounded-2xl bg-[#faf9f6] border border-stone-200/70">
                    <div class="w-9 h-9 bg-[#062d27] rounded-xl flex items-center justify-center text-[#bef264] font-black text-xs font-montserrat shadow-xs shrink-0">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-[12px] font-bold text-[#062d27] truncate font-montserrat">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] text-stone-500 font-medium font-mono truncate">{{ Auth::user()->username }}</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-2 overflow-y-auto space-y-6">
                <!-- MAIN Section -->
                <div>
                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider px-3 mb-2 font-montserrat">Menu Utama</p>
                    <div class="space-y-1">
                        <a href="/dashboard"
                            class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all font-montserrat {{ request()->is('dashboard') ? 'bg-[#062d27] text-[#bef264] shadow-sm' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                            <i class="ti ti-smart-home text-base"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="/biodata"
                            class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all font-montserrat {{ request()->is('biodata*') ? 'bg-[#062d27] text-[#bef264] shadow-sm' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                            <i class="ti ti-file-text text-base"></i>
                            <span>Biodata Santri</span>
                        </a>
                        <a href="/pembayaran"
                            class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all font-montserrat {{ request()->is('pembayaran*') ? 'bg-[#062d27] text-[#bef264] shadow-sm' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                            <i class="ti ti-credit-card text-base"></i>
                            <span>Pembayaran</span>
                        </a>
                    </div>
                </div>

                <!-- SETTINGS Section -->
                <div>
                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider px-3 mb-2 font-montserrat">Pengaturan</p>
                    <div class="space-y-1">
                        <a href="/password"
                            class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all font-montserrat {{ request()->is('password*') ? 'bg-[#062d27] text-[#bef264] shadow-sm' : 'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">
                            <i class="ti ti-lock text-base"></i>
                            <span>Ganti Kata Sandi</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Bottom Helpdesk & Logout -->
            <div class="px-4 pb-4 space-y-3 pt-2 border-t border-stone-100">
                <!-- Help Card -->
                <div class="p-3.5 bg-emerald-50/70 rounded-2xl border border-emerald-100">
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="text-xs font-bold text-[#062d27] font-montserrat">Bantuan Panitia</span>
                        <span class="text-[10px] font-black bg-[#bef264] text-[#062d27] px-2 py-0.5 rounded-full">SPMB</span>
                    </div>
                    <p class="text-[11px] text-emerald-900/75 mb-2.5 leading-relaxed font-medium">Ada kendala dalam pengisian formulir?</p>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturanUmum->telepon ?? '') }}?text=Halo%20Panitia%20SPMB,%20saya%20membutuhkan%20bantuan%20pendaftaran"
                        target="_blank"
                        class="flex items-center justify-center gap-1.5 w-full bg-[#062d27] hover:bg-emerald-900 text-white text-center py-2 rounded-xl text-xs font-bold transition-all shadow-xs font-montserrat">
                        <i class="ti ti-brand-whatsapp text-sm text-[#bef264]"></i>
                        <span>WhatsApp Panitia</span>
                    </a>
                </div>

                <!-- Logout Button -->
                <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs text-rose-600 hover:bg-rose-50 transition-all font-bold group font-montserrat">
                    <div class="w-7 h-7 rounded-lg bg-rose-50 flex items-center justify-center group-hover:bg-rose-100 transition-colors">
                        <i class="ti ti-logout text-base"></i>
                    </div>
                    <span>Keluar dari Akun</span>
                </a>
            </div>
        </aside>

        <!-- ============================================ -->
        <!-- MAIN CONTENT AREA -->
        <!-- ============================================ -->
        <main class="flex-1 flex flex-col min-w-0">
            <!-- Top Bar -->
            <header class="bg-white border-b border-stone-200/80 h-[72px] flex items-center justify-between px-8 sticky top-0 z-20 shadow-2xs">
                <div class="flex items-center gap-3">
                    <h1 class="text-lg font-black text-[#062d27] font-montserrat">@yield('title', 'Dashboard')</h1>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-900 text-[11px] font-bold font-montserrat">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Portal Santri Baru</span>
                    </span>
                </div>

                <div class="flex items-center gap-4">
                    <a href="/" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 text-xs font-bold text-stone-500 hover:text-emerald-800 transition-colors font-montserrat">
                        <i class="ti ti-external-link text-sm"></i>
                        <span>Lihat Website</span>
                    </a>

                    <div class="h-5 w-px bg-stone-200 hidden sm:block"></div>

                    <!-- Profile Avatar Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <div @click="open = !open"
                            class="flex items-center gap-3 px-3 py-1.5 rounded-2xl hover:bg-stone-50 transition-all cursor-pointer group">
                            <div class="text-right hidden md:block">
                                <p class="text-xs font-bold text-[#062d27] leading-tight font-montserrat">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] text-stone-400 font-medium leading-tight">Calon Santri</p>
                            </div>
                            <div class="w-9 h-9 rounded-xl bg-[#062d27] text-[#bef264] border border-emerald-900/30 flex items-center justify-center font-bold text-xs shadow-xs font-montserrat">
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </div>
                            <i class="ti ti-chevron-down text-stone-400 text-xs transition-transform" :class="open ? 'rotate-180' : ''"></i>
                        </div>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            class="absolute right-0 mt-2 w-52 bg-white border border-stone-200/90 rounded-2xl shadow-xl py-2 z-50">
                            <div class="px-4 py-2 border-b border-stone-100 mb-1">
                                <p class="text-xs font-bold text-[#062d27] font-montserrat">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] text-stone-400 font-mono">{{ Auth::user()->username }}</p>
                            </div>
                            <a href="/biodata" class="flex items-center gap-2 px-4 py-2 text-xs font-semibold text-stone-600 hover:bg-stone-50 hover:text-stone-900">
                                <i class="ti ti-file-text text-sm text-emerald-800"></i>
                                <span>Biodata Santri</span>
                            </a>
                            <a href="/password" class="flex items-center gap-2 px-4 py-2 text-xs font-semibold text-stone-600 hover:bg-stone-50 hover:text-stone-900">
                                <i class="ti ti-lock text-sm text-emerald-800"></i>
                                <span>Ganti Password</span>
                            </a>
                            <div class="border-t border-stone-100 my-1"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-xs text-rose-600 hover:bg-rose-50 font-bold flex items-center gap-2 font-montserrat">
                                    <i class="ti ti-logout text-sm"></i>
                                    <span>Keluar Akun</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-6 lg:p-8 flex-1">
                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>

</html>