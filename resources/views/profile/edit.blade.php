@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="d-flex justify-content-end mb-4">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-success rounded-pill px-4 d-flex align-items-center gap-2 shadow-sm">
                    <i class="bi bi-house-door"></i>
                    Volver a inicio
                </a>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="bi bi-person-circle"></i> Editar perfil</h4>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="bi bi-key"></i> Cambiar contraseña</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0"><i class="bi bi-trash"></i> Eliminar cuenta</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
