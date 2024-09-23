<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Kontak;
use App\Models\Province;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class KontakAdminCreate extends Component
{

    public $selectedProvince = null;
    public function render()
    {
        // Mengambil semua data kontak
        $kontak = Kontak::all();
        $provinces = Province::all();
        // Mengecek apakah ada data kontak
        $dataKontakSudahAda = $kontak->count() > 0;

        // Mengambil data kota sesuai provinsi yang dipilih
        $cities = City::when($this->selectedProvince, function (Builder $query) {
            $query->where('province_id', $this->selectedProvince);
        })->get();

        // Menampilkan view dengan data yang dioper ke dalamnya
        return view('livewire.kontak-admin-create', compact('cities', 'kontak', 'dataKontakSudahAda', 'provinces'));
    }
}
