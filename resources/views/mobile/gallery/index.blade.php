@extends('layouts.mobile')

@section('title', 'Galeri Kegiatan - Al Amin')

@section('content')
<div class="bg-teal-900 pt-8 pb-12 px-6 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-yellow-400 rounded-full blur-3xl -mr-32 -mb-32"></div>
    </div>
    
    <div class="relative z-10" data-aos="fade-down">
        <div class="flex items-center gap-2 text-[10px] text-white font-bold uppercase tracking-widest mb-3">
            <span class="w-6 h-px bg-white"></span>
            Dokumentasi Pesantren
        </div>
        <h1 class="text-3xl font-black text-white leading-tight mb-4 tracking-tight">Galeri <span class="text-yellow-400">Kegiatan</span></h1>
        <p class="text-xs text-teal-100/80 font-medium leading-relaxed max-w-[90%]">Kumpulan momen dan dokumentasi berbagai kegiatan santri di Pesantren Al Amin.</p>
    </div>
</div>

<div class="px-6 pt-10 pb-24 bg-gray-50/50 min-h-screen">
    <div class="grid grid-cols-1 gap-6">
        @forelse($albums as $album)
        <a href="{{ route('gallery.show', $album->id) }}" class="group bg-white rounded-[2.5rem] overflow-hidden border border-gray-100 shadow-sm active:scale-[0.98] transition-all" data-aos="fade-up">
            <div class="aspect-[16/10] relative overflow-hidden">
                @if($album->cover)
                    <img src="{{ $album->getAdminImageUrl($album->cover) }}" alt="{{ $album->nama_album }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @else
                    <div class="w-full h-full bg-teal-50 flex items-center justify-center text-teal-200">
                        <i class="ti ti-photo text-6xl"></i>
                    </div>
                @endif
                
                <!-- Photo Count Badge -->
                <div class="absolute top-4 right-4">
                    <div class="bg-black/40 backdrop-blur-md text-white px-3 py-1.5 rounded-xl text-[10px] font-black flex items-center gap-2 border border-white/20">
                        <i class="ti ti-camera"></i>
                        {{ $album->photos_count }} Foto
                    </div>
                </div>

                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                
                <!-- Date Overlay -->
                <div class="absolute bottom-4 left-6">
                    <div class="flex items-center gap-2 text-white/80 text-[10px] font-bold uppercase tracking-widest">
                        <i class="ti ti-calendar"></i>
                        {{ $album->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
            
            <div class="p-6">
                <h3 class="text-lg font-black text-teal-950 leading-tight mb-2">{{ $album->nama_album }}</h3>
                <p class="text-[11px] text-gray-500 line-clamp-2 leading-relaxed font-medium">{{ $album->deskripsi }}</p>
                
                <div class="mt-4 flex items-center gap-2 text-teal-600 font-bold text-[10px] uppercase tracking-widest">
                    Lihat Koleksi Foto
                    <i class="ti ti-arrow-right text-sm"></i>
                </div>
            </div>
        </a>
        @empty
        <div class="py-20 text-center bg-white rounded-[2.5rem] border border-dashed border-gray-200" data-aos="fade-up">
            <i class="ti ti-photo-off text-5xl text-gray-200 mb-4 block"></i>
            <p class="text-gray-400 font-bold uppercase text-[10px] tracking-widest">Belum ada album foto</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $albums->links() }}
    </div>
</div>
@endsection
