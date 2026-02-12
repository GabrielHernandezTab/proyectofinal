<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    .card { transition: transform 0.3s ease; }
    .card:hover { transform: translateY(-10px); }
    .btn-animate { transition: all 0.3s ease; }
    .btn-animate:hover { filter: brightness(1.1); transform: scale(1.05); }
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        text-align: left;
        border: none;
        outline: none;
        transition: 0.4s;
    }
    .accordion:after {
        content: '\02795'; 
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }

.active:after {
  content: "\2796"; 
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .accordion:hover {
  background-color: #b2b1daff;}
.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-5">

        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Accede a tu curso</h1>
            <p class="lead text-muted">Selecciona el plan que mejor se adapte a tus objetivos financieros y nivel de experiencia.</p>
            <div class="d-flex justify-content-center gap-3">
                <span class="badge bg-light text-dark border"><i class="bi bi-shield-check text-primary"></i> Pago Seguro</span>
                <span class="badge bg-light text-dark border"><i class="bi bi-clock-history text-primary"></i> Acceso 24/7</span>
                <span class="badge bg-light text-dark border"><i class="bi bi-people text-primary"></i> +5,000 Alumnos</span>
            </div>
        </div>

        <!-- Tarjetas de Planes -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Pack Gratuito -->
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="card-title text-uppercase text-muted">Pack Gratuito</h5>
                        <h2 class="card-price fw-bold">0€</h2>
                        <p class="text-muted small">Ideal para conocer los fundamentos sin compromiso.</p>
                        <hr>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Introducción a la inversión</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Conceptos de Riesgo y Retorno</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Guías y plantillas básicas</li>
                            <li class="mb-2 text-muted"><i class="bi bi-x-circle me-2"></i>Sesiones personalizadas</li>
                        </ul>
                        <div class="d-grid mt-auto">
                            <a href="mis-planes/basico"class="btn btn-info rounded-pill text-dark fw-bold btn-animate">Ir a el curso</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pack Avanzado -->
            <div class="col">
                <div class="card h-100 shadow border-primary position-relative">
                    <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-primary px-3">
                        MÁS POPULAR
                    </span>
                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="card-title text-uppercase text-muted">Pack Avanzado</h5>
                        <h2 class="card-price fw-bold">35€ <span class="fs-6 fw-normal text-muted">/ mes</span></h2>
                        <p class="text-primary small fw-bold">15% dto. colectivos especiales*</p>
                        <hr>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="bi bi-check2-all text-primary me-2"></i><strong>60 horas de curso</strong></li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Value Investing & Day Trading</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Simulador de inversiones reales</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Comunidad privada Discord</li>
                        </ul>
                        <div class="d-grid mt-auto">
                            <a href="mis-planes/avanzado"class="btn btn-info rounded-pill text-dark fw-bold btn-animate">Ir a el curso</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pack Supremo -->
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="card-title text-uppercase text-secondary">Pack Supremo</h5>
                        <h2 class="card-price fw-bold text">60€ <span class="fs-6 fw-normal text-secondary">/ mes</span></h2>
                        <p class="text-info small fw-bold">30% dto. colectivos especiales*</p>
                        <hr class="border-secondary">
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="bi bi-star-fill text-warning me-2"></i><strong>Mentoría 1 a 1 semanal</strong></li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-info me-2"></i>Alertas de trading en vivo</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-info me-2"></i>Planificación fiscal avanzada</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-info me-2"></i>Acceso Vitalicio a materiales</li>
                        </ul>
                        <div class="d-grid mt-auto">
                            <a href="mis-planes/supremo"class="btn btn-info rounded-pill text-dark fw-bold btn-animate">Ir a el curso</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla comparativa -->
        <div class="mt-5 pt-5">
            <h3 class="text-center mb-4">Compara las características</h3>
            <div class="table-responsive">
                <table class="table table-hover text-center align-middle border">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 40%;" class="text-start ps-4">Característica</th>
                            <th style="width: 20%;">Gratis</th>
                            <th style="width: 20%;">Avanzado</th>
                            <th style="width: 20%;">Supremo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start ps-4">Acceso a lecciones en vídeo</td>
                            <td>Básico</td>
                            <td>Completo</td>
                            <td>Ilimitado</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-4">Soporte técnico</td>
                            <td>Email</td>
                            <td>Prioritario</td>
                            <td>24/7 (WhatsApp)</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-4">Certificado de finalización</td>
                            <td><i class="bi bi-x text-danger"></i></td>
                            <td><i class="bi bi-check-lg text-success"></i></td>
                            <td><i class="bi bi-check-lg text-success"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br><br>
        <!-- Accordeon simple -->
         <div class="container">
            <h2 class="mb-4 text-center">Preguntas Frecuentes</h2>
            <button class="accordion">¿Puedo cambiar mi plan de suscripción en cualquier momento?</button>
            <div class="panel">
                <p>Sí, puedes subir o bajar de nivel de suscripción en cualquier momento desde tu panel de usuario. Los cambios se aplicarán en el siguiente ciclo de facturación.</p>
            </div>

            <button class="accordion">¿Qué pasa si no puedo completar un curso dentro del mes?</button>
            <div class="panel">
                <p>No hay problema. Todos los materiales permanecen disponibles y puedes retomar las lecciones cuando quieras. Los cursos de pago permiten acceder al contenido incluso después de la cancelación de la suscripción.</p>
            </div>

            <button class="accordion">¿Puedo recibir soporte personalizado?</button>
            <div class="panel">
                <p>Sí, los planes Avanzado y Supremo incluyen soporte vía email y videollamadas semanales con mentores. El plan Supremo incluye soporte prioritario y atención personalizada.</p>
            </div>
        </div>
</x-app-layout>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
