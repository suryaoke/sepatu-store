<?php

namespace App\Livewire;

use App\Models\Kategori;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Sepatu;
use Livewire\Component;

class SepatuBrand extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 9;
    public $slug;
    public $selectedKategori = null; // Tambahkan properti untuk brand filter
    public $kategoris = []; // Tambahkan properti untuk daftar brands

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->kategoris = Kategori::all(); // Ambil semua brand untuk dropdown
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
        return view('livewire.sepatu-brand', [
            'sepatu' => Sepatu::whereHas('brands', function (Builder $query) {
                $query->where('slug', $this->slug);
            })
                ->when($this->selectedKategori, function (Builder $query) {
                    $query->where('kategori_id', $this->selectedKategori);
                })
                ->where('nama', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->perPage),
            'kategoris' => $this->kategoris, // Kirim daftar brands ke view
        ]);
    }
}
