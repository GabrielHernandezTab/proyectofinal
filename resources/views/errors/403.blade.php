<x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    .error-403-wrapper {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px 24px;
        background: linear-gradient(135deg, #0d1b2a 0%, #132337 100%);
    }
    .error-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px;
        padding: 56px 48px;
        max-width: 560px;
        width: 100%;
        text-align: center;
        backdrop-filter: blur(10px);
    }
    .lock-circle {
        width: 96px;
        height: 96px;
        background: linear-gradient(135deg, #1a3a2a, #1DB954);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 28px;
        font-size: 42px;
    }
    .error-code {
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #1DB954;
        margin-bottom: 12px;
    }
    .error-title {
        font-size: 28px;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 16px;
        line-height: 1.3;
    }
    .error-msg {
        font-size: 15px;
        color: #a8b8c8;
        line-height: 1.75;
        margin-bottom: 36px;
    }
    .btn-volver {
        display: inline-block;
        background-color: #1DB954;
        color: #ffffff !important;
        padding: 14px 36px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 700;
        letter-spacing: 0.4px;
        transition: background 0.2s;
    }
    .btn-volver:hover {
        background-color: #17a349;
    }
    .progress-info {
        margin-top: 32px;
        padding: 20px 24px;
        background: rgba(29,185,84,0.07);
        border: 1px solid rgba(29,185,84,0.2);
        border-radius: 12px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        text-align: left;
    }
    .progress-info i {
        color: #1DB954;
        font-size: 18px;
        margin-top: 2px;
        flex-shrink: 0;
    }
    .progress-info p {
        color: #a8b8c8;
        font-size: 13px;
        line-height: 1.6;
        margin: 0;
    }
</style>

<div class="error-403-wrapper">
    <div class="error-card">

        <div class="lock-circle">🔒</div>

        <div class="error-code">Error 403 — Acceso restringido</div>

        <h1 class="error-title">Este contenido aún no está disponible</h1>

        <p class="error-msg">
            {{ $exception->getMessage() }}
        </p>

        <a href="{{ route('usuarios.planes') }}" class="btn-volver">
            Ver mis planes disponibles
        </a>

        <div class="progress-info">
            <i class="bi bi-info-circle-fill"></i>
            <p>
                Los packs se desbloquean automáticamente con el tiempo: 
                <strong style="color:#ffffff;">Pack Avanzado</strong> tras 2 semanas y 
                <strong style="color:#ffffff;">Pack Supremo</strong> tras 2 meses desde tu registro. 
                No necesitas hacer nada, el sistema lo actualiza solo.
            </p>
        </div>

    </div>
</div>

</x-app-layout>