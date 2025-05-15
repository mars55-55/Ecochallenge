<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EcoChallenge</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background: #fff; }
        .eco-navbar { background: #21A038; color: #fff; }
        .eco-navbar .eco-logo { font-size: 1.7rem; font-weight: bold; letter-spacing: -1px; }
        .eco-navbar .eco-btn-top {
            background: #fff; color: #2E2E2E; border-radius: 4px; padding: 0.4rem 1.2rem; font-weight: 500; border: none;
            transition: background 0.2s;
        }
        .eco-navbar .eco-btn-top:hover { background: #F4F4F4; }
        .eco-menu { background: #F4F4F4; }
        .eco-menu a {
            color: #2E2E2E; padding: 0.7rem 1.2rem; text-decoration: none; font-weight: 500; border: none; transition: color 0.2s;
        }
        .eco-menu a:hover { color: #21A038; }
        .eco-btn-green {
            background: #21A038; color: #fff; border: none; border-radius: 4px; padding: 0.7rem 1.5rem; font-weight: 600; margin-right: 1rem;
        }
        .eco-btn-blue {
            background: #2196F3; color: #fff; border: none; border-radius: 4px; padding: 0.7rem 1.5rem; font-weight: 600;
        }
        .eco-section-title { font-size: 2rem; font-weight: bold; margin: 2rem 0 1.5rem 0; text-align: center; }
        .eco-blocks { display: flex; justify-content: center; gap: 3rem; margin: 2rem 0; }
        .eco-block { text-align: center; }
        .eco-block img { width: 80px; height: 80px; margin-bottom: 0.5rem; }
        .eco-block-title { font-weight: bold; margin-bottom: 0.5rem; }
        footer { margin-top: 2rem; color: #A8A8A8; text-align: center; font-size: 0.9rem; }
        @media (max-width: 800px) {
            .eco-blocks { flex-direction: column; gap: 1.5rem; }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Barra superior -->
    <nav class="eco-navbar w-full flex items-center justify-between px-8 py-3">
        <div class="flex items-center space-x-3">
            <span class="eco-logo">Ecochallenge</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="32" height="32" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="10" r="7" fill="#fff"/><path d="M12 3a7 7 0 0 1 7 7c0 3.87-3.13 7-7 7s-7-3.13-7-7a7 7 0 0 1 7-7zm0 16v2m-4 0h8" stroke="#21A038" stroke-width="2" stroke-linecap="round"/></svg>
        </div>
        <a href="{{ route('register') }}" class="eco-btn-top">Registrarse</a>
    </nav>
    <!-- Menú -->
    <div class="eco-menu w-full flex items-center px-8">
        <a href="#">Inicio</a>
        <a href="#">Foro</a>
        <a href="#">Tu huella</a>
        <a href="#">Retos</a>
    </div>
    <!-- Contenido principal -->
    <main class="px-8 py-8">
        <!-- Aquí puedes agregar más contenido si lo deseas -->
        {{ $slot }}
    </main>
    <footer>
        &copy; {{ date('Y') }} EcoChallenge. Todos los derechos reservados.
    </footer>
</body>
</html>
