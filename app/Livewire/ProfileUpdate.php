<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Kategori;
use App\Models\Kontak;
use App\Models\Province;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ProfileUpdate extends Component
{
    public $selectedProvince = null;
    public $selectedCity = null;

    public function mount()
    {


        $user = Auth::user();

        // Inisialisasi provinsi dan kota yang sudah tersimpan
        if ($user) {
            $this->selectedProvince = $user->province_id;
            $this->selectedCity = $user->city_id;
        }
    }
    public function render(Request $request)
    {
        $provinces = Province::all();

        // Mengambil data kota sesuai provinsi yang dipilih, jika tidak ada yang dipilih tampilkan kota yang tersimpan
        $cities = City::when($this->selectedProvince, function (Builder $query) {
            $query->where('province_id', $this->selectedProvince);
        })->get();

        $kontak = Kontak::first();
        $kategori = Kategori::all();
        return view('livewire.profile-update', [
            'user' => $request->user(),
            'kontak' => $kontak,
            'kategori' => $kategori,
            'provinces' => $provinces,
            'cities' => $cities
        ]);
    }
}
