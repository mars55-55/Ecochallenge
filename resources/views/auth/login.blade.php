<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión | EcoChallenge</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background: #F4F4F4; }
        .eco-register-card {
            background: #fff;
            max-width: 420px;
            margin: 48px auto;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(33,160,56,0.08);
            padding: 2.5rem 2rem;
        }
        .eco-title { text-align: center; font-size: 2rem; font-weight: bold; color: #21A038; margin-bottom: 1.5rem; }
        .eco-btn-green {
            background: #21A038; color: #fff; border: none; border-radius: 4px; padding: 0.7rem 1.5rem; font-weight: 600;
            transition: background 0.2s;
        }
        .eco-btn-green:hover { background: #18802e; }
        .eco-link { color: #21A038; text-decoration: underline; }
        label { font-weight: 500; color: #2E2E2E; }
        input[type="email"], input[type="password"] {
            border: 1px solid #A8A8A8; border-radius: 4px; padding: 0.5rem; width: 100%; margin-top: 0.2rem;
        }
        .mb-4 { margin-bottom: 1rem; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="eco-register-card">
        <div class="eco-title">Iniciar sesión</div>
        @if (session('status'))
            <div class="mb-4 text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Correo electrónico -->
            <div class="mb-4">
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Recordarme -->
            <div class="mb-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="ms-2 text-sm text-gray-600">Recuérdame</span>
                </label>
            </div>

            <div class="mt-4 flex flex-col items-center">
                <button type="submit" class="eco-btn-green w-full mb-2">
                    Iniciar sesión
                </button>
                <span class="text-sm text-gray-600">
                    <a href="{{ route('password.request') }}" class="eco-link">¿Olvidaste tu contraseña?</a>
                </span>
                <span class="text-sm text-gray-600 mt-2">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}" class="eco-link">Regístrate aquí</a>
                </span>
            </div>
        </form>
    </div>
</body>
</html>
