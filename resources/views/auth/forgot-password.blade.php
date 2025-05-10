<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .reset-container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background: #007BFF;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background: #0056b3;
        }

        p {
            margin-top: 10px;
            color: #d9534f;
        }
    </style>

</head>

<body>
    <div class="reset-container">
        <h2>Reset Password</h2>

        @if (session('status'))
        <p style="color: green;">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit">Send Reset Link</button>
        </form>

        @error('email')
        <p>{{ $message }}</p>
        @enderror
    </div>
</body>


</html>