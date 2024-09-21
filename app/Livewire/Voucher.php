<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kontak;
use App\Models\Tim;
use App\Models\Kategori;
use App\Models\Brands;
use App\Models\Sepatu;
use App\Models\Size;
use App\Models\Voucher as ModelsVoucher;

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
    public $kode; // Property for the voucher code
    public $kodeid; // Property for the voucher ID
    public $voucherApplied = false; // To track if a voucher has been applied
    public $voucherMessage; // Property for voucher messages
    public $harga;
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
    }

    public function updatedKode($value)
    {
        // Clear message if input is empty
        if (empty($value)) {
            $this->voucherMessage = null; // Reset message
            return; // Exit early if the input is empty
        }

        // Fetch the voucher based on the code
        $voucher = ModelsVoucher::where('kode', $value)->first();

        // Reset total if a valid voucher is found
        if ($voucher && !$this->voucherApplied) {
            $this->total -= $voucher->harga;
            $this->kodeid = $voucher->id; // Store the voucher ID
            $this->harga = $voucher->harga;
            $this->voucherApplied = true; // Set the flag to true
            $this->voucherMessage = "1"; // Success message
            $this->kodeid = $voucher ? $voucher->id : null;
            $this->harga = $voucher ? $voucher->harga : null;
        } elseif (!$voucher) {
            // If voucher is invalid, reapply the original total
            $this->resetVoucher();
            $this->voucherMessage = "0"; // Error message
        }
    }

    public function resetVoucher()
    {
        if ($this->voucherApplied) {
            $this->total += ModelsVoucher::find($this->kodeid)->harga; // Add back the last applied voucher price
            $this->voucherApplied = false; // Reset the voucher applied flag
            $this->kodeid = null; // Clear the voucher ID
        }
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
            'voucherMessage' => $this->voucherMessage, // Pass the message to the view
            'kodeid' => $this->kodeid,
            'harga' => $this->harga,
        ]);
    }
}
