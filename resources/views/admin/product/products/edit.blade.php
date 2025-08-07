<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
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

        .form-container {
            max-width: 800px;
            margin: 60px auto;
            background: #ffffff;
            padding: 36px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #6c757d;
        }

        .btn-update {
            background: linear-gradient(to right, #3461FF, #2241b0);
            border: none;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            padding: 12px;
            margin-top: 20px;
        }

        .btn-update:hover {
            background: linear-gradient(to right, #0032e8, #0f266e);
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            text-decoration: underline;
            color: #0f266e;
        }

        .image-preview {
            width: 150px;
            border-radius: 10px;
            margin-bottom: 12px;
            object-fit: cover;
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

    <div class="form-container">
        <h3 class="title">Edit Product</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $product->title }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label><br>
                <img id="image-preview" src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="image-preview">
                <input type="file" name="image" class="form-control mt-2" onchange="previewImage(event)">
            </div>


            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-update text-white">Update</button>
        </form>
    </div>
</body>

<script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('image-preview');
            preview.src = reader.result;
        }
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


</html>