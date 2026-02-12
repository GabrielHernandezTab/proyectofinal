<div class="modal-content bg-transparent border-0">
    <div class="modal  pb-0">
        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body pt-0">
        @include('donantes.form_base', [
            'titulo' => 'Información del Registro',
            'action' => '#', 
            'redireccion' => '#'
        ])
    </div>
</div>

@php die(); @endphp