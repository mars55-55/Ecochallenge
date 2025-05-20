@extends('layouts.app')

@section('content')
<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 600px;">
        <div class="card-body p-5">
            <div class="d-flex align-items-center mb-3">
                <div class="bg-success bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3" style="width:56px; height:56px;">
                    <i class="bi bi-tree-fill text-success" style="font-size:2rem;"></i>
                </div>
                <div>
                    <h1 class="fw-bold text-success mb-0">{{ $challenge->title }}</h1>
                    <div class="mt-1">
                        <span class="badge bg-success bg-opacity-75 me-1">{{ $challenge->category }}</span>
                        <span class="badge bg-primary bg-opacity-75">Frecuencia: {{ $challenge->frequency }}</span>
                    </div>
                </div>
            </div>
            <hr>
            <p class="text-secondary fs-5 mb-4">{{ $challenge->description }}</p>
            @if(Auth::user() && Auth::user()->isAdmin())
                <div class="d-flex gap-2 mb-4">
                    <a href="{{ route('challenges.edit', $challenge) }}" class="btn btn-warning rounded-pill shadow-sm">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    <form action="{{ route('challenges.destroy', $challenge) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este reto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-pill shadow-sm">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            @endif

            @if(Auth::user()->challenges->contains($challenge))
                @if(is_null(Auth::user()->challenges->find($challenge->id)->pivot->completed_at))
                    <form method="POST" action="{{ route('challenges.complete', $challenge) }}" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg rounded-pill w-100 shadow-sm">
                            <i class="bi bi-check2-circle"></i> Marcar como completado
                        </button>
                    </form>
                @else
                    <div class="alert alert-success d-flex align-items-center gap-2 mt-4 rounded-pill justify-content-center mb-0 shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill fs-4"></i>
                        <span class="fw-semibold">¡Completado!</span>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection