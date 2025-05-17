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
                @if(Auth::user()->isAdmin())
                    {{-- Funciones de administrador --}}
                    <div class="card shadow-sm border-0 rounded-4 mb-4">
                        <div class="card-body p-5">
                            <h4 class="mb-4 text-center text-success fw-semibold">
                                Panel de Administración
                            </h4>
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item">👑 Crear, editar y eliminar retos ecológicos.</li>
                                <li class="list-group-item">📊 Ver métricas globales de la plataforma.</li>
                                <li class="list-group-item">🛡️ Gestionar usuarios y reportes.</li>
                                <li class="list-group-item">📝 Gestionar formularios y encuestas.</li>
                                <li class="list-group-item">📄 Generar reportes PDF de usuarios.</li>
                            </ul>
                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                <a href="{{ route('challenges.index') }}" class="btn btn-primary rounded-pill shadow-sm">Gestionar Retos</a>
                                <a href="{{ route('admin.index') }}" class="btn btn-outline-primary rounded-pill shadow-sm">Panel Admin</a>
                                <a href="{{ route('survey.form') }}" class="btn btn-outline-success rounded-pill shadow-sm">Ver Encuestas</a>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Funciones de usuario --}}
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
                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                <a href="{{ route('challenges.index') }}" class="btn btn-success rounded-pill shadow-sm">Explorar Retos</a>
                                <a href="{{ route('manual-actions.create') }}" class="btn btn-outline-success rounded-pill shadow-sm">Registrar Acción Ecológica</a>
                                <a href="{{ route('manual-actions.index') }}" class="btn btn-outline-primary rounded-pill shadow-sm">Mis Acciones</a>
                                <a href="{{ route('survey.form') }}" class="btn btn-outline-info rounded-pill shadow-sm">Encuesta de Satisfacción</a>
                                <a href="{{ route('habit_evaluation.form') }}" class="btn btn-outline-warning rounded-pill shadow-sm">Evaluar Mis Hábitos</a>
                                <a href="{{ route('analysis.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">Ver Análisis y Gráficas</a>
                                <a href="{{ route('user.report.download') }}" class="btn btn-outline-primary rounded-pill shadow-sm">
                                    <i class="bi bi-file-earmark-pdf"></i> Descargar mi reporte ecológico (PDF)
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

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
