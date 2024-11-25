<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import model User

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Ambil user dari database berdasarkan username
        $user = User::where('name', $request->name)->first();

        // Jika user ditemukan dan password sesuai
        if ($user && password_verify($request->password, $user->password)) {
            // Simpan user ke session
            session(['auth' => true, 'user_id' => $user->id]);

            return redirect('/dashboard/web/greatmale');
        }

        // Jika login gagal
        return back()->withErrors(['error' => 'Username atau password salah.']);
    }

    // Logout
    public function logout()
    {
        session()->forget(['auth', 'user_id']);
        return redirect()->route('login');
    }
}
