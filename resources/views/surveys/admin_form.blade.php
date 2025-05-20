@extends('layouts.app')
@section('content')
<div class="container py-5 max-w-2xl mx-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill shadow-sm">
            <i class="bi bi-arrow-left"></i> Volver al panel admin
        </a>
        <h2 class="fw-bold text-primary mb-0 flex-grow-1 text-center"><i class="bi bi-ui-checks-grid"></i> Crear/Editar Encuesta</h2>
        <span style="width: 40px;"></span>
    </div>
    <div class="bg-white rounded-4 shadow-lg p-5 border-top border-4 border-primary">
        <form method="POST" action="{{ isset($survey) ? route('survey.update', $survey) : route('survey.store') }}">
            @csrf
            @if(isset($survey))
                @method('PUT')
            @endif
            <div class="mb-4">
                <label class="fw-semibold mb-2 text-primary">Título de la encuesta:</label>
                <input type="text" name="title" class="form-control rounded-pill" value="{{ old('title', $survey->title ?? '') }}" required>
            </div>
            <div class="mb-4">
                <label class="fw-semibold mb-2 text-primary">Descripción:</label>
                <textarea name="description" class="form-control rounded-3" required>{{ old('description', $survey->description ?? '') }}</textarea>
            </div>
            <div id="questions-area">
                <label class="fw-semibold mb-2 text-primary">Preguntas:</label>
                <div id="questions-list">
                    @if(old('questions', $survey->questions ?? false))
                        @foreach(old('questions', $survey->questions ?? []) as $i => $q)
                            <div class="card mb-3 p-3 question-item">
                                <div class="mb-2">
                                    <input type="text" name="questions[{{ $i }}][text]" class="form-control mb-2" placeholder="Texto de la pregunta" value="{{ $q['text'] ?? '' }}" required>
                                    <select name="questions[{{ $i }}][type]" class="form-select mb-2 question-type-select" required>
                                        <option value="scale" @if(($q['type'] ?? '')=='scale') selected @endif>Escala 1-5</option>
                                        <option value="text" @if(($q['type'] ?? '')=='text') selected @endif>Respuesta abierta</option>
                                        <option value="select" @if(($q['type'] ?? '')=='select') selected @endif>Opción múltiple</option>
                                    </select>
                                    <input type="text" name="questions[{{ $i }}][options]" class="form-control mb-2 question-options" placeholder="Opciones (separadas por coma)"
                                        value="{{ isset($q['options']) ? (is_array($q['options']) ? implode(',', $q['options']) : $q['options']) : '' }}"
                                        @if(($q['type'] ?? '')!='select') style="display:none;" @endif>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm remove-question">Eliminar</button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-outline-primary mt-2" id="add-question"><i class="bi bi-plus-circle"></i> Agregar pregunta</button>
            </div>
            <button type="submit" class="btn btn-primary rounded-pill w-100 fs-5 shadow mt-4"><i class="bi bi-save"></i> Guardar encuesta</button>
        </form>
    </div>
</div>
<script>
    let questionIndex = document.querySelectorAll('.question-item').length || 0;
    document.getElementById('add-question').onclick = function() {
        const list = document.getElementById('questions-list');
        const div = document.createElement('div');
        div.className = 'card mb-3 p-3 question-item';
        div.innerHTML = `
            <div class="mb-2">
                <input type="text" name="questions[
                    ${questionIndex}
                ][text]" class="form-control mb-2" placeholder="Texto de la pregunta" required>
                <select name="questions[${questionIndex}][type]" class="form-select mb-2 question-type-select" required>
                    <option value="scale">Escala 1-5</option>
                    <option value="text">Respuesta abierta</option>
                    <option value="select">Opción múltiple</option>
                </select>
                <input type="text" name="questions[${questionIndex}][options]" class="form-control mb-2 question-options" placeholder="Opciones (separadas por coma)" style="display:none;">
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-question">Eliminar</button>
        `;
        list.appendChild(div);
        questionIndex++;
    };
    document.addEventListener('change', function(e) {
        if(e.target.classList.contains('question-type-select')) {
            const optionsInput = e.target.parentNode.querySelector('.question-options');
            if(e.target.value === 'select') {
                optionsInput.style.display = '';
            } else {
                optionsInput.style.display = 'none';
            }
        }
    });
    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('remove-question')) {
            e.target.closest('.question-item').remove();
        }
    });
</script>
@endsection
