<?php

namespace App\Livewire;

use App\Models\Brands;
use App\Models\Sepatu;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class SepatuAdmin extends Component
{
    use WithPagination;

    public $search = '';

    public $selectedKategori = null;
    public $selectedBrands = null;
    public $selectedPopular = null; // Tambahkan properti untuk filter popular
    public $kategoris = [];
    public $brands = [];

    public function mount()
    {
        $this->kategoris = Kategori::all();
        $this->brands = Brands::all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.sepatu-admin', [
            'sepatu' => Sepatu::when($this->selectedKategori, function (Builder $query) {
                $query->where('kategori_id', $this->selectedKategori);
            })
                ->when($this->selectedBrands, function (Builder $query) {
                    $query->where('brands_id', $this->selectedBrands);
                })
                ->when($this->selectedPopular, function (Builder $query) {
                    $query->where('popular', $this->selectedPopular);
                })
                ->where('nama', 'LIKE', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),

            'kategoris' => $this->kategoris,
            'brands' => $this->brands,
        ]);
    }
}
