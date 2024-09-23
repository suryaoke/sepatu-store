<?php

namespace App\Livewire;

use App\Models\transaksi;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class TransaksiAdmin extends Component
{
    use WithPagination;

    public $search = '';

    public $searchnamasepatu = '';
    public $searchpelanggan = '';
    public $selectedStatus = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingSearchnamasepatu()
    {
        $this->resetPage();
    }

    public function updatingSearchpelanggan()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.transaksi-admin', [
            'transaksi' => transaksi::where('trx_id', 'LIKE', '%' . $this->search . '%')
                ->when($this->searchnamasepatu, function ($query) {
                    return $query->whereHas('sepatus', function ($q) {
                        $q->where('nama', 'LIKE', '%' . $this->searchnamasepatu . '%');
                    });
                })
                ->when($this->searchpelanggan, function ($query) {
                    return $query->whereHas('user', function ($q) {
                        $q->where('name', 'LIKE', '%' . $this->searchpelanggan . '%');
                    });
                })
                ->when($this->selectedStatus, function (Builder $query) {
                    $query->where('status', $this->selectedStatus);
                })
                ->latest()
                ->paginate(10),


        ]);
    }
}
