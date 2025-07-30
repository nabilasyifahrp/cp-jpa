<style>
    .rounded-nav {
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
    }

    .logo {
        width: 50px;
    }

    .btn-navbar {
        background-color: transparent;
        border: none;
        color: #6c757d;
        padding: 6px 16px;
        font-weight: 500;
    }

    .btn-navbar:hover {
        color: #3461FF;
        background-color: transparent;
    }

    .btn-contact {
        border-color: #3461FF;
        border-radius: 10px;
        padding: 6px 20px;
        color: #6c757d;
    }

    .btn-contact:hover {
        background-color: #3461FF;
        color: #ffffff;
    }
</style>

<nav class="navbar navbar-light bg-white shadow-sm sticky-top rounded-nav">
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
