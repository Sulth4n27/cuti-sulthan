<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
{
        // Inisialisasi tanggal mulai
        $tanggal_mulai = '2025-01-01'; // Nilai default atau ambil dari input request

        // Ambil data untuk dashboard
        $pegawaicuti = Cuti::where('tanggal_mulai', $tanggal_mulai)->first();
    $users = User::all();
    return view('users.index', compact('users', 'pegawaicuti'));
}

    public function create()
    {
            // Inisialisasi tanggal mulai
    $tanggal_mulai = '2025-01-01'; // Nilai default atau ambil dari input request

    // Ambil data untuk dashboard
    $pegawaicuti = Cuti::where('tanggal_mulai', $tanggal_mulai)->first();

        return view('users.create', compact('pegawaicuti')) ;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit()
    {
            // Inisialisasi tanggal mulai
    $tanggal_mulai = '2025-01-01'; // Nilai default atau ambil dari input request

    // Ambil data untuk dashboard
    $pegawaicuti = Cuti::where('tanggal_mulai', $tanggal_mulai)->first();
    $user = User::where('id', 1)->first();



        return view('users.edit', compact('pegawaicuti', 'user')) ;
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);

        // Update data user
    $user->update([
        'name' => $request->name,
        'username' => $request->username,
        'password' => $request->password ? Hash::make($request->password) : $user->password, // Jika password tidak diisi, gunakan yang lama
        'role' => $request->role,
    ]);

        return redirect()->route('users.index')->with('success', 'User berhasil diedit.');
    }

    public function destroy(User $user)
{
    $user->delete(); // Hapus user dari database

    return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
}

}
