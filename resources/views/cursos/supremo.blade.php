{{-- resources/views/packs/supremo.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">{{ __('Pack Supremo — Experiencia Élite') }}</h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root { --primary: #dc2626; --secondary: #ea580c; --accent: #f59e0b; --dark: #7f1d1d; --gold: #d97706; }
        .hero-supremo { background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 30%, #7f1d1d 70%, #dc2626 100%); border-radius: 24px; padding: 4rem 2rem; color: white; margin-bottom: 3rem; position: relative; overflow: hidden; }
        .hero-supremo::before { content: ''; position: absolute; top: -50%; right: -30%; width: 800px; height: 800px; background: radial-gradient(circle, rgba(220,38,38,0.15) 0%, transparent 70%); }
        .hero-supremo::after { content: ''; position: absolute; bottom: -30%; left: -20%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(234,88,12,0.1) 0%, transparent 70%); }
        .vip-badge { background: linear-gradient(90deg, #f59e0b, #ea580c, #dc2626); color: white; font-weight: 800; padding: 0.6rem 1.5rem; border-radius: 999px; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 4px 15px rgba(245,158,11,0.4); }
        .stat-box { background: rgba(255,255,255,0.08); backdrop-filter: blur(10px); border-radius: 16px; padding: 1.25rem; text-align: center; border: 1px solid rgba(255,255,255,0.15); }
        .stat-box .num { font-size: 2.2rem; font-weight: 800; background: linear-gradient(135deg, #fbbf24, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .stat-box .label { font-size: 0.85rem; opacity: 0.85; }
        .module-nav { display: flex; gap: 0.5rem; overflow-x: auto; padding-bottom: 0.5rem; margin-bottom: 2rem; }
        .module-nav-btn { white-space: nowrap; padding: 0.75rem 1.25rem; border-radius: 12px; border: 2px solid #fee2e2; background: white; color: #dc2626; font-weight: 600; cursor: pointer; transition: all 0.3s; }
        .module-nav-btn.active, .module-nav-btn:hover { background: linear-gradient(135deg, #dc2626, #ea580c); color: white; border-color: #dc2626; }
        .content-panel { display: none; animation: fadeIn 0.4s ease; }
        .content-panel.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .elite-card { background: white; border-radius: 20px; padding: 2rem; box-shadow: 0 8px 30px rgba(0,0,0,0.12); border-left: 5px solid #dc2626; margin-bottom: 1.5rem; }
        .elite-card-gold { background: linear-gradient(135deg, #fffbeb, #fef3c7); border-radius: 20px; padding: 2rem; box-shadow: 0 8px 30px rgba(0,0,0,0.12); border: 2px solid #f59e0b; margin-bottom: 1.5rem; }
        .tip-box { background: linear-gradient(135deg, #fef2f2, #fff1f2); border-left: 4px solid #dc2626; padding: 1.25rem 1.5rem; border-radius: 12px; margin: 1rem 0; }
        .warning-box { background: #fffbeb; border-left: 4px solid #f59e0b; padding: 1.25rem 1.5rem; border-radius: 12px; margin: 1rem 0; }
        .success-box { background: #f0fdf4; border-left: 4px solid #22c55e; padding: 1.25rem 1.5rem; border-radius: 12px; margin: 1rem 0; }
        .info-box { background: #eff6ff; border-left: 4px solid #3b82f6; padding: 1.25rem 1.5rem; border-radius: 12px; margin: 1rem 0; }
        .data-table { width: 100%; border-collapse: separate; border-spacing: 0; }
        .data-table th { background: linear-gradient(135deg, #fef2f2, #fff1f2); padding: 1rem; text-align: left; font-weight: 700; color: #991b1b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 2px solid #fecaca; }
        .data-table td { padding: 1rem; border-bottom: 1px solid #fee2e2; color: #334155; }
        .data-table tr:hover td { background: #fef2f2; }
        .tag { display: inline-block; padding: 0.35rem 0.85rem; border-radius: 999px; font-size: 0.8rem; font-weight: 700; }
        .tag-gold { background: linear-gradient(135deg, #fbbf24, #f59e0b); color: white; }
        .tag-red { background: #fee2e2; color: #991b1b; }
        .tag-green { background: #dcfce7; color: #166534; }
        .tag-blue { background: #dbeafe; color: #1e40af; }
        .tag-purple { background: #f3e8ff; color: #6b21a8; }
        .resource-tile { display: flex; align-items: center; gap: 1rem; padding: 1rem 1.25rem; background: linear-gradient(135deg, #fef2f2, #fff5f5); border-radius: 12px; text-decoration: none; color: #334155; transition: all 0.2s; border: 1px solid #fecaca; }
        .resource-tile:hover { background: #fee2e2; color: #dc2626; border-color: #dc2626; transform: translateX(5px); }
        .highlight-number { font-size: 2.5rem; font-weight: 800; background: linear-gradient(135deg, #dc2626, #ea580c); -webkit-background-clip: text; -webkit-text-fill-color: transparent; line-height: 1; }
        .signal-box { background: linear-gradient(135deg, #0f172a, #1e293b); border-radius: 16px; padding: 1.5rem; color: #e2e8f0; font-family: 'Courier New', monospace; border: 1px solid #334155; }
        .signal-box .label { color: #94a3b8; font-size: 0.8rem; }
        .signal-box .value { color: #22c55e; font-weight: 700; }
        .signal-box .entry { color: #fbbf24; font-weight: 700; }
        .signal-box .sl { color: #ef4444; font-weight: 700; }
        .contact-box { background: linear-gradient(135deg, #0f172a, #1e1b4b, #312e81); border-radius: 20px; padding: 2.5rem; color: white; border: 1px solid rgba(245,158,11,0.3); }
        .contact-method { background: rgba(255,255,255,0.08); border-radius: 16px; padding: 1.5rem; margin-bottom: 1rem; border: 1px solid rgba(255,255,255,0.1); transition: all 0.3s; }
        .contact-method:hover { background: rgba(255,255,255,0.12); border-color: rgba(245,158,11,0.5); }
        .portfolio-item { background: white; border-radius: 12px; padding: 1rem; border: 1px solid #e2e8f0; margin-bottom: 0.75rem; transition: all 0.2s; }
        .portfolio-item:hover { border-color: #dc2626; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .chart-placeholder { background: linear-gradient(135deg, #f8fafc, #f1f5f9); border-radius: 12px; padding: 2rem; text-align: center; border: 2px dashed #cbd5e1; }
        /* === ACORDEÓN CORREGIDO === */
        .accordion-custom .accordion-item { border: none; margin-bottom: 0.75rem; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .accordion-custom .accordion-button { background: linear-gradient(135deg, #fef2f2, #fff5f5); padding: 1.25rem 1.5rem; font-weight: 700; color: #7f1d1d; border: none; font-size: 1rem; border-radius: 12px; }
        .accordion-custom .accordion-button:not(.collapsed) { background: linear-gradient(135deg, #fee2e2, #fecaca); color: #991b1b; box-shadow: none; border-radius: 12px 12px 0 0; }
        .accordion-custom .accordion-button:focus { box-shadow: none; border-color: transparent; }
        .accordion-custom .accordion-button::after { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%237f1d1d'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e"); }
        .accordion-custom .accordion-button:not(.collapsed)::after { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23991b1b'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e"); transform: rotate(-180deg); }
        .accordion-custom .accordion-collapse { border: none; }
        .accordion-custom .accordion-collapse.show { border-radius: 0 0 12px 12px; }
        .accordion-custom .accordion-body { background: white; padding: 1.5rem; }
        .progress-ring { width: 120px; height: 120px; }
        .mentor-avatar { width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #dc2626, #ea580c); display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 800; border: 3px solid #fbbf24; }
        .weekly-schedule { display: grid; grid-template-columns: repeat(7, 1fr); gap: 0.5rem; }
        .day-box { background: white; border-radius: 12px; padding: 1rem; text-align: center; border: 1px solid #e2e8f0; transition: all 0.2s; }
        .day-box.active { background: linear-gradient(135deg, #fef2f2, #fee2e2); border-color: #dc2626; }
        .day-box:hover { transform: translateY(-3px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .metric-card { background: white; border-radius: 16px; padding: 1.5rem; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.06); border-top: 4px solid #dc2626; }
        .metric-value { font-size: 2rem; font-weight: 800; color: #dc2626; }
        .scenario-box { background: linear-gradient(135deg, #fafafa, #f8fafc); border-radius: 16px; padding: 1.5rem; border: 1px solid #e2e8f0; margin-bottom: 1rem; }
        .tool-card { background: white; border-radius: 16px; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.06); border: 1px solid #e2e8f0; transition: all 0.3s; }
        .tool-card:hover { transform: translateY(-5px); box-shadow: 0 12px 30px rgba(0,0,0,0.12); border-color: #dc2626; }
        .comparison-bar { height: 10px; background: #f1f5f9; border-radius: 5px; overflow: hidden; margin-top: 0.5rem; }
        .comparison-fill { height: 100%; border-radius: 5px; transition: width 1s ease; }
        .video-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem; }
        .video-card { background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.08); transition: transform 0.3s; }
        .video-card:hover { transform: translateY(-5px); }
        .video-thumb { position: relative; padding-top: 56.25%; background: #ddd; }
        .video-thumb iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; }
        .video-info { padding: 1.25rem; }
        .video-badge { display: inline-block; padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.75rem; font-weight: 700; margin-bottom: 0.5rem; }
        .alert-vip { background: linear-gradient(135deg, #fef3c7, #fde68a); border: 1px solid #f59e0b; border-radius: 12px; padding: 1rem; }
        .tax-table th { background: #fef2f2; }
        .tax-table td { border-bottom: 1px solid #fee2e2; }
        .optimization-card { background: linear-gradient(135deg, #f0fdf4, #dcfce7); border-radius: 16px; padding: 1.5rem; border: 1px solid #86efac; }
    </style>

    <div class="container py-5">

        {{-- HERO --}}
        <div class="hero-supremo">
            <div class="row align-items-center position-relative">
                <div class="col-lg-8">
                    <div class="vip-badge mb-3"><i class="bi bi-stars"></i> NIVEL ÉLITE — ACCESO TOTAL</div>
                    <h1 class="display-4 fw-bold mb-3">Pack Supremo</h1>
                    <p class="lead mb-4 opacity-90">La experiencia definitiva en formación financiera. 3 vídeos nuevos cada semana, mentoría personalizada 1:1 por videollamada semanal, alertas VIP en tiempo real 24/7, análisis profundo de datos y planificación fiscal avanzada.</p>
                    <div class="row g-3 mb-4">
                        <div class="col-6 col-md-3"><div class="stat-box"><div class="num">3</div><div class="label">Vídeos/semana</div></div></div>
                        <div class="col-6 col-md-3"><div class="stat-box"><div class="num">1:1</div><div class="label">Mentoría semanal</div></div></div>
                        <div class="col-6 col-md-3"><div class="stat-box"><div class="num">24/7</div><div class="label">Alertas VIP</div></div></div>
                        <div class="col-6 col-md-3"><div class="stat-box"><div class="num">∞</div><div class="label">Vitalicio</div></div></div>
                    </div>
                    <div class="d-flex gap-3 flex-wrap">
                        <span class="badge bg-warning text-dark px-3 py-2"><i class="bi bi-camera-video me-1"></i> Videollamada semanal</span>
                        <span class="badge bg-warning text-dark px-3 py-2"><i class="bi bi-broadcast me-1"></i> Señales en tiempo real</span>
                        <span class="badge bg-warning text-dark px-3 py-2"><i class="bi bi-graph-up-arrow me-1"></i> Análisis avanzado</span>
                        <span class="badge bg-warning text-dark px-3 py-2"><i class="bi bi-calculator me-1"></i> Fiscalidad élite</span>
                    </div>
                </div>
                <div class="col-lg-4 text-center mt-4 mt-lg-0">
                    <div class="position-relative">
                        <iframe width="100%" height="240" src="https://www.youtube.com/embed/PHe0bXAIuk0" title="Estrategias de inversores élite" frameborder="0" class="rounded-4 shadow-lg" allowfullscreen></iframe>
                        <div class="mt-2 text-white-50 small"><i class="bi bi-play-circle me-1"></i> Estrategias de los mejores inversores del mundo</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVEGACIÓN DE MÓDULOS --}}
        <div class="module-nav" id="moduleNav">
            <button class="module-nav-btn active" onclick="showModule(0)"><i class="bi bi-1-circle me-1"></i> 3 Vídeos/Semana</button>
            <button class="module-nav-btn" onclick="showModule(1)"><i class="bi bi-2-circle me-1"></i> Mentoría 1:1</button>
            <button class="module-nav-btn" onclick="showModule(2)"><i class="bi bi-3-circle me-1"></i> Análisis Profundo</button>
            <button class="module-nav-btn" onclick="showModule(3)"><i class="bi bi-4-circle me-1"></i> Gráfico Mensual</button>
            <button class="module-nav-btn" onclick="showModule(4)"><i class="bi bi-5-circle me-1"></i> Informe Detallado</button>
            <button class="module-nav-btn" onclick="showModule(5)"><i class="bi bi-6-circle me-1"></i> Análisis Técnico Élite</button>
            <button class="module-nav-btn" onclick="showModule(6)"><i class="bi bi-7-circle me-1"></i> Gestión Portafolio</button>
            <button class="module-nav-btn" onclick="showModule(7)"><i class="bi bi-8-circle me-1"></i> Estrategias Pro</button>
            <button class="module-nav-btn" onclick="showModule(8)"><i class="bi bi-9-circle me-1"></i> Herramientas Élite</button>
            <button class="module-nav-btn" onclick="showModule(9)"><i class="bi bi-10-circle me-1"></i> Fiscalidad Avanzada</button>
        </div>

        {{-- MÓDULO 1: 3 VÍDEOS NUEVOS CADA SEMANA --}}
        <div class="content-panel active" id="module-0">
            <h3 class="fw-bold mb-2" style="color:#991b1b;"><i class="bi bi-collection-play me-2"></i>3 Vídeos Nuevos Cada Semana</h3>
            <p class="text-muted mb-4">Contenido fresco, actualizado y adaptado a la situación real del mercado. Análisis de la semana, nuevas estrategias y respuestas a tus preguntas.</p>

            <div class="alert-vip d-flex align-items-center mb-4">
                <i class="bi bi-broadcast-pin fs-4 me-3 text-warning"></i>
                <div><strong>Calendario de publicación:</strong> Lunes, Miércoles y Viernes a las 19:00h (hora España). Los vídeos permanecen disponibles indefinidamente.</div>
            </div>

            <h5 class="fw-bold mb-3">Ejemplo de Programación Semanal Tipo</h5>
            <div class="weekly-schedule mb-4">
                <div class="day-box active">
                    <div class="fw-bold text-danger mb-1">LUN</div>
                    <i class="bi bi-graph-up-arrow fs-3 text-danger mb-1"></i>
                    <small class="d-block text-muted">Análisis de Mercado</small>
                    <small class="d-block text-success fw-bold">19:00h</small>
                </div>
                <div class="day-box">
                    <div class="fw-bold text-muted mb-1">MAR</div>
                    <i class="bi bi-calendar-check fs-3 text-muted mb-1"></i>
                    <small class="d-block text-muted">Estudio individual</small>
                </div>
                <div class="day-box active">
                    <div class="fw-bold text-danger mb-1">MIÉ</div>
                    <i class="bi bi-lightning-charge fs-3 text-danger mb-1"></i>
                    <small class="d-block text-muted">Nueva Estrategia</small>
                    <small class="d-block text-success fw-bold">19:00h</small>
                </div>
                <div class="day-box">
                    <div class="fw-bold text-muted mb-1">JUE</div>
                    <i class="bi bi-journal-text fs-3 text-muted mb-1"></i>
                    <small class="d-block text-muted">Práctica en demo</small>
                </div>
                <div class="day-box active">
                    <div class="fw-bold text-danger mb-1">VIE</div>
                    <i class="bi bi-question-circle fs-3 text-danger mb-1"></i>
                    <small class="d-block text-muted">Preguntas & Respuestas</small>
                    <small class="d-block text-success fw-bold">19:00h</small>
                </div>
                <div class="day-box">
                    <div class="fw-bold text-muted mb-1">SÁB</div>
                    <i class="bi bi-camera-video fs-3 text-muted mb-1"></i>
                    <small class="d-block text-muted">Videollamada mentoría</small>
                </div>
                <div class="day-box">
                    <div class="fw-bold text-muted mb-1">DOM</div>
                    <i class="bi bi-pause-circle fs-3 text-muted mb-1"></i>
                    <small class="d-block text-muted">Descanso</small>
                </div>
            </div>

            <h5 class="fw-bold mb-3">Contenido de los 3 Vídeos Semanales</h5>
            <div class="video-grid mb-4">
                <div class="video-card">
                    <div class="video-thumb" style="background: linear-gradient(135deg, #dc2626, #991b1b); display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-graph-up-arrow text-white fs-1"></i>
                    </div>
                    <div class="video-info">
                        <span class="video-badge tag-red">VÍDEO 1 — LUNES</span>
                        <h6 class="fw-bold mb-1">Análisis de Mercado Semanal</h6>
                        <p class="small text-muted mb-2">Repaso de la semana anterior, impacto de noticias macro, movimientos de bancos centrales y preparación para la semana entrante.</p>
                        <ul class="list-unstyled small mb-0">
                            <li><i class="bi bi-check2 text-success me-2"></i>Revisión S&P 500, NASDAQ, DAX, IBEX</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Análisis de volatilidad (VIX)</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Sectores en tendencia y rotación</li>
                        </ul>
                    </div>
                </div>
                <div class="video-card">
                    <div class="video-thumb" style="background: linear-gradient(135deg, #ea580c, #dc2626); display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-lightning-charge text-white fs-1"></i>
                    </div>
                    <div class="video-info">
                        <span class="video-badge tag-gold">VÍDEO 2 — MIÉRCOLES</span>
                        <h6 class="fw-bold mb-1">Nueva Estrategia o Técnica</h6>
                        <p class="small text-muted mb-2">Desglose completo de una estrategia operativa: setup, entrada, gestión de riesgo, casos reales históricos y adaptaciones según mercado.</p>
                        <ul class="list-unstyled small mb-0">
                            <li><i class="bi bi-check2 text-success me-2"></i>Smart Money Concepts (SMC)</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Order Flow y Footprint</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Opciones avanzadas (spreads, iron condor)</li>
                        </ul>
                    </div>
                </div>
                <div class="video-card">
                    <div class="video-thumb" style="background: linear-gradient(135deg, #7f1d1d, #dc2626); display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-people text-white fs-1"></i>
                    </div>
                    <div class="video-info">
                        <span class="video-badge tag-purple">VÍDEO 3 — VIERNES</span>
                        <h6 class="fw-bold mb-1">Preguntas de la Comunidad</h6>
                        <p class="small text-muted mb-2">Respondemos en vídeo las dudas más frecuentes de los miembros del Pack Supremo. Casos reales, correcciones de operaciones y análisis de errores.</p>
                        <ul class="list-unstyled small mb-0">
                            <li><i class="bi bi-check2 text-success me-2"></i>Revisión de operaciones de alumnos</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Corrección de errores comunes</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Nuevas herramientas y recursos</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="elite-card">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-archive me-2"></i>Biblioteca de Vídeos Anteriores</h5>
                <p class="text-muted small mb-3">Acceso vitalicio a todos los vídeos publicados desde que te uniste. Organizados por categorías:</p>
                <div class="row g-2">
                    <div class="col-md-4"><div class="p-2 bg-light rounded border"><div class="fw-bold">Análisis Técnico Avanzado</div><small class="text-muted">48 vídeos · 96h</small></div></div>
                    <div class="col-md-4"><div class="p-2 bg-light rounded border"><div class="fw-bold">Estrategias Operativas</div><small class="text-muted">36 vídeos · 72h</small></div></div>
                    <div class="col-md-4"><div class="p-2 bg-light rounded border"><div class="fw-bold">Macroeconomía y Fundamentos</div><small class="text-muted">24 vídeos · 48h</small></div></div>
                    <div class="col-md-4"><div class="p-2 bg-light rounded border"><div class="fw-bold">Psicotrading y Disciplina</div><small class="text-muted">18 vídeos · 36h</small></div></div>
                    <div class="col-md-4"><div class="p-2 bg-light rounded border"><div class="fw-bold">Fiscalidad y Planificación</div><small class="text-muted">12 vídeos · 24h</small></div></div>
                    <div class="col-md-4"><div class="p-2 bg-light rounded border"><div class="fw-bold">Casos y Correcciones</div><small class="text-muted">30 vídeos · 60h</small></div></div>
                </div>
            </div>
        </div>

        {{-- MÓDULO 2: CLASE PERSONALIZADA POR VIDEOCONFERENCIA SEMANAL --}}
        <div class="content-panel" id="module-1">
            <h3 class="fw-bold mb-2" style="color:#991b1b;"><i class="bi bi-camera-video me-2"></i>Clase Personalizada por Videoconferencia Semanal</h3>
            <p class="text-muted mb-4">El corazón del Pack Supremo. Tu mentor dedicado revisa tu cartera, analiza tus operaciones y te guía personalmente cada semana.</p>

            <div class="contact-box mb-5">
                <h4 class="fw-bold mb-4"><i class="bi bi-stars me-2 text-warning"></i>Cómo Programar tu Sesión Semanal de Mentoría</h4>
                <p class="text-white-50 mb-4">Las videollamadas semanales son sesiones individuales de <strong>60 minutos</strong> con tu mentor asignado. Revisión de cartera, análisis de trades y planificación personalizada.</p>
                
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="contact-method">
                            <i class="bi bi-telephone-fill text-warning fs-2"></i>
                            <div>
                                <strong class="d-block mb-1 fs-5">Vía Telefónica / WhatsApp</strong>
                                <p class="small mb-2 text-white-50">Llama o envía un mensaje para acordar horario:</p>
                                <a href="tel:+34228455421" class="text-warning fw-bold text-decoration-none fs-4">+34 228 45 54 21</a>
                                <p class="small text-white-50 mt-2"><i class="bi bi-clock me-1"></i> Lunes a Viernes · 9:00 - 18:00h (Canarias)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-method">
                            <i class="bi bi-envelope-fill text-info fs-2"></i>
                            <div>
                                <strong class="d-block mb-1 fs-5">Vía Email</strong>
                                <p class="small mb-2 text-white-50">Escríbenos indicando tu disponibilidad:</p>
                                <a href="mailto:info@gentrading.es" class="text-info fw-bold text-decoration-none fs-4">info@gentrading.es</a>
                                <p class="small text-white-50 mt-2"><i class="bi bi-reply me-1"></i> Respuesta en menos de 24h laborables</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert-vip" style="background: rgba(255,255,255,0.05); border-color: rgba(245,158,11,0.5);">
                    <p class="small mb-0 text-white"><i class="bi bi-info-circle me-2 text-warning"></i><strong>En tu primer contacto indícanos:</strong> tu nombre completo, franja horaria preferida (mañana/tarde) y si prefieres Google Meet, Zoom o Microsoft Teams. Te confirmaremos la cita en menos de 24 horas.</p>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="mentor-avatar"><i class="bi bi-person"></i></div>
                            <div>
                                <h5 class="fw-bold mb-0">Tu Mentor Dedicado</h5>
                                <small class="text-muted">Experto con 10+ años en mercados</small>
                            </div>
                        </div>
                        <p class="text-muted small mb-3">Cada miembro del Pack Supremo tiene asignado un mentor senior con experiencia comprobada en gestión de carteras y trading profesional.</p>
                        <h6 class="fw-bold small mb-2">Qué hace tu mentor:</h6>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check2-circle text-danger me-2"></i>Revisa tu cartera semanalmente posición por posición</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-danger me-2"></i>Analiza cada trade: entradas, salidas, gestión</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-danger me-2"></i>Identifica errores recurrentes y patrones destructivos</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-danger me-2"></i>Te explica el razonamiento detrás de cada decisión</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-danger me-2"></i>Planifica la semana siguiente con objetivos claros</li>
                            <li class="mb-0"><i class="bi bi-check2-circle text-danger me-2"></i>Responde dudas por email entre sesiones</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-calendar-check me-2"></i>Estructura de la Videollamada (60 min)</h5>
                        <div class="progress-timeline">
                            <div class="progress-item"><strong>0-10 min:</strong> Revisión de la semana anterior y estado emocional</div>
                            <div class="progress-item"><strong>10-25 min:</strong> Análisis detallado de cada posición abierta</div>
                            <div class="progress-item"><strong>25-40 min:</strong> Review de trades cerrados: qué funcionó y qué no</div>
                            <div class="progress-item"><strong>40-50 min:</strong> Planificación de la semana entrante: niveles clave, setups potenciales</div>
                            <div class="progress-item"><strong>50-60 min:</strong> Preguntas abiertas y asignación de "tarea" para la semana</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="elite-card-gold">
                <h5 class="fw-bold mb-3"><i class="bi bi-gift me-2 text-warning"></i>Bonificación: Contacto Directo entre Sesiones</h5>
                <p class="text-muted small mb-3">Además de la videollamada semanal, tienes acceso a:</p>
                <div class="row g-3">
                    <div class="col-md-4"><div class="text-center p-3 bg-white rounded shadow-sm"><i class="bi bi-envelope-at fs-2 text-primary mb-2"></i><div class="fw-bold">Email Prioritario</div><small class="text-muted">Respuesta en <4h laborables</small></div></div>
                    <div class="col-md-4"><div class="text-center p-3 bg-white rounded shadow-sm"><i class="bi bi-whatsapp fs-2 text-success mb-2"></i><div class="fw-bold">WhatsApp Urgente</div><small class="text-muted">Para dudas de operativa en vivo</small></div></div>
                    <div class="col-md-4"><div class="text-center p-3 bg-white rounded shadow-sm"><i class="bi bi-chat-dots fs-2 text-info mb-2"></i><div class="fw-bold">Chat Privado</div><small class="text-muted">En la plataforma de GeN Trading</small></div></div>
                </div>
            </div>
        </div>

        {{-- MÓDULO 3: ANÁLISIS PROFUNDO DE DATOS E INFORMACIÓN --}}
        <div class="content-panel" id="module-2">
            <h3 class="fw-bold mb-2" style="color:#991b1b;"><i class="bi bi-binoculars me-2"></i>Análisis Profundo de Datos e Información</h3>
            <p class="text-muted mb-4">Datos institucionales, flujo de órdenes, correlaciones macro y análisis de sentimiento que el inversor retail no ve.</p>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-building me-2"></i>Análisis Fundamental Profundo</h5>
                        <p class="text-muted small mb-3">Más allá del PER y el ROE. Análisis DCF completo, valoración por múltiplos y análisis de moats competitivos.</p>
                        
                        <h6 class="fw-bold small mb-2">Metodología DCF (Discounted Cash Flow):</h6>
                        <div class="table-responsive mb-3">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Paso</th><th>Descripción</th><th>Herramienta</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>1. Proyección</strong></td><td>Estimar FCF los próximos 5-10 años</td><td>Excel / Koyfin</td></tr>
                                    <tr><td><strong>2. WACC</strong></td><td>Calcular coste medio ponderado de capital</td><td>Damodaran data</td></tr>
                                    <tr><td><strong>3. Terminal Value</strong></td><td>Valor residual tras período explícito</td><td>Modelo Gordon</td></tr>
                                    <tr><td><strong>4. Descuento</strong></td><td>Traer flujos a valor presente</td><td>Fórmula NPV</td></tr>
                                    <tr><td><strong>5. Comparación</strong></td><td>Valor intrínseco vs precio de mercado</td><td>Margen de seguridad</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="success-box mb-0">
                            <h6 class="fw-bold small mb-2"><i class="bi bi-calculator me-2"></i>Caso Real: Valoración DCF de Microsoft (2026)</h6>
                            <div class="row g-2 text-center">
                                <div class="col-6"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">FCY 2025</div><div class="text-success fw-bold">75.000M$</div></div></div>
                                <div class="col-6"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">Crecimiento FCF</div><div class="text-success fw-bold">12% anual</div></div></div>
                                <div class="col-6"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">WACC estimado</div><div class="text-success fw-bold">8.5%</div></div></div>
                                <div class="col-6"><div class="bg-white rounded p-2 border"><div class="fw-bold text-primary">Valor intrínseco</div><div class="text-success fw-bold">~485$/acción</div></div></div>
                            </div>
                            <small class="text-muted d-block mt-2"><i class="bi bi-info-circle me-1"></i> Precio de mercado actual: ~420$. Margen de seguridad del 15%.</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-activity me-2"></i>Smart Money Concepts (SMC)</h5>
                        <p class="text-muted small mb-3">Entender cómo piensan y operan los fondos institucionales. Seguir sus huellas en el mercado.</p>

                        <h6 class="fw-bold small mb-2">Conceptos Clave SMC:</h6>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-2"><i class="bi bi-check2 text-danger me-2"></i><strong>Order Blocks (OB):</strong> Zonas donde los institucionales acumularon posiciones</li>
                            <li class="mb-2"><i class="bi bi-check2 text-danger me-2"></i><strong>Fair Value Gaps (FVG):</strong> Ineficiencias de precio que el mercado tiende a cerrar</li>
                            <li class="mb-2"><i class="bi bi-check2 text-danger me-2"></i><strong>Liquidez:</strong> Dónde están los stops del retail (objetivo de los grandes)</li>
                            <li class="mb-2"><i class="bi bi-check2 text-danger me-2"></i><strong>Barrida de Stops:</strong> Movimiento falso para quedar liquidez antes del movimiento real</li>
                            <li class="mb-2"><i class="bi bi-check2 text-danger me-2"></i><strong>Break of Structure (BOS):</strong> Confirmación de cambio de tendencia</li>
                            <li class="mb-0"><i class="bi bi-check2 text-danger me-2"></i><strong>Change of Character (CHoCH):</strong> Primer signo de debilidad en tendencia</li>
                        </ul>

                        <div class="tip-box mb-0">
                            <h6 class="fw-bold small mb-2"><i class="bi bi-lightbulb me-2"></i>Ejemplo de Operativa SMC</h6>
                            <p class="small mb-0">El precio rompe al alza, deja un FVG en 1.0850-1.0860, luego retrocede a esa zona (donde los institucionales compraron), y desde allí continúa al alza. Entrada en el FVG, SL bajo el mínimo del retroceso.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="elite-card">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-globe me-2"></i>Correlaciones Macro y Análisis Intermercados</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2">Correlaciones Clave a Vigilar:</h6>
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Activo A</th><th>Activo B</th><th>Correlación</th><th>Interpretación</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>Dólar (DXY)</strong></td><td>Oro</td><td><span class="tag tag-red">Negativa</span></td><td>DXY ↑ → Oro ↓</td></tr>
                                    <tr><td><strong>Dólar (DXY)</strong></td><td>EUR/USD</td><td><span class="tag tag-red">Negativa</span></td><td>DXY ↑ → EUR/USD ↓</td></tr>
                                    <tr><td><strong>Bonos 10Y USA</strong></td><td>NASDAQ</td><td><span class="tag tag-red">Negativa</span></td><td>Rendimientos ↑ → Tech ↓</td></tr>
                                    <tr><td><strong>Petróleo</strong></td><td>CAD/USD</td><td><span class="tag tag-green">Positiva</span></td><td>Petróleo ↑ → CAD ↑</td></tr>
                                    <tr><td><strong>VIX</strong></td><td>S&P 500</td><td><span class="tag tag-red">Negativa</span></td><td>VIX ↑ → SPX ↓ (miedo)</td></tr>
                                    <tr><td><strong>Bitcoin</strong></td><td>NASDAQ</td><td><span class="tag tag-green">Positiva</span></td><td>Riesgo on/off</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2">Ciclo Económico y Sectores:</h6>
                        <div class="scenario-box">
                            <div class="mb-3">
                                <span class="tag tag-green mb-2 d-inline-block">EXPANSIÓN</span>
                                <p class="small text-muted mb-1"><strong>Sectores favorables:</strong> Tecnología, Consumo discrecional, Industriales, Materiales</p>
                                <p class="small text-muted mb-0"><strong>Estrategia:</strong> Overweight en cíclicos, subir beta de cartera</p>
                            </div>
                            <div class="mb-3">
                                <span class="tag tag-orange mb-2 d-inline-block">PICO / DESACELERACIÓN</span>
                                <p class="small text-muted mb-1"><strong>Sectores favorables:</strong> Salud, Consumo básico, Utilities</p>
                                <p class="small text-muted mb-0"><strong>Estrategia:</strong> Rotación defensiva, reducir exposición a cíclicos</p>
                            </div>
                            <div class="mb-3">
                                <span class="tag tag-red mb-2 d-inline-block">RECESIÓN</span>
                                <p class="small text-muted mb-1"><strong>Sectores favorables:</strong> Utilities, Salud, Consumo básico, Bonos largo plazo</p>
                                <p class="small text-muted mb-0"><strong>Estrategia:</strong> Máxima defensa, aumentar liquidez, preparar compras</p>
                            </div>
                            <div class="mb-0">
                                <span class="tag tag-blue mb-2 d-inline-block">RECUPERACIÓN</span>
                                <p class="small text-muted mb-1"><strong>Sectores favorables:</strong> Financieros, Industriales, Materiales, Inmobiliario</p>
                                <p class="small text-muted mb-0"><strong>Estrategia:</strong> Aumentar beta, comprar valor de forma agresiva</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MÓDULO 4: GRÁFICO DE INVERSIÓN MENSUAL --}}
        <div class="content-panel" id="module-3">
            <h3 class="fw-bold mb-2" style="color:#991b1b;"><i class="bi bi-bar-chart-line me-2"></i>Gráfico de Inversión Mensual</h3>
            <p class="text-muted mb-4">Seguimiento visual profesional de tu evolución. Curva de equity, drawdown, ratio de Sharpe y métricas avanzadas.</p>

            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="metric-card">
                        <div class="metric-value" id="metricEquity">24.580€</div>
                        <small class="text-muted d-block">Capital Actual</small>
                        <small class="text-success"><i class="bi bi-arrow-up me-1"></i>+18.5% YTD</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card">
                        <div class="metric-value" id="metricDrawdown">-4.2%</div>
                        <small class="text-muted d-block">Drawdown Máximo</small>
                        <small class="text-success"><i class="bi bi-check-circle me-1"></i>Bajo control</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card">
                        <div class="metric-value" id="metricSharpe">1.34</div>
                        <small class="text-muted d-block">Ratio de Sharpe</small>
                        <small class="text-success"><i class="bi bi-check-circle me-1"></i>Excelente (>1)</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card">
                        <div class="metric-value" id="metricWinRate">62%</div>
                        <small class="text-muted d-block">Win Rate</small>
                        <small class="text-warning"><i class="bi bi-arrow-up me-1"></i>+5% vs mes anterior</small>
                    </div>
                </div>
            </div>

            <div class="elite-card mb-4">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-graph-up me-2"></i>Ejemplo de Gráfico de Equity Mensual</h5>
                <div class="chart-placeholder">
                    <i class="bi bi-bar-chart-line fs-1 text-muted mb-2"></i>
                    <p class="text-muted mb-2">Curva de Equity — Últimos 12 meses</p>
                    <div style="height: 200px; background: linear-gradient(to top, rgba(220,38,38,0.1) 0%, transparent 100%); border-radius: 8px; position: relative; overflow: hidden;">
                        <svg viewBox="0 0 800 200" style="width: 100%; height: 100%;">
                            <defs>
                                <linearGradient id="equityGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" style="stop-color:#dc2626;stop-opacity:0.3" />
                                    <stop offset="100%" style="stop-color:#dc2626;stop-opacity:0" />
                                </linearGradient>
                            </defs>
                            <path d="M0,180 Q50,170 100,165 T200,150 T300,140 T400,120 T500,110 T600,90 T700,70 T800,50" fill="none" stroke="#dc2626" stroke-width="3"/>
                            <path d="M0,180 Q50,170 100,165 T200,150 T300,140 T400,120 T500,110 T600,90 T700,70 T800,50 L800,200 L0,200 Z" fill="url(#equityGradient)"/>
                            <circle cx="100" cy="165" r="4" fill="#dc2626"/>
                            <circle cx="300" cy="140" r="4" fill="#dc2626"/>
                            <circle cx="500" cy="110" r="4" fill="#dc2626"/>
                            <circle cx="700" cy="70" r="4" fill="#dc2626"/>
                        </svg>
                    </div>
                    <div class="row text-center mt-3 g-2">
                        <div class="col"><small class="text-muted">Ene: 20.000€</small></div>
                        <div class="col"><small class="text-muted">Mar: 21.200€</small></div>
                        <div class="col"><small class="text-muted">Jun: 22.800€</small></div>
                        <div class="col"><small class="text-muted">Sep: 23.500€</small></div>
                        <div class="col"><small class="text-muted">Dic: 24.580€</small></div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-pie-chart me-2"></i>Composición de Cartera Actual (Ejemplo)</h5>
                        <div class="portfolio-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold">MSCI World ETF</div>
                                    <small class="text-muted">Amundi · CW8</small>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-primary">35%</div>
                                    <small class="text-success">+12.4%</small>
                                </div>
                            </div>
                            <div class="comparison-bar"><div class="comparison-fill bg-primary" style="width:35%"></div></div>
                        </div>
                        <div class="portfolio-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold">S&P 500 ETF</div>
                                    <small class="text-muted">Vanguard · VUSA</small>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-primary">25%</div>
                                    <small class="text-success">+15.2%</small>
                                </div>
                            </div>
                            <div class="comparison-bar"><div class="comparison-fill bg-info" style="width:25%"></div></div>
                        </div>
                        <div class="portfolio-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold">Oro (ETF)</div>
                                    <small class="text-muted">iShares · SGLD</small>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-primary">15%</div>
                                    <small class="text-success">+8.7%</small>
                                </div>
                            </div>
                            <div class="comparison-bar"><div class="comparison-fill bg-warning" style="width:15%"></div></div>
                        </div>
                        <div class="portfolio-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold">Bonos Corporativos</div>
                                    <small class="text-muted">iShares · CORP</small>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-primary">15%</div>
                                    <small class="text-danger">-1.2%</small>
                                </div>
                            </div>
                            <div class="comparison-bar"><div class="comparison-fill bg-success" style="width:15%"></div></div>
                        </div>
                        <div class="portfolio-item mb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold">Liquidez / Trading</div>
                                    <small class="text-muted">Cash + Posiciones corto plazo</small>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-primary">10%</div>
                                    <small class="text-muted">0%</small>
                                </div>
                            </div>
                            <div class="comparison-bar"><div class="comparison-fill bg-secondary" style="width:10%"></div></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-clipboard-data me-2"></i>Métricas Avanzadas del Mes</h5>
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Métrica</th><th>Valor</th><th>Benchmark</th><th>Estado</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>Ratio Sharpe</td><td><strong>1.34</strong></td><td>1.0</td><td><span class="tag tag-green">Superior</span></td></tr>
                                    <tr><td>Ratio Sortino</td><td><strong>2.1</strong></td><td>1.5</td><td><span class="tag tag-green">Superior</span></td></tr>
                                    <tr><td>Alpha (vs S&P 500)</td><td><strong>+4.2%</strong></td><td>0%</td><td><span class="tag tag-green">Positivo</span></td></tr>
                                    <tr><td>Beta</td><td><strong>0.85</strong></td><td>1.0</td><td><span class="tag tag-blue">Defensivo</span></td></tr>
                                    <tr><td>Max Drawdown</td><td><strong>-4.2%</strong></td><td>-10%</td><td><span class="tag tag-green">Excelente</span></td></tr>
                                    <tr><td>Recovery Time</td><td><strong>18 días</strong></td><td>60 días</td><td><span class="tag tag-green">Rápido</span></td></tr>
                                    <tr><td>Profit Factor</td><td><strong>1.8</strong></td><td>1.5</td><td><span class="tag tag-green">Bueno</span></td></tr>
                                    <tr><td>Expectativa matemática</td><td><strong>+1.2%</strong></td><td>+0.5%</td><td><span class="tag tag-green">Positiva</span></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="info-box mb-0 mt-3">
                            <small class="text-muted"><i class="bi bi-info-circle me-2"></i><strong>Ratio de Sharpe:</strong> Rentabilidad ajustada al riesgo. >1 es bueno, >2 es excelente. Calculado como (Rentabilidad - Tipo libre de riesgo) / Desviación estándar.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MÓDULO 5: INFORME DETALLADO DEL PROCESO CADA MES --}}
        <div class="content-panel" id="module-4">
            <h3 class="fw-bold mb-2" style="color:#991b1b;"><i class="bi bi-file-earmark-bar-graph me-2"></i>Informe Detallado del Proceso Cada Mes</h3>
            <p class="text-muted mb-4">Documento profesional mensual con tu evolución completa: rendimiento, operaciones, lecciones aprendidas y objetivos para el mes siguiente.</p>

            <div class="elite-card mb-4">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-file-text me-2"></i>Estructura del Informe Mensual (8-12 páginas)</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="scenario-box">
                            <h6 class="fw-bold text-primary mb-2"><span class="badge bg-danger me-2">1</span>Resumen Ejecutivo</h6>
                            <ul class="list-unstyled small mb-0">
                                <li><i class="bi bi-dot text-muted me-2"></i>Rentabilidad mensual y acumulada YTD</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Comparativa vs benchmark (S&P 500, MSCI World)</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Principales contribuyentes y detractores</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Estado emocional y disciplina (1-10)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="scenario-box">
                            <h6 class="fw-bold text-primary mb-2"><span class="badge bg-danger me-2">2</span>Análisis de Operaciones</h6>
                            <ul class="list-unstyled small mb-0">
                                <li><i class="bi bi-dot text-muted me-2"></i>Número de trades: ganadores vs perdedores</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Ratio R/R medio alcanzado</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Tiempo medio en posición</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Errores recurrentes identificados</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="scenario-box">
                            <h6 class="fw-bold text-primary mb-2"><span class="badge bg-danger me-2">3</span>Evolución de Cartera</h6>
                            <ul class="list-unstyled small mb-0">
                                <li><i class="bi bi-dot text-muted me-2"></i>Gráfico de equity del mes</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Cambios en composición (rebalanceos)</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Exposición por sectores y geografías</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Concentración máxima por posición</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="scenario-box">
                            <h6 class="fw-bold text-primary mb-2"><span class="badge bg-danger me-2">4</span>Plan del Mes Siguiente</h6>
                            <ul class="list-unstyled small mb-0">
                                <li><i class="bi bi-dot text-muted me-2"></i>Objetivo de rentabilidad realista</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Máximo drawdown aceptable</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Estrategias prioritarias</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Áreas de mejora concretas</li>
                                <li><i class="bi bi-dot text-muted me-2"></i>Eventos macro a vigilar</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="elite-card-gold">
                <h5 class="fw-bold mb-3"><i class="bi bi-envelope-paper me-2 text-warning"></i>Ejemplo Extracto de Informe Mensual</h5>
                <div class="p-3 bg-white rounded border" style="font-family: 'Georgia', serif;">
                    <div class="text-center mb-3">
                        <h6 class="fw-bold text-uppercase text-muted" style="letter-spacing: 0.2em;">GeN Trading — Informe Mensual</h6>
                        <div class="fw-bold fs-5">Miembro: [Tu Nombre] · Mayo 2026</div>
                    </div>
                    <hr>
                    <div class="row text-center mb-3">
                        <div class="col-3"><div class="fw-bold text-success">+3.8%</div><small class="text-muted">Rent. mensual</small></div>
                        <div class="col-3"><div class="fw-bold text-primary">+18.5%</div><small class="text-muted">YTD</small></div>
                        <div class="col-3"><div class="fw-bold text-primary">24.580€</div><small class="text-muted">Capital</small></div>
                        <div class="col-3"><div class="fw-bold text-warning">8/10</div><small class="text-muted">Disciplina</small></div>
                    </div>
                    <p class="small text-muted mb-2"><strong>Destacado del mes:</strong> La rotación hacia utilities anticipó correctamente la caída del NASDAQ (-5%). Tu posición en XLU generó +8.2% mientras el mercado caía.</p>
                    <p class="small text-muted mb-2"><strong>Área de mejora:</strong> Cerraste 2 operaciones ganadoras demasiado pronto (take profit parcial innecesario). El ratio R/R real fue 1:1.8 vs 1:3 planificado. Próximo mes: dejar correr las ganancias según plan.</p>
                    <p class="small text-muted mb-0"><strong>Objetivo junio:</strong> Mantener win rate >60%, subir ratio R/R medio a 1:2.5, reducir operaciones impulsivas a 0.</p>
                </div>
            </div>
        </div>

        {{-- MÓDULO 6: ANÁLISIS TÉCNICO Y FUNDAMENTAL AVANZADO --}}
        <div class="content-panel" id="module-5">
            <h3 class="fw-bold mb-2" style="color:#991b1b;"><i class="bi bi-magic me-2"></i>Análisis Técnico y Fundamental Avanzado</h3>
            <p class="text-muted mb-4">Técnicas que usan los profesionales de Wall Street. Multi-timeframe, opciones, flujo de órdenes y análisis de balances en profundidad.</p>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-layers me-2"></i>Análisis Multi-Timeframe (MTF)</h5>
                        <p class="text-muted small mb-3">La clave de la precisión: analizar desde el marco semanal hasta el de entrada en 15 minutos.</p>
                        
                        <div class="table-responsive mb-3">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Timeframe</th><th>Propósito</th><th>Qué buscar</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>Semanal / Diario</strong></td><td>Tendencia mayor</td><td>Estructura de mercado, OB semanales</td></tr>
                                    <tr><td><strong>4H / 1H</strong></td><td>Zona de interés</td><td>FVG, puntos de liquidez, CHoCH</td></tr>
                                    <tr><td><strong>15min / 5min</strong></td><td>Entrada precisa</td><td>Confirmación con indicadores, patrón de velas</td></tr>
                                    <tr><td><strong>1min</strong></td><td>Timing exacto</td><td>Footprint, delta, absorción</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tip-box mb-0">
                            <h6 class="fw-bold small mb-2"><i class="bi bi-lightbulb me-2"></i>Regla de 3 Timeframes</h6>
                            <p class="small mb-0">Nunca operes contra la tendencia del timeframe superior. Si el diario es bajista, solo busca ventas en 1H/15min. El timeframe de entrada debe confirmar, no contradecir.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-currency-exchange me-2"></i>Opciones Financieras Avanzadas</h5>
                        <p class="text-muted small mb-3">Más allá de Calls y Puts básicas: estrategias multi-pata para cobertura, ingresos y apalancamiento controlado.</p>

                        <h6 class="fw-bold small mb-2">Estrategias Avanzadas:</h6>
                        <div class="scenario-box">
                            <div class="mb-2"><span class="tag tag-green">Cobertura</span></div>
                            <p class="small text-muted mb-1"><strong>Protective Put:</strong> Comprar put mientras mantienes la acción. Seguro contra caídas. Coste: prima de la put.</p>
                        </div>
                        <div class="scenario-box">
                            <div class="mb-2"><span class="tag tag-blue">Ingresos</span></div>
                            <p class="small text-muted mb-1"><strong Aquí tienes el Pack Supremo completo, continuando desde donde se cortó:

```html
                            <p class="small text-muted mb-1"><strong>Covered Call:</strong> Vender call de una acción que ya posees. Generas ingresos por la prima. Riesgo: te pueden "llamar" la acción si sube mucho.</p>
                        </div>
                        <div class="scenario-box">
                            <div class="mb-2"><span class="tag tag-purple">Neutral</span></div>
                            <p class="small text-muted mb-1"><strong>Iron Condor:</strong> Vender call spread + put spread. Ganas si el precio se mantiene en rango. Ideal para mercados laterales bajos en volatilidad.</p>
                        </div>
                        <div class="scenario-box mb-0">
                            <div class="mb-2"><span class="tag tag-red">Apalancamiento</span></div>
                            <p class="small text-muted mb-0"><strong>Call Spread Alcista:</strong> Comprar call ATM, vender call OTM. Reduce coste de la prima pero limita ganancia máxima.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="elite-card mb-4">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-building me-2"></i>Análisis Fundamental Avanzado — Lectura de Balances</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2">Cuenta de Resultados (Income Statement):</h6>
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Métrica</th><th>Qué mide</th><th>Red Flag</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>Ingresos</strong></td><td>Ventas totales</td><td>Crecimiento <0% 2 años seguidos</td></tr>
                                    <tr><td><strong>EBITDA</strong></td><td>Beneficio operativo bruto</td><td>Margen EBITDA decreciente</td></tr>
                                    <tr><td><strong>Net Income</strong></td><td>Beneficio neto</td><td>Negativo 3 trimestres</td></tr>
                                    <tr><td><strong>EPS</strong></td><td>Beneficio por acción</td><td>Crecimiento EPS < inflación</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2">Balance General (Balance Sheet):</h6>
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Métrica</th><th>Qué mide</th><th>Red Flag</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>Ratio de liquidez</strong></td><td>Activo corriente / Pasivo corriente</td><td>&lt;1 (insolvencia técnica)</td></tr>
                                    <tr><td><strong>Deuda neta / EBITDA</strong></td><td>Capacidad de pago</td><td>&gt;4x (endeudamiento excesivo)</td></tr>
                                    <tr><td><strong>ROIC</strong></td><td>Rentabilidad del capital invertido</td><td>&lt;WACC (destruye valor)</td></tr>
                                    <tr><td><strong>Free Cash Flow</strong></td><td>Dinero real generado</td><td>Negativo 2+ años</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="success-box mt-3 mb-0">
                    <h6 class="fw-bold small mb-2"><i class="bi bi-search me-2"></i>Caso de Estudio: Identificando Problemas en un Balance</h6>
                    <p class="small text-muted mb-2"><strong>Empresa XYZ (2025):</strong> Ingresos crecen un 15%, pero...</p>
                    <div class="row g-2">
                        <div class="col-md-3"><div class="p-2 bg-white rounded border text-center"><div class="fw-bold text-danger">Deuda/EBITDA: 5.2x</div><small class="text-muted">Peligroso</small></div></div>
                        <div class="col-md-3"><div class="p-2 bg-white rounded border text-center"><div class="fw-bold text-warning">FCF: -120M€</div><small class="text-muted">Quema de caja</small></div></div>
                        <div class="col-md-3"><div class="p-2 bg-white rounded border text-center"><div class="fw-bold text-warning">ROIC: 4.5%</div><small class="text-muted">Bajo WACC (8%)</small></div></div>
                        <div class="col-md-3"><div class="p-2 bg-white rounded border text-center"><div class="fw-bold text-danger">Burn rate: 18 meses</div><small class="text-muted">Sin financiación, quiebra</small></div></div>
                    </div>
                    <p class="small text-muted mt-2 mb-0"><strong>Conclusión:</strong> Aunque los ingresos crecen, la empresa destruye valor. El crecimiento es insostenible sin generación de caja. <strong>Evitar.</strong></p>
                </div>
            </div>

            <div class="elite-card">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-broadcast me-2"></i>Alertas VIP en Tiempo Real — Canal Privado</h5>
                <p class="text-muted small mb-3">Acceso exclusivo al canal privado donde publicamos señales en tiempo real con todos los parámetros para replicar nuestras operaciones.</p>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="signal-box">
                            <div class="mb-2"><span class="badge bg-success">SEÑAL LARGA — EUR/USD</span></div>
                            <div class="mb-1"><span class="label">🎯 Entrada:</span> <span class="entry">1.0850</span></div>
                            <div class="mb-1"><span class="label">🛑 Stop Loss:</span> <span class="sl">1.0810 (-40 pips)</span></div>
                            <div class="mb-1"><span class="label">✅ Take Profit 1:</span> <span class="value">1.0890 (+40 pips)</span></div>
                            <div class="mb-1"><span class="label">✅ Take Profit 2:</span> <span class="value">1.0940 (+90 pips)</span></div>
                            <div class="mb-1"><span class="label">📐 R/R:</span> <span class="value">1:2.25</span></div>
                            <div class="mb-1"><span class="label">📊 Tamaño:</span> <span class="value">0.5 lotes (5€/pip)</span></div>
                            <div class="mb-0"><span class="label">💰 Riesgo total:</span> <span class="sl">200€ (1% de cuenta)</span></div>
                            <hr style="border-color: #334155; margin: 0.75rem 0;">
                            <div class="label"><i class="bi bi-info-circle me-1"></i> Razón: Rebote en soporte semanal + RSI divergencia alcista H4 + Macro favorable post-NFP</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2">¿Qué incluyen las alertas VIP?</h6>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i><strong>Activo y dirección:</strong> Par de divisas, índice, acción o materia prima</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i><strong>Precio de entrada exacto:</strong> Con margen de tolerancia (±5 pips)</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i><strong>Stop Loss y Take Profit:</strong> Niveles concretos con ratio R/R</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i><strong>Tamaño de posición:</strong> Recomendación basada en tu capital</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i><strong>Razonamiento completo:</strong> Por qué, en qué timeframe, qué indicadores</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i><strong>Actualizaciones:</strong> Si movemos SL a break-even o cerramos antes</li>
                            <li class="mb-0"><i class="bi bi-check2-circle text-success me-2"></i><strong>Horario:</strong> 24/7, máxima actividad 8:00-22:00 CET</li>
                        </ul>
                        <div class="warning-box mb-0 mt-2">
                            <small class="text-muted"><i class="bi bi-exclamation-triangle me-1"></i> <strong>Disclaimer:</strong> Las alertas son educativas. Tú decides si operas. Nunca arriesgues más del 1-2% por operación.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MÓDULO 7: GESTIÓN Y OPTIMIZACIÓN DE PORTAFOLIO --}}
        <div class="content-panel" id="module-6">
            <h3 class="fw-bold mb-2" style="color:#991b1b;"><i class="bi bi-briefcase me-2"></i>Gestión y Optimización de Portafolio Profesional</h3>
            <p class="text-muted mb-4">Técnicas de gestión de riesgo usadas por fondos de inversión. Rebalanceo, cobertura, diversificación inteligente y optimización de frontera eficiente.</p>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-shield-lock me-2"></i>Gestión de Riesgo Profesional</h5>
                        
                        <h6 class="fw-bold small mb-2">Reglas Inquebrantables:</h6>
                        <div class="scenario-box">
                            <div class="d-flex align-items-start gap-2 mb-2">
                                <span class="badge bg-danger">1%</span>
                                <div>
                                    <strong class="small">Regla del 1% por operación</strong>
                                    <p class="small text-muted mb-0">Nunca arriesgar más del 1% del capital total en un solo trade. Con 50.000€, máximo 500€ de riesgo.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-2 mb-2">
                                <span class="badge bg-warning text-dark">6%</span>
                                <div>
                                    <strong class="small">Regla del 6% mensual</strong>
                                    <p class="small text-muted mb-0">Si pierdes más del 6% en un mes, paras de operar el resto del mes. Revisas estrategia.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-2 mb-0">
                                <span class="badge bg-success">2%</span>
                                <div>
                                    <strong class="small">Regla del 2% por activo</strong>
                                    <p class="small text-muted mb-0">Máximo 2% del portfolio en una sola empresa/par de divisas. Diversificación forzada.</p>
                                </div>
                            </div>
                        </div>

                        <h6 class="fw-bold small mb-2 mt-3">Cálculo de Tamaño de Posición:</h6>
                        <div class="bg-light rounded p-3">
                            <p class="small text-muted mb-2"><strong>Fórmula:</strong> Tamaño = (Capital × Riesgo%) / (Entrada - Stop Loss)</p>
                            <p class="small text-muted mb-0"><strong>Ejemplo:</strong> 50.000€ × 1% = 500€ de riesgo. Entrada 100€, SL 95€ (5€ riesgo por acción). <strong>Tamaño = 100 acciones.</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-arrow-repeat me-2"></i>Rebalanceo de Cartera</h5>
                        <p class="text-muted small mb-3">Mantener las ponderaciones objetivo mediante venta de lo que sube y compra de lo que baja. Compra barato, vende caro de forma sistemática.</p>

                        <h6 class="fw-bold small mb-2">Cartera Modelo y Rebalanceo:</h6>
                        <div class="table-responsive mb-3">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Activo</th><th>Objetivo</th><th>Actual</th><th>Acción</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>MSCI World ETF</td><td>40%</td><td class="text-success fw-bold">45%</td><td><span class="badge bg-danger">Vender -5%</span></td></tr>
                                    <tr><td>S&P 500 ETF</td><td>25%</td><td class="text-success fw-bold">28%</td><td><span class="badge bg-danger">Vender -3%</span></td></tr>
                                    <tr><td>Oro ETF</td><td>15%</td><td class="text-danger fw-bold">10%</td><td><span class="badge bg-success">Comprar +5%</span></td></tr>
                                    <tr><td>Bonos Corp</td><td>15%</td><td class="text-success fw-bold">12%</td><td><span class="badge bg-success">Comprar +3%</span></td></tr>
                                    <tr><td>Liquidez</td><td>5%</td><td>5%</td><td><span class="badge bg-secondary">Mantener</span></td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tip-box mb-0">
                            <h6 class="fw-bold small mb-2"><i class="bi bi-calendar me-2"></i>Frecuencia de Rebalanceo</h6>
                            <p class="small mb-0"><strong>Trimestral:</strong> Para carteras de buy & hold. <strong>Mensual:</strong> Para carteras más activas. <strong>Por umbrales:</strong> Cuando un activo se desvía >5% de su objetivo. <strong>Nunca rebalancear en días de pánico.</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="elite-card">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-shield-check me-2"></i>Cobertura de Cartera (Hedging)</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2">Métodos de Cobertura:</h6>
                        <div class="scenario-box">
                            <span class="tag tag-blue mb-2 d-inline-block">Opciones</span>
                            <p class="small text-muted mb-2"><strong>Put Protective:</strong> Comprar puts del S&P 500 (SPY) o del ETF que repliques. Coste: 1-2% anual de la cartera. Protege contra caídas >10%.</p>
                            <p class="small text-muted mb-0"><strong>Collar:</strong> Vender call OTM + comprar put OTM. Coste cero o cercano. Limita upside pero protege downside.</p>
                        </div>
                        <div class="scenario-box">
                            <span class="tag tag-green mb-2 d-inline-block">Inversos</span>
                            <p class="small text-muted mb-2"><strong>ETFs inversos:</strong> SH (S&P 500 inverse), SQQQ (NASDAQ 3x inverse). Aumentan en valor cuando el mercado cae.</p>
                            <p class="small text-muted mb-0"><strong>Oro y bonos:</strong> Tradicionalmente correlacionados negativamente con equities en crisis.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2">Ejemplo de Cobertura con Put:</h6>
                        <div class="bg-light rounded p-3 mb-3">
                            <p class="small text-muted mb-2"><strong>Cartera:</strong> 100.000€ en MSCI World ETF</p>
                            <p class="small text-muted mb-2"><strong>Miedo:</strong> Corrección del 20% en próximos 3 meses</p>
                            <p class="small text-muted mb-2"><strong>Cobertura:</strong> Comprar put CW8 strike 90% a 3 meses</p>
                            <p class="small text-muted mb-2"><strong>Coste:</strong> ~1.500€ (1.5% de cartera)</p>
                            <p class="small text-muted mb-0"><strong>Resultado si cae 20%:</strong> Pérdida en ETF: -20.000€. Ganancia en Put: +18.500€. <strong>Pérdida neta: -1.500€ (solo el coste de la prima)</strong></p>
                        </div>
                        <div class="warning-box mb-0">
                            <small class="text-muted"><i class="bi bi-exclamation-triangle me-1"></i> <strong>Importante:</strong> La cobertura tiene coste. Si el mercado sube, pierdes la prima de la put. Usa solo cuando la valoración sea extrema o tengas eventos de riesgo conocidos.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MÓDULO 8: ESTRATEGIAS DE INVERSIÓN PROFESIONAL --}}
        <div class="content-panel" id="module-7">
            <h3 class="fw-bold mb-2" style="color:#991b1b;"><i class="bi bi-trophy me-2"></i>Estrategias de Inversión Profesional</h3>
            <p class="text-muted mb-4">Métodos de inversores legendarios y fondos de élite adaptados al inversor particular. Factor investing, momentum, quality y low volatility.</p>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-funnel me-2"></i>Factor Investing</h5>
                        <p class="text-muted small mb-3">Inversión sistemática basada en factores que históricamente han generado prima de rentabilidad sobre el mercado.</p>

                        <h6 class="fw-bold small mb-2">Factores Principales:</h6>
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Factor</th><th>Qué compra</th><th>Premium histórico</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>Value</strong></td><td>Empresas baratas (bajo PER, alto dividendo)</td><td>~2% anual vs mercado</td></tr>
                                    <tr><td><strong>Quality</strong></td><td>Empresas con alta rentabilidad, baja deuda</td><td>~1.5% anual</td></tr>
                                    <tr><td><strong>Momentum</strong></td><td>Acciones que han subido recientemente</td><td>~3% anual</td></tr>
                                    <tr><td><strong>Low Vol</strong></td><td>Acciones menos volátiles que el mercado</td><td>~1% anual con menos riesgo</td></tr>
                                    <tr><td><strong>Size</strong></td><td>Small caps (empresas pequeñas)</td><td>~2% anual (con más riesgo)</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="success-box mt-3 mb-0">
                            <h6 class="fw-bold small mb-2"><i class="bi bi-lightbulb me-2"></i>Estrategia Multi-Factor</h6>
                            <p class="small text-muted mb-0">Combinar varios factores para reducir volatilidad y mantener prima. Ejemplo: 40% Value + 30% Quality + 20% Momentum + 10% Low Vol. ETFs disponibles: iShares Edge MSCI World Multifactor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-diagram-3 me-2"></i>All Weather Portfolio — Ray Dalio</h5>
                        <p class="text-muted small mb-3">Cartera diseñada para funcionar en cualquier entorno económico: expansión, recesión, inflación y deflación.</p>

                        <h6 class="fw-bold small mb-2">Composición Original:</h6>
                        <div class="progress mb-3" style="height: 40px;">
                            <div class="progress-bar bg-primary" style="width: 30%">Acciones 30%</div>
                            <div class="progress-bar bg-success" style="width: 40%">Bonos largo 40%</div>
                            <div class="progress-bar bg-warning" style="width: 15%">Commodities 15%</div>
                            <div class="progress-bar bg-info" style="width: 7.5%">Oro 7.5%</div>
                            <div class="progress-bar bg-secondary" style="width: 7.5%">Otros 7.5%</div>
                        </div>

                        <h6 class="fw-bold small mb-2">Rendimiento Histórico (1970-2024):</h6>
                        <div class="row text-center g-2 mb-3">
                            <div class="col-6"><div class="bg-light rounded p-2"><div class="fw-bold text-primary">~9.5%</div><small class="text-muted">Rentabilidad anual</small></div></div>
                            <div class="col-6"><div class="bg-light rounded p-2"><div class="fw-bold text-success">~4.5%</div><small class="text-muted">Volatilidad anual</small></div></div>
                        </div>

                        <div class="tip-box mb-0">
                            <p class="small mb-0"><i class="bi bi-info-circle me-2"></i><strong>Adaptación europea:</strong> Sustituir bonos USA por bonos europeos (BTPs, Bunds, OATs) y añadir exposición al euro.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="elite-card mb-4">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-cash-coin me-2"></i>Estrategia de Dividendos Crecientes (Dividend Growth)</h5>
                <div class="row g-3">
                    <div class="col-md-8">
                        <p class="text-muted small mb-3">Inversión en empresas que no solo pagan dividendos, sino que los aumentan consistentemente año tras año. Efecto compuesto potenciado.</p>
                        
                        <h6 class="fw-bold small mb-2">Criterios de Selección:</h6>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="bi bi-check2 text-success me-2"></i><strong>25+ años</strong> aumentando dividendo consecutivamente (Dividend Aristocrats)</li>
                            <li class="mb-1"><i class="bi bi-check2 text-success me-2"></i><strong>Payout ratio &lt;60%</strong> (sostenibilidad del dividendo)</li>
                            <li class="mb-1"><i class="bi bi-check2 text-success me-2"></i><strong>Crecimiento del dividendo &gt;5% anual</strong> (supera inflación)</li>
                            <li class="mb-1"><i class="bi bi-check2 text-success me-2"></i><strong>ROE &gt;12%</strong> (rentabilidad del negocio)</li>
                            <li class="mb-1"><i class="bi bi-check2 text-success me-2"></i><strong>Deuda neta/EBITDA &lt;3x</strong> (balance sano)</li>
                        </ul>

                        <div class="bg-light rounded p-3">
                            <h6 class="fw-bold small mb-2">Ejemplo: Procter & Gamble (PG)</h6>
                            <div class="row text-center g-2">
                                <div class="col-4"><div class="fw-bold text-primary">68 años</div><small class="text-muted">Aumentando div.</small></div>
                                <div class="col-4"><div class="fw-bold text-primary">2.4%</div><small class="text-muted">Yield actual</small></div>
                                <div class="col-4"><div class="fw-bold text-primary">6%</div><small class="text-muted">Crec. anual div.</small></div>
                            </div>
                            <p class="small text-muted mt-2 mb-0">Inversión inicial 10.000€ en 2000 → Hoy: ~45.000€ en valor + ~18.000€ en dividendos recibidos.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light rounded p-3 h-100">
                            <h6 class="fw-bold small mb-2">Top Dividend Aristocrats 2026</h6>
                            <ul class="list-unstyled small">
                                <li class="mb-2 d-flex justify-content-between"><span>3M (MMM)</span><span class="text-success">66 años ↑</span></li>
                                <li class="mb-2 d-flex justify-content-between"><span>Coca-Cola (KO)</span><span class="text-success">62 años ↑</span></li>
                                <li class="mb-2 d-flex justify-content-between"><span>Johnson & Johnson (JNJ)</span><span class="text-success">62 años ↑</span></li>
                                <li class="mb-2 d-flex justify-content-between"><span>Procter & Gamble (PG)</span><span class="text-success">68 años ↑</span></li>
                                <li class="mb-2 d-flex justify-content-between"><span>PepsiCo (PEP)</span><span class="text-success">52 años ↑</span></li>
                                <li class="mb-2 d-flex justify-content-between"><span>Walmart (WMT)</span><span class="text-success">51 años ↑</span></li>
                                <li class="mb-0 d-flex justify-content-between"><span>Realty Income (O)</span><span class="text-success">29 años ↑</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="elite-card">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-globe me-2"></i>Macro Trading — Posicionamiento por Ciclo Económico</h5>
                <p class="text-muted small mb-3">Ajustar la cartera según la fase del ciclo económico. Basado en investigación de Bridgewater, Goldman Sachs y BIS.</p>

                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr><th>Fase</th><th>Señales</th><th>Overweight</th><th>Underweight</th><th>Acciones ejemplo</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="tag tag-green">Expansión temprana</span></td>
                                <td>PMI >50, tipos bajos, desempleo cayendo</td>
                                <td>Tech, Financials, Industriales</td>
                                <td>Utilities, Consumer Staples</td>
                                <td>AAPL, NVDA, JPM, CAT</td>
                            </tr>
                            <tr>
                                <td><span class="tag tag-blue">Expansión tardía</span></td>
                                <td>PMI picando, inflación subiendo, tipos subiendo</td>
                                <td>Energy, Materials, Real Estate</td>
                                <td>Growth, Long duration bonds</td>
                                <td>XOM, LIN, AMT, BHP</td>
                            </tr>
                            <tr>
                                <td><span class="tag tag-orange">Contracción</span></td>
                                <td>PMI <50, recesión técnica, tipos altos</td>
                                <td>Utilities, Healthcare, Staples, Bonos largo</td>
                                <td>Cyclicals, High beta, Commodities</td>
                                <td>NEE, JNJ, PG, TLT</td>
                            </tr>
                            <tr>
                                <td><span class="tag tag-purple">Recuperación</span></td>
                                <td>PMI rebotando, tipos bajando, estímulo fiscal</td>
                                <td>Financials, Tech, Consumer Discretionary</td>
                                <td>Defensivos, Oro</td>
                                <td>MSFT, AMZN, BAC, DIS</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- MÓDULO 9: HERRAMIENTAS AVANZADAS DE TOMA DE DECISIONES --}}
        <div class="content-panel" id="module-8">
            <h3 class="fw-bold mb-2" style="color:#991b1b;"><i class="bi bi-tools me-2"></i>Herramientas Avanzadas de Toma de Decisiones</h3>
            <p class="text-muted mb-4">Software, plataformas y recursos institucionales que usan los profesionales. Acceso a datos que el inversor retail no tiene.</p>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="tool-card h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px;height:50px;"><i class="bi bi-bar-chart-line fs-4"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0">TradingView Premium</h6>
                                <span class="badge bg-success">Incluido</span>
                            </div>
                        </div>
                        <p class="small text-muted mb-2">La plataforma de gráficos profesional más completa. Alertas ilimitadas, 25 indicadores por gráfico, data export, Pine Script.</p>
                        <ul class="list-unstyled small mb-0">
                            <li><i class="bi bi-check2 text-success me-2"></i>8 gráficos en pantalla</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Alertas ilimitadas</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Segundo-based intervals</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Volume profile avanzado</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tool-card h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px;height:50px;"><i class="bi bi-bank fs-4"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0">Koyfin / Simply Wall St</h6>
                                <span class="badge bg-success">Incluido</span>
                            </div>
                        </div>
                        <p class="small text-muted mb-2">Análisis fundamental profesional. Ratios, comparativas sectoriales, DCF automático, visualizaciones de datos.</p>
                        <ul class="list-unstyled small mb-0">
                            <li><i class="bi bi-check2 text-success me-2"></i>Screeners avanzados</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Comparativa peer-to-peer</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Gráficos de sanity checks</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Export a Excel</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tool-card h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px;height:50px;"><i class="bi bi-pie-chart fs-4"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0">Portfolio Visualizer</h6>
                                <span class="badge bg-success">Incluido</span>
                            </div>
                        </div>
                        <p class="small text-muted mb-2">Backtesting y optimización de carteras con datos históricos desde 1972. Análisis de factor, Monte Carlo, eficiencia.</p>
                        <ul class="list-unstyled small mb-0">
                            <li><i class="bi bi-check2 text-success me-2"></i>Backtesting 50+ años</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Optimización Mean-Variance</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Simulación Monte Carlo</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Análisis de withdrawal rates</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tool-card h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px;height:50px;"><i class="bi bi-newspaper fs-4"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0">Bloomberg / Refinitiv</h6>
                                <span class="badge bg-warning text-dark">Descuento</span>
                            </div>
                        </div>
                        <p class="small text-muted mb-2">Terminal Bloomberg y Refinitiv Eikon con descuento para miembros. Datos en tiempo real, noticias, análisis de analistas.</p>
                        <ul class="list-unstyled small mb-0">
                            <li><i class="bi bi-check2 text-success me-2"></i>Datos institucionales</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Consensus de analistas</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Research reports</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>ESG scores</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tool-card h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px;height:50px;"><i class="bi bi-graph-up-arrow fs-4"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0">Unusual Whales</h6>
                                <span class="badge bg-success">Incluido</span>
                            </div>
                        </div>
                        <p class="small text-muted mb-2">Seguimiento del flujo de opciones inusuales. Detecta movimientos institucionales antes de que ocurran.</p>
                        <ul class="list-unstyled small mb-0">
                            <li><i class="bi bi-check2 text-success me-2"></i>Flow de opciones en tiempo real</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Dark pool prints</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Insider trading tracker</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Alertas de sweeps inusuales</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tool-card h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px;height:50px;"><i class="bi bi-robot fs-4"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0">APIs y Algo-Trading</h6>
                                <span class="badge bg-success">Incluido</span>
                            </div>
                        </div>
                        <p class="small text-muted mb-2">Acceso a APIs de Interactive Brokers y Alpaca para automatizar estrategias. Código Python incluido.</p>
                        <ul class="list-unstyled small mb-0">
                            <li><i class="bi bi-check2 text-success me-2"></i>Scripts Python listos</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Backtesting con Backtrader</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Ejecución automatizada</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Machine learning básico</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="elite-card">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-file-earmark-spreadsheet me-2"></i>Plantillas Exclusivas del Pack Supremo</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="scenario-box">
                            <h6 class="fw-bold text-primary mb-2"><i class="bi bi-calculator me-2"></i>Calculadora de Posición Avanzada</h6>
                            <p class="small text-muted mb-2">Excel con macros que calcula automáticamente:</p>
                            <ul class="list-unstyled small mb-0">
                                <li><i class="bi bi-check2 text-success me-2"></i>Tamaño óptimo según riesgo % y distancia al SL</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Ajuste por correlación con otras posiciones abiertas</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Proyección de P&L en diferentes escenarios</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Alerta si el riesgo total excede umbrales</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="scenario-box">
                            <h6 class="fw-bold text-primary mb-2"><i class="bi bi-journal-check me-2"></i>Bitácora de Trading Profesional</h6>
                            <p class="small text-muted mb-2">Plantilla Google Sheets con:</p>
                            <ul class="list-unstyled small mb-0">
                                <li><i class="bi bi-check2 text-success me-2"></i>Dashboard automático con estadísticas</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Curva de equity en tiempo real</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Análisis de sesgos emocionales</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Export a PDF para mentorías</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="scenario-box mb-0">
                            <h6 class="fw-bold text-primary mb-2"><i class="bi bi-pie-chart me-2"></i>Planificador de Cartera</h6>
                            <p class="small text-muted mb-2">Herramienta para diseñar y rebalancear:</p>
                            <ul class="list-unstyled small mb-0">
                                <li><i class="bi bi-check2 text-success me-2"></i>Simulación de eficiencia de frontera</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Backtest de la cartera propuesta</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Análisis de drawdown histórico</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Proyección de jubilación (FIRE)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="scenario-box mb-0">
                            <h6 class="fw-bold text-primary mb-2"><i class="bi bi-receipt me-2"></i>Tracker Fiscal Automático</h6>
                            <p class="small text-muted mb-2">Registro de todas tus operaciones para declaración:</p>
                            <ul class="list-unstyled small mb-0">
                                <li><i class="bi bi-check2 text-success me-2"></i>Cálculo automático de plusvalías</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Compensación de pérdidas</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Divisas: tipo de cambio automático</li>
                                <li><i class="bi bi-check2 text-success me-2"></i>Export listo para modelo D6 y Renta</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MÓDULO 10: FISCALIDAD AVANZADA Y PLANIFICACIÓN FISCAL --}}
        <div class="content-panel" id="module-9">
            <h3 class="fw-bold mb-2" style="color:#991b1b;"><i class="bi bi-calculator me-2"></i>Fiscalidad Avanzada y Planificación Fiscal</h3>
            <p class="text-muted mb-4">Estrategias legales para minimizar la carga fiscal. Tax-loss harvesting, vehículos eficientes, planificación patrimonial y estructuración internacional.</p>

            <div class="alert alert-warning d-flex align-items-center mb-4">
                <i class="bi bi-exclamation-triangle-fill me-3 fs-4"></i>
                <div><strong>Aviso legal:</strong> La información es orientativa y de carácter educativo. La fiscalidad puede cambiar. <strong>Consulta siempre con un asesor fiscal</strong> para tu situación particular.</div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-scissors me-2"></i>Tax-Loss Harvesting Avanzado</h5>
                        <p class="text-muted small mb-3">Vender activos con pérdidas para compensar ganancias y reducir la factura fiscal de forma legal. Estrategia usada por todos los fondos de inversión.</p>

                        <h6 class="fw-bold small mb-2">Estrategia Paso a Paso:</h6>
                        <div class="progress-timeline mb-3">
                            <div class="progress-item"><strong>Paso 1:</strong> Identificar posiciones con pérdidas no realizadas al final del año fiscal</div>
                            <div class="progress-item"><strong>Paso 2:</strong> Vender las posiciones en pérdida (realizar la pérdida)</div>
                            <div class="progress-item"><strong>Paso 3:</strong> Esperar 2 meses (para evitar la "compra venta" en España) o comprar activo similar pero no idéntico</div>
                            <div class="progress-item"><strong>Paso 4:</strong> La pérdida compensa ganancias del mismo año o los 4 siguientes</div>
                            <div class="progress-item"><strong>Paso 5:</strong> Reinvertir el ahorro fiscal en nuevas posiciones</div>
                        </div>

                        <div class="optimization-card mb-0">
                            <h6 class="fw-bold small mb-2"><i class="bi bi-lightbulb me-2"></i>Caso Real: Tax-Loss Harvesting</h6>
                            <p class="small text-muted mb-2"><strong>Situación:</strong> Ganancias de 15.000€ en 2026. Tienes acciones de Tesla con -5.000€ de pérdida no realizada.</p>
                            <p class="small text-muted mb-2"><strong>Acción:</strong> Vendes Tesla, realizas pérdida de 5.000€. Compras ARKK (ETF de tecnología similar, no idéntico).</p>
                            <p class="small text-muted mb-2"><strong>Resultado:</strong> Tributas por 10.000€ en lugar de 15.000€. Ahorro: 5.000€ × 21% = <strong>1.050€</strong>.</p>
                            <p class="small text-muted mb-0"><strong>Reinversión:</strong> Esos 1.050€ los inviertes en nueva posición. Efecto compuesto del ahorro fiscal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="elite-card h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-building me-2"></i>Vehículos de Inversión Eficientes Fiscalmente</h5>

                        <h6 class="fw-bold small mb-2">Comparativa de Vehículos:</h6>
                        <div class="table-responsive mb-3">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Vehículo</th><th>Ventaja fiscal</th><th>Inconveniente</th></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Fondos de inversión</strong></td>
                                        <td><span class="tag tag-green">Traspaso sin tributar</span></td>
                                        <td>Comisiones más altas que ETFs</td>
                                    </tr>
                                    <tr>
                                        <td><strong>ETFs</strong></td>
                                        <td><span class="tag tag-green">Comisiones bajas</span></td>
                                        <td>Traspaso entre ETFs sí tributa</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Plan de pensiones</strong></td>
                                        <td><span class="tag tag-green">Deducción IRPF</span></td>
                                        <td>Liquidez restringida hasta jubilación</td>
                                    </tr>
                                    <tr>
                                        <td><strong>PIAS</strong></td>
                                        <td><span class="tag tag-green">Rentas exentas</span></td>
                                        <td>Costes y complejidad</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Cuenta Naranja/Depósito</strong></td>
                                        <td><span class="tag tag-orange">Sin ventaja</span></td>
                                        <td>Tributan como rendimientos del capital</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tip-box mb-0">
                            <h6 class="fw-bold small mb-2"><i class="bi bi-lightbulb me-2"></i>Estrategia: Fondos vs ETFs para Buy & Hold</h6>
                            <p class="small text-muted mb-0">Si planeas hacer aportaciones mensuales y rebalancear trimestralmente, los <strong>fondos de inversión</strong> son más eficientes fiscalmente porque los traspasos no tributan. Si compras y mantienes sin tocar, los <strong>ETFs</strong> son más baratos en comisiones.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="elite-card mb-4">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-globe me-2"></i>Planificación Fiscal Internacional</h5>
                <p class="text-muted small mb-3">Para inversores con patrimonio significativo o residencia fiscal en múltiples jurisdicciones.</p>

                <div class="row g-3">
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2">Consideraciones para No Residentes:</h6>
                        <div class="scenario-box">
                            <p class="small text-muted mb-2"><strong>Beckham Law (España):</strong> Para trabajadores desplazados a España. Tributación como no residente los primeros 6 años. Tipo fijo del 24% en rentas hasta 600.000€.</p>
                            <p class="small text-muted mb-0"><strong>Convenios de doble imposición:</strong> Evitan que pagues dos veces por la misma renta. Ej: dividendos de USA tienen retención del 15% en origen, se compensa en España.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2">Estructuración Patrimonial:</h6>
                        <div class="scenario-box">
                            <p class="small text-muted mb-2"><strong>Sociedad patrimonial:</strong> Para patrimonios >1M€. Permite diferir impuestos, planificar sucesiones y optimizar rentas.</p>
                            <p class="small text-muted mb-0"><strong>Trusts y fundaciones:</strong> Para planificación sucesoria internacional. Requieren asesoramiento fiscal y legal especializado.</p>
                        </div>
                    </div>
                </div>

                <div class="warning-box mt-3 mb-0">
                    <h6 class="fw-bold small mb-2"><i class="bi bi-exclamation-triangle me-2"></i>Paraísos Fiscales y CRS</h6>
                    <p class="small text-muted mb-0">El <strong>Common Reporting Standard (CRS)</strong> obliga a bancos de 100+ países a informar sobre cuentas de no residentes. <strong>No existe opacidad fiscal legal.</strong> La planificación debe ser transparente y dentro de la ley. Cualquier estructura offshore requiere declaración en el modelo 720.</p>
                </div>
            </div>

            <div class="elite-card-gold">
                <h5 class="fw-bold mb-3"><i class="bi bi-receipt-cutoff me-2 text-warning"></i>Guía Práctica: Declaración de la Renta con Inversiones</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2">Casillas Principales (Modelo 100):</h6>
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr><th>Concepto</th><th>Casilla</th><th>Qué incluir</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>Plusvalías acciones</td><td>0027</td><td>Ganancias/pérdidas de venta de acciones</td></tr>
                                    <tr><td>Dividendos nacionales</td><td>0028</td><td>Dividendos de empresas españolas</td></tr>
                                    <tr><td>Dividendos extranjeros</td><td>0029</td><td>Dividendos del extranjero (con retención)</td></tr>
                                    <tr><td>Rendimientos ETF/fondos</td><td>0030</td><td>Distribuciones de ETFs y fondos</td></tr>
                                    <tr><td>Ganancias cripto</td><td>0031</td><td>Venta de criptomonedas (>2.000€ ganancia)</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold small mb-2">Modelo 720 — Bienes en el Extranjero:</h6>
                        <div class="scenario-box">
                            <p class="small text-muted mb-2"><strong>Obligación:</strong> Declarar si el valor agregado de cuentas, valores o inmuebles en el extranjero supera 50.000€.</p>
                            <p class="small text-muted mb-2"><strong>Plazo:</strong> 1-31 de marzo del año siguiente.</p>
                            <p class="small text-muted mb-2"><strong>Sanción por no declarar:</strong> 5.000€ por dato (mínimo 10.000€).</p>
                            <p class="small text-muted mb-0"><strong>Incluye:</strong> Cuentas en eToro, Interactive Brokers, cuentas bancarias fuera de España, cripto en exchanges extranjeros.</p>
                        </div>
                        <div class="optimization-card mb-0">
                            <p class="small text-muted mb-0"><i class="bi bi-info-circle me-2"></i><strong>Tip:</strong> Usa nuestro Tracker Fiscal Automático (plantilla Excel incluida) para generar el resumen listo para tu asesor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- RECURSOS ÉLITE --}}
        <div class="card shadow border-0 p-4 mb-5">
            <h4 class="fw-bold mb-4" style="color:#991b1b;"><i class="bi bi-bookmarks me-2"></i>Recursos Exclusivos Pack Supremo</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <a href="https://www.bloomberg.com/markets" target="_blank" class="resource-tile">
                        <i class="bi bi-globe2 fs-5 text-danger"></i>
                        <div>
                            <strong>Bloomberg Markets</strong>
                            <small class="d-block text-muted">La fuente de datos financieros más importante del mundo. Noticias en tiempo real.</small>
                        </div>
                    </a>
                    <a href="https://fred.stlouisfed.org" target="_blank" class="resource-tile">
                        <i class="bi bi-bank fs-5 text-primary"></i>
                        <div>
                            <strong>FRED — Federal Reserve Economic Data</strong>
                            <small class="d-block text-muted">Datos macroeconómicos oficiales de la Fed. 800.000+ series temporales.</small>
                        </div>
                    </a>
                    <a href="https://www.sec.gov/cgi-bin/browse-edgar" target="_blank" class="resource-tile">
                        <i class="bi bi-file-earmark-text fs-5 text-success"></i>
                        <div>
                            <strong>SEC EDGAR — Informes de Empresas</strong>
                            <small class="d-block text-muted">Balances y cuentas reales de cualquier empresa cotizada en USA.</small>
                        </div>
                    </a>
                    <a href="https://www.koyfin.com" target="_blank" class="resource-tile">
                        <i class="bi bi-bar-chart-line fs-5 text-info"></i>
                        <div>
                            <strong>Koyfin — Análisis Fundamental</strong>
                            <small class="d-block text-muted">Análisis de ratios financieros y comparación de empresas cotizadas.</small>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="https://simplywall.st" target="_blank" class="resource-tile">
                        <i class="bi bi-graph-up-arrow fs-5 text-warning"></i>
                        <div>
                            <strong>Simply Wall St</strong>
                            <small class="d-block text-muted">Visualización gráfica del análisis fundamental de cualquier empresa.</small>
                        </div>
                    </a>
                    <a href="https://www.portfoliovisualizer.com" target="_blank" class="resource-tile">
                        <i class="bi bi-pie-chart fs-5 text-danger"></i>
                        <div>
                            <strong>Portfolio Visualizer</strong>
                            <small class="d-block text-muted">Backtesting y optimización de carteras con datos históricos reales.</small>
                        </div>
                    </a>
                    <a href="https://unusualwhales.com" target="_blank" class="resource-tile">
                        <i class="bi bi-activity fs-5 text-purple"></i>
                        <div>
                            <strong>Unusual Whales</strong>
                            <small class="d-block text-muted">Seguimiento del flujo de opciones y movimientos institucionales.</small>
                        </div>
                    </a>
                    <a href="https://www.agenciatributaria.gob.es" target="_blank" class="resource-tile">
                        <i class="bi bi-calculator fs-5 text-primary"></i>
                        <div>
                            <strong>Agencia Tributaria (AEAT)</strong>
                            <small class="d-block text-muted">Información oficial sobre fiscalidad de inversiones en España.</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- FAQ --}}
        <div class="mb-5">
            <h4 class="fw-bold mb-4" style="color:#991b1b;">
                <i class="bi bi-question-circle me-2"></i>Preguntas Frecuentes del Pack Supremo
            </h4>
            <div class="accordion-custom" id="faqAccordion">
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Cuándo se desbloquea el Pack Supremo?
                    </button>
                    <div class="accordion-body">
                        <p>El Pack Supremo se desbloquea automáticamente <strong>2 meses después</strong> de tu registro en GeN Trading. Recibirás una notificación por email y SMS. No requiere pago ni acción adicional.</p>
                        <div class="tip-box mb-0">
                            <strong>Recomendación:</strong> Aprovecha estos 2 meses para dominar el Pack Avanzado. El Supremo asume conocimientos sólidos de análisis técnico, gestión de riesgo y fiscalidad básica.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿La mentoría 1:1 es real con una persona?
                    </button>
                    <div class="accordion-body">
                        <p><strong>Sí.</strong> Cada miembro del Pack Supremo tiene asignado un mentor senior real (no un bot ni un asistente). Son traders e inversores profesionales con años de experiencia en gestión de carteras.</p>
                        <p class="mb-0">Las sesiones son por videollamada (Google Meet, Zoom o Teams a tu elección), duran 60 minutos y son semanales. Puedes contactar a tu mentor por email/WhatsApp entre sesiones para dudas urgentes.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Las alertas VIP garantizan beneficios?
                    </button>
                    <div class="accordion-body">
                        <p><strong>No.</strong> Ninguna alerta, señal o estrategia garantiza beneficios. Las alertas VIP son <strong>educativas</strong>: te mostramos en tiempo real cómo analizamos el mercado y qué operaríamos nosotros.</p>
                        <p class="mb-0">Tú decides si operas, con qué tamaño y si sigues el plan completo. Nunca arriesgues más del 1-2% de tu capital en una sola operación, incluso si es nuestra alerta.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Tengo que pagar algo por el Pack Supremo?
                    </button>
                    <div class="accordion-body">
                        <p class="mb-0"><strong>Absolutamente no.</strong> Todos los packs de GeN Trading son <strong>100% gratuitos</strong> para usuarios registrados. No hay costes ocultos, no hay suscripciones premium, no hay upsells. Nuestro modelo de negocio se basa en otros servicios profesionales (asesoría, gestión de carteras institucional). Tu única inversión es tu tiempo, dedicación y disciplina.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Puedo saltarme el Pack Avanzado e ir directo al Supremo?
                    </button>
                    <div class="accordion-body">
                        <p>No. Los packs se desbloquean secuencialmente por tiempo, no por elección. Esto garantiza que todos los miembros del Pack Supremo tengan una base sólida.</p>
                        <p class="mb-0">Sin embargo, puedes acelerar tu aprendizaje: completa los vídeos del Pack Inicial rápidamente y empieza el Avanzado en cuanto se desbloquee (2 semanas). Así llegarás al Supremo con mejor preparación.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" onclick="toggleAccordion(this)">
                        ¿Qué pasa si no puedo asistir a la videollamada semanal?
                    </button>
                    <div class="accordion-body">
                        <p>Si no puedes asistir a tu sesión programada, avisa con <strong>mínimo 24 horas de antelación</strong> por email o WhatsApp. Reprogramamos para la siguiente semana sin problema.</p>
                        <p class="mb-0">Si faltas sin avisar, la sesión se considera consumida. Tienes derecho a <strong>1 reprogramación de emergencia al mes</strong> (aviso con menos de 24h por causas justificadas).</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- NAVEGACIÓN --}}
        <div class="d-flex justify-content-between align-items-center mt-4 pt-4 border-top">
            <a href="/mis-planes" class="btn btn-outline-secondary rounded-pill px-4"><i class="bi bi-arrow-left me-2"></i>Volver a los planes</a>
            <div class="text-muted small">Pack 3 de 3 · <span class="text-warning fw-bold"><i class="bi bi-clock me-1"></i>Se desbloquea en 2 meses</span></div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
                // Función para acordeones personalizados (evita conflicto con Alpine.js)

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

</x-app-layout>


