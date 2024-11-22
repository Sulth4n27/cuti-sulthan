<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik dasar
        $totalPegawai = Pegawai::count();
        $totalCuti = Cuti::count();
        $cutiBulanIni = Cuti::whereMonth('tanggal_mulai', date('m'))->count();

        // Data untuk grafik
        $dataCutiPerBulan = Cuti::selectRaw('MONTH(tanggal_mulai) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        return view('dashboard.index', compact(
            'totalPegawai',
            'totalCuti',
            'cutiBulanIni',
            'dataCutiPerBulan'
        ));
    }
}
