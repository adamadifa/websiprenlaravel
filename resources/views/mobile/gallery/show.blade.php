@extends('layouts.mobile')

@section('title', $album->title . ' - Galeri Al Amin')

@section('content')
<!-- Header Area -->
<div class="bg-[#062d27] pt-6 pb-8 px-5 relative overflow-hidden text-white border-b border-emerald-900/60">
    <!-- Back Button -->
    <a href="{{ route('gallery.index') }}" class="inline-flex items-center gap-1.5 text-emerald-200/90 hover:text-white transition-colors mb-4 text-xs font-bold font-poppins">
        <i class="ti ti-arrow-left"></i>
        <span>Kembali ke Galeri</span>
    </a>

    <div class="relative z-10" data-aos="fade-down">
        <h1 class="text-xl font-black text-white leading-tight mb-2 font-poppins">{{ $album->title }}</h1>
        <div class="flex items-center gap-3 text-[11px] text-emerald-200/80 font-medium font-poppins">
            <span class="flex items-center gap-1">
                <i class="ti ti-calendar text-emerald-400"></i>
                {{ $album->created_at ? $album->created_at->translatedFormat('d M Y') : '-' }}
            </span>
            <span>•</span>
            <span class="flex items-center gap-1 text-[#bef264] font-bold">
                <i class="ti ti-camera"></i>
                {{ $album->photos->count() }} Foto
            </span>
        </div>
    </div>
</div>

@php
    $photosJsonMobile = $album->photos->map(function($p) {
        return [
            'id' => $p->id,
            'title' => $p->title ?: '',
            'url' => $p->getAdminImageUrl($p->path),
        ];
    })->values()->toJson();
@endphp

<div 
    class="px-5 pt-6 pb-24 bg-[#faf9f6] min-h-screen"
    x-data="{ 
        open: false, 
        activeIndex: 0,
        photos: {{ $photosJsonMobile }},
        openModal(idx) {
            this.activeIndex = idx;
            this.open = true;
            document.body.classList.add('overflow-hidden');
        },
        closeModal() {
            this.open = false;
            document.body.classList.remove('overflow-hidden');
        },
        next() {
            if (this.photos.length > 0) {
                this.activeIndex = (this.activeIndex + 1) % this.photos.length;
            }
        },
        prev() {
            if (this.photos.length > 0) {
                this.activeIndex = (this.activeIndex - 1 + this.photos.length) % this.photos.length;
            }
        }
    }"
    @keydown.escape.window="closeModal()"
>
    <!-- Album Description -->
    @if($album->description)
        <div class="mb-6 bg-white p-4 rounded-2xl border border-stone-200/80 shadow-xs" data-aos="fade-up">
            <p class="text-xs text-gray-600 leading-relaxed font-normal">{{ $album->description }}</p>
        </div>
    @endif

    <!-- Photo Grid -->
    @if($album->photos->count() > 0)
        <div class="grid grid-cols-2 gap-3.5">
            @foreach($album->photos as $index => $photo)
                <div 
                    class="group relative aspect-square bg-white rounded-2xl overflow-hidden shadow-xs border border-stone-200/80 active:scale-95 transition-all" 
                    data-aos="zoom-in" 
                    data-aos-delay="{{ ($index % 4) * 50 }}"
                    @click="openModal({{ $index }})"
                >
                    <img 
                        src="{{ $photo->getAdminImageUrl($photo->path) }}" 
                        alt="{{ $photo->title ?: ('Foto ' . ($index + 1)) }}" 
                        class="w-full h-full object-cover"
                        loading="lazy"
                    >
                    <div class="absolute inset-0 bg-[#062d27]/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <div class="w-8 h-8 rounded-full bg-white/30 backdrop-blur-md text-white flex items-center justify-center">
                            <i class="ti ti-zoom-in text-base"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="py-16 text-center bg-white rounded-3xl border border-dashed border-stone-300 p-6" data-aos="fade-up">
            <i class="ti ti-photo-off text-4xl text-emerald-800/40 mb-3 block"></i>
            <p class="text-gray-500 font-medium text-xs">Belum ada foto dalam album ini.</p>
        </div>
    @endif

    <!-- Lightbox Modal (Alpine.js) -->
    <template x-teleport="body">
        <div 
            x-show="open" 
            x-cloak 
            class="fixed inset-0 z-[99999] flex items-center justify-center p-3"
        >
            <div 
                x-show="open" 
                x-transition:enter="transition ease-out duration-300" 
                x-transition:enter-start="opacity-0" 
                x-transition:enter-end="opacity-100" 
                class="absolute inset-0 bg-[#041a17]/95 backdrop-blur-md"
                @click="closeModal()"
            ></div>
            
            <div 
                x-show="open" 
                x-transition:enter="transition ease-out duration-300" 
                x-transition:enter-start="opacity-0 scale-90" 
                x-transition:enter-end="opacity-100 scale-100" 
                class="relative z-10 max-w-full w-full flex flex-col items-center justify-center"
            >
                <!-- Top Toolbar -->
                <div class="w-full flex items-center justify-between pb-3 text-white px-1">
                    <span class="text-xs text-emerald-200 font-poppins font-medium" x-text="`Foto ${activeIndex + 1} / ${photos.length}`"></span>
                    <button @click="closeModal()" class="w-9 h-9 bg-white/10 text-white rounded-full flex items-center justify-center backdrop-blur-md border border-white/20">
                        <i class="ti ti-x text-lg"></i>
                    </button>
                </div>

                <!-- Image with Prev/Next Controls -->
                <div class="relative w-full flex items-center justify-center overflow-hidden rounded-2xl bg-black/40 border border-white/10 p-1">
                    <button 
                        x-show="photos.length > 1"
                        @click="prev()" 
                        class="absolute left-2 top-1/2 -translate-y-1/2 z-20 w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center backdrop-blur-md"
                    >
                        <i class="ti ti-chevron-left text-xl"></i>
                    </button>

                    <img :src="photos[activeIndex]?.url" class="max-w-full max-h-[75vh] object-contain rounded-xl shadow-2xl">
                    
                    <button 
                        x-show="photos.length > 1"
                        @click="next()" 
                        class="absolute right-2 top-1/2 -translate-y-1/2 z-20 w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center backdrop-blur-md"
                    >
                        <i class="ti ti-chevron-right text-xl"></i>
                    </button>
                </div>

                <!-- Caption -->
                <div x-show="photos[activeIndex]?.title" class="w-full text-center pt-2 px-2">
                    <p class="text-white text-xs font-poppins" x-text="photos[activeIndex]?.title"></p>
                </div>
            </div>
        </div>
    </template>
</div>
@endsection
