<template>
  <div class="anuncios">
    <h3 class="text-center mb-3">Anuncios</h3>

    <div class="row g-3">
      <!-- Generar anuncios desde el array -->
      <div v-for="anuncio in anuncios" :key="anuncio.id" class="col-md-4">
        <div class="card h-100 shadow-sm p-3 text-center">
          <!-- Imagen del anuncio -->
          <img v-if="anuncio.imagen" :src="anuncio.imagen" class="card-img-top mb-3 rounded" alt="Imagen del anuncio">
          <h5 class="card-title fw-bold">{{ anuncio.titulo }}</h5>
          <p class="card-text">{{ anuncio.descripcion }}</p>
          <a v-if="anuncio.enlace" :href="anuncio.enlace" target="_blank" class="btn btn-primary btn-animate rounded-pill fw-bold mt-2">
            {{ anuncio.botonTexto || 'Ver más' }}
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Anuncios",
  data() {
    return {
      anuncios: [
        {
            id: 1,
            titulo: "Descuento en Hosting",
            descripcion: "Aprovecha hasta un 50% de descuento en planes de hosting con IONOS. Ideal para tu web o proyecto Laravel.",
            enlace: "https://www.ionos.es/alojamiento/deploy-now#packs",
            botonTexto: "Ver oferta",
            imagen: "/imagenes/ionos.png"
        },
        { 
            id: 2, 
            titulo: "Curso introductorio de Docker", 
            descripcion: "Descubre Docker desde cero y aprende a crear, ejecutar y gestionar contenedores para desplegar aplicaciones de forma rápida, segura y profesional. Ideal para desarrolladores que quieren mejorar su flujo de trabajo y preparar proyectos reales.",
            enlace: "https://openwebinars.net/cursos/docker-introduccion/",
            botonTexto: "Inscribirme",
            imagen: "/imagenes/docker.png"
        },
        { 
            id: 3, 
            titulo: "Formación en programación", 
            descripcion: "Curso avanzado de Vue 3 y Laravel, práctica real con proyectos.", 
            enlace: "https://www.mdigital.es/cursos-coding-programacion?piloto=640&utm_source=google&utm_medium=cpc&utm_campaign=22997541332&utm_content=773158757433&utm_term=p_curso%20de%20programacion&adgrp=185582121976&adpos=&adpos=&extension=&locphisical=9048993&placement=&gad_source=1&gad_campaignid=22997541332&gbraid=0AAAAADvbdMjTciP75rzwGs2u49XQZn0R2&gclid=CjwKCAiAkbbMBhB2EiwANbxtbYYO0wAJUSZ7A1XOd1pxQEcHmsxp9aEViu8ukkqprv9R5JfyWLVPQxoC0kIQAvD_BwE",
            botonTexto: "Inscribirme",
            imagen: "/imagenes/mdigital.png"
        },
      ],
    };
  },
};
</script>

<style scoped>
.card-img-top {
  width: 100%;
  max-height: 160px;       /* Limita el alto */
  object-fit: contain;     /* Mantiene proporción sin recortar */
  padding: 10px;           /* Espacio interno tipo anuncio */
  background-color: #f8f9fa; /* Fondo suave para que no quede vacío */
  border-radius: 10px;
}

.card {
  transition: transform 0.3s ease;
  border: none;
  border-radius: 15px;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}

.btn-animate {
  transition: all 0.3s ease;
}

.btn-animate:hover {
  transform: scale(1.05);
  filter: brightness(1.1);
}

</style>
