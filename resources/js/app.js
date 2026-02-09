import './bootstrap';
import { createApp } from 'vue';
import PlanesInversion from './Components/PlanesInversion.vue';
import Portada from './Components/Portada.vue';

// Importar Alpine por si Gabriel lo usa
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

const app = createApp({});

// Asegúrate de que el nombre coincida con la etiqueta que usas en Blade
app.component('planes-inversion', PlanesInversion);
app.component('portada-section', Portada);

app.mount('#app');