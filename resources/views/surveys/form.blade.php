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
    @php
        $isAdmin = Auth::check() && method_exists(Auth::user(), 'isAdmin') && Auth::user()->isAdmin();
    @endphp
    <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
        @if($isAdmin)
            <a href="{{ route('survey.create') }}" class="btn btn-outline-primary rounded-pill shadow-sm">
                <i class="bi bi-ui-checks-grid"></i> Crear/Editar Encuesta
            </a>
        @else
            <a href="{{ route('survey.form') }}" class="btn btn-outline-info rounded-pill shadow-sm">
                <i class="bi bi-ui-checks-grid"></i> Encuesta de satisfacción
            </a>
        @endif
    </div>
    <div class="bg-white rounded-4 shadow-lg p-5 border-top border-4 border-success">
        @if($survey && isset($survey->questions) && is_array($survey->questions))
            <h2 class="fw-bold text-success mb-4 text-center d-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-clipboard-check"></i> {{ $survey->title }}
            </h2>
            <p class="text-muted mb-4 text-center">{{ $survey->description }}</p>
            <form method="POST" action="{{ route('survey.submit') }}">
                @csrf
                @foreach($survey->questions as $index => $question)
                    <div class="mb-4">
                        <label class="fw-semibold mb-2 text-success">{{ $question['text'] }}</label>
                        @if($question['type'] === 'scale')
                            <div class="d-flex justify-content-center gap-2 mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <label>
                                        <input type="radio" name="questions[{{ $index }}]" value="{{ $i }}" required class="me-1">{{ $i }}
                                    </label>
                                @endfor
                            </div>
                        @elseif($question['type'] === 'text')
                            <textarea name="questions[{{ $index }}]" class="form-control rounded-3 min-vh-25" placeholder="Escribe tu respuesta..." required></textarea>
                        @elseif($question['type'] === 'select' && isset($question['options']))
                            <select name="questions[{{ $index }}]" class="form-select rounded-pill text-center" required>
                                <option value="">Selecciona</option>
                                @foreach($question['options'] as $option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                @endforeach
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