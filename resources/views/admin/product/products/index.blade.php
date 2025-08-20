<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .rounded-nav {
            position: sticky;
            top: 0;
            z-index: 999;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
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
        }

        .btn-logout {
            background-color: transparent;
            border: 2px solid #2241b0;
            border-radius: 10px;
            padding: 6px 20px;
            color: #000000;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #3461FF;
            color: white;
        }

        .btn-add {
            background: linear-gradient(to right, #3461FF, #2241b0);
            font-weight: 600;
            border: none;
        }

        .btn-add:hover {
            background: linear-gradient(to right, #0032e8, #0f266e);
        }

        .product-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .product-card {
            border: 1px solid #e3ecff;
            border-radius: 12px;
            padding: 20px;
            background-color: #f0f5ff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }

        .product-card p {
            word-wrap: break-word;
            white-space: normal;
            overflow-wrap: break-word;
        }

        .product-card:hover {
            transform: scale(1.01);
        }

        .product-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        .btn-icon {
            background: none;
            border: none;
            margin-right: 10px;
            font-size: 18px;
        }

        .btn-icon.edit {
            color: #3461FF;
        }

        .btn-icon.delete {
            color: #dc3545;
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
                <a href="{{ route('product.management') }}" class="btn btn-navbar">Back</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center fw-semibold">Product List</h2>
        <p class="text-center text-muted mb-4">Manage and update the list of products here.</p>

        @if (session('success'))
        <div class="alert alert-success text-center auto-dismiss">
            {{ session('success') }}
        </div>
        @endif

        <div class="text-end mb-4">
            <a href="{{ route('product.create') }}" class="btn btn-add text-white px-4 py-2">Create New</a>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
            <div class="col-md-4">
                <a href="{{ route('product.show', $product->id) }}" class="product-link">
                    <div class="product-card">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/placeholder.png') }}" class="product-image mb-3" alt="Product Image">
                        <h5 class="fw-semibold">{{ $product->title }}</h5>
                        <p class="text-muted">{{ substr(strip_tags($product->description), 0, 100) }}{{ strlen($product->description) > 100 ? '...' : '' }}</p>
                        <div>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn-icon edit" title="Edit">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn-icon delete" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            @endforelse
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alert = document.querySelector('.auto-dismiss');
            if (alert) {
                setTimeout(() => {
                    alert.classList.add('fade');
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 3000);
            }
        });
    </script>
</body>

</html>