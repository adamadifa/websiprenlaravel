@extends('layouts.frontend')

@section('title', $album->title . ' - Galeri Al Amin')
@section('meta_description', ($album->description ?: 'Dokumentasi album foto kegiatan ' . $album->title) . ' - Pesantren Persatuan Islam 80 Al Amin Sindangkasih.')

@section('content')
<!-- Hero / Header Section -->
<section class="relative pt-28 sm:pt-32 pb-10 sm:pb-12 bg-[#062d27] text-white border-b border-emerald-900/60 overflow-hidden">
    <!-- Ambient Background Overlay -->
    @if($pengaturan && !empty($pengaturan->background_login))
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20">
            <img 
                src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                alt="Pesantren Al Amin Background" 
                class="w-full h-full object-cover grayscale mix-blend-luminosity scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#062d27] via-[#062d27]/90 to-[#062d27]/70"></div>
        </div>
    @endif

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        
        <!-- Top Bar: Back & Breadcrumbs -->
        <div class="flex flex-wrap items-center justify-between gap-3 mb-6 pb-3 border-b border-emerald-800/40" data-aos="fade-down">
            <a href="{{ route('gallery.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-emerald-100 hover:text-white px-3.5 py-1.5 rounded-xl text-xs font-bold font-poppins backdrop-blur-md border border-white/10 transition-all">
                <i class="ti ti-arrow-left"></i>
                <span>Kembali ke Galeri</span>
            </a>

            <nav class="flex items-center gap-2 text-emerald-300/70 text-[11px] sm:text-xs font-bold uppercase tracking-wider font-poppins">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <i class="ti ti-chevron-right text-[9px] text-emerald-400/60"></i>
                <a href="{{ route('gallery.index') }}" class="hover:text-white transition-colors">Galeri</a>
                <i class="ti ti-chevron-right text-[9px] text-emerald-400/60"></i>
                <span class="text-[#bef264] max-w-[180px] sm:max-w-none truncate">{{ $album->title }}</span>
            </nav>
        </div>

        <!-- Album Title & Meta -->
        <div class="max-w-4xl">
            <div class="flex flex-wrap items-center gap-3 mb-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-800/60 backdrop-blur-md text-[#bef264] text-xs font-bold font-poppins border border-emerald-600/30">
                    <i class="ti ti-camera"></i>
                    {{ $album->photos->count() }} Foto
                </span>
                <span class="inline-flex items-center gap-1.5 text-emerald-200/80 text-xs font-medium font-poppins">
                    <i class="ti ti-calendar text-emerald-400"></i>
                    {{ $album->created_at ? $album->created_at->translatedFormat('d F Y') : '-' }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black font-poppins text-white tracking-tight leading-[1.2] mb-3" data-aos="fade-up">
                {{ $album->title }}
            </h1>

            @if($album->description)
                <p class="text-emerald-100/85 text-xs sm:text-sm lg:text-base leading-relaxed max-w-3xl font-normal" data-aos="fade-up" data-aos-delay="100">
                    {{ $album->description }}
                </p>
            @endif
        </div>

    </div>
</section>

<!-- Photos Grid Section with Lightbox -->
@php
    $photosJson = $album->photos->map(function($p) {
        return [
            'id' => $p->id,
            'title' => $p->title ?: '',
            'url' => $p->getAdminImageUrl($p->path),
        ];
    })->values()->toJson();
@endphp

<section 
    class="py-14 sm:py-20 bg-[#faf9f6] text-slate-800 relative min-h-[50vh]"
    x-data="{
        open: false,
        activeIndex: 0,
        photos: {{ $photosJson }},
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
    @keydown.left.window="if(open) prev()"
    @keydown.right.window="if(open) next()"
>
    <div class="container mx-auto px-6 lg:px-12">
        
        @if($album->photos->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach($album->photos as $index => $photo)
                    <div 
                        class="group relative aspect-square rounded-2xl sm:rounded-3xl overflow-hidden bg-stone-100 border border-stone-200/80 shadow-xs hover:shadow-xl hover:scale-[1.02] cursor-pointer transition-all duration-300"
                        data-aos="zoom-in"
                        data-aos-delay="{{ ($index % 4) * 60 }}"
                        @click="openModal({{ $index }})"
                    >
                        <img 
                            src="{{ $photo->getAdminImageUrl($photo->path) }}" 
                            alt="{{ $photo->title ?: ('Foto ' . ($index + 1) . ' - ' . $album->title) }}" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        >
                        
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-[#062d27]/90 via-[#062d27]/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4">
                            <div class="self-end">
                                <div class="w-9 h-9 rounded-xl bg-white/20 backdrop-blur-md text-white flex items-center justify-center shadow-md">
                                    <i class="ti ti-zoom-in text-lg"></i>
                                </div>
                            </div>
                            
                            @if($photo->title)
                                <p class="text-white text-xs font-semibold font-poppins line-clamp-2">
                                    {{ $photo->title }}
                                </p>
                            @else
                                <span class="text-emerald-200/90 text-[11px] font-medium font-poppins">
                                    Lihat foto penuh
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="py-20 text-center bg-white rounded-3xl border border-dashed border-stone-300 p-8" data-aos="fade-up">
                <div class="w-16 h-16 bg-emerald-50 text-emerald-800 rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl shadow-xs">
                    <i class="ti ti-photo-off"></i>
                </div>
                <h3 class="text-xl font-bold font-poppins text-gray-900 mb-1">Belum Ada Foto</h3>
                <p class="text-gray-500 text-sm max-w-md mx-auto">Album ini belum memiliki foto yang diunggah.</p>
                <div class="mt-6">
                    <a href="{{ route('gallery.index') }}" class="inline-flex items-center gap-2 bg-[#062d27] hover:bg-[#0c443b] text-white text-xs font-bold font-poppins px-5 py-2.5 rounded-xl transition-all">
                        <i class="ti ti-arrow-left"></i>
                        <span>Kembali ke Semua Album</span>
                    </a>
                </div>
            </div>
        @endif

    </div>

    <!-- Lightbox Modal (Alpine.js) -->
    <template x-teleport="body">
        <div 
            x-show="open" 
            x-cloak
            class="fixed inset-0 z-[99999] flex items-center justify-center p-3 sm:p-6"
        >
            <!-- Backdrop -->
            <div 
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 bg-[#041a17]/95 backdrop-blur-md"
                @click="closeModal()"
            ></div>

            <!-- Modal Content -->
            <div 
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="relative z-10 max-w-6xl w-full max-h-[92vh] flex flex-col items-center justify-center"
            >
                <!-- Top Toolbar: Counter & Close -->
                <div class="w-full flex items-center justify-between pb-3 text-white px-2">
                    <div class="flex items-center gap-2 text-xs font-poppins font-semibold text-emerald-200/90">
                        <i class="ti ti-photo text-base text-[#bef264]"></i>
                        <span x-text="`Foto ${activeIndex + 1} dari ${photos.length}`"></span>
                    </div>

                    <button 
                        @click="closeModal()" 
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 text-white flex items-center justify-center backdrop-blur-md transition-all border border-white/15"
                        title="Tutup (Esc)"
                    >
                        <i class="ti ti-x text-xl"></i>
                    </button>
                </div>

                <!-- Main Image Preview with Prev/Next Navigation -->
                <div class="relative w-full flex items-center justify-center overflow-hidden rounded-2xl bg-black/40 border border-white/10 p-2">
                    <!-- Previous Button -->
                    <button 
                        x-show="photos.length > 1"
                        @click="prev()" 
                        class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-black/60 hover:bg-[#bef264] hover:text-[#062d27] text-white flex items-center justify-center backdrop-blur-md transition-all shadow-lg border border-white/10"
                        title="Sebelumnya (Panah Kiri)"
                    >
                        <i class="ti ti-chevron-left text-2xl"></i>
                    </button>

                    <!-- Image -->
                    <img 
                        :src="photos[activeIndex]?.url" 
                        :alt="photos[activeIndex]?.title || 'Foto Galeri'" 
                        class="max-w-full max-h-[72vh] object-contain rounded-xl shadow-2xl transition-all duration-200"
                    >

                    <!-- Next Button -->
                    <button 
                        x-show="photos.length > 1"
                        @click="next()" 
                        class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-black/60 hover:bg-[#bef264] hover:text-[#062d27] text-white flex items-center justify-center backdrop-blur-md transition-all shadow-lg border border-white/10"
                        title="Berikutnya (Panah Kanan)"
                    >
                        <i class="ti ti-chevron-right text-2xl"></i>
                    </button>
                </div>

                <!-- Caption Bar -->
                <div x-show="photos[activeIndex]?.title" class="w-full text-center pt-3 px-4">
                    <p class="text-white text-sm font-poppins font-medium" x-text="photos[activeIndex]?.title"></p>
                </div>
            </div>
        </div>
    </template>
</section>
@endsection
