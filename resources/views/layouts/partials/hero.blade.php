<section class="relative pt-32 pb-12 overflow-hidden dotted-background">
    <!-- Grid Ornament Overlay -->
    <div class="absolute inset-0 pointer-events-none z-0 opacity-75" style="
        background-image: 
            linear-gradient(to right, rgba(13, 148, 136, 0.08) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(13, 148, 136, 0.08) 1px, transparent 1px);
        background-size: 40px 40px;
        mask-image: radial-gradient(ellipse 60% 50% at 50% 50%, #000 70%, transparent 100%);
        -webkit-mask-image: radial-gradient(ellipse 60% 50% at 50% 50%, #000 70%, transparent 100%);
    "></div>
    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Model (Desktop) -->
            <div class="hidden lg:block lg:col-span-3 relative">
                <!-- Badges -->
                @if(isset($pilar[0]))
                <div class="absolute -top-4 left-0 animate-float-y z-10 bg-white/90 text-teal-700 text-[10px] font-bold px-3 py-1.5 rounded-lg shadow-md border border-teal-100 flex items-center gap-2">
                    <div class="w-5 h-5 bg-teal-500 rounded flex items-center justify-center text-white">
                        <i class="ti ti-book-2 text-xs"></i>
                    </div> {{ $pilar[0]->nama_pilar }}
                </div>
                @endif

                @if(isset($pilar[1]))
                <div class="absolute top-10 -right-4 animate-float-y z-10 bg-white/90 text-yellow-700 text-[10px] font-bold px-3 py-1.5 rounded-lg shadow-md border border-yellow-100 flex items-center gap-2" style="animation-delay: 0.5s;">
                    <div class="w-5 h-5 bg-yellow-500 rounded flex items-center justify-center text-white">
                        <i class="ti ti-eye text-xs"></i>
                    </div> {{ $pilar[1]->nama_pilar }}
                </div>
                @endif

                @if(isset($pilar[2]))
                <div class="absolute bottom-28 -left-6 animate-float-x z-10 bg-white/90 text-yellow-700 text-[10px] font-bold px-3 py-1.5 rounded-lg shadow-md border border-yellow-100 flex items-center gap-2">
                    <div class="w-5 h-5 bg-yellow-500 rounded flex items-center justify-center text-white">
                        <i class="ti ti-pencil text-xs"></i>
                    </div> {{ $pilar[2]->nama_pilar }}
                </div>
                @endif

                @if(isset($pilar[3]))
                <div class="absolute bottom-16 -right-2 animate-float-badge z-10 bg-white/90 text-teal-700 text-[10px] font-bold px-3 py-1.5 rounded-lg shadow-md border border-teal-100 flex items-center gap-2">
                    <div class="w-5 h-5 bg-teal-500 rounded flex items-center justify-center text-white">
                        <i class="ti ti-leaf text-xs"></i>
                    </div> {{ $pilar[3]->nama_pilar }}
                </div>
                @endif
                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_1) : 'https://placehold.co/400x500?text=Model+1' }}" alt="Model 1" class="relative z-0 w-full h-auto drop-shadow-2xl">
            </div>

            <!-- Center Content -->
            <div class="lg:col-span-6 text-center">
                <h1 class="text-4xl md:text-6xl font-extrabold text-teal-900 leading-[1.1] mb-6 font-poppins">
                    {{ $pengaturan->nama_sekolah ?? 'Pesantren Persatuan Islam 80 Al Amin' }}
                </h1>
                <div class="mb-10 relative inline-block group" data-aos="fade-up" data-aos-delay="200">
                    <p class="text-teal-700 text-lg md:text-2xl font-black font-poppins relative z-10 px-6 py-2">
                        Berakhlak Mulia, Tafaqquh Fiddien, Berprestasi
                    </p>
                    <!-- Hand-drawn Circle SVG -->
                    <svg class="absolute inset-0 w-full h-full pointer-events-none z-0 overflow-visible" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <path 
                            d="M 5,50 C 5,10 95,10 95,50 C 95,90 5,90 5,50 Z" 
                            class="animate-draw-circle"
                            fill="none" 
                            stroke="#fbbf24" 
                            stroke-width="12" 
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </div>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                    <a href="/register" class="w-full sm:w-auto bg-teal-600 text-white font-bold px-8 py-4 rounded-xl shadow-xl hover:bg-teal-700 transition-all transform hover:scale-105 flex items-center justify-center gap-2">
                        Daftar Sekarang
                        <i class="ti ti-arrow-right text-lg"></i>
                    </a>
                    <button class="w-full sm:w-auto flex items-center justify-center gap-3 text-teal-800 font-bold px-8 py-4 rounded-xl hover:bg-teal-50 transition-colors">
                        <div class="w-10 h-10 bg-white shadow-md rounded-full flex items-center justify-center text-teal-600">
                            <i class="ti ti-player-play-filled text-lg"></i>
                        </div>
                        Play Video
                    </button>
                </div>
            </div>

            <!-- Right Model (Desktop) -->
            <div class="hidden lg:block lg:col-span-3 relative">
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="ripple-anim"></div>
                </div>
                <div class="absolute top-1/2 -right-8 -translate-y-1/2 animate-float-badge z-20">
                    <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-4 shadow-2xl border border-white flex items-center gap-3">
                        <div class="w-10 h-10 bg-teal-500 rounded-xl flex items-center justify-center text-white">
                            <i class="ti ti-check text-xl"></i>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">Ayo Bergabung</div>
                            <div class="text-sm font-bold text-gray-800">Bersama Kami!</div>
                        </div>
                    </div>
                </div>
                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_2) : 'https://placehold.co/400x500?text=Model+2' }}" alt="Model 2" class="w-full h-auto drop-shadow-2xl">
            </div>

            <!-- Mobile Models -->
            <div class="lg:hidden grid grid-cols-2 gap-4 mt-8">
                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_1) : 'https://placehold.co/200x250?text=Model+1' }}" alt="Model 1" class="w-full h-auto drop-shadow-lg">
                <img src="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->model_2) : 'https://placehold.co/200x250?text=Model+2' }}" alt="Model 2" class="w-full h-auto drop-shadow-lg">
            </div>
        </div>
    </div>

    <!-- Alumni Slider Section -->
    <div class="relative z-20 -mt-4 lg:-mt-8">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl p-6 lg:p-8 border border-white/50">
                <div class="flex flex-col lg:flex-row items-center gap-8">
                    <div class="lg:w-1/4 text-center lg:text-left shrink-0">
                        <h2 class="text-xl italic font-black text-teal-900 leading-tight">Sebaran Alumni</h2>
                        <p class="text-gray-600 text-xs font-bold uppercase tracking-widest mt-1">{{ $pengaturan->nama_sekolah ?? 'Pesantren Al Amin' }}</p>
                    </div>
                    
                    <div class="lg:w-3/4 w-full overflow-hidden relative">
                        <div class="absolute inset-y-0 left-0 w-20 bg-gradient-to-r from-white/80 to-transparent z-10"></div>
                        <div class="absolute inset-y-0 right-0 w-20 bg-gradient-to-l from-white/80 to-transparent z-10"></div>
                        
                        <div class="flex items-center animate-marquee">
                            @foreach($alumni as $item)
                                <div class="mx-8 grayscale hover:grayscale-0 transition-all duration-500 transform hover:scale-110">
                                    <img src="{{ $item->getAdminImageUrl($item->logo) }}" alt="{{ $item->nama_universitas }}" class="h-12 w-auto object-contain">
                                </div>
                            @endforeach
                            {{-- Duplicate for infinite effect --}}
                            @foreach($alumni as $item)
                                <div class="mx-8 grayscale hover:grayscale-0 transition-all duration-500 transform hover:scale-110">
                                    <img src="{{ $item->getAdminImageUrl($item->logo) }}" alt="{{ $item->nama_universitas }}" class="h-12 w-auto object-contain">
                                </div>
                            @endforeach

                            @if($alumni->isEmpty())
                                <!-- Fallback Static Logos if no data -->
                                <div class="flex gap-16 items-center">
                                    <img src="https://upload.wikimedia.org/wikipedia/id/0/09/Logo_UPI.png" class="h-12 grayscale opacity-50" alt="UPI">
                                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/0/01/Logo_Unsil.png/600px-Logo_Unsil.png" class="h-12 grayscale opacity-50" alt="Unsil">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Sakarya_University_logo.png/800px-Sakarya_University_logo.png" class="h-12 grayscale opacity-50" alt="Sakarya">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Al-Azhar_University_logo.png/600px-Al-Azhar_University_logo.png" class="h-12 grayscale opacity-50" alt="Al-Azhar">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        display: flex;
        width: max-content;
        animation: marquee 30s linear infinite;
    }
    .animate-marquee:hover {
        animation-play-state: paused;
    }

    /* Ripple Animation */
    .ripple-anim {
        position: absolute;
        z-index: 0;
    }
    .ripple-anim::before, .ripple-anim::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100px;
        height: 100px;
        background: rgba(20, 184, 166, 0.15);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        animation: ripple 4s infinite;
    }
    .ripple-anim::after {
        animation-delay: 2s;
    }
    @keyframes ripple {
        0% { width: 0; height: 0; opacity: 1; }
        100% { width: 600px; height: 600px; opacity: 0; }
    }

    /* Floating Animations */
    @keyframes float-y {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    .animate-float-y { animation: float-y 4s ease-in-out infinite; }
    
    @keyframes float-badge {
        0%, 100% { transform: translateY(-50%) translateX(0); }
        50% { transform: translateY(-60%) translateX(10px); }
    }
    .animate-float-badge { animation: float-badge 5s ease-in-out infinite; }

    /* Tagline Animations */
    @keyframes fade-in-up {
        0% { transform: translateY(20px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }
    @keyframes fade-in {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }
    .animate-fade-in-up { animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    .animate-fade-in { animation: fade-in 0.5s ease-in; }

    /* Hand-drawn Circle Animation */
    .animate-draw-circle {
        stroke-dasharray: 400;
        stroke-dashoffset: 400;
        animation: draw-path 3s ease-in-out infinite alternate;
        opacity: 0.4;
        transform: rotate(-1deg);
    }
    @keyframes draw-path {
        0% { stroke-dashoffset: 400; }
        100% { stroke-dashoffset: 0; }
    }
</style>
