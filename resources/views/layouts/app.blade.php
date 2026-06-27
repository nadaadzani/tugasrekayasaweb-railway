<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Web Profile')</title>
    <link rel="stylesheet" href="{{ secure_asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a href="/" class="navbar-brand">Web Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"></button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="/projects" class="nav-link">Projects</a></li>
                <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="/admin" class="nav-link ml-12">Admin</a></li>
            </ul>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; 2026 Web Profile. All rights reserved.
    </footer>
<script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>