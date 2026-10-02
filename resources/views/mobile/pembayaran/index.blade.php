@extends('layouts.mobile')

@section('title', 'Konfirmasi Pembayaran')

@section('content')
<div x-data="paymentForm()" class="min-h-[100dvh] bg-[#faf9f6] flex flex-col font-sans selection:bg-[#bef264] selection:text-[#062d27] pb-28">
    
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
                    <h1 class="text-white text-base font-black leading-tight tracking-tight font-montserrat">Pembayaran SPMB</h1>
                    <p class="text-[#bef264] text-[11px] font-bold font-montserrat mt-0.5">Konfirmasi Biaya Pendaftaran</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="flex-1 -mt-6 px-5 relative z-20 space-y-4">
        
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

        <!-- REKENING CARD (Deep Emerald) -->
        <div class="bg-[#062d27] rounded-3xl p-5 shadow-lg border border-emerald-900/60 text-white relative overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-[#bef264]/10 rounded-full blur-2xl pointer-events-none"></div>

            <div class="relative z-10">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[10px] font-bold text-[#bef264] uppercase font-montserrat">Rekening Resmi</span>
                    <span class="text-[10px] text-emerald-200 font-bold font-montserrat">SPMB 2026</span>
                </div>

                <div class="flex items-center gap-3.5 bg-white/10 backdrop-blur-md rounded-2xl p-3 border border-white/15">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center font-black text-emerald-900 text-xs shadow-sm shrink-0">
                        BSI
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-[10px] font-bold text-emerald-200 uppercase font-montserrat">Bank Syariah Indonesia</p>
                        <p class="text-base font-black text-[#bef264] font-mono tracking-wider">7085588887</p>
                        <p class="text-[10px] text-white/90 font-medium truncate">A.N Pesantren Persis 80 Ciamis</p>
                    </div>
                    <button type="button" @click="copyToClipboard('7085588887')" class="w-9 h-9 bg-[#bef264] text-[#062d27] rounded-xl flex items-center justify-center active:scale-90 transition-transform shadow-xs shrink-0 font-bold">
                        <i class="ti ti-copy text-base"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- PAYMENT FORM -->
        <div class="bg-white rounded-3xl p-5 shadow-sm border border-stone-200/80">
            <h3 class="text-[#062d27] text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 font-montserrat">
                <i class="ti ti-upload text-emerald-800 text-base"></i>
                <span>Unggah Bukti Pembayaran</span>
            </h3>

            <form action="/pembayaran" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Tanggal Bayar <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal_pembayaran" x-model="form.tanggal_pembayaran"
                           class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Jumlah Transfer (Rp) <span class="text-rose-500">*</span></label>
                    <input type="number" name="jumlah_pembayaran" x-model="form.jumlah_pembayaran"
                           class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none font-mono"
                           placeholder="Contoh: 250000">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Metode Pembayaran <span class="text-rose-500">*</span></label>
                    <select name="metode_pembayaran" x-model="form.metode_pembayaran"
                            class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none">
                        <option value="transfer">Transfer Bank / M-Banking</option>
                        <option value="tunai">Tunai / Bayar Langsung</option>
                    </select>
                </div>

                <!-- UPLOAD BUKTI -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Struk / Bukti Transfer <span class="text-rose-500">*</span></label>
                    <div x-show="!imagePreview">
                        <label for="bukti_pembayaran" class="flex flex-col items-center justify-center w-full p-6 bg-[#faf9f6] border-2 border-dashed border-stone-300 rounded-2xl cursor-pointer hover:bg-stone-100 transition-all active:scale-[0.99] select-none text-center">
                            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="hidden" accept="image/*" @change="previewImage">
                            <div class="w-11 h-11 rounded-2xl bg-white border border-stone-200 flex items-center justify-center text-stone-400 mb-2 shadow-2xs">
                                <i class="ti ti-camera text-2xl"></i>
                            </div>
                            <span class="text-xs font-bold text-[#062d27] font-montserrat">Pilih / Ambil Foto Struk</span>
                            <span class="text-[10px] text-stone-400 mt-0.5">JPG, PNG (Maks 2MB)</span>
                        </label>
                    </div>

                    <div x-show="imagePreview" x-cloak class="relative group rounded-2xl overflow-hidden border border-stone-200">
                        <img :src="imagePreview" class="w-full h-44 object-cover">
                        <button type="button" @click="removeImage" class="absolute top-2 right-2 w-8 h-8 bg-rose-600 text-white rounded-xl flex items-center justify-center shadow-lg active:scale-90 transition-all">
                            <i class="ti ti-trash text-sm"></i>
                        </button>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#062d27] font-montserrat">Catatan Tambahan</label>
                    <textarea name="keterangan" x-model="form.keterangan" rows="2"
                              class="w-full px-4 py-3 rounded-2xl bg-[#faf9f6] text-xs font-bold text-stone-900 border border-stone-200/80 focus:border-[#062d27] focus:bg-white transition-all outline-none"
                              placeholder="Nama pemilik rekening pengirim (opsional)"></textarea>
                </div>

                <button type="submit" class="w-full bg-[#bef264] hover:bg-[#a3e635] text-[#062d27] py-3.5 rounded-2xl text-xs font-black shadow-md shadow-lime-500/20 active:scale-95 transition-all flex items-center justify-center gap-2 font-montserrat">
                    <i class="ti ti-send text-base"></i>
                    <span>Kirim Bukti Pembayaran</span>
                </button>
            </form>
        </div>

        <!-- HISTORY SECTION -->
        <div class="space-y-3">
            <h3 class="text-[#062d27] text-xs font-bold uppercase tracking-wider flex items-center gap-2 font-montserrat ml-1">
                <i class="ti ti-history text-emerald-800 text-base"></i>
                <span>Riwayat Pembayaran</span>
            </h3>

            <div class="space-y-3">
                @forelse($pembayaran as $p)
                <div class="bg-white rounded-3xl p-4.5 border border-stone-200/80 shadow-2xs flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl flex items-center justify-center {{ $p->status == 'approved' ? 'bg-emerald-50 text-emerald-800' : ($p->status == 'rejected' ? 'bg-rose-50 text-rose-700' : 'bg-amber-50 text-amber-700') }}">
                            <i class="ti ti-{{ $p->status == 'approved' ? 'circle-check' : ($p->status == 'rejected' ? 'circle-x' : 'clock') }} text-xl"></i>
                        </div>
                        <div>
                            <p class="text-xs font-black text-[#062d27] font-mono leading-none mb-1">Rp {{ number_format($p->jumlah_pembayaran, 0, ',', '.') }}</p>
                            <p class="text-[10px] text-stone-400 font-medium">{{ \Carbon\Carbon::parse($p->tanggal_pembayaran)->translatedFormat('d M Y') }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        @if($p->status == 'approved')
                            <span class="px-2.5 py-0.5 bg-emerald-50 text-emerald-800 text-[10px] font-bold rounded-full border border-emerald-200 font-montserrat">Selesai</span>
                        @elseif($p->status == 'rejected')
                            <span class="px-2.5 py-0.5 bg-rose-50 text-rose-700 text-[10px] font-bold rounded-full border border-rose-200 font-montserrat">Ditolak</span>
                        @else
                            <span class="px-2.5 py-0.5 bg-amber-50 text-amber-700 text-[10px] font-bold rounded-full border border-amber-200 font-montserrat">Menunggu</span>
                        @endif
                        @if($p->bukti_pembayaran)
                        <button type="button" @click="modalImage = '{{ asset('storage/' . $p->bukti_pembayaran) }}'; showModal = true" class="block text-[10px] font-bold text-emerald-800 mt-1 hover:underline font-montserrat">Lihat Struk</button>
                        @endif
                    </div>
                </div>
                @empty
                <div class="bg-white rounded-3xl p-8 border border-stone-200/80 text-center">
                    <div class="w-12 h-12 bg-stone-100 rounded-2xl flex items-center justify-center text-stone-400 mx-auto mb-2">
                        <i class="ti ti-receipt-off text-2xl"></i>
                    </div>
                    <p class="text-xs text-stone-500 font-bold font-montserrat">Belum ada riwayat</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>

    <!-- IMAGE MODAL OVERLAY -->
    <div x-show="showModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4">
        <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" @click="showModal = false" class="absolute inset-0 bg-stone-900/80 backdrop-blur-sm"></div>
        <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="relative max-w-full max-h-full bg-white rounded-3xl overflow-hidden shadow-2xl z-10">
            <div class="p-4 border-b border-stone-100 flex justify-between items-center bg-white">
                <h4 class="text-xs font-black text-[#062d27] font-montserrat">Struk Pembayaran</h4>
                <button @click="showModal = false" class="w-8 h-8 bg-stone-100 rounded-xl flex items-center justify-center text-stone-500">
                    <i class="ti ti-x text-base"></i>
                </button>
            </div>
            <div class="p-3 bg-[#faf9f6]">
                <img :src="modalImage" class="max-w-full max-h-[70vh] rounded-2xl shadow-xs mx-auto object-contain" alt="Bukti Transfer">
            </div>
            <div class="p-3 bg-white text-center border-t border-stone-100">
                <a :href="modalImage" download class="inline-flex items-center gap-1.5 text-xs font-bold text-[#062d27] font-montserrat">
                    <i class="ti ti-download text-sm"></i>
                    <span>Unduh Gambar Struk</span>
                </a>
            </div>
        </div>
    </div>

    <!-- BOTTOM NAVIGATION (Emerald & Lime theme) -->
    <div class="fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-2xl border-t border-stone-200/70 shadow-[0_-15px_40px_rgba(0,0,0,0.04)] z-50 px-3 pb-[env(safe-area-inset-bottom,12px)] pt-2.5">
        <div class="flex items-center justify-around">
            <a href="/dashboard" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl text-stone-400 group-hover:text-[#062d27] flex items-center justify-center transition-transform group-active:scale-90">
                    <i class="ti ti-smart-home text-lg"></i>
                </div>
                <span class="text-[10px] font-semibold text-stone-400 group-hover:text-[#062d27] font-montserrat mt-1">Beranda</span>
            </a>
            
            <a href="/biodata" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl text-stone-400 group-hover:text-[#062d27] flex items-center justify-center transition-transform group-active:scale-90">
                    <i class="ti ti-file-text text-lg"></i>
                </div>
                <span class="text-[10px] font-semibold text-stone-400 group-hover:text-[#062d27] font-montserrat mt-1">Biodata</span>
            </a>

            <a href="/pembayaran" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl bg-[#062d27] text-[#bef264] flex items-center justify-center shadow-xs transition-transform group-active:scale-90">
                    <i class="ti ti-credit-card text-lg"></i>
                </div>
                <span class="text-[10px] font-bold text-[#062d27] font-montserrat mt-1">Bayar</span>
            </a>

            <a href="/password" class="flex flex-col items-center py-1 w-16 group">
                <div class="w-8 h-8 rounded-xl text-stone-400 group-hover:text-[#062d27] flex items-center justify-center transition-transform group-active:scale-90">
                    <i class="ti ti-lock text-lg"></i>
                </div>
                <span class="text-[10px] font-semibold text-stone-400 group-hover:text-[#062d27] font-montserrat mt-1">Akun</span>
            </a>
        </div>
    </div>

</div>

<script>
function paymentForm() {
    return {
        showModal: false,
        modalImage: null,
        form: {
            tanggal_pembayaran: '{{ old('tanggal_pembayaran', date('Y-m-d')) }}',
            jumlah_pembayaran: '{{ old('jumlah_pembayaran') }}',
            metode_pembayaran: '{{ old('metode_pembayaran', 'transfer') }}',
            keterangan: '{{ old('keterangan') }}'
        },
        imagePreview: null,
        previewImage(e) {
            const file = e.target.files[0];
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
            document.getElementById('bukti_pembayaran').value = '';
        },
        copyToClipboard(text) {
            navigator.clipboard.writeText(text);
            if(window.Swal) {
                Swal.fire({
                    icon: 'success',
                    title: 'Disalin',
                    text: 'Nomor rekening telah disalin ke clipboard.',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                alert('Nomor rekening disalin: ' + text);
            }
        }
    }
}
</script>
@endsection
