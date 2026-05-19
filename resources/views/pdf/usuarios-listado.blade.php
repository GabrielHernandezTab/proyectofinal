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
        .header {
            background: #1a1a2e;
            color: white;
            padding: 20px 30px;
        }
        .header h1 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .header p {
            font-size: 10px;
            color: #a0aec0;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .stats-bar {
            background: #f7fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 10px 30px;
            display: table;
            width: 100%;
        }
        .stat-item {
            display: table-cell;
            text-align: center;
            border-right: 1px solid #e2e8f0;
            padding: 0 15px;
        }
        .stat-item:first-child { padding-left: 0; text-align: left; }
        .stat-item:last-child { border-right: none; padding-right: 0; text-align: right; }
        .stat-number {
            font-size: 18px;
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
        .body {
            padding: 20px 30px;
        }
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
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 10px;
            text-align: left;
            font-weight: 700;
        }
        .users-table td {
            padding: 8px 10px;
            font-size: 11px;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
        }
        .users-table tr:nth-child(even) td {
            background: #f7fafc;
        }
        .col-id { width: 8%; color: #718096; font-size: 10px; }
        .col-nombre { width: 25%; font-weight: 600; }
        .col-email { width: 35%; color: #4a5568; }
        .col-rol { width: 15%; }
        .col-fecha { width: 17%; color: #718096; font-size: 10px; }
        .role-badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .role-admin { background: #fef3c7; color: #92400e; border: 1px solid #f59e0b; }
        .role-usuario { background: #e0f2fe; color: #075985; border: 1px solid #38bdf8; }
        .role-gestor { background: #f0fdf4; color: #166534; border: 1px solid #4ade80; }
        .role-other { background: #f3f4f6; color: #374151; border: 1px solid #9ca3af; }
        .footer {
            border-top: 2px solid #e2e8f0;
            padding: 10px 30px;
            font-size: 9px;
            color: #a0aec0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Listado de Usuarios</h1>
        <p>Informe administrativo - Uso interno</p>
    </div>

    @php
        $total = count($usuarios);
        $admins = 0;
        $gestores = 0;
        $normales = 0;
        foreach($usuarios as $u) {
            $r = strtolower($u->rol ?? '');
            if($r == 'admin') $admins++;
            elseif($r == 'gestor') $gestores++;
            elseif($r == 'usuario') $normales++;
        }
    @endphp
    <div class="stats-bar">
        <div class="stat-item">
            <span class="stat-number">{{ $total }}</span>
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
                            @if($rol == 'admin')
                                <span class="role-badge role-admin">Admin</span>
                            @elseif($rol == 'gestor')
                                <span class="role-badge role-gestor">Gestor</span>
                            @elseif($rol == 'usuario')
                                <span class="role-badge role-usuario">Usuario</span>
                            @else
                                <span class="role-badge role-other">{{ ucfirst($usuario->rol) }}</span>
                            @endif
                        </td>
                        <td class="col-fecha">{{ $usuario->created_at ? $usuario->created_at->format('d/m/Y') : '-' }}</td>
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

    <div class="footer">
        Documento confidencial de uso exclusivo para administradores. No distribuir.<br>
        Generado automaticamente por el sistema el {{ now()->format('d/m/Y') }}.
    </div>
</body>
</html>