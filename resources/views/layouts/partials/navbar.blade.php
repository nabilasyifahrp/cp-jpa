<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background: linear-gradient(to right, #3461FF, #2241b0);
        font-family: 'Poppins', 'Montserrat', sans-serif;
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

    .btn-contact {
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

    .btn-contact:hover {
        background-color: #3461FF;
        transform: scale(1.05);
    }
</style>

<nav class="navbar navbar-light shadow-sm rounded-nav">
    <div class="container d-flex justify-content-between align-items-center py-2">
        <a href="{{ route('home.jpa') }}" class="d-flex align-items-center">
            <img src="{{ asset('assets/images/logo/jpa.png') }}" alt="Logo" class="logo me-2">
        </a>
        <div class="d-flex gap-2">
            <a href="{{ route('home.jpa') }}" class="btn btn-navbar">Home</a>
            <a href="{{ route('home.jpa') }}" class="btn btn-contact">Contact</a>
        </div>
    </div>
</nav>
