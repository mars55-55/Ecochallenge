@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="mb-3">
        <a href="/" class="btn btn-outline-secondary rounded-pill"><i class="bi bi-house-door"></i> Volver a inicio</a>
    </div>
    @php $user = Auth::user(); @endphp
    @if($user && method_exists($user, 'isAdmin') && $user->isAdmin())
        <div class="alert alert-info text-center rounded-4 shadow-sm mb-4">
            <i class="bi bi-stars"></i> <strong>¡Bienvenido, Administrador!</strong> Tu liderazgo impulsa el cambio sostenible en toda la comunidad. Gestiona, inspira y haz crecer el impacto ecológico.
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h1 class="fw-bold text-success mb-3">Panel de Administración</h1>
                <p class="lead text-muted">Gestiona retos, usuarios, reportes y métricas globales de la plataforma.</p>
            </div>
        </div>
        <div class="row g-4 mb-4 justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0 rounded-4 h-100">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-success fw-semibold text-center">Gestión de Retos</h4>
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
            </div>
            <div class="col-md-6">
                <div class="card shadow border-0 rounded-4 h-100">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-primary fw-semibold text-center">Foro de la Comunidad</h4>
                        <p class="mb-3 text-center">Publica temas, responde a otros usuarios y participa en debates ecológicos.</p>
                        <div class="d-flex flex-wrap gap-2 justify-content-center mb-3">
                            <a href="{{ route('topics.index') }}" class="btn btn-outline-success rounded-pill">
                                <i class="bi bi-arrow-right-circle"></i> Ir al Foro
                            </a>
                            <a href="{{ route('topics.create') }}" class="btn btn-success rounded-pill">
                                <i class="bi bi-plus-circle"></i> Nuevo Tema
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-success text-center rounded-4 shadow-sm mb-4">
            <i class="bi bi-people-fill"></i> <strong>¡Gracias por ser parte de EcoChallenge!</strong> Cada reto que completas y cada acción que tomas suma para un planeta mejor. ¡Sigue inspirando a otros!
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h1 class="fw-bold text-success mb-3">¡Tu Progreso Sostenible!</h1>
                <p class="lead text-muted">Sigue avanzando y celebra cada logro ecológico. ¡Cada acción cuenta!</p>
            </div>
        </div>
        <div class="row g-4 mb-4 justify-content-center">
            <div class="col-md-3">
                <div class="card shadow border-0 rounded-4 text-center h-100">
                    <div class="card-body py-4">
                        <div class="mb-2"><i class="bi bi-award-fill text-warning" style="font-size:2.2rem;"></i></div>
                        <h5 class="fw-semibold">Retos Completados</h5>
                        <div class="display-5 fw-bold text-success">{{ Auth::user()->challenges()->wherePivotNotNull('completed_at')->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0 rounded-4 text-center h-100">
                    <div class="card-body py-4">
                        <div class="mb-2"><i class="bi bi-cloud-arrow-down-fill text-info" style="font-size:2.2rem;"></i></div>
                        <h5 class="fw-semibold">CO₂ Ahorrado</h5>
                        <div class="display-6 fw-bold">{{ Auth::user()->metrics()->sum('co2_saved') }} <span class="fs-5">kg</span></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0 rounded-4 text-center h-100">
                    <div class="card-body py-4">
                        <div class="mb-2"><i class="bi bi-droplet-half text-primary" style="font-size:2.2rem;"></i></div>
                        <h5 class="fw-semibold">Agua Conservada</h5>
                        <div class="display-6 fw-bold">{{ Auth::user()->metrics()->sum('water_saved') }} <span class="fs-5">L</span></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0 rounded-4 text-center h-100">
                    <div class="card-body py-4">
                        <div class="mb-2"><i class="bi bi-recycle text-success" style="font-size:2.2rem;"></i></div>
                        <h5 class="fw-semibold">Residuos Evitados</h5>
                        <div class="display-6 fw-bold">{{ Auth::user()->metrics()->sum('waste_avoided') }} <span class="fs-5">kg</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-lg-6 text-center">
                <a href="{{ route('metrics.history') }}" class="btn btn-outline-success btn-lg rounded-pill px-5 shadow-sm">
                    <i class="bi bi-graph-up-arrow"></i> Ver evolución de mi impacto
                </a>
            </div>
        </div>
        <div class="row g-4 mb-4 justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0 rounded-4 h-100">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-success fw-semibold text-center">
                            <i class="bi bi-lightbulb-fill me-2"></i>Acciones y Retos
                        </h4>
                        <div class="row g-3 justify-content-center">
                            <div class="col-12">
                                <a href="{{ route('challenges.index') }}" class="btn btn-success btn-lg w-100 rounded-pill shadow-sm d-flex align-items-center justify-content-center">
                                    <i class="bi bi-tree-fill me-2"></i> Explorar Retos
                                </a>
                                <small class="text-muted d-block text-center">Descubre y participa en nuevos desafíos ecológicos.</small>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('manual-actions.create') }}" class="btn btn-outline-success btn-lg w-100 rounded-pill shadow-sm d-flex align-items-center justify-content-center">
                                    <i class="bi bi-plus-circle me-2"></i> Registrar Acción Ecológica
                                </a>
                                <small class="text-muted d-block text-center">Agrega tus acciones sostenibles diarias.</small>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('manual-actions.index') }}" class="btn btn-outline-primary btn-lg w-100 rounded-pill shadow-sm d-flex align-items-center justify-content-center">
                                    <i class="bi bi-list-check me-2"></i> Mis Acciones
                                </a>
                                <small class="text-muted d-block text-center">Consulta tu historial de acciones ecológicas.</small>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('survey.form') }}" class="btn btn-outline-info btn-lg w-100 rounded-pill shadow-sm d-flex align-items-center justify-content-center">
                                    <i class="bi bi-ui-checks-grid me-2"></i> Encuesta de Satisfacción
                                </a>
                                <small class="text-muted d-block text-center">Ayúdanos a mejorar tu experiencia.</small>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('habit_evaluation.form') }}" class="btn btn-outline-warning btn-lg w-100 rounded-pill shadow-sm d-flex align-items-center justify-content-center">
                                    <i class="bi bi-clipboard-check me-2"></i> Evaluar Mis Hábitos
                                </a>
                                <small class="text-muted d-block text-center">Evalúa y mejora tus hábitos sostenibles.</small>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('analysis.index') }}" class="btn btn-outline-secondary btn-lg w-100 rounded-pill shadow-sm d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bar-chart-line-fill me-2"></i> Ver Análisis y Gráficas
                                </a>
                                <small class="text-muted d-block text-center">Visualiza tu impacto y evolución.</small>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('user.report.download') }}" class="btn btn-outline-primary btn-lg w-100 rounded-pill shadow-sm d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-earmark-pdf me-2"></i> Descargar mi reporte ecológico (PDF)
                                </a>
                                <small class="text-muted d-block text-center">Obtén un resumen profesional de tu progreso.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow border-0 rounded-4 h-100">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-primary fw-semibold text-center">Foro de la Comunidad</h4>
                        <p class="mb-3 text-center">Publica temas, responde a otros usuarios y participa en debates ecológicos.</p>
                        <div class="d-flex flex-wrap gap-2 justify-content-center mb-3">
                            <a href="{{ route('topics.index') }}" class="btn btn-outline-success rounded-pill">
                                <i class="bi bi-arrow-right-circle"></i> Ir al Foro
                            </a>
                            <a href="{{ route('topics.create') }}" class="btn btn-success rounded-pill">
                                <i class="bi bi-plus-circle"></i> Nuevo Tema
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="alert alert-success mt-3 mb-0 rounded-4 shadow-sm">
                    <i class="bi bi-emoji-smile"></i> ¡Sigue sumando acciones sostenibles y conviértete en un ejemplo para la comunidad!
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
