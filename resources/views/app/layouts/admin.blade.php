<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-user-form.css') }}">
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebarAdmin">
        <h2>Admin</h2>
        <nav>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.users.index') }}">Users Management</a>
            <a href="{{ route('admin.brands.index') }}">Brand Management</a>
            <a href="{{ route('admin.products.index') }}">Product Management</a>
            <a href="{{ route('admin.users.index') }}">Order Management</a>
            <a href="{{ route('home') }}">User View</a>
            <!-- <a href="#">Orders</a> -->
            <a href="#">Settings</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content-admin">
        @yield('content')
    </main>

</body>
</html>
