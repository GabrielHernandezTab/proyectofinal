<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nombre')" class="fw-bold mb-1" style="color: #1a2b4b;" />
            <input id="name" type="text" name="name" class="input-suave" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Tu nombre completo">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="fw-bold mb-1" style="color: #1a2b4b;" />
            <input id="email" type="email" name="email" class="input-suave" value="{{ old('email') }}" required autocomplete="username" placeholder="ejemplo@correo.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="fw-bold mb-1" style="color: #1a2b4b;" />
            <input id="password" type="password" name="password" class="input-suave" required autocomplete="new-password" placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="fw-bold mb-1" style="color: #1a2b4b;" />
            <input id="password_confirmation" type="password" name="password_confirmation" class="input-suave" required autocomplete="new-password" placeholder="••••••••">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="text-decoration-none text-sm text-gray-600 hover:text-success" href="{{ route('login') }}">
                {{ __('¿Ya registrado?') }}
            </a>

            <button type="submit" class="btn fw-bold text-white ms-3" 
                style="background-color: #00b36b; border: none; padding: 10px 25px; border-radius: 10px; text-transform: uppercase;">
                {{ __('Registrarse') }}
            </button>
        </div>
    </form>
</x-guest-layout>