<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e3e3e3;
        }

        .rounded-nav {
            position: sticky;
            top: 0;
            z-index: 999;
            background: rgba(255, 255, 255, 0.25);
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
            background-color: transparent;
            border: none;
            color: #000000;
            padding: 6px 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            transform: scale(1);
        }

        .btn-navbar:hover {
            transform: scale(1.05);
        }

        .btn-logout {
            background-color: transparent;
            border: 2px solid #2241b0;
            border-radius: 10px;
            padding: 6px 20px;
            color: #000000;
            font-weight: 500;
            text-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            text-shadow: none;
            transform: scale(1);
        }

        .btn-logout:hover {
            background-color: #3461FF;
            transform: scale(1.05);
        }

        .title {
            color: #0a2c6b;
        }

        .border-bottom-custom {
            border-bottom: 3px solid #001f3f;
        }


        .icon-button {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #0f266e;
            color: #fdfdfd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: none;
        }

        .icon-button:hover {
            background-color: #0a2c6b;
        }

        .break-word {
            word-break: break-word;
            overflow-wrap: break-word;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light shadow-sm rounded-nav">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <a href="{{ route('home.jpa') }}" class="d-flex align-items-center">
                <img src="{{ asset('assets/images/logo/jpa.png') }}" alt="Logo" class="logo me-2">
            </a>
            <div class="d-flex gap-2">
                <a href="{{ route('service.index') }}" class="btn btn-navbar">Back</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="py-5">
            @if (session('success'))
                <div class="alert alert-success fade show auto-dismiss" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="title text-center pb-2 mb-5 break-word border-bottom-custom">{{ $service->title }}</h1>
            <p class="text-justify small">{!! $service->description !!}</p>
        </div>

        <a href="{{ route('service.edit', $service->id) }}" class="icon-button" title="Edit">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-pencil" viewBox="0 0 16 16">
                <path
                    d="M12.854.146a.5.5 0 0 0-.708 0L10.5 1.793 14.207 5.5l1.646-1.646a.5.5 0 0 0 0-.708l-3-3zm-1.707 2.561L1 12.854V15h2.146l9.146-9.146-1.146-1.147z" />
            </svg>
        </a>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alert = document.querySelector('.auto-dismiss');
        if (alert) {
            setTimeout(() => {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => {
                    alert.remove();
                }, 500);
            }, 3000);
        }
    });
</script>

</html>
