<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Administradores') }}
        </h2>
    </x-slot>

    <div class="container pt-4 text-gray-900 dark:text-gray-100">
        <table class="table table-striped dark:text-white">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($administradores as $admin)       
                    <tr>
                        <td>
                            <button onclick="cargarOperacion('{{ $admin->id }}', 'edit')" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button onclick="cargarOperacion('{{ $admin->id }}', 'destroy')" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                        <td>{{ $admin->usuario->nombre }}</td>
                        <td>{{ $admin->usuario->email }}</td>
                        <td>
                            <span class="badge bg-info text-dark">{{ $admin->rol }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <button type="button" class="btn btn-primary mt-3" onclick="cargarOperacion('', 'create')">
            Nuevo Administrador
        </button>
    </div>

    <div class="modal fade" id="ventanaModal" tabindex="-1" aria-hidden="true" style="z-index: 9999;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content dark:bg-gray-800">
                <div id="contenidoModal" class="modal-body">
                    </div>
            </div>
        </div>
    </div>

    <script>
    function cargarOperacion(id, operacion) {
        // Generamos la URL manualmente según tu estructura
        let url = (operacion === 'create') 
                  ? `/administrador/create` 
                  : `/administrador/${operacion}/${id}`;
        
        fetch(url + '?modo=ajax')
            .then(response => response.text())
            .then(html => {
                document.getElementById('contenidoModal').innerHTML = html;
                // Mostrar modal
                var myModal = new bootstrap.Modal(document.getElementById('ventanaModal'));
                myModal.show();
            })
            .catch(error => console.error('Error:', error));
    }

    // Escuchador para los envíos de formulario dentro del modal
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
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                },
                body: formData
            })
            .then(response => response.text())
            .then(html => { 
                document.getElementById('contenidoModal').innerHTML = html; 
            });
        }
    });
    </script>
</x-app-layout>