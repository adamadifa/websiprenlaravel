@extends('layouts.dashboard')

@section('title', 'Konfirmasi Pembayaran')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .flatpickr-calendar {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        border: 1px solid #e2e8f0;
        padding: 8px;
    }
    .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected:hover, .flatpickr-day.selected:focus {
        background: #062d27 !important;
        border-color: #062d27 !important;
        border-radius: 12px;
        color: #bef264 !important;
        font-weight: bold;
    }
    .flatpickr-day.today {
        border-color: #062d27;
        color: #062d27;
        border-radius: 12px;
    }
    .flatpickr-day:hover {
        background: #f1f5f9;
        border-radius: 12px;
    }
</style>
@endpush

@section('content')
<div class="max-w-6xl mx-auto space-y-6 pb-12">
    
    <!-- Top Hero Card -->
    <div class="bg-[#062d27] rounded-3xl p-6 sm:p-8 text-white relative overflow-hidden border border-emerald-900/60 shadow-xl">
        <div class="absolute -top-16 -right-16 w-60 h-60 bg-[#bef264]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-16 -left-16 w-60 h-60 bg-emerald-500/15 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-5">
            <div class="space-y-1.5">
                <div class="inline-flex items-center gap-2">
                    <span class="px-2.5 py-0.5 bg-[#bef264] text-[#062d27] text-[10px] font-black rounded-lg font-montserrat uppercase">
                        Biaya Pendaftaran
                    </span>
                    <span class="text-xs text-emerald-200/80 font-bold font-montserrat">
                        Tahun Ajaran {{ $pendaftaran->tahun_ajaran }}
                    </span>
                </div>
                <h1 class="text-xl sm:text-2xl font-black text-white font-montserrat tracking-tight leading-tight">
                    Konfirmasi Pembayaran SPMB
                </h1>
                <p class="text-xs text-emerald-100/75 font-normal max-w-xl">
                    Silakan transfer biaya pendaftaran ke nomor rekening resmi pesantren dan unggah bukti transfer untuk diverifikasi oleh panitia.
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

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-7">
        
        <!-- Left: Form Konfirmasi -->
        <div class="lg:col-span-7 space-y-6">
            <div class="bg-white border border-stone-200/80 rounded-3xl p-6 sm:p-8 shadow-2xs space-y-6">
                <div class="flex items-center gap-3 pb-4 border-b border-stone-100">
                    <div class="w-9 h-9 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center font-black text-xs font-montserrat shadow-xs">
                        <i class="ti ti-receipt text-base"></i>
                    </div>
                    <div>
                        <h2 class="text-sm font-black text-[#062d27] font-montserrat">Formulir Konfirmasi Pembayaran</h2>
                        <p class="text-[11px] text-stone-500 font-medium">Isi rincian transaksi dan lampirkan struk pembayaran</p>
                    </div>
                </div>

                <form action="/pembayaran" method="POST" enctype="multipart/form-data" class="space-y-5"
                    x-data="{
                        form: {
                            tanggal_pembayaran: '{{ old('tanggal_pembayaran', date('Y-m-d')) }}',
                            metode_pembayaran: '{{ old('metode_pembayaran', 'transfer') }}',
                            jumlah_pembayaran: '{{ old('jumlah_pembayaran') }}',
                            keterangan: '{{ old('keterangan') }}'
                        },
                        imagePreview: null,
                        errors: {},
                        previewImage(e) {
                            const file = e.target.files[0];
                            this.errors.bukti_pembayaran = '';
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    this.imagePreview = e.target.result;
                                };
                                reader.readAsDataURL(file);
                            }
                        },
                        removeImage() {
                            this.imagePreview = null;
                            document.getElementById('file-upload').value = '';
                        },
                        validate(field) {
                            this.errors[field] = '';
                            
                            if (field === 'tanggal_pembayaran' && !this.form.tanggal_pembayaran) {
                                this.errors.tanggal_pembayaran = 'Tanggal transfer wajib diisi.';
                            }

                            if (field === 'jumlah_pembayaran') {
                                if (!this.form.jumlah_pembayaran) {
                                    this.errors.jumlah_pembayaran = 'Jumlah pembayaran wajib diisi.';
                                } else if (this.form.jumlah_pembayaran < 1) {
                                    this.errors.jumlah_pembayaran = 'Jumlah minimal Rp 1.';
                                }
                            }

                            if (field === 'metode_pembayaran' && !this.form.metode_pembayaran) {
                                this.errors.metode_pembayaran = 'Metode wajib dipilih.';
                            }
                        },
                        submit(e) {
                            const fields = ['tanggal_pembayaran', 'jumlah_pembayaran', 'metode_pembayaran'];
                            fields.forEach(f => this.validate(f));

                            const fileInput = document.getElementById('file-upload');
                            if (!fileInput || !fileInput.files || !fileInput.files.length) {
                                this.errors.bukti_pembayaran = 'Bukti struk / transfer wajib diunggah.';
                            } else {
                                this.errors.bukti_pembayaran = '';
                            }

                            let hasErrors = Object.values(this.errors).some(err => err !== '');
                            if (hasErrors) {
                                e.preventDefault();
                                if (window.Swal) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Data Belum Lengkap',
                                        text: 'Silakan lengkapi formulir dan pastikan bukti transfer telah terunggah.',
                                        confirmButtonColor: '#062d27'
                                    });
                                }
                            }
                        }
                    }"
                    @submit="submit" novalidate>
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                                Tanggal Transfer <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="tanggal_pembayaran" name="tanggal_pembayaran" 
                                    x-model="form.tanggal_pembayaran" @change="validate('tanggal_pembayaran')"
                                    class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all cursor-pointer focus:outline-none"
                                    :class="errors.tanggal_pembayaran ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                                    placeholder="Pilih Tanggal">
                                <i class="ti ti-calendar absolute right-4 top-1/2 -translate-y-1/2 text-stone-400"></i>
                            </div>
                            <p x-show="errors.tanggal_pembayaran" x-text="errors.tanggal_pembayaran" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                                <i class="ti ti-alert-circle text-xs"></i>
                            </p>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                                Metode Pembayaran <span class="text-rose-500">*</span>
                            </label>
                            <select name="metode_pembayaran" x-model="form.metode_pembayaran" @change="validate('metode_pembayaran')"
                                class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all focus:outline-none"
                                :class="errors.metode_pembayaran ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'">
                                <option value="transfer">Transfer Bank / Mobile Banking</option>
                                <option value="tunai">Tunai / Bayar Langsung ke Pesantren</option>
                            </select>
                            <p x-show="errors.metode_pembayaran" x-text="errors.metode_pembayaran" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                                <i class="ti ti-alert-circle text-xs"></i>
                            </p>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                            Jumlah Pembayaran (Rp) <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xs font-bold text-stone-400 font-mono">Rp</span>
                            <input type="number" name="jumlah_pembayaran" x-model="form.jumlah_pembayaran" @blur="validate('jumlah_pembayaran')"
                                class="w-full pl-12 pr-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border transition-all placeholder:text-stone-400 focus:outline-none font-mono"
                                :class="errors.jumlah_pembayaran ? '!border-rose-500 !bg-rose-50/30 focus:!border-rose-500 focus:!ring-4 focus:!ring-rose-500/15' : 'border-stone-200/80 focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10'"
                                placeholder="Contoh: 250000">
                        </div>
                        <p x-show="errors.jumlah_pembayaran" x-text="errors.jumlah_pembayaran" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                            <i class="ti ti-alert-circle text-xs"></i>
                        </p>
                    </div>

                    <!-- Bukti Transfer Upload -->
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                            Unggah Bukti Struk Transfer <span class="text-rose-500">*</span>
                        </label>
                        
                        <div x-show="!imagePreview">
                            <label for="file-upload" 
                                 class="flex flex-col items-center justify-center p-7 border-2 border-dashed rounded-2xl transition-all text-center group cursor-pointer w-full select-none"
                                 :class="errors.bukti_pembayaran ? '!border-rose-500 !bg-rose-50/30' : 'border-stone-300 hover:border-[#062d27] bg-[#faf9f6] hover:bg-stone-50'"
                                 @dragover.prevent
                                 @drop.prevent="
                                    const dt = $event.dataTransfer;
                                    if (dt && dt.files.length) {
                                        $refs.fileInput.files = dt.files;
                                        previewImage({ target: { files: dt.files } });
                                    }
                                 ">
                                <input id="file-upload" x-ref="fileInput" name="bukti_pembayaran" type="file" class="sr-only" accept="image/*" @change="previewImage">
                                <div class="w-12 h-12 rounded-2xl bg-white border border-stone-200 flex items-center justify-center text-stone-400 group-hover:text-[#062d27] group-hover:border-[#062d27]/40 transition-all mb-2.5 shadow-2xs">
                                    <i class="ti ti-upload text-xl"></i>
                                </div>
                                <span class="text-xs font-bold text-[#062d27] font-montserrat">Klik di sini untuk memilih struk pembayaran</span>
                                <p class="text-[11px] text-stone-400 mt-1">atau tarik & lepas file gambar ke area ini (JPG, PNG, maks. 2MB)</p>
                            </label>
                        </div>

                        <!-- Image Preview -->
                        <div x-show="imagePreview" x-cloak class="relative group rounded-2xl overflow-hidden border border-stone-200 shadow-sm">
                            <img :src="imagePreview" class="w-full h-52 object-cover">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
                                <button type="button" @click="removeImage" class="w-10 h-10 bg-rose-600 hover:bg-rose-700 text-white rounded-xl flex items-center justify-center shadow-lg active:scale-90 transition-transform">
                                    <i class="ti ti-trash text-lg"></i>
                                </button>
                                <label for="file-upload" class="w-10 h-10 bg-[#bef264] text-[#062d27] rounded-xl flex items-center justify-center shadow-lg active:scale-90 transition-transform cursor-pointer">
                                    <i class="ti ti-refresh text-lg font-bold"></i>
                                </label>
                            </div>
                            <div class="p-3 bg-white border-t border-stone-100 flex items-center gap-2 text-xs font-bold text-emerald-800 font-montserrat">
                                <i class="ti ti-circle-check text-base"></i>
                                <span>Bukti transfer berhasil dipilih</span>
                            </div>
                        </div>

                        <p x-show="errors.bukti_pembayaran" x-text="errors.bukti_pembayaran" class="text-[11px] font-bold text-rose-500 mt-1 flex items-center gap-1 font-montserrat">
                            <i class="ti ti-alert-circle text-xs"></i>
                        </p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#062d27] font-montserrat">
                            Catatan Tambahan <span class="text-stone-400 font-normal text-[11px]">(Opsional)</span>
                        </label>
                        <textarea name="keterangan" x-model="form.keterangan" rows="2" 
                            class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 transition-all placeholder:text-stone-400 placeholder:font-normal focus:outline-none focus:border-[#062d27] focus:bg-white focus:ring-4 focus:ring-emerald-900/10"
                            placeholder="Catatan dari penyetor (misal: Transfer atas nama Ayah)"></textarea>
                    </div>

                    <div class="pt-2">
                        <button type="submit" 
                            class="w-full inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] text-xs font-black transition-all shadow-md shadow-lime-500/20 active:scale-95 font-montserrat">
                            <i class="ti ti-send text-base"></i>
                            <span>Kirim Konfirmasi Pembayaran</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right: Rekening & Riwayat -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- Rekening Card (Deep Emerald) -->
            <div class="bg-[#062d27] rounded-3xl p-6 text-white border border-emerald-900/60 shadow-lg relative overflow-hidden">
                <div class="absolute -right-8 -bottom-8 w-36 h-36 bg-[#bef264]/10 rounded-full blur-2xl pointer-events-none"></div>

                <div class="flex items-center justify-between mb-4 relative z-10">
                    <span class="text-[10px] font-black text-[#bef264] uppercase font-montserrat">Rekening Resmi</span>
                    <span class="text-xs text-emerald-200 font-bold font-montserrat">SPMB 2026</span>
                </div>

                <div class="p-4 bg-white/10 backdrop-blur-md rounded-2xl border border-white/15 flex items-center gap-4 relative z-10">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center font-black text-emerald-900 text-xs shadow-md shrink-0">
                        BSI
                    </div>
                    <div class="min-w-0">
                        <p class="text-[10px] font-bold text-emerald-200/80 uppercase font-montserrat">Bank Syariah Indonesia</p>
                        <p class="text-lg font-black text-[#bef264] font-mono tracking-wider">7085588887</p>
                        <p class="text-[11px] text-white/90 font-medium truncate">A.N Pesantren Persis 80 Ciamis</p>
                    </div>
                </div>
            </div>

            <!-- History Pembayaran -->
            <div class="bg-white border border-stone-200/80 rounded-3xl shadow-2xs overflow-hidden">
                <div class="px-6 py-4.5 bg-[#faf9f6] border-b border-stone-100 flex items-center justify-between">
                    <h3 class="text-xs font-bold text-[#062d27] font-montserrat flex items-center gap-2">
                        <i class="ti ti-history text-base text-emerald-800"></i>
                        <span>Riwayat Konfirmasi</span>
                    </h3>
                </div>

                <div class="divide-y divide-stone-100 max-h-[380px] overflow-y-auto">
                    @forelse($pembayaran as $p)
                        <div class="p-5 hover:bg-stone-50/70 transition-colors">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <p class="text-sm font-black text-[#062d27] font-mono leading-tight">
                                        Rp {{ number_format($p->jumlah_pembayaran, 0, ',', '.') }}
                                    </p>
                                    <p class="text-[11px] text-stone-500 font-medium mt-0.5">
                                        {{ \Carbon\Carbon::parse($p->tanggal_pembayaran)->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                                @if($p->status == 'approved')
                                    <span class="px-2.5 py-0.5 bg-emerald-50 text-emerald-800 text-[10px] font-bold rounded-full border border-emerald-200 font-montserrat flex items-center gap-1">
                                        <i class="ti ti-check text-xs"></i>
                                        <span>Terverifikasi</span>
                                    </span>
                                @elseif($p->status == 'rejected')
                                    <span class="px-2.5 py-0.5 bg-rose-50 text-rose-700 text-[10px] font-bold rounded-full border border-rose-200 font-montserrat">
                                        Ditolak
                                    </span>
                                @else
                                    <span class="px-2.5 py-0.5 bg-amber-50 text-amber-700 text-[10px] font-bold rounded-full border border-amber-200 font-montserrat">
                                        Menunggu
                                    </span>
                                @endif
                            </div>
                            @if($p->bukti_pembayaran)
                                <a href="{{ asset('storage/'.$p->bukti_pembayaran) }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-800 hover:text-emerald-950 font-montserrat mt-1">
                                    <i class="ti ti-photo text-sm"></i>
                                    <span>Lihat Struk Pembayaran</span>
                                </a>
                            @endif
                        </div>
                    @empty
                        <div class="p-8 text-center">
                            <div class="w-12 h-12 bg-stone-100 rounded-2xl flex items-center justify-center text-stone-400 mx-auto mb-2">
                                <i class="ti ti-receipt-off text-2xl"></i>
                            </div>
                            <p class="text-xs text-stone-500 font-bold font-montserrat">Belum ada riwayat pembayaran</p>
                            <p class="text-[11px] text-stone-400 mt-0.5">Kirim bukti transfer Anda melalui formulir di samping</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#tanggal_pembayaran", {
            locale: "id",
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "d F Y",
            disableMobile: "true",
            defaultDate: "today",
            animate: true,
            onChange: function(selectedDates, dateStr) {
                const el = document.getElementById('tanggal_pembayaran');
                if (el && el._x_model) {
                    el._x_model.set(dateStr);
                }
            }
        });
    });
</script>
@endpush
