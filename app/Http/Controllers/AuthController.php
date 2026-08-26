<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth as AuthModel;
use App\Models\passwordReset;


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

    public function showReset()
    {
        return view('reset');
    }

    public function reset(Request $request)
    {
        $validateEmail = $request->validate([
            'email' => 'required|email|string|exists:auths,email',
        ], [
            'email.exists' => 'Invalid email',
        ]);

        $code = random_int(100000, 999999);

        // Store or update the reset code record
        passwordReset::updateOrCreate(
            ['email' => $validateEmail['email']],
            [
                'code' => $code,
                'expires_at' => now()->addMinutes(10),
            ]
        );

        // Store code in session flash data for testing alert display
        return redirect()->route('auth.verify', ['email' => $validateEmail['email']])->with('otp_code', $code);
    }

    public function showVerify(Request $request)
    {
        return view('verify', ['email' => $request->query('email')]);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string',
            'code' => 'required|digits:6',
        ]);

        $records = passwordReset::where('email', $request->email)
            ->where('code', $request->code)
            ->first();

        if (!$records || $records->expires_at->isPast()) {
            # code...
            return back()->withErrors([
                'code' => 'The code is invalid',
            ])->withInput();
        }
        $records->delete();

        return redirect()->route('auth.password.create', ['email' => $request->email]);
    }

    public function showCreate()
    {
        return view('create');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|exists:auths,email',
            'password' => 'required|string|min:8|confirmed', // Automatically matches 'password_confirmation'
        ]);

        // 2. Hash and update password in DB
        AuthModel::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        // 3. Redirect back to login with success feedback
        return redirect()->route('login')->with('success', 'Your password has been reset successfully!');
    }
}