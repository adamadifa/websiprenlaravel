@extends('layouts.dashboard')

@section('title', 'Beranda Calon Santri')

@section('content')
<div class="max-w-7xl mx-auto space-y-7 pb-10">
    
    <!-- Hero Welcoming Section (Deep Emerald with Ambient Lime Glow) -->
    <div class="bg-[#062d27] rounded-3xl overflow-hidden shadow-xl relative border border-emerald-900/60 group">
        <!-- Ambient Decorative Lighting -->
        <div class="absolute -top-24 -right-24 w-80 h-80 bg-[#bef264]/15 rounded-full blur-3xl pointer-events-none group-hover:bg-[#bef264]/20 transition-all duration-700"></div>
        <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-emerald-500/15 rounded-full blur-3xl pointer-events-none"></div>
        
        <!-- Background Overlay Image -->
        @if($pengaturan && $pengaturan->background_login)
            <div class="absolute inset-0 opacity-15 mix-blend-luminosity pointer-events-none">
                <img src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" alt="BG Overlay" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="relative z-10 p-7 sm:p-9 lg:p-10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-7">
            <div class="space-y-3.5 max-w-2xl">
                <div class="inline-flex items-center gap-2.5">
                    <span class="px-3 py-1 bg-white/10 text-[#bef264] text-xs font-bold rounded-xl backdrop-blur-md border border-white/15 font-montserrat">
                        Pendaftaran Santri Baru
                    </span>
                    <span class="text-xs text-emerald-200/80 font-bold font-montserrat">
                        Tahun Ajaran {{ $pendaftaran->tahun_ajaran }}
                    </span>
                </div>
                
                <div class="space-y-1.5">
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white font-montserrat tracking-tight leading-tight">
                        Assalamu'alaikum, <br class="hidden sm:inline">{{ $pendaftaran->nama_lengkap }}
                    </h1>
                    <p class="text-emerald-100/80 text-xs sm:text-sm font-normal leading-relaxed">
                        Anda terdaftar pada jenjang <strong class="text-white font-bold">{{ $pendaftaran->nama_unit ?? 'N/A' }}</strong>. Silakan lengkapi tahapan seleksi di bawah ini untuk menyelesaikan pendaftaran.
                    </p>
                </div>
            </div>
            
            <!-- Quick Stat Badges -->
            <div class="flex flex-col sm:flex-row lg:flex-col gap-3 w-full lg:w-auto min-w-[240px]">
                <div class="p-4 bg-white/10 backdrop-blur-md rounded-2xl border border-white/15 sm:flex-1 lg:flex-none">
                    <p class="text-[11px] font-bold text-emerald-200/70 font-montserrat mb-1">Nomor Registrasi</p>
                    <p class="text-xl font-black text-[#bef264] font-mono leading-none tracking-tight">{{ $pendaftaran->no_register }}</p>
                </div>
                
                <div class="px-4 py-3 bg-white text-[#062d27] rounded-2xl shadow-lg flex items-center gap-3.5 sm:flex-1 lg:flex-none">
                    <div class="w-10 h-10 rounded-xl bg-[#bef264] text-[#062d27] flex items-center justify-center font-bold text-lg shrink-0">
                        <i class="ti ti-school"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-stone-400 uppercase leading-none mb-1 font-montserrat">Unit Madrasah</p>
                        <p class="text-xs font-black text-[#062d27] uppercase leading-none font-montserrat">{{ $pendaftaran->nama_unit ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-7">
        
        <!-- Column 1: Biodata Ringkas -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white border border-stone-200/80 rounded-3xl shadow-2xs overflow-hidden">
                <div class="px-6 py-4.5 bg-[#faf9f6] border-b border-stone-100 flex items-center justify-between">
                    <h3 class="text-xs font-bold text-[#062d27] font-montserrat flex items-center gap-2">
                        <i class="ti ti-id text-base text-emerald-800"></i>
                        <span>Ringkasan Biodata</span>
                    </h3>
                    <span class="text-[10px] font-bold text-emerald-800 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 font-montserrat">
                        Santri Baru
                    </span>
                </div>
                
                <div class="p-6">
                    <div class="flex items-center gap-4 mb-6 pb-6 border-b border-stone-100">
                        <div class="w-16 h-16 bg-[#062d27] rounded-2xl flex items-center justify-center text-[#bef264] border border-emerald-900/30 overflow-hidden shrink-0 shadow-xs">
                            @if($pendaftaran->foto)
                                <img src="{{ asset('storage/' . $pendaftaran->foto) }}" class="w-full h-full object-cover">
                            @else
                                <i class="ti ti-user text-2xl"></i>
                            @endif
                        </div>
                        <div class="min-w-0">
                            <h4 class="text-sm font-bold text-[#062d27] font-montserrat truncate">{{ $pendaftaran->nama_lengkap }}</h4>
                            <p class="text-xs text-stone-500 mt-0.5 font-medium font-mono">{{ $pendaftaran->no_register }}</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-wider mb-0.5 font-montserrat">NISN</span>
                            <span class="text-xs font-bold text-stone-800 font-mono">{{ $pendaftaran->nisn ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-wider mb-0.5 font-montserrat">Jenis Kelamin</span>
                            <span class="text-xs font-bold text-stone-800">{{ $pendaftaran->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-wider mb-0.5 font-montserrat">Asal Sekolah</span>
                            <span class="text-xs font-bold text-stone-800">{{ $pendaftaran->asal_sekolah ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-wider mb-0.5 font-montserrat">Unit Pilihan</span>
                            <span class="text-xs font-bold text-emerald-800 font-montserrat">{{ $pendaftaran->nama_unit ?? 'N/A' }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-wider mb-0.5 font-montserrat">Tempat, Tanggal Lahir</span>
                            <span class="text-xs font-bold text-stone-800">{{ $pendaftaran->tempat_lahir ?? '-' }}, {{ $pendaftaran->tanggal_lahir ? \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->translatedFormat('d F Y') : '-' }}</span>
                        </div>
                    </div>

                    <div class="mt-7 pt-5 border-t border-stone-100">
                        <a href="/biodata" class="flex items-center justify-center gap-2 w-full px-4 py-3 bg-[#062d27] hover:bg-emerald-900 text-white rounded-2xl text-xs font-bold transition-all shadow-xs font-montserrat">
                            <i class="ti ti-edit text-sm text-[#bef264]"></i>
                            <span>Lengkapi Biodata Lengkap</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 2: Tahapan Pendaftaran -->
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white border border-stone-200/80 rounded-3xl shadow-2xs overflow-hidden">
                <div class="px-7 py-5 bg-[#faf9f6] border-b border-stone-100 flex flex-col sm:flex-row justify-between sm:items-center gap-3">
                    <div>
                        <h3 class="text-xs font-bold text-[#062d27] font-montserrat">Tahapan Seleksi & Pendaftaran</h3>
                        <p class="text-[11px] text-stone-500 font-medium mt-0.5">Pantau status berkas dan jadwal ujian Anda di sini</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-black text-[#062d27] font-montserrat bg-[#bef264] px-3 py-1 rounded-full shadow-xs">
                            {{ $progress }}% Selesai
                        </span>
                        <div class="w-28 h-2.5 bg-stone-200/80 rounded-full overflow-hidden p-0.5">
                            <div class="h-full bg-[#062d27] rounded-full transition-all duration-1000" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                </div>

                <div class="p-7 sm:p-8">
                    <div class="space-y-0">
                        @foreach($steps as $key => $step)
                        <div class="flex gap-5 sm:gap-6 {{ !$loop->last ? 'pb-8' : '' }} relative {{ $step['status'] == 'locked' ? 'opacity-45' : '' }}">
                            @if(!$loop->last)
                            <div class="absolute left-[17px] top-[34px] bottom-0 w-0.5 {{ $step['status'] == 'completed' ? 'bg-[#062d27]' : 'bg-stone-200' }}"></div>
                            @endif
                            
                            <div class="relative z-10 shrink-0">
                                @if($step['status'] == 'completed')
                                    <div class="w-9 h-9 bg-[#062d27] text-[#bef264] rounded-2xl flex items-center justify-center font-bold shadow-sm ring-4 ring-white">
                                        <i class="ti ti-check text-base"></i>
                                    </div>
                                @elseif($step['status'] == 'process' || $step['status'] == 'pending')
                                    <div class="w-9 h-9 bg-white border-2 border-[#062d27] rounded-2xl flex items-center justify-center text-[#062d27] shadow-sm ring-4 ring-white">
                                        <span class="w-2.5 h-2.5 bg-[#062d27] rounded-full animate-pulse"></span>
                                    </div>
                                @else
                                    <div class="w-9 h-9 bg-stone-100 border border-stone-200 rounded-2xl flex items-center justify-center text-stone-400 ring-4 ring-white">
                                        <i class="ti ti-{{ $key == 'cetak' ? 'printer' : ($key == 'pembayaran' ? 'credit-card' : 'lock') }} text-sm"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="flex-1 pt-0.5">
                                <div class="flex items-center justify-between gap-2">
                                    <h4 class="text-sm font-bold {{ $step['status'] == 'completed' ? 'text-[#062d27]' : ($step['status'] == 'locked' ? 'text-stone-400' : 'text-stone-900') }} font-montserrat">
                                        {{ $step['title'] }}
                                    </h4>
                                    
                                    @if($step['status'] == 'pending' && $key != 'cetak')
                                        <span class="px-2.5 py-0.5 bg-amber-50 text-amber-700 text-[10px] font-bold rounded-full border border-amber-200 font-montserrat">
                                            Perlu Tindakan
                                        </span>
                                    @elseif($step['status'] == 'process')
                                        <span class="px-2.5 py-0.5 bg-sky-50 text-sky-700 text-[10px] font-bold rounded-full border border-sky-200 font-montserrat">
                                            Proses Verifikasi
                                        </span>
                                    @elseif($step['status'] == 'completed')
                                        <span class="px-2.5 py-0.5 bg-emerald-50 text-emerald-800 text-[10px] font-bold rounded-full border border-emerald-200 font-montserrat flex items-center gap-1">
                                            <i class="ti ti-check text-xs"></i>
                                            <span>Selesai</span>
                                        </span>
                                    @endif
                                </div>

                                <p class="text-xs {{ $step['status'] == 'locked' ? 'text-stone-400' : 'text-stone-500' }} mt-1 leading-relaxed font-normal {{ $step['status'] == 'pending' ? 'mb-3.5' : '' }}">
                                    {{ $step['desc'] }}
                                    @if(isset($step['date']) && $step['status'] == 'completed')
                                        <span class="block text-[11px] text-emerald-800 font-semibold mt-1">
                                            Tercatat pada {{ \Carbon\Carbon::parse($step['date'])->translatedFormat('d F Y') }}
                                        </span>
                                    @endif
                                </p>

                                @if($step['status'] == 'pending')
                                    @php
                                        $link = $key == 'biodata' ? '/biodata' : ($key == 'pembayaran' ? '/pembayaran' : ($key == 'cetak' ? '/biodata/cetak' : '#'));
                                        $btnText = $key == 'biodata' ? 'Lengkapi Data Sekarang' : ($key == 'pembayaran' ? 'Konfirmasi Pembayaran' : ($key == 'cetak' ? 'Cetak Kartu Ujian & Formulir' : 'Lanjutkan'));
                                        $target = $key == 'cetak' ? '_blank' : '_self';
                                    @endphp
                                    <a href="{{ $link }}" target="{{ $target }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] rounded-2xl text-xs font-black transition-all shadow-md shadow-lime-500/20 active:scale-95 font-montserrat">
                                        <span>{{ $btnText }}</span>
                                        <i class="ti ti-{{ $key == 'cetak' ? 'printer' : 'arrow-right' }} text-sm"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Helpdesk Shortcut Banner -->
            <div class="p-6 bg-[#062d27] rounded-3xl flex flex-col sm:flex-row items-center justify-between gap-5 text-white border border-emerald-900/60 shadow-lg relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-[#bef264]/10 rounded-full blur-2xl pointer-events-none"></div>

                <div class="flex items-center gap-4 relative z-10">
                    <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-[#bef264] border border-white/15 shrink-0">
                        <i class="ti ti-headset text-2xl"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white font-montserrat">Butuh Bantuan Pendaftaran SPMB?</h4>
                        <p class="text-xs text-emerald-100/70 font-normal mt-0.5">Panitia siap membantu setiap hari kerja pukul 08.00 - 15.00 WIB.</p>
                    </div>
                </div>
                
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->telepon ?? '') }}?text=Halo%20Panitia%20SPMB,%20saya%20butuh%20bantuan%20seputar%20pendaftaran" 
                    target="_blank"
                    class="px-5 py-3 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] rounded-2xl text-xs font-black transition-all shadow-md shadow-lime-500/20 font-montserrat shrink-0 active:scale-95 inline-flex items-center gap-2 relative z-10">
                    <i class="ti ti-brand-whatsapp text-base"></i>
                    <span>Chat Panitia SPMB</span>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
