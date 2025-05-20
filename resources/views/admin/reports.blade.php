@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0 text-success"><i class="bi bi-flag"></i> Reportes de la Comunidad</h2>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary rounded-pill"><i class="bi bi-arrow-left"></i> Volver al panel</a>
    </div>
    <div class="card shadow border-0 rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Contenido</th>
                            <th>Motivo</th>
                            <th>Reportado por</th>
                            <th>Fecha</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reports as $report)
                        <tr>
                            <td class="fw-semibold">{{ $report->id }}</td>
                            <td>
                                <span class="badge {{ $report->topic_id ? 'bg-primary' : 'bg-info' }}">{{ $report->topic_id ? 'Tema' : 'Comentario' }}</span>
                            </td>
                            <td>
                                @if($report->topic_id)
                                    <a href="{{ route('topics.show', $report->topic_id) }}" class="text-decoration-underline">Ver tema</a>
                                @else
                                    <a href="{{ route('topics.show', $report->comment->topic_id) }}#comment-{{ $report->comment_id }}" class="text-decoration-underline">Ver comentario</a>
                                @endif
                            </td>
                            <td><span class="text-danger">{{ $report->reason }}</span></td>
                            <td><span class="fw-semibold text-primary">{{ $report->user->name }}</span></td>
                            <td><span class="text-muted small">{{ $report->created_at->format('d/m/Y H:i') }}</span></td>
                            <td>
                                @if($report->topic_id)
                                <form action="{{ route('topics.destroy', $report->topic_id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar tema y todos sus comentarios?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm rounded-pill"><i class="bi bi-trash"></i> Eliminar tema</button>
                                </form>
                                @else
                                <form action="{{ route('comments.destroy', $report->comment_id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar comentario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm rounded-pill"><i class="bi bi-trash"></i> Eliminar comentario</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="text-center text-muted">No hay reportes pendientes.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
