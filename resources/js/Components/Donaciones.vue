<template>
    <section id="donaciones" class="py-5" style="background-color: #0d1b2a; min-height: 50vh; display: flex; align-items: center;">
      <div class="container text-center">
        
        <div class="mb-5">
          <h2 class="display-5 fw-bold text-white">Área de Donaciones</h2>
          <p class="text-white-50 fs-5">Apoya el desarrollo de la plataforma GeN Trading</p>
        </div>

        <div v-if="!estaLogueado" class="p-4 rounded-4" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
            <p class="fs-5 text-white mb-4">
                Para apoyar el proyecto, por favor inicia sesión.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="/login" class="btn btn-success btn-lg px-5 rounded-pill fw-bold">Login</a>
                <a href="/register" class="btn btn-outline-light btn-lg px-5 rounded-pill fw-bold">Registro</a>
            </div>
        </div>

        <div v-else class="p-4 rounded-4" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
            <p class="fs-5 text-white mb-4">¡Gracias por tu apoyo! Selecciona la cantidad:</p>
            <div class="row g-3 justify-content-center">
                <div v-for="cantidad in [10, 20, 50]" :key="cantidad" class="col-md-3">
                    <button class="btn btn-outline-success w-100 py-3 fw-bold text-white border-2">
                        {{ cantidad }}€
                    </button>
                </div>
            </div>
        </div>
      </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';
const estaLogueado = ref(false); 
</script>