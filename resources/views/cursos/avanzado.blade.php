<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    .card { transition: transform 0.3s ease; }
    .card:hover { transform: translateY(-8px); box-shadow: 0 15px 25px rgba(0,0,0,0.12); }
    .hero-avanzado { background: linear-gradient(135deg, #1d4ed8 0%, #0ea5e9 100%); border-radius: 20px; padding: 3rem 2rem; color: white; margin-bottom: 2.5rem; }
    .stat-box { background: rgba(255,255,255,0.15); border-radius: 12px; padding: 1rem; text-align: center; }
    .stat-box .num { font-size: 2rem; font-weight: 700; }
    .stat-box .label { font-size: 0.85rem; opacity: 0.85; }
    .tip-box { background: #fefce8; border-left: 4px solid #f59e0b; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1rem; }
    .example-box { background: #eff6ff; border: 1px solid #93c5fd; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; }
    .resource-link { display: flex; align-items: center; gap: 10px; padding: 0.75rem 1rem; border-radius: 10px; background: #f0f4ff; text-decoration: none; color: #1e3a8a; margin-bottom: 0.5rem; transition: background 0.2s; }
    .resource-link:hover { background: #dbeafe; color: #1e3a8a; }
    .chart-bar { height: 180px; display: flex; align-items: flex-end; gap: 8px; padding: 1rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0; }
    .bar-label { text-align: center; font-size: 0.65rem; color: #64748b; margin-top: 4px; }
    .accordion-btn { background-color: #dbeafe; color: #1e3a8a; cursor: pointer; padding: 16px 20px; width: 100%; text-align: left; border: none; outline: none; transition: 0.3s; border-radius: 10px; margin-bottom: 6px; font-weight: 600; }
    .accordion-btn:after { content: '\02795'; font-size: 13px; float: right; }
    .accordion-btn.active:after { content: "\2796"; }
    .accordion-btn.active, .accordion-btn:hover { background-color: #bfdbfe; }
    .accordion-panel { padding: 0 18px; background-color: white; max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out; border-radius: 10px; }
    .indicator-card { background: #f8fafc; border-radius: 10px; padding: 1rem; border-left: 4px solid #3b82f6; margin-bottom: 0.75rem; }
    .candle { display: inline-block; width: 12px; position: relative; }
    .candle-body { border-radius: 2px; }
    .candle-wick { width: 2px; margin: 0 auto; background: #64748b; }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">{{ __('Pack Avanzado') }}</h2>
    </x-slot>

    <div class="container py-5">

        {{-- HERO --}}
        <div class="hero-avanzado">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <span class="badge bg-info text-dark mb-2">60 HORAS DE CONTENIDO</span>
                    <h1 class="display-5 fw-bold mb-3">Pack Avanzado</h1>
                    <p class="lead mb-4">Análisis técnico, estrategias operativas y gestión profesional del capital. El salto que necesitas para operar con criterio en los mercados reales.</p>
                    <div class="row g-3">
                        <div class="col-3"><div class="stat-box"><div class="num">5</div><div class="label">Módulos</div></div></div>
                        <div class="col-3"><div class="stat-box"><div class="num">60h</div><div class="label">Contenido</div></div></div>
                        <div class="col-3"><div class="stat-box"><div class="num">2/sem</div><div class="label">Vídeos</div></div></div>
                        <div class="col-3"><div class="stat-box"><div class="num">∞</div><div class="label">Acceso</div></div></div>
                    </div>
                </div>
                <div class="col-md-4 text-center mt-4 mt-md-0">
                    <iframe width="100%" height="200"
                        src="https://www.youtube.com/embed/EFmHDFjmAOE"
                        title="Análisis Técnico Avanzado" frameborder="0"
                        class="rounded-3 shadow-lg"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <small class="text-white-50 mt-1 d-block">📹 Introducción al Análisis Técnico</small>
                </div>
            </div>
        </div>

        {{-- EJEMPLO REAL: Lectura de velas --}}
        <div class="example-box mb-5">
            <h5 class="fw-bold text-primary mb-3"><i class="bi bi-bar-chart-candle me-2"></i>Ejemplo Real: Cómo leer un gráfico de velas japonesas</h5>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="text-muted small mb-3">Cada vela representa el comportamiento del precio en un período. Aprenderás a identificar patrones de continuación y reversión para tomar decisiones con fundamento.</p>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><span class="badge bg-success me-2">Verde</span>El precio cerró por encima de donde abrió (alcista)</li>
                        <li class="mb-2"><span class="badge bg-danger me-2">Roja</span>El precio cerró por debajo de donde abrió (bajista)</li>
                        <li class="mb-2"><i class="bi bi-arrow-up text-success me-2"></i>Mecha superior: máximo del período</li>
                        <li class="mb-2"><i class="bi bi-arrow-down text-danger me-2"></i>Mecha inferior: mínimo del período</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="tip-box">
                        <strong>📊 Patrón Engulfing Alcista:</strong> Una vela roja pequeña seguida de una vela verde que la "engulle". Señal de posible reversión al alza. Muy usado por traders profesionales para buscar entradas en soporte.
                    </div>
                    <div class="tip-box">
                        <strong>📊 Patrón Martillo:</strong> Cuerpo pequeño arriba y mecha inferior larga. Indica rechazo de precios bajos y posible subida. Muy fiable en zonas de soporte.
                    </div>
                </div>
            </div>
        </div>

        {{-- INDICADORES --}}
        <div class="card shadow border-0 p-4 mb-5">
            <h4 class="fw-bold mb-4" style="color:#1e3a8a;"><i class="bi bi-activity me-2"></i>Indicadores que Aprenderás a Usar</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="indicator-card">
                        <strong>RSI (Índice de Fuerza Relativa)</strong>
                        <p class="small text-muted mb-1">Mide si un activo está sobrecomprado (>70) o sobrevendido (&lt;30). Permite identificar posibles reversiones del precio.</p>
                        <span class="badge bg-primary">Oscilador</span>
                    </div>
                    <div class="indicator-card">
                        <strong>MACD (Media Móvil Convergencia/Divergencia)</strong>
                        <p class="small text-muted mb-1">Identifica cambios en la fuerza, dirección y momentum de la tendencia. Muy popular entre traders de swing.</p>
                        <span class="badge bg-primary">Tendencia</span>
                    </div>
                    <div class="indicator-card">
                        <strong>Medias Móviles (SMA / EMA)</strong>
                        <p class="small text-muted mb-1">Suavizan el precio para identificar tendencias. El cruce de la EMA de 50 con la de 200 es la señal más famosa del análisis técnico (Golden Cross).</p>
                        <span class="badge bg-primary">Tendencia</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="indicator-card">
                        <strong>Bandas de Bollinger</strong>
                        <p class="small text-muted mb-1">Muestran la volatilidad del mercado. Cuando el precio toca la banda inferior en tendencia alcista es una señal de compra clásica.</p>
                        <span class="badge bg-warning text-dark">Volatilidad</span>
                    </div>
                    <div class="indicator-card">
                        <strong>Fibonacci Retracement</strong>
                        <p class="small text-muted mb-1">Niveles matemáticos donde el precio suele encontrar soporte o resistencia: 38.2%, 50% y 61.8% son los más importantes.</p>
                        <span class="badge bg-success">Soporte/Resistencia</span>
                    </div>
                    <div class="indicator-card">
                        <strong>Volumen</strong>
                        <p class="small text-muted mb-1">La confirmación de cualquier movimiento. Una ruptura de resistencia con alto volumen es mucho más fiable que sin él.</p>
                        <span class="badge bg-info text-dark">Confirmación</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ESTRATEGIAS --}}
        <div class="example-box mb-5">
            <h5 class="fw-bold text-primary mb-3"><i class="bi bi-lightning-charge me-2"></i>Estrategias Operativas: Ejemplo Real Day Trading</h5>
            <div class="row">
                <div class="col-md-6">
                    <p class="small text-muted"><strong>Setup de apertura de mercado (9:30 NY):</strong></p>
                    <ol class="small text-muted">
                        <li>Identificar los máximos y mínimos de la sesión previa</li>
                        <li>Esperar los primeros 15 minutos sin operar (evitar el ruido)</li>
                        <li>Si el precio rompe el máximo previo con volumen → entrada long</li>
                        <li>Stop Loss justo por debajo del mínimo de los primeros 15 min</li>
                        <li>Take Profit en relación 1:2 riesgo/beneficio mínimo</li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <div class="tip-box">
                        <strong>💡 Regla de oro del Day Trading:</strong> Nunca arriesgues más del 1% de tu capital en una sola operación. Con una cuenta de 5.000€, el riesgo máximo por trade es 50€. Así puedes tener 20 operaciones perdedoras seguidas y seguir en el juego.
                    </div>
                </div>
            </div>
        </div>

        {{-- RECURSOS --}}
        <div class="card shadow border-0 p-4 mb-5">
            <h4 class="fw-bold mb-4" style="color:#1e3a8a;"><i class="bi bi-bookmarks me-2"></i>Recursos y Herramientas del Pack Avanzado</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <a href="https://www.tradingview.com" target="_blank" class="resource-link">
                        <i class="bi bi-bar-chart-line fs-5 text-primary"></i>
                        <div><strong>TradingView</strong><br><small class="text-muted">La plataforma de gráficos más usada del mundo. Gratuita con funciones premium.</small></div>
                    </a>
                    <a href="https://es.investing.com/economic-calendar/" target="_blank" class="resource-link">
                        <i class="bi bi-calendar-event fs-5 text-danger"></i>
                        <div><strong>Calendario Económico - Investing.com</strong><br><small class="text-muted">Fechas clave: tipos de interés, IPC, NFP y más eventos de mercado.</small></div>
                    </a>
                    <a href="https://www.myfxbook.com/forex-economic-calendar" target="_blank" class="resource-link">
                        <i class="bi bi-globe2 fs-5 text-success"></i>
                        <div><strong>MyFXBook Economic Calendar</strong><br><small class="text-muted">Seguimiento de impacto de noticias en tiempo real.</small></div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="https://www.babypips.com/learn/forex" target="_blank" class="resource-link">
                        <i class="bi bi-mortarboard fs-5 text-info"></i>
                        <div><strong>BabyPips School of Pipsology</strong><br><small class="text-muted">El mejor curso gratuito de trading desde cero. En inglés.</small></div>
                    </a>
                    <a href="https://unusualwhales.com" target="_blank" class="resource-link">
                        <i class="bi bi-graph-up-arrow fs-5 text-warning"></i>
                        <div><strong>Unusual Whales</strong><br><small class="text-muted">Seguimiento del flujo de opciones y movimientos institucionales.</small></div>
                    </a>
                    <a href="https://finviz.com/map.ashx" target="_blank" class="resource-link">
                        <i class="bi bi-grid-3x3-gap fs-5 text-danger"></i>
                        <div><strong>Finviz Heat Map</strong><br><small class="text-muted">Mapa visual del mercado en tiempo real por sectores.</small></div>
                    </a>
                </div>
            </div>
        </div>

        {{-- ACORDEÓN --}}
        <h4 class="fw-bold mb-4" style="color:#1e3a8a;">Contenido Detallado del Programa</h4>
        <div class="mb-5">
            <button class="accordion-btn">Módulo 1: Análisis Técnico Avanzado</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Price Action profundo:</strong> Lectura de velas institucionales, zonas de oferta y demanda (Order Blocks). Cómo piensan los grandes jugadores del mercado.</li>
                        <li class="list-group-item"><strong>Estructura de Mercado:</strong> Identificación de rangos, tendencias y quiebres de estructura (BOS/CHoCH). El mercado siempre deja huellas.</li>
                        <li class="list-group-item"><strong>Indicadores Pro:</strong> Configuración avanzada de RSI con divergencias, MACD con histograma y Fibonacci para entradas de alta precisión.</li>
                        <li class="list-group-item"><strong>Práctica en TradingView:</strong> Ejercicios con gráficos reales históricos para desarrollar el ojo analítico.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion-btn">Módulo 2: Estrategias de Trading Operativas</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Day Trading:</strong> Setups de alta probabilidad para aperturas de mercado en índices (SPX, NASDAQ) y forex (EUR/USD).</li>
                        <li class="list-group-item"><strong>Swing Trading:</strong> Gestión de posiciones a medio plazo de 2-10 días. Captura de movimientos tendenciales grandes con poco estrés.</li>
                        <li class="list-group-item"><strong>Scalping Consciente:</strong> Operativa en temporalidades cortas (1m/5m) con gestión estricta de spreads y comisiones.</li>
                        <li class="list-group-item"><strong>Backtesting:</strong> Cómo validar una estrategia con datos históricos antes de arriesgar dinero real.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion-btn">Módulo 3: Gestión de Capital e Interés Compuesto</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Regla del 1%:</strong> Cálculo de tamaño de posición según el riesgo porcentual de la cuenta. La base de la supervivencia en trading.</li>
                        <li class="list-group-item"><strong>Gestión del Drawdown:</strong> Cómo recuperar una racha negativa sin arriesgar la cuenta. Ajuste del riesgo por lotes.</li>
                        <li class="list-group-item"><strong>Plan de Trading personalizado:</strong> Creación de una bitácora profesional con registro de operaciones, estadísticas y objetivos.</li>
                        <li class="list-group-item"><strong>Calculadora de posición:</strong> Herramienta para calcular automáticamente el tamaño correcto de cada trade.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion-btn">Módulo 4: Psicotrading y Control Emocional</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Sesgos Cognitivos:</strong> El FOMO (miedo a perderse algo), la avaricia, el sesgo de confirmación. Cómo te saboteas sin saberlo.</li>
                        <li class="list-group-item"><strong>Rutina del Trader:</strong> Preparación pre-market: qué revisar antes de abrir el mercado. Desconexión post-market: cómo analizar el día sin emocionarte.</li>
                        <li class="list-group-item"><strong>Disciplina Operativa:</strong> Por qué seguir tu plan cuando el mercado está en contra es lo que separa a los traders rentables de los que pierden.</li>
                        <li class="list-group-item"><strong>Journaling de trading:</strong> Registro emocional de cada operación para identificar patrones destructivos.</li>
                    </ul>
                </div>
            </div>

            <button class="accordion-btn">Módulo 5: Análisis Fundamental y Macroeconomía</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <ul class="small list-group list-group-flush">
                        <li class="list-group-item"><strong>Calendario Económico:</strong> Impacto de tipos de interés de la Fed y el BCE, inflación (IPC), nóminas no agrícolas (NFP) y PIB en los mercados.</li>
                        <li class="list-group-item"><strong>Correlaciones:</strong> Relación inversa entre el Dólar (DXY) y el Oro, entre los bonos del Tesoro y las acciones tecnológicas.</li>
                        <li class="list-group-item"><strong>Ciclos económicos:</strong> Expansión, pico, recesión y recuperación. Qué sectores funcionan mejor en cada fase.</li>
                        <li class="list-group-item"><strong>Lectura de balances básica:</strong> Ingresos, EBITDA, deuda y flujo de caja libre. Los 4 números que importan de una empresa.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="/mis-planes" class="btn btn-outline-secondary rounded-pill px-4">← Volver a los planes</a>
            <a href="/mis-planes/supremo" class="btn btn-primary rounded-pill px-4">Descubrir Pack Supremo →</a>
        </div>

    </div>
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