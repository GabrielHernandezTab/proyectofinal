@extends('layout')

@section('titulo', 'Masterclass Integral: Detalle Avanzado de Planes')

@section('contenido')
<br><br>
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-3 fw-bold text-dark">Ecosistema de Formación Financiera</h1>
        <p class="lead text-muted mx-auto" style="max-width: 900px;">
            Nuestra metodología no se basa en señales de trading, sino en la transferencia de capacidades críticas. Formamos inversores independientes capaces de navegar ciclos alcistas y bajistas con rigor científico.
        </p>
    </div>

    <div class="row g-5">
        
        <div class="col-12 shadow-sm p-0 rounded-4 overflow-hidden border mb-5 bg-white">
            <div class="bg-light p-4 border-bottom d-flex justify-content-between align-items-center">
                <h2 class="h3 mb-0 fw-bold text-secondary"><i class="bi bi-mortarboard-fill me-2"></i>Pack Gratuito: Alfabetización y Fundamentos</h2>
                <span class="badge bg-success">Acceso Inmediato</span>
            </div>
            <div class="p-4 p-md-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="display-5 fw-bold text-success mb-2">0€</div>
                        <p class="text-muted fw-bold">Compromiso Cero - Conocimiento Infinito</p>
                        <hr>
                        <h6>Objetivos del Plan:</h6>
                        <ul class="list-unstyled small text-muted">
                            <li><i class="bi bi-check2 text-success me-2"></i>Entender la terminología básica.</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Configurar brokers regulados.</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Identificar estafas piramidales.</li>
                        </ul>
                    </div>
                    <div class="col-lg-8 border-start ps-lg-5">
                        <h4 class="fw-bold text-dark mb-4">Módulos de Inmersión Inicial:</h4>
                        
                        <div class="mb-4">
                            <h5 class="text-primary"><i class="bi bi-1-circle-fill me-2"></i>Filosofía de Inversión y el Tiempo</h5>
                            <p class="text-secondary">Explicamos por qué el ahorro es una pérdida garantizada en el sistema inflacionario actual. Analizamos la <strong>regla del 72</strong> para proyectar cuándo se duplicará tu capital y cómo el <strong>interés compuesto</strong> beneficia al inversor que empieza joven, independientemente del capital.</p>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary"><i class="bi bi-2-circle-fill me-2"></i>Psicología del Dinero (Behavioral Finance)</h5>
                            <p class="text-secondary">Introducción a los sesgos cognitivos: por qué compramos cuando el mercado sube (euforia) y vendemos cuando baja (pánico). Entenderás el ciclo del mercado desde una perspectiva psicológica para no ser una víctima de las manos fuertes.</p>
                        </div>

                        <div>
                            <h5 class="text-primary"><i class="bi bi-3-circle-fill me-2"></i>Infraestructura Tecnológica Segura</h5>
                            <p class="text-secondary">Comparativa de aplicaciones según tu ubicación geográfica. Analizamos la seguridad de los fondos (seguros de depósitos), comisiones de custodia y facilidad de uso. Todo enfocado en productos de <strong>Riesgo 1/6</strong> (Cuentas remuneradas y letras del tesoro).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 shadow p-0 rounded-4 overflow-hidden border border-primary mb-5 bg-white">
            <div class="bg-primary p-4 text-white d-flex justify-content-between align-items-center">
                <h2 class="h3 mb-0 fw-bold"><i class="bi bi-cpu-fill me-2"></i>Pack Avanzado: Metodología y Operativa Profesional</h2>
                <span class="badge bg-warning text-dark">Más Popular</span>
            </div>
            <div class="p-4 p-md-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="display-5 fw-bold text-primary mb-3">35€ <small class="fs-6 text-muted">/mes</small></div>
                        <div class="card bg-light border-0 mb-3">
                            <div class="card-body p-3">
                                <p class="mb-0 small"><strong>Descuento Especial:</strong> 15% para estudiantes, jubilados y personas con discapacidad acreditada mediante el panel de usuario.</p>
                            </div>
                        </div>
                        <p class="fw-bold text-primary">Contenido técnico de alto impacto (60h+)</p>
                    </div>
                    <div class="col-lg-8 border-start ps-lg-5">
                        <h4 class="fw-bold mb-4">Estrategias de Gestión Activa:</h4>

                        <div class="mb-4">
                            <h5 class="text-primary">1. Estrategia de Dividendos y Rentas (Income)</h5>
                            <p class="text-secondary">Aprenderás a seleccionar empresas <em>Dividend Aristocrats</em> que han incrementado su pago por más de 25 años. Te enseñamos a reinvertir estos dividendos de forma automática para acelerar la creación de una "bola de nieve" financiera.</p>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary">2. Value Investing y Análisis Sectorial</h5>
                            <p class="text-secondary">Entramos en el análisis cualitativo: fosos económicos (Moats), calidad de la directiva y ventajas competitivas. Usamos herramientas profesionales para detectar empresas infravaloradas que el mercado ha ignorado por ruido mediático.</p>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary">3. Day Trading y Análisis de Volatilidad</h5>
                            <p class="text-secondary">Operativa de corto plazo. Introducción a la <strong>acción del precio</strong>, velas japonesas y volumen. No usamos "bots" mágicos; te enseñamos a leer lo que las instituciones están haciendo en el gráfico para seguir su rastro.</p>
                        </div>

                        <div>
                            <h5 class="text-primary">4. Marco Legal y Fiscalidad Europea/Latam</h5>
                            <p class="text-secondary">Módulo crítico: Cómo tributan las plusvalías, los dividendos y las retenciones en origen. Aprenderás a compensar pérdidas con ganancias para que tu factura fiscal sea la mínima legalmente permitida.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 shadow-lg p-0 rounded-4 overflow-hidden border border-dark mb-5 bg-dark">
            <div class="bg-gradient p-4 text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, #212529 0%, #343a40 100%);">
                <h2 class="h3 mb-0 fw-bold text-info"><i class="bi bi-shield-shaded me-2"></i>Pack Supremo: Mentoría y Alta Dirección de Carteras</h2>
                <span class="badge bg-info text-dark">Máximo Nivel</span>
            </div>
            <div class="p-4 p-md-5 text-white">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="display-5 fw-bold text-info mb-2">60€ <small class="fs-6 text-secondary">/mes</small></div>
                        <p class="text-info fw-bold small text-uppercase mb-4">Fidelización: 45€ desde el 3er mes</p>
                        <div class="p-3 border border-secondary rounded">
                            <h6>Incluye:</h6>
                            <ul class="list-unstyled small">
                                <li><i class="bi bi-check2-all text-info me-2"></i>100 Horas de material élite</li>
                                <li><i class="bi bi-check2-all text-info me-2"></i>3 Vídeos nuevos por semana</li>
                                <li><i class="bi bi-check2-all text-info me-2"></i>Llamadas de urgencia de mercado</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 border-start border-secondary ps-lg-5">
                        <h4 class="fw-bold text-info mb-4">Gestión de Patrimonio y Mentoría VIP:</h4>

                        <div class="mb-4">
                            <h5 class="text-white">A. Mentoría Particular y Videoconferencia Directa</h5>
                            <p class="text-secondary">Semanalmente, revisamos tu operativa. Analizamos por qué entraste en una posición y por qué saliste. Es un proceso de <strong>auditoría profesional</strong> que corrige tus vicios de inversión antes de que se vuelvan costosos.</p>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-white">B. Análisis Fundamental Avanzado y Valoración DCF</h5>
                            <p class="text-secondary">Aprenderás a proyectar flujos de caja futuros (Discounted Cash Flow). Sabrás calcular el "Valor Intrínseco" de una acción para saber cuánto deberías pagar por ella hoy según sus beneficios de los próximos 10 años.</p>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-white">C. Análisis Técnico e Indicadores de Momento</h5>
                            <p class="text-secondary">Dominio de indicadores de fuerza relativa (RSI), medias móviles exponenciales (EMA) y bandas de Bollinger. Te enseñamos a combinar el análisis macro con el "timing" perfecto de entrada en el gráfico.</p>
                        </div>

                        <div>
                            <h5 class="text-white">D. Estructura de Carteras y Rebalanceo Automático</h5>
                            <p class="text-secondary">Diseñamos una cartera diversificada: Acciones de crecimiento, materias primas (Oro/Petróleo), activos digitales y liquidez. Aprenderás a rebalancear cada trimestre para "vender caro" lo que ha subido y "comprar barato" lo que ha bajado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-secondary mt-5 small shadow-sm">
        <h6 class="fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i>Advertencia de Riesgo Legal:</h6>
        <p class="mb-0">El mercado de valores conlleva riesgos significativos. La información proporcionada en estos cursos es con fines meramente educativos y no constituye asesoramiento financiero personalizado. El rendimiento pasado no es un indicador fiable de resultados futuros. Nunca invierta dinero que no pueda permitirse perder.</p>
    </div>
</div>
@endsection