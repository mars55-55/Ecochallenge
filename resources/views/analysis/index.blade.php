{{-- filepath: resources/views/analysis/index.blade.php --}}
@extends('layouts.app')
@section('content')
<h2>Análisis de tus acciones y hábitos</h2>

<div class="mb-4">
    <h4>Encuestas de satisfacción</h4>
    <p>Promedio de satisfacción: <strong>{{ $satisfaccionAvg ? number_format($satisfaccionAvg, 2) : 'Sin datos' }}</strong></p>
</div>

<div class="mb-4">
    <h4>Acciones ecológicas registradas</h4>
    <p>Total de acciones: <strong>{{ $manualActionsCount }}</strong></p>
</div>

<div class="mb-4">
    <h4>Evaluación de hábitos</h4>
    <p>Promedio de huella de carbono: <strong>{{ $habitAvg ? number_format($habitAvg, 2) : 'Sin datos' }}</strong></p>
</div>
@endsection