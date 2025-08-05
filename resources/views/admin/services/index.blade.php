<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Index Service</title>
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

        .btn-add {
            background: linear-gradient(to right, #3461FF, #2241b0);
            font-weight: 600;
            border: none;
        }

        .btn-add:hover {
            background: linear-gradient(to right, #0032e8, #0f266e);

        }

        .service-container {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            background-color: #fff;
            padding: 20px;
            transition: transform 0.2s;
            height: 220px;
            cursor: pointer;
        }

        .service-container:hover {
            transform: scale(1.02);
        }

        .service-card {
            background: linear-gradient(to right, #3461FF, #2241b0);
            border-radius: 15px;
            padding: 30px;
            color: white;
            text-align: center;
        }

        .close-icon {
            position: absolute;
            top: -5px;
            right: 8px;
            font-size: 28px;
            color: #999;
            cursor: pointer;
        }

        .text-wrap-control {
            word-break: break-word;
            overflow-wrap: break-word;
            text-align: center;
            width: 100%;
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
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-navbar">Back</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <h2 class="text-center fw-semibold">Our Services</h2>
        <p class="text-center text-muted mb-5">Manage and update your company's list of services here.</p>
        @if (session('success'))
            <div class="alert alert-success fade show auto-dismiss" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-end mb-5">
            <a href="{{ route('service.create') }}" class="btn btn-add px-4 py-2 text-white">Add Service</a>
        </div>
        <div class="row justify-content-center g-4">
            @foreach ($services as $service)
                <div class="col-md-4 col-sm-6" onclick="window.location='{{ route('service.read', $service->id) }}'">
                    <div class="service-container position-relative">
                        <form action="{{ route('service.destroy', $service->id) }}" method="POST"
                            class="position-absolute top-0 end-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="close-icon btn btn-link p-0 m-0 text-decoration-none"
                                onclick="event.stopPropagation()">
                                &times;
                            </button>
                        </form>

                        <div class="service-card d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="fas fa-cogs fa-4x mt-3"></i>
                            <p class="fw-semibold fs-6 mt-3 text-wrap-control">
                                {{ \Illuminate\Support\Str::limit($service->title, 25) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
