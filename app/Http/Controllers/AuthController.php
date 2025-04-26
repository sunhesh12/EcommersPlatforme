<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Check user
        $user = EUser::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    
        // Login user manually
        Auth::login($user);

        if ($request->from === 'home') {
            return redirect()->route('home');
        } elseif ($request->from === 'profile') {
            return redirect()->route('user.my-profile');
        }
        
    
        // Redirect after login
        // return redirect()->route('user.my-profile')->with('success', 'Login successful!');
    }

    public function logout()
    {
        session()->forget('user_id');
        return redirect('/')->with('success', 'Logged out successfully');
    }
}
