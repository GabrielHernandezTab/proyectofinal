<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GeN Trading') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            /* Fondo con el azul oscuro de GeN Trading */
            .auth-bg {
                background: radial-gradient(circle, #1a2b4b 0%, #0a192f 100%);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            /* Tarjeta blanca del formulario */
            .auth-card {
                background-color: white;
                padding: 2rem;
                border-radius: 20px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.3);
                width: 100%;
                max-width: 400px;
            }


            .input-suave {
                border-radius: 12px !important; /* Bordes redondeados */
                border: 1px solid #ced4da !important; /* Color gris suave */
                padding: 12px 15px !important; /* Más espacio interno para que sea 'suave' */
                background-color: #f8f9fa !important; /* Fondo ligeramente gris para que resalte */
                box-shadow: inset 0 1px 2px rgba(0,0,0,0.075); /* Sombra interna sutil */
                width: 100%;
                margin-bottom: 15px;
                outline: none;
            }

            .input-suave:focus {
                border-color: #00b36b !important; /* El borde se vuelve verde al pinchar */
                box-shadow: 0 0 8px rgba(0, 179, 107, 0.2) !important;
            }
        </style>
    </head>
    <body>
        <div class="auth-bg">
            <div class="mb-4">
                <a href="/">
                    <x-application-logo />
                </a>
            </div>

            <div class="auth-card">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>