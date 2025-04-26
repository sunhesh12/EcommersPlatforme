<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    

}
