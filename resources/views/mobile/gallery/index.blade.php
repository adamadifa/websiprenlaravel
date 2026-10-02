@extends('layouts.mobile')

@section('title', 'Galeri Kegiatan - ' . ($pengaturan->nama_sekolah ?? 'Al Amin'))

@section('content')
<div class="bg-[#062d27] pt-6 pb-10 px-5 relative overflow-hidden text-white border-b border-emerald-900/60">
    <div class="relative z-10" data-aos="fade-down">
        <div class="flex items-center gap-2 text-[10px] text-emerald-300 font-bold uppercase tracking-wider mb-2 font-poppins">
            Dokumentasi Pesantren
        </div>
        <h1 class="text-2xl font-black text-white leading-tight mb-2 font-poppins">
            Galeri <span class="text-[#bef264]">Kegiatan</span>
        </h1>
        <p class="text-xs text-emerald-100/80 font-normal leading-relaxed">
            Kumpulan momen dan dokumentasi ragam aktivitas santri {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}.
        </p>
    </div>
</div>

<div class="px-5 pt-6 pb-24 bg-[#faf9f6] min-h-screen">
    <div class="grid grid-cols-1 gap-5">
        @forelse($albums as $album)
            <a href="{{ route('gallery.show', $album->id) }}" class="group bg-white rounded-3xl overflow-hidden border border-stone-200/80 shadow-xs active:scale-[0.98] transition-all flex flex-col" data-aos="fade-up">
                <div class="aspect-[16/10] relative overflow-hidden bg-stone-100">
                    @if($album->cover)
                        <img src="{{ $album->getAdminImageUrl($album->cover) }}" alt="{{ $album->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-emerald-950 flex items-center justify-center text-emerald-300/40">
                            <i class="ti ti-photo text-5xl"></i>
                        </div>
                    @endif
                    
                    <!-- Photo Count Badge -->
                    <div class="absolute top-3 right-3 z-10">
                        <div class="bg-[#062d27]/85 backdrop-blur-md text-[#bef264] px-2.5 py-1 rounded-full text-[10px] font-bold font-poppins flex items-center gap-1.5 border border-emerald-500/30">
                            <i class="ti ti-camera text-xs"></i>
                            {{ $album->photos_count ?? $album->photos->count() }} Foto
                        </div>
                    </div>

                    <!-- Date Overlay -->
                    <div class="absolute inset-x-0 bottom-0 pt-8 pb-2.5 px-4 bg-gradient-to-t from-black/70 via-black/20 to-transparent flex items-center text-white/90 text-[11px] font-medium gap-1.5 font-poppins">
                        <i class="ti ti-calendar text-emerald-300"></i>
                        {{ $album->created_at ? $album->created_at->translatedFormat('d M Y') : '-' }}
                    </div>
                </div>
                
                <div class="p-5 flex flex-col flex-1">
                    <h3 class="text-base font-bold font-poppins text-gray-900 group-hover:text-emerald-800 leading-snug mb-1.5">
                        {{ $album->title }}
                    </h3>
                    
                    @if($album->description)
                        <p class="text-[12px] text-gray-500 line-clamp-2 leading-relaxed font-normal mb-3">
                            {{ $album->description }}
                        </p>
                    @endif
                    
                    <div class="mt-auto pt-3 border-t border-gray-100 flex items-center justify-between text-emerald-800 font-bold text-[11px] font-poppins">
                        <span>Buka Koleksi Foto</span>
                        <div class="w-6 h-6 rounded-full bg-emerald-50 text-emerald-800 flex items-center justify-center">
                            <i class="ti ti-arrow-right text-xs"></i>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <div class="py-16 text-center bg-white rounded-3xl border border-dashed border-stone-300 p-6" data-aos="fade-up">
                <i class="ti ti-photo-off text-4xl text-emerald-800/40 mb-3 block"></i>
                <p class="text-gray-500 font-medium text-xs">Belum ada album foto dokumentasi.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($albums->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $albums->links() }}
        </div>
    @endif
</div>
@endsection
