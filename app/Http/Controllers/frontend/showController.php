<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Kategori;
use App\Models\Kontak;
use App\Models\Tim;
use Illuminate\Http\Request;

class showController extends Controller
{
    public function index()
    {

        $kontak = Kontak::first();
        $tim = Tim::all();
        $kategori = Kategori::all();
        $brands = Brands::orderby('nama', 'asc')->get();
        return view('frontend.index', compact('kontak', 'tim', 'kategori', 'brands'));
    }
}
