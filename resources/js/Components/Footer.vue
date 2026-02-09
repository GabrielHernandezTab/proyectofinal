<template>
    <footer class="text-white py-5" style="background-color: #0d1b2a; border-top: 1px solid rgba(255,255,255,0.05);">
      <div class="container">
        <div class="row g-4">
          
        <div class="col-lg-4 col-md-6">
            <div class="d-flex align-items-center mb-3">
                <img :src="'/imagenes/logo.png'" alt="Logo Footer" 
                    class="rounded-circle me-2"
                    style="width: 40px; height: 40px; object-fit: cover; border: 1px solid rgba(0,209,178,0.3);">
                <h5 class="mb-0 fw-bold">Gen Trading</h5>
            </div>
            <p class="text-secondary small" style="line-height: 1.6;">
                Tu academia de formación en inversiones y trading profesional. 
                Aprende a invertir de forma segura e inteligente.
            </p>
        </div>
  
          <div class="col-lg-4 col-md-6">
            <h5 class="mb-3 fw-bold">Contacto</h5>
            <ul class="list-unstyled">
              <li class="mb-2 d-flex align-items-center text-secondary small">
                <i class="bi bi-envelope me-2 text-info"></i> info@gentrading.com
              </li>
              <li class="mb-2 d-flex align-items-center text-secondary small">
                <i class="bi bi-telephone me-2 text-info"></i> +34 928 45 54 21
              </li>
              <li class="d-flex align-items-center text-secondary small">
                <i class="bi bi-geo-alt me-2 text-info"></i> Arrecife, Lanzarote, España
              </li>
            </ul>
          </div>
  
          <div class="col-lg-4 col-md-12">
            <h5 class="mb-3 fw-bold">Legal</h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="#" class="text-secondary small text-decoration-none hover-link">Términos y Condiciones</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-secondary small text-decoration-none hover-link">Política de Privacidad</a>
              </li>
              <li>
                <a href="#" class="text-secondary small text-decoration-none hover-link">Aviso Legal</a>
              </li>
            </ul>
          </div>
  
        </div>
  
        <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
  
        <div class="text-center">
          <p class="small text-secondary mb-1">© 2026 Gen Trading. Todos los derechos reservados.</p>
          <p class="text-secondary" style="font-size: 0.7rem; opacity: 0.6;">
            Advertencia: Las inversiones conllevan riesgos. El rendimiento pasado no garantiza resultados futuros.
          </p>
        </div>
      </div>
    </footer>
  </template>
  
  <style scoped>
  .hover-link:hover {
    color: #00d1b2 !important;
    transition: color 0.3s ease;
  }
  </style>