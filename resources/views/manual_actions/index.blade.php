@extends('layouts.app')
@section('content')
<h2>Mis acciones ecológicas</h2>
<table class="table">
    <thead>
        <tr>
            <th>Acción</th>
            <th>Descripción</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach($actions as $action)
        <tr>
            <td>{{ $action->action }}</td>
            <td>{{ $action->description }}</td>
            <td>{{ $action->date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection