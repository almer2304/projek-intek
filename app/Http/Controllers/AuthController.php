<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showlogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->email === 'admin' && $request->password === '2304') {
            return redirect()->route('books.index')->with('success', 'Welcome Admin!');
        }   

    // Jika bukan admin, cek ke database
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    public function login(Request $request)
    {
        $credentials = $request->only("email","password");

        if(Auth::attempt($credentials)) {
            $user = Auth::user();  
            if($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif($user->role == 'user') {
                return redirect()->route('user.dashboard');
            }
        }
        return back()->withErrors(['email' => 'email atau password salah']);
    }
    public function showRegister(Request $request)
    {
        return view("auth.register");
    }   
    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role
        ]);

        Auth::login($user);

        return redirect('/auth/login')->with('success', 'Registrasi berhasil, silakan masuk.');
    }   
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('/login');

    }
}
