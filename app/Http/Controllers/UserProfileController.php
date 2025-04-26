<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\EUser;

class UserProfileController extends Controller
{
    public function profile()
    {
        $userId = Auth::id();
    
        if (!$userId) {
            // dd('User not logged in.');
            return redirect('/loginn')->with('error', 'Please log in to view your profile.');
        }
    
        $user = EUser::find($userId);
    
        if (!$user) {
            dd('User not found in e_users table for ID: ' . $userId);
        }
    
        return view('app.Myprofile', compact('user'));
    }

    public function edit($id)
{
    $user = EUser::findOrFail($id);
    return view('app.editUserDetils', compact('user'));
}


public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'phone' => 'nullable|string',
        'address' => 'nullable|string',
        'city' => 'nullable|string',
        'state' => 'nullable|string',
        'country' => 'nullable|string',
        'postal_code' => 'nullable|string',
    ], [
        'name.regex' => 'Name can only contain letters, spaces, and periods.',
        'phone.regex' => 'Phone number format is invalid.',
        'email.required' => 'Email is required.',
        'email.email' => 'Enter a valid email address.',
        'profile_picture.image' => 'Profile picture must be an image file.',
        'profile_picture.max' => 'Profile picture size cannot exceed 2MB.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $user = EUser::findOrFail($id);

    // Check if email has changed
    if ($request->email !== $user->email) {
        $emailExists = EUser::where('email', $request->email)->exists();
        if ($emailExists) {
            return redirect()->back()
                ->withErrors(['email' => 'This email is already registered. Please use another.'])
                ->withInput();
        }
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->city = $request->city;
    $user->state = $request->state;
    $user->country = $request->country;
    $user->postal_code = $request->postal_code;

    if ($request->hasFile('profile_picture')) {
        $filename = time() . '.' . $request->profile_picture->extension();
        $request->profile_picture->move(public_path('uploads'), $filename);
        $user->profile_picture = 'uploads/' . $filename;
    }

    $user->save();

    return redirect()->route('user.my-profile')->with('success', 'Profile updated successfully.');
}


}
