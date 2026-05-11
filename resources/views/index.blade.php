@extends('layouts.frontend')
@section('meta_description', 'Official Website Pesantren Persatuan Islam 80 Al Amin - Lembaga Pendidikan Islam Terpadu, Tahfizh Al-Quran, dan Kaderisasi Miniatur Masyarakat Rabbani di Tasikmalaya.')

@section('title')
    Beranda | {{ $pengaturan->nama_sekolah ?? 'Pesantren Al Amin' }}
@endsection

@section('content')
    @include('layouts.partials.hero')


    <!-- Unit Section -->
    <section class="pt-12 pb-24 bg-white relative overflow-hidden">
        <!-- Decorative Background Element -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-50 rounded-full -mr-32 -mt-32 opacity-50"></div>
        
        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-teal-600 font-bold text-xs uppercase tracking-[0.2em] mb-3 block">Academic Programs</span>
                <h2 class="text-4xl font-extrabold text-teal-900 mb-4 font-poppins">Jenjang Pendidikan</h2>
                <div class="w-12 h-1 bg-teal-500 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-500 leading-relaxed">Kami menyediakan pendidikan berkualitas yang terintegrasi, mulai dari tingkat dasar hingga menengah, untuk mencetak generasi Rabbani yang unggul.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-6">
                @forelse($units as $index => $unit)
                <a href="#" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="group relative bg-white p-5 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-teal-900/5 transition-all duration-500 transform hover:-translate-y-1.5 flex flex-col items-center text-center">
                    <!-- Unit Logo Container -->
                    <div class="relative mb-3">
                        <div class="absolute inset-0 bg-teal-500 scale-0 group-hover:scale-110 transition-transform duration-500 rounded-2xl opacity-5"></div>
                        <div class="w-24 h-24 bg-gray-50 rounded-2xl shadow-inner flex items-center justify-center p-2 group-hover:bg-white transition-colors duration-500 relative z-10">
                            <img src="{{ $unit->getAdminImageUrl($unit->logo) }}" alt="{{ $unit->nama_unit }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                        </div>
                    </div>
                    
                    <h3 class="text-lg font-bold text-gray-800 group-hover:text-teal-700 transition-colors">{{ $unit->nama_unit }}</h3>
                    @if($unit->keterangan)
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">{{ $unit->keterangan }}</p>
                    @endif
                    
                    <!-- Subtle Arrow Link -->
                    <div class="mt-4 text-teal-400 group-hover:text-teal-600 transition-colors">
                        <i class="ti ti-arrow-right text-xl transform group-hover:translate-x-1 transition-transform"></i>
                    </div>
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
    <section class="pt-12 pb-24 bg-white relative overflow-hidden" data-aos="fade-up">
        <div class="container mx-auto px-6 lg:px-12 relative z-10" data-aos="fade-up">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 border-b border-gray-100 pb-8">
                <div>
                    <h2 class="text-3xl font-black text-teal-950 font-poppins tracking-tight mb-2">Berita & Informasi Terkini</h2>
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
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse($news as $item)
                        <div class="group bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col relative">
                            <a href="{{ route('news.show', $item->slug) }}" class="absolute inset-0 z-10"></a>
                            <div class="aspect-[16/10] overflow-hidden relative">
                                <img src="{{ $item->getAdminImageUrl($item->image, 'posts') }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute top-4 left-4 z-20">
                                    <span class="bg-teal-600 text-white text-[9px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-lg">{{ $item->category->name ?? 'Berita' }}</span>
                                </div>
                            </div>
                            <div class="p-6 flex flex-col flex-1">
                                <div class="flex items-center gap-2 mb-3">
                                    <i class="ti ti-calendar-event text-gray-400 text-sm"></i>
                                    <span class="text-gray-400 text-[11px] font-bold">{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 group-hover:text-teal-700 transition-colors line-clamp-2 leading-tight mb-4">{{ $item->title }}</h3>
                                <p class="text-gray-500 text-xs line-clamp-2 leading-relaxed mb-6">{{ Str::limit(strip_tags($item->content), 120) }}</p>
                                <div class="mt-auto flex items-center gap-2 text-teal-600 font-bold text-[11px] uppercase tracking-wider group/link relative z-20">
                                    Baca Selengkapnya
                                    <i class="ti ti-arrow-right text-sm group-hover/link:translate-x-1 transition-transform"></i>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-span-2 text-center py-20 bg-white rounded-3xl border border-gray-100">
                                <p class="text-gray-400 italic">Belum ada berita terbaru.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Achievements Column (Sidebar) -->
                <div class="lg:col-span-4">
                    <div class="bg-white rounded-[2rem] p-8 border border-gray-100 shadow-sm flex flex-col relative overflow-hidden group">
                        <div class="flex items-center justify-between mb-8 relative z-20 bg-white">
                            <div>
                                <h2 class="text-xl font-bold text-teal-900">Wall of Fame</h2>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1">Prestasi Santri Al Amin</p>
                            </div>
                            <div class="w-10 h-10 bg-yellow-50 rounded-xl flex items-center justify-center text-yellow-600 shadow-inner">
                                <i class="ti ti-sparkles text-2xl"></i>
                            </div>
                        </div>

                        <!-- Vertical Slider Container with fixed height -->
                        <div class="h-[550px] relative overflow-hidden -mx-2 mb-4">
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
                                        <h4 class="font-bold text-gray-800 text-sm line-clamp-1 leading-tight mb-0.5">{{ $item->prestasi }}</h4>
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
                        
                        <!-- Premium CTA Card -->
                        <div class="relative group/cta overflow-hidden rounded-[2.5rem] bg-[#063b34] p-8 text-white shadow-2xl shadow-teal-950/40">
                            <!-- Animated Background Gradients -->
                            <div class="absolute inset-0 bg-gradient-to-br from-teal-900 via-[#063b34] to-[#042d27] z-0"></div>
                            <div class="absolute -top-24 -right-24 w-64 h-64 bg-teal-500/10 rounded-full blur-3xl group-hover/cta:bg-teal-500/20 transition-all duration-700"></div>
                            <div class="absolute -bottom-12 -left-12 w-48 h-48 bg-yellow-500/5 rounded-full blur-2xl group-hover/cta:bg-yellow-500/10 transition-all duration-700"></div>
                            
                            <div class="relative z-10">
                                <div class="flex items-center gap-3 mb-6">
                                    <div class="w-12 h-12 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/10 shadow-inner group-hover/cta:scale-110 transition-transform duration-500">
                                        <i class="ti ti-messages text-2xl text-yellow-400"></i>
                                    </div>
                                    <div class="h-px w-12 bg-gradient-to-r from-yellow-400/50 to-transparent"></div>
                                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-teal-300">Fast Response</span>
                                </div>
                                
                                <h3 class="text-2xl font-black mb-4 leading-tight font-poppins">Butuh Bantuan <br><span class="text-yellow-400">Pendaftaran?</span></h3>
                                <p class="text-teal-100/60 text-xs leading-relaxed mb-8 pr-4 font-medium">
                                    Tim admin kami siap membantu menjelaskan program belajar dan prosedur pendaftaran santri baru.
                                </p>
                                
                                <div class="relative group/btn">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-[#25D366] to-teal-400 rounded-2xl blur opacity-25 group-hover/btn:opacity-60 transition duration-500"></div>
                                    <a href="https://wa.me/{{ $pengaturan->telepon ?? '' }}" class="relative flex items-center justify-center gap-3 w-full bg-white text-teal-950 font-black py-4 rounded-2xl text-xs hover:bg-teal-50 transition-all shadow-xl uppercase tracking-widest overflow-hidden">
                                        <!-- Subtle Glow Overlay -->
                                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover/btn:translate-x-full transition-transform duration-1000"></div>
                                        
                                        <i class="ti ti-brand-whatsapp text-xl text-[#25D366]"></i>
                                        Chat via WhatsApp
                                    </a>
                                </div>
                                
                                <div class="mt-6 flex items-center justify-center gap-4">
                                    <div class="flex -space-x-2">
                                        <div class="w-6 h-6 rounded-full border-2 border-[#063b34] bg-teal-800 flex items-center justify-center text-[8px] font-bold">A</div>
                                        <div class="w-6 h-6 rounded-full border-2 border-[#063b34] bg-teal-700 flex items-center justify-center text-[8px] font-bold">M</div>
                                        <div class="w-6 h-6 rounded-full border-2 border-[#063b34] bg-teal-600 flex items-center justify-center text-[8px] font-bold">N</div>
                                    </div>
                                    <span class="text-[9px] font-bold text-teal-400 uppercase tracking-widest">Admin Al Amin</span>
                                </div>
                            </div>
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
    <section class="py-24 bg-white" data-aos="fade-up">
        <div class="container mx-auto px-6 lg:px-12" data-aos="fade-up">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                
                <!-- Left: Announcements -->
                <div class="relative">
                    <div class="flex items-center justify-between mb-10 border-b border-gray-200 pb-6 relative z-10">
                        <div>
                            <h2 class="text-2xl font-black text-teal-950 font-poppins tracking-tight">Pengumuman</h2>
                            <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mt-1">Informasi Akademik & Kegiatan</p>
                        </div>
                        <a href="/pengumuman" class="group flex items-center gap-2 bg-teal-50 text-teal-700 font-bold text-[10px] uppercase tracking-widest px-4 py-2 rounded-full hover:bg-teal-600 hover:text-white transition-all duration-300">
                            Semua <i class="ti ti-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <!-- Vertical Timeline Line -->
                    <div class="absolute left-7 top-24 bottom-0 w-px bg-gradient-to-b from-teal-100 via-gray-100 to-transparent z-0"></div>

                    <div class="space-y-6 relative z-10">
                        @forelse($pengumuman as $item)
                        <div class="group relative transition-all duration-500">
                            <div class="flex gap-6 items-start">
                                <!-- Calendar Badge -->
                                <div class="shrink-0 w-14 h-14 bg-white rounded-2xl border border-gray-100 shadow-sm flex flex-col items-center justify-center relative z-10 group-hover:border-teal-500 group-hover:shadow-lg group-hover:shadow-teal-900/5 transition-all duration-500">
                                    <div class="text-lg font-black text-teal-900 leading-none">{{ $item->created_at->format('d') }}</div>
                                    <div class="text-[9px] font-black text-teal-500 uppercase tracking-widest mt-0.5">{{ $item->created_at->format('M') }}</div>
                                    <!-- Decorative dot on line -->
                                    <div class="absolute -left-[11px] top-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-gray-200 group-hover:bg-teal-500 transition-colors"></div>
                                </div>
                                
                                <!-- Content Card -->
                                <div class="flex-1 bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-teal-900/5 transition-all duration-500 relative">
                                    <div class="flex items-center gap-3 mb-2">
                                        @if($loop->first)
                                            <span class="px-2 py-0.5 bg-yellow-400 text-white text-[8px] font-black rounded uppercase tracking-widest">New</span>
                                        @endif
                                        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                            {{ $item->created_at->format('Y') }}
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 group-hover:text-teal-700 transition-colors mb-2 leading-tight text-lg">{{ $item->judul }}</h3>
                                    <p class="text-gray-500 text-sm line-clamp-2 leading-relaxed">{{ Str::limit($item->isi, 120) }}</p>
                                    
                                    <a href="#" class="mt-4 inline-flex items-center gap-2 text-[10px] font-black text-teal-600 uppercase tracking-widest group/link">
                                        Baca Selengkapnya
                                        <i class="ti ti-chevron-right transform group-hover/link:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
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
                            <h2 class="text-2xl font-black text-teal-950 font-poppins tracking-tight">Apa Kata Mereka?</h2>
                            <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mt-1">Testimoni Wali & Alumni</p>
                        </div>
                        <div class="flex gap-2">
                            <template x-for="(i, index) in slidesCount" :key="index">
                                <button 
                                    @click="activeSlide = index"
                                    :class="activeSlide === index ? 'w-8 bg-teal-500' : 'w-2 bg-teal-200 hover:bg-teal-300'"
                                    class="h-1 rounded-full transition-all duration-300"
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
                                            <h4 class="font-bold text-teal-900 text-base mb-0.5">{{ $testi->nama }}</h4>
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
