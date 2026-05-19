<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Listado de Usuarios</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #1a1a2e;
            background: #ffffff;
        }

        /* ── CABECERA ── */
        .header {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 60%, #0f3460 100%);
            color: white;
            padding: 25px 35px;
        }
        .header-inner {
            display: table;
            width: 100%;
        }
        .header-left {
            display: table-cell;
            vertical-align: middle;
            width: 65%;
        }
        .header-left h1 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .header-left p {
            font-size: 10px;
            color: #a0aec0;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .header-right {
            display: table-cell;
            vertical-align: middle;
            text-align: right;
            width: 35%;
        }
        .header-right .meta {
            font-size: 10px;
            color: #a0aec0;
            line-height: 1.8;
        }
        .header-right .meta strong {
            color: white;
        }

        /* ── BARRA ESTADÍSTICAS ── */
        .stats-bar {
            background: #f7fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 14px 35px;
            display: table;
            width: 100%;
        }
        .stat-item {
            display: table-cell;
            text-align: center;
            border-right: 1px solid #e2e8f0;
            padding: 0 20px;
        }
        .stat-item:first-child { padding-left: 0; text-align: left; }
        .stat-item:last-child { border-right: none; padding-right: 0; text-align: right; }
        .stat-number {
            font-size: 20px;
            font-weight: 700;
            color: #1a1a2e;
            display: block;
        }
        .stat-label {
            font-size: 9px;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ── CUERPO ── */
        .body {
            padding: 25px 35px;
        }

        /* ── TABLA ── */
        .users-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .users-table thead tr {
            background: #1a1a2e;
        }
        .users-table th {
            color: white;
            font-size: 9px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 11px 12px;
            text-align: left;
            font-weight: 700;
        }
        .users-table td {
            padding: 10px 12px;
            font-size: 11px;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
        }
        .users-table tr:nth-child(even) td {
            background: #f7fafc;
        }
        .users-table tr:hover td {
            background: #ebf4ff;
        }

        /* Columna ID */
        .col-id {
            width: 6%;
            color: #718096;
            font-size: 10px;
        }
        /* Columna NOMBRE */
        .col-nombre {
            width: 26%;
            font-weight: 600;
        }
        /* Columna EMAIL */
        .col-email {
            width: 33%;
            color: #4a5568;
        }
        /* Columna ROL */
        .col-rol { width: 14%; }
        /* Columna FECHA */
        .col-fecha {
            width: 21%;
            color: #718096;
            font-size: 10px;
        }

        /* BADGE DE ROL */
        .role-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .role-admin {
            background: #fef3c7;
            color: #92400e;
            border: 1px solid #f59e0b;
        }
        .role-usuario {
            background: #e0f2fe;
            color: #075985;
            border: 1px solid #38bdf8;
        }
        .role-gestor {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #4ade80;
        }
        .role-other {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #9ca3af;
        }

        /* ── PIE ── */
        .footer {
            border-top: 2px solid #e2e8f0;
            padding: 14px 35px;
            display: table;
            width: 100%;
        }
        .footer-left {
            display: table-cell;
            vertical-align: middle;
            font-size: 9px;
            color: #a0aec0;
            width: 70%;
        }
        .footer-right {
            display: table-cell;
            vertical-align: middle;
            text-align: right;
            font-size: 9px;
            color: #a0aec0;
            width: 30%;
        }

        /* ── PÁGINA ── */
        @page {
            margin: 0;
        }

        /* Número de página si dompdf lo soporta */
        .page-number:after {
            content: counter(page);
        }
    </style>
</head>
<body>

    {{-- CABECERA --}}
    <div class="header">
        <div class="header-inner">
            <div class="header-left">
                <h1>👥 Listado de Usuarios</h1>
                <p>Informe administrativo — Uso interno</p>
            </div>
            <div class="header-right">
                <div class="meta">
                    <strong>Fecha de generación</strong><br>
                    {{ now()->format('d/m/Y H:i') }}<br><br>
                    <strong>Total de usuarios</strong><br>
                    {{ $usuarios->count() }}
                </div>
            </div>
        </div>
    </div>

    {{-- BARRA DE ESTADÍSTICAS --}}
    @php
        $admins   = $usuarios->where('rol', 'Admin')->count();
        $gestores = $usuarios->where('rol', 'Gestor')->count();
        $normales = $usuarios->where('rol', 'Usuario')->count();
        $otros    = $usuarios->count() - $admins - $gestores - $normales;
    @endphp
    <div class="stats-bar">
        <div class="stat-item">
            <span class="stat-number">{{ $usuarios->count() }}</span>
            <span class="stat-label">Total</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $admins }}</span>
            <span class="stat-label">Admins</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $gestores }}</span>
            <span class="stat-label">Gestores</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $normales }}</span>
            <span class="stat-label">Usuarios</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ now()->format('d/m/Y') }}</span>
            <span class="stat-label">Generado</span>
        </div>
    </div>

    <div class="body">
        <table class="users-table">
            <thead>
                <tr>
                    <th class="col-id">#</th>
                    <th class="col-nombre">Nombre</th>
                    <th class="col-email">Email</th>
                    <th class="col-rol">Rol</th>
                    <th class="col-fecha">Registro</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usuarios as $usuario)
                    <tr>
                        <td class="col-id">{{ $usuario->id }}</td>
                        <td class="col-nombre">{{ $usuario->nombre }}</td>
                        <td class="col-email">{{ $usuario->email }}</td>
                        <td class="col-rol">
                            @php
                                $rol = strtolower($usuario->rol ?? 'usuario');
                            @endphp
                            @if($rol === 'admin')
                                <span class="role-badge role-admin">Admin</span>
                            @elseif($rol === 'gestor')
                                <span class="role-badge role-gestor">Gestor</span>
                            @elseif($rol === 'usuario')
                                <span class="role-badge role-usuario">Usuario</span>
                            @else
                                <span class="role-badge role-other">{{ ucfirst($usuario->rol) }}</span>
                            @endif
                        </td>
                        <td class="col-fecha">{{ $usuario->created_at ? $usuario->created_at->format('d/m/Y') : '—' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center; color:#718096; padding:30px;">
                            No hay usuarios registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PIE DE PÁGINA --}}
    <div class="footer">
        <div class="footer-left">
            Documento confidencial de uso exclusivo para administradores. No distribuir.<br>
            Generado automáticamente por el sistema el {{ now()->format('d/m/Y \a \l\a\s H:i') }}.
        </div>
        <div class="footer-right">
            Página <span class="page-number"></span>
        </div>
    </div>

</body>
</html>