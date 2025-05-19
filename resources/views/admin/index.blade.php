@extends('layouts.app')
@section('content')
<h2>Panel de Administración</h2>
<ul>
    <li><a href="{{ route('challenges.index') }}">Gestionar Retos</a></li>
    <li><a href="{{ route('topics.index') }}">Gestionar Publicaciones</a></li>
    <li><a href="{{ route('admin.index') }}">Gestionar Usuarios</a></li>
    <li><a href="{{ route('survey.form') }}">Gestionar Formularios</a></li>
    <li><a href="{{ route('admin.reports') }}">Gestionar Reportes</a></li>
</ul>
@endsection