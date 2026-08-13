<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>@yield('title', 'Al Amin Mobile')</title>
    
    <!-- Fonts (Preconnect & Preload Optimization) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    
    <!-- Icons (Asynchronous Loading) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" media="print" onload="this.media='all'">
    
    <!-- AOS (Animate On Scroll - Asynchronous Loading) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" media="print" onload="this.media='all'">
    
    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { -webkit-tap-highlight-color: transparent; }
    </style>
</head>
<body class="antialiased bg-slate-50">
    @php
        $isAuthPage = request()->is('dashboard*', 'biodata*', 'pembayaran*', 'password*', 'login*', 'register*');
    @endphp

    @if(!$isAuthPage)
        @include('layouts.partials.header-mobile')
    @endif

    <main class="{{ !$isAuthPage ? 'pt-[88px]' : '' }} {{ !$isAuthPage ? 'pb-24' : 'pb-10' }}">
        @yield('content')
    </main>

    @if(!$isAuthPage)
        @include('layouts.partials.bottom-nav-mobile')
    @endif

    <!-- AOS (Animate On Scroll) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        window.addEventListener('load', function() {
            requestAnimationFrame(() => {
                setTimeout(() => {
                    AOS.init({
                        duration: 800,
                        once: true,
                        offset: 50,
                        easing: 'ease-out-cubic',
                        disableMutationObserver: true
                    });
                }, 100);
            });
        });
    </script>
</body>
</html>
