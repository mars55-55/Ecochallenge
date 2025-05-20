<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Eliminar cuenta
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Una vez que elimines tu cuenta, todos tus recursos y datos serán eliminados permanentemente. Antes de eliminar tu cuenta, por favor descarga cualquier dato o información que desees conservar.
        </p>
    </header>

    <div class="mb-4">
        <h5 class="mb-3 text-danger"><i class="bi bi-trash"></i> Eliminar cuenta</h5>
        <p class="text-muted">
            Una vez que elimines tu cuenta, todos tus datos serán borrados permanentemente. Antes de continuar, descarga cualquier información que desees conservar.
        </p>
        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
            Eliminar cuenta
        </button>

        <!-- Modal de confirmación -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="deleteAccountModalLabel">¿Estás seguro?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Esta acción eliminará tu cuenta y todos tus datos de forma permanente.<br>
                                Ingresa tu contraseña para confirmar:
                            </p>
                            <div class="mb-3">
                                <label for="delete_password" class="form-label">Contraseña</label>
                                <input id="delete_password" name="password" type="password" class="form-control" placeholder="Contraseña">
                                @error('password', 'userDeletion')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
