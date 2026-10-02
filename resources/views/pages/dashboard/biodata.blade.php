@extends('layouts.dashboard')

@section('title', 'Formulir Biodata Santri')

@section('content')
<div class="max-w-5xl mx-auto space-y-6 pb-12">
    
    <!-- Top Hero Card -->
    <div class="bg-[#062d27] rounded-3xl p-6 sm:p-8 text-white relative overflow-hidden border border-emerald-900/60 shadow-xl">
        <div class="absolute -top-16 -right-16 w-60 h-60 bg-[#bef264]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-16 -left-16 w-60 h-60 bg-emerald-500/15 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-5">
            <div class="space-y-1.5">
                <div class="inline-flex items-center gap-2">
                    <span class="px-2.5 py-0.5 bg-[#bef264] text-[#062d27] text-[10px] font-black rounded-lg font-montserrat uppercase">
                        Formulir Biodata
                    </span>
                    <span class="text-xs text-emerald-200/80 font-bold font-montserrat">
                        Tahun Ajaran {{ $pendaftaran->tahun_ajaran }}
                    </span>
                </div>
                <h1 class="text-xl sm:text-2xl font-black text-white font-montserrat tracking-tight leading-tight">
                    Lengkapi Biodata Santri Baru
                </h1>
                <p class="text-xs text-emerald-100/75 font-normal max-w-xl">
                    Pastikan seluruh data yang diisi sesuai dengan dokumen resmi kependudukan (Kartu Keluarga / Akta Kelahiran).
                </p>
            </div>

            <div class="p-4 bg-white/10 backdrop-blur-md rounded-2xl border border-white/15 shrink-0 min-w-[200px]">
                <p class="text-[10px] font-bold text-emerald-200/70 font-montserrat uppercase mb-1">Nomor Registrasi</p>
                <p class="text-lg font-black text-[#bef264] font-mono leading-none tracking-tight">{{ $pendaftaran->no_register }}</p>
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

    <form action="/biodata" method="POST" id="formBiodata" 
          x-data="{
            form: {
                nisn: '{{ old('nisn', $pendaftaran->nisn) }}',
                nama_lengkap: '{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}',
                jenis_kelamin: '{{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) }}',
                tempat_lahir: '{{ old('tempat_lahir', $pendaftaran->tempat_lahir) }}',
                tanggal_lahir: '{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}',
                anak_ke: '{{ old('anak_ke', $pendaftaran->anak_ke) }}',
                jumlah_saudara: '{{ old('jumlah_saudara', $pendaftaran->jumlah_saudara) }}',
                no_kk: '{{ old('no_kk', $pendaftaran->no_kk) }}',
                alamat: '{{ old('alamat', $pendaftaran->alamat) }}',
                id_province: '{{ old('id_province', $pendaftaran->id_province) }}',
                id_regency: '{{ old('id_regency', $pendaftaran->id_regency) }}',
                id_district: '{{ old('id_district', $pendaftaran->id_district) }}',
                id_village: '{{ old('id_village', $pendaftaran->id_village) }}',
                kode_pos: '{{ old('kode_pos', $pendaftaran->kode_pos) }}',
                nik_ayah: '{{ old('nik_ayah', $pendaftaran->nik_ayah) }}',
                nama_ayah: '{{ old('nama_ayah', $pendaftaran->nama_ayah) }}',
                pendidikan_ayah: '{{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) }}',
                pekerjaan_ayah: '{{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) }}',
                nik_ibu: '{{ old('nik_ibu', $pendaftaran->nik_ibu) }}',
                nama_ibu: '{{ old('nama_ibu', $pendaftaran->nama_ibu) }}',
                pendidikan_ibu: '{{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) }}',
                pekerjaan_ibu: '{{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) }}',
                no_hp: '{{ old('no_hp', $pendaftaran->no_hp) }}'
            },
            errors: {},
            validate(field) {
                this.errors[field] = '';
                
                if (field === 'nisn' && this.form.nisn && this.form.nisn.length !== 10) {
                    this.errors.nisn = 'NISN harus 10 digit.';
                }

                const mandatory = [
                    'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'anak_ke', 'jumlah_saudara', 
                    'no_kk', 'alamat', 'id_province', 'id_regency', 'id_district', 'id_village', 'kode_pos',
                    'nik_ayah', 'nama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah',
                    'nik_ibu', 'nama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu',
                    'no_hp'
                ];

                if (mandatory.includes(field)) {
                    if (!this.form[field]) this.errors[field] = 'Field ini wajib diisi.';
                }

                if (field === 'no_kk' && this.form.no_kk && this.form.no_kk.length !== 16) {
                    this.errors.no_kk = 'No. KK harus 16 digit.';
                }

                if ((field === 'nik_ayah' || field === 'nik_ibu') && this.form[field]) {
                    if (this.form[field].length !== 16) {
                        this.errors[field] = 'NIK harus 16 digit.';
                    } else if (!/^[0-9]+$/.test(this.form[field])) {
                        this.errors[field] = 'NIK hanya boleh berupa angka.';
                    }
                }

                if (field === 'no_hp' && this.form.no_hp) {
                    if (!/^[0-9]+$/.test(this.form.no_hp)) {
                        this.errors.no_hp = 'Hanya angka saja.';
                    } else if (this.form.no_hp.length < 10) {
                        this.errors.no_hp = 'Nomor HP minimal 10 digit.';
                    }
                }

                if (field === 'kode_pos' && this.form.kode_pos && this.form.kode_pos.length !== 5) {
                    this.errors.kode_pos = 'Kode pos harus 5 digit.';
                }
            },
            submit(e) {
                const fields = [
                    'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'anak_ke', 'jumlah_saudara', 
                    'no_kk', 'alamat', 'id_province', 'id_regency', 'id_district', 'id_village', 'kode_pos',
                    'nik_ayah', 'nama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah',
                    'nik_ibu', 'nama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu',
                    'no_hp'
                ];
                fields.forEach(f => this.validate(f));
                let hasErrors = Object.values(this.errors).some(err => err !== '');
                if (hasErrors) {
                    e.preventDefault();
                    if (window.Swal) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Data Belum Lengkap',
                            text: 'Silakan periksa dan lengkapi kolom yang bertanda merah (*).',
                            confirmButtonColor: '#062d27'
                        });
                    }
                }
            }
          }" 
          @submit="submit" novalidate class="space-y-6">
        @csrf

        <!-- SECTION 1: DATA PRIBADI -->
        <div class="bg-white border border-stone-200/80 rounded-3xl p-6 sm:p-8 shadow-2xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-stone-100">
                <div class="w-9 h-9 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center font-black text-xs font-montserrat shadow-xs">
                    01
                </div>
                <div>
                    <h2 class="text-sm font-black text-[#062d27] font-montserrat">Data Pribadi Calon Santri</h2>
                    <p class="text-[11px] text-stone-500 font-medium">Informasi identitas pokok calon santri baru</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- NISN -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        NISN <span class="text-stone-400 font-normal text-[11px]">(Nomor Induk Siswa Nasional - Opsional)</span>
                    </label>
                    <input type="text" name="nisn" x-model="form.nisn" @blur="validate('nisn')"
                           class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none"
                           :class="errors.nisn ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                           placeholder="Contoh: 0081234567">
                    <p x-show="errors.nisn" x-text="errors.nisn" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>

                <!-- No KK -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Nomor Kartu Keluarga (KK) <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="no_kk" x-model="form.no_kk" @blur="validate('no_kk')" maxlength="16"
                           class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none"
                           :class="errors.no_kk ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                           placeholder="16 Digit Nomor KK">
                    <p x-show="errors.no_kk" x-text="errors.no_kk" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>

                <!-- Nama Lengkap -->
                <div class="md:col-span-2 space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Nama Lengkap <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="nama_lengkap" x-model="form.nama_lengkap" @blur="validate('nama_lengkap')"
                           class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none"
                           :class="errors.nama_lengkap ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                           placeholder="Nama lengkap sesuai akta kelahiran">
                    <p x-show="errors.nama_lengkap" x-text="errors.nama_lengkap" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>

                <!-- Jenis Kelamin -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Jenis Kelamin <span class="text-rose-500">*</span>
                    </label>
                    <div class="grid grid-cols-2 gap-3 pt-1">
                        <label class="flex items-center gap-3 p-3 rounded-2xl border cursor-pointer transition-all"
                               :class="form.jenis_kelamin === 'L' ? 'border-[#062d27] bg-emerald-50/50' : 'border-stone-200/80 bg-[#faf9f6]'">
                            <input type="radio" name="jenis_kelamin" value="L" x-model="form.jenis_kelamin" @change="validate('jenis_kelamin')" class="w-4 h-4 text-[#062d27] focus:ring-[#062d27]">
                            <span class="text-xs font-bold text-[#062d27] font-montserrat">Laki-laki</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-2xl border cursor-pointer transition-all"
                               :class="form.jenis_kelamin === 'P' ? 'border-[#062d27] bg-emerald-50/50' : 'border-stone-200/80 bg-[#faf9f6]'">
                            <input type="radio" name="jenis_kelamin" value="P" x-model="form.jenis_kelamin" @change="validate('jenis_kelamin')" class="w-4 h-4 text-[#062d27] focus:ring-[#062d27]">
                            <span class="text-xs font-bold text-[#062d27] font-montserrat">Perempuan</span>
                        </label>
                    </div>
                    <p x-show="errors.jenis_kelamin" x-text="errors.jenis_kelamin" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>

                <!-- Tempat & Tanggal Lahir -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Tempat & Tanggal Lahir <span class="text-rose-500">*</span>
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <input type="text" name="tempat_lahir" x-model="form.tempat_lahir" @blur="validate('tempat_lahir')"
                                   class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none"
                                   :class="errors.tempat_lahir ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                                   placeholder="Kota Lahir">
                        </div>
                        <div>
                            <input type="date" name="tanggal_lahir" x-model="form.tanggal_lahir" @blur="validate('tanggal_lahir')"
                                   class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all focus:outline-none"
                                   :class="errors.tanggal_lahir ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'">
                        </div>
                    </div>
                    <p x-show="errors.tempat_lahir || errors.tanggal_lahir" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                        <span>Tempat dan Tanggal lahir wajib diisi.</span>
                    </p>
                </div>

                <!-- Anak Ke & Jumlah Saudara -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Anak Ke <span class="text-rose-500">*</span>
                    </label>
                    <input type="number" name="anak_ke" x-model="form.anak_ke" @blur="validate('anak_ke')" min="1"
                           class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none"
                           :class="errors.anak_ke ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                           placeholder="Contoh: 1">
                    <p x-show="errors.anak_ke" x-text="errors.anak_ke" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Jumlah Saudara Kandung <span class="text-rose-500">*</span>
                    </label>
                    <input type="number" name="jumlah_saudara" x-model="form.jumlah_saudara" @blur="validate('jumlah_saudara')" min="0"
                           class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none"
                           :class="errors.jumlah_saudara ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                           placeholder="Contoh: 3">
                    <p x-show="errors.jumlah_saudara" x-text="errors.jumlah_saudara" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>
            </div>
        </div>

        <!-- SECTION 2: ALAMAT DOMISILI -->
        <div class="bg-white border border-stone-200/80 rounded-3xl p-6 sm:p-8 shadow-2xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-stone-100">
                <div class="w-9 h-9 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center font-black text-xs font-montserrat shadow-xs">
                    02
                </div>
                <div>
                    <h2 class="text-sm font-black text-[#062d27] font-montserrat">Informasi Alamat Domisili</h2>
                    <p class="text-[11px] text-stone-500 font-medium">Alamat tempat tinggal keluarga saat ini</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Alamat Lengkap -->
                <div class="md:col-span-2 space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Alamat Lengkap (Jalan, RT/RW, Dusun/Blok) <span class="text-rose-500">*</span>
                    </label>
                    <textarea name="alamat" x-model="form.alamat" @blur="validate('alamat')" rows="2"
                              class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none"
                              :class="errors.alamat ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                              placeholder="Contoh: Jl. Cisaga No. 80, RT 02 / RW 04, Dusun Sukasari"></textarea>
                    <p x-show="errors.alamat" x-text="errors.alamat" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>

                <!-- Provinsi -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Provinsi <span class="text-rose-500">*</span>
                    </label>
                    <select name="id_province" id="id_province" x-model="form.id_province" @change="validate('id_province')"
                            class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all focus:outline-none"
                            :class="errors.id_province ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                    <p x-show="errors.id_province" x-text="errors.id_province" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>

                <!-- Kabupaten / Kota -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Kabupaten / Kota <span class="text-rose-500">*</span>
                    </label>
                    <select name="id_regency" id="id_regency" x-model="form.id_regency" @change="validate('id_regency')"
                            class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all focus:outline-none"
                            :class="errors.id_regency ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'">
                        <option value="">-- Pilih Kabupaten / Kota --</option>
                    </select>
                    <p x-show="errors.id_regency" x-text="errors.id_regency" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>

                <!-- Kecamatan -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Kecamatan <span class="text-rose-500">*</span>
                    </label>
                    <select name="id_district" id="id_district" x-model="form.id_district" @change="validate('id_district')"
                            class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all focus:outline-none"
                            :class="errors.id_district ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'">
                        <option value="">-- Pilih Kecamatan --</option>
                    </select>
                    <p x-show="errors.id_district" x-text="errors.id_district" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>

                <!-- Desa / Kelurahan -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Desa / Kelurahan <span class="text-rose-500">*</span>
                    </label>
                    <select name="id_village" id="id_village" x-model="form.id_village" @change="validate('id_village')"
                            class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all focus:outline-none"
                            :class="errors.id_village ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'">
                        <option value="">-- Pilih Desa / Kelurahan --</option>
                    </select>
                    <p x-show="errors.id_village" x-text="errors.id_village" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>

                <!-- Kode Pos -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Kode Pos <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="kode_pos" x-model="form.kode_pos" @blur="validate('kode_pos')" maxlength="5"
                           class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none"
                           :class="errors.kode_pos ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                           placeholder="5 Digit Kode Pos">
                    <p x-show="errors.kode_pos" x-text="errors.kode_pos" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>
            </div>
        </div>

        <!-- SECTION 3: DATA ORANG TUA / WALI -->
        <div class="bg-white border border-stone-200/80 rounded-3xl p-6 sm:p-8 shadow-2xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-stone-100">
                <div class="w-9 h-9 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center font-black text-xs font-montserrat shadow-xs">
                    03
                </div>
                <div>
                    <h2 class="text-sm font-black text-[#062d27] font-montserrat">Data Orang Tua / Wali</h2>
                    <p class="text-[11px] text-stone-500 font-medium">Informasi ayah, ibu kandung, dan kontak keluarga</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Data Ayah -->
                <div class="space-y-4 p-5 rounded-2xl bg-[#faf9f6] border border-stone-200/70">
                    <div class="flex items-center gap-2 mb-2 pb-2 border-b border-stone-200/60">
                        <div class="w-7 h-7 rounded-lg bg-[#062d27] text-[#bef264] flex items-center justify-center text-xs">
                            <i class="ti ti-user"></i>
                        </div>
                        <h3 class="text-xs font-bold text-[#062d27] font-montserrat">Informasi Ayah Kandung</h3>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-bold text-stone-700 font-montserrat">NIK Ayah <span class="text-rose-500">*</span></label>
                        <input type="text" name="nik_ayah" x-model="form.nik_ayah" @blur="validate('nik_ayah')" maxlength="16"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-white text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 focus:outline-none"
                               :class="errors.nik_ayah ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200 focus:border-[#062d27] focus:ring-2 focus:ring-emerald-900/10'"
                               placeholder="16 Digit NIK">
                        <p x-show="errors.nik_ayah" x-text="errors.nik_ayah" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-bold text-stone-700 font-montserrat">Nama Lengkap Ayah <span class="text-rose-500">*</span></label>
                        <input type="text" name="nama_ayah" x-model="form.nama_ayah" @blur="validate('nama_ayah')"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-white text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 focus:outline-none"
                               :class="errors.nama_ayah ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200 focus:border-[#062d27] focus:ring-2 focus:ring-emerald-900/10'"
                               placeholder="Nama ayah">
                        <p x-show="errors.nama_ayah" x-text="errors.nama_ayah" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-bold text-stone-700 font-montserrat">Pendidikan Terakhir <span class="text-rose-500">*</span></label>
                        <select name="pendidikan_ayah" x-model="form.pendidikan_ayah" @change="validate('pendidikan_ayah')"
                                class="w-full px-3.5 py-2.5 rounded-xl bg-white text-xs font-bold text-stone-900 border transition-all focus:outline-none"
                                :class="errors.pendidikan_ayah ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200 focus:border-[#062d27] focus:ring-2 focus:ring-emerald-900/10'">
                            <option value="">-- Pilih Pendidikan --</option>
                            @foreach($pendidikan as $p)
                                <option value="{{ $p }}">{{ $p }}</option>
                            @endforeach
                        </select>
                        <p x-show="errors.pendidikan_ayah" x-text="errors.pendidikan_ayah" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-bold text-stone-700 font-montserrat">Pekerjaan Ayah <span class="text-rose-500">*</span></label>
                        <input type="text" name="pekerjaan_ayah" x-model="form.pekerjaan_ayah" @blur="validate('pekerjaan_ayah')"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-white text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 focus:outline-none"
                               :class="errors.pekerjaan_ayah ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200 focus:border-[#062d27] focus:ring-2 focus:ring-emerald-900/10'"
                               placeholder="Contoh: Wiraswasta, PNS, Guru">
                        <p x-show="errors.pekerjaan_ayah" x-text="errors.pekerjaan_ayah" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                    </div>
                </div>

                <!-- Data Ibu -->
                <div class="space-y-4 p-5 rounded-2xl bg-[#faf9f6] border border-stone-200/70">
                    <div class="flex items-center gap-2 mb-2 pb-2 border-b border-stone-200/60">
                        <div class="w-7 h-7 rounded-lg bg-[#062d27] text-[#bef264] flex items-center justify-center text-xs">
                            <i class="ti ti-user-heart"></i>
                        </div>
                        <h3 class="text-xs font-bold text-[#062d27] font-montserrat">Informasi Ibu Kandung</h3>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-bold text-stone-700 font-montserrat">NIK Ibu <span class="text-rose-500">*</span></label>
                        <input type="text" name="nik_ibu" x-model="form.nik_ibu" @blur="validate('nik_ibu')" maxlength="16"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-white text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 focus:outline-none"
                               :class="errors.nik_ibu ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200 focus:border-[#062d27] focus:ring-2 focus:ring-emerald-900/10'"
                               placeholder="16 Digit NIK">
                        <p x-show="errors.nik_ibu" x-text="errors.nik_ibu" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-bold text-stone-700 font-montserrat">Nama Lengkap Ibu <span class="text-rose-500">*</span></label>
                        <input type="text" name="nama_ibu" x-model="form.nama_ibu" @blur="validate('nama_ibu')"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-white text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 focus:outline-none"
                               :class="errors.nama_ibu ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200 focus:border-[#062d27] focus:ring-2 focus:ring-emerald-900/10'"
                               placeholder="Nama ibu">
                        <p x-show="errors.nama_ibu" x-text="errors.nama_ibu" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-bold text-stone-700 font-montserrat">Pendidikan Terakhir <span class="text-rose-500">*</span></label>
                        <select name="pendidikan_ibu" x-model="form.pendidikan_ibu" @change="validate('pendidikan_ibu')"
                                class="w-full px-3.5 py-2.5 rounded-xl bg-white text-xs font-bold text-stone-900 border transition-all focus:outline-none"
                                :class="errors.pendidikan_ibu ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200 focus:border-[#062d27] focus:ring-2 focus:ring-emerald-900/10'">
                            <option value="">-- Pilih Pendidikan --</option>
                            @foreach($pendidikan as $p)
                                <option value="{{ $p }}">{{ $p }}</option>
                            @endforeach
                        </select>
                        <p x-show="errors.pendidikan_ibu" x-text="errors.pendidikan_ibu" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-bold text-stone-700 font-montserrat">Pekerjaan Ibu <span class="text-rose-500">*</span></label>
                        <input type="text" name="pekerjaan_ibu" x-model="form.pekerjaan_ibu" @blur="validate('pekerjaan_ibu')"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-white text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 focus:outline-none"
                               :class="errors.pekerjaan_ibu ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200 focus:border-[#062d27] focus:ring-2 focus:ring-emerald-900/10'"
                               placeholder="Contoh: Ibu Rumah Tangga, Guru, PNS">
                        <p x-show="errors.pekerjaan_ibu" x-text="errors.pekerjaan_ibu" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                    </div>
                </div>

                <!-- No WhatsApp Orang Tua -->
                <div class="lg:col-span-2 space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Nomor WhatsApp Orang Tua / Wali <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xs font-bold text-stone-400 font-mono">+62</span>
                        <input type="text" name="no_hp" x-model="form.no_hp" @blur="validate('no_hp')"
                               class="w-full pl-14 pr-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none font-mono"
                               :class="errors.no_hp ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                               placeholder="812345678xx">
                    </div>
                    <p x-show="errors.no_hp" x-text="errors.no_hp" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                        <i class="ti ti-alert-circle text-xs"></i>
                    </p>
                </div>
            </div>
        </div>

        <!-- Pernyataan & Tombol Aksi -->
        <div class="bg-white border border-stone-200/80 rounded-3xl p-6 sm:p-8 shadow-2xs space-y-6">
            <div class="p-4 bg-emerald-50/70 border border-emerald-100 rounded-2xl flex items-start gap-3.5">
                <i class="ti ti-info-circle text-emerald-800 text-xl shrink-0 mt-0.5"></i>
                <div>
                    <h4 class="text-xs font-bold text-[#062d27] font-montserrat">Pernyataan Kebenaran Data</h4>
                    <p class="text-[11px] text-emerald-950/75 leading-relaxed mt-0.5">
                        Dengan menekan tombol Simpan Biodata, saya menyatakan dengan sungguh-sungguh bahwa data yang diisi adalah benar, sah, dan dapat dipertanggungjawabkan.
                    </p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2 border-t border-stone-100">
                <a href="/biodata/cetak" target="_blank"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-2xl border border-[#062d27] text-[#062d27] hover:bg-[#062d27] hover:text-[#bef264] text-xs font-bold transition-all font-montserrat shadow-xs active:scale-95">
                    <i class="ti ti-printer text-base"></i>
                    <span>Cetak Formulir</span>
                </a>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] text-xs font-black transition-all shadow-md shadow-lime-500/20 active:scale-95 font-montserrat">
                        <i class="ti ti-device-floppy text-base"></i>
                        <span>Simpan Biodata</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        function getRegency(id_province, id_regency = "") {
            if (!id_province) return;
            $.ajax({
                type: 'POST',
                url: '/regency/getregencybyprovince',
                data: {
                    _token: "{{ csrf_token() }}",
                    id_province: id_province,
                    id_regency: id_regency
                },
                success: function(respond) {
                    $("#id_regency").html(respond);
                    @if($pendaftaran->id_regency)
                        if (!id_regency) {
                            getDistrict($("#id_regency").val(), "{{ $pendaftaran->id_district }}");
                        }
                    @endif
                    if(document.getElementById('formBiodata') && document.getElementById('formBiodata')._x_dataStack) {
                        document.getElementById('formBiodata')._x_dataStack[0].form.id_regency = $("#id_regency").val();
                    }
                }
            });
        }

        function getDistrict(id_regency, id_district = "") {
            if (!id_regency) return;
            $.ajax({
                type: 'POST',
                url: '/district/getdistrictbyregency',
                data: {
                    _token: "{{ csrf_token() }}",
                    id_regency: id_regency,
                    id_district: id_district
                },
                success: function(respond) {
                    $("#id_district").html(respond);
                    @if($pendaftaran->id_district)
                        if (!id_district) {
                            getVillage($("#id_district").val(), "{{ $pendaftaran->id_village }}");
                        }
                    @endif
                    if(document.getElementById('formBiodata') && document.getElementById('formBiodata')._x_dataStack) {
                        document.getElementById('formBiodata')._x_dataStack[0].form.id_district = $("#id_district").val();
                    }
                }
            });
        }

        function getVillage(id_district, id_village = "") {
            if (!id_district) return;
            $.ajax({
                type: 'POST',
                url: '/village/getvillagebydistrict',
                data: {
                    _token: "{{ csrf_token() }}",
                    id_district: id_district,
                    id_village: id_village
                },
                success: function(respond) {
                    $("#id_village").html(respond);
                    if(document.getElementById('formBiodata') && document.getElementById('formBiodata')._x_dataStack) {
                        document.getElementById('formBiodata')._x_dataStack[0].form.id_village = $("#id_village").val();
                    }
                }
            });
        }

        @if($pendaftaran->id_province)
            getRegency("{{ $pendaftaran->id_province }}", "{{ $pendaftaran->id_regency }}");
            getDistrict("{{ $pendaftaran->id_regency }}", "{{ $pendaftaran->id_district }}");
            getVillage("{{ $pendaftaran->id_district }}", "{{ $pendaftaran->id_village }}");
        @endif

        $("#id_province").change(function() {
            getRegency($(this).val());
        });

        $("#id_regency").change(function() {
            getDistrict($(this).val());
        });

        $("#id_district").change(function() {
            getVillage($(this).val());
        });
    });
</script>
@endpush
