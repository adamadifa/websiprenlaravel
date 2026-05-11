@extends('layouts.mobile')

@section('title', 'Tentang Pesantren - Al Amin')
@section('meta_description', 'Mengenal lebih dekat sejarah, visi, dan misi perjuangan Pesantren Persatuan Islam 80 Al Amin.')

@section('content')
<!-- Hero Section -->
<div class="bg-teal-900 pt-8 pb-12 px-6 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-yellow-400 rounded-full blur-3xl -mr-32 -mb-32"></div>
    </div>
    
    <div class="relative z-10" data-aos="fade-down">
        <div class="flex items-center gap-2 text-[10px] text-white font-bold uppercase tracking-widest mb-3">
            <span class="w-6 h-px bg-white"></span>
            Profil Lembaga
        </div>
        <h1 class="text-3xl font-black text-white leading-tight mb-4 tracking-tight">Tentang <span class="text-yellow-400">Pesantren</span></h1>
        <p class="text-xs text-teal-100/80 font-medium leading-relaxed max-w-[90%]">Mengenal lebih dekat sejarah, visi, dan misi perjuangan Pesantren Persatuan Islam 80 Al Amin.</p>
    </div>
</div>

<div class="px-6 pt-10 pb-24 bg-gray-50/50 min-h-screen">

    <!-- Visi Card (Prominent) -->
    <div class="mb-14">
        <div class="bg-gradient-to-br from-teal-800 to-teal-950 rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.1)] relative overflow-hidden text-white" data-aos="fade-up">
            <!-- Abstract pattern -->
            <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9IiNmZmYiLz48L3N2Zz4=')]"></div>
            <div class="absolute -top-12 -right-12 w-48 h-48 bg-teal-500/20 rounded-full blur-3xl"></div>
            
            <div class="relative z-10">
                <h2 class="text-[10px] font-bold text-yellow-400 uppercase tracking-widest mb-2">Visi Kami</h2>
                <p class="text-lg font-bold leading-relaxed">
                    "{{ $visi->deskripsi ?? 'Terwujudnya Pesantren sebagai lembaga kaderisasi terbaik dan miniatur masyarakat Rabbani.' }}"
                </p>
            </div>
        </div>
    </div>

    <!-- Misi List -->
    <div class="mb-14">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-lg font-black text-teal-950 font-poppins">Misi Kami</h2>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Langkah Nyata Perjuangan</p>
            </div>
            <div class="w-12 h-12 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600">
                <i class="ti ti-target-arrow text-2xl"></i>
            </div>
        </div>

        <div class="space-y-6">
            @foreach($misi as $item)
            <div class="relative pl-10 group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <!-- Vertical Line Connector -->
                @if(!$loop->last)
                <div class="absolute left-4 top-10 bottom-0 w-px border-l border-dashed border-teal-200"></div>
                @endif
                
                <!-- Number Icon -->
                <div class="absolute left-0 top-0 w-8 h-8 rounded-xl bg-white shadow-md border border-teal-50 flex items-center justify-center text-teal-700 font-black text-xs z-10 group-hover:bg-teal-700 group-hover:text-white transition-all duration-300">
                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                </div>
                
                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-sm font-black text-teal-950 mb-2 leading-snug">{{ $item->judul }}</h3>
                    <p class="text-[11px] text-gray-500 leading-relaxed font-medium">{{ $item->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Sejarah Singkat -->
    <div class="mb-20">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-lg font-black text-teal-950 font-poppins">Sejarah Singkat</h2>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Jejak Perjalanan Al Amin</p>
            </div>
            <div class="w-12 h-12 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600">
                <i class="ti ti-history text-2xl"></i>
            </div>
        </div>
        
        <div class="relative" data-aos="fade-up">
            <!-- Decorative Accent -->
            <div class="absolute -top-4 -left-4 w-24 h-24 bg-teal-500/5 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-yellow-400/10 rounded-full blur-2xl"></div>

            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-xl shadow-teal-900/5 relative z-10">
                <!-- Quote Icon Accent -->
                <div class="absolute top-6 right-8 text-teal-50">
                    <i class="ti ti-quote text-5xl"></i>
                </div>

                <div class="prose prose-sm prose-teal max-w-none text-gray-600 leading-relaxed font-medium relative z-20 text-justify">
                    <div class="dropcap-first">
                        {!! $about->content !!}
                    </div>
                </div>

                <!-- Footer Decoration -->
                <div class="mt-8 pt-6 border-t border-gray-50 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center text-teal-600">
                        <i class="ti ti-building-mosque text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-teal-900 uppercase">Membangun Ummat</p>
                        <p class="text-[9px] text-gray-400 font-bold uppercase tracking-tighter">Sejak Berdirinya Pesantren</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .prose p { margin-bottom: 1.25rem; font-size: 0.875rem; line-height: 1.7; }
    .prose p:last-child { margin-bottom: 0; }
    .prose img { border-radius: 1rem; margin: 1.5rem 0; }
    .prose h2, .prose h3 { color: #042d27; font-weight: 900; margin-top: 1.5rem; margin-bottom: 0.75rem; font-size: 1.125rem;}
    
    .dropcap-first p:first-child::first-letter {
        float: left;
        font-size: 3.5rem;
        line-height: 1;
        font-weight: 900;
        margin-right: 0.75rem;
        color: #0d9488;
        font-family: 'Poppins', sans-serif;
    }
</style>
@endsection
