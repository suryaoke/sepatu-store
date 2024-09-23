<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\checkoutRequest;
use App\Models\Brands;
use App\Models\City;
use App\Models\Kategori;
use App\Models\Kontak;
use App\Models\Province;
use App\Models\Sepatu;
use App\Models\Size;
use App\Models\Tim;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class transaksiController extends Controller
{
    public function checkout()
    {
        $kontak = Kontak::first();
        $tim = Tim::all();
        $kategori = Kategori::all();
        $brands = Brands::orderby('nama', 'asc')->get();
        return view('frontend.transaksi.checkout', compact('kontak', 'tim', 'kategori', 'brands'));
    } //end method

    public function detail(Request $request)
    {
        $validated = $request->validate([
            'size_id' => 'required',
            'total_sepatu' => 'required',
            'slug' => 'required|string'
        ]);

        // Simpan data ke session
        session()->put('transaksi', [
            'size_id' => $validated['size_id'],
            'total_sepatu' => $validated['total_sepatu'],
            'slug' => $validated['slug']
        ]);

        // Redirect ke halaman B dengan slug
        return redirect()->route('frontend.sepatu.checkout', ['slug' => $validated['slug']]);
    }

    public function sepatuCheckout($slug)
    {
        $kontak = Kontak::first();

        $kategori = Kategori::all();
        $provinces = Province::pluck('name', 'province_id');
        return view('frontend.transaksi.checkout', compact('provinces', 'kontak', 'kategori',  'slug'));
    }

    public function sepatuCheckoutStore(checkoutRequest $request)
    {

        $data = $request->validated();
        $total_sepatu = $request->total_sepatu;
        $sepatu_id = $request->sepatu_id;


        // Membuat transaksi baru berdasarkan data yang tervalidasi
        $transaksi = transaksi::create($data);

        // Menghasilkan kode transaksi yang unik
        $uniqueCode = 'TRX' . Str::random(3) . '' . $sepatu_id . '' . date('Y');
        $transaksi->trx_id = $uniqueCode;
        $transaksi->ongkir = $request->ongkir;
        $transaksi->voucher_id = $request->voucher_id;
        $transaksi->status = '5';
        $transaksi->save();

        // Mengupdate stok sepatu
        $sepatu = Sepatu::findOrFail($sepatu_id);
        $sepatu->stock -= $total_sepatu;
        $sepatu->save();

        session()->flash('success', 'Checkout berhasil. Silakan lanjutkan ke pembayaran.');

        return redirect()->route('frontend.payment', ['trx_id' => $transaksi->trx_id]);
    }
    public function payment($trx_id)
    {
        $kontak = Kontak::first();
        $kategori = Kategori::all();
        $transaksi = transaksi::where('trx_id', $trx_id)->first();
        return view('frontend.transaksi.payment', compact('transaksi', 'kontak', 'kategori', 'trx_id'));
    }

    public function proof(Request $request)
    {
        $request->validate([
            'proof' => [
                'required',
                'file', // Ensures it is a file
                'mimes:jpg,jpeg,png', // Restrict the file types
                'max:4096', // Max file size is 4096KB, which equals 4MB
            ],
        ]);

        $trx_id = $request->trx_id;

        $transaksi = Transaksi::where('trx_id', $trx_id)->first();

        if ($request->hasFile('proof')) {
            $foto = $request->file('proof');

            // Buat nama unik untuk file gambar yang diunggah
            $filename = time() . '_' . $foto->getClientOriginalName();

            // Lokasi penyimpanan file
            $path = 'images/proof/' . $filename;

            // Menggunakan Intervention Image untuk mengubah ukuran gambar (misalnya, menjadi 300x300)
            $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Menyimpan gambar ke storage dengan disk 'public'
            Storage::disk('public')->put($path, (string) $image->encode());

            // Update path gambar pada transaksi
            $transaksi->proof = $path;
            $transaksi->status = 1;
            $transaksi->save();
        }

        return redirect()->route('frontend.payment.detail', ['trx_id' => $transaksi->trx_id],);
    }

    public function paymentDetail($trx_id)
    {
        $kontak = Kontak::first();
        $kategori = Kategori::all();
        $transaksi = transaksi::where('trx_id', $trx_id)->first();
        $sepatu = Sepatu::where('id', $transaksi->sepatu_id)->first();
        return view('frontend.transaksi.detail', compact('sepatu', 'transaksi', 'kontak', 'kategori', 'trx_id'));
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function check_ongkir(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        return response()->json($cost);
    }
}
