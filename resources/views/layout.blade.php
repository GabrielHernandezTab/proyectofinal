    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
        <title>@yield('titulo')</title>
         <link rel="icon" type="image/webp" href="{{ asset('imagenes/logo.webp') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

        

    <style>
    body { padding-top: 0; }
    html { scroll-behavior: smooth; }
    .hero-section, #portada { padding-top: 160px !important; }

    /* Restaurar .collapse de Bootstrap que Tailwind sobreescribe */
.collapse {
    visibility: visible !important;
}
.navbar-collapse.collapse:not(.show) {
    display: none !important;
    visibility: visible !important;
}
@media (min-width: 992px) {
    .navbar-collapse.collapse {
        display: flex !important;
        visibility: visible !important;
    }
}

    @media (max-width: 767px) {
    .table-responsive { font-size: 0.8rem; }
    .section-spacer { height: 40px !important; }
    }

    #navbarNav { display: none; }
    #navbarNav.show { display: block !important; }
    @media (min-width: 992px) {
        #navbarNav { display: flex !important; }
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