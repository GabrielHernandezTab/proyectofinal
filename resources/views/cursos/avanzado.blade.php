{{-- resources/views/packs/avanzado.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">{{ __('Pack Avanzado — Estrategias y Operativa') }}</h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root { --primary: #7c3aed; --secondary: #a855f7; --accent: #f59e0b; --dark: #2e1065; }
        .hero-avanzado { background: linear-gradient(135deg, #2e1065 0%, #7c3aed 50%, #a855f7 100%); border-radius: 24px; padding: 4rem 2rem; color: white; margin-bottom: 3rem; position: relative; overflow: hidden; }
        .hero-avanzado::after { content: ''; position: absolute; bottom: -30%; left: -10%; width: 500px; height: 500px; background: rgba(255,255,255,0.03); border-radius: 50%; }
        .stat-box { background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); border-radius: 16px; padding: 1.25rem; text-align: center; border: 1px solid rgba(255,255,255,0.15); }
        .stat-box .num { font-size: 2.2rem; font-weight: 800; }
        .stat-box .label { font-size: 0.85rem; opacity: 0.9; }
        .lock-badge { background: linear-gradient(90deg, #f59e0b, #ef4444); color: white; font-weight: 700; padding: 0.5rem 1.25rem; border-radius: 999px; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 6px; }
        .module-nav { display: flex; gap: 0.5rem; overflow-x: auto; padding-bottom: 0.5rem; margin-bottom: 2rem; }
        .module-nav-btn { white-space: nowrap; padding: 0.75rem 1.25rem; border-radius: 12px; border: 2px solid #e9d5ff; background: white; color: #7c3aed; font-weight: 600; cursor: pointer; transition: all 0.3s; }
        .module-nav-btn.active, .module-nav-btn:hover { background: #7c3aed; color: white; border-color: #7c3aed; }
        .content-panel { display: none; animation: fadeIn 0.4s ease; }
        .content-panel.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .strategy-card { background: white; border-radius: 16px; padding: 1.75rem; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border-top: 4px solid #7c3aed; margin-bottom: 1.5rem; }
        .risk-meter { height: 8px; background: #f3e8ff; border-radius: 4px; overflow: hidden; margin: 0.5rem 0; }
        .risk-fill { height: 100%; border-radius: 4px; }
        .video-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem; }
        .video-card { background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.08); transition: transform 0.3s; }
        .video-card:hover { transform: translateY(-5px); }
        .video-thumb { position: relative; padding-top: 56.25%; background: #ddd; }
        .video-thumb iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; }
        .video-info { padding: 1rem 1.25rem; }
        .video-badge { display: inline-block; padding: 0.2rem 0.6rem; border-radius: 999px; font-size: 0.7rem; font-weight: 600; margin-bottom: 0.5rem; }
        .tip-box { background: #faf5ff; border-left: 4px solid #a855f7; padding: 1rem 1.5rem; border-radius: 12px; margin: 1rem 0; }
        .warning-box { background: #fffbeb; border-left: 4px solid #f59e0b; padding: 1rem 1.5rem; border-radius: 12px; margin: 1rem 0; }
        .success-box { background: #f0fdf4; border-left: 4px solid #22c55e; padding: 1rem 1.5rem; border-radius: 12px; margin: 1rem 0; }
        .danger-box { background: #fef2f2; border-left: 4px solid #ef4444; padding: 1rem 1.5rem; border-radius: 12px; margin: 1rem 0; }
        .data-table { width: 100%; border-collapse: separate; border-spacing: 0; }
        .data-table th { background: #faf5ff; padding: 0.875rem 1rem; text-align: left; font-weight: 600; color: #581c87; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 2px solid #e9d5ff; }
        .data-table td { padding: 1rem; border-bottom: 1px solid #f3e8ff; color: #334155; }
        .data-table tr:hover td { background: #faf5ff; }
        .tag { display: inline-block; padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.75rem; font-weight: 600; }
        .tag-purple { background: #f3e8ff; color: #6b21a8; }
        .tag-green { background: #dcfce7; color: #166534; }
        .tag-orange { background: #ffedd5; color: #9a3412; }
        .tag-red { background: #fee2e2; color: #991b1b; }
        .tag-blue { background: #dbeafe; color: #1e40af; }
        .resource-tile { display: flex; align-items: center; gap: 1rem; padding: 1rem 1.25rem; background: #faf5ff; border-radius: 12px; text-decoration: none; color: #334155; transition: all 0.2s; border: 1px solid #f3e8ff; }
        .resource-tile:hover { background: #f3e8ff; color: #7c3aed; border-color: #d8b4fe; }
        .highlight-number { font-size: 2.5rem; font-weight: 800; color: #7c3aed; line-height: 1; }
        .candle-demo { font-family: monospace; background: #1e293b; color: #e2e8f0; padding: 1.5rem; border-radius: 12px; font-size: 0.85rem; }
        .fiscal-box { background: linear-gradient(135deg, #faf5ff, #f3e8ff); border-radius: 16px; padding: 1.5rem; border: 1px solid #e9d5ff; }
        .indicator-card { background: #faf5ff; border-radius: 12px; padding: 1.25rem; border-left: 4px solid #7c3aed; margin-bottom: 0.75rem; }
        .platform-card { background: white; border-radius: 16px; padding: 1.5rem; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #e2e8f0; transition: all 0.3s; }
        .platform-card:hover { transform: translateY(-4px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
        .etoro-highlight { background: linear-gradient(135deg, #faf5ff, #fff); border: 2px solid #7c3aed; border-radius: 16px; padding: 1.5rem; }
        .scenario-box { background: white; border-radius: 12px; padding: 1.25rem; border: 1px solid #e2e8f0; margin-bottom: 1rem; }
        .progress-timeline { position: relative; padding-left: 2rem; }
        .progress-timeline::before { content: ''; position: absolute; left: 7px; top: 0; bottom: 0; width: 2px; background: linear-gradient(to bottom, #7c3aed, #a855f7); }
        .progress-item { position: relative; margin-bottom: 1.5rem; }
        .progress-item::before { content: ''; position: absolute; left: -1.85rem; top: 0.25rem; width: 14px; height: 14px; background: #7c3aed; border-radius: 50%; border: 3px solid white; box-shadow: 0 0 0 2px #7c3aed; }
        
        /* ACORDEÓN CUSTOM CORREGIDO (sin Bootstrap JS) */
        .accordion-custom { border: none; background: none; }
        .accordion-custom .accordion-item { border: none; margin-bottom: 0.75rem; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.04); background: white; }
        .accordion-custom .accordion-button { 
            background: #faf5ff; 
            padding: 1.25rem 1.5rem; 
            font-weight: 600; 
            color: #334155; 
            border: none; 
            width: 100%; 
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        .accordion-custom .accordion-button:hover { background: #f3e8ff; color: #6b21a8; }
        .accordion-custom .accordion-button.active { background: #f3e8ff; color: #6b21a8; box-shadow: none; }
        .accordion-custom .accordion-button::after { 
            content: '\F282'; 
            font-family: 'bootstrap-icons'; 
            font-size: 1.2rem;
            transition: transform 0.3s ease;
            margin-left: auto;
        }
        .accordion-custom .accordion-button.active::after { transform: rotate(180deg); }
        .accordion-custom .accordion-body { 
            background: white; 
            padding: 1.5rem; 
            display: none;
            border-top: 1px solid #f1f5f9;
        }
        .accordion-custom .accordion-body.show { display: block; animation: fadeInAccordion 0.3s ease; }
        
        @keyframes fadeInAccordion {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .chart-container { background: #f8fafc; border-radius: 12px; padding: 1.5rem; border: 1px solid #e2e8f0; }
        .example-trade { background: #0f172a; color: #e2e8f0; border-radius: 12px; padding: 1.5rem; font-family: 'Courier New', monospace; font-size: 0.85rem; }
        .example-trade .label { color: #94a3b8; }
        .example-trade .value { color: #22c55e; font-weight: 600; }
        .example-trade .warning { color: #ef4444; font-weight: 600; }
        .comparison-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; }
    </style>

    <div class="container py-5">

        {{-- HERO --}}
        <div class="hero-avanzado">
            <div class="row align-items-center position-relative">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Pack Avanzado</h1>
                    <p class="lead mb-4 opacity-90">Curso progresivo de menos a más. Estrategias operativas, fiscalidad, diferentes servicios de inversión y educación financiera personalizada.</p>
                    <div class="row g-3 mb-4">
                        <div class="col-6 col-md-3"><div class="stat-box"><div class="num">6</div><div class="label">Módulos</div></div></div>
                        <div class="col-6 col-md-3"><div class="stat-box"><div class="num">2h</div><div class="label">Por vídeo</div></div></div>
                        <div class="col-6 col-md-3"><div class="stat-box"><div class="num">2 sem</div><div class="label">Frecuencia</div></div></div>
                        <div class="col-6 col-md-3"><div class="stat-box"><div class="num">∞</div><div class="label">Acceso</div></div></div>
                    </div>
                    <div class="d-flex gap-3 flex-wrap">
                        <span class="badge bg-white text-primary px-3 py-2"><i class="bi bi-check-circle me-1"></i> Curso progresivo</span>
                        <span class="badge bg-white text-primary px-3 py-2"><i class="bi bi-check-circle me-1"></i> eToro recomendado</span>
                        <span class="badge bg-white text-primary px-3 py-2"><i class="bi bi-check-circle me-1"></i> Fiscalidad incluida</span>
                        <span class="badge bg-white text-primary px-3 py-2"><i class="bi bi-check-circle me-1"></i> Day Trading, Value, Dividendos</span>
                    </div>
                </div>
                <div class="col-lg-4 text-center mt-4 mt-lg-0">
                    <div class="position-relative">
                        <iframe width="100%" height="220" src="https://www.youtube.com/embed/EFmHDFjmAOE" title="Análisis Técnico Avanzado" frameborder="0" class="rounded-4 shadow-lg" allowfullscreen></iframe>
                        <div class="mt-2 text-white-50 small"><i class="bi bi-play-circle me-1"></i> Introducción al Análisis Técnico</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN DE MÓDULOS --}}
        <div class="module-nav" id="moduleNav">
            <button class="module-nav-btn active" onclick="showModule(0)"><i class="bi bi-1-circle me-1"></i> Servicios de Inversión</button>
            <button class="module-nav-btn" onclick="showModule(1)"><i class="bi bi-2-circle me-1"></i> Tipos de Inversión</button>
            <button class="module-nav-btn" onclick="showModule(2)"><i class="bi bi-3-circle me-1"></i> Rentabilidad por Nivel</button>
            <button class="module-nav-btn" onclick="showModule(3)"><i class="bi bi-4-circle me-1"></i> Educación Financiera</button>
            <button class="module-nav-btn" onclick="showModule(4)"><i class="bi bi-5-circle me-1"></i> Fiscalidad</button>
        </div>

        {{-- MÓDULO 1: SERVICIOS DE INVERSIÓN --}}
        <div class="content-panel" id="module-0">
            <h3 class="fw-bold mb-4" style="color:#581c87;"><i class="bi bi-shop me-2"></i>Diferentes Servicios de Inversión — Plataformas Profesionales</h3>

            <div class="etoro-highlight mb-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <span class="badge bg-warning text-dark mb-2"><i class="bi bi-star-fill me-1"></i> RECOMENDADO POR GENTRADING</span>
                        <h4 class="fw-bold mb-2">eToro — Plataforma Social de Trading</h4>
                        <p class="text-muted mb-3">eToro es nuestra plataforma recomendada para el Pack Avanzado. Combina trading tradicional con funciones sociales únicas: CopyTrading, comunidad activa y más de 3.000 activos disponibles.</p>
                        <div class="row g-2 mb-3">
                            <div class="col-6"><div class="d-flex align-items-center gap-2"><i class="bi bi-check-circle-fill text-success"></i><small>0% comisión en acciones</small></div></div>
                            <div class="col-6"><div class="d-flex align-items-center gap-2"><i class="bi bi-check-circle-fill text-success"></i><small>CopyTrading disponible</small></div></div>
                            <div class="col-6"><div class="d-flex align-items-center gap-2"><i class="bi bi-check-circle-fill text-success"></i><small>App móvil completa</small></div></div>
                            <div class="col-6"><div class="d-flex align-items-center gap-2"><i class="bi bi-check-circle-fill text-success"></i><small>Regulada por CySEC, FCA, ASIC</small></div></div>
                        </div>
                        <a href="https://www.etoro.com" target="_blank" class="btn btn-primary rounded-pill px-4"><i class="bi bi-box-arrow-up-right me-2"></i>Visitar eToro</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="bg-white rounded-3 p-3 shadow-sm">
                            <i class="bi bi-people-fill fs-1 text-primary mb-2"></i>
                            <div class="fw-bold">30M+ usuarios</div>
                            <small class="text-muted">En 140 países</small>
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="fw-bold mb-3">Comparativa Completa de Plataformas 2026</h5>
            <div class="table-responsive mb-4">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Plataforma</th>
                            <th>Comisión Acciones</th>
                            <th>ETFs</th>
                            <th>Forex/CFDs</th>
                            <th>CopyTrading</th>
                            <th>Regulación</th>
                            <th>Ideal para</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background: #faf5ff;">
                            <td><strong><i class="bi bi-star-fill text-warning me-1"></i>eToro</strong></td>
                            <td><span class="tag tag-green">0%</span></td>
                            <td><span class="tag tag-green">0%</span></td>
                            <td><span class="tag tag-orange">Spreads</span></td>
                            <td><span class="tag tag-green">Sí</span></td>
                            <td>CySEC, FCA, ASIC</td>
                            <td>Social trading, principiantes</td>
                        </tr>
                        <tr>
                            <td><strong>DEGIRO</strong></td>
                            <td><span class="tag tag-green">Desde 0€</span></td>
                            <td><span class="tag tag-green">0€ (core)</span></td>
                            <td><span class="tag tag-red">No</span></td>
                            <td><span class="tag tag-red">No</span></td>
                            <td>CNMV, AFM</td>
                            <td>Inversión pasiva, ETFs</td>
                        </tr>
                        <tr>
                            <td><strong>Interactive Brokers</strong></td>
                            <td><span class="tag tag-green">0.0035$</span></td>
                            <td><span class="tag tag-green">Bajo</span></td>
                            <td><span class="tag tag-green">Sí</span></td>
                            <td><span class="tag tag-red">No</span></td>
                            <td>SEC, FCA, CNMV</td>
                            <td>Profesionales, day trading</td>
                        </tr>
                        <tr>
                            <td><strong>Trade Republic</strong></td>
                            <td><span class="tag tag-orange">1€</span></td>
                            <td><span class="tag tag-orange">1€</span></td>
                            <td><span class="tag tag-red">No</span></td>
                            <td><span class="tag tag-red">No</span></td>
                            <td>BaFin</td>
                            <td>Ahorro sistemático</td>
                        </tr>
                        <tr>
                            <td><strong>XTB</strong></td>
                            <td><span class="tag tag-green">0%</span></td>
                            <td><span class="tag tag-green">0%</span></td>
                            <td><span class="tag tag-green">Spreads bajos</span></td>
                            <td><span class="tag tag-red">No</span></td>
                            <td>FCA, KNF, CNMV</td>
                            <td>Forex y CFDs</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="platform-card h-100">
                        <h6 class="fw-bold text-primary mb-2"><i class="bi bi-graph-up-arrow me-2"></i>TradingView — Análisis Técnico Profesional</h6>
                        <p class="small text-muted mb-2">La plataforma de gráficos más usada del mundo por traders profesionales. Gratuita con funciones básicas, premium desde 14.95$/mes.</p>
                        <ul class="list-unstyled small mb-3">
                            <li><i class="bi bi-check2 text-success me-2"></i>100+ indicadores técnicos</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Alertas de precio personalizadas</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Comunidad con millones de ideas</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Scripting con Pine Script</li>
                        </ul>
                        <a href="https://www.tradingview.com" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill">Visitar TradingView <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="platform-card h-100">
                        <h6 class="fw-bold text-primary mb-2"><i class="bi bi-newspaper me-2"></i>Investing.com — Calendario Económico</h6>
                        <p class="small text-muted mb-2">El calendario económico más completo. Seguimiento de eventos macro, impacto esperado y resultados históricos.</p>
                        <ul class="list-unstyled small mb-3">
                            <li><i class="bi bi-check2 text-success me-2"></i>Eventos en tiempo real</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Impacto alto/medio/bajo clasificado</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Histórico de resultados</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Notificaciones push</li>
                        </ul>
                        <a href="https://es.investing.com/economic-calendar/" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill">Visitar Investing.com <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <div class="warning-box">
                <h6 class="fw-bold mb-2"><i class="bi bi-shield-exclamation me-2"></i>Advertencia sobre Brókers No Regulados</h6>
                <p class="small mb-2">Nunca operes con brókers sin licencia de organismos como <strong>CNMV (España), FCA (UK), CySEC (Chipre) o ASIC (Australia)</strong>. Los brókers no regulados pueden desaparecer con tu dinero.</p>
                <div class="row g-2 mt-2">
                    <div class="col-md-6"><div class="p-2 bg-white rounded border"><strong class="text-success"><i class="bi bi-shield-check me-2"></i>Regulados seguros:</strong><br><small class="text-muted">eToro, DEGIRO, Interactive Brokers, XTB, Trade Republic</small></div></div>
                    <div class="col-md-6"><div class="p-2 bg-white rounded border"><strong class="text-danger"><i class="bi bi-shield-x me-2"></i>Señales de alerta:</strong><br><small class="text-muted">Promesas de rentabilidad fija, sin licencia visible, solo aceptan cripto</small></div></div>
                </div>
            </div>
        </div>

        {{-- MÓDULO 2: TIPOS DE INVERSIÓN --}}
        <div class="content-panel" id="module-1">
            <h3 class="fw-bold mb-4" style="color:#581c87;"><i class="bi bi-diagram-3 me-2"></i>Tipos de Inversiones — Estrategias Detalladas</h3>

            <div class="strategy-card">
                <div class="row align-items-start">
                    <div class="col-md-8">
                        <span class="badge bg-success mb-2">ESTRATEGIA CONSERVADORA</span>
                        <h4 class="fw-bold mb-2">Value Investing — Inversión en Valor</h4>
                        <p class="text-muted mb-3">Metodología popularizada por Warren Buffett: comprar empresas sólidas por debajo de su valor intrínseco y mantenerlas a largo plazo.</p>
                        
                        <h6 class="fw-bold mb-2">Ratios Clave para Value Investing:</h6>
                        <div class="table-responsive mb-3">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Ratio</th><th>Fórmula</th><th>Interpretación</th><th>Umbral Ideal</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>PER</strong></td><td>Precio / Beneficio por acción</td><td>Cuánto pagas por cada € de beneficio</td><td>&lt;15 (mejor &lt;10)</td></tr>
                                    <tr><td><strong>P/B</strong></td><td>Precio / Valor contable</td><td>Precio vs valor en libros</td><td>&lt;1.5 (mejor &lt;1)</td></tr>
                                    <tr><td><strong>ROE</strong></td><td>Beneficio / Patrimonio neto</td><td>Rentabilidad del capital</td><td>&gt;15%</td></tr>
                                    <tr><td><strong>Debt/Equity</strong></td><td>Deuda total / Patrimonio</td><td>Nivel de apalancamiento</td><td>&lt;0.5</td></tr>
                                    <tr><td><strong>Free Cash Flow</strong></td><td>Flujo de caja operativo - Capex</td><td>Dinero real que genera</td><td>Positivo y creciente</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="success-box">
                            <h6 class="fw-bold mb-2"><i class="bi bi-building me-2"></i>Caso Real: Análisis de Iberdrola (2024)</h6>
                            <div class="row g-2 text-center">
                                <div class="col-4"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">PER: 12.4</div><small class="text-muted">Atractivo</small></div></div>
                                <div class="col-4"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">ROE: 11.2%</div><small class="text-muted">Sólido</small></div></div>
                                <div class="col-4"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">Div: 4.1%</div><small class="text-muted">Renta pasiva</small></div></div>
                            </div>
                            <small class="text-muted d-block mt-2"><i class="bi bi-info-circle me-1"></i> Datos orientativos. Realiza tu propio análisis antes de invertir.</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light rounded p-3 h-100">
                            <h6 class="fw-bold mb-2"><i class="bi bi-book me-2"></i>Lecturas Recomendadas</h6>
                            <ul class="list-unstyled small">
                                <li class="mb-2"><a href="#" class="text-decoration-none"><i class="bi bi-book-fill text-primary me-2"></i>"El inversor inteligente" — Benjamin Graham</a></li>
                                <li class="mb-2"><a href="#" class="text-decoration-none"><i class="bi bi-book-fill text-primary me-2"></i>"La guerra de Buffett" — Roger Lowenstein</a></li>
                                <li class="mb-2"><a href="#" class="text-decoration-none"><i class="bi bi-book-fill text-primary me-2"></i>"Análisis de estados financieros" — Martin Fridson</a></li>
                                <li class="mb-2"><a href="#" class="text-decoration-none"><i class="bi bi-book-fill text-primary me-2"></i>"Common Stocks and Uncommon Profits" — Philip Fisher</a></li>
                            </ul>
                            <div class="mt-3 p-2 bg-white rounded border">
                                <small class="text-muted"><i class="bi bi-clock me-1"></i> Horizonte temporal: <strong>3-10 años</strong></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="strategy-card">
                <div class="row align-items-start">
                    <div class="col-md-8">
                        <span class="badge bg-warning text-dark mb-2">ESTRATEGIA MODERADA-AGRESIVA</span>
                        <h4 class="fw-bold mb-2">Day Trading — Operativa Intradiaria</h4>
                        <p class="text-muted mb-3">Compra y venta de activos dentro del mismo día de sesión. Requiere disciplina extrema, gestión de riesgo rigurosa y control emocional.</p>

                        <h6 class="fw-bold mb-2">Setup de Apertura de Mercado (9:30 NY):</h6>
                        <div class="progress-timeline mb-3">
                            <div class="progress-item"><strong>Paso 1:</strong> Identificar máximos y mínimos de la sesión previa</div>
                            <div class="progress-item"><strong>Paso 2:</strong> Esperar los primeros 15 minutos sin operar (evitar ruido)</div>
                            <div class="progress-item"><strong>Paso 3:</strong> Si el precio rompe el máximo previo con volumen → entrada long</div>
                            <div class="progress-item"><strong>Paso 4:</strong> Stop Loss justo por debajo del mínimo de los primeros 15 min</div>
                            <div class="progress-item"><strong>Paso 5:</strong> Take Profit en relación mínima 1:2 riesgo/beneficio</div>
                        </div>

                        <div class="danger-box">
                            <h6 class="fw-bold mb-2"><i class="bi bi-exclamation-triangle me-2"></i>Regla de Oro del Day Trading</h6>
                            <p class="small mb-0">Nunca arriesgues más del <strong>1% de tu capital</strong> en una sola operación. Con una cuenta de 5.000€, el riesgo máximo por trade es 50€. Así puedes tener 20 operaciones perdedoras seguidas y seguir en el juego.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="example-trade h-100">
                            <div class="mb-2"><span class="label">📊 SETUP LARGO — AAPL</span></div>
                            <div class="mb-1"><span class="label">Fecha:</span> <span class="value">15 Mayo 2026</span></div>
                            <div class="mb-1"><span class="label">Entrada:</span> <span class="value">$187.50</span></div>
                            <div class="mb-1"><span class="label">Stop Loss:</span> <span class="warning">$186.00 (-$1.50)</span></div>
                            <div class="mb-1"><span class="label">Take Profit:</span> <span class="value">$190.50 (+$3.00)</span></div>
                            <div class="mb-1"><span class="label">R/R:</span> <span class="value">1:2</span></div>
                            <div class="mb-1"><span class="label">Tamaño:</span> <span class="value">33 acciones ($1,650)</span></div>
                            <div class="mb-0"><span class="label">Riesgo total:</span> <span class="warning">$49.50 (0.99% de 5,000€)</span></div>
                            <hr style="border-color: #334155; margin: 0.75rem 0;">
                            <div class="label"><i class="bi bi-info-circle me-1"></i> Razón: Ruptura de máximo premarket + volumen 2x medio + RSI 58 (no sobrecomprado)</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="strategy-card">
                <div class="row align-items-start">
                    <div class="col-md-8">
                        <span class="badge bg-info text-dark mb-2">ESTRATEGIA PASIVA</span>
                        <h4 class="fw-bold mb-2">Dividend Investing — Inversión en Dividendos</h4>
                        <p class="text-muted mb-3">Estrategia centrada en empresas que distribuyen beneficios periódicamente. Ideal para generar ingresos pasivos estables.</p>

                        <h6 class="fw-bold mb-2">Empresas "Dividend Aristocrats" (25+ años aumentando dividendo):</h6>
                        <div class="table-responsive mb-3">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Empresa</th><th>Sector</th><th>Dividendo</th><th>Años ↑</th><th>Pago</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>Procter & Gamble</strong></td><td>Consumo</td><td>2.4%</td><td>68</td><td>Trimestral</td></tr>
                                    <tr><td><strong>Coca-Cola</strong></td><td>Bebidas</td><td>3.1%</td><td>62</td><td>Trimestral</td></tr>
                                    <tr><td><strong>Johnson & Johnson</strong></td><td>Salud</td><td>3.0%</td><td>62</td><td>Trimestral</td></tr>
                                    <tr><td><strong>3M</strong></td><td>Industrial</td><td>5.5%</td><td>66</td><td>Trimestral</td></tr>
                                    <tr><td><strong>Realty Income</strong></td><td>REIT</td><td>5.2%</td><td>29</td><td>Mensual</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tip-box mb-0">
                            <h6 class="fw-bold mb-2"><i class="bi bi-calculator me-2"></i>Cálculo de Ingresos por Dividendos</h6>
                            <p class="small mb-2">Con una cartera de <strong>50.000€</strong> en empresas con dividendo medio del <strong>4%</strong>:</p>
                            <div class="row text-center g-2">
                                <div class="col-4"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">2.000€</div><small class="text-muted">Anuales brutos</small></div></div>
                                <div class="col-4"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">166€</div><small class="text-muted">Mensuales brutos</small></div></div>
                                <div class="col-4"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">~1.620€</div><small class="text-muted">Netos tras IRPF</small></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light rounded p-3 h-100">
                            <h6 class="fw-bold mb-2"><i class="bi bi-lightbulb me-2"></i>Estrategia DRIP</h6>
                            <p class="small text-muted mb-2">Reinversión Automática de Dividendos (Dividend Reinvestment Plan):</p>
                            <ul class="list-unstyled small">
                                <li><i class="bi bi-check2 text-success me-2"></i>Compra fraccionaria de acciones</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Sin comisiones de reinversión</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Efecto compuesto acelerado</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Disponible en eToro, DEGIRO</li>
                            </ul>
                            <div class="mt-2 p-2 bg-white rounded border">
                                <small class="text-muted"><i class="bi bi-clock me-1"></i> Horizonte: <strong>10-30 años</strong></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="strategy-card">
                <span class="badge bg-primary mb-2">ESTRATEGIA DIVERSIFICADA</span>
                <h4 class="fw-bold mb-3">Swing Trading — Trading a Medio Plazo</h4>
                <p class="text-muted mb-3">Mantener posiciones de 2 a 10 días capturando movimientos tendenciales. Menos estrés que el day trading, más rentabilidad potencial que buy & hold.</p>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-2">Características del Swing Trading:</h6>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i><strong>Temporalidad:</strong> Gráficos diarios y 4H</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i><strong>Holding:</strong> 2-10 días medio</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i><strong>Riesgo por trade:</strong> 1-2% del capital</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i><strong>Objetivo R/R:</strong> Mínimo 1:2, ideal 1:3</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i><strong>Indicadores clave:</strong> EMA 20/50, RSI, Volumen</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-2">Setup Swing Clásico:</h6>
                        <div class="scenario-box">
                            <ol class="small mb-0">
                                <li class="mb-1">Identificar tendencia alcista en diario</li>
                                <li class="mb-1">Esperar retroceso a EMA 20 o 50</li>
                                <li class="mb-1">Confirmar con RSI entre 40-60</li>
                                <li class="mb-1">Volumen en aumento en el rebote</li>
                                <li class="mb-1">Entrada en ruptura de máximo del retroceso</li>
                                <li class="mb-0">Stop bajo el mínimo del retroceso</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MÓDULO 3: RENTABILIDAD POR NIVEL --}}
        <div class="content-panel" id="module-2">
            <h3 class="fw-bold mb-4" style="color:#581c87;"><i class="bi bi-bar-chart-line me-2"></i>Ejemplos Según Nivel de Rentabilidad Deseado</h3>

            <div class="alert alert-info d-flex align-items-center mb-4">
                <i class="bi bi-info-circle-fill me-3 fs-4"></i>
                <div>La rentabilidad está directamente relacionada con el riesgo asumido. <strong>No existe rentabilidad alta sin riesgo</strong>. Ajusta tu estrategia a tu tolerancia al riesgo y horizonte temporal.</div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-success text-white py-3">
                            <h5 class="fw-bold mb-0"><i class="bi bi-shield-check me-2"></i>Conservador</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div class="highlight-number text-success">3-5%</div>
                                <small class="text-muted">Rentabilidad anual esperada</small>
                            </div>
                            <div class="risk-meter"><div class="risk-fill bg-success" style="width: 20%"></div></div>
                            <small class="text-muted d-block mb-3">Riesgo: Muy bajo</small>
                            
                            <h6 class="fw-bold small">Cartera Modelo:</h6>
                            <ul class="list-unstyled small mb-3">
                                <li><i class="bi bi-check2 text-success me-2"></i>70% Bonos/Letras del Tesoro</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>20% ETFs globales</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>10% Liquidez</li>
                            </ul>
                            
                            <div class="bg-light rounded p-2">
                                <small class="text-muted"><strong>Ejemplo:</strong> 10.000€ a 4% anual = 14.802€ en 10 años</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-warning text-dark py-3">
                            <h5 class="fw-bold mb-0"><i class="bi bi-balance-scale me-2"></i>Moderado</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div class="highlight-number text-warning">6-9%</div>
                                <small class="text-muted">Rentabilidad anual esperada</small>
                            </div>
                            <div class="risk-meter"><div class="risk-fill bg-warning" style="width: 50%"></div></div>
                            <small class="text-muted d-block mb-3">Riesgo: Medio</small>
                            
                            <h6 class="fw-bold small">Cartera Modelo:</h6>
                            <ul class="list-unstyled small mb-3">
                                <li><i class="bi bi-check2 text-warning me-2"></i>60% ETFs globales (MSCI World)</li>
                                <li><i class="bi bi-check2 text-warning me-2"></i>25% Bonos corporativos</li>
                                <li><i class="bi bi-check2 text-warning me-2"></i>10% REITs</li>
                                <li><i class="bi bi-check2 text-warning me-2"></i>5% Liquidez</li>
                            </ul>
                            
                            <div class="bg-light rounded p-2">
                                <small class="text-muted"><strong>Ejemplo:</strong> 10.000€ a 7.5% anual = 20.610€ en 10 años</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-danger text-white py-3">
                            <h5 class="fw-bold mb-0"><i class="bi bi-lightning-charge me-2"></i>Agresivo</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div class="highlight-number text-danger">10-15%+</div>
                                <small class="text-muted">Rentabilidad anual esperada</small>
                            </div>
                            <div class="risk-meter"><div class="risk-fill bg-danger" style="width: 85%"></div></div>
                            <small class="text-muted d-block mb-3">Riesgo: Alto (pérdidas posibles)</small>
                            
                            <h6 class="fw-bold small">Cartera Modelo:</h6>
                            <ul class="list-unstyled small mb-3">
                                <li><i class="bi bi-check2 text-danger me-2"></i>50% Acciones individuales</li>
                                <li><i class="bi bi-check2 text-danger me-2"></i>20% ETFs sectoriales (tech)</li>
                                <li><i class="bi bi-check2 text-danger me-2"></i>15% Trading activo</li>
                                <li><i class="bi bi-check2 text-danger me-2"></i>10% Cripto (max 10%)</li>
                                <li><i class="bi bi-check2 text-danger me-2"></i>5% Liquidez</li>
                            </ul>
                            
                            <div class="bg-light rounded p-2">
                                <small class="text-muted"><strong>Ejemplo:</strong> 10.000€ a 12% anual = 31.058€ en 10 años (riesgo de -30% en un año malo)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="strategy-card">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-graph-up me-2"></i>Simulación Comparativa: 10.000€ iniciales + 200€/mes</h5>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Perfil</th>
                                <th>Rentabilidad</th>
                                <th>Año 5</th>
                                <th>Año 10</th>
                                <th>Año 20</th>
                                <th>Capital Aportado</th>
                                <th>Ganancia Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="tag tag-green">Conservador</span></td>
                                <td>4%</td>
                                <td>23.400€</td>
                                <td>38.600€</td>
                                <td>78.200€</td>
                                <td>34.000€</td>
                                <td class="text-success">+44.200€</td>
                            </tr>
                            <tr>
                                <td><span class="tag tag-orange">Moderado</span></td>
                                <td>7.5%</td>
                                <td>26.800€</td>
                                <td>50.200€</td>
                                <td>132.400€</td>
                                <td>34.000€</td>
                                <td class="text-success">+98.400€</td>
                            </tr>
                            <tr>
                                <td><span class="tag tag-red">Agresivo</span></td>
                                <td>12%</td>
                                <td>31.200€</td>
                                <td>68.500€</td>
                                <td>239.800€</td>
                                <td>34.000€</td>
                                <td class="text-success">+205.800€</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Simulaciones teóricas. Las inversiones conllevan riesgo y rentabilidades pasadas no garantizan futuras.</small>
            </div>

            <div class="warning-box">
                <h6 class="fw-bold mb-2"><i class="bi bi-exclamation-diamond me-2"></i>Test de Tolerancia al Riesgo</h6>
                <p class="small mb-3">Responde honestamente: ¿qué harías si tu cartera perdiera un 20% en un mes?</p>
                <div class="row g-2">
                    <div class="col-md-4"><div class="p-2 bg-white rounded border text-center"><div class="fw-bold text-success">Vendo todo</div><small class="text-muted">Perfil: Conservador</small></div></div>
                    <div class="col-md-4"><div class="p-2 bg-white rounded border text-center"><div class="fw-bold text-warning">No hago nada</div><small class="text-muted">Perfil: Moderado</small></div></div>
                    <div class="col-md-4"><div class="p-2 bg-white rounded border text-center"><div class="fw-bold text-danger">Compro más</div><small class="text-muted">Perfil: Agresivo</small></div></div>
                </div>
            </div>
        </div>

        {{-- MÓDULO 4: EDUCACIÓN FINANCIERA --}}
        <div class="content-panel" id="module-3">
            <h3 class="fw-bold mb-4" style="color:#581c87;"><i class="bi bi-mortarboard me-2"></i>Educación Financiera Personal — Construye Tu Conocimiento</h3>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="strategy-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-brain me-2"></i>Psicología del Inversor</h5>
                        <p class="text-muted small mb-3">El 80% del éxito en inversión es psicológico. Conoce los sesgos que te hacen perder dinero.</p>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold small text-danger mb-2"><i class="bi bi-emoji-frown me-2"></i>Sesgos a Evitar:</h6>
                            <ul class="list-unstyled small">
                                <li class="mb-2"><strong>FOMO (Fear Of Missing Out):</strong> Comprar porque "todo el mundo lo hace" → compras caro</li>
                                <li class="mb-2"><strong>Pánico:</strong> Vender en caídas → cristalizas pérdidas</li>
                                <li class="mb-2"><strong>Confirmación:</strong> Solo buscas info que apoye tu postura → ignoras riesgos</li>
                                <li class="mb-2"><strong>Anclaje:</strong> Te aferras al precio de compra → no ves la realidad actual</li>
                                <li class="mb-2"><strong>Sobreconfianza:</strong> "Llevo 3 meses ganando" → aumentas riesgo → crash</li>
                            </ul>
                        </div>

                        <div class="success-box mb-0">
                            <h6 class="fw-bold small mb-2"><i class="bi bi-emoji-smile me-2"></i>Rutina del Trader Disciplinado:</h6>
                            <ol class="small mb-0">
                                <li>Revisar calendario económico antes de operar</li>
                                <li>Escribir plan de trading antes de cada sesión</li>
                                <li>Respetar stop loss sin excepciones</li>
                                <li>Revisar operaciones al cierre (journaling)</li>
                                <li>Descansar 1 día a la semana sin mirar mercados</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="strategy-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-journal-text me-2"></i>Bitácora de Trading</h5>
                        <p class="text-muted small mb-3">Registra cada operación. Es la herramienta más poderosa para mejorar.</p>

                        <div class="table-responsive mb-3">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Campo</th><th>Qué anotar</th><th>Por qué</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>Fecha/Hora</strong></td><td>Día y hora exacta</td><td>Identificar patrones temporales</td></tr>
                                    <tr><td><strong>Activo</strong></td><td>Ticker y mercado</td><td>Qué operas mejor/peor</td></tr>
                                    <tr><td><strong>Dirección</strong></td><td>Largo/Corto</td><td>Tendencia a favor/en contra</td></tr>
                                    <tr><td><strong>Entrada</strong></td><td>Precio y razón</td><td>Evaluar setup</td></tr>
                                    <tr><td><strong>Salida</strong></td><td>Precio y razón</td><td>Gestión de salida</td></tr>
                                    <tr><td><strong>R/R</strong></td><td>Planificado vs real</td><td>Disciplina en planificación</td></tr>
                                    <tr><td><strong>Emoción</strong></td><td>Del 1-10 antes/después</td><td>Impacto emocional</td></tr>
                                    <tr><td><strong>Aprendizaje</strong></td><td>1 frase clave</td><td>Refuerzo positivo</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tip-box mb-0">
                            <p class="small mb-0"><i class="bi bi-lightbulb me-2"></i><strong>Plantilla gratuita:</strong> Descarga nuestra plantilla de Excel para bitácora en la sección de recursos. Incluye fórmulas automáticas de estadísticas.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="strategy-card">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-book-half me-2"></i>Biblioteca de Conocimiento Recomendada</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2"><i class="bi bi-book text-primary me-2"></i>Libros Esenciales:</h6>
                        <div class="resource-tile mb-2">
                            <i class="bi bi-book-fill fs-5 text-primary"></i>
                            <div>
                                <strong>El Inversor Inteligente</strong>
                                <small class="d-block text-muted">Benjamin Graham — La biblia del Value Investing</small>
                            </div>
                        </div>
                        <div class="resource-tile mb-2">
                            <i class="bi bi-book-fill fs-5 text-primary"></i>
                            <div>
                                <strong>Trading en la Zona</strong>
                                <small class="d-block text-muted">Mark Douglas — Psicología del trading profesional</small>
                            </div>
                        </div>
                        <div class="resource-tile mb-2">
                            <i class="bi bi-book-fill fs-5 text-primary"></i>
                            <div>
                                <strong>El Pequeño Libro que Bate al Mercado</strong>
                                <small class="d-block text-muted">Joel Greenblatt — Fórmula mágica de inversión</small>
                            </div>
                        </div>
                        <div class="resource-tile mb-0">
                            <i class="bi bi-book-fill fs-5 text-primary"></i>
                            <div>
                                <strong>Common Stocks and Uncommon Profits</strong>
                                <small class="d-block text-muted">Philip Fisher — Análisis de calidad empresarial</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2"><i class="bi bi-youtube text-danger me-2"></i>Canales de YouTube Recomendados:</h6>
                        <div class="resource-tile mb-2">
                            <i class="bi bi-youtube fs-5 text-danger"></i>
                            <div>
                                <strong>Charly Sinewan</strong>
                                <small class="d-block text-muted">Trading real, sin filtros, operativa en vivo</small>
                            </div>
                        </div>
                        <div class="resource-tile mb-2">
                            <i class="bi bi-youtube fs-5 text-danger"></i>
                            <div>
                                <strong>Hola Mundo Inversiones</strong>
                                <small class="d-block text-muted">Finanzas personales e inversión en español</small>
                            </div>
                        </div>
                        <div class="resource-tile mb-2">
                            <i class="bi bi-youtube fs-5 text-danger"></i>
                            <div>
                                <strong>The Plain Bagel</strong>
                                <small class="d-block text-muted">Educación financiera en inglés, muy didáctico</small>
                            </div>
                        </div>
                        <div class="resource-tile mb-0">
                            <i class="bi bi-youtube fs-5 text-danger"></i>
                                    <div>
                                <strong>Patrick Boyle</strong>
                                <small class="d-block text-muted">Finanzas cuantitativas y análisis profundo</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="strategy-card">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-clipboard-data me-2"></i>Glosario de Términos Financieros</h5>
                <div class="row g-2">
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>Bull Market</strong><br><small class="text-muted">Mercado alcista, precios subiendo</small></div></div>
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>Bear Market</strong><br><small class="text-muted">Mercado bajista, precios cayendo</small></div></div>
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>Spread</strong><br><small class="text-muted">Diferencia entre precio de compra y venta</small></div></div>
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>Leverage</strong><br><small class="text-muted">Apalancamiento: multiplicador de posición</small></div></div>
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>Drawdown</strong><br><small class="text-muted">Caída máxima desde un pico</small></div></div>
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>Alpha</strong><br><small class="text-muted">Rentabilidad por encima del mercado</small></div></div>
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>Beta</strong><br><small class="text-muted">Sensibilidad al movimiento del mercado</small></div></div>
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>Sharpe Ratio</strong><br><small class="text-muted">Rentabilidad ajustada al riesgo</small></div></div>
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>Dividend Yield</strong><br><small class="text-muted">Dividendo anual / Precio de la acción</small></div></div>
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>P/E Ratio</strong><br><small class="text-muted">Precio / Beneficio por acción</small></div></div>
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>Market Cap</strong><br><small class="text-muted">Valor total de la empresa en bolsa</small></div></div>
                    <div class="col-md-6 col-lg-4"><div class="p-2 bg-light rounded"><strong>Volatilidad</strong><br><small class="text-muted">Magnitud de las fluctuaciones de precio</small></div></div>
                </div>
            </div>
        </div>

        {{-- MÓDULO 5: FISCALIDAD --}}
        <div class="content-panel" id="module-4">
            <h3 class="fw-bold mb-4" style="color:#581c87;"><i class="bi bi-receipt me-2"></i>Fiscalidad de las Inversiones en España</h3>

            <div class="alert alert-warning d-flex align-items-center mb-4">
                <i class="bi bi-exclamation-triangle-fill me-3 fs-4"></i>
                <div><strong>Importante:</strong> La información fiscal es orientativa y puede cambiar. Consulta siempre con un asesor fiscal para tu situación particular. Última actualización: 2026.</div>
            </div>

            <div class="fiscal-box mb-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-calculator me-2"></i>IRPF — Base del Ahorro (2026)</h5>
                <p class="text-muted small mb-3">Las ganancias de inversión (plusvalías) y dividendos tributan en la base del ahorro del IRPF con los siguientes tramos:</p>
                
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Tramo de Ganancia</th>
                                <th>Tipo de Retención</th>
                                <th>Ejemplo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Hasta 6.000€</td>
                                <td><span class="tag tag-green">19%</span></td>
                                <td>Ganancia 5.000€ → Impuesto 950€</td>
                            </tr>
                            <tr>
                                <td>De 6.000€ a 50.000€</td>
                                <td><span class="tag tag-orange">21%</span></td>
                                <td>Ganancia 30.000€ → Impuesto 6.300€</td>
                            </tr>
                            <tr>
                                <td>De 50.000€ a 200.000€</td>
                                <td><span class="tag tag-red">23%</span></td>
                                <td>Ganancia 100.000€ → Impuesto 23.000€</td>
                            </tr>
                            <tr>
                                <td>Más de 200.000€</td>
                                <td><span class="tag tag-red">26%</span></td>
                                <td>Ganancia 250.000€ → Impuesto 65.000€</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="strategy-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-cash-stack me-2"></i>¿Qué Tributa y Qué No?</h5>
                        
                        <h6 class="fw-bold small text-success mb-2"><i class="bi bi-check-circle me-2"></i>Sí Tributa:</h6>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="bi bi-dot text-success me-2"></i>Venta de acciones con ganancia (plusvalía)</li>
                            <li class="mb-1"><i class="bi bi-dot text-success me-2"></i>Dividendos recibidos</li>
                            <li class="mb-1"><i class="bi bi-dot text-success me-2"></i>Intereses de bonos y depósitos</li>
                            <li class="mb-1"><i class="bi bi-dot text-success me-2"></i>Ganancias en CFDs y Forex</li>
                            <li class="mb-1"><i class="bi bi-dot text-success me-2"></i>Ganancias en criptomonedas (>2.000€)</li>
                        </ul>

                        <h6 class="fw-bold small text-danger mb-2"><i class="bi bi-x-circle me-2"></i>No Tributa (hasta cierto punto):</h6>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-1"><i class="bi bi-dot text-danger me-2"></i>Traspasos entre fondos de inversión (no ETFs)</li>
                            <li class="mb-1"><i class="bi bi-dot text-danger me-2"></i>Reinversión de dividendos en ampliaciones</li>
                            <li class="mb-1"><i class="bi bi-dot text-danger me-2"></i>Pérdidas compensables con ganancias</li>
                            <li class="mb-1"><i class="bi bi-dot text-danger me-2"></i>Primera vivienda (exención bajo ciertas condiciones)</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="strategy-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-shield-check me-2"></i>Estrategias Legales de Optimización</h5>

                        <div class="mb-3">
                            <h6 class="fw-bold small">1. Compensación de Pérdidas</h6>
                            <p class="small text-muted mb-1">Las pérdidas de un año se compensan con ganancias de los 4 años siguientes. Si vendes con pérdida, guarda el justificante.</p>
                            <div class="bg-light rounded p-2">
                                <small class="text-muted"><strong>Ejemplo:</strong> Pierdes 3.000€ en 2026. Ganas 5.000€ en 2027. Solo tributas por 2.000€.</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold small">2. Traspaso entre Fondos (No ETFs)</h6>
                            <p class="small text-muted mb-1">Cambiar de fondo de inversión a otro no genera evento tributario. Solo pagas al rescatar definitivamente.</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold small">3. Venta por Tramos</h6>
                            <p class="small text-muted mb-1">Si tienes ganancias altas, vende en años diferentes para no saltar de tramo.</p>
                            <div class="bg-light rounded p-2">
                                <small class="text-muted"><strong>Ejemplo:</strong> Ganancia 55.000€. Vende 25.000€ en diciembre y 30.000€ en enero. Ahorras saltar al tramo del 23%.</small>
                            </div>
                        </div>

                        <div class="mb-0">
                            <h6 class="fw-bold small">4. Modelo D6 — Declaración de Bienes en el Extranjero</h6>
                            <p class="small text-muted mb-0">Si operas con brókers extranjeros (eToro, IB), debes declarar tus posiciones en el modelo D6 de la Agencia Tributaria.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="strategy-card">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-file-earmark-text me-2"></i>Casos Prácticos de Fiscalidad</h5>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="scenario-box">
                            <h6 class="fw-bold text-primary mb-2">Caso 1: Dividendos Anuales</h6>
                            <p class="small text-muted mb-2">Recibes 2.500€ en dividendos de acciones españolas y 1.200€ de acciones USA.</p>
                            <div class="bg-light rounded p-2 mb-2">
                                <small class="text-muted"><strong>Total:</strong> 3.700€<<br><strong>Retención:</strong> 19% = 703€<<br><strong>En declaración:</strong> Se incluye, ya retenido</small>
                            </div>
                            <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Los dividendos de USA tienen retención del 15% por convenio. Se compensa en España.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="scenario-box">
                            <h6 class="fw-bold text-primary mb-2">Caso 2: Venta de Acciones</h6>
                            <p class="small text-muted mb-2">Compraste 100 acciones de Apple a 150$. Las vendes a 200$. Tipo de cambio: 1€ = 1.08$.</p>
                            <div class="bg-light rounded p-2 mb-2">
                                <small class="text-muted"><strong>Compra:</strong> 100 × 150$ / 1.08 = 13.889€<<br><strong>Venta:</strong> 100 × 200$ / 1.08 = 18.519€<<br><strong>Ganancia:</strong> 4.630€<<br><strong>Impuesto (19%):</strong> 880€</small>
                            </div>
                            <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Se aplica el tipo de cambio del día de compra y del día de venta.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="scenario-box">
                            <h6 class="fw-bold text-primary mb-2">Caso 3: Pérdidas Compensables</h6>
                            <p class="small text-muted mb-2">En 2026 pierdes 4.000€ en una operación de trading. En 2027 ganas 8.000€.</p>
                            <div class="bg-light rounded p-2 mb-2">
                                <small class="text-muted"><strong>2026:</strong> Pérdida 4.000€ (nada que pagar)<br><strong>2027:</strong> Ganancia 8.000€ - Pérdida 4.000€ = 4.000€<<br><strong>Impuesto 2027:</strong> 4.000€ × 19% = 760€</small>
                            </div>
                            <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Plazo para compensar: 4 años siguientes.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="scenario-box">
                            <h6 class="fw-bold text-primary mb-2">Caso 4: Criptomonedas</h6>
                            <p class="small text-muted mb-2">Compraste Bitcoin a 20.000€ y lo vendes a 35.000€. Ganancia: 15.000€.</p>
                            <div class="bg-light rounded p-2 mb-2">
                                <small class="text-muted"><strong>Ganancia:</strong> 15.000€<<br><strong>Tramo:</strong> 19% (hasta 6.000€) + 21% (6.000€ a 15.000€)<br><strong>Cálculo:</strong> 6.000×19% + 9.000×21% = 1.140 + 1.890 = 3.030€<<br><strong>Impuesto total:</strong> 3.030€ (20.2% efectivo)</small>
                            </div>
                            <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Obligatorio declarar si la ganancia supera 2.000€ anuales.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="danger-box">
                <h6 class="fw-bold mb-2"><i class="bi bi-exclamation-triangle me-2"></i>Errores Fiscales Comunes a Evitar</h6>
                <div class="row g-2">
                    <div class="col-md-6">
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2"><i class="bi bi-x-octagon text-danger me-2"></i><strong>No declarar el modelo D6</strong> → Multa de hasta 5.000€ por cuenta</li>
                            <li class="mb-2"><i class="bi bi-x-octagon text-danger me-2"></i><strong>Olvidar compensar pérdidas</strong> → Pagas impuestos de más</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2"><i class="bi bi-x-octagon text-danger me-2"></i><strong>Confundir ETFs con fondos</strong> → Los ETFs sí tributan al vender entre ellos</li>
                            <li class="mb-2"><i class="bi bi-x-octagon text-danger me-2"></i><strong>No guardar justificantes</strong> → Problemas en una inspección</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- RECURSOS AVANZADOS --}}
        <div class="mt-5 pt-4 border-top border-2" style="border-color: #e9d5ff !important;">
            <div class="text-center mb-4">
                <span class="badge px-4 py-2 fs-6 fw-bold" style="background-color: #f3e8ff; color: #6b21a8; border-radius: 999px; letter-spacing: 0.05em;">
                    <i class="bi bi-bookmark-star me-2"></i>MATERIAL COMPLEMENTARIO
                </span>
            </div>
        </div>
        <div class="card shadow border-0 p-4 mb-5">
            <h4 class="fw-bold mb-4" style="color:#581c87;"><i class="bi bi-bookmarks me-2"></i>Recursos y Herramientas del Pack Avanzado</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <a href="https://www.tradingview.com" target="_blank" class="resource-tile">
                        <i class="bi bi-bar-chart-line fs-5 text-primary"></i>
                        <div>
                            <strong>TradingView</strong>
                            <small class="d-block text-muted">Plataforma de gráficos #1 del mundo. 100+ indicadores, alertas, scripting.</small>
                        </div>
                    </a>
                    <a href="https://es.investing.com/economic-calendar/" target="_blank" class="resource-tile">
                        <i class="bi bi-calendar-event fs-5 text-danger"></i>
                        <div>
                            <strong>Calendario Económico — Investing.com</strong>
                            <small class="d-block text-muted">Fechas clave: tipos de interés, IPC, NFP y eventos de mercado.</small>
                        </div>
                    </a>
                    <a href="https://www.babypips.com/learn/forex" target="_blank" class="resource-tile">
                        <i class="bi bi-mortarboard fs-5 text-info"></i>
                        <div>
                            <strong>BabyPips School of Pipsology</strong>
                            <small class="d-block text-muted">El mejor curso gratuito de trading desde cero. En inglés.</small>
                        </div>
                    </a>
                    <a href="https://www.morningstar.es" target="_blank" class="resource-tile">
                        <i class="bi bi-sun fs-5 text-warning"></i>
                        <div>
                            <strong>Morningstar España</strong>
                            <small class="d-block text-muted">Análisis de fondos, ETFs y valoraciones de empresas.</small>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="https://finviz.com" target="_blank" class="resource-tile">
                        <i class="bi bi-grid-3x3-gap fs-5 text-danger"></i>
                        <div>
                            <strong>Finviz</strong>
                            <small class="d-block text-muted">Mapa de calor del mercado, screener de acciones, noticias.</small>
                        </div>
                    </a>
                    <a href="https://www.sec.gov/cgi-bin/browse-edgar" target="_blank" class="resource-tile">
                        <i class="bi bi-file-earmark-text fs-5 text-success"></i>
                        <div>
                            <strong>SEC EDGAR</strong>
                            <small class="d-block text-muted">Informes oficiales de empresas cotizadas en USA (10-K, 10-Q).</small>
                        </div>
                    </a>
                    <a href="https://www.agenciatributaria.gob.es" target="_blank" class="resource-tile">
                        <i class="bi bi-bank fs-5 text-primary"></i>
                        <div>
                            <strong>Agencia Tributaria (AEAT)</strong>
                            <small class="d-block text-muted">Información oficial sobre fiscalidad de inversiones en España.</small>
                        </div>
                    </a>
                    <a href="https://www.cnmv.es" target="_blank" class="resource-tile">
                        <i class="bi bi-shield-check fs-5 text-success"></i>
                        <div>
                            <strong>CNMV</strong>
                            <small class="d-block text-muted">Registro de entidades reguladas, alertas de fraudes financieros.</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>

       {{-- FAQ --}}
        <div class="mb-5">
            <div class="text-center mb-4">
                <span class="badge px-4 py-2 fs-6 fw-bold" style="background-color: #f3e8ff; color: #6b21a8; border-radius: 999px; letter-spacing: 0.05em;">
                    <i class="bi bi-question-diamond me-2"></i>PREGUNTAS FRECUENTES
                </span>
            </div>
            <h4 class="fw-bold mb-4" style="color:#581c87;">
                <i class="bi bi-question-circle me-2"></i>Preguntas Frecuentes del Pack Avanzado</h4>
            <div class="accordion-custom" id="faqAccordion">
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Necesito experiencia previa para el Pack Avanzado?
                    </button>
                    <div class="accordion-body">
                        <p>Se recomienda haber completado el <strong>Pack Inicial</strong> o tener conocimientos básicos de inversión. El curso es progresivo: empezamos con análisis técnico intermedio y avanzamos hasta estrategias complejas. Si dominas los conceptos del Pack Inicial, podrás seguir el Avanzado sin problemas.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Cuánto dinero necesito para practicar Day Trading?
                    </button>
                    <div class="accordion-body">
                        <p>Para <strong>practicar</strong>: 0€. Todas las plataformas recomendadas (eToro, TradingView, Interactive Brokers) ofrecen <strong>cuentas demo</strong> con dinero virtual.</p>
                        <p class="mb-0">Para <strong>operar real</strong>: Se recomienda un mínimo de 1.000-2.000€. Con menos, las comisiones comen demasiada rentabilidad. Recuerda: nunca arriesgues más del 1% por operación.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Puedo perder dinero con Value Investing?
                    </button>
                    <div class="accordion-body">
                        <p>Sí. Aunque el Value Investing es una de las estrategias más seguras a largo plazo, <strong>ninguna estrategia es infalible</strong>. Empresas que parecían sólidas han quebrado (ej. Lehman Brothers). Por eso:</p>
                        <ul class="mb-0">
                            <li>Diversifica en mínimo 10-15 empresas de diferentes sectores</li>
                            <li>Nunca pongas más del 10% en una sola empresa</li>
                            <li>Mantén un horizonte mínimo de 3-5 años</li>
                            <li>Revisa tus posiciones trimestralmente, no diariamente</li>
                        </ul>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Cuándo se desbloquea el Pack Supremo?
                    </button>
                    <div class="accordion-body">
                        <p>El Pack Supremo se desbloquea automáticamente <strong>2 meses después</strong> de tu registro. Incluye mentoría 1:1, alertas VIP en tiempo real, análisis profundo y planificación fiscal avanzada.</p>
                        <div class="tip-box mb-0"><strong>Consejo:</strong> Aprovecha estas 2 semanas (Avanzado) y los 2 meses siguientes para asimilar todo el contenido. El Pack Supremo asume que dominas todo lo del Avanzado.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Tengo que pagar algo por los packs?
                    </button>
                    <div class="accordion-body">
                        <p class="mb-0"><strong>No.</strong> Todos los packs de GeN Trading son <strong>100% gratuitos</strong>. No hay costes ocultos, no hay suscripciones, no hay upsells. Nuestro modelo de negocio se basa en otros servicios. Tu única inversión es <strong>tu tiempo y dedicación</strong>.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN --}}
        <div class="d-flex justify-content-between align-items-center mt-4 pt-4 border-top">
            <a href="/mis-planes" class="btn btn-outline-secondary rounded-pill px-4"><i class="bi bi-arrow-left me-2"></i>Volver a los planes</a>
            <div class="text-muted small">Pack 2 de 3 · <span class="text-warning fw-bold">Desbloqueado</span></div>
        </div>

    </div>
    <script>
        // Función para acordeones personalizados (evita conflicto con Alpine.js)
        function toggleAccordion(button) {
            const item = button.parentElement;
            const body = button.nextElementSibling;
            const isOpen = body.classList.contains('show');
            
            // Cerrar todos los del mismo grupo (comportamiento acordeón)
            const parent = item.parentElement;
            parent.querySelectorAll('.accordion-body.show').forEach(openBody => {
                if (openBody !== body) {
                    openBody.classList.remove('show');
                    openBody.previousElementSibling.classList.remove('active');
                }
            });
            
            // Toggle actual
            if (isOpen) {
                body.classList.remove('show');
                button.classList.remove('active');
            } else {
                body.classList.add('show');
                button.classList.add('active');
            }
        }

        // Navegación de módulos
        function showModule(index) {
            document.querySelectorAll('.content-panel').forEach(panel => {
                panel.classList.remove('active');
            });
            document.querySelectorAll('.module-nav-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.getElementById('module-' + index).classList.add('active');
            document.querySelectorAll('.module-nav-btn')[index].classList.add('active');
        }
    </script>

<script>
(function() {
    const inicio = Date.now();
    const curso  = "avanzado";
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