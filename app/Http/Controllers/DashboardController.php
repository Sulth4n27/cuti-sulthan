<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Cuti;

class DashboardController extends Controller
{
    public function index()
{
    // Ambil data untuk dashboard
    $totalPegawai = Pegawai::count();
    $totalCuti = Cuti::count();
    $cutiPending = Cuti::where('status', 'pending')->count();
    $cutiDitolak = Cuti::where('status', 'ditolak')->count();
    $cutiBerlangsung = Cuti::where('status', 'berlangsung')->count();

    // Data untuk grafik
    $cutiStatus = Cuti::selectRaw('status, count(*) as total')
                        ->groupBy('status')
                        ->pluck('total', 'status');

    

    return view('dashboard.index', compact(
        'totalPegawai',
        'totalCuti',
        'cutiPending',
        'cutiDitolak',
        'cutiBerlangsung',
        'cutiStatus'
    ));
}


}
