@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm rounded-pill shadow-sm">
            <i class="bi bi-arrow-left"></i> Volver al inicio
        </a>
        <h1 class="fw-bold text-success mb-0 flex-grow-1 text-center"><i class="bi bi-tree-fill"></i> Retos ecológicos</h1>
        <span style="width: 40px;"></span> <!-- Espaciador visual -->
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($challenges as $challenge)
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col border-t-4 border-green-400 hover:shadow-2xl transition-shadow duration-200">
                <h3 class="text-xl font-semibold mb-2 text-green-700 flex items-center gap-2">
                    <i class="bi bi-tree-fill"></i> {{ $challenge->title }}
                </h3>
                <span class="inline-block text-xs bg-green-100 text-green-700 rounded-full px-3 py-1 mb-2">{{ $challenge->category }}</span>
                <p class="text-gray-600 mb-4">{{ $challenge->description }}</p>
                <a href="{{ route('challenges.show', $challenge) }}" class="mt-auto btn btn-success rounded-pill w-full">Ver detalle</a>
            </div>
        @endforeach
    </div>
</div>
@endsection