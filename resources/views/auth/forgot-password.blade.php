<x-guest-layout>
    <div class="mb-4 text-sm" style="color:#111827; font-weight: 500;">
        ¿Olvidaste tu contraseña? Introduce tu email y te enviaremos un enlace para restablecerla.
    </div>

    @if (session('status'))
        <div class="mb-4 p-4" style="background-color:#0d2a1a; border:1px solid #1DB954;
             border-radius:8px; color:#1DB954; font-size:14px;">
            ✅ Te hemos enviado el enlace. Revisa tu bandeja de entrada o la carpeta de <strong>spam</strong>.
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <x-input-label for="email" :value="__('Email')" style="color:#111827; font-weight: 500;" />
            <x-text-input id="email" class="block mt-1 w-full" type="email"
                name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <button type="submit" 
                style="width:100%; background-color:#1DB954; color:#ffffff; 
                    padding:13px 0; border:none; border-radius:8px; 
                    font-size:15px; font-weight:700; cursor:pointer;">
                Enviar enlace para restablecer contraseña
            </button>
        </div>
    </form>
</x-guest-layout>