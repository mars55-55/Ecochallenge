@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm rounded-pill shadow-sm">
            <i class="bi bi-arrow-left"></i> Volver al inicio
        </a>
        <h1 class="fw-bold text-success mb-0 flex-grow-1 text-center"><i class="bi bi-list-check"></i> Mis acciones ecológicas</h1>
        <span style="width: 40px;"></span> <!-- Espaciador visual -->
    </div>
    <div class="row g-4">
        @forelse($actions as $action)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow border-0 rounded-4 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold text-success mb-2"><i class="bi bi-check-circle"></i> {{ $action->action }}</h5>
                        <p class="mb-1 text-muted">{{ $action->description }}</p>
                        <span class="badge bg-secondary">{{ \Carbon\Carbon::parse($action->date)->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <div class="alert alert-info rounded-4">Aún no has registrado acciones. ¡Empieza hoy y suma tu granito de arena!</div>
            </div>
        @endforelse
    </div>
</div>
@endsection