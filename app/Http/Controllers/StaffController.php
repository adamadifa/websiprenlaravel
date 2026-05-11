<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\PengaturanUmum;
use App\Models\Unit;
use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

class StaffController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $pengaturan = PengaturanUmum::first();
        
        // 1. Pimpinan Pesantren Utama (J01)
        $pimpinanUtama = Karyawan::with(['jabatan', 'unit'])
            ->where('status', 1)
            ->where('kode_jabatan', 'J01')
            ->first();

        // 2. All Staff in Unit Pesantren (U06), excluding the main leader
        $staffPesantren = Karyawan::with(['jabatan', 'unit'])
            ->where('status', 1)
            ->where('kode_unit', 'U06')
            ->where('npp', '!=', $pimpinanUtama ? $pimpinanUtama->npp : null)
            ->get();

        // 3. Other Educational Units
        $otherUnits = Unit::where('status', 1)
            ->whereNotIn('kode_unit', ['U00', 'U06'])
            ->orderBy('kode_unit', 'asc')
            ->get();
        
        // 4. Staff for other units
        $groupedStaff = Karyawan::with(['jabatan', 'unit'])
            ->where('status', 1)
            ->where('kode_unit', '!=', 'U06')
            ->get()
            ->groupBy('kode_unit');

        // 5. All units for footer/navigation
        $units = Unit::where('status', 1)->get();

        if ($agent->isMobile()) {
            return view('mobile.staff.index', compact('pengaturan', 'units', 'otherUnits', 'groupedStaff', 'pimpinanUtama', 'staffPesantren'));
        }

        return view('pages.staff.index', compact('pengaturan', 'units', 'otherUnits', 'groupedStaff', 'pimpinanUtama', 'staffPesantren'));
    }
}
