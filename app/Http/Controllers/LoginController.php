<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('guest.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Akun demo untuk praktikum
        $usernameBenar = 'admin';
        $passwordBenar = 'admin123';

        if (
            $credentials['username'] === $usernameBenar &&
            $credentials['password'] === $passwordBenar
        ) {
            $request->session()->regenerate();
            Session::put('admin_logged_in', true);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Login berhasil!');
        }

        return back()
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }
}
