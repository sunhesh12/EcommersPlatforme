<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout4.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>

</head>

<body class="font-sans antialiased">
    <div class="mainLayout">

        <x-navigation></x-navigation>

        <div>
            <main>
                @yield('content')
            </main>
        </div>

        <x-footer></x-footer>

    </div>

</body>

</html>