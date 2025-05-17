@extends('layouts.app')
@section('content')
<h2>Registrar acción ecológica</h2>
<form method="POST" action="{{ route('manual-actions.store') }}">
    @csrf
    <div class="mb-3">
        <label>Acción</label>
        <input type="text" name="action" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Fecha</label>
        <input type="date" name="date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Registrar</button>
</form>
@endsection