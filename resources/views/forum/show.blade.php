<x-app-layout>
    <div class="container py-4">
        <div class="mb-3">
            <a href="{{ route('topics.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">
                <i class="bi bi-arrow-left"></i> Volver al foro
            </a>
        </div>
        <div class="card mb-4 shadow-sm border-0 rounded-4">
            <div class="card-body">
                <h4 class="fw-bold">{{ $topic->title }}</h4>
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
                        <button class="btn btn-outline-danger btn-sm rounded-pill">
                            <i class="bi bi-flag"></i> Reportar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <h5 class="fw-bold mb-3">Comentarios</h5>
        @forelse($topic->comments as $comment)
            <div class="card mb-2 ms-4 shadow-sm border-0 rounded-4">
                <div class="card-body py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="fw-semibold">{{ $comment->user->name }}:</span>
                            {{ $comment->body }}
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
                                <button class="btn btn-outline-danger btn-sm rounded-pill" title="Reportar">
                                    <i class="bi bi-flag"></i>
                                </button>
                            </form>
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
                <button class="btn btn-success" type="submit">Comentar</button>
            </div>
        </form>
    </div>
</x-app-layout>