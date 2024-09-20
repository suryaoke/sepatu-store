<?php

use App\Http\Controllers\backend\akunPelangganController;
use App\Http\Controllers\backend\brandsController;
use App\Http\Controllers\backend\kategoriController;
use App\Http\Controllers\backend\kontakController;
use App\Http\Controllers\backend\reportController;
use App\Http\Controllers\backend\sepatuController;
use App\Http\Controllers\backend\TimController;
use App\Http\Controllers\backend\transaksiController;
use App\Http\Controllers\frontend\loginController;
use App\Http\Controllers\frontend\profileController as FrontendProfileController;
use App\Http\Controllers\frontend\registerController;
use App\Http\Controllers\frontend\showController;
use App\Http\Controllers\frontend\transaksiController as FrontendTransaksiController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\FrontendAuth;
use App\Http\Middleware\PelangganMiddleware;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
// route admin //

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->middleware(AdminMiddleware::class)->get('admin/dashboard', function () {
    return view('backend.index');
})->name('dashboard');

Route::controller(brandsController::class)->middleware(['auth'])->middleware(AdminMiddleware::class)->group(function () {
    Route::get('admin/brands', 'index')->name('brands.all');
    Route::post('admin/brands/create', 'create')->name('brands.create');
    Route::post('admin/brands/update', 'update')->name('brands.update');
    Route::get('admin/brands/delete/{id}', 'delete')->name('brands.delete');
});

Route::controller(kategoriController::class)->middleware(['auth'])->middleware(AdminMiddleware::class)->group(function () {
    Route::get('admin/kategori', 'index')->name('kategori.all');
    Route::post('admin/kategori/create', 'create')->name('kategori.create');
    Route::post('admin/kategori/update', 'update')->name('kategori.update');
    Route::get('admin/kategori/delete/{id}', 'delete')->name('kategori.delete');
});

Route::controller(reportController::class)->middleware(['auth'])->middleware(AdminMiddleware::class)->group(function () {
    Route::get('admin/report', 'index')->name('report.all');
});

Route::controller(sepatuController::class)->middleware(['auth'])->middleware(AdminMiddleware::class)->group(function () {
    Route::get('admin/sepatu', 'index')->name('sepatu.all');
    Route::get('admin/sepatu/create', 'showCreate')->name('sepatu.show.create');
    Route::post('admin/sepatu/create', 'create')->name('sepatu.create');
    Route::get('admin/sepatu/{slug}', 'showEdit')->name('sepatu.show.edit');
    Route::post('admin/sepatu/update', 'update')->name('sepatu.update');
    Route::get('admin/sepatu/delete/{id}', 'delete')->name('sepatu.delete');
    Route::get('admin/size/delete/{id}', 'sizeDelete')->name('size.delete');
    Route::get('admin/foto/delete/{id}', 'sepatuFotoDelete')->name('sepatu.foto.delete');
    Route::get('admin/sepatu/delete/{id}', 'sepatuDelete')->name('sepatu.delete');
});

Route::controller(transaksiController::class)->middleware(['auth'])->middleware(AdminMiddleware::class)->group(function () {
    Route::get('admin/transaksi', 'index')->name('transaksi.all');
    Route::get('admin/transaksi/update', 'updatestatus')->name('transaksi.update.status');
    Route::get('admin/transaksi/delete/{id}', 'transaksiDelete')->name('transaksi.delete');
});

Route::controller(akunPelangganController::class)->middleware(['auth'])->middleware(AdminMiddleware::class)->group(function () {
    Route::get('admin/akun/pelanggan', 'index')->name('akun.pelanggan.all');
});

Route::controller(kontakController::class)->middleware(['auth'])->middleware(AdminMiddleware::class)->group(function () {
    Route::get('admin/kontak', 'index')->name('kontak.all');
    Route::post('admin/kontak/create', 'create')->name('kontak.create');
    Route::post('admin/kontak/update', 'update')->name('kontak.update');
    Route::get('admin/kontak/delete/{id}', 'delete')->name('kontak.delete');
});

Route::controller(timController::class)->middleware(['auth'])->middleware(AdminMiddleware::class)->group(function () {
    Route::get('admin/tim', 'index')->name('tim.all');
    Route::post('admin/tim/create', 'create')->name('tim.create');
    Route::post('admin/tim/update', 'update')->name('tim.update');
    Route::get('admin/tim/delete/{id}', 'delete')->name('tim.delete');
});


// route frontend //

Route::controller(showController::class)->group(function () {
    Route::get('/', 'index')->name('frontend');

    Route::get('pelanggan/register', 'register')->name('frontend.register');
    Route::get('detail/{slug}', 'detail')->name('frontend.detail');
    Route::get('kategori/{slug}', 'kategori')->name('frontend.kategori');
    Route::get('brand/{slug}', 'brand')->name('frontend.brand');
    Route::get('sepatu', 'sepatuAll')->name('frontend.sepatu');

    Route::get('cart', 'cart')->middleware(FrontendAuth::class)->middleware(PelangganMiddleware::class)->name('frontend.cart');
});



Route::controller(FrontendTransaksiController::class)->group(function () {
    Route::get('checkout', 'checkout')->name('frontend.checkout');
    Route::post('detail/checkout', 'detail')->name('frontend.detail.checkout');
    Route::get('checkout/{slug}', 'sepatuCheckout')->middleware(FrontendAuth::class)->middleware(PelangganMiddleware::class)->name('frontend.sepatu.checkout');
    Route::post('checkout/store', 'sepatuCheckoutStore')->middleware(FrontendAuth::class)->middleware(PelangganMiddleware::class)->name('frontend.sepatu.checkout.store');
    Route::get('payment/{trx_id}', 'payment')->middleware(FrontendAuth::class)->middleware(PelangganMiddleware::class)->name('frontend.payment');
    Route::post('proof', 'proof')->middleware(FrontendAuth::class)->middleware(PelangganMiddleware::class)->name('proof');

    Route::get('payment/detail/{trx_id}', 'paymentDetail')->middleware(FrontendAuth::class)->middleware(PelangganMiddleware::class)->name('frontend.payment.detail');
});


Route::controller(registerController::class)->group(function () {
    Route::post('pelanggan/register', 'register')->name('pelanggan.register');
});
Route::controller(loginController::class)->group(function () {

    Route::get('pelanggan/login', 'login')->name('frontend.login');
    Route::post('pelanggan/login', 'store')->name('frontend.login.store');
    Route::post('pelanggan/logout', 'destroy')->name('frontend.logout');
});

Route::middleware(FrontendAuth::class)->controller(FrontendProfileController::class)->group(function () {
    Route::get('pelanggan/profile', 'edit')->name('frontend.profile');
    Route::patch('pelanggan/profile/store', 'update')->name('frontend.profile.update');
});
