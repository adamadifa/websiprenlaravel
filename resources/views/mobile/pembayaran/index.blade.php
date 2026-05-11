@extends('layouts.mobile')

@section('title', 'Konfirmasi Pembayaran')

@section('content')
<div x-data="paymentForm()" class="min-h-[100dvh] bg-slate-50 flex flex-col font-sans selection:bg-teal-100 pb-24">
    
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
                    <h1 class="text-white text-lg font-black leading-none tracking-tight">Pembayaran</h1>
                    <p class="text-teal-200/80 text-[11px] font-medium mt-1">Konfirmasi Biaya Pendaftaran</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="flex-1 -mt-6 px-5 relative z-20 space-y-4">
        
        <!-- Feedback Notifications -->
        @if(session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-100 rounded-2xl text-emerald-700 text-[11px] font-bold flex items-center gap-3 shadow-sm" data-aos="fade-down">
                <div class="w-8 h-8 bg-emerald-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-500/20">
                    <i class="ti ti-check text-lg"></i>
                </div>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 bg-rose-50 border border-rose-100 rounded-2xl text-rose-700 text-[11px] font-bold flex items-center gap-3 shadow-sm" data-aos="fade-down">
                <div class="w-8 h-8 bg-rose-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-rose-500/20">
                    <i class="ti ti-alert-triangle text-lg"></i>
                </div>
                {{ session('error') }}
            </div>
        @endif

        <!-- BANK INFO CARD -->
        <div class="bg-teal-600 rounded-2xl p-5 shadow-xl shadow-teal-600/20 border border-white/10 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-4 opacity-10">
                <i class="ti ti-building-bank text-6xl text-white"></i>
            </div>
            <div class="relative z-10">
                <p class="text-[10px] font-bold text-teal-100 uppercase tracking-widest mb-3">Rekening Tujuan</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center font-black text-teal-800 shadow-lg shadow-black/10">BSI</div>
                    <div>
                        <p class="text-white text-base font-black tracking-wider leading-none mb-1.5">711 711 8080</p>
                        <p class="text-teal-50 text-[10px] font-bold">A.N Al Amin Persis 80</p>
                    </div>
                    <button @click="copyToClipboard('7117118080')" class="ml-auto w-9 h-9 bg-white/20 rounded-lg flex items-center justify-center text-white active:scale-90 transition-all border border-white/10">
                        <i class="ti ti-copy text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- PAYMENT FORM -->
        <div class="bg-white rounded-xl p-6 shadow-xl shadow-teal-950/5 border border-slate-100">
            <h3 class="text-slate-800 text-sm font-black mb-6 flex items-center gap-2">
                <i class="ti ti-upload text-teal-600 text-lg"></i>
                Kirim Bukti Bayar
            </h3>

            <form action="/pembayaran" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <div class="relative group">
                    <input type="date" name="tanggal_pembayaran" x-model="form.tanggal_pembayaran" id="tanggal_pembayaran" class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                    <label for="tanggal_pembayaran" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 pointer-events-none" :class="form.tanggal_pembayaran ? '' : 'scale-100 -translate-y-1/2 top-1/2'">Tanggal Pembayaran</label>
                </div>

                <div class="relative group">
                    <input type="number" name="jumlah_pembayaran" x-model="form.jumlah_pembayaran" id="jumlah_pembayaran" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all">
                    <label for="jumlah_pembayaran" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4.5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Jumlah Bayar (Rp)</label>
                </div>

                <div class="relative group">
                    <select name="metode_pembayaran" x-model="form.metode_pembayaran" id="metode_pembayaran" class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 appearance-none transition-all">
                        <option value="transfer">Transfer Bank</option>
                        <option value="tunai">Tunai / Langsung</option>
                    </select>
                    <label for="metode_pembayaran" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-4.5 z-10 origin-[0] left-4 pointer-events-none">Metode Pembayaran</label>
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400 mt-1">
                        <i class="ti ti-chevron-down"></i>
                    </div>
                </div>

                <!-- UPLOAD BUKTI -->
                <div class="space-y-2">
                    <div x-show="!imagePreview" class="relative">
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="hidden" accept="image/*" @change="previewImage">
                        <label for="bukti_pembayaran" class="flex flex-col items-center justify-center w-full h-32 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl cursor-pointer hover:bg-slate-100 transition-all">
                            <i class="ti ti-camera text-3xl text-slate-300 mb-2"></i>
                            <span class="text-[11px] font-bold text-slate-500">Ambil Foto / Pilih Bukti</span>
                        </label>
                    </div>

                    <div x-show="imagePreview" x-cloak class="relative group">
                        <img :src="imagePreview" class="w-full h-48 object-cover rounded-2xl border border-slate-200">
                        <button type="button" @click="removeImage" class="absolute top-2 right-2 w-8 h-8 bg-rose-500 text-white rounded-lg flex items-center justify-center shadow-lg active:scale-90 transition-all">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>
                </div>

                <div class="relative group">
                    <textarea name="keterangan" x-model="form.keterangan" id="keterangan" rows="2" placeholder=" " class="peer w-full bg-slate-50 border border-slate-200 rounded-xl pt-6 pb-2 px-4 text-[13px] font-bold text-slate-800 outline-none focus:bg-white focus:border-teal-500 transition-all"></textarea>
                    <label for="keterangan" class="absolute text-[11px] font-medium text-slate-500 duration-300 transform -translate-y-3 scale-90 top-5 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-5 peer-focus:top-5 peer-focus:scale-90 peer-focus:-translate-y-3 pointer-events-none">Keterangan (Opsional)</label>
                </div>

                <button type="submit" class="w-full bg-teal-600 text-white py-4 rounded-2xl text-[13px] font-black shadow-lg shadow-teal-600/30 active:scale-95 transition-all flex items-center justify-center gap-3">
                    <i class="ti ti-send text-lg"></i>
                    Kirim Konfirmasi
                </button>
            </form>
        </div>

        <!-- HISTORY SECTION -->
        <div class="space-y-4">
            <h3 class="text-slate-800 text-[11px] font-black uppercase tracking-widest flex items-center gap-2 ml-1">
                <i class="ti ti-history text-teal-600 text-lg"></i>
                Riwayat Pembayaran
            </h3>

            <div class="space-y-3">
                @forelse($pembayaran as $p)
                <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center {{ $p->status == 'approved' ? 'bg-emerald-50 text-emerald-600' : ($p->status == 'rejected' ? 'bg-rose-50 text-rose-600' : 'bg-amber-50 text-amber-600') }}">
                            <i class="ti ti-{{ $p->status == 'approved' ? 'circle-check' : ($p->status == 'rejected' ? 'circle-x' : 'clock-hour-4') }} text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[13px] font-black text-slate-800 leading-none mb-1">Rp {{ number_format($p->jumlah_pembayaran, 0, ',', '.') }}</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">{{ \Carbon\Carbon::parse($p->tanggal_pembayaran)->translatedFormat('d M Y') }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="px-2 py-1 rounded-lg text-[9px] font-black uppercase tracking-tighter border {{ $p->status == 'approved' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : ($p->status == 'rejected' ? 'bg-rose-50 text-rose-600 border-rose-100' : 'bg-amber-50 text-amber-600 border-amber-100') }}">
                            {{ $p->status }}
                        </span>
                        @if($p->bukti_pembayaran)
                        <button type="button" @click="modalImage = '{{ asset('storage/' . $p->bukti_pembayaran) }}'; showModal = true" class="block text-[9px] font-bold text-teal-600 mt-1.5 hover:underline">Lihat Bukti</button>
                        @endif
                    </div>
                </div>
                @empty
                <div class="bg-white rounded-xl p-10 border border-slate-100 text-center">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center text-slate-200 mx-auto mb-3">
                        <i class="ti ti-credit-card-off text-3xl"></i>
                    </div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Belum ada riwayat</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>

    <!-- IMAGE MODAL OVERLAY -->
    <div x-show="showModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4">
        <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" @click="showModal = false" class="absolute inset-0 bg-slate-900/90 backdrop-blur-sm"></div>
        <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" class="relative max-w-full max-h-full bg-white rounded-xl overflow-hidden shadow-2xl z-10">
            <div class="p-4 border-b border-slate-100 flex justify-between items-center bg-white">
                <h4 class="text-xs font-black text-slate-800 uppercase tracking-widest">Bukti Pembayaran</h4>
                <button @click="showModal = false" class="w-8 h-8 bg-slate-100 rounded-full flex items-center justify-center text-slate-500">
                    <i class="ti ti-x text-lg"></i>
                </button>
            </div>
            <div class="p-2 bg-slate-50">
                <img :src="modalImage" class="max-w-full h-auto rounded-2xl shadow-sm mx-auto" alt="Bukti Transfer">
            </div>
            <div class="p-4 bg-white text-center">
                <a :href="modalImage" download class="inline-flex items-center gap-2 text-[11px] font-bold text-teal-600">
                    <i class="ti ti-download"></i>
                    Unduh Gambar
                </a>
            </div>
        </div>
    </div>

    <!-- BOTTOM NAVIGATION (Active: Bayar) -->
    <div class="fixed bottom-0 left-0 right-0 bg-white/90 backdrop-blur-2xl border-t border-slate-200/60 shadow-[0_-15px_40px_rgba(0,0,0,0.03)] z-50 px-2 pb-[env(safe-area-inset-bottom,16px)] pt-3">
        <div class="flex items-center justify-around pb-2">
            <a href="/dashboard" class="group flex flex-col items-center w-16">
                <div class="text-slate-400 group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-smart-home text-[24px]"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 tracking-wide mt-1">Beranda</span>
            </a>
            
            <a href="/biodata" class="group flex flex-col items-center w-16">
                <div class="text-slate-400 group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-user-edit text-[24px]"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 tracking-wide mt-1">Biodata</span>
            </a>

            <a href="/pembayaran" class="group flex flex-col items-center relative w-16">
                <div class="absolute -top-4 w-12 h-1 bg-teal-500 rounded-b-lg"></div>
                <div class="text-teal-600 transition-transform group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-wallet text-[26px]"></i>
                </div>
                <span class="text-[10px] font-black text-teal-600 tracking-wide mt-1">Bayar</span>
            </a>

            <a href="/password" class="group flex flex-col items-center w-16">
                <div class="text-slate-400 group-active:scale-90 flex items-center justify-center h-8">
                    <i class="ti ti-settings text-[24px]"></i>
                </div>
                <span class="text-[10px] font-bold text-slate-400 tracking-wide mt-1">Akun</span>
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
            // Optional: add toast notification here
            alert('Nomor rekening disalin!');
        }
    }
}
</script>
@endsection
