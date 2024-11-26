<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;

// Route untuk halaman utama / dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Route resource untuk Pegawai
Route::resource('pegawai', PegawaiController::class);

// Route resource untuk Cuti
Route::resource('cuti', CutiController::class);

// Route untuk laporan
Route::get('/laporan/pegawai', [LaporanController::class, 'pegawai'])->name('laporan.pegawai');
Route::get('/laporan/cuti', [LaporanController::class, 'cuti'])->name('laporan.cuti');
Route::get('/laporan/cuti/pdf', [LaporanController::class, 'exportCutiPDF'])->name('laporan.cuti.pdf');

Route::post('/cuti/{id}/update-status', [CutiController::class, 'updateStatus'])->name('cuti.updateStatus');



// Route logout
// Route::post('/logout', function () {
//     auth()->logout();
//     return redirect('/login')->with('success', 'Berhasil logout.');
// })->name('logout');

// Route fallback untuk menangani halaman yang tidak ditemukan
Route::fallback(function () {
    return view('errors.404'); // Ganti dengan halaman 404 Anda
});
