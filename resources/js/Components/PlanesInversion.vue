<template>
    <div class="row g-4 py-5">
      <div class="col-12 text-center mb-4">
        <h2 class="text-secondary fw-light">Nuestros Planes</h2>
      </div>
      
      <div class="col-md-4" v-for="plan in ['Estudiante', 'Trabajador', 'Jubilado']" :key="plan">
        <div class="card h-100 border-0 shadow-sm bg-light text-secondary">
          <div class="card-body text-center p-4">
            <h5 class="fw-bold">{{ plan.toUpperCase() }}</h5>
            <hr class="my-4">
            <p>Accede a las herramientas de trading diseñadas para tu perfil.</p>
            <button class="btn btn-outline-secondary w-100 mt-3">Saber más</button>
          </div>
        </div>
      </div>
    </div>
  </template>