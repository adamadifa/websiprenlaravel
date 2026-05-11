@extends('layouts.mobile')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-[100dvh] bg-slate-50 flex flex-col font-sans selection:bg-teal-100 pb-24">
    
    <!-- TOP SECTION: Profile Header -->
    <div class="bg-teal-900 pt-8 pb-20 px-6 relative overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-500 rounded-full blur-[80px] opacity-20 -translate-y-1/2 translate-x-1/4"></div>
        
        <!-- Background Image Overlay from Settings -->
        @if($pengaturan && $pengaturan->background_login)
            <div class="absolute inset-0 opacity-10 mix-blend-overlay">
                <img src="{{ config('app.admin_url') . '/storage/' . $pengaturan->background_login }}" alt="BG Overlay" class="w-full h-full object-cover">
            </div>
        @endif
        
        <div class="absolute inset-0 opacity-[0.05]" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>

        <div class="relative z-10">
            <!-- App Logo & Top Action -->
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white rounded-xl shadow-lg shadow-teal-950/50 flex items-center justify-center p-1.5 border border-white/10">
                        @php
                            $logoUrl = optional($pengaturan)->logo 
                                ? config('app.admin_url') . '/storage/' . $pengaturan->logo 
                                : asset('assets/img/logo/persisalamin.png');
                        @endphp
                        <img src="{{ $logoUrl }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h2 class="text-white text-sm font-black tracking-tight leading-none">Pesantren Al Amin</h2>
                        <p class="text-teal-200/80 text-[11px] font-medium mt-0.5">Sistem Pendaftaran</p>
                    </div>
                </div>
                
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button type="submit" class="w-9 h-9 bg-rose-500/20 backdrop-blur-md border border-rose-500/30 rounded-xl flex items-center justify-center text-rose-200 active:scale-95 transition-all">
                        <i class="ti ti-logout text-lg"></i>
                    </button>
                </form>
            </div>

            <!-- User Profile -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-white/10 backdrop-blur-md rounded-xl border border-white/20 p-1">
                        @if($pendaftaran->foto)
                            <img src="{{ asset('storage/' . $pendaftaran->foto) }}" class="w-full h-full object-cover rounded-lg shadow-lg">
                        @else
                            <div class="w-full h-full bg-teal-800 rounded-lg flex items-center justify-center text-teal-100">
                                <i class="ti ti-user text-2xl"></i>
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-teal-200 text-[10px] font-bold uppercase tracking-wider mb-0.5">Assalamu'alaikum,</p>
                        <h1 class="text-white text-lg font-black leading-none tracking-tight truncate max-w-[180px]">
                            {{ explode(' ', $pendaftaran->nama_lengkap)[0] }}
                        </h1>
                    </div>
                </div>
            </div>

            <!-- Registration Card -->
            <div class="bg-white rounded-2xl p-5 shadow-2xl shadow-teal-950/40 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-5">
                    <i class="ti ti-id-badge-2 text-6xl text-teal-900"></i>
                </div>
                
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 text-[11px] font-medium mb-1">No. Registrasi</p>
                        <p class="text-xl font-black text-slate-800 font-mono tracking-tighter">{{ $pendaftaran->no_register }}</p>
                    </div>
                    <div class="px-3 py-1 bg-teal-50 text-teal-700 rounded-lg border border-teal-100">
                        <p class="text-[10px] font-black uppercase">{{ $pendaftaran->nama_unit }}</p>
                    </div>
                </div>

                <!-- Progress Section -->
                <div class="space-y-2">
                    <div class="flex justify-between items-end">
                        <p class="text-slate-500 text-[11px] font-bold">Progress Pendaftaran</p>
                        <p class="text-teal-600 text-sm font-black">{{ $progress }}%</p>
                    </div>
                    <div class="h-2.5 bg-slate-100 rounded-full overflow-hidden p-0.5">
                        <div class="h-full bg-teal-500 rounded-full transition-all duration-1000 shadow-sm" style="width: {{ $progress }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN SECTION: Steps & Timeline -->
    <div class="flex-1 -mt-10 px-6 relative z-20">
        <div class="bg-white rounded-2xl p-6 shadow-xl border border-slate-100 mb-6">
            <h3 class="text-slate-800 text-sm font-black uppercase tracking-wider mb-6 flex items-center gap-2">
                <i class="ti ti-timeline text-teal-600 text-xl"></i>
                Tahapan Pendaftaran
            </h3>

            <div class="space-y-8">
                @foreach($steps as $key => $step)
                <div class="flex gap-4 relative {{ $step['status'] == 'locked' ? 'opacity-40' : '' }}">
                    @if(!$loop->last)
                    <div class="absolute left-[15px] top-[32px] bottom-[-32px] w-0.5 {{ $step['status'] == 'completed' ? 'bg-teal-500' : 'bg-slate-100' }}"></div>
                    @endif

                    <!-- Icon / Circle -->
                    <div class="relative z-10">
                        @if($step['status'] == 'completed')
                            <div class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center text-white shadow-lg shadow-teal-500/30">
                                <i class="ti ti-check text-base"></i>
                            </div>
                        @elseif($step['status'] == 'process' || $step['status'] == 'pending')
                            <div class="w-8 h-8 bg-white border-2 border-teal-500 rounded-full flex items-center justify-center text-teal-500">
                                <div class="w-2 h-2 bg-teal-500 rounded-full animate-pulse"></div>
                            </div>
                        @else
                            <div class="w-8 h-8 bg-slate-50 border border-slate-200 rounded-full flex items-center justify-center text-slate-400">
                                <i class="ti ti-lock text-xs"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h4 class="text-[13px] font-black {{ $step['status'] == 'completed' ? 'text-teal-700' : 'text-slate-800' }}">
                                {{ $step['title'] }}
                            </h4>
                            @if($step['status'] == 'pending' && $key != 'cetak')
                                <span class="px-2 py-0.5 bg-amber-50 text-amber-600 text-[9px] font-black rounded uppercase border border-amber-100">Penting</span>
                            @endif
                        </div>
                        <p class="text-[11px] leading-relaxed {{ $step['status'] == 'locked' ? 'text-slate-400' : 'text-slate-500' }} font-medium">
                            {{ $step['desc'] }}
                        </p>
                        
                        @if($step['status'] == 'completed' && isset($step['date']))
                            <p class="text-[10px] text-teal-600 font-bold mt-1">Selesai pada {{ \Carbon\Carbon::parse($step['date'])->translatedFormat('d M Y') }}</p>
                        @endif

                        @if($step['status'] == 'pending')
                            @php
                                $link = $key == 'biodata' ? '/biodata' : ($key == 'pembayaran' ? '/pembayaran' : ($key == 'cetak' ? '/biodata/cetak' : '#'));
                                $btnText = $key == 'biodata' ? 'Lengkapi Data' : ($key == 'pembayaran' ? 'Upload Bukti' : ($key == 'cetak' ? 'Cetak Sekarang' : 'Lanjutkan'));
                                $icon = $key == 'cetak' ? 'printer' : 'chevron-right';
                            @endphp
                            <div class="mt-3">
                                <a href="{{ $link }}" class="inline-flex items-center gap-2 px-4 py-2 bg-teal-600 text-white rounded-xl text-[11px] font-black shadow-lg shadow-teal-600/20 active:scale-95 transition-all">
                                    {{ $btnText }}
                                    <i class="ti ti-{{ $icon }} text-sm"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Help Section -->
        <div class="bg-slate-900 rounded-2xl p-6 text-white relative overflow-hidden mb-6">
            <div class="absolute bottom-0 right-0 p-4 opacity-10">
                <i class="ti ti-headset text-7xl"></i>
            </div>
            <div class="relative z-10 flex items-center gap-4">
                <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-teal-400 border border-white/10">
                    <i class="ti ti-headphones text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm font-black mb-0.5">Butuh Bantuan?</p>
                    <p class="text-[11px] text-slate-400 font-medium">Hubungi Panitia PPDB via WhatsApp</p>
                </div>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->no_wa ?? '') }}" class="ml-auto w-10 h-10 bg-teal-500 rounded-xl flex items-center justify-center text-white active:scale-95 transition-all">
                    <i class="ti ti-brand-whatsapp text-2xl"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- BOTTOM NAVIGATION (Full Width Modern) -->
    <div class="fixed bottom-0 left-0 right-0 bg-white/90 backdrop-blur-2xl border-t border-slate-200/60 shadow-[0_-15px_40px_rgba(0,0,0,0.03)] z-50 px-2 pb-[env(safe-area-inset-bottom,16px)] pt-3">
        <div class="flex items-center justify-around pb-2">
            <!-- Active Item: Dashboard -->
            <a href="/dashboard" class="group flex flex-col items-center relative w-16">
                <div class="absolute -top-4 w-12 h-1 bg-teal-500 rounded-b-lg"></div>
                <div class="text-teal-600 transition-transform group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-smart-home text-[26px]"></i>
                </div>
                <span class="text-[10px] font-black text-teal-600 tracking-wide mt-1">Beranda</span>
            </a>
            
            <!-- Inactive Item: Biodata -->
            <a href="/biodata" class="group flex flex-col items-center w-16">
                <div class="text-slate-400 group-hover:text-teal-500 transition-all group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-user-edit text-[24px]"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 group-hover:text-teal-500 transition-colors tracking-wide mt-1">Biodata</span>
            </a>

            <!-- Inactive Item: Pembayaran -->
            <a href="/pembayaran" class="group flex flex-col items-center w-16">
                <div class="text-slate-400 group-hover:text-teal-500 transition-all group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-wallet text-[24px]"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 group-hover:text-teal-500 transition-colors tracking-wide mt-1">Bayar</span>
            </a>

            <!-- Inactive Item: Akun -->
            <a href="/password" class="group flex flex-col items-center w-16">
                <div class="text-slate-400 group-hover:text-teal-500 transition-all group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-settings text-[24px]"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 group-hover:text-teal-500 transition-colors tracking-wide mt-1">Akun</span>
            </a>
        </div>
    </div>


</div>
@endsection
