@if(request()->input('modo') != 'ajax')
    @extends('layout')
    @section('contenido')
@endif

<div class="container pt-4 text-dark">
    @if(isset($datos['exito']) && $datos['exito'])
        <p class="alert alert-success">{{ $datos['exito'] }}</p>
    @endif

    {{-- LÓGICA DEL ACTION: Si la operación es 'publico', enviamos a la ruta de guardar donación --}}
    <form action="{{ $oper == 'publico' ? route('donacion.store') : '/donante/'.$oper.($donante->id ? '/'.$donante->id : '') }}" method="POST">
        @csrf
        <input name="id_actual" type="hidden" value="{{ $donante->id }}" />

        <div class="mb-3">
            <label class="form-label text-dark">Usuario</label>
            @if($oper == 'publico')
                {{-- VISTA PÚBLICA: No hay select, solo texto y un campo oculto --}}
                <input type="text" class="form-control" value="{{ auth()->user()->nombre }} ({{ auth()->user()->email }})" disabled>
                <input type="hidden" name="usuario_id" value="{{ auth()->id() }}">
            @else
                {{-- VISTA ADMIN: El select que ya tenías --}}
                <select {{ $disabled }} name="usuario_id" class="form-select @error('usuario_id') is-invalid @enderror">
                    <option value="">Seleccione un usuario...</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ old('usuario_id', $donante->usuario_id) == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->nombre }} ({{ $usuario->email }})
                        </option>
                    @endforeach
                </select>
                @error('usuario_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label text-dark">Edad</label>
            <input {{ $disabled }} value="{{ old('edad', $donante->edad) }}" type="number" name="edad" class="form-control @error('edad') is-invalid @enderror">
            @error('edad') <div class="invalid-feedback">{{ $message }}</div> @enderror       
        </div>

        <div class="mb-3">
            <label class="form-label text-dark">Valoración</label>
            <select {{ $disabled }} class="form-select @error('valoracion') is-invalid @enderror" name="valoracion">
                <option value=""></option>
                @foreach ($valoraciones as $clave => $texto)    
                    <option value="{{ $clave }}" {{ old('valoracion', $donante->valoracion) == $clave ? 'selected' : '' }}>{{ $texto }}</option>
                @endforeach
            </select>
            @error('valoracion') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label text-dark">IBAN</label>
            <input {{ $disabled }} value="{{ old('iban', $donante->iban) }}" type="text" name="iban" class="form-control @error('iban') is-invalid @enderror" placeholder="ES0011223344556677889900">
            @error('iban') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mt-4">
            @if ($oper == 'destroy' && $donante->id)
                <div class="alert alert-warning">¿Confirmas que deseas eliminar este registro?</div>
                <button type="submit" class="btn btn-danger">Borrar</button>
            @elseif (!$disabled || $oper == 'publico')
                <button type="submit" class="btn btn-success">
                    {{ $oper == 'publico' ? 'Confirmar Donación' : 'Guardar' }}
                </button>
            @endif

            @if(request()->input('modo') == 'ajax')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
            @endif
        </div>
    </form>
</div>

@if(request()->input('modo') == 'ajax')
    @php die(); @endphp
@else
    @endsection
@endif