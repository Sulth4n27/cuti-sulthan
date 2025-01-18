<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
            // Inisialisasi tanggal mulai
    $tanggal_mulai = '2025-01-01'; // Nilai default atau ambil dari input request

    // Ambil data untuk dashboard
    $pegawaicuti = Cuti::where('tanggal_mulai', $tanggal_mulai)->first();

        $cutis = Cuti::with('pegawai')->get();
        return view('cuti.index', compact('cutis', 'pegawaicuti'));
    }

    public function create()
    {
            // Inisialisasi tanggal mulai
    $tanggal_mulai = '2025-01-01'; // Nilai default atau ambil dari input request

    // Ambil data untuk dashboard
    $pegawaicuti = Cuti::where('tanggal_mulai', $tanggal_mulai)->first();
        $pegawais = Pegawai::all();
        $user = User::all();
        return view('cuti.create', compact('pegawais', 'pegawaicuti', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required',
            'user_id' => 'required',
            'jenis_cuti' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required',
            'status' => 'pending',

        ]);

         // Cek apakah pegawai memiliki cuti yang statusnya masih pending atau approved
    $pegawaiCuti = Cuti::where('pegawai_id', $request->pegawai_id)
    ->whereIn('status', ['setuju', 'ditolak'])
    ->where(function ($query) use ($request) {
        $query->whereBetween('tanggal_mulai', [$request->tanggal_mulai, $request->tanggal_selesai])
              ->orWhereBetween('tanggal_selesai', [$request->tanggal_mulai, $request->tanggal_selesai]);
    })
    ->exists();

if ($pegawaiCuti) {
    return redirect()->back()->with('error', 'Pegawai masih memiliki cuti yang sedang berlangsung atau belum disetujui.');
}


        Cuti::create($request->all());

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil ditambahkan.');
    }

    public function show(Cuti $cuti)
    {
            // Inisialisasi tanggal mulai
    $tanggal_mulai = '2025-01-01'; // Nilai default atau ambil dari input request

    // Ambil data untuk dashboard
    $pegawaicuti = Cuti::where('tanggal_mulai', $tanggal_mulai)->first();
        return view('cuti.show', compact('cuti', 'pegawaicuti'));
    }

    public function edit(Cuti $cuti)
    {
            // Inisialisasi tanggal mulai
    $tanggal_mulai = '2025-01-01'; // Nilai default atau ambil dari input request

    // Ambil data untuk dashboard
    $pegawaicuti = Cuti::where('tanggal_mulai', $tanggal_mulai)->first();
        $pegawais = Pegawai::all();
        return view('cuti.edit', compact('cuti', 'pegawais', 'pegawaicuti'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $request->validate([
            'pegawai_id' => 'required',
            'user_id' => 'required',
            'jenis_cuti' => 'required|in:cuti sakit,cuti menikah,cuti melahirkan,cuti pendidikan',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required',
        ]);

        $cuti->update($request->all());

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil diperbarui.');
    }

    public function destroy(Cuti $cuti)
    {
        $cuti->delete();

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
{
    $cuti = Cuti::findOrFail($id);

    $request->validate([
        'status' => 'required|in:disetujui,ditolak',
    ]);

    $cuti->update([
        'status' => $request->status,
    ]);

    return redirect()->route('cuti.index')->with('success', 'Status cuti berhasil diperbarui!');
}

}
