@extends('layouts.frontend')

@section('title', $album->title . ' - Galeri Al Amin')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-teal-900">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl -ml-48 -mt-48"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-400 rounded-full blur-3xl -mr-48 -mb-48"></div>
    </div>
    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="flex flex-col md:flex-row items-center gap-8 text-center md:text-left">
            <a href="{{ route('gallery.index') }}" class="shrink-0 w-16 h-16 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-white transition-all transform hover:-translate-x-2">
                <i class="ti ti-chevron-left text-3xl"></i>
            </a>
            <div>
                <span class="text-yellow-400 font-bold text-sm mb-1 block">Galeri Album</span>
                <h1 class="text-4xl md:text-6xl font-black text-white font-poppins leading-[1.1]">
                    {{ $album->title }}
                </h1>
                <p class="text-teal-100 mt-2 max-w-2xl leading-relaxed opacity-80">
                    {{ $album->description }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Photo Grid -->
<section class="py-24 bg-white" x-data="{ open: false, activeImg: '' }">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
            @foreach($album->photos as $index => $photo)
            <div 
                class="group relative aspect-square rounded-2xl md:rounded-3xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500" 
                data-aos="zoom-in" 
                data-aos-delay="{{ ($index % 4) * 100 }}"
                @click="open = true; activeImg = '{{ $photo->getAdminImageUrl($photo->path) }}'"
            >
                <img src="{{ $photo->getAdminImageUrl($photo->path) }}" alt="{{ $photo->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                
                <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-teal-950/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-teal-900 scale-50 group-hover:scale-100 transition-transform duration-300">
                        <i class="ti ti-zoom-in text-2xl"></i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[10001] flex items-center justify-center p-4 md:p-10 bg-teal-950/95 backdrop-blur-md"
        @keydown.escape.window="open = false"
        style="display: none;"
    >
        <!-- Close Button -->
        <button @click="open = false" class="absolute top-8 right-8 text-white/70 hover:text-white transition-colors">
            <i class="ti ti-x text-5xl"></i>
        </button>

        <!-- Image Container -->
        <div class="relative max-w-5xl w-full h-full flex items-center justify-center" @click.away="open = false">
            <img :src="activeImg" class="max-w-full max-h-full object-contain rounded-xl shadow-2xl">
        </div>
    </div>
</section>
@endsection
