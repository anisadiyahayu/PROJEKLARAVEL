<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::post('/pos', function () {
    return 'Transaksi berhasil dikirim';
});