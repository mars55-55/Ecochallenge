@extends('layouts.app')
@section('content')
<div class="container py-5 max-w-xl mx-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm rounded-pill shadow-sm">
            <i class="bi bi-arrow-left"></i> Volver al inicio
        </a>
        <h2 class="fw-bold text-success mb-0 flex-grow-1 text-center"><i class="bi bi-clipboard-check"></i> Encuesta de satisfacción</h2>
        <span style="width: 40px;"></span>
    </div>
    <div class="bg-white rounded-4 shadow-lg p-5 border-top border-4 border-success">
        @if($survey)
            <h2 class="fw-bold text-success mb-4 text-center d-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-clipboard-check"></i> {{ $survey->title }}
            </h2>
            <p class="text-muted mb-4 text-center">{{ $survey->description }}</p>
            <form method="POST" action="{{ route('survey.submit') }}">
                @csrf
                <div class="mb-4">
                    <label class="fw-semibold mb-2 text-success">Satisfacción general:</label>
                    <div class="d-flex justify-content-center gap-2 mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" class="btn btn-outline-success rounded-circle px-3 py-2 disabled">{{ $i }}</button>
                        @endfor
                    </div>
                    <select name="satisfaccion" class="form-select rounded-pill text-center" required>
                        <option value="">Selecciona</option>
                        <option value="1">Muy baja</option>
                        <option value="2">Baja</option>
                        <option value="3">Media</option>
                        <option value="4">Alta</option>
                        <option value="5">Muy alta</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="fw-semibold mb-2 text-success">Comentarios:</label>
                    <textarea name="comentarios" class="form-control rounded-3 min-vh-25" placeholder="Escribe tus comentarios..."></textarea>
                </div>
                <button type="submit" class="btn btn-success rounded-pill w-100 fs-5 shadow"><i class="bi bi-send"></i> Enviar</button>
            </form>
        @else
            <div class="alert alert-warning text-center rounded-4">
                No hay encuestas disponibles en este momento.
            </div>
        @endif
    </div>
</div>
@endsection