<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Kontak;
use App\Models\Province;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class KontakAdminUpdate extends Component
{
    public $selectedProvince = null;
    public $selectedCity = null;
    public $id;

    public function mount($id)
    {
        // Inisialisasi ID kontak
        $this->id = $id;

        // Mengambil data kontak yang sudah ada
        $kontak = Kontak::find($this->id);

        // Inisialisasi provinsi dan kota yang sudah tersimpan
        if ($kontak) {
            $this->selectedProvince = $kontak->province_id;
            $this->selectedCity = $kontak->city_id;
        }
    }

    public function render()
    {
        // Mengambil semua data provinsi
        $provinces = Province::all();

        // Mengambil data kota sesuai provinsi yang dipilih, jika tidak ada yang dipilih tampilkan kota yang tersimpan
        $cities = City::when($this->selectedProvince, function (Builder $query) {
            $query->where('province_id', $this->selectedProvince);
        })->get();

        // Mengambil data kontak
        $kontak = Kontak::find($this->id);

        // Menampilkan view dengan data yang dioper ke dalamnya
        return view('livewire.kontak-admin-update', compact('cities', 'kontak', 'provinces'));
    }
}
