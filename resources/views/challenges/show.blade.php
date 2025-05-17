@extends('layouts.app')

@section('content')
<h1>{{ $challenge->title }}</h1>
<p>{{ $challenge->description }}</p>
<p>Categoría: {{ $challenge->category }}</p>
<p>Frecuencia: {{ $challenge->frequency }}</p>
@if(Auth::user()->challenges->contains($challenge))
    @if(is_null(Auth::user()->challenges->find($challenge->id)->pivot->completed_at))
        <form method="POST" action="{{ route('challenges.complete', $challenge) }}">
            @csrf
            <button type="submit">Marcar como completado</button>
        </form>
    @else
        <span>¡Completado!</span>
    @endif
@endif
@endsection