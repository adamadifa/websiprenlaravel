@extends('layouts.frontend')

@section('title', 'Guru & Tenaga Kependidikan - Al Amin')
@section('meta_description', 'Profil jajaran pendidik dan tenaga kependidikan berdedikasi tinggi di Pesantren Persatuan Islam 80 Al Amin.')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-16 overflow-hidden bg-teal-900">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl -ml-48 -mt-48"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-400 rounded-full blur-3xl -mr-48 -mb-48"></div>
    </div>
    <div class="container mx-auto px-6 lg:px-12 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-black text-white mb-4 font-poppins" data-aos="fade-up">
            Guru & <span class="text-yellow-400">Tendik</span>
        </h1>
        <p class="text-teal-100 text-lg max-w-2xl mx-auto opacity-80" data-aos="fade-up" data-aos-delay="100">
            Keluarga besar pendidik dan tenaga kependidikan Pesantren Al Amin.
        </p>
    </div>
</section>

<!-- Staff Content -->
<section class="py-20 bg-gray-50/50">
    <div class="container mx-auto px-6 lg:px-12">
        
        <!-- Pimpinan Pesantren Section -->
        @if($pimpinanUtama)
        <div class="mb-32 text-center">
            <h2 class="text-3xl font-black text-teal-950 font-poppins mb-1">Pimpinan Pesantren</h2>
            <p class="text-gray-500 text-sm mb-12">Struktur Tertinggi Pesantren</p>
            
            <div class="flex justify-center">
                <div class="w-full max-w-[420px] bg-white rounded-3xl shadow-2xl shadow-teal-900/10 overflow-hidden border border-teal-100 group" data-aos="fade-up">
                    <!-- Card Header Gradient -->
                    <div class="relative bg-gradient-to-br from-teal-400 to-teal-600 p-12 flex justify-center">
                        <div class="absolute top-4 right-4 bg-teal-900/20 backdrop-blur-md text-white text-[10px] font-black px-3 py-1 rounded-full border border-white/20">
                            PIMPINAN
                        </div>
                        <div class="relative w-40 h-40">
                            <div class="absolute inset-0 bg-white/20 rounded-full scale-110"></div>
                            <div class="relative w-full h-full rounded-full overflow-hidden border-4 border-white shadow-2xl">
                                @if($pimpinanUtama->foto)
                                    <img src="{{ $pimpinanUtama->getAdminImageUrl($pimpinanUtama->foto, 'photos/karyawan') }}" alt="{{ $pimpinanUtama->nama_lengkap }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-50 text-gray-300">
                                        <i class="ti ti-user-circle text-8xl"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-8 text-left">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-2xl font-black text-teal-950">{{ $pimpinanUtama->nama_lengkap }}</h3>
                            <span class="bg-teal-50 text-teal-600 text-[10px] font-bold px-3 py-1 rounded-full border border-teal-100">
                                Guru
                            </span>
                        </div>
                        <p class="text-teal-600 font-bold text-base mb-6">{{ $pimpinanUtama->jabatan->nama_jabatan ?? 'Pimpinan Pesantren' }}</p>
                        
                        <div class="pt-6 border-t border-gray-100">
                            <p class="text-gray-400 text-sm font-medium">NPP: <span class="text-teal-950">{{ $pimpinanUtama->npp }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Staff Pesantren Grid (U06) -->
        @if($staffPesantren->count() > 0)
        <div class="mb-32" data-aos="fade-up">
            <div class="mb-10">
                <div class="flex items-baseline gap-4 mb-2">
                    <h2 class="text-3xl font-black text-teal-950 font-poppins uppercase tracking-tight">PESANTREN</h2>
                    <p class="text-gray-500 text-sm font-medium">{{ $staffPesantren->count() }} karyawan</p>
                </div>
                <div class="h-1 bg-teal-400/30 w-full rounded-full"></div>
            </div>

            @php
                $kepalaPes = $staffPesantren->whereIn('kode_jabatan', ['J05', 'J07']); // Pimpinan inti unit pesantren
                $stafPesBiasa = $staffPesantren->whereNotIn('kode_jabatan', ['J05', 'J07']);
            @endphp

            @if($kepalaPes->count() > 0)
            <div class="flex flex-wrap justify-center gap-8 mb-16">
                @foreach($kepalaPes as $leader)
                <div class="w-full max-w-[320px] bg-white rounded-[2rem] p-8 shadow-xl shadow-teal-900/5 border border-teal-50 text-center group">
                    <div class="relative w-32 h-32 mx-auto mb-6">
                        <div class="absolute inset-0 bg-teal-50 rounded-full group-hover:scale-110 transition-transform"></div>
                        <div class="relative w-full h-full rounded-full overflow-hidden border-4 border-white shadow-md">
                            @if($leader->foto)
                                <img src="{{ $leader->getAdminImageUrl($leader->foto, 'photos/karyawan') }}" alt="{{ $leader->nama_lengkap }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-50 text-gray-200">
                                    <i class="ti ti-user-circle text-6xl"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                    <h4 class="text-lg font-black text-teal-950 mb-1 leading-tight">{{ $leader->nama_lengkap }}</h4>
                    <p class="text-teal-600 font-bold text-sm uppercase tracking-wider mb-2">{{ $leader->jabatan->nama_jabatan ?? 'Kepala Unit' }}</p>
                    <p class="text-[10px] text-gray-400 font-medium">NPP: <span class="text-gray-600 font-bold">{{ $leader->npp }}</span></p>
                </div>
                @endforeach
            </div>
            @endif

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 md:gap-8">
                @foreach($stafPesBiasa as $person)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg hover:border-teal-200 transition-all duration-300 group" data-aos="fade-up">
                    <!-- Accent Line -->
                    <div class="h-1.5 w-full bg-teal-600 group-hover:bg-yellow-400 transition-colors"></div>
                    
                    <div class="p-5 md:p-6 text-center">
                        <!-- Photo -->
                        <div class="w-20 h-20 md:w-24 md:h-24 mx-auto mb-4 relative">
                            <div class="absolute inset-0 bg-gray-50 rounded-full"></div>
                            <div class="relative w-full h-full rounded-full overflow-hidden border border-gray-200 p-0.5 group-hover:border-teal-300 transition-colors">
                                @if($person->foto)
                                    <img src="{{ $person->getAdminImageUrl($person->foto, 'photos/karyawan') }}" alt="{{ $person->nama_lengkap }}" class="w-full h-full object-cover rounded-full">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-50 text-gray-300 rounded-full">
                                        <i class="ti ti-user-circle text-5xl"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Divider -->
                        <div class="w-8 h-px bg-gray-200 mx-auto mb-3"></div>
                        
                        <!-- Info -->
                        <h4 class="text-[13px] md:text-[15px] font-bold text-gray-900 mb-1 leading-snug line-clamp-2 min-h-[2.5rem] flex items-center justify-center">
                            {{ $person->nama_lengkap }}
                        </h4>
                        <p class="text-[10px] md:text-[11px] text-teal-700 font-semibold tracking-wide uppercase">
                            {{ $person->jabatan->nama_jabatan ?? 'Tenaga Pengajar' }}
                        </p>
                        <p class="mt-2 text-[9px] text-gray-400 font-medium tracking-tight">
                            NPP: <span class="text-gray-600 font-semibold">{{ $person->npp }}</span>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Grouped by Other Units -->
        @foreach($otherUnits as $unit)
            @php 
                $unitStaff = $groupedStaff->get($unit->kode_unit); 
            @endphp
            
            @if($unitStaff && $unitStaff->count() > 0)
            <div class="mb-32" data-aos="fade-up">
                <div class="mb-10">
                    <div class="flex items-baseline gap-4 mb-2">
                        <h2 class="text-3xl font-black text-teal-950 font-poppins uppercase tracking-tight">{{ $unit->nama_unit }}</h2>
                        <p class="text-gray-500 text-sm font-medium">{{ $unitStaff->count() }} karyawan</p>
                    </div>
                    <div class="h-1 bg-teal-400/30 w-full rounded-full"></div>
                </div>

                @php
                    $kepala = $unitStaff->where('kode_jabatan', 'J07'); // Hanya Kepala Unit
                    $stafBiasa = $unitStaff->where('kode_jabatan', '!=', 'J07');
                @endphp

                <!-- Kepala Unit / Pimpinan Grup -->
                @if($kepala->count() > 0)
                <div class="flex flex-wrap justify-center gap-8 mb-16">
                    @foreach($kepala as $leader)
                    <div class="w-full max-w-[320px] bg-white rounded-[2rem] p-8 shadow-xl shadow-teal-900/5 border border-teal-50 text-center group">
                        <div class="relative w-32 h-32 mx-auto mb-6">
                            <div class="absolute inset-0 bg-teal-50 rounded-full group-hover:scale-110 transition-transform"></div>
                            <div class="relative w-full h-full rounded-full overflow-hidden border-4 border-white shadow-md">
                                @if($leader->foto)
                                    <img src="{{ $leader->getAdminImageUrl($leader->foto, 'photos/karyawan') }}" alt="{{ $leader->nama_lengkap }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-50 text-gray-200">
                                        <i class="ti ti-user-circle text-6xl"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <h4 class="text-lg font-black text-teal-950 mb-1 leading-tight">{{ $leader->nama_lengkap }}</h4>
                        <p class="text-teal-600 font-bold text-sm uppercase tracking-wider mb-2">{{ $leader->jabatan->nama_jabatan ?? 'Kepala Unit' }}</p>
                        <p class="text-[10px] text-gray-400 font-medium">NPP: <span class="text-gray-600 font-bold">{{ $leader->npp }}</span></p>
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Anggota / Staf Lainnya -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 md:gap-8">
                    @foreach($stafBiasa as $person)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg hover:border-teal-200 transition-all duration-300 group" data-aos="fade-up">
                        <!-- Accent Line -->
                        <div class="h-1.5 w-full bg-teal-600 group-hover:bg-yellow-400 transition-colors"></div>
                        
                        <div class="p-5 md:p-6 text-center">
                            <!-- Photo -->
                            <div class="w-20 h-20 md:w-24 md:h-24 mx-auto mb-4 relative">
                                <div class="absolute inset-0 bg-gray-50 rounded-full"></div>
                                <div class="relative w-full h-full rounded-full overflow-hidden border border-gray-200 p-0.5 group-hover:border-teal-300 transition-colors">
                                    @if($person->foto)
                                        <img src="{{ $person->getAdminImageUrl($person->foto, 'photos/karyawan') }}" alt="{{ $person->nama_lengkap }}" class="w-full h-full object-cover rounded-full">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-50 text-gray-300 rounded-full">
                                            <i class="ti ti-user-circle text-5xl"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Divider -->
                            <div class="w-8 h-px bg-gray-200 mx-auto mb-3"></div>
                            
                            <!-- Info -->
                            <h4 class="text-[13px] md:text-[15px] font-bold text-gray-900 mb-1 leading-snug line-clamp-2 min-h-[2.5rem] flex items-center justify-center">
                                {{ $person->nama_lengkap }}
                            </h4>
                            <p class="text-[10px] md:text-[11px] text-teal-700 font-semibold tracking-wide uppercase">
                                {{ $person->jabatan->nama_jabatan ?? 'Tenaga Pengajar' }}
                            </p>
                            <p class="mt-2 text-[9px] text-gray-400 font-medium tracking-tight">
                                NPP: <span class="text-gray-600 font-semibold">{{ $person->npp }}</span>
                            </p>
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
