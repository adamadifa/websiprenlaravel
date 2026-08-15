@extends('layouts.frontend')

@section('title', 'Tentang Kami - Al Amin')
@section('meta_description', 'Mengenal lebih dekat sejarah, visi, dan misi perjuangan Pesantren Persatuan Islam 80 Al Amin.')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-teal-900">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl -ml-48 -mt-48"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-400 rounded-full blur-3xl -mr-48 -mb-48"></div>
    </div>
    <div class="container mx-auto px-6 lg:px-12 relative z-10 text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-6 font-poppins" data-aos="fade-up">
            Tentang <span class="text-yellow-400">Pesantren</span>
        </h1>
        <p class="text-teal-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="100">
            Mengenal lebih dekat sejarah, visi, dan misi perjuangan Pesantren Persatuan Islam 80 Al Amin.
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="py-24 bg-white relative">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            <!-- Left: Sejarah Content -->
            <div class="lg:col-span-7" data-aos="fade-right">
                <div class="inline-flex items-center gap-3 bg-teal-50 text-teal-700 px-4 py-2 rounded-full mb-8">
                    <i class="ti ti-history text-lg"></i>
                    <span class="text-sm font-bold">Sejarah Singkat</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-teal-950 mb-8 font-poppins leading-tight">
                    Dedikasi Untuk <br> Pendidikan Rabbani
                </h2>
                <div class="prose prose-lg prose-teal max-w-none text-gray-600 leading-relaxed space-y-6">
                    {!! $about->content !!}
                </div>
            </div>

            <!-- Right: Visi Misi Cards -->
            <div class="lg:col-span-5 space-y-8" data-aos="fade-left">
                <!-- Visi Card -->
                <div class="bg-gradient-to-br from-teal-900 to-[#0a4d44] p-10 rounded-2xl shadow-2xl text-white relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full blur-2xl -mr-16 -mt-16 group-hover:bg-white/10 transition-all"></div>
                    <h3 class="text-2xl font-black mb-6 flex items-center gap-4">
                        <span class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center">
                            <i class="ti ti-eye text-2xl text-yellow-400"></i>
                        </span>
                        Visi Kami
                    </h3>
                    <p class="text-lg text-teal-50 leading-relaxed italic">
                        "{{ $visi->deskripsi ?? 'Terwujudnya Pesantren sebagai lembaga kaderisasi terbaik dan miniatur masyarakat Rabbani.' }}"
                    </p>
                </div>

                <!-- Misi List -->
                <div class="bg-gray-50 p-10 rounded-2xl border border-gray-100">
                    <h3 class="text-2xl font-black text-teal-900 mb-8 flex items-center gap-4">
                        <span class="w-12 h-12 bg-teal-100 rounded-2xl flex items-center justify-center text-teal-600">
                            <i class="ti ti-target-arrow text-2xl"></i>
                        </span>
                        Misi Kami
                    </h3>
                    <div class="space-y-6">
                        @foreach($misi as $item)
                        <div class="flex gap-5 group">
                            <div class="shrink-0 w-8 h-8 bg-white shadow-sm border border-gray-100 rounded-xl flex items-center justify-center text-teal-600 font-bold text-sm group-hover:bg-teal-600 group-hover:text-white transition-all">
                                {{ $loop->iteration }}
                            </div>
                            <div>
                                <h4 class="font-bold text-teal-950 mb-1 group-hover:text-teal-700 transition-colors">{{ $item->judul }}</h4>
                                <p class="text-sm text-gray-500 leading-relaxed">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
