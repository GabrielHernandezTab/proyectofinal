@extends('layout')

@section('titulo', 'Aviso Legal - Gen Trading')

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

    .info-box {
        border: 1px solid #e2e8f0;
        background-color: #f8fafc;
        border-radius: 12px;
        padding: clamp(1rem, 2vw, 1.5rem);
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
<br><br><br><br><br><br>
<div class="legal-container">
    <div class="container-fluid-custom">
        <div class="row justify-content-center m-0">
            <div class="col-12 col-md-11 col-lg-10 col-xl-8 p-0">
                <div class="card legal-card shadow-lg p-3 p-sm-4 p-md-5">
                    
                    <div class="text-center mb-5">
                        <h1 class="fw-bold text-dark mb-3" style="font-size: clamp(1.8rem, 5vw, 2.8rem); letter-spacing: -1px;">Aviso Legal</h1>
                        <p class="text-uppercase text-muted fw-bold tracking-widest" style="font-size: 0.8rem; opacity: 0.7;">
                            Información General y Condiciones de Uso • Gen Trading
                        </p>
                        <div class="d-inline-flex align-items-center bg-light border rounded-pill px-4 py-2 shadow-sm">
                            <span class="text-dark small fw-bold"><i class="bi bi-info-circle me-2 text-primary"></i>Versión Informativa: {{ date('Y') }}</span>
                        </div>
                    </div>

                    <div class="legal-text">
                        
                        <section class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-number me-3 shadow-sm">01</div>
                                <h2 class="h4 mb-0 text-dark fw-bold text-uppercase">Información Identificativa</h2>
                            </div>
                            <p class="mb-4">En cumplimiento con el deber de información, se exponen los siguientes datos del titular del sitio web:</p>
                            <div class="info-box shadow-sm">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><strong>Denominación:</strong> Gen Trading Group</li>
                                    <li class="mb-2"><strong>Email de contacto:</strong> info@gentrading.es</li>
                                    <li class="mb-2"><strong>Actividad:</strong> Desarrollo de software de análisis de mercados financieros y educación en trading.</li>
                                    <li><strong>Sostenibilidad:</strong> Proyecto financiado mediante alianzas publicitarias y contribuciones de la comunidad.</li>
                                </ul>
                            </div>
                        </section>

                        <section class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-number me-3 shadow-sm">02</div>
                                <h2 class="h4 mb-0 text-dark fw-bold text-uppercase">Condiciones de Uso</h2>
                            </div>
                            <p class="text-justify">
                                El acceso y uso de este portal atribuye la condición de <strong>USUARIO</strong>, que acepta, desde dicho acceso y/o uso, las Condiciones Generales de Uso aquí reflejadas. El Usuario asume la responsabilidad del uso del portal, lo que se extiende al registro que fuese necesario para acceder a determinados servicios o contenidos.
                            </p>
                        </section>

                        <section class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-number me-3 shadow-sm">03</div>
                                <h2 class="h4 mb-0 text-dark fw-bold text-uppercase">Propiedad Intelectual e Industrial</h2>
                            </div>
                            <p class="text-justify">
                                <strong>Gen Trading</strong> es titular de todos los derechos de propiedad intelectual e industrial de su página web, así como de los elementos contenidos en la misma (títulos, algoritmos, logotipos, combinaciones de colores, estructura y diseño). Quedan expresamente prohibidas la reproducción, la distribución y la comunicación pública de la totalidad o parte de los contenidos de esta página web con fines comerciales, en cualquier soporte y por cualquier medio técnico, sin la autorización previa por escrito.
                            </p>
                        </section>

                        <section class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-number me-3 shadow-sm">04</div>
                                <h2 class="h4 mb-0 text-dark fw-bold text-uppercase">Exclusión de Responsabilidad</h2>
                            </div>
                            <p class="text-justify">
                                Gen Trading no se hace responsable, en ningún caso, de los daños y perjuicios de cualquier naturaleza que pudieran ocasionar, a título enunciativo: errores u omisiones en los contenidos, falta de disponibilidad del portal o la transmisión de virus a pesar de haber adoptado todas las medidas tecnológicas necesarias para evitarlo. 
                            </p>
                            <div class="alert alert-dark border-0 rounded-3 mt-3 small p-3">
                                <i class="bi bi-info-square-fill me-2"></i> 
                                El uso de señales y datos de trading se realiza bajo la exclusiva responsabilidad del usuario. Los resultados pasados no garantizan rendimientos futuros.
                            </div>
                        </section>

                        <section class="mb-5 border-top pt-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="section-number me-3 shadow-sm">05</div>
                                <h2 class="h5 mb-0 text-dark fw-bold text-uppercase">Modificaciones</h2>
                            </div>
                            <p class="text-justify small text-muted">
                                Gen Trading se reserva el derecho de efectuar sin previo aviso las modificaciones que considere oportunas en su portal, pudiendo cambiar, suprimir o añadir tanto los contenidos y servicios que se presten a través de la misma como la forma en la que éstos aparezcan presentados o localizados en su portal.
                            </p>
                        </section>

                    </div>

                    <div class="mt-5 pt-4 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center gap-4">
                        <div class="text-center text-sm-start">
                            <p class="mb-0 text-muted small fw-bold text-uppercase">Contacto Administrativo</p>
                            <a href="mailto:info@gentrading.es" class="text-primary text-decoration-none small">info@gentrading.es</a>
                        </div>
                        <a href="{{ url('/') }}" class="btn btn-dark rounded-pill px-5 py-3 fw-bold shadow hover-lift transition-all w-100 w-sm-auto text-uppercase tracking-tighter">
                            Aceptar y Volver
                        </a>
                    </div>

                </div>
                
                <p class="text-center mt-4 text-muted small opacity-50">&copy; {{ date('Y') }} Gen Trading. Transparencia y rigor en cada algoritmo.</p>
            </div>
        </div>
    </div>
</div>
@endsection