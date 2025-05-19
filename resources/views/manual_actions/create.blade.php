@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm rounded-pill shadow-sm">
            <i class="bi bi-arrow-left"></i> Volver al inicio
        </a>
        <h2 class="fw-bold text-success mb-0 flex-grow-1 text-center"><i class="bi bi-plus-circle"></i> Registrar acción ecológica</h2>
        <span style="width: 40px;"></span> <!-- Espaciador visual -->
    </div>
    <div class="row justify-content-center mb-4">
        <div class="col-lg-7">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <p class="text-muted text-center mb-4">Cuéntanos qué acción sostenible realizaste hoy y suma puntos para el planeta.</p>
                    <form method="POST" action="{{ route('manual-actions.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Acción</label>
                            <input type="text" name="action" class="form-control" required placeholder="Ej: Reciclé botellas de plástico">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="description" class="form-control" placeholder="Detalles adicionales"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="date" class="form-control" required value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg rounded-pill"><i class="bi bi-check-circle"></i> Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection