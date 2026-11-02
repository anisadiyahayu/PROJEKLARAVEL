<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PosController;

// ============================
// Codingan Praktikum Pertemuan 2
// ============================

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// ============================
// Codingan Tugas Pertemuan 2
// ============================

Route::get('/about', function () {
    return 'POS Barokah Mart adalah aplikasi kasir untuk membantu mengelola produk, 
    transaksi, dan penjualan toko.';
});

// ============================
// Codingan Nyoba Aja
// ============================
Route::get('/products', function () {
    return 'Daftar Produk';
});


use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('report.sales');
});

Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');

    Route::get('/pos/history', function () {
        return 'Riwayat Transaksi Saya';
    })
        ->middleware(['auth', 'role:kasir'])
        ->name('pos.history');
});


// ========
// CODINGAN TUGAS
// ========

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('users.index');



// =======
// CODINGAN MATERI PERTEMUAN 5
// =======

Route::get('/index', function () {
    $posts = [
        (object)['title' => 'Belajar blade bro', 'published' => true],
        (object)['title' => 'saya tdk bs kasih tips', 'published' => false],
        (object)['title' => 'Belajar blade bro', 'published' => true],
    ];
    return view('posts.index', compact('posts'));
});


Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
    Route::get('/pos/{transaction}/struk', [PosController::class, 'struk'])->name('pos.struk');
});
