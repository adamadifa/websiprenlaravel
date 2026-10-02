@extends('layouts.mobile')

@section('title', 'Lengkapi Biodata')

@section('content')
<div x-data="biodataForm()" class="min-h-[100dvh] bg-[#faf9f6] flex flex-col font-sans selection:bg-[#bef264] selection:text-[#062d27] pb-32">
    
    <!-- TOP HEADER: Deep Emerald Branding -->
    <div class="bg-[#062d27] pt-7 pb-12 px-5 relative overflow-hidden border-b border-emerald-900/60">
        <div class="absolute -top-16 -right-16 w-56 h-56 bg-[#bef264]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 -left-16 w-48 h-48 bg-emerald-500/15 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10">
            <div class="flex items-center gap-3.5 mb-2">
                <a href="/dashboard" class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center text-emerald-100 border border-white/15 active:scale-90 transition-all shadow-xs">
                    <i class="ti ti-chevron-left text-xl"></i>
                </a>
                <div>
                    <h1 class="text-white text-base font-black leading-tight tracking-tight font-montserrat">Biodata Santri Baru</h1>
                    <p class="text-[#bef264] text-[11px] font-bold font-montserrat mt-0.5">SPMB {{ $pendaftaran->tahun_ajaran }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <form action="/biodata" method="POST" id="formBiodataMobile" class="flex-1 -mt-6 px-5 relative z-20 space-y-4">
        @csrf
        
        <!-- Feedback Notifications -->
        @if(session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-200/80 rounded-2xl text-emerald-900 text-xs font-bold flex items-center gap-3 shadow-xs font-montserrat">
                <div class="w-7 h-7 bg-emerald-600 rounded-xl flex items-center justify-center text-white shrink-0">
                    <i class="ti ti-check text-sm"></i>
                </div>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 bg-rose-50 border border-rose-200/80 rounded-2xl text-rose-800 text-xs font-bold flex items-center gap-3 shadow-xs font-montserrat">
                <div class="w-7 h-7 bg-rose-600 rounded-xl flex items-center justify-center text-white shrink-0">
                    <i class="ti ti-alert-triangle text-sm"></i>
                </div>
                <span>{{ session('error') }}</span>
            </div>
        @endif
        
        <!-- PROGRESS CARD -->
        <div class="bg-white rounded-3xl p-4.5 shadow-sm border border-stone-200/80">
            <div class="flex justify-between items-center mb-2.5">
                <div class="flex items-center gap-2.5">
                    <div class="w-7 h-7 bg-[#062d27] text-[#bef264] rounded-xl flex items-center justify-center text-xs font-black font-montserrat" x-text="'0' + step"></div>
                    <div>
                        <span class="text-xs font-black text-[#062d27] font-montserrat block leading-none" x-text="stepTitles[step-1]"></span>
                        <span class="text-[10px] font-semibold text-stone-400 mt-0.5 block">Langkah <span x-text="step"></span> dari 4</span>
                    </div>
                </div>
                <div class="px-2.5 py-0.5 bg-[#bef264] rounded-full">
                    <span class="text-[10px] font-black text-[#062d27] font-montserrat" x-text="Math.round((step/4)*100) + '%'"></span>
                </div>
            </div>
            <div class="h-2 bg-stone-100 rounded-full overflow-hidden p-0.5">
                <div class="h-full bg-[#062d27] rounded-full transition-all duration-500" :style="'width: ' + (step/4)*100 + '%'"></div>
            </div>
        </div>

        <!-- STEP 1: Data Diri -->
        <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
            <div class="bg-white rounded-3xl p-5 shadow-sm border border-stone-200/80 space-y-4">
                
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Nomor Kartu Keluarga (KK) <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="no_kk" x-model="form.no_kk" maxlength="16"
                           class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10 transition-all outline-none font-mono"
                           placeholder="16 Digit Nomor KK">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        NISN <span class="text-stone-400 font-normal text-[10px]">(Opsional)</span>
                    </label>
                    <input type="text" name="nisn" x-model="form.nisn" maxlength="10"
                           class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10 transition-all outline-none font-mono"
                           placeholder="10 Digit NISN">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Nama Lengkap <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="nama_lengkap" x-model="form.nama_lengkap"
                           class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10 transition-all outline-none"
                           placeholder="Sesuai akta kelahiran">
                </div>

                <!-- Gender Radio -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                        Jenis Kelamin <span class="text-rose-500">*</span>
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="flex items-center gap-2.5 p-3 rounded-2xl border cursor-pointer transition-all"
                               :class="form.jenis_kelamin === 'L' ? 'border-[#062d27] bg-emerald-50/50' : 'border-stone-200/80 bg-[#faf9f6]'">
                            <input type="radio" name="jenis_kelamin" value="L" x-model="form.jenis_kelamin" class="w-4 h-4 text-[#062d27]">
                            <span class="text-xs font-bold text-[#062d27] font-montserrat">Laki-laki</span>
                        </label>
                        <label class="flex items-center gap-2.5 p-3 rounded-2xl border cursor-pointer transition-all"
                               :class="form.jenis_kelamin === 'P' ? 'border-[#062d27] bg-emerald-50/50' : 'border-stone-200/80 bg-[#faf9f6]'">
                            <input type="radio" name="jenis_kelamin" value="P" x-model="form.jenis_kelamin" class="w-4 h-4 text-[#062d27]">
                            <span class="text-xs font-bold text-[#062d27] font-montserrat">Perempuan</span>
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#062d27] font-montserrat">Tempat Lahir <span class="text-rose-500">*</span></label>
                        <input type="text" name="tempat_lahir" x-model="form.tempat_lahir"
                               class="w-full px-3.5 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none"
                               placeholder="Kota Lahir">
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#062d27] font-montserrat">Tgl Lahir <span class="text-rose-500">*</span></label>
                        <input type="date" name="tanggal_lahir" x-model="form.tanggal_lahir"
                               class="w-full px-3 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#062d27] font-montserrat">Anak Ke <span class="text-rose-500">*</span></label>
                        <input type="number" name="anak_ke" x-model="form.anak_ke" min="1"
                               class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none text-center"
                               placeholder="1">
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#062d27] font-montserrat">Jml Saudara <span class="text-rose-500">*</span></label>
                        <input type="number" name="jumlah_saudara" x-model="form.jumlah_saudara" min="0"
                               class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none text-center"
                               placeholder="3">
                    </div>
                </div>
            </div>
        </div>

        <!-- STEP 2: Alamat -->
        <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
            <div class="bg-white rounded-3xl p-5 shadow-sm border border-stone-200/80 space-y-4">
                
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Provinsi <span class="text-rose-500">*</span></label>
                    <select name="id_province" x-model="form.id_province" id="id_province" @change="loadRegencies"
                            class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Kabupaten / Kota <span class="text-rose-500">*</span></label>
                    <select name="id_regency" x-model="form.id_regency" id="id_regency" @change="loadDistricts" x-ref="regencySelect"
                            class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none">
                        <option value="">-- Pilih Kabupaten / Kota --</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Kecamatan <span class="text-rose-500">*</span></label>
                    <select name="id_district" x-model="form.id_district" id="id_district" @change="loadVillages" x-ref="districtSelect"
                            class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none">
                        <option value="">-- Pilih Kecamatan --</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#062d27] font-montserrat">Desa / Kelurahan <span class="text-rose-500">*</span></label>
                        <select name="id_village" x-model="form.id_village" id="id_village" x-ref="villageSelect"
                                class="w-full px-3 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none">
                            <option value="">-- Desa --</option>
                        </select>
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#062d27] font-montserrat">Kode Pos <span class="text-rose-500">*</span></label>
                        <input type="text" name="kode_pos" x-model="form.kode_pos" maxlength="5"
                               class="w-full px-3 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none text-center font-mono"
                               placeholder="5 Digit">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Alamat Lengkap (RT/RW, Dusun) <span class="text-rose-500">*</span></label>
                    <textarea name="alamat" x-model="form.alamat" rows="2"
                              class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none"
                              placeholder="Jl. / Blok / Dusun RT 01 RW 02"></textarea>
                </div>
            </div>
        </div>

        <!-- STEP 3: Orang Tua -->
        <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
            <div class="bg-white rounded-3xl p-5 shadow-sm border border-stone-200/80 space-y-5">
                
                <!-- Ayah -->
                <div class="space-y-3 pb-4 border-b border-stone-100">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-lg bg-[#062d27] text-[#bef264] flex items-center justify-center text-xs"><i class="ti ti-user"></i></div>
                        <h4 class="text-xs font-bold text-[#062d27] font-montserrat">Identitas Ayah Kandung</h4>
                    </div>
                    <div class="space-y-2">
                        <input type="text" name="nik_ayah" x-model="form.nik_ayah" maxlength="16" placeholder="NIK Ayah (16 Digit)"
                               class="w-full px-4 py-2.5 rounded-xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white outline-none">
                        <input type="text" name="nama_ayah" x-model="form.nama_ayah" placeholder="Nama Lengkap Ayah"
                               class="w-full px-4 py-2.5 rounded-xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white outline-none">
                        <div class="grid grid-cols-2 gap-2">
                            <select name="pendidikan_ayah" x-model="form.pendidikan_ayah"
                                    class="w-full px-3 py-2.5 rounded-xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] outline-none">
                                <option value="">Pendidikan</option>
                                @foreach($pendidikan as $p)
                                    <option value="{{ $p }}">{{ $p }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="pekerjaan_ayah" x-model="form.pekerjaan_ayah" placeholder="Pekerjaan"
                                   class="w-full px-3 py-2.5 rounded-xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] outline-none">
                        </div>
                    </div>
                </div>

                <!-- Ibu -->
                <div class="space-y-3 pb-4 border-b border-stone-100">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-lg bg-[#062d27] text-[#bef264] flex items-center justify-center text-xs"><i class="ti ti-user-heart"></i></div>
                        <h4 class="text-xs font-bold text-[#062d27] font-montserrat">Identitas Ibu Kandung</h4>
                    </div>
                    <div class="space-y-2">
                        <input type="text" name="nik_ibu" x-model="form.nik_ibu" maxlength="16" placeholder="NIK Ibu (16 Digit)"
                               class="w-full px-4 py-2.5 rounded-xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white outline-none">
                        <input type="text" name="nama_ibu" x-model="form.nama_ibu" placeholder="Nama Lengkap Ibu"
                               class="w-full px-4 py-2.5 rounded-xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white outline-none">
                        <div class="grid grid-cols-2 gap-2">
                            <select name="pendidikan_ibu" x-model="form.pendidikan_ibu"
                                    class="w-full px-3 py-2.5 rounded-xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] outline-none">
                                <option value="">Pendidikan</option>
                                @foreach($pendidikan as $p)
                                    <option value="{{ $p }}">{{ $p }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="pekerjaan_ibu" x-model="form.pekerjaan_ibu" placeholder="Pekerjaan"
                                   class="w-full px-3 py-2.5 rounded-xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] outline-none">
                        </div>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">No. WhatsApp Orang Tua <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-xs font-bold text-stone-400 font-mono">+62</span>
                        <input type="text" name="no_hp" x-model="form.no_hp" placeholder="812345678xx"
                               class="w-full pl-12 pr-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white outline-none font-mono">
                    </div>
                </div>
            </div>
        </div>

        <!-- STEP 4: Konfirmasi -->
        <div x-show="step === 4" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-stone-200/80 text-center space-y-4">
                <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-800 mx-auto border border-emerald-200/60 shadow-xs">
                    <i class="ti ti-shield-check text-3xl"></i>
                </div>
                <div>
                    <h3 class="text-sm font-black text-[#062d27] font-montserrat">Periksa Kembali Data Anda</h3>
                    <p class="text-xs text-stone-500 mt-1 leading-relaxed">Pastikan seluruh data yang Anda masukkan telah sesuai dengan dokumen asli yang sah.</p>
                </div>
                
                <button type="submit" class="w-full py-3.5 bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] rounded-2xl text-xs font-black shadow-md shadow-lime-500/20 active:scale-95 transition-all flex items-center justify-center gap-2 font-montserrat">
                    <i class="ti ti-device-floppy text-base"></i>
                    <span>Simpan Seluruh Biodata</span>
                </button>
            </div>
        </div>
    </form>

    <!-- BOTTOM STEP ACTION BAR -->
    <div class="fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-2xl border-t border-stone-200/70 px-5 pt-3 pb-[env(safe-area-inset-bottom,16px)] z-50">
        <div class="flex gap-3 max-w-lg mx-auto">
            <button type="button" x-show="step > 1" @click="step--" class="w-12 h-12 bg-stone-100 hover:bg-stone-200 text-stone-700 rounded-2xl flex items-center justify-center transition-all active:scale-90 shrink-0 font-bold">
                <i class="ti ti-arrow-left text-lg"></i>
            </button>
            <button type="button" x-show="step < 4" @click="step++" class="flex-1 h-12 bg-[#062d27] hover:bg-emerald-900 text-[#bef264] rounded-2xl text-xs font-black transition-all shadow-md active:scale-95 flex items-center justify-center gap-2 font-montserrat">
                <span>Lanjut ke Langkah Berikutnya</span>
                <i class="ti ti-arrow-right text-sm"></i>
            </button>
        </div>
    </div>
</div>

<script>
function biodataForm() {
    return {
        step: 1,
        stepTitles: ['Data Diri Santri', 'Alamat Domisili', 'Data Orang Tua', 'Konfirmasi Data'],
        form: {
            no_kk: '{{ old('no_kk', $pendaftaran->no_kk) }}',
            nisn: '{{ old('nisn', $pendaftaran->nisn) }}',
            nama_lengkap: '{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}',
            jenis_kelamin: '{{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) }}',
            tempat_lahir: '{{ old('tempat_lahir', $pendaftaran->tempat_lahir) }}',
            tanggal_lahir: '{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}',
            anak_ke: '{{ old('anak_ke', $pendaftaran->anak_ke) }}',
            jumlah_saudara: '{{ old('jumlah_saudara', $pendaftaran->jumlah_saudara) }}',
            id_province: '{{ old('id_province', $pendaftaran->id_province) }}',
            id_regency: '{{ old('id_regency', $pendaftaran->id_regency) }}',
            id_district: '{{ old('id_district', $pendaftaran->id_district) }}',
            id_village: '{{ old('id_village', $pendaftaran->id_village) }}',
            kode_pos: '{{ old('kode_pos', $pendaftaran->kode_pos) }}',
            alamat: '{{ old('alamat', $pendaftaran->alamat) }}',
            nik_ayah: '{{ old('nik_ayah', $pendaftaran->nik_ayah) }}',
            nama_ayah: '{{ old('nama_ayah', $pendaftaran->nama_ayah) }}',
            pendidikan_ayah: '{{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) }}',
            pekerjaan_ayah: '{{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) }}',
            nik_ibu: '{{ old('nik_ibu', $pendaftaran->nik_ibu) }}',
            nama_ibu: '{{ old('nama_ibu', $pendaftaran->nama_ibu) }}',
            pendidikan_ibu: '{{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) }}',
            pekerjaan_ibu: '{{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) }}',
            no_hp: '{{ old('no_hp', $pendaftaran->no_hp) }}',
        },
        init() {
            if(this.form.id_province) this.loadRegencies();
        },
        async loadRegencies() {
            if (!this.form.id_province) return;
            const res = await fetch('/regency/getregencybyprovince', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ id_province: this.form.id_province, id_regency: this.form.id_regency })
            });
            this.$refs.regencySelect.innerHTML = await res.text();
            if(this.form.id_regency) this.loadDistricts();
        },
        async loadDistricts() {
            if (!this.form.id_regency) return;
            const res = await fetch('/district/getdistrictbyregency', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ id_regency: this.form.id_regency, id_district: this.form.id_district })
            });
            this.$refs.districtSelect.innerHTML = await res.text();
            if(this.form.id_district) this.loadVillages();
        },
        async loadVillages() {
            if (!this.form.id_district) return;
            const res = await fetch('/village/getvillagebydistrict', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ id_district: this.form.id_district, id_village: this.form.id_village })
            });
            this.$refs.villageSelect.innerHTML = await res.text();
        }
    }
}
</script>
@endsection
