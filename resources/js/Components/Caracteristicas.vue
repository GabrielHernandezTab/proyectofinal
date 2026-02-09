<template>
    <section id="caracteristicas" class="py-5 bg-white">
      <div class="container mt-4">
        <div class="text-center mb-5">
          <h2 class="display-5 fw-bold" style="color: #0d1b2a;">Características</h2>
          <p class="text-muted fs-5">Ofrecemos formación completa y profesional para todos los niveles de inversión</p>
        </div>
  
        <div class="row g-4">
          <div class="col-md-4" v-for="(item, index) in items" :key="index">
            <div class="card h-100 border-0 shadow-sm p-4" style="background-color: #f8f9fa; border-radius: 15px;">
              <div class="icon-box mb-3 d-flex align-items-center justify-content-center shadow-sm" 
                   :style="{ backgroundColor: item.color, width: '50px', height: '50px', borderRadius: '10px' }">
                <i :class="['bi', item.icon, 'text-white fs-4']"></i>
              </div>
              <h5 class="fw-bold mb-2" style="color: #0d1b2a;">{{ item.titulo }}</h5>
              <p class="text-secondary small mb-0">{{ item.desc }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  const items = [
    { titulo: 'Cursos Estructurados', icon: 'bi-book', color: '#1a237e', desc: 'Contenido organizado de menor a mayor dificultad para un aprendizaje progresivo' },
    { titulo: 'Clases Personalizadas', icon: 'bi-people', color: '#283593', desc: 'Videollamadas individuales en el pack supremo para resolver tus dudas' },
    { titulo: 'Ejemplos Reales', icon: 'bi-trophy', color: '#3949ab', desc: 'Casos prácticos y ejemplos aplicados a situaciones reales del mercado' },
    { titulo: 'Inversión Segura', icon: 'bi-shield-check', color: '#1a237e', desc: 'Aprende a minimizar riesgos y a invertir de manera responsable' },
    { titulo: 'Análisis Técnico', icon: 'bi-graph-up-arrow', color: '#283593', desc: 'Domina gráficos, patrones de mercado y estrategias profesionales' },
    { titulo: 'Educación Financiera', icon: 'bi-mortarboard', color: '#3949ab', desc: 'Conocimientos sobre fiscalidad y gestión financiera personal' }
  ];
  </script>