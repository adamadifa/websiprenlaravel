@extends('layouts.mobile')

@section('title', 'Guru & Tendik - ' . ($pengaturan->nama_sekolah ?? 'Al Amin'))
@section('meta_description', 'Profil jajaran pendidik dan tenaga kependidikan berdedikasi tinggi di Pesantren Persatuan Islam 80 Al Amin.')

@section('content')
<!-- Hero Section -->
<div class="bg-[#062d27] pt-6 pb-10 px-5 relative overflow-hidden text-white border-b border-emerald-900/60">
    <div class="relative z-10" data-aos="fade-down">
        <div class="flex items-center gap-2 text-[10px] text-emerald-300 font-bold uppercase tracking-wider mb-2 font-poppins">
            Struktur & Tenaga Pendidik
        </div>
        <h1 class="text-2xl font-black text-white leading-tight mb-2 font-poppins">
            Guru & <span class="text-[#bef264]">Tendik</span>
        </h1>
        <p class="text-xs text-emerald-100/80 font-normal leading-relaxed">
            Profil keluarga besar pendidik dan tenaga kependidikan {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}.
        </p>
    </div>
</div>

<div class="px-5 pt-6 pb-24 bg-[#faf9f6] min-h-screen">

    <!-- Pimpinan Utama (Executive Prestige Mobile Card) -->
    @if($pimpinanUtama)
    <div class="mb-12" data-aos="fade-up">
        <div class="flex items-center justify-between mb-4">
            <div>
                <span class="text-[10px] text-emerald-800 font-bold uppercase tracking-wider font-poppins block">Struktur Tertinggi</span>
                <h2 class="text-base font-black text-gray-900 font-poppins">Pimpinan Pesantren</h2>
            </div>
            <div class="w-9 h-9 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-800">
                <i class="ti ti-crown text-lg"></i>
            </div>
        </div>

        <div class="bg-white rounded-3xl overflow-hidden border border-stone-200/90 shadow-md flex flex-col">
            <!-- Portrait Photo with Badge -->
            <div class="relative aspect-[4/3] overflow-hidden bg-stone-100">
                @if($pimpinanUtama->foto)
                    <img src="{{ $pimpinanUtama->getAdminImageUrl($pimpinanUtama->foto, 'photos/karyawan') }}" alt="{{ $pimpinanUtama->nama_lengkap }}" class="w-full h-full object-cover object-top">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center bg-emerald-950 text-emerald-300/40 p-4">
                        <i class="ti ti-user-circle text-6xl mb-1"></i>
                    </div>
                @endif
                <div class="absolute top-3 left-3 z-10">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#062d27]/85 backdrop-blur-md text-[#bef264] text-[10px] font-extrabold uppercase font-poppins border border-emerald-500/30">
                        <i class="ti ti-crown text-xs"></i>
                        Pimpinan Utama
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-5 bg-white">
                <h3 class="text-lg font-black text-gray-900 font-poppins mb-1 leading-snug">{{ $pimpinanUtama->nama_lengkap }}</h3>
                <p class="text-xs text-emerald-800 font-bold uppercase tracking-wider font-poppins mb-3">{{ $pimpinanUtama->jabatan->nama_jabatan ?? 'Pimpinan Pesantren' }}</p>
                
                <div class="w-full flex items-center justify-between py-2 px-3 bg-[#faf9f6] rounded-xl border border-stone-200/60 text-xs font-poppins">
                    <span class="text-gray-500 font-medium">NPP: <strong class="text-gray-800 font-bold">{{ $pimpinanUtama->npp }}</strong></span>
                    <span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-800">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Staff Pesantren -->
    @if($staffPesantren->count() > 0)
    <div class="mb-12" data-aos="fade-up">
        <div class="flex items-center justify-between gap-3 mb-4 pb-2 border-b border-stone-200">
            <h2 class="text-sm font-bold text-gray-900 uppercase tracking-wider font-poppins">Pesantren Al Amin</h2>
            <span class="text-[10px] font-bold text-emerald-800 bg-emerald-50 px-2.5 py-0.5 rounded-full font-poppins">{{ $staffPesantren->count() }} Personel</span>
        </div>
        
        <div class="grid grid-cols-2 gap-3.5">
            @foreach($staffPesantren as $staff)
            <div class="bg-white rounded-2xl overflow-hidden border border-stone-200/80 shadow-xs flex flex-col">
                <!-- Portrait Photo Box -->
                <div class="relative aspect-[4/5] overflow-hidden bg-stone-100">
                    @if($staff->foto)
                        <img src="{{ $staff->getAdminImageUrl($staff->foto, 'photos/karyawan') }}" alt="{{ $staff->nama_lengkap }}" class="w-full h-full object-cover object-top" loading="lazy">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-stone-100 text-stone-300">
                            <i class="ti ti-user-circle text-5xl"></i>
                        </div>
                    @endif
                    <div class="absolute inset-x-0 bottom-0 h-14 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <div class="absolute bottom-2 left-2 right-2 pointer-events-none">
                        <span class="inline-block max-w-full truncate px-2 py-0.5 rounded bg-black/50 backdrop-blur-md text-white text-[9px] font-semibold font-poppins">
                            {{ $staff->jabatan->nama_jabatan ?? 'Staff' }}
                        </span>
                    </div>
                </div>

                <div class="p-3 flex flex-col flex-1 bg-white">
                    <h4 class="text-xs font-bold font-poppins text-gray-900 leading-snug line-clamp-2 mb-1.5 min-h-[2rem] flex items-center">
                        {{ $staff->nama_lengkap }}
                    </h4>
                    <div class="mt-auto pt-1.5 border-t border-stone-100 flex items-center justify-between text-[9px] text-gray-400 font-poppins">
                        <span>NPP: <strong class="text-gray-700 font-semibold">{{ $staff->npp }}</strong></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Educational Units -->
    @foreach($otherUnits as $unit)
    @php $unitStaff = $groupedStaff->get($unit->kode_unit); @endphp
    @if($unitStaff && $unitStaff->count() > 0)
    <div class="mb-12" data-aos="fade-up">
        <div class="flex items-center justify-between gap-3 mb-4 pb-2 border-b border-stone-200">
            <div class="flex items-center gap-2">
                @if($unit->logo)
                    <div class="w-6 h-6 rounded-md bg-white border border-stone-200 p-0.5 flex items-center justify-center shrink-0">
                        <img src="{{ $unit->getAdminImageUrl($unit->logo) }}" alt="{{ $unit->nama_unit }}" class="w-full h-full object-contain">
                    </div>
                @endif
                <h2 class="text-sm font-bold text-gray-900 uppercase tracking-wider font-poppins">{{ $unit->nama_unit }}</h2>
            </div>
            <span class="text-[10px] font-bold text-emerald-800 bg-emerald-50 px-2.5 py-0.5 rounded-full font-poppins">{{ $unitStaff->count() }} Guru</span>
        </div>
        
        <div class="grid grid-cols-2 gap-3.5">
            @foreach($unitStaff as $staff)
            <div class="bg-white rounded-2xl overflow-hidden border border-stone-200/80 shadow-xs flex flex-col">
                <!-- Portrait Photo Box -->
                <div class="relative aspect-[4/5] overflow-hidden bg-stone-100">
                    @if($staff->foto)
                        <img src="{{ $staff->getAdminImageUrl($staff->foto, 'photos/karyawan') }}" alt="{{ $staff->nama_lengkap }}" class="w-full h-full object-cover object-top" loading="lazy">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-stone-100 text-stone-300">
                            <i class="ti ti-user-circle text-5xl"></i>
                        </div>
                    @endif
                    <div class="absolute inset-x-0 bottom-0 h-14 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                    <div class="absolute bottom-2 left-2 right-2 pointer-events-none">
                        <span class="inline-block max-w-full truncate px-2 py-0.5 rounded bg-black/50 backdrop-blur-md text-white text-[9px] font-semibold font-poppins">
                            {{ $staff->jabatan->nama_jabatan ?? 'Guru' }}
                        </span>
                    </div>
                </div>

                <div class="p-3 flex flex-col flex-1 bg-white">
                    <h4 class="text-xs font-bold font-poppins text-gray-900 leading-snug line-clamp-2 mb-1.5 min-h-[2rem] flex items-center">
                        {{ $staff->nama_lengkap }}
                    </h4>
                    <div class="mt-auto pt-1.5 border-t border-stone-100 flex items-center justify-between text-[9px] text-gray-400 font-poppins">
                        <span>NPP: <strong class="text-gray-700 font-semibold">{{ $staff->npp }}</strong></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    @endforeach

</div>
@endsection
