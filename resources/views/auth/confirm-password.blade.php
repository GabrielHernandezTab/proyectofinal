<x-guest-layout>
    <div class="mb-4 text-sm" style="color:#111827;">
        Esta es una zona segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div>
            <x-input-label for="password" value="Contraseña" style="color:#111827; font-weight:700;" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button style="background-color:#1DB954;">
                Confirmar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>