<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin Web Profile')</title>
    <link rel="stylesheet" href="{{ secure_asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css">
    <script>
        const API_TOKEN = "{{ session('api_token') }}";
    </script>

</head>
<style>
    body {
        background-color: #f8f9fa;
    }
    .sidebar {
        width: 200px;
        min-height: 100vh;
        background-color: #343a40;
        position: fixed;
        top: 56px;
    }
    .sidebar a {
        color: #fff;
        padding: 10px 15px;
        display: block;
        text-decoration: none;
    }
    .content {
        margin-left: 220px;
        padding: 20px;
    }
    .card {
        border: 0;
        border-radius: 10px;
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm px-3">
        <div class="container">
            <a href="{{ route('admin.dashboard') }}" class="navbar-brand">MyProfile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"></button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Dashboard</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown" aria-labelledby="userDropdown">
                        <li class="dropdown-item-text text-muted"><small>{{ Auth::user()->email }}</small></li>
                        <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item" style="background: none; border: none; width: 100%; text-align: left;">
                                Logout
                            </button>
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="sidebar shadow-sm">
        <h5 class="text-center text-white py-3">Admin Menu</h5>
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">Admin Dashboard</a>
        <a href="{{ route('projects.index') }}" class="list-group-item list-group-item-action">Data Project</a>
        <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action">Data Users</a>
    </div>
    <div class="content p-3 d-flex flex-column">
        <div class="flex-grow-1">
            @yield('content')
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; 2026 Web Profile. All rights reserved.
    </footer>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    @yield('script')
</body>
</html>