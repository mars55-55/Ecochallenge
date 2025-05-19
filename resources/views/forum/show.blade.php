@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="mb-3">
        <a href="{{ route('topics.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">
            <i class="bi bi-arrow-left"></i> Volver al foro
        </a>
    </div>
    <div class="card mb-4 shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h2 class="fw-bold text-success mb-2"><i class="bi bi-chat-dots"></i> {{ $topic->title }}</h2>
            <div class="mb-2 text-muted small">
                Por <span class="fw-semibold">{{ $topic->user->name }}</span> · {{ $topic->created_at->diffForHumans() }}
            </div>
            <div class="fs-5 mb-3">{{ $topic->body }}</div>
            <div class="mt-3">
                <form action="{{ route('reactions.store', $topic) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-success btn-sm rounded-pill me-1">
                        <i class="bi bi-hand-thumbs-up"></i> Reaccionar
                    </button>
                </form>
                <form action="{{ route('topics.report', $topic) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#reportTopicModal">
                        <i class="bi bi-flag"></i> Reportar
                    </button>
                </form>
                <!-- Modal para motivo de reporte de tema -->
                <div class="modal fade" id="reportTopicModal" tabindex="-1" aria-labelledby="reportTopicModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form method="POST" action="{{ route('topics.report', $topic) }}">
                        @csrf
                        <div class="modal-header">
                          <h5 class="modal-title" id="reportTopicModalLabel">Reportar tema</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                          <label for="reason" class="form-label">Motivo del reporte</label>
                          <input type="text" name="reason" id="reason" class="form-control" required maxlength="255" placeholder="Describe el motivo">
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
                    <button class="btn btn-danger btn-sm rounded-pill ms-1" title="Eliminar tema">
                        <i class="bi bi-trash"></i> Eliminar
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
    <h5 class="fw-bold mb-3"><i class="bi bi-chat-left-text"></i> Comentarios</h5>
    @forelse($topic->comments as $comment)
        <div class="card mb-2 ms-4 shadow-sm border-0 rounded-4">
            <div class="card-body py-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="fw-semibold text-primary">{{ $comment->user->name }}:</span>
                        <span class="text-dark">{{ $comment->body }}</span>
                    </div>
                    <div>
                        <form action="{{ route('comments.reactions.store', $comment) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-outline-success btn-sm rounded-pill me-1" title="Reaccionar">
                                <i class="bi bi-hand-thumbs-up"></i>
                            </button>
                        </form>
                        <form action="{{ route('comments.report', $comment) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="button" class="btn btn-outline-danger btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#reportCommentModal{{ $comment->id }}">
                                <i class="bi bi-flag"></i>
                            </button>
                        </form>
                        <!-- Modal para motivo de reporte de comentario -->
                        <div class="modal fade" id="reportCommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="reportCommentModalLabel{{ $comment->id }}" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form method="POST" action="{{ route('comments.report', $comment) }}">
                                @csrf
                                <div class="modal-header">
                                  <h5 class="modal-title" id="reportCommentModalLabel{{ $comment->id }}">Reportar comentario</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                  <label for="reason{{ $comment->id }}" class="form-label">Motivo del reporte</label>
                                  <input type="text" name="reason" id="reason{{ $comment->id }}" class="form-control" required maxlength="255" placeholder="Describe el motivo">
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
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este comentario?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm rounded-pill ms-1" title="Eliminar comentario">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info ms-4">No hay comentarios aún.</div>
    @endforelse

    <form action="{{ route('comments.store', $topic) }}" method="POST" class="mt-4">
        @csrf
        <div class="input-group">
            <input type="text" name="body" class="form-control" placeholder="Escribe un comentario..." required>
            <button class="btn btn-success" type="submit"><i class="bi bi-send"></i> Comentar</button>
        </div>
    </form>
</div>
@endsection