<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Planes de Inversión</h1>
        <p class="lead text-muted">Elige el plan que mejor se adapte a tus objetivos financieros</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <h5 class="card-title text-uppercase text-muted">Pack Gratuito</h5>
                    <h2 class="card-price fw-bold">Gratis</h2>
                    <p class="text-muted small">Siempre gratuito - Acceso básico</p>
                    <hr>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Introducción sobre qué es invertir</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Composición del curso completo</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Ejemplos de inversión segura</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Conceptos: ¿Qué influye?</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Iniciación a bajo riesgo</li>
                    </ul>
                    <div class="d-grid mt-auto">
                        <button class="btn btn-outline-primary rounded-pill">Empezar Gratis</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow border-primary position-relative">
                <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-primary">
                    Más Popular
                </span>
                <div class="card-body p-4">
                    <h5 class="card-title text-uppercase text-muted">Pack Avanzado</h5>
                    <h2 class="card-price fw-bold">35€ <span class="fs-6 fw-normal text-muted">/ mes</span></h2>
                    <p class="text-primary small fw-bold">15% dto. colectivos especiales*</p>
                    <hr>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="bi bi-check2-all text-primary me-2"></i><strong>60 horas de curso</strong></li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Vídeos quincenales (2h c/u)</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Servicios de inversión recomendados</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Value Investing & Day Trading</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Conocimientos sobre fiscalidad</li>
                    </ul>
                    <div class="d-grid mt-auto">
                        <button class="btn btn-primary rounded-pill shadow-sm">Suscribirme</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm border-0 bg-dark text-white">
                <div class="card-body p-4">
                    <h5 class="card-title text-uppercase text-secondary">Pack Supremo</h5>
                    <h2 class="card-price fw-bold text-white">60€ <span class="fs-6 fw-normal text-secondary">/ mes</span></h2>
                    <p class="text-info small fw-bold">30% dto. colectivos especiales*</p>
                    <hr class="border-secondary">
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="bi bi-star-fill text-warning me-2"></i><strong>100 horas de curso</strong></li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-info me-2"></i>3 vídeos nuevos cada semana</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-info me-2"></i><strong>Videollamada semanal personal</strong></li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-info me-2"></i>Análisis avanzado & Portafolio</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-info me-2"></i>Fiscalidad avanzada</li>
                        <li class="mb-2 text-secondary small italic">Después de 2 meses: 45€/mes</li>
                    </ul>
                    <div class="d-grid mt-auto">
                        <button class="btn btn-info rounded-pill text-dark fw-bold">Elegir Supremo</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <div class="mt-5 text-center text-muted small">
        <p>*Descuentos del 15% y 30% válidos para jubilados, estudiantes y personas con discapacidad acreditada.</p>
        <p>Invertir conlleva riesgos. Infórmate antes de comprometer tu capital.</p>
    </div>
</div>
</x-app-layout>