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

    public function create()
    {
        return view('pegawai.create'); // Return ke view 'pegawai.create'
    }

    /**
     * Menyimpan data pegawai baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|numeric',
            'nik' => 'required|numeric',
            'status' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'nullable',
        ]);

        // Simpan data pegawai
        Pegawai::create($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pegawai berdasarkan ID.
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai')); // Return ke view 'pegawai.show'
    }

    /**
     * Menampilkan form untuk mengedit pegawai.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai')); // Return ke view 'pegawai.edit'
    }

    /**
     * Memperbarui data pegawai di database.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|numeric',
            'nik' => 'required|numeric',
            'status' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'nullable',
        ]);

        // Update data pegawai
        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diupdate.');
    }

    /**
     * Menghapus data pegawai dari database.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete(); // Hapus data pegawai
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}

