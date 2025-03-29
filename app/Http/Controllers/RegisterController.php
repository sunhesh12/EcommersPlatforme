<?php 

namespace App\Http\Controllers;

use App\Models\EUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController
{
    public function showRegisterForm()
    {
        return view('app/Register');
    }
    public function register(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:e_users,email',
        'password' => 'required|min:8|confirmed',
        'accepted_terms' => 'required|boolean|in:1',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:100',
        'state' => 'nullable|string|max:100',
        'country' => 'nullable|string|max:100',
        'postal_code' => 'nullable|string|max:20',
    ]);

    $user = EUser::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'accepted_terms' => $validated['accepted_terms'],
        'profile_picture' => $request->file('profile_picture') ? $request->file('profile_picture')->store('profiles') : null,
        'phone' => $validated['phone'] ?? null,
        'address' => $validated['address'] ?? null,
        'city' => $validated['city'] ?? null,
        'state' => $validated['state'] ?? null,
        'country' => $validated['country'] ?? null,
        'postal_code' => $validated['postal_code'] ?? null,
    ]);
    

    return redirect()->route('user.loginn')->with('success', 'Registration successful! You can now log in.');
    // return response()->json(['message' => 'User registered successfully!', 'user' => $user]);
}
}
