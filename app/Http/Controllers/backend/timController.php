<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimCreateRequest;
use App\Http\Requests\TimUpdateRequest;
use App\Models\Tim;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class timController extends Controller
{
    public function index()
    {
        $tim = Tim::OrderBy('nama', 'asc')->get();
        return view('backend.tim.index', compact('tim'));
    } // End Method

    public function create(TimCreateRequest $request)
    {
        // Validasi data yang dikirim melalui request
        $data = $request->validated();

        // Memproses file foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Buat nama unik untuk file gambar yang diunggah
            $filename = time() . '_' . $foto->getClientOriginalName();

            // Lokasi penyimpanan file
            $path = 'images/tim/' . $filename;

            // Menggunakan Intervention Image untuk mengubah ukuran gambar (misalnya, menjadi 300x300)
            $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Menyimpan gambar ke storage dengan disk 'public'
            Storage::disk('public')->put($path, (string) $image->encode());

            // Menambahkan path gambar ke data yang akan disimpan di database
            $data['foto'] = $path;
        }

        $tim = new Tim($data);
        $tim->created_at = Carbon::now();
        $tim->save();


        session()->flash('success', 'Tim Created Successfully.');

        return redirect()->route('tim.all');
    } // End Method

    public function update(TimUpdateRequest $request)
    {

        $tim_id = $request->id;
        $tim = Tim::findOrFail($tim_id);

        $data = $request->validated();

        // Memproses file foto jika ada yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($tim->foto) {
                Storage::disk('public')->delete($tim->foto);
            }

            $foto = $request->file('foto');

            // Buat nama unik untuk file gambar yang diunggah
            $filename = time() . '_' . $foto->getClientOriginalName();

            // Lokasi penyimpanan file
            $path = 'images/tim/' . $filename;

            // Menggunakan Intervention Image untuk mengubah ukuran gambar (misalnya, menjadi 300x300)
            $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Menyimpan gambar ke storage dengan disk 'public'
            Storage::disk('public')->put($path, (string) $image->encode());

            // Menambahkan path gambar baru ke data yang akan disimpan di database
            $data['foto'] = $path;
        } else {
            $data['foto'] = $tim->foto;
        }

        $tim->fill($data);
        $tim->updated_at = Carbon::now();
        $tim->save();

        session()->flash('success', 'Tim Updated Successfully.');


        return redirect()->route('tim.all');
    } // End Method



    public function delete($id)
    {
        Tim::findOrFail($id)->delete();

        session()->flash('success', 'Tim Delete SuccessFully.');

        return redirect()->route('tim.all');
    } // end method
}
