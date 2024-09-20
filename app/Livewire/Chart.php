<?php

namespace App\Livewire;

use App\Models\transaksi;
use App\Models\Sepatu;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Chart extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $searchnamasepatu = ''; // Tambahkan properti untuk search nama sepatu

    public function mount() {}

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSearchnamasepatu()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.chart', [
            'transaksi' => transaksi::where('user_id', Auth::user()->id)
                ->where('trx_id', 'LIKE', '%' . $this->search . '%')
                ->when($this->searchnamasepatu, function ($query) {
                    return $query->whereHas('sepatus', function ($q) {
                        $q->where('nama', 'LIKE', '%' . $this->searchnamasepatu . '%');
                    });
                })
                ->latest()
                ->paginate(10),
        ]);
    }
}
