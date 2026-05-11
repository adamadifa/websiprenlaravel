@extends('layouts.frontend')

@section('title', $post->title . ' - Al Amin')
@section('meta_description', Str::limit(strip_tags($post->content), 160))
@section('meta_image', $post->getAdminImageUrl($post->image, 'posts'))

@section('content')
<!-- Header Detail -->
<section class="relative pt-44 pb-16 bg-[#063b34] overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-teal-500 rounded-full blur-[120px] -mr-80 -mt-80"></div>
    </div>
    
    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <!-- Title and Breadcrumb Row -->
        <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-8 mb-10">
            <div class="max-w-4xl">
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white leading-tight font-poppins" data-aos="fade-up">
                    {!! html_entity_decode($post->title) !!}
                </h1>
            </div>
            
            <nav class="flex items-center gap-2 text-teal-200/30 text-[10px] font-bold uppercase shrink-0 lg:pt-3" data-aos="fade-left">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <i class="ti ti-chevron-right text-[8px]"></i>
                <span class="opacity-50">Berita</span>
                <i class="ti ti-chevron-right text-[8px]"></i>
                <span class="text-yellow-400/80">Detail</span>
            </nav>
        </div>

        <div class="flex flex-wrap items-center gap-y-4 gap-x-8 text-teal-100/50 text-[10px] md:text-[11px] font-black uppercase pt-8 border-t border-white/5" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center gap-2.5">
                <i class="ti ti-calendar-event text-yellow-500 text-lg"></i>
                <span>{{ $post->created_at->translatedFormat('d F Y') }}</span>
            </div>
            
            <div class="hidden md:block w-1 h-1 bg-teal-800 rounded-full"></div>
            
            <div class="flex items-center gap-2.5">
                <i class="ti ti-user-circle text-yellow-500 text-lg"></i>
                <span>Administrator</span>
            </div>
        </div>
    </div>
</section>

<!-- Content Body -->
<section class="py-24 bg-white relative">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="flex flex-wrap -mx-6 lg:-mx-12">
            
            <!-- Main Content -->
            <div class="w-full lg:w-8/12 px-6 lg:px-12 mb-16 lg:mb-0">
                <div class="relative -mt-32 mb-12 rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-white group h-[300px] md:h-[400px] lg:h-[480px]" data-aos="zoom-in">
                    @if($post->image)
                        <img src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                            <i class="ti ti-photo text-6xl text-gray-200"></i>
                        </div>
                    @endif
                </div>

                <article class="prose prose-lg prose-teal max-w-none prose-headings:font-poppins prose-headings:font-black prose-headings:text-teal-950 prose-p:text-gray-600 prose-p:leading-relaxed prose-img:rounded-3xl prose-strong:text-teal-950">
                    {!! $post->content !!}
                </article>

                <!-- Share -->
                <div class="mt-16 pt-8 border-t border-gray-100 flex flex-wrap items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <span class="text-sm font-bold text-gray-400 uppercase tracking-widest">Bagikan:</span>
                        <div class="flex gap-2">
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-teal-600 hover:text-white transition-all"><i class="ti ti-brand-facebook text-xl"></i></a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-teal-600 hover:text-white transition-all"><i class="ti ti-brand-twitter text-xl"></i></a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-teal-600 hover:text-white transition-all"><i class="ti ti-brand-whatsapp text-xl"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-4/12 px-6 lg:px-12">
                <div class="sticky top-32">
                    <div class="bg-gray-50 rounded-[2.5rem] p-8 md:p-10 border border-gray-100">
                        <h3 class="text-xl font-black text-teal-950 font-poppins mb-8 flex items-center gap-3">
                            <span class="w-2 h-8 bg-yellow-400 rounded-full"></span>
                            Berita Terbaru
                        </h3>
                        
                        <div class="space-y-8">
                            @foreach($recentPosts as $recent)
                            <a href="{{ route('news.show', $recent->slug) }}" class="group flex gap-4 items-start">
                                <div class="w-20 h-20 shrink-0 rounded-2xl overflow-hidden bg-white border border-gray-200">
                                    @if($recent->image)
                                        <img src="{{ $recent->getAdminImageUrl($recent->image, 'posts') }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-50">
                                            <i class="ti ti-photo text-2xl text-gray-200"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-teal-950 leading-snug mb-1 group-hover:text-teal-600 transition-colors line-clamp-2">
                                        {{ $recent->title }}
                                    </h4>
                                    <p class="text-[10px] text-gray-400 font-medium">
                                        {{ $recent->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </a>
                            @endforeach
                        </div>

                        <a href="{{ route('news.index') }}" class="mt-10 w-full py-4 bg-white border border-teal-100 text-teal-600 rounded-2xl text-center text-sm font-bold hover:bg-teal-600 hover:text-white transition-all block">
                            Lihat Semua Berita
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
