<x-guest-layout>
    <div class="eco-section-title">Bienvenidos a Ecochallenge</div>
    <div class="flex justify-center mb-8">
        <a href="{{ route('register') }}" class="eco-btn-green">Registrarse Ahora</a>
        <a href="{{ route('login') }}" class="eco-btn-blue">Iniciar Sesión</a>
    </div>

    <!-- Bloques de misión, visión, valores -->
    <div class="eco-blocks">
        <div class="eco-block">
            <img src="https://img.icons8.com/ios-filled/100/21A038/mission.png" alt="Misión"/>
            <div class="eco-block-title">Misión</div>
            <div>Motivar hábitos sostenibles con retos y comunidad.</div>
        </div>
        <div class="eco-block">
            <img src="https://img.icons8.com/ios-filled/100/21A038/visible.png" alt="Visión"/>
            <div class="eco-block-title">Visión</div>
            <div>Ser la plataforma líder en sostenibilidad personal.</div>
        </div>
        <div class="eco-block">
            <img src="https://img.icons8.com/ios-filled/100/21A038/values.png" alt="Valores"/>
            <div class="eco-block-title">Valores</div>
            <div>Colaboración, compromiso y respeto ambiental.</div>
        </div>
    </div>

    <div class="eco-section-title" style="font-size:1.5rem;">¿Por qué Elegir Ecochallenge?</div>

    <!-- Sección: ¿Qué es? -->
    <section id="que-es" class="py-8 bg-white">
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
    <section id="como-funciona" class="py-8 bg-[#F4F4F4]">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-2xl font-bold eco-accent mb-4">¿Cómo funciona?</h2>
            <div class="eco-blocks">
                <div class="eco-block">
                    <h3 class="font-semibold text-lg eco-accent mb-2">1. Elige tus retos</h3>
                    <p>Selecciona entre una variedad de retos ecológicos adaptados a tus intereses y nivel.</p>
                </div>
                <div class="eco-block">
                    <h3 class="font-semibold text-lg eco-accent mb-2">2. Comparte y aprende</h3>
                    <p>Publica tus logros, comparte fotos y motiva a otros miembros de la comunidad.</p>
                </div>
                <div class="eco-block">
                    <h3 class="font-semibold text-lg eco-accent mb-2">3. Crece con la comunidad</h3>
                    <p>Participa en foros, eventos y actividades grupales para seguir aprendiendo y creciendo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección: Comunidad -->
    <section id="comunidad" class="py-8 bg-white">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold eco-accent mb-4">Únete a la comunidad EcoChallenge</h2>
            <p class="text-lg text-[#2E2E2E] mb-6">
                Miles de personas ya están cambiando el mundo, un reto a la vez. ¡Súmate y haz la diferencia!
            </p>
            <a href="{{ route('register') }}" class="eco-btn-green text-lg">Quiero ser parte</a>
        </div>
    </section>
</x-guest-layout>