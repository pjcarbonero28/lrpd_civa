<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Constancia de Encomienda</title>

    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color:#263238;
            margin: 0;
            padding: 0;
        }

        .header{
            background-color:#0f3d2e;
            color:white;
            padding:18px;
            text-align:center;
        }

        .header h1{
            margin:0;
            font-size:28px;
            letter-spacing:1px;
        }

        .header .cargo{
            color:#c89b3c;
        }

        .header p{
            margin:5px 0 0;
            font-size:12px;
        }

        .codigo-box{
            border:2px solid #0f3d2e;
            padding:18px;
            margin-top:22px;
            margin-bottom:22px;
            text-align:center;
            background-color:#f5faf7;
        }

        .codigo-box h2{
            margin:0 0 8px;
            color:#0f3d2e;
            font-size:18px;
        }

        .codigo{
            font-size:26px;
            font-weight:bold;
            color:#08251c;
            letter-spacing:1px;
        }

        .section-title{
            background-color:#0f3d2e;
            color:white;
            padding:8px 10px;
            margin-top:16px;
            font-weight:bold;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-bottom:12px;
        }

        td{
            border:1px solid #d9e3dd;
            padding:8px;
            vertical-align:top;
        }

        .label{
            width:32%;
            font-weight:bold;
            background-color:#f4f7f5;
            color:#0f3d2e;
        }

        .estado{
            font-weight:bold;
            color:#0f3d2e;
        }

        .note{
            margin-top:20px;
            padding:12px;
            border-left:5px solid #c89b3c;
            background-color:#fff8e5;
            line-height:1.6;
        }

        .firmas{
            width:100%;
            margin-top:55px;
            border-collapse:collapse;
        }

        .firmas td{
            border:none;
            text-align:center;
            width:50%;
            font-size:11px;
            color:#555;
            padding:10px;
        }

        .linea-firma{
            border-top:1px solid #333;
            width:75%;
            margin:0 auto 6px auto;
            height:1px;
        }

        .footer{
            margin-top:30px;
            font-size:11px;
            color:#555;
            text-align:center;
            border-top:1px solid #d9e3dd;
            padding-top:12px;
            line-height:1.6;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>CIVA<span class="cargo">CARGO</span></h1>
        <p>Constancia de registro de encomienda</p>
        <p>CIVA Transporte y Turismo Chincha</p>
    </div>

    <div class="codigo-box">
        <h2>Código de seguimiento</h2>
        <div class="codigo">{{ $encomienda->codigo_seguimiento }}</div>
    </div>

    <div class="section-title">Datos del remitente</div>
    <table>
        <tr>
            <td class="label">Nombre</td>
            <td>{{ $encomienda->cliente->nombre ?? 'No registrado' }}</td>
        </tr>
        <tr>
            <td class="label">DNI</td>
            <td>{{ $encomienda->cliente->dni ?? 'No registrado' }}</td>
        </tr>
        <tr>
            <td class="label">Teléfono</td>
            <td>{{ $encomienda->cliente->telefono ?? 'No registrado' }}</td>
        </tr>
    </table>

    <div class="section-title">Datos del destinatario</div>
    <table>
        <tr>
            <td class="label">Nombre</td>
            <td>{{ $encomienda->nombre_destinatario ?? 'No registrado' }}</td>
        </tr>
        <tr>
            <td class="label">DNI</td>
            <td>{{ $encomienda->dni_destinatario ?? 'No registrado' }}</td>
        </tr>
        <tr>
            <td class="label">Teléfono</td>
            <td>{{ $encomienda->telefono_destinatario ?? 'No registrado' }}</td>
        </tr>
    </table>

    <div class="section-title">Datos de la encomienda</div>
    <table>
        <tr>
            <td class="label">Fecha de envío</td>
            <td>{{ $encomienda->fecha_envio }}</td>
        </tr>
        <tr>
            <td class="label">Origen</td>
            <td>{{ $encomienda->origen }}</td>
        </tr>
        <tr>
            <td class="label">Destino</td>
            <td>{{ $encomienda->destino }}</td>
        </tr>
        <tr>
            <td class="label">Tipo de paquete</td>
            <td>{{ $encomienda->tipo_paquete ?? 'No registrado' }}</td>
        </tr>
        <tr>
            <td class="label">Peso aproximado</td>
            <td>{{ $encomienda->peso }} kg</td>
        </tr>
        <tr>
            <td class="label">Estado inicial</td>
            <td class="estado">{{ $encomienda->estado }}</td>
        </tr>
        <tr>
            <td class="label">Descripción</td>
            <td>{{ $encomienda->descripcion ?? 'Sin descripción' }}</td>
        </tr>
    </table>

    <div class="note">
        <strong>Importante:</strong> conserve este documento. El cliente podrá consultar el estado
        de su encomienda ingresando el código de seguimiento en la página pública del sistema.
    </div>

    <table class="firmas">
        <tr>
            <td>
                <div class="linea-firma"></div>
                Firma del encargado
            </td>
            <td>
                <div class="linea-firma"></div>
                Firma del cliente
            </td>
        </tr>
    </table>

    <div class="footer">
        CIVACARGO - Sistema de Encomiendas<br>
        Carr. Panamericana Sur 122, Chincha Alta 11702<br>
        Documento generado automáticamente por el sistema.
    </div>

</body>
</html>