@extends('layouts.auth')

@section('title', 'Daftar - SPMB Al Amin')

@section('content')
<div class="min-h-screen bg-white flex flex-col font-sans selection:bg-teal-100">
    
    <!-- TOP SECTION: Branding (Fixed Height) -->
    <div class="h-[32vh] bg-gradient-to-br from-teal-900 via-teal-800 to-teal-900 relative flex flex-col items-center justify-center px-6">
        <!-- Abstract Background Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-500 rounded-full blur-[80px] opacity-20 -translate-y-1/2 translate-x-1/4"></div>
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>

        <!-- Logo & Text -->
        <div class="relative z-10 flex flex-col items-center transform -translate-y-2">
            <div class="w-14 h-14 bg-white rounded-2xl shadow-2xl shadow-teal-950/50 flex items-center justify-center p-2.5 mb-3 border border-white/10" data-aos="zoom-in">
                @php
                    $pengaturan = \App\Models\PengaturanUmum::first();
                    $logoUrl = optional($pengaturan)->logo 
                        ? config('app.admin_url') . '/storage/' . $pengaturan->logo 
                        : asset('assets/img/logo/persisalamin.png');
                @endphp
                <img src="{{ $logoUrl }}" alt="Logo" class="w-full h-full object-contain">
            </div>
            <h1 class="text-2xl font-black text-white tracking-tight leading-none mb-1 shadow-sm" data-aos="fade-up">Daftar Akun</h1>
            <p class="text-teal-100/80 text-[10px] font-bold uppercase tracking-[0.2em]" data-aos="fade-up" data-aos-delay="100">Pesantren Al Amin</p>
        </div>
    </div>

    <!-- BOTTOM SECTION: Form Drawer -->
    <div class="flex-1 bg-white rounded-t-[40px] -mt-10 relative z-20 px-7 pt-10 pb-8 flex flex-col shadow-[0_-15px_40px_rgba(0,0,0,0.15)]"
         x-data="{
            form: { name: '', email: '', password: '', password_confirmation: '', jenis_kelamin: '', no_hp: '', kode_unit: '' },
            errors: {},
            isFocus: '',
            validate(field) {
                this.errors[field] = '';
                if (!this.form[field]) this.errors[field] = 'Wajib diisi.';
            },
            submit(e) {
                let hasError = false;
                ['name', 'email', 'password', 'password_confirmation', 'jenis_kelamin', 'no_hp', 'kode_unit'].forEach(f => {
                    this.validate(f);
                    if (this.errors[f]) hasError = true;
                });
                if (this.form.password !== this.form.password_confirmation) {
                    this.errors.password_confirmation = 'Password tidak cocok.';
                    hasError = true;
                }
                if (hasError) e.preventDefault();
            }
         }">
        
        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border border-rose-100 rounded-2xl flex items-start gap-3 animate-shake">
                <i class="ti ti-alert-triangle text-rose-500 text-lg shrink-0 mt-0.5"></i>
                <div class="flex-1">
                    @foreach($errors->all() as $error)
                        <p class="text-[12px] text-rose-700 font-bold leading-relaxed">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <form action="/register" method="POST" class="space-y-4" @submit="submit" novalidate data-aos="fade-up" data-aos-delay="200">
            @csrf
            
            <!-- Unit / Jenjang -->
            <div class="space-y-1">
                <div class="relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 transition-colors duration-300"
                         :class="errors.kode_unit ? 'text-rose-500' : (isFocus === 'kode_unit' ? 'text-teal-600' : 'text-slate-400')">
                        <i class="ti ti-school text-xl"></i>
                    </div>
                    <select name="kode_unit" x-model="form.kode_unit" 
                        @focus="isFocus = 'kode_unit'" @blur="isFocus = ''; validate('kode_unit')" required
                        class="w-full bg-slate-50 border rounded-2xl py-4 pl-12 pr-10 text-[14px] font-bold text-slate-800 outline-none transition-all duration-300 focus:bg-white appearance-none"
                        :class="errors.kode_unit ? 'border-rose-500 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10' : 'border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10'">
                        <option value="">Pilih Jenjang / Unit</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->kode_unit }}">{{ $unit->nama_unit }}</option>
                        @endforeach
                    </select>
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                        <i class="ti ti-chevron-down"></i>
                    </div>
                </div>
                <p x-show="errors.kode_unit" x-text="errors.kode_unit" class="text-rose-500 text-[10px] font-bold ml-1"></p>
            </div>

            <!-- Nama Lengkap -->
            <div class="space-y-1">
                <div class="relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 transition-colors duration-300"
                         :class="errors.name ? 'text-rose-500' : (isFocus === 'name' ? 'text-teal-600' : 'text-slate-400')">
                        <i class="ti ti-user text-xl"></i>
                    </div>
                    <input type="text" name="name" x-model="form.name" 
                        @focus="isFocus = 'name'" @blur="isFocus = ''; validate('name')" placeholder="Nama Lengkap" required
                        class="w-full bg-slate-50 border rounded-2xl py-4 pl-12 pr-4 text-[14px] font-bold text-slate-800 outline-none transition-all duration-300 focus:bg-white placeholder:text-slate-400 placeholder:font-medium"
                        :class="errors.name ? 'border-rose-500 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10' : 'border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10'">
                </div>
                <p x-show="errors.name" x-text="errors.name" class="text-rose-500 text-[10px] font-bold ml-1"></p>
            </div>

            <!-- Email -->
            <div class="space-y-1">
                <div class="relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 transition-colors duration-300"
                         :class="errors.email ? 'text-rose-500' : (isFocus === 'email' ? 'text-teal-600' : 'text-slate-400')">
                        <i class="ti ti-mail text-xl"></i>
                    </div>
                    <input type="email" name="email" x-model="form.email" 
                        @focus="isFocus = 'email'" @blur="isFocus = ''; validate('email')" placeholder="Alamat Email" required
                        class="w-full bg-slate-50 border rounded-2xl py-4 pl-12 pr-4 text-[14px] font-bold text-slate-800 outline-none transition-all duration-300 focus:bg-white placeholder:text-slate-400 placeholder:font-medium"
                        :class="errors.email ? 'border-rose-500 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10' : 'border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10'">
                </div>
                <p x-show="errors.email" x-text="errors.email" class="text-rose-500 text-[10px] font-bold ml-1"></p>
            </div>

            <!-- No HP -->
            <div class="space-y-1">
                <div class="relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 transition-colors duration-300"
                         :class="errors.no_hp ? 'text-rose-500' : (isFocus === 'no_hp' ? 'text-teal-600' : 'text-slate-400')">
                        <i class="ti ti-brand-whatsapp text-xl"></i>
                    </div>
                    <input type="tel" name="no_hp" x-model="form.no_hp" 
                        @focus="isFocus = 'no_hp'" @blur="isFocus = ''; validate('no_hp')" placeholder="Nomor WhatsApp" required
                        class="w-full bg-slate-50 border rounded-2xl py-4 pl-12 pr-4 text-[14px] font-bold text-slate-800 outline-none transition-all duration-300 focus:bg-white placeholder:text-slate-400 placeholder:font-medium"
                        :class="errors.no_hp ? 'border-rose-500 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10' : 'border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10'">
                </div>
                <p x-show="errors.no_hp" x-text="errors.no_hp" class="text-rose-500 text-[10px] font-bold ml-1"></p>
            </div>

            <!-- Jenis Kelamin -->
            <div class="grid grid-cols-2 gap-3">
                <label class="relative flex items-center justify-center gap-2 p-3 border rounded-xl cursor-pointer transition-all"
                       :class="form.jenis_kelamin === 'L' ? 'bg-teal-50 border-teal-500 text-teal-700 ring-2 ring-teal-500/20' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'">
                    <input type="radio" name="jenis_kelamin" value="L" x-model="form.jenis_kelamin" class="hidden">
                    <i class="ti ti-gender-male text-lg"></i>
                    <span class="text-sm font-bold">Laki-laki</span>
                </label>
                <label class="relative flex items-center justify-center gap-2 p-3 border rounded-xl cursor-pointer transition-all"
                       :class="form.jenis_kelamin === 'P' ? 'bg-teal-50 border-teal-500 text-teal-700 ring-2 ring-teal-500/20' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'">
                    <input type="radio" name="jenis_kelamin" value="P" x-model="form.jenis_kelamin" class="hidden">
                    <i class="ti ti-gender-female text-lg"></i>
                    <span class="text-sm font-bold">Perempuan</span>
                </label>
            </div>

            <!-- Password -->
            <div class="space-y-1">
                <div class="relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 transition-colors duration-300"
                         :class="errors.password ? 'text-rose-500' : (isFocus === 'password' ? 'text-teal-600' : 'text-slate-400')">
                        <i class="ti ti-lock text-xl"></i>
                    </div>
                    <input type="password" name="password" x-model="form.password" 
                        @focus="isFocus = 'password'" @blur="isFocus = ''; validate('password')" placeholder="Buat Kata Sandi" required
                        class="w-full bg-slate-50 border rounded-2xl py-4 pl-12 pr-4 text-[14px] font-bold text-slate-800 outline-none transition-all duration-300 focus:bg-white placeholder:text-slate-400 placeholder:font-medium"
                        :class="errors.password ? 'border-rose-500 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10' : 'border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10'">
                </div>
                <p x-show="errors.password" x-text="errors.password" class="text-rose-500 text-[10px] font-bold ml-1"></p>
            </div>

            <div class="space-y-1">
                <div class="relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 transition-colors duration-300"
                         :class="errors.password_confirmation ? 'text-rose-500' : (isFocus === 'password_confirmation' ? 'text-teal-600' : 'text-slate-400')">
                        <i class="ti ti-lock-check text-xl"></i>
                    </div>
                    <input type="password" name="password_confirmation" x-model="form.password_confirmation" 
                        @focus="isFocus = 'password_confirmation'" @blur="isFocus = ''; validate('password_confirmation')" placeholder="Ulangi Kata Sandi" required
                        class="w-full bg-slate-50 border rounded-2xl py-4 pl-12 pr-4 text-[14px] font-bold text-slate-800 outline-none transition-all duration-300 focus:bg-white placeholder:text-slate-400 placeholder:font-medium"
                        :class="errors.password_confirmation ? 'border-rose-500 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10' : 'border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10'">
                </div>
                <p x-show="errors.password_confirmation" x-text="errors.password_confirmation" class="text-rose-500 text-[10px] font-bold ml-1"></p>
            </div>

            <div class="pt-4">
                <button type="submit" 
                    class="w-full py-4 bg-teal-600 hover:bg-teal-700 active:bg-teal-800 rounded-2xl text-white font-black text-[14px] tracking-wide shadow-lg shadow-teal-600/30 transition-all flex items-center justify-center gap-2">
                    Daftar Sekarang
                    <i class="ti ti-arrow-right text-lg"></i>
                </button>
            </div>
        </form>

        <!-- Bottom Text -->
        <div class="mt-auto pt-8 text-center">
            <p class="text-[13px] text-slate-500 font-medium">
                Sudah punya akun? 
                <a href="/login" class="font-bold text-teal-600 hover:text-teal-700">Masuk</a>
            </p>
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
