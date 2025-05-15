<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>EcoChallenge</title>e>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                background-color: #F4F4F4;
            }
            .eco-accent {
                color: #6EA204;
            }
            .eco-btn {
                background-color: #6EA204;
                color: #fff;
                border-radius: 6px;
                padding: 0.5rem 1.5rem;
                font-weight: 500;
                transition: background 0.2s;
            }
            .eco-btn:hover {
                background-color: #5a8303;
            }
            .eco-card {
                background: #fff;
                border: 1px solid #A8A8A8;
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(168,168,168,0.08);
            }
        </style>
    </head>
    <body class="font-sans text-[#2E2E2E] antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#F4F4F4]">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current eco-accent" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-8 eco-card shadow-md overflow-hidden">
                <h1 class="text-2xl font-bold mb-2 eco-accent text-center">EcoChallenge</h1>
                <p class="text-center text-base mb-6">
                    Plataforma web que motiva a las personas a adoptar <span class="eco-accent font-semibold">hábitos sostenibles</span> mediante <span class="eco-accent font-semibold">retos personalizados</span> y <span class="eco-accent font-semibold">colaboración comunitaria</span>.
                </p>
                {{ $slot }}
            </div>
            <footer class="mt-8 text-xs text-[#A8A8A8] text-center">
                &copy; {{ date('Y') }} EcoChallenge. Todos los derechos reservados.
            </footer>
        </div>
    </body>
</html>
