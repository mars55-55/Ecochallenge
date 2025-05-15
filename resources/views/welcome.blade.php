<x-guest-layout>
    <!-- Navegación principal -->
    <nav class="bg-white border-b border-[#A8A8A8] fixed w-full z-10 top-0 left-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <div class="flex items-center space-x-3">
                <x-application-logo class="h-8 w-8 fill-current eco-accent" />
                <span class="text-xl font-bold eco-accent">EcoChallenge</span>
            </div>
            <div class="space-x-4">
                <a href="#que-es" class="text-[#2E2E2E] hover:text-[#6EA204] font-medium transition">¿Qué es?</a>
                <a href="#como-funciona" class="text-[#2E2E2E] hover:text-[#6EA204] font-medium transition">¿Cómo funciona?</a>
                <a href="#comunidad" class="text-[#2E2E2E] hover:text-[#6EA204] font-medium transition">Comunidad</a>
                <a href="{{ route('login') }}" class="eco-btn">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="eco-btn">Registrarse</a>
            </div>
        </div>
    </nav>

    <!-- Hero principal -->
    <section class="pt-24 pb-16 bg-[#F4F4F4]">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold eco-accent mb-4">EcoChallenge</h1>
            <p class="text-xl text-[#2E2E2E] mb-6">
                Plataforma web que motiva a las personas a adoptar <span class="eco-accent font-semibold">hábitos sostenibles</span> mediante <span class="eco-accent font-semibold">retos personalizados</span> y <span class="eco-accent font-semibold">colaboración comunitaria</span>.
            </p>
            <a href="{{ route('register') }}" class="eco-btn text-lg mr-2">Comienza ahora</a>
            <a href="#que-es" class="text-[#6EA204] underline text-lg">Saber más</a>
        </div>
    </section>

    <!-- Sección: ¿Qué es? -->
    <section id="que-es" class="py-12 bg-white">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-2xl font-bold eco-accent mb-4">¿Qué es EcoChallenge?</h2>
            <p class="text-lg text-[#2E2E2E] mb-4">
                EcoChallenge es una plataforma digital donde puedes participar en retos ecológicos adaptados a tus intereses, compartir tus logros y aprender junto a una comunidad comprometida con el medio ambiente.
            </p>
            <ul class="list-disc pl-6 text-[#2E2E2E]">
                <li>Retos personalizados para mejorar tus hábitos sostenibles.</li>
                <li>Comparte tus avances y motiva a otros usuarios.</li>
                <li>Colabora y aprende junto a una comunidad activa.</li>
            </ul>
        </div>
    </section>

    <!-- Sección: ¿Cómo funciona? -->
    <section id="como-funciona" class="py-12 bg-[#F4F4F4]">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-2xl font-bold eco-accent mb-4">¿Cómo funciona?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="eco-card p-6">
                    <h3 class="font-semibold text-lg eco-accent mb-2">1. Elige tus retos</h3>
                    <p>Selecciona entre una variedad de retos ecológicos adaptados a tus intereses y nivel.</p>
                </div>
                <div class="eco-card p-6">
                    <h3 class="font-semibold text-lg eco-accent mb-2">2. Comparte y aprende</h3>
                    <p>Publica tus logros, comparte fotos y motiva a otros miembros de la comunidad.</p>
                </div>
                <div class="eco-card p-6">
                    <h3 class="font-semibold text-lg eco-accent mb-2">3. Crece con la comunidad</h3>
                    <p>Participa en foros, eventos y actividades grupales para seguir aprendiendo y creciendo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección: Comunidad -->
    <section id="comunidad" class="py-12 bg-white">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold eco-accent mb-4">Únete a la comunidad EcoChallenge</h2>
            <p class="text-lg text-[#2E2E2E] mb-6">
                Miles de personas ya están cambiando el mundo, un reto a la vez. ¡Súmate y haz la diferencia!
            </p>
            <a href="{{ route('register') }}" class="eco-btn text-lg">Quiero ser parte</a>
        </div>
    </section>

    <footer class="mt-8 text-xs text-[#A8A8A8] text-center pb-4">
        &copy; {{ date('Y') }} EcoChallenge. Todos los derechos reservados.
    </footer>
</x-guest-layout>