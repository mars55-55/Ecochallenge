@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm rounded-pill shadow-sm">
            <i class="bi bi-arrow-left"></i> Volver al inicio
        </a>
        <h2 class="fw-bold text-warning mb-0 flex-grow-1 text-center"><i class="bi bi-clipboard-check"></i> Evaluación de hábitos</h2>
        <span style="width: 40px;"></span> <!-- Espaciador visual -->
    </div>
    <div class="row justify-content-center mb-4">
        <div class="col-lg-7">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <p class="text-muted text-center mb-4">Completa los campos para conocer tu impacto y oportunidades de mejora.</p>
                    <form method="POST" action="{{ route('habit_evaluation.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">¿Cuántos km usas transporte público por semana?</label>
                            <input type="number" name="transporte" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">¿Cuántos litros de agua consumes al día?</label>
                            <input type="number" name="agua" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">¿Cuántos kg de residuos generas por semana?</label>
                            <input type="number" name="residuos" class="form-control" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning btn-lg rounded-pill"><i class="bi bi-send"></i> Evaluar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection