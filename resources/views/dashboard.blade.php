<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('exito'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded shadow-md">
                    {{ session('exito') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-blue-50 dark:bg-gray-900 p-6 rounded-lg shadow-md">
                    <h1 class="text-2xl font-bold text-blue-800 dark:text-blue-300 mb-2">¡Bienvenido {{ auth()->user()->nombre }}!</h1>
                    <p class="text-gray-700 dark:text-gray-200 mb-4">Ahora puedes elegir tu plan de inversión, realizar una donación o revisar tu progreso.</p>
                    
                    <div class="flex space-x-4">
                        <a href="{{ route('usuarios.planes') }}" class="btn btn-primary px-4 py-2 rounded-lg bg-blue-600 text-white">Ver planes</a>
                    </div>

                    @role('admin')
                        <div class="mt-4 p-4 bg-yellow-100 text-yellow-900 rounded border border-yellow-200">
                            <strong>Administrador:</strong> Puedes gestionar usuarios y planes desde el panel.
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ventanaModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content dark:bg-gray-800 dark:text-white">
                <div class="modal-header border-b dark:border-gray-700">
                    <button type="button" class="btn-close dark:invert" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="contenidoModal" class="modal-body">
                    <div class="text-center p-3">
                        <div class="spinner-border text-warning" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>