@extends('layouts.auth')

@section('title', 'Masuk Akun PPDB - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Al Amin'))
@section('meta_description', 'Portal login pendaftaran santri baru SPMB ' . ($pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin') . ' Sindangkasih Ciamis.')

@section('content')
<div class="min-h-screen flex items-stretch font-sans bg-[#faf9f6]">
    
    <!-- Left Column: Branding & Portal Info (Desktop lg:flex) -->
    <div class="hidden lg:flex lg:w-1/2 bg-[#062d27] relative items-center justify-center p-12 lg:p-16 overflow-hidden text-white border-r border-emerald-900/60">
        <!-- Background Overlay Image -->
        @if($pengaturan && $pengaturan->background_login)
            <div class="absolute inset-0 z-0 pointer-events-none opacity-25">
                <img 
                    src="{{ $pengaturan->getAdminImageUrl($pengaturan->background_login) }}" 
                    class="w-full h-full object-cover grayscale mix-blend-luminosity scale-105" 
                    alt="Background Pesantren"
                >
                <div class="absolute inset-0 bg-gradient-to-br from-[#062d27] via-[#062d27]/90 to-[#062d27]/75"></div>
            </div>
        @endif

        <!-- Ambient Glow Elements -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#bef264]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-lg space-y-8" data-aos="fade-right">
            
            <!-- Top Back to Home Button -->
            <a href="/" class="inline-flex items-center gap-2 text-xs font-bold text-emerald-200 hover:text-white bg-white/10 hover:bg-white/15 px-4 py-2 rounded-xl border border-white/15 transition-all font-poppins">
                <i class="ti ti-arrow-left text-sm"></i>
                <span>Kembali ke Beranda</span>
            </a>

            <!-- Logo & Heading -->
            <div>
                <div class="flex items-center gap-3.5 mb-6">
                    <div class="w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-md p-2 flex items-center justify-center border border-white/20 shadow-xl">
                        <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/80?text=Logo' }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <div class="text-xs font-bold text-[#bef264] font-montserrat">Penerimaan Santri Baru</div>
                        <div class="text-base font-bold text-white font-montserrat leading-tight">{{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}</div>
                    </div>
                </div>

                <h1 class="text-3xl sm:text-4xl font-black font-poppins leading-[1.2] text-white tracking-tight mb-4">
                    Sistem Penerimaan <br>
                    <span class="text-[#bef264]">Murid Baru (SPMB)</span>
                </h1>

                <p class="text-emerald-100/80 text-sm sm:text-base leading-relaxed font-normal">
                    Silakan masuk untuk melengkapi biodata santri, mengunggah berkas persyaratan, mencetak kartu tes seleksi, dan memantau pengumuman kelulusan.
                </p>
            </div>

            <!-- 3 Highlights -->
            <div class="space-y-4 pt-2">
                <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-emerald-900/40 border border-emerald-800/60 backdrop-blur-sm">
                    <div class="w-10 h-10 rounded-xl bg-[#bef264] text-[#062d27] flex items-center justify-center shrink-0 font-bold text-lg shadow-sm">
                        <i class="ti ti-id"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white font-poppins mb-0.5">Cetak Kartu Ujian & Formulir</h4>
                        <p class="text-emerald-200/70 text-xs leading-relaxed">Unduh kartu peserta tes seleksi dan berkas pendaftaran kapan saja.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-emerald-900/40 border border-emerald-800/60 backdrop-blur-sm">
                    <div class="w-10 h-10 rounded-xl bg-emerald-700 text-white flex items-center justify-center shrink-0 font-bold text-lg border border-emerald-500/30 shadow-sm">
                        <i class="ti ti-shield-check"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white font-poppins mb-0.5">Data Terverifikasi & Aman</h4>
                        <p class="text-emerald-200/70 text-xs leading-relaxed">Sistem terintegrasi langsung dengan panitia SPMB dan unit madrasah.</p>
                    </div>
                </div>
            </div>

            <!-- Footer Quote -->
            <div class="pt-4 border-t border-emerald-800/60 text-xs text-emerald-200/60 font-montserrat">
                <span>© {{ date('Y') }} {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}</span>
            </div>

        </div>
    </div>

    <!-- Right Column: Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10 lg:p-14 relative overflow-hidden">
        
        <!-- Subtle Ambient Canvas Accents -->
        <div class="absolute -top-28 -right-28 w-80 h-80 bg-emerald-700/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-28 -left-28 w-80 h-80 bg-[#bef264]/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="w-full max-w-md relative z-10" data-aos="fade-left">

            <!-- Form Header (Seamless unboxed) -->
            <div class="mb-6">
                <div class="inline-flex items-center gap-2 bg-[#062d27] text-[#bef264] px-3.5 py-1 rounded-full text-xs font-bold mb-3 font-poppins shadow-xs">
                    <i class="ti ti-login text-sm"></i>
                    <span>Akun Calon Santri</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-black text-[#062d27] font-poppins leading-tight tracking-tight mb-2">
                    Sistem Penerimaan Murid Baru (SPMB)
                </h2>
                <p class="text-stone-500 text-xs sm:text-sm font-normal leading-relaxed">
                    Gunakan <strong>Nomor Registrasi</strong> (contoh: OL...) atau <strong>Email</strong> yang terdaftar.
                </p>
            </div>

            <!-- Main Form (Seamless Unboxed Flow) -->
            <div 
                class="w-full"
                x-data="{
                    form: { username: '{{ old('username') }}', password: '' },
                    showPassword: false,
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
                }"
            >
                
                <!-- Success Message Flash -->
                @if(session('success'))
                    <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-start gap-3">
                        <i class="ti ti-circle-check text-emerald-600 text-xl shrink-0 mt-0.5"></i>
                        <div>
                            <h5 class="text-xs font-bold text-emerald-900 font-poppins">Pemberitahuan</h5>
                            <p class="text-xs text-emerald-800 leading-relaxed font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Server Errors Flash -->
                @if($errors->any())
                    <div class="mb-5 p-4 bg-rose-50 border border-rose-200 rounded-2xl flex items-start gap-3">
                        <i class="ti ti-alert-triangle text-rose-500 text-xl shrink-0 mt-0.5"></i>
                        <div>
                            <h5 class="text-xs font-bold text-rose-900 font-poppins">Gagal Masuk</h5>
                            <p class="text-xs text-rose-700 leading-relaxed font-medium">{{ $errors->first() }}</p>
                        </div>
                    </div>
                @endif

                <form action="/login" method="POST" class="space-y-5" @submit="submit" novalidate>
                    @csrf
                    
                    <!-- Username / Nomor Register / Email Floating Label -->
                    <div class="space-y-1.5">
                        <div class="relative">
                            <input 
                                type="text" 
                                id="username_desktop"
                                name="username" 
                                x-model="form.username" 
                                @blur="validate('username')" 
                                placeholder=" " 
                                required
                                class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-4 text-xs sm:text-sm font-semibold text-stone-800 outline-none transition-all shadow-2xs placeholder-shown:border-stone-200/90"
                                :class="errors.username ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 hover:border-emerald-700/50 focus:bg-white focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/5'"
                            >
                            <i class="ti ti-id absolute left-4 top-1/2 -translate-y-1/2 text-lg transition-colors pointer-events-none" 
                               :class="errors.username ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                            <label 
                                for="username_desktop"
                                class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                                       peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                                :class="form.username 
                                    ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.username ? 'text-rose-600' : 'text-stone-600')
                                    : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.username ? 'text-rose-500' : 'text-stone-400')"
                            >
                                Nomor Registrasi / Alamat Email <span class="text-rose-500">*</span>
                            </label>
                        </div>
                        <p x-show="errors.username" class="text-rose-600 text-xs font-bold mt-1 flex items-center gap-1 font-poppins">
                            <i class="ti ti-alert-circle text-sm shrink-0"></i>
                            <span x-text="errors.username"></span>
                        </p>
                    </div>

                    <!-- Password Floating Label -->
                    <div class="space-y-1.5">
                        <div class="relative">
                            <input 
                                :type="showPassword ? 'text' : 'password'" 
                                id="password_desktop"
                                name="password" 
                                x-model="form.password" 
                                @blur="validate('password')" 
                                placeholder=" " 
                                required
                                class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-12 text-xs sm:text-sm font-semibold text-stone-800 outline-none transition-all shadow-2xs placeholder-shown:border-stone-200/90"
                                :class="errors.password ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 hover:border-emerald-700/50 focus:bg-white focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/5'"
                            >
                            <i class="ti ti-lock absolute left-4 top-1/2 -translate-y-1/2 text-lg transition-colors pointer-events-none" 
                               :class="errors.password ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                            <label 
                                for="password_desktop"
                                class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                                       peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                                :class="form.password 
                                    ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.password ? 'text-rose-600' : 'text-stone-600')
                                    : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.password ? 'text-rose-500' : 'text-stone-400')"
                            >
                                Kata Sandi (Password) <span class="text-rose-500">*</span>
                            </label>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center gap-1.5">
                                <button 
                                    type="button" 
                                    @click="showPassword = !showPassword" 
                                    class="text-stone-400 hover:text-stone-600 focus:outline-none transition-colors p-1"
                                    aria-label="Tampilkan sandi"
                                >
                                    <i class="ti text-base" :class="showPassword ? 'ti-eye-off' : 'ti-eye'"></i>
                                </button>
                            </div>
                        </div>
                        <p x-show="errors.password" class="text-rose-600 text-xs font-bold mt-1 flex items-center gap-1 font-poppins">
                            <i class="ti ti-alert-circle text-sm shrink-0"></i>
                            <span x-text="errors.password"></span>
                        </p>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between pt-0.5">
                        <div class="flex items-center gap-2">
                            <input 
                                type="checkbox" 
                                name="remember" 
                                id="remember" 
                                class="w-4 h-4 rounded text-[#062d27] border-stone-300 focus:ring-[#062d27] cursor-pointer"
                            >
                            <label for="remember" class="text-xs text-stone-600 font-medium cursor-pointer">
                                Ingat sesi saya di perangkat ini
                            </label>
                        </div>
                        <a href="https://wa.me/{{ $pengaturan->telepon ?? '' }}?text=Halo%20Admin%20SPMB,%20saya%20lupa%20kata%20sandi%20akun%20pendaftar%20saya" target="_blank" class="text-xs font-bold text-emerald-800 hover:text-emerald-950 font-poppins">
                            Lupa Sandi?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black py-4 rounded-2xl shadow-lg shadow-lime-500/20 active:scale-[0.98] transition-all text-xs sm:text-sm flex items-center justify-center gap-2 font-poppins group"
                    >
                        <span>Masuk ke Dashboard PPDB</span>
                        <i class="ti ti-arrow-right text-base group-hover:translate-x-1 transition-transform"></i>
                    </button>

                </form>

                <!-- Switch to Register -->
                <div class="mt-6 pt-5 border-t border-stone-200/70 text-center">
                    <p class="text-xs text-stone-600 font-medium">
                        Belum mendaftarkan calon santri?
                    </p>
                    <a 
                        href="/register" 
                        class="inline-flex items-center gap-1.5 text-xs font-black text-[#062d27] hover:text-emerald-800 mt-1.5 font-poppins group"
                    >
                        <span>Daftar Calon Santri Baru (SPMB)</span>
                        <i class="ti ti-arrow-right text-xs group-hover:translate-x-0.5 transition-transform"></i>
                    </a>
                </div>

            </div>

            <!-- Helpdesk Shortcut -->
            <div class="mt-6 text-center">
                <a 
                    href="https://wa.me/{{ $pengaturan->telepon ?? '' }}?text=Halo%20Admin%20SPMB,%20saya%20mengalami%20kendala%20saat%20masuk%20ke%20akun%20PPDB" 
                    target="_blank"
                    class="inline-flex items-center gap-2 text-xs font-semibold text-stone-500 hover:text-emerald-800 transition-colors"
                >
                    <i class="ti ti-headset text-sm text-[#062d27]"></i>
                    <span>Butuh bantuan pendaftaran? Hubungi Panitia via WhatsApp</span>
                </a>
            </div>

        </div>

    </div>

</div>
@endsection
