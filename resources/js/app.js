import './bootstrap';
import { createApp } from 'vue';
import Portada from './Components/Portada.vue';
import Caracteristicas from './Components/Caracteristicas.vue';
import Elegirnos from './Components/Elegirnos.vue';
import Planes from './Components/Planes.vue';
import Donaciones from './Components/Donaciones.vue';
import Footer from './Components/Footer.vue';
import Anuncios from './Components/Anuncios.vue';



// Importar Alpine por si Gabriel lo usa
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

const app = createApp({});

// Asegúrate de que el nombre coincida con la etiqueta que usas en Blade
app.component('portada-section', Portada);
app.component('caracteristicas-section', Caracteristicas);
app.component('elegirnos-section', Elegirnos);
app.component('planes-section', Planes);
app.component('footer-section', Footer);
app.component('donaciones-section', Donaciones);
app.component('anuncios-section', Anuncios);


app.mount('#app');


