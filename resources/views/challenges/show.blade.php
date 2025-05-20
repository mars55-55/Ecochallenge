@extends('layouts.app')

@section('content')
<div class="container py-5 max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-8 border-t-4 border-green-400">
        <h1 class="text-3xl font-bold mb-4 text-green-700 flex items-center gap-2">
            <i class="bi bi-tree-fill"></i> {{ $challenge->title }}
        </h1>
        <div class="mb-2">
            <span class="inline-block text-xs bg-green-100 text-green-700 rounded-full px-3 py-1">{{ $challenge->category }}</span>
            <span class="inline-block text-xs bg-blue-100 text-blue-700 rounded-full px-3 py-1 ml-2">Frecuencia: {{ $challenge->frequency }}</span>
        </div>
        <p class="text-gray-700 my-4">{{ $challenge->description }}</p>
        @if(Auth::user() && Auth::user()->isAdmin())
            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('challenges.edit', $challenge) }}" class="btn btn-warning rounded-pill">Editar</a>
                <form action="{{ route('challenges.destroy', $challenge) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este reto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-pill">Eliminar</button>
                </form>
            </div>
        @endif
        @if(Auth::user()->challenges->contains($challenge))
            @if(is_null(Auth::user()->challenges->find($challenge->id)->pivot->completed_at))
                <form method="POST" action="{{ route('challenges.complete', $challenge) }}" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-success rounded-pill w-full">Marcar como completado</button>
                </form>
            @else
                <span class="inline-block mt-4 px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full font-semibold"><i class="bi bi-check-circle-fill"></i> ¡Completado!</span>
            @endif
        @endif
    </div>
</div>
@endsection