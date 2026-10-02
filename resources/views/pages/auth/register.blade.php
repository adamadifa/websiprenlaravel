@extends('layouts.auth')

@section('title', 'Pendaftaran Santri Baru (SPMB) - ' . ($pengaturan->nama_sekolah ?? 'Pesantren Al Amin'))
@section('meta_description', 'Formulir pendaftaran online santri baru PPDB ' . ($pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin') . ' Sindangkasih Ciamis.')

@section('content')
<div class="min-h-screen flex items-stretch font-sans bg-[#faf9f6]">
    
    <!-- Left Column: Branding & Value Proposition (Desktop lg:flex) -->
    <div class="hidden lg:flex lg:w-5/12 bg-[#062d27] relative items-center justify-center p-12 lg:p-14 overflow-hidden text-white border-r border-emerald-900/60">
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

        <!-- Ambient Glow Circles -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#bef264]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-md space-y-7" data-aos="fade-right">
            
            <!-- Top Back to Home Button -->
            <a href="/" class="inline-flex items-center gap-2 text-xs font-bold text-emerald-200 hover:text-white bg-white/10 hover:bg-white/15 px-4 py-2 rounded-xl border border-white/15 transition-all font-poppins">
                <i class="ti ti-arrow-left text-sm"></i>
                <span>Kembali ke Beranda</span>
            </a>

            <!-- Logo & Heading -->
            <div>
                <div class="flex items-center gap-3.5 mb-5">
                    <div class="w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-md p-2 flex items-center justify-center border border-white/20 shadow-xl">
                        <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/80?text=Logo' }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <div class="text-xs font-bold text-[#bef264] font-montserrat">Penerimaan Santri Baru</div>
                        <div class="text-base font-bold text-white font-montserrat leading-tight">{{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}</div>
                    </div>
                </div>

                <h1 class="text-3xl font-black font-poppins leading-[1.2] text-white tracking-tight mb-3">
                    Sistem Penerimaan <br>
                    <span class="text-[#bef264]">Murid Baru (SPMB)</span>
                </h1>

                <p class="text-emerald-100/80 text-xs sm:text-sm leading-relaxed font-normal">
                    Pendaftaran santri baru dilakukan secara digital dengan proses cepat, transparan, dan terintegrasi langsung dengan panitia seleksi.
                </p>
            </div>

            <!-- Steps / Benefits -->
            <div class="space-y-3.5 pt-1">
                <div class="flex items-start gap-3 p-3 rounded-2xl bg-emerald-900/40 border border-emerald-800/60 backdrop-blur-sm">
                    <div class="w-8 h-8 rounded-xl bg-[#bef264] text-[#062d27] flex items-center justify-center shrink-0 font-bold text-sm shadow-sm font-poppins">
                        1
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-white font-poppins mb-0.5">Isi Data Calon Santri</h4>
                        <p class="text-emerald-200/70 text-[11px] leading-relaxed">Cukup 3 menit untuk melengkapi data dasar awal pendaftaran.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-3 rounded-2xl bg-emerald-900/40 border border-emerald-800/60 backdrop-blur-sm">
                    <div class="w-8 h-8 rounded-xl bg-emerald-700 text-white flex items-center justify-center shrink-0 font-bold text-sm border border-emerald-500/30 shadow-sm font-poppins">
                        2
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-white font-poppins mb-0.5">Dapatkan Nomor Registrasi</h4>
                        <p class="text-emerald-200/70 text-[11px] leading-relaxed">Nomor registrasi unik otomatis dibuat untuk login dan mencetak kartu tes.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-3 rounded-2xl bg-emerald-900/40 border border-emerald-800/60 backdrop-blur-sm">
                    <div class="w-8 h-8 rounded-xl bg-emerald-700 text-white flex items-center justify-center shrink-0 font-bold text-sm border border-emerald-500/30 shadow-sm font-poppins">
                        3
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-white font-poppins mb-0.5">Tes & Verifikasi Berkas</h4>
                        <p class="text-emerald-200/70 text-[11px] leading-relaxed">Ikuti tes seleksi dan pantau pengumuman kelulusan secara online.</p>
                    </div>
                </div>
            </div>

            <!-- Footer Quote -->
            <div class="pt-3 border-t border-emerald-800/60 text-xs text-emerald-200/60 font-montserrat">
                <span>© {{ date('Y') }} {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}</span>
            </div>

        </div>
    </div>

    <!-- Right Column: Registration Form -->
    <div class="w-full lg:w-7/12 flex items-center justify-center p-6 sm:p-10 lg:p-14 relative overflow-y-auto">
        
        <!-- Subtle Ambient Canvas Accents -->
        <div class="absolute -top-28 -right-28 w-80 h-80 bg-emerald-700/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-28 -left-28 w-80 h-80 bg-[#bef264]/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="w-full max-w-xl relative z-10 my-auto" data-aos="fade-left">

            <!-- Form Header (Seamless unboxed) -->
            <div class="mb-5">
                <div class="inline-flex items-center gap-2 bg-[#062d27] text-[#bef264] px-3.5 py-1 rounded-full text-xs font-bold mb-2 font-poppins shadow-xs">
                    <i class="ti ti-user-plus text-sm"></i>
                    <span>Registrasi Santri Baru</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-black text-[#062d27] font-poppins leading-tight tracking-tight mb-1.5">
                    Sistem Penerimaan Murid Baru (SPMB)
                </h2>
                <p class="text-stone-500 text-xs sm:text-sm font-normal leading-relaxed">
                    Lengkapi data awal pendaftar di bawah ini dengan benar.
                </p>
            </div>

            <!-- Main Form (Seamless Unboxed Flow) -->
            <div 
                class="w-full"
                x-data="{
                    form: {
                        name: '{{ old('name') }}',
                        jenis_kelamin: '{{ old('jenis_kelamin') }}',
                        kode_unit: '{{ old('kode_unit') }}',
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
                            if (!emailRegex.test(this.form.email)) {
                                this.errors[field] = 'Format email tidak valid.';
                            }
                        }
                        if (field === 'no_hp') {
                            const phoneRegex = /^[0-9]{9,16}$/;
                            if (!phoneRegex.test(this.form.no_hp)) {
                                this.errors[field] = 'Nomor WhatsApp tidak valid (9-16 digit).';
                            }
                        }
                        if (field === 'password' && this.form.password.length < 8) {
                            this.errors[field] = 'Password minimal 8 karakter.';
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
                
                <!-- Server Errors Flash -->
                @if(session('error'))
                    <div class="mb-5 p-4 bg-rose-50 border border-rose-200 rounded-2xl flex items-start gap-3">
                        <i class="ti ti-alert-triangle text-rose-500 text-xl shrink-0 mt-0.5"></i>
                        <div>
                            <h5 class="text-xs font-bold text-rose-900 font-poppins">Gagal Mendaftar</h5>
                            <p class="text-xs text-rose-700 leading-relaxed font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-5 p-4 bg-rose-50 border border-rose-200 rounded-2xl flex items-start gap-3">
                        <i class="ti ti-alert-triangle text-rose-500 text-xl shrink-0 mt-0.5"></i>
                        <div>
                            <h5 class="text-xs font-bold text-rose-900 font-poppins">Periksa Kembali Data Anda</h5>
                            <ul class="text-xs text-rose-700 list-disc list-inside mt-1 font-medium space-y-0.5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST" class="space-y-4" @submit="submit" novalidate>
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        <!-- Nama Lengkap Santri Floating Label -->
                        <div class="md:col-span-2 space-y-1.5">
                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="name_desktop"
                                    name="name" 
                                    x-model="form.name" 
                                    @blur="validate('name')" 
                                    placeholder=" " 
                                    required
                                    class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-4 text-xs sm:text-sm font-semibold text-stone-800 outline-none transition-all shadow-2xs placeholder-shown:border-stone-200/90"
                                    :class="errors.name ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 hover:border-emerald-700/50 focus:bg-white focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/5'"
                                >
                                <i class="ti ti-user absolute left-4 top-1/2 -translate-y-1/2 text-lg transition-colors pointer-events-none" 
                                   :class="errors.name ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                                <label 
                                    for="name_desktop"
                                    class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                                           peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                                    :class="form.name 
                                        ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.name ? 'text-rose-600' : 'text-stone-600')
                                        : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.name ? 'text-rose-500' : 'text-stone-400')"
                                >
                                    Nama Lengkap Calon Santri <span class="text-rose-500">*</span>
                                </label>
                            </div>
                            <p x-show="errors.name" class="text-rose-600 text-xs font-bold mt-1 flex items-center gap-1 font-poppins">
                                <i class="ti ti-alert-circle text-sm shrink-0"></i>
                                <span x-text="errors.name"></span>
                            </p>
                        </div>

                        <!-- Pilihan Jenjang Pendidikan Floating Label -->
                        <div class="space-y-1.5">
                            <div class="relative">
                                <select 
                                    id="kode_unit_desktop"
                                    name="kode_unit" 
                                    x-model="form.kode_unit" 
                                    @change="validate('kode_unit')" 
                                    required
                                    class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-10 text-xs sm:text-sm font-semibold text-stone-800 outline-none transition-all shadow-2xs appearance-none cursor-pointer"
                                    :class="errors.kode_unit ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 hover:border-emerald-700/50 focus:bg-white focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/5'"
                                >
                                    <option value="" disabled selected hidden></option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->kode_unit }}">{{ $unit->nama_unit }}</option>
                                    @endforeach
                                </select>
                                <i class="ti ti-school absolute left-4 top-1/2 -translate-y-1/2 text-lg transition-colors pointer-events-none" 
                                   :class="errors.kode_unit ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                                <i class="ti ti-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none"></i>
                                <label 
                                    for="kode_unit_desktop"
                                    class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                                           peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                                    :class="form.kode_unit 
                                        ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.kode_unit ? 'text-rose-600' : 'text-stone-600')
                                        : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.kode_unit ? 'text-rose-500' : 'text-stone-400')"
                                >
                                    Pilihan Unit / Jenjang <span class="text-rose-500">*</span>
                                </label>
                            </div>
                            <p x-show="errors.kode_unit" class="text-rose-600 text-xs font-bold mt-1 flex items-center gap-1 font-poppins">
                                <i class="ti ti-alert-circle text-sm shrink-0"></i>
                                <span x-text="errors.kode_unit"></span>
                            </p>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-stone-700 font-poppins mb-1.5" :class="errors.jenis_kelamin ? 'text-rose-600' : ''">
                                Jenis Kelamin <span class="text-rose-500">*</span>
                            </label>
                            <div class="grid grid-cols-2 gap-2 h-[48px]">
                                <label 
                                    class="flex items-center justify-center gap-1.5 rounded-2xl border cursor-pointer transition-all text-xs font-bold font-poppins shadow-2xs"
                                    :class="form.jenis_kelamin === 'L' ? 'bg-[#062d27] border-[#062d27] text-[#bef264] shadow-sm' : (errors.jenis_kelamin ? '!border-rose-500 !bg-rose-50/30 text-rose-800' : 'bg-white border-stone-200/90 text-stone-600 hover:bg-stone-50')"
                                >
                                    <input type="radio" name="jenis_kelamin" value="L" x-model="form.jenis_kelamin" @change="validate('jenis_kelamin')" class="hidden">
                                    <i class="ti ti-gender-male text-base"></i>
                                    <span>Laki-laki</span>
                                </label>

                                <label 
                                    class="flex items-center justify-center gap-1.5 rounded-2xl border cursor-pointer transition-all text-xs font-bold font-poppins shadow-2xs"
                                    :class="form.jenis_kelamin === 'P' ? 'bg-[#062d27] border-[#062d27] text-[#bef264] shadow-sm' : (errors.jenis_kelamin ? '!border-rose-500 !bg-rose-50/30 text-rose-800' : 'bg-white border-stone-200/90 text-stone-600 hover:bg-stone-50')"
                                >
                                    <input type="radio" name="jenis_kelamin" value="P" x-model="form.jenis_kelamin" @change="validate('jenis_kelamin')" class="hidden">
                                    <i class="ti ti-gender-female text-base"></i>
                                    <span>Perempuan</span>
                                </label>
                            </div>
                            <p x-show="errors.jenis_kelamin" class="text-rose-600 text-xs font-bold mt-1 flex items-center gap-1 font-poppins">
                                <i class="ti ti-alert-circle text-sm shrink-0"></i>
                                <span x-text="errors.jenis_kelamin"></span>
                            </p>
                        </div>

                        <!-- Email Aktif Floating Label -->
                        <div class="space-y-1.5">
                            <div class="relative">
                                <input 
                                    type="email" 
                                    id="email_desktop"
                                    name="email" 
                                    x-model="form.email" 
                                    @blur="validate('email')" 
                                    placeholder=" " 
                                    required
                                    class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-4 text-xs sm:text-sm font-semibold text-stone-800 outline-none transition-all shadow-2xs placeholder-shown:border-stone-200/90"
                                    :class="errors.email ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 hover:border-emerald-700/50 focus:bg-white focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/5'"
                                >
                                <i class="ti ti-mail absolute left-4 top-1/2 -translate-y-1/2 text-lg transition-colors pointer-events-none" 
                                   :class="errors.email ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                                <label 
                                    for="email_desktop"
                                    class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                                           peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                                    :class="form.email 
                                        ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.email ? 'text-rose-600' : 'text-stone-600')
                                        : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.email ? 'text-rose-500' : 'text-stone-400')"
                                >
                                    Alamat Email Aktif <span class="text-rose-500">*</span>
                                </label>
                            </div>
                            <p x-show="errors.email" class="text-rose-600 text-xs font-bold mt-1 flex items-center gap-1 font-poppins">
                                <i class="ti ti-alert-circle text-sm shrink-0"></i>
                                <span x-text="errors.email"></span>
                            </p>
                        </div>

                        <!-- Nomor WhatsApp Floating Label -->
                        <div class="space-y-1.5">
                            <div class="relative">
                                <input 
                                    type="tel" 
                                    id="no_hp_desktop"
                                    name="no_hp" 
                                    x-model="form.no_hp" 
                                    @blur="validate('no_hp')" 
                                    placeholder=" " 
                                    required
                                    class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-4 text-xs sm:text-sm font-semibold text-stone-800 outline-none transition-all shadow-2xs font-mono placeholder-shown:border-stone-200/90"
                                    :class="errors.no_hp ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 hover:border-emerald-700/50 focus:bg-white focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/5'"
                                >
                                <i class="ti ti-brand-whatsapp absolute left-4 top-1/2 -translate-y-1/2 text-lg transition-colors pointer-events-none" 
                                   :class="errors.no_hp ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                                <label 
                                    for="no_hp_desktop"
                                    class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                                           peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                                    :class="form.no_hp 
                                        ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.no_hp ? 'text-rose-600' : 'text-stone-600')
                                        : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.no_hp ? 'text-rose-500' : 'text-stone-400')"
                                >
                                    No. WhatsApp Wali / Santri <span class="text-rose-500">*</span>
                                </label>
                            </div>
                            <p x-show="errors.no_hp" class="text-rose-600 text-xs font-bold mt-1 flex items-center gap-1 font-poppins">
                                <i class="ti ti-alert-circle text-sm shrink-0"></i>
                                <span x-text="errors.no_hp"></span>
                            </p>
                        </div>

                        <!-- Password Floating Label -->
                        <div class="space-y-1.5">
                            <div class="relative">
                                <input 
                                    :type="showPassword ? 'text' : 'password'" 
                                    id="password_reg_desktop"
                                    name="password" 
                                    x-model="form.password" 
                                    @blur="validate('password')" 
                                    placeholder=" " 
                                    required
                                    class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-11 text-xs sm:text-sm font-semibold text-stone-800 outline-none transition-all shadow-2xs placeholder-shown:border-stone-200/90"
                                    :class="errors.password ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 hover:border-emerald-700/50 focus:bg-white focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/5'"
                                >
                                <i class="ti ti-lock absolute left-4 top-1/2 -translate-y-1/2 text-lg transition-colors pointer-events-none" 
                                   :class="errors.password ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                                <label 
                                    for="password_reg_desktop"
                                    class="absolute left-11 pointer-events-none transition-all duration-200 font-poppins
                                           peer-focus:-top-2 peer-focus:left-3.5 peer-focus:bg-white peer-focus:px-1.5 peer-focus:text-[10px] peer-focus:font-bold peer-focus:text-[#062d27] peer-focus:translate-y-0 peer-focus:z-10"
                                    :class="form.password 
                                        ? '-top-2 left-3.5 bg-white px-1.5 text-[10px] font-bold translate-y-0 z-10 ' + (errors.password ? 'text-rose-600' : 'text-stone-600')
                                        : 'top-1/2 -translate-y-1/2 text-xs font-medium ' + (errors.password ? 'text-rose-500' : 'text-stone-400')"
                                >
                                    Buat Kata Sandi (Min 8 Karakter) <span class="text-rose-500">*</span>
                                </label>
                                <button 
                                    type="button" 
                                    @click="showPassword = !showPassword" 
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-stone-400 hover:text-stone-600 focus:outline-none p-1"
                                    aria-label="Tampilkan sandi"
                                >
                                    <i class="ti text-base" :class="showPassword ? 'ti-eye-off' : 'ti-eye'"></i>
                                </button>
                            </div>
                            <p x-show="errors.password" class="text-rose-600 text-xs font-bold mt-1 flex items-center gap-1 font-poppins">
                                <i class="ti ti-alert-circle text-sm shrink-0"></i>
                                <span x-text="errors.password"></span>
                            </p>
                        </div>

                        <!-- Konfirmasi Password Floating Label -->
                        <div class="space-y-1.5">
                            <div class="relative">
                                <input 
                                    :type="showConfirmPassword ? 'text' : 'password'" 
                                    id="password_conf_desktop"
                                    name="password_confirmation" 
                                    x-model="form.password_confirmation" 
                                    @blur="validate('password_confirmation')" 
                                    placeholder=" " 
                                    required
                                    class="peer block w-full bg-white border rounded-2xl py-3.5 pl-11 pr-11 text-xs sm:text-sm font-semibold text-stone-800 outline-none transition-all shadow-2xs placeholder-shown:border-stone-200/90"
                                    :class="errors.password_confirmation ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/90 hover:border-emerald-700/50 focus:bg-white focus:border-[#062d27] focus:ring-4 focus:ring-emerald-900/5'"
                                >
                                <i class="ti ti-lock-check absolute left-4 top-1/2 -translate-y-1/2 text-lg transition-colors pointer-events-none" 
                                   :class="errors.password_confirmation ? 'text-rose-500' : 'text-stone-400 peer-focus:text-[#062d27]'"></i>
                                <label 
                                    for="password_conf_desktop"
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
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-stone-400 hover:text-stone-600 focus:outline-none p-1"
                                    aria-label="Tampilkan sandi"
                                >
                                    <i class="ti text-base" :class="showConfirmPassword ? 'ti-eye-off' : 'ti-eye'"></i>
                                </button>
                            </div>
                            <p x-show="errors.password_confirmation" class="text-rose-600 text-xs font-bold mt-1 flex items-center gap-1 font-poppins">
                                <i class="ti ti-alert-circle text-sm shrink-0"></i>
                                <span x-text="errors.password_confirmation"></span>
                            </p>
                        </div>

                    </div>

                    <!-- Terms Checkbox -->
                    <div class="flex items-start gap-2 pt-2">
                        <input 
                            type="checkbox" 
                            id="terms" 
                            required 
                            class="w-4 h-4 mt-0.5 rounded text-[#062d27] border-stone-300 focus:ring-[#062d27] cursor-pointer"
                        >
                        <label for="terms" class="text-xs text-stone-600 leading-relaxed font-medium cursor-pointer">
                            Saya menyatakan data yang diisikan adalah benar dan menyetujui seluruh ketentuan seleksi SPMB Pesantren Al Amin.
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] font-black py-4 rounded-2xl shadow-lg shadow-lime-500/20 active:scale-[0.98] transition-all text-xs sm:text-sm flex items-center justify-center gap-2 font-poppins group"
                    >
                        <span>Daftar Santri Baru Sekarang</span>
                        <i class="ti ti-arrow-right text-base group-hover:translate-x-1 transition-transform"></i>
                    </button>

                </form>

                <!-- Switch to Login -->
                <div class="mt-5 pt-4 border-t border-stone-200/70 text-center">
                    <p class="text-xs text-stone-600 font-medium">
                        Sudah pernah mendaftar?
                    </p>
                    <a 
                        href="/login" 
                        class="inline-flex items-center gap-1.5 text-xs font-black text-[#062d27] hover:text-emerald-800 mt-1 font-poppins group"
                    >
                        <span>Masuk ke Akun Pendaftar</span>
                        <i class="ti ti-arrow-right text-xs group-hover:translate-x-0.5 transition-transform"></i>
                    </a>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection
