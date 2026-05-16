<style>
    .form-dark-container {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        border-radius: 20px;
        color: white;
        border: 1px solid rgba(0, 238, 255, 0.2);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }
    .input-gen-blue {
        background-color: rgba(0, 238, 255, 0.1) !important;
        color: white !important;
        border-radius: 10px;
        font-weight: bold;
        border: 2px solid rgba(0, 238, 255, 0.4) !important;
        transition: all 0.3s ease;
    }
    .input-gen-blue:focus {
        background-color: rgba(0, 238, 255, 0.15) !important;
        border-color: #00eeff !important;
        box-shadow: 0 0 15px rgba(0, 238, 255, 0.3) !important;
        color: white !important;
    }
    .input-gen-blue option { background-color: #1a1a2e; color: white; }
    .input-gen-blue::placeholder { color: rgba(255,255,255,0.4); }
    .input-error-border { border: 2px solid #ff4d4d !important; box-shadow: 0 0 10px rgba(255, 77, 77, 0.5); }
    .error-msg { color: #ff4d4d; font-size: 0.8rem; font-weight: bold; margin-top: 5px; display: block; }
    .btn-gen-green {
        background: linear-gradient(135deg, #1DB954, #17a844) !important;
        border-radius: 15px;
        font-weight: bold;
        padding: 14px;
        border: none;
        transition: all 0.3s ease;
        letter-spacing: 1px;
    }
    .btn-gen-green:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(29, 185, 84, 0.4) !important;
    }
    .form-label { color: #00eeff !important; font-size: 0.75rem; letter-spacing: 1px; }
    .titulo-donacion {
        font-size: 1.4rem;
        background: linear-gradient(90deg, #00eeff, #ffffff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<div class="form-dark-container shadow-2xl p-6 md:p-8" id="contenedorPrincipal">
    <h3 class="text-center mb-5 fw-bold text-uppercase titulo-donacion">
        <i class="bi bi-heart-fill me-2" style="color: #00eeff;"></i>{{ $titulo }}
    </h3>
    <form id="formDonante" action="{{ $action }}" method="POST">
        @csrf
        <input name="id_actual" type="hidden" value="{{ $donante->id ?? '' }}" />

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label small text-info fw-bold text-uppercase">Edad</label>
                <input {{ $disabled }} value="{{ $donante->edad ?? '' }}" type="number" name="edad" class="form-control input-gen-blue">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label small text-info fw-bold text-uppercase">Importe (€)</label>
                <input {{ $disabled }} value="{{ $donante->importe ?? '' }}" type="number" step="0.01" name="importe" class="form-control input-gen-blue">
            </div>

            <div class="col-12 mb-3">
                <label class="form-label small text-info fw-bold text-uppercase">Iban</label>
                <input {{ $disabled }} value="{{ $donante->iban ?? '' }}" type="text" name="iban" class="form-control input-gen-blue">
            </div>

            <div class="col-12 mb-4">
                <label class="form-label small text-info fw-bold text-uppercase">Valoración</label>
                <select {{ $disabled }} class="form-select input-gen-blue" name="valoracion">
                    <option value="">Selecciona...</option>
                    @foreach ($valoraciones as $clave => $texto)    
                        <option value="{{ $clave }}" {{ (isset($donante->valoracion) && $donante->valoracion == $clave) ? 'selected' : '' }}>
                            {{ $texto }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-grid mt-2">
            @if($oper != 'show')
                <button type="submit" id="btnEnviar" class="btn btn-gen-green text-white fw-bold shadow-sm">
                    {{ $oper == 'destroy' ? 'CONFIRMAR ELIMINACIÓN' : 'CONFIRMAR DONACIÓN' }}
                </button>
            @else
                <div class="text-center">
                </div>
            @endif
        </div>
    </form>
</div>

{{-- SCRIPT CORREGIDO --}}
@if($oper != 'show')
<script>
(function() {
    const form = document.getElementById('formDonante');
    if(!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const btn = document.getElementById('btnEnviar');
        
        document.querySelectorAll('.error-msg').forEach(el => el.remove());
        document.querySelectorAll('.input-gen-blue').forEach(el => el.classList.remove('input-error-border'));

        btn.disabled = true;
        btn.innerHTML = 'Procesando...';

        fetch(this.action + (this.action.includes('?') ? '&' : '?') + 'modo=ajax', {
            method: 'POST',
            body: new FormData(this),
            headers: { 
                'X-Requested-With': 'XMLHttpRequest', 
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(async response => {
            const data = await response.json();
            if (!response.ok) {
                btn.disabled = false;
                btn.innerHTML = "CORREGIR ERRORES";
                if (data.errors) {
                    Object.keys(data.errors).forEach(key => {
                        const input = document.querySelector(`[name="${key}"]`);
                        if (input) {
                            input.classList.add('input-error-border');
                            input.insertAdjacentHTML('afterend', `<span class="error-msg">${data.errors[key][0]}</span>`);
                        }
                    });
                }
            } else {
                document.getElementById('contenedorPrincipal').innerHTML = 
                    '<div class="text-center p-5"><h2 class="text-success fw-bold">¡ÉXITO!</h2><p class="text-white">Redirigiendo...</p></div>';
                setTimeout(() => { window.location.href = "{{ $redireccion }}"; }, 1500);
            }
        })
        .catch(error => {
            btn.disabled = false;
            btn.innerHTML = "ERROR";
        });
    });
})();
</script>
@endif {{-- Aquí estaba el error, faltaba este endif --}}