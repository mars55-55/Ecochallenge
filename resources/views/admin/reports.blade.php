@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4"><i class="bi bi-flag"></i> Reportes de la Comunidad</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
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
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->topic_id ? 'Tema' : 'Comentario' }}</td>
                    <td>
                        @if($report->topic_id)
                            <a href="{{ route('topics.show', $report->topic_id) }}">Ver tema</a>
                        @else
                            <a href="{{ route('topics.show', $report->comment->topic_id) }}#comment-{{ $report->comment_id }}">Ver comentario</a>
                        @endif
                    </td>
                    <td>{{ $report->reason }}</td>
                    <td>{{ $report->user->name }}</td>
                    <td>{{ $report->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($report->topic_id)
                        <form action="{{ route('topics.destroy', $report->topic_id) }}" method="POST" onsubmit="return confirm('¿Eliminar tema y todos sus comentarios?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Eliminar tema</button>
                        </form>
                        @else
                        <form action="{{ route('comments.destroy', $report->comment_id) }}" method="POST" onsubmit="return confirm('¿Eliminar comentario?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Eliminar comentario</button>
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
@endsection
