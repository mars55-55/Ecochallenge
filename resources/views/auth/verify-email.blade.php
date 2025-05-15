<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verificar correo | EcoChallenge</title>
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
        .mb-4 { margin-bottom: 1rem; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="eco-register-card">
        <div class="eco-title">Verifica tu correo electrónico</div>
        <div class="mb-4 text-sm text-gray-600">
            ¡Gracias por registrarte! Antes de comenzar, por favor verifica tu dirección de correo haciendo clic en el enlace que te acabamos de enviar. Si no recibiste el correo, te podemos enviar otro.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 text-center">
                Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
            </div>
        @endif

        <div class="mt-4 flex flex-col items-center gap-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="eco-btn-green w-full">
                    Reenviar correo de verificación
                </button>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="eco-btn-green w-full" style="background:#A8A8A8;">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</body>
</html>
