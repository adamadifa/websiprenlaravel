<?php

namespace App\Http\Controllers;

use App\Models\JenjangPendidikan;
use App\Models\PengaturanUmum;
use App\Models\Perlombaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AgtLandingController extends Controller
{
    public function index(Request $request)
    {
        $pengaturan = PengaturanUmum::first();

        // Icon helper mapping berdasarkan kata kunci nama lomba
        $getIcon = function ($title) {
            $t = strtolower($title);
            if (str_contains($t, 'mhq') || str_contains($t, 'qur')) return 'ti-book';
            if (str_contains($t, 'archery') || str_contains($t, 'panah')) return 'ti-target';
            if (str_contains($t, 'matematika') || str_contains($t, 'sains')) return 'ti-calculator';
            if (str_contains($t, 'inggris') || str_contains($t, 'bahasa') || str_contains($t, 'pidato')) return 'ti-microphone-2';
            if (str_contains($t, 'gambar') || str_contains($t, 'warna') || str_contains($t, 'lukis') || str_contains($t, 'kaligrafi')) return 'ti-brush';
            if (str_contains($t, 'kolase')) return 'ti-palette';
            if (str_contains($t, 'nasyid') || str_contains($t, 'hadroh') || str_contains($t, 'musik')) return 'ti-music';
            if (str_contains($t, 'video') || str_contains($t, 'movie')) return 'ti-video';
            if (str_contains($t, 'puisi') || str_contains($t, 'teater')) return 'ti-mask';
            return 'ti-trophy';
        };

        // Kategori filter tab helper berdasarkan jenjang pendidikan
        $getCategorySlug = function ($jenjangName) {
            $j = strtolower($jenjangName ?? '');
            if (str_contains($j, 'kober') || str_contains($j, 'tk')) return 'paud_tk';
            if (str_contains($j, 'sd') || str_contains($j, 'mi')) return 'sd_mi';
            if (str_contains($j, 'smp') || str_contains($j, 'mts')) return 'smp_mts';
            if (str_contains($j, 'sma') || str_contains($j, 'ma') || str_contains($j, 'smk')) return 'sma_ma';
            return 'umum';
        };

        // Ambil data langsung dari Database: tabel 'perlombaan' berelasi ke 'jenjang_pendidikan'
        $dbPerlombaan = Perlombaan::with('jenjangPendidikan')->orderBy('id_jenjang', 'asc')->get();

        if ($dbPerlombaan->isNotEmpty()) {
            $competitions = $dbPerlombaan->map(function ($item) use ($getIcon, $getCategorySlug) {
                $jenjangLabel = $item->jenjangPendidikan ? $item->jenjangPendidikan->jenjang_pendidikan : 'Umum';
                $categorySlug = $getCategorySlug($jenjangLabel);

                // Detail keterangan fee (per orang / per group)
                $feeText = $item->formatted_fee;
                $tNama = strtolower($item->jenis_perlombaan);
                if ((float) $item->biaya_pendaftaran > 0) {
                    if (str_contains($tNama, 'matematika')) {
                        $feeText .= ' / group (3 orang)';
                    } elseif (str_contains($tNama, 'archery') || str_contains($tNama, 'panah')) {
                        $feeText .= ' / orang';
                    }
                }

                return [
                    'id' => $item->id,
                    'slug' => Str::slug($item->jenis_perlombaan . '-' . $jenjangLabel),
                    'title' => $item->jenis_perlombaan,
                    'category' => $categorySlug,
                    'category_label' => $jenjangLabel,
                    'icon' => $getIcon($item->jenis_perlombaan),
                    'color' => 'amber',
                    'poster' => $item->poster_url,
                    'description' => 'Kompetisi ' . $item->jenis_perlombaan . ' untuk jenjang ' . $jenjangLabel . ' dalam ajang Al Amin Got Talent 2026.',
                    'target_peserta' => str_contains($tNama, 'matematika') ? $jenjangLabel . ' (Group 3 Orang)' : $jenjangLabel . ' (Putra/Putri)',
                    'fee' => $feeText,
                    'quota' => 'Tersedia',
                    'hadiah' => 'Trophy + Uang Pembinaan + Golden Ticket Beasiswa',
                    'durasi' => 'Sesuai Juknis',
                    'juknis_url' => $item->juknis_url,
                    'juknis' => [
                        'Terbuka untuk peserta jenjang ' . $jenjangLabel,
                        'Pendaftaran wajib melampirkan identitas resmi atau surat rekomendasi sekolah',
                        'Petunjuk pelaksanaan teknis lengkap tercantum pada dokumen Juknis resmi',
                        'Keputusan dewan juri bersifat mutlak dan tidak dapat diganggu gugat'
                    ],
                    'cp' => $item->contact_person ? $item->contact_person . ' (Panitia Lomba)' : '0812-3456-7890 (Panitia AGT)'
                ];
            })->toArray();
        } else {
            // Fallback default jika tabel belum terisi data
            $competitions = [
                [
                    'id' => 1,
                    'slug' => 'mhq-tahfidz',
                    'title' => "Musabaqah Hifdzil Qur'an (MHQ)",
                    'category' => 'sd_mi',
                    'category_label' => 'SD/MI',
                    'icon' => 'ti-book',
                    'color' => 'amber',
                    'poster' => asset('images/agt/posters/mhq.jpg'),
                    'description' => 'Ajang uji hafalan, kelancaran tajwid, fashahah, dan adab tilawah Al-Qur\'an.',
                    'target_peserta' => 'Putra & Putri (Individu)',
                    'fee' => 'Gratis',
                    'quota' => '40 Peserta',
                    'hadiah' => 'Trophy + Uang Pembinaan + Beasiswa + Piagam',
                    'durasi' => '7 - 10 Menit',
                    'juknis_url' => null,
                    'juknis' => [
                        'Kategori A: Juz 30 (Khusus SD/MI)',
                        'Kriteria Penilaian: Tahfidz & Kelancaran (50%), Tajwid (30%), Fashahah (20%)'
                    ],
                    'cp' => '0896-7176-2727 (Ustadz Fauzan)'
                ]
            ];
        }

        // Ambil daftar jenjang aktif untuk tab filter dinamis
        $availableCategories = collect($competitions)->pluck('category_label', 'category')->unique();

        // Timeline Rangkaian Acara
        $timeline = [
            [
                'phase' => 'Fase 1',
                'title' => 'Pendaftaran & Pengumpulan Berkas',
                'date' => '01 November 2026 - 10 Januari 2027',
                'desc' => 'Pendaftaran online melalui website resmi atau WhatsApp panitia, pembayaran registrasi, dan konfirmasi bukti transfer.',
                'icon' => 'ti-clipboard-check',
                'badge' => 'Sedang Berlangsung'
            ],
            [
                'phase' => 'Fase 2',
                'title' => 'Technical Meeting (TM) & Undian Nomor',
                'date' => '13 Januari 2027',
                'desc' => 'Penjelasan juknis teknis secara hybrid (Zoom Meeting & Aula Pesantren Al-Amin), simulasi panggung, dan pengambilan nomor undian.',
                'icon' => 'ti-device-laptop',
                'badge' => 'Hybrid'
            ],
            [
                'phase' => 'Fase 3',
                'title' => 'Babak Penyisihan & Pentas Perlombaan',
                'date' => '16 Januari 2027',
                'desc' => 'Perlombaan di panggung utama teater dan ruang auditorium Pesantren Al-Amin Sindangkasih dengan dewan juri ahli.',
                'icon' => 'ti-star',
                'badge' => 'Panggung Utama'
            ],
            [
                'phase' => 'Fase 4',
                'title' => 'Grand Final & Gala Awarding Show',
                'date' => '17 Januari 2027',
                'desc' => 'Malam puncak penganugerahan Juara Umum, Trophy Bergilir, Penampilan Bintang Tamu, dan Penyerahan Golden Ticket Beasiswa.',
                'icon' => 'ti-trophy',
                'badge' => 'Malam Puncak'
            ]
        ];

        // Total Hadiah & Fasilitas
        $prizePool = [
            'total_uang' => 'Rp 35.000.000+',
            'total_trophy' => '50+ Trophy & Piala',
            'beasiswa' => 'Golden Ticket Beasiswa 100%',
            'sertifikat' => 'Sertifikat Resmi Ber-SK Nasional'
        ];

        // FAQs
        $faqs = [
            [
                'q' => 'Siapa saja yang boleh mendaftar Al Amin Got Talent (AGT)?',
                'a' => 'Perlombaan terbuka untuk seluruh pelajar tingkat SD/MI, SMP/MTs, SMA/MA/SMK, serta santri pondok pesantren se-Indonesia sesuai jenjang kategori yang dipilih.'
            ],
            [
                'q' => 'Apakah satu sekolah/pesantren boleh mengirim lebih dari satu peserta/tim?',
                'a' => 'Tentu boleh! Setiap sekolah atau madrasah diperbolehkan mendelegasikan beberapa peserta/tim di cabang lomba yang sama maupun berbeda selama kuota masih tersedia.'
            ],
            [
                'q' => 'Bagaimana cara konfirmasi pembayaran biaya pendaftaran?',
                'a' => 'Setelah melakukan pendaftaran melalui form online atau WhatsApp, lakukan transfer ke rekening panitia yang tertera, lalu kirimkan foto/tangkapan layar bukti transfer ke hotline WhatsApp panitia.'
            ],
            [
                'q' => 'Apakah panitia menyediakan fasilitas transit atau penginapan bagi peserta luar kota?',
                'a' => 'Ya, panitia menyediakan asrama transit dan tempat istirahat khusus bagi peserta dan pendamping dari luar daerah (konfirmasi minimal H-3 pelaksanaan).'
            ],
            [
                'q' => 'Apa keuntungan mendapatkan Golden Ticket Beasiswa AGT?',
                'a' => 'Peraih Juara 1 & Juara Umum mendapatkan Golden Ticket Beasiswa bebas biaya pendidikan masuk Pesantren Persatuan Islam 80 Sindangkasih pada jenjang MTs/MA.'
            ]
        ];

        $agent = new \Jenssegers\Agent\Agent();
        $isMobile = $request->query('device') === 'mobile' || ($request->query('device') !== 'desktop' && $agent->isMobile());

        $viewName = $isMobile ? 'agt.mobile' : 'agt.index';

        return view($viewName, compact(
            'pengaturan',
            'competitions',
            'availableCategories',
            'timeline',
            'prizePool',
            'faqs'
        ));
    }

    /**
     * Halaman Formulir Registrasi Pendaftaran AGT 2026
     * (Bisa memilih beberapa cabang lomba sekaligus sesuai jenjang)
     */
    public function register(Request $request)
    {
        $pengaturan = PengaturanUmum::first();
        $jenjangList = JenjangPendidikan::orderBy('id', 'asc')->get();
        $perlombaanList = Perlombaan::with('jenjangPendidikan')->orderBy('id_jenjang', 'asc')->get();

        // Optional pre-selected lomba dari query param (?lomba=id atau ?jenjang=id)
        $preselectedLomba = $request->query('lomba');
        $preselectedJenjang = $request->query('jenjang');

        return view('agt.register', compact(
            'pengaturan',
            'jenjangList',
            'perlombaanList',
            'preselectedLomba',
            'preselectedJenjang'
        ));
    }

    /**
     * Halaman Login Khusus Peserta AGT
     */
    public function login()
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            return redirect()->route('dashboard');
        }

        $pengaturan = PengaturanUmum::first();
        return view('agt.login', compact('pengaturan'));
    }

    /**
     * Proses Login Peserta AGT
     */
    public function authLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Nomor registrasi, email, atau no WhatsApp wajib diisi.',
            'password.required' => 'Password wajib diisi.'
        ]);

        $input = $request->username;
        $fieldType = 'username';

        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $fieldType = 'email';
        }

        // Cek login via username / email
        if (\Illuminate\Support\Facades\Auth::attempt([$fieldType => $input, 'password' => $request->password], $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'))
                ->with('success', 'Selamat datang kembali di Portal Al Amin Got Talent!');
        }

        // Cek jika user login menggunakan No HP yang terdaftar di pendaftaran AGT
        $pendaftaran = \App\Models\PendaftaranGotTalent::where('no_hp', $input)
            ->orWhere('nomor_register', $input)
            ->first();

        if ($pendaftaran) {
            $user = \App\Models\User::where('username', $pendaftaran->nomor_register)
                ->orWhere('email', $pendaftaran->email)
                ->first();

            if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
                \Illuminate\Support\Facades\Auth::login($user, $request->filled('remember'));
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard'))
                    ->with('success', 'Selamat datang kembali di Portal Al Amin Got Talent!');
            }
        }

        return back()->withInput()->withErrors([
            'username' => 'Nomor registrasi/email/No WhatsApp atau password salah.',
        ]);
    }

    /**
     * Logout Peserta AGT dan Redirect Kembali ke Halaman /agt
     */
    public function logout(Request $request)
    {
        \Illuminate\Support\Facades\Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Jika request berasal dari subdomain agt (agt.xxx), redirect ke agt.root
        $host = $request->getHost();
        if (str_starts_with($host, 'agt.')) {
            return redirect()->route('agt.root');
        }

        return redirect()->route('agt.direct');
    }

    /**
     * Proses Simpan Data Pendaftaran ke Database
     */
    public function storeRegister(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'id_jenjang' => 'required|exists:jenjang_pendidikan,id',
            'asal_sekolah' => 'required|string|max:255',
            'no_hp' => 'required|string|max:25',
            'password' => 'required|string|min:6|confirmed',
            'alamat_sekolah' => 'nullable|string',
            'alamat_rumah' => 'nullable|string',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:5120',
            'lomba_ids' => 'required|array|min:1',
            'lomba_ids.*' => 'exists:perlombaan,id'
        ], [
            'nama_lengkap.required' => 'Nama lengkap peserta wajib diisi.',
            'id_jenjang.required' => 'Silakan pilih jenjang pendidikan.',
            'asal_sekolah.required' => 'Nama asal sekolah/pesantren wajib diisi.',
            'no_hp.required' => 'Nomor WhatsApp aktif wajib diisi.',
            'password.required' => 'Password wajib diisi untuk akun login Anda.',
            'password.min' => 'Password minimal terdiri dari 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'bukti_pembayaran.mimes' => 'Format file bukti pembayaran harus JPG, PNG, WEBP, atau PDF.',
            'bukti_pembayaran.max' => 'Ukuran file bukti pembayaran maksimal 5MB.',
            'lomba_ids.required' => 'Pilih minimal 1 cabang perlombaan yang diikuti.',
            'lomba_ids.min' => 'Pilih minimal 1 cabang perlombaan.'
        ]);

        \Illuminate\Support\Facades\DB::beginTransaction();
        try {
            // Generate Nomor Registrasi Unik (Contoh: GT260001)
            $yearCode = date('y');
            $lastReg = \App\Models\PendaftaranGotTalent::latest('id')->first();
            $nextNumber = $lastReg ? ($lastReg->id + 1) : 1;
            $nomorRegister = 'GT' . $yearCode . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

            // Generate Email otomatis dari Nomor Peserta / Registrasi
            $autoEmail = strtolower($nomorRegister) . '@agt.com';

            // Buat Data Pendaftaran Utama
            $pendaftaran = \App\Models\PendaftaranGotTalent::create([
                'nomor_register' => $nomorRegister,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => '-',
                'tanggal_lahir' => date('Y-m-d'),
                'id_jenjang' => $request->id_jenjang,
                'asal_sekolah' => $request->asal_sekolah,
                'alamat_sekolah' => $request->alamat_sekolah ?? '-',
                'alamat_rumah' => $request->alamat_rumah ?? '-',
                'no_hp' => $request->no_hp,
                'email' => $autoEmail,
            ]);

            // Simpan Relasi Cabang Lomba yang Dipilih (pendaftaran_lomba)
            $pendaftaran->perlombaan()->sync($request->lomba_ids);

            // Simpan Bukti Pembayaran jika diunggah (Opsional)
            if ($request->hasFile('bukti_pembayaran')) {
                $file = $request->file('bukti_pembayaran');
                $ext = $file->getClientOriginalExtension();
                $fileName = 'bukti_' . $nomorRegister . '_' . time() . '_' . Str::random(6) . '.' . $ext;
                $path = $file->storeAs('bukti_pembayaran_got_talent', $fileName, 'public');

                $totalBiaya = \App\Models\Perlombaan::whereIn('id', $request->lomba_ids)->sum('biaya_pendaftaran') ?? 0;

                \App\Models\KonfirmasiPembayaranGotTalent::create([
                    'pendaftaran_got_talent_id' => $pendaftaran->id,
                    'tanggal_pembayaran' => date('Y-m-d'),
                    'jumlah_pembayaran' => $totalBiaya,
                    'metode_pembayaran' => 'transfer',
                    'bukti_pembayaran' => $path,
                    'keterangan' => 'Diunggah saat formulir pendaftaran awal.',
                    'status' => 'pending'
                ]);
            }

            // Buat Akun User untuk Peserta (Username = nomorRegister, Password = input password dari user)
            $user = \App\Models\User::create([
                'name' => $request->nama_lengkap,
                'email' => $autoEmail,
                'username' => $nomorRegister,
                'password' => \Illuminate\Support\Facades\Hash::make($request->password),
                'kode_unit' => 'U00',
            ]);

            if (method_exists($user, 'assignRole')) {
                $user->assignRole('peserta');
            }

            // Simpan ke tabel relasi user_pendaftaran_got_talent jika ada tabelnya
            if (\Illuminate\Support\Facades\Schema::hasTable('user_pendaftaran_got_talent')) {
                \Illuminate\Support\Facades\DB::table('user_pendaftaran_got_talent')->insert([
                    'id_pendaftaran' => $pendaftaran->id,
                    'id_user' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            \Illuminate\Support\Facades\DB::commit();

            // Login akun peserta secara otomatis
            \Illuminate\Support\Facades\Auth::login($user);
            $request->session()->regenerate();
            $request->session()->flash('agt_reg_username', $nomorRegister);
            $request->session()->flash('agt_reg_password', $request->password);

            return redirect()->route('dashboard')
                ->with('success', 'Pendaftaran Al Amin Got Talent berhasil! Akun peserta Anda telah aktif.');

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Gagal menyimpan pendaftaran: ' . $e->getMessage()]);
        }
    }

    /**
     * Halaman Sukses & Instruksi Pembayaran / Cetak Bukti Pendaftaran
     */
    public function successRegistration($nomor)
    {
        $pengaturan = PengaturanUmum::first();
        $pendaftaran = \App\Models\PendaftaranGotTalent::with(['jenjangPendidikan', 'perlombaan'])
            ->where('nomor_register', $nomor)
            ->firstOrFail();

        $totalBiaya = $pendaftaran->perlombaan->sum('biaya_pendaftaran');

        return view('agt.success', compact('pengaturan', 'pendaftaran', 'totalBiaya'));
    }
}
