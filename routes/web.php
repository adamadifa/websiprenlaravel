<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-pesantren', [HomeController::class, 'about'])->name('about');
Route::get('/gallery-kegiatan', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery-kegiatan/{id}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/guru-tendik', [StaffController::class, 'index'])->name('staff.index');
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::redirect('/news', '/berita');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

use App\Http\Controllers\BiodataController;

Route::middleware(['auth'])->group(function () {
    Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
    Route::post('/biodata', [BiodataController::class, 'update']);
    Route::post('/regency/getregencybyprovince', [BiodataController::class, 'getRegency']);
    Route::post('/district/getdistrictbyregency', [BiodataController::class, 'getDistrict']);
    Route::post('/village/getvillagebydistrict', [BiodataController::class, 'getVillage']);
    Route::get('/asalsekolah/{kode_unit}/{kode_asal_sekolah}/getasalsekolahbyunit', [BiodataController::class, 'getAsalsekolah']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/biodata/cetak', [BiodataController::class, 'cetak'])->name('biodata.cetak');
});
use App\Http\Controllers\PembayaranController;

Route::middleware(['auth'])->group(function () {
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::post('/pembayaran', [PembayaranController::class, 'store']);
});
use App\Http\Controllers\PasswordController;

Route::middleware(['auth'])->group(function () {
    Route::get('/password', [PasswordController::class, 'index'])->name('password');
    Route::put('/password', [PasswordController::class, 'update']);
});
