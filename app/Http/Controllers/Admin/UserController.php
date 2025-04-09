<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EUser;
use Illuminate\Http\Request;
use App\Models\EUserUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $urlForUserManagement = 'admin.usermanagement';

    public function index()
    {
        $users = EUser::all(); // or paginate if needed
        return view($this->urlForUserManagement, compact('users'));
    }

public function create()
{
    return view('admin.addUser');
}

public function store(Request $request)
{
    // Basic validation rules
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|string|min:6|confirmed',
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'phone' => 'nullable|string',
        'address' => 'nullable|string',
        'city' => 'nullable|string',
        'state' => 'nullable|string',
        'country' => 'nullable|string',
        'postal_code' => 'nullable|string',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Manually check if the email already exists in EUser table
    if (EUser::where('email', $request->email)->exists()) {
        return redirect()->back()
            ->withErrors(['email' => 'This email is already registered. Please use a different one.'])
            ->withInput();
    }

    // Create new user
    $user = new EUser();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->city = $request->city;
    $user->state = $request->state;
    $user->country = $request->country;
    $user->postal_code = $request->postal_code;

    // Profile picture upload
    if ($request->hasFile('profile_picture')) {
        $filename = time() . '.' . $request->profile_picture->extension();
        $request->profile_picture->move(public_path('uploads'), $filename);
        $user->profile_picture = 'uploads/' . $filename;
    }

    $user->save();

    // Redirect to index page with success
    return redirect()->route('admin.users.index')->with('success', 'User added successfully.');
}

// public function store(Request $request)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email',
//         'password' => 'required|string|min:6|confirmed',
//         'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
//         'phone' => 'nullable|string',
//         'address' => 'nullable|string',
//         'city' => 'nullable|string',
//         'state' => 'nullable|string',
//         'country' => 'nullable|string',
//         'postal_code' => 'nullable|string',
//     ], [
//         'email.unique' => 'This email is already registered. Please use a different one.',
//         // 'password.confirmed' => 'The password confirmation does not match.',
//     ]);

//     $user = new EUser();
//     $user->name = $request->name;
//     $user->email = $request->email;
//     $user->password = Hash::make($request->password);
//     $user->phone = $request->phone;
//     $user->address = $request->address;
//     $user->city = $request->city;
//     $user->state = $request->state;
//     $user->country = $request->country;
//     $user->postal_code = $request->postal_code;

//     if ($request->hasFile('profile_picture')) {
//         $filename = time() . '.' . $request->profile_picture->extension();
//         $request->profile_picture->move(public_path('uploads'), $filename);
//         $user->profile_picture = 'uploads/' . $filename;
//     }

//     $user->save();

//     return redirect()->route('admin.users.create')->with('success', 'User added successfully.');
// }

// public function store(Request $request)
// {
//     $request->validate([
//         'name' => 'required',
//         'email' => 'required|email|unique:users',
//         'password' => 'required|min:6'
//     ]);

//     EUser::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => bcrypt($request->password),
//     ]);

//     return redirect()->route('admin.users')->with('success', 'User created.');
// }

public function edit($id)
{
    $user = EUser::findOrFail($id);
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = EUser::findOrFail($id);

    $user->update($request->only(['name', 'email']));

    return redirect()->route('admin.users')->with('success', 'User updated.');
}

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
