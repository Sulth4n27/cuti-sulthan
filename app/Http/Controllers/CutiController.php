<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        $cutis = Cuti::with('pegawai')->get();
        return view('cuti.index', compact('cutis'));
    }

    public function create()
    {
        $pegawais = Pegawai::all();
        return view('cuti.create', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required',
            'jenis_cuti' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required',
        ]);

        Cuti::create($request->all());

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil ditambahkan.');
    }

    public function show(Cuti $cuti)
    {
        return view('cuti.show', compact('cuti'));
    }

    public function edit(Cuti $cuti)
    {
        $pegawais = Pegawai::all();
        return view('cuti.edit', compact('cuti', 'pegawais'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $request->validate([
            'pegawai_id' => 'required',
            'jenis_cuti' => 'required',
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
}
