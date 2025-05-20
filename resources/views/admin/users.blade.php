@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="mb-3">
        <a href="{{ url('/dashboard') }}" class="btn btn-outline-success rounded-pill">
            <i class="bi bi-arrow-left"></i> Volver al Panel Admin
        </a>
    </div>
    <h1 class="fw-bold mb-4 text-success"><i class="bi bi-people"></i> Gestión de Usuarios</h1>
    <div class="card shadow border-0 rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Fecha de registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr data-user-id="{{ $user->id }}">
                            <td class="fw-bold text-secondary">{{ $user->id }}</td>
                            <td style="min-width:160px"><input type="text" class="form-control form-control-sm name-input" value="{{ $user->name }}" /></td>
                            <td style="min-width:200px"><input type="email" class="form-control form-control-sm email-input" value="{{ $user->email }}" /></td>
                            <td style="min-width:120px">
                                <select class="form-select form-select-sm role-input">
                                    <option value="user" @if($user->role=='user') selected @endif>Usuario</option>
                                    <option value="admin" @if($user->role=='admin') selected @endif>Administrador</option>
                                </select>
                            </td>
                            <td class="text-muted">{{ $user->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-success btn-sm save-user-btn" title="Guardar cambios"><i class="bi bi-save"></i></button>
                                    <button class="btn btn-danger btn-sm delete-user-btn" title="Eliminar usuario"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.save-user-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var row = btn.closest('tr');
            var userId = row.getAttribute('data-user-id');
            var name = row.querySelector('.name-input').value;
            var email = row.querySelector('.email-input').value;
            var role = row.querySelector('.role-input').value;
            fetch(`/admin/users/${userId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ name, email, role })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-secondary');
                    btn.innerHTML = '<i class="bi bi-check2"></i>';
                    setTimeout(() => {
                        btn.classList.remove('btn-secondary');
                        btn.classList.add('btn-success');
                        btn.innerHTML = '<i class="bi bi-save"></i>';
                    }, 1500);
                } else {
                    alert('Error al guardar');
                }
            })
            .catch(() => alert('Error al guardar'));
        });
    });
    document.querySelectorAll('.delete-user-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            if(!confirm('¿Seguro que deseas eliminar este usuario?')) return;
            var row = btn.closest('tr');
            var userId = row.getAttribute('data-user-id');
            fetch(`/admin/users/${userId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    row.classList.add('table-danger');
                    setTimeout(() => row.remove(), 500);
                } else {
                    alert('Error al eliminar');
                }
            })
            .catch(() => alert('Error al eliminar'));
        });
    });
});
</script>
@endsection
