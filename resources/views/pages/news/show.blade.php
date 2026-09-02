@extends('layouts.frontend')

@section('title', $post->title . ' - Al Amin')
@section('meta_description', Str::limit(strip_tags($post->content), 160))
@section('meta_image', $post->getAdminImageUrl($post->image, 'posts'))

@section('content')
<div class="bg-white min-h-screen pt-28 pb-20 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-6">
            <a href="/" class="hover:text-teal-700 transition-colors">Beranda</a>
            <i class="ti ti-chevron-right text-[10px] text-slate-400"></i>
            <a href="{{ route('news.index') }}" class="hover:text-teal-700 transition-colors">Berita & Artikel</a>
            <i class="ti ti-chevron-right text-[10px] text-slate-400"></i>
            <span class="text-slate-800 font-semibold truncate max-w-xs sm:max-w-md">{{ Str::limit($post->title, 40) }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14">
            
            <!-- Main Content (8 cols) -->
            <main class="lg:col-span-8">
                <article>
                    <!-- Category Badge -->
                    <div class="mb-3">
                        <span class="inline-flex items-center px-3 py-1 rounded text-xs font-semibold bg-teal-50 text-teal-800 border border-teal-200/60">
                            {{ $post->category->name ?? 'Warta Berita' }}
                        </span>
                    </div>

                    <!-- Article Title -->
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-slate-900 leading-tight tracking-tight mb-4 font-sans">
                        {!! html_entity_decode($post->title) !!}
                    </h1>

                    <!-- Article Meta Info -->
                    <div class="flex flex-wrap items-center gap-y-2 gap-x-4 text-xs sm:text-sm text-slate-500 py-3 border-y border-slate-200 mb-6">
                        <div class="flex items-center gap-1.5 font-medium text-slate-700">
                            <i class="ti ti-user-circle text-teal-700 text-base"></i>
                            <span>Redaksi Pesantren</span>
                        </div>
                        <span class="text-slate-300">•</span>
                        <div class="flex items-center gap-1.5">
                            <i class="ti ti-calendar text-slate-400"></i>
                            <time datetime="{{ $post->created_at->toIso8601String() }}">
                                {{ $post->created_at->translatedFormat('l, d F Y - H:i') }} WIB
                            </time>
                        </div>
                        <span class="text-slate-300 hidden sm:inline">•</span>
                        <div class="flex items-center gap-1.5 text-slate-400">
                            <i class="ti ti-clock"></i>
                            <span>{{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }} mnt baca</span>
                        </div>
                    </div>

                    <!-- Featured Image & Caption -->
                    @if($post->image)
                    <figure class="mb-8">
                        <div class="overflow-hidden rounded-xl bg-slate-100 border border-slate-200">
                            <img 
                                src="{{ $post->getAdminImageUrl($post->image, 'posts') }}" 
                                alt="{{ $post->title }}" 
                                class="w-full h-auto max-h-[500px] object-cover"
                                onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-[320px] bg-slate-50 flex flex-col gap-2 items-center justify-center text-slate-400\'><i class=\'ti ti-photo text-4xl\'></i><span class=\'text-xs\'>Gambar tidak dapat dimuat</span></div>';"
                            >
                        </div>
                        <figcaption class="mt-2 text-xs text-slate-500 italic flex items-center justify-between">
                            <span>Dokumentasi: Pesantren Al-Amin</span>
                        </figcaption>
                    </figure>
                    @endif

                    <!-- Article Body / Typography -->
                    <div class="prose prose-slate prose-base sm:prose-lg max-w-none 
                                prose-headings:font-bold prose-headings:text-slate-900 prose-headings:tracking-tight
                                prose-p:text-slate-700 prose-p:leading-relaxed prose-p:font-normal
                                prose-a:text-teal-700 prose-a:font-semibold hover:prose-a:text-teal-800 prose-a:underline
                                prose-strong:text-slate-900 prose-strong:font-semibold
                                prose-img:rounded-lg prose-img:border prose-img:border-slate-200 prose-img:shadow-none
                                prose-blockquote:border-l-4 prose-blockquote:border-teal-600 prose-blockquote:bg-slate-50 prose-blockquote:py-2 prose-blockquote:px-4 prose-blockquote:italic prose-blockquote:text-slate-700">
                        {!! $post->content !!}
                    </div>

                    <!-- Article Footer / Tags & Social Share -->
                    <div class="mt-10 pt-6 border-t border-slate-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Kategori:</span>
                            <span class="px-2.5 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded hover:bg-slate-200 transition-colors">
                                {{ $post->category->name ?? 'Berita' }}
                            </span>
                        </div>

                        <!-- Share Buttons -->
                        <div class="flex items-center gap-2 w-full sm:w-auto">
                            <span class="text-xs font-semibold text-slate-500 mr-1">Bagikan:</span>
                            
                            <!-- WhatsApp -->
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . request()->fullUrl()) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#25D366]/10 text-[#128C7E] hover:bg-[#25D366] hover:text-white transition-colors text-xs font-medium"
                               title="Bagikan ke WhatsApp">
                                <i class="ti ti-brand-whatsapp text-sm"></i>
                                <span>WhatsApp</span>
                            </a>

                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-slate-600 hover:bg-[#1877F2] hover:text-white transition-colors text-xs"
                               title="Bagikan ke Facebook">
                                <i class="ti ti-brand-facebook text-base"></i>
                            </a>

                            <!-- Twitter / X -->
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-slate-600 hover:bg-black hover:text-white transition-colors text-xs"
                               title="Bagikan ke X / Twitter">
                                <i class="ti ti-brand-x text-sm"></i>
                            </a>

                            <!-- Copy Link -->
                            <button onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan berita berhasil disalin!');" 
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors text-xs" 
                                    title="Salin Tautan">
                                <i class="ti ti-link text-sm"></i>
                            </button>
                        </div>
                    </div>
                </article>
            </main>

            <!-- Sidebar (4 cols) -->
            <aside class="lg:col-span-4 space-y-8">
                
                <!-- Berita Terpopuler / Terbaru Box -->
                <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                    <div class="border-b border-slate-200 pb-3 mb-4 flex items-center justify-between">
                        <h2 class="text-base font-bold text-slate-900 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 bg-teal-600 rounded-sm"></span>
                            Berita Terbaru
                        </h2>
                        <a href="{{ route('news.index') }}" class="text-xs text-teal-700 hover:text-teal-800 font-semibold hover:underline">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="divide-y divide-slate-100">
                        @forelse($recentPosts as $index => $recent)
                        <article class="py-3.5 first:pt-0 last:pb-0 group">
                            <a href="{{ route('news.show', $recent->slug) }}" class="flex gap-3.5 items-start">
                                <!-- Nomor urut atau Thumbnail -->
                                <div class="w-20 h-16 shrink-0 rounded-lg overflow-hidden bg-slate-100 border border-slate-200 relative">
                                    @if($recent->image)
                                        <img src="{{ $recent->getAdminImageUrl($recent->image, 'posts') }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.onerror=null; this.outerHTML='<div class=\'w-full h-full flex items-center justify-center bg-slate-100 text-slate-400\'><i class=\'ti ti-photo text-base\'></i></div>';">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-slate-100 text-slate-400">
                                            <i class="ti ti-photo text-base"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-xs font-semibold text-slate-800 group-hover:text-teal-700 transition-colors line-clamp-2 leading-snug">
                                        {{ $recent->title }}
                                    </h3>
                                    <span class="text-[11px] text-slate-400 block mt-1.5">
                                        {{ $recent->created_at->translatedFormat('d F Y') }}
                                    </span>
                                </div>
                            </a>
                        </article>
                        @empty
                        <p class="text-xs text-slate-400 py-3">Tidak ada berita terbaru lainnya.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Banner / Sekilas Info Pesantren -->
                <div class="bg-gradient-to-br from-teal-800 to-teal-950 text-white rounded-xl p-6 shadow-sm">
                    <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-teal-600/50 text-teal-100 mb-3">
                        Penerimaan Santri Baru
                    </span>
                    <h3 class="text-base font-bold mb-2">Pendaftaran Santri Baru Telah Dibuka</h3>
                    <p class="text-xs text-teal-100/80 leading-relaxed mb-4">
                        Bergabunglah bersama keluarga besar Pesantren Al-Amin. Raih masa depan dengan ilmu agama dan umum yang berintegritas.
                    </p>
                    <a href="/spmb" class="inline-flex items-center gap-1.5 px-4 py-2 bg-white text-teal-900 rounded-lg text-xs font-bold hover:bg-teal-50 transition-colors">
                        Informasi SPMB
                        <i class="ti ti-arrow-right text-xs"></i>
                    </a>
                </div>

            </aside>

        </div>
    </div>
</div>
@endsection

