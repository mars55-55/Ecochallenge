<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-leaf-fill text-success" style="font-size:2rem;"></i>
            <h2 class="mb-0 fw-bold text-success">
                Bienvenido a EcoChallenge
            </h2>
        </div>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body p-5">
                        <h4 class="mb-4 text-center text-success fw-semibold">
                            ¡Comienza tu camino hacia un estilo de vida más sostenible!
                        </h4>
                        <p class="mb-4 text-center fs-5">
                            EcoChallenge es una plataforma web que te motiva a adoptar hábitos sostenibles a través de retos personalizados y la colaboración con una comunidad comprometida con el medio ambiente.
                        </p>
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">🌱 Participa en retos ecológicos adaptados a tus intereses.</li>
                            <li class="list-group-item">🤝 Comparte tus logros y motiva a otros usuarios.</li>
                            <li class="list-group-item">🌍 Colabora y aprende junto a una comunidad activa.</li>
                        </ul>
                        <div class="text-center">
                            <a href="#" class="btn btn-success btn-lg rounded-pill px-5 shadow-sm">Explorar Retos</a>
                        </div>
                    </div>
                </div>

                <!-- RF12: Foro -->
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body">
                        <h4 class="mb-3 text-primary fw-bold">
                            <i class="bi bi-chat-dots"></i> Foro de la Comunidad
                        </h4>
                        <p class="mb-3">Publica temas, responde a otros usuarios y participa en debates ecológicos.</p>
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('topics.index') }}" class="btn btn-outline-success btn-sm rounded-pill">
                                <i class="bi bi-arrow-right-circle"></i> Ir al Foro
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Fin RF12, RF13, RF14 -->
            </div>
        </div>
    </div>
</x-app-layout>
