@extends('layouts.frontend')

@section('title', 'Tentang Pesantren - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Al Amin'))
@section('meta_description', 'Mengenal sejarah, piagam visi, dan misi perjuangan ' . ($pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin') . ' Sindangkasih Ciamis.')

@section('content')
<!-- Header / Hero Section -->
<section class="relative pt-28 sm:pt-32 pb-10 sm:pb-12 bg-[#062d27] text-white border-b border-emerald-900/60 overflow-hidden">
    <!-- Ambient Background Overlay -->
    @if($pengaturan && !empty($pengaturan->background_login))
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20">
            <img 
                src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                alt="Pesantren Al Amin" 
                class="w-full h-full object-cover grayscale mix-blend-luminosity scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#062d27] via-[#062d27]/90 to-[#062d27]/70"></div>
        </div>
    @endif

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        
        <!-- Top Bar: Profil Indicator & Breadcrumbs -->
        <div class="flex flex-wrap items-center justify-between gap-3 mb-6 pb-3 border-b border-emerald-800/40" data-aos="fade-down">
            <div class="flex items-center gap-2">
                <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-emerald-300 font-poppins">
                    Profil & Sejarah Lembaga
                </span>
            </div>

            <nav class="flex items-center gap-2 text-emerald-300/70 text-[11px] sm:text-xs font-bold uppercase tracking-wider font-poppins">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <i class="ti ti-chevron-right text-[9px] text-emerald-400/60"></i>
                <span class="text-[#bef264]">Tentang Pesantren</span>
            </nav>
        </div>

        <!-- Hero Title Area -->
        <div class="max-w-4xl">
            <span class="inline-block text-xs uppercase tracking-widest text-emerald-300 font-bold mb-2 font-poppins">
                Tarikh, Visi & Komitmen Perjuangan
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-poppins text-white tracking-tight leading-[1.2] mb-3" data-aos="fade-up">
                Tentang <span class="text-[#bef264]">Pesantren</span>
            </h1>
            <p class="text-emerald-100/85 text-xs sm:text-sm lg:text-base leading-relaxed max-w-2xl font-normal" data-aos="fade-up" data-aos-delay="100">
                Mengenal rekam jejak, piagam visi, serta ikhtiar pendidikan {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }} Sindangkasih dalam mencetak generasi tafaqquh fiddien dan berprestasi.
            </p>
        </div>

    </div>
</section>

<!-- Main 2-Column Content Section -->
<section class="py-14 sm:py-20 bg-[#faf9f6] text-slate-800 relative">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-start">
            
            <!-- LEFT COLUMN: Sejarah & Narasi Perjalanan (lg:col-span-7) -->
            <article class="lg:col-span-7 bg-white p-7 sm:p-10 rounded-3xl border border-stone-200/80 shadow-xs" data-aos="fade-right">
                
                <!-- Section Header -->
                <div class="mb-6 pb-4 border-b border-stone-100">
                    <div class="inline-flex items-center gap-2 text-[#062d27] bg-[#bef264]/25 border border-[#bef264]/50 px-3.5 py-1.5 rounded-full text-xs font-bold mb-3 font-poppins">
                        <i class="ti ti-history text-sm text-[#062d27]"></i>
                        <span>Sejarah Singkat</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black font-poppins text-[#062d27] leading-tight">
                        Dedikasi Untuk <br class="hidden sm:inline">Pendidikan Rabbani
                    </h2>
                </div>

                <!-- Rich Prose Text -->
                <div class="prose max-w-none text-gray-600 leading-relaxed text-justify space-y-4">
                    @if($about && !empty($about->content))
                        {!! $about->content !!}
                    @else
                        <p>
                            Berawal dari sebuah masjid yang didirikan pada tahun 1986 dengan nama Masjid Al-Amin, kegiatan dakwah dan pengajian mulai dirintis bagi anak-anak usia sekolah dasar setiap ba'da maghrib. Pengajaran awal difokuskan pada penguasaan baca tulis Al-Qur'an dan dasar-dasar aqidah Islam.
                        </p>
                        <p>
                            Seiring berjalannya waktu dan tingginya kepercayaan kaum muslimin, rintisan tersebut bertransformasi menjadi Pesantren Persatuan Islam 80 Al Amin Sindangkasih yang kini menaungi jenjang pendidikan lengkap dari TK Calisa Rabbani, SDIT Al Amin, MTs Persis 80, hingga MA Persis 80 dengan fasilitas asrama serta kurikulum berprestasi.
                        </p>
                    @endif
                </div>

                <!-- Archival Sign-off Seal -->
                <div class="mt-10 pt-6 border-t border-stone-100 flex items-center justify-between gap-4 text-xs text-slate-500">
                    <div class="flex items-center gap-3">
                        <img 
                            src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}" 
                            alt="Logo Al Amin" 
                            class="w-9 h-9 object-contain grayscale opacity-80"
                        >
                        <div>
                            <span class="font-bold text-gray-900 block text-xs font-poppins">Sekretariat Pimpinan Pesantren</span>
                            <span class="text-[11px] text-gray-500 font-poppins">Pesantren Persatuan Islam 80 Al Amin Ciamis</span>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-800 bg-emerald-50 px-2.5 py-1 rounded-md font-poppins hidden sm:inline">
                        Dokumen Resmi
                    </span>
                </div>

            </article>

            <!-- RIGHT COLUMN: Visi & Misi Strategis (lg:col-span-5) -->
            <aside class="lg:col-span-5 space-y-7 lg:sticky lg:top-28" data-aos="fade-left">
                
                <!-- 1. PIAGAM VISI (Charter Plaque) -->
                <div class="bg-[#062d27] text-white p-7 sm:p-8 rounded-3xl border border-emerald-800/80 shadow-md relative overflow-hidden">
                    <div class="flex items-center justify-between pb-4 mb-4 border-b border-emerald-800/60">
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#bef264]"></span>
                            <span class="text-[10px] font-extrabold uppercase tracking-widest text-[#bef264] font-poppins">Piagam Visi</span>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-300/70 font-poppins">Haluan Utama</span>
                    </div>

                    <h3 class="text-xl font-black text-white font-poppins mb-3">Visi Kami</h3>

                    <!-- Vision Quote -->
                    <blockquote class="text-base sm:text-lg font-bold font-poppins text-white leading-relaxed italic mb-4">
                        "{{ $visi->deskripsi ?? 'Terwujudnya Pesantren sebagai lembaga kaderisasi terbaik dan miniatur masyarakat Rabbani.' }}"
                    </blockquote>

                    <p class="text-[11px] sm:text-xs text-emerald-200/80 leading-relaxed border-t border-emerald-800/40 pt-3 font-normal">
                        Pedoman fundamental dalam membina santri yang kokoh dalam aqidah, unggul dalam ilmu syar'i, dan mandiri.
                    </p>
                </div>

                <!-- 2. MISI STRATEGIS (Connected Roadmap) -->
                @if(isset($misi) && $misi->count() > 0)
                <div class="bg-white p-7 sm:p-8 rounded-3xl border border-stone-200/80 shadow-xs">
                    
                    <div class="flex items-center justify-between pb-4 mb-6 border-b border-stone-100">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-emerald-800 block mb-0.5 font-poppins">Langkah Nyata</span>
                            <h3 class="text-xl font-black font-poppins text-[#062d27]">Misi Kami</h3>
                        </div>
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-emerald-900 bg-[#bef264] px-2.5 py-1 rounded-md font-poppins shadow-xs">
                            {{ $misi->count() }} Poin
                        </span>
                    </div>

                    <!-- List with Left Guide Track -->
                    <div class="relative pl-5 border-l-2 border-emerald-900/15 space-y-6 ml-2">
                        @foreach($misi as $item)
                        <div class="relative group">
                            <!-- Index Dot Marker -->
                            <div class="absolute -left-[29px] top-0 w-6 h-6 rounded-full bg-[#062d27] text-[#bef264] text-[10px] font-black flex items-center justify-center font-poppins border-2 border-white shadow-xs">
                                {{ $loop->iteration }}
                            </div>

                            <div class="pt-0.5">
                                <h4 class="font-bold text-xs sm:text-sm text-gray-900 group-hover:text-[#062d27] font-poppins transition-colors leading-snug mb-1">
                                    {{ $item->judul }}
                                </h4>
                                <p class="text-xs text-gray-500 leading-relaxed font-normal">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                @endif

                <!-- 3. Clean Contact / Visit Inquiries -->
                <div class="bg-[#062d27] p-5 rounded-3xl text-white flex items-center justify-between gap-4 shadow-sm border border-emerald-800/60">
                    <div>
                        <h4 class="font-bold text-xs text-white font-poppins">Ingin Mengenal Lebih Dekat?</h4>
                        <p class="text-[11px] text-emerald-200/75 mt-0.5">Informasi penerimaan santri baru seluruh jenjang.</p>
                    </div>
                    <a href="/spmb" class="shrink-0 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-extrabold text-xs px-3.5 py-2 rounded-xl transition-colors inline-flex items-center gap-1.5 shadow-xs font-poppins uppercase tracking-wider">
                        <span>Info SPMB</span>
                        <i class="ti ti-arrow-right text-xs font-bold"></i>
                    </a>
                </div>

            </aside>

        </div>
    </div>
</section>

<!-- Custom Styling for Content -->
<style>
    .prose p { margin-bottom: 1.25rem; font-size: 0.95rem; line-height: 1.8; color: #4b5563; }
    .prose h2, .prose h3, .prose h4 { font-family: 'Poppins', sans-serif; font-weight: 800; color: #062d27; margin-top: 1.75rem; margin-bottom: 0.65rem; line-height: 1.3; }
    .prose img { border-radius: 1.25rem; margin: 1.5rem 0; box-shadow: 0 8px 25px rgba(0,0,0,0.06); border: 1px solid rgba(0,0,0,0.05); }
    .prose ul { list-style-type: disc; padding-left: 1.25rem; margin-bottom: 1.25rem; }
    .prose ol { list-style-type: decimal; padding-left: 1.25rem; margin-bottom: 1.25rem; }
    .prose li { margin-bottom: 0.4rem; }
    .prose blockquote { border-left: 4px solid #062d27; background: #f8faf9; padding: 1rem 1.25rem; border-radius: 0 1rem 1rem 0; font-style: italic; color: #062d27; font-weight: 500; }
</style>
@endsection
