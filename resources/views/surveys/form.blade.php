@extends('layouts.app')
@section('content')
<h2>{{ $survey->title }}</h2>
<p>{{ $survey->description }}</p>
<form method="POST" action="{{ route('survey.submit') }}">
    @csrf
    <div class="mb-3">
        <label>Satisfacción general:</label>
        <select name="satisfaccion" class="form-select" required>
            <option value="">Selecciona</option>
            <option value="1">Muy baja</option>
            <option value="2">Baja</option>
            <option value="3">Media</option>
            <option value="4">Alta</option>
            <option value="5">Muy alta</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Comentarios:</label>
        <textarea name="comentarios" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>
@endsection