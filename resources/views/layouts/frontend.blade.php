<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Al Amin Pesantren')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}" type="image/x-icon">
    
    @include('layouts.partials.seo')

    <!-- Fonts (Preconnect & Preload Optimization) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;600;700;800;900&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    
    <!-- Icons (Asynchronous Loading) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" media="print" onload="this.media='all'">
    
    <!-- AOS (Animate On Scroll - Asynchronous Loading) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" media="print" onload="this.media='all'">
    
    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="antialiased">
    <div class="relative bg-gradient-to-b from-[#f0f5ff] to-white min-h-screen font-sans overflow-x-hidden">
        <!-- Aurora Gradient Background -->
        <div class="absolute top-0 left-0 w-[300px] h-[300px] bg-gradient-to-tr from-teal-500 via-teal-300 to-teal-200 opacity-35 rounded-full blur-3xl z-0 pointer-events-none"></div>
        <div class="absolute top-[40%] left-0 w-[250px] h-[250px] bg-gradient-to-tr from-teal-200 via-teal-100 to-yellow-100 opacity-15 rounded-full blur-2xl z-0 pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-[280px] h-[280px] bg-gradient-to-tr from-teal-400 via-teal-300 to-teal-200 opacity-30 rounded-full blur-3xl z-0 pointer-events-none"></div>

        @include('layouts.partials.header')

        <main>
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" target="_blank" class="fixed bottom-10 right-10 z-50 w-16 h-16 bg-[#25D366] text-white rounded-2xl flex items-center justify-center shadow-2xl shadow-[#25D366]/30 hover:-translate-y-2 active:scale-95 transition-all duration-300">
        <i class="ti ti-brand-whatsapp text-4xl"></i>
    </a>

    <!-- AOS (Animate On Scroll) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        window.addEventListener('load', function() {
            requestAnimationFrame(() => {
                setTimeout(() => {
                    AOS.init({
                        duration: 1000,
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
