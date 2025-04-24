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
        $user = EUser::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id]);
            return redirect('/')->with('success', 'Logged in successfully');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        session()->forget('user_id');
        return redirect('/')->with('success', 'Logged out successfully');
    }
}
