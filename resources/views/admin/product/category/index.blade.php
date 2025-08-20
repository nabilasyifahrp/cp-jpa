<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Category List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
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

        .table thead th {
            background-color: #005eff;
            color: white;
            text-align: center;
            vertical-align: middle;
        }

        .table tbody td {
            vertical-align: middle;
            text-align: center;
        }

        .action-buttons i {
            font-size: 18px;
        }

        .action-buttons a,
        .action-buttons button {
            border: none;
            background: transparent;
            margin: 0 5px;
            padding: 0;
        }

        .action-buttons .edit-icon {
            color: #0d6efd;
        }

        .action-buttons .delete-icon {
            color: #dc3545;
        }

        .table-hover tbody tr:hover {
            background-color: #f2f6ff;
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
        <h2 class="text-center fw-semibold">Category List</h2>
        <p class="text-center text-muted mb-4">Manage and update the list of categories here.</p>

        @if (session('success'))
        <div class="alert alert-success auto-dismiss text-center">
            {{ session('success') }}
        </div>
        @endif

        <div class="text-end mb-4">
            <a href="{{ route('category.create') }}" class="btn btn-add text-white px-4 py-2">Create New</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('category.edit', $category->id) }}" title="Edit">
                                <i class="fas fa-pen-to-square edit-icon"></i>
                            </a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this category?')" title="Delete">
                                    <i class="fas fa-trash delete-icon"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($categories->isEmpty())
                    <tr>
                        <td colspan="3">No categories found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

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
</body>

</html>