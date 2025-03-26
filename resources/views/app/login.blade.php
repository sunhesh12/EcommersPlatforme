@extends('app.layouts.main')
@section('content')
<div class="navigation">
<nav>
    <a href="#">Home</a> › <span class = "registernav">Register</span>
 </nav>
</div>

<div class="loginContainer">
        <!-- Login Section -->
        <div class="body-left">
            <h2 class= "registertext">Registered Customers</h2>
            <p class = "loginpara">If you have an account, sign in with your email address.</p>
            <form>
                <div class="loginlabel">
                   <label for="email">Email *</label>
                </div>
                <div class="logininput">
                    <input type="email" id="email" placeholder="Enter your email" required>
                </div>

                <div class="loginlabel">
                    <label for="password">Password *</label>
                </div>
                <div class="logininput">
                     <input type="password" id="password" placeholder="Enter your password" required>
                </div>
               

                <div class="options">
                    <div>
                           <input type="checkbox" id="staySignedIn">
                    </div>
                    <div class="loginlabel">
                            <label for="staySignedIn">Stay signed in</label>
                    </div>
                    <a href="#" class="fogotpassword">Forgot Your Password?</a>
                </div>

                <button type="submit" class="loginbtn">Sign In</button>

                <div class="separator">OR</div>

                <button type="button" class="loginbtn google">
                <img src={{ asset('images/google.png') }}> Login with Google
                </button>
            </form>
        </div>

        <!-- Signup Section -->
        <div class="body-right">
            <h2 class ="registertext">New Customer?</h2>
            <p class= "loginpara" >Creating an account has many benefits:</p>
            <ul class = "loginlist">
                <li>Check out faster</li>
                <li>Keep more than one address</li>
                <li>Track orders and more</li>
            </ul>
            <button class="loginbtn">Create An Account</button>
        </div>
    </div>

@stop
