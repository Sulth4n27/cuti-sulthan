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
        $cutiBerlangsung = Cuti::where('tanggal_mulai', '<=', now())
            ->where('tanggal_selesai', '>=', now())
            ->count();

        return view('dashboard.index', compact('totalPegawai', 'totalCuti', 'cutiBerlangsung'));
    }
}
