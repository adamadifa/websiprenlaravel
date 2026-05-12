@extends('layouts.mobile')

@section('title', $album->nama_album . ' - Al Amin')

@section('content')
<!-- Header Area -->
<div class="bg-teal-900 pt-8 pb-12 px-6 relative overflow-hidden">
    <!-- Back Button -->
    <a href="{{ route('gallery.index') }}" class="inline-flex items-center gap-2 text-white/60 hover:text-white transition-colors mb-6 text-[10px] font-bold uppercase tracking-widest relative z-20">
        <i class="ti ti-arrow-left"></i>
        Kembali ke Galeri
    </a>

    <div class="absolute inset-0 opacity-10">
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-yellow-400 rounded-full blur-3xl -mr-32 -mb-32"></div>
    </div>
    
    <div class="relative z-10" data-aos="fade-down">
        <h1 class="text-2xl font-black text-white leading-tight mb-2 tracking-tight">{{ $album->nama_album }}</h1>
        <div class="flex items-center gap-4 text-[10px] text-teal-100/70 font-bold uppercase tracking-widest">
            <span class="flex items-center gap-1.5">
                <i class="ti ti-calendar"></i>
                {{ $album->created_at->format('d M Y') }}
            </span>
            <span class="flex items-center gap-1.5">
                <i class="ti ti-photo"></i>
                {{ $album->photos->count() }} Foto
            </span>
        </div>
    </div>
</div>

<div class="px-6 pt-10 pb-24 bg-gray-50/50 min-h-screen">
    <!-- Album Description -->
    @if($album->deskripsi)
    <div class="mb-10 bg-white p-6 rounded-3xl border border-gray-100 shadow-sm" data-aos="fade-up">
        <p class="text-[13px] text-gray-600 leading-relaxed font-medium">{{ $album->deskripsi }}</p>
    </div>
    @endif

    <!-- Photo Grid -->
    <div class="grid grid-cols-2 gap-4" x-data="{ showModal: false, activeImage: '' }">
        @foreach($album->photos as $photo)
        <div 
            class="group relative aspect-square bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 active:scale-95 transition-all" 
            data-aos="zoom-in" 
            data-aos-delay="{{ $loop->index * 50 }}"
            @click="activeImage = '{{ $photo->getAdminImageUrl($photo->photo) }}'; showModal = true"
        >
            <img src="{{ $photo->getAdminImageUrl($photo->photo) }}" alt="Foto {{ $loop->iteration }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                <i class="ti ti-zoom-in text-white text-2xl"></i>
            </div>
        </div>
        @endforeach

        <!-- Fullscreen Image Modal (Alpine.js) -->
        <template x-teleport="body">
            <div x-show="showModal" x-cloak class="fixed inset-0 z-[9999] flex items-center justify-center p-4">
                <div 
                    x-show="showModal" 
                    x-transition:enter="transition ease-out duration-300" 
                    x-transition:enter-start="opacity-0" 
                    x-transition:enter-end="opacity-100" 
                    class="absolute inset-0 bg-black/95 backdrop-blur-md"
                    @click="showModal = false"
                ></div>
                
                <div 
                    x-show="showModal" 
                    x-transition:enter="transition ease-out duration-300" 
                    x-transition:enter-start="opacity-0 scale-90" 
                    x-transition:enter-end="opacity-100 scale-100" 
                    class="relative z-10 max-w-full max-h-full"
                >
                    <img :src="activeImage" class="max-w-full max-h-[85vh] rounded-2xl shadow-2xl">
                    
                    <div class="absolute -top-12 right-0 flex gap-4">
                        <button @click="showModal = false" class="w-10 h-10 bg-white/10 text-white rounded-full flex items-center justify-center backdrop-blur-md border border-white/20">
                            <i class="ti ti-x text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>
@endsection
