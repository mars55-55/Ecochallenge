@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm rounded-pill me-2">
                <i class="bi bi-arrow-left"></i> Volver al inicio
            </a>
            <h3 class="fw-bold d-inline align-middle ms-2"><i class="bi bi-chat-dots"></i> Foro de la Comunidad</h3>
        </div>
        <a href="{{ route('topics.create') }}" class="btn btn-success btn-sm rounded-pill shadow-sm">
            <i class="bi bi-plus-circle"></i> Nuevo Tema
        </a>
    </div>
    @forelse($topics as $topic)
        <div class="card mb-4 shadow-sm border-0 rounded-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('topics.show', $topic) }}" class="fw-semibold text-dark fs-5">{{ $topic->title }}</a>
                        <div class="small text-muted mt-1">
                            Por <span class="fw-semibold">{{ $topic->user->name }}</span> · {{ $topic->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-end">
                        <form action="{{ route('reactions.store', $topic) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-outline-success btn-sm rounded-pill me-1" title="Reaccionar">
                                <i class="bi bi-hand-thumbs-up"></i>
                                {{ $topic->reactions->count() ?? 0 }}
                            </button>
                        </form>
                        <form action="{{ route('topics.report', $topic) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="button" class="btn btn-outline-danger btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#reportTopicModal{{ $topic->id }}">
                                <i class="bi bi-flag"></i>
                            </button>
                        </form>
                        <!-- Modal para motivo de reporte de tema -->
                        <div class="modal fade" id="reportTopicModal{{ $topic->id }}" tabindex="-1" aria-labelledby="reportTopicModalLabel{{ $topic->id }}" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form method="POST" action="{{ route('topics.report', $topic) }}">
                                @csrf
                                <div class="modal-header">
                                  <h5 class="modal-title" id="reportTopicModalLabel{{ $topic->id }}">Reportar tema</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                  <label for="reason{{ $topic->id }}" class="form-label">Motivo del reporte</label>
                                  <input type="text" name="reason" id="reason{{ $topic->id }}" class="form-control" required maxlength="255" placeholder="Describe el motivo">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                  <button type="submit" class="btn btn-danger">Enviar reporte</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        @if(Auth::check() && method_exists(Auth::user(), 'isAdmin') && Auth::user()->isAdmin())
                        <form action="{{ route('topics.destroy', $topic) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este tema?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm rounded-pill ms-1" title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                <div class="mt-3 text-muted">
                    {{ Str::limit($topic->body, 120) }}
                </div>
                <div class="mt-3">
                    <a href="{{ route('topics.show', $topic) }}" class="btn btn-outline-primary btn-sm rounded-pill">Ver y comentar</a>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">No hay temas publicados aún.</div>
    @endforelse
    <div class="d-flex justify-content-center mt-4">
        {{ $topics->links() }}
    </div>
</div>
@endsection