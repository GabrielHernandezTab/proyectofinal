{{-- resources/views/packs/inicial.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">{{ __('Pack Inicial — Fundamentos de la Inversión') }}</h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root { --primary: #0ea5e9; --secondary: #06b6d4; --accent: #f59e0b; --dark: #0f172a; }

        .hero-inicial { 
            background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 50%, #0891b2 100%); 
            border-radius: 20px; 
            padding: 3.5rem 2rem; 
            color: white; 
            margin-bottom: 3rem; 
            position: relative; 
            overflow: hidden; 
        }
        .hero-inicial::before { 
            content: ''; 
            position: absolute; 
            top: -50%; 
            right: -20%; 
            width: 500px; 
            height: 500px; 
            background: rgba(255,255,255,0.05); 
            border-radius: 50%; 
        }

        .timeline-container { position: relative; padding-left: 2rem; }
        .timeline-container::before { 
            content: ''; 
            position: absolute; 
            left: 0; 
            top: 0; 
            bottom: 0; 
            width: 3px; 
            background: linear-gradient(to bottom, #0ea5e9, #06b6d4); 
            border-radius: 3px; 
        }
        .timeline-item { position: relative; margin-bottom: 2.5rem; padding-left: 1.5rem; }
        .timeline-item::before { 
            content: ''; 
            position: absolute; 
            left: -2.35rem; 
            top: 0.5rem; 
            width: 16px; 
            height: 16px; 
            background: #0ea5e9; 
            border-radius: 50%; 
            border: 3px solid white; 
            box-shadow: 0 0 0 3px #0ea5e9; 
        }
        .timeline-card { 
            background: white; 
            border-radius: 14px; 
            padding: 1.75rem; 
            box-shadow: 0 2px 12px rgba(0,0,0,0.06); 
            border-left: 4px solid #0ea5e9; 
        }

        .module-badge { 
            display: inline-flex; 
            align-items: center; 
            gap: 6px; 
            background: #e0f2fe; 
            color: #0369a1; 
            padding: 0.3rem 0.8rem; 
            border-radius: 999px; 
            font-size: 0.8rem; 
            font-weight: 600; 
            margin-bottom: 0.75rem; 
        }

        .info-card { 
            background: #f8fafc; 
            border-radius: 12px; 
            padding: 1.25rem; 
            border: 1px solid #e2e8f0; 
            margin-bottom: 1.25rem; 
        }

        .warning-box { 
            background: #fffbeb; 
            border-left: 4px solid #f59e0b; 
            padding: 1rem 1.25rem; 
            border-radius: 8px; 
            margin: 1rem 0; 
        }

        .success-box { 
            background: #f0fdf4; 
            border-left: 4px solid #22c55e; 
            padding: 1rem 1.25rem; 
            border-radius: 8px; 
            margin: 1rem 0; 
        }

        .app-card { 
            background: white; 
            border-radius: 14px; 
            padding: 1.25rem; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.05); 
            border: 1px solid #e2e8f0; 
            transition: transform 0.2s; 
        }
        .app-card:hover { transform: translateY(-3px); }

        .calc-container { 
            background: #1e293b; 
            border-radius: 16px; 
            padding: 1.75rem; 
            color: white; 
        }
        .calc-input { 
            background: rgba(255,255,255,0.08); 
            border: 1px solid rgba(255,255,255,0.15); 
            border-radius: 8px; 
            padding: 0.65rem 1rem; 
            color: white; 
            width: 100%; 
        }
        .calc-input:focus { 
            outline: none; 
            border-color: #0ea5e9; 
            background: rgba(255,255,255,0.12); 
        }
        .calc-result { 
            background: rgba(255,255,255,0.06); 
            border-radius: 10px; 
            padding: 1.25rem; 
            text-align: center; 
            margin-top: 1rem; 
        }

        .resource-tile { 
            display: flex; 
            align-items: center; 
            gap: 1rem; 
            padding: 0.9rem 1.1rem; 
            background: #f8fafc; 
            border-radius: 10px; 
            text-decoration: none; 
            color: #334155; 
            transition: all 0.2s; 
            border: 1px solid #e2e8f0; 
            margin-bottom: 0.75rem;
        }
        .resource-tile:hover { 
            background: #f1f5f9; 
            color: #0ea5e9; 
            border-color: #0ea5e9; 
        }

        .data-table { width: 100%; border-collapse: separate; border-spacing: 0; }
        .data-table th { 
            background: #f8fafc; 
            padding: 0.75rem 1rem; 
            text-align: left; 
            font-weight: 600; 
            color: #475569; 
            font-size: 0.8rem; 
            text-transform: uppercase; 
            letter-spacing: 0.03em; 
            border-bottom: 2px solid #e2e8f0; 
        }
        .data-table td { 
            padding: 0.875rem 1rem; 
            border-bottom: 1px solid #f1f5f9; 
            color: #334155; 
        }
        .data-table tr:hover td { background: #f8fafc; }

        .tag { 
            display: inline-block; 
            padding: 0.2rem 0.6rem; 
            border-radius: 999px; 
            font-size: 0.72rem; 
            font-weight: 600; 
        }
        .tag-green { background: #dcfce7; color: #166534; }
        .tag-blue { background: #dbeafe; color: #1e40af; }
        .tag-orange { background: #ffedd5; color: #9a3412; }

        .comparison-bar { height: 6px; background: #e2e8f0; border-radius: 3px; overflow: hidden; margin-top: 0.4rem; }
        .comparison-fill { height: 100%; border-radius: 3px; }

        .accordion-custom { border: none; background: none; }
        .accordion-custom .accordion-item { 
            border: none; 
            margin-bottom: 0.6rem; 
            border-radius: 10px; 
            overflow: hidden; 
            box-shadow: 0 1px 4px rgba(0,0,0,0.04); 
            background: white; 
        }
        .accordion-custom .accordion-button { 
            background: #f8fafc; 
            padding: 1rem 1.25rem; 
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
        .accordion-custom .accordion-button.active { background: #e0f2fe; color: #0369a1; }
        .accordion-custom .accordion-button::after { 
            content: '\F282'; 
            font-family: 'bootstrap-icons'; 
            font-size: 1.1rem;
            transition: transform 0.3s ease;
            margin-left: auto;
        }
        .accordion-custom .accordion-button.active::after { transform: rotate(180deg); }
        .accordion-custom .accordion-body { 
            background: white; 
            padding: 1.25rem; 
            display: none;
            border-top: 1px solid #f1f5f9;
        }
        .accordion-custom .accordion-body.show { display: block; animation: fadeIn 0.3s ease; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .highlight-number { font-size: 2rem; font-weight: 700; color: #0ea5e9; line-height: 1; }

        .section-title { 
            font-weight: 700; 
            color: #0369a1; 
            margin-bottom: 1.5rem; 
            font-size: 1.4rem;
        }
    </style>

    <div class="container py-5">

        {{-- HERO --}}
        <div class="hero-inicial">
            <div class="row align-items-center position-relative">
                <div class="col-lg-7">
                    <h1 class="display-5 fw-bold mb-3">Pack Inicial</h1>
                    <p class="lead mb-4 opacity-90">Aquí empieza todo. Sin rodeos, sin tecnicismos absurdos. Te explico cómo funciona esto de invertir para que empieces con buen pie desde el primer día.</p>
                </div>
                <div class="col-lg-5 text-center mt-4 mt-lg-0">
                    <div class="position-relative">
                        <iframe width="100%" height="220" src="https://www.youtube.com/embed/r2e-Nf2Vemc" title="Introducción a la inversión" frameborder="0" class="rounded-4 shadow" allowfullscreen></iframe>
                        <div class="mt-2 text-white-50 small">Curso Completo de Finanzas Personales — Adrián Saenz</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TIMELINE DE MÓDULOS --}}
        <div class="mb-5">
            <h3 class="section-title">Tu Ruta de Aprendizaje</h3>
            <div class="timeline-container">

                {{-- MÓDULO 1 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-1-circle-fill"></i> Módulo 1</span>
                        <h4 class="fw-bold mb-2">¿Qué es Invertir? La Diferencia entre Ahorrar e Invertir</h4>
                        <p class="text-muted mb-3">La mayoría de la gente no distingue entre ahorro e inversión. Y eso les cuesta caro. Guardar dinero en el banco a un 0.5% mientras la inflación come tu poder adquisitivo no es plan.</p>

                        <div class="info-card">
                            <h6 class="fw-bold text-primary mb-2">La Inflación: Tu Enemigo Silencioso</h6>
                            <p class="small mb-2">En España la inflación media ronda el <strong>2.3% anual</strong>. Si tu banco te da un 0.5%, estás perdiendo dinero sin darte cuenta.</p>
                            <div class="row g-2 mt-2">
                                <div class="col-md-4 text-center p-2 bg-white rounded border">
                                    <div class="highlight-number">10.000€</div>
                                    <small class="text-muted">Hoy</small>
                                </div>
                                <div class="col-md-4 text-center p-2 bg-white rounded border">
                                    <div class="highlight-number text-danger">7.400€</div>
                                    <small class="text-muted">Valor real en 10 años</small>
                                </div>
                                <div class="col-md-4 text-center p-2 bg-white rounded border">
                                    <div class="highlight-number text-success">21.589€</div>
                                    <small class="text-muted">Invertido al 8% anual</small>
                                </div>
                            </div>
                        </div>

                        <div class="warning-box">
                            <strong>Dato clave:</strong> El BCE tiene como objetivo mantener la inflación cerca del 2%. Si tu dinero no crece al menos eso, estás perdiendo poder adquisitivo año tras año.
                        </div>

                        <h6 class="fw-bold mt-3 mb-2">Conceptos básicos que hay que tener claros:</h6>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-2 p-2">
                                    <i class="bi bi-cash-stack text-primary fs-4"></i>
                                    <div>
                                        <strong class="small d-block">Ahorro</strong>
                                        <small class="text-muted">Conservar capital con rentabilidad baja. Útil para emergencias, no para hacer crecer tu dinero.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-2 p-2">
                                    <i class="bi bi-graph-up-arrow text-success fs-4"></i>
                                    <div>
                                        <strong class="small d-block">Inversión</strong>
                                        <small class="text-muted">Asumir riesgo calculado para obtener rentabilidad superior a la inflación. Eso es lo que buscamos.</small>
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
                        <h4 class="fw-bold mb-2">Cómo está Estructurado el Curso</h4>
                        <p class="text-muted mb-3">Tres packs que se van desbloqueando automáticamente. No tienes que pagar nada extra, solo dedicarle tiempo.</p>

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
                            <strong>Progresión automática:</strong> Los packs se desbloquean solos. Tu única "moneda" es la constancia. No hace falta desembolsar más dinero.
                        </div>
                    </div>
                </div>

                {{-- MÓDULO 3 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-3-circle-fill"></i> Módulo 3</span>
                        <h4 class="fw-bold mb-2">Ejemplos de Inversión con Poco Capital</h4>
                        <p class="text-muted mb-3">No necesitas miles de euros para empezar. Con 50€ al mes y paciencia ya puedes montar algo serio.</p>

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
                            <h6 class="fw-bold text-primary mb-2">Caso real: María, 28 años, auxiliar administrativa</h6>
                            <p class="small mb-2">María lleva 5 años metiendo <strong>75€/mes</strong> en un ETF que replica el MSCI World. Estos son sus números:</p>
                            <div class="row text-center g-2">
                                <div class="col-4"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">4.500€</div><small class="text-muted">Aportado</small></div></div>
                                <div class="col-4"><div class="bg-white rounded p-2 border"><div class="fw-bold text-success">+1.847€</div><small class="text-muted">Rentabilidad</small></div></div>
                                <div class="col-4"><div class="bg-white rounded p-2 border"><div class="fw-bold text-dark">6.347€</div><small class="text-muted">Total actual</small></div></div>
                            </div>
                            <small class="text-muted d-block mt-2">Basado en rentabilidad media del MSCI World últimos 5 años: 10.7% anualizado.</small>
                        </div>
                    </div>
                </div>

                {{-- MÓDULO 4 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-4-circle-fill"></i> Módulo 4</span>
                        <h4 class="fw-bold mb-2">Los Mercados Financieros Explicados en Plan Sencillo</h4>
                        <p class="text-muted mb-3">Sin palabras raras. Un mercado financiero es un sitio donde la gente compra y vende "pedacitos" de empresas. Eso es todo.</p>

                        <div class="accordion-custom" id="accordionIntro">
                            <div class="accordion-item">
                                <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                                    ¿Qué es un Mercado Financiero?
                                </button>
                                <div class="accordion-body">
                                    <p>Es un espacio (físico o digital) donde se intercambian activos financieros: acciones, bonos, divisas, materias primas... Piensa en un mercado de frutas, pero en vez de manzanas se compran y venden partes de empresas.</p>
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
                                    <p>Comprar una acción es hacerte dueño de una pequeña parte de una empresa. Si Apple tiene 15.000 millones de acciones y tú compras 1, posees 1/15.000.000.000 de Apple. Eso te da derechos (voto, dividendos) y riesgos (si la empresa va mal, tu acción baja).</p>
                                    <div class="warning-box mb-0"><strong>Ejemplo práctico:</strong> Si en 2010 compraste 10 acciones de Apple a 10$ cada una (100$ total), hoy valdrían unos 2.000$. Tu inversión se multiplicó por 20 en 15 años.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                                    ¿Qué es un Bono?
                                </button>
                                <div class="accordion-body">
                                    <p>Un bono es básicamente un préstamo que le haces a una empresa o gobierno. A cambio, te pagan intereses periódicos (cupones) y al final te devuelven el capital. Más seguro que las acciones, pero con menos rentabilidad.</p>
                                    <ul class="small list-unstyled mb-0">
                                        <li class="mb-1"><i class="bi bi-check2 text-success me-2"></i><strong>Bonos corporativos:</strong> Empresas como Telefónica o Repsol</li>
                                        <li class="mb-1"><i class="bi bi-check2 text-success me-2"></i><strong>Bonos soberanos:</strong> Gobiernos (España, Alemania, USA)</li>
                                        <li class="mb-1"><i class="bi bi-check2 text-success me-2"></i><strong>Letras del Tesoro:</strong> A corto plazo (3, 6, 12 meses)</li>
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
                        <h4 class="fw-bold mb-2">¿Qué Mueve los Precios? Factores que Influyen</h4>
                        <p class="text-muted mb-3">Los precios no suben y bajan al azar. Hay factores económicos, políticos y psicológicos detrás de cada movimiento.</p>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary mb-2">Factores Económicos</h6>
                                <ul class="list-unstyled small">
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-bank text-primary"></i><div><strong>Tipos de interés:</strong> Si suben, la deuda es más cara y la inversión se frena.</div></li>
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-graph-up text-primary"></i><div><strong>PIB:</strong> Si el país crece, las empresas suelen ganar más.</div></li>
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-cash-coin text-primary"></i><div><strong>Inflación:</strong> Alta inflación = menores beneficios reales para las empresas.</div></li>
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-people text-primary"></i><div><strong>Desempleo:</strong> Menos gente con trabajo = menos consumo = menos facturación.</div></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary mb-2">Psicología del Mercado</h6>
                                <ul class="list-unstyled small">
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-emoji-smile text-success"></i><div><strong>Euforia:</strong> Todo el mundo compra → burbujas (viste lo de 2000 o 2021).</div></li>
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-emoji-frown text-danger"></i><div><strong>Pánico:</strong> Todo el mundo vende → caídas exageradas.</div></li>
                                    <li class="mb-2 d-flex align-items-start gap-2"><i class="bi bi-arrow-repeat text-warning"></i><div><strong>Ciclos:</strong> Expansión → Pico → Recesión → Recuperación. Siempre.</div></li>
                                </ul>
                            </div>
                        </div>

                        <div class="info-card mt-3">
                            <h6 class="fw-bold text-primary mb-2">Principales Bolsas del Mundo</h6>
                            <div class="row text-center g-2">
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2 border"><div class="fw-bold">NYSE</div><small class="text-muted">Nueva York</small><div class="comparison-bar"><div class="comparison-fill bg-primary" style="width:100%"></div></div><small class="text-muted">~25 billones $</small></div></div>
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2 border"><div class="fw-bold">NASDAQ</div><small class="text-muted">Tecnología USA</small><div class="comparison-bar"><div class="comparison-fill bg-info" style="width:85%"></div></div><small class="text-muted">~21 billones $</small></div></div>
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2 border"><div class="fw-bold">Tokio</div><small class="text-muted">Japón</small><div class="comparison-bar"><div class="comparison-fill bg-success" style="width:60%"></div></div><small class="text-muted">~6 billones $</small></div></div>
                                <div class="col-6 col-md-3"><div class="bg-white rounded p-2 border"><div class="fw-bold">Euronext</div><small class="text-muted">Europa</small><div class="comparison-bar"><div class="comparison-fill bg-warning" style="width:45%"></div></div><small class="text-muted">~5 billones $</small></div></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MÓDULO 6 --}}
                <div class="timeline-item">
                    <div class="timeline-card">
                        <span class="module-badge"><i class="bi bi-6-circle-fill"></i> Módulo 6</span>
                        <h4 class="fw-bold mb-2">Aplicaciones para Empezar a Invertir</h4>
                        <p class="text-muted mb-3">Te dejo las plataformas que yo usaría (o uso) si estuviera empezando ahora en España. Con comisiones reales y pros/contras de cada una.</p>

                        <div class="row g-3">
                            <div class="col-md-6 col-lg-4">
                                <div class="app-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:44px;height:44px;"><i class="bi bi-bank"></i></div>
                                        <div>
                                            <h6 class="fw-bold mb-0">Trade Republic</h6>
                                            <small class="text-muted">Neobanco alemán</small>
                                        </div>
                                    </div>
                                    <p class="small text-muted mb-2">Comisión fija de 1€ por operación. La app es muy limpia y fácil de usar. Ideal si empiezas con poco.</p>
                                    <div class="d-flex gap-1 flex-wrap mb-2">
                                        <span class="tag tag-green">Desde 1€</span>
                                        <span class="tag tag-blue">App sencilla</span>
                                    </div>
                                    <a href="https://traderepublic.com/es-es" target="_blank" class="btn btn-outline-primary btn-sm w-100 rounded-pill">Visitar web</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="app-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width:44px;height:44px;"><i class="bi bi-shield-check"></i></div>
                                        <div>
                                            <h6 class="fw-bold mb-0">DEGIRO</h6>
                                            <small class="text-muted">Bróker holandés</small>
                                        </div>
                                    </div>
                                    <p class="small text-muted mb-2">Registrado en la CNMV. Algunos ETFs sin comisión. Acceso a más de 50 mercados. Más completo, pero con más curva de aprendizaje.</p>
                                    <div class="d-flex gap-1 flex-wrap mb-2">
                                        <span class="tag tag-green">CNMV</span>
                                        <span class="tag tag-blue">50+ mercados</span>
                                    </div>
                                    <a href="https://www.degiro.es" target="_blank" class="btn btn-outline-success btn-sm w-100 rounded-pill">Visitar web</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="app-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width:44px;height:44px;"><i class="bi bi-robot"></i></div>
                                        <div>
                                            <h6 class="fw-bold mb-0">Indexa Capital</h6>
                                            <small class="text-muted">Robo-advisor español</small>
                                        </div>
                                    </div>
                                    <p class="small text-muted mb-2">Ellos gestionan tu cartera automáticamente. Tú solo transfieres dinero y ellos invierten en ETFs. Desde 1€.</p>
                                    <div class="d-flex gap-1 flex-wrap mb-2">
                                        <span class="tag tag-green">Automático</span>
                                        <span class="tag tag-blue">España</span>
                                    </div>
                                    <a href="https://indexacapital.com" target="_blank" class="btn btn-outline-info btn-sm w-100 rounded-pill">Visitar web</a>
                                </div>
                            </div>
                        </div>

                        <div class="warning-box mt-3">
                            <strong>Importante:</strong> Antes de meter un euro, verifica que el bróker esté registrado en la <strong>CNMV</strong>. Nunca inviertas en plataformas sin regulación. Puedes comprobarlo en <a href="https://www.cnmv.es" target="_blank" class="text-decoration-underline">cnmv.es</a>
                        </div>

                        <h6 class="fw-bold mt-3 mb-2">Comparativa de Comisiones (2026):</h6>
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Plataforma</th><th>Compra</th><th>Venta</th><th>Custodia</th><th>Divisas</th></tr>
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
                        <h4 class="fw-bold mb-2">Inversiones con Bajo Riesgo para Empezar</h4>
                        <p class="text-muted mb-3">Si te pone nervioso perder dinero, empieza por aquí. Estrategias conservadoras que protegen tu capital mientras aprendes cómo funciona esto.</p>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-success">Cartera Conservadora</h6>
                                        <p class="small text-muted mb-2">Para perfiles que prefieren no arriesgar:</p>
                                        <div class="progress mb-2" style="height: 22px;">
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
                                        <h6 class="fw-bold text-primary">Cartera Moderada</h6>
                                        <p class="small text-muted mb-2">Equilibrio entre seguridad y crecimiento:</p>
                                        <div class="progress mb-2" style="height: 22px;">
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
                            <h6 class="fw-bold mb-2">El Interés Compuesto: Tu Mejor Aliado</h6>
                            <p class="small mb-2">Si inviertes <strong>100€/mes</strong> a un <strong>7% anual</strong> de media, esto es lo que pasa:</p>
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
                        <p class="text-muted mb-3">Juega con los números y verás por qué la paciencia paga. Cambia la aportación mensual, el % de rentabilidad y los años.</p>

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
                                        <div class="small opacity-75 mb-1">Has metido</div>
                                        <div class="fs-4 fw-bold" id="totalInvested">24.000€</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="small opacity-75 mb-1">Ganancias</div>
                                        <div class="fs-4 fw-bold text-success" id="totalInterest">28.093€</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="small opacity-75 mb-1">Total</div>
                                        <div class="fs-4 fw-bold text-warning" id="totalAmount">52.093€</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <small class="opacity-75">Resultados orientativos. Las inversiones conllevan riesgo y rentabilidades pasadas no garantizan futuras.</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- RECURSOS GRATUITOS --}}
        <div class="card shadow-sm border-0 p-4 mb-5">
            <h4 class="section-title">Recursos que Uso y Recomiendo</h4>
            <p class="text-muted mb-3">Estas son las webs y herramientas que consulto habitualmente. Todas gratuitas y de confianza.</p>
            <div class="row g-3">
                <div class="col-md-6">
                    <a href="https://www.investopedia.com" target="_blank" class="resource-tile">
                        <i class="bi bi-globe2 fs-4 text-primary"></i>
                        <div>
                            <strong>Investopedia</strong>
                            <small class="d-block text-muted">La Wikipedia de las finanzas. En inglés, pero muy completa.</small>
                        </div>
                    </a>
                    <a href="https://cincodias.elpais.com" target="_blank" class="resource-tile">
                        <i class="bi bi-newspaper fs-4 text-danger"></i>
                        <div>
                            <strong>Cinco Días</strong>
                            <small class="d-block text-muted">Noticias económicas en español del grupo El País.</small>
                        </div>
                    </a>
                    <a href="https://www.bogleheads.org/wiki/Main_Page" target="_blank" class="resource-tile">
                        <i class="bi bi-book fs-4 text-success"></i>
                        <div>
                            <strong>Bogleheads Wiki</strong>
                            <small class="d-block text-muted">Filosofía de inversión pasiva. Comunidad muy activa.</small>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="https://finance.yahoo.com" target="_blank" class="resource-tile">
                        <i class="bi bi-bar-chart-line fs-4 text-primary"></i>
                        <div>
                            <strong>Yahoo Finance</strong>
                            <small class="d-block text-muted">Precios, gráficos y noticias de mercados globales.</small>
                        </div>
                    </a>
                    <a href="https://www.tesoro.es" target="_blank" class="resource-tile">
                        <i class="bi bi-bank fs-4 text-success"></i>
                        <div>
                            <strong>Tesoro Público España</strong>
                            <small class="d-block text-muted">Info oficial sobre Letras del Tesoro y bonos.</small>
                        </div>
                    </a>
                    <a href="https://curvo.eu/backtest" target="_blank" class="resource-tile">
                        <i class="bi bi-calculator fs-4 text-info"></i>
                        <div>
                            <strong>Curvo Backtest</strong>
                            <small class="d-block text-muted">Simulador histórico de carteras con datos reales.</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- FAQ --}}
        <div class="mb-5">
            <h4 class="section-title">Preguntas que me Hacen a Menudo</h4>
            <div class="accordion-custom" id="faqAccordion">
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Con cuánto dinero puedo empezar?
                    </button>
                    <div class="accordion-body">
                        <p>Con <strong>1€</strong> ya puedes empezar en plataformas como Trade Republic o Indexa Capital. Lo que importa no es la cantidad inicial, sino la <strong>constancia</strong>. 50€ al mes durante años construye un patrimonio serio.</p>
                        <div class="success-box mb-0"><strong>Ejemplo:</strong> 50€/mes a 7% anual = 12.920€ en 10 años (6.000€ aportados + 6.920€ ganancia).</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Es seguro invertir? ¿Puedo perder todo?
                    </button>
                    <div class="accordion-body">
                        <p>Toda inversión tiene riesgo, pero se puede gestionar. Si inviertes en un ETF global diversificado, históricamente nunca has perdido dinero en un horizonte de <strong>15+ años</strong>. La clave está en diversificar, pensar a largo plazo y no vender cuando todo el mundo vende.</p>
                        <div class="warning-box mb-0"><strong>Regla de oro:</strong> No inviertas dinero que vayas a necesitar en los próximos 3-5 años.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Qué es un ETF y por qué se recomienda tanto?
                    </button>
                    <div class="accordion-body">
                        <p>Un ETF (Exchange Traded Fund) agrupa cientos de acciones en un solo producto. Comprar un ETF del S&P 500 equivale a tener exposición a las 500 empresas más grandes de EE.UU. de golpe. Son baratos (comisiones desde 0.03% anual), diversificados y muy fáciles de comprar. Es la forma más sencilla de invertir sin ser experto.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Cómo se desbloquea el Pack Avanzado?
                    </button>
                    <div class="accordion-body">
                        <p>Se desbloquea automáticamente <strong>2 semanas después</strong> de tu registro. No tienes que hacer nada ni pagar nada extra.</p>
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
        // Acordeones
        function toggleAccordion(button) {
            const item = button.parentElement;
            const body = button.nextElementSibling;
            const isOpen = body.classList.contains('show');

            const parent = item.parentElement;
            parent.querySelectorAll('.accordion-body.show').forEach(openBody => {
                if (openBody !== body) {
                    openBody.classList.remove('show');
                    openBody.previousElementSibling.classList.remove('active');
                }
            });

            if (isOpen) {
                body.classList.remove('show');
                button.classList.remove('active');
            } else {
                body.classList.add('show');
                button.classList.add('active');
            }
        }

        // Calculadora
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

<button id="btn-arriba" onclick="window.scrollTo({top:0,behavior:'smooth'})"
    title="Volver arriba"
    style="
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: none;
        background: linear-gradient(135deg, #0369a1, #0ea5e9);
        color: white;
        font-size: 1.2rem;
        box-shadow: 0 4px 12px rgba(3,105,161,0.35);
        cursor: pointer;
        display: none;
        z-index: 9999;
        transition: all 0.3s ease;
    "
    onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 6px 20px rgba(3,105,161,0.5)';"
    onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(3,105,161,0.35)';">
    <i class="bi bi-arrow-up"></i>
</button>

<script>
window.addEventListener('scroll', function() {
    const btn = document.getElementById('btn-arriba');
    btn.style.display = window.scrollY > 400 ? 'flex' : 'none';
    btn.style.alignItems = 'center';
    btn.style.justifyContent = 'center';
});
</script>
</x-app-layout>