@extends('layouts.main')

@section('content')
<div class="loginMainWrapper">
    <div class="loginContent">
        <div class="login">
            <div class="LoginTopic">
                <H1>Login to Your Account</H1>
            </div>
            <div class="LoginTopic">
                <p>Login using social network</p>
            </div>
            <div class="LoginTopic">
                <div class="socialIcon">

                </div>
                <div class="socialIcon">

                </div>
                <div class="socialIcon">

                </div>
            </div>
            <div class="LoginLine">
                <span class="line-text">OR</span>
            </div>
            <form autocomplete="off" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="LoginTopic1">
                    <div class="input-wrapper">
                        <input id="email" type="email" class="@error('email') is-invalid @enderror"
                            name="email" placeholder="Enter your Email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="LoginTopic1">
                    <div class="input-wrapper">
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                </div>

                <!-- <div class="LoginTopic1">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> -->
                <!-- <div class="LoginTopic">
                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="LoginTopic">
                    <button type="submit" class="hiddinButtonlogin"> {{ __('Sign In') }}</button>

                    <!-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif -->
                    <a href="{{Route('register')}}"><button class="hiddinButtonRegistation">Sign Up</button></a>
                </div>
            </form>
            <!-- <div class="LoginTopic">

            </div> -->
        </div>
    </div>
    <div class="loginRegistationSide">
        <div class="MainText">
            <H1>New Here?</H1>
        </div>
        <div class="Text">
            <p>Sign up and discover a great<br>
                amount of new opportunities!</p>
            <br>
            <a href="{{Route('register')}}"><button>Sign Up</button></a>
        </div>
    </div>
</div>

<script>

</script>
@endsection