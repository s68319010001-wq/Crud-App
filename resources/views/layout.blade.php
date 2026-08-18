<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Font & Bootstrap Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #fff0f5;
            font-family: 'Mitr', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Sweet Theme */
        .navbar-sweet {
            background: linear-gradient(135deg, #ffb6c1 0%, #ffc0cb 50%, #ffd1dc 100%) !important;
            box-shadow: 0 4px 15px rgba(255, 182, 193, 0.4);
        }
        .navbar-sweet .navbar-brand {
            color: #ffffff !important;
            font-weight: 600;
            font-size: 1.35rem;
        }
        .navbar-sweet .nav-link {
            color: rgba(255, 255, 255, 0.95) !important;
            font-weight: 500;
            padding: 8px 16px !important;
            border-radius: 20px;
            transition: all 0.2s ease;
        }
        .navbar-sweet .nav-link:hover, 
        .navbar-sweet .nav-link.active {
            color: #d87093 !important;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        /* Logout Button Custom */
        .btn-logout {
            background-color: #fff0f5;
            color: #ff4d6d !important;
            border: 1px solid #ffb6c1 !important;
            border-radius: 20px !important;
            padding: 6px 16px !important;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .btn-logout:hover {
            background-color: #ff4d6d !important;
            color: white !important;
        }

        /* Footer Sweet Theme */
        .footer-sweet {
            background-color: #ffffff;
            border-top: 2px solid #ffe4e1;
            color: #d87093;
            margin-top: auto;
        }
    </style>
</head>

<body>
    <!-- Sweet Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-sweet py-3">
        <div class="container">
            <a href="{{ route('index') }}" class="navbar-brand">
                🌸 CRUD App
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-1 mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('index') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            All Posts
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                            About 🎀
                        </a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a href="{{ route('create') }}" class="nav-link {{ request()->routeIs('create') ? 'active' : '' }}">
                                Create Post ✨
                            </a>
                        </li>

                        @if(auth()->user()->role == 1)
                            <li class="nav-item">
                                <a href="{{ route('admin') }}" class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}">
                                    Admin 👑
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                💖 {{ auth()->user()->name }}
                            </a>
                        </li>

                        <li class="nav-item ms-lg-2">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-logout nav-link border-0">
                                    Logout 🚪
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                                Login 🌸
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}">
                                Register 🎀
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container my-5">
        @yield('content')
    </div>

    <!-- Sweet Footer -->
    <footer class="footer-sweet text-center py-3">
        <div class="container">
            <p class="mb-0 fw-medium">
                &copy; 2026 CRUD App. Created with 💖 All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>