@extends('layouts.app')
@section('content')
<div class="container py-5 max-w-lg mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-8 border-t-4 border-green-400 flex flex-col items-center">
        <i class="bi bi-emoji-smile text-5xl text-green-500 mb-4"></i>
        <h2 class="text-2xl font-bold text-green-700 mb-2">¡Gracias por completar la encuesta!</h2>
        <p class="text-gray-600">Tu opinión nos ayuda a mejorar la experiencia y el impacto ecológico de la plataforma.</p>
        <a href="/" class="btn btn-success rounded-pill mt-6">Volver al inicio</a>
    </div>
</div>
@endsection