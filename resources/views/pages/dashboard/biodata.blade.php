@extends('layouts.dashboard')

@section('title', 'Formulir Biodata Santri')

@section('content')
<div class="max-w-5xl mx-auto py-4 px-4" data-aos="fade-up">
    <!-- Feedback Messages -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-teal-50 border border-teal-100 rounded-xl text-teal-700 text-xs font-bold flex items-center gap-3">
            <i class="ti ti-circle-check text-lg"></i>
            {{ session('success') }}
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
                    if (!this.form[field]) this.errors[field] = 'Wajib diisi.';
                }

                if (field === 'no_kk' && this.form.no_kk && this.form.no_kk.length !== 16) {
                    this.errors.no_kk = 'No. KK harus 16 digit.';
                }

                if ((field === 'nik_ayah' || field === 'nik_ibu') && this.form[field]) {
                    if (this.form[field].length !== 16) {
                        this.errors[field] = 'NIK harus 16 digit.';
                    } else if (!/^[0-9]+$/.test(this.form[field])) {
                        this.errors[field] = 'Hanya boleh angka.';
                    }
                }

                if (field === 'no_hp' && this.form.no_hp) {
                    if (!/^[0-9]+$/.test(this.form.no_hp)) {
                        this.errors.no_hp = 'Hanya angka saja.';
                    } else if (this.form.no_hp.length < 10) {
                        this.errors.no_hp = 'No. HP tidak valid.';
                    }
                }

                if (field === 'kode_pos' && this.form.kode_pos && this.form.kode_pos.length !== 5) {
                    this.errors.kode_pos = 'Kode pos 5 digit.';
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
                    Swal.fire({
                        icon: 'error',
                        title: 'Data Belum Lengkap',
                        text: 'Silakan lengkapi semua data bertanda bintang merah (*).',
                        confirmButtonColor: '#0f172a'
                    });
                }
            }
          }" 
          @submit="submit" novalidate>
        @csrf
        
        <!-- Document Header Card -->
        <div class="bg-white shadow-2xl shadow-slate-200 border border-slate-200 rounded-t-3xl overflow-hidden">
            <div class="p-8 md:p-12 border-b border-dashed border-teal-600/30 bg-teal-700 relative">
                <!-- Document Mark -->
                <div class="absolute top-0 right-0 w-32 h-32 opacity-10 pointer-events-none">
                    <i class="ti ti-file-text text-[150px] text-white"></i>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative z-10">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-white text-teal-700 text-[10px] font-black px-2 py-0.5 rounded tracking-widest uppercase">Form PPDB-01</span>
                            <span class="text-xs font-bold text-teal-100 opacity-80">Tahun Ajaran 2026/2027</span>
                        </div>
                        <h1 class="text-2xl font-black text-white leading-tight">Formulir Pendaftaran Santri Baru</h1>
                        <p class="text-xs text-teal-50 font-medium italic opacity-90">Silakan lengkapi data di bawah ini sesuai dengan dokumen asli (KK/Akte Kelahiran).</p>
                    </div>
                    <div class="text-left md:text-right">
                        <p class="text-[10px] font-black text-teal-200 uppercase tracking-widest mb-1">Nomor Registrasi</p>
                        <p class="text-xl font-black text-white font-mono">{{ $pendaftaran->no_register }}</p>
                    </div>
                </div>
            </div>

            <!-- Document Body -->
            <div class="p-8 md:p-12 space-y-12">
                
                <!-- Section 1: Data Pribadi -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 border-b-2 border-teal-600 pb-2">
                        <span class="w-8 h-8 bg-teal-600 text-white rounded-lg flex items-center justify-center font-black text-sm">I</span>
                        <h2 class="text-sm font-black text-teal-700 tracking-wide">Data Pribadi Calon Santri</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-6 gap-y-6 gap-x-8">
                        <div class="md:col-span-2 text-xs font-black text-slate-500 tracking-wide pt-3">NISN (Nasional)</div>
                        <div class="md:col-span-4">
                            <input type="text" name="nisn" x-model="form.nisn" @blur="validate('nisn')" class="w-full bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all placeholder:font-normal border-slate-200 focus:border-teal-600" placeholder="Opsional">
                            <p x-show="errors.nisn" x-text="errors.nisn" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                        </div>

                        <div class="md:col-span-2 text-xs font-black text-slate-500 tracking-wide pt-3">No. Kartu Keluarga <span class="text-rose-500">*</span></div>
                        <div class="md:col-span-4">
                            <input type="text" name="no_kk" x-model="form.no_kk" @blur="validate('no_kk')" class="w-full bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all placeholder:font-normal" :class="errors.no_kk ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'" placeholder="16 Digit No. KK">
                            <p x-show="errors.no_kk" x-text="errors.no_kk" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                        </div>

                        <div class="md:col-span-2 text-xs font-black text-slate-500 tracking-wide pt-3">Nama Lengkap <span class="text-rose-500">*</span></div>
                        <div class="md:col-span-4">
                            <input type="text" name="nama_lengkap" x-model="form.nama_lengkap" @blur="validate('nama_lengkap')" class="w-full bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all placeholder:font-normal" :class="errors.nama_lengkap ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'" placeholder="Nama Sesuai Dokumen Resmi">
                            <p x-show="errors.nama_lengkap" x-text="errors.nama_lengkap" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                        </div>

                        <div class="md:col-span-2 text-xs font-black text-slate-500 tracking-wide pt-3">Jenis Kelamin <span class="text-rose-500">*</span></div>
                        <div class="md:col-span-4">
                            <div class="flex gap-8 py-2">
                                <label class="flex items-center gap-2 cursor-pointer group">
                                    <input type="radio" name="jenis_kelamin" value="L" x-model="form.jenis_kelamin" @change="validate('jenis_kelamin')" class="w-4 h-4 accent-teal-600">
                                    <span class="text-sm font-bold text-slate-700 group-hover:text-teal-600 transition-colors">Laki-laki</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer group">
                                    <input type="radio" name="jenis_kelamin" value="P" x-model="form.jenis_kelamin" @change="validate('jenis_kelamin')" class="w-4 h-4 accent-teal-600">
                                    <span class="text-sm font-bold text-slate-700 group-hover:text-teal-600 transition-colors">Perempuan</span>
                                </label>
                            </div>
                            <p x-show="errors.jenis_kelamin" x-text="errors.jenis_kelamin" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                        </div>

                        <div class="md:col-span-2 text-xs font-black text-slate-500 tracking-wide pt-3">Tempat, Tgl Lahir <span class="text-rose-500">*</span></div>
                        <div class="md:col-span-4">
                            <div class="flex flex-col md:flex-row gap-4">
                                <input type="text" name="tempat_lahir" x-model="form.tempat_lahir" @blur="validate('tempat_lahir')" class="flex-1 bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all placeholder:font-normal" :class="errors.tempat_lahir ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'" placeholder="Kota Kelahiran">
                                <input type="date" name="tanggal_lahir" x-model="form.tanggal_lahir" @blur="validate('tanggal_lahir')" class="w-full md:w-48 bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.tanggal_lahir ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'">
                            </div>
                            <p x-show="errors.tempat_lahir || errors.tanggal_lahir" class="text-[10px] font-bold text-rose-500 mt-1">Tempat dan Tanggal lahir wajib diisi.</p>
                        </div>

                        <div class="md:col-span-2 text-xs font-black text-slate-500 tracking-wide pt-3">Anak Ke / Jml Saudara <span class="text-rose-500">*</span></div>
                        <div class="md:col-span-4 flex items-center gap-4">
                            <span class="text-xs font-bold text-slate-400">Anak Ke</span>
                            <input type="number" name="anak_ke" x-model="form.anak_ke" @blur="validate('anak_ke')" class="w-16 bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all text-center" :class="errors.anak_ke ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'">
                            <span class="text-xs font-bold text-slate-400">dari</span>
                            <input type="number" name="jumlah_saudara" x-model="form.jumlah_saudara" @blur="validate('jumlah_saudara')" class="w-16 bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all text-center" :class="errors.jumlah_saudara ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'">
                            <span class="text-xs font-bold text-slate-400">Saudara</span>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Alamat -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 border-b-2 border-teal-600 pb-2">
                        <span class="w-8 h-8 bg-teal-600 text-white rounded-lg flex items-center justify-center font-black text-sm">II</span>
                        <h2 class="text-sm font-black text-teal-700 tracking-wide">Informasi Alamat Domisili</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-6 gap-y-6 gap-x-8">
                        <div class="md:col-span-2 text-xs font-black text-slate-500 tracking-wide pt-1">Alamat Lengkap <span class="text-rose-500">*</span></div>
                        <div class="md:col-span-4">
                            <textarea name="alamat" x-model="form.alamat" @blur="validate('alamat')" rows="2" class="w-full bg-slate-50 border rounded-xl py-3 px-4 text-sm font-bold text-slate-800 outline-none transition-all placeholder:font-normal" :class="errors.alamat ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'" placeholder="Dusun, RT/RW, No. Rumah"></textarea>
                            <p x-show="errors.alamat" x-text="errors.alamat" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                        </div>

                        <div class="md:col-span-2 text-xs font-black text-slate-500 tracking-wide pt-3">Provinsi <span class="text-rose-500">*</span></div>
                        <div class="md:col-span-4">
                            <select name="id_province" id="id_province" x-model="form.id_province" @change="validate('id_province')" class="w-full bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.id_province ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'">
                                <option value="">Pilih Provinsi</option>
                                @foreach($provinsi as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md:col-span-2 text-xs font-black text-slate-500 tracking-wide pt-3">Kota / Kabupaten <span class="text-rose-500">*</span></div>
                        <div class="md:col-span-4">
                            <select name="id_regency" id="id_regency" x-model="form.id_regency" @change="validate('id_regency')" class="w-full bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.id_regency ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'">
                                <option value="">Pilih Kabupaten / Kota</option>
                            </select>
                        </div>

                        <div class="md:col-span-2 text-xs font-black text-slate-500 tracking-wide pt-3">Kecamatan / Desa <span class="text-rose-500">*</span></div>
                        <div class="md:col-span-4 flex flex-col md:flex-row gap-4">
                            <select name="id_district" id="id_district" x-model="form.id_district" @change="validate('id_district')" class="flex-1 bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.id_district ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                            <select name="id_village" id="id_village" x-model="form.id_village" @change="validate('id_village')" class="flex-1 bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.id_village ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'">
                                <option value="">Pilih Desa / Kelurahan</option>
                            </select>
                        </div>

                        <div class="md:col-span-2 text-xs font-black text-slate-500 tracking-wide pt-3">Kode Pos <span class="text-rose-500">*</span></div>
                        <div class="md:col-span-4">
                            <input type="text" name="kode_pos" x-model="form.kode_pos" @blur="validate('kode_pos')" class="w-full bg-slate-50 border-b py-2 px-1 text-sm font-bold text-slate-800 outline-none transition-all placeholder:font-normal" :class="errors.kode_pos ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'" placeholder="5 Digit">
                            <p x-show="errors.kode_pos" x-text="errors.kode_pos" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Data Orang Tua -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 border-b-2 border-teal-600 pb-2">
                        <span class="w-8 h-8 bg-teal-600 text-white rounded-lg flex items-center justify-center font-black text-sm">III</span>
                        <h2 class="text-sm font-black text-teal-700 tracking-wide">Data Orang Tua / Wali</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 pt-4">
                        <!-- Data Ayah -->
                        <div class="space-y-6">
                            <h4 class="text-[10px] font-black text-teal-600 tracking-wide mb-4">Informasi Ayah Kandung</h4>
                            <div class="space-y-4">
                                <div class="space-y-1">
                                    <label class="text-[9px] font-black text-slate-400 tracking-wide ml-1">NIK Ayah <span class="text-rose-500">*</span></label>
                                    <input type="text" name="nik_ayah" x-model="form.nik_ayah" @blur="validate('nik_ayah')" class="w-full bg-slate-50 border-b py-1 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.nik_ayah ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'" placeholder="16 Digit NIK">
                                    <p x-show="errors.nik_ayah" x-text="errors.nik_ayah" class="text-[9px] font-bold text-rose-500 mt-1"></p>
                                </div>
                                <div class="space-y-1">
                                    <label class="text-[9px] font-black text-slate-400 tracking-wide ml-1">Nama Ayah <span class="text-rose-500">*</span></label>
                                    <input type="text" name="nama_ayah" x-model="form.nama_ayah" @blur="validate('nama_ayah')" class="w-full bg-slate-50 border-b py-1 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.nama_ayah ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'">
                                    <p x-show="errors.nama_ayah" x-text="errors.nama_ayah" class="text-[9px] font-bold text-rose-500 mt-1"></p>
                                </div>
                                <div class="space-y-1">
                                    <label class="text-[9px] font-black text-slate-400 tracking-wide ml-1">Pendidikan Terakhir <span class="text-rose-500">*</span></label>
                                    <select name="pendidikan_ayah" x-model="form.pendidikan_ayah" @change="validate('pendidikan_ayah')" class="w-full bg-slate-50 border-b py-1 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.pendidikan_ayah ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'">
                                        <option value="">Pilih</option>
                                        @foreach($pendidikan as $p)
                                            <option value="{{ $p }}">{{ $p }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="space-y-1">
                                    <label class="text-[9px] font-black text-slate-400 tracking-wide ml-1">Pekerjaan Ayah <span class="text-rose-500">*</span></label>
                                    <input type="text" name="pekerjaan_ayah" x-model="form.pekerjaan_ayah" @blur="validate('pekerjaan_ayah')" class="w-full bg-slate-50 border-b py-1 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.pekerjaan_ayah ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'">
                                    <p x-show="errors.pekerjaan_ayah" x-text="errors.pekerjaan_ayah" class="text-[9px] font-bold text-rose-500 mt-1"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Ibu -->
                        <div class="space-y-6">
                            <h4 class="text-[10px] font-black text-rose-500 tracking-wide mb-4">Informasi Ibu Kandung</h4>
                            <div class="space-y-4">
                                <div class="space-y-1">
                                    <label class="text-[9px] font-black text-slate-400 tracking-wide ml-1">NIK Ibu <span class="text-rose-500">*</span></label>
                                    <input type="text" name="nik_ibu" x-model="form.nik_ibu" @blur="validate('nik_ibu')" class="w-full bg-slate-50 border-b py-1 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.nik_ibu ? 'border-rose-500' : 'border-slate-200 focus:border-rose-500'" placeholder="16 Digit NIK">
                                    <p x-show="errors.nik_ibu" x-text="errors.nik_ibu" class="text-[9px] font-bold text-rose-500 mt-1"></p>
                                </div>
                                <div class="space-y-1">
                                    <label class="text-[9px] font-black text-slate-400 tracking-wide ml-1">Nama Ibu <span class="text-rose-500">*</span></label>
                                    <input type="text" name="nama_ibu" x-model="form.nama_ibu" @blur="validate('nama_ibu')" class="w-full bg-slate-50 border-b py-1 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.nama_ibu ? 'border-rose-500' : 'border-slate-200 focus:border-rose-500'">
                                    <p x-show="errors.nama_ibu" x-text="errors.nama_ibu" class="text-[9px] font-bold text-rose-500 mt-1"></p>
                                </div>
                                <div class="space-y-1">
                                    <label class="text-[9px] font-black text-slate-400 tracking-wide ml-1">Pendidikan Terakhir <span class="text-rose-500">*</span></label>
                                    <select name="pendidikan_ibu" x-model="form.pendidikan_ibu" @change="validate('pendidikan_ibu')" class="w-full bg-slate-50 border-b py-1 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.pendidikan_ibu ? 'border-rose-500' : 'border-slate-200 focus:border-rose-500'">
                                        <option value="">Pilih</option>
                                        @foreach($pendidikan as $p)
                                            <option value="{{ $p }}">{{ $p }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="space-y-1">
                                    <label class="text-[9px] font-black text-slate-400 tracking-wide ml-1">Pekerjaan Ibu <span class="text-rose-500">*</span></label>
                                    <input type="text" name="pekerjaan_ibu" x-model="form.pekerjaan_ibu" @blur="validate('pekerjaan_ibu')" class="w-full bg-slate-50 border-b py-1 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.pekerjaan_ibu ? 'border-rose-500' : 'border-slate-200 focus:border-rose-500'">
                                    <p x-show="errors.pekerjaan_ibu" x-text="errors.pekerjaan_ibu" class="text-[9px] font-bold text-rose-500 mt-1"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full pt-8 grid grid-cols-1 md:grid-cols-2 gap-8 border-t border-dashed border-slate-200">
                            <div class="space-y-1">
                                <label class="text-[9px] font-black text-slate-400 tracking-wide ml-1">No. WhatsApp Orang Tua <span class="text-rose-500">*</span></label>
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-bold text-slate-400">+62</span>
                                    <input type="text" name="no_hp" x-model="form.no_hp" @blur="validate('no_hp')" class="w-full bg-slate-50 border-b py-1 px-1 text-sm font-bold text-slate-800 outline-none transition-all" :class="errors.no_hp ? 'border-rose-500' : 'border-slate-200 focus:border-teal-600'" placeholder="812345678xx">
                                </div>
                                <p x-show="errors.no_hp" x-text="errors.no_hp" class="text-[9px] font-bold text-rose-500 mt-1"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Final Message -->
                <div class="bg-amber-50 border-l-4 border-amber-400 p-6 rounded-r-xl">
                    <div class="flex gap-4">
                        <i class="ti ti-info-circle text-amber-500 text-2xl"></i>
                        <div class="space-y-1">
                            <p class="text-xs font-black text-amber-900 uppercase tracking-widest">Pernyataan Kejujuran</p>
                            <p class="text-[11px] text-amber-800 font-medium leading-relaxed">Dengan menekan tombol simpan, saya menyatakan bahwa data yang saya masukkan adalah benar dan dapat dipertanggungjawabkan sesuai dengan dokumen yang sah.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Action -->
            <div class="p-8 border-t border-slate-100 bg-slate-50/50 flex flex-col md:flex-row justify-between items-center gap-6 rounded-b-3xl">
                <div class="text-left">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Tanggal Update</p>
                    <p class="text-xs font-bold text-slate-700">{{ now()->translatedFormat('d F Y') }}</p>
                </div>
                <div class="flex gap-4 w-full md:w-auto">
                    <a href="/biodata/cetak" target="_blank" class="flex-1 md:flex-none border border-teal-600 text-teal-600 px-8 py-3 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-teal-50 transition-all flex items-center justify-center gap-3">
                        <i class="ti ti-printer text-lg"></i>
                        Cetak Formulir
                    </a>
                    <button type="reset" class="flex-1 md:flex-none px-8 py-3 text-xs font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-all">Reset Form</button>
                    <button type="submit" class="flex-1 md:flex-none bg-slate-900 text-white px-12 py-3 rounded-xl text-xs font-black uppercase tracking-widest shadow-xl shadow-slate-900/20 hover:bg-teal-700 active:scale-95 transition-all flex items-center justify-center gap-3">
                        <i class="ti ti-device-floppy text-lg"></i>
                        Simpan Formulir
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
                    // Update Alpine model for regency
                    if(document.getElementById('formBiodata')._x_dataStack) {
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
                    // Update Alpine model
                    if(document.getElementById('formBiodata')._x_dataStack) {
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
                    // Update Alpine model
                    if(document.getElementById('formBiodata')._x_dataStack) {
                        document.getElementById('formBiodata')._x_dataStack[0].form.id_village = $("#id_village").val();
                    }
                }
            });
        }

        // Initialize locations
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
