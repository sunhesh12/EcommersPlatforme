@extends('app.layouts.main')
@section('content')
<div class="navigation">
<nav>
            <a href="#">Home</a> › <span>Register</span>
        </nav>
        
</div>
<div class="container">
        
        <div class="register-box">
            <h2><span class="highlighttext">Create</span > Your Account</h2>
            
            <form>
                <input type="text" placeholder="Enter your name" required>
                <input type="email" placeholder="Enter your Email" required>
                <input type="password" placeholder="Create Password" required>
                <input type="password" placeholder="Confirm password" required>

                <div class="terms">
                    <input type="checkbox" id="terms">
                    <label for="terms">I accept all terms and conditions</label>
                </div>

                <button type="submit">SIGN UP</button>
            </form>

            <p class="login-link">Already have an account? <a href="#">Login now</a></p>
        </div>
    </div>

@stop