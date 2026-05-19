<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nueva Donación') }}
            </h2>
            {{-- BOTÓN PDF --}}
            @if(isset($donante) && $donante->id)
                <a href="{{ route('donacion.recibo.pdf', $donante->id) }}" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-file-earmark-pdf"></i> Descargar Recibo
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('donantes.form_base', [
                'titulo' => 'Realizar Donación',
                'action' => route('donacion.store'),
                'redireccion' => '/dashboard'
            ])
        </div>
    </div>
</x-app-layout>

