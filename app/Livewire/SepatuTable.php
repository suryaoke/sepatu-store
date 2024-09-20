<?php

namespace App\Livewire;

use App\Models\Sepatu;
use Livewire\Component;
use Livewire\WithPagination;

class SepatuTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 6; // Jumlah item yang ditampilkan awalnya

    // Reset pagination ketika pencarian diubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Fungsi untuk menambah jumlah item ketika tombol Load More ditekan
    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function render()
    {
        return view('livewire.sepatu-table', [
            // Memastikan latest() dipanggil sebelum paginate()
            'sepatu' => Sepatu::search($this->search)
                ->latest()  // Memesan data berdasarkan created_at (desc)
                ->paginate($this->perPage),
        ]);
    }
}
