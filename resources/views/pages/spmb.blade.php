@extends('layouts.frontend')

@section('title', 'Sistem Penerimaan Santri Baru (SPMB) - Al Amin')
@section('meta_description', 'Informasi Penerimaan Santri Baru (SPMB) Pesantren Persatuan Islam 80 Al Amin.')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-teal-900">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl -ml-48 -mt-48"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-400 rounded-full blur-3xl -mr-48 -mb-48"></div>
    </div>
    <div class="container mx-auto px-6 lg:px-12 relative z-10 text-center">
        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 font-poppins">
            Informasi <span class="text-yellow-400">SPMB</span>
        </h1>
        <p class="text-teal-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
            Sistem Penerimaan Santri Baru Pesantren Persatuan Islam 80 Al Amin.
        </p>
    </div>
</section>

<!-- Brosur Utama Section -->
@if ($pengaturan && $pengaturan->brosur_utama)
<section class="pt-24 pb-16 bg-gray-50 border-b border-gray-100">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="bg-white p-8 md:p-12 rounded-3xl shadow-xl border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-8 max-w-4xl mx-auto">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600 shrink-0">
                    <i class="ti ti-file-download text-3xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-teal-950 mb-2 font-poppins">Brosur Utama SPMB</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Unduh brosur resmi pendaftaran untuk melihat panduan, syarat, dan tata cara pendaftaran lengkap.</p>
                </div>
            </div>
            <a href="{{ $pengaturan->getAdminImageUrl($pengaturan->brosur_utama) }}" target="_blank" class="shrink-0 bg-teal-600 hover:bg-teal-700 text-white font-bold px-8 py-4 rounded-2xl shadow-lg shadow-teal-600/25 flex items-center gap-3 transition-all duration-300">
                <i class="ti ti-download text-xl"></i>
                <span>Unduh Brosur Utama</span>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Unit Specifics Section -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-teal-950 font-poppins mb-4">Informasi Per Unit Pendidikan</h2>
            <p class="text-gray-500 max-w-xl mx-auto">Silakan lihat rincian biaya dan brosur pendaftaran untuk masing-masing jenjang unit pendidikan.</p>
        </div>

        <div class="space-y-20">
            @foreach($units as $unit)
            <div class="bg-gray-50 p-8 md:p-12 rounded-3xl border border-gray-100">
                <!-- Unit Header -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 pb-8 border-b border-gray-200/60">
                    <div class="flex items-center gap-5">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-sm border border-gray-100 flex items-center justify-center p-2 shrink-0">
                            @if($unit->logo)
                                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->logo) : 'https://placehold.co/64?text=Logo' }}" alt="Logo" class="w-full h-full object-contain">
                            @else
                                <i class="ti ti-school text-3xl text-teal-600"></i>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-teal-950 font-poppins">{{ $unit->nama_unit }}</h3>
                            <p class="text-sm text-gray-500">Kode Unit: {{ $unit->kode_unit }}</p>
                        </div>
                    </div>
                    @if($unit->brosur_unit)
                        <a href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->brosur_unit) : '#' }}" target="_blank" class="inline-flex items-center gap-2 bg-white hover:bg-teal-50 border border-gray-200 text-teal-700 font-bold px-6 py-3 rounded-xl transition-colors duration-300">
                            <i class="ti ti-download text-lg"></i>
                            <span>Unduh Brosur Unit</span>
                        </a>
                    @endif
                </div>

                <!-- Cost Details Images -->
                @php
                    $hasFullday = !empty($unit->rincian_biaya_fullday);
                    $hasBoarding = !empty($unit->rincian_biaya_boarding);
                    $showCostSection = $hasFullday || $hasBoarding;
                @endphp

                @if($showCostSection)
                <div class="grid grid-cols-1 {{ ($hasFullday && $hasBoarding) ? 'md:grid-cols-2' : '' }} gap-10">
                    <!-- Full Day -->
                    @if($hasFullday)
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col">
                        <h4 class="text-lg font-bold text-teal-900 mb-4 flex items-center gap-2">
                            <i class="ti ti-sun text-yellow-500"></i>
                            <span>Rincian Biaya Full Day</span>
                        </h4>
                        <div class="flex-1 flex items-center justify-center overflow-hidden rounded-xl bg-gray-50 border border-gray-100 p-4 min-h-[300px]">
                            <a href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->rincian_biaya_fullday) : '#' }}" target="_blank" class="block w-full group relative overflow-hidden">
                                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->rincian_biaya_fullday) : '#' }}" alt="Rincian Biaya Full Day" class="w-full h-auto rounded-lg shadow-sm group-hover:scale-[1.02] transition-transform duration-300 mx-auto">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                                    <span class="text-white font-bold bg-teal-600 px-4 py-2 rounded-xl text-sm shadow-md">
                                        <i class="ti ti-zoom-in me-1"></i> Perbesar Gambar
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif

                    <!-- Boarding -->
                    @if($hasBoarding)
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col">
                        <h4 class="text-lg font-bold text-teal-900 mb-4 flex items-center gap-2">
                            <i class="ti ti-moon text-indigo-500"></i>
                            <span>Rincian Biaya Boarding (Asrama)</span>
                        </h4>
                        <div class="flex-1 flex items-center justify-center overflow-hidden rounded-xl bg-gray-50 border border-gray-100 p-4 min-h-[300px]">
                            <a href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->rincian_biaya_boarding) : '#' }}" target="_blank" class="block w-full group relative overflow-hidden">
                                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->rincian_biaya_boarding) : '#' }}" alt="Rincian Biaya Boarding" class="w-full h-auto rounded-lg shadow-sm group-hover:scale-[1.02] transition-transform duration-300 mx-auto">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                                    <span class="text-white font-bold bg-teal-600 px-4 py-2 rounded-xl text-sm shadow-md">
                                        <i class="ti ti-zoom-in me-1"></i> Perbesar Gambar
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
