<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Action Not Allowed</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Optional if you're using Tailwind/Bootstrap --}}
    <style>
        body {
            font-family: sans-serif;
            background: #fefefe;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #444;
        }
        .error-box {
            border: 1px solid #ccc;
            padding: 2rem;
            text-align: center;
            background: #fff;
            box-shadow: 0 0 10px #ddd;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="error-box">
        <h2>⚠️ Access Denied</h2>
        <p>{{ $message ?? 'You are not allowed to access this page.' }}</p>
        <a href="{{ url()->previous() }}" style="color: blue;">Go Back</a>
    </div>
</body>
</html>
