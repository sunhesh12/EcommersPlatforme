<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.bunny.net"> -->
    <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
<!-- <<<<<<< HEAD -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/admin-user-form.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- <<<<<<< HEAD -->
<!-- ======= -->
    <!-- <link rel="stylesheet" href="{{ asset('css/register.css') }}"> -->
<!-- >>>>>>> origin/registerPageDevelopment -->
<!-- ======= -->
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
<!-- >>>>>>> origin/aboutpagedevelopment -->

    <link rel="stylesheet" href="{{ asset('css/productDetails.css') }}">

    <!-- temmpary comment css file as homepage css is not working properly -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
   

<!-- ======= -->
    <!-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/checkout1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout4.css') }}">
<!-- >>>>>>> origin/checkoutDevelopment -->

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