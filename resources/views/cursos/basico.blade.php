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

        <!-- Sección de Bienvenida -->
        <div class="text-center mb-5 p-5 rounded-3xl shadow-lg bg-gradient-to-r from-blue-400 to-indigo-500 text-white">
            <h1 class="display-4 fw-bold text-dark">Estrategias y Planes de Inversión</h1>
            <p class="lead mb-4 text-dark">Aprende los fundamentos para construir tu libertad financiera y toma decisiones inteligentes sobre tu dinero.</p>
            <div class="d-flex justify-content-center">
                <iframe width="720" height="405" src="https://youtu.be/2ibqfxEAESo?si=WmBVNhPycHwDEsUq" 
                        title="Introducción a la inversión" frameborder="0" 
                        class="rounded-3 shadow-lg" allowfullscreen></iframe>
            </div>
        </div>

        <div class="row g-4 mb-5">
            
            <div class="col-md-4">
                <div class="card h-100 p-3 shadow-lg border-0 bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Introducción</h5>
                        <p class="text-muted small mb-3 flex-grow-1">Introducción a la inversión</p>
                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-check2-circle text-success me-2"></i>
                                Básicamente, se trata de <strong>poner tu dinero a trabajar</strong> en lugar de solo guardarlo.
                            </li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>
                                    Aprendes la diferencia entre <strong>ahorrar</strong> (guardar dinero, normalmente seguro pero con poco crecimiento) e <strong>invertir</strong> (arriesgar un poco más para obtener más ganancias a largo plazo).                            </li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>
                                    La idea es que tu dinero <strong>crezca con el tiempo</strong>, aprovechando intereses, dividendos o la valorización de activos.                            </li>
                        </ul>
                    </div>
                </div>
            </div>

       
            <div class="col-md-4">
                <div class="card h-100 p-3 shadow-lg border-primary position-relative bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Conceptos de Riesgo y Retorno</h5>
                        <p class="text-muted small mb-3 flex-grow-1">
                            Todo tipo de inversión tiene un <strong>riesgo</strong> (posibilidad de perder dinero) y un <strong>retorno</strong> (ganancia potencial).
                        </p>
                        <ul class="list-unstyled mb-3">Aprendes a <strong>equilibrar riesgo y beneficio</strong> según tu estilo de inversión:
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Conservador → bajo riesgo, retorno moderado</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Moderado → riesgo medio, retorno razonable</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Agresivo → riesgo alto, posible retorno alto</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-3 shadow-lg border-0  ">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Guías y plantillas básicas</h5>
                        <p class="text-light small mb-3 flex-grow-1">
                            Son <strong>herramientas prácticas</strong> para planificar tus inversiones:
                        </p>
                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-star-fill text-warning me-2"></i>Cómo establecer metas financieras</li>
                            <li><i class="bi bi-check2-circle text-info me-2"></i>Cómo distribuir tu dinero en distintas inversiones</li>
                            <li><i class="bi bi-check2-circle text-info me-2"></i>Cómo seguir y controlar tu progreso</li>                        </ul>
                        <div class="d-grid mt-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
