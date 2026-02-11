@if(request()->input('modo') != 'ajax')
   <x-app-layout>
       <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Área de Donaciones - GeN Trading') }}
           </h2>
       </x-slot>
@endif

<style>
    .form-dark-container { background-color: #1a1a1a; border-radius: 15px; color: white; }
    .input-gen-blue { background-color: #00eeff !important; color: black !important; border-radius: 10px; font-weight: bold; }
    .input-gen-blue option { color: black !important; background-color: white !important; }
    .btn-gen-green { background-color: #449d44 !important; border-radius: 15px; font-weight: bold; }
</style>

{{-- ESTRUCTURA PARA AJAX (MODAL) --}}
@if(request()->input('modo') == 'ajax')
    <div class="modal-body p-0"> {{-- Quitamos el padding para que el negro llegue al borde --}}
@endif

<div class="{{ request()->input('modo') == 'ajax' ? '' : 'py-12' }}">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="form-dark-container shadow-2xl p-8 border border-gray-800">
            
            {{-- Botón de cerrar para el modal --}}
            @if(request()->input('modo') == 'ajax')
                <button type="button" class="btn-close btn-close-white float-end" data-bs-dismiss="modal"></button>
            @endif

            <h3 class="text-center mb-5 fw-bold text-uppercase tracking-wider">Formulario de Donación</h3>

            <form action="{{ $oper == 'publico' ? route('donacion.store') : '/donante/'.$oper.($donante->id ? '/'.$donante->id : '') }}" method="POST">
                @csrf
                <input name="id_actual" type="hidden" value="{{ $donante->id }}" />

                <div class="row">
                    <div class="col-12 mb-4">
                        <label class="form-label small fw-bold">USUARIO IDENTIFICADO</label>
                        <input type="text" class="form-control bg-dark text-gray-500 border-0" 
                               value="{{ auth()->user()->nombre }} ({{ auth()->user()->email }})" disabled>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label small fw-bold">EDAD</label>
                        <input {{ $disabled }} value="{{ old('edad', $donante->edad) }}" type="number" name="edad" class="form-control input-gen-blue">
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label small fw-bold">IMPORTE (€)</label>
                        <input {{ $disabled }} value="{{ old('importe', $donante->importe) }}" type="number" name="importe" class="form-control input-gen-blue">
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label small fw-bold">VALORACIÓN</label>
                        <select {{ $disabled }} class="form-select input-gen-blue" name="valoracion">
                            <option value="">Selecciona...</option>
                            @foreach ($valoraciones as $clave => $texto)    
                                <option value="{{ $clave }}" {{ old('valoracion', $donante->valoracion) == $clave ? 'selected' : '' }}>{{ $texto }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    @if (!$disabled || $oper == 'publico')
                        <button type="submit" class="btn btn-gen-green text-white py-3">Confirmar Donación</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@if(request()->input('modo') == 'ajax')
    </div> {{-- Cierre de modal-body --}}
    @php die(); @endphp
@else
    </x-app-layout>
@endif