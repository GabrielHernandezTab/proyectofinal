<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    body { background-color: #f5f5f5; font-family: 'Inter', sans-serif; color: #111827; }
    .hero-supremo { background: linear-gradient(135deg, #0d1b2a 0%, #1e3a8a 60%, #1d4ed8 100%); border-radius: 20px; padding: 3.5rem 2rem; color: white; margin-bottom: 2.5rem; }
    .stat-box { background: rgba(255,255,255,0.12); border-radius: 12px; padding: 1rem; text-align: center; }
    .stat-box .num { font-size: 2rem; font-weight: 700; }
    .stat-box .label { font-size: 0.85rem; opacity: 0.85; }
    .card { transition: transform 0.3s ease; }
    .card:hover { transform: translateY(-8px); box-shadow: 0 15px 25px rgba(0,0,0,0.12); }
    .card-custom { background: white; border-radius: 16px; box-shadow: 0 8px 20px rgba(0,0,0,0.08); padding: 2rem 1.5rem; text-align: center; transition: transform 0.3s, box-shadow 0.3s; }
    .card-custom:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.15); }
    .card-custom i { font-size: 2.5rem; color: #1e3a8a; margin-bottom: 1rem; display: block; }
    .tip-box { background: #fefce8; border-left: 4px solid #f59e0b; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1rem; }
    .example-box { background: #f0fdf4; border: 1px solid #86efac; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; }
    .resource-link { display: flex; align-items: center; gap: 10px; padding: 0.75rem 1rem; border-radius: 10px; background: #f0f4ff; text-decoration: none; color: #1e3a8a; margin-bottom: 0.5rem; transition: background 0.2s; }
    .resource-link:hover { background: #dbeafe; color: #1e3a8a; }
    .contact-box { background: linear-gradient(135deg, #0d1b2a, #1e3a8a); color: white; border-radius: 20px; padding: 2.5rem 2rem; margin-bottom: 2rem; }
    .contact-box h4 { font-weight: 700; margin-bottom: 1rem; }
    .contact-method { background: rgba(255,255,255,0.1); border-radius: 12px; padding: 1.25rem; margin-bottom: 1rem; display: flex; align-items: center; gap: 1rem; }
    .contact-method i { font-size: 1.75rem; flex-shrink: 0; }
    .details-item { padding: 1.25rem; background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); margin-bottom: 1rem; }
    .details-item h5 { font-weight: 600; color: #1e3a8a; margin-bottom: 0.5rem; }
    .details-item h5 i { margin-right: 0.5rem; }
    .details-item p { font-size: 0.9rem; color: #6b7280; margin-bottom: 0; }
    .vip-badge { background: linear-gradient(90deg, #f59e0b, #ef4444); color: white; font-weight: 700; padding: 0.4rem 1rem; border-radius: 9999px; font-size: 0.8rem; display: inline-block; margin-bottom: 0.75rem; }
    .accordion-btn { background-color: #e0e7ff; color: #1e3a8a; cursor: pointer; padding: 16px 20px; width: 100%; text-align: left; border: none; outline: none; transition: 0.3s; border-radius: 10px; margin-bottom: 6px; font-weight: 600; }
    .accordion-btn:after { content: '\02795'; font-size: 13px; float: right; }
    .accordion-btn.active:after { content: "\2796"; }
    .accordion-btn.active, .accordion-btn:hover { background-color: #c7d2fe; }
    .accordion-panel { padding: 0 18px; background-color: white; max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out; border-radius: 10px; }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl leading-tight text-center" style="color:#1e3a8a;">{{ __('Pack Supremo') }}</h2>
    </x-slot>

    <div class="container py-5">

        {{-- HERO --}}
        <div class="hero-supremo">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="vip-badge">⭐ NIVEL ÉLITE — ACCESO TOTAL</div>
                    <h1 class="display-5 fw-bold mb-3">Pack Supremo</h1>
                    <p class="lead mb-4">La experiencia definitiva con acompañamiento personalizado, alertas VIP en tiempo real, videollamadas semanales con mentor y acceso vitalicio a todos los recursos.</p>
                    <div class="row g-3">
                        <div class="col-3"><div class="stat-box"><div class="num">100h</div><div class="label">Contenido</div></div></div>
                        <div class="col-3"><div class="stat-box"><div class="num">1:1</div><div class="label">Mentoría</div></div></div>
                        <div class="col-3"><div class="stat-box"><div class="num">24/7</div><div class="label">Alertas VIP</div></div></div>
                        <div class="col-3"><div class="stat-box"><div class="num">∞</div><div class="label">Vitalicio</div></div></div>
                    </div>
                </div>
                <div class="col-md-4 text-center mt-4 mt-md-0">
                    <iframe width="100%" height="200"
                        src="https://www.youtube.com/embed/PHe0bXAIuk0"
                        title="Estrategias de inversores élite" frameborder="0"
                        class="rounded-3 shadow-lg"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <small class="text-white-50 mt-1 d-block">📹 Estrategias de los mejores inversores del mundo</small>
                </div>
            </div>
        </div>

        {{-- CARACTERÍSTICAS PRINCIPALES --}}
        <div class="row g-4 mb-5">
            <div class="col-md-3 col-6">
                <div class="card-custom">
                    <i class="bi bi-person-video3"></i>
                    <h6 class="fw-bold">Mentoría 1 a 1</h6>
                    <p class="small text-muted">Sesión semanal personalizada con tu mentor por videollamada</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-custom">
                    <i class="bi bi-broadcast"></i>
                    <h6 class="fw-bold">Alertas VIP</h6>
                    <p class="small text-muted">Canal privado con señales de trading en tiempo real 24/7</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-custom">
                    <i class="bi bi-calculator"></i>
                    <h6 class="fw-bold">Fiscalidad Avanzada</h6>
                    <p class="small text-muted">Planificación fiscal profesional para optimizar tus ganancias</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-custom">
                    <i class="bi bi-infinity"></i>
                    <h6 class="fw-bold">Acceso Vitalicio</h6>
                    <p class="small text-muted">Todo el material y actualizaciones futuras sin coste adicional</p>
                </div>
            </div>
        </div>

        {{-- CONTACTO VIDEOLLAMADAS --}}
        <div class="contact-box mb-5">
            <h4><i class="bi bi-camera-video-fill me-2"></i>Cómo Programar tu Sesión Semanal de Mentoría</h4>
            <p class="text-white-50 mb-4">Las videollamadas semanales son el corazón del Pack Supremo. Tu mentor revisará tu cartera, analizará tus operaciones y te guiará personalmente. Puedes coordinar tu sesión por dos vías:</p>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="contact-method">
                        <i class="bi bi-telephone-fill text-warning"></i>
                        <div>
                            <strong class="d-block mb-1">Vía Telefónica</strong>
                            <p class="small mb-1 text-white-50">Llama o envía un WhatsApp para acordar horario:</p>
                            <a href="tel:+34228455421" class="text-warning fw-bold text-decoration-none fs-5">+34 228 45 54 21</a>
                            <p class="small text-white-50 mt-1">Lunes a Viernes · 9:00 - 18:00h</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-method">
                        <i class="bi bi-envelope-fill text-info"></i>
                        <div>
                            <strong class="d-block mb-1">Vía Email</strong>
                            <p class="small mb-1 text-white-50">Escríbenos indicando tu disponibilidad horaria:</p>
                            <a href="mailto:info@gentrading.es" class="text-info fw-bold text-decoration-none fs-5">info@gentrading.es</a>
                            <p class="small text-white-50 mt-1">Respuesta en menos de 24 horas laborables</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tip-box mt-3" style="background: rgba(255,255,255,0.1); border-left-color: #f59e0b;">
                <p class="small mb-0 text-white"><i class="bi bi-info-circle me-2 text-warning"></i>En tu primer contacto indícanos: tu nombre, franja horaria preferida y si prefieres Google Meet, Zoom o Teams para la videollamada. Te confirmaremos la cita en menos de 24 horas.</p>
            </div>
        </div>

        {{-- MENTORÍA Y SEÑALES --}}
        <div class="card shadow border-0 p-4 mb-5">
            <h4 class="fw-bold mb-4" style="color:#1e3a8a;"><i class="bi bi-star-fill text-warning me-2"></i>Qué incluye la Mentoría Personalizada</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="details-item">
                        <h5><i class="bi bi-person-check-fill text-primary"></i>Revisión de Cartera Semanal</h5>
                        <p>Analizamos juntos cada posición: si mantener, ampliar o cerrar. Te explicamos el razonamiento detrás de cada decisión para que aprendas a hacerlo solo.</p>
                    </div>
                    <div class="details-item">
                        <h5><i class="bi bi-journal-text text-success"></i>Análisis de tus Operaciones</h5>
                        <p>Revisamos cada trade de la semana: entradas, salidas, gestión del stop loss. Identificamos errores y oportunidades perdidas para mejorar continuamente.</p>
                    </div>
                    <div class="details-item">
                        <h5><i class="bi bi-graph-up-arrow text-danger"></i>Plan Personalizado Mensual</h5>
                        <p>Cada mes recibes un informe detallado con tu evolución, métricas de rendimiento (win rate, ratio riesgo/beneficio) y objetivos para el siguiente período.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="details-item">
                        <h5><i class="bi bi-lightning-fill text-warning"></i>Canal de Alertas VIP</h5>
                        <p>Acceso al grupo privado donde publicamos señales en tiempo real: activo, dirección, entrada, stop loss y take profit. Copia exactamente los mismos parámetros que usamos nosotros.</p>
                    </div>
                    <div class="details-item">
                        <h5><i class="bi bi-shield-check text-info"></i>Optimización Fiscal Avanzada</h5>
                        <p>Aprende a estructurar tus inversiones para tributar de forma eficiente y legal. Diferimiento fiscal, uso de pérdidas para compensar ganancias, vehículos de inversión eficientes en España.</p>
                    </div>
                    <div class="details-item">
                        <h5><i class="bi bi-cloud-arrow-down-fill text-purple"></i>Biblioteca Vitalicia</h5>
                        <p>Acceso permanente a todos los materiales: grabaciones, plantillas, calculadoras, estudios de mercado y cualquier nuevo recurso que publiquemos en el futuro sin coste extra.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- EJEMPLO REAL: Señal VIP --}}
        <div class="example-box mb-5">
            <h5 class="fw-bold text-success mb-3"><i class="bi bi-broadcast me-2"></i>Ejemplo de Alerta VIP Real</h5>
            <div class="row">
                <div class="col-md-5">
                    <div style="background: #0d1b2a; color: white; border-radius: 12px; padding: 1.5rem; font-family: monospace; font-size: 0.85rem;">
                        <p class="mb-1">📊 <strong style="color:#00a878;">SEÑAL LARGA — EUR/USD</strong></p>
                        <p class="mb-1">🎯 Entrada: <strong>1.0850</strong></p>
                        <p class="mb-1">🛑 Stop Loss: <strong>1.0810</strong> (-40 pips)</p>
                        <p class="mb-1">✅ Take Profit 1: <strong>1.0890</strong> (+40 pips)</p>
                        <p class="mb-1">✅ Take Profit 2: <strong>1.0940</strong> (+90 pips)</p>
                        <p class="mb-1">📐 R/R: <strong>1:2.25</strong></p>
                        <p class="mb-0 mt-2" style="color:#94a3b8; font-size: 0.75rem;">Razón: Rebote en soporte semanal + RSI divergencia alcista en H4 + Macro favorable post-NFP</p>
                    </div>
                </div>
                <div class="col-md-7 ps-md-4 mt-3 mt-md-0">
                    <p class="text-muted small"><strong>¿Cómo interpretar esta señal?</strong></p>
                    <ul class="small text-muted">
                        <li><strong>Entrada 1.0850:</strong> Precio al que compramos el par EUR/USD</li>
                        <li><strong>Stop Loss 1.0810:</strong> Si el precio baja hasta aquí, cerramos la operación con pérdida limitada (40 pips = ~40€ por lote mini)</li>
                        <li><strong>Take Profit 1.0890:</strong> Primer objetivo de ganancia. Muchos traders cierran el 50% aquí y mueven el SL a break-even</li>
                        <li><strong>Take Profit 1.0940:</strong> Objetivo final si la tendencia continúa</li>
                        <li><strong>R/R 1:2.25:</strong> Por cada euro que arriesgamos, podemos ganar 2.25€. Matemáticamente rentable a largo plazo</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- ESTRATEGIAS ÉLITE --}}
        <div class="card shadow border-0 p-4 mb-5">
            <h4 class="fw-bold mb-4" style="color:#1e3a8a;"><i class="bi bi-trophy-fill text-warning me-2"></i>Estrategias de los Inversores Más Exitosos</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="details-item">
                        <h5><i class="bi bi-diagram-3-fill text-primary"></i>Diversificación Inteligente</h5>
                        <p>Cartera modelo: 40% acciones globales (MSCI World), 20% acciones USA (S&P 500), 20% bonos gubernamentales, 10% materias primas (oro), 10% liquidez para oportunidades.</p>
                    </div>
                    <div class="details-item">
                        <h5><i class="bi bi-search text-success"></i>Value Investing Avanzado</h5>
                        <p>Análisis DCF (flujo de caja descontado), ratio PER, P/Book, EV/EBITDA. Encontrar empresas infravaloradas con foso competitivo (moat). Metodología de Warren Buffett adaptada al mercado actual.</p>
                    </div>
                    <div class="details-item">
                        <h5><i class="bi bi-arrow-repeat text-info"></i>Reinversión Sistemática</h5>
                        <p>Dollar Cost Averaging (DCA) automatizado: invertir una cantidad fija mensual independientemente del precio. Elimina el error de intentar adivinar el momento perfecto del mercado.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="details-item">
                        <h5><i class="bi bi-shield-lock-fill text-danger"></i>Gestión de Riesgo Profesional</h5>
                        <p>Máximo 2% de riesgo total del portfolio por operación. Correlación entre activos para evitar que toda la cartera caiga a la vez. Cobertura con opciones en períodos de alta volatilidad.</p>
                    </div>
                    <div class="details-item">
                        <h5><i class="bi bi-cash-stack text-warning"></i>Fiscalidad Inteligente</h5>
                        <p>Tax-loss harvesting: vender activos con pérdidas para compensar ganancias y reducir la factura fiscal. Uso de fondos de inversión (no ETFs) para diferir impuestos hasta la venta final.</p>
                    </div>
                    <div class="details-item">
                        <h5><i class="bi bi-lightning-charge-fill text-primary"></i>Macro Trading</h5>
                        <p>Posicionarse según el ciclo económico global: sectores defensivos en recesión, cíclicos en expansión. Seguimiento del DXY, tipos de la Fed y curva de tipos para anticipar movimientos de mercado.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- RECURSOS ÉLITE --}}
        <div class="card shadow border-0 p-4 mb-5">
            <h4 class="fw-bold mb-4" style="color:#1e3a8a;"><i class="bi bi-bookmarks me-2"></i>Recursos Exclusivos Pack Supremo</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <a href="https://www.bloomberg.com/markets" target="_blank" class="resource-link">
                        <i class="bi bi-globe2 fs-5 text-danger"></i>
                        <div><strong>Bloomberg Markets</strong><br><small class="text-muted">La fuente de datos financieros más importante del mundo.</small></div>
                    </a>
                    <a href="https://fred.stlouisfed.org" target="_blank" class="resource-link">
                        <i class="bi bi-bank fs-5 text-primary"></i>
                        <div><strong>FRED — Federal Reserve Economic Data</strong><br><small class="text-muted">Datos macroeconómicos oficiales de la Reserva Federal de EE.UU.</small></div>
                    </a>
                    <a href="https://www.sec.gov/cgi-bin/browse-edgar" target="_blank" class="resource-link">
                        <i class="bi bi-file-earmark-text fs-5 text-success"></i>
                        <div><strong>SEC EDGAR — Informes de Empresas</strong><br><small class="text-muted">Accede a los balances y cuentas reales de cualquier empresa cotizada en EE.UU.</small></div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="https://www.koyfin.com" target="_blank" class="resource-link">
                        <i class="bi bi-bar-chart-line fs-5 text-info"></i>
                        <div><strong>Koyfin — Análisis Fundamental</strong><br><small class="text-muted">Análisis de ratios financieros y comparación de empresas cotizadas.</small></div>
                    </a>
                    <a href="https://simplywall.st" target="_blank" class="resource-link">
                        <i class="bi bi-graph-up-arrow fs-5 text-warning"></i>
                        <div><strong>Simply Wall St</strong><br><small class="text-muted">Visualización gráfica del análisis fundamental de cualquier empresa.</small></div>
                    </a>
                    <a href="https://www.portfoliovisualizer.com" target="_blank" class="resource-link">
                        <i class="bi bi-pie-chart fs-5 text-danger"></i>
                        <div><strong>Portfolio Visualizer</strong><br><small class="text-muted">Backtesting y optimización de carteras con datos históricos reales.</small></div>
                    </a>
                </div>
            </div>
        </div>

        {{-- ACORDEÓN --}}
        <h4 class="fw-bold mb-4" style="color:#1e3a8a;">Programa Completo Pack Supremo</h4>
        <div class="mb-5">
            <button class="accordion-btn">Módulo 1 — 3 Vídeos/semana: Análisis Técnico Profesional</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Order Flow y Footprint:</strong> Lectura del flujo de órdenes institucionales. Dónde están comprando y vendiendo los grandes.</li>
                        <li class="list-group-item"><strong>Smart Money Concepts (SMC):</strong> Liquidez, barridas de stops, Fair Value Gaps y distribución de Wyckoff.</li>
                        <li class="list-group-item"><strong>Multi-timeframe Analysis:</strong> Análisis desde marco temporal alto (semanal/diario) hasta entry (1H/15min) para máxima precisión.</li>
                        <li class="list-group-item"><strong>Opciones Financieras básicas:</strong> Calls y Puts para cobertura de cartera y generación de ingresos adicionales.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion-btn">Módulo 2 — Videollamada Semanal: Revisión de Cartera y Operaciones</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <p class="small text-muted px-3">Sesión individual de 60 minutos con tu mentor cada semana. <strong>Para programarla contáctanos por teléfono (+34 228 45 54 21) o email (info@gentrading.es).</strong></p>
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Revisión de posiciones abiertas:</strong> Análisis conjunto de cada posición con criterios técnicos y fundamentales.</li>
                        <li class="list-group-item"><strong>Análisis de trades cerrados:</strong> Qué funcionó, qué no y por qué. Aprendizaje basado en datos reales.</li>
                        <li class="list-group-item"><strong>Planificación de la semana:</strong> Qué activos vigilar, niveles clave y posibles setups de la próxima semana.</li>
                        <li class="list-group-item"><strong>Preguntas abiertas:</strong> Resolvemos cualquier duda sobre análisis, estrategia, gestión o psicología.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion-btn">Módulo 3 — Informe Mensual y Gráfico de Inversión</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Informe de rendimiento:</strong> Win rate, ratio R/R medio, drawdown máximo, comparativa con benchmark (S&P 500).</li>
                        <li class="list-group-item"><strong>Gráfico de evolución de capital:</strong> Curva de equity personalizada para visualizar tu progreso real mes a mes.</li>
                        <li class="list-group-item"><strong>Análisis macroeconómico mensual:</strong> Situación actual del mercado, posicionamiento recomendado para el siguiente mes.</li>
                        <li class="list-group-item"><strong>Objetivos del próximo mes:</strong> Metas específicas y medibles adaptadas a tu perfil y situación actual.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion-btn">Módulo 4 — Fiscalidad Avanzada y Planificación Patrimonial</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>IRPF y la base del ahorro:</strong> Cómo tributan acciones, ETFs, fondos, dividendos y derivados en España.</li>
                        <li class="list-group-item"><strong>Tax-loss harvesting:</strong> Compensación de pérdidas con ganancias para minimizar la factura fiscal de forma legal.</li>
                        <li class="list-group-item"><strong>Fondos vs ETFs fiscalmente:</strong> Por qué traspasar entre fondos no tributa y cómo aprovechar esto.</li>
                        <li class="list-group-item"><strong>Declaración de la Renta con inversiones:</strong> Guía práctica para cumplimentar correctamente el modelo D6 y la casilla 0027.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion-btn">Módulo 5 — Canal VIP: Señales y Alertas en Tiempo Real</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Señales de trading diarias:</strong> Entrada, stop loss, take profit y ratio R/R para forex, índices y acciones seleccionadas.</li>
                        <li class="list-group-item"><strong>Alertas macroeconómicas:</strong> Avisos antes de eventos clave (Fed, BCE, NFP) con impacto esperado en los mercados.</li>
                        <li class="list-group-item"><strong>Análisis pre-market:</strong> Resumen diario de situación del mercado antes de la apertura de Londres y Nueva York.</li>
                        <li class="list-group-item"><strong>Portfolio modelo:</strong> Seguimiento de la cartera de referencia del mentor con todas las posiciones abiertas y su razonamiento.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="/mis-planes" class="btn btn-outline-secondary rounded-pill px-4">← Volver a los planes</a>
            <a href="mailto:info@gentrading.es" class="btn btn-success rounded-pill px-4"><i class="bi bi-envelope me-2"></i>Contactar para empezar</a>
        </div>

    </div>

@push("scripts")
<script>
(function() {
    const inicio = Date.now();
    const curso  = "supremo";
    const token  = document.querySelector("meta[name=\"csrf-token\"]")?.getAttribute("content");

    function enviarProgreso() {
        const segundos = Math.round((Date.now() - inicio) / 1000);
        if (segundos < 5) return;
        fetch("/progreso-curso", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify({ curso: curso, segundos: segundos }),
            keepalive: true,
        });
    }

    window.addEventListener("beforeunload", enviarProgreso);
    setInterval(enviarProgreso, 300000);
})();
</script>
@endpush
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const acc = document.getElementsByClassName("accordion-btn");
    for (let i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            let panel = this.nextElementSibling;
            panel.style.maxHeight = panel.style.maxHeight ? null : panel.scrollHeight + "px";
        });
    }
</script>