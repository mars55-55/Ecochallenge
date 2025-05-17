{{-- filepath: resources/views/challenges/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-success">Crear Reto Ecológico</h2>
    <form action="{{ route('challenges.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoría</label>
            <select name="category" id="category" class="form-select" required>
                <option value="">Selecciona una categoría</option>
                <option value="agua">Agua</option>
                <option value="energía">Energía</option>
                <option value="residuos">Residuos</option>
                <option value="transporte">Transporte</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="frequency" class="form-label">Frecuencia</label>
            <select name="frequency" id="frequency" class="form-select" required>
                <option value="diario">Diario</option>
                <option value="semanal">Semanal</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">CO₂ ahorrado (kg)</label>
            <input type="number" step="0.01" name="co2_saved" class="form-control" value="{{ old('co2_saved') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Agua conservada (litros)</label>
            <input type="number" step="0.01" name="water_saved" class="form-control" value="{{ old('water_saved') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Residuos evitados (kg)</label>
            <input type="number" step="0.01" name="waste_avoided" class="form-control" value="{{ old('waste_avoided') }}">
        </div>
        <button type="submit" class="btn btn-success">Crear Reto</button>
        <a href="{{ route('challenges.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection