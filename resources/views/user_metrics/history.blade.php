@extends('layouts.app')

@section('content')
<h1>Evolución de tu impacto</h1>
<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>CO₂ ahorrado</th>
            <th>Agua conservada</th>
            <th>Residuos evitados</th>
        </tr>
    </thead>
    <tbody>
        @foreach($metrics as $metric)
        <tr>
            <td>{{ $metric->date }}</td>
            <td>{{ $metric->co2_saved }}</td>
            <td>{{ $metric->water_saved }}</td>
            <td>{{ $metric->waste_avoided }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection