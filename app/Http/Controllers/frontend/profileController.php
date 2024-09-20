<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontendProfileUpdateRequest;
use App\Models\Kategori;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\RedirectResponse;

class profileController extends Controller
{
    public function edit(Request $request): View
    {
        $kontak = Kontak::first();
        $kategori = Kategori::all();
        return view('frontend.login.profile', [
            'user' => $request->user(),
            'kontak' => $kontak,
            'kategori' => $kategori
        ]);
    }

    public function update(frontendProfileUpdateRequest $request): RedirectResponse
    {
        // Mengisi user dengan data validasi dari request
        $request->user()->fill($request->validated());

        // Cek jika ada perubahan pada email
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Memproses file foto jika ada yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($request->user()->foto) {
                Storage::disk('public')->delete($request->user()->foto);
            }

            $foto = $request->file('foto');

            // Buat nama unik untuk file gambar yang diunggah
            $filename = time() . '_' . $foto->getClientOriginalName();

            // Lokasi penyimpanan file
            $path = 'images/user/' . $filename;

            // Menggunakan Intervention Image untuk mengubah ukuran gambar (misalnya, menjadi 300x300)
            $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Menyimpan gambar ke storage dengan disk 'public'
            Storage::disk('public')->put($path, (string) $image->encode());

            // Menambahkan path gambar baru ke data user yang akan disimpan di database
            $request->user()->foto = $path;
        } else {

            $request->user()->foto = $request->user()->getOriginal('foto');
        }

        $request->user()->save();


        session()->flash('success', 'Profile Updated Successfully.');

        return back();
    }
}
