{{-- Cargamos Bootstrap y los Iconos al principio --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    /* Corrección de capas para evitar que el modal se oculte tras el fondo */
    .modal-backdrop { z-index: 1040 !important; }
    #ventanaModal { z-index: 1050 !important; }
    
    /* Estilo para que el fondo del modal sea transparente y luzca tu tarjeta negra */
    .modal-content.bg-transparent { background-color: transparent !important; }
    
    /* Mejoras visuales para la tabla */
    .font-monospace { font-size: 0.85rem; letter-spacing: -0.3px; }
</style>

<x-app-layout>
    {{-- El ID "app" envuelve el contenido para evitar errores de Vue/Jetstream --}}
    <div id="app">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestión de Donaciones - Panel Administrativo') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-b border-gray-200">
                    
                    @role('admin')
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="text-lg font-bold text-gray-700">Listado de Donantes Registrados</h3>
                            <button type="button" class="btn btn-primary d-flex align-items-center shadow-sm" onclick="cargarOperacion(0, 'create')">
                                <i class="bi bi-plus-circle me-2"></i> Nuevo Donante
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle border">
                                <thead class="table-light">
                                    <tr class="text-secondary text-uppercase small fw-bold">
                                        <th scope="col" style="width: 140px;">Acciones</th>
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
                            <div>Acceso restringido: No tienes permisos de administrador.</div>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>

    {{-- Modal al final del layout pero antes de los scripts --}}
    <div class="modal fade" id="ventanaModal" tabindex="-1" aria-labelledby="ventanaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div id="contenidoModal">
                    {{-- Aquí se inyecta el form negro --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const CSRF_TOKEN = '{{ csrf_token() }}';

        // Función globalizada para que sea accesible desde los botones
function cargarOperacion(id, operacion) {
    let url = '';
    
    // Rutas para Donantes
    switch(operacion) {
        case 'show':    url = `/donante/show/${id}`; break;
        case 'edit':    url = `/donante/edit/${id}`; break;
        case 'destroy': url = `/donante/destroy/${id}`; break;
        case 'create':  url = `/donante/create`; break;
    }

    fetch(url + '?modo=ajax')
        .then(response => {
            if (!response.ok) throw new Error('Error ' + response.status);
            return response.text();
        })
        .then(html => {
            // Inyectamos el HTML
            document.getElementById('contenidoModal').innerHTML = html;
            
            // Abrimos el modal
            var elModal = document.getElementById('ventanaModal');
            var instancia = bootstrap.Modal.getOrCreateInstance(elModal);
            instancia.show();
        })
        .catch(error => console.error("Error:", error));
}

// Escuchador de eventos de envío para formularios dentro del modal
        document.addEventListener('submit', function(e) {
            const contenedorModal = document.getElementById('contenidoModal');
            
            // Verificamos que el formulario esté dentro de nuestro modal
            if (e.target && contenedorModal.contains(e.target)) {
                e.preventDefault(); 
                
                const form = e.target;
                const formData = new FormData(form);
                const btnOriginal = form.querySelector('button[type="submit"]');

                // Limpiar errores visuales previos
                form.querySelectorAll('.text-error-small').forEach(el => el.remove());
                form.querySelectorAll('.is-invalid').forEach(el => {
                    el.classList.remove('is-invalid');
                    el.style.borderColor = '';
                });

                if(btnOriginal) btnOriginal.disabled = true;

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: { 
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    }
                })
                .then(response => response.json().then(data => ({ status: response.status, body: data })))
                .then(res => {
                    if (res.status === 422) {
                        // Gestión de errores de validación
                        if(btnOriginal) btnOriginal.disabled = false;
                        const errors = res.body.errors;
                        for (const [field, messages] of Object.entries(errors)) {
                            const input = form.querySelector(`[name="${field}"]`);
                            if (input) {
                                input.classList.add('is-invalid');
                                input.style.borderColor = '#ff4d4d';
                                input.insertAdjacentHTML('afterend', 
                                    `<div class="text-error-small" style="color: #ff4d4d; font-size: 0.85rem; font-weight: bold; margin-top: 5px;">
                                        <i class="bi bi-exclamation-circle"></i> ${messages[0]}
                                    </div>`
                                );
                            }
                        }
                    } else if (res.body.exito) {
                        // Gestión de éxito
                        contenedorModal.innerHTML = `
                            <div class="p-5 text-center" style="background: #1a1a1a; border-radius: 15px; color: white; border: 2px solid #198754;">
                                <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                                <h2 class="mt-3 text-success fw-bold text-uppercase">¡Completado!</h2>
                                <p class="fs-5">${res.body.exito}</p>
                                <div class="spinner-grow text-success mt-2" role="status"></div>
                            </div>`;
                        
                        setTimeout(() => { window.location.reload(); }, 1500);
                    }
                })
                .catch(error => {
                    console.error('Error Crítico:', error);
                    if(btnOriginal) btnOriginal.disabled = false;
                    alert("Error crítico en la comunicación con el servidor.");
                });
            }
        });
    </script>
</x-app-layout>