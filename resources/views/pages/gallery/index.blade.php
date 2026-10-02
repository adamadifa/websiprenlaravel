@extends('layouts.frontend')

@section('title', 'Galeri Kegiatan - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin'))
@section('meta_description', 'Dokumentasi kegiatan santri, agenda pesantren, program tahfizh, dan aktivitas belajar mengajar di ' . ($pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin') . ' Sindangkasih.')

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
        
        <!-- Top Bar: Indicator & Breadcrumbs -->
        <div class="flex flex-wrap items-center justify-between gap-3 mb-6 pb-3 border-b border-emerald-800/40" data-aos="fade-down">
            <div class="flex items-center gap-2">
                <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-emerald-300 font-poppins">
                    Dokumentasi Pesantren
                </span>
            </div>

            <nav class="flex items-center gap-2 text-emerald-300/70 text-[11px] sm:text-xs font-bold uppercase tracking-wider font-poppins">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <i class="ti ti-chevron-right text-[9px] text-emerald-400/60"></i>
                <span class="text-[#bef264]">Galeri Kegiatan</span>
            </nav>
        </div>

        <!-- Hero Title Area -->
        <div class="max-w-4xl">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-poppins text-white tracking-tight leading-[1.2] mb-3" data-aos="fade-up">
                Galeri <span class="text-[#bef264]">Kegiatan</span>
            </h1>
            <p class="text-emerald-100/85 text-xs sm:text-sm lg:text-base leading-relaxed max-w-2xl font-normal" data-aos="fade-up" data-aos-delay="100">
                Dokumentasi momen berharga, agenda kepesantrenan, pembiasaan ibadah, dan ragam aktivitas santri {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}.
            </p>
        </div>

    </div>
</section>

<!-- Gallery Grid Section -->
<section class="py-14 sm:py-20 bg-[#faf9f6] text-slate-800 relative">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($albums as $index => $album)
                <a href="{{ route('gallery.show', $album->id) }}" 
                   class="group bg-white rounded-3xl overflow-hidden border border-stone-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col"
                   data-aos="fade-up" 
                   data-aos-delay="{{ ($index % 3) * 100 }}">
                    
                    <!-- Cover Image Container -->
                    <div class="relative aspect-[16/10] overflow-hidden bg-stone-100">
                        @if($album->cover)
                            <img 
                                src="{{ $album->getAdminImageUrl($album->cover) }}" 
                                alt="{{ $album->title }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            >
                        @else
                            <div class="w-full h-full bg-emerald-950 flex flex-col items-center justify-center text-emerald-300/40 p-6">
                                <i class="ti ti-photo text-5xl mb-2"></i>
                                <span class="text-xs font-semibold">Dokumentasi Al Amin</span>
                            </div>
                        @endif

                        <!-- Photo Count Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#062d27]/85 backdrop-blur-md text-[#bef264] text-[11px] font-bold font-poppins border border-emerald-500/30 shadow-sm">
                                <i class="ti ti-camera text-xs"></i>
                                {{ $album->photos_count ?? $album->photos->count() }} Foto
                            </span>
                        </div>

                        <!-- Date Overlay -->
                        <div class="absolute inset-x-0 bottom-0 pt-10 pb-3 px-4 bg-gradient-to-t from-black/70 via-black/30 to-transparent flex items-center text-white/90 text-xs font-medium gap-1.5 font-poppins">
                            <i class="ti ti-calendar text-emerald-300 text-sm"></i>
                            <span>{{ $album->created_at ? $album->created_at->translatedFormat('d F Y') : '-' }}</span>
                        </div>
                    </div>

                    <!-- Album Info -->
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-lg sm:text-xl font-bold font-poppins text-gray-900 group-hover:text-emerald-800 transition-colors leading-snug mb-2 line-clamp-2">
                            {{ $album->title }}
                        </h3>

                        @if($album->description)
                            <p class="text-xs sm:text-sm text-gray-500 line-clamp-2 leading-relaxed font-normal mb-5">
                                {{ $album->description }}
                            </p>
                        @else
                            <p class="text-xs sm:text-sm text-gray-400 italic line-clamp-2 leading-relaxed mb-5">
                                Dokumentasi kegiatan santri Pesantren Al Amin.
                            </p>
                        @endif

                        <!-- Footer CTA -->
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-xs font-bold text-emerald-800 font-poppins group-hover:text-emerald-950 transition-colors flex items-center gap-1">
                                Buka Koleksi Foto
                            </span>
                            <div class="w-8 h-8 rounded-full bg-emerald-50 group-hover:bg-[#bef264] text-emerald-800 group-hover:text-[#062d27] flex items-center justify-center transition-all">
                                <i class="ti ti-arrow-right text-sm group-hover:translate-x-0.5 transition-transform"></i>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-dashed border-stone-300 p-8" data-aos="fade-up">
                    <div class="w-16 h-16 bg-emerald-50 text-emerald-800 rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl shadow-xs">
                        <i class="ti ti-photo-off"></i>
                    </div>
                    <h3 class="text-xl font-bold font-poppins text-gray-900 mb-1">Belum Ada Galeri</h3>
                    <p class="text-gray-500 text-sm max-w-md mx-auto">Saat ini belum ada dokumentasi album kegiatan yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($albums->hasPages())
            <div class="mt-14 flex justify-center">
                {{ $albums->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
