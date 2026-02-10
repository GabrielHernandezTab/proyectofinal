{{-- Cargamos Bootstrap e Iconos --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Administradores') }}
        </h2>
    </x-slot>

    <div class="container pt-4">
        @role('admin')
            <table class="table table-striped">
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
                            <td><span class="badge bg-info text-dark">{{ $admin->rol }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $administradores->links() }}

            <button type="button" class="btn btn-primary mt-3" onclick="cargarOperacion('', 'create')">
                Nuevo Administrador
            </button>
        @else
            <div class="alert alert-info mt-4">
                No tienes permisos para gestionar administradores.
            </div>
        @endrole
    </div>

    {{-- Modal AJAX --}}
    <div class="modal fade" id="ventanaModal" tabindex="-1" style="z-index: 9999;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="contenidoModal" class="modal-body"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const CSRF_TOKEN = '{{ csrf_token() }}';

        function cargarOperacion(id, operacion) {
            let url = (operacion === 'create') 
                      ? `/administrador/create` 
                      : `/administrador/${operacion}/${id}`;

            fetch(url + '?modo=ajax')
                .then(r => r.text())
                .then(html => {
                    document.getElementById('contenidoModal').innerHTML = html;
                    new bootstrap.Modal(document.getElementById('ventanaModal')).show();
                })
                .catch(e => console.error('Error fetch:', e));
        }

        document.addEventListener('submit', function(e) {
            if (e.target && e.target.closest('#contenidoModal')) {
                e.preventDefault();
                const form = e.target;
                const formData = new FormData(form);
                formData.append('modo', 'ajax');

                fetch(form.action, {
                    method: 'POST',
                    headers: { 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': CSRF_TOKEN },
                    body: formData
                })
                .then(r => r.text())
                .then(html => document.getElementById('contenidoModal').innerHTML = html)
                .catch(e => console.error('Error:', e));
            }
        });
    </script>
</x-app-layout>
