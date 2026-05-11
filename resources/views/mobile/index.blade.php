@extends('layouts.mobile')
@section('meta_description', 'Official Website Pesantren Persatuan Islam 80 Al Amin - Lembaga Pendidikan Islam Terpadu, Tahfizh Al-Quran, dan Kaderisasi Miniatur Masyarakat Rabbani di Tasikmalaya.')

@section('title', 'Al Amin - Dashboard Mobile')

@section('content')
<!-- Hero Mobile -->
<section class="relative pt-6 pb-4 overflow-hidden dotted-background bg-white">
    <div class="container mx-auto px-6 relative z-10 text-center">

        <h1 class="text-3xl font-black text-teal-950 leading-[1.1] mb-6 font-poppins" data-aos="fade-up">
            {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}
        </h1>

        <div class="mb-10 relative inline-block" data-aos="fade-up" data-aos-delay="200">
            <p class="text-teal-700 text-lg font-black font-poppins relative z-10 px-4 py-1">
                Berakhlak Mulia, Tafaqquh Fiddien, Berprestasi
            </p>
            <svg class="absolute inset-0 w-full h-full pointer-events-none z-0 overflow-visible" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M 5,50 C 5,10 95,10 95,50 C 95,90 5,90 5,50 Z" class="animate-draw-circle" fill="none" stroke="#fbbf24" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

        <!-- Single Model -->
        <div class="relative max-w-[280px] mx-auto" data-aos="zoom-in" data-aos-delay="400">
            <!-- Ripple Background -->
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="ripple-anim scale-[0.8] mt-[-20%]"></div>
            </div>

            <!-- Floating Badge -->
            <div class="absolute top-1/2 -right-6 -translate-y-1/2 animate-float-badge z-20 scale-75">
                <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-4 shadow-2xl border border-white flex items-center gap-3 text-left">
                    <div class="w-10 h-10 bg-teal-500 rounded-xl flex items-center justify-center text-white">
                        <i class="ti ti-check text-xl"></i>
                    </div>
                    <div>
                        <div class="text-[10px] text-gray-500 font-bold uppercase">Ayo Bergabung</div>
                        <div class="text-xs font-black text-gray-800">Bersama Kami!</div>
                    </div>
                </div>
            </div>
            
            <!-- Floating Daftar Button -->
            <div class="absolute bottom-10 -left-6 animate-float-y z-30">
                <a href="/register" class="bg-teal-600 text-white font-black px-6 py-3 rounded-2xl shadow-xl shadow-teal-900/20 flex items-center gap-2 text-[10px] uppercase tracking-widest active:scale-95 transition-all border-2 border-white">
                    Daftar Sekarang
                    <i class="ti ti-arrow-right"></i>
                </a>
            </div>

            <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_2) : 'https://placehold.co/400x500?text=Model+2' }}" alt="Model" class="w-full h-auto drop-shadow-2xl relative z-10">
        </div>

        <!-- Alumni Slider Mobile (Menempel Model) -->
        <div class="relative z-20 -mt-6 mb-12">
            <div class="bg-white/80 backdrop-blur-md rounded-3xl p-6 border border-white shadow-xl shadow-teal-900/5">
                <div class="flex flex-col items-center gap-4">
                    <div class="text-center">
                        <h2 class="text-sm italic font-black text-teal-900 leading-tight">Sebaran Alumni</h2>
                    </div>
                    
                    <div class="w-full overflow-hidden relative">
                        <div class="flex items-center animate-marquee">
                            @foreach($alumni as $item)
                                <div class="mx-4">
                                    <img src="{{ $item->getAdminImageUrl($item->logo) }}" alt="{{ $item->nama_universitas }}" class="h-6 w-auto object-contain">
                                </div>
                            @endforeach
                            @foreach($alumni as $item)
                                <div class="mx-4">
                                    <img src="{{ $item->getAdminImageUrl($item->logo) }}" alt="{{ $item->nama_universitas }}" class="h-6 w-auto object-contain">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col gap-4" data-aos="fade-up" data-aos-delay="600">
            <a href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" class="w-full flex items-center justify-center gap-3 text-teal-800 font-bold px-8 py-4 rounded-2xl bg-teal-50 text-sm active:scale-95 transition-all">
                HUBUNGI KAMI
                <i class="ti ti-brand-whatsapp text-xl"></i>
            </a>
        </div>
    </div>
</section>

<div class="px-6 pt-8">
    <!-- Berita Terbaru (Horizontal Scroll) -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-black text-teal-950 font-poppins">Berita Terbaru</h2>
            <a href="/berita" class="text-[10px] font-black text-teal-600 uppercase">Lihat Semua</a>
        </div>
        
        <div class="flex gap-6 overflow-x-auto no-scrollbar -mx-6 px-6 pb-4">
            @foreach($news as $item)
            <a href="{{ route('news.show', $item->slug) }}" class="shrink-0 w-[280px] bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm active:scale-95 transition-transform">
                <div class="h-40 overflow-hidden relative">
                    <img src="{{ $item->getAdminImageUrl($item->image, 'posts') }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                    <div class="absolute top-3 left-3">
                        <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-lg text-[8px] font-black text-teal-900 uppercase">Berita</span>
                    </div>
                </div>
                <div class="p-5">
                    <h4 class="text-sm font-bold text-teal-950 line-clamp-2 leading-snug mb-3">{{ $item->title }}</h4>
                    <div class="flex items-center gap-2 text-[10px] text-gray-400 font-bold uppercase">
                        <i class="ti ti-calendar"></i>
                        <span>{{ $item->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Unit Pendidikan (Grid) -->
    <div class="mb-12">
        <h2 class="text-lg font-black text-teal-950 font-poppins mb-6">Unit Pendidikan</h2>
        <div class="grid grid-cols-2 gap-4">
            @foreach($units as $unit)
            <div class="bg-white p-5 rounded-3xl border border-gray-100 flex flex-col items-center text-center shadow-sm" data-aos="fade-up">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-4">
                    @if($unit->logo)
                        <img src="{{ $unit->getAdminImageUrl($unit->logo) }}" alt="{{ $unit->nama_unit }}" class="w-full h-full object-contain">
                    @else
                        <div class="w-full h-full bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600">
                            <i class="ti ti-building-mosque text-3xl"></i>
                        </div>
                    @endif
                </div>
                <h4 class="text-xs font-black text-teal-950 uppercase tracking-wider mb-1">{{ $unit->nama_unit }}</h4>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Al Amin</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Program Unggulan (Premium Dark) -->
    <div class="mb-12">
        <h2 class="text-lg font-black text-teal-950 font-poppins mb-6">Program Unggulan</h2>
        <div class="space-y-4">
            @foreach($unggulan as $item)
            <div class="bg-teal-900 p-6 rounded-3xl text-white relative overflow-hidden shadow-xl shadow-teal-950/20" data-aos="fade-up">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/5 rounded-full -mr-12 -mt-12"></div>
                <div class="flex gap-5 relative z-10">
                    <div class="shrink-0 w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-teal-300">
                        @php
                            $icons = [
                                'Pembentukan Karakter' => '<i class="ti ti-user-check text-2xl"></i>',
                                'Tahsin & Tahfizh Al Quran' => '<i class="ti ti-book-2 text-2xl"></i>',
                                'Bahasa Asing' => '<i class="ti ti-language text-2xl"></i>',
                                'Science' => '<i class="ti ti-flask text-2xl"></i>',
                            ];
                        @endphp
                        {!! $icons[$item->nama_program] ?? '<i class="ti ti-star text-2xl"></i>' !!}
                    </div>
                    <div>
                        <h3 class="text-sm font-black mb-1 uppercase tracking-wider">{{ $item->nama_program }}</h3>
                        <p class="text-teal-100/60 text-[10px] leading-relaxed line-clamp-2 font-medium">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Testimonials (Horizontal Scroll) -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-lg font-black text-teal-950 font-poppins">Apa Kata Mereka?</h2>
                <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest mt-1">Testimoni Wali & Alumni</p>
            </div>
        </div>
        
        <div class="flex gap-4 overflow-x-auto no-scrollbar snap-x snap-mandatory -mx-6 px-6 pb-4">
            @forelse($testimonials as $testi)
            <div class="shrink-0 w-[85%] snap-center">
                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm relative h-full flex flex-col">
                    <div class="absolute top-6 right-6 text-teal-50">
                        <i class="ti ti-quote text-5xl"></i>
                    </div>
                    
                    <p class="text-gray-600 italic text-sm leading-relaxed mb-6 relative z-10">
                        "{{ $testi->testimoni }}"
                    </p>
                    
                    <div class="mt-auto flex items-center gap-4">
                        <div class="shrink-0">
                            @if($testi->foto)
                                <img src="{{ $testi->getAdminImageUrl($testi->foto) }}" alt="{{ $testi->nama }}" class="w-12 h-12 rounded-full object-cover border-2 border-teal-50 shadow-sm">
                            @else
                                <div class="w-12 h-12 rounded-full bg-teal-950 flex items-center justify-center text-white font-bold text-xs">
                                    {{ collect(explode(' ', $testi->nama))->map(fn($n) => substr($n, 0, 1))->take(2)->join('') }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <h4 class="font-bold text-teal-900 text-sm mb-0.5">{{ $testi->nama }}</h4>
                            <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest">Wali Santri / Alumni</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-gray-400 italic text-sm px-6">Belum ada testimoni.</p>
            @endforelse
        </div>
    </div>

    <!-- Wall of Fame (Vertical Slider) -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-black text-teal-950 font-poppins">Wall of Fame</h2>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></span>
                <span class="text-[10px] font-black text-yellow-600 uppercase">Prestasi Siswa</span>
            </div>
        </div>

        <div class="relative h-[420px] overflow-hidden rounded-[2.5rem] bg-teal-900/5 p-4 border border-teal-100">
            <!-- Fade Overlay -->
            <div class="absolute inset-x-0 top-0 h-12 bg-gradient-to-b from-white/90 to-transparent z-10"></div>
            <div class="absolute inset-x-0 bottom-0 h-12 bg-gradient-to-t from-white/90 to-transparent z-10"></div>

            <div class="animate-marquee-vertical space-y-4">
                @foreach($prestasi as $item)
                <div class="flex items-center gap-4 p-4 bg-white rounded-3xl border border-gray-100 shadow-sm">
                    <div class="shrink-0 w-12 h-12 rounded-2xl overflow-hidden bg-gray-100">
                        @if($item->foto)
                            <img src="{{ $item->getAdminImageUrl($item->foto) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-teal-600 text-white font-black text-xs">
                                {{ substr($item->nama_siswa, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-xs font-black text-teal-950 truncate">{{ $item->prestasi }}</h4>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mt-0.5">{{ $item->nama_siswa }}</p>
                    </div>
                    <div class="text-yellow-500">
                        <i class="ti ti-award text-2xl"></i>
                    </div>
                </div>
                @endforeach
                {{-- Duplicate --}}
                @foreach($prestasi as $item)
                <div class="flex items-center gap-4 p-4 bg-white rounded-3xl border border-gray-100 shadow-sm">
                    <div class="shrink-0 w-12 h-12 rounded-2xl overflow-hidden bg-gray-100">
                        @if($item->foto)
                            <img src="{{ $item->getAdminImageUrl($item->foto) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-teal-600 text-white font-black text-xs">
                                {{ substr($item->nama_siswa, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-xs font-black text-teal-950 truncate">{{ $item->prestasi }}</h4>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mt-0.5">{{ $item->nama_siswa }}</p>
                    </div>
                    <div class="text-yellow-500">
                        <i class="ti ti-award text-2xl"></i>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        display: flex;
        width: max-content;
        animation: marquee 20s linear infinite;
    }
    @keyframes marquee-vertical {
        0% { transform: translateY(0); }
        100% { transform: translateY(-50%); }
    }
    .animate-marquee-vertical {
        animation: marquee-vertical 30s linear infinite;
    }
    .animate-marquee-vertical:hover {
        animation-play-state: paused;
    }
    .ripple-anim::before, .ripple-anim::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100px;
        height: 100px;
        background: rgba(20, 184, 166, 0.15);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        animation: ripple 4s infinite;
    }
    .ripple-anim::after { animation-delay: 2s; }
    @keyframes ripple {
        0% { width: 0; height: 0; opacity: 1; }
        100% { width: 600px; height: 600px; opacity: 0; }
    }
    @keyframes float-badge {
        0%, 100% { transform: translateY(-50%) translateX(0); }
        50% { transform: translateY(-60%) translateX(10px); }
    }
    .animate-float-badge { animation: float-badge 5s ease-in-out infinite; }
    .animate-draw-circle {
        stroke-dasharray: 400;
        stroke-dashoffset: 400;
        animation: draw-path 3s ease-in-out infinite alternate;
        opacity: 0.4;
        transform: rotate(-1deg);
    }
    @keyframes draw-path {
        0% { stroke-dashoffset: 400; }
        100% { stroke-dashoffset: 0; }
    }
    .dotted-background {
        background-image: radial-gradient(#0d9488 0.5px, transparent 0.5px);
        background-size: 20px 20px;
    }
</style>
@endsection
