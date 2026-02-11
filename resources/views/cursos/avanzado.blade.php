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

        <!-- Sección de Pack Avanzado -->
        <div class="text-center mb-5 p-5 rounded-3xl shadow-lg bg-gradient-to-r from-purple-400 to-indigo-600 text">
            <h1 class="display-4 fw-bold mb-3">Pack Avanzado</h1>
            <p class="lead mb-2">35€ / mes <span class="text-warning fw-bold">15% de descuento para colectivos especiales*</span></p>
            <p class="text-white-50 mb-4">Todo lo que necesitas para llevar tus inversiones al siguiente nivel.</p>
        </div>

        <!-- Módulos del Pack Avanzado -->
        <div class="row g-4 mb-5">
            <!-- Módulo 1 -->
            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-0 bg-light">
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

            <!-- Módulo 2 -->
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

            <!-- Módulo 3 -->
            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-0  text">
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

            <!-- Módulo 4 -->
            <div class="col-md-3">
                <div class="card h-100 p-3 shadow-lg border-0 bg-light">
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
            <div class="md-6">
                <div class="card h-100 p-3 shadow-lg border-0 bg-light">
                    El Curso Extendido del Pack Avanzado es una experiencia de aprendizaje integral diseñada para quienes buscan no solo conocer los fundamentos de la inversión, sino dominar técnicas avanzadas y herramientas profesionales que les permitan tomar decisiones financieras sólidas y estratégicas. Con 60 horas de contenido avanzado, este curso combina teoría rigurosa, práctica aplicada y recursos tecnológicos que permiten a los alumnos adentrarse de manera profunda en el mundo de los mercados financieros, desde la inversión a largo plazo hasta las operaciones de corto plazo.
    
                    Uno de los pilares del curso es el Value Investing, un enfoque que enseña a los inversores a analizar empresas desde sus fundamentos, identificando oportunidades que el mercado podría estar subvalorando. Los alumnos aprenden a interpretar estados financieros, evaluar la salud económica de una compañía, comprender ratios financieros clave y determinar el verdadero valor de sus activos. Esta metodología permite construir carteras diversificadas, con inversiones que ofrecen estabilidad y crecimiento sostenido, enfocándose en estrategias que generan retornos a largo plazo de manera segura y eficiente. La comprensión del Value Investing no solo prepara para invertir en acciones, sino también para tomar decisiones financieras más inteligentes en cualquier tipo de activo, desde bonos hasta fondos mutuos y ETFs.
                    
                    A la par, el curso aborda Day Trading, un enfoque más dinámico y práctico que enseña cómo operar con movimientos de precios en plazos cortos. Se estudian patrones de comportamiento del mercado, gráficos de velas, indicadores técnicos, análisis de volumen y tendencias, así como estrategias de entrada y salida de posiciones. El objetivo es que los alumnos puedan identificar oportunidades de ganancia inmediata, aprendiendo a equilibrar riesgo y retorno en situaciones donde la volatilidad es alta. Este enfoque permite combinar la visión de largo plazo del Value Investing con la capacidad de reaccionar y aprovechar oportunidades en tiempo real, generando así un perfil de inversor completo y versátil.
                    
                    Para garantizar que el aprendizaje sea práctico y aplicable, el curso incluye un simulador de inversiones, una herramienta que replica de manera realista las operaciones del mercado sin poner dinero real en riesgo. Los estudiantes pueden practicar compras y ventas, probar distintas estrategias, analizar resultados y tomar decisiones informadas basadas en datos reales del mercado. Esta simulación permite aprender de los errores sin consecuencias económicas, consolidando la confianza y la habilidad para operar en condiciones reales una vez finalizado el curso. Además, se enseña cómo interpretar métricas de desempeño, evaluar la eficiencia de cada operación y ajustar estrategias para optimizar resultados, asegurando que cada alumno pueda experimentar y aprender de manera autónoma y segura.
                    
                    El aprendizaje no se limita a la teoría y la práctica individual. Los alumnos tienen acceso a una comunidad privada en Discord, un espacio exclusivo donde pueden interactuar con otros inversores, intercambiar experiencias, debatir estrategias y recibir asesoramiento directo de mentores expertos. Esta comunidad funciona como un ecosistema de networking que potencia el aprendizaje colaborativo, permitiendo que cada estudiante amplíe sus conocimientos, reciba retroalimentación inmediata y participe en discusiones sobre casos reales de inversión. Los mentores brindan orientación, recomendaciones personalizadas y consejos estratégicos que ayudan a los alumnos a superar obstáculos, gestionar riesgos y aplicar de manera efectiva las herramientas y técnicas aprendidas.
                    
                    Además, el curso ofrece herramientas y recursos avanzados que van mucho más allá del contenido en vídeo. Se proporcionan plantillas para la planificación financiera, guías especializadas para seguimiento de inversiones, sistemas para monitorear el rendimiento de la cartera y metodologías para ajustar estrategias según los objetivos y el perfil de riesgo de cada inversor. Estas herramientas permiten a los alumnos organizar su aprendizaje, medir su progreso y aplicar de forma práctica los conceptos estudiados, asegurando que cada conocimiento se traduzca en decisiones reales y efectivas.
                    
                    El enfoque del curso está diseñado para desarrollar no solo conocimientos técnicos, sino también habilidades estratégicas y de análisis crítico. Los alumnos aprenden a tomar decisiones basadas en datos, evaluar riesgos de manera consciente y equilibrar sus inversiones según objetivos financieros personales. También se fomenta la disciplina, la planificación y la constancia, cualidades esenciales para alcanzar el éxito en el mundo de la inversión. Gracias a esta metodología integral, quienes completan el Curso Extendido no solo adquieren herramientas y conocimientos, sino que también desarrollan una mentalidad de inversor profesional, capaz de enfrentar la volatilidad del mercado con seguridad y criterio.
                    
                    En síntesis, el Curso Extendido del Pack Avanzado es mucho más que un conjunto de lecciones. Es un camino completo hacia la profesionalización en inversión, combinando contenido profundo, práctica simulada, interacción con expertos, recursos avanzados y herramientas de seguimiento que permiten a los alumnos crecer como inversores confiables, preparados para gestionar sus propias carteras, maximizar oportunidades y minimizar riesgos. Con esta experiencia, el alumno no solo entiende cómo funciona el mercado, sino que se convierte en un actor capaz de actuar estratégicamente, planificar a largo plazo y aplicar cada conocimiento de manera práctica, segura y eficiente.
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
