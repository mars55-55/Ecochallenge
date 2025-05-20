@extends('layouts.app')
@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg border-0 rounded-4 p-5 text-center" style="max-width: 450px;">
        <div class="mb-4">
            <span class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-25 rounded-circle" style="width:80px; height:80px;">
                <i class="bi bi-emoji-smile text-success" style="font-size:2.5rem;"></i>
            </span>
        </div>
        <h2 class="fw-bold text-success mb-3">¡Gracias por completar la encuesta!</h2>
        <p class="text-muted mb-4">Tu opinión nos ayuda a mejorar la experiencia y el impacto ecológico de la plataforma.</p>
        <a href="/" class="btn btn-success rounded-pill px-4 py-2 shadow-sm">
            <i class="bi bi-house-door"></i> Volver al inicio
        </a>
    </div>
</div>
@endsection