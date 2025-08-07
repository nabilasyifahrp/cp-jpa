<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e3e3e3;
        }

        .rounded-nav {
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .logo {
            width: 50px;
        }

        .btn-back {
            background-color: transparent;
            border: none;
            color: #6c757d;
            padding: 6px 16px;
            font-weight: 500;
        }

        .btn-back:hover {
            color: #3461FF;
        }

        .btn-logout {
            border-color: #3461FF;
            border-radius: 10px;
            padding: 6px 20px;
            color: #6c757d;
        }

        .btn-logout:hover {
            background-color: #3461FF;
            color: #ffffff;
        }

        .detail-container {
            max-width: 800px;
            margin: 60px auto;
            background: #ffffff;
            padding: 36px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .detail-label {
            font-weight: 600;
            color: #6c757d;
        }

        .product-image {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .btn-back-detail {
            background: linear-gradient(to right, #3461FF, #2241b0);
            border: none;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            padding: 12px;
            margin-top: 30px;
            color: white;
        }

        .btn-back-detail:hover {
            background: linear-gradient(to right, #0032e8, #0f266e);
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            text-decoration: underline;
            color: #0f266e;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-white shadow-sm rounded-nav">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <a href="{{ route('home.jpa') }}">
                <img src="{{ asset('assets/images/logo/jpa.png') }}" alt="Logo" class="logo me-2">
            </a>
            <div class="d-flex gap-2">
                <a href="{{ route('product.index') }}" class="btn btn-back">Back</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="detail-container">
        <h3 class="title">Detail Product</h3>

        <div class="mb-3">
            <span class="detail-label">Title:</span> {{ $product->title }}
        </div>
        <div class="mb-3">
            <span class="detail-label">Description:</span> {{ $product->description }}
        </div>
        <div class="mb-3">
            <span class="detail-label">Image:</span><br>
            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/placeholder.png') }}" alt="Product Image" class="product-image">
        </div>
        <div class="mb-3">
            <span class="detail-label">Type:</span> {{ ucfirst($product->type) }}
        </div>
        <div class="mb-3">
            <span class="detail-label">Category:</span> {{ $product->category->name ?? '-' }}
        </div>

    </div>
</body>

</html>