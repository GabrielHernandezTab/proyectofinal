@if(request()->input('modo') != 'ajax')
    @extends('layout')
    @section('contenido')
@endif

<div class="container pt-4 text-dark">
    {{-- 
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </div>
    @endif
    --}}

    @if(isset($datos['exito']) && $datos['exito'])
        <p class="alert alert-success">{{ $datos['exito'] }}</p>
    @endif

    <form action="/curso/{{ $oper }}" method="POST">
        @csrf
        <input name="id_actual" type="hidden" value="{{ $curso->id }}" />

        <div class="mb-3">
            <label class="form-label text-dark">Categoría</label>
            <select {{ $disabled }} class="form-select @error('titulo') is-invalid @enderror" name="titulo">
                <option value=""></option>
                @foreach ($titulos as $clave => $texto)    
                    <option value="{{ $clave }}" {{ old('titulo', $curso->titulo) == $clave ? 'selected' : '' }}>{{ $texto }}</option>
                @endforeach
            </select>
            @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label text-dark">Descripción</label>
            <input {{ $disabled }} value="{{ old('descripcion', $curso->descripcion) }}" type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror">
            @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label text-dark">Precio</label>
            <input {{ $disabled }} value="{{ old('precio', $curso->precio) }}" type="number" name="precio" class="form-control @error('precio') is-invalid @enderror">
            @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror       
        </div>


        <div class="mb-3">
            <label class="form-label text-dark">Horas</label>
            <input {{ $disabled }} value="{{ old('horas', $curso->horas) }}" type="text" name="horas" class="form-control @error('horas') is-invalid @enderror">
            @error('horas') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        @if (!$disabled)
            <button type="submit" class="btn btn-primary">Guardar</button>
        @endif

        @if ($oper == 'destroy' && $curso->id)
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