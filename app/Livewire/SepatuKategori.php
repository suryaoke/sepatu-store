<?php

namespace App\Livewire;

use App\Models\Sepatu;
use App\Models\Brands;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class SepatuKategori extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 9;
    public $slug;
    public $selectedBrand = null; // Tambahkan properti untuk brand filter
    public $brands = []; // Tambahkan properti untuk daftar brands

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->brands = Brands::all(); // Ambil semua brand untuk dropdown
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function loadMore()
    {
        $this->perPage += 9;
    }

    public function render()
    {
        return view('livewire.sepatu-kategori', [
            'sepatu' => Sepatu::whereHas('kategoris', function (Builder $query) {
                $query->where('slug', $this->slug);
            })
                ->when($this->selectedBrand, function (Builder $query) {
                    $query->where('brands_id', $this->selectedBrand);
                })
                ->where('nama', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->perPage),
            'brands' => $this->brands, // Kirim daftar brands ke view
        ]);
    }
}
