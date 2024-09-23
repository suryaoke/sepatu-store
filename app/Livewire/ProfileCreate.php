<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Province;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class ProfileCreate extends Component
{
    public $selectedProvince = null;
    public function render()
    {

        $provinces = Province::all();

        // Mengambil data kota sesuai provinsi yang dipilih
        $cities = City::when($this->selectedProvince, function (Builder $query) {
            $query->where('province_id', $this->selectedProvince);
        })->get();
        return view('livewire.profile-create', compact('cities', 'provinces'));
    }
}
