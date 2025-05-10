<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        return view('app.login');
    }
    
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
    
        // Store user_id in session
        session(['user_id' => $user->id]);
    
        // Conditional redirection
        if ($request->from === 'home') {
            return redirect()->route('home');
        } elseif ($request->from === 'addtocart') {
            return redirect()->route('home', ['id' => $request->product_id]);
        } elseif ($request->from === '/') {
            return redirect()->route('cart');
        } elseif ($request->from === 'profile') {
            return redirect()->route('user.my-profile');
        }
    
        // Default redirect
        return redirect()->route('home')->with('success', 'Login successful!');
    }
    

    public function logout()
    {
        Auth::logout(); // Properly log out the user
        return redirect('/')->with('success', 'Logged out successfully');
    }
    
}
