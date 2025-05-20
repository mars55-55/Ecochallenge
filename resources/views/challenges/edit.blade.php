{{-- filepath: resources/views/challenges/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-4 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg w-100" style="max-width: 550px;">
        <div class="card-header bg-success text-white text-center position-relative">
            <a href="{{ route('challenges.index') }}" class="btn btn-outline-light position-absolute start-0 top-50 translate-middle-y ms-3">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="mb-0">Editar Reto Ecológico</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('challenges.update', $challenge) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $challenge->title) }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description', $challenge->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Categoría</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="">Selecciona una categoría</option>
                        <option value="agua" {{ $challenge->category == 'agua' ? 'selected' : '' }}>Agua</option>
                        <option value="energía" {{ $challenge->category == 'energía' ? 'selected' : '' }}>Energía</option>
                        <option value="residuos" {{ $challenge->category == 'residuos' ? 'selected' : '' }}>Residuos</option>
                        <option value="transporte" {{ $challenge->category == 'transporte' ? 'selected' : '' }}>Transporte</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="frequency" class="form-label">Frecuencia</label>
                    <select name="frequency" id="frequency" class="form-select" required>
                        <option value="diario" {{ $challenge->frequency == 'diario' ? 'selected' : '' }}>Diario</option>
                        <option value="semanal" {{ $challenge->frequency == 'semanal' ? 'selected' : '' }}>Semanal</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">CO₂ ahorrado (kg)</label>
                    <input type="number" step="0.01" name="co2_saved" class="form-control" value="{{ old('co2_saved', $challenge->co2_saved) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Agua conservada (litros)</label>
                    <input type="number" step="0.01" name="water_saved" class="form-control" value="{{ old('water_saved', $challenge->water_saved) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Residuos evitados (kg)</label>
                    <input type="number" step="0.01" name="waste_avoided" class="form-control" value="{{ old('waste_avoided', $challenge->waste_avoided) }}">
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success px-4">Actualizar Reto</button>
                    <a href="{{ route('challenges.index') }}" class="btn btn-outline-secondary px-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection