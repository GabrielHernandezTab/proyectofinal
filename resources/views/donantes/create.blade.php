@if(request()->input('modo') != 'ajax') 
    <x-app-layout>
    <x-slot name="header"><h2>Donar</h2></x-slot>
@endif

<div class="container pt-4 text-dark text-start">
    @if(isset($datos['exito']) && $datos['exito'])
        <div class="alert alert-success text-center">
            <h4>¡Gracias!</h4>
            <p>{{ $datos['exito'] }}</p>
        </div>
    @endif

    <form action="/donar" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold">IBAN de cuenta</label>
            <input {{ $disabled }} value="{{ old('iban') }}" type="text" name="iban" 
                   class="form-control @error('iban') is-invalid @enderror" 
                   placeholder="ES00...">
            @error('iban') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold d-block">Valoración:</label>
            <div class="rating-css">
                <div class="star-icon">
                    @for($i=1; $i<=5; $i++)
                        <input type="radio" value="{{$i}}" name="valoracion" id="rating{{$i}}" {{ $i == 5 ? 'checked' : '' }} {{ $disabled }}>
                        <label for="rating{{$i}}" class="bi bi-star-fill" style="cursor:pointer"></label>
                    @endfor
                </div>
            </div>
            @error('valoracion') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        @if (!$disabled) 
            <button type="submit" class="btn btn-warning w-100 fw-bold">Confirmar Donación</button> 
        @endif
        
        <button type="button" class="btn btn-outline-secondary w-100 mt-2" data-bs-dismiss="modal">Cerrar</button>
    </form>
</div>

<style>
    .rating-css div { color: #ffe400; font-size: 30px; text-align: center; }
    .rating-css input { display: none; }
    .rating-css input + label { color: #ccc; }
    .rating-css input:checked ~ label { color: #ccc; }
    .star-icon input:checked + label,
    .star-icon input:checked ~ label { color: #ffe400; }
</style>

@if(request()->input('modo') != 'ajax') 
    </x-app-layout>
@endif

@php if(request()->input('modo') == 'ajax') die(); @endphp