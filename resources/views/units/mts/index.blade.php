@extends('layouts.mts')

@section('title', 'MTs Persis Sindangkasih - Madrasah Tsanawiyah Unggul')
@section('meta_description', 'Official Landing Page MTs Persis Sindangkasih - Madrasah Tsanawiyah modern berbasis pesantren, tafaqquh fiddin, tahfidz Al-Qur\'an, sains terapan, dan kurikulum nasional.')

@section('content')

    <!-- ==============================================================
         1. HERO SECTION (Identik dengan Gambar Acuan Antixor)
         - Kiri: Headline besar, Subtitle, 2 CTA Button, 3 Feature Badges
         - Kanan: Foto Model Santri dengan Badge Bulat Melayang "100% Terakreditasi"
         - Background: Soft warm beige tone dengan nuansa coklat elegan
         ============================================================== -->
    <section id="hero" class="relative pt-12 pb-16 sm:pt-16 sm:pb-24 lg:pt-24 lg:pb-32 bg-[#fdfcfb] overflow-hidden min-h-[580px] lg:min-h-[660px] flex items-center">
        
        <!-- 1. Full Landscape Background Image -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
            <img 
                src="{{ !empty($setting->hero_background_image) ? $unit->getAdminImageUrl($setting->hero_background_image) : asset('images/mts/bg-bright.jpg') }}" 
                alt="Background MTs" 
                class="w-full h-full object-cover object-center"
            >

            <!-- 2. Overlay Gradasi Halus (Solid di kiri, transparan di kanan) -->
            <!-- Menggunakan inline CSS linear-gradient untuk menjamin transisi 100% mulus tanpa garis potong -->
            <div class="absolute inset-0 z-0" style="background: linear-gradient(to right, #fdfcfb 0%, #fdfcfb 50%, rgba(253, 252, 251, 0) 100%); pointer-events: none;"></div>
            
            <!-- Mobile Bottom fade to ensure buttons & badges stay super crisp -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#fdfcfb] via-[#fdfcfb]/90 to-transparent lg:hidden"></div>
        </div>

        <!-- 3. Model Santri (Kanan, Floating in front of background and gradient) -->
        <div class="absolute bottom-0 right-0 lg:right-[2%] xl:right-[8%] w-[90%] sm:w-[60%] lg:w-[45%] xl:w-[40%] max-w-[650px] z-10 pointer-events-none flex justify-end" data-aos="fade-up" data-aos-duration="1000">
            <img 
                src="{{ !empty($setting->hero_model_image) ? $unit->getAdminImageUrl($setting->hero_model_image) : asset('images/mts/santri-model.png') }}" 
                alt="Santri MTs Persis" 
                class="w-full h-auto max-h-[85vh] object-contain object-bottom drop-shadow-[0_15px_25px_rgba(0,0,0,0.15)]"
            >
        </div>

        <!-- Floating Badge Melayang "100% Akreditasi Unggul" -->
        <div class="hidden lg:flex absolute top-20 right-[35%] xl:right-[32%] z-20" data-aos="fade-down" data-aos-delay="200">
            <div class="bg-white/95 backdrop-blur-md w-24 h-24 xl:w-28 xl:h-28 rounded-full shadow-2xl border-2 border-stone-100 flex flex-col items-center justify-center text-center p-2.5">
                <span class="font-inter font-black text-xl xl:text-2xl text-[#3e2723] leading-none">{{ $setting->hero_badge_text ?? '100%' }}</span>
                <span class="font-inter font-bold text-[9px] xl:text-[10px] text-stone-500 uppercase leading-tight mt-1">{{ $setting->hero_badge_subtext ?? 'Akreditasi Unggul' }}</span>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Left Text Column (lg:col-span-7) over the overlay shadow -->
                <div class="lg:col-span-7 text-center lg:text-left pt-2 sm:pt-0" data-aos="fade-right">
                    
                    <!-- Main Big Bold Headline (Identik dengan Antixor: "Professional Cleaning for a Healthier Home") -->
                    <h1 class="font-inter text-3xl sm:text-5xl lg:text-[54px] font-extrabold text-[#3e2723] leading-[1.12] mb-5 tracking-tight">
                        Pendidikan Islam <br class="hidden sm:inline">
                        <span class="text-[#5d4037]">Unggul</span> untuk Generasi <br class="hidden sm:inline">
                        <span class="text-[#8d6e63]">Masa Depan</span>
                    </h1>

                    <!-- Subtitle / Tagline -->
                    <p class="font-inter font-normal text-stone-600 text-sm sm:text-base lg:text-lg leading-relaxed mb-8 max-w-xl mx-auto lg:mx-0">
                        {{ $setting->hero_description ?? 'Lembaga pendidikan tingkat madrasah tsanawiyah terakreditasi, memadukan tafaqquh fiddin, tahfidz Al-Qur\'an, nalar sains terapan, dan pembentukan karakter kepemimpinan Islami.' }}
                    </p>

                    <!-- CTA Buttons (Identik Antixor: Tombol Utama Persegi Rounded Coklat Tua + Tombol Outline Putar Video) -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 mb-10 sm:mb-12 font-inter">
                        <!-- Primary CTA Button (Warm Deep Brown with Soft Rounded Corners) -->
                        <a href="/register" class="btn-primary-brown w-full sm:w-auto px-8 py-3.5 rounded-lg font-bold text-sm shadow-md hover:shadow-lg transition-all text-center" style="background-color: #3e2723 !important; color: #ffffff !important;">
                            Daftar Santri Baru
                        </a>

                        <!-- Secondary Action: Watch Video / Profil MTs -->
                        <a href="#tentang" class="w-full sm:w-auto px-6 py-3.5 rounded-lg bg-white hover:bg-stone-50 text-[#3e2723] border border-stone-300 font-semibold text-sm shadow-sm transition-all flex items-center justify-center gap-2.5">
                            <div class="w-6 h-6 rounded-full bg-amber-100 text-[#3e2723] flex items-center justify-center text-xs">
                                <i class="ti ti-player-play-filled"></i>
                            </div>
                            <span>Profil Madrasah</span>
                        </a>
                    </div>

                    <!-- 3 Feature Badges on Bottom (Identik Antixor: Eco-Friendly, Verified & Trained, Satisfaction) -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-6 border-t border-stone-300/80 text-left">
                        
                        <!-- Feature 1: Kurikulum Terpadu -->
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-white/80 backdrop-blur-sm sm:bg-transparent border border-stone-200/60 sm:border-0 shadow-sm sm:shadow-none">
                            <div class="w-10 h-10 rounded-full bg-[#efebe9] text-[#5d4037] flex items-center justify-center text-xl shrink-0" style="background-color: #efebe9 !important; color: #5d4037 !important;">
                                <i class="ti ti-book"></i>
                            </div>
                            <div class="font-inter">
                                <h4 class="font-bold text-xs text-[#3e2723] leading-snug">Kurikulum Terpadu</h4>
                                <span class="text-[11px] text-stone-500">Kemenag & Pesantren</span>
                            </div>
                        </div>

                        <!-- Feature 2: Asatidz Tersertifikasi -->
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-white/80 backdrop-blur-sm sm:bg-transparent border border-stone-200/60 sm:border-0 shadow-sm sm:shadow-none">
                            <div class="w-10 h-10 rounded-full bg-[#efebe9] text-[#5d4037] flex items-center justify-center text-xl shrink-0" style="background-color: #efebe9 !important; color: #5d4037 !important;">
                                <i class="ti ti-certificate"></i>
                            </div>
                            <div class="font-inter">
                                <h4 class="font-bold text-xs text-[#3e2723] leading-snug">Pendidik Berdedikasi</h4>
                                <span class="text-[11px] text-stone-500">Hufadz & Profesional</span>
                            </div>
                        </div>

                        <!-- Feature 3: Garansi Kualitas Mutu -->
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-white/80 backdrop-blur-sm sm:bg-transparent border border-stone-200/60 sm:border-0 shadow-sm sm:shadow-none">
                            <div class="w-10 h-10 rounded-full bg-[#efebe9] text-[#5d4037] flex items-center justify-center text-xl shrink-0" style="background-color: #efebe9 !important; color: #5d4037 !important;">
                                <i class="ti ti-shield-check"></i>
                            </div>
                            <div class="font-inter">
                                <h4 class="font-bold text-xs text-[#3e2723] leading-snug">Lingkungan Kondusif</h4>
                                <span class="text-[11px] text-stone-500">Asrama & Full Day</span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

<!-- ==============================================================
         PRAKATA MUDIR — Clean editorial layout
         ============================================================== -->
    @if(!empty($setting->prakata_content))
    <section id="prakata" class="py-16 sm:py-20 bg-[#fdfcfb] border-b border-stone-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-start">
                
                <!-- Left: Photo + Name -->
                <div class="lg:col-span-4" data-aos="fade-right">
                    <div class="rounded-2xl overflow-hidden shadow-lg bg-stone-100 relative">
                        <img 
                            src="{{ !empty($setting->prakata_custom_foto) ? asset('storage/'.$setting->prakata_custom_foto) : asset('images/mts/santri-model.png') }}" 
                            alt="{{ $setting->prakata_custom_nama ?? 'Mudir MTs Persis' }}" 
                            class="w-full aspect-[3/4] object-cover object-top"
                        >
                        <!-- Badge nama di pojok bawah kiri -->
                        <div class="absolute bottom-4 left-4">
                            <div class="bg-[#3e2723] rounded-xl px-4 py-2.5 shadow-lg">
                                <p class="font-inter font-bold text-sm text-white leading-tight">{{ $setting->prakata_custom_nama ?? 'Ust. Budi, S.Pd.I' }}</p>
                                <p class="font-inter text-[11px] text-amber-300 mt-0.5 uppercase tracking-wider">{{ $setting->prakata_custom_jabatan ?? 'Mudir MTs Persis' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="lg:col-span-8 pt-2" data-aos="fade-left">
                    <p class="font-inter text-xs font-bold uppercase tracking-widest text-[#8d6e63] mb-3">
                        {{ $setting->prakata_tag ?? 'Prakata Mudir' }}
                    </p>
                    <h2 class="font-inter text-3xl sm:text-4xl font-extrabold text-[#3e2723] mb-6 leading-tight">
                        {{ $setting->prakata_title ?? 'Membangun Generasi Islami yang Berilmu, Berakhlak, dan Berprestasi' }}
                    </h2>

                    <!-- Quote with left accent border -->
                    <blockquote class="border-l-4 border-amber-500 pl-5 mb-6">
                        <p class="font-inter font-semibold text-base sm:text-lg text-stone-700 italic leading-relaxed">
                            "{{ $setting->prakata_quote ?? 'Kami hadir bukan sekadar mendidik, melainkan membentuk generasi yang siap membawa amanah Islam dengan ilmu yang mumpuni dan akhlak yang mulia.' }}"
                        </p>
                    </blockquote>

                    @if(!empty($setting->prakata_content))
                        <div class="font-inter text-sm sm:text-base text-stone-600 leading-relaxed mb-6 space-y-3">
                            {!! nl2br(e($setting->prakata_content)) !!}
                        </div>
                    @endif

                    <!-- Simple signature line -->
                    <div class="flex items-center gap-3 pt-4 border-t border-stone-200">
                        <div class="w-10 h-10 rounded-full bg-[#3e2723] text-amber-400 flex items-center justify-center font-inter font-extrabold text-sm shrink-0">
                            {{ substr($setting->prakata_custom_nama ?? 'U', 0, 1) }}
                        </div>
                        <div>
                            <p class="font-inter font-bold text-sm text-[#3e2723]">{{ $setting->prakata_custom_nama ?? 'Ust. Budi, S.Pd.I' }}</p>
                            <p class="font-inter text-xs text-stone-500">{{ $setting->prakata_custom_jabatan ?? 'Mudir MTs Persis Sindangkasih' }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endif



    <!-- ==============================================================
         3. SECTION 3: FASILITAS UNGGULAN & SARANA PRASARANA (Card Interaktif Mewah)
         ============================================================== -->
    @php
        $fasilitasItems = (!empty($setting->custom_fasilitas) && count($setting->custom_fasilitas) > 0)
            ? $setting->custom_fasilitas
            : [
                [
                    'name' => 'Ruang Kelas Multimedia',
                    'tag' => 'RUANG KELAS',
                    'desc' => 'Ruang belajar representatif dilengkapi fasilitas multimedia, proyektor, pencahayaan alami, dan sirkulasi udara yang nyaman.',
                    'image' => 'images/mts/bg-bright.jpg'
                ],
                [
                    'name' => 'Asrama Putra & Putri',
                    'tag' => 'ASRAMA SANTRI',
                    'desc' => 'Gedung asrama terpisah santri putra dan putri yang bersih, tertib, serta didampingi pembina/asatidz selama 24 jam penuh.',
                    'image' => 'images/mts/section4-santri.jpg'
                ],
                [
                    'name' => 'Masjid Kampus & Pusat Kajian',
                    'tag' => 'PUSAT IBADAH',
                    'desc' => 'Pusat pembinaan ruhani, halaqah tahfidz Al-Qur\'an, shalat berjamaah 5 waktu, kajian kitab tafsir dan hadits.',
                    'image' => 'images/mts/santri-model.png'
                ],
                [
                    'name' => 'Laboratorium Komputer & Riset',
                    'tag' => 'TEKNOLOGI',
                    'desc' => 'Fasilitas komputer modern terhubung jaringan internet stabil untuk ujian CBT dan literasi teknologi santri.',
                    'image' => 'images/mts/bg-bright.jpg'
                ]
            ];
    @endphp
    <section id="fasilitas" class="py-16 sm:py-20 bg-white border-b border-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            
            <!-- Section Header -->
            <div class="mb-10" data-aos="fade-up">
                <p class="font-inter text-xs font-bold uppercase tracking-widest text-[#8d6e63] mb-2">
                    {{ $setting->fasilitas_tag ?? 'Sarana & Prasarana' }}
                </p>
                <h2 class="font-inter text-3xl sm:text-4xl font-extrabold text-[#3e2723] leading-tight">
                    {{ $setting->fasilitas_title ?? 'Fasilitas Representatif untuk Santri' }}
                </h2>
                @if(!empty($setting->fasilitas_description))
                <p class="font-inter text-sm sm:text-base text-stone-500 mt-3 max-w-2xl leading-relaxed">
                    {{ $setting->fasilitas_description }}
                </p>
                @endif
            </div>

            <!-- Fasilitas Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 sm:gap-6">
                @foreach($fasilitasItems as $fIdx => $f)
                    @php
                        $fName = $f['name'] ?? $f['title'] ?? 'Fasilitas Unggulan';
                        $fDesc = $f['desc'] ?? $f['deskripsi'] ?? '';
                        $fImg = !empty($f['image']) ? (str_starts_with($f['image'], 'http') ? $f['image'] : (file_exists(public_path($f['image'])) ? asset($f['image']) : $unit->getAdminImageUrl($f['image']))) : 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=600&auto=format&fit=crop';
                    @endphp
                    <div class="group rounded-xl overflow-hidden border border-stone-200 bg-white hover:shadow-md transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ ($fIdx) * 60 }}">
                        <!-- Photo -->
                        <div class="h-44 overflow-hidden bg-stone-100">
                            <img 
                                src="{{ $fImg }}" 
                                alt="{{ $fName }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                            >
                        </div>
                        <!-- Info -->
                        <div class="p-4">
                            <h3 class="font-inter font-bold text-sm text-[#3e2723] leading-snug mb-1.5">{{ $fName }}</h3>
                            @if(!empty($fDesc))
                            <p class="font-inter text-xs text-stone-500 leading-relaxed line-clamp-2">{{ $fDesc }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


        <!-- ==============================================================
         2. SECTION 2: OUR SERVICES (Identik Kotak Coklat Tua Besar)
         - Sisi Kiri: Judul "Our Services", Deskripsi, Tombol "View All"
         - Sisi Kanan: 6 Grid Card Putih Bersih dengan Icon Garis & Deskripsi
         ============================================================== -->
    <section id="layanan" class="py-12 sm:py-16 bg-[#fdfcfb]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            
            <!-- Large Container Card in Dark Brown Tone (Identik Card Biru Tua Antixor) -->
            <div class="rounded-[2.5rem] bg-[#3e2723] text-white p-8 sm:p-12 lg:p-14 shadow-2xl relative overflow-hidden" style="background-color: #3e2723 !important; color: #ffffff !important;" data-aos="fade-up">
                
                <!-- Subtle Background Texture -->
                <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-white/5 pointer-events-none"></div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center relative z-10">
                    
                    <!-- Left Sidebar (lg:col-span-4): Title, Description, Button -->
                    <div class="lg:col-span-4 text-center lg:text-left flex flex-col justify-between h-full">
                        <div>
                            <span class="text-amber-400 font-inter font-bold text-xs uppercase tracking-wider block mb-2">
                                {{ $setting->program_tag ?? 'PROGRAM UNGGULAN' }}
                            </span>
                            <h2 class="font-inter text-3xl sm:text-4xl font-extrabold text-white leading-tight mb-4">
                                {{ $setting->program_title ?? 'Layanan & Program Pendidikan' }}
                            </h2>
                            <p class="font-inter text-stone-300 text-sm leading-relaxed mb-8">
                                {{ $setting->program_description ?? 'Dari kurikulum madrasah nasional hingga spesialisasi kepesantrenan — kami menyediakan pembinaan menyeluruh bagi santri.' }}
                            </p>
                        </div>

                        <!-- Yellow Action Button -->
                        <div>
                            <a href="#biaya" class="btn-accent-gold inline-flex items-center justify-center px-6 py-3.5 rounded-lg font-bold text-sm shadow-md transition-all" style="background-color: #f59e0b !important; color: #2d1b18 !important;">
                                <span>Lihat Seluruh Biaya</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Grid (lg:col-span-8): 6 White Service Cards (2x3 Grid) -->
                    <div class="lg:col-span-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">

                            @php
                                // Prioritas: custom_programs dari setting, fallback ke $unggulan dari DB
                                if (!empty($setting->custom_programs) && count($setting->custom_programs) > 0) {
                                    $programs = $setting->custom_programs;
                                    $useModel = false;
                                } else {
                                    $programs = $unggulan;
                                    $useModel = true;
                                }
                            @endphp

                            @forelse($programs as $idx => $s)
                                @php
                                    if ($useModel) {
                                        $pTitle = $s->nama_program ?? '';
                                        $pDesc  = $s->deskripsi ?? '';
                                        $pIcon  = null;
                                    } else {
                                        $pTitle = $s['title'] ?? $s['nama_program'] ?? '';
                                        $pDesc  = $s['desc'] ?? $s['deskripsi'] ?? '';
                                        $pIcon  = $s['icon'] ?? null;
                                    }
                                    $icons = ['ti ti-book-2','ti ti-books','ti ti-star','ti ti-certificate','ti ti-shield-check','ti ti-bulb'];
                                    $iconClass = $pIcon ?? ($icons[$loop->index % count($icons)]);
                                @endphp
                                <div class="bg-white rounded-2xl p-5 sm:p-6 text-stone-800 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                                    <div>
                                        <div class="w-12 h-12 rounded-xl bg-amber-50 text-[#5d4037] flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                                            <i class="{{ $iconClass }}"></i>
                                        </div>
                                        <h3 class="font-inter font-bold text-base text-[#3e2723] mb-2 leading-snug">{{ $pTitle }}</h3>
                                        <p class="font-inter text-xs text-stone-500 leading-relaxed">{{ $pDesc }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-3 text-center text-stone-400 text-sm py-6">Program belum tersedia.</div>
                            @endforelse

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>



    <!-- ==========================================
         6. DEWAN ASATIDZ & TENAGA PENDIDIK MTS
         ========================================== -->
    <section id="guru" class="py-16 sm:py-20 lg:py-24 bg-stone-50/60 relative overflow-hidden" x-data="{ 
        currentGuru: 0,
        scroll(dir) {
            const el = document.getElementById('guruSlider');
            const step = el.querySelector('.guru-card')?.offsetWidth + 24 || 280;
            el.scrollBy({ left: dir * step, behavior: 'smooth' });
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 sm:mb-12" data-aos="fade-up">
                <div>
                    <span class="font-inter font-bold text-xs sm:text-sm text-[#8d6e63] uppercase tracking-wider block mb-2">
                        DEWAN ASATIDZ & PEMBINA
                    </span>
                    <h2 class="font-inter text-2xl sm:text-4xl font-extrabold text-[#3e2723] mb-2">
                        Dewan Asatidz & Guru MTs Persis
                    </h2>
                    <p class="font-inter text-xs sm:text-sm text-stone-500 max-w-xl">
                        Pendidik tersertifikasi, hufadz mutqin, dan alumni pesantren terkemuka yang siap membimbing moralitas, akhlak, dan ilmu pengetahuan santri.
                    </p>
                </div>

                <!-- Slider Navigation Arrows -->
                @if(isset($staff) && count($staff) > 1)
                    <div class="flex items-center gap-2">
                        <button 
                            @click="scroll(-1)" 
                            class="w-10 h-10 rounded-full bg-white border border-stone-200 text-stone-700 hover:text-[#3e2723] hover:border-[#3e2723] hover:bg-stone-50 shadow-sm flex items-center justify-center transition-all active:scale-95" 
                            aria-label="Previous Guru"
                        >
                            <i class="ti ti-chevron-left text-lg"></i>
                        </button>
                        <button 
                            @click="scroll(1)" 
                            class="w-10 h-10 rounded-full bg-[#3e2723] text-white hover:bg-[#2d1b18] shadow-md flex items-center justify-center transition-all active:scale-95" 
                            aria-label="Next Guru"
                        >
                            <i class="ti ti-chevron-right text-lg"></i>
                        </button>
                    </div>
                @endif
            </div>

            <!-- Teachers Cards Slider Track -->
            <div 
                id="guruSlider"
                class="flex gap-6 overflow-x-auto snap-x snap-mandatory pb-6 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar scroll-smooth"
                @scroll="currentGuru = Math.round($el.scrollLeft / ($el.querySelector('.guru-card')?.offsetWidth || 260))"
            >
                @forelse($staff ?? [] as $idx => $guru)
                    <div class="guru-card min-w-[240px] sm:min-w-[260px] md:min-w-[280px] snap-start bg-white rounded-3xl border border-stone-200/80 p-5 text-center shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center group shrink-0" data-aos="fade-up" data-aos-delay="{{ ($idx + 1) * 60 }}">
                        
                        <!-- Teacher Photo -->
                        <div class="w-full h-52 sm:h-56 rounded-2xl bg-stone-100 overflow-hidden mb-4 shadow-sm relative flex items-center justify-center">
                            @if($guru->foto)
                                <img src="{{ $guru->getAdminImageUrl($guru->foto) }}" alt="{{ $guru->nama_lengkap }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-stone-400 p-4">
                                    <div class="w-20 h-20 rounded-full bg-white shadow-sm flex items-center justify-center text-[#5d4037] mb-2 group-hover:scale-110 transition-transform">
                                        <i class="ti ti-user text-4xl"></i>
                                    </div>
                                    <span class="font-inter text-[11px] font-semibold text-stone-400 uppercase tracking-wider">Asatidz MTs</span>
                                </div>
                            @endif
                        </div>

                        <!-- Role Badge -->
                        <span class="inline-block px-3 py-1 rounded-full text-[9px] sm:text-[10px] font-inter font-bold bg-[#3e2723] text-amber-400 mb-2 shadow-sm">
                            {{ $guru->jabatan->nama_jabatan ?? 'Asatidz MTs' }}
                        </span>

                        <!-- Teacher Name -->
                        <h3 class="font-inter font-bold text-sm sm:text-base text-[#3e2723] line-clamp-1 leading-snug">
                            {{ $guru->nama_lengkap }}
                        </h3>
                    </div>
                @empty
                    <div class="col-span-full py-8 text-center text-stone-400 text-sm font-inter w-full">
                        Data dewan guru dan asatidz sedang diperbarui.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ==============================================================
         7. SECTION 7: WHAT OUR CLIENTS SAY (Identik Antixor Testimoni)
         - Kiri: 3 Foto Kegiatan / Suasana Bersama Orang Tua & Santri
         - Kanan: Kutipan Testimoni, Bintang Rating, Nama Wali Santri, Navigasi
         ============================================================== -->
        <section id="testimoni" class="py-16 sm:py-20 bg-white" x-data="{ currentIdx: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                
                <!-- Left: 3 Small Gallery Photos -->
                <div class="lg:col-span-6" data-aos="fade-right">
                    <div class="grid grid-cols-3 gap-3 sm:gap-4">
                        <div class="rounded-2xl overflow-hidden h-48 sm:h-64 shadow-md bg-stone-100">
                            <img src="{{ asset('images/mts/section4-santri.jpg') }}" alt="Kegiatan Santri" class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-2xl overflow-hidden h-48 sm:h-64 shadow-md bg-stone-100 mt-4 sm:mt-6">
                            <img src="{{ asset('images/mts/bg-bright.jpg') }}" alt="Belajar Santri" class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-2xl overflow-hidden h-48 sm:h-64 shadow-md bg-stone-100">
                            <img src="{{ asset('images/mts/santri-model.png') }}" alt="Santri Berprestasi" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <!-- Right: Testimonial Quote & Info -->
                <div class="lg:col-span-6" data-aos="fade-left">
                    <span class="text-[#8d6e63] font-inter font-bold text-xs uppercase tracking-wider block mb-2">{{ $setting->testimoni_tag ?? 'TESTIMONI ORANG TUA' }}</span>
                    <h2 class="font-inter text-2xl sm:text-4xl font-extrabold text-[#3e2723] mb-6">
                        {{ $setting->testimoni_title ?? 'Apa Kata Wali Santri MTs?' }}
                    </h2>

                    @php
                        $testimoniList = !empty($setting->custom_testimoni) ? $setting->custom_testimoni : [
                            [
                                'name' => 'Bpk. Dr. H. Hendra',
                                'role' => 'Orang Tua Farhan',
                                'text' => '"Alhamdulillah, perkembangan adab dan hafalan Qur\'an ananda meningkat pesat semenjak di MTs Persis."'
                            ]
                        ];
                    @endphp

                    <!-- Quote Box -->
                    <div class="mb-6 relative h-48 sm:h-40 overflow-hidden">
                        @foreach($testimoniList as $idx => $t)
                        <div x-show="currentIdx === {{ $idx }}" x-transition.opacity class="absolute inset-0">
                            <p class="font-inter italic text-stone-600 text-sm sm:text-base leading-relaxed mb-4">
                                "{{ $t['text'] ?? '' }}"
                            </p>
                            
                            <!-- 5 Stars Rating -->
                            <div class="flex items-center gap-1 text-amber-400 text-sm mb-3">
                                <i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i>
                            </div>

                            <!-- Parent Name -->
                            <div class="font-inter font-bold text-sm text-[#3e2723]">
                                — {{ $t['name'] ?? '' }}
                            </div>
                            <div class="text-xs text-stone-400 font-medium">
                                {{ $t['role'] ?? '' }}
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Slide Navigation Arrow Buttons -->
                    <div class="flex items-center gap-2 pt-4">
                        <button @click="currentIdx = currentIdx > 0 ? currentIdx - 1 : {{ count($testimoniList) - 1 }}" class="w-9 h-9 rounded-full border border-stone-300 text-stone-600 hover:border-[#3e2723] hover:text-[#3e2723] flex items-center justify-center transition-colors">
                            <i class="ti ti-arrow-left"></i>
                        </button>
                        <button @click="currentIdx = currentIdx < {{ count($testimoniList) - 1 }} ? currentIdx + 1 : 0" class="w-9 h-9 rounded-full bg-[#3e2723] text-white flex items-center justify-center shadow-sm hover:bg-[#2d1b18] transition-colors">
                            <i class="ti ti-arrow-right"></i>
                        </button>
                    </div>

                </div>

            </div>

        </div>
    </section>



    <!-- ==============================================================
         SECTION BERITA TERKINI
         ============================================================== -->
    @if(isset($news) && $news->count() > 0)
    <section id="berita" class="py-16 sm:py-20 bg-[#fdfcfb] border-t border-stone-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">

            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10" data-aos="fade-up">
                <div>
                    <p class="font-inter text-xs font-bold uppercase tracking-widest text-[#8d6e63] mb-2">Berita & Informasi</p>
                    <h2 class="font-inter text-3xl sm:text-4xl font-extrabold text-[#3e2723] leading-tight">Berita Terkini MTs Persis</h2>
                </div>
                <a href="/berita" class="font-inter text-sm font-bold text-[#3e2723] hover:text-[#8d6e63] transition-colors flex items-center gap-1.5 shrink-0">
                    Lihat semua <i class="ti ti-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                 @foreach($news->take(3) as $post)
                 <article class="group rounded-xl overflow-hidden border border-stone-200 bg-white hover:shadow-md transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                    <!-- Thumbnail -->
                    <div class="h-48 overflow-hidden bg-stone-100">
                        @if(!empty($post->image))
                            <img 
                                src="{{ asset('storage/' . $post->image) }}" 
                                alt="{{ $post->title }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            >
                        @else
                            <div class="w-full h-full bg-stone-200 flex items-center justify-center">
                                <i class="ti ti-news text-4xl text-stone-400"></i>
                            </div>
                        @endif
                    </div>
                    <!-- Content -->
                    <div class="p-5">
                        <p class="font-inter text-[10px] text-[#8d6e63] uppercase tracking-wider font-bold mb-2">
                            {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') }}
                        </p>
                        <h3 class="font-inter font-bold text-sm text-[#3e2723] leading-snug mb-2 line-clamp-2 group-hover:text-[#8d6e63] transition-colors">
                            {{ $post->judul ?? $post->title }}
                        </h3>
                        <p class="font-inter text-xs text-stone-500 leading-relaxed line-clamp-2">
                            {{ Str::limit(strip_tags($post->isi ?? $post->content ?? ''), 100) }}
                        </p>
                        <a href="/berita/{{ $post->slug ?? $post->id }}" class="inline-flex items-center gap-1 mt-3 font-inter text-xs font-bold text-[#3e2723] hover:text-amber-600 transition-colors">
                            Baca selengkapnya <i class="ti ti-arrow-right text-sm"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

        </div>
    </section>
    @endif

    <!-- ==============================================================
         8. RINCIAN BIAYA PENDIDIKAN (BOARDING / ASRAMA & FULL DAY)
         ============================================================== -->
    <section id="biaya" class="py-16 sm:py-20 lg:py-24 bg-[#fbf9f8] border-t border-stone-200/80" x-data="{ biayaTab: 'asrama' }">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12" data-aos="fade-up">
                <span class="font-inter font-bold text-xs sm:text-sm text-[#8d6e63] uppercase tracking-wider block mb-2">
                    INFORMASI PEMBIAYAAN PSB
                </span>
                <h2 class="font-inter text-2xl sm:text-4xl font-extrabold text-[#3e2723] mb-3 leading-tight">
                    Rincian Estimasi Biaya Pendidikan
                </h2>
                <p class="font-inter text-xs sm:text-sm text-stone-500">
                    Tahun Ajaran {{ $activePPDB->tahun_ajaran ?? '2026/2027' }} • Transparan, Akuntabel, dan Tersedia Skema Keringanan / Beasiswa
                </p>

                <!-- Toggle Tab: Asrama (Boarding) vs Non-Asrama (Full Day) -->
                <div class="inline-flex items-center p-1.5 rounded-2xl bg-stone-200/80 mt-6 shadow-inner border border-stone-300/60">
                    <button 
                        @click="biayaTab = 'asrama'" 
                        :class="biayaTab === 'asrama' ? 'bg-[#3e2723] text-amber-400 shadow-md' : 'text-stone-600 hover:text-[#3e2723]'"
                        class="px-5 sm:px-7 py-2.5 rounded-xl font-inter font-bold text-xs sm:text-sm transition-all duration-200 flex items-center gap-2"
                    >
                        <i class="ti ti-home text-base"></i>
                        <span>Program Asrama (Boarding)</span>
                    </button>
                    <button 
                        @click="biayaTab = 'non_asrama'" 
                        :class="biayaTab === 'non_asrama' ? 'bg-[#3e2723] text-amber-400 shadow-md' : 'text-stone-600 hover:text-[#3e2723]'"
                        class="px-5 sm:px-7 py-2.5 rounded-xl font-inter font-bold text-xs sm:text-sm transition-all duration-200 flex items-center gap-2"
                    >
                        <i class="ti ti-school text-base"></i>
                        <span>Full Day (Non-Asrama)</span>
                    </button>
                </div>
            </div>

            <!-- Content Card: Asrama (Boarding) -->
            <div x-show="biayaTab === 'asrama'" x-transition.opacity class="bg-white rounded-[2rem] border border-stone-200 shadow-lg p-6 sm:p-10" data-aos="fade-up">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 mb-6 border-b border-stone-100 gap-4">
                    <div>
                        <div class="inline-block px-3 py-1 rounded-full text-[10px] font-inter font-bold bg-amber-100 text-amber-900 uppercase tracking-wider mb-2">
                            Santri Mukim / Asrama
                        </div>
                        <h3 class="font-inter font-extrabold text-lg sm:text-xl text-[#3e2723]">
                            Estimasi Masuk Program Asrama (Boarding)
                        </h3>
                        <p class="font-inter text-xs text-stone-500 mt-0.5">
                            Sudah termasuk asrama, konsumsi 3x sehari, pembinaan 24 jam, perlengkapan & program kepesantrenan.
                        </p>
                    </div>
                    @php
                        $totalAsrama = isset($biayaAsrama) && $biayaAsrama->count() > 0 ? $biayaAsrama->sum('jumlah') : 27020000;
                    @endphp
                    <div class="sm:text-right shrink-0 bg-stone-50 sm:bg-transparent p-3 sm:p-0 rounded-xl">
                        <span class="text-[11px] text-stone-400 font-semibold block">Total Biaya Masuk</span>
                        <span class="font-inter font-black text-xl sm:text-2xl text-[#3e2723]">Rp {{ number_format($totalAsrama, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3.5 font-inter">
                    @if(isset($biayaAsrama) && $biayaAsrama->count() > 0)
                        @foreach($biayaAsrama as $b)
                            <div class="flex items-center justify-between py-2 border-b border-stone-100">
                                <span class="text-xs sm:text-sm text-stone-600 font-medium flex items-center gap-2">
                                    <i class="ti ti-check text-amber-500 text-sm"></i>
                                    {{ $b->jenis_biaya }}
                                </span>
                                <span class="text-xs sm:text-sm font-bold text-[#3e2723]">Rp {{ number_format($b->jumlah, 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    @else
                        <!-- Fallback Sample -->
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">Pendaftaran & Seleksi</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 300.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">Infaq Bangunan</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 4.550.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">Sarana & Prasarana</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 2.150.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">SPP & Pembinaan (Asrama)</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 14.400.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">Seragam Santri</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 1.200.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">Kegiatan Santri Baru</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 1.550.000</span></div>
                    @endif
                </div>

                <div class="mt-8 p-4 sm:p-5 rounded-2xl bg-amber-50 border border-amber-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 text-stone-700 text-xs">
                        <i class="ti ti-info-circle text-amber-600 text-2xl shrink-0"></i>
                        <span>* Biaya masuk asrama dapat diangsur dan sudah mencakup konsumsi serta laundry santri.</span>
                    </div>
                    <a href="{{ $setting->cta_button_url ?? '/register' }}" class="btn-accent-gold px-5 py-2.5 rounded-xl font-bold text-xs shadow-md shrink-0 whitespace-nowrap" style="background-color: #f59e0b !important; color: #2d1b18 !important;">
                        Daftar Asrama
                    </a>
                </div>
            </div>

            <!-- Content Card: Non-Asrama (Full Day) -->
            <div x-show="biayaTab === 'non_asrama'" x-cloak x-transition.opacity class="bg-white rounded-[2rem] border border-stone-200 shadow-lg p-6 sm:p-10" data-aos="fade-up">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 mb-6 border-b border-stone-100 gap-4">
                    <div>
                        <div class="inline-block px-3 py-1 rounded-full text-[10px] font-inter font-bold bg-stone-100 text-stone-800 uppercase tracking-wider mb-2">
                            Santri Non-Mukim / Full Day
                        </div>
                        <h3 class="font-inter font-extrabold text-lg sm:text-xl text-[#3e2723]">
                            Estimasi Masuk Full Day (Non-Asrama)
                        </h3>
                        <p class="font-inter text-xs text-stone-500 mt-0.5">
                            Pembelajaran intensif madrasah hingga sore hari tanpa menginap di asrama.
                        </p>
                    </div>
                    @php
                        $totalNonAsrama = isset($biayaNonAsrama) && $biayaNonAsrama->count() > 0 ? $biayaNonAsrama->sum('jumlah') : 12220000;
                    @endphp
                    <div class="sm:text-right shrink-0 bg-stone-50 sm:bg-transparent p-3 sm:p-0 rounded-xl">
                        <span class="text-[11px] text-stone-400 font-semibold block">Total Biaya Masuk</span>
                        <span class="font-inter font-black text-xl sm:text-2xl text-[#3e2723]">Rp {{ number_format($totalNonAsrama, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3.5 font-inter">
                    @if(isset($biayaNonAsrama) && $biayaNonAsrama->count() > 0)
                        @foreach($biayaNonAsrama as $b)
                            <div class="flex items-center justify-between py-2 border-b border-stone-100">
                                <span class="text-xs sm:text-sm text-stone-600 font-medium flex items-center gap-2">
                                    <i class="ti ti-check text-amber-500 text-sm"></i>
                                    {{ $b->jenis_biaya }}
                                </span>
                                <span class="text-xs sm:text-sm font-bold text-[#3e2723]">Rp {{ number_format($b->jumlah, 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    @else
                        <!-- Fallback Sample -->
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">Pendaftaran & Seleksi</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 300.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">Infaq Bangunan</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 3.050.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">Sarana & Prasarana</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 1.000.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">SPP Madrasah</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 3.600.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">Seragam Santri</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 1.000.000</span></div>
                        <div class="flex items-center justify-between py-2 border-b border-stone-100"><span class="text-xs sm:text-sm text-stone-600">Kegiatan Santri Baru</span><span class="font-bold text-xs sm:text-sm text-[#3e2723]">Rp 1.300.000</span></div>
                    @endif
                </div>

                <div class="mt-8 p-4 sm:p-5 rounded-2xl bg-stone-100 border border-stone-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 text-stone-700 text-xs">
                        <i class="ti ti-info-circle text-stone-600 text-2xl shrink-0"></i>
                        <span>* Program Full Day cocok bagi santri berdomisili sekitar pesantren yang diantar jemput orang tua.</span>
                    </div>
                    <a href="{{ $setting->cta_button_url ?? '/register' }}" class="btn-primary-brown px-5 py-2.5 rounded-xl font-bold text-xs shadow-md shrink-0 whitespace-nowrap" style="background-color: #3e2723 !important; color: #ffffff !important;">
                        Daftar Full Day
                    </a>
                </div>
            </div>

        </div>
    </section>

@endsection
