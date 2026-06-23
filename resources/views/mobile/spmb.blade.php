@extends('layouts.mobile')

@section('title', 'SPMB - Al Amin')
@section('meta_description', 'Informasi Penerimaan Santri Baru (SPMB) Pesantren Persatuan Islam 80 Al Amin.')

@section('content')
<!-- Hero Section -->
<div class="bg-teal-900 pt-20 pb-12 px-6 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-yellow-400 rounded-full blur-3xl -mr-32 -mb-32"></div>
    </div>
    
    <div class="relative z-10">
        <div class="flex items-center gap-2 text-[10px] text-white font-bold uppercase tracking-widest mb-3">
            <span class="w-6 h-px bg-white"></span>
            Penerimaan Santri Baru
        </div>
        <h1 class="text-3xl font-black text-white leading-tight mb-4 tracking-tight">Informasi <span class="text-yellow-400">SPMB</span></h1>
        <p class="text-xs text-teal-100/80 font-medium leading-relaxed max-w-[90%]">
            Informasi lengkap brosur pendaftaran dan rincian biaya per unit sekolah.
        </p>
    </div>
</div>

<div class="px-6 pt-8 pb-24 bg-gray-50/50 min-h-screen">
    <!-- Brosur Utama -->
    @if ($pengaturan && $pengaturan->brosur_utama)
    <div class="mb-8">
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex flex-col gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600 shrink-0">
                    <i class="ti ti-file-text text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-sm font-black text-teal-950">Brosur Utama SPMB</h3>
                    <p class="text-[10px] text-gray-400 leading-tight">Panduan umum pendaftaran</p>
                </div>
            </div>
            <a href="{{ $pengaturan->getAdminImageUrl($pengaturan->brosur_utama) }}" target="_blank" class="w-full bg-teal-600 text-white text-center font-bold py-3 rounded-2xl text-xs flex items-center justify-center gap-2 active:scale-95 transition-transform">
                <i class="ti ti-download text-sm"></i>
                <span>Unduh Brosur Utama</span>
            </a>
        </div>
    </div>
    @endif

    <!-- Unit Specifics -->
    <div class="space-y-8">
        <div>
            <h2 class="text-base font-black text-teal-950 font-poppins">Unit Pendidikan</h2>
            <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mt-1">Brosur & Rincian Biaya</p>
        </div>

        @foreach($units as $unit)
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gray-50 rounded-xl flex items-center justify-center p-1.5 border border-gray-100 shrink-0">
                        @if($unit->logo)
                            <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->logo) : 'https://placehold.co/40?text=Logo' }}" alt="Logo" class="w-full h-full object-contain">
                        @else
                            <i class="ti ti-school text-lg text-teal-600"></i>
                        @endif
                    </div>
                    <div>
                        <h3 class="text-xs font-black text-teal-950 leading-tight">{{ $unit->nama_unit }}</h3>
                        <p class="text-[9px] text-gray-400">Kode: {{ $unit->kode_unit }}</p>
                    </div>
                </div>
                @if($unit->brosur_unit)
                    <a href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->brosur_unit) : '#' }}" target="_blank" class="bg-teal-50 text-teal-700 p-2 rounded-xl text-xs active:scale-90 transition-transform">
                        <i class="ti ti-download text-base"></i>
                    </a>
                @endif
            </div>

            <!-- Cost Details (Full Day & Boarding) Stacked -->
            @php
                $hasFullday = !empty($unit->rincian_biaya_fullday);
                $hasBoarding = !empty($unit->rincian_biaya_boarding);
                $showCostSection = $hasFullday || $hasBoarding;
            @endphp

            @if($showCostSection)
            <div class="space-y-4">
                <!-- Full Day -->
                @if($hasFullday)
                <div>
                    <h4 class="text-[11px] font-bold text-teal-900 mb-2 flex items-center gap-1.5">
                        <i class="ti ti-sun text-yellow-500"></i>
                        <span>Biaya Full Day</span>
                    </h4>
                    <div class="rounded-2xl bg-gray-50 border border-gray-100 p-3 min-h-[150px] flex items-center justify-center overflow-hidden">
                        <a href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->rincian_biaya_fullday) : '#' }}" target="_blank" class="block w-full text-center">
                            <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->rincian_biaya_fullday) : '#' }}" alt="Rincian Biaya Full Day" class="w-full h-auto rounded-lg shadow-sm mx-auto">
                        </a>
                    </div>
                </div>
                @endif

                <!-- Boarding -->
                @if($hasBoarding)
                <div>
                    <h4 class="text-[11px] font-bold text-teal-900 mb-2 flex items-center gap-1.5">
                        <i class="ti ti-moon text-indigo-500"></i>
                        <span>Biaya Boarding (Asrama)</span>
                    </h4>
                    <div class="rounded-2xl bg-gray-50 border border-gray-100 p-3 min-h-[150px] flex items-center justify-center overflow-hidden">
                        <a href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->rincian_biaya_boarding) : '#' }}" target="_blank" class="block w-full text-center">
                            <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($unit->rincian_biaya_boarding) : '#' }}" alt="Rincian Biaya Boarding" class="w-full h-auto rounded-lg shadow-sm mx-auto">
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
@endsection
