<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManajemenAkunController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProgramPaguyubanKomiteController;
use App\Http\Controllers\ProgramUnggulanController;
use App\Http\Controllers\SambutanKepalaSekolahController;
use App\Http\Controllers\StrukturalController;
use App\Http\Controllers\StrukturalKomiteController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.check');

Route::get('/visi-dan-misi', [ProfilController::class, 'visimisi'])->name('guest.profil.visi-dan-misi');
Route::get('/identitas-sekolah', [ProfilController::class, 'identitassekolah'])->name('guest.profil.identitas-sekolah');
Route::get('/struktural', [ProfilController::class, 'struktural'])->name('guest.profil.struktural');
Route::get('/program-sekolah', [ProfilController::class, 'programsekolah'])->name('guest.profil.programsekolah');

Route::get('/ekstrakulikuler', [EkskulController::class, 'guest'])->name('guest.ekskul');

Route::get('/ppdb', [PpdbController::class, 'guest'])->name('guest.ppdb');

Route::get('/prestasi', [PrestasiController::class, 'guest'])->name('guest.prestasi');
Route::get('/prestasi/detail/{id}', [PrestasiController::class, 'show'])->name('guest.prestasi.detail');

Route::get('/berita', [BeritaController::class, 'guest'])->name('guest.berita');
Route::get('/berita/detail/{id}', [BeritaController::class, 'show'])->name('guest.berita.detail');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/admin/sambutan-kepala-sekolah', SambutanKepalaSekolahController::class);
    Route::resource('/admin/prestasi', PrestasiController::class);
    Route::resource('/admin/berita', BeritaController::class);
    Route::resource('/admin/visi-misi', VisiMisiController::class);
    Route::resource('/admin/ekskul', EkskulController::class);
    Route::resource('/admin/ppdb', PpdbController::class);
    Route::resource('/admin/struktural', StrukturalController::class);
    Route::resource('/admin/struktural-komite', StrukturalKomiteController::class);
    Route::resource('/admin/program-unggulan', ProgramUnggulanController::class);
    Route::resource('/admin/program-paguyuban-komite', ProgramPaguyubanKomiteController::class);

    Route::resource('/admin/manajemen-akun', ManajemenAkunController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
