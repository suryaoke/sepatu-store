<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherCreateRequest;
use App\Http\Requests\VoucherUpdateRequest;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class voucherController extends Controller
{
    public function index()
    {
        $voucher = Voucher::latest()->get();

        return view('backend.voucher.index', compact('voucher'));
    }

    public function create(VoucherCreateRequest $request)
    {
        $data = $request->validated();
        $voucher = Voucher::create($data);

        session()->flash('success', 'Voucher Created SuccessFully.');
        return redirect()->route('voucher.all');
    }

    public function update(VoucherUpdateRequest $request)
    {
        $voucher_id = $request->id;

        $voucher_id = $request->id;
        $voucher = Voucher::findOrFail($voucher_id);
        $data = $request->validated();
        $voucher->fill($data);
        $voucher->updated_at = Carbon::now();
        $voucher->save();

        session()->flash('success', 'Voucher Updated SuccessFully.');
        return redirect()->route('voucher.all');
    }


    public function delete($id)
    {
        Voucher::findOrFail($id)->forceDelete();

        session()->flash('success', 'Voucher Deleted Successfully.');

        return redirect()->route('voucher.all');
    }
}
