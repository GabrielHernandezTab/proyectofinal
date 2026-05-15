<<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('imagenes/logo.webp') }}" style="border-radius:50%; width:50px">
                    </a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Panel de Control') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <div class="relative">
                    <button onclick="document.getElementById('dropdown-menu').classList.toggle('hidden')" 
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                        style="cursor:pointer;">
                        <div>
                            @php
                                $nombreUsuario = Auth::user()->nombre ?? Auth::user()->name ?? 'Usuario';
                            @endphp
                            {{ $nombreUsuario }}
                        </div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                    <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50" style="border: 1px solid #e5e7eb;">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" style="cursor:pointer; text-decoration:none;">Mi Perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" style="cursor:pointer; background:none; border:none; border-top: 1px solid #e5e7eb;">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-700">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="text-sm text-gray-500 hover:text-gray-700">Registrarse</a>
                </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" 
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div id="mobile-menu" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Panel de Control') }}
            </x-responsive-nav-link>
        </div>
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @php
                    $nombreUsuarioMovil = Auth::user()->nombre ?? Auth::user()->name ?? 'Usuario';
                    $emailUsuarioMovil = Auth::user()->email ?? '';
                @endphp
                <div class="font-medium text-base text-gray-800">{{ $nombreUsuarioMovil }}</div>
                <div class="font-medium text-sm text-gray-500">{{ $emailUsuarioMovil }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Mi Perfil') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @else
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <a href="{{ route('login') }}" class="block py-2 text-sm text-gray-700">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="block py-2 text-sm text-gray-700">Registrarse</a>
            </div>
        </div>
        @endauth
    </div>
</nav>