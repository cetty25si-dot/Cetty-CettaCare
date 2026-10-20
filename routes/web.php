<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

// Dashboard Admin
Route::get('/admin/dashboard', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('login')
            ->with('error', 'Silakan login terlebih dahulu.');
    }

    return view('admin.dashboard');
})->name('admin.dashboard');

// CRUD
Route::resource('kategori', KategoriController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('pengaduan', PengaduanController::class);
Route::resource('user', UserController::class);
