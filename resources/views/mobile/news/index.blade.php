@extends('layouts.mobile')

@section('title', 'Berita Pesantren - Al Amin')

@section('content')
<!-- Hero Section -->
<div class="bg-teal-900 pt-8 pb-12 px-6 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-yellow-400 rounded-full blur-3xl -mr-32 -mb-32"></div>
    </div>
    
    <div class="relative z-10" data-aos="fade-down">
        <div class="flex items-center gap-2 text-[10px] text-white font-bold uppercase tracking-widest mb-3">
            <span class="w-6 h-px bg-white"></span>
            Pusat Informasi
        </div>
        <h1 class="text-3xl font-black text-white leading-tight mb-4 tracking-tight">Berita <span class="text-yellow-400">Pesantren</span></h1>
        <p class="text-xs text-teal-100/80 font-medium leading-relaxed max-w-[90%]">Ikuti perkembangan terbaru dan informasi resmi dari seluruh unit pendidikan Pesantren Al Amin.</p>
    </div>
</div>

<div class="px-6 pt-10 pb-24 bg-gray-50/50 min-h-screen">

    <!-- News Grid -->
    <div class="space-y-6 mb-12">
        @forelse($posts as $item)
        <div class="bg-white rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 group flex flex-col" data-aos="fade-up">
            <a href="{{ route('news.show', $item->slug) }}" class="block flex-1">
                <div class="relative aspect-[16/10] w-full bg-gray-100 overflow-hidden">
                    <img src="{{ $item->getAdminImageUrl($item->image, 'posts') }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/95 backdrop-blur-md text-teal-900 text-[9px] font-bold px-3 py-1.5 rounded-lg border border-white/20 uppercase tracking-widest shadow-sm">
                            {{ $item->category->name ?? 'Berita' }}
                        </span>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="ti ti-calendar-event text-teal-600/70 text-sm"></i>
                        <span class="text-gray-400 text-[10px] font-bold uppercase tracking-wider">{{ $item->created_at->format('d M Y') }}</span>
                    </div>
                    <h3 class="text-base font-black text-teal-950 leading-snug group-hover:text-teal-700 transition-colors line-clamp-2 mb-2">{{ $item->title }}</h3>
                    <div class="flex items-center gap-2 mt-4 text-[10px] font-bold text-teal-600 uppercase tracking-widest group-hover:gap-3 transition-all">
                        Baca Selengkapnya <i class="ti ti-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>
        @empty
            <div class="py-20 text-center bg-white rounded-3xl border border-gray-100 shadow-sm">
                <i class="ti ti-news text-4xl text-gray-300 mb-3 block"></i>
                <p class="text-gray-400 font-medium text-sm">Belum ada berita untuk ditampilkan.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="flex justify-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
