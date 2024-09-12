<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.index', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
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

        return Redirect::route('profile');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
