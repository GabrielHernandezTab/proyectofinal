<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">

<style>
/* Fondo gris oscuro elegante */
#mySidebar {
    background-color: #2c2f33;
}

/* Texto blanco */
#mySidebar a,
#mySidebar p,
#mySidebar button {
    color: white;
}

/* Hover más claro */
#mySidebar a:hover {
    background-color: #40444b;
}
</style>

<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left"
     style="display:none"
     id="mySidebar">

  <button class="w3-bar-item w3-button w3-large"
          onclick="w3_close()">
      Cerrar &times;
  </button>

  <a href="{{ route('usuarios.planes') }}" class="w3-bar-item w3-button">
      Acceder al curso
  </a>

  <a href="{{ route('donacion.formulario') }}" class="w3-bar-item w3-button">
      Realizar Donación
  </a>
  <a href="{{ route('welcome') }}" class="w3-bar-item w3-button">
      Página Principal
  </a>

  @role('admin')
      <hr style="border-color:#555;">

      <p class="w3-bar-item">Zona de administración</p>

      <a href="{{ route('usuarios.index') }}" class="w3-bar-item w3-button">
          Usuarios
      </a>

      <a href="{{ route('administradores.index') }}" class="w3-bar-item w3-button">
          Administradores
      </a>

      <a href="{{ route('cursos.index') }}" class="w3-bar-item w3-button">
          Cursos creados
      </a>

      <a href="{{ route('admin.donantes.index') }}" class="w3-bar-item w3-button">
          Donantes
      </a>
  @endrole

</div>

<div id="main">
  <button id="openNav"
          class="w3-button w3-xlarge"
          onclick="w3_open()">
      &#9776;
  </button>
</div>

<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}

function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>

</body>
