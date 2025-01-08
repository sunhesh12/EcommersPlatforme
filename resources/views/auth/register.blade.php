@extends('layouts.main')

@section('content')
@extends('layouts.main')

@section('content')
<div class="loginMainWrapper">
    <div class="loginRegistationSide">
        <div class="MainText">
            <H1>Welcome!</H1>
        </div>
        <div class="Text">
            <p>To keep connected with us please<br>
                login with your Personal info</p>
            <br>
            <a href="{{Route('login')}}"><button>Sign In</button></a>
        </div>
    </div>
    <div class="loginContent">
        <div class="login">
            <div class="LoginTopic">
                <H1>Create Acount</H1>
            </div>
            <div class="LoginTopic">
                <p>Create Account using social network</p>
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
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="LoginTopic1">
                    <div class="input-wrapper">
                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your name" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="LoginTopic1">
                    <div class="input-wrapper">
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your Email" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- =============================ferther development area==================== -->
                    <!-- need to add mobile number and address -->

                <!-- <div class="LoginTopic1">
                    <div class="input-wrapper">
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror"
                            name="email" placeholder="Enter your Email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                </div>
                <div class="LoginTopic1">
                    <div class="input-wrapper">
                    <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="current-password">
                    </div>
                </div> -->

                <!-- =============================ferther development area end ================================= -->

                <div class="LoginTopic1">
                    <div class="input-wrapper">

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="LoginTopic1">
                    <div class="input-wrapper">

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter your confirmation password" required autocomplete="new-password">

                    </div>
                </div>

                <div class="LoginTopic">
                    <button type="submit" class="hiddinButtonlogin"> {{ __('Sign Up') }}</button>
                    <a href="{{Route('login')}}"><button class="hiddinButtonRegistation">Sign In</button></a>
                </div>
            </form>
            <!-- <div class="LoginTopic">

            </div> -->
        </div>
    </div>

</div>

<script>

</script>
@endsection
