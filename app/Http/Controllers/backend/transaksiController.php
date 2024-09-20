<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Sepatu;
use App\Models\transaksi;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index()
    {
        $transaksi = transaksi::all();
        return view('backend.transaksi.index', compact('transaksi'));
    }

    public function updatestatus(Request $request)
    {
        $transaksi_id = $request->id;
        $status = $request->status;

        // Mengambil transaksi berdasarkan ID
        $transaksi = Transaksi::where('id', $transaksi_id)->first();

        if ($status == '2') {
            $transaksi->status = 2;

            // Mengambil data sepatu yang terkait dengan transaksi
            $sepatu = Sepatu::where('id', $transaksi->sepatu_id)->first();

            $sepatu->stock += $transaksi->total_sepatu;
            $sepatu->save();
        } else {

            $transaksi->status = $status;
        }

        $transaksi->save();

        session()->flash('success', 'Sepatu Updated Successfully.');

        return redirect()->route('transaksi.all');
    }

    public function transaksiDelete(Request $request, $id)
    {
        $transaksi = Transaksi::where('id', $id)->first();

        if (!$transaksi) {
            return redirect()->route('transaksi.all')->withErrors('Transaksi tidak ditemukan');
        }

        // Memastikan salah satu dari dua kondisi terpenuhi
        if ($transaksi->status == '1' || $transaksi->status == null) {
            $sepatu = Sepatu::where('id', $transaksi->sepatu_id)->first();

            if ($sepatu) {
                // Mengembalikan stok sepatu jika transaksi valid
                $sepatu->stock += $transaksi->total_sepatu;
                $sepatu->save();
            } else {
                return redirect()->route('transaksi.all')->withErrors('Sepatu tidak ditemukan');
            }
        }

        // Hapus transaksi
        $transaksi->delete();

        // Pesan sukses
        session()->flash('success', 'Transaksi berhasil dihapus.');

        return redirect()->route('transaksi.all');
    }
}
