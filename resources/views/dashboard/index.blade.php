@extends('layouts.app')

@section('content')
<h1>Mi Progreso</h1>
<p>Retos completados: {{ $completed_challenges }}</p>
<p>CO₂ ahorrado: {{ $total_co2 }} kg</p>
<p>Agua conservada: {{ $total_water }} litros</p>
<p>Residuos evitados: {{ $total_waste }} kg</p>
<a href="{{ route('metrics.history') }}">Ver evolución</a>
@endsection