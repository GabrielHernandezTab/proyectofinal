<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Donaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-700 mb-4">Historial de mis donaciones</h3>

                @if($donaciones->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle border">
                            <thead class="table-light">
                                <tr class="text-secondary text-uppercase small fw-bold">
                                    <th>Fecha</th>
                                    <th>Importe</th>
                                    <th>Valoración</th>
                                    <th>Recibo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donaciones as $donacion)
                                    <tr>
                                        <td>{{ $donacion->created_at->format('d/m/Y') }}</td>
                                        <td class="fw-bold text-success">{{ number_format($donacion->importe, 2) }} €</td>
                                        <td>
                                            @php $clave = trim($donacion->valoracion); @endphp
                                            <span class="badge {{ $clave == 'PR' ? 'bg-warning text-dark' : 'bg-info' }}">
                                                {{ $valoracion[$clave] ?? 'Estándar' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('donacion.recibo.pdf', $donacion->id) }}" class="btn btn-sm btn-outline-danger" title="Descargar Recibo PDF">
                                                <i class="bi bi-file-earmark-pdf"></i> PDF
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">
                        No has realizado ninguna donación todavía.
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>