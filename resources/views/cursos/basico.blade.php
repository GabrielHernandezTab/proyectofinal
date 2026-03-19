<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    /* Animaciones tarjetas y botones */
    .card { transition: transform 0.3s ease; }
    .card:hover { transform: translateY(-10px); box-shadow: 0 15px 25px rgba(0,0,0,0.15); }
    .btn-animate { transition: all 0.3s ease; }
    .btn-animate:hover { filter: brightness(1.1); transform: scale(1.05); }

    /* Acordeón personalizado */
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
        border-radius: 0.5rem;
    }
    .accordion:after {
        content: '\02795'; 
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }
    .active:after { content: "\2796"; }
    .active, .accordion:hover { background-color: #b2b1daff; }
    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        border-radius: 0.5rem;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Curso Básico de Inversiones') }}
        </h2>
    </x-slot>

    <div class="container py-5">

        <div class="text-center mb-5 p-5 rounded-3xl shadow-lg bg-gradient-to-r from-blue-400 to-indigo-500 text-white">
            <h1 class="display-4 fw-bold text-dark">Estrategias y Planes de Inversión</h1>
            <p class="lead mb-4 text-dark">Aprende los fundamentos para construir tu libertad financiera y toma decisiones inteligentes sobre tu dinero.</p>
            <div class="d-flex justify-content-center">
                <iframe width="720" height="405" 
                        src="https://www.youtube.com/embed/r2e-Nf2Vemc" 
                        title="Introducción a la inversión" frameborder="0" 
                        class="rounded-3 shadow-lg" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card h-100 p-3 shadow-lg border-primary position-relative bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Introducción</h5>
                        <p class="text-muted small mb-3 flex-grow-1">Introducción a la inversión</p>
                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-check2-circle text-success me-2"></i>
                                Básicamente, se trata de <strong>poner tu dinero a trabajar</strong> en lugar de solo guardarlo.
                            </li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>
                                Aprendes la diferencia entre <strong>ahorrar</strong> e <strong>invertir</strong>.
                            </li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>
                                La idea es que tu dinero <strong>crezca con el tiempo</strong> aprovechando el mercado.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-3 shadow-lg border-primary position-relative bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Conceptos de Riesgo y Retorno</h5>
                        <p class="text-muted small mb-3 flex-grow-1">
                            Todo tipo de inversión tiene un <strong>riesgo</strong> y un <strong>retorno</strong>.
                        </p>
                        <ul class="list-unstyled mb-3">Aprendes a <strong>equilibrar riesgo y beneficio</strong>:
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Conservador → bajo riesgo</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Moderado → riesgo medio</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Agresivo → riesgo alto</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-3 shadow-lg border-primary position-relative bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Guías y plantillas básicas</h5>
                        <p class="text-muted small mb-3 flex-grow-1">
                            Son <strong>herramientas prácticas</strong> para planificar:
                        </p>
                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-star-fill text-warning me-2"></i>Cómo establecer metas financieras</li>
                            <li><i class="bi bi-check2-circle text-info me-2"></i>Cómo distribuir tu dinero</li>
                            <li><i class="bi bi-check2-circle text-info me-2"></i>Cómo seguir tu progreso</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card h-100 p-3 shadow-lg border-primary position-relative bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Tipos de Activos</h5>
                        <p class="text-muted small mb-3 flex-grow-1">Conoce dónde puedes colocar tu capital:</p>
                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-check2-circle text-success me-2"></i><strong>Acciones:</strong> Ser dueño de una parte de una empresa.</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i><strong>Bonos:</strong> Prestar dinero a cambio de intereses fijos.</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i><strong>ETFs:</strong> Fondos que agrupan muchos activos a la vez.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-3 shadow-lg border-primary position-relative bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">El Interés Compuesto</h5>
                        <p class="text-muted small mb-3 flex-grow-1">La clave para multiplicar tu patrimonio a largo plazo:</p>
                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-check2-circle text-success me-2"></i>No retires tus ganancias; <strong>reinvierte</strong>.</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>El tiempo es tu mejor aliado (efecto bola de nieve).</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Pequeñas cantidades hoy son fortunas mañana.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-3 shadow-lg border-primary position-relative bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Diversificación</h5>
                        <p class="text-muted small mb-3 flex-grow-1">La regla de oro para no perderlo todo:</p>
                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-check2-circle text-success me-2"></i>No pongas "todos los huevos en una sola canasta".</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Invierte en diferentes sectores y países.</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Reduce el impacto si a una empresa le va mal.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <a href="/mis-planes" style="float:right">Volver a los planes</a>

    </div>
</x-app-layout>

<script>
var acc = document.getElementsByClassName("accordion");
for (var i=0; i<acc.length; i++){
    acc[i].addEventListener("click", function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        panel.style.maxHeight = panel.style.maxHeight ? null : panel.scrollHeight + "px";
    });
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>