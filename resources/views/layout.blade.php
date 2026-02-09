<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
body {
    padding-top: 0; /* Quitamos el hueco blanco arriba */
}

html {
    scroll-behavior: smooth;
}

/* Le damos aire a la portada para que el texto no quede justo debajo del menú flotante */
.hero-section, #portada {
    padding-top: 160px !important; 
}
</style>
</head>
<body class="bg-light">
    <div id="app">
        <header class="fixed-header">
            @include('navbar')
        </header>

        <main>
            @yield('contenido')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>