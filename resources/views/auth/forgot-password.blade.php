<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¿Olvidaste tu contraseña? Introduce tu email y te enviaremos un enlace para restablecerla.') }}
    </div>

    @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ __(session('status')) }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email"
                name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <button type="submit"
                style="width:100%; background-color:#1DB954; color:#fff;
                       padding:13px 0; border:none; border-radius:8px;
                       font-size:15px; font-weight:700; cursor:pointer;
                       letter-spacing:0.5px;">
                Enviar enlace para restablecer contraseña
            </button>
        </div>
    </form>
</x-guest-layout>