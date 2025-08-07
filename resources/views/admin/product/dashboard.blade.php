<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3461FF;
            --primary-dark: #2851e6;
            --primary-light: #5a7bff;
        }

        body {
            background: linear-gradient(to right, #3461FF, #1837A0);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        .main-container {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .content-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 750px;
        }

        .header-section {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .header-section h1 {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }

        .header-section p {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 0;
        }

        .management-card {
            background: white;
            border-radius: 15px;
            padding: 2.2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(52, 97, 255, 0.1);
            border: 2px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .management-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary-color);
            box-shadow: 0 20px 40px rgba(52, 97, 255, 0.2);
            text-decoration: none;
            color: inherit;
        }

        .management-card .icon {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.3rem;
            color: white;
            font-size: 1.9rem;
        }

        .management-card h3 {
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.4rem;
        }

        .management-card p {
            color: #6c757d;
            margin-bottom: 0;
            line-height: 1.6;
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .content-card {
                padding: 2rem;
                margin: 0 10px;
            }

            .header-section {
                margin-bottom: 2rem;
            }

            .header-section h1 {
                font-size: 1.9rem;
            }

            .management-card {
                padding: 1.8rem;
                margin-bottom: 1.2rem;
            }

            .management-card .icon {
                width: 65px;
                height: 65px;
                font-size: 1.6rem;
            }

            .main-container {
                padding: 15px;
            }
        }

        .category-card {
            background: linear-gradient(135deg, #28a745, #20c997);
        }

        .product-card {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        }

        .category-management h3 {
            color: #28a745;
        }

        .product-management h3 {
            color: var(--primary-color);
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

    <div class="main-container">
        <div class="content-card">
            <div class="header-section">
                <h1><i class="fas fa-box-open me-3"></i>Product Management</h1>
                <p>Choose what you want to manage</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <a href="{{ route('category.index') }}" class="management-card category-management">
                        <div class="icon category-card">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h3>Category Management</h3>
                        <p>Organize and manage product categories. Create, edit, and organize product classifications.</p>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="{{ route('product.index') }}" class="management-card product-management">
                        <div class="icon product-card">
                            <i class="fas fa-box"></i>
                        </div>
                        <h3>Product Management</h3>
                        <p>Manage your product inventory. Add new products, update existing ones, and track stock levels.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.management-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>

</html>