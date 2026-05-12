@extends('layouts.auth')

@section('title', 'Masuk - SPMB Al Amin')

@section('content')
<div class="min-h-[100dvh] bg-white flex flex-col font-sans selection:bg-teal-100 overflow-x-hidden">
    
    <!-- TOP SECTION: Branding (Fixed Height) -->
    <div class="h-[42vh] bg-gradient-to-br from-teal-900 via-teal-800 to-teal-900 relative flex flex-col items-center justify-center px-6 overflow-hidden">
        <!-- Abstract Background Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-500 rounded-full blur-[80px] opacity-20 -translate-y-1/2 translate-x-1/4"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-teal-400 rounded-full blur-[60px] opacity-20 translate-y-1/4 -translate-x-1/4"></div>
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>

        <!-- Logo & Text -->
        <div class="relative z-10 flex flex-col items-center transform -translate-y-4">
            <div class="w-20 h-20 bg-white rounded-[24px] shadow-2xl shadow-teal-950/50 flex items-center justify-center p-3.5 mb-5 border border-white/10" data-aos="zoom-in" data-aos-duration="800">
                @php
                    $pengaturan = \App\Models\PengaturanUmum::first();
                    $logoUrl = optional($pengaturan)->logo 
                        ? config('app.admin_url') . '/storage/' . $pengaturan->logo 
                        : asset('assets/img/logo/persisalamin.png');
                @endphp
                <img src="{{ $logoUrl }}" alt="Logo" class="w-full h-full object-contain">
            </div>
            
            <h1 class="text-[28px] font-black text-white tracking-tight leading-none mb-1.5 shadow-sm" data-aos="fade-up" data-aos-delay="100">SPMB Portal</h1>
            <p class="text-teal-100/80 text-[10px] font-bold uppercase tracking-[0.25em]" data-aos="fade-up" data-aos-delay="200">Pesantren Al Amin</p>
        </div>
    </div>

    <!-- BOTTOM SECTION: Form Drawer (Expands to fill) -->
    <div class="flex-1 bg-white rounded-t-[40px] -mt-12 relative z-20 px-7 pt-10 pb-8 flex flex-col shadow-[0_-15px_40px_rgba(0,0,0,0.15)]"
         x-data="{
            form: { username: '', password: '' },
            errors: {},
            isFocus: '',
            validate(field) {
                this.errors[field] = '';
                if (!this.form[field]) this.errors[field] = 'Kolom ini wajib diisi.';
            },
            submit(e) {
                this.validate('username');
                this.validate('password');
                if (this.errors.username || this.errors.password) e.preventDefault();
            }
         }">
        
        <!-- Drag Handle Indicator -->
        <div class="absolute top-4 left-1/2 -translate-x-1/2 w-12 h-1.5 bg-slate-200 rounded-full"></div>

        <div class="mb-8" data-aos="fade-up" data-aos-delay="300">
            <h2 class="text-2xl font-black text-slate-800">Masuk Akun</h2>
            <p class="text-[13px] text-slate-400 font-medium mt-1">Silakan masuk untuk melanjutkan</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border border-rose-100 rounded-2xl flex items-start gap-3 animate-shake">
                <i class="ti ti-alert-triangle text-rose-500 text-lg shrink-0 mt-0.5"></i>
                <p class="text-[12px] text-rose-700 font-bold leading-relaxed">{{ $errors->first() }}</p>
            </div>
        @endif

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 rounded-2xl flex items-start gap-3">
                <i class="ti ti-circle-check text-emerald-500 text-lg shrink-0 mt-0.5"></i>
                <p class="text-[12px] text-emerald-700 font-bold leading-relaxed">{{ session('success') }}</p>
            </div>
        @endif

        <form action="/login" method="POST" class="space-y-5" @submit="submit" novalidate data-aos="fade-up" data-aos-delay="400">
            @csrf
            
            <!-- Modern Input: Username -->
            <div class="space-y-1">
                <div class="relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 transition-colors duration-300"
                         :class="errors.username ? 'text-rose-500' : (isFocus === 'username' ? 'text-teal-600' : 'text-slate-400')">
                        <i class="ti ti-user text-xl"></i>
                    </div>
                    <input type="text" name="username" x-model="form.username" 
                        @focus="isFocus = 'username'" @blur="isFocus = ''; validate('username')"
                        placeholder="No. Register / Email" required
                        class="w-full bg-slate-50 border rounded-2xl py-4 pl-12 pr-4 text-[14px] font-bold text-slate-800 outline-none transition-all duration-300 focus:bg-white placeholder:text-slate-400 placeholder:font-medium"
                        :class="errors.username ? 'border-rose-500 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10' : 'border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10'">
                </div>
                <p x-show="errors.username" x-text="errors.username" class="text-rose-500 text-[10px] font-bold ml-1"></p>
            </div>

            <!-- Modern Input: Password -->
            <div class="space-y-1">
                <div class="relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 transition-colors duration-300"
                         :class="errors.password ? 'text-rose-500' : (isFocus === 'password' ? 'text-teal-600' : 'text-slate-400')">
                        <i class="ti ti-lock text-xl"></i>
                    </div>
                    <input type="password" name="password" x-model="form.password" 
                        @focus="isFocus = 'password'" @blur="isFocus = ''; validate('password')"
                        placeholder="Kata Sandi" required
                        class="w-full bg-slate-50 border rounded-2xl py-4 pl-12 pr-4 text-[14px] font-bold text-slate-800 outline-none transition-all duration-300 focus:bg-white placeholder:text-slate-400 placeholder:font-medium"
                        :class="errors.password ? 'border-rose-500 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10' : 'border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10'">
                </div>
                <p x-show="errors.password" x-text="errors.password" class="text-rose-500 text-[10px] font-bold ml-1"></p>
            </div>

            <div class="flex items-center justify-between px-1 pt-1">
                <label class="flex items-center gap-2 cursor-pointer group">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded text-teal-600 border-slate-300 focus:ring-teal-500">
                    <span class="text-xs font-semibold text-slate-500 group-hover:text-slate-700 transition-colors">Ingat Saya</span>
                </label>
                <a href="#" class="text-xs font-bold text-teal-600 hover:text-teal-700 transition-colors">Lupa Sandi?</a>
            </div>

            <div class="pt-4">
                <button type="submit" 
                    class="w-full py-4 bg-teal-600 hover:bg-teal-700 active:bg-teal-800 rounded-2xl text-white font-black text-[14px] tracking-wide shadow-lg shadow-teal-600/30 transition-all flex items-center justify-center gap-2">
                    Masuk
                    <i class="ti ti-arrow-right text-lg"></i>
                </button>
            </div>
        </form>

        <!-- Bottom Text -->
        <div class="mt-auto pt-10 text-center" data-aos="fade-up" data-aos-delay="500">
            <p class="text-[13px] text-slate-500 font-medium mb-6">
                Belum punya akun? 
                <a href="/register" class="font-bold text-teal-600 hover:text-teal-700">Daftar Baru</a>
            </p>
            
            <div class="flex items-center justify-center gap-2 text-slate-400">
                <i class="ti ti-headset text-lg"></i>
                <span class="text-[11px] font-semibold">Butuh Bantuan? Hubungi Admin</span>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}
.animate-shake {
    animation: shake 0.4s ease-in-out;
}
</style>
@endsection
