<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth as AuthModel;


class AuthController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function showRegister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $incomingfields = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
            'contact' => 'required|string|min:11|max:15',
        ]);

        $incomingfields['password'] = Hash::make($incomingfields['password']);

        AuthModel::create($incomingfields);

        return redirect()->route('dashboard');
    }
    public function showLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $accessfields = $request->validate([
            'name' => 'required|string|max:30',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($accessfields)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        };
        return back()->withErrors([
            'name' => 'Invalid name or password entered.',
        ])->onlyInput('name');
    }
    public function logout(Request $request)
    {
        // return view('dashboard');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');

    }
}
