<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-blue-50 dark:bg-gray-900 p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold text-blue-800 dark:text-blue-300 mb-2">¡Bienvenido {{ auth()->user()->name }}!</h1>
                <p class="text-gray-700 dark:text-gray-200 mb-4">Ahora puedes elegir tu plan de inversión o revisar tu progreso.</p>
                <a href="{{ route('usuarios.planes') }}" class="btn btn-primary px-4 py-2 rounded-lg">Ver planes</a>

    @role('admin')
        <div class="mt-4 p-4 bg-yellow-100 dark: text-yellow-900 dark:text-yellow-200 rounded">
            <strong>Administrador:</strong> Puedes gestionar usuarios y planes desde el panel.
        </div>
    @endrole
</div>

            </div>
        </div>
    </div>
</x-app-layout>
