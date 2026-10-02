@extends('layouts.mobile')

@section('title', 'Tentang Pesantren - ' . ($pengaturan->nama_sekolah ?? 'Al Amin'))
@section('meta_description', 'Mengenal rekam jejak sejarah, piagam visi, dan misi perjuangan Pesantren Persatuan Islam 80 Al Amin.')

@section('content')
<!-- Mobile Masthead -->
<div class="bg-[#062d27] pt-8 pb-10 px-6 relative overflow-hidden text-white font-poppins border-b border-emerald-900/60">
    <div class="relative z-10" data-aos="fade-down">
        <div class="flex items-center gap-2 text-[10px] text-[#bef264] font-bold uppercase tracking-widest mb-2.5">
            <span>Profil & Sejarah Lembaga</span>
            <span class="text-white/30">•</span>
            <span>PPI 80</span>
        </div>
        <h1 class="text-2xl font-black text-white leading-tight mb-2.5 tracking-tight font-poppins">
            Tentang <span class="text-[#bef264]">Pesantren</span>
        </h1>
        <p class="text-xs text-emerald-100/80 font-normal leading-relaxed font-sans">
            Mengenal rekam jejak, piagam visi, dan arah langkah {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }} Sindangkasih.
        </p>
    </div>
</div>

<div class="px-5 pt-7 pb-24 bg-[#faf9f6] min-h-screen space-y-8">

    <!-- 1. PIAGAM VISI (Mobile Plaque) -->
    <div data-aos="fade-up">
        <div class="bg-[#062d27] text-white p-6 rounded-2xl border border-emerald-800/80 shadow-sm relative overflow-hidden">
            <div class="flex items-center justify-between pb-3 mb-3 border-b border-emerald-800/60 text-[10px] font-poppins">
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#bef264]"></span>
                    <span class="font-extrabold uppercase tracking-widest text-[#bef264]">Piagam Visi</span>
                </div>
                <span class="text-emerald-300/70 font-bold uppercase text-[9px]">Haluan Utama</span>
            </div>

            <h2 class="text-base font-black text-white font-poppins mb-2">Visi Kami</h2>

            <blockquote class="text-xs sm:text-sm font-bold font-poppins text-white leading-relaxed italic mb-3">
                "{{ $visi->deskripsi ?? 'Terwujudnya Pesantren sebagai lembaga kaderisasi terbaik dan miniatur masyarakat Rabbani.' }}"
            </blockquote>

            <p class="text-[10px] text-emerald-200/80 leading-relaxed border-t border-emerald-800/40 pt-2.5 font-sans">
                Pedoman fundamental pembinaan aqidah, ibadah shahihah, dan keunggulan santri.
            </p>
        </div>
    </div>

    <!-- 2. MISI STRATEGIS (Connected Roadmap Mobile) -->
    @if(isset($misi) && $misi->count() > 0)
    <div class="bg-white p-6 rounded-2xl border border-stone-200/80 shadow-xs" data-aos="fade-up">
        
        <div class="flex items-center justify-between pb-3 mb-5 border-b border-stone-100 font-poppins">
            <div>
                <span class="text-[9px] font-bold uppercase tracking-widest text-emerald-800 block">Langkah Nyata</span>
                <h2 class="text-base font-black text-[#062d27]">Misi Kami</h2>
            </div>
            <span class="text-[10px] font-extrabold uppercase tracking-wider text-emerald-900 bg-[#bef264] px-2 py-0.5 rounded shadow-xs">
                {{ $misi->count() }} Poin
            </span>
        </div>

        <div class="relative pl-4 border-l-2 border-emerald-900/15 space-y-5 ml-1.5">
            @foreach($misi as $item)
            <div class="relative group">
                <div class="absolute -left-[23px] top-0.5 w-5 h-5 rounded-full bg-[#062d27] text-[#bef264] text-[9px] font-black flex items-center justify-center font-poppins border-2 border-white shadow-xs">
                    {{ $loop->iteration }}
                </div>
                <div>
                    <h3 class="text-xs font-bold text-gray-900 font-poppins leading-snug mb-1">{{ $item->judul }}</h3>
                    <p class="text-[11px] text-gray-500 leading-relaxed font-sans">{{ $item->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- 3. RISALAH SEJARAH -->
    <div class="bg-white p-6 rounded-2xl border border-stone-200/80 shadow-xs" data-aos="fade-up">
        <div class="flex items-center justify-between pb-3 mb-4 border-b border-stone-100 font-poppins">
            <div>
                <span class="text-[9px] font-bold uppercase tracking-widest text-emerald-800 block">Kilas Tarikh</span>
                <h2 class="text-base font-black text-[#062d27]">Sejarah Singkat</h2>
            </div>
            <i class="ti ti-history text-lg text-emerald-800"></i>
        </div>
        
        <div class="prose prose-sm max-w-none text-gray-600 leading-relaxed text-justify font-sans space-y-3">
            @if($about && !empty($about->content))
                {!! $about->content !!}
            @else
                <p>
                    Berawal dari sebuah masjid yang didirikan pada tahun 1986 dengan nama Masjid Al-Amin, kegiatan dakwah dan pengajian mulai dirintis bagi anak-anak usia sekolah dasar setiap ba'da maghrib.
                </p>
            @endif
        </div>

        <!-- Archival Sign-off -->
        <div class="mt-6 pt-4 border-t border-stone-100 flex items-center gap-3">
            <img 
                src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}" 
                alt="Logo Al Amin" 
                class="w-7 h-7 object-contain grayscale opacity-80"
            >
            <div>
                <p class="text-[10px] font-bold text-gray-900 font-poppins">Sekretariat Pesantren Al Amin</p>
                <p class="text-[9px] text-gray-400 font-poppins">Sindangkasih, Ciamis</p>
            </div>
        </div>
    </div>

    <!-- 4. Quick SPMB Link -->
    <div class="rounded-2xl bg-[#062d27] p-5 text-white shadow-sm flex items-center justify-between gap-3 border border-emerald-800/60">
        <div>
            <h3 class="text-xs font-bold text-white font-poppins">Penerimaan Santri Baru</h3>
            <p class="text-[10px] text-emerald-100/70 font-sans">Pendaftaran dibuka untuk seluruh jenjang.</p>
        </div>
        <a href="/spmb" class="shrink-0 bg-[#bef264] text-[#062d27] font-extrabold px-3.5 py-2 rounded-xl text-xs uppercase tracking-wider font-poppins inline-flex items-center gap-1 shadow-xs">
            <span>SPMB</span>
            <i class="ti ti-arrow-right text-xs font-bold"></i>
        </a>
    </div>

</div>

<style>
    .prose p { margin-bottom: 0.9rem; font-size: 0.8125rem; line-height: 1.7; color: #4b5563; }
    .prose h2, .prose h3, .prose h4 { font-family: 'Poppins', sans-serif; font-weight: 800; color: #062d27; font-size: 1rem; margin-top: 1.15rem; margin-bottom: 0.4rem; }
</style>
@endsection
