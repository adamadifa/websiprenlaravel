@extends('layouts.frontend')

@section('title', 'Berita & Artikel - Al Amin')

@section('content')
<!-- Header -->
<section class="relative pt-44 pb-20 bg-[#063b34] overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-teal-500 rounded-full blur-[120px] -mr-80 -mt-80"></div>
    </div>
    
    <div class="container mx-auto px-6 lg:px-12 relative z-10 text-center lg:text-left">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
            <div class="max-w-3xl">
                <nav class="flex items-center justify-center lg:justify-start gap-2 text-teal-200/30 text-[10px] font-bold uppercase mb-6" data-aos="fade-right">
                    <a href="/" class="hover:text-white transition-colors">Home</a>
                    <i class="ti ti-chevron-right text-[8px]"></i>
                    <span class="text-yellow-400/80">Berita & Artikel</span>
                </nav>
                <h1 class="text-3xl md:text-5xl font-black text-white leading-tight font-poppins" data-aos="fade-up">
                    Berita <span class="text-yellow-400">Pesantren</span>
                </h1>
                <p class="text-teal-100/60 mt-4 text-sm md:text-base max-w-xl font-medium" data-aos="fade-up" data-aos-delay="100">
                    Kumpulan informasi terbaru, artikel pendidikan, dan kabar terkini seputar kegiatan santri di Pesantren Al Amin.
                </p>
            </div>
            
            <div class="hidden lg:block pb-2" data-aos="fade-left">
                <div class="w-24 h-1 bg-yellow-400/30 rounded-full overflow-hidden">
                    <div class="w-1/2 h-full bg-yellow-400 animate-slide"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Grid -->
<section class="py-24 bg-white relative">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($posts as $post)
            <div class="group flex flex-col bg-white rounded-[2rem] border border-gray-100 overflow-hidden hover:shadow-2xl hover:shadow-teal-900/10 transition-all duration-500 relative" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <a href="{{ route('news.show', $post->slug) }}" class="absolute inset-0 z-10" aria-label="Baca berita: {{ $post->title }}"></a>
                <!-- Thumbnail -->
                <div class="relative h-64 overflow-hidden">
                    @if($post->image)
                        <img src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-gray-50 flex items-center justify-center">
                            <i class="ti ti-photo text-4xl text-gray-200"></i>
                        </div>
                    @endif
                    <div class="absolute top-6 left-6 z-20">
                        <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md rounded-xl text-[10px] font-black text-teal-900 uppercase tracking-widest shadow-lg">Info</span>
                    </div>
                </div>

                <!-- Info -->
                <div class="p-8 flex flex-col flex-1">
                    <div class="flex items-center gap-4 text-gray-400 text-[10px] font-bold uppercase mb-4">
                        <div class="flex items-center gap-1.5">
                            <i class="ti ti-calendar-event text-teal-600"></i>
                            <span>{{ $post->created_at->translatedFormat('d M Y') }}</span>
                        </div>
                        <div class="w-1 h-1 bg-gray-200 rounded-full"></div>
                        <div class="flex items-center gap-1.5">
                            <i class="ti ti-user text-teal-600"></i>
                            <span>Admin</span>
                        </div>
                    </div>

                    <h3 class="text-xl font-black text-teal-950 mb-4 leading-tight group-hover:text-teal-600 transition-colors line-clamp-2">
                        {!! html_entity_decode($post->title) !!}
                    </h3>
                    
                    <p class="text-gray-500 text-sm leading-relaxed mb-8 line-clamp-3">
                        {{ Str::limit(strip_tags($post->content), 150) }}
                    </p>

                    <div class="mt-auto pt-6 border-t border-gray-50 relative z-20">
                        <div class="flex items-center justify-between group/link">
                            <span class="text-xs font-black text-teal-600 uppercase tracking-widest">Baca Selengkapnya</span>
                            <div class="w-8 h-8 rounded-full bg-teal-50 flex items-center justify-center text-teal-600 group-hover/link:bg-teal-600 group-hover/link:text-white transition-all duration-300">
                                <i class="ti ti-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-32 text-center bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-100">
                <i class="ti ti-news text-6xl text-gray-200 mb-6 block"></i>
                <h3 class="text-xl font-bold text-gray-400">Belum ada berita yang diterbitkan.</h3>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-20 flex justify-center">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
