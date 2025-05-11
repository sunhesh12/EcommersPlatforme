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
            <input type="email" id="email" name="email" placeholder="Enter your email" autocomplete="new-password" required>

            <div class="password-field">
                <label for="password">Password *</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" autocomplete="new-password" placeholder="Enter your password" required>
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

            @if (session('success'))
            <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
            @endif

            <button type="submit" class="btn">Sign In</button>

            <div class="separator">OR</div>

            <button type="button" class="btn google">
                <img src="{{ asset('images/google.png') }}"> Login with Google
            </button>
        </form>
        @if (session('terms_popup'))
        <div id="terms-popup" style=" display: flex; flex-direction: column; justify-content: center; align-items: center; background: #fff3cd; border: 1px solid #ffeeba; padding: 15px; margin-bottom: 20px; margin-top: 15px;">
            <p style="color: #856404;">You must accept the terms and conditions to continue.</p>
            <form method="POST" action="{{ route('accept.terms') }}">
                @csrf
                <button type="submit" style="padding: 6px 12px; background-color: #28a745; color: white; border: none; border-radius: 4px;">
                    Accept Terms & Continue
                </button>
            </form>
        </div>
        @endif
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
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
        this.textContent = isPassword ? '🙈' : '👁';
    });
</script>

@stop