<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
            'alamat' => ['required', 'string', 'max:65535'],
            'hp' => ['required', 'string', 'max:255'],
            'foto' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png',
                'max:4096',
            ],
        ]);

        // Cek apakah file foto ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $path = 'images/user/' . $filename;

            // Resize gambar
            $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Menyimpan gambar di storage
            Storage::disk('public')->put($path, (string) $image->encode());

            $data['foto'] = $path;
        }

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'foto' => isset($data['foto']) ? $data['foto'] : null,
            'role' => '1',
            'created_at' => Carbon::now(),
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'User Created Successfully.');
        return redirect()->route('frontend.login');
    }
}
