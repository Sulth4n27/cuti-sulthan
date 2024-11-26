<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Cuti;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPegawai = Pegawai::count();
        $totalCuti = Cuti::count();
        $cutiBerlangsung = Cuti::where('status', 'disetujui')->count();
        $cutiPending = Cuti::where('status', 'pending')->count();
        $cutiditolak = Cuti::where('status', 'ditolak')->count();

        return view('dashboard.index', compact('totalPegawai', 'totalCuti', 'cutiBerlangsung', 'cutiPending', 'cutiditolak'));
    }
}
