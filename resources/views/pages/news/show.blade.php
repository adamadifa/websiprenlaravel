@extends('layouts.frontend')

@section('title', $post->title . ' - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Al Amin'))
@section('meta_description', Str::limit(strip_tags($post->content), 160))
@section('meta_image', $post->getAdminImageUrl($post->image, 'posts'))

@section('content')
<!-- Header / Top Bar Area -->
<section class="relative pt-28 sm:pt-32 pb-8 sm:pb-10 bg-[#062d27] text-white border-b border-emerald-900/60 overflow-hidden">
    <!-- Ambient Background Overlay -->
    @if($pengaturan && !empty($pengaturan->background_login))
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20">
            <img 
                src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                alt="" 
                class="w-full h-full object-cover grayscale mix-blend-luminosity scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#062d27] via-[#062d27]/90 to-[#062d27]/70"></div>
        </div>
    @endif

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <!-- Top Navigation / Breadcrumbs -->
        <div class="flex flex-wrap items-center justify-between gap-3 mb-4 pb-3 border-b border-emerald-800/40" data-aos="fade-down">
            <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-emerald-100 hover:text-white px-3.5 py-1.5 rounded-xl text-xs font-bold font-poppins backdrop-blur-md border border-white/10 transition-all">
                <i class="ti ti-arrow-left"></i>
                <span>Semua Berita</span>
            </a>

            <nav class="flex items-center gap-2 text-emerald-300/70 text-[11px] sm:text-xs font-bold uppercase tracking-wider font-poppins">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <i class="ti ti-chevron-right text-[9px] text-emerald-400/60"></i>
                <a href="{{ route('news.index') }}" class="hover:text-white transition-colors">Berita</a>
                <i class="ti ti-chevron-right text-[9px] text-emerald-400/60"></i>
                <span class="text-[#bef264] max-w-[180px] sm:max-w-none truncate">{{ $post->category->name ?? 'Warta' }}</span>
            </nav>
        </div>

        <div class="max-w-4xl">
            <div class="mb-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-800/60 backdrop-blur-md text-[#bef264] text-xs font-bold font-poppins border border-emerald-600/30">
                    {{ $post->category->name ?? 'Warta Berita' }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black font-poppins text-white tracking-tight leading-snug mb-4" data-aos="fade-up">
                {!! html_entity_decode($post->title) !!}
            </h1>

            <div class="flex flex-wrap items-center gap-y-2 gap-x-4 text-xs text-emerald-200/80 font-poppins">
                <div class="flex items-center gap-1.5 font-medium">
                    <i class="ti ti-user-circle text-emerald-400 text-sm"></i>
                    <span>Redaksi Pesantren</span>
                </div>
                <span>•</span>
                <div class="flex items-center gap-1.5">
                    <i class="ti ti-calendar text-emerald-400 text-sm"></i>
                    <span>{{ $post->created_at ? $post->created_at->translatedFormat('l, d F Y - H:i') : '-' }} WIB</span>
                </div>
                <span>•</span>
                <div class="flex items-center gap-1.5 text-emerald-300">
                    <i class="ti ti-clock text-sm"></i>
                    <span>{{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }} mnt baca</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Article Body & Sidebar -->
<section class="py-12 sm:py-16 bg-[#faf9f6] text-slate-800 relative min-h-screen">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
            
            <!-- Main Content (8 cols) -->
            <main class="lg:col-span-8 bg-white rounded-3xl p-6 sm:p-10 border border-stone-200/90 shadow-xs">
                <article>
                    <!-- Featured Image -->
                    @if($post->image)
                        <figure class="mb-8 overflow-hidden rounded-2xl border border-stone-200 bg-stone-100 shadow-sm">
                            <img 
                                src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" 
                                alt="" 
                                class="w-full h-auto max-h-[500px] object-cover"
                                onerror="this.onerror=null; this.parentElement.style.display='none';"
                            >
                            <figcaption class="p-3 text-[11px] text-gray-500 italic bg-stone-50 border-t border-stone-100 flex items-center justify-between font-poppins">
                                <span>Dokumentasi: {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}</span>
                            </figcaption>
                        </figure>
                    @endif

                    <!-- Article Typography -->
                    <div class="prose prose-slate prose-base sm:prose-lg max-w-none 
                                prose-headings:font-black prose-headings:font-poppins prose-headings:text-gray-900 prose-headings:tracking-tight
                                prose-p:text-gray-700 prose-p:leading-relaxed prose-p:font-normal
                                prose-a:text-emerald-800 prose-a:font-semibold hover:prose-a:text-emerald-950 prose-a:underline
                                prose-strong:text-gray-900 prose-strong:font-bold
                                prose-img:rounded-2xl prose-img:border prose-img:border-stone-200 prose-img:shadow-sm
                                prose-blockquote:border-l-4 prose-blockquote:border-emerald-800 prose-blockquote:bg-emerald-50/50 prose-blockquote:py-3 prose-blockquote:px-5 prose-blockquote:rounded-r-2xl prose-blockquote:italic prose-blockquote:text-emerald-950">
                        {!! $post->content !!}
                    </div>

                    <!-- Article Footer / Share Bar -->
                    <div class="mt-12 pt-6 border-t border-stone-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider font-poppins">Kategori:</span>
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-800 text-xs font-bold rounded-lg border border-emerald-100 font-poppins">
                                {{ $post->category->name ?? 'Berita' }}
                            </span>
                        </div>

                        <!-- Share Buttons -->
                        <div class="flex items-center gap-2 w-full sm:w-auto">
                            <span class="text-xs font-bold text-gray-400 mr-1 font-poppins">Bagikan:</span>
                            
                            <!-- WhatsApp -->
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . request()->fullUrl()) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-[#25D366]/10 text-[#128C7E] hover:bg-[#25D366] hover:text-white transition-all text-xs font-bold font-poppins"
                               title="Bagikan ke WhatsApp">
                                <i class="ti ti-brand-whatsapp text-sm"></i>
                                <span>WhatsApp</span>
                            </a>

                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-stone-100 text-stone-600 hover:bg-[#1877F2] hover:text-white transition-all text-xs"
                               title="Bagikan ke Facebook">
                                <i class="ti ti-brand-facebook text-base"></i>
                            </a>

                            <!-- Twitter / X -->
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-stone-100 text-stone-600 hover:bg-black hover:text-white transition-all text-xs"
                               title="Bagikan ke X">
                                <i class="ti ti-brand-x text-sm"></i>
                            </a>

                            <!-- Copy Link -->
                            <button onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan berita berhasil disalin!');" 
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-stone-100 text-stone-600 hover:bg-emerald-800 hover:text-white transition-all text-xs" 
                                    title="Salin Tautan">
                                <i class="ti ti-link text-sm"></i>
                            </button>
                        </div>
                    </div>
                </article>
            </main>

            <!-- Sidebar (4 cols) -->
            <aside class="lg:col-span-4 space-y-6">
                <!-- Recent News Widget -->
                <div class="bg-white rounded-3xl border border-stone-200/90 p-6 shadow-xs">
                    <div class="border-b border-stone-100 pb-4 mb-4 flex items-center justify-between">
                        <h2 class="text-base font-bold font-poppins text-gray-900 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 bg-emerald-800 rounded-sm"></span>
                            Berita Terbaru Lainnya
                        </h2>
                        <a href="{{ route('news.index') }}" class="text-xs text-emerald-800 hover:text-emerald-950 font-bold font-poppins">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="divide-y divide-stone-100">
                        @forelse($recentPosts as $recent)
                            <article class="py-3.5 first:pt-0 last:pb-0 group">
                                <a href="{{ route('news.show', $recent->slug) }}" class="flex gap-3.5 items-start">
                                    <div class="w-20 h-16 shrink-0 rounded-xl overflow-hidden bg-stone-100 border border-stone-200 relative">
                                        @if($recent->image)
                                            <img 
                                                src="{{ $recent->getAdminImageUrl($recent->image, 'posts') }}" 
                                                alt="" 
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                                onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full flex items-center justify-center bg-stone-100 text-stone-300\'><i class=\'ti ti-photo text-base\'></i></div>';"
                                            >
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-stone-100 text-stone-300">
                                                <i class="ti ti-photo text-base"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-xs font-bold font-poppins text-gray-800 group-hover:text-emerald-800 transition-colors line-clamp-2 leading-snug">
                                            {{ $recent->title }}
                                        </h3>
                                        <span class="text-[10px] text-gray-400 font-poppins block mt-1">
                                            {{ $recent->created_at ? $recent->created_at->translatedFormat('d F Y') : '-' }}
                                        </span>
                                    </div>
                                </a>
                            </article>
                        @empty
                            <p class="text-xs text-gray-400 py-3 font-poppins">Tidak ada berita lainnya.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Back to Home CTA Box -->
                <div class="bg-[#062d27] rounded-3xl p-6 text-white text-center shadow-lg relative overflow-hidden">
                    <div class="relative z-10">
                        <i class="ti ti-building-mosque text-3xl text-[#bef264] mb-2 block"></i>
                        <h3 class="text-sm font-bold font-poppins mb-1">Pesantren Al Amin</h3>
                        <p class="text-[11px] text-emerald-200/80 mb-4 leading-relaxed">Pusat Pendidikan Islam Terpadu & Kaderisasi Ulama di Sindangkasih Ciamis.</p>
                        <a href="/" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] text-xs font-bold font-poppins transition-all">
                            <span>Kunjungi Beranda</span>
                            <i class="ti ti-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>
@endsection
