@if(request()->input('modo') != 'ajax') @extends('layouts.app') @section('content') @endif

<div class="container pt-4 text-dark">
    @if(isset($datos['exito']) && $datos['exito'])
        <p class="alert alert-success">{{ $datos['exito'] }}</p>
    @endif

    <form action="/administrador/{{ $oper }}" method="POST">
        @csrf
        <input name="id_actual" type="hidden" value="{{ $admin->id }}" />

        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <select name="usuario_id" class="form-control" {{ ($oper == 'edit' || $disabled) ? 'disabled' : '' }}>
                @foreach($usuarios as $u)
                    <option value="{{ $u->id }}" {{ $admin->usuario_id == $u->id ? 'selected' : '' }}>
                        {{ $u->nombre }} ({{ $u->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Rol del Administrador</label>
            <select name="rol" class="form-control @error('rol') is-invalid @enderror" {{ $disabled }}>
                <option value="Admin" {{ old('rol', $admin->rol) == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Súper Admin" {{ old('rol', $admin->rol) == 'Súper Admin' ? 'selected' : '' }}>Súper Admin</option>
            </select>
            @error('rol') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        @if (!$disabled) 
            <button type="submit" class="btn btn-primary">Guardar Cambios</button> 
        @endif
        
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    </form>
</div>

@if(request()->input('modo') == 'ajax') @php die(); @endphp @else @endsection @endif