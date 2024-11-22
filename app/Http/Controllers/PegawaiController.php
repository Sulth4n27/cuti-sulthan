<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create'); // Menampilkan form tambah pegawai
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nik' => 'required',
            'status' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'nullable',
        ]);

        // Simpan data pegawai baru
        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nik' => 'required',
            'status' => 'required|in:ASN,NON ASN',
            'jabatan' => 'required|in: Kepala Badan BKPSDM,Sekretaris,Kepala Bagian Umum,
            Kabid Pengambangan sumber daya manusia,Kabid perencanaan dan pengembangan,
            Kabid Mutasi,Bagian Keuangan,Staff BKPSDM',
            'golongan' => 'required',
            'jeniskelamin' => 'required|in:LK,PR',
            'alamat' => 'nullable',
        ]);

        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diupdate.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
