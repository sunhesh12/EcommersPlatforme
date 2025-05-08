<!DOCTYPE html>
<html>
<head><title>Forgot Password</title></head>
<body>
    <h2>Reset Password</h2>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send Reset Link</button>
    </form>

    @error('email')
        <p>{{ $message }}</p>
    @enderror
</body>
</html>
