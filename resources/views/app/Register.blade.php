@extends('app.layouts.main')

@section('content')
<!-- <div class="navigation">
    <nav>
        <a href="{{ route('home') }}">Home</a> › <span>Register</span>
    </nav>
</div> -->

<div class="container-register">
    <div class="register-box">
        <h2><span class="highlighttext">Create</span> Your Account</h2>


        <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="email" name="email" placeholder="Enter your Email" required>
            <input type="password" name="password" placeholder="Create Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

            <input type="file" name="profile_picture">
            <input type="text" name="phone" placeholder="Phone">
            <input type="text" name="address" placeholder="Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State">j
            <input type="text" name="country" placeholder="Country">
            <input type="text" name="postal_code" placeholder="Postal Code">

            <div>
                <input type="checkbox" name="accepted_terms" value="1" required>
                <label for="accepted_terms">I accept all terms and conditions</label>
            </div>

            <button type="submit">SIGN UP</button>
        </form>


        <!-- <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
            <input type="email" name="email" placeholder="Enter your Email" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Create Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

            <div class="terms">
                <input type="checkbox" id="terms" name="accepted_terms" required>
                <label for="terms">I accept all terms and conditions</label>
            </div>

            <button type="submit">SIGN UP</button>
        </form> -->

        <p class="login-link">Already have an account? <a href="{{ route('user.loginn') }}">Login now</a></p>
    </div>
</div>
@stop