@extends('app.layouts.main')
@section('content')
<div class="container">
        <!-- Login Section -->
        <div class="body-left">
            <h2>Registered Customers</h2>
            <p>If you have an account, sign in with your email address.</p>
            <form>
                <label for="email">Email *</label>
                <input type="email" id="email" placeholder="Enter your email" required>

                <label for="password">Password *</label>
                <input type="password" id="password" placeholder="Enter your password" required>

                <div class="options">
                    <input type="checkbox" id="staySignedIn">
                    <label for="staySignedIn">Stay signed in</label>
                    <a href="#" >Forgot Your Password?</a>
                    
                   
                </div>

                <button type="submit" class="btn">Sign In</button>

                <div class="separator">OR</div>

                <button type="button" class="btn google">
                <img src={{ asset('images/google.png') }}> Login with Google
                </button>
            </form>
        </div>

        <!-- Signup Section -->
        <div class="body-right">
            <h2>New Customer?</h2>
            <p>Creating an account has many benefits:</p>
            <ul>
                <li>Check out faster</li>
                <li>Keep more than one address</li>
                <li>Track orders and more</li>
            </ul>
            <button class="btn">Create An Account</button>
        </div>
    </div>

@stop
