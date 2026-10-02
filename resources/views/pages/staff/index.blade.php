@extends('layouts.frontend')

@section('title', 'Guru & Tenaga Kependidikan - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Al Amin'))
@section('meta_description', 'Profil jajaran pendidik dan tenaga kependidikan berdedikasi tinggi di Pesantren Persatuan Islam 80 Al Amin.')

@section('content')
<!-- Hero / Header Section -->
<section class="relative pt-28 sm:pt-32 pb-10 sm:pb-12 bg-[#062d27] text-white border-b border-emerald-900/60 overflow-hidden">
    <!-- Ambient Background Overlay -->
    @if($pengaturan && !empty($pengaturan->background_login))
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20">
            <img 
                src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                alt="Pesantren Al Amin Background" 
                class="w-full h-full object-cover grayscale mix-blend-luminosity scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#062d27] via-[#062d27]/90 to-[#062d27]/70"></div>
        </div>
    @endif

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        
        <!-- Top Bar: Indicator & Breadcrumbs -->
        <div class="flex flex-wrap items-center justify-between gap-3 mb-6 pb-3 border-b border-emerald-800/40" data-aos="fade-down">
            <div class="flex items-center gap-2">
                <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-emerald-300 font-poppins">
                    Struktur & Sumber Daya Insani
                </span>
            </div>

            <nav class="flex items-center gap-2 text-emerald-300/70 text-[11px] sm:text-xs font-bold uppercase tracking-wider font-poppins">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <i class="ti ti-chevron-right text-[9px] text-emerald-400/60"></i>
                <span class="text-[#bef264]">Guru & Tendik</span>
            </nav>
        </div>

        <!-- Hero Title Area -->
        <div class="max-w-4xl">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-poppins text-white tracking-tight leading-[1.2] mb-3" data-aos="fade-up">
                Pendidik & <span class="text-[#bef264]">Tenaga Kependidikan</span>
            </h1>
            <p class="text-emerald-100/85 text-xs sm:text-sm lg:text-base leading-relaxed max-w-2xl font-normal" data-aos="fade-up" data-aos-delay="100">
                Mengenal keluarga besar asatidz, dewan guru berkarakter, dan staf profesional yang membimbing serta melayani santri {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}.
            </p>
        </div>

    </div>
</section>

<!-- Staff Content Section -->
<section class="py-14 sm:py-20 bg-[#faf9f6] text-slate-800 relative">
    <div class="container mx-auto px-6 lg:px-12">
        
        <!-- Pimpinan Pesantren Section (Executive Prestige Showcase Card) -->
        @if($pimpinanUtama)
        <div class="mb-20 sm:mb-24" data-aos="fade-up">
            <div class="text-center max-w-xl mx-auto mb-10">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-800 block mb-1.5 font-poppins">
                    Struktur Pimpinan Tertinggi
                </span>
                <h2 class="text-2xl sm:text-3xl font-black text-gray-900 font-poppins">
                    Pimpinan Pesantren
                </h2>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-3xl overflow-hidden border border-stone-200/90 shadow-xl hover:shadow-2xl transition-all duration-300 flex flex-col md:flex-row group">
                    <!-- Left: Portrait Photo with Executive Frame -->
                    <div class="md:w-72 sm:min-h-[320px] relative overflow-hidden bg-gradient-to-b from-stone-100 to-emerald-950/10 shrink-0">
                        @if($pimpinanUtama->foto)
                            <img 
                                src="{{ $pimpinanUtama->getAdminImageUrl($pimpinanUtama->foto, 'photos/karyawan') }}" 
                                alt="{{ $pimpinanUtama->nama_lengkap }}" 
                                class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
                            >
                        @else
                            <div class="w-full h-full min-h-[260px] flex flex-col items-center justify-center bg-gradient-to-b from-emerald-900 to-[#062d27] text-white p-6 text-center">
                                <i class="ti ti-user-circle text-7xl text-emerald-300/40 mb-2"></i>
                                <span class="text-xs font-bold text-[#bef264] uppercase tracking-wider font-poppins">Pimpinan Utama</span>
                            </div>
                        @endif

                        <!-- Corner Executive Badge -->
                        <div class="absolute top-4 left-4 z-10">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-[#062d27]/85 backdrop-blur-md text-[#bef264] text-[10px] font-extrabold uppercase tracking-wider font-poppins border border-emerald-500/30 shadow-md">
                                <i class="ti ti-crown text-xs"></i>
                                Pimpinan Utama
                            </span>
                        </div>
                    </div>

                    <!-- Right: Executive Details -->
                    <div class="p-6 sm:p-8 md:p-10 flex flex-col justify-between flex-1 bg-white">
                        <div>
                            <div class="flex items-center gap-2 text-emerald-800 text-xs font-bold uppercase tracking-widest font-poppins mb-2">
                                <i class="ti ti-building-mosque"></i>
                                <span>{{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}</span>
                            </div>

                            <h3 class="text-xl sm:text-2xl lg:text-3xl font-black font-poppins text-gray-900 leading-tight mb-2">
                                {{ $pimpinanUtama->nama_lengkap }}
                            </h3>

                            <p class="text-xs sm:text-sm font-bold text-emerald-800 font-poppins uppercase tracking-wider mb-5">
                                {{ $pimpinanUtama->jabatan->nama_jabatan ?? 'Pimpinan Pesantren' }}
                            </p>

                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-normal italic border-l-2 border-emerald-700 pl-3 mb-6 bg-stone-50/70 py-2 rounded-r-xl">
                                "Menegakkan risalah Islam, mengkader santri tafaqquh fiddien, berakhlakul karimah, mandiri, dan berprestasi."
                            </p>
                        </div>

                        <!-- Footer Identity Pill -->
                        <div class="pt-4 border-t border-stone-100 flex flex-wrap items-center justify-between gap-3 text-xs font-poppins">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-800 flex items-center justify-center">
                                    <i class="ti ti-id text-base"></i>
                                </span>
                                <div>
                                    <p class="text-[9px] text-gray-400 font-bold uppercase tracking-wider leading-none mb-0.5">Nomor Pokok Pegawai</p>
                                    <p class="font-bold text-gray-800">{{ $pimpinanUtama->npp }}</p>
                                </div>
                            </div>

                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-bold">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                Status Aktif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Staff Pesantren Grid (U06) -->
        @if($staffPesantren->count() > 0)
        <div class="mb-20 sm:mb-24" data-aos="fade-up">
            <!-- Section Header -->
            <div class="flex flex-wrap items-end justify-between gap-4 mb-8 pb-4 border-b border-stone-200">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-800 block mb-1 font-poppins">
                        Sekretariat & Manajemen
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-gray-900 font-poppins uppercase tracking-tight">
                        Pesantren Al Amin
                    </h2>
                </div>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-bold font-poppins border border-emerald-200/60">
                    <i class="ti ti-users text-sm"></i>
                    {{ $staffPesantren->count() }} Personel
                </span>
            </div>

            @php
                $kepalaPes = $staffPesantren->whereIn('kode_jabatan', ['J05', 'J07']);
                $stafPesBiasa = $staffPesantren->whereNotIn('kode_jabatan', ['J05', 'J07']);
            @endphp

            <!-- Pimpinan Inti Unit Pesantren -->
            @if($kepalaPes->count() > 0)
            <div class="flex flex-wrap justify-center gap-6 mb-12">
                @foreach($kepalaPes as $leader)
                <div class="w-full max-w-xs bg-white rounded-3xl overflow-hidden border border-stone-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col group">
                    <!-- Portrait Frame -->
                    <div class="relative aspect-[4/5] overflow-hidden bg-stone-100">
                        @if($leader->foto)
                            <img src="{{ $leader->getAdminImageUrl($leader->foto, 'photos/karyawan') }}" alt="{{ $leader->nama_lengkap }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-b from-stone-100 to-stone-200 text-stone-400">
                                <i class="ti ti-user-circle text-7xl mb-1"></i>
                                <span class="text-[10px] font-bold uppercase tracking-wider">Foto Profil</span>
                            </div>
                        @endif

                        <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-black/70 via-black/20 to-transparent pointer-events-none"></div>

                        <!-- Role Pill Tag Inside Photo -->
                        <div class="absolute bottom-3 left-3 right-3 pointer-events-none">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-[#062d27]/85 backdrop-blur-md text-[#bef264] text-[10px] font-bold font-poppins border border-emerald-500/30 shadow-sm truncate max-w-full">
                                <i class="ti ti-crown text-xs"></i>
                                {{ $leader->jabatan->nama_jabatan ?? 'Kepala Unit' }}
                            </span>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="p-5 flex flex-col flex-1 bg-white">
                        <h4 class="text-sm sm:text-base font-bold font-poppins text-gray-900 group-hover:text-emerald-800 transition-colors leading-snug line-clamp-2 min-h-[2.6rem] flex items-center mb-1">
                            {{ $leader->nama_lengkap }}
                        </h4>
                        <div class="mt-auto pt-3 border-t border-stone-100 flex items-center justify-between text-[11px] font-poppins">
                            <span class="flex items-center gap-1 text-gray-500 font-medium">
                                <i class="ti ti-id text-emerald-700"></i>
                                NPP: <strong class="text-gray-700">{{ $leader->npp }}</strong>
                            </span>
                            <span class="text-[10px] font-bold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-full">Aktif</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <!-- Staf Anggota Pesantren Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6">
                @foreach($stafPesBiasa as $person)
                <div class="group bg-white rounded-2xl sm:rounded-3xl overflow-hidden border border-stone-200/80 hover:border-emerald-600/40 shadow-xs hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col">
                    <!-- Photo Box -->
                    <div class="relative aspect-[4/5] overflow-hidden bg-gradient-to-b from-stone-100 to-stone-200">
                        @if($person->foto)
                            <img 
                                src="{{ $person->getAdminImageUrl($person->foto, 'photos/karyawan') }}" 
                                alt="{{ $person->nama_lengkap }}" 
                                class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                            >
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-stone-100 text-stone-300 p-4">
                                <i class="ti ti-user-circle text-6xl"></i>
                            </div>
                        @endif

                        <!-- Photo Shadow Overlay -->
                        <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>

                        <!-- Role Badge Inside Photo -->
                        <div class="absolute bottom-2.5 left-2.5 right-2.5 pointer-events-none">
                            <span class="inline-block max-w-full truncate px-2 py-0.5 rounded-md bg-black/50 backdrop-blur-md text-white text-[10px] font-semibold font-poppins border border-white/20">
                                {{ $person->jabatan->nama_jabatan ?? 'Tenaga Kependidikan' }}
                            </span>
                        </div>
                    </div>

                    <!-- Content Info Box -->
                    <div class="p-3.5 sm:p-4 flex flex-col flex-1 bg-white">
                        <h4 class="text-xs sm:text-[14px] font-bold font-poppins text-gray-900 group-hover:text-emerald-800 transition-colors leading-snug line-clamp-2 min-h-[2.5rem] flex items-center mb-1">
                            {{ $person->nama_lengkap }}
                        </h4>

                        <div class="mt-auto pt-2.5 border-t border-stone-100 flex items-center justify-between text-[10px] sm:text-[11px] font-poppins">
                            <span class="flex items-center gap-1 text-gray-500 font-medium truncate">
                                <i class="ti ti-id text-emerald-700 text-xs"></i>
                                <span class="text-gray-700 font-semibold truncate">{{ $person->npp }}</span>
                            </span>
                            <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0" title="Aktif"></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Educational Units Staff (TK, SDIT, MTs, MA, etc.) -->
        @foreach($otherUnits as $unit)
            @php 
                $unitStaff = $groupedStaff->get($unit->kode_unit); 
            @endphp
            
            @if($unitStaff && $unitStaff->count() > 0)
            <div class="mb-20 sm:mb-24" data-aos="fade-up">
                <!-- Section Header -->
                <div class="flex flex-wrap items-center justify-between gap-4 mb-8 pb-4 border-b border-stone-200">
                    <div class="flex items-center gap-3.5">
                        @if($unit->logo)
                            <div class="w-12 h-12 rounded-2xl bg-white border border-stone-200 p-2 shadow-xs shrink-0 flex items-center justify-center">
                                <img src="{{ $unit->getAdminImageUrl($unit->logo) }}" alt="{{ $unit->nama_unit }}" class="w-full h-full object-contain">
                            </div>
                        @endif
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-emerald-800 block mb-0.5 font-poppins">
                                Dewan Pendidik & Tendik
                            </span>
                            <h2 class="text-2xl sm:text-3xl font-black text-gray-900 font-poppins">
                                {{ $unit->nama_unit }}
                            </h2>
                        </div>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-bold font-poppins border border-emerald-200/60">
                        <i class="ti ti-users text-sm"></i>
                        {{ $unitStaff->count() }} Guru & Tendik
                    </span>
                </div>

                @php
                    $kepala = $unitStaff->where('kode_jabatan', 'J07');
                    $stafBiasa = $unitStaff->where('kode_jabatan', '!=', 'J07');
                @endphp

                <!-- Kepala Unit / Kepala Madrasah -->
                @if($kepala->count() > 0)
                <div class="flex flex-wrap justify-center gap-6 mb-12">
                    @foreach($kepala as $leader)
                    <div class="w-full max-w-xs bg-white rounded-3xl overflow-hidden border border-stone-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col group">
                        <!-- Portrait Frame -->
                        <div class="relative aspect-[4/5] overflow-hidden bg-stone-100">
                            @if($leader->foto)
                                <img src="{{ $leader->getAdminImageUrl($leader->foto, 'photos/karyawan') }}" alt="{{ $leader->nama_lengkap }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-b from-stone-100 to-stone-200 text-stone-400">
                                    <i class="ti ti-user-circle text-7xl mb-1"></i>
                                    <span class="text-[10px] font-bold uppercase tracking-wider">Foto Profil</span>
                                </div>
                            @endif

                            <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-black/70 via-black/20 to-transparent pointer-events-none"></div>

                            <!-- Role Pill Tag Inside Photo -->
                            <div class="absolute bottom-3 left-3 right-3 pointer-events-none">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-[#062d27]/85 backdrop-blur-md text-[#bef264] text-[10px] font-bold font-poppins border border-emerald-500/30 shadow-sm truncate max-w-full">
                                    <i class="ti ti-crown text-xs"></i>
                                    {{ $leader->jabatan->nama_jabatan ?? 'Kepala Unit' }}
                                </span>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="p-5 flex flex-col flex-1 bg-white">
                            <h4 class="text-sm sm:text-base font-bold font-poppins text-gray-900 group-hover:text-emerald-800 transition-colors leading-snug line-clamp-2 min-h-[2.6rem] flex items-center mb-1">
                                {{ $leader->nama_lengkap }}
                            </h4>
                            <div class="mt-auto pt-3 border-t border-stone-100 flex items-center justify-between text-[11px] font-poppins">
                                <span class="flex items-center gap-1 text-gray-500 font-medium">
                                    <i class="ti ti-id text-emerald-700"></i>
                                    NPP: <strong class="text-gray-700">{{ $leader->npp }}</strong>
                                </span>
                                <span class="text-[10px] font-bold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-full">Aktif</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Anggota Staf / Dewan Guru -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6">
                    @foreach($stafBiasa as $person)
                    <div class="group bg-white rounded-2xl sm:rounded-3xl overflow-hidden border border-stone-200/80 hover:border-emerald-600/40 shadow-xs hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col">
                        <!-- Photo Box -->
                        <div class="relative aspect-[4/5] overflow-hidden bg-gradient-to-b from-stone-100 to-stone-200">
                            @if($person->foto)
                                <img 
                                    src="{{ $person->getAdminImageUrl($person->foto, 'photos/karyawan') }}" 
                                    alt="{{ $person->nama_lengkap }}" 
                                    class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy"
                                >
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-stone-100 text-stone-300 p-4">
                                    <i class="ti ti-user-circle text-6xl"></i>
                                </div>
                            @endif

                            <!-- Photo Shadow Overlay -->
                            <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>

                            <!-- Role Badge Inside Photo -->
                            <div class="absolute bottom-2.5 left-2.5 right-2.5 pointer-events-none">
                                <span class="inline-block max-w-full truncate px-2 py-0.5 rounded-md bg-black/50 backdrop-blur-md text-white text-[10px] font-semibold font-poppins border border-white/20">
                                    {{ $person->jabatan->nama_jabatan ?? 'Tenaga Pendidik' }}
                                </span>
                            </div>
                        </div>

                        <!-- Content Info Box -->
                        <div class="p-3.5 sm:p-4 flex flex-col flex-1 bg-white">
                            <h4 class="text-xs sm:text-[14px] font-bold font-poppins text-gray-900 group-hover:text-emerald-800 transition-colors leading-snug line-clamp-2 min-h-[2.5rem] flex items-center mb-1">
                                {{ $person->nama_lengkap }}
                            </h4>

                            <div class="mt-auto pt-2.5 border-t border-stone-100 flex items-center justify-between text-[10px] sm:text-[11px] font-poppins">
                                <span class="flex items-center gap-1 text-gray-500 font-medium truncate">
                                    <i class="ti ti-id text-emerald-700 text-xs"></i>
                                    <span class="text-gray-700 font-semibold truncate">{{ $person->npp }}</span>
                                </span>
                                <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0" title="Aktif"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach

    </div>
</section>
@endsection
