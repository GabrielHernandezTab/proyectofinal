<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¡Gracias por registrarte! Antes de continuar, verifica tu dirección de correo haciendo clic en el enlace que te hemos enviado. Si no lo recibiste, te enviamos otro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ __('Se ha enviado un nuevo enlace de verificación a tu correo electrónico.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                style="background-color:#1DB954; color:#fff; padding:12px 24px;
                       border:none; border-radius:8px; font-size:15px;
                       font-weight:600; cursor:pointer; letter-spacing:0.5px;">
                Reenviar correo de verificación
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                style="background:none; border:none; color:#6b7280;
                       cursor:pointer; font-size:14px; text-decoration:underline;">
                Cerrar sesión
            </button>
        </form>
    </div>
</x-guest-layout>