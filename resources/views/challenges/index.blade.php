@extends('layouts.app')

@section('content')
<h1>Retos ecológicos</h1>
@foreach($challenges as $challenge)
    <div>
        <h3>{{ $challenge->title }} ({{ $challenge->category }})</h3>
        <p>{{ $challenge->description }}</p>
        <a href="{{ route('challenges.show', $challenge) }}">Ver detalle</a>
    </div>
@endforeach
@endsection