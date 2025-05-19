@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="mb-3">
        <a href="/" class="btn btn-outline-secondary rounded-pill"><i class="bi bi-house-door"></i> Volver a inicio</a>
    </div>
</div>
<div class="container py-5">
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
                    <div class="display-5 fw-bold text-success">{{ $completed_challenges }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4 text-center h-100">
                <div class="card-body py-4">
                    <div class="mb-2"><i class="bi bi-cloud-arrow-down-fill text-info" style="font-size:2.2rem;"></i></div>
                    <h5 class="fw-semibold">CO₂ Ahorrado</h5>
                    <div class="display-6 fw-bold">{{ $total_co2 }} <span class="fs-5">kg</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4 text-center h-100">
                <div class="card-body py-4">
                    <div class="mb-2"><i class="bi bi-droplet-half text-primary" style="font-size:2.2rem;"></i></div>
                    <h5 class="fw-semibold">Agua Conservada</h5>
                    <div class="display-6 fw-bold">{{ $total_water }} <span class="fs-5">L</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4 text-center h-100">
                <div class="card-body py-4">
                    <div class="mb-2"><i class="bi bi-recycle text-success" style="font-size:2.2rem;"></i></div>
                    <h5 class="fw-semibold">Residuos Evitados</h5>
                    <div class="display-6 fw-bold">{{ $total_waste }} <span class="fs-5">kg</span></div>
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
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="alert alert-success mt-3 mb-0 rounded-4 shadow-sm">
                <i class="bi bi-emoji-smile"></i> ¡Sigue sumando acciones sostenibles y conviértete en un ejemplo para la comunidad!
            </div>
        </div>
    </div>
</div>
@endsection