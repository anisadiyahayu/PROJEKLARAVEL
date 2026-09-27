<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        return 'Halaman POS';
    }

    public function store(Request $request)
    {
        return 'Transaksi berhasil disimpan';
    }
}