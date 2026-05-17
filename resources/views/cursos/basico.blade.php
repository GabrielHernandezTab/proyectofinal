{{-- resources/views/packs/inicial.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">{{ __('Pack Inicial — Fundamentos de la Inversión') }}</h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root { --primary: #0ea5e9; --secondary: #06b6d4; --accent: #f59e0b; --dark: #0f172a; }
        .hero-inicial { background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 50%, #0891b2 100%); border-radius: 24px; padding: 4rem 2rem; color: white; margin-bottom: 3rem; position: relative; overflow: hidden; }
        .hero-inicial::before { content: ''; position: absolute; top: -50%; right: -20%; width: 600px; height: 600px; background: rgba(255,255,255,0.05); border-radius: 50%; }
        .stat-box { background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border-radius: 16px; padding: 1.25rem; text-align: center; border: 1px solid rgba(255,255,255,0.2); }
        .stat-box .num { font-size: 2.2rem; font-weight: 800; }
        .stat-box .label { font-size: 0.85rem; opacity: 0.9; }
        .timeline-container { position: relative; padding-left: 2rem; }
        .timeline-container::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; background: linear-gradient(to bottom, #0ea5e9, #06b6d4); border-radius: 3px; }
        .timeline-item { position: relative; margin-bottom: 2.5rem; padding-left: 1.5rem; }
        .timeline-item::before { content: ''; position: absolute; left: -2.35rem; top: 0.5rem; width: 16px; height: 16px; background: #0ea5e9; border-radius: 50%; border: 3px solid white; box-shadow: 0 0 0 3px #0ea5e9; }
        .timeline-card { background: white; border-radius: 16px; padding: 1.75rem; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border-left: 4px solid #0ea5e9; }
        .module-badge { display: inline-flex; align-items: center; gap: 6px; background: #e0f2fe; color: #0369a1; padding: 0.35rem 0.9rem; border-radius: 999px; font-size: 0.8rem; font-weight: 600; margin-bottom: 0.75rem; }
        .info-card { background: linear-gradient(135deg, #f0f9ff, #e0f2fe); border-radius: 16px; padding: 1.5rem; border: 1px solid #bae6fd; margin-bottom: 1.5rem; }
        .warning-box { background: #fffbeb; border-left: 4px solid #f59e0b; padding: 1rem 1.5rem; border-radius: 12px; margin: 1rem 0; }
        .success-box { background: #f0fdf4; border-left: 4px solid #22c55e; padding: 1rem 1.5rem; border-radius: 12px; margin: 1rem 0; }
        .app-card { background: white; border-radius: 16px; padding: 1.5rem; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #e2e8f0; transition: all 0.3s; }
        .app-card:hover { transform: translateY(-4px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
        .app-rating { display: flex; gap: 2px; color: #f59e0b; }
        .calc-container { background: linear-gradient(135deg, #0f172a, #1e293b); border-radius: 20px; padding: 2rem; color: white; }
        .calc-input { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 10px; padding: 0.75rem 1rem; color: white; width: 100%; }
        .calc-input:focus { outline: none; border-color: #0ea5e9; background: rgba(255,255,255,0.15); }
        .calc-result { background: rgba(255,255,255,0.1); border-radius: 12px; padding: 1.5rem; text-align: center; margin-top: 1rem; }
        .resource-tile { display: flex; align-items: center; gap: 1rem; padding: 1rem 1.25rem; background: #f8fafc; border-radius: 12px; text-decoration: none; color: #334155; transition: all 0.2s; border: 1px solid #e2e8f0; }
        .resource-tile:hover { background: #f1f5f9; color: #0ea5e9; border-color: #0ea5e9; }
        .progress-ring { width: 60px; height: 60px; }
        .data-table { width: 100%; border-collapse: separate; border-spacing: 0; }
        .data-table th { background: #f8fafc; padding: 0.875rem 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 2px solid #e2e8f0; }
        .data-table td { padding: 1rem; border-bottom: 1px solid #f1f5f9; color: #334155; }
        .data-table tr:hover td { background: #f8fafc; }
        .tag { display: inline-block; padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.75rem; font-weight: 600; }
        .tag-green { background: #dcfce7; color: #166534; }
        .tag-blue { background: #dbeafe; color: #1e40af; }
        .tag-orange { background: #ffedd5; color: #9a3412; }
        .comparison-bar { height: 8px; background: #e2e8f0; border-radius: 4px; overflow: hidden; margin-top: 0.5rem; }
        .comparison-fill { height: 100%; border-radius: 4px; transition: width 1s ease; }
        
        /* ACORDEÓN CUSTOM CORREGIDO */
        .accordion-custom { border: none; background: none; }
        .accordion-custom .accordion-item { border: none; margin-bottom: 0.75rem; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.04); background: white; }
        .accordion-custom .accordion-button { 
            background: #f8fafc; 
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
        .accordion-custom .accordion-button:hover { background: #e0f2fe; color: #0369a1; }
        .accordion-custom .accordion-button.active { background: #e0f2fe; color: #0369a1; box-shadow: none; }
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
        .accordion-custom .accordion-body.show { display: block; animation: fadeIn 0.3s ease; }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .highlight-number { font-size: 2.5rem; font-weight: 800; color: #0ea5e9; line-height: 1; }
    </style>

    <div class="container py-5">

        {{-- HERO --}}
        <div class="hero-inicial">
            <div class="row align-items-center position-relative">
                <div class="col-lg-7">
                    <span class="badge bg-warning text-dark mb-3 px-3 py-2"><i class="bi bi-unlock-fill me-2"></i>DESBLOQUEADO AL REGISTRARSE</span>
                    <h1 class="display-4 fw-bold mb-3">Pack Inicial</h1>
                    <p class="lead mb-4 opacity-90">Tu primer paso hacia la libertad financiera. Fundamentos sólidos, ejemplos reales y herramientas prácticas para empezar a invertir con confianza desde el día uno.</p>
                </div>
                <div class="col-lg-5 text-center mt-4 mt-lg-0">
                    <div class="position-relative">
                        <iframe width="100%" height="240" src="https://www.youtube.com/embed/r2e-Nf2Vemc" title="Introducción a la inversión" frameborder="0" class="rounded-4 shadow-lg" allowfullscreen></iframe>
                        <div class="mt-2 text-white-50 small"><i class="bi bi-play-circle me-1"></i> Curso Completo de Finanzas Personales — Adrián Saenz</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TIMELINE DE MÓDULOS --}}
        <div class="mb-5">
            <h3 class="fw-bold mb-4" style="color:#0369a1;"><i class="bi bi-signpost-split me-2"></i>Tu Ruta de Aprendizaje</h3>
            <div class="timeline-container">
                
                {{-- MÓDULO 1 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-1-circle-fill"></i> Módulo 1</span>
                        <h4 class="fw-bold mb-2">¿Qué es Invertir? La Diferencia entre Ahorrar e Invertir</h4>
                        <p class="text-muted mb-3">El 78% de los españoles no distingue entre ahorro e inversión. Aprende por qué guardar dinero en el banco te hace más pobre cada año.</p>
                        
                        <div class="info-card">
                            <h6 class="fw-bold text-primary mb-2"><i class="bi bi-lightbulb me-2"></i>El Enemigo Invisible: La Inflación</h6>
                            <p class="small mb-2">La inflación media en España (2014-2024): <strong>2.3% anual</strong>. Con una tasa de interés del 0.5% en una cuenta de ahorro, pierdes poder adquisitivo.</p>
                            <div class="row g-2 mt-2">
                                <div class="col-md-4 text-center p-2 bg-white rounded">
                                    <div class="highlight-number">10.000€</div>
                                    <small class="text-muted">Hoy</small>
                                </div>
                                <div class="col-md-4 text-center p-2 bg-white rounded">
                                    <div class="highlight-number text-danger">7.400€</div>
                                    <small class="text-muted">Valor real en 10 años</small>
                                </div>
                                <div class="col-md-4 text-center p-2 bg-white rounded">
                                    <div class="highlight-number text-success">21.589€</div>
                                    <small class="text-muted">Invertido al 8% anual</small>
                                </div>
                            </div>
                        </div>

                        <div class="warning-box">
                            <strong><i class="bi bi-exclamation-triangle me-2"></i>Dato clave:</strong> El BCE tiene como objetivo mantener la inflación cerca del 2%. Si tu dinero no crece al menos eso, estás perdiendo.
                        </div>

                        <h6 class="fw-bold mt-3 mb-2">Conceptos Fundamentales:</h6>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-2 p-2">
                                    <i class="bi bi-cash-stack text-primary fs-4"></i>
                                    <div>
                                        <strong class="small d-block">Ahorro</strong>
                                        <small class="text-muted">Conservar capital con rentabilidad baja o nula. Objetivo: liquidez inmediata.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-2 p-2">
                                    <i class="bi bi-graph-up-arrow text-success fs-4"></i>
                                    <div>
                                        <strong class="small d-block">Inversión</strong>
                                        <small class="text-muted">Asumir riesgo calculado para obtener rentabilidad superior a la inflación.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MÓDULO 2 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-2-circle-fill"></i> Módulo 2</span>
                        <h4 class="fw-bold mb-2">Composición del Curso Completo — Tu Mapa de Ruta</h4>
                        <p class="text-muted mb-3">Entiende cómo están estructurados nuestros packs y qué aprenderás en cada etapa de tu formación.</p>
                        
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Pack</th>
                                        <th>Desbloqueo</th>
                                        <th>Contenido</th>
                                        <th>Nivel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="tag tag-blue">Inicial</span></td>
                                        <td><i class="bi bi-unlock-fill text-success me-1"></i> Al registrarte</td>
                                        <td>Fundamentos básicos</td>
                                        <td>Principiante</td>
                                    </tr>
                                    <tr>
                                        <td><span class="tag tag-orange">Avanzado</span></td>
                                        <td><i class="bi bi-clock me-1"></i> 2 semanas</td>
                                        <td>Temario avanzado</td>
                                        <td>Intermedio</td>
                                    </tr>
                                    <tr>
                                        <td><span class="tag tag-green">Supremo</span></td>
                                        <td><i class="bi bi-clock me-1"></i> 2 meses</td>
                                        <td>Mentorías personalizadas</td>
                                        <td>Profesional</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="success-box mt-3">
                            <strong><i class="bi bi-info-circle me-2"></i>Progresión inteligente:</strong> Los packs se desbloquean automáticamente. No necesitas pagar nada. Tu dedicación y constancia son la única "moneda" que necesitas.
                        </div>
                    </div>
                </div>

                {{-- MÓDULO 3 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-3-circle-fill"></i> Módulo 3</span>
                        <h4 class="fw-bold mb-2">Ejemplos de Inversión Segura con Poco Capital</h4>
                        <p class="text-muted mb-3">Empieza desde 1€. Aquí tienes estrategias reales probadas para pequeños ahorradores.</p>

                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center p-3">
                                        <i class="bi bi-piggy-bank fs-1 text-primary mb-2"></i>
                                        <h6 class="fw-bold">Plan de Ahorro Sistemático</h6>
                                        <p class="small text-muted mb-2">50€/mes en ETF MSCI World</p>
                                        <div class="bg-light rounded p-2">
                                            <small class="text-success fw-bold">+8.2% anual histórico</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center p-3">
                                        <i class="bi bi-bank fs-1 text-success mb-2"></i>
                                        <h6 class="fw-bold">Letras del Tesoro</h6>
                                        <p class="small text-muted mb-2">100€ mínimo · Renta fija</p>
                                        <div class="bg-light rounded p-2">
                                            <small class="text-success fw-bold">~3.5% anual (2026)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center p-3">
                                        <i class="bi bi-coin fs-1 text-warning mb-2"></i>
                                        <h6 class="fw-bold">Fondos Indexados</h6>
                                        <p class="small text-muted mb-2">Indexa Capital desde 1€</p>
                                        <div class="bg-light rounded p-2">
                                            <small class="text-success fw-bold">Diversificación automática</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="info-card">
                            <h6 class="fw-bold text-primary mb-2"><i class="bi bi-calculator me-2"></i>Caso Real: María, 28 años, auxiliar administrativa</h6>
                            <p class="small mb-2">María invierte <strong>75€/mes</strong> desde hace 5 años en un ETF que replica el MSCI World:</p>
                            <div class="row text-center g-2">
                                <div class="col-4"><div class="bg-white rounded p-2"><div class="fw-bold text-primary">4.500€</div><small class="text-muted">Aportado</small></div></div>
                                <div class="col-4"><div class="bg-white rounded p-2"><div class="fw-bold text-success">+1.847€</div><small class="text-muted">Rentabilidad</small></div></div>
                                <div class="col-4"><div class="bg-white rounded p-2"><div class="fw-bold text-dark">6.347€</div><small class="text-muted">Total actual</small></div></div>
                            </div>
                            <small class="text-muted d-block mt-2"><i class="bi bi-info-circle me-1"></i> Datos basados en rentabilidad media del MSCI World últimos 5 años: 10.7% anualizado.</small>
                        </div>
                    </div>
                </div>

                {{-- MÓDULO 4 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-4-circle-fill"></i> Módulo 4</span>
                        <h4 class="fw-bold mb-2">Introducción Ampliada sobre Inversiones</h4>
                        <p class="text-muted mb-3">Los mercados financieros explicados como si tuvieras 10 años. Sin jerga, sin complicaciones.</p>

                        <div class="accordion-custom" id="accordionIntro">
                            <div class="accordion-item">
                                <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                                    ¿Qué es un Mercado Financiero?
                                </button>
                                <div class="accordion-body">
                                    <p>Un mercado financiero es un espacio (físico o digital) donde se intercambian activos financieros: acciones, bonos, divisas, materias primas... Es como un mercado de frutas, pero en lugar de manzanas, se compran y venden "pedacitos" de empresas.</p>
                                    <div class="row g-2 mt-2">
                                        <div class="col-md-6"><div class="p-2 bg-light rounded"><strong>Bolsa de Valores</strong><br><small class="text-muted">Donde se negocian acciones públicas</small></div></div>
                                        <div class="col-md-6"><div class="p-2 bg-light rounded"><strong>Mercado Forex</strong><br><small class="text-muted">Intercambio de divisas (5.3 billones $/día)</small></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                                    ¿Qué es una Acción?
                                </button>
                                <div class="accordion-body">
                                    <p>Comprar una acción es convertirte en propietario de una pequeña parte de una empresa. Si Apple tiene 15.000 millones de acciones y tú compras 1, posees 1/15.000.000.000 de Apple.</p>
                                    <div class="warning-box mb-0"><strong>Ejemplo práctico:</strong> Si compraste 10 acciones de Apple en 2010 a 10$ (100$ total), hoy valdrían ~2.000$. Tu inversión se multiplicó por 20.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                                    ¿Qué es un Bono?
                                </button>
                                <div class="accordion-body">
                                    <p>Un bono es un préstamo que le haces a una empresa o gobierno. A cambio, te pagan intereses periódicos (cupones) y al final te devuelven el capital.</p>
                                    <ul class="small list-unstyled mb-0">
                                        <li><i class="bi bi-check2 text-success me-2"></i><strong>Bonos corporativos:</strong> Empresas como Telefónica o Repsol</li>
                                        <li><i class="bi bi-check2 text-success me-2"></i><strong>Bonos soberanos:</strong> Gobiernos (España, Alemania, USA)</li>
                                        <li><i class="bi bi-check2 text-success me-2"></i><strong>Letras del Tesoro:</strong> A corto plazo (3, 6, 12 meses)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MÓDULO 5 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-5-circle-fill"></i> Módulo 5</span>
                        <h4 class="fw-bold mb-2">Conceptos Clave: ¿Qué Influye? ¿Por qué Hay Tanto Mercado?</h4>
                        <p class="text-muted mb-3">Factores macroeconómicos, psicológicos y geopolíticos que mueven los precios.</p>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary mb-2"><i class="bi bi-globe me-2"></i>Factores Macro</h6>
                                <ul class="list-unstyled small">
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-bank text-primary"></i><div><strong>Tipos de interés:</strong> Suben → la deuda es más cara → menos inversión</div></li>
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-graph-up text-primary"></i><div><strong>PIB:</strong> Crecimiento económico = más beneficios empresariales</div></li>
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-cash-coin text-primary"></i><div><strong>Inflación:</strong> Alta inflación = menores beneficios reales</div></li>
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-people text-primary"></i><div><strong>Desempleo:</strong> Menor consumo = menor facturación empresas</div></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary mb-2"><i class="bi bi-brain me-2"></i>Psicología del Mercado</h6>
                                <ul class="list-unstyled small">
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-emoji-smile text-success"></i><div><strong>Euforia:</strong> Todo el mundo compra → burbujas (ej. 2000, 2021)</div></li>
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-emoji-frown text-danger"></i><div><strong>Pánico:</strong> Todo el mundo vende → caídas excesivas</div></li>
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-arrow-repeat text-warning"></i><div><strong>Ciclos:</strong> Expansión → Pico → Recesión → Recuperación</div></li>
                                </ul>
                            </div>
                        </div>

                        <div class="info-card mt-3">
                            <h6 class="fw-bold text-primary mb-2"><i class="bi bi-geo-alt me-2"></i>Principales Bolsas del Mundo</h6>
                            <div class="row text-center g-2">
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2"><div class="fw-bold">NYSE</div><small class="text-muted">Nueva York</small><div class="comparison-bar"><div class="comparison-fill bg-primary" style="width:100%"></div></div><small class="text-muted">~25 billones $</small></div></div>
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2"><div class="fw-bold">NASDAQ</div><small class="text-muted">Tecnología USA</small><div class="comparison-bar"><div class="comparison-fill bg-info" style="width:85%"></div></div><small class="text-muted">~21 billones $</small></div></div>
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2"><div class="fw-bold">Tokio</div><small class="text-muted">Japón</small><div class="comparison-bar"><div class="comparison-fill bg-success" style="width:60%"></div></div><small class="text-muted">~6 billones $</small></div></div>
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2"><div class="fw-bold">Euronext</div><small class="text-muted">Europa</small><div class="comparison-bar"><div class="comparison-fill bg-warning" style="width:45%"></div></div><small class="text-muted">~5 billones $</small></div></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MÓDULO 6 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-6-circle-fill"></i> Módulo 6</span>
                        <h4 class="fw-bold mb-2">Introducción Básica a Aplicaciones de Inversión</h4>
                        <p class="text-muted mb-3">Las mejores plataformas para empezar en España en 2026. Análisis detallado, comisiones y facilidad de uso.</p>

                        <div class="row g-3">
                            <div class="col-md-6 col-lg-4">
                                <div class="app-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;"><i class="bi bi-bank"></i></div>
                                        <div>
                                            <h6 class="fw-bold mb-0">Trade Republic</h6>
                                            <div class="app-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><small class="text-muted ms-1">4.4</small></div>
                                        </div>
                                    </div>
                                    <p class="small text-muted mb-2">Neobanco alemán. Comisión fija 1€ por operación. Ideal para principiantes.</p>
                                    <div class="d-flex gap-1 flex-wrap">
                                        <span class="tag tag-green">Desde 1€</span>
                                        <span class="tag tag-blue">App intuitiva</span>
                                    </div>
                                    <a href="https://traderepublic.com/es-es" target="_blank" class="btn btn-outline-primary btn-sm w-100 mt-2 rounded-pill">Visitar web <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="app-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;"><i class="bi bi-shield-check"></i></div>
                                        <div>
                                            <h6 class="fw-bold mb-0">DEGIRO</h6>
                                            <div class="app-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><small class="text-muted ms-1">4.1</small></div>
                                        </div>
                                    </div>
                                    <p class="small text-muted mb-2">Bróker holandés registrado CNMV. ETFs sin comisión en algunos casos. Más de 50 mercados.</p>
                                    <div class="d-flex gap-1 flex-wrap">
                                        <span class="tag tag-green">CNMV</span>
                                        <span class="tag tag-blue">50+ mercados</span>
                                    </div>
                                    <a href="https://www.degiro.es" target="_blank" class="btn btn-outline-success btn-sm w-100 mt-2 rounded-pill">Visitar web <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="app-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;"><i class="bi bi-robot"></i></div>
                                        <div>
                                            <h6 class="fw-bold mb-0">Indexa Capital</h6>
                                            <div class="app-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><small class="text-muted ms-1">4.7</small></div>
                                        </div>
                                    </div>
                                    <p class="small text-muted mb-2">Robo-advisor español. Gestión automática de carteras indexadas. Desde 1€.</p>
                                    <div class="d-flex gap-1 flex-wrap">
                                        <span class="tag tag-green">Automático</span>
                                        <span class="tag tag-blue">España</span>
                                    </div>
                                    <a href="https://indexacapital.com" target="_blank" class="btn btn-outline-info btn-sm w-100 mt-2 rounded-pill">Visitar web <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="warning-box mt-3">
                            <strong><i class="bi bi-shield-exclamation me-2"></i>Seguridad primero:</strong> Verifica siempre que el bróker esté registrado en la <strong>CNMV</strong> (Comisión Nacional del Mercado de Valores). Nunca inviertas en plataformas no reguladas. Consulta el registro en <a href="https://www.cnmv.es" target="_blank" class="text-decoration-underline">cnmv.es</a>
                        </div>

                        <h6 class="fw-bold mt-3 mb-2">Comparativa de Comisiones (2026):</h6>
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Plataforma</th><th>Comisión compra</th><th>Comisión venta</th><th>Custodia</th><th>Divisas</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>Trade Republic</strong></td><td>1€</td><td>1€</td><td>0€</td><td>0€</td></tr>
                                    <tr><td><strong>DEGIRO</strong></td><td>Desde 0€ (ETFs)</td><td>Desde 0€ (ETFs)</td><td>0€</td><td>0.25%</td></tr>
                                    <tr><td><strong>Indexa Capital</strong></td><td>0.44%-0.89% anual</td><td>Incluido</td><td>Incluido</td><td>Incluido</td></tr>
                                    <tr><td><strong>Interactive Brokers</strong></td><td>Desde 0.0035$/acción</td><td>Desde 0.0035$/acción</td><td>0€</td><td>0.002%</td></tr>
                                    <tr><td><strong>Renta 4</strong></td><td>2€ (nacional)</td><td>2€ (nacional)</td><td>0€</td><td>No aplica</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- MÓDULO 7 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-7-circle-fill"></i> Módulo 7</span>
                        <h4 class="fw-bold mb-2">Iniciación a Inversiones con Bajo Riesgo</h4>
                        <p class="text-muted mb-3">Estrategias conservadoras para proteger tu capital mientras aprendes.</p>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-success"><i class="bi bi-shield-check me-2"></i>Cartera Conservadora Modelo</h6>
                                        <p class="small text-muted mb-2">Para perfiles muy conservadores que buscan preservar capital:</p>
                                        <div class="progress mb-2" style="height: 24px;">
                                            <div class="progress-bar bg-success" style="width: 60%">Bonos 60%</div>
                                            <div class="progress-bar bg-primary" style="width: 30%">ETFs 30%</div>
                                            <div class="progress-bar bg-warning" style="width: 10%">Liquidez 10%</div>
                                        </div>
                                        <small class="text-muted">Rentabilidad esperada: 3-5% anual · Riesgo: Bajo</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-primary"><i class="bi bi-balance-scale me-2"></i>Cartera Moderada Modelo</h6>
                                        <p class="small text-muted mb-2">Balance entre seguridad y crecimiento:</p>
                                        <div class="progress mb-2" style="height: 24px;">
                                            <div class="progress-bar bg-primary" style="width: 60%">ETFs/Acciones 60%</div>
                                            <div class="progress-bar bg-success" style="width: 30%">Bonos 30%</div>
                                            <div class="progress-bar bg-warning" style="width: 10%">Liquidez 10%</div>
                                        </div>
                                        <small class="text-muted">Rentabilidad esperada: 5-7% anual · Riesgo: Medio</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="success-box">
                            <h6 class="fw-bold mb-2"><i class="bi bi-graph-up-arrow me-2"></i>El Poder del Interés Compuesto</h6>
                            <p class="small mb-2">Invirtiendo <strong>100€/mes</strong> a una rentabilidad media del <strong>7% anual</strong>:</p>
                            <div class="row text-center g-2">
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">5 años</div><div class="text-success fw-bold">7.340€</div><small class="text-muted">1.340€ ganancia</small></div></div>
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">10 años</div><div class="text-success fw-bold">17.308€</div><small class="text-muted">5.308€ ganancia</small></div></div>
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">20 años</div><div class="text-success fw-bold">52.093€</div><small class="text-muted">28.093€ ganancia</small></div></div>
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">30 años</div><div class="text-success fw-bold">121.997€</div><small class="text-muted">85.997€ ganancia</small></div></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MÓDULO 8 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-8-circle-fill"></i> Módulo 8</span>
                        <h4 class="fw-bold mb-2">Calculadora de Interés Compuesto</h4>
                        <p class="text-muted mb-3">Simula tu futuro financiero. Ajusta los valores y descubre el potencial de tus ahorros.</p>

                        <div class="calc-container">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="small mb-1 opacity-75">Aportación mensual (€)</label>
                                    <input type="number" id="monthlyInput" class="calc-input" value="100" min="1">
                                </div>
                                <div class="col-md-4">
                                    <label class="small mb-1 opacity-75">Rentabilidad anual (%)</label>
                                    <input type="number" id="rateInput" class="calc-input" value="7" min="1" max="30" step="0.5">
                                </div>
                                <div class="col-md-4">
                                    <label class="small mb-1 opacity-75">Años de inversión</label>
                                    <input type="number" id="yearsInput" class="calc-input" value="20" min="1" max="50">
                                </div>
                            </div>
                            <div class="calc-result">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="small opacity-75 mb-1">Capital aportado</div>
                                        <div class="fs-4 fw-bold" id="totalInvested">24.000€</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="small opacity-75 mb-1">Ganancias por interés</div>
                                        <div class="fs-4 fw-bold text-success" id="totalInterest">28.093€</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="small opacity-75 mb-1">Capital total</div>
                                        <div class="fs-4 fw-bold text-warning" id="totalAmount">52.093€</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <small class="opacity-75"><i class="bi bi-info-circle me-1"></i> Los resultados son orientativos basados en rentabilidades históricas. Las inversiones conllevan riesgo.</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- RECURSOS GRATUITOS --}}
        <div class="card shadow border-0 p-4 mb-5">
            <h4 class="fw-bold mb-4" style="color:#0369a1;"><i class="bi bi-bookmarks me-2"></i>Recursos Externos Recomendados</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <a href="https://www.investopedia.com" target="_blank" class="resource-tile">
                        <i class="bi bi-globe2 fs-4 text-primary"></i>
                        <div>
                            <strong>Investopedia</strong>
                            <small class="d-block text-muted">La Wikipedia de las finanzas. Definiciones, guías y simuladores en inglés.</small>
                        </div>
                    </a>
                    <a href="https://cincodias.elpais.com" target="_blank" class="resource-tile">
                        <i class="bi bi-newspaper fs-4 text-danger"></i>
                        <div>
                            <strong>Cinco Días</strong>
                            <small class="d-block text-muted">Noticias económicas y de mercados en español. El País.</small>
                        </div>
                    </a>
                    <a href="https://www.bogleheads.org/wiki/Main_Page" target="_blank" class="resource-tile">
                        <i class="bi bi-book fs-4 text-success"></i>
                        <div>
                            <strong>Bogleheads Wiki</strong>
                            <small class="d-block text-muted">Filosofía de inversión pasiva a largo plazo. Comunidad de seguidores de Jack Bogle.</small>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="https://finance.yahoo.com" target="_blank" class="resource-tile">
                        <i class="bi bi-bar-chart-line fs-4 text-primary"></i>
                        <div>
                            <strong>Yahoo Finance</strong>
                            <small class="d-block text-muted">Seguimiento de precios, gráficos y noticias de mercados globales.</small>
                        </div>
                    </a>
                    <a href="https://www.tesoro.es" target="_blank" class="resource-tile">
                        <i class="bi bi-bank fs-4 text-success"></i>
                        <div>
                            <strong>Tesoro Público España</strong>
                            <small class="d-block text-muted">Información oficial sobre Letras del Tesoro y bonos del Estado.</small>
                        </div>
                    </a>
                    <a href="https://curvo.eu/backtest" target="_blank" class="resource-tile">
                        <i class="bi bi-calculator fs-4 text-info"></i>
                        <div>
                            <strong>Curvo Backtest</strong>
                            <small class="d-block text-muted">Simulador histórico de carteras con datos reales del MSCI World.</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- FAQ --}}
        <div class="mb-5">
            <h4 class="fw-bold mb-4" style="color:#0369a1;"><i class="bi bi-question-circle me-2"></i>Preguntas Frecuentes</h4>
            <div class="accordion-custom" id="faqAccordion">
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Con cuánto dinero puedo empezar?
                    </button>
                    <div class="accordion-body">
                        <p>Puedes empezar con tan solo <strong>1€</strong> en plataformas como Trade Republic o Indexa Capital. Lo importante no es la cantidad inicial sino la <strong>constancia</strong>. Con 50-100€/mes invertidos de forma regular durante años se construyen patrimonios sólidos.</p>
                        <div class="success-box mb-0"><strong>Ejemplo:</strong> 50€/mes a 7% anual = 12.920€ en 10 años (6.000€ aportados + 6.920€ ganancia).</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Es seguro invertir? ¿Puedo perder todo?
                    </button>
                    <div class="accordion-body">
                        <p>Toda inversión conlleva riesgo, pero se gestiona. Invirtiendo en un ETF global diversificado nunca has perdido dinero en cualquier período de <strong>15+ años</strong> históricamente. La clave: diversificar, largo plazo, no vender en pánico.</p>
                        <div class="warning-box mb-0"><strong>Regla de oro:</strong> Nunca inviertas dinero que puedas necesitar en los próximos 3-5 años.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Qué es un ETF y por qué se recomienda?
                    </button>
                    <div class="accordion-body">
                        <p>Un ETF (Exchange Traded Fund) agrupa cientos de acciones en un solo producto. El ETF del S&P 500 te da exposición a las 500 empresas más grandes de EE.UU. con una sola compra. Son baratos (comisiones desde 0.03% anual), diversificados y muy fáciles de comprar.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Cómo se desbloquea el Pack Avanzado?
                    </button>
                    <div class="accordion-body">
                        <p>El Pack Avanzado se desbloquea automáticamente <strong>2 semanas después</strong> de tu registro. Recibirás una notificación por email. No requiere pago ni acción adicional por tu parte.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN --}}
        <div class="d-flex justify-content-between align-items-center mt-4 pt-4 border-top">
            <a href="/mis-planes" class="btn btn-outline-secondary rounded-pill px-4"><i class="bi bi-arrow-left me-2"></i>Volver a los planes</a>
            <div class="text-muted small">Pack 1 de 3 · <span class="text-success fw-bold">Desbloqueado</span></div>
        </div>

    </div>

    <script>
        // Función para acordeones personalizados (evita conflicto con Alpine.js)
        function toggleAccordion(button) {
            const item = button.parentElement;
            const body = button.nextElementSibling;
            const isOpen = body.classList.contains('show');
            
            // Cerrar todos los del mismo grupo (opcional - quitar si quieres múltiples abiertos)
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

        // Calculadora de interés compuesto
        function calculateCompound() {
            const monthly = parseFloat(document.getElementById('monthlyInput').value) || 0;
            const rate = parseFloat(document.getElementById('rateInput').value) || 0;
            const years = parseFloat(document.getElementById('yearsInput').value) || 0;
            
            const monthlyRate = rate / 100 / 12;
            const months = years * 12;
            const totalInvested = monthly * months;
            const totalAmount = monthly * ((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * (1 + monthlyRate);
            const totalInterest = totalAmount - totalInvested;
            
            document.getElementById('totalInvested').textContent = totalInvested.toLocaleString('es-ES', {maximumFractionDigits: 0}) + '€';
            document.getElementById('totalInterest').textContent = totalInterest.toLocaleString('es-ES', {maximumFractionDigits: 0}) + '€';
            document.getElementById('totalAmount').textContent = totalAmount.toLocaleString('es-ES', {maximumFractionDigits: 0}) + '€';
        }
        
        ['monthlyInput', 'rateInput', 'yearsInput'].forEach(id => {
            document.getElementById(id).addEventListener('input', calculateCompound);
        });
        calculateCompound();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
(function() {
    const inicio = Date.now();
    const curso  = "basico";
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
{{-- BOTÓN VOLVER ARRIBA --}}
<button id="btn-arriba" onclick="window.scrollTo({top:0,behavior:'smooth'})"
    title="Volver arriba"
    style="
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: none;
        background: linear-gradient(135deg, #0369a1, #0ea5e9);
        color: white;
        font-size: 1.3rem;
        box-shadow: 0 4px 15px rgba(3,105,161,0.4);
        cursor: pointer;
        display: none;
        z-index: 9999;
        transition: all 0.3s ease;
    "
    onmouseover="this.style.transform='scale(1.1)'"
    onmouseout="this.style.transform='scale(1)'">
    <i class="bi bi-arrow-up"></i>
</button>

<script>
window.addEventListener('scroll', function() {
    document.getElementById('btn-arriba').style.display = window.scrollY > 400 ? 'flex' : 'none';
    document.getElementById('btn-arriba').style.alignItems = 'center';
    document.getElementById('btn-arriba').style.justifyContent = 'center';
});
</script>
</x-app-layout>