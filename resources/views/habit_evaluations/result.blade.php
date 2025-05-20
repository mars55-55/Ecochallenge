@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('habit_evaluation.form') }}" class="btn btn-outline-secondary btn-sm rounded-pill shadow-sm">
            <i class="bi bi-arrow-left"></i> Volver a la evaluación
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-5 text-center">
                    <h2 class="fw-bold text-success mb-3"><i class="bi bi-bar-chart-line-fill"></i> Resultado de tu evaluación</h2>
                    <p class="fs-5">Tu huella de carbono estimada es:</p>
                    <div class="display-4 fw-bold text-warning mb-3">{{ $carbon }} <span class="fs-5">puntos</span></div>
                    <div class="alert alert-success rounded-4 mt-4">
                        <i class="bi bi-emoji-smile"></i> ¡Sigue mejorando tus hábitos para reducir tu impacto ambiental!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection