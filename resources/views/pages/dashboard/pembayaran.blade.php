@extends('layouts.dashboard')

@section('title', 'Konfirmasi Pembayaran')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    /* Modern Flatpickr Customization */
    .flatpickr-calendar {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        border: 1px solid #e2e8f0;
        padding: 8px;
    }
    .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected.continueSelection, .flatpickr-day.startRange.continueSelection, .flatpickr-day.endRange.continueSelection, .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover, .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus {
        background: #0d9488; /* teal-600 */
        border-color: #0d9488;
        border-radius: 10px;
        color: #fff !important;
    }
    .flatpickr-day.today {
        border-color: #0d9488;
        color: #0d9488;
    }
    .flatpickr-day:hover {
        background: #f1f5f9;
        border-color: #f1f5f9;
        border-radius: 10px;
    }
    .flatpickr-months .flatpickr-month {
        color: #0f172a;
        fill: #0f172a;
    }
    .flatpickr-current-month .flatpickr-monthDropdown-months {
        font-weight: 800;
        text-transform: uppercase;
        font-size: 13px;
    }
    .flatpickr-weekday {
        font-weight: 700;
        color: #94a3b8;
        font-size: 11px;
        text-transform: uppercase;
    }
</style>
@endpush

@section('content')
<div class="max-w-5xl mx-auto py-4 px-4">
    
    <!-- Feedback Messages -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-teal-50 border border-teal-100 rounded-xl text-teal-700 text-xs font-bold flex items-center gap-3 animate-fade-in">
            <i class="ti ti-circle-check text-lg"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left: Form Konfirmasi -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow-sm border border-slate-200 rounded-xl overflow-hidden">
                <div class="p-6 bg-teal-700 relative overflow-hidden">
                    <div class="relative z-10">
                        <h1 class="text-lg font-black text-white uppercase tracking-wider">Konfirmasi Pembayaran</h1>
                        <p class="text-teal-100 text-[10px] font-medium mt-1 uppercase tracking-widest">Silakan unggah bukti transfer pendaftaran Anda</p>
                    </div>
                    <i class="ti ti-credit-card absolute -right-4 -bottom-4 text-white/10 text-8xl"></i>
                </div>

                <form action="/pembayaran" method="POST" enctype="multipart/form-data" class="p-8 space-y-6"
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
                                this.errors.tanggal_pembayaran = 'Tanggal wajib diisi.';
                            }

                            if (field === 'jumlah_pembayaran') {
                                if (!this.form.jumlah_pembayaran) {
                                    this.errors.jumlah_pembayaran = 'Jumlah wajib diisi.';
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

                            // Bukti pembayaran validation (since x-model doesn't work on file inputs)
                            const fileInput = document.getElementById('file-upload');
                            if (!fileInput.files.length) {
                                this.errors.bukti_pembayaran = 'Bukti pembayaran wajib diunggah.';
                            } else {
                                this.errors.bukti_pembayaran = '';
                            }

                            let hasErrors = Object.values(this.errors).some(err => err !== '');
                            if (hasErrors) {
                                e.preventDefault();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Data Belum Lengkap',
                                    text: 'Silakan periksa kembali form Anda.',
                                    confirmButtonColor: '#0d9488'
                                });
                            }
                        }
                    }"
                    @submit="submit" novalidate>
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Tanggal Bayar <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <input type="text" id="tanggal_pembayaran" name="tanggal_pembayaran" 
                                    x-model="form.tanggal_pembayaran" @change="validate('tanggal_pembayaran')"
                                    required class="w-full bg-slate-50 border-b border-slate-200 py-2 px-1 text-sm font-bold text-slate-800 outline-none focus:border-teal-600 transition-all cursor-pointer" placeholder="Pilih Tanggal">
                                <i class="ti ti-calendar absolute right-2 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            </div>
                            <p x-show="errors.tanggal_pembayaran" x-text="errors.tanggal_pembayaran" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Metode <span class="text-rose-500">*</span></label>
                            <select name="metode_pembayaran" x-model="form.metode_pembayaran" @change="validate('metode_pembayaran')" required class="w-full bg-slate-50 border-b border-slate-200 py-2 px-1 text-sm font-bold text-slate-800 outline-none focus:border-teal-600 transition-all">
                                <option value="transfer">Transfer Bank</option>
                                <option value="tunai">Tunai / Langsung</option>
                            </select>
                            <p x-show="errors.metode_pembayaran" x-text="errors.metode_pembayaran" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Jumlah Pembayaran (Rp) <span class="text-rose-500">*</span></label>
                        <input type="number" name="jumlah_pembayaran" x-model="form.jumlah_pembayaran" @blur="validate('jumlah_pembayaran')" required class="w-full bg-slate-50 border-b border-slate-200 py-2 px-1 text-sm font-bold text-slate-800 outline-none focus:border-teal-600 transition-all" placeholder="Contoh: 250000">
                        <p x-show="errors.jumlah_pembayaran" x-text="errors.jumlah_pembayaran" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                    </div>

                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Unggah Bukti Transfer <span class="text-rose-500">*</span></label>
                        
                        <div x-show="!imagePreview" class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-xl hover:border-teal-400 transition-colors group" :class="errors.bukti_pembayaran ? 'border-rose-300 bg-rose-50' : ''">
                            <div class="space-y-1 text-center">
                                <i class="ti ti-upload text-3xl text-slate-300 group-hover:text-teal-500 transition-colors"></i>
                                <div class="flex text-xs text-slate-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-bold text-teal-600 hover:text-teal-500 focus-within:outline-none">
                                        <span>Klik untuk pilih file</span>
                                        <input id="file-upload" name="bukti_pembayaran" type="file" class="sr-only" required accept="image/*" @change="previewImage">
                                    </label>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-[10px] text-slate-400">PNG, JPG up to 2MB</p>
                            </div>
                        </div>

                        <!-- Image Preview -->
                        <div x-show="imagePreview" x-cloak class="mt-2 relative group">
                            <img :src="imagePreview" class="w-full h-48 object-cover rounded-xl border border-slate-200 shadow-sm">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity rounded-xl flex items-center justify-center gap-4">
                                <button type="button" @click="removeImage" class="bg-rose-500 text-white p-2 rounded-full hover:scale-110 transition-transform">
                                    <i class="ti ti-trash text-lg"></i>
                                </button>
                                <label for="file-upload" class="bg-teal-500 text-white p-2 rounded-full hover:scale-110 transition-transform cursor-pointer">
                                    <i class="ti ti-refresh text-lg"></i>
                                </label>
                            </div>
                            <div class="mt-2 flex items-center gap-2 text-[10px] font-bold text-teal-600">
                                <i class="ti ti-circle-check"></i>
                                Bukti terpilih - Siap dikirim
                            </div>
                        </div>

                        <p x-show="errors.bukti_pembayaran" x-text="errors.bukti_pembayaran" class="text-[10px] font-bold text-rose-500 mt-1"></p>
                    </div>

                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Keterangan Tambahan</label>
                        <textarea name="keterangan" x-model="form.keterangan" rows="2" class="w-full bg-slate-50 border rounded-xl py-3 px-4 text-sm font-bold text-slate-800 outline-none border-slate-200 focus:border-teal-600 transition-all" placeholder="Catatan untuk panitia (opsional)"></textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-slate-900 text-white py-4 rounded-xl text-xs font-black uppercase tracking-widest shadow-xl shadow-slate-900/10 hover:bg-teal-700 active:scale-95 transition-all flex items-center justify-center gap-3">
                            <i class="ti ti-send text-lg"></i>
                            Kirim Konfirmasi
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right: Riwayat & Info -->
        <div class="space-y-8">
            <!-- Bank Info -->
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Rekening Tujuan</h3>
                <div class="space-y-4">
                    <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 flex items-center gap-4">
                        <div class="w-10 h-10 bg-white rounded flex items-center justify-center font-bold text-teal-700 shadow-sm border border-slate-100">BSI</div>
                        <div class="min-w-0">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter mb-0.5">Bank Syariah Indonesia</p>
                            <p class="text-sm font-black text-slate-800">711 711 8080</p>
                            <p class="text-[10px] font-bold text-slate-500">A.N Al Amin Persis 80</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- History -->
            <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                <div class="px-6 py-4 bg-gray-50 border-b border-slate-200">
                    <h3 class="text-[10px] font-black text-slate-700 uppercase tracking-widest">Riwayat Konfirmasi</h3>
                </div>
                <div class="divide-y divide-slate-100 max-h-[400px] overflow-y-auto">
                    @forelse($pembayaran as $p)
                        <div class="p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <p class="text-sm font-black text-slate-800 leading-none">Rp {{ number_format($p->jumlah_pembayaran, 0, ',', '.') }}</p>
                                    <p class="text-[10px] text-slate-400 font-medium mt-1">{{ \Carbon\Carbon::parse($p->tanggal_pembayaran)->translatedFormat('d M Y') }}</p>
                                </div>
                                @if($p->status == 'approved')
                                    <span class="bg-teal-50 text-teal-600 text-[8px] font-black px-1.5 py-0.5 rounded uppercase tracking-tighter">Verified</span>
                                @elseif($p->status == 'rejected')
                                    <span class="bg-rose-50 text-rose-600 text-[8px] font-black px-1.5 py-0.5 rounded uppercase tracking-tighter">Rejected</span>
                                @else
                                    <span class="bg-amber-50 text-amber-600 text-[8px] font-black px-1.5 py-0.5 rounded uppercase tracking-tighter">Pending</span>
                                @endif
                            </div>
                            @if($p->bukti_pembayaran)
                                <a href="{{ asset('storage/'.$p->bukti_pembayaran) }}" target="_blank" class="inline-flex items-center gap-1 text-[9px] font-bold text-teal-600 hover:underline">
                                    <i class="ti ti-eye"></i> Lihat Bukti
                                </a>
                            @endif
                        </div>
                    @empty
                        <div class="p-8 text-center">
                            <i class="ti ti-info-circle text-slate-200 text-3xl mb-2"></i>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest leading-relaxed">Belum ada riwayat pembayaran</p>
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
        const fp = flatpickr("#tanggal_pembayaran", {
            locale: "id",
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "d F Y",
            disableMobile: "true",
            defaultDate: "today",
            animate: true,
            onChange: function(selectedDates, dateStr, instance) {
                // Manually trigger Alpine update if needed
                const el = document.getElementById('tanggal_pembayaran');
                if (el._x_model) {
                    el._x_model.set(dateStr);
                }
            }
        });
    });
</script>
@endpush
