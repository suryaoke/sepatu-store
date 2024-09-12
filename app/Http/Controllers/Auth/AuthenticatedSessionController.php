<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentikasi pengguna
        $request->authenticate();

        // Periksa apakah pengguna memiliki role 1
        $user = Auth::user();
        if ($user->role != 0) {
            Auth::logout(); // Logout pengguna jika tidak memiliki role 1
            $request->session()->invalidate(); // Invalidate session
            $request->session()->regenerateToken(); // Regenerate session token
            return redirect()->route('login')->with('error', 'Anda tidak memiliki akses untuk login.');
        }

        // Regenerasi session setelah login berhasil
        $request->session()->regenerate();

        // Tampilkan pesan sukses
        session()->flash('success', 'Login Successfully.');

        // Redirect ke dashboard
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
