{{-- Cargamos Bootstrap y los Iconos para que se vea igual que antes --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listado de donantes') }}
        </h2>
    </x-slot>

    <div class="container pt-4">
        @role('admin')
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Iban</th>
                        <th scope="col">Valoración</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donantes as $donante)       
                        <tr>
                            <th>
                                <div class="btn-group btn-group-sm">
                                    <a onclick="cargarOperacion('{{ $donante->id }}', 'show')" class="btn btn-primary"><i class="bi bi-search"></i></a>
                                    <a onclick="cargarOperacion('{{ $donante->id }}', 'edit')" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    <a onclick="cargarOperacion('{{ $donante->id }}', 'destroy')" class="btn btn-danger"><i class="bi bi-trash"></i></a> 
                                </div>
                             </th>
                            {{-- Unificamos Nombre y Email para respetar las 6 columnas de la cabecera --}}
                            <td>
                                <strong>{{ $donante->usuario->nombre ?? 'Sin Usuario' }}</strong><br>
                                <small class="text-muted">{{ $donante->usuario->email ?? 'N/A' }}</small>
                            </td>
                            <td>{{ $donante->edad }}</td>
                            <td>{{ $donante->importe }} €</td>
                            <td>{{ $donante->iban }}</td>
                            {{-- Corrección de la clave de valoración --}}
                            <td class="text-warning">
                                @php $clave = trim($donante->valoracion); @endphp
                                {{ $valoracion[$clave] ?? 'Sin valorar' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $donantes->links() }}
            </div>
            <button type="button" class="btn btn-primary mt-3" onclick="cargarOperacion('', 'create')">Nuevo Donante</button>
        @else
            <div class="alert alert-info mt-4">
                No tienes permisos para gestionar donantes.
            </div>
        @endrole
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="ventanaModal" tabindex="-1" style="z-index: 9999;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="contenidoModal" class="modal-body text-dark">
                    {{-- Contenido cargado por AJAX --}}
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
const CSRF_TOKEN = '{{ csrf_token() }}';

function cargarOperacion(id, operacion) {
    let url = '';
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
            document.getElementById('contenidoModal').innerHTML = html;
            var elModal = document.getElementById('ventanaModal');
            var instancia = bootstrap.Modal.getOrCreateInstance(elModal);
            instancia.show();
        })
        .catch(error => console.error("Error:", error));
}

document.addEventListener('submit', function(e) {
    if (e.target && e.target.closest('#contenidoModal')) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);
        formData.append('modo', 'ajax');

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': CSRF_TOKEN
            },
            body: formData
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('contenidoModal').innerHTML = html;
            
            // CORRECCIÓN: Si detectamos éxito, recargamos la lista para ver el cambio
            if (html.includes('alert-success') || html.includes('correctamente') || html.includes('¡Donante dado de alta!')) {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
</script>
</x-app-layout>