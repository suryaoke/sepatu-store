<?php

use App\Http\Controllers\backend\akunPelangganController;
use App\Http\Controllers\backend\brandsController;
use App\Http\Controllers\backend\kategoriController;
use App\Http\Controllers\backend\kontakController;
use App\Http\Controllers\backend\reportController;
use App\Http\Controllers\backend\sepatuController;
use App\Http\Controllers\backend\TimController;
use App\Http\Controllers\backend\transaksiController;
use App\Http\Controllers\frontend\showController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
// route admin //

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->get('admin/dashboard', function () {
    return view('backend.index');
})->name('dashboard');

Route::controller(brandsController::class)->middleware(['auth'])->group(function () {
    Route::get('admin/brands', 'index')->name('brands.all');
    Route::post('admin/brands/create', 'create')->name('brands.create');
    Route::post('admin/brands/update', 'update')->name('brands.update');
    Route::get('admin/brands/delete/{id}', 'delete')->name('brands.delete');
});

Route::controller(kategoriController::class)->middleware(['auth'])->group(function () {
    Route::get('admin/kategori', 'index')->name('kategori.all');
    Route::post('admin/kategori/create', 'create')->name('kategori.create');
    Route::post('admin/kategori/update', 'update')->name('kategori.update');
    Route::get('admin/kategori/delete/{id}', 'delete')->name('kategori.delete');
});

Route::controller(reportController::class)->middleware(['auth'])->group(function () {
    Route::get('admin/report', 'index')->name('report.all');
});

Route::controller(sepatuController::class)->middleware(['auth'])->group(function () {
    Route::get('admin/sepatu', 'index')->name('sepatu.all');
});

Route::controller(transaksiController::class)->middleware(['auth'])->group(function () {
    Route::get('admin/transaksi', 'index')->name('transaksi.all');
});

Route::controller(akunPelangganController::class)->middleware(['auth'])->group(function () {
    Route::get('admin/akun/pelanggan', 'index')->name('akun.pelanggan.all');
});

Route::controller(kontakController::class)->middleware(['auth'])->group(function () {
    Route::get('admin/kontak', 'index')->name('kontak.all');
    Route::post('admin/kontak/create', 'create')->name('kontak.create');
    Route::post('admin/kontak/update', 'update')->name('kontak.update');
    Route::get('admin/kontak/delete/{id}', 'delete')->name('kontak.delete');
});

Route::controller(timController::class)->middleware(['auth'])->group(function () {
    Route::get('admin/tim', 'index')->name('tim.all');
    Route::post('admin/tim/create', 'create')->name('tim.create');
    Route::post('admin/tim/update', 'update')->name('tim.update');
    Route::get('admin/tim/delete/{id}', 'delete')->name('tim.delete');
});


// route frontend //

Route::controller(showController::class)->group(function () {
    Route::get('/', 'index')->name('frontend');
});
