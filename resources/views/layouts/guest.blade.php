<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EcoChallenge</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .eco-navbar {
            background: linear-gradient(90deg, #21a038 0%, #43e97b 60%, #11998e 100%);
            box-shadow: 0 2px 8px rgba(33,160,56,0.08);
        }
        .eco-logo {
            font-size: 2rem;
            color: #fff;
            font-weight: bold;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            text-decoration: none;
            text-shadow: 0 2px 8px rgba(33,160,56,0.15);
        }
        .eco-logo .bi {
            font-size: 2.3rem;
            color: #fff;
            filter: drop-shadow(0 2px 6px #21a03855);
        }
        .eco-navbar .eco-btn {
            border-radius: 30px;
            font-weight: 500;
            background: #fff;
            color: #21a038;
            border: none;
            padding: 0.5rem 2rem;
            box-shadow: 0 2px 8px rgba(33,160,56,0.10);
            transition: background 0.2s, color 0.2s, transform 0.2s;
        }
        .eco-navbar .eco-btn:hover {
            background: #21a038;
            color: #fff;
            transform: translateY(-2px) scale(1.04);
        }
    </style>
</head>
<body>
    <nav class="navbar eco-navbar mb-3 shadow-sm sticky-top">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <a href="/" class="eco-logo">
                <i class="bi bi-leaf-fill"></i>
                EcoChallenge
            </a>
            <div class="d-flex align-items-center gap-2">
                @guest
                    <a href="{{ route('register') }}" class="eco-btn">Registrarse</a>
                    <a href="{{ route('login') }}" class="eco-btn ms-2">Iniciar Sesión</a>
                @endguest
                @auth
                    <a href="{{ route('dashboard') }}" class="eco-btn">Ir al Panel</a>
                @endauth
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="text-center text-muted py-3 mt-5 border-top">
        &copy; {{ date('Y') }} EcoChallenge. Todos los derechos reservados.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
