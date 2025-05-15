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
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        body {
            background-color: #F4F4F4;
            font-family: 'Figtree', 'Segoe UI', Arial, sans-serif;
        }
        .eco-navbar {
            background: linear-gradient(90deg, #21a038 0%, #43e97b 100%);
        }
        .eco-logo {
            font-size: 1.7rem;
            color: #fff;
            font-weight: bold;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        .eco-logo .bi {
            font-size: 2rem;
            color: #fff;
        }
        .eco-navbar .btn {
            border-radius: 20px;
            font-weight: 500;
        }
        .eco-header {
            background: #fff;
            border-bottom: 1px solid #A8A8A8;
            box-shadow: 0 2px 8px rgba(168,168,168,0.04);
        }
        .eco-btn {
            background: linear-gradient(90deg, #21a038 0%, #43e97b 100%);
            color: #fff;
            border-radius: 30px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            border: none;
            transition: background 0.2s, transform 0.2s;
        }
        .eco-btn:hover {
            background: linear-gradient(90deg, #43e97b 0%, #21a038 100%);
            color: #fff;
            transform: translateY(-2px) scale(1.04);
        }
    </style>
</head>
<body>
    <nav class="navbar eco-navbar mb-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="eco-logo" href="#">
                <i class="bi bi-leaf-fill"></i>
                EcoChallenge
            </a>
            <form action="{{ route('logout') }}" method="POST" class="mb-0">
                @csrf
                <button type="submit" class="btn btn-outline-light rounded-pill px-4">Cerrar sesión</button>
            </form>
        </div>
    </nav>
    @isset($header)
        <header class="eco-header shadow">
            <div class="container py-3 d-flex align-items-center">
                <span class="fs-4 fw-bold eco-logo" style="color:#21a038;">
                    <i class="bi bi-leaf-fill"></i> EcoChallenge
                </span>
                <span class="ms-3 text-muted d-none d-md-inline">| Plataforma de hábitos sostenibles</span>
            </div>
        </header>
    @endisset

    <main></main>
        {{ $slot }}
    </main>
    <footer class="text-center text-muted py-3 mt-5 border-top">
        &copy; {{ date('Y') }} EcoChallenge. Todos los derechos reservados.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
