@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm rounded-pill shadow-sm">
            <i class="bi bi-arrow-left"></i> Volver al inicio
        </a>
        <h1 class="fw-bold text-success mb-0 flex-grow-1 text-center">
            <i class="bi bi-tree-fill"></i> Retos ecológicos
        </h1>
        @if(Auth::user() && Auth::user()->isAdmin())
            <a href="{{ route('challenges.create') }}" class="btn btn-success rounded-pill shadow-sm">
                <i class="bi bi-plus-circle"></i> Crear reto
            </a>
        @else
            <span style="width: 40px;"></span>
        @endif
    </div>
    <div class="row g-4">
        @forelse($challenges as $challenge)
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card shadow border-0 rounded-4 flex-fill h-100 hover-shadow position-relative">
                    <div class="card-body d-flex flex-column p-4">
                        <div class="d-flex align-items-center mb-2">
                            <div class="bg-success bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3" style="width:40px; height:40px;">
                                <i class="bi bi-tree-fill text-success" style="font-size:1.5rem;"></i>
                            </div>
                            <h5 class="fw-bold mb-0 text-success">{{ $challenge->title }}</h5>
                        </div>
                        <div class="mb-2">
                            <span class="badge bg-success bg-opacity-75 me-1">{{ $challenge->category }}</span>
                            <span class="badge bg-primary bg-opacity-75">Frecuencia: {{ $challenge->frequency }}</span>
                        </div>
                        <p class="text-muted mb-4 flex-grow-1">{{ $challenge->description }}</p>
                        <a href="{{ route('challenges.show', $challenge) }}" class="btn btn-outline-success rounded-pill w-100 mt-auto">
                            <i class="bi bi-eye"></i> Ver detalle
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <span class="text-muted">No hay retos ecológicos disponibles por ahora.</span>
            </div>
        @endforelse
    </div>
</div>
@endsection