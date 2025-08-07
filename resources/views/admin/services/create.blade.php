<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

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

        .form-container {
            max-width: 800px;
            margin: 60px auto;
            background: #fdfdfd;
            padding: 36px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #6c757d;
        }

        .btn-add {
            background: linear-gradient(to right, #3461FF, #2241b0);
            border: none;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            color: #fdfdfd;
        }

        .btn-add:hover {
            background: linear-gradient(to right, #0032e8, #0f266e);
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            text-decoration: underline;
            color: #0f266e;
        }

        .top-right-buttons {
            display: flex;
            gap: 10px;
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


    <div class="form-container">
        <h3 class="title">Add Service</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('service.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <button type="submit" class="btn btn-add">Add</button>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                    'blockQuote', 'insertTable', 'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
