@if(request()->input('modo') != 'ajax')
   <x-app-layout>
       <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Área de Donaciones - GeN Trading') }}
           </h2>
       </x-slot>
@endif

<style>
    /* Estilos personalizados para la estética GeN Trading */
    .form-dark-container {
        background-color: #1a1a1a; /* Negro suave */
        border-radius: 15px;
        color: white;
    }
    .input-gen-blue {
        background-color: #00eeff !important; /* Azul celdas */
        color: white !important;
        border: 2px solid transparent;
        transition: all 0.3s;
        border-radius: 10px;
    }
    .input-gen-blue:focus {
        background-color: #00eeff94!important;
        border-color: #ffffff;
    }
    .input-error-red {
        border: 2px solid #ff4d4d !important; /* Borde rojo error */
    }
    .btn-gen-green {
        background-color: #449d44 !important; /* Verde GeN */
        border: none;
        font-weight: bold;
        padding: 12px 30px;
        transition: transform 0.2s;
    }
    .btn-gen-green:hover {
        background-color: #367c36 !important;
        transform: scale(1.02);
    }
    .text-error-small {
        color: #ff4d4d;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }
    .btn-gen-green{
        border-radius: 15px;
    }
    .input-gen-blue::placeholder {
        color: rgb(0, 0, 0) !important;
    }
    /* Fuerza el color negro en el texto de todas las opciones del desplegable */
    .input-gen-blue option {
        color: #000000 !important;
        background-color: #ffffff !important; /* Fondo blanco para que las estrellas negras resalten */
    }

    /* Asegura que el texto seleccionado inicialmente también se vea negro */
    select.input-gen-blue {
        color: #000000 !important;
    }
</style>

<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="form-dark-container shadow-2xl p-8 border border-gray-800">
            
            <h3 class="text-center mb-5 fw-bold text-uppercase tracking-wider">Formulario de Donación</h3>

            @if(isset($datos['exito']) && $datos['exito'])
                <div class="alert alert-success bg-green-900 text-white border-0 mb-4">{{ $datos['exito'] }}</div>
            @endif

            <form action="{{ $oper == 'publico' ? route('donacion.store') : '/donante/'.$oper.($donante->id ? '/'.$donante->id : '') }}" method="POST">
                @csrf
                <input name="id_actual" type="hidden" value="{{ $donante->id }}" />

                <div class="row">
                    {{-- Usuario --}}
                    <div class="col-12 mb-4">
                        <label class="form-label small fw-bold">USUARIO IDENTIFICADO</label>
                        <input type="text" class="form-control bg-dark text-gray-500 border-0" 
                               value="{{ auth()->user()->nombre }} ({{ auth()->user()->email }})" disabled>
                        <input type="hidden" name="usuario_id" value="{{ auth()->id() }}">
                    </div>

                    {{-- Edad --}}
                    <div class="col-12 mb-4">
                        <label class="form-label small fw-bold">EDAD</label>
                        <input {{ $disabled }} value="{{ old('edad', $donante->edad) }}" type="number" name="edad" 
                               class="form-control input-gen-blue @error('edad') input-error-red @enderror" 
                               placeholder="Indica tu edad">
                        @error('edad') <span class="text-error-small fw-bold"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span> @enderror       
                    </div>

                    {{-- Importe --}}
                    <div class="col-12 mb-4">
                        <label class="form-label small fw-bold">IMPORTE A DONAR (€)</label>
                        <input {{ $disabled }} value="{{ old('importe', $donante->importe) }}" type="number" name="importe" 
                               class="form-control input-gen-blue @error('importe') input-error-red @enderror" 
                               placeholder="0.00">
                        @error('importe') <span class="text-error-small fw-bold"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span> @enderror       
                    </div>

                    {{-- Valoración --}}
                    <div class="col-12 mb-4">
                        <label class="form-label small fw-bold">VALORACIÓN DEL SERVICIO</label>
                        <select {{ $disabled }} class="form-select input-gen-blue @error('valoracion') input-error-red @enderror" name="valoracion">
                            <option value="">Selecciona...</option>
                            @foreach ($valoraciones as $clave => $texto)    
                                <option value="{{ $clave }}" {{ old('valoracion', $donante->valoracion) == $clave ? 'selected' : '' }}>{{ $texto }}</option>
                            @endforeach
                        </select>
                        @error('valoracion') <span class="text-error-small fw-bold"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>

                    {{-- IBAN --}}
                    <div class="col-12 mb-5">
                        <label class="form-label small fw-bold">IBAN (CUENTA BANCARIA)</label>
                        <input {{ $disabled }} value="{{ old('iban', $donante->iban) }}" type="text" name="iban" 
                               class="form-control input-gen-blue @error('iban') input-error-red @enderror" 
                               placeholder="ES00 1234 5678 9012 3456 7890">
                        @error('iban') <span class="text-error-small fw-bold"><i class="bi bi-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="d-grid">
                    @if (!$disabled || $oper == 'publico')
                        <button type="submit" class="btn btn-gen-green text-white shadow-lg text-uppercase py-3">
                            Confirmar Donación
                        </button>
                    @endif

                    @if(request()->input('modo') == 'ajax')
                        <button type="button" class="btn btn-link text-gray-400 mt-3 decoration-none" data-bs-dismiss="modal">Cerrar</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@if(request()->input('modo') == 'ajax')
    @php die(); @endphp
@else
    </x-app-layout>
@endif