<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Recibo de Donacion #{{ $donacion->id }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #1a1a2e;
            background: #ffffff;
        }
        .header {
            background: #1a1a2e;
            color: white;
            padding: 25px 35px;
            margin-bottom: 0;
        }
        .header-inner {
            display: table;
            width: 100%;
        }
        .header-logo {
            display: table-cell;
            vertical-align: middle;
            width: 60%;
        }
        .header-logo h1 {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }
        .header-logo p {
            font-size: 11px;
            color: #a0aec0;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .header-badge {
            display: table-cell;
            vertical-align: middle;
            text-align: right;
            width: 40%;
        }
        .badge-box {
            display: inline-block;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 8px;
            padding: 10px 18px;
            text-align: center;
        }
        .badge-box .label {
            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #a0aec0;
            margin-bottom: 4px;
        }
        .badge-box .number {
            font-size: 20px;
            font-weight: 700;
        }
        .confirm-bar {
            background: #38a169;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .body {
            padding: 30px 35px;
        }
        .section-title {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #718096;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 6px;
            margin-bottom: 14px;
        }
        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 25px;
        }
        .info-col {
            display: table-cell;
            vertical-align: top;
            width: 50%;
            padding-right: 20px;
        }
        .info-col:last-child { padding-right: 0; }
        .info-item {
            margin-bottom: 12px;
        }
        .info-item .field-label {
            font-size: 10px;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 3px;
        }
        .info-item .field-value {
            font-size: 14px;
            font-weight: 600;
            color: #1a202c;
        }
        .amount-box {
            background: #f7fafc;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px 25px;
            text-align: center;
            margin-bottom: 25px;
        }
        .amount-label {
            font-size: 11px;
            color: #718096;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        .amount-value {
            font-size: 38px;
            font-weight: 700;
            color: #1a1a2e;
            line-height: 1;
        }
        .amount-value span {
            font-size: 20px;
            vertical-align: top;
            margin-top: 6px;
            display: inline-block;
            color: #4a5568;
        }
        .stars {
            font-size: 18px;
            color: #f6c90e;
            margin-top: 10px;
        }
        .stars-label {
            font-size: 10px;
            color: #718096;
            margin-top: 4px;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        .details-table th {
            background: #1a1a2e;
            color: white;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 10px 12px;
            text-align: left;
        }
        .details-table td {
            padding: 10px 12px;
            font-size: 12px;
            border-bottom: 1px solid #e2e8f0;
        }
        .details-table tr:nth-child(even) td {
            background: #f7fafc;
        }
        .details-table .td-right {
            text-align: right;
            font-weight: 600;
        }
        .footer {
            border-top: 2px solid #e2e8f0;
            padding-top: 15px;
            margin-top: 10px;
        }
        .footer-inner {
            display: table;
            width: 100%;
        }
        .footer-left {
            display: table-cell;
            vertical-align: top;
            font-size: 10px;
            color: #a0aec0;
            width: 60%;
        }
        .footer-right {
            display: table-cell;
            vertical-align: top;
            text-align: right;
            width: 40%;
        }
        .footer-right .generated {
            font-size: 10px;
            color: #a0aec0;
        }
        .valid-seal {
            display: inline-block;
            border: 2px solid #38a169;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            text-align: center;
            padding-top: 8px;
            margin-top: 6px;
        }
        .valid-seal span {
            font-size: 8px;
            font-weight: 700;
            color: #38a169;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
            line-height: 1.3;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-inner">
            <div class="header-logo">
                <h1>Gen Trading</h1>
                <p>Certificado de Donacion</p>
            </div>
            <div class="header-badge">
                <div class="badge-box">
                    <div class="label">Recibo N.</div>
                    <div class="number">#{{ str_pad($donacion->id, 5, '0', STR_PAD_LEFT) }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="confirm-bar">Donacion Confirmada y Procesada</div>

    <div class="body">
        <div class="section-title">Datos del Donante</div>
        <div class="info-grid">
            <div class="info-col">
                <div class="info-item">
                    <div class="field-label">Nombre completo</div>
                    <div class="field-value">{{ $donacion->usuario->nombre ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="field-label">Correo electronico</div>
                    <div class="field-value">{{ $donacion->usuario->email ?? 'N/A' }}</div>
                </div>
            </div>
            <div class="info-col">
                <div class="info-item">
                    <div class="field-label">Edad declarada</div>
                    <div class="field-value">{{ $donacion->edad }} anos</div>
                </div>
                <div class="info-item">
                    <div class="field-label">Fecha de donacion</div>
                    <div class="field-value">{{ $donacion->created_at->format('d/m/Y') }}</div>
                </div>
            </div>
        </div>

        <div class="amount-box">
            <div class="amount-label">Importe Donado</div>
            <div class="amount-value">
                <span>EUR</span>{{ number_format($donacion->importe, 2, ',', '.') }}
            </div>
            @php
                $val = trim($donacion->valoracion ?? '');
                $textoVal = isset($valoraciones[$val]) ? $valoraciones[$val] : $val;
            @endphp
            <div class="stars">{{ $textoVal }}</div>
            <div class="stars-label">Valoracion de la experiencia</div>
        </div>

        <div class="section-title">Detalles de la Transaccion</div>
        <table class="details-table">
            <thead>
                <tr>
                    <th>Concepto</th>
                    <th>Detalle</th>
                    <th style="text-align:right">Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Referencia</td>
                    <td>Donacion voluntaria</td>
                    <td class="td-right">#{{ str_pad($donacion->id, 5, '0', STR_PAD_LEFT) }}</td>
                </tr>
                <tr>
                    <td>IBAN</td>
                    <td colspan="2">{{ substr($donacion->iban, 0, 4) }} **** **** **** {{ substr($donacion->iban, -4) }}</td>
                </tr>
                <tr>
                    <td>Importe</td>
                    <td>Euros (EUR)</td>
                    <td class="td-right">{{ number_format($donacion->importe, 2, ',', '.') }} EUR</td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td>{{ $donacion->created_at->format('d/m/Y H:i') }}</td>
                    <td class="td-right">-</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <div class="footer-inner">
                <div class="footer-left">
                    <p>Este documento es el justificante oficial de su donacion.</p>
                    <p style="margin-top:4px">Conserve para cualquier consulta futura.</p>
                    <p style="margin-top:8px; font-size:9px;">
                        Documento generado automaticamente. No requiere firma.
                    </p>
                </div>
                <div class="footer-right">
                    <div class="generated">Generado el {{ now()->format('d/m/Y') }}</div>
                    <div class="valid-seal">
                        <span>VALIDO</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>