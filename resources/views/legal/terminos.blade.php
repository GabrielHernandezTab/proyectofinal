@extends('layout')

@section('titulo', 'Términos Legales - Gen Trading')

@section('contenido')
<style>
    .legal-container {
        background: #f8fafc;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: clamp(100px, 12vh, 160px) 0 80px 0;
    }

    .legal-card {
        border: none;
        border-top: 6px solid #0e2f53;
        border-radius: 16px;
        width: 100%;
        background: #ffffff;
    }

    .section-number {
        background: #0e2f53;
        color: white;
        width: clamp(30px, 4vw, 36px);
        height: clamp(30px, 4vw, 36px);
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-weight: 800;
        font-size: 0.9rem;
    }

    /* Alerta de riesgo estilo institucional */
    .risk-banner {
        border: 1px solid #fee2e2;
        border-left: 5px solid #dc3545;
        background-color: #fffafb;
        border-radius: 12px;
        padding: clamp(1rem, 3vw, 2rem);
    }

    .legal-text {
        line-height: 1.8;
        color: #334155;
        font-size: clamp(0.9rem, 0.8vw + 0.6rem, 1.05rem);
    }

    .text-justify {
        text-align: left;
    }
    @media (min-width: 768px) {
        .text-justify { text-align: justify; }
    }

    .subsection-title {
        color: #0e2f53;
        font-weight: 700;
        font-size: 1.1rem;
        margin-top: 1.5rem;
        display: block;
    }

    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important;
    }

    .container-fluid-custom {
        width: 100%;
        padding-right: clamp(15px, 6vw, 60px);
        padding-left: clamp(15px, 6vw, 60px);
        margin-right: auto;
        margin-left: auto;
    }
</style>
<br><br><br><br><br><br><br><br><br>
<div class="legal-container">
    <div class="container-fluid-custom">
        <div class="row justify-content-center m-0">
            <div class="col-12 col-md-11 col-lg-10 col-xl-8 p-0">
                <div class="card legal-card shadow-lg p-3 p-sm-4 p-md-5">
                    
                    <div class="text-center mb-5">
                        <h1 class="fw-bold text-dark mb-3" style="font-size: clamp(1.8rem, 5vw, 2.8rem); letter-spacing: -1px;">Términos de Servicio</h1>
                        <p class="text-uppercase text-muted fw-bold tracking-widest" style="font-size: 0.8rem; opacity: 0.7;">
                            Gen Trading International • Acuerdo de Usuario v2.1
                        </p>
                        <div class="d-inline-flex align-items-center bg-light border rounded-pill px-4 py-2 shadow-sm">
                            <span class="text-dark small fw-bold"><i class="bi bi-clock-history me-2"></i>Actualización: {{ date('d/m/Y') }}</span>
                        </div>
                    </div>

                    <div class="legal-text">
                        
                        <section class="mb-5 risk-banner shadow-sm">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-exclamation-triangle-fill text-danger fs-3 me-3"></i>
                                <h2 class="h5 mb-0 text-danger fw-bold text-uppercase">Advertencia de Riesgo Significativo</h2>
                            </div>
                            <p class="mb-0">
                                El comercio de activos financieros (Trading) implica un alto nivel de riesgo y puede no ser adecuado para todos los inversores. El apalancamiento genera riesgos adicionales. <strong>Gen Trading</strong> proporciona herramientas educativas, análisis técnico y señales algorítmicas, pero <strong>no actúa como asesor financiero, bróker o gestor de carteras</strong>. Usted es responsable de la pérdida total o parcial de su capital.
                            </p>
                        </section>

                        <section class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-number me-3 shadow-sm">01</div>
                                <h2 class="h4 mb-0 text-dark fw-bold text-uppercase">Naturaleza del Servicio</h2>
                            </div>
                            <p class="text-justify">
                                Gen Trading otorga acceso a una plataforma de software diseñada para el análisis de mercados. Nuestros servicios incluyen:
                            </p>
                            <div class="row mt-3 g-3">
                                <div class="col-sm-6">
                                    <div class="p-3 border rounded-3 bg-light h-100">
                                        <span class="subsection-title mt-0"><i class="bi bi-graph-up-arrow me-2"></i>Análisis Algorítmico</span>
                                        <p class="small text-muted mb-0">Modelos matemáticos aplicados a datos históricos y en tiempo real.</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 border rounded-3 bg-light h-100">
                                        <span class="subsection-title mt-0"><i class="bi bi-broadcast me-2"></i>Señales de Ejecución</span>
                                        <p class="small text-muted mb-0">Alertas informativas que no constituyen una orden de compra directa.</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-number me-3 shadow-sm">02</div>
                                <h2 class="h4 mb-0 text-dark fw-bold text-uppercase">Propiedad de los Algoritmos</h2>
                            </div>
                            <p class="text-justify">
                                -Todo el código fuente, lógica de indicadores, estrategias automatizadas y la arquitectura de la plataforma son propiedad exclusiva de <strong>Gen Trading</strong>. Queda estrictamente prohibida la ingeniería inversa, copia de estrategias para su reventa o el uso de "web scrapers" para extraer datos de señales sin consentimiento expreso por escrito.
                            </p>
                        </section>

                        <section class="mb-5">
    <div class="d-flex align-items-center mb-4">
        <div class="section-number me-3 shadow-sm">03</div>
        <h2 class="h4 mb-0 text-dark fw-bold text-uppercase" style="font-size: clamp(1rem, 1.5vw, 1.25rem);">Modelo de Sostenibilidad y Contribuciones</h2>
    </div>
    <div class="text-justify">
        <p>
            Para garantizar que nuestras herramientas de análisis sigan siendo accesibles y mantener una infraestructura tecnológica de baja latencia, <strong>Gen Trading</strong> sustenta sus operaciones mediante los siguientes mecanismos:
        </p>
        
        <div class="row g-3 mt-2">
            <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100 shadow-sm">
                    <span class="fw-bold d-block mb-2 text-dark"><i class="bi bi-megaphone me-2"></i>Alianzas Publicitarias</span>
                    <p class="small text-muted mb-0">La plataforma incluye espacios publicitarios estratégicos coordinados con socios del sector financiero. Gen Trading no se hace responsable de las ofertas de terceros en dichos anuncios.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100 shadow-sm">
                    <span class="fw-bold d-block mb-2 text-dark"><i class="bi bi-heart-pulse me-2"></i>Respaldo Comunitario</span>
                    <p class="small text-muted mb-0">Aceptamos contribuciones voluntarias destinadas íntegramente al I+D y mantenimiento de servidores. Estas aportaciones se consideran donaciones a fondo perdido y no otorgan derechos de propiedad ni gobernanza sobre los algoritmos.</p>
                </div>
            </div>
        </div>

        <p class="mt-4 small text-muted italic border-top pt-3">
            * <strong>Nota sobre Reembolsos:</strong> Al tratarse de aportaciones voluntarias para el sostenimiento del proyecto y no de la compra de un producto físico, las contribuciones no son reembolsables. Gen Trading se reserva el derecho de implementar modelos de suscripción en el futuro, previa notificación a la comunidad.
        </p>
    </div>
</section>

                        <section class="mb-5 border-top pt-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="section-number me-3 shadow-sm">04</div>
                                <h2 class="h5 mb-0 text-dark fw-bold text-uppercase">Limitación de Responsabilidad</h2>
                            </div>
                            <p class="text-justify small text-muted">
                                Gen Trading no garantiza resultados financieros específicos. Los fallos en la conexión a internet del usuario, errores en las APIs de los Exchanges (Binance, Bybit, MetaTrader, etc.) o retrasos en la ejecución de órdenes son riesgos técnicos ajenos a nuestra infraestructura. No nos hacemos responsables de pérdidas por negligencia del usuario en la protección de sus claves API.
                            </p>
                        </section>

                    </div>

                    <div class="mt-5 pt-4 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center gap-4">
                        <div class="text-center text-sm-start">
                            <p class="mb-0 text-muted small fw-bold">DEPARTAMENTO LEGAL</p>
                            <a href="mailto:info@gentrading.es" class="text-primary text-decoration-none small">legal@gentrading.es</a>
                        </div>
                        <a href="{{ url('/') }}" class="btn btn-dark rounded-pill px-5 py-3 fw-bold shadow hover-lift transition-all w-100 w-sm-auto text-uppercase tracking-tighter">
                            Entendido y Volver
                        </a>
                    </div>

                </div>
                
                <p class="text-center mt-4 text-muted small opacity-50">&copy; {{ date('Y') }} Gen Trading Group. Operando bajo estándares de transparencia financiera.</p>
            </div>
        </div>
    </div>
</div>
@endsection