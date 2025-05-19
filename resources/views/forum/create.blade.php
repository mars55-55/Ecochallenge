@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="mb-3">
        <a href="{{ route('topics.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">
            <i class="bi bi-arrow-left"></i> Volver al foro
        </a>
    </div>
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h3 class="fw-bold mb-3 text-success"><i class="bi bi-chat-dots"></i> Crear nuevo tema</h3>
            <form action="{{ route('topics.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" id="title" class="form-control" required maxlength="255">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Contenido</label>
                    <textarea name="body" id="body" class="form-control" rows="5" required></textarea>
                </div>
                <button class="btn btn-success"><i class="bi bi-send"></i> Publicar</button>
                <a href="{{ route('topics.index') }}" class="btn btn-link">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection