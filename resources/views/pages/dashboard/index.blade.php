@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto space-y-8 pb-10">
    
    <!-- Professional Green Header Section -->
    <div class="bg-teal-700 rounded-xl overflow-hidden shadow-lg relative group">
        <!-- Elegant Decorative Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32 blur-3xl group-hover:bg-white/10 transition-all duration-700"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-black/5 rounded-full -ml-24 -mb-24 blur-2xl"></div>
        
        <!-- Subtle Pattern Overlay -->
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#fff 1px, transparent 0); background-size: 24px 24px;"></div>

        <div class="relative z-10 p-8 md:p-10 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="space-y-4 text-center md:text-left">
                <div class="inline-flex items-center gap-3">
                    <span class="px-2.5 py-1 bg-white/10 text-white text-[10px] font-bold uppercase tracking-wider rounded backdrop-blur-sm border border-white/20">Pendaftaran Aktif</span>
                    <div class="h-4 w-px bg-white/20"></div>
                    <span class="text-[11px] text-teal-100 font-bold uppercase tracking-wider">{{ $pendaftaran->tahun_ajaran }}</span>
                </div>
                
                <div class="space-y-1">
                    <h1 class="text-2xl md:text-4xl font-extrabold text-white tracking-tight">Selamat Datang, {{ $pendaftaran->nama_lengkap }}</h1>
                    <p class="text-teal-50 text-sm md:text-base opacity-80 font-medium">Anda terdaftar pada jenjang <span class="text-white font-bold">{{ $pendaftaran->nama_unit ?? 'N/A' }}</span> untuk periode pendaftaran tahun ini.</p>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row md:flex-col gap-3 min-w-[220px]">
                <div class="p-4 bg-white/10 backdrop-blur-md rounded-lg border border-white/10 text-center sm:flex-1 md:flex-none">
                    <p class="text-[10px] font-bold text-teal-100 uppercase tracking-wider mb-1">Nomor Registrasi</p>
                    <p class="text-xl font-bold text-white font-mono leading-none tracking-tighter">{{ $pendaftaran->no_register }}</p>
                </div>
                <div class="px-4 py-3 bg-white text-teal-700 rounded-lg shadow-xl flex items-center justify-center gap-3 sm:flex-1 md:flex-none hover:bg-teal-50 transition-colors">
                    <i class="ti ti-school text-xl"></i>
                    <div class="text-left">
                        <p class="text-[9px] font-bold text-teal-600/50 uppercase leading-none mb-1">Unit Sekolah</p>
                        <p class="text-[12px] font-black uppercase leading-none tracking-tight">{{ $pendaftaran->nama_unit ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Column 1: Biodata Ringkas -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-xs font-bold text-gray-700 uppercase tracking-wider">Ringkasan Biodata</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-16 h-16 bg-gray-50 rounded-lg flex items-center justify-center text-gray-400 border border-gray-100 overflow-hidden shrink-0">
                            @if($pendaftaran->foto)
                                <img src="{{ asset('storage/' . $pendaftaran->foto) }}" class="w-full h-full object-cover">
                            @else
                                <i class="ti ti-user text-3xl"></i>
                            @endif
                        </div>
                        <div class="min-w-0">
                            <h4 class="text-sm font-bold text-gray-900 truncate">{{ $pendaftaran->nama_lengkap }}</h4>
                            <p class="text-[11px] text-gray-500 mt-0.5">Calon Santri Baru</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">NISN</span>
                            <span class="text-sm font-semibold text-gray-800">{{ $pendaftaran->nisn ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Jenis Kelamin</span>
                            <span class="text-sm font-semibold text-gray-800">{{ $pendaftaran->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Asal Sekolah</span>
                            <span class="text-sm font-semibold text-gray-800">{{ $pendaftaran->asal_sekolah ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Unit Sekolah</span>
                            <span class="text-sm font-semibold text-gray-800">{{ $pendaftaran->nama_unit ?? 'N/A' }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Tempat, Tanggal Lahir</span>
                            <span class="text-sm font-semibold text-gray-800">{{ $pendaftaran->tempat_lahir }}, {{ $pendaftaran->tanggal_lahir ? \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->translatedFormat('d M Y') : '-' }}</span>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <a href="/biodata" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-xs font-bold text-gray-700 hover:bg-gray-50 transition-colors">
                            <i class="ti ti-edit-circle text-base"></i>
                            Perbarui Data Lengkap
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 2: Progress Pendaftaran -->
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-xs font-bold text-gray-700 uppercase tracking-wider">Tahapan Pendaftaran</h3>
                    <div class="flex items-center gap-3">
                        <span class="text-[11px] font-bold text-teal-600">{{ $progress }}% Selesai</span>
                        <div class="w-24 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-teal-500 transition-all duration-1000" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="space-y-0">
                        @foreach($steps as $key => $step)
                        <div class="flex gap-6 {{ !$loop->last ? 'pb-10' : '' }} relative {{ $step['status'] == 'locked' ? 'opacity-50' : '' }}">
                            @if(!$loop->last)
                            <div class="absolute left-[15px] top-[30px] bottom-0 w-px {{ $step['status'] == 'completed' ? 'bg-teal-100' : 'bg-gray-100' }}"></div>
                            @endif
                            
                            <div class="relative z-10">
                                @if($step['status'] == 'completed')
                                    <div class="w-8 h-8 bg-teal-600 rounded-full flex items-center justify-center text-white ring-4 ring-white shadow-sm">
                                        <i class="ti ti-check text-sm"></i>
                                    </div>
                                @elseif($step['status'] == 'process' || $step['status'] == 'pending')
                                    <div class="w-8 h-8 bg-white border-2 border-teal-600 rounded-full flex items-center justify-center text-teal-600 ring-4 ring-white shadow-sm">
                                        <span class="w-2 h-2 bg-teal-600 rounded-full animate-pulse"></span>
                                    </div>
                                @else
                                    <div class="w-8 h-8 bg-gray-50 border border-gray-200 rounded-full flex items-center justify-center text-gray-400 ring-4 ring-white">
                                        <i class="ti ti-{{ $key == 'cetak' ? 'printer' : ($key == 'pembayaran' ? 'credit-card' : 'lock') }} text-xs"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="flex-1 pt-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-sm font-bold {{ $step['status'] == 'completed' ? 'text-teal-900' : ($step['status'] == 'locked' ? 'text-gray-400' : 'text-gray-900') }} uppercase tracking-tight">
                                        {{ $step['title'] }}
                                    </h4>
                                    @if($step['status'] == 'pending' && $key != 'cetak')
                                        <span class="px-1.5 py-0.5 bg-amber-50 text-amber-600 text-[9px] font-bold rounded border border-amber-100 uppercase">Perlu Tindakan</span>
                                    @elseif($step['status'] == 'process')
                                        <span class="px-1.5 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-bold rounded border border-blue-100 uppercase">Proses</span>
                                    @elseif($step['status'] == 'completed')
                                        <span class="px-1.5 py-0.5 bg-teal-50 text-teal-600 text-[9px] font-bold rounded border border-teal-100 uppercase">Selesai</span>
                                    @endif
                                </div>
                                <p class="text-[12px] {{ $step['status'] == 'locked' ? 'text-gray-400' : 'text-gray-500' }} mt-1 {{ $step['status'] == 'pending' ? 'mb-4' : '' }}">
                                    {{ $step['desc'] }}
                                    @if(isset($step['date']) && $step['status'] == 'completed')
                                        <span class="block text-[10px] text-teal-600 mt-0.5">{{ \Carbon\Carbon::parse($step['date'])->translatedFormat('d M Y') }}</span>
                                    @endif
                                </p>

                                @if($step['status'] == 'pending')
                                    @php
                                        $link = $key == 'biodata' ? '/biodata' : ($key == 'pembayaran' ? '/pembayaran' : ($key == 'cetak' ? '/biodata/cetak' : '#'));
                                        $btnText = $key == 'biodata' ? 'Lengkapi Data' : ($key == 'pembayaran' ? 'Bayar Sekarang' : ($key == 'cetak' ? 'Cetak Formulir' : 'Lanjutkan'));
                                        $target = $key == 'cetak' ? '_blank' : '_self';
                                    @endphp
                                    <a href="{{ $link }}" target="{{ $target }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-teal-600 text-white rounded-lg text-xs font-bold hover:bg-teal-700 transition-all shadow-md shadow-teal-600/20">
                                        {{ $btnText }}
                                        <i class="ti ti-{{ $key == 'cetak' ? 'printer' : 'chevron-right' }} text-sm"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Help Box -->
            <div class="p-6 bg-slate-900 rounded-xl flex flex-col sm:flex-row items-center justify-between gap-4 text-white">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center text-teal-400">
                        <i class="ti ti-message-dots text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[13px] font-bold tracking-tight">Butuh Bantuan Teknis?</p>
                        <p class="text-[11px] text-slate-400">Tim IT Al Amin siap membantu proses pendaftaran Anda.</p>
                    </div>
                </div>
                <a href="#" class="px-6 py-2.5 bg-white text-slate-900 rounded-lg text-xs font-bold hover:bg-teal-50 transition-colors">
                    Hubungi Admin
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
