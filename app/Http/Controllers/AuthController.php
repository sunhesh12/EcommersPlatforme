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
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email address.',
            'password.required' => 'Password is required.',
        ]);

        // Check user existence
        $user = EUser::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No account found with this email.'])->withInput();
        }

        // Check if user is blocked
        if ($user->is_blocked) {
            return back()->withErrors(['email' => 'Your account is blocked. Please contact support.'])->withInput();
        }
        if ($user->accepted_terms == 0) {
            session(['pending_user_id' => $user->id]);
            Auth::logout(); // Optional: logout until accepted
            session()->put('terms_popup', true);
            return redirect()->back();
        }

        // Check password
        if (!Hash::check($request->password, $user->password)) {
            // Track failed attempts
            $user->login_attempts = $user->login_attempts + 1;
            $user->save();

            $remaining = 5 - $user->login_attempts;

            if ($user->login_attempts >= 5) {
                $user->is_blocked = true;
                $user->save();
                // Optionally send email notification here
                return back()->withErrors(['email' => 'Your account is now blocked due to multiple failed login attempts.'])->withInput();
            }

            $message = 'Incorrect password.';
            if ($user->login_attempts >= 3) {
                $message .= ' You have ' . $remaining . ' attempt(s) left before your account is blocked.';
            }

            return back()->withErrors(['password' => $message])->withInput();
        }

        // Reset attempts on successful login
        $user->login_attempts = 0;
        $user->save();

        // Login and session
        Auth::login($user);
        session(['user_id' => $user->id]);

        // Redirect
        // Redirect based on role
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
        }

        return redirect()->route('home')->with('success', 'Login successful!');
    }

    // public function login(Request $request)
    // {
    //     // Validate input
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ], [
    //         'email.required' => 'Email is required.',
    //         'email.email' => 'Enter a valid email address.',
    //         'password.required' => 'Password is required.',
    //     ]);

    //     // Check user existence
    //     $user = EUser::where('email', $request->email)->first();

    //     if (!$user) {
    //         return back()->withErrors(['email' => 'No account found with this email.'])->withInput();
    //     }

    //     // Check if user is blocked
    //     if ($user->is_blocked) {
    //         // return redirect()->route('user.loginn')->with('error', 'Your account is blocked. Please contact support.');
    //         return back()->withErrors(['Email' => 'Your account is blocked. Please contact support.'])->withInput();
    //     }

    //     // Validate password
    //     if (!Hash::check($request->password, $user->password)) {
    //         return back()->withErrors(['password' => 'Incorrect password.'])->withInput();
    //     }

    //     // Login user manually
    //     Auth::login($user);

    //     // Store user_id in session
    //     session(['user_id' => $user->id]);

    //     // Redirect based on role
    //     if ($user->is_admin) {
    //         return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
    //     }

    //     return redirect()->route('home')->with('success', 'Login successful!');
    // }
    public function acceptTerms(Request $request)
    {
        $userId = session('pending_user_id');
    
        if (!$userId) {
            return redirect()->back()->withErrors(['email' =>  'Session expired. Please login again.'])->withInput();
        }
    
        $user = EUser::find($userId);
    
        if ($user) {
            $user->accepted_terms = 1;
            $user->save();
    
            // Clear session flag
            session()->forget('terms_popup');
            session()->forget('pending_user_id');
    
            return redirect()->back()->with('success', 'Terms accepted. Please login again.')->withInput();
        }
    
        return redirect()->back()->withErrors(['email'=> 'User not found.'])->withInput();
    }
    
    // public function acceptTerms(Request $request)
    // {
    //     $userId = session('pending_user_id');
    //     if ($userId) {
    //         $user = EUser::find($userId);
    //         if ($user) {
    //             $user->accepted_terms = 1;
    //             $user->save();
    //             if ($user instanceof EUser) {
    //                 Auth::login($user); // Log the user back in
    //             } else {
    //                 return redirect()->route('loginn')->with('error', 'Invalid user instance. Please log in again.');
    //             }
    //             session()->forget('pending_user_id');
    //             return redirect()->route('home')->with('success', 'Terms accepted. Welcome!');
    //         }
    //     }

    //     return redirect()->route('loginn')->with('error', 'User session expired. Please log in again.');
    // }

    public function logout()
    {
        session()->forget('checkout');
        Auth::logout(); // Properly log out the user
        return redirect('/')->with('success', 'Logged out successfully');
        
        

    }
}
