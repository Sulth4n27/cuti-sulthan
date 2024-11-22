<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;


// Route untuk halaman utama / dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route resource untuk Pegawai
Route::resource('pegawai', PegawaiController::class);

// Route resource untuk Cuti
Route::resource('cuti', CutiController::class);

//route laporan
// Route::get('/laporan/cuti', [LaporanController::class, 'index'])->name('laporan.cuti');
// Route::get('/laporan/cuti/pdf', [LaporanController::class, 'exportPdf'])->name('laporan.cuti.pdf');

// Route logout
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/login')->with('success', 'Berhasil logout.');
})->name('logout');

// Route fallback untuk menangani halaman yang tidak ditemukan
Route::fallback(function () {
    return view('errors.404'); // Ganti dengan halaman 404 Anda
});
