<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Cuti;

class DashboardController extends Controller
{
    public function index()
{
    $tanggal_mulai = '2025-01-01';

    // Ambil data untuk dashboard
    $pegawaicuti = Cuti::where('tanggal_mulai', $tanggal_mulai)->first();

if (!$pegawaicuti) {
    $message = 'Belum ada data cuti pada tanggal tersebut.';
}

    $totalPegawai = Pegawai::count();
    $totalCuti = Cuti::count();
    $cutisetuju = Cuti::where('status', 'disetujui')->count();
    $cutiDitolak = Cuti::where('status', 'ditolak')->count();
    $cutipending = Cuti::where('status', 'pending')->count();

    $cutiStatus = Cuti::selectRaw('status, count(*) as total')
                        ->groupBy('status')
                        ->pluck('total', 'status');

    return view('dashboard.index', compact(
        'totalPegawai',
        'totalCuti',
        'cutisetuju',
        'cutiDitolak',
        'cutipending',
        'cutiStatus',
        'pegawaicuti'
    ));
}




}
