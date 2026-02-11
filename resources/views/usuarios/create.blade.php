@if(request()->input('modo') != 'ajax')
    @extends('layout')
    @section('contenido')
@endif

<div class="container pt-4 text-dark">
    @if(isset($datos['exito']) && $datos['exito'])
        <div class="alert alert-success shadow-sm mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ $datos['exito'] }}
        </div>
    @endif

    <form action="/usuario/{{ $oper }}{{ $usuario->id ? '/' . $usuario->id : '' }}?modo=ajax" method="POST">
        @csrf
        <input name="id_actual" type="hidden" value="{{ $usuario->id }}" />

        <div class="mb-3">
            <label class="form-label fw-bold">Nombre Completo</label>
            <input {{ $disabled ?? '' }} value="{{ old('nombre', $usuario->nombre) }}" type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror">
            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Correo Electrónico</label>
            <input {{ $disabled ?? '' }} value="{{ old('email', $usuario->email) }}" type="email" name="email" class="form-control @error('email') is-invalid @enderror">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        @if($oper != 'show' && $oper != 'destroy')
        <div class="mb-3">
            <label class="form-label fw-bold text-dark">Contraseña {{ $oper == 'edit' ? '(Opcional)' : '' }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        @endif

        <div class="mt-4 d-flex gap-2">
            @if ($oper == 'destroy')
                <button type="submit" class="btn btn-danger">Confirmar Borrado</button>
            @elseif (empty($disabled))
                <button type="submit" class="btn btn-success">Guardar</button>
            @endif

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
        </div>
    </form>
</div>

{{-- EL CORTE MAESTRO --}}
@if(request()->has('modo'))
    @php die(); @endphp
@else
    @endsection
@endif