@extends('layouts.frontend')

@section('title', '404 - Halaman Tidak Ditemukan')

@section('content')
<div class="relative min-h-[80vh] flex items-center justify-center pt-36 pb-20 px-6 overflow-hidden">
    <!-- Decorative Blurry Orbs specific to 404 page -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[350px] h-[350px] bg-teal-500/10 rounded-full blur-[80px] pointer-events-none z-0"></div>
    <div class="absolute top-[30%] right-[20%] w-[200px] h-[200px] bg-yellow-400/5 rounded-full blur-[60px] pointer-events-none z-0"></div>

    <div class="container max-w-2xl mx-auto text-center relative z-10" data-aos="zoom-in" data-aos-duration="800">
        <!-- Giant Interactive 404 Illustration -->
        <div class="relative w-48 h-48 flex items-center justify-center mb-8 mx-auto">
            <!-- Pulsing outer ring -->
            <div class="absolute inset-4 bg-teal-500/5 rounded-full animate-pulse border border-teal-500/10 z-0"></div>
            <div class="absolute inset-0 bg-teal-500/[0.02] rounded-full animate-ping border border-teal-500/5 z-0" style="animation-duration: 3s;"></div>

            <!-- Central Icon Container -->
            <div class="relative w-32 h-32 bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl flex items-center justify-center z-10 transform hover:scale-105 hover:rotate-3 transition-all duration-500">
                <div class="absolute inset-2 bg-gradient-to-br from-teal-50 to-white rounded-[2rem] z-0"></div>
                <i class="ti ti-error-404 text-7xl bg-gradient-to-br from-teal-700 to-teal-950 bg-clip-text text-transparent relative z-10 animate-bounce" style="animation-duration: 4s;"></i>
            </div>

            <!-- Floating Badges -->
            <span class="absolute top-4 right-1 px-3 py-1 bg-yellow-400 text-teal-950 text-[10px] font-black rounded-full uppercase tracking-wider shadow-lg transform rotate-12 animate-pulse z-20 whitespace-nowrap">
                Lost!
            </span>
            <span class="absolute bottom-4 left-1 px-3 py-1 bg-teal-600 text-white text-[10px] font-black rounded-full uppercase tracking-wider shadow-lg transform -rotate-12 z-20 whitespace-nowrap">
                Oops...
            </span>
        </div>

        <!-- Typography Content -->
        <h1 class="text-4xl md:text-5xl font-black text-teal-950 font-poppins mb-4 tracking-tight leading-none">
            Halaman Tidak Ditemukan
        </h1>
        <p class="text-gray-500 text-sm md:text-base max-w-md mx-auto mb-10 leading-relaxed font-medium">
            Mohon maaf, halaman yang Anda cari tidak tersedia, telah dihapus, atau alamat URL yang dimasukkan salah. Mari kembali ke jalur yang benar.
        </p>

        <!-- Dynamic Action Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="/" class="group flex items-center justify-center gap-2 w-full sm:w-auto bg-gradient-to-r from-teal-700 to-teal-800 text-white font-extrabold px-8 py-4 rounded-2xl shadow-xl shadow-teal-950/10 hover:from-teal-800 hover:to-teal-900 transition-all transform hover:-translate-y-1 uppercase tracking-widest text-xs">
                <i class="ti ti-smart-home text-lg transform group-hover:-translate-y-0.5 transition-transform"></i>
                Kembali ke Beranda
            </a>
            
            <a href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" target="_blank" class="group flex items-center justify-center gap-2 w-full sm:w-auto bg-white text-gray-700 border border-gray-200/80 font-extrabold px-8 py-4 rounded-2xl shadow-sm hover:bg-gray-50 hover:text-teal-700 transition-all transform hover:-translate-y-1 uppercase tracking-widest text-xs">
                <i class="ti ti-brand-whatsapp text-lg text-[#25D366]"></i>
                Hubungi Bantuan
            </a>
        </div>

        <!-- Decorative Info Link -->
        <div class="mt-16 pt-8 border-t border-gray-100 max-w-xs mx-auto">
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-1">Butuh info lain?</span>
            <a href="/tentang-pesantren" class="text-teal-600 hover:text-teal-800 font-bold text-xs hover:underline">
                Pelajari Tentang Pesantren &rarr;
            </a>
        </div>
    </div>
</div>
@endsection
