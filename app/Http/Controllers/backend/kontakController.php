<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\KontakCreateRequest;
use App\Http\Requests\KontakUpdateRequest;
use App\Models\Kontak;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class kontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::all();
        $dataKontakSudahAda = $kontak->count() > 0;

        return view('backend.kontak.index', compact('kontak', 'dataKontakSudahAda'));
    }

    public function showCreate()
    {

        return view('backend.kontak.create');
    }
    public function create(KontakCreateRequest $request)
    {
        $data = $request->validated();
        $kontak = Kontak::create($data);

        session()->flash('success', 'Kontak Created SuccessFully.');
        return redirect()->route('kontak.all');
    }
    public function showEdit($id)
    {
        $kontak = Kontak::find($id);
        return view('backend.kontak.edit', compact('kontak', 'id'));
    }
    public function update(KontakUpdateRequest $request)
    {
        $kontak_id = $request->id;

        $kontak_id = $request->id;
        $kontak = Kontak::findOrFail($kontak_id);
        $data = $request->validated();
        $kontak->fill($data);
        $kontak->updated_at = Carbon::now();
        $kontak->save();

        session()->flash('success', 'Kontak Updated SuccessFully.');
        return redirect()->route('kontak.all');
    }


    public function delete($id)
    {
        Kontak::findOrFail($id)->delete();

        session()->flash('success', 'Kontak Delete SuccessFully.');

        return redirect()->route('kontak.all');
    } // end method
}
