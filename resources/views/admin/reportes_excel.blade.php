<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #263238;
        }

        h1 {
            background: #0f3d2e;
            color: white;
            padding: 14px;
            text-align: center;
        }

        h2 {
            background: #c89b3c;
            color: #1b1b1b;
            padding: 10px;
            margin-top: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        th {
            background: #0f3d2e;
            color: white;
            border: 1px solid #d9e3dd;
            padding: 8px;
            font-weight: bold;
        }

        td {
            border: 1px solid #d9e3dd;
            padding: 8px;
        }

        .label {
            background: #f4f7f5;
            font-weight: bold;
        }

        .total {
            font-weight: bold;
            background: #fff8e5;
        }
    </style>
</head>
<body>

<h1>REPORTE GENERAL CIVACARGO</h1>

<table>
    <tr>
        <td class="label">Fecha de generación</td>
        <td>{{ now()->format('d/m/Y H:i:s') }}</td>
    </tr>
    <tr>
        <td class="label">Sistema</td>
        <td>CIVACARGO - Sistema de Encomiendas</td>
    </tr>
</table>

<h2>1. Resumen general</h2>

<table>
    <tr>
        <th>Indicador</th>
        <th>Resultado</th>
    </tr>

    <tr>
        <td>Total de encomiendas</td>
        <td>{{ $resumen['total_encomiendas'] }}</td>
    </tr>

    <tr>
        <td>Total de clientes</td>
        <td>{{ $resumen['total_clientes'] }}</td>
    </tr>

    <tr>
        <td>Registradas</td>
        <td>{{ $resumen['registradas'] }}</td>
    </tr>

    <tr>
        <td>En tránsito</td>
        <td>{{ $resumen['en_transito'] }}</td>
    </tr>

    <tr>
        <td>Entregadas</td>
        <td>{{ $resumen['entregadas'] }}</td>
    </tr>

    <tr>
        <td>Observadas</td>
        <td>{{ $resumen['observadas'] }}</td>
    </tr>

    <tr class="total">
        <td>Total pagado</td>
        <td>S/ {{ number_format($resumen['total_pagado'], 2) }}</td>
    </tr>

    <tr class="total">
        <td>Total pendiente</td>
        <td>S/ {{ number_format($resumen['total_pendiente'], 2) }}</td>
    </tr>
</table>

<h2>2. Encomiendas registradas</h2>

<table>
    <tr>
        <th>Código</th>
        <th>Remitente</th>
        <th>DNI remitente</th>
        <th>Destinatario</th>
        <th>DNI destinatario</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Fecha envío</th>
        <th>Tipo paquete</th>
        <th>Peso</th>
        <th>Estado</th>
        <th>Monto</th>
        <th>Estado pago</th>
        <th>Método pago</th>
    </tr>

    @forelse ($encomiendas as $encomienda)
        <tr>
            <td>{{ $encomienda->codigo_seguimiento }}</td>
            <td>{{ $encomienda->cliente->nombre ?? 'No registrado' }}</td>
            <td>{{ $encomienda->cliente->dni ?? 'No registrado' }}</td>
            <td>{{ $encomienda->nombre_destinatario ?? 'No registrado' }}</td>
            <td>{{ $encomienda->dni_destinatario ?? 'No registrado' }}</td>
            <td>{{ $encomienda->origen }}</td>
            <td>{{ $encomienda->destino }}</td>
            <td>{{ $encomienda->fecha_envio }}</td>
            <td>{{ $encomienda->tipo_paquete ?? 'No registrado' }}</td>
            <td>{{ $encomienda->peso }}</td>
            <td>{{ $encomienda->estado }}</td>
            <td>
                @if ($encomienda->pago)
                    S/ {{ number_format($encomienda->pago->monto, 2) }}
                @else
                    No registrado
                @endif
            </td>
            <td>{{ $encomienda->pago->estado_pago ?? 'No registrado' }}</td>
            <td>{{ $encomienda->pago->metodo_pago ?? 'No registrado' }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="14">No hay encomiendas registradas.</td>
        </tr>
    @endforelse
</table>

<h2>3. Pagos / ventas</h2>

<table>
    <tr>
        <th>ID pago</th>
        <th>Código encomienda</th>
        <th>Monto</th>
        <th>Método de pago</th>
        <th>Estado de pago</th>
        <th>Fecha de pago</th>
    </tr>

    @forelse ($pagos as $pago)
        <tr>
            <td>{{ $pago->id }}</td>
            <td>{{ $pago->codigo_seguimiento ?? 'No registrado' }}</td>
            <td>S/ {{ number_format($pago->monto, 2) }}</td>
            <td>{{ $pago->metodo_pago }}</td>
            <td>{{ $pago->estado_pago }}</td>
            <td>{{ $pago->fecha_pago ?? $pago->created_at }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No hay pagos registrados.</td>
        </tr>
    @endforelse
</table>

<h2>4. Clientes registrados</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>DNI</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Dirección</th>
    </tr>

    @forelse ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->dni }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->correo }}</td>
            <td>{{ $cliente->direccion }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No hay clientes registrados.</td>
        </tr>
    @endforelse
</table>

<h2>5. Historial logístico</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Código encomienda</th>
        <th>Estado</th>
        <th>Ubicación</th>
        <th>Observación</th>
        <th>Fecha actualización</th>
    </tr>

    @forelse ($seguimientos as $seguimiento)
        <tr>
            <td>{{ $seguimiento->id }}</td>
            <td>{{ $seguimiento->codigo_seguimiento ?? 'No registrado' }}</td>
            <td>{{ $seguimiento->estado }}</td>
            <td>{{ $seguimiento->ubicacion }}</td>
            <td>{{ $seguimiento->observacion }}</td>
            <td>{{ $seguimiento->fecha_actualizacion }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No hay historial logístico registrado.</td>
        </tr>
    @endforelse
</table>

</body>
</html>