<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>EcoChallenge</title>

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
            .eco-header {
                background: #fff;
                border-bottom: 1px solid #A8A8A8;
                box-shadow: 0 2px 8px rgba(168,168,168,0.04);
            }
        </style>
    </head>
    <body class="font-sans text-[#2E2E2E] antialiased">
        <div class="min-h-screen bg-[#F4F4F4]">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="eco-header shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center">
                        <span class="text-xl font-bold eco-accent mr-2">EcoChallenge</span>
                        <span class="text-base text-[#A8A8A8] hidden sm:inline">| Plataforma de hábitos sostenibles</span>
                        <div class="flex-1"></div>
                        <!-- Puedes agregar aquí botones o enlaces rápidos -->
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
            <footer class="mt-8 text-xs text-[#A8A8A8] text-center pb-4">
                &copy; {{ date('Y') }} EcoChallenge. Todos los derechos reservados.
            </footer>
        </div>
    </body>
</html>
