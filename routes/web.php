<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengaduanController;

// Halaman utama
Route::get('/', function () {
    return view('admin.dashboard');
});

// Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// CRUD Kategori
Route::resource('kategori', KategoriController::class);

// CRUD Mahasiswa
Route::resource('mahasiswa', MahasiswaController::class);

// CRUD Pengaduan
Route::resource('pengaduan', PengaduanController::class);
