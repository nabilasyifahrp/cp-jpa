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

        .login-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            padding: 0 8%;
            gap: 5%;
        }

        .welcome-text {
            color: #fff;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            position: relative;
            min-width: 350px;
            margin-right: 60px;
        }

        .welcome-text .line-1 {
            font-size: 5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: -5px;
        }

        .welcome-text .line-2 {
            font-size: 5rem;
            font-weight: 800;
            padding-left: 100px;
        }

        .welcome-text .underline {
            margin-top: 10px;
            margin-left: 100px;
            width: 240px;
            height: 6px;
            background: linear-gradient(to right, #ffffff, #3461FF);
            border-radius: 5px;
            animation: slide 2s ease-in-out infinite alternate;
        }

        @keyframes slide {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(20px);
            }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 360px;
            min-height: 480px;
            color: #000;

        }

        .avatar-wrapper {
            display: flex;
            justify-content: center;
        }

        .avatar-icon {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.7rem;
            color: #000;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h3.title {
            text-align: center;
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.6);
            border: none;
            color: #000;
            padding-left: 2.5rem;
            height: 50px;
            font-size: 1rem;
        }

        .form-control::placeholder {
            color: #444;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #000;
            font-size: 1rem;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #000;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-login {
            background-color: #3461FF;
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.75rem;
            font-size: 1rem;
            border-radius: 8px;
            width: 100%;
            transition: background 0.3s ease;
        }

        .btn-login:hover {
            background-color: #274ccc;
        }

        .custom-alert {
            background-color: rgba(255, 0, 0, 0.2);
            border-left: 5px solid #ff4444;
            color: #000;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 2rem 1rem;
                gap: 2rem;
            }

            .welcome-text {
                align-items: center;
                text-align: center;
                margin: 0;
            }

            .welcome-text .line-1,
            .welcome-text .line-2 {
                font-size: 2.5rem;
                position: static;
                padding-left: 0;
            }

            .welcome-text .underline {
                width: 150px;
                margin-left: 0;
                margin-top: 0.5rem;
            }

            .glass-card {
                max-width: 100%;
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="welcome-text">
            <div class="line-1">Welcome</div>
            <div class="line-2">Admin!</div>
            <div class="underline"></div>
        </div>

        <div class="glass-card">
            <div class="avatar-wrapper">
                <div class="avatar-icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <h3 class="title">Sign In</h3>

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
                <button type="submit" class="btn btn-login">LOGIN</button>
            </form>
        </div>
    </div>

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