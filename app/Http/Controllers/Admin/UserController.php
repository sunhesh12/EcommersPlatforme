<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EUser;
use Illuminate\Http\Request;
use App\Models\EUserUser;

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
    return view('admin.users.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ]);

    EUser::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('admin.users')->with('success', 'User created.');
}

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

    return redirect()->route('admin.users')->with('success', 'User deleted.');
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
