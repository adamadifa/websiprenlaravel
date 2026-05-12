<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaranonline;
use App\Models\Pendaftaranonlinebayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;

class PembayaranController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $user = Auth::user();
        $pengaturan = \App\Models\PengaturanUmum::first();
        $pendaftaran = Pendaftaranonline::where('no_register', $user->username)
            ->join('unit', 'unit.kode_unit', 'pendaftaran_online.kode_unit')
            ->select('pendaftaran_online.*', 'unit.nama_unit')
            ->first();

        $pembayaran = Pendaftaranonlinebayar::where('no_register', $user->username)->orderBy('created_at', 'desc')->get();

        if ($agent->isMobile()) {
            return view('mobile.pembayaran.index', compact('pendaftaran', 'pembayaran', 'pengaturan'));
        }

        return view('pages.dashboard.pembayaran', compact('pendaftaran', 'pembayaran', 'pengaturan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric|min:1',
            'metode_pembayaran' => 'required|in:transfer,tunai',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'nullable|string'
        ]);

        $user = Auth::user();
        
        $path = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('pembayaran', 'public');
        }

        Pendaftaranonlinebayar::create([
            'no_register' => $user->username,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_pembayaran' => $path,
            'status' => 'pending',
            'keterangan' => $request->keterangan
        ]);

        return redirect()->back()->with('success', 'Konfirmasi pembayaran berhasil dikirim. Mohon tunggu verifikasi dari admin.');
    }
}
