<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriCreateRequest;
use App\Http\Requests\KategoriUpdateRequest;
use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class kategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::OrderBy('nama', 'asc')->get();

        return view('backend.kategori.index', compact('kategori'));
    }

    public function create(KategoriCreateRequest $request)
    {
        $data = $request->validated();

        // Memproses file foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Buat nama unik untuk file gambar yang diunggah
            $filename = time() . '_' . $foto->getClientOriginalName();

            // Lokasi penyimpanan file
            $path = 'images/kategori/' . $filename;

            // Menggunakan Intervention Image untuk mengubah ukuran gambar (misalnya, menjadi 300x300)
            $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Menyimpan gambar ke storage dengan disk 'public'
            Storage::disk('public')->put($path, (string) $image->encode());

            // Menambahkan path gambar ke data yang akan disimpan di database
            $data['foto'] = $path;
        }


        $kategori = Kategori::create($data);

        session()->flash('success', 'Kategori Created SuccessFully.');
        return redirect()->route('kategori.all');
    }

    public function update(KategoriUpdateRequest $request)
    {
        $kategori_id = $request->id;

        $kategori_id = $request->id;
        $kategori = Kategori::findOrFail($kategori_id);
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($kategori->foto) {
                Storage::disk('public')->delete($kategori->foto);
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
            $data['foto'] = $kategori->foto;
        }

        $kategori->fill($data);
        $kategori->updated_at = Carbon::now();
        $kategori->save();

        session()->flash('success', 'Kategori Updated SuccessFully.');
        return redirect()->route('kategori.all');
    }


    public function delete($id)
    {
        Kategori::findOrFail($id)->delete();

        session()->flash('success', 'Kategori Delete SuccessFully.');

        return redirect()->route('kategori.all');
    } // end method
}
