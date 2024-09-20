<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\brandsCreateRequest;
use App\Http\Requests\brandsUpdateRequest;
use App\Models\Brands;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class brandsController extends Controller
{
    public function index()
    {
        $brands = Brands::OrderBy('nama', 'asc')->get();
        return view('backend.brands.index', compact('brands'));
    } // End Method

    public function create(BrandsCreateRequest $request)
    {
        // Validasi data yang dikirim melalui request
        $data = $request->validated();


        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');


            $filename = time() . '_' . $foto->getClientOriginalName();


            $path = 'images/brands/' . $filename;

            // Menggunakan Intervention Image untuk mengubah ukuran gambar (misalnya, menjadi 300x300)
            $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Menyimpan gambar ke storage dengan disk 'public'
            Storage::disk('public')->put($path, (string) $image->encode());

            // Menambahkan path gambar ke data yang akan disimpan di database
            $data['foto'] = $path;
        }

        $brands = Brands::create($data);
        $brands->created_at = Carbon::now();
        $brands->save();

        session()->flash('success', 'Brands Created Successfully.');

        return redirect()->route('brands.all');
    } // End Method

    public function update(brandsUpdateRequest $request)
    {

        $brands_id = $request->id;
        $brands = Brands::findOrFail($brands_id);

        $data = $request->validated();

        // Memproses file foto jika ada yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($brands->foto) {
                Storage::disk('public')->delete($brands->foto);
            }

            $foto = $request->file('foto');

            // Buat nama unik untuk file gambar yang diunggah
            $filename = time() . '_' . $foto->getClientOriginalName();

            // Lokasi penyimpanan file
            $path = 'images/brands/' . $filename;

            // Menggunakan Intervention Image untuk mengubah ukuran gambar (misalnya, menjadi 300x300)
            $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Menyimpan gambar ke storage dengan disk 'public'
            Storage::disk('public')->put($path, (string) $image->encode());

            // Menambahkan path gambar baru ke data yang akan disimpan di database
            $data['foto'] = $path;
        } else {
            $data['foto'] = $brands->foto;
        }

        $brands->fill($data);
        $brands->updated_at = Carbon::now();
        $brands->save();

        session()->flash('success', 'Brands Updated Successfully.');


        return redirect()->route('brands.all');
    } // End Method



    public function delete($id)
    {
        Brands::findOrFail($id)->delete();

        session()->flash('success', 'Brands Delete SuccessFully.');

        return redirect()->route('brands.all');
    } // end method
}
