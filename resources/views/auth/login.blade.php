<x-guest-layout>
    
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="fw-bold mb-1" style="color: #1a2b4b;" />
            <input id="email" type="email" name="email" class="input-suave" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="ejemplo@correo.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="fw-bold mb-1" style="color: #1a2b4b;" />
            <input id="password" type="password" name="password" class="input-suave" required autocomplete="current-password" placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-success shadow-sm focus:ring-success" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="text-decoration-none text-sm text-gray-600 hover:text-success" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            <button type="submit" class="btn fw-bold text-white ms-3" 
                style="background-color: #00b36b; border: none; padding: 10px 25px; border-radius: 10px; text-transform: uppercase;">
            {{ __('Iniciar Sesión') }}
            </button>
        </div>
    </form>
</x-guest-layout>