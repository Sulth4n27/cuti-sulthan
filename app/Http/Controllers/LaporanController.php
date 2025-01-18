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
            // Inisialisasi tanggal mulai
    $tanggal_mulai = '2025-01-01'; // Nilai default atau ambil dari input request

    // Ambil data untuk dashboard
    $pegawaicuti = Cuti::where('tanggal_mulai', $tanggal_mulai)->first();
        $pegawais = Pegawai::all();
        return view('laporan.pegawai', compact('pegawais', 'pegawaicuti'));
    }

    // Laporan Cuti
    public function cuti()
    {
            // Inisialisasi tanggal mulai
    $tanggal_mulai = '2025-01-01'; // Nilai default atau ambil dari input request

    // Ambil data untuk dashboard
    $pegawaicuti = Cuti::where('tanggal_mulai', $tanggal_mulai)->first();
        $cutis = Cuti::with('pegawai')->get();
        return view('laporan.cuti', compact('cutis', 'pegawaicuti'));
    }

    // Export Laporan Cuti ke PDF
    public function exportCutiPDF()
    {
        $cutis = Cuti::with('pegawai')->get();
        
        $pdf = Pdf::loadView('laporan.cuti_pdf', compact('cutis'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan_cuti.pdf');
    }
}
