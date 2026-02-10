<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    @role('admin')
                        <br>
                        {{ __("Bienvenido administrador.") }}
                    @endrole

                    <hr class="my-4 border-gray-200 dark:border-gray-700">
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

    <script>
        function cargarDonacion() {
            const contenido = document.getElementById('contenidoModal');
            
            // Petición AJAX
            fetch('/donar?modo=ajax')
                .then(response => {
                    if (!response.ok) throw new Error('Error al cargar');
                    return response.text();
                })
                .then(html => {
                    contenido.innerHTML = html;
                    // Inicializar y mostrar el modal de Bootstrap
                    const myModal = new bootstrap.Modal(document.getElementById('ventanaModal'));
                    myModal.show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('No se pudo cargar el formulario de donación.');
                });
        }
    </script>
</x-app-layout>