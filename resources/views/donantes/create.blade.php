@if(request()->input('modo') != 'ajax')
    @extends('layout')
    @section('contenido')
@endif

<div class="container pt-4 text-dark">
    @if(isset($datos['exito']) && $datos['exito'])
        <p class="alert alert-success">{{ $datos['exito'] }}</p>
    @endif

<form action="/donante/{{ $oper }}{{ $donante->id ? '/' . $donante->id : '' }}" method="POST">        @csrf
        <input name="id_actual" type="hidden" value="{{ $donante->id }}" />

        <div class="mb-3">
            <label class="form-label text-dark">Usuario</label>
            <select {{ $disabled }} name="usuario_id" class="form-select @error('usuario_id') is-invalid @enderror">
                <option value="">Seleccione un usuario...</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ old('usuario_id', $donante->usuario_id) == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nombre }} ({{ $usuario->email }})
                    </option>
                @endforeach
            </select>
            @error('usuario_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
            <input {{ $disabled }} value="{{ old('iban', $donante->iban) }}" type="text" name="iban" class="form-control @error('iban') is-invalid @enderror">
            @error('iban') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        @if (!$disabled)
            <button type="submit" class="btn btn-primary">Guardar</button>
        @endif

        @if ($oper == 'destroy' && $donante->id)
            <button type="submit" class="btn btn-danger">Borrar</button>
        @endif

        @if(request()->input('modo') == 'ajax')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Volver
                </button>
        @endif
    </form>
</div>

@if(request()->input('modo') == 'ajax')
    @php die(); @endphp
@else
    @endsection
@endif