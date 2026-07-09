@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard-title">
    <h2>Dashboard</h2>
    <span>Resumen general del sistema CIVACARGO</span>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <h3>Total de encomiendas</h3>
        <div class="number">{{ $totalEncomiendas ?? 0 }}</div>
        <p>Registros generales del sistema</p>
    </div>

    <div class="stat-card dorado">
        <h3>Registradas</h3>
        <div class="number">{{ $registradas ?? 0 }}</div>
        <p>Encomiendas ingresadas</p>
    </div>

    <div class="stat-card azul">
        <h3>En tránsito</h3>
        <div class="number">{{ $enTransito ?? 0 }}</div>
        <p>Encomiendas en traslado</p>
    </div>

    <div class="stat-card rojo">
        <h3>Observadas</h3>
        <div class="number">{{ $observadas ?? 0 }}</div>
        <p>Con incidencia o revisión</p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <h3>Entregadas</h3>
        <div class="number">{{ $entregadas ?? 0 }}</div>
        <p>Encomiendas finalizadas</p>
    </div>

    <div class="stat-card dorado">
        <h3>Ingresos pagados</h3>
        <div class="number">S/ {{ number_format($totalIngresos ?? 0, 2) }}</div>
        <p>Total recaudado</p>
    </div>

    <div class="stat-card azul">
        <h3>Pagos pendientes</h3>
        <div class="number">{{ $pagosPendientes ?? 0 }}</div>
        <p>Encomiendas por cobrar</p>
    </div>

    <div class="stat-card rojo">
        <h3>Clientes</h3>
        <div class="number">{{ $totalClientes ?? 0 }}</div>
        <p>Clientes registrados</p>
    </div>
</div>

<div class="panel-grid">
    <div class="panel">
        <h3>Encomiendas - últimos registros</h3>

        <div class="chart-box">
            <div class="chart-line"></div>
            <div class="chart-point"></div>
        </div>
    </div>

    <div class="panel">
        <h3>Estado actual</h3>

        <div class="donut"></div>

        <div class="legend">
            <div class="legend-item">
                <span><span class="dot green"></span>Entregadas</span>
                <strong>{{ $entregadas ?? 0 }}</strong>
            </div>

            <div class="legend-item">
                <span><span class="dot gold"></span>Registradas</span>
                <strong>{{ $registradas ?? 0 }}</strong>
            </div>

            <div class="legend-item">
                <span><span class="dot blue"></span>En tránsito</span>
                <strong>{{ $enTransito ?? 0 }}</strong>
            </div>

            <div class="legend-item">
                <span><span class="dot red"></span>Observadas</span>
                <strong>{{ $observadas ?? 0 }}</strong>
            </div>
        </div>
    </div>
</div>

<div class="panel">
    <h3>Últimas encomiendas registradas</h3>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Remitente</th>
                    <th>Destino</th>
                    <th>Estado</th>
                    <th>Pago</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($ultimasEncomiendas ?? [] as $encomienda)
                    <tr>
                        <td>{{ $encomienda->codigo_seguimiento }}</td>
                        <td>{{ $encomienda->cliente->nombre ?? 'Sin remitente' }}</td>
                        <td>{{ $encomienda->destino }}</td>
                        <td>
                            @php
                                $clase = 'registrado';

                                if ($encomienda->estado === 'En tránsito') {
                                    $clase = 'transito';
                                } elseif ($encomienda->estado === 'Entregado') {
                                    $clase = 'entregado';
                                } elseif ($encomienda->estado === 'Observado') {
                                    $clase = 'observado';
                                }
                            @endphp

                            <span class="badge {{ $clase }}">
                                {{ $encomienda->estado }}
                            </span>
                        </td>
                        <td>
                            @if ($encomienda->pago)
                                S/ {{ number_format($encomienda->pago->monto, 2) }}
                            @else
                                Sin pago
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty">
                            No hay encomiendas registradas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection