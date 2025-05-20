<section>
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0"><i class="bi bi-key"></i> Actualizar contraseña</h5>
        </div>
        <div class="card-body">
            <p class="text-muted mb-4">
                Asegúrate de que tu cuenta use una contraseña larga y aleatoria para mantenerla segura.
            </p>
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="update_password_current_password" class="form-label">Contraseña actual</label>
                    <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="update_password_password" class="form-label">Nueva contraseña</label>
                    <x-text-input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="update_password_password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="d-flex align-items-center gap-3 mt-4">
                    <button type="submit" class="btn btn-secondary d-flex align-items-center gap-2 px-4 py-2 fw-bold shadow-sm">
                        <i class="bi bi-shield-lock-fill"></i>
                        Guardar
                    </button>
                    @if (session('status') === 'password-updated')
                        <span class="text-success small">¡Contraseña actualizada!</span>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
