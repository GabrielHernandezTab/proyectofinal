@if(request()->input('modo') != 'ajax')
    @extends('layout')
    @section('contenido')
@endif

<div class="container pt-4 text-dark">
    @if(isset($datos['exito']) && $datos['exito'])
        <p class="alert alert-success">{{ $datos['exito'] }}</p>
    @endif

    <form action="/administrador/{{ $oper }}{{ $admin->id ? '/'.$admin->id : '' }}?modo=ajax" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Nombre Completo</label>
            <input {{ $disabled }} type="text" name="nombre" class="form-control" 
                   value="{{ old('nombre', $admin->usuario->nombre ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <input {{ $disabled }} type="email" name="email" class="form-control" 
                   value="{{ old('email', $admin->usuario->email ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Rol de Administrador</label>
            <select {{ $disabled }} name="rol" class="form-select">
                <option value="Admin" {{ (old('rol', $admin->rol) == 'Admin') ? 'selected' : '' }}>Admin</option>
                <option value="Súper Admin" {{ (old('rol', $admin->rol) == 'Súper Admin') ? 'selected' : '' }}>Súper Admin</option>
            </select>
        </div>

        @if($oper != 'show' && $oper != 'destroy')
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control">
            </div>
        @endif

        <div class="mt-4">
            @if($oper == 'destroy')
                <button type="submit" class="btn btn-danger">Confirmar Borrado</button>
            @elseif(!$disabled)
                <button type="submit" class="btn btn-primary">Guardar Administrador</button>
            @endif
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
        </div>
    </form>
</div>

@if(request()->input('modo') == 'ajax')
    @php die(); @endphp
@else
    @endsection
@endif