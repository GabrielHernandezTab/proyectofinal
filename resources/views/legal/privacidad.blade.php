@extends('layout')

@section('titulo', 'Política de Privacidad - Gen Trading')

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

    .privacy-highlight {
        border: 1px solid #e2e8f0;
        background-color: #f1f5f9;
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

    .subsection-title {
        color: #0e2f53;
        font-weight: 700;
        font-size: 1.1rem;
        margin-top: 1.5rem;
        display: block;
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
<br><br><br><br><br>
<div class="legal-container">
    <div class="container-fluid-custom">
        <div class="row justify-content-center m-0">
            <div class="col-12 col-md-11 col-lg-10 col-xl-8 p-0">
                <div class="card legal-card shadow-lg p-3 p-sm-4 p-md-5">
                    
                    <div class="text-center mb-5">
                        <h1 class="fw-bold text-dark mb-3" style="font-size: clamp(1.8rem, 5vw, 2.8rem); letter-spacing: -1px;">Política de Privacidad</h1>
                        <p class="text-uppercase text-muted fw-bold tracking-widest" style="font-size: 0.8rem; opacity: 0.7;">
                            Protección de Datos Personales • Gen Trading
                        </p>
                        <div class="d-inline-flex align-items-center bg-light border rounded-pill px-4 py-2 shadow-sm">
                            <span class="text-dark small fw-bold"><i class="bi bi-shield-lock me-2 text-primary"></i>Actualización: {{ date('d/m/Y') }}</span>
                        </div>
                    </div>

                    <div class="legal-text">
                        
                        <p class="lead mb-5 text-center px-lg-5">
                            En <strong>Gen Trading</strong>, la privacidad de nuestros usuarios es una prioridad absoluta. Este documento detalla cómo recopilamos, utilizamos y protegemos su información.
                        </p>

                        <section class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-number me-3 shadow-sm">01</div>
                                <h2 class="h4 mb-0 text-dark fw-bold text-uppercase">Información que Recopilamos</h2>
                            </div>
                            <p class="text-justify">
                                Recopilamos información necesaria para proporcionar un servicio óptimo y seguro. Esto incluye:
                            </p>
                            <ul class="list-unstyled ms-3">
                                <li class="mb-2"><i class="bi bi-check2-circle me-2 text-primary"></i> <strong>Datos de Registro:</strong> Nombre, correo electrónico y credenciales de acceso.</li>
                                <li class="mb-2"><i class="bi bi-check2-circle me-2 text-primary"></i> <strong>Datos Técnicos:</strong> Dirección IP, tipo de navegador y tiempos de acceso (mediante cookies).</li>
                                <li class="mb-2"><i class="bi bi-check2-circle me-2 text-primary"></i> <strong>Preferencias de Trading:</strong> Datos sobre activos de interés para personalizar sus señales.</li>
                            </ul>
                        </section>

                        <section class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-number me-3 shadow-sm">02</div>
                                <h2 class="h4 mb-0 text-dark fw-bold text-uppercase">Uso de los Datos</h2>
                            </div>
                            
                                <p class="mb-0">
                                    Utilizamos su información exclusivamente para la mejora de nuestros algoritmos. <strong>Nunca vendemos sus datos personales a terceros con fines comerciales.</strong>
                                </p>
                          
                        </section>

                        <section class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-number me-3 shadow-sm">03</div>
                                <h2 class="h4 mb-0 text-dark fw-bold text-uppercase">Seguridad y Encriptación</h2>
                            </div>
                            <p class="text-justify">
                                Implementamos protocolos de seguridad industrial (encriptación SSL) para proteger sus datos. Sin embargo, como plataforma que integra APIs externas y servicios publicitarios, recordamos al usuario que ningún sistema de transmisión de datos por internet es 100% infalible.
                            </p>
                        </section>

                        <section class="mb-5 border-top pt-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="section-number me-3 shadow-sm">04</div>
                                <h2 class="h5 mb-0 text-dark fw-bold text-uppercase">Sus Derechos</h2>
                            </div>
                            <p class="text-justify small text-muted">
                                Usted tiene derecho a acceder, rectificar, cancelar u oponerse al tratamiento de sus datos personales. Para ejercer estos derechos o solicitar la eliminación definitiva de su cuenta y datos asociados, puede contactarnos directamente o darse de baja en su perfil de usuario.
                            </p>
                        </section>

                    </div>

                    <div class="mt-5 pt-4 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center gap-4">
                        <a href="{{ url('/') }}" class="btn btn-dark rounded-pill px-5 py-3 fw-bold shadow hover-lift transition-all w-100 w-sm-auto text-uppercase tracking-tighter">
                            Aceptar y Volver
                        </a>
                    </div>

                </div>
                
                <p class="text-center mt-4 text-muted small opacity-50">&copy; {{ date('Y') }} Gen Trading. Su privacidad es nuestro compromiso técnico.</p>
            </div>
        </div>
    </div>
</div>
@endsection