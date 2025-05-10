<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\PasswordChangedNotification; // We'll create this Mailable

class changePasswordController extends Controller
{


    public function showChangePasswordForm()
    {
        return view('user.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        // ✅ Send notification email
        Mail::to($user->email)->send(new PasswordChangedNotification($user));

        return back()->with('success', 'Password updated successfully. If this wasn’t you, check your email.');
    }
}
