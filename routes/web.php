<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SambutanKepalaSekolahController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.check');

Route::get('/visi-dan-misi', [ProfilController::class, 'visimisi'])->name('guest.profil.visi-dan-misi');

Route::get('/ekstrakulikuler', [EkskulController::class, 'guest'])->name('guest.ekskul');

Route::get('/ppdb', [PpdbController::class, 'guest'])->name('guest.ppdb');

Route::get('/prestasi', [PrestasiController::class, 'guest'])->name('guest.prestasi');

Route::get('/berita', [BeritaController::class, 'guest'])->name('guest.berita');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/admin/sambutan-kepala-sekolah', SambutanKepalaSekolahController::class);
    Route::resource('/admin/prestasi', PrestasiController::class);
    Route::resource('/admin/berita', BeritaController::class);
    Route::resource('/admin/visi-misi', VisiMisiController::class);
    Route::resource('/admin/ekskul', EkskulController::class);
    Route::resource('/admin/ppdb', PpdbController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
