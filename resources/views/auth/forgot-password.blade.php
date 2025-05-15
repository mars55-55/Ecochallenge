<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recuperar contraseña | EcoChallenge</title>
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
        label { font-weight: 500; color: #2E2E2E; }
        input[type="email"] {
            border: 1px solid #A8A8A8; border-radius: 4px; padding: 0.5rem; width: 100%; margin-top: 0.2rem;
        }
        .mb-4 { margin-bottom: 1rem; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="eco-register-card">
        <div class="eco-title">¿Olvidaste tu contraseña?</div>
        <div class="mb-4 text-sm text-gray-600">
            Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Correo electrónico -->
            <div class="mb-4">
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4 flex flex-col items-center">
                <button type="submit" class="eco-btn-green w-full mb-2">
                    Enviar enlace de recuperación
                </button>
                <span class="text-sm text-gray-600">
                    <a href="{{ route('login') }}" class="eco-link">Volver al inicio de sesión</a>
                </span>
            </div>
        </form>
    </div>
</body>
</html>
