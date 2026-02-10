<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listado de Donaciones') }}
        </h2>
    </x-slot>

    <div class="container pt-4 text-gray-900 dark:text-gray-100">
        <table class="table table-striped dark:text-white">
            <thead>
                <tr>
                    <th scope="col">Acciones</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">IBAN</th>
                    <th scope="col">Valoración</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donantes as $donante)       
                    <tr>
                        <td>
                            <button onclick="cargarOperacion('{{ $donante->id }}', 'destroy')" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                        <td>{{ $donante->usuario->nombre ?? 'N/A' }}</td>
                        <td>{{ $donante->iban }}</td>
                        <td>
                            @for($i=1; $i<=5; $i++)
                                <i class="bi bi-star{{ $i <= $donante->valoracion ? '-fill' : '' }} text-warning"></i>
                            @endfor
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
        // Ajustamos la URL a la ruta de donantes
        let url = `/donante/${operacion}/${id}`;
        
        fetch(url + '?modo=ajax')
            .then(response => response.text())
            .then(html => {
                document.getElementById('contenidoModal').innerHTML = html;
                var myModal = new bootstrap.Modal(document.getElementById('ventanaModal'));
                myModal.show();
            })
            .catch(error => console.error('Error:', error));
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