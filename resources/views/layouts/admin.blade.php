<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .rounded-nav {
        position: sticky;
        top: 0;
        z-index: 999;
        background: rgba(255, 255, 255, 0.25) !important;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .logo {
        width: 50px;
    }

    .btn-navbar {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 6px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-navbar:hover {
        background-color: #0056b3;
    }

    .btn-logout {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 6px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-logout:hover {
        background-color: #bb2d3b;
    }

    body {
        background: #ffffff;
        min-height: 100vh;
        color: #000;
    }
</style>

</head>

<body>
    <nav class="navbar shadow-sm rounded-nav">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <a href="{{ route('home.jpa') }}" class="d-flex align-items-center">
                <img src="{{ asset('assets/images/logo/jpa.png') }}" alt="Logo" class="logo me-2">
            </a>
            <div class="d-flex gap-2">
                {{-- Ganti route ini sesuai kebutuhan halaman --}}
                <a href="{{ route('admin.partners.index') }}" class="btn btn-navbar">Back</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        @yield('content')
    </main>
</body>

</html>
