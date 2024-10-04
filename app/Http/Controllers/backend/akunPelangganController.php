<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class akunPelangganController extends Controller
{
    public function index()
    {
        $akunpelanggan = User::role('masyarakat')->OrderBy('name', 'asc')->get();
        return view('backend.akunPelanggan.index', compact('akunpelanggan'));
    }
}
