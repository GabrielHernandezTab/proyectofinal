<template>
    <div class="portada-container text-white text-center d-flex align-items-center justify-content-center">
      <div class="container position-relative" style="z-index: 2; margin-top: -50px;">
        
        <div class="mb-4 d-inline-block p-2 rounded-circle shadow-lg" style="background: rgba(0, 0, 0, 0.4); border: 1px solid rgba(255,255,255,0.1);">
          <div class="rounded-circle d-flex align-items-center justify-content-center" 
               style="width: 90px; height: 90px; background-color: #0d1b2a; border: 2px solid #00d1b2;">
            <span class="text-white fs-1 fw-bold" style="text-shadow: 0 0 10px #00d1b2;">G</span>
          </div>
        </div>
  
        <h1 class="display-2 fw-bold mb-3" style="letter-spacing: -1px;">Gen Trading</h1>
        <p class="fs-4 fw-light mb-5 mx-auto opacity-75" style="max-width: 750px; line-height: 1.4;">
          Aprende a invertir de forma inteligente y segura con nuestros cursos profesionales
        </p>
  
        <div class="d-flex justify-content-center gap-3 mt-4">
          <button class="btn btn-lg rounded-pill px-5 py-3 fw-bold d-flex align-items-center" 
                  style="background-color: #00a878; color: white; border: none; font-size: 1rem;">
             <i class="bi bi-bar-chart-fill me-2"></i> Ver Planes
          </button>
          
          <button class="btn btn-lg rounded-pill px-5 py-3 fw-bold border-white" 
                  style="background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.4); font-size: 1rem;">
            Conocer Más
          </button>
        </div>
      </div>
  
      <div class="wave-bottom">
        <svg viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg">
          <path fill="#ffffff" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,192C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,149.3C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
      </div>
    </div>
  </template>
  
  <style scoped>
  .portada-container {
    min-height: 90vh;
    /* El degradado azul oscuro de la foto */
    background: radial-gradient(circle at center, #1e3a8a 0%, #0d1b2a 100%);
    position: relative;
    overflow: hidden;
  }
  
  /* Efecto de líneas de trading suaves de fondo */
  .portada-container::before {
    content: "";
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');
    opacity: 0.1;
    pointer-events: none;
  }
  
  .wave-bottom {
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    line-height: 0;
  }
  </style>