<template>
    <section id="elegirnos" class="bg-white py-5">
      <div class="container mb-5">
        <div class="text-center">
          <h2 class="display-5 fw-bold" style="color: #0d1b2a;">¿Por qué elegirnos?</h2>
          <p class="text-muted fs-5">Descubre qué nos diferencia de las academias tradicionales</p>
        </div>
      </div>
  
      <div class="container mb-5">
        <div class="text-center mb-4">
          <h3 class="fw-bold">Gen Trading vs Competencia</h3>
          <p class="text-secondary">Hemos analizado las principales academias de trading en España. Aquí está la comparación real sin filtros:</p>
        </div>
        
        <div class="table-responsive shadow-sm" style="border-radius: 15px; overflow: hidden;">
          <table class="table align-middle mb-0">
            <thead style="background-color: #0d1b2a; color: white;">
              <tr>
                <th class="py-3 ps-4">Academia</th>
                <th class="py-3">Precio</th>
                <th class="py-3">Enfoque</th>
                <th class="py-3 pe-4">Limitación Principal</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in comparativa" :key="index" :class="{'table-success-custom': item.isMain}">
                <td class="py-3 ps-4 fw-bold">
                  <i v-if="item.isMain" class="bi bi-award text-success me-2"></i>
                  {{ item.nombre }}
                </td>
                <td class="py-3">
                  <span :class="{'fw-bold text-success': item.isMain}">{{ item.precio }}</span>
                  <br><small class="text-muted" v-if="item.subPrecio">{{ item.subPrecio }}</small>
                </td>
                <td class="py-3">
                  <span :class="{'fw-bold text-success': item.isMain}">{{ item.enfoque }}</span>
                  <br><small class="text-muted" v-if="item.subEnfoque">{{ item.subEnfoque }}</small>
                </td>
                <td class="py-3 pe-4">
                  <span v-if="item.isMain" class="text-success fw-bold"><i class="bi bi-check-circle-fill me-1"></i> {{ item.limite }}</span>
                  <span v-else>{{ item.limite }}</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  
      <div class="container">
        <div class="py-5 px-4 px-md-5 text-white shadow-lg" 
             style="background-color: #0d1b2a; border-radius: 50px;">
          
          <h3 class="text-center fw-bold mb-5" style="color: #00d1b2;">Las 4 Razones Para Elegirnos</h3>
  
          <div class="row g-4">
            <div class="col-md-6" v-for="(razon, index) in razones" :key="index">
              <div class="card h-100 p-4 border-0 shadow-sm" 
                   style="background-color: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1) !important; border-radius: 25px;">
                <div class="d-flex align-items-start">
                  <div class="rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" 
                       style="width: 45px; height: 45px; background-color: #00a878;">
                    <i :class="['bi', razon.icon, 'text-white fs-5']"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-3">{{ razon.titulo }}</h5>
                    <p class="mb-2"><span class="fw-bold text-white-50">La competencia:</span> {{ razon.competencia }}</p>
                    <p class="mb-0"><span class="fw-bold text-success">Gen Trading:</span> {{ razon.nosotros }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  const comparativa = [
    { nombre: 'Traders Business School', precio: 'Gratis (limitado) / 50€', enfoque: 'Trading Algorítmico, Criptomonedas', limite: 'Plazas limitadas en gratis, enfoque en criptos volátiles' },
    { nombre: 'CEEFI International', precio: '690-890€', enfoque: 'Order Flow institucional', limite: 'Muy caro, enfoque institucional complejo' },
    { nombre: 'UNED', precio: '50-60€ / 1130€', enfoque: 'Forex y Criptos', limite: 'Precios muy variables, enfoque en mercados volátiles' },
    { nombre: 'Instituto BME', precio: '45-75€', enfoque: 'Criptos', limite: 'Requiere asistencia presencial' },
    { 
      nombre: 'Gen Trading', 
      precio: 'Gratis / 35-60€', subPrecio: 'Sin trampa',
      enfoque: 'Bolsa e Inmuebles', subEnfoque: 'Bajo riesgo',
      limite: 'Sin limitaciones',
      isMain: true 
    }
  ];
  
  const razones = [
    { titulo: '1. Gratis de Verdad', icon: 'bi-check2-circle', competencia: '"Curso gratis" pero solo 20 plazas, luego 500-1130€.', nosotros: 'Pack gratuito ilimitado para siempre. Sin trampas.' },
    { titulo: '2. Inversión Segura', icon: 'bi-shield-check', competencia: 'Trading de criptos, Forex volátil, riesgo alto.', nosotros: 'Bolsa e inmuebles, estrategias probadas, bajo riesgo.' },
    { titulo: '3. Atención Personal', icon: 'bi-people', competencia: 'Clases presenciales obligatorias o videos pregrabados.', nosotros: 'Videoconferencias 1 a 1, análisis personalizados, 100% online.' },
    { titulo: '4. Precio Justo', icon: 'bi-currency-dollar', competencia: '500-1130€ por cursos básicos.', nosotros: '35-60€/mes con 15-30% descuento para estudiantes/jubilados.' }
  ];
  </script>
  
  <style scoped>
  .table-success-custom {
    background-color: #e8f5e9 !important;
    border: 2px solid #00a878 !important;
  }
  </style>