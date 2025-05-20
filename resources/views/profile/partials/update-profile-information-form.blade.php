<div class="mb-4">
    <h5 class="mb-3 text-success"><i class="bi bi-person-circle"></i> Información de perfil</h5>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="text-danger small">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-2 p-2">
                    <span>Tu correo electrónico no está verificado.</span>
                    <button form="send-verification" class="btn btn-link btn-sm p-0 align-baseline">Reenviar verificación</button>
                    @if (session('status') === 'verification-link-sent')
                        <div class="text-success small mt-1">
                            Se ha enviado un nuevo enlace de verificación a tu correo.
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="eco_preferences" class="form-label">Preferencia ecológica</label>
            <input id="eco_preferences" name="eco_preferences" type="text" class="form-control" value="{{ old('eco_preferences', $user->eco_preferences) }}">
            @error('eco_preferences')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-success px-4">Guardar</button>
            @if (session('status') === 'profile-updated')
                <span class="text-success small">¡Guardado!</span>
            @endif
        </div>
    </form>
</div>
