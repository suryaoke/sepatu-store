<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Brands;
use App\Models\Kategori;
use App\Models\Kontak;
use App\Models\Sepatu;
use App\Models\SepatuFoto;
use App\Models\Size;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class showController extends Controller
{
    public function index()
    {

        $kontak = Kontak::first();
        $tim = Tim::all();
        $kategori = Kategori::all();
        $brands = Brands::orderby('nama', 'asc')->get();
        $sepatu = Sepatu::all();
        $sepatupopular = Sepatu::where('popular', '1')->limit(6)->get();
        return view('frontend.index', compact('kontak', 'tim', 'kategori', 'brands', 'sepatu', 'sepatupopular'));
    }


    public function register()
    {
        $kontak = Kontak::first();
        $tim = Tim::all();
        $kategori = Kategori::all();
        $brands = Brands::orderby('nama', 'asc')->get();
        return view('frontend.login.register', compact('kontak', 'tim', 'kategori', 'brands'));
    }

    public function detail($slug)
    {
        $kontak = Kontak::first();
        $tim = Tim::all();
        $kategori = Kategori::all();
        $brands = Brands::orderby('nama', 'asc')->get();
        $sepatu = Sepatu::where('slug', $slug)->first();
        $sepatufoto = SepatuFoto::where('sepatu_id', $sepatu->id)->get();
        $size = Size::where('sepatu_id', $sepatu->id)->get();
        return view('frontend.produk.detail', compact('size', 'sepatufoto', 'sepatu', 'kontak', 'tim', 'kategori', 'brands'));
    }

    public function kategori($slug)
    {
        $kontak = Kontak::first();
        $tim = Tim::all();
        $kategori = Kategori::all();
        $brands = Brands::orderBy('nama', 'asc')->get();

        return view('frontend.produk.kategori', compact('kontak', 'tim', 'kategori', 'brands', 'slug'));
    }
    public function brand($slug)
    {
        $kontak = Kontak::first();
        $tim = Tim::all();
        $kategori = Kategori::all();
        $brands = Brands::orderBy('nama', 'asc')->get();

        return view('frontend.produk.brands', compact('kontak', 'tim', 'kategori', 'brands', 'slug'));
    }

    public function sepatuAll()
    {
        $kontak = Kontak::first();
        $tim = Tim::all();
        $kategori = Kategori::all();
        $brands = Brands::orderBy('nama', 'asc')->get();

        return view('frontend.produk.all', compact('kontak', 'tim', 'kategori', 'brands'));
    }


    public function cart()
    {
        $kontak = Kontak::first();
        $tim = Tim::all();
        $kategori = Kategori::all();
        $brands = Brands::orderBy('nama', 'asc')->get();
        $transaksi = Transaksi::where('user_id', Auth::user()->id)->latest()->get();

        return view('frontend.transaksi.cart', compact('transaksi', 'kontak', 'tim', 'kategori', 'brands'));
    }
}
