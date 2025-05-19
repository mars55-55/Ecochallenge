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
            <h1 class="fw-bold text-success mb-3">Evolución de tu impacto</h1>
            <p class="lead text-muted">Visualiza cómo tus acciones han generado un cambio positivo a lo largo del tiempo.</p>
        </div>
    </div>
    <div class="row justify-content-center mb-4">
        <div class="col-lg-10">
            <div class="table-responsive rounded-4 shadow-sm">
                <table class="table table-striped align-middle mb-0">
                    <thead class="table-success">
                        <tr>
                            <th><i class="bi bi-calendar-event"></i> Fecha</th>
                            <th><i class="bi bi-cloud-arrow-down-fill"></i> CO₂ ahorrado (kg)</th>
                            <th><i class="bi bi-droplet-half"></i> Agua conservada (L)</th>
                            <th><i class="bi bi-recycle"></i> Residuos evitados (kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($metrics as $metric)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($metric->date)->format('d/m/Y') }}</td>
                            <td class="fw-semibold text-success">{{ $metric->co2_saved }}</td>
                            <td class="fw-semibold text-primary">{{ $metric->water_saved }}</td>
                            <td class="fw-semibold text-warning">{{ $metric->waste_avoided }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No hay métricas registradas aún.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="alert alert-success mt-3 mb-0 rounded-4 shadow-sm">
                <i class="bi bi-emoji-smile"></i> ¡Cada día cuenta! Sigue sumando acciones sostenibles.
            </div>
        </div>
    </div>
</div>
@endsection