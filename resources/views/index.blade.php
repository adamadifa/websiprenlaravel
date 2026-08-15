@extends('layouts.frontend')
@section('meta_description', 'Official Website Pesantren Persatuan Islam 80 Al Amin - Lembaga Pendidikan Islam Terpadu, Tahfizh Al-Quran, dan Kaderisasi Miniatur Masyarakat Rabbani di Tasikmalaya.')

@section('title')
    Beranda | {{ $pengaturan->nama_sekolah ?? 'Pesantren Al Amin' }}
@endsection

@section('content')
    @include('layouts.partials.hero')


    <!-- Unit Section -->
    <section class="pt-12 pb-24 bg-white relative overflow-hidden">
        <!-- Grid Ornament Overlay -->
        <div class="absolute inset-0 pointer-events-none z-0 opacity-50" style="
            background-image: 
                linear-gradient(to right, rgba(13, 148, 136, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(13, 148, 136, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
            mask-image: radial-gradient(ellipse 80% 50% at 50% 50%, #000 60%, transparent 100%);
            -webkit-mask-image: radial-gradient(ellipse 80% 50% at 50% 50%, #000 60%, transparent 100%);
        "></div>

        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-teal-600 font-bold text-xs uppercase tracking-[0.2em] mb-3 block">Academic Programs</span>
                <h2 class="text-4xl font-extrabold text-teal-900 mb-4 font-poppins">Jenjang Pendidikan</h2>
                <div class="w-12 h-1 bg-teal-500 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-500 leading-relaxed">Kami menyediakan pendidikan berkualitas yang terintegrasi, mulai dari tingkat dasar hingga menengah, untuk mencetak generasi Rabbani yang unggul.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-6">
                @forelse($units as $index => $unit)
                <a href="#" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                    <!-- Unit Logo Container -->
                    <div class="w-24 h-24 bg-gray-50/50 rounded-full border border-gray-100 flex items-center justify-center p-3 mb-4 group-hover:bg-white transition-colors duration-300">
                        <img src="{{ $unit->getAdminImageUrl($unit->logo) }}" alt="{{ $unit->nama_unit }}" class="w-16 h-16 object-contain">
                    </div>
                    
                    <h3 class="text-base font-bold text-gray-800 group-hover:text-teal-600 transition-colors duration-300 font-poppins">{{ $unit->nama_unit }}</h3>
                    
                    @if($unit->keterangan)
                    <p class="text-xs text-gray-500 mt-1.5 font-medium">{{ $unit->keterangan }}</p>
                    @endif
                </a>
                @empty
                    <div class="col-span-full py-20 text-center bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                        <p class="text-gray-400 italic">Belum ada data jenjang pendidikan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Program Unggulan Section -->
    <section class="pt-16 pb-0 bg-[#0a4d44] relative overflow-hidden text-white" data-aos="fade-up">
        <!-- Background Decorations -->
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-teal-800 rounded-full -ml-64 -mt-64 opacity-20 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-yellow-500 rounded-full -mr-48 -mb-48 opacity-10 blur-3xl"></div>
        
        <!-- Grid Ornament Overlay -->
        <div class="absolute inset-0 pointer-events-none z-0 opacity-15" style="
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 40px 40px;
            mask-image: radial-gradient(circle at 50% 50%, #000 50%, transparent 100%);
            -webkit-mask-image: radial-gradient(circle at 50% 50%, #000 50%, transparent 100%);
        "></div>
        
        <div class="container mx-auto px-6 lg:px-12 relative z-10" data-aos="fade-up">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-teal-400 font-bold text-xs uppercase tracking-[0.2em] mb-3 block">Excellent Programs</span>
                <h2 class="text-4xl font-extrabold text-white mb-4 font-poppins">Program Unggulan Pesantren</h2>
                <div class="w-12 h-1 bg-teal-500 mx-auto mb-6 rounded-full"></div>
                <p class="text-teal-100/70 leading-relaxed">Program-program terbaik yang kami tawarkan untuk mengembangkan potensi santri secara holistik dan spiritual.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Model Image -->
                <div class="relative order-2 lg:order-1">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a4d44] via-transparent to-transparent z-10"></div>
                    <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_3) : 'https://placehold.co/600x800?text=Model+3' }}" alt="Model 3" class="w-full h-auto relative z-0 drop-shadow-[0_20px_50px_rgba(0,0,0,0.5)] transform hover:scale-105 transition-transform duration-700">
                    
                    <!-- Floating Achievement -->
                    <div class="absolute top-1/4 -left-12 bg-white/10 backdrop-blur-2xl p-6 rounded-[2.5rem] border border-white/20 shadow-[0_25px_60px_rgba(0,0,0,0.4)] animate-float-y z-20 hidden md:block group">
                        <div class="flex items-center gap-6">
                            <div class="relative">
                                <!-- Firm, Modern Number with Text Gradient -->
                                <div class="flex items-start">
                                    <span class="text-6xl font-black tracking-tighter text-transparent bg-clip-text bg-gradient-to-br from-yellow-300 via-yellow-500 to-orange-500 font-poppins">99</span>
                                    <span class="text-2xl font-extrabold text-yellow-500 mt-2 ml-1">%</span>
                                </div>
                            </div>
                            <div class="border-l border-white/20 pl-6">
                                <div class="text-white font-black text-lg leading-tight tracking-tight uppercase">Success</div>
                                <div class="text-teal-300 font-bold text-[10px] uppercase tracking-[0.2em] mt-1">Graduate Placement</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Programs List -->
                <div class="space-y-4 order-1 lg:order-2">
                    @forelse($unggulan as $item)
                    <div class="group bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/10 p-6 rounded-3xl transition-all duration-500 hover:border-white/30 hover:shadow-2xl hover:shadow-teal-950/50">
                        <div class="flex gap-6">
                            <div class="shrink-0 w-14 h-14 bg-teal-500/20 group-hover:bg-teal-500 rounded-2xl flex items-center justify-center text-teal-300 group-hover:text-white transition-all duration-500 shadow-inner">
                                @php
                                    $icons = [
                                        'Pembentukan Karakter' => '<i class="ti ti-user-check text-3xl"></i>',
                                        'Tahsin & Tahfizh Al Quran' => '<i class="ti ti-book-2 text-3xl"></i>',
                                        'Bahasa Asing' => '<i class="ti ti-language text-3xl"></i>',
                                        'Science' => '<i class="ti ti-flask text-3xl"></i>',
                                    ];
                                @endphp
                                {!! $icons[$item->nama_program] ?? '<i class="ti ti-star text-3xl"></i>' !!}
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-1 group-hover:text-teal-300 transition-colors">{{ $item->nama_program }}</h3>
                                <p class="text-teal-100/60 text-sm leading-relaxed">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p class="text-teal-100/50 italic">Data program belum tersedia.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- News & Achievement Section -->
    <section class="pt-12 pb-10 bg-white relative overflow-hidden" data-aos="fade-up">
        <div class="container mx-auto px-6 lg:px-12 relative z-10" data-aos="fade-up">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 border-b border-gray-100 pb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-teal-950 font-poppins mb-2">Berita & Informasi Terkini</h2>
                    <p class="text-gray-500 text-sm max-w-xl">Ikuti perkembangan terbaru kegiatan pesantren dan pencapaian prestasi santri Al Amin.</p>
                </div>
                <div>
                    <a href="{{ route('news.index') }}" class="group flex items-center gap-2 text-teal-600 font-bold text-[11px] uppercase tracking-[0.2em] hover:text-teal-800 transition-colors">
                        Lihat Seluruh Berita
                        <i class="ti ti-arrow-right text-lg transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- News Column -->
                <div class="lg:col-span-8">
                    @if($news->isEmpty())
                        <div class="text-center py-20 bg-white rounded-3xl border border-gray-100">
                            <p class="text-gray-400 italic">Belum ada berita terbaru.</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Left Column: Featured/Big News Card -->
                            @php $firstNews = $news->first(); @endphp
                            <div class="relative rounded-[2rem] overflow-hidden group h-[300px] md:h-[480px] shadow-sm hover:shadow-xl transition-all duration-500">
                                <a href="{{ route('news.show', $firstNews->slug) }}" class="absolute inset-0 z-20" aria-label="Baca selengkapnya tentang {{ $firstNews->title }}"></a>
                                <img src="{{ $firstNews->getAdminImageUrl($firstNews->image, 'posts') }}" alt="{{ $firstNews->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 z-0">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/40 to-transparent z-10"></div>
                                
                                <div class="absolute inset-x-0 bottom-0 p-6 md:p-8 z-15 flex flex-col justify-end h-full pointer-events-none">
                                    <h3 class="text-lg md:text-2xl font-bold text-white font-poppins leading-snug line-clamp-3">
                                        {{ $firstNews->title }}
                                    </h3>
                                    <div class="w-full border-t border-white/20 my-3"></div>
                                    <div class="flex items-center gap-2 text-white/80 text-xs font-medium">
                                        <i class="ti ti-calendar-event"></i>
                                        <span>{{ $firstNews->created_at->translatedFormat('d F Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: 2x2 Grid of Smaller Cards -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach($news->skip(1) as $item)
                                    <div class="relative rounded-2xl overflow-hidden group h-[232px] shadow-sm hover:shadow-xl transition-all duration-500">
                                        <a href="{{ route('news.show', $item->slug) }}" class="absolute inset-0 z-20" aria-label="Baca selengkapnya tentang {{ $item->title }}"></a>
                                        <img src="{{ $item->getAdminImageUrl($item->image, 'posts') }}" alt="{{ $item->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 z-0">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
                                        
                                        <div class="absolute inset-x-0 bottom-0 p-4 md:p-5 z-15 flex flex-col justify-end h-full pointer-events-none">
                                            <h3 class="text-xs md:text-sm font-bold text-white font-poppins leading-snug line-clamp-3">
                                                {{ $item->title }}
                                            </h3>
                                            <div class="w-full border-t border-white/20 my-2"></div>
                                            <div class="flex items-center gap-1.5 text-white/80 text-[10px] font-medium">
                                                <i class="ti ti-calendar-event"></i>
                                                <span>{{ $item->created_at->translatedFormat('d F Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Achievements Column (Sidebar) -->
                <div class="lg:col-span-4 flex flex-col gap-6">
                    <!-- Daftar Prestasi Card -->
                    <div class="bg-white rounded-[2rem] p-8 border border-gray-100 shadow-sm flex flex-col relative overflow-hidden group h-[480px]">
                        <div class="flex items-center justify-between mb-6 relative z-20 bg-white">
                            <div>
                                <h2 class="text-xl font-bold text-teal-900 font-poppins">Daftar Prestasi</h2>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1">Prestasi Santri Al Amin</p>
                            </div>
                            <div class="w-10 h-10 bg-yellow-50 rounded-xl flex items-center justify-center text-yellow-600 shadow-inner">
                                <i class="ti ti-sparkles text-2xl"></i>
                            </div>
                        </div>

                        <!-- Vertical Slider Container with adjusted height -->
                        <div class="h-[300px] relative overflow-hidden -mx-2 mb-4">
                            <div class="animate-vertical-marquee space-y-4 px-2">
                                @php $displayPrestasi = $prestasi->concat($prestasi); @endphp
                                @forelse($displayPrestasi as $item)
                                <div class="flex items-center gap-4 p-4 rounded-2xl bg-gray-50/50 border border-gray-100 hover:bg-white hover:shadow-lg hover:shadow-teal-900/5 transition-all duration-300">
                                    <div class="shrink-0">
                                        @if($item->foto)
                                            <img src="{{ $item->getAdminImageUrl($item->foto) }}" alt="{{ $item->nama_siswa }}" class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm">
                                        @else
                                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-teal-500 to-teal-700 flex items-center justify-center text-white font-bold text-xs shadow-sm">
                                                {{ collect(explode(' ', $item->nama_siswa))->map(fn($n) => substr($n, 0, 1))->take(2)->join('') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-[9px] font-black text-teal-600 uppercase tracking-[0.15em] mb-0.5">{{ $item->tingkat }}</div>
                                        <h3 class="font-bold text-gray-800 text-sm line-clamp-1 leading-tight mb-0.5">{{ $item->prestasi }}</h3>
                                        <p class="text-[10px] text-gray-400 font-medium truncate">{{ $item->nama_siswa }}</p>
                                    </div>
                                    <div class="shrink-0 text-yellow-500">
                                        <i class="ti ti-star-filled text-lg"></i>
                                    </div>
                                </div>
                                @empty
                                    <p class="text-gray-400 italic text-sm text-center py-10">Belum ada data prestasi.</p>
                                @endforelse
                            </div>
                            <!-- Gradient Fade Effects -->
                            <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-white via-white/40 to-transparent pointer-events-none z-10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes vertical-marquee {
            0% { transform: translateY(0); }
            100% { transform: translateY(-50%); }
        }
        .animate-vertical-marquee {
            animation: vertical-marquee 40s linear infinite;
        }
        .animate-vertical-marquee:hover {
            animation-play-state: paused;
        }
    </style>

    <!-- Announcements & Testimonials Section -->
    <section class="pt-10 pb-24 bg-white" data-aos="fade-up">
        <div class="container mx-auto px-6 lg:px-12" data-aos="fade-up">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                
                <!-- Left: Announcements -->
                <div class="relative">
                    <div class="flex items-center justify-between mb-10 border-b border-gray-200 pb-6 relative z-10">
                        <div>
                            <h2 class="text-2xl font-extrabold text-teal-950 font-poppins">Pengumuman</h2>
                            <p class="text-gray-500 text-sm mt-1">Informasi akademik & kegiatan.</p>
                        </div>
                        <a href="/pengumuman" class="group flex items-center gap-2 bg-teal-50 text-teal-700 font-bold text-[10px] uppercase tracking-widest px-4 py-2 rounded-full hover:bg-teal-600 hover:text-white transition-all duration-300">
                            Semua <i class="ti ti-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <div class="space-y-4 relative z-10">
                        @forelse($pengumuman as $item)
                        <a href="#" class="group block bg-white p-4 rounded-2xl border border-gray-100/80 shadow-sm hover:shadow-md hover:border-teal-500/20 hover:-translate-y-0.5 transition-all duration-300 relative">
                            <div class="flex items-center gap-4">
                                <!-- Date Badge (Compact) -->
                                <div class="shrink-0 flex flex-col items-center justify-center w-12 h-12 bg-teal-50 rounded-xl border border-teal-100/50 group-hover:bg-teal-600 group-hover:border-teal-600 transition-colors duration-300">
                                    <span class="text-base font-black text-teal-900 group-hover:text-white leading-none transition-colors duration-300">{{ $item->created_at->format('d') }}</span>
                                    <span class="text-[8px] font-bold text-teal-600 group-hover:text-yellow-300 uppercase tracking-wider mt-0.5 transition-colors duration-300">{{ $item->created_at->format('M') }}</span>
                                </div>
                                
                                <!-- Content Info -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        @if($loop->first)
                                            <span class="inline-flex items-center gap-1 px-1.5 py-0.5 bg-yellow-400 text-teal-950 text-[8px] font-black rounded-full uppercase tracking-wider">
                                                New
                                            </span>
                                        @endif
                                        <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">{{ $item->created_at->format('Y') }}</span>
                                    </div>
                                    <h3 class="font-bold text-gray-800 group-hover:text-teal-700 transition-colors text-sm md:text-base truncate leading-tight font-poppins">
                                        {{ $item->judul }}
                                    </h3>
                                    <p class="text-gray-400 text-xs truncate mt-0.5 font-medium">
                                        {{ strip_tags($item->isi) }}
                                    </p>
                                </div>

                                <!-- Arrow Indicator -->
                                <div class="shrink-0 w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-teal-50 group-hover:text-teal-600 transition-all duration-300">
                                    <i class="ti ti-chevron-right text-sm transform group-hover:translate-x-0.5 transition-transform"></i>
                                </div>
                            </div>
                        </a>
                        @empty
                            <div class="text-center py-12 bg-white rounded-3xl border border-dashed border-gray-200">
                                <i class="ti ti-bell-off text-4xl text-gray-200 mb-3 block"></i>
                                <p class="text-gray-400 italic text-sm">Belum ada pengumuman terbaru.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Right: Testimonials -->
                <div x-data="{ 
                    activeSlide: 0, 
                    slidesCount: {{ $testimonials->count() }},
                    autoPlay() {
                        setInterval(() => {
                            this.activeSlide = (this.activeSlide + 1) % this.slidesCount;
                        }, 6000);
                    }
                }" x-init="autoPlay()">
                    <div class="flex items-center justify-between mb-10 border-b border-gray-200 pb-6">
                        <div>
                            <h2 class="text-2xl font-extrabold text-teal-950 font-poppins">Apa Kata Mereka?</h2>
                            <p class="text-gray-500 text-sm mt-1">Testimoni wali santri & alumni.</p>
                        </div>
                        <div class="flex gap-2">
                            <template x-for="(i, index) in slidesCount" :key="index">
                            <button 
                                    @click="activeSlide = index"
                                    :class="activeSlide === index ? 'w-8 bg-teal-500' : 'w-2 bg-teal-200 hover:bg-teal-300'"
                                    class="h-1 rounded-full transition-all duration-300"
                                    :aria-label="`Go to slide ${index + 1}`"
                                ></button>
                            </template>
                        </div>
                    </div>

                    <div class="relative overflow-hidden -mx-4 px-4">
                        <div 
                            class="flex gap-4 transition-transform duration-700 ease-in-out"
                            :style="`transform: translateX(-${activeSlide * 85}%)`"
                        >
                            @forelse($testimonials as $testi)
                            <div class="w-[85%] shrink-0">
                                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm relative group h-full flex flex-col min-h-[250px] hover:shadow-xl hover:shadow-teal-900/5 transition-all">
                                    <div class="absolute top-8 right-8 text-teal-100 group-hover:text-teal-500/20 transition-colors">
                                        <i class="ti ti-quote text-6xl"></i>
                                    </div>
                                    
                                    <p class="text-gray-600 italic text-base leading-relaxed mb-6 relative z-10">
                                        "{{ $testi->testimoni }}"
                                    </p>
                                    
                                    <div class="flex items-center gap-4">
                                        <div class="shrink-0">
                                            @if($testi->foto)
                                                <img src="{{ $testi->getAdminImageUrl($testi->foto) }}" alt="{{ $testi->nama }}" class="w-14 h-14 rounded-full object-cover border-2 border-teal-50">
                                            @else
                                                <div class="w-14 h-14 rounded-full bg-teal-900 flex items-center justify-center text-white font-bold text-sm shadow-lg">
                                                    {{ collect(explode(' ', $testi->nama))->map(fn($n) => substr($n, 0, 1))->take(2)->join('') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-teal-900 text-base mb-0.5">{{ $testi->nama }}</h3>
                                            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">Wali Santri / Alumni</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <p class="text-gray-400 italic">Belum ada testimoni.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
