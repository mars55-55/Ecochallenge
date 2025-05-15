<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 dark:text-green-300 leading-tight">
            {{ __('Bienvenido a Ecochallenge') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4 text-lg">
                        Ecochallenge es una plataforma web que te motiva a adoptar hábitos sostenibles a través de retos personalizados y la colaboración con una comunidad comprometida con el medio ambiente.
                    </p>
                    <ul class="list-disc pl-6 mb-4">
                        <li>Participa en retos ecológicos adaptados a tus intereses.</li>
                        <li>Comparte tus logros y motiva a otros usuarios.</li>
                        <li>Colabora y aprende junto a una comunidad activa.</li>
                    </ul>
                    <p>
                        ¡Únete a Ecochallenge y comienza hoy tu camino hacia un estilo de vida más sostenible!
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
