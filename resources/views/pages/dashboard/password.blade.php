@extends('layouts.dashboard')

@section('title', 'Ganti Password')

@section('content')
<div class="max-w-2xl mx-auto py-4 px-4">
    
    <!-- Feedback Messages -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-teal-50 border border-teal-100 rounded-xl text-teal-700 text-xs font-bold flex items-center gap-3 animate-fade-in">
            <i class="ti ti-circle-check text-lg"></i>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 p-4 bg-rose-50 border border-rose-100 rounded-xl text-rose-700 text-xs font-bold flex items-center gap-3 animate-fade-in">
            <i class="ti ti-alert-circle text-lg"></i>
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif

    <div class="bg-white shadow-sm border border-slate-200 rounded-xl overflow-hidden">
        <div class="p-6 bg-teal-700 relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-lg font-black text-white uppercase tracking-wider">Keamanan Akun</h1>
                <p class="text-teal-100 text-[10px] font-medium mt-1 uppercase tracking-widest">Perbarui kata sandi Anda secara berkala</p>
            </div>
            <i class="ti ti-shield-lock absolute -right-4 -bottom-4 text-white/10 text-8xl"></i>
        </div>

        <form action="/password" method="POST" class="p-8 space-y-6"
            x-data="{
                form: {
                    current_password: '',
                    password: '',
                    password_confirmation: ''
                },
                errors: {},
                validate(field) {
                    this.errors[field] = '';
                    if (!this.form[field]) {
                        this.errors[field] = 'Wajib diisi.';
                    } else if (field === 'password' && this.form.password.length < 8) {
                        this.errors.password = 'Minimal 8 karakter.';
                    } else if (field === 'password_confirmation' && this.form.password !== this.form.password_confirmation) {
                        this.errors.password_confirmation = 'Konfirmasi password tidak cocok.';
                    }
                },
                submit(e) {
                    ['current_password', 'password', 'password_confirmation'].forEach(f => this.validate(f));
                    if (Object.values(this.errors).some(err => err !== '')) {
                        e.preventDefault();
                    }
                }
            }" @submit="submit" novalidate>
            @csrf
            @method('PUT')

            <div class="space-y-1">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password Saat Ini <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <input type="password" name="current_password" x-model="form.current_password" @blur="validate('current_password')" required 
                        class="w-full bg-slate-50 border-b border-slate-200 py-2 px-1 text-sm font-bold text-slate-800 outline-none focus:border-teal-600 transition-all"
                        placeholder="••••••••">
                    <i class="ti ti-key absolute right-2 top-1/2 -translate-y-1/2 text-slate-300"></i>
                </div>
                <p x-show="errors.current_password" x-text="errors.current_password" class="text-[10px] font-bold text-rose-500 mt-1"></p>
            </div>

            <div class="space-y-1">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password Baru <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <input type="password" name="password" x-model="form.password" @blur="validate('password')" required 
                        class="w-full bg-slate-50 border-b border-slate-200 py-2 px-1 text-sm font-bold text-slate-800 outline-none focus:border-teal-600 transition-all"
                        placeholder="Minimal 8 karakter">
                    <i class="ti ti-lock-open absolute right-2 top-1/2 -translate-y-1/2 text-slate-300"></i>
                </div>
                <p x-show="errors.password" x-text="errors.password" class="text-[10px] font-bold text-rose-500 mt-1"></p>
            </div>

            <div class="space-y-1">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Konfirmasi Password Baru <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <input type="password" name="password_confirmation" x-model="form.password_confirmation" @blur="validate('password_confirmation')" required 
                        class="w-full bg-slate-50 border-b border-slate-200 py-2 px-1 text-sm font-bold text-slate-800 outline-none focus:border-teal-600 transition-all"
                        placeholder="Ulangi password baru">
                    <i class="ti ti-lock-check absolute right-2 top-1/2 -translate-y-1/2 text-slate-300"></i>
                </div>
                <p x-show="errors.password_confirmation" x-text="errors.password_confirmation" class="text-[10px] font-bold text-rose-500 mt-1"></p>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-slate-900 text-white py-4 rounded-xl text-xs font-black uppercase tracking-widest shadow-xl shadow-slate-900/10 hover:bg-teal-700 active:scale-95 transition-all flex items-center justify-center gap-3">
                    <i class="ti ti-device-floppy text-lg"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <div class="mt-8 bg-amber-50 border-l-4 border-amber-400 p-6 rounded-r-xl">
        <div class="flex gap-4">
            <i class="ti ti-info-circle text-amber-500 text-2xl"></i>
            <div class="space-y-1">
                <p class="text-xs font-black text-amber-900 uppercase tracking-widest">Tips Keamanan</p>
                <p class="text-[11px] text-amber-800 font-medium leading-relaxed">Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol untuk membuat password yang kuat dan sulit ditebak.</p>
            </div>
        </div>
    </div>
</div>
@endsection
