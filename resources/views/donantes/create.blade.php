@if(request()->input('modo') != 'ajax')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Donación') }}</h2>
        </x-slot>
@endif

<style>
    .form-dark-container { background-color: #1a1a1a; border-radius: 15px; color: white; border: 1px solid #333; }
    .input-gen-blue { background-color: #00eeff !important; color: black !important; border-radius: 10px; font-weight: bold; border: 2px solid transparent; }
    .input-gen-blue:focus { border-color: #fff !important; box-shadow: 0 0 10px #00eeff; }
    .btn-gen-green { background-color: #449d44 !important; border-radius: 15px; font-weight: bold; padding: 10px 20px; }
    .btn-gen-green:hover { background-color: #357a35 !important; transform: scale(1.02); }
    /* Clase para forzar visibilidad de errores */
    .error-visible { color: #ff4d4d !important; font-size: 0.9rem !important; font-weight: bold !important; display: block !important; margin-top: 5px; }
    .input-error-border { border: 3px solid #ff4d4d !important; }
</style>

<div class="{{ request()->input('modo') == 'ajax' ? 'p-1' : 'py-12' }}">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="form-dark-container shadow-2xl p-6 md:p-8" id="contenedorFormularioAjax">
            
            @if(request()->input('modo') == 'ajax')
                <button type="button" class="btn-close btn-close-white float-end" data-bs-dismiss="modal"></button>
            @endif

            <h3 class="text-center mb-4 fw-bold text-uppercase text-white">Formulario de Donación</h3>

            <form id="formDonante" action="{{ $oper == 'publico' ? route('donacion.store') : '/donante/'.$oper.($donante->id ? '/'.$donante->id : '') }}" method="POST">
                @csrf
                <input name="id_actual" type="hidden" value="{{ $donante->id }}" />
                <input type="hidden" name="usuario_id" value="{{ $donante->usuario_id ?? auth()->id() }}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small text-info fw-bold">EDAD</label>
                        <input {{ $disabled }} value="{{ $donante->edad }}" type="number" name="edad" class="form-control input-gen-blue">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label small text-info fw-bold">IMPORTE (€)</label>
                        <input {{ $disabled }} value="{{ $donante->importe }}" type="number" step="0.01" name="importe" class="form-control input-gen-blue">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label small text-info fw-bold">IBAN (ES + 22 dígitos)</label>
                        <input {{ $disabled }} value="{{ $donante->iban }}" type="text" name="iban" class="form-control input-gen-blue">
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label small text-info fw-bold">VALORACIÓN</label>
                        <select {{ $disabled }} class="form-select input-gen-blue" name="valoracion">
                            <option value="">Selecciona...</option>
                            @foreach ($valoraciones as $clave => $texto)    
                                <option value="{{ $clave }}" {{ $donante->valoracion == $clave ? 'selected' : '' }}>{{ $texto }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @if($oper != 'publico')
                <div class="col-12 mb-3">
                    <label class="form-label small text-info fw-bold">ASIGNAR A USUARIO</label>
                    <select name="usuario_id" class="form-select input-gen-blue" {{ $disabled }}>
                        @foreach($usuarios as $u)
                            <option value="{{ $u->id }}" {{ $donante->usuario_id == $u->id ? 'selected' : '' }}>
                                {{ $u->nombre }} ({{ $u->email }})
                            </option>
                        @endforeach
                    </select>
                </div>
                @endif

                <div class="d-grid">
                    @if ($oper != 'show')
                        <button type="submit" id="btnEnviar" class="btn btn-gen-green text-white py-3">
                            {{ $oper == 'destroy' ? 'CONFIRMAR ELIMINACIÓN' : 'Confirmar' }}
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Usamos una función autoejecutable para no chocar con otros scripts
(function() {
    const formulario = document.getElementById('formDonante');
    
    if (formulario) {
        formulario.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const btn = document.getElementById('btnEnviar');
            const originalBtnText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = "Procesando...";

            // Limpiar errores previos
            document.querySelectorAll('.error-visible').forEach(el => el.remove());
            document.querySelectorAll('.input-error-border').forEach(el => el.classList.remove('input-error-border'));

            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(async response => {
                const data = await response.json();
                
                if (response.status === 422) {
                    // SI HAY ERRORES DE VALIDACIÓN
                    btn.disabled = false;
                    btn.innerHTML = originalBtnText;

                    for (const [campo, mensajes] of Object.entries(data.errors)) {
                        const input = formulario.querySelector(`[name="${campo}"]`);
                        if (input) {
                            input.classList.add('input-error-border');
                            input.insertAdjacentHTML('afterend', `<span class="error-visible">${mensajes[0]}</span>`);
                        }
                    }
                } else if (data.exito) {
                    // SI TODO OK
                    document.getElementById('contenedorFormularioAjax').innerHTML = `
                        <div class="text-center p-5">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                            <h2 class="text-success fw-bold mt-3">¡ÉXITO!</h2>
                            <p class="text-white">${data.exito}</p>
                        </div>`;
                    setTimeout(() => { window.location.reload(); }, 1500);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Error crítico en la comunicación.");
                btn.disabled = false;
                btn.innerHTML = originalBtnText;
            });
        });
    }
})();
</script>

@if(request()->input('modo') == 'ajax')
    @php die(); @endphp
@else
    </x-app-layout>
@endif