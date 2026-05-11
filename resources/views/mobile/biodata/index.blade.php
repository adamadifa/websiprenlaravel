@extends('layouts.mobile')

@section('title', 'Lengkapi Biodata')

@section('content')
<div x-data="biodataForm()" class="min-h-[100dvh] bg-slate-50 flex flex-col font-sans selection:bg-teal-100 pb-32">
    
    <!-- TOP HEADER: Teal Branding -->
    <div class="bg-teal-900 pt-8 pb-12 px-6 relative overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-500 rounded-full blur-[80px] opacity-20 -translate-y-1/2 translate-x-1/4"></div>
        <div class="absolute inset-0 opacity-[0.05]" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>

        <div class="relative z-10">
            <div class="flex items-center gap-4 mb-2">
                <a href="/dashboard" class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-xl flex items-center justify-center text-teal-100 border border-white/20 active:scale-90 transition-all">
                    <i class="ti ti-chevron-left text-2xl"></i>
                </a>
                <div>
                    <h1 class="text-white text-lg font-black leading-none tracking-tight">Biodata Lengkap</h1>
                    <p class="text-teal-200/80 text-[11px] font-medium mt-1">Sistem Pendaftaran Al Amin</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <form action="/biodata" method="POST" class="flex-1 -mt-6 px-5 relative z-20">
        @csrf
        
        <!-- Feedback Notifications -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-emerald-50 border border-emerald-100 rounded-2xl text-emerald-700 text-[11px] font-bold flex items-center gap-3 shadow-sm" data-aos="fade-down">
                <div class="w-8 h-8 bg-emerald-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-500/20">
                    <i class="ti ti-check text-lg"></i>
                </div>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 bg-rose-50 border border-rose-100 rounded-2xl text-rose-700 text-[11px] font-bold flex items-center gap-3 shadow-sm" data-aos="fade-down">
                <div class="w-8 h-8 bg-rose-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-rose-500/20">
                    <i class="ti ti-alert-triangle text-lg"></i>
                </div>
                {{ session('error') }}
            </div>
        @endif
        
        <!-- PROGRESS CARD (Floating) -->
        <div class="bg-white rounded-2xl p-5 shadow-xl shadow-teal-950/5 border border-slate-100 mb-6">
            <div class="flex justify-between items-center mb-3">
                <div class="flex items-center gap-2.5">
                    <div class="w-7 h-7 bg-teal-50 text-teal-600 rounded-xl flex items-center justify-center text-xs font-black border border-teal-100" x-text="step"></div>
                    <div>
                        <span class="text-[13px] font-bold text-slate-800 block leading-none" x-text="stepTitles[step-1]"></span>
                        <span class="text-[11px] font-medium text-slate-500 mt-0.5 block">Langkah <span x-text="step"></span> dari 4</span>
                    </div>
                </div>
                <div class="px-2 py-1 bg-teal-50 rounded-lg">
                    <span class="text-[11px] font-black text-teal-600" x-text="Math.round((step/4)*100) + '%'"></span>
                </div>
            </div>
            <div class="h-2 bg-slate-100 rounded-full overflow-hidden p-0.5">
                <div class="h-full bg-teal-500 rounded-full transition-all duration-700 shadow-sm" :style="'width: ' + (step/4)*100 + '%'"></div>
            </div>
        </div>

        <!-- STEP 1: Data Diri -->
        <div x-show="step === 1" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
            <div class="bg-white rounded-xl p-5 shadow-xl shadow-teal-950/5 border border-slate-100">
                <div class="space-y-4">
                    <div class="relative group">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-teal-500 transition-colors z-10"><i class="ti ti-id text-lg"></i></div>
                        <input type="text" name="no_kk" x-model="form.no_kk" id="no_kk" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 pl-11 pr-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all">
                        <label for="no_kk" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-11 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">NIK Santri (Sesuai KK)</label>
                    </div>
                    <div class="relative group">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-teal-500 transition-colors z-10"><i class="ti ti-school text-lg"></i></div>
                        <input type="text" name="nisn" x-model="form.nisn" id="nisn" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 pl-11 pr-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all">
                        <label for="nisn" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-11 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">NISN (Nasional)</label>
                    </div>
                    <div class="relative group">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-teal-500 transition-colors z-10"><i class="ti ti-user text-lg"></i></div>
                        <input type="text" name="nama_lengkap" x-model="form.nama_lengkap" id="nama_lengkap" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 pl-11 pr-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all">
                        <label for="nama_lengkap" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-11 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Nama Lengkap</label>
                    </div>
                    
                    <!-- Gender Radio -->
                    <div class="bg-slate-50 rounded-xl p-3 border border-slate-200">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight mb-2 ml-1">Jenis Kelamin</p>
                        <div class="flex gap-4">
                            <label class="flex-1 flex items-center gap-2 bg-white px-3 py-2.5 rounded-lg border border-slate-100 shadow-sm cursor-pointer active:scale-95 transition-all">
                                <input type="radio" name="jenis_kelamin" value="L" x-model="form.jenis_kelamin" class="w-4 h-4 accent-teal-600">
                                <span class="text-[13px] font-bold text-slate-700">Laki-laki</span>
                            </label>
                            <label class="flex-1 flex items-center gap-2 bg-white px-3 py-2.5 rounded-lg border border-slate-100 shadow-sm cursor-pointer active:scale-95 transition-all">
                                <input type="radio" name="jenis_kelamin" value="P" x-model="form.jenis_kelamin" class="w-4 h-4 accent-teal-600">
                                <span class="text-[13px] font-bold text-slate-700">Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="relative group">
                            <div class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-teal-500 transition-colors z-10"><i class="ti ti-map-pin text-base"></i></div>
                            <input type="text" name="tempat_lahir" x-model="form.tempat_lahir" id="tempat_lahir" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 pl-9 pr-3 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all">
                            <label for="tempat_lahir" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-9 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Tempat Lahir</label>
                        </div>
                        <div class="relative group">
                            <input type="date" name="tanggal_lahir" x-model="form.tanggal_lahir" id="tanggal_lahir" class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-3 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all">
                            <label for="tanggal_lahir" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-3 pointer-events-none" :class="form.tanggal_lahir ? '' : 'scale-100 -translate-y-1/2 top-1/2'">Tgl Lahir</label>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="relative group">
                            <input type="number" name="anak_ke" x-model="form.anak_ke" id="anak_ke" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all">
                            <label for="anak_ke" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Anak Ke</label>
                        </div>
                        <div class="relative group">
                            <input type="number" name="jumlah_saudara" x-model="form.jumlah_saudara" id="jumlah_saudara" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all">
                            <label for="jumlah_saudara" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Jumlah Saudara</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STEP 2: Alamat -->
        <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
            <div class="bg-white rounded-xl p-5 shadow-xl shadow-teal-950/5 border border-slate-100">
                <div class="space-y-4">
                    <div class="relative group">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-teal-500 transition-colors z-10"><i class="ti ti-map text-lg"></i></div>
                        <select name="id_province" x-model="form.id_province" id="id_province" @change="loadRegencies" class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 pl-11 pr-10 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all appearance-none">
                            <option value=""></option>
                            @foreach($provinsi as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                        <label for="id_province" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-11 pointer-events-none" :class="form.id_province ? '' : 'scale-100 -translate-y-1/2 top-1/2'">Provinsi</label>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400"><i class="ti ti-chevron-down"></i></div>
                    </div>
                    <div class="relative group">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-teal-500 transition-colors z-10"><i class="ti ti-building-community text-lg"></i></div>
                        <select name="id_regency" x-model="form.id_regency" id="id_regency" @change="loadDistricts" x-ref="regencySelect" class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 pl-11 pr-10 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all appearance-none">
                            <option value=""></option>
                        </select>
                        <label for="id_regency" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-11 pointer-events-none" :class="form.id_regency ? '' : 'scale-100 -translate-y-1/2 top-1/2'">Kabupaten / Kota</label>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400"><i class="ti ti-chevron-down"></i></div>
                    </div>
                    <div class="relative group">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-teal-500 transition-colors z-10"><i class="ti ti-directions text-lg"></i></div>
                        <select name="id_district" x-model="form.id_district" id="id_district" @change="loadVillages" x-ref="districtSelect" class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 pl-11 pr-10 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all appearance-none">
                            <option value=""></option>
                        </select>
                        <label for="id_district" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-11 pointer-events-none" :class="form.id_district ? '' : 'scale-100 -translate-y-1/2 top-1/2'">Kecamatan</label>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400"><i class="ti ti-chevron-down"></i></div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="relative group">
                            <select name="id_village" x-model="form.id_village" id="id_village" x-ref="villageSelect" class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all appearance-none">
                                <option value=""></option>
                            </select>
                            <label for="id_village" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 pointer-events-none" :class="form.id_village ? '' : 'scale-100 -translate-y-1/2 top-1/2'">Desa / Kelurahan</label>
                            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400"><i class="ti ti-chevron-down"></i></div>
                        </div>
                        <div class="relative group">
                            <input type="text" name="kode_pos" x-model="form.kode_pos" id="kode_pos" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                            <label for="kode_pos" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Kode Pos</label>
                        </div>
                    </div>
                    <div class="relative group">
                        <textarea name="alamat" x-model="form.alamat" id="alamat" rows="2" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all"></textarea>
                        <label for="alamat" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-5 peer-focus:top-5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Alamat Lengkap (Jalan, RT/RW)</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- STEP 3: Orang Tua -->
        <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
            <div class="bg-white rounded-xl p-5 shadow-xl shadow-teal-950/5 border border-slate-100">
                <div class="space-y-6">
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-6 h-6 bg-blue-50 text-blue-500 rounded-lg flex items-center justify-center"><i class="ti ti-man text-sm"></i></div>
                            <p class="text-[12px] font-bold text-slate-700">Identitas Ayah Kandung</p>
                        </div>
                        <div class="relative group">
                            <input type="text" name="nik_ayah" x-model="form.nik_ayah" id="nik_ayah" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                            <label for="nik_ayah" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">NIK Ayah Kandung</label>
                        </div>
                        <div class="relative group">
                            <input type="text" name="nama_ayah" x-model="form.nama_ayah" id="nama_ayah" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                            <label for="nama_ayah" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Nama Lengkap Ayah</label>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="relative group">
                                <select name="pendidikan_ayah" x-model="form.pendidikan_ayah" id="pendidikan_ayah" class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 appearance-none transition-all">
                                    <option value=""></option>
                                    @foreach($pendidikan as $p)
                                        <option value="{{ $p }}">{{ $p }}</option>
                                    @endforeach
                                </select>
                                <label for="pendidikan_ayah" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 pointer-events-none" :class="form.pendidikan_ayah ? '' : 'scale-100 -translate-y-1/2 top-1/2'">Pendidikan</label>
                            </div>
                            <div class="relative group">
                                <input type="text" name="pekerjaan_ayah" x-model="form.pekerjaan_ayah" id="pekerjaan_ayah" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                                <label for="pekerjaan_ayah" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Pekerjaan</label>
                            </div>
                        </div>
                    </div>

                    <div class="h-px bg-slate-100 w-full"></div>

                    <div class="space-y-3">
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-6 h-6 bg-rose-50 text-rose-500 rounded-lg flex items-center justify-center"><i class="ti ti-woman text-sm"></i></div>
                            <p class="text-[12px] font-bold text-slate-700">Identitas Ibu Kandung</p>
                        </div>
                        <div class="relative group">
                            <input type="text" name="nik_ibu" x-model="form.nik_ibu" id="nik_ibu" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                            <label for="nik_ibu" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">NIK Ibu Kandung</label>
                        </div>
                        <div class="relative group">
                            <input type="text" name="nama_ibu" x-model="form.nama_ibu" id="nama_ibu" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                            <label for="nama_ibu" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Nama Lengkap Ibu</label>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="relative group">
                                <select name="pendidikan_ibu" x-model="form.pendidikan_ibu" id="pendidikan_ibu" class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 appearance-none transition-all">
                                    <option value=""></option>
                                    @foreach($pendidikan as $p)
                                        <option value="{{ $p }}">{{ $p }}</option>
                                    @endforeach
                                </select>
                                <label for="pendidikan_ibu" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 pointer-events-none" :class="form.pendidikan_ibu ? '' : 'scale-100 -translate-y-1/2 top-1/2'">Pendidikan</label>
                            </div>
                            <div class="relative group">
                                <input type="text" name="pekerjaan_ibu" x-model="form.pekerjaan_ibu" id="pekerjaan_ibu" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                                <label for="pekerjaan_ibu" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Pekerjaan</label>
                            </div>
                        </div>
                    </div>

                    <div class="h-px bg-slate-100 w-full"></div>

                    <div class="relative group">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-emerald-500 z-10"><i class="ti ti-brand-whatsapp text-xl"></i></div>
                        <input type="text" name="no_hp" x-model="form.no_hp" id="no_hp" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 pl-12 pr-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all">
                        <label for="no_hp" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-12 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">No. WhatsApp Orang Tua</label>
                    </div>
                </div>
            </div>
        </div>


        <!-- STEP 4: Konfirmasi -->
        <div x-show="step === 4" style="display: none;" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
            <div class="bg-white rounded-xl p-8 shadow-xl shadow-teal-950/5 border border-slate-100 text-center">
                <div class="w-24 h-24 bg-teal-50 rounded-full flex items-center justify-center text-teal-500 mx-auto mb-6 relative">
                    <div class="absolute inset-0 bg-teal-400 rounded-full animate-ping opacity-20"></div>
                    <i class="ti ti-shield-check text-6xl relative z-10"></i>
                </div>
                <h3 class="text-slate-800 text-xl font-black mb-2 tracking-tight">Semua Sudah Benar?</h3>
                <p class="text-slate-500 text-xs font-medium leading-relaxed mb-8 px-4">Pastikan data yang Anda masukkan sesuai dengan Kartu Keluarga dan dokumen resmi lainnya.</p>
                
                <button type="submit" class="w-full bg-teal-600 text-white rounded-xl py-4 text-sm font-black shadow-lg shadow-teal-600/30 active:scale-95 transition-all flex items-center justify-center gap-2 group">
                    <i class="ti ti-device-floppy text-lg group-hover:scale-110 transition-transform"></i>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>

    <!-- BOTTOM NAVIGATION (Glassmorphism) -->
    <div class="fixed bottom-0 left-0 right-0 bg-white/90 backdrop-blur-2xl border-t border-slate-200/60 p-4 pb-[env(safe-area-inset-bottom,16px)] z-[60]">
        <div class="flex gap-3">
            <template x-if="step > 1">
                <button type="button" @click="step--" class="w-14 h-14 bg-white text-slate-600 rounded-xl flex items-center justify-center border border-slate-200 shadow-sm active:scale-90 transition-all hover:bg-slate-50">
                    <i class="ti ti-arrow-left text-xl"></i>
                </button>
            </template>
            <template x-if="step < 4">
                <button type="button" @click="step++" class="flex-1 h-14 bg-teal-600 text-white rounded-xl text-[13px] font-black shadow-lg shadow-teal-600/20 active:scale-95 transition-all flex items-center justify-center gap-2 hover:bg-teal-700">
                    Lanjut Ke Langkah Berikutnya
                    <i class="ti ti-arrow-right text-lg"></i>
                </button>
            </template>
            <template x-if="step === 4">
                <div class="flex-1 h-14 flex items-center justify-center text-[13px] font-bold text-slate-500">
                    Langkah Terakhir
                </div>
            </template>
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

