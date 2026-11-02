<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('guest.index');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('kategori', KategoriController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('pengaduan', PengaduanController::class)->except(['show']);
Route::resource('tanggapan', TanggapanController::class)->except(['show']);
Route::resource('user', UserController::class);
