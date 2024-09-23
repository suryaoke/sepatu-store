<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kontak;
use App\Models\Tim;
use App\Models\Kategori;
use App\Models\Brands;
use App\Models\Province;
use App\Models\Sepatu;
use App\Models\Size;
use App\Models\Voucher as ModelsVoucher;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class Voucher extends Component
{
    public $sepatu;
    public $kontak;
    public $tim;
    public $kategori;
    public $brands;
    public $data;
    public $size;
    public $subtotal;
    public $total;
    public $kode;
    public $kodeid;
    public $voucherApplied = false;
    public $voucherMessage;
    public $harga;

    // Properti untuk ongkir
    public $courier;
    public $ongkirResults = [];
    public $cityOrigin;
    public $cityDestination;
    public $weight;
    public $ongkirSelected = 0; // Nilai ongkir yang dipilih

    public function mount($slug)
    {
        $this->kontak = Kontak::first();
        $this->tim = Tim::all();
        $this->kategori = Kategori::all();
        $this->brands = Brands::orderby('nama', 'asc')->get();

        $this->data = session()->get('transaksi');
        $this->sepatu = Sepatu::where('slug', $this->data['slug'])->first();
        $this->size = Size::where('id', $this->data['size_id'])->first();
        $this->total = $this->sepatu->harga * $this->data['total_sepatu'];
        $this->subtotal = $this->sepatu->harga * $this->data['total_sepatu'];

        // Mengatur data untuk ongkir
        $this->cityOrigin = $this->kontak->city_id; // ID kota asal
        $this->cityDestination = Auth::user()->city_id; // ID kota tujuan
        $this->weight = $this->sepatu->berat; // Berat sepatu
    }

    public function updatedKode($value)
    {
        if (empty($value)) {
            $this->voucherMessage = null;
            return;
        }

        $voucher = ModelsVoucher::where('kode', $value)->first();

        if ($voucher && !$this->voucherApplied) {
            $this->total -= $voucher->harga;
            $this->kodeid = $voucher->id;
            $this->harga = $voucher->harga;
            $this->voucherApplied = true;
            $this->voucherMessage = "1";
        } elseif (!$voucher) {
            $this->resetVoucher();
            $this->voucherMessage = "0";
        }
    }

    public function resetVoucher()
    {
        if ($this->voucherApplied) {
            $this->total += ModelsVoucher::find($this->kodeid)->harga;
            $this->voucherApplied = false;
            $this->kodeid = null;
        }
    }

    public function updatedCourier()
    {
        if ($this->cityOrigin && $this->cityDestination && $this->weight) {
            $this->checkOngkir();
        }
    }

    public function checkOngkir()
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin' => $this->cityOrigin,
            'destination' => $this->cityDestination,
            'weight' => $this->weight,
            'courier' => $this->courier,
        ])->get();

        $this->ongkirResults = $cost;
    }

    // Tambahkan method untuk memperbarui total saat ongkir dipilih
    public function updatedOngkirSelected($value)
    {
        // Reset total ke subtotal dan tambahkan ongkir
        $this->total = $this->subtotal + $value;
    }

    public function render()
    {
        return view('livewire.voucher', [
            'sepatu' => $this->sepatu,
            'kontak' => $this->kontak,
            'tim' => $this->tim,
            'kategori' => $this->kategori,
            'brands' => $this->brands,
            'data' => $this->data,
            'size' => $this->size,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
            'voucherMessage' => $this->voucherMessage,
            'kodeid' => $this->kodeid,
            'harga' => $this->harga,
            'ongkirResults' => $this->ongkirResults,
            'provinces' => Province::pluck('name', 'province_id'),
        ]);
    }
}
