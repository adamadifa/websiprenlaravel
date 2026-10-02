@extends('layouts.mobile')

@section('title', 'Beranda Santri')

@section('content')
<div class="min-h-[100dvh] bg-[#faf9f6] flex flex-col font-sans selection:bg-[#bef264] selection:text-[#062d27] pb-28">
    
    <!-- TOP SECTION: Profile Header (Deep Emerald) -->
    <div class="bg-[#062d27] pt-7 pb-16 px-5 relative overflow-hidden border-b border-emerald-900/60">
        <!-- Ambient Decorative Lighting -->
        <div class="absolute -top-16 -right-16 w-56 h-56 bg-[#bef264]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 -left-16 w-48 h-48 bg-emerald-500/15 rounded-full blur-2xl pointer-events-none"></div>
        
        <!-- Background Overlay Image -->
        @if($pengaturan && $pengaturan->background_login)
            <div class="absolute inset-0 opacity-15 mix-blend-luminosity pointer-events-none">
                <img src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" alt="BG Overlay" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="relative z-10">
            <!-- App Logo & Top Action -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center p-1.5 border border-white/20 shadow-lg shrink-0">
                        @php
                            $logoUrl = optional($pengaturan)->logo 
                                ? $pengaturan->getAdminImageUrl($pengaturan->logo)
                                : asset('assets/img/logo/persisalamin.png');
                        @endphp
                        <img src="{{ $logoUrl }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h2 class="text-white text-xs font-bold font-montserrat leading-tight">{{ $pengaturan->nama_sekolah ?? 'Pesantren Al Amin' }}</h2>
                        <p class="text-[#bef264] text-[10px] font-bold font-montserrat mt-0.5">Portal SPMB Online</p>
                    </div>
                </div>
                
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button type="submit" class="w-9 h-9 bg-white/10 hover:bg-white/15 border border-white/15 rounded-2xl flex items-center justify-center text-emerald-100 active:scale-90 transition-all">
                        <i class="ti ti-logout text-base"></i>
                    </button>
                </form>
            </div>

            <!-- User Greeting -->
            <div class="flex items-center gap-3.5 mb-5">
                <div class="w-12 h-12 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 p-1 shrink-0">
                    @if($pendaftaran->foto)
                        <img src="{{ asset('storage/' . $pendaftaran->foto) }}" class="w-full h-full object-cover rounded-xl shadow-md">
                    @else
                        <div class="w-full h-full bg-[#062d27] rounded-xl flex items-center justify-center text-[#bef264] font-bold text-sm font-montserrat">
                            {{ substr($pendaftaran->nama_lengkap, 0, 2) }}
                        </div>
                    @endif
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-emerald-200/80 text-[10px] font-bold uppercase tracking-wider mb-0.5 font-montserrat">Assalamu'alaikum,</p>
                    <h1 class="text-white text-base font-black leading-tight tracking-tight truncate font-montserrat">
                        {{ $pendaftaran->nama_lengkap }}
                    </h1>
                </div>
            </div>

            <!-- Registration Card -->
            <div class="bg-white rounded-3xl p-4.5 shadow-xl border border-stone-200/80 relative overflow-hidden">
                <div class="flex justify-between items-start mb-3.5">
                    <div>
                        <p class="text-stone-400 text-[10px] font-bold uppercase tracking-wider mb-0.5 font-montserrat">No. Registrasi</p>
                        <p class="text-lg font-black text-[#062d27] font-mono tracking-tight">{{ $pendaftaran->no_register }}</p>
                    </div>
                    <div class="px-2.5 py-1 bg-emerald-50 text-emerald-900 rounded-xl border border-emerald-200/60 font-montserrat font-bold text-[10px] uppercase">
                        {{ $pendaftaran->nama_unit ?? 'Unit' }}
                    </div>
                </div>

                <!-- Progress Section -->
                <div class="space-y-1.5 pt-1 border-t border-stone-100">
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-stone-500 font-semibold text-[11px]">Kelengkapan Berkas</span>
                        <span class="text-[#062d27] font-black font-montserrat bg-[#bef264] px-2 py-0.5 rounded-full text-[10px]">{{ $progress }}% Selesai</span>
                    </div>
                    <div class="h-2 bg-stone-100 rounded-full overflow-hidden p-0.5">
                        <div class="h-full bg-[#062d27] rounded-full transition-all duration-1000" style="width: {{ $progress }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN SECTION: Steps & Timeline -->
    <div class="flex-1 -mt-8 px-5 relative z-20">
        <div class="bg-white rounded-3xl p-5 shadow-sm border border-stone-200/80 mb-5">
            <h3 class="text-[#062d27] text-xs font-bold uppercase tracking-wider mb-5 flex items-center gap-2 font-montserrat">
                <i class="ti ti-timeline text-emerald-800 text-base"></i>
                <span>Tahapan Pendaftaran</span>
            </h3>

            <div class="space-y-6">
                @foreach($steps as $key => $step)
                <div class="flex gap-3.5 relative {{ $step['status'] == 'locked' ? 'opacity-40' : '' }}">
                    @if(!$loop->last)
                    <div class="absolute left-[15px] top-[30px] bottom-[-24px] w-0.5 {{ $step['status'] == 'completed' ? 'bg-[#062d27]' : 'bg-stone-200' }}"></div>
                    @endif

                    <!-- Icon / Circle -->
                    <div class="relative z-10 shrink-0">
                        @if($step['status'] == 'completed')
                            <div class="w-8 h-8 bg-[#062d27] text-[#bef264] rounded-xl flex items-center justify-center shadow-xs">
                                <i class="ti ti-check text-sm font-bold"></i>
                            </div>
                        @elseif($step['status'] == 'process' || $step['status'] == 'pending')
                            <div class="w-8 h-8 bg-white border-2 border-[#062d27] rounded-xl flex items-center justify-center text-[#062d27]">
                                <div class="w-2 h-2 bg-[#062d27] rounded-full animate-pulse"></div>
                            </div>
                        @else
                            <div class="w-8 h-8 bg-stone-100 border border-stone-200 rounded-xl flex items-center justify-center text-stone-400">
                                <i class="ti ti-lock text-xs"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-start gap-1 mb-0.5">
                            <h4 class="text-xs font-bold {{ $step['status'] == 'completed' ? 'text-[#062d27]' : 'text-stone-800' }} font-montserrat">
                                {{ $step['title'] }}
                            </h4>
                            @if($step['status'] == 'pending' && $key != 'cetak')
                                <span class="px-2 py-0.5 bg-amber-50 text-amber-700 text-[9px] font-bold rounded-full border border-amber-200 font-montserrat shrink-0">Perlu Aksi</span>
                            @elseif($step['status'] == 'process')
                                <span class="px-2 py-0.5 bg-sky-50 text-sky-700 text-[9px] font-bold rounded-full border border-sky-200 font-montserrat shrink-0">Proses</span>
                            @elseif($step['status'] == 'completed')
                                <span class="px-2 py-0.5 bg-emerald-50 text-emerald-800 text-[9px] font-bold rounded-full border border-emerald-200 font-montserrat shrink-0">Selesai</span>
                            @endif
                        </div>
                        <p class="text-[11px] leading-relaxed {{ $step['status'] == 'locked' ? 'text-stone-400' : 'text-stone-500' }} font-normal">
                            {{ $step['desc'] }}
                        </p>
                        
                        @if($step['status'] == 'completed' && isset($step['date']))
                            <p class="text-[10px] text-emerald-800 font-bold mt-1">Selesai pada {{ \Carbon\Carbon::parse($step['date'])->translatedFormat('d M Y') }}</p>
                        @endif

                        @if($step['status'] == 'pending')
                            @php
                                $link = $key == 'biodata' ? '/biodata' : ($key == 'pembayaran' ? '/pembayaran' : ($key == 'cetak' ? '/biodata/cetak' : '#'));
                                $btnText = $key == 'biodata' ? 'Lengkapi Data' : ($key == 'pembayaran' ? 'Konfirmasi Bayar' : ($key == 'cetak' ? 'Cetak Formulir' : 'Lanjutkan'));
                                $icon = $key == 'cetak' ? 'printer' : 'arrow-right';
                                $target = $key == 'cetak' ? '_blank' : '_self';
                            @endphp
                            <div class="mt-2.5">
                                <a href="{{ $link }}" target="{{ $target }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#bef264] active:bg-[#a3e635] text-[#062d27] rounded-xl text-[11px] font-black shadow-md shadow-lime-500/20 active:scale-95 transition-all font-montserrat">
                                    <span>{{ $btnText }}</span>
                                    <i class="ti ti-{{ $icon }} text-xs"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Help Section -->
        <div class="bg-[#062d27] rounded-3xl p-5 text-white relative overflow-hidden mb-4 border border-emerald-900/60 shadow-md">
            <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-[#bef264]/10 rounded-full blur-2xl pointer-events-none"></div>
            
            <div class="relative z-10 flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/10 rounded-2xl flex items-center justify-center text-[#bef264] border border-white/15 shrink-0">
                        <i class="ti ti-headset text-xl"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold font-montserrat">Butuh Bantuan Panitia?</p>
                        <p class="text-[10px] text-emerald-100/70">Hubungi panitia via WhatsApp</p>
                    </div>
                </div>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->telepon ?? '') }}?text=Halo%20Panitia%20SPMB,%20saya%20butuh%20bantuan%20pendaftaran" 
                    target="_blank"
                    class="w-9 h-9 bg-[#bef264] active:bg-[#a3e635] rounded-xl flex items-center justify-center text-[#062d27] active:scale-90 transition-all shrink-0 font-bold">
                    <i class="ti ti-brand-whatsapp text-lg"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- BOTTOM NAVIGATION (Emerald & Lime theme) -->
    <div class="fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-2xl border-t border-stone-200/70 shadow-[0_-15px_40px_rgba(0,0,0,0.04)] z-50 px-3 pb-[env(safe-area-inset-bottom,12px)] pt-2.5">
        <div class="flex items-center justify-around">
            <!-- Active Item: Dashboard -->
            <a href="/dashboard" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center shadow-xs transition-transform group-active:scale-90">
                    <i class="ti ti-smart-home text-lg"></i>
                </div>
                <span class="text-[10px] font-bold text-[#062d27] font-montserrat mt-1">Beranda</span>
            </a>
            
            <!-- Inactive Item: Biodata -->
            <a href="/biodata" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl text-stone-400 group-hover:text-[#062d27] flex items-center justify-center transition-transform group-active:scale-90">
                    <i class="ti ti-file-text text-lg"></i>
                </div>
                <span class="text-[10px] font-semibold text-stone-400 group-hover:text-[#062d27] font-montserrat mt-1">Biodata</span>
            </a>

            <!-- Inactive Item: Pembayaran -->
            <a href="/pembayaran" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl text-stone-400 group-hover:text-[#062d27] flex items-center justify-center transition-transform group-active:scale-90">
                    <i class="ti ti-credit-card text-lg"></i>
                </div>
                <span class="text-[10px] font-semibold text-stone-400 group-hover:text-[#062d27] font-montserrat mt-1">Bayar</span>
            </a>

            <!-- Inactive Item: Akun -->
            <a href="/password" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl text-stone-400 group-hover:text-[#062d27] flex items-center justify-center transition-transform group-active:scale-90">
                    <i class="ti ti-lock text-lg"></i>
                </div>
                <span class="text-[10px] font-semibold text-stone-400 group-hover:text-[#062d27] font-montserrat mt-1">Akun</span>
            </a>
        </div>
    </div>

</div>
@endsection
