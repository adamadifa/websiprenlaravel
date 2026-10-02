<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - Al Amin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        * {
            font-family: 'Inter', sans-serif;
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

        /* Sidebar active indicator */
        .nav-active {
            background: #f0f0f0;
            color: #111;
            font-weight: 600;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-[#fafafa] text-gray-900 antialiased" x-data="{ sidebarOpen: true, darkMode: false }">

    <div class="flex min-h-screen">
        <!-- ============================================ -->
        <!-- SIDEBAR - Exact match to reference -->
        <!-- ============================================ -->
        <aside class="w-[250px] bg-white border-r border-gray-100 flex flex-col h-screen sticky top-0 shrink-0">
            <!-- Logo + Collapse -->
            <div class="flex items-center justify-between px-5 h-[68px] border-b border-gray-100">
                <div class="flex items-center gap-2.5">
                    @php
                        $pengaturan = \App\Models\PengaturanUmum::first();
                        $logoUrl = optional($pengaturan)->logo
                            ? config('app.admin_url') . '/storage/' . $pengaturan->logo
                            : asset('assets/img/logo/persisalamin.png');
                    @endphp
                    <img src="{{ $logoUrl }}" class="w-8 h-8 object-contain" alt="Logo">
                    <span class="font-extrabold text-[15px] text-gray-900 tracking-tight">SPMB</span>
                </div>
                <button
                    class="w-7 h-7 rounded-md hover:bg-gray-100 flex items-center justify-center text-gray-400 transition-colors">
                    <i class="ti ti-layout-sidebar-left-collapse text-lg"></i>
                </button>
            </div>

            <!-- User Selector -->
            <div class="px-4 pt-5 pb-3">
                <div
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl border border-gray-200 hover:border-gray-300 cursor-pointer transition-colors">
                    <div
                        class="w-7 h-7 bg-teal-100 rounded-full flex items-center justify-center text-teal-700 font-bold text-xs">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <span
                        class="text-[13px] font-semibold text-gray-700 flex-1 truncate">{{ Auth::user()->name }}</span>
                    <i class="ti ti-selector text-gray-400 text-sm"></i>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 overflow-y-auto">
                <!-- MAIN Section -->
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.12em] px-3 mb-2 mt-2">Main</p>
                <div class="space-y-0.5">
                    <a href="/dashboard"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] transition-all {{ request()->is('dashboard') ? 'nav-active' : 'text-gray-500 hover:bg-gray-50' }}">
                        <i class="ti ti-smart-home text-[18px]"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="/biodata"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] transition-all {{ request()->is('biodata*') ? 'nav-active' : 'text-gray-500 hover:bg-gray-50' }}">
                        <i class="ti ti-file-text text-[18px]"></i>
                        <span>Biodata Santri</span>
                    </a>
                    <a href="/pembayaran"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] transition-all {{ request()->is('pembayaran*') ? 'nav-active' : 'text-gray-500 hover:bg-gray-50' }}">
                        <i class="ti ti-credit-card text-[18px]"></i>
                        <span>Pembayaran</span>
                    </a>

                </div>

                <!-- SETTINGS Section -->
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.12em] px-3 mb-2 mt-6">Pengaturan</p>
                <div class="space-y-0.5">
                    <a href="/password"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] transition-all {{ request()->is('password*') ? 'nav-active' : 'text-gray-500 hover:bg-gray-50' }}">
                        <i class="ti ti-lock text-[18px]"></i>
                        <span>Ganti Password</span>
                    </a>

                </div>
            </nav>

            <!-- Bottom Section -->
            <div class="px-4 pb-4 space-y-3">


                <!-- Upgrade Card -->
                <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-[13px] font-semibold text-gray-700">Butuh Bantuan</span>
                        <span class="text-[10px] font-bold bg-teal-500 text-white px-2 py-0.5 rounded-full">Admin</span>
                    </div>
                    <p class="text-[11px] text-gray-400 mb-3 leading-relaxed">Ada kendala? Hubungi panitia PPDB Al Amin
                        untuk bantuan.</p>
                    <a href="#"
                        class="block w-full bg-gray-900 text-white text-center py-2.5 rounded-xl text-[12px] font-semibold hover:bg-gray-800 transition-colors">
                        Hubungi Admin
                    </a>
                </div>

                <!-- Logout Button -->
                <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] text-rose-600 hover:bg-rose-50 transition-all font-bold group">
                    <div
                        class="w-8 h-8 rounded-lg bg-rose-50 flex items-center justify-center group-hover:bg-rose-100 transition-colors">
                        <i class="ti ti-logout text-[18px]"></i>
                    </div>
                    <span>Keluar Akun</span>
                </a>
            </div>
        </aside>

        <!-- ============================================ -->
        <!-- MAIN CONTENT AREA -->
        <!-- ============================================ -->
        <main class="flex-1 flex flex-col min-w-0">
            <!-- Top Bar - Exact match -->
            <header
                class="bg-white border-b border-gray-100 h-[68px] flex items-center justify-between px-8 sticky top-0 z-40">
                <div class="flex items-center gap-2">
                    <h1 class="text-[20px] font-bold text-gray-900">@yield('title', 'Dashboard')</h1>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Profile Avatar with Logout -->
                    <div class="relative" x-data="{ open: false }">
                        <div @click="open = !open"
                            class="flex items-center gap-3 px-3 py-1.5 rounded-xl hover:bg-gray-50 transition-all cursor-pointer group">
                            <div class="text-right hidden md:block">
                                <p class="text-[12px] font-bold text-gray-900 leading-tight">{{ Auth::user()->name }}
                                </p>
                                <p class="text-[10px] text-gray-400 font-medium leading-tight">Calon Santri</p>
                            </div>
                            <div
                                class="w-9 h-9 rounded-full bg-teal-50 border border-teal-200 flex items-center justify-center text-teal-700 font-bold text-sm group-hover:ring-2 group-hover:ring-teal-200 transition-all">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </div>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-xl py-2 z-50">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 font-bold flex items-center gap-2">
                                    <i class="ti ti-logout text-lg"></i>
                                    Keluar Akun
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>

</html>