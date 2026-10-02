@extends('layouts.auth')

@section('title', 'Masuk Akun SPMB - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Al Amin'))
@section('meta_description', 'Masuk ke portal pendaftaran santri baru SPMB Pesantren Persatuan Islam 80 Al Amin.')

@section('content')
<div class="min-h-[100dvh] bg-[#faf9f6] flex flex-col justify-between font-sans selection:bg-[#bef264] selection:text-[#062d27] pb-6">
    
    <!-- Top App Bar (Sticky Native Green Style) -->
    <header class="sticky top-0 z-30 bg-[#062d27] px-4 pt-4 pb-3 flex items-center justify-between border-b border-emerald-900/80 shadow-md">
        <a href="/" class="w-10 h-10 rounded-2xl bg-white/10 hover:bg-white/15 border border-white/15 shadow-sm flex items-center justify-center text-white active:scale-90 transition-transform">
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

        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->telepon ?? '') }}?text=Halo%20Panitia%20SPMB,%20saya%20butuh%20bantuan%20login" 
           target="_blank" 
           class="w-10 h-10 rounded-2xl bg-[#bef264]/20 hover:bg-[#bef264]/30 border border-[#bef264]/30 flex items-center justify-center text-[#bef264] active:scale-90 transition-transform shadow-sm">
            <i class="ti ti-brand-whatsapp text-lg"></i>
        </a>
    </header>

    <!-- Main Container -->
    <div 
        class="flex-1 px-5 pt-4 max-w-sm w-full mx-auto flex flex-col justify-center"
        x-data="{
            form: { username: '{{ old('username') }}', password: '' },
            showPassword: false,
            errors: {},
            validate(field) {
                this.errors[field] = '';
                if (!this.form[field]) this.errors[field] = 'Kolom ini wajib diisi.';
            },
            submit(e) {
                this.validate('username');
                this.validate('password');
                if (this.errors.username || this.errors.password) e.preventDefault();
            }
        }"
    >
        <!-- Segmented Tab Switcher (Native App Style) -->
        <div class="bg-stone-200/70 p-1 rounded-2xl flex gap-1 mb-5">
            <a href="/login" class="flex-1 py-2.5 text-center text-xs font-bold rounded-xl bg-white text-[#062d27] shadow-xs font-poppins transition-all">
                Masuk Akun
            </a>
            <a href="/register" class="flex-1 py-2.5 text-center text-xs font-bold rounded-xl text-stone-500 hover:text-stone-800 font-poppins transition-all">
                Daftar Baru
            </a>
        </div>

        <!-- Heading Section (Exact Desktop Typography & Style) -->
        <div class="mb-5">
            <div class="inline-flex items-center gap-2 bg-[#062d27] text-[#bef264] px-3.5 py-1 rounded-full text-xs font-bold mb-2.5 font-poppins shadow-xs">
                <i class="ti ti-login text-sm"></i>
                <span>Akun Calon Santri</span>
            </div>

            <h1 class="text-2xl font-black text-[#062d27] font-poppins leading-tight tracking-tight">
                Sistem Penerimaan Murid Baru (SPMB)
            </h1>
            <p class="text-xs text-stone-500 font-normal mt-1.5 leading-relaxed">
                Gunakan <strong>Nomor Registrasi</strong> (contoh: OL...) atau <strong>Email</strong> yang terdaftar.
            </p>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-4 p-3.5 bg-emerald-50 border border-emerald-200/80 rounded-2xl flex items-start gap-2.5 shadow-xs">
                <i class="ti ti-circle-check text-emerald-700 text-lg shrink-0 mt-0.5"></i>
                <div>
                    <h5 class="text-xs font-bold text-emerald-950 font-poppins">Pemberitahuan</h5>
                    <p class="text-xs text-emerald-800 font-medium leading-relaxed">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-3.5 bg-rose-50 border border-rose-200/80 rounded-2xl flex items-start gap-2.5 shadow-xs">
                <i class="ti ti-alert-triangle text-rose-600 text-lg shrink-0 mt-0.5"></i>
                <div>
                    <h5 class="text-xs font-bold text-rose-950 font-poppins">Gagal Masuk</h5>
                    <p class="text-xs text-rose-700 font-medium leading-relaxed">{{ $errors->first() }}</p>
                </div>
            </div>
        @endif

        <!-- Form Elements -->
        <form action="/login" method="POST" class="space-y-4" @submit="submit" novalidate>
            @csrf
            
            <!-- No. Register / Email Floating Label -->
            <div class="space-y-1">
                <div class="relative">
                    <input 
                        type="text" 
                        id="username_mobile"
                        name="username" 
                        x-model="form.username" 
                        @blur="validate('username')" 
                        placeholder=" " 
                        required
                        class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-4 text-xs font-semibold text-stone-900 outline-none transition-all shadow-2xs placeholder-shown:border-stone-200/90"
                        :class="errors.username ? '!border-rose-500 !bg-rose-50/20 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/10'"
                    >
                    <i class="ti ti-id absolute left-3.5 top-1/2 -translate-y-1/2 text-lg pointer-events-none transition-colors" 
                       :class="errors.username ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                    <label 
                        for="username_mobile" 
                        class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                               peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                        :class="form.username 
                            ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.username ? 'text-rose-600' : 'text-stone-600')
                            : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.username ? 'text-rose-500' : 'text-stone-400')"
                    >
                        Nomor Registrasi / Email <span class="text-rose-500">*</span>
                    </label>
                </div>
                <p x-show="errors.username" class="text-rose-600 text-[11px] font-bold mt-1 flex items-center gap-1 font-poppins">
                    <i class="ti ti-alert-circle text-xs shrink-0"></i>
                    <span x-text="errors.username"></span>
                </p>
            </div>

            <!-- Password Floating Label -->
            <div class="space-y-1">
                <div class="relative">
                    <input 
                        :type="showPassword ? 'text' : 'password'" 
                        id="password_mobile"
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
                        for="password_mobile" 
                        class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                               peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                        :class="form.password 
                            ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.password ? 'text-rose-600' : 'text-stone-600')
                            : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.password ? 'text-rose-500' : 'text-stone-400')"
                    >
                        Kata Sandi <span class="text-rose-500">*</span>
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

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between pt-0.5">
                <div class="flex items-center gap-2">
                    <input 
                        type="checkbox" 
                        name="remember" 
                        id="remember_mobile" 
                        class="w-4 h-4 rounded text-[#062d27] border-stone-300 focus:ring-[#062d27] cursor-pointer"
                    >
                    <label for="remember_mobile" class="text-xs font-medium text-stone-600 cursor-pointer select-none font-poppins">
                        Ingat sesi saya
                    </label>
                </div>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->telepon ?? '') }}?text=Halo%20Admin%20SPMB,%20saya%20lupa%20kata%20sandi%20akun%20pendaftaran" target="_blank" class="text-[11px] font-bold text-emerald-800 hover:text-emerald-950 font-poppins">
                    Lupa Sandi?
                </a>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full py-4 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black text-xs rounded-2xl shadow-lg shadow-lime-500/20 transition-all flex items-center justify-center gap-2 font-poppins active:scale-[0.98]"
            >
                <span>Masuk ke Dashboard SPMB</span>
                <i class="ti ti-arrow-right text-base font-bold"></i>
            </button>
        </form>

        <!-- Helpdesk WhatsApp Action -->
        <div class="mt-6 text-center">
            <a 
                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->telepon ?? '') }}?text=Halo%20Panitia%20SPMB,%20saya%20butuh%20bantuan%20login%20portal" 
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
