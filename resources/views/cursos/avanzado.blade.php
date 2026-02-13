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
            {{ __('Pack Avanzado') }}
        </h2>
    </x-slot>

    <div class="container py-5">

        
        <div class="text-center mb-5 p-5 rounded-3xl shadow-lg bg-gradient-to-r from-purple-400 to-indigo-600 text">
            <h1 class="display-4 fw-bold mb-3">Pack Avanzado</h1>
            <p class="text-white-50 mb-4">Todo lo que necesitas para llevar tus inversiones al siguiente nivel.</p>
        </div>

        
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary position-relative bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Curso Extendido</h5>
                        <p class="text-muted small mb-3 flex-grow-1">60 horas de contenido avanzado</p>
                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Value Investing</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Day Trading</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary position-relative bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Simulador de Inversiones</h5>
                        <p class="text-muted small mb-3 flex-grow-1">Practica con inversiones reales sin riesgo</p>
                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Compra y venta simulada</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Analiza resultados en tiempo real</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary position-relative bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Comunidad Privada</h5>
                        <p class="text-light small mb-3 flex-grow-1">Accede a nuestro Discord exclusivo para alumnos</p>
                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-people-fill text-info me-2"></i>Networking con otros inversores</li>
                            <li><i class="bi bi-chat-dots-fill text-info me-2"></i>Soporte y consejos de mentores</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary position-relative bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Extras Avanzados</h5>
                        <p class="text-muted small mb-3 flex-grow-1">Herramientas y recursos para tu crecimiento</p>
                        <ul class="list-unstyled mb-3">
                            <li><i class="bi bi-journal-text text-success me-2"></i>Plantillas y guías especializadas</li>
                            <li><i class="bi bi-bar-chart-line-fill text-success me-2"></i>Seguimiento de tus inversiones</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12++ col-lg mx-auto">
    <div class="card h-100 p-4 shadow-lg border-0 bg-white" style="border-radius: 20px;">
        <div class="card-body">
            <h2 class="fw-bold text-primary mb-4" style="letter-spacing: -1px;">
                Domina el Mercado: Curso Extendido Pack Avanzado
            </h2>
            
            <p class="lead text-secondary mb-5">
                Una experiencia de aprendizaje integral diseñada para quienes no se conforman con los fundamentos. Con <strong>60 horas de contenido especializado</strong>, transformamos la teoría rigurosa en una ejecución impecable.
            </p>

            <div class="row g-4">
                <div class="col-md-6">
                    <h5 class="fw-bold text-dark"><i class="bi bi-graph-up-arrow text-success me-2"></i>Análisis Fundamental</h5>
                    <p class="text-muted small">Domina el <strong>Value Investing</strong>. Aprende a identificar "joyas ocultas", interpretar estados financieros y determinar el valor real de activos para construir carteras de crecimiento sostenido.</p>
                </div>

                <div class="col-md-6">
                    <h5 class="fw-bold text-dark"><i class="bi bi-lightning-charge-fill text-warning me-2"></i>Day Trading</h5>
                    <p class="text-muted small">Agilidad pura. Opera en tiempo real con patrones de velas y análisis de volumen. Aprende a capitalizar la volatilidad con entradas y salidas estratégicas en segundos.</p>
                </div>

                <div class="col-md-6">
                    <h5 class="fw-bold text-dark"><i class="bi bi-cpu text-info me-2"></i>Simulador de Élite</h5>
                    <p class="text-muted small">Practica sin riesgo. Nuestra herramienta replica el mercado real para que perfecciones tu sistema de inversión y ganes confianza antes de usar capital propio.</p>
                </div>

                <div class="col-md-6">
                    <h5 class="fw-bold text-dark"><i class="bi bi-discord text-primary me-2"></i>Comunidad VIP</h5>
                    <p class="text-muted small">Acceso exclusivo a Discord. Mentoría directa, análisis de casos reales y networking con una red de inversores que comparten tu mismo nivel de ambición.</p>
                </div>
            </div>

            <hr class="my-4 opactiy-10">

            <div class="bg-light p-3 rounded-3 border-start border-primary border-4">
                <h6 class="fw-bold mb-2">Tu Transformación Profesional</h6>
                <p class="small text-muted mb-0">
                    No solo enseñamos técnica; forjamos la <strong>mentalidad del 1%</strong>. Disciplina, gestión de riesgo y autonomía para que dejes de seguir consejos y empieces a liderar tu propio patrimonio.
                </p>
            </div>
        </div>
    </div>
            </div>


    </div>
        <a href="/mis-planes" style="float:right" >Volver a los planes</a>

</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
