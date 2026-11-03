<?php

HEAD;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaController;

// Halaman Guest
Route::get('/', function () {
    return view('guest.home');
})->name('home');

Route::get('/contact', function () {
    return view('guest.contact');
})->name('contact');

Route::get('/auth', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/auth', [LoginController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('guest.index');
9d3f9160fbd1e1cda3697cb806586094255ef1cc;

Route::get('/admin/dashboard', function () {
    if (! session('admin_logged_in')) {
        return redirect()->route('login')
            ->with('error', 'Silakan login terlebih dahulu.');
    }

    return view('admin.dashboard');
})->name('admin.dashboard');

HEAD;
// CRUD
Route::resource('kategori', KategoriController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('pengaduan', PengaduanController::class);

Route::resource('kategori', KategoriController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('pengaduan', PengaduanController::class)->except(['show']);
Route::resource('tanggapan', TanggapanController::class)->except(['show']);
9d3f9160fbd1e1cda3697cb806586094255ef1cc;
Route::resource('user', UserController::class);
