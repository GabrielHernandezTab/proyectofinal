<style>
    /* Fondo principal y contenedor centrado */
    body {
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        font-family: 'Inter', sans-serif;
        color: #111827;
    }

    .container {
        max-width: 1200px;
        width: 100%;
        padding: 3rem 1rem;
    }

    /* Sección principal */
    .header-section {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 3rem 2rem;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        margin-bottom: 3rem;
    }

    .header-section h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #1e3a8a; /* Azul oscuro */
    }

    .header-section p {
        font-size: 1.1rem;
        color: #4b5563; /* Gris medio */
    }

    .badge-custom {
        background-color: #e5e7eb;
        color: #1f2937;
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        display: inline-block;
        margin-bottom: 1rem;
    }

    /* Cartas de características */
    .row-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        justify-content: center;
        margin-bottom: 3rem;
    }

    .card-custom {
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        padding: 2rem 1rem;
        width: 250px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .card-custom i {
        font-size: 2.5rem;
        color: #1e3a8a; /* Azul oscuro */
        margin-bottom: 1rem;
        transition: transform 0.3s;
    }

    .card-custom i:hover {
        transform: scale(1.2) rotate(10deg);
    }

    .card-custom h6 {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .card-custom p {
        color: #6b7280; /* Gris */
        font-size: 0.9rem;
    }

    /* Beneficios y detalles */
    .details-card {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 3rem 2rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        margin-bottom: 3rem;
    }

    .details-card h2 {
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 1.5rem;
    }

    .details-card p.lead {
        color: #4b5563;
        margin-bottom: 2rem;
    }

    .details-row {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        margin-bottom: 2rem;
        justify-content: center;
    }

    .details-item {
        width: 45%;
        min-width: 250px;
    }

    .details-item h5 {
        font-weight: 600;
        color: #111827;
        margin-bottom: 0.5rem;
    }

    .details-item h5 i {
        color: #1e3a8a;
        margin-right: 0.5rem;
    }

    .details-item p {
        font-size: 0.9rem;
        color: #6b7280;
    }

    /* CTA final */
    .cta-section {
        background-color: #e5e7eb;
        border-radius: 20px;
        padding: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .cta-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .cta-section h6 {
        font-weight: 600;
        color: #111827;
    }

    .cta-section p {
        font-size: 0.9rem;
        color: #6b7280;
    }

    .btn-cta {
        background-color: #1e3a8a;
        color: #ffffff;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: background 0.3s, transform 0.3s;
    }

    .btn-cta:hover {
        background-color: #2563eb;
        transform: translateY(-3px);
    }

</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl leading-tight text-center" style="color:#1e3a8a;">
            {{ __('Pack Supremo') }}
        </h2>
    </x-slot>

    <div class="container">
        <!-- Sección principal -->
        <div class="header-section">
            <span class="badge-custom">NIVEL EXCELENCIA</span>
            <h1>Pack Supremo</h1>
            <p>60€ / mes <strong style="color:#1e3a8a;">30% de descuento para colectivos especiales*</strong></p>
            <p>La experiencia definitiva con acompañamiento personalizado y alertas en tiempo real.</p>
        </div>

        <!-- Características -->
        <div class="row-cards">
            <div class="card-custom">
                <i class="bi bi-person-video3"></i>
                <h6>Mentoría 1 a 1</h6>
                <p>Sesión semanal personalizada</p>
            </div>
            <div class="card-custom">
                <i class="bi bi-broadcast"></i>
                <h6>Alertas VIP</h6>
                <p>Trading en vivo 24/7</p>
            </div>
            <div class="card-custom">
                <i class="bi bi-calculator"></i>
                <h6>Fiscalidad</h6>
                <p>Planificación avanzada</p>
            </div>
            <div class="card-custom">
                <i class="bi bi-infinity"></i>
                <h6>Acceso Total</h6>
                <p>Material vitalicio</p>
            </div>
        </div>

        <!-- Detalles y beneficios -->
        <div class="details-card">
            <h2>Exclusividad y Rendimiento: <span style="color:#1e3a8a;">Tu Camino al Élite</span></h2>
            <p class="lead">El Pack Supremo no es solo formación; es un <strong>acuerdo de acompañamiento</strong>. Diseñado para inversores que quieren maximizar su tiempo y su capital con el apoyo directo de mentores.</p>

            <div class="details-row">
                <div class="details-item">
                    <h5><i class="bi bi-star-fill"></i>Mentoría Individual</h5>
                    <p>Revisamos tu cartera y tus operaciones semanalmente. Un mentor dedicado para que nunca operes con dudas.</p>
                </div>
                <div class="details-item">
                    <h5><i class="bi bi-lightning-fill"></i>Señales Directas</h5>
                    <p>Acceso al canal de alertas premium. Copia nuestras tesis de inversión y opera con los mismos parámetros que los profesionales.</p>
                </div>
                <div class="details-item">
                    <h5><i class="bi bi-shield-check"></i>Optimización Fiscal</h5>
                    <p>No es cuánto ganas, sino cuánto mantienes. Te ayudamos a estructurar tus inversiones para pagar el mínimo legal de impuestos.</p>
                </div>
                <div class="details-item">
                    <h5><i class="bi bi-cloud-arrow-down-fill"></i>Biblioteca de Recursos</h5>
                    <p>Actualizaciones de por vida. Cada nueva estrategia o herramienta que lancemos estará disponible para ti sin coste extra.</p>
                </div>
            </div>

            <!-- CTA final -->
            <div class="cta-section">
                <h6>Es tu momento de crecer financieramente</h6>
                <p>Descubre las estrategias que utilizan los inversores más exitosos y lleva tus ingresos al siguiente nivel.</p>
            </div>

            


        </div>
        <!-- Estrategias de Inversores Exitosos -->
<div class="details-card">
    <h2>Estrateg/mis-planesias de los Inversores Más Exitosos</h2>
    <p class="lead">Conoce los hábitos, técnicas y mentalidades que permiten a los inversores de élite maximizar sus ingresos y proteger su capital.</p>

    <div class="details-row">
        <div class="details-item">
            <h5><i class="bi bi-diagram-3-fill"></i>Diversificación Inteligente</h5>
            <p>No poner todos los huevos en la misma canasta. Combina acciones, bonos, ETFs e inmuebles para reducir riesgos.</p>
        </div>
        <div class="details-item">
            <h5><i class="bi bi-clock-fill"></i>Inversión a Largo Plazo</h5>
            <p>Piensan en décadas, no en semanas. Mantienen activos sólidos durante años para aprovechar la apreciación y el interés compuesto.</p>
        </div>
        <div class="details-item">
            <h5><i class="bi bi-search"></i>Investigación Profunda</h5>
            <p>Estudian el negocio, balances y tendencias del sector antes de invertir. Priorizan valor intrínseco sobre precios temporales.</p>
        </div>/mis-planes
        <div class="details-item">
            <h5><i class="bi bi-shield-lock-fill"></i>Gestión de Riesgos</h5>
            <p>Definen límites de pérdida, equilibran la cartera y evitan decisiones impulsivas basadas en emociones.</p>
        </div>
        <div class="details-item">
            <h5><i class="bi bi-arrow-repeat"></i>Reinversión de Ganancias</h5>
            <p>En lugar de gastar, reinvierten los ingresos generados. El efecto compuesto multiplica el capital con el tiempo.</p>
        </div>
        <div class="details-item">
            <h5><i class="bi bi-cash-stack"></i>Estrategias Fiscales Inteligentes</h5>
            <p>Optimizar impuestos legalmente para maximizar lo que se mantiene. Usan fondos indexados y vehículos de inversión eficientes.</p>
        </div>
        <div class="details-item">
            <h5><i class="bi bi-people-fill"></i>Networking y Mentoría</h5>
            <p>Aprenden de otros inversores, comparten información y aprovechan insights exclusivos de comunidades de élite.</p>
        </div>/mis-planes
        <div class="details-item">
            <h5><i class="bi bi-wallet2"></i>Mantener Liquidez</h5>
            <p>Tener efectivo disponible para aprovechar oportunidades cuando el mercado cae o surgen inversiones atractivas.</p>
        </div>
        <div class="details-item">
            <h5><i class="bi bi-lightning-charge-fill"></i>Innovación y Adaptación</h5>
            <p>Atentos a nuevas tendencias y tecnologías. Adaptan estrategias sin perder principios fundamentales, invirtiendo en sectores emergentes.</p>
        </div>
        <div class="details-item">
            <h5><i class="bi bi-hourglass-split"></i>Disciplina y Paciencia</h5>
            <p>Siguen un plan definido y revisan la cartera periódicamente. No se dejan arrastrar por la euforia del mercado.</p>
        </div>
    </div>
</div>

        <div class="d-grid mt-auto">        
            <a href="/mis-planes" style="float:right" class="btn btn-info rounded-pill text-dark fw-bold btn-animate">Volver a los planes</a>
        </div>
    </div>

    
</x-app-layout>
