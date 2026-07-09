@extends('layouts.admin')

@section('title', 'Reportes')

@section('content')

<div class="dashboard-title">
    <h2>Reportes</h2>
    <span>Reporte general exportable en Excel</span>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <h3>Total encomiendas</h3>
        <div class="number">{{ $totalEncomiendas ?? 0 }}</div>
        <p>Todos los envíos registrados.</p>
    </div>

    <div class="stat-card dorado">
        <h3>Ingresos pagados</h3>
        <div class="number">S/ {{ number_format($totalPagado ?? 0, 2) }}</div>
        <p>Total recaudado por encomiendas.</p>
    </div>

    <div class="stat-card azul">
        <h3>Clientes</h3>
        <div class="number">{{ $totalClientes ?? 0 }}</div>
        <p>Remitentes registrados.</p>
    </div>

    <div class="stat-card rojo">
        <h3>Pagos pendientes</h3>
        <div class="number">{{ $pagosPendientes ?? 0 }}</div>
        <p>Encomiendas por cobrar.</p>
    </div>
</div>

<div class="panel-grid">
    <div class="panel">
        <h3>Reporte general del sistema</h3>

        <p style="line-height:1.8; color:#4d5668; margin-bottom:18px;">
            Este reporte consolida la información principal del sistema CIVACARGO en un solo archivo Excel.
            Incluye resumen general, encomiendas registradas, pagos, clientes y el historial logístico de seguimiento.
        </p>

        <div class="actions-row">
            <a href="{{ route('admin.reportes.general.excel') }}" class="btn btn-primary">
                Descargar reporte general Excel
            </a>
        </div>
    </div>

    <div class="panel">
        <h3>Contenido del Excel</h3>

        <table>
            <tr>
                <td><strong>Resumen general</strong></td>
                <td><span class="badge entregado">Incluido</span></td>
            </tr>

            <tr>
                <td><strong>Encomiendas</strong></td>
                <td><span class="badge entregado">Incluido</span></td>
            </tr>

            <tr>
                <td><strong>Pagos / ventas</strong></td>
                <td><span class="badge entregado">Incluido</span></td>
            </tr>

            <tr>
                <td><strong>Clientes</strong></td>
                <td><span class="badge entregado">Incluido</span></td>
            </tr>

            <tr>
                <td><strong>Historial logístico</strong></td>
                <td><span class="badge entregado">Incluido</span></td>
            </tr>
        </table>
    </div>
</div>

<div class="panel">
    <h3>Resumen rápido</h3>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Indicador</th>
                    <th>Cantidad / Monto</th>
                    <th>Descripción</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Total de encomiendas</td>
                    <td>{{ $totalEncomiendas ?? 0 }}</td>
                    <td>Cantidad total registrada en el sistema.</td>
                </tr>

                <tr>
                    <td>Registradas</td>
                    <td>{{ $registradas ?? 0 }}</td>
                    <td>Encomiendas ingresadas inicialmente.</td>
                </tr>

                <tr>
                    <td>En tránsito</td>
                    <td>{{ $enTransito ?? 0 }}</td>
                    <td>Encomiendas en proceso de traslado.</td>
                </tr>

                <tr>
                    <td>Entregadas</td>
                    <td>{{ $entregadas ?? 0 }}</td>
                    <td>Encomiendas finalizadas correctamente.</td>
                </tr>

                <tr>
                    <td>Observadas</td>
                    <td>{{ $observadas ?? 0 }}</td>
                    <td>Encomiendas con incidencia o revisión.</td>
                </tr>

                <tr>
                    <td>Total pagado</td>
                    <td>S/ {{ number_format($totalPagado ?? 0, 2) }}</td>
                    <td>Monto recaudado por pagos completados.</td>
                </tr>

                <tr>
                    <td>Total pendiente</td>
                    <td>S/ {{ number_format($totalPendiente ?? 0, 2) }}</td>
                    <td>Monto pendiente de cobro.</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection