@extends('layouts.app')
@section('content')
<h2>Evaluación de hábitos</h2>
<form method="POST" action="{{ route('habit_evaluation.submit') }}">
    @csrf
    <div class="mb-3">
        <label>¿Cuántos km usas transporte público por semana?</label>
        <input type="number" name="transporte" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>¿Cuántos litros de agua consumes al día?</label>
        <input type="number" name="agua" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>¿Cuántos kg de residuos generas por semana?</label>
        <input type="number" name="residuos" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Evaluar</button>
</form>
@endsection