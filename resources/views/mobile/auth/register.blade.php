@extends('layouts.auth')

@section('title', 'Pendaftaran Santri Baru - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Al Amin'))
@section('meta_description', 'Formulir pendaftaran santri baru SPMB mobile Pesantren Persatuan Islam 80 Al Amin.')

@section('content')
<div class="min-h-[100dvh] bg-[#faf9f6] flex flex-col justify-between font-sans selection:bg-[#bef264] selection:text-[#062d27] pb-6">
    
    <!-- Top App Bar (Sticky Native Green Style) -->
    <header class="sticky top-0 z-30 bg-[#062d27] px-4 pt-4 pb-3 flex items-center justify-between border-b border-emerald-900/80 shadow-md">
        <a href="/login" class="w-10 h-10 rounded-2xl bg-white/10 hover:bg-white/15 border border-white/15 shadow-sm flex items-center justify-center text-white active:scale-90 transition-transform">
            <i class="ti ti-chevron-left text-xl"></i>
        </a>
        
        <div class="flex items-center gap-2">
            @php
                $logoUrl = optional($pengaturan)->logo 
                    ? $pengaturan->getAdminImageUrl($pengaturan->logo)
                    : asset('assets/img/logo/persisalamin.png');
            @endphp
            <div class="w-7 h-7 rounded-lg bg-white/10 p-1 flex items-center justify-center border border-white/15">
                <img src="{{ $logoUrl }}" alt="Logo" class="w-full h-full object-contain">
            </div>
            <span class="text-xs font-bold text-white font-poppins">SPMB Al-Amin</span>
        </div>

        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->telepon ?? '') }}?text=Halo%20Panitia%20SPMB,%20saya%20butuh%20bantuan%20pendaftaran" 
           target="_blank" 
           class="w-10 h-10 rounded-2xl bg-[#bef264]/20 hover:bg-[#bef264]/30 border border-[#bef264]/30 flex items-center justify-center text-[#bef264] active:scale-90 transition-transform shadow-sm">
            <i class="ti ti-brand-whatsapp text-lg"></i>
        </a>
    </header>

    <!-- Main Container -->
    <div 
        class="flex-1 px-5 pt-4 max-w-sm w-full mx-auto"
        x-data="{
            form: {
                kode_unit: '{{ old('kode_unit') }}',
                name: '{{ old('name') }}',
                jenis_kelamin: '{{ old('jenis_kelamin') }}',
                email: '{{ old('email') }}',
                no_hp: '{{ old('no_hp') }}',
                password: '',
                password_confirmation: ''
            },
            showPassword: false,
            showConfirmPassword: false,
            errors: {},
            validate(field) {
                this.errors[field] = '';
                if (!this.form[field]) {
                    this.errors[field] = 'Kolom ini wajib diisi.';
                    return;
                }
                if (field === 'email') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(this.form.email)) this.errors[field] = 'Format email tidak valid.';
                }
                if (field === 'no_hp') {
                    const phoneRegex = /^[0-9]{9,16}$/;
                    if (!phoneRegex.test(this.form.no_hp)) this.errors[field] = 'Nomor HP tidak valid.';
                }
                if (field === 'password' && this.form.password.length < 8) {
                    this.errors[field] = 'Password min 8 karakter.';
                }
                if (field === 'password_confirmation' && this.form.password !== this.form.password_confirmation) {
                    this.errors[field] = 'Konfirmasi password tidak cocok.';
                }
            },
            submit(e) {
                Object.keys(this.form).forEach(f => this.validate(f));
                if (Object.values(this.errors).some(err => err !== '')) {
                    e.preventDefault();
                }
            }
        }"
    >
        <!-- Segmented Tab Switcher (Native App Style) -->
        <div class="bg-stone-200/70 p-1 rounded-2xl flex gap-1 mb-5">
            <a href="/login" class="flex-1 py-2.5 text-center text-xs font-bold rounded-xl text-stone-500 hover:text-stone-800 font-poppins transition-all">
                Masuk Akun
            </a>
            <a href="/register" class="flex-1 py-2.5 text-center text-xs font-bold rounded-xl bg-white text-[#062d27] shadow-xs font-poppins transition-all">
                Daftar Baru
            </a>
        </div>

        <!-- Heading Section (Exact Desktop Typography & Style) -->
        <div class="mb-5">
            <div class="inline-flex items-center gap-2 bg-[#062d27] text-[#bef264] px-3.5 py-1 rounded-full text-xs font-bold mb-2.5 font-poppins shadow-xs">
                <i class="ti ti-user-plus text-sm"></i>
                <span>Registrasi Santri Baru</span>
            </div>

            <h1 class="text-2xl font-black text-[#062d27] font-poppins leading-tight tracking-tight">
                Sistem Penerimaan Murid Baru (SPMB)
            </h1>
            <p class="text-xs text-stone-500 font-normal mt-1.5 leading-relaxed">
                Lengkapi data awal pendaftar di bawah ini dengan benar.
            </p>
        </div>

        <!-- Flash Messages -->
        @if(session('error'))
            <div class="mb-4 p-3.5 bg-rose-50 border border-rose-200/80 rounded-2xl flex items-start gap-2.5 shadow-xs">
                <i class="ti ti-alert-triangle text-rose-600 text-lg shrink-0 mt-0.5"></i>
                <p class="text-xs text-rose-700 font-bold leading-relaxed">{{ session('error') }}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-3.5 bg-rose-50 border border-rose-200/80 rounded-2xl flex items-start gap-2.5 shadow-xs">
                <i class="ti ti-alert-triangle text-rose-600 text-lg shrink-0 mt-0.5"></i>
                <div>
                    <h5 class="text-xs font-bold text-rose-950 font-poppins">Periksa Kembali Formulir</h5>
                    <p class="text-[11px] text-rose-700 leading-relaxed font-medium">{{ $errors->first() }}</p>
                </div>
            </div>
        @endif

        <!-- Form Elements -->
        <form action="{{ route('register') }}" method="POST" class="space-y-4" @submit="submit" novalidate>
            @csrf
            
            <!-- Pilihan Jenjang / Unit Floating Label -->
            <div class="space-y-1">
                <div class="relative">
                    <select 
                        id="kode_unit_mobile"
                        name="kode_unit" 
                        x-model="form.kode_unit" 
                        @change="validate('kode_unit')" 
                        required
                        class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-10 text-xs font-semibold text-stone-900 outline-none transition-all appearance-none cursor-pointer shadow-2xs"
                        :class="errors.kode_unit ? '!border-rose-500 !bg-rose-50/20 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/10'"
                    >
                        <option value="" disabled selected hidden></option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->kode_unit }}">{{ $unit->nama_unit }}</option>
                        @endforeach
                    </select>
                    <i class="ti ti-school absolute left-3.5 top-1/2 -translate-y-1/2 text-lg pointer-events-none transition-colors" 
                       :class="errors.kode_unit ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                    <i class="ti ti-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none"></i>
                    <label 
                        for="kode_unit_mobile" 
                        class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                               peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                        :class="form.kode_unit 
                            ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.kode_unit ? 'text-rose-600' : 'text-stone-600')
                            : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.kode_unit ? 'text-rose-500' : 'text-stone-400')"
                    >
                        Pilihan Jenjang / Unit <span class="text-rose-500">*</span>
                    </label>
                </div>
                <p x-show="errors.kode_unit" class="text-rose-600 text-[11px] font-bold mt-1 flex items-center gap-1 font-poppins">
                    <i class="ti ti-alert-circle text-xs shrink-0"></i>
                    <span x-text="errors.kode_unit"></span>
                </p>
            </div>

            <!-- Nama Lengkap Santri Floating Label -->
            <div class="space-y-1">
                <div class="relative">
                    <input 
                        type="text" 
                        id="name_mobile"
                        name="name" 
                        x-model="form.name" 
                        @blur="validate('name')" 
                        placeholder=" " 
                        required
                        class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-4 text-xs font-semibold text-stone-900 outline-none transition-all shadow-2xs placeholder-shown:border-stone-200/90"
                        :class="errors.name ? '!border-rose-500 !bg-rose-50/20 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/10'"
                    >
                    <i class="ti ti-user absolute left-3.5 top-1/2 -translate-y-1/2 text-lg pointer-events-none transition-colors" 
                       :class="errors.name ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                    <label 
                        for="name_mobile" 
                        class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                               peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                        :class="form.name 
                            ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.name ? 'text-rose-600' : 'text-stone-600')
                            : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.name ? 'text-rose-500' : 'text-stone-400')"
                    >
                        Nama Lengkap Calon Santri <span class="text-rose-500">*</span>
                    </label>
                </div>
                <p x-show="errors.name" class="text-rose-600 text-[11px] font-bold mt-1 flex items-center gap-1 font-poppins">
                    <i class="ti ti-alert-circle text-xs shrink-0"></i>
                    <span x-text="errors.name"></span>
                </p>
            </div>

            <!-- Jenis Kelamin -->
            <div class="space-y-1">
                <label class="block text-xs font-bold text-stone-700 font-poppins mb-1.5" :class="errors.jenis_kelamin ? 'text-rose-600' : ''">
                    Jenis Kelamin <span class="text-rose-500">*</span>
                </label>
                <div class="grid grid-cols-2 gap-2">
                    <label 
                        class="flex items-center justify-center gap-2 py-3.5 px-4 rounded-2xl border cursor-pointer transition-all text-xs font-bold font-poppins select-none shadow-2xs"
                        :class="form.jenis_kelamin === 'L' ? 'bg-[#062d27] border-[#062d27] text-[#bef264] shadow-xs' : (errors.jenis_kelamin ? '!border-rose-500 !bg-rose-50/20 text-rose-800' : 'bg-white border-stone-200/90 text-stone-700 hover:bg-stone-50')"
                    >
                        <input type="radio" name="jenis_kelamin" value="L" x-model="form.jenis_kelamin" @change="validate('jenis_kelamin')" class="hidden">
                        <i class="ti ti-gender-male text-base"></i>
                        <span>Laki-laki</span>
                    </label>

                    <label 
                        class="flex items-center justify-center gap-2 py-3.5 px-4 rounded-2xl border cursor-pointer transition-all text-xs font-bold font-poppins select-none shadow-2xs"
                        :class="form.jenis_kelamin === 'P' ? 'bg-[#062d27] border-[#062d27] text-[#bef264] shadow-xs' : (errors.jenis_kelamin ? '!border-rose-500 !bg-rose-50/20 text-rose-800' : 'bg-white border-stone-200/90 text-stone-700 hover:bg-stone-50')"
                    >
                        <input type="radio" name="jenis_kelamin" value="P" x-model="form.jenis_kelamin" @change="validate('jenis_kelamin')" class="hidden">
                        <i class="ti ti-gender-female text-base"></i>
                        <span>Perempuan</span>
                    </label>
                </div>
                <p x-show="errors.jenis_kelamin" class="text-rose-600 text-[11px] font-bold mt-1 flex items-center gap-1 font-poppins">
                    <i class="ti ti-alert-circle text-xs shrink-0"></i>
                    <span x-text="errors.jenis_kelamin"></span>
                </p>
            </div>

            <!-- Email Floating Label -->
            <div class="space-y-1">
                <div class="relative">
                    <input 
                        type="email" 
                        id="email_mobile"
                        name="email" 
                        x-model="form.email" 
                        @blur="validate('email')" 
                        placeholder=" " 
                        required
                        class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-4 text-xs font-semibold text-stone-900 outline-none transition-all shadow-2xs placeholder-shown:border-stone-200/90"
                        :class="errors.email ? '!border-rose-500 !bg-rose-50/20 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/10'"
                    >
                    <i class="ti ti-mail absolute left-3.5 top-1/2 -translate-y-1/2 text-lg pointer-events-none transition-colors" 
                       :class="errors.email ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                    <label 
                        for="email_mobile" 
                        class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                               peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                        :class="form.email 
                            ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.email ? 'text-rose-600' : 'text-stone-600')
                            : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.email ? 'text-rose-500' : 'text-stone-400')"
                    >
                        Alamat Email Aktif <span class="text-rose-500">*</span>
                    </label>
                </div>
                <p x-show="errors.email" class="text-rose-600 text-[11px] font-bold mt-1 flex items-center gap-1 font-poppins">
                    <i class="ti ti-alert-circle text-xs shrink-0"></i>
                    <span x-text="errors.email"></span>
                </p>
            </div>

            <!-- No. WhatsApp Floating Label -->
            <div class="space-y-1">
                <div class="relative">
                    <input 
                        type="tel" 
                        id="no_hp_mobile"
                        name="no_hp" 
                        x-model="form.no_hp" 
                        @blur="validate('no_hp')" 
                        placeholder=" " 
                        required
                        class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-4 text-xs font-semibold text-stone-900 outline-none transition-all font-mono shadow-2xs placeholder-shown:border-stone-200/90"
                        :class="errors.no_hp ? '!border-rose-500 !bg-rose-50/20 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/10'"
                    >
                    <i class="ti ti-brand-whatsapp absolute left-3.5 top-1/2 -translate-y-1/2 text-lg pointer-events-none transition-colors" 
                       :class="errors.no_hp ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                    <label 
                        for="no_hp_mobile" 
                        class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                               peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                        :class="form.no_hp 
                            ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.no_hp ? 'text-rose-600' : 'text-stone-600')
                            : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.no_hp ? 'text-rose-500' : 'text-stone-400')"
                    >
                        Nomor WhatsApp Wali / Santri <span class="text-rose-500">*</span>
                    </label>
                </div>
                <p x-show="errors.no_hp" class="text-rose-600 text-[11px] font-bold mt-1 flex items-center gap-1 font-poppins">
                    <i class="ti ti-alert-circle text-xs shrink-0"></i>
                    <span x-text="errors.no_hp"></span>
                </p>
            </div>

            <!-- Password Floating Label -->
            <div class="space-y-1">
                <div class="relative">
                    <input 
                        :type="showPassword ? 'text' : 'password'" 
                        id="password_reg_mobile"
                        name="password" 
                        x-model="form.password" 
                        @blur="validate('password')" 
                        placeholder=" " 
                        required
                        class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-11 text-xs font-semibold text-stone-900 outline-none transition-all shadow-2xs placeholder-shown:border-stone-200/90"
                        :class="errors.password ? '!border-rose-500 !bg-rose-50/20 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/10'"
                    >
                    <i class="ti ti-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-lg pointer-events-none transition-colors" 
                       :class="errors.password ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                    <label 
                        for="password_reg_mobile" 
                        class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                               peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                        :class="form.password 
                            ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.password ? 'text-rose-600' : 'text-stone-600')
                            : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.password ? 'text-rose-500' : 'text-stone-400')"
                    >
                        Buat Kata Sandi <span class="text-rose-500">*</span>
                    </label>
                    <button 
                        type="button" 
                        @click="showPassword = !showPassword" 
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 hover:text-stone-600 focus:outline-none p-1.5"
                        aria-label="Tampilkan sandi"
                    >
                        <i class="ti text-base" :class="showPassword ? 'ti-eye-off' : 'ti-eye'"></i>
                    </button>
                </div>
                <p x-show="errors.password" class="text-rose-600 text-[11px] font-bold mt-1 flex items-center gap-1 font-poppins">
                    <i class="ti ti-alert-circle text-xs shrink-0"></i>
                    <span x-text="errors.password"></span>
                </p>
            </div>

            <!-- Konfirmasi Password Floating Label -->
            <div class="space-y-1">
                <div class="relative">
                    <input 
                        :type="showConfirmPassword ? 'text' : 'password'" 
                        id="password_confirmation_mobile"
                        name="password_confirmation" 
                        x-model="form.password_confirmation" 
                        @blur="validate('password_confirmation')" 
                        placeholder=" " 
                        required
                        class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-11 text-xs font-semibold text-stone-900 outline-none transition-all shadow-2xs placeholder-shown:border-stone-200/90"
                        :class="errors.password_confirmation ? '!border-rose-500 !bg-rose-50/20 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/10'"
                    >
                    <i class="ti ti-lock-check absolute left-3.5 top-1/2 -translate-y-1/2 text-lg pointer-events-none transition-colors" 
                       :class="errors.password_confirmation ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                    <label 
                        for="password_confirmation_mobile" 
                        class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                               peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                        :class="form.password_confirmation 
                            ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.password_confirmation ? 'text-rose-600' : 'text-stone-600')
                            : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.password_confirmation ? 'text-rose-500' : 'text-stone-400')"
                    >
                        Ulangi Kata Sandi <span class="text-rose-500">*</span>
                    </label>
                    <button 
                        type="button" 
                        @click="showConfirmPassword = !showConfirmPassword" 
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 hover:text-stone-600 focus:outline-none p-1.5"
                        aria-label="Tampilkan sandi"
                    >
                        <i class="ti text-base" :class="showConfirmPassword ? 'ti-eye-off' : 'ti-eye'"></i>
                    </button>
                </div>
                <p x-show="errors.password_confirmation" class="text-rose-600 text-[11px] font-bold mt-1 flex items-center gap-1 font-poppins">
                    <i class="ti ti-alert-circle text-xs shrink-0"></i>
                    <span x-text="errors.password_confirmation"></span>
                </p>
            </div>

            <!-- Terms Checkbox -->
            <div class="flex items-start gap-2 pt-1">
                <input 
                    type="checkbox" 
                    id="terms_mobile" 
                    required 
                    class="w-4 h-4 mt-0.5 rounded text-[#062d27] border-stone-300 focus:ring-[#062d27] cursor-pointer"
                >
                <label for="terms_mobile" class="text-[11px] text-stone-600 leading-tight font-medium cursor-pointer select-none font-poppins">
                    Saya menyetujui seluruh ketentuan & prosedur seleksi SPMB Pesantren Al Amin.
                </label>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full mt-2 py-4 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black text-xs rounded-2xl shadow-lg shadow-lime-500/20 transition-all flex items-center justify-center gap-2 font-poppins active:scale-[0.98]"
            >
                <span>Daftar Calon Santri Sekarang</span>
                <i class="ti ti-arrow-right text-base font-bold"></i>
            </button>
        </form>

        <!-- Helpdesk WhatsApp Action -->
        <div class="mt-6 text-center">
            <a 
                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->telepon ?? '') }}?text=Halo%20Panitia%20SPMB,%20saya%20butuh%20bantuan%20pendaftaran%20santri%20baru" 
                target="_blank"
                class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-white border border-stone-200 text-[11px] font-bold text-stone-600 hover:text-emerald-800 shadow-2xs active:scale-95 transition-all font-poppins"
            >
                <i class="ti ti-brand-whatsapp text-base text-emerald-600"></i>
                <span>Butuh bantuan? Chat Panitia SPMB</span>
            </a>
        </div>
    </div>

    <!-- Footer Copyright -->
    <footer class="pt-6 text-center text-[11px] text-stone-400 font-medium font-poppins">
        &copy; {{ date('Y') }} {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}
    </footer>

</div>
@endsection
