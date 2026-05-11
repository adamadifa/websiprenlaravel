@extends('layouts.mobile')

@section('title', 'Guru & Tendik - Al Amin')
@section('meta_description', 'Profil jajaran pendidik dan tenaga kependidikan berdedikasi tinggi di Pesantren Persatuan Islam 80 Al Amin.')

@section('content')
<!-- Hero Section -->
<div class="bg-teal-900 pt-8 pb-12 px-6 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-yellow-400 rounded-full blur-3xl -mr-32 -mb-32"></div>
    </div>
    
    <div class="relative z-10" data-aos="fade-down">
        <div class="flex items-center gap-2 text-[10px] text-white font-bold uppercase tracking-widest mb-3">
            <span class="w-6 h-px bg-white"></span>
            Struktur Organisasi
        </div>
        <h1 class="text-3xl font-black text-white leading-tight mb-4 tracking-tight">Guru & <span class="text-yellow-400">Tendik</span></h1>
        <p class="text-xs text-teal-100/80 font-medium leading-relaxed max-w-[90%]">Profil jajaran pendidik dan tenaga kependidikan berdedikasi tinggi di Pesantren Al Amin.</p>
    </div>
</div>

<div class="px-6 pt-10 pb-24 bg-gray-50/50 min-h-screen">

    <!-- Pimpinan Utama -->
    @if($pimpinanUtama)
    <div class="mb-20">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-lg font-black text-teal-950 font-poppins">Pimpinan Pesantren</h2>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Struktur Tertinggi Lembaga</p>
            </div>
            <div class="w-12 h-12 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600">
                <i class="ti ti-crown text-2xl"></i>
            </div>
        </div>
        
        <div class="relative px-4" data-aos="zoom-in">
            <!-- Decorative Blobs -->
            <div class="absolute top-1/2 left-0 w-32 h-32 bg-teal-500/10 rounded-full blur-3xl -translate-y-1/2"></div>
            <div class="absolute top-1/2 right-0 w-32 h-32 bg-yellow-400/10 rounded-full blur-3xl -translate-y-1/2"></div>

            <div class="bg-white rounded-3xl overflow-hidden shadow-2xl shadow-teal-900/10 border border-teal-50 relative z-10">
                <!-- Header Background -->
                <div class="h-32 bg-gradient-to-br from-teal-700 via-teal-800 to-teal-950 relative overflow-hidden">
                    <div class="absolute top-4 right-6">
                        <span class="bg-white/10 backdrop-blur-md text-white text-[8px] font-black px-3 py-1.5 rounded-full border border-white/20 uppercase tracking-widest">
                            Official Pimpinan
                        </span>
                    </div>
                </div>

                <div class="px-8 pb-10 pt-0 relative flex flex-col items-center text-center">
                    <!-- Photo Container -->
                    <div class="relative -mt-20 mb-6">
                        <div class="w-32 h-40 rounded-3xl overflow-hidden border-4 border-white shadow-2xl bg-gray-50 p-1">
                            <div class="w-full h-full rounded-2xl overflow-hidden">
                                @if($pimpinanUtama->foto)
                                    <img src="{{ $pimpinanUtama->getAdminImageUrl($pimpinanUtama->foto, 'photos/karyawan') }}" alt="{{ $pimpinanUtama->nama_lengkap }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-teal-50 text-teal-200">
                                        <i class="ti ti-user-circle text-7xl"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Status Badge -->
                        <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-yellow-400 rounded-xl flex items-center justify-center text-teal-900 shadow-lg border-2 border-white">
                            <i class="ti ti-rosette-filled text-xl"></i>
                        </div>
                    </div>

                    <h3 class="text-xl font-black text-teal-950 leading-tight mb-2 font-poppins">{{ $pimpinanUtama->nama_lengkap }}</h3>
                    <p class="text-[11px] text-teal-600 font-black uppercase tracking-[0.2em] mb-6">{{ $pimpinanUtama->jabatan->nama_jabatan ?? 'Pimpinan Pesantren' }}</p>
                    
                    <div class="w-full flex items-center gap-4 py-4 px-6 bg-teal-50/50 rounded-2xl border border-teal-50/50">
                        <div class="flex-1 text-left">
                            <p class="text-[8px] text-gray-400 font-black uppercase tracking-widest mb-0.5">Nomor Pokok Pegawai</p>
                            <p class="text-xs font-bold text-teal-900">{{ $pimpinanUtama->npp }}</p>
                        </div>
                        <div class="w-px h-8 bg-teal-100"></div>
                        <div class="flex-1 text-right">
                            <p class="text-[8px] text-gray-400 font-black uppercase tracking-widest mb-0.5">Status Jabatan</p>
                            <p class="text-xs font-bold text-teal-900">Aktif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Staff Pesantren -->
    <div class="mb-14">
        <div class="flex items-center gap-3 mb-6">
            <h2 class="text-sm font-bold text-teal-900 uppercase tracking-widest">Keluarga Besar Pesantren</h2>
            <div class="flex-1 h-px bg-gradient-to-r from-gray-200 to-transparent"></div>
        </div>
        
        <div class="grid grid-cols-2 gap-4">
            @foreach($staffPesantren as $staff)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 flex flex-col group" data-aos="fade-up">
                <div class="aspect-[3/4] w-full bg-gray-100 relative overflow-hidden flex items-center justify-center">
                    @if($staff->foto)
                        <img src="{{ $staff->getAdminImageUrl($staff->foto, 'photos/karyawan') }}" alt="{{ $staff->nama_lengkap }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-teal-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    @else
                        <i class="ti ti-user-circle text-6xl text-gray-300"></i>
                    @endif
                </div>
                <div class="p-4 flex-1 flex flex-col justify-center text-center">
                    <h4 class="text-[11px] font-black text-teal-950 line-clamp-2 leading-snug mb-1">{{ $staff->nama_lengkap }}</h4>
                    <p class="text-[9px] text-gray-500 font-bold uppercase tracking-wider truncate">{{ $staff->jabatan->nama_jabatan ?? 'Staff' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Educational Units -->
    @foreach($otherUnits as $unit)
    @php $unitStaff = $groupedStaff->get($unit->kode_unit); @endphp
    @if($unitStaff && $unitStaff->count() > 0)
    <div class="mb-14">
        <div class="flex flex-col mb-6" data-aos="fade-right">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 rounded-xl bg-white shadow-sm border border-gray-50 flex items-center justify-center p-1.5 shrink-0">
                    <img src="{{ $unit->getAdminImageUrl($unit->logo) }}" alt="{{ $unit->nama_unit }}" class="w-full h-full object-contain">
                </div>
                <h2 class="text-sm font-bold text-teal-900 uppercase tracking-widest">{{ $unit->nama_unit }}</h2>
            </div>
        </div>
        
        <div class="grid grid-cols-2 gap-4">
            @foreach($unitStaff as $staff)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 flex flex-col group" data-aos="fade-up">
                <div class="aspect-[3/4] w-full bg-gray-100 relative overflow-hidden flex items-center justify-center">
                    @if($staff->foto)
                        <img src="{{ $staff->getAdminImageUrl($staff->foto, 'photos/karyawan') }}" alt="{{ $staff->nama_lengkap }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                        <i class="ti ti-user-circle text-6xl text-gray-300"></i>
                    @endif
                </div>
                <div class="p-4 flex-1 flex flex-col justify-center text-center">
                    <h4 class="text-[11px] font-black text-teal-950 line-clamp-2 leading-snug mb-1">{{ $staff->nama_lengkap }}</h4>
                    <p class="text-[9px] text-gray-500 font-bold uppercase tracking-wider truncate">{{ $staff->jabatan->nama_jabatan ?? 'Guru' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection
