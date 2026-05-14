<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    .card { transition: transform 0.3s ease; }
    .card:hover { transform: translateY(-8px); box-shadow: 0 15px 25px rgba(0,0,0,0.12); }
    .btn-animate { transition: all 0.3s ease; }
    .btn-animate:hover { filter: brightness(1.1); transform: scale(1.05); }
    .hero-basico { background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); border-radius: 20px; padding: 3rem 2rem; color: white; margin-bottom: 2.5rem; }
    .stat-box { background: rgba(255,255,255,0.15); border-radius: 12px; padding: 1rem; text-align: center; }
    .stat-box .num { font-size: 2rem; font-weight: 700; }
    .stat-box .label { font-size: 0.85rem; opacity: 0.85; }
    .resource-link { display: flex; align-items: center; gap: 10px; padding: 0.75rem 1rem; border-radius: 10px; background: #f0f4ff; text-decoration: none; color: #1e3a8a; margin-bottom: 0.5rem; transition: background 0.2s; }
    .resource-link:hover { background: #dbeafe; color: #1e3a8a; }
    .tip-box { background: #fefce8; border-left: 4px solid #f59e0b; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1rem; }
    .example-box { background: #f0fdf4; border: 1px solid #86efac; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; }
    .chart-bar { height: 180px; display: flex; align-items: flex-end; gap: 8px; padding: 1rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0; }
    .bar { flex: 1; border-radius: 6px 6px 0 0; position: relative; transition: opacity 0.2s; }
    .bar:hover { opacity: 0.85; }
    .bar-label { text-align: center; font-size: 0.65rem; color: #64748b; margin-top: 4px; }
    .accordion-btn { background-color: #eef2ff; color: #1e3a8a; cursor: pointer; padding: 16px 20px; width: 100%; text-align: left; border: none; outline: none; transition: 0.3s; border-radius: 10px; margin-bottom: 6px; font-weight: 600; }
    .accordion-btn:after { content: '\02795'; font-size: 13px; float: right; }
    .accordion-btn.active:after { content: "\2796"; }
    .accordion-btn.active, .accordion-btn:hover { background-color: #c7d2fe; }
    .accordion-panel { padding: 0 18px; background-color: white; max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out; border-radius: 10px; }
    .contact-box { background: linear-gradient(135deg, #0d1b2a, #1e3a8a); color: white; border-radius: 16px; padding: 2rem; }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">{{ __('Pack Básico de Inversiones') }}</h2>
    </x-slot>

    <div class="container py-5">

        {{-- HERO --}}
        <div class="hero-basico">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <span class="badge bg-warning text-dark mb-2">ACCESO GRATUITO</span>
                    <h1 class="display-5 fw-bold mb-3">Pack Básico de Inversiones</h1>
                    <p class="lead mb-4">Tu primer paso hacia la libertad financiera. Aprende los fundamentos que el sistema nunca te enseñó, con ejemplos reales y herramientas prácticas desde el día uno.</p>
                    <div class="row g-3">
                        <div class="col-4"><div class="stat-box"><div class="num">7</div><div class="label">Módulos</div></div></div>
                        <div class="col-4"><div class="stat-box"><div class="num">100%</div><div class="label">Gratis</div></div></div>
                        <div class="col-4"><div class="stat-box"><div class="num">∞</div><div class="label">Acceso</div></div></div>
                    </div>
                </div>
                <div class="col-md-5 text-center mt-4 mt-md-0">
                    <iframe width="100%" height="220"
                        src="https://www.youtube.com/embed/r2e-Nf2Vemc"
                        title="Introducción a la inversión" frameborder="0"
                        class="rounded-3 shadow-lg"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <small class="text-white-50 mt-1 d-block">📹 Curso Completo de Finanzas Personales - Adrián Saenz</small>
                </div>
            </div>
        </div>

        {{-- EJEMPLO REAL: Interés Compuesto --}}
        <div class="example-box mb-5">
            <h5 class="fw-bold text-success mb-3"><i class="bi bi-graph-up-arrow me-2"></i>Ejemplo Real: El Poder del Interés Compuesto</h5>
            <p class="text-muted small">Invirtiendo solo <strong>100€/mes</strong> con una rentabilidad media del <strong>8% anual</strong> (S&P 500 histórico):</p>
            <div class="chart-bar mb-2">
                <div style="display:flex; flex-direction:column; align-items:center; flex:1;">
                    <div class="bar" style="height:20%; background:#93c5fd;"></div>
                    <div class="bar-label">Año 5<br>7.340€</div>
                </div>
                <div style="display:flex; flex-direction:column; align-items:center; flex:1;">
                    <div class="bar" style="height:35%; background:#60a5fa;"></div>
                    <div class="bar-label">Año 10<br>18.295€</div>
                </div>
                <div style="display:flex; flex-direction:column; align-items:center; flex:1;">
                    <div class="bar" style="height:55%; background:#3b82f6;"></div>
                    <div class="bar-label">Año 15<br>34.604€</div>
                </div>
                <div style="display:flex; flex-direction:column; align-items:center; flex:1;">
                    <div class="bar" style="height:75%; background:#2563eb;"></div>
                    <div class="bar-label">Año 20<br>58.902€</div>
                </div>
                <div style="display:flex; flex-direction:column; align-items:center; flex:1;">
                    <div class="bar" style="height:100%; background:#1d4ed8;"></div>
                    <div class="bar-label">Año 30<br>149.035€</div>
                </div>
            </div>
            <p class="small text-muted"><i class="bi bi-info-circle me-1"></i>Capital aportado total en 30 años: 36.000€. Ganancias por interés compuesto: 113.035€. Los datos son orientativos basados en rentabilidades históricas.</p>
        </div>

        {{-- MÓDULOS --}}
        <h3 class="fw-bold mb-4" style="color:#1e3a8a;">Contenido del Pack Básico</h3>
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card h-100 p-3 shadow border-0">
                    <div class="card-body">
                        <div class="mb-2"><i class="bi bi-piggy-bank fs-2 text-primary"></i></div>
                        <h5 class="fw-bold text-primary">¿Qué es invertir?</h5>
                        <p class="text-muted small">La diferencia entre ahorrar e invertir. Por qué guardar dinero en el banco te hace más pobre cada año debido a la inflación.</p>
                        <div class="tip-box mt-3">
                            <strong>💡 Dato real:</strong> La inflación media en España los últimos 10 años fue del 2.3% anual. 10.000€ guardados pierden ~2.600€ de poder adquisitivo en una década.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-3 shadow border-0">
                    <div class="card-body">
                        <div class="mb-2"><i class="bi bi-bar-chart-steps fs-2 text-warning"></i></div>
                        <h5 class="fw-bold text-primary">Riesgo y Rentabilidad</h5>
                        <p class="text-muted small">Aprende a equilibrar riesgo y beneficio según tu perfil. Conservador, moderado o agresivo.</p>
                        <ul class="list-unstyled small mt-3">
                            <li class="mb-1"><span class="badge bg-success">Conservador</span> Bonos, depósitos → 1-3% anual</li>
                            <li class="mb-1"><span class="badge bg-warning text-dark">Moderado</span> ETFs mixtos → 4-7% anual</li>
                            <li class="mb-1"><span class="badge bg-danger">Agresivo</span> Acciones individuales → 8-15%+ anual</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-3 shadow border-0">
                    <div class="card-body">
                        <div class="mb-2"><i class="bi bi-briefcase fs-2 text-success"></i></div>
                        <h5 class="fw-bold text-primary">Tipos de Activos</h5>
                        <p class="text-muted small">Conoce cada instrumento de inversión disponible y cómo funciona en la práctica.</p>
                        <ul class="list-unstyled small mt-3">
                            <li><i class="bi bi-check2-circle text-success me-2"></i><strong>Acciones:</strong> Apple, Inditex, Amazon</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i><strong>ETFs:</strong> MSCI World, S&P 500</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i><strong>Bonos:</strong> Letras del Tesoro</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i><strong>Fondos indexados</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-3 shadow border-0">
                    <div class="card-body">
                        <div class="mb-2"><i class="bi bi-intersect fs-2 text-info"></i></div>
                        <h5 class="fw-bold text-primary">Diversificación</h5>
                        <p class="text-muted small">La regla de oro de la inversión. No pongas todos los huevos en la misma canasta.</p>
                        <div class="tip-box mt-3">
                            <strong>📊 Ejemplo:</strong> Una cartera 60% acciones globales (MSCI World) + 30% bonos + 10% liquidez ha dado un 7% medio anual con riesgo controlado históricamente.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-3 shadow border-0">
                    <div class="card-body">
                        <div class="mb-2"><i class="bi bi-calculator fs-2 text-danger"></i></div>
                        <h5 class="fw-bold text-primary">Interés Compuesto</h5>
                        <p class="text-muted small">Einstein lo llamó "la octava maravilla del mundo". Entiende cómo tus ganancias generan más ganancias.</p>
                        <ul class="list-unstyled small mt-3">
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Reinvierte tus dividendos</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Comienza cuanto antes</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i>Sé constante mes a mes</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-3 shadow border-0">
                    <div class="card-body">
                        <div class="mb-2"><i class="bi bi-phone fs-2 text-purple"></i></div>
                        <h5 class="fw-bold text-primary">Apps de Inversión</h5>
                        <p class="text-muted small">Las mejores plataformas para empezar a invertir desde el móvil con poco capital.</p>
                        <ul class="list-unstyled small mt-3">
                            <li><i class="bi bi-star-fill text-warning me-2"></i><strong>eToro</strong> — Ideal para principiantes</li>
                            <li><i class="bi bi-star-fill text-warning me-2"></i><strong>DEGIRO</strong> — Comisiones muy bajas</li>
                            <li><i class="bi bi-star-fill text-warning me-2"></i><strong>Indexa Capital</strong> — Gestión automática</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- RECURSOS GRATUITOS --}}
        <div class="card shadow border-0 p-4 mb-5">
            <h4 class="fw-bold mb-4" style="color:#1e3a8a;"><i class="bi bi-bookmarks me-2"></i>Recursos Gratuitos Recomendados</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <a href="https://www.investopedia.com" target="_blank" class="resource-link">
                        <i class="bi bi-globe2 fs-5"></i>
                        <div><strong>Investopedia</strong><br><small class="text-muted">La wikipedia de las finanzas. Definiciones y guías en inglés.</small></div>
                    </a>
                    <a href="https://cincodias.elpais.com" target="_blank" class="resource-link">
                        <i class="bi bi-newspaper fs-5"></i>
                        <div><strong>Cinco Días</strong><br><small class="text-muted">Noticias económicas y de mercados en español.</small></div>
                    </a>
                    <a href="https://www.youtube.com/@HolaMundoInversiones" target="_blank" class="resource-link">
                        <i class="bi bi-youtube fs-5 text-danger"></i>
                        <div><strong>Hola Mundo Inversiones (YouTube)</strong><br><small class="text-muted">Canal en español sobre finanzas personales e inversión.</small></div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="https://finance.yahoo.com" target="_blank" class="resource-link">
                        <i class="bi bi-bar-chart-line fs-5 text-primary"></i>
                        <div><strong>Yahoo Finance</strong><br><small class="text-muted">Seguimiento de precios, gráficos y noticias de mercados.</small></div>
                    </a>
                    <a href="https://www.tesoro.es/deuda-publica/letras-del-tesoro" target="_blank" class="resource-link">
                        <i class="bi bi-bank fs-5 text-success"></i>
                        <div><strong>Tesoro Público España</strong><br><small class="text-muted">Información oficial sobre Letras del Tesoro y bonos del Estado.</small></div>
                    </a>
                    <a href="https://www.bogleheads.org/wiki/Bogleheads%27_investment_philosophy" target="_blank" class="resource-link">
                        <i class="bi bi-book fs-5 text-info"></i>
                        <div><strong>Filosofía Bogleheads</strong><br><small class="text-muted">Inversión pasiva a largo plazo. El método más sencillo y efectivo.</small></div>
                    </a>
                </div>
            </div>
        </div>

        {{-- ACORDEÓN MÓDULOS --}}
        <h4 class="fw-bold mb-4" style="color:#1e3a8a;">Preguntas Frecuentes del Pack Básico</h4>
        <div class="mb-5">
            <button class="accordion-btn">¿Con cuánto dinero puedo empezar a invertir?</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <p>Puedes empezar con tan solo <strong>1€</strong> en plataformas como eToro. Lo importante no es la cantidad inicial sino la constancia. Con 50-100€/mes invertidos de forma regular durante años se construyen patrimonios sólidos. No esperes tener "suficiente dinero" para empezar: el tiempo es tu activo más valioso.</p>
                </div>
            </div>

            <button class="accordion-btn">¿Es seguro invertir? ¿Puedo perder todo mi dinero?</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <p>Toda inversión conlleva riesgo, pero ese riesgo se gestiona. Invirtiendo en un ETF que replica el S&P 500 o el MSCI World nunca has perdido dinero en cualquier período de 15+ años en la historia. La clave está en <strong>diversificar, invertir a largo plazo y no vender en momentos de pánico</strong>. Nunca inviertas dinero que puedas necesitar en los próximos 3-5 años.</p>
                </div>
            </div>

            <button class="accordion-btn">¿Qué es un ETF y por qué se recomienda para principiantes?</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <p>Un ETF (Exchange Traded Fund) es un fondo que agrupa cientos o miles de acciones en un solo producto. Por ejemplo, el ETF del S&P 500 te da exposición a las 500 empresas más grandes de EE.UU. con una sola compra. Son baratos (comisiones desde 0,03% anual), diversificados por naturaleza y muy fáciles de comprar. Son la opción recomendada por la mayoría de expertos para inversores que empiezan.</p>
                </div>
            </div>

            <button class="accordion-btn">¿Cómo tributan las inversiones en España?</button>
            <div class="accordion-panel">
                <div class="py-3">
                    <p>Las ganancias de inversión tributan en la <strong>base del ahorro del IRPF</strong>: hasta 6.000€ de ganancia al 19%, de 6.000€ a 50.000€ al 21%, y más de 50.000€ al 26%. Solo tributas cuando <strong>vendes</strong> con ganancias o recibes dividendos. Los traspasos entre fondos de inversión (no ETFs) están exentos hasta la venta final. Siempre consulta con un asesor fiscal para tu situación concreta.</p>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="/mis-planes" class="btn btn-outline-secondary rounded-pill px-4">← Volver a los planes</a>
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