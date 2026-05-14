<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            Eliminar cuenta
        </h2>
        <p class="mt-1 text-sm" style="color: #111827;">
            Una vez que tu cuenta sea eliminada, todos sus recursos y datos se borrarán permanentemente.
        </p>
    </header>


    {{-- Modal Bootstrap --}}
    <div class="modal fade" id="modalEliminarCuenta" tabindex="-1" aria-labelledby="modalEliminarCuentaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-dark">

                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="modal-body">
                        <p class="text-sm mb-3" style="color: #111827;">
                            Escribe tu contraseña para confirmar que deseas eliminar tu cuenta permanentemente:
                        </p>

                        <input
                            type="password"
                            id="password_delete"
                            name="password"
                            class="form-control"
                            placeholder="Tu contraseña actual"
                            required
                        />

                        @if ($errors->userDeletion->has('password'))
                            <p class="text-danger mt-1 small">{{ $errors->userDeletion->first('password') }}</p>
                        @endif
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none transition ease-in-out duration-150">Sí, eliminar mi cuenta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Reabre el modal si hubo error de validación --}}
    @if ($errors->userDeletion->isNotEmpty())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = new bootstrap.Modal(document.getElementById('modalEliminarCuenta'));
            modal.show();
        });
    </script>
    @endif
</section>