<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter pencarian dan filter dari request
        $search = $request->input('search');
        $jabatan = $request->input('jabatan');
        $golongan = $request->input('golongan');
        $status = $request->input('status');

        // Query data pegawai dengan pencarian dan filter
        $pegawais = Pegawai::query()
    ->when($search, function ($query, $search) {
        return $query->where('nama', 'like', "%{$search}%")
            ->orWhere('nip', 'like', "%{$search}%")
            ->orWhere('nik', 'like', "%{$search}%");
    })
    ->when($jabatan, function ($query, $jabatan) {
        return $query->where('jabatan', $jabatan);
    })
    ->when($golongan, function ($query, $golongan) {
        return $query->where('golongan', $golongan);
    })
    ->when($status, function ($query, $status) {
        return $query->where('status', $status);
    })
    ->paginate(10); // Pagination dengan 10 data per halaman

        // Ambil data untuk dropdown filter (jabatan, golongan, status)
        $jabatans = Pegawai::select('jabatan')->distinct()->pluck('jabatan');
        $golongans = Pegawai::select('golongan')->distinct()->pluck('golongan');
        $statuses = Pegawai::select('status')->distinct()->pluck('status');

        return view('pegawai.index', compact('pegawais', 'jabatans', 'golongans', 'statuses'));
    }
}
