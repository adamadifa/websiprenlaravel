<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
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
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@400;600;700;800;900&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="antialiased bg-white text-gray-800 font-sans selection:bg-[#bef264] selection:text-[#062d27]">
    <div class="relative min-h-screen font-sans overflow-x-hidden">

        @include('layouts.partials.header')

        <main>
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" target="_blank" class="fixed bottom-8 right-8 z-50 w-14 h-14 bg-[#25D366] text-white rounded-2xl flex items-center justify-center shadow-xl shadow-[#25D366]/30 hover:-translate-y-1.5 active:scale-95 transition-all duration-300" aria-label="Hubungi Kami melalui WhatsApp">
        <i class="ti ti-brand-whatsapp text-3xl"></i>
    </a>

    <!-- AOS (Animate On Scroll) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script>
        window.addEventListener('load', function() {
            requestAnimationFrame(() => {
                setTimeout(() => {
                    AOS.init({
                        duration: 800,
                        once: true,
                        offset: 40,
                        easing: 'ease-out-cubic',
                    });
                }, 100);
            });
        });
    </script>
</body>
</html>
