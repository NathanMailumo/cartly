<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
// use App\Models\Auth as AuthModel;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function showRoleSelection(){
        return view('role');
    }

     public function showRegister($role)
    {
        // return view('register');
        if (!in_array($role, ['buyer', 'seller'])) {
            abort(404);
        }
    return view('register', compact('role'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8|confirmed',
            'role'     => ['required', Rule::in(['buyer', 'seller'])],
            // 'contact' => 'required|string|min:11|max:15',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

       if ($user->role === 'buyer') {
            Buyer::create([
                'user_id' => $user->id,
            ]);
        } elseif ($user->role === 'seller') {
            Seller::create([
                'user_id' => $user->id,
            ]);
        }

        // Step C: Log the user in and redirect
        Auth::login($user);

        return $user->role === 'seller' 
            ? redirect()->route('seller.dashboard') 
            : redirect()->route('buyer.dashboard');
    }
}
