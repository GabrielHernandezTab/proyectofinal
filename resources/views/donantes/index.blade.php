{{-- Cargamos Bootstrap y los Iconos --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Donaciones - Panel Administrativo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Contenedor Principal Estético --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-b border-gray-200">
                
                @role('admin')
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-700">Listado de Donantes Registrados</h3>
                        <button type="button" class="btn btn-primary d-flex align-items-center shadow-sm" onclick="cargarOperacion('', 'create')">
                            <i class="bi bi-plus-circle me-2"></i> Nuevo Donante
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle border">
                            <thead class="table-light">
                                <tr class="text-secondary text-uppercase small fw-bold">
                                    <th scope="col" style="width: 120px;">Acciones</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Importe</th>
                                    <th scope="col">IBAN</th>
                                    <th scope="col">Valoración</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donantes as $donante)       
                                    <tr>
                                        <td>
                                            <div class="btn-group shadow-sm">
                                                <button onclick="cargarOperacion('{{ $donante->id }}', 'show')" class="btn btn-sm btn-outline-primary" title="Ver"><i class="bi bi-search"></i></button>
                                                <button onclick="cargarOperacion('{{ $donante->id }}', 'edit')" class="btn btn-sm btn-outline-success" title="Editar"><i class="bi bi-pencil-square"></i></button>
                                                <button onclick="cargarOperacion('{{ $donante->id }}', 'destroy')" class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="bi bi-trash"></i></button> 
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $donante->usuario->nombre ?? 'Sin Usuario' }}</div>
                                            <div class="text-muted small">{{ $donante->usuario->email ?? 'N/A' }}</div>
                                        </td>
                                        <td>{{ $donante->edad }} años</td>
                                        <td class="fw-bold text-success">{{ number_format($donante->importe, 2) }} €</td>
                                        <td class="text-muted font-monospace small">{{ $donante->iban }}</td>
                                        <td>
                                            @php $clave = trim($donante->valoracion); @endphp
                                            <span class="badge {{ $clave == 'PR' ? 'bg-warning text-dark' : 'bg-info' }}">
                                                {{ $valoracion[$clave] ?? 'Estándar' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        {{ $donantes->links() }}
                    </div>

                @else
                    <div class="alert alert-warning d-flex align-items-center shadow-sm" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
                        <div>
                            Acceso restringido: No tienes permisos de administrador para gestionar esta sección.
                        </div>
                    </div>
                @endrole
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="ventanaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-2xl border-0">
                <div class="modal-header bg-light border-bottom-0">
                    <h5 class="modal-title fw-bold text-gray-800">Detalles de la Operación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="contenidoModal" class="modal-body p-4">
                    {{-- El AJAX inyectará el contenido aquí --}}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function cargarOperacion(id, operacion) {
    // Definimos la URL según la operación
    let url = '';
    if (operacion === 'create') {
        url = '/donante/create';
    } else {
        url = `/donante/${operacion}/${id}`;
    }

    // Hacemos la petición AJAX
    fetch(url + '?modo=ajax')
        .then(response => response.text())
        .then(html => {
            // 1. Inyectamos el HTML en el cuerpo del modal (NO en el content entero)
            document.getElementById('contenidoModal').innerHTML = html;
            
            // 2. Quitamos el fondo blanco por defecto de Bootstrap para que se vea tu negro
            document.querySelector('#ventanaModal .modal-content').style.backgroundColor = 'transparent';
            document.querySelector('#ventanaModal .modal-content').style.border = 'none';

            // 3. Abrimos el modal
            var elModal = document.getElementById('ventanaModal');
            var instancia = bootstrap.Modal.getOrCreateInstance(elModal);
            instancia.show();
        })
        .catch(error => console.error("Error cargando el modal:", error));
}
</script>
</x-app-layout>