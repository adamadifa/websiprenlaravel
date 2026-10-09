@extends('layouts.frontend')

@section('title', $post->title . ' - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin'))
@section('meta_description', Str::limit(strip_tags($post->content), 160))
@section('meta_image', $post->getAdminImageUrl($post->image, 'posts'))

@section('content')
<!-- Header / Top Bar Area with Ambient Background -->
<section class="relative pt-32 sm:pt-36 pb-12 sm:pb-16 bg-gradient-to-b from-[#041e1a] via-[#062d27] to-[#0a3a33] text-white border-b border-emerald-800/40 overflow-hidden">
    <!-- Ambient Glows -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#bef264]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

    @if($pengaturan && !empty($pengaturan->background_login))
        <div class="absolute inset-0 z-0 pointer-events-none opacity-15">
            <img 
                src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                alt="" 
                class="w-full h-full object-cover grayscale mix-blend-luminosity scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#041e1a] via-[#062d27]/90 to-[#041e1a]/80"></div>
        </div>
    @endif

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <!-- Top Navigation / Breadcrumbs -->
        <div class="flex flex-wrap items-center justify-between gap-3 mb-6 pb-4 border-b border-emerald-700/30" data-aos="fade-down">
            <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-emerald-100 hover:text-white px-4 py-2 rounded-xl text-xs font-bold font-poppins backdrop-blur-md border border-white/10 transition-all group">
                <i class="ti ti-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                <span>Kembali ke Warta</span>
            </a>

            <nav class="flex items-center gap-2 text-emerald-200/70 text-xs font-semibold uppercase tracking-wider font-poppins">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <i class="ti ti-chevron-right text-[10px] text-emerald-400/50"></i>
                <a href="{{ route('news.index') }}" class="hover:text-white transition-colors">Berita</a>
                <i class="ti ti-chevron-right text-[10px] text-emerald-400/50"></i>
                <span class="text-[#bef264] max-w-[200px] truncate font-bold">{{ $post->category->name ?? 'Warta' }}</span>
            </nav>
        </div>

        <div class="max-w-4xl" data-aos="fade-up">
            <div class="mb-4">
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-[#bef264] text-xs font-black uppercase tracking-wider font-poppins border border-emerald-400/30 backdrop-blur-md">
                    <i class="ti ti-bookmark text-xs"></i>
                    {{ $post->category->name ?? 'Warta Berita' }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-black font-poppins text-white tracking-tight leading-[1.2] mb-6">
                {!! html_entity_decode($post->title) !!}
            </h1>

            <div class="flex flex-wrap items-center gap-y-2 gap-x-4 sm:gap-x-6 text-xs text-emerald-100/80 font-poppins">
                <div class="flex items-center gap-2 font-medium">
                    <div class="w-7 h-7 rounded-full bg-emerald-700/60 border border-emerald-400/30 flex items-center justify-center text-[#bef264]">
                        <i class="ti ti-user-check text-sm"></i>
                    </div>
                    <span>Redaksi Pesantren</span>
                </div>
                <span>•</span>
                <div class="flex items-center gap-1.5">
                    <i class="ti ti-calendar text-emerald-300 text-sm"></i>
                    <span>{{ $post->created_at ? $post->created_at->translatedFormat('l, d F Y - H:i') : '-' }} WIB</span>
                </div>
                <span>•</span>
                <div class="flex items-center gap-1.5 text-emerald-300">
                    <i class="ti ti-clock text-sm"></i>
                    <span>{{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }} menit baca</span>
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
            <main class="lg:col-span-8 bg-white rounded-3xl p-6 sm:p-10 lg:p-12 border border-stone-200/90 shadow-sm" data-aos="fade-up">
                <article>
                    <!-- Featured Cover Image with Elegant Frame -->
                    @if($post->image)
                        <figure class="mb-10 overflow-hidden rounded-2xl border border-stone-200 bg-stone-100 shadow-md">
                            <img 
                                src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" 
                                alt="{{ $post->title }}" 
                                class="w-full h-auto max-h-[540px] object-cover"
                                onerror="this.onerror=null; this.parentElement.style.display='none';"
                            >
                            <figcaption class="p-3.5 text-xs text-stone-500 italic bg-stone-50 border-t border-stone-100 flex items-center justify-between font-poppins">
                                <span class="flex items-center gap-1.5">
                                    <i class="ti ti-camera text-emerald-800"></i>
                                    Dokumentasi Kegiatan {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}
                                </span>
                            </figcaption>
                        </figure>
                    @endif

                    <!-- Article Typography Rich Content -->
                    <div class="prose prose-slate prose-base sm:prose-lg max-w-none 
                                prose-headings:font-black prose-headings:font-poppins prose-headings:text-stone-900 prose-headings:tracking-tight
                                prose-p:text-stone-700 prose-p:leading-relaxed prose-p:font-normal prose-p:mb-5
                                prose-a:text-emerald-800 prose-a:font-semibold hover:prose-a:text-emerald-950 prose-a:underline
                                prose-strong:text-stone-900 prose-strong:font-bold
                                prose-img:rounded-2xl prose-img:border prose-img:border-stone-200 prose-img:shadow-md
                                prose-blockquote:border-l-4 prose-blockquote:border-[#bef264] prose-blockquote:bg-emerald-900 prose-blockquote:text-white prose-blockquote:py-4 prose-blockquote:px-6 prose-blockquote:rounded-r-2xl prose-blockquote:not-italic prose-blockquote:font-medium">
                        {!! $post->content !!}
                    </div>

                    <!-- Article Footer / Share Bar -->
                    <div class="mt-14 pt-8 border-t border-stone-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-5">
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-bold text-stone-400 uppercase tracking-wider font-poppins">Topik:</span>
                            <span class="px-3.5 py-1.5 bg-emerald-50 text-emerald-800 text-xs font-bold rounded-xl border border-emerald-100 font-poppins">
                                #{{ $post->category->name ?? 'Berita' }}
                            </span>
                        </div>

                        <!-- Share Buttons -->
                        <div class="flex items-center gap-2 w-full sm:w-auto">
                            <span class="text-xs font-bold text-stone-400 mr-1 font-poppins">Bagikan:</span>
                            
                            <!-- WhatsApp -->
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . request()->fullUrl()) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-[#25D366]/10 text-[#128C7E] hover:bg-[#25D366] hover:text-white transition-all text-xs font-bold font-poppins shadow-xs"
                               title="Bagikan ke WhatsApp">
                                <i class="ti ti-brand-whatsapp text-base"></i>
                                <span>WhatsApp</span>
                            </a>

                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-stone-100 text-stone-600 hover:bg-[#1877F2] hover:text-white transition-all text-sm shadow-xs"
                               title="Bagikan ke Facebook">
                                <i class="ti ti-brand-facebook"></i>
                            </a>

                            <!-- Twitter / X -->
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-stone-100 text-stone-600 hover:bg-black hover:text-white transition-all text-sm shadow-xs"
                               title="Bagikan ke X">
                                <i class="ti ti-brand-x"></i>
                            </a>

                            <!-- Copy Link -->
                            <button onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan berita berhasil disalin ke papan klip!');" 
                                    class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-stone-100 text-stone-600 hover:bg-emerald-800 hover:text-white transition-all text-sm shadow-xs" 
                                    title="Salin Tautan">
                                <i class="ti ti-link"></i>
                            </button>
                        </div>
                    </div>
                </article>
            </main>

            <!-- Sidebar (4 cols) -->
            <aside class="lg:col-span-4 space-y-6" data-aos="fade-up" data-aos-delay="100">
                <!-- Search Widget -->
                <div class="bg-white rounded-3xl border border-stone-200/90 p-6 shadow-xs">
                    <h2 class="text-sm font-black font-poppins text-stone-900 mb-3 flex items-center gap-2">
                        <i class="ti ti-search text-emerald-800"></i>
                        Cari Warta Lainnya
                    </h2>
                    <form action="{{ route('news.index') }}" method="GET" class="relative">
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Ketik kata kunci..." 
                            class="w-full pl-4 pr-10 py-2.5 bg-stone-50 focus:bg-white text-stone-800 placeholder-stone-400 text-xs rounded-xl border border-stone-200 focus:border-emerald-700 focus:outline-none focus:ring-1 focus:ring-emerald-700 font-poppins transition-all"
                        >
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 hover:text-emerald-800">
                            <i class="ti ti-arrow-right text-base"></i>
                        </button>
                    </form>
                </div>

                <!-- Recent News Widget -->
                <div class="bg-white rounded-3xl border border-stone-200/90 p-6 shadow-xs">
                    <div class="border-b border-stone-100 pb-4 mb-4 flex items-center justify-between">
                        <h2 class="text-sm font-black font-poppins text-stone-900 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 bg-emerald-800 rounded-sm"></span>
                            Berita Terbaru
                        </h2>
                        <a href="{{ route('news.index') }}" class="text-xs text-emerald-800 hover:text-emerald-950 font-bold font-poppins">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="divide-y divide-stone-100">
                        @forelse($recentPosts as $recent)
                            <article class="py-3.5 first:pt-0 last:pb-0 group">
                                <a href="{{ route('news.show', $recent->slug) }}" class="flex gap-3.5 items-start">
                                    <div class="w-20 h-16 shrink-0 rounded-xl overflow-hidden bg-stone-100 border border-stone-200 relative shadow-2xs">
                                        @if($recent->image)
                                            <img 
                                                src="{{ $recent->getAdminImageUrl($recent->image, 'posts') }}" 
                                                alt="{{ $recent->title }}" 
                                                class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500" 
                                                onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full flex items-center justify-center bg-stone-100 text-stone-300\'><i class=\'ti ti-photo text-base\'></i></div>';"
                                            >
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-stone-100 text-stone-300">
                                                <i class="ti ti-photo text-base"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-xs font-bold font-poppins text-stone-800 group-hover:text-emerald-800 transition-colors line-clamp-2 leading-snug">
                                            {!! html_entity_decode($recent->title) !!}
                                        </h3>
                                        <span class="text-[10px] text-stone-400 font-poppins block mt-1">
                                            {{ $recent->created_at ? $recent->created_at->translatedFormat('d M Y') : '-' }}
                                        </span>
                                    </div>
                                </a>
                            </article>
                        @empty
                            <p class="text-xs text-stone-400 py-3 font-poppins">Tidak ada berita lainnya.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Back to Home CTA Box -->
                <div class="bg-gradient-to-br from-[#062d27] to-[#0d3f37] rounded-3xl p-6 text-white text-center shadow-lg relative overflow-hidden border border-emerald-700/40">
                    <div class="absolute -right-8 -top-8 w-32 h-32 bg-[#bef264]/10 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-3 border border-white/15">
                            <i class="ti ti-building-mosque text-2xl text-[#bef264]"></i>
                        </div>
                        <h3 class="text-base font-black font-poppins mb-1">Pesantren Persis 80</h3>
                        <p class="text-xs text-emerald-100/80 mb-5 leading-relaxed">Mencetak Generasi Qur'ani, Berakhlak Mulia & Berwawasan Luas.</p>
                        <a href="/" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] text-xs font-black font-poppins transition-all shadow-md">
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
