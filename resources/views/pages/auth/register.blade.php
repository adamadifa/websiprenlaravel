@extends('layouts.auth')

@section('title', 'Daftar Calon Santri Baru - Al Amin')

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
                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/100?text=Logo' }}" alt="Logo" class="w-24 h-24 object-contain mb-8 filter drop-shadow-2xl">
                <h2 class="text-4xl font-black text-white leading-tight mb-6">
                    Mulai <span class="text-yellow-400">Langkah Hebat</span> <br> Bersama Al Amin
                </h2>
                <p class="text-teal-100/70 text-lg leading-relaxed">
                    Sistem Penerimaan Murid Baru (SPMB) memudahkan Anda untuk mendaftarkan calon santri secara online, cepat, dan transparan.
                </p>
            </div>

            <div class="space-y-8">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center shrink-0 border border-white/10 text-yellow-400">
                        <i class="ti ti-checklist text-2xl"></i>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-1">Proses Cepat</h4>
                        <p class="text-teal-100/50 text-sm">Pendaftaran hanya butuh waktu kurang dari 5 menit.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center shrink-0 border border-white/10 text-yellow-400">
                        <i class="ti ti-shield-check text-2xl"></i>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-1">Data Aman</h4>
                        <p class="text-teal-100/50 text-sm">Privasi dan keamanan data calon santri terjamin sepenuhnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Form -->
    <div class="w-full lg:w-1/2 bg-[#f4fcfb] flex items-center justify-center p-6 lg:p-12 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-teal-500/5 rounded-full blur-3xl -mr-48 -mt-48"></div>
        
        <div class="w-full max-w-2xl relative z-10" data-aos="fade-left">
            <!-- Header Section -->
            <div class="mb-6 text-center">
                <div class="inline-flex p-3 rounded-full bg-teal-50 border border-teal-100 shadow-lg shadow-teal-900/5 mb-4">
                    <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : 'https://placehold.co/100?text=Logo' }}" alt="Logo" class="w-14 h-14 object-contain">
                </div>
                <h4 class="text-teal-900 font-bold text-base mb-0.5">{{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}</h4>
                <h2 class="text-2xl font-black text-teal-800 leading-tight mb-2">
                    Sistem Penerimaan <span class="text-teal-600">Murid Baru 2026/2027</span>
                </h2>
                <p class="text-gray-500 text-xs font-medium max-w-sm mx-auto leading-relaxed">
                    Isi data diri dengan lengkap dan benar untuk proses pendaftaran siswa baru.
                </p>
            </div>

            @if(session('error'))
                <div class="mb-4 p-3 bg-rose-50 border border-rose-100 rounded-xl flex items-start gap-3">
                    <i class="ti ti-alert-circle text-rose-500 text-lg shrink-0"></i>
                    <p class="text-xs text-rose-700 font-bold leading-relaxed">{{ session('error') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-xl shadow-teal-900/10 border border-teal-50 p-6 lg:p-10"
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
                            const phoneRegex = /^[0-9]{10,15}$/;
                            if (!phoneRegex.test(this.form.no_hp)) {
                                this.errors[field] = 'Nomor HP tidak valid (10-15 digit).';
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
                        Object.keys(this.form).forEach(field => this.validate(field));
                        if (Object.values(this.errors).some(error => error !== '')) {
                            e.preventDefault();
                        }
                    }
                 }">
                <form action="{{ route('register') }}" method="POST" class="space-y-5" @submit="submit" novalidate>
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-6">
                        <!-- Full Name -->
                        <div class="md:col-span-2 relative group">
                            <label class="absolute -top-2.5 left-4 px-2 bg-white text-xs font-bold text-gray-500 transition-all group-focus-within:text-teal-600 z-10"
                                   :class="errors.name ? 'text-rose-500' : ''">Nama Lengkap</label>
                            <div class="relative flex items-center">
                                <i class="ti ti-user absolute left-4 group-focus-within:text-teal-600 transition-colors text-lg"
                                   :class="errors.name ? 'text-rose-500' : 'text-gray-300'"></i>
                                <input type="text" name="name" x-model="form.name" @blur="validate('name')" placeholder="Nama Sesuai Ijazah" required
                                    class="w-full bg-white border rounded-xl py-3.5 pl-11 pr-4 text-sm font-bold text-teal-950 outline-none focus:ring-4 transition-all"
                                    :class="errors.name ? 'border-rose-500 focus:ring-rose-500/5' : 'border-gray-200 focus:border-teal-500 focus:ring-teal-500/5'">
                            </div>
                            <p x-show="errors.name" x-text="errors.name" class="text-rose-500 text-[10px] mt-1 font-bold"></p>
                            @error('name') <p class="text-rose-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Gender -->
                        <div class="relative group">
                            <label class="absolute -top-2.5 left-4 px-2 bg-white text-xs font-bold text-gray-500 transition-all group-focus-within:text-teal-600 z-10"
                                   :class="errors.jenis_kelamin ? 'text-rose-500' : ''">Jenis Kelamin</label>
                            <div class="relative flex items-center">
                                <i class="ti ti-gender-male absolute left-4 group-focus-within:text-teal-600 transition-colors text-lg"
                                   :class="errors.jenis_kelamin ? 'text-rose-500' : 'text-gray-300'"></i>
                                <select name="jenis_kelamin" x-model="form.jenis_kelamin" @change="validate('jenis_kelamin')" required
                                    class="w-full bg-white border rounded-xl py-3.5 pl-11 pr-4 text-sm font-bold text-teal-950 outline-none focus:ring-4 transition-all appearance-none"
                                    :class="errors.jenis_kelamin ? 'border-rose-500 focus:ring-rose-500/5' : 'border-gray-200 focus:border-teal-500 focus:ring-teal-500/5'">
                                    <option value="" disabled>Pilih jenis kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <i class="ti ti-chevron-down absolute right-4 text-gray-400 pointer-events-none"></i>
                            </div>
                            <p x-show="errors.jenis_kelamin" x-text="errors.jenis_kelamin" class="text-rose-500 text-[10px] mt-1 font-bold"></p>
                        </div>

                        <!-- Unit -->
                        <div class="relative group">
                            <label class="absolute -top-2.5 left-4 px-2 bg-white text-xs font-bold text-gray-500 transition-all group-focus-within:text-teal-600 z-10"
                                   :class="errors.kode_unit ? 'text-rose-500' : ''">Unit Pendidikan</label>
                            <div class="relative flex items-center">
                                <i class="ti ti-school absolute left-4 group-focus-within:text-teal-600 transition-colors text-lg"
                                   :class="errors.kode_unit ? 'text-rose-500' : 'text-gray-300'"></i>
                                <select name="kode_unit" x-model="form.kode_unit" @change="validate('kode_unit')" required
                                    class="w-full bg-white border rounded-xl py-3.5 pl-11 pr-4 text-sm font-bold text-teal-950 outline-none focus:ring-4 transition-all appearance-none"
                                    :class="errors.kode_unit ? 'border-rose-500 focus:ring-rose-500/5' : 'border-gray-200 focus:border-teal-500 focus:ring-teal-500/5'">
                                    <option value="" disabled>Pilih unit</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->kode_unit }}">{{ $unit->nama_unit }}</option>
                                    @endforeach
                                </select>
                                <i class="ti ti-chevron-down absolute right-4 text-gray-400 pointer-events-none"></i>
                            </div>
                            <p x-show="errors.kode_unit" x-text="errors.kode_unit" class="text-rose-500 text-[10px] mt-1 font-bold"></p>
                        </div>

                        <!-- Email -->
                        <div class="relative group">
                            <label class="absolute -top-2.5 left-4 px-2 bg-white text-xs font-bold text-gray-500 transition-all group-focus-within:text-teal-600 z-10"
                                   :class="errors.email ? 'text-rose-500' : ''">Email</label>
                            <div class="relative flex items-center">
                                <i class="ti ti-mail absolute left-4 group-focus-within:text-teal-600 transition-colors text-lg"
                                   :class="errors.email ? 'text-rose-500' : 'text-gray-300'"></i>
                                <input type="email" name="email" x-model="form.email" @blur="validate('email')" placeholder="contoh@email.com" required
                                    class="w-full bg-white border rounded-xl py-3.5 pl-11 pr-4 text-sm font-bold text-teal-950 outline-none focus:ring-4 transition-all"
                                    :class="errors.email ? 'border-rose-500 focus:ring-rose-500/5' : 'border-gray-200 focus:border-teal-500 focus:ring-teal-500/5'">
                            </div>
                            <p x-show="errors.email" x-text="errors.email" class="text-rose-500 text-[10px] mt-1 font-bold"></p>
                            @error('email') <p class="text-rose-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Phone -->
                        <div class="relative group">
                            <label class="absolute -top-2.5 left-4 px-2 bg-white text-xs font-bold text-gray-500 transition-all group-focus-within:text-teal-600 z-10"
                                   :class="errors.no_hp ? 'text-rose-500' : ''">Nomor HP</label>
                            <div class="relative flex items-center">
                                <i class="ti ti-brand-whatsapp absolute left-4 group-focus-within:text-teal-600 transition-colors text-lg"
                                   :class="errors.no_hp ? 'text-rose-500' : 'text-gray-300'"></i>
                                <input type="tel" name="no_hp" x-model="form.no_hp" @blur="validate('no_hp')" placeholder="08xxxxxxxxxx" required
                                    class="w-full bg-white border rounded-xl py-3.5 pl-11 pr-4 text-sm font-bold text-teal-950 outline-none focus:ring-4 transition-all"
                                    :class="errors.no_hp ? 'border-rose-500 focus:ring-rose-500/5' : 'border-gray-200 focus:border-teal-500 focus:ring-teal-500/5'">
                            </div>
                            <p x-show="errors.no_hp" x-text="errors.no_hp" class="text-rose-500 text-[10px] mt-1 font-bold"></p>
                            @error('no_hp') <p class="text-rose-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Password -->
                        <div class="relative group">
                            <label class="absolute -top-2.5 left-4 px-2 bg-white text-xs font-bold text-gray-500 transition-all group-focus-within:text-teal-600 z-10"
                                   :class="errors.password ? 'text-rose-500' : ''">Password</label>
                            <div class="relative flex items-center">
                                <i class="ti ti-lock absolute left-4 group-focus-within:text-teal-600 transition-colors text-lg"
                                   :class="errors.password ? 'text-rose-500' : 'text-gray-300'"></i>
                                <input type="password" name="password" x-model="form.password" @blur="validate('password')" placeholder="••••••••" required
                                    class="w-full bg-white border rounded-xl py-3.5 pl-11 pr-4 text-sm font-bold text-teal-950 outline-none focus:ring-4 transition-all"
                                    :class="errors.password ? 'border-rose-500 focus:ring-rose-500/5' : 'border-gray-200 focus:border-teal-500 focus:ring-teal-500/5'">
                            </div>
                            <p x-show="errors.password" x-text="errors.password" class="text-rose-500 text-[10px] mt-1 font-bold"></p>
                        </div>

                        <!-- Confirm Password -->
                        <div class="relative group">
                            <label class="absolute -top-2.5 left-4 px-2 bg-white text-xs font-bold text-gray-500 transition-all group-focus-within:text-teal-600 z-10"
                                   :class="errors.password_confirmation ? 'text-rose-500' : ''">Konfirmasi</label>
                            <div class="relative flex items-center">
                                <i class="ti ti-lock-check absolute left-4 group-focus-within:text-teal-600 transition-colors text-lg"
                                   :class="errors.password_confirmation ? 'text-rose-500' : 'text-gray-300'"></i>
                                <input type="password" name="password_confirmation" x-model="form.password_confirmation" @blur="validate('password_confirmation')" placeholder="••••••••" required
                                    class="w-full bg-white border rounded-xl py-3.5 pl-11 pr-4 text-sm font-bold text-teal-950 outline-none focus:ring-4 transition-all"
                                    :class="errors.password_confirmation ? 'border-rose-500 focus:ring-rose-500/5' : 'border-gray-200 focus:border-teal-500 focus:ring-teal-500/5'">
                            </div>
                            <p x-show="errors.password_confirmation" x-text="errors.password_confirmation" class="text-rose-500 text-[10px] mt-1 font-bold"></p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-1">
                        <input type="checkbox" id="terms" required class="w-4 h-4 rounded text-teal-600 border-gray-200 focus:ring-teal-500 cursor-pointer">
                        <label for="terms" class="text-[11px] text-gray-500 font-bold">
                            Setuju dengan <a href="#" class="text-teal-600 underline">Syarat</a> & <a href="#" class="text-teal-600 underline">Privasi</a>
                        </label>
                    </div>

                    <button type="submit" 
                        class="w-full bg-teal-700 hover:bg-teal-800 text-white font-black py-4 rounded-xl shadow-lg shadow-teal-900/20 active:scale-[0.98] transition-all text-sm flex items-center justify-center gap-2 group">
                        <span>Daftar Sekarang</span>
                        <i class="ti ti-arrow-right text-lg group-hover:translate-x-1 transition-transform"></i>
                    </button>

                    <p class="text-center text-xs text-gray-400 font-bold pt-2">
                        Sudah ada akun? <a href="/login" class="text-teal-600 underline">Masuk di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
