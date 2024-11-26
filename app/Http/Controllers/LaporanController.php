<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Cuti;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    // Laporan Pegawai
    public function pegawai()
    {
        $pegawais = Pegawai::all();
        return view('laporan.pegawai', compact('pegawais'));
    }

    // Laporan Cuti
    public function cuti()
    {
        $cutis = Cuti::with('pegawai')->get();
        return view('laporan.cuti', compact('cutis'));
    }

    // Export Laporan Cuti ke PDF
    public function exportCutiPDF()
    {
        $cutis = Cuti::with('pegawai')->get();
        $pdf = Pdf::loadView('laporan.cuti_pdf', compact('cutis'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan_cuti.pdf');
    }
}
