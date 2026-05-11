@extends('layouts.mobile')

@section('title', 'Ganti Password')

@section('content')
<div x-data="passwordForm()" class="min-h-[100dvh] bg-slate-50 flex flex-col font-sans selection:bg-teal-100 pb-24">
    
    <!-- TOP HEADER: Teal Branding -->
    <div class="bg-teal-900 pt-8 pb-12 px-6 relative overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-500 rounded-full blur-[80px] opacity-20 -translate-y-1/2 translate-x-1/4"></div>
        <div class="absolute inset-0 opacity-[0.05]" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>

        <div class="relative z-10">
            <div class="flex items-center gap-4 mb-2">
                <a href="/dashboard" class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-xl flex items-center justify-center text-teal-100 border border-white/20 active:scale-90 transition-all">
                    <i class="ti ti-chevron-left text-2xl"></i>
                </a>
                <div>
                    <h1 class="text-white text-lg font-black leading-none tracking-tight">Keamanan Akun</h1>
                    <p class="text-teal-200/80 text-[11px] font-medium mt-1">Perbarui Password Anda</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="flex-1 -mt-6 px-5 relative z-20 space-y-4">
        
        <!-- Feedback Notifications -->
        @if(session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-100 rounded-2xl text-emerald-700 text-[11px] font-bold flex items-center gap-3 shadow-sm" data-aos="fade-down">
                <div class="w-8 h-8 bg-emerald-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-500/20">
                    <i class="ti ti-check text-lg"></i>
                </div>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="p-4 bg-rose-50 border border-rose-100 rounded-2xl text-rose-700 text-[11px] font-bold space-y-1 shadow-sm" data-aos="fade-down">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2">
                        <i class="ti ti-alert-circle text-base"></i>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- PASSWORD FORM -->
        <div class="bg-white rounded-xl p-6 shadow-xl shadow-teal-950/5 border border-slate-100">
            <h3 class="text-slate-800 text-sm font-black mb-6 flex items-center gap-2">
                <i class="ti ti-shield-lock text-teal-600 text-lg"></i>
                Ubah Password
            </h3>

            <form action="/password" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div class="relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 z-10"><i class="ti ti-key text-lg"></i></div>
                    <input type="password" name="current_password" id="current_password" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 pl-11 pr-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                    <label for="current_password" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-11 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Password Saat Ini</label>
                </div>

                <div class="relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 z-10"><i class="ti ti-lock-open text-lg"></i></div>
                    <input type="password" name="password" id="password" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 pl-11 pr-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                    <label for="password" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-11 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Password Baru</label>
                </div>

                <div class="relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 z-10"><i class="ti ti-lock-check text-lg"></i></div>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 pl-11 pr-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                    <label for="password_confirmation" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-11 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Konfirmasi Password Baru</label>
                </div>

                <button type="submit" class="w-full bg-slate-900 text-white py-4 rounded-2xl text-[13px] font-black shadow-lg shadow-slate-900/20 active:scale-95 transition-all flex items-center justify-center gap-3">
                    <i class="ti ti-device-floppy text-lg"></i>
                    Simpan Perubahan
                </button>
            </form>
        </div>

        <!-- INFO SECTION -->
        <div class="bg-amber-50 rounded-2xl p-5 border border-amber-100 flex gap-4">
            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-amber-500 shadow-sm border border-amber-100 shrink-0">
                <i class="ti ti-info-circle text-xl"></i>
            </div>
            <div>
                <p class="text-[11px] font-black text-amber-900 uppercase tracking-wider mb-1">Tips Keamanan</p>
                <p class="text-[10px] text-amber-800 font-medium leading-relaxed">Password yang kuat biasanya terdiri dari minimal 8 karakter dengan kombinasi huruf dan angka.</p>
            </div>
        </div>

    </div>

    <!-- BOTTOM NAVIGATION (Active: Akun) -->
    <div class="fixed bottom-0 left-0 right-0 bg-white/90 backdrop-blur-2xl border-t border-slate-200/60 shadow-[0_-15px_40px_rgba(0,0,0,0.03)] z-50 px-2 pb-[env(safe-area-inset-bottom,16px)] pt-3">
        <div class="flex items-center justify-around pb-2">
            <a href="/dashboard" class="group flex flex-col items-center w-16">
                <div class="text-slate-400 group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-smart-home text-[24px]"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 tracking-wide mt-1">Beranda</span>
            </a>
            
            <a href="/biodata" class="group flex flex-col items-center w-16">
                <div class="text-slate-400 group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-user-edit text-[24px]"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 tracking-wide mt-1">Biodata</span>
            </a>

            <a href="/pembayaran" class="group flex flex-col items-center w-16">
                <div class="text-slate-400 group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-wallet text-[24px]"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 tracking-wide mt-1">Bayar</span>
            </a>

            <a href="/password" class="group flex flex-col items-center relative w-16">
                <div class="absolute -top-4 w-12 h-1 bg-teal-500 rounded-b-lg"></div>
                <div class="text-teal-600 transition-transform group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-settings text-[26px]"></i>
                </div>
                <span class="text-[10px] font-black text-teal-600 tracking-wide mt-1">Akun</span>
            </a>
        </div>
    </div>
</div>

<script>
function passwordForm() {
    return {
        // Simple form handling if needed
    }
}
</script>
@endsection
