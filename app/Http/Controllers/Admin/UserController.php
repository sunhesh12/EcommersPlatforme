<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $urlForUserManagement = 'admin.users.usermanagement';

    public function index()
    {
        $users = EUser::all(); // or paginate if needed
        return view($this->urlForUserManagement, compact('users'));
    }

public function create()
{
    return view('admin.users.addUser');
}


public function store(Request $request)
{
    // Validate input securely
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\.]+$/'],
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'profile_picture' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        'phone' => ['nullable', 'regex:/^\+?[0-9\-]{7,15}$/'],
        'address' => ['nullable', 'string', 'max:255'],
        'city' => ['nullable', 'string', 'max:100'],
        'state' => ['nullable', 'string', 'max:100'],
        'country' => ['nullable', 'string', 'max:100'],
        'postal_code' => ['nullable', 'string', 'max:20'],
    ], [
        'name.regex' => 'Name can only contain letters, spaces, and periods.',
        'phone.regex' => 'Phone number format is invalid.',
        'email.required' => 'Email is required.',
        'email.email' => 'Enter a valid email address.',
        'password.confirmed' => 'Password confirmation does not match.',
        'profile_picture.image' => 'Profile picture must be an image file.',
        'profile_picture.max' => 'Profile picture size cannot exceed 2MB.',
    ]);

    // Redirect back with validation errors
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Manually check for duplicate email
    if (EUser::where('email', $request->email)->exists()) {
        return redirect()->back()
            ->withErrors(['email' => 'This email is already registered. Please use another.'])
            ->withInput();
    }

    // Securely create new user
    $user = new EUser();
    $user->name = strip_tags($request->name);
    $user->email = strip_tags($request->email);
    $user->password = Hash::make($request->password); // secure hashing
    $user->phone = strip_tags($request->phone);
    $user->address = strip_tags($request->address);
    $user->city = strip_tags($request->city);
    $user->state = strip_tags($request->state);
    $user->country = strip_tags($request->country);
    $user->postal_code = strip_tags($request->postal_code);

    // Handle profile picture securely
    if ($request->hasFile('profile_picture')) {
        $filename = time() . '.' . $request->profile_picture->extension();
        $request->profile_picture->move(public_path('uploads'), $filename);
        $user->profile_picture = 'uploads/' . $filename;
    }

    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'User added successfully.');
}


public function edit($id)
{
    $user = EUser::findOrFail($id);
    return view('admin.users.editUserDetils', compact('user'));
}


public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(),[
        'name' => 'required|string|max:255',
        'is_admin' => 'required|in:0,1',
        'email' => 'required|email|unique:users,email,' . $id,
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'phone' => 'nullable|string',
        'address' => 'nullable|string',
        'city' => 'nullable|string',
        'state' => 'nullable|string',
        'country' => 'nullable|string',
        'postal_code' => 'nullable|string',
    ],[
        'name.regex' => 'Name can only contain letters, spaces, and periods.',
        'phone.regex' => 'Phone number format is invalid.',
        'email.required' => 'Email is required.',
        'email.email' => 'Enter a valid email address.',
        'profile_picture.image' => 'Profile picture must be an image file.',
        'profile_picture.max' => 'Profile picture size cannot exceed 2MB.',
    ]);

    // Redirect back with validation errors
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Manually check for duplicate email
    // if (EUser::where('email', $request->email)->exists()) {
    //     return redirect()->back()
    //         ->withErrors(['email' => 'This email is already registered. Please use another.'])
    //         ->withInput();
    // }

    $user = EUser::findOrFail($id);
    $user->name = $request->name;
    $user->is_admin = $request->is_admin;
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

    return  $this->index()->with('success', 'User updated successfully.');
}

//editUserDetils

public function destroy($id)
{
    $user = EUser::findOrFail($id);
    $user->delete();

    return $this->index()->with('success', 'User deleted.');
}

public function block($id)
{
    $user = EUser::findOrFail($id);
    $user->is_blocked = true;
    $user->save();

    // return redirect()->view('admin.dashboard')->with('success', 'User blocked.');
    return $this->index()->with('success', 'User blocked.');

}

public function unblock($id)
{
    $user = EUser::findOrFail($id);
    $user->is_blocked = false;
    $user->save();

    return $this->index()->with('success', 'User unblocked.');
}

}
