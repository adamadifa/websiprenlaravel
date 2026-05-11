@extends('layouts.auth')

@section('title', 'Masuk - Al Amin')

@section('content')
<div class="min-h-screen flex items-stretch font-sans">
    <!-- Left Column: Branding & Info -->
    <div class="hidden lg:flex lg:w-1/2 bg-teal-950 relative items-center justify-center p-12 overflow-hidden">
        <!-- Background Overlay from Settings -->
        <div class="absolute inset-0 z-0">
            @if($pengaturan && $pengaturan->background_login)
                <img src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                     class="w-full h-full object-cover opacity-30" 
                     alt="Background">
            @endif
            <div class="absolute inset-0 bg-gradient-to-br from-teal-950/80 via-teal-900/90 to-teal-950/80"></div>
        </div>
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-yellow-400/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-lg" data-aos="fade-right">
            <div class="mb-12">
                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/100?text=Logo' }}" alt="Logo" class="w-20 h-20 object-contain mb-8 filter drop-shadow-2xl">
                <h2 class="text-4xl font-black text-white leading-tight mb-6">
                    Selamat Datang <br> di <span class="text-yellow-400">Portal PPDB</span>
                </h2>
                <p class="text-teal-100/70 text-lg leading-relaxed">
                    Silakan masuk untuk melanjutkan proses pendaftaran, mencetak kartu, dan memantau status kelulusan santri.
                </p>
            </div>

            <div class="space-y-8">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center shrink-0 border border-white/10 text-yellow-400">
                        <i class="ti ti-login text-2xl"></i>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-1">Akses Mudah</h4>
                        <p class="text-teal-100/50 text-sm">Masuk menggunakan Nomor Registrasi atau Email Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Form -->
    <div class="w-full lg:w-1/2 bg-[#f4fcfb] flex items-center justify-center p-6 lg:p-12 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-teal-500/5 rounded-full blur-3xl -mr-48 -mt-48"></div>
        
        <div class="w-full max-w-lg relative z-10" data-aos="fade-left">
            <!-- Header Section -->
            <div class="mb-8 text-center">
                <div class="inline-flex p-3 rounded-full bg-teal-50 border border-teal-100 shadow-lg shadow-teal-900/5 mb-4">
                    <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/100?text=Logo' }}" alt="Logo" class="w-14 h-14 object-contain">
                </div>
                <h4 class="text-teal-900 font-bold text-base mb-0.5">{{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}</h4>
                <h2 class="text-2xl font-black text-teal-800 leading-tight mb-2">
                    Masuk Ke <span class="text-teal-600">Akun Pendaftar</span>
                </h2>
                <p class="text-gray-500 text-xs font-medium max-w-sm mx-auto leading-relaxed">
                    Masukkan kredensial Anda untuk mengakses dashboard pendaftaran.
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-xl shadow-teal-900/10 border border-teal-50 p-6 lg:p-10"
                 x-data="{
                    form: {
                        username: '',
                        password: ''
                    },
                    errors: {},
                    validate(field) {
                        this.errors[field] = '';
                        if (!this.form[field]) {
                            this.errors[field] = 'Kolom ini wajib diisi.';
                        }
                    },
                    submit(e) {
                        this.validate('username');
                        this.validate('password');
                        if (this.errors.username || this.errors.password) {
                            e.preventDefault();
                        }
                    }
                 }">
                
                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 rounded-xl flex items-start gap-3 animate-bounce">
                        <i class="ti ti-circle-check text-emerald-500 text-lg shrink-0"></i>
                        <p class="text-xs text-emerald-700 font-bold leading-relaxed">{{ session('success') }}</p>
                    </div>
                @endif

                <form action="/login" method="POST" class="space-y-6" @submit="submit" novalidate>
                    @csrf
                    
                    <!-- Username / Email -->
                    <div class="relative group">
                        <label class="absolute -top-2.5 left-4 px-2 bg-white text-xs font-bold text-gray-500 transition-all group-focus-within:text-teal-600 z-10"
                               :class="errors.username ? 'text-rose-500' : ''">Nomor Registrasi / Email</label>
                        <div class="relative flex items-center">
                            <i class="ti ti-user absolute left-4 group-focus-within:text-teal-600 transition-colors text-lg"
                               :class="errors.username ? 'text-rose-500' : 'text-gray-300'"></i>
                            <input type="text" name="username" x-model="form.username" @blur="validate('username')" placeholder="Contoh: OL..." required
                                class="w-full bg-white border rounded-xl py-4 pl-11 pr-4 text-sm font-bold text-teal-950 outline-none focus:ring-4 transition-all"
                                :class="errors.username ? 'border-rose-500 focus:ring-rose-500/5' : 'border-gray-200 focus:border-teal-500 focus:ring-teal-500/5'">
                        </div>
                        <p x-show="errors.username" x-text="errors.username" class="text-rose-500 text-[10px] mt-1 font-bold"></p>
                        @error('username') <p class="text-rose-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Password -->
                    <div class="relative group">
                        <label class="absolute -top-2.5 left-4 px-2 bg-white text-xs font-bold text-gray-500 transition-all group-focus-within:text-teal-600 z-10"
                               :class="errors.password ? 'text-rose-500' : ''">Password</label>
                        <div class="relative flex items-center">
                            <i class="ti ti-lock absolute left-4 group-focus-within:text-teal-600 transition-colors text-lg"
                               :class="errors.password ? 'text-rose-500' : 'text-gray-300'"></i>
                            <input type="password" name="password" x-model="form.password" @blur="validate('password')" placeholder="••••••••" required
                                class="w-full bg-white border rounded-xl py-4 pl-11 pr-4 text-sm font-bold text-teal-950 outline-none focus:ring-4 transition-all"
                                :class="errors.password ? 'border-rose-500 focus:ring-rose-500/5' : 'border-gray-200 focus:border-teal-500 focus:ring-teal-500/5'">
                        </div>
                        <p x-show="errors.password" x-text="errors.password" class="text-rose-500 text-[10px] mt-1 font-bold"></p>
                    </div>

                    <div class="flex items-center justify-between gap-3 pt-1">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded text-teal-600 border-gray-200 focus:ring-teal-500 cursor-pointer">
                            <label for="remember" class="text-xs text-gray-500 font-bold">Ingat Saya</label>
                        </div>
                        <a href="#" class="text-xs text-teal-600 font-bold hover:underline">Lupa Password?</a>
                    </div>

                    <button type="submit" 
                        class="w-full bg-teal-700 hover:bg-teal-800 text-white font-black py-4 rounded-xl shadow-lg shadow-teal-900/20 active:scale-[0.98] transition-all text-sm flex items-center justify-center gap-2 group">
                        <span>Masuk Sekarang</span>
                        <i class="ti ti-arrow-right text-lg group-hover:translate-x-1 transition-transform"></i>
                    </button>

                    <p class="text-center text-xs text-gray-400 font-bold pt-2">
                        Belum punya akun? <a href="/register" class="text-teal-600 underline">Daftar di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
