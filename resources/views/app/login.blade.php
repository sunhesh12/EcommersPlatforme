@extends('app.layouts.main')
@section('content')
<div class="navigation">
    <nav>
        <a href="#">Home</a> › <span>Register</span>
    </nav>
</div>

<div class="loginContainer">
    <!-- Login Section -->
    <div class="body-left">
        <h2>Registered Customers</h2>
        <p>If you have an account, sign in with your email address.</p>
        <form action="{{ route('loginn.post') }}" method="POST">
            @csrf
            <input type="hidden" name="from" value="{{ request('from', 'home') }}">
            <input type="hidden" name="product_id" value="{{ request('product_id') }}">

            <label for="email">Email *</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <div class="password-field">
                <label for="password">Password *</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <button type="button" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer;">
                        👁
                    </button>
                </div>
            </div>


            <div class="options">
                <input type="checkbox" id="staySignedIn" name="remember">
                <label for="staySignedIn">Stay signed in</label>
                <a href="{{ route('password.request') }}">Forgot Your Password?</a>
            </div>
            @if($errors->any())
            <div class="login-error">
                <ul>
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <button type="submit" class="btn">Sign In</button>

            <div class="separator">OR</div>

            <button type="button" class="btn google">
                <img src="{{ asset('images/google.png') }}"> Login with Google
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

        <a href="{{ route('user.registerr') }}">
            <button class="btn">Create An Account</button>
        </a>
    </div>
</div>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
        this.textContent = isPassword ? '🙈' : '👁';
    });
</script>

@stop