<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    .card { transition: transform 0.3s ease; }
    .card:hover { transform: translateY(-10px); box-shadow: 0 15px 25px rgba(0,0,0,0.15); }
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
        border-radius: 0.5rem;
        margin-bottom: 5px;
    }
    .accordion:after {
        content: '\02795'; 
        font-size: 13px;
        color: #777;
        float: right;
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
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Pack Avanzado') }}
        </h2>
    </x-slot>

    <div class="container py-5">

        <!-- HERO -->
        <div class="text-center mb-5 p-5 rounded-3xl shadow-lg bg-primary text-white">
            <h1 class="display-4 fw-bold mb-3">Pack Avanzado</h1>
            <p class="text-white-50 mb-4">Todo lo que necesitas para llevar tus inversiones al siguiente nivel.</p>
        </div>

        <!-- CARDS PRINCIPALES -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Curso Extendido</h5>
                        <p class="text-muted small flex-grow-1">60 horas de contenido avanzado</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Value Investing</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Day Trading</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Simulador de Inversiones</h5>
                        <p class="text-muted small flex-grow-1">Practica sin riesgo</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Compra/venta simulada</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Resultados en tiempo real</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Comunidad Privada</h5>
                        <p class="text-muted small flex-grow-1">Acceso a Discord exclusivo</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-people-fill text-info me-2"></i>Networking</li>
                            <li><i class="bi bi-chat-dots-fill text-info me-2"></i>Mentores</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">Extras</h5>
                        <p class="text-muted small flex-grow-1">Recursos avanzados</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-journal-text text-success me-2"></i>Plantillas</li>
                            <li><i class="bi bi-bar-chart-line-fill text-success me-2"></i>Seguimiento</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- NUEVAS CARDS -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary bg-light">
                    <h5 class="text-primary fw-bold">Gestión de Riesgo</h5>
                    <ul class="list-unstyled small">
                        <li>Stop Loss avanzado</li>
                        <li>Control de pérdidas</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary bg-light">
                    <h5 class="text-primary fw-bold">Psicología</h5>
                    <ul class="list-unstyled small">
                        <li>Control emocional</li>
                        <li>Disciplina</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary bg-light">
                    <h5 class="text-primary fw-bold">Análisis Técnico</h5>
                    <ul class="list-unstyled small">
                        <li>Indicadores</li>
                        <li>Price action</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-primary bg-light">
                    <h5 class="text-primary fw-bold">Estrategias</h5>
                    <ul class="list-unstyled small">
                        <li>Breakouts</li>
                        <li>Reversiones</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- BLOQUE PRINCIPAL -->
        <div class="card p-4 shadow-lg mb-5">
            <h2 class="fw-bold text-primary mb-3">Domina el Mercado</h2>
            <p class="text-muted">
                Aprende análisis fundamental, técnico y gestión emocional para convertirte en un inversor completo.
            </p>
        </div>

        <!-- ACORDEÓN -->
        <div class="mb-5">
            <h3 class="fw-bold text-primary mb-4">Contenido Detallado del Programa</h3>

            <button class="accordion">Módulo 1: Análisis Técnico Avanzado</button>
            <div class="panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Price Action profundo:</strong> Lectura de velas institucionales y zonas de oferta/demanda.</li>
                        <li class="list-group-item"><strong>Estructura de Mercado:</strong> Identificación de rangos, tendencias y quiebres de estructura (BOS/CHoCH).</li>
                        <li class="list-group-item"><strong>Indicadores Pro:</strong> Configuración avanzada de RSI, MACD y uso de Fibonacci para entradas precisas.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion">Módulo 2: Estrategias de Trading Operativas</button>
            <div class="panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Day Trading:</strong> Setups de alta probabilidad para aperturas de mercado.</li>
                        <li class="list-group-item"><strong>Swing Trading:</strong> Gestión de posiciones a medio plazo y captura de ciclos económicos.</li>
                        <li class="list-group-item"><strong>Scalping Consciente:</strong> Operativa en temporalidades menores (1m/5m) con gestión de spreads.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion">Módulo 3: Gestión de Capital e Interés Compuesto</button>
            <div class="panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Matemática del Trading:</strong> Cálculo de lotaje según el riesgo porcentual (1% regla de oro).</li>
                        <li class="list-group-item"><strong>Drawdown:</strong> Cómo recuperar una racha negativa sin arriesgar la cuenta.</li>
                        <li class="list-group-item"><strong>Plan de Trading:</strong> Creación de una bitácora profesional y objetivos de rentabilidad realistas.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion">Módulo 4: Psicotrading y Control Emocional</button>
            <div class="panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Sesgos Cognitivos:</strong> El miedo a perder (FOMO) y la avaricia en la toma de decisiones.</li>
                        <li class="list-group-item"><strong>Rutina del Trader:</strong> Preparación pre-market y desconexión post-market.</li>
                        <li class="list-group-item"><strong>Disciplina Operativa:</strong> Cómo seguir tu plan cuando el mercado está volátil.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion">Módulo 5: Análisis Fundamental y Macroeconomía</button>
            <div class="panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Calendario Económico:</strong> Impacto de tipos de interés, inflación (IPC) y nóminas no agrícolas (NFP).</li>
                        <li class="list-group-item"><strong>Correlaciones:</strong> Relación entre el Oro, el Dólar (DXY) y los índices bursátiles.</li>
                    </ul>
                </div>
            </div>
        </div>

        <a href="/mis-planes" style="float:right">Volver a los planes</a>

    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const acc = document.getElementsByClassName("accordion");
    for (let i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            let panel = this.nextElementSibling;
            panel.style.maxHeight = panel.style.maxHeight ? null : panel.scrollHeight + "px";
        });
    }
</script>