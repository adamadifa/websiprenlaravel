@extends('layouts.frontend')

@section('title', $post->title . ' - Al Amin')
@section('meta_description', Str::limit(strip_tags($post->content), 160))
@section('meta_image', $post->getAdminImageUrl($post->image, 'posts'))

@section('content')
<div class="pt-32 pb-24 bg-white relative">
    <!-- Aurora background accents -->
    <div class="absolute top-24 left-0 w-[400px] h-[400px] bg-teal-500/5 rounded-full blur-[100px] pointer-events-none z-0"></div>
    <div class="absolute top-[60%] right-0 w-[300px] h-[300px] bg-yellow-400/5 rounded-full blur-[80px] pointer-events-none z-0"></div>

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <!-- Breadcrumb & Tag -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8" data-aos="fade-up">
            <div class="flex items-center gap-2">
                <span class="bg-teal-50 text-teal-700 text-[10px] font-black uppercase px-3.5 py-1.5 rounded-full tracking-wider shadow-sm border border-teal-100/50">
                    {{ $post->category->name ?? 'Berita' }}
                </span>
            </div>
            
            <nav class="flex items-center gap-2 text-gray-400 text-[10px] font-bold uppercase">
                <a href="/" class="hover:text-teal-600 transition-colors">Home</a>
                <i class="ti ti-chevron-right text-[8px]"></i>
                <a href="{{ route('news.index') }}" class="hover:text-teal-600 transition-colors">Berita</a>
                <i class="ti ti-chevron-right text-[8px]"></i>
                <span class="text-teal-700">Detail</span>
            </nav>
        </div>

        <!-- Post Title -->
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-900 leading-tight font-sans tracking-tight mb-6 max-w-5xl" data-aos="fade-up" data-aos-delay="50">
            {!! html_entity_decode($post->title) !!}
        </h1>

        <!-- Author & Date Meta -->
        <div class="flex flex-wrap items-center gap-y-3 gap-x-6 text-gray-500 text-xs md:text-sm font-medium pb-8 border-b border-gray-100 mb-12" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center gap-2">
                <i class="ti ti-calendar-event text-teal-600 text-base"></i>
                <span>{{ $post->created_at->translatedFormat('d F Y') }}</span>
            </div>
            <div class="w-1.5 h-1.5 bg-gray-200 rounded-full"></div>
            <div class="flex items-center gap-2">
                <i class="ti ti-user-circle text-teal-600 text-base"></i>
                <span>Administrator</span>
            </div>
            <div class="w-1.5 h-1.5 bg-gray-200 rounded-full"></div>
            <div class="flex items-center gap-2">
                <i class="ti ti-clock text-teal-600 text-base"></i>
                <span>{{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }} Menit Baca</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Main Content Area -->
            <div class="lg:col-span-8">
                <!-- Featured Image -->
                <div class="relative rounded-[2rem] overflow-hidden shadow-xl border border-gray-100 mb-12 group" data-aos="zoom-in">
                    @if($post->image)
                        <img src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" alt="{{ $post->title }}" class="w-full h-[320px] md:h-[460px] object-cover group-hover:scale-102 transition-transform duration-700" onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-[320px] md:h-[460px] bg-gray-50 flex flex-col gap-2 items-center justify-center text-gray-400\'><i class=\'ti ti-photo text-5xl\'></i><span class=\'text-xs font-semibold\'>Gambar tidak ditemukan</span></div>';">
                    @else
                        <div class="w-full h-[320px] md:h-[460px] bg-gray-50 flex items-center justify-center">
                            <i class="ti ti-photo text-6xl text-gray-200"></i>
                        </div>
                    @endif
                </div>

                <!-- Post Body (Prose) -->
                <article class="prose prose-lg max-w-none prose-teal prose-headings:font-poppins prose-headings:font-black prose-headings:text-teal-950 prose-p:text-gray-600 prose-p:leading-relaxed prose-img:rounded-2xl prose-strong:text-teal-950">
                    {!! $post->content !!}
                </article>

                <!-- Share Block -->
                <div class="mt-16 pt-8 border-t border-gray-100 flex flex-wrap items-center justify-between gap-6">
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-black text-gray-400 uppercase tracking-widest">Bagikan Berita:</span>
                        <div class="flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-9 h-9 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-teal-600 hover:text-white transition-all shadow-sm"><i class="ti ti-brand-facebook text-lg"></i></a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-9 h-9 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-teal-600 hover:text-white transition-all shadow-sm"><i class="ti ti-brand-twitter text-lg"></i></a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . request()->fullUrl()) }}" target="_blank" class="w-9 h-9 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-teal-600 hover:text-white transition-all shadow-sm"><i class="ti ti-brand-whatsapp text-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Area -->
            <div class="lg:col-span-4">
                <div class="sticky top-32 space-y-6">
                    <!-- Recent Posts Card -->
                    <div class="bg-gray-50/50 rounded-[2rem] p-6 md:p-8 border border-gray-100 shadow-sm">
                        <h3 class="text-lg font-black text-teal-950 font-poppins mb-6 flex items-center gap-2.5">
                            <span class="w-1.5 h-6 bg-yellow-400 rounded-full"></span>
                            Berita Terbaru
                        </h3>
                        
                        <div class="divide-y divide-gray-100">
                            @foreach($recentPosts as $recent)
                            <a href="{{ route('news.show', $recent->slug) }}" class="group flex gap-4 py-4 first:pt-0 last:pb-0 items-start">
                                <div class="w-16 h-16 shrink-0 rounded-xl overflow-hidden bg-white border border-gray-100 shadow-inner">
                                    @if($recent->image)
                                        <img src="{{ $recent->getAdminImageUrl($recent->image, 'posts') }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50 text-gray-400\'><i class=\'ti ti-photo text-lg\'></i></div>';">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-50">
                                            <i class="ti ti-photo text-lg text-gray-200"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <h4 class="text-sm font-bold text-gray-800 group-hover:text-teal-700 transition-colors line-clamp-2 leading-snug">
                                        {{ $recent->title }}
                                    </h4>
                                    <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block mt-1">
                                        {{ $recent->created_at->translatedFormat('d M Y') }}
                                    </span>
                                </div>
                            </a>
                            @endforeach
                        </div>

                        <a href="{{ route('news.index') }}" class="mt-6 w-full py-3.5 bg-white border border-teal-100 text-teal-600 rounded-xl text-center text-xs font-black hover:bg-teal-600 hover:text-white hover:border-teal-600 transition-all block uppercase tracking-wider">
                            Lihat Semua Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
