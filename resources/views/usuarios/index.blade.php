{{-- Cargamos Bootstrap y los Iconos para que se vea igual que antes --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container pt-4">
        @role('admin')
            {{-- TABLA ORIGINAL CALCADA --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo Electrónico</th>
                        <th scope="col">Contraseña</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($usuarios as $usuario)       
                            <tr>
                                <th>
                                    <div class="btn-group btn-group-sm">
                                        <a onclick="cargarOperacion('{{ $usuario->id }}', 'show')" class="btn btn-primary"><i class="bi bi-search"></i></a>
                                        <a onclick="cargarOperacion('{{ $usuario->id }}', 'edit')" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                        <a onclick="cargarOperacion('{{ $usuario->id }}', 'destroy')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </div>
                                </th>
                                <td>{{ $usuario->nombre }}</td> {{-- CAMBIADO DE name A nombre --}}
                                <td>{{ $usuario->email }}</td>
                                <td>********</td> {{-- La contraseña nunca se muestra por seguridad --}}
                            </tr>
                        @endforeach
                    {{ $usuarios->links() }}
                </tbody>
            </table>

        
        <button type="button" class="btn btn-primary mt-3" onclick="cargarOperacion('', 'create')">Nuevo Usuario</button>
        @else
            {{-- Mensaje para usuarios no admin (para que no vean la tabla vacía) --}}
            <div class="alert alert-info mt-4">
                No tienes permisos para gestionar usuarios.
            </div>
        @endrole
    </div>
<div class="modal fade" id="ventanaModal" tabindex="-1" style="z-index: 9999;">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        {{-- Aquí es donde metemos la clase modal-body y text-dark --}}
        <div id="contenidoModal" class="modal-body text-dark">
            </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Guardamos el token en una constante para no usar llaves de Blade dentro del fetch
const CSRF_TOKEN = '{{ csrf_token() }}';

function cargarOperacion(id, operacion) {
    let url = '';
    
    // Ajuste de URLs según TUS rutas en web.php
    switch(operacion) {
        case 'show':    
            url = `/usuario/show/${id}`; 
            break;
        case 'edit':    
            url = `/usuario/edit/${id}`; 
            break;
        case 'destroy': 
            url = `/usuario/destroy/${id}`; 
            break;
        case 'create':  
            url = `/usuario/create`; 
            break;
    }

    console.log("Intentando cargar:", url);

    fetch(url + '?modo=ajax')
        .then(response => {
            if (!response.ok) throw new Error('Error ' + response.status + ' en ruta: ' + url);
            return response.text();
        })
        .then(html => {
            document.getElementById('contenidoModal').innerHTML = html;
            
            // Abrimos el modal
            var elModal = document.getElementById('ventanaModal');
            var instancia = bootstrap.Modal.getOrCreateInstance(elModal);
            instancia.show();
        })
        .catch(error => {
            console.error("Error en el fetch:", error);
        });
}

document.addEventListener('submit', function(e) {
    // Detectamos si el submit viene desde dentro del modal
    if (e.target && e.target.closest('#contenidoModal')) {
        e.preventDefault(); // Evitamos recarga normal

        const form = e.target;
        const formData = new FormData(form);
        
        // Enviamos la petición
        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest', // Importante para que Laravel sepa que es AJAX
                'X-CSRF-TOKEN': CSRF_TOKEN
            },
            body: formData
        })
        .then(response => {
            // Verificamos si la respuesta es JSON (usado en Borrar)
            const contentType = response.headers.get("content-type");
            if (contentType && contentType.indexOf("application/json") !== -1) {
                return response.json().then(data => {
                    // Si es borrar y salió bien:
                    if (data.success) {
                        alert(data.mensaje); // Muestra "Operación realizada"
                        window.location.reload(); // Recarga la página para quitar la fila
                    }
                });
            } else {
                // Si es HTML (usado en Crear/Editar), actualizamos el modal para ver el mensaje verde
                return response.text().then(html => {
                    document.getElementById('contenidoModal').innerHTML = html;
                });
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
</script>
</x-app-layout>

