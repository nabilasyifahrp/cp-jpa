<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #3461FF;
            --primary-dark: #2651d9;
            --primary-light: #5b7cff;
            --secondary: #6c757d;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1f2937;
            --light: #f8fafc;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 50%, #6366f1 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .main-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(52, 97, 255, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(52, 97, 255, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(52, 97, 255, 0.3);
        }

        .admin-details h6 {
            margin: 0;
            color: var(--dark);
            font-weight: 600;
            font-size: 1rem;
        }

        .admin-details p {
            margin: 0;
            color: var(--secondary);
            font-size: 0.85rem;
        }

        .logout-btn {
            background: linear-gradient(135deg, #ff4757 0%, #ff3742 100%);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 71, 87, 0.3);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 71, 87, 0.4);
            color: white;
        }

        .logout-btn:active {
            transform: translateY(0);
        }

        .logout-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .content {
            flex: 1;
            padding: 3rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        .page-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-title h1 {
            color: white;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .page-title p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            font-weight: 300;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2.5rem;
            text-decoration: none;
            color: inherit;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(52, 97, 255, 0.1);
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--card-color) 0%, var(--card-color-light) 100%);
        }

        .dashboard-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(52, 97, 255, 0.2);
            text-decoration: none;
            color: inherit;
        }

        .card-service {
            --card-color: var(--primary);
            --card-color-light: var(--primary-light);
        }

        .card-product {
            --card-color: var(--success);
            --card-color-light: #34d399;
        }

        .card-partner {
            --card-color: var(--danger);
            --card-color-light: #f87171;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .card-icon {
            width: 65px;
            height: 65px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            color: white;
            background: linear-gradient(135deg, var(--card-color) 0%, var(--card-color-light) 100%);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-info h3 {
            margin: 0;
            color: var(--dark);
            font-size: 1.4rem;
            font-weight: 600;
        }

        .card-info p {
            margin: 0;
            color: var(--secondary);
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .card-arrow {
            color: var(--card-color);
            font-size: 1.3rem;
            transition: transform 0.3s ease;
            margin-left: auto;
        }

        .dashboard-card:hover .card-arrow {
            transform: translateX(8px);
        }

        .card-total {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 2px solid rgba(0, 0, 0, 0.05);
        }

        .total-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--card-color);
            display: block;
            margin-bottom: 0.5rem;
        }

        .total-label {
            font-size: 0.9rem;
            color: var(--secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .header-content {
                padding: 0 1rem;
            }

            .admin-info {
                gap: 0.5rem;
            }

            .admin-details {
                display: none;
            }

            .content {
                padding: 2rem 1rem;
            }

            .page-title h1 {
                font-size: 2.2rem;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .dashboard-card {
                padding: 2rem;
            }

            .logout-btn {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }

            .card-icon {
                width: 55px;
                height: 55px;
                font-size: 1.4rem;
            }

            .total-number {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .dashboard-card {
                padding: 1.5rem;
            }

            .card-header {
                margin-bottom: 1.5rem;
            }

            .page-title h1 {
                font-size: 1.8rem;
            }
        }

        .fade-in {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        .fade-in:nth-child(1) {
            animation-delay: 0.1s;
        }

        .fade-in:nth-child(2) {
            animation-delay: 0.2s;
        }

        .fade-in:nth-child(3) {
            animation-delay: 0.3s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="main-container">
        <header class="header">
            <div class="header-content">
                <div class="admin-info">
                    <div class="admin-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="admin-details">
                        <h6>Administrator</h6>
                        <p>System Manager</p>
                    </div>
                </div>

                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-power-off"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </header>

        <main class="content">
            <div class="page-title">
                <h1>Admin Dashboard</h1>
                <p>Manage business operations efficiently</p>
            </div>

            <div class="dashboard-grid">
                <a href="{{ route('service.index') }}" class="dashboard-card card-service fade-in">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="card-info">
                            <h3>Service Management</h3>
                            <p>Manage all services and configurations</p>
                        </div>
                        <i class="fas fa-arrow-right card-arrow"></i>
                    </div>
                    <div class="card-total">
                        <span class="total-number">{{ $totalServices }}</span>
                        <span class="total-label">Total Services</span>
                    </div>
                </a>

                <a href="#" class="dashboard-card card-product fade-in">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <div class="card-info">
                            <h3>Product Management</h3>
                            <p>Control industrial automation products</p>
                        </div>
                        <i class="fas fa-arrow-right card-arrow"></i>
                    </div>
                    <div class="card-total">
                        <span class="total-number">168</span>
                        <span class="total-label">Total Products</span>
                    </div>
                </a>

                <a href="#" class="dashboard-card card-partner fade-in">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="card-info">
                            <h3>Partner<br>Management</h3>
                            <p>Manage business partnerships and collaborations</p>
                        </div>
                        <i class="fas fa-arrow-right card-arrow"></i>
                    </div>
                    <div class="card-total">
                        <span class="total-number">23</span>
                        <span class="total-label">Total Partners</span>
                    </div>
                </a>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('logout-form').addEventListener('submit', function(e) {
            const btn = this.querySelector('.logout-btn');
            const icon = btn.querySelector('i');
            const text = btn.querySelector('span');

            icon.className = 'fas fa-spinner fa-spin';
            text.textContent = 'Logging out...';
            btn.disabled = true;

        });

        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.dashboard-card');

            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });

                card.addEventListener('mousedown', function() {
                    this.style.transform = 'translateY(-5px) scale(1.01)';
                });

                card.addEventListener('mouseup', function() {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                });
            });
        });
    </script>
</body>

</html>