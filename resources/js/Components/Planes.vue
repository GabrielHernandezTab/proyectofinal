<template>
    <section id="planes" class="py-5 bg-white">
      <div class="container">
        <div class="text-center mb-5">
          <h2 class="display-5 fw-bold" style="color: #0d1b2a;">Planes de Inversión</h2>
          <p class="text-muted">Elige el plan que mejor se adapte a tus objetivos financieros</p>
        </div>
  
        <div class="row g-4 align-items-center">
          <div v-for="(plan, index) in planes" :key="index" class="col-lg-4">
            <div :class="['card h-100 shadow-lg border-0 position-relative', plan.destacado ? 'bg-primary-dark text-white' : 'bg-white']" 
                 :style="plan.destacado ? 'background-color: #1a237e; border-radius: 20px; transform: scale(1.05); z-index: 10;' : 'border-radius: 20px;'">
              
              <div v-if="plan.destacado" class="position-absolute top-0 start-50 translate-middle">
                <span class="badge rounded-pill bg-success px-3 py-2">Más Popular</span>
              </div>
  
              <div class="card-body p-4 p-xl-5 text-center">
                <div class="mb-3">
                  <i :class="['bi', plan.icon, 'fs-1', plan.destacado ? 'text-info' : 'text-primary']"></i>
                </div>
                <h3 class="fw-bold mb-2">{{ plan.nombre }}</h3>
                <div class="display-5 fw-bold mb-1">{{ plan.precio }}</div>
                <p :class="['small mb-3', plan.destacado ? 'text-info' : 'text-muted']">{{ plan.subtitulo }}</p>
                
                <div v-if="plan.descuento" class="small mb-2 fw-bold" :style="plan.destacado ? 'color: #00e676;' : 'color: #00a878;'">
                  {{ plan.descuento }}
                </div>
                <div class="small mb-4 text-muted">{{ plan.horas }}</div>
  
                <hr :class="plan.destacado ? 'border-light' : ''">
  
                <ul class="list-unstyled text-start mb-4">
                  <li v-for="(feature, fIndex) in plan.features" :key="fIndex" class="mb-2 d-flex align-items-start">
                    <i class="bi bi-check-circle-fill me-2 text-success"></i>
                    <span class="small">{{ feature }}</span>
                  </li>
                </ul>
  
                <a :class="['btn w-100 py-3 fw-bold', plan.destacado ? 'btn-success' : 'btn-primary' ]"
                        style="border-radius: 12px;">
                  {{ plan.btnText }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mb-5">
        <br><br>
          <p class="text-muted">* Los descuentos se aplican presentando documentación acreditativa</p>
        </div>
        
    </section>
  </template>
  
  <script setup>
  const planes = [
    {
      nombre: 'Pack Gratuito',
      precio: 'Gratis',
      subtitulo: 'Siempre gratuito - Acceso básico',
      icon: 'bi-gift',
      horas: '',
      btnText: 'Empezar Gratis',
      destacado: false,
      features: [
        'Introducción sobre qué es invertir',
        'Composición del curso completo',
        'Ejemplos de inversión segura con poco capital',
        'Introducción ampliada sobre inversiones',
        'Conceptos: ¿Qué influye? ¿Por qué hay tanto mercado?',
        'Introducción básica a aplicaciones de inversión',
        'Iniciación a inversiones con bajo riesgo'
      ]
    },
    {
      nombre: 'Pack Avanzado',
      precio: 'Gratis',
      icon: 'bi-lightning-charge',
      horas: '60 horas de curso',
      btnText: '',
      destacado: true,
      features: [
        'Videos cada dos semanas (2 horas c/u)',
        'Curso progresivo de menos a más',
        'Diferentes servicios de inversión (eToro recomendado)',
        'Páginas fiables de información financiera',
        'Ejemplos según nivel de rentabilidad deseado',
        'Educación financiera personal',
        'Tipos de inversiones: Value Investing, Day Trading, Dividendo...',
        'Conocimientos sobre fiscalidad'
      ]
    },
    {
      nombre: 'Pack Supremo',
      precio: 'Gratis',
      icon: 'bi-crown',
      horas: '100 horas de curso',
      btnText: 'Acceso Premium',
      destacado: false,
      features: [
        '3 videos nuevos cada semana',
        'Clase personalizada por videoconferencia semanal',
        'Análisis profundo de datos e información',
        'Gráfico de inversión mensual',
        'Informe detallado del proceso cada mes',
        'Clases explicativas por videollamada',
        'Análisis técnico y fundamental avanzado',
        'Gestión y optimización de portafolio',
        'Estrategias de inversión profesional',
        'Herramientas avanzadas de toma de decisiones',
        'Fiscalidad avanzada y planificación fiscal'
      ]
    }
  ];
  </script>
  
  <style scoped>
  .bg-primary-dark {
    background-color: #0d1b2a !important; /* Azul marino de tu diseño */
  }
  .btn-primary {
    background-color: #0d1b2a !important;
    border: none;
  }
  .btn-success {
    background-color: #00a878 !important;
    border: none;
  }
  </style>