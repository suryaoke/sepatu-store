<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index()
    {
        return view('backend.transaksi.index');
    }
}
