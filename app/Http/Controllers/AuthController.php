<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // FORM LOGIN
    public function loginForm()
    {
        return view('auth.login');
    }

    // LOGIN PROCESS
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email atau password salah');
        }

        session(['user' => $user]);

        return redirect('/');
    }

    // FORM REGISTER
    public function registerForm()
    {
        return view('auth.register');
    }

    // REGISTER PROCESS
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user,email',
            'phone' => 'required|unique:user,phone',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Berhasil daftar!');
    }

    // PROFILE
    public function profile()
    {
        if (!session('user')) {
            return redirect('/login');
        }

        return view('profile');
    }

    // LOGOUT
    public function logout()
    {
        session()->forget('user');
        return redirect('/');
    }
}