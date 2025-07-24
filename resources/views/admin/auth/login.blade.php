<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: url('/assets/images/login/image.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 3rem 2.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 420px;
            min-height: 520px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .avatar-wrapper {
            display: flex;
            justify-content: center;
        }

        .avatar-icon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            color: #fff;
            margin-bottom: 25px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        h3.title {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
            margin-bottom: 2rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 2rem;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.3);
            border: none;
            color: #fff;
            padding-left: 2.5rem;
            height: 54px;
            font-size: 1.05rem;
            font-weight: 500;
        }

        .form-control::placeholder {
            color: #e0e0e0;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.4);
            color: #fff;
            border: none;
            box-shadow: none;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #fff;
            pointer-events: none;
            font-size: 1rem;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #fff;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-login {
            background: linear-gradient(to right, #1e88e5, #42a5f5);
            border: none;
            color: white;
            font-weight: 700;
            padding: 0.85rem;
            font-size: 1.05rem;
            letter-spacing: 0.5px;
            transition: 0.3s ease-in-out;
            border-radius: 10px;
        }

        .btn-login:hover {
            background: linear-gradient(to right, #1565c0, #2196f3);
        }

        .custom-alert {
            background-color: rgba(255, 0, 0, 0.2);
            border-left: 5px solid #ff4444;
            color: #fff;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 576px) {
            .glass-card {
                margin: 0 1rem;
                min-height: 520px;
                padding: 2rem 1.5rem;
            }

            .form-control {
                font-size: 1rem;
                height: 50px;
            }

            .btn-login {
                padding: 0.75rem;
                font-size: 1rem;
            }

            h3.title {
                font-size: 1.5rem;
            }

            .avatar-icon {
                width: 90px;
                height: 90px;
                font-size: 3rem;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="glass-card text-white">
            <div class="avatar-wrapper text-center mb-3">
                <div class="avatar-icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <h3 class="text-center title">Sign In</h3>
            @if ($errors->any())
            <div class="custom-alert">
                <i class="fa fa-triangle-exclamation me-2"></i>
                {{ $errors->first() }}
            </div>
            @endif
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="form-group">
                    <i class="fa fa-envelope input-icon"></i>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" required autofocus>
                </div>
                <div class="form-group">
                    <i class="fa fa-lock input-icon"></i>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword()">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
                <div class="d-grid mt-2">
                    <button type="submit" class="btn btn-login">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const pass = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');
            if (pass.type === 'password') {
                pass.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                pass.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>