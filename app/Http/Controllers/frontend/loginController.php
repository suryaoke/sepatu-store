<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Brands;
use App\Models\Kategori;
use App\Models\Kontak;
use App\Models\Tim;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Method untuk menampilkan form login
    public function login()
    {
        // Mengambil data tambahan untuk ditampilkan di view
        $kontak = Kontak::first();
        $tim = Tim::all();
        $kategori = Kategori::all();
        $brands = Brands::orderby('nama', 'asc')->get();

        // Mengembalikan tampilan login dengan data yang diambil
        return view('frontend.login.index', compact('kontak', 'tim', 'kategori', 'brands'));
    }

    // Method untuk menangani proses login
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentikasi pengguna berdasarkan request
        $request->authenticate();

        // Ambil user yang sedang login
        $user = Auth::user();

        // Cek apakah user memiliki role == 1
        if ($user->role != 1) {
            // Logout pengguna jika tidak memiliki role 1
            Auth::logout();

            // Invalidate session dan regenerasi token
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirect ke halaman login dengan pesan error
            return redirect()->route('frontend.login')->with('error', 'Anda tidak memiliki akses untuk login.');
        }

        // Jika lolos, regenerasi session
        $request->session()->regenerate();

        // Tampilkan pesan sukses
        session()->flash('success', 'Login berhasil.');

        // Redirect ke halaman yang dituju, atau default ke halaman frontend
        return redirect()->intended(route('frontend'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('frontend'));
    }
}
