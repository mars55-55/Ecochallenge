<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro | EcoChallenge</title>
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
        select, input[type="text"], input[type="email"], input[type="password"] {
            border: 1px solid #A8A8A8; border-radius: 4px; padding: 0.5rem; width: 100%; margin-top: 0.2rem;
        }
        .mt-4 { margin-top: 1rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-4 { margin-bottom: 1rem; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="eco-register-card">
        <div class="eco-title">Crear cuenta en EcoChallenge</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label for="name">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Correo electrónico -->
            <div class="mb-4">
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar contraseña -->
            <div class="mb-4">
                <label for="password_confirmation">Confirmar contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Preferencia ecológica -->
            <div class="mb-4">
                <label for="eco_preferences">Preferencia ecológica</label>
                <select name="eco_preferences" id="eco_preferences" required>
                    <option value="">-- Selecciona una opción --</option>
                    <option value="Reducir plástico">Reducir plástico</option>
                    <option value="Usar transporte público">Usar transporte público</option>
                    <option value="Reciclar en casa">Reciclar en casa</option>
                    <option value="Ahorrar energía">Ahorrar energía</option>
                    <option value="Alimentación sostenible">Alimentación sostenible</option>
                </select>
            </div>

            <div class="mt-4 flex flex-col items-center">
                <button type="submit" class="eco-btn-green w-full mb-2">
                    Registrarse
                </button>
                <span class="text-sm text-gray-600">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="eco-link">Inicia sesión aquí</a>
                </span>
            </div>
        </form>
    </div>
</body>
</html>
