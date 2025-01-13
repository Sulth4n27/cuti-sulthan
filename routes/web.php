<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


// Route untuk Dashboard
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Route resource untuk Pegawai
Route::resource('pegawai', PegawaiController::class);


// Route resource untuk Cuti
Route::resource('cuti', CutiController::class);
Route::post('/cuti/{id}/update-status', [CutiController::class, 'updateStatus'])->name('cuti.updateStatus');


// Route untuk User & Admin
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users', [UserController::class, 'index'])->name('users.index');


// Route untuk laporan
Route::get('/laporan/pegawai', [LaporanController::class, 'pegawai'])->name('laporan.pegawai');
Route::get('/laporan/cuti', [LaporanController::class, 'cuti'])->name('laporan.cuti');
Route::get('/laporan/cuti/pdf', [LaporanController::class, 'exportCutiPDF'])->name('laporan.cuti.pdf');


// Route fallback untuk menangani halaman yang tidak ditemukan
Route::fallback(function () {
    return view('errors.404'); // Ganti dengan halaman 404 Anda
});

// ini untuk ke home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route Logout & Login
// Auth::routes();
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




