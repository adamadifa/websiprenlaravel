@extends('layouts.frontend')

@section('title', 'Galeri Kegiatan - Al Amin')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-teal-900">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl -ml-48 -mt-48"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-400 rounded-full blur-3xl -mr-48 -mb-48"></div>
    </div>
    <div class="container mx-auto px-6 lg:px-12 relative z-10 text-center">
        <h1 class="text-4xl md:text-6xl font-black text-white mb-4 font-poppins" data-aos="fade-up">
            Galeri <span class="text-yellow-400">Kegiatan</span>
        </h1>
        <p class="text-teal-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed opacity-80" data-aos="fade-up" data-aos-delay="100">
            Dokumentasi momen berharga dan aktivitas santri dalam berbagai program pendidikan dan pembiasaan.
        </p>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($albums as $index => $album)
            <a href="{{ route('gallery.show', $album->id) }}" class="group block relative rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <!-- Cover Image -->
                <div class="aspect-[4/3] overflow-hidden">
                    <img src="{{ $album->getAdminImageUrl($album->cover) }}" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                
                <!-- Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-teal-950 via-teal-950/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                
                <!-- Content -->
                <div class="absolute bottom-0 left-0 right-0 p-8">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="bg-yellow-400 text-teal-950 text-[10px] font-bold px-3 py-1 rounded-full">
                            {{ $album->photos_count }} Photos
                        </span>
                        <span class="text-teal-100/60 text-[10px] font-semibold">
                            {{ $album->created_at->format('M Y') }}
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-white group-hover:text-yellow-400 transition-colors leading-tight">
                        {{ $album->title }}
                    </h3>
                    <p class="text-teal-50/70 text-sm mt-2 line-clamp-2">
                        {{ $album->description }}
                    </p>
                </div>
                
                <!-- Hover Arrow -->
                <div class="absolute top-6 right-6 w-12 h-12 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center text-white opacity-0 group-hover:opacity-100 group-hover:translate-x-0 translate-x-4 transition-all">
                    <i class="ti ti-arrow-right text-2xl"></i>
                </div>
            </a>
            @empty
            <div class="col-span-full py-24 text-center">
                <div class="w-24 h-24 bg-teal-50 rounded-full flex items-center justify-center mx-auto mb-6 text-teal-200">
                    <i class="ti ti-photo-off text-5xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-teal-950 mb-2">Belum Ada Galeri</h3>
                <p class="text-gray-500">Mohon maaf, saat ini belum ada dokumentasi kegiatan yang diunggah.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-20">
            {{ $albums->links() }}
        </div>
    </div>
</section>
@endsection
