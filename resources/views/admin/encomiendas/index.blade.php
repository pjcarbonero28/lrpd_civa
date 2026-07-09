@extends('layouts.admin')

@section('title', 'Panel de Encomiendas')

@section('content')

<div class="page-header">
    <h1>Panel de Encomiendas</h1>
    <p>
        Visualiza, busca y administra las encomiendas registradas. Desde este módulo puedes actualizar
        el estado logístico, revisar el pago y descargar la constancia PDF.
    </p>
</div>

@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="panel">
    <h3>Gestión de encomiendas</h3>

    <div style="display:flex; justify-content:space-between; align-items:center; gap:15px; flex-wrap:wrap; margin-bottom:22px;">
        <form action="{{ route('admin.encomiendas.index') }}" method="GET" style="display:flex; gap:10px; flex:1; min-width:300px;">
            <input 
                type="text" 
                name="busqueda" 
                class="form-control"
                placeholder="Buscar por código, remitente, DNI o destinatario"
                value="{{ $busqueda ?? '' }}"
            >

            <button type="submit" class="btn btn-primary">
                Buscar
            </button>

            <a href="{{ route('admin.encomiendas.index') }}" class="btn btn-dark">
                Limpiar
            </a>
        </form>

        <a href="{{ route('registro') }}" class="btn btn-warning">
            + Nueva encomienda
        </a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Remitente</th>
                    <th>DNI</th>
                    <th>Destinatario</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Fecha</th>
                    <th>Estado envío</th>
                    <th>Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($encomiendas as $encomienda)
                    <tr>
                        <td>
                            <strong>{{ $encomienda->codigo_seguimiento }}</strong>
                        </td>

                        <td>{{ $encomienda->cliente->nombre ?? 'Sin remitente' }}</td>

                        <td>{{ $encomienda->cliente->dni ?? '-' }}</td>

                        <td>{{ $encomienda->nombre_destinatario ?? 'Sin destinatario' }}</td>

                        <td>{{ $encomienda->origen }}</td>

                        <td>{{ $encomienda->destino }}</td>

                        <td>{{ $encomienda->fecha_envio }}</td>

                        <td>
                            @php
                                $estadoClase = 'registrado';

                                if ($encomienda->estado === 'En tránsito') {
                                    $estadoClase = 'transito';
                                } elseif ($encomienda->estado === 'Entregado') {
                                    $estadoClase = 'entregado';
                                } elseif ($encomienda->estado === 'Observado') {
                                    $estadoClase = 'observado';
                                }
                            @endphp

                            <span class="badge {{ $estadoClase }}">
                                {{ $encomienda->estado }}
                            </span>
                        </td>

                        <td>
                            @if ($encomienda->pago)
                                <strong>S/ {{ number_format($encomienda->pago->monto, 2) }}</strong>
                                <br>

                                <span class="badge {{ $encomienda->pago->estado_pago === 'Pagado' ? 'entregado' : 'observado' }}">
                                    {{ $encomienda->pago->estado_pago }}
                                </span>
                                <br>

                                <small>{{ $encomienda->pago->metodo_pago }}</small>
                            @else
                                <span class="badge observado">Sin pago</span>
                            @endif
                        </td>

                        <td>
                            <div class="actions-row">
                                <a href="{{ route('admin.encomiendas.estado', $encomienda) }}" class="btn btn-primary btn-small">
                                    Actualizar
                                </a>

                                <a href="{{ route('admin.encomiendas.pdf', $encomienda) }}" class="btn btn-warning btn-small">
                                    PDF
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="empty">
                            No hay encomiendas registradas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $encomiendas->links() }}
    </div>
</div>

@endsection