@extends('layouts.mobile')

@section('title', 'Ganti Kata Sandi')

@section('content')
<div x-data="{ showOld: false, showNew: false, showConfirm: false }" class="min-h-[100dvh] bg-[#faf9f6] flex flex-col font-sans selection:bg-[#bef264] selection:text-[#062d27] pb-28">
    
    <!-- TOP HEADER: Deep Emerald Branding -->
    <div class="bg-[#062d27] pt-7 pb-12 px-5 relative overflow-hidden border-b border-emerald-900/60">
        <div class="absolute -top-16 -right-16 w-56 h-56 bg-[#bef264]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 -left-16 w-48 h-48 bg-emerald-500/15 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10">
            <div class="flex items-center gap-3.5 mb-2">
                <a href="/dashboard" class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center text-emerald-100 border border-white/15 active:scale-90 transition-all shadow-xs">
                    <i class="ti ti-chevron-left text-xl"></i>
                </a>
                <div>
                    <h1 class="text-white text-base font-black leading-tight tracking-tight font-montserrat">Keamanan Akun</h1>
                    <p class="text-[#bef264] text-[11px] font-bold font-montserrat mt-0.5">Perbarui Password SPMB</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="flex-1 -mt-6 px-5 relative z-20 space-y-4">
        
        <!-- Feedback Notifications -->
        @if(session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-200/80 rounded-2xl text-emerald-900 text-xs font-bold flex items-center gap-3 shadow-xs font-montserrat">
                <div class="w-7 h-7 bg-emerald-600 rounded-xl flex items-center justify-center text-white shrink-0">
                    <i class="ti ti-check text-sm"></i>
                </div>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="p-4 bg-rose-50 border border-rose-200/80 rounded-2xl text-rose-800 text-xs font-bold space-y-1 shadow-xs font-montserrat">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2">
                        <i class="ti ti-alert-circle text-base text-rose-600 shrink-0"></i>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- PASSWORD FORM -->
        <div class="bg-white rounded-3xl p-5 shadow-sm border border-stone-200/80">
            <h3 class="text-[#062d27] text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 font-montserrat">
                <i class="ti ti-lock text-emerald-800 text-base"></i>
                <span>Ubah Kata Sandi</span>
            </h3>

            <form action="/password" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Password Saat Ini <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <input :type="showOld ? 'text' : 'password'" name="current_password" required
                               class="w-full pl-4 pr-11 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none"
                               placeholder="••••••••">
                        <button type="button" @click="showOld = !showOld" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-stone-400">
                            <i class="ti" :class="showOld ? 'ti-eye-off' : 'ti-eye'"></i>
                        </button>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Password Baru <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <input :type="showNew ? 'text' : 'password'" name="password" required
                               class="w-full pl-4 pr-11 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none"
                               placeholder="Minimal 8 karakter">
                        <button type="button" @click="showNew = !showNew" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-stone-400">
                            <i class="ti" :class="showNew ? 'ti-eye-off' : 'ti-eye'"></i>
                        </button>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Konfirmasi Password Baru <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <input :type="showConfirm ? 'text' : 'password'" name="password_confirmation" required
                               class="w-full pl-4 pr-11 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none"
                               placeholder="Ulangi password baru">
                        <button type="button" @click="showConfirm = !showConfirm" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-stone-400">
                            <i class="ti" :class="showConfirm ? 'ti-eye-off' : 'ti-eye'"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] py-3.5 rounded-2xl text-xs font-black shadow-md shadow-lime-500/20 active:scale-95 transition-all flex items-center justify-center gap-2 font-montserrat">
                    <i class="ti ti-device-floppy text-base"></i>
                    <span>Simpan Perubahan Password</span>
                </button>
            </form>
        </div>

        <!-- INFO SECTION -->
        <div class="p-4 bg-emerald-50/70 border border-emerald-100 rounded-3xl flex items-start gap-3">
            <div class="w-8 h-8 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center text-xs shrink-0">
                <i class="ti ti-info-circle"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-[#062d27] font-montserrat">Tips Keamanan</p>
                <p class="text-[11px] text-emerald-950/75 leading-relaxed mt-0.5">Password yang kuat minimal 8 karakter dengan perpaduan huruf dan angka.</p>
            </div>
        </div>

    </div>

    <!-- BOTTOM NAVIGATION (Emerald & Lime theme) -->
    <div class="fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-2xl border-t border-stone-200/70 shadow-[0_-15px_40px_rgba(0,0,0,0.04)] z-50 px-3 pb-[env(safe-area-inset-bottom,12px)] pt-2.5">
        <div class="flex items-center justify-around">
            <a href="/dashboard" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl text-stone-400 group-hover:text-[#062d27] flex items-center justify-center transition-transform group-active:scale-90">
                    <i class="ti ti-smart-home text-lg"></i>
                </div>
                <span class="text-[10px] font-semibold text-stone-400 group-hover:text-[#062d27] font-montserrat mt-1">Beranda</span>
            </a>
            
            <a href="/biodata" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl text-stone-400 group-hover:text-[#062d27] flex items-center justify-center transition-transform group-active:scale-90">
                    <i class="ti ti-file-text text-lg"></i>
                </div>
                <span class="text-[10px] font-semibold text-stone-400 group-hover:text-[#062d27] font-montserrat mt-1">Biodata</span>
            </a>

            <a href="/pembayaran" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl text-stone-400 group-hover:text-[#062d27] flex items-center justify-center transition-transform group-active:scale-90">
                    <i class="ti ti-credit-card text-lg"></i>
                </div>
                <span class="text-[10px] font-semibold text-stone-400 group-hover:text-[#062d27] font-montserrat mt-1">Bayar</span>
            </a>

            <a href="/password" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center shadow-xs transition-transform group-active:scale-90">
                    <i class="ti ti-lock text-lg"></i>
                </div>
                <span class="text-[10px] font-bold text-[#062d27] font-montserrat mt-1">Akun</span>
            </a>
        </div>
    </div>
</div>
@endsection
