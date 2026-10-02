@extends('layouts.dashboard')

@section('title', 'Ganti Kata Sandi')

@section('content')
<div class="max-w-2xl mx-auto space-y-6 pb-12">
    
    <!-- Top Hero Card -->
    <div class="bg-[#062d27] rounded-3xl p-6 sm:p-8 text-white relative overflow-hidden border border-emerald-900/60 shadow-xl">
        <div class="absolute -top-16 -right-16 w-60 h-60 bg-[#bef264]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-16 -left-16 w-60 h-60 bg-emerald-500/15 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex items-center justify-between gap-5">
            <div class="space-y-1.5">
                <div class="inline-flex items-center gap-2">
                    <span class="px-2.5 py-0.5 bg-[#bef264] text-[#062d27] text-[10px] font-black rounded-lg font-montserrat uppercase">
                        Keamanan Akun
                    </span>
                </div>
                <h1 class="text-xl sm:text-2xl font-black text-white font-montserrat tracking-tight leading-tight">
                    Perbarui Kata Sandi
                </h1>
                <p class="text-xs text-emerald-100/75 font-normal">
                    Amankan akun portal SPMB Anda dengan mengganti password secara berkala.
                </p>
            </div>

            <div class="w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl border border-white/15 flex items-center justify-center text-[#bef264] text-2xl shrink-0 shadow-lg">
                <i class="ti ti-shield-lock"></i>
            </div>
        </div>
    </div>

    <!-- Feedback Messages -->
    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200/80 rounded-2xl text-emerald-900 text-xs font-bold flex items-center gap-3 shadow-xs font-montserrat">
            <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-xs">
                <i class="ti ti-check text-base"></i>
            </div>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="p-4 bg-rose-50 border border-rose-200/80 rounded-2xl text-rose-800 text-xs font-bold flex items-center gap-3 shadow-xs font-montserrat">
            <div class="w-8 h-8 rounded-xl bg-rose-600 text-white flex items-center justify-center shrink-0 shadow-xs">
                <i class="ti ti-alert-circle text-base"></i>
            </div>
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white border border-stone-200/80 rounded-3xl p-6 sm:p-8 shadow-2xs space-y-6">
        <div class="flex items-center gap-3 pb-4 border-b border-stone-100">
            <div class="w-9 h-9 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center font-black text-xs font-montserrat shadow-xs">
                <i class="ti ti-key text-base"></i>
            </div>
            <div>
                <h2 class="text-sm font-black text-[#062d27] font-montserrat">Form Ubah Kata Sandi</h2>
                <p class="text-[11px] text-stone-500 font-medium">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka</p>
            </div>
        </div>

        <form action="/password" method="POST" class="space-y-5"
            x-data="{
                form: {
                    current_password: '',
                    password: '',
                    password_confirmation: ''
                },
                showOld: false,
                showNew: false,
                showConfirm: false,
                errors: {},
                validate(field) {
                    this.errors[field] = '';
                    if (!this.form[field]) {
                        this.errors[field] = 'Kolom ini wajib diisi.';
                    } else if (field === 'password' && this.form.password.length < 8) {
                        this.errors.password = 'Kata sandi minimal 8 karakter.';
                    } else if (field === 'password_confirmation' && this.form.password !== this.form.password_confirmation) {
                        this.errors.password_confirmation = 'Konfirmasi kata sandi tidak sesuai.';
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

            <!-- Password Saat Ini -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                    Password Saat Ini <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                    <input :type="showOld ? 'text' : 'password'" name="current_password" x-model="form.current_password" @blur="validate('current_password')" required 
                        class="w-full pl-4 pr-12 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none"
                        :class="errors.current_password ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                        placeholder="••••••••">
                    <button type="button" @click="showOld = !showOld" class="absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 hover:text-stone-600 transition-colors">
                        <i class="ti" :class="showOld ? 'ti-eye-off' : 'ti-eye'"></i>
                    </button>
                </div>
                <p x-show="errors.current_password" x-text="errors.current_password" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                    <i class="ti ti-alert-circle text-xs"></i>
                </p>
            </div>

            <!-- Password Baru -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                    Password Baru <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                    <input :type="showNew ? 'text' : 'password'" name="password" x-model="form.password" @blur="validate('password')" required 
                        class="w-full pl-4 pr-12 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none"
                        :class="errors.password ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                        placeholder="Minimal 8 karakter">
                    <button type="button" @click="showNew = !showNew" class="absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 hover:text-stone-600 transition-colors">
                        <i class="ti" :class="showNew ? 'ti-eye-off' : 'ti-eye'"></i>
                    </button>
                </div>
                <p x-show="errors.password" x-text="errors.password" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                    <i class="ti ti-alert-circle text-xs"></i>
                </p>
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                    Konfirmasi Password Baru <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                    <input :type="showConfirm ? 'text' : 'password'" name="password_confirmation" x-model="form.password_confirmation" @blur="validate('password_confirmation')" required 
                        class="w-full pl-4 pr-12 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none"
                        :class="errors.password_confirmation ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                        placeholder="Ulangi password baru">
                    <button type="button" @click="showConfirm = !showConfirm" class="absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 hover:text-stone-600 transition-colors">
                        <i class="ti" :class="showConfirm ? 'ti-eye-off' : 'ti-eye'"></i>
                    </button>
                </div>
                <p x-show="errors.password_confirmation" x-text="errors.password_confirmation" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                    <i class="ti ti-alert-circle text-xs"></i>
                </p>
            </div>

            <div class="pt-2">
                <button type="submit" 
                    class="w-full inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] text-xs font-black transition-all shadow-md shadow-lime-500/20 active:scale-95 font-montserrat">
                    <i class="ti ti-device-floppy text-base"></i>
                    <span>Simpan Perubahan Password</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Security Tips Box -->
    <div class="p-5 bg-emerald-50/70 border border-emerald-100 rounded-3xl flex items-start gap-4">
        <div class="w-9 h-9 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center shrink-0">
            <i class="ti ti-info-circle text-lg"></i>
        </div>
        <div>
            <h4 class="text-xs font-bold text-[#062d27] font-montserrat">Tips Keamanan Akun</h4>
            <p class="text-[11px] text-emerald-950/75 leading-relaxed mt-0.5">
                Jangan bagikan kata sandi Anda kepada siapapun. Gunakan kombinasi huruf besar, huruf kecil, angka, dan karakter khusus untuk menjaga keamanan data pendaftaran santri.
            </p>
        </div>
    </div>

</div>
@endsection
