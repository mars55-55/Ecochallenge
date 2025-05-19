{{-- filepath: resources/views/analysis/index.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm rounded-pill shadow-sm">
            <i class="bi bi-arrow-left"></i> Volver al inicio
        </a>
        <h2 class="fw-bold text-success mb-0 flex-grow-1 text-center"><i class="bi bi-bar-chart-line"></i> Análisis de tus acciones y hábitos</h2>
        <span style="width: 40px;"></span> <!-- Espaciador visual -->
    </div>
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 h-100">
                <div class="card-body text-center">
                    <h4 class="fw-semibold text-success mb-2"><i class="bi bi-emoji-smile"></i> Encuestas de satisfacción</h4>
                    <p class="text-muted">Promedio de satisfacción:</p>
                    <span class="display-5 fw-bold text-success">{{ $satisfaccionAvg ? number_format($satisfaccionAvg, 2) : 'Sin datos' }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 h-100">
                <div class="card-body text-center">
                    <h4 class="fw-semibold text-primary mb-2"><i class="bi bi-list-check"></i> Acciones ecológicas registradas</h4>
                    <p class="text-muted">Total de acciones:</p>
                    <span class="display-5 fw-bold text-primary">{{ $manualActionsCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 h-100">
                <div class="card-body text-center">
                    <h4 class="fw-semibold text-info mb-2"><i class="bi bi-clipboard-check"></i> Evaluación de hábitos</h4>
                    <p class="text-muted">Promedio de huella de carbono:</p>
                    <span class="display-5 fw-bold text-info">{{ $habitAvg ? number_format($habitAvg, 2) : 'Sin datos' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection