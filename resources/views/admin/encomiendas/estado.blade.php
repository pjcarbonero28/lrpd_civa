@extends('layouts.admin')

@section('title', 'Actualizar Estado')

@section('content')

@php
    $estadoClaseActual = 'registrado';

    if ($encomienda->estado === 'En tránsito') {
        $estadoClaseActual = 'transito';
    } elseif ($encomienda->estado === 'Entregado') {
        $estadoClaseActual = 'entregado';
    } elseif ($encomienda->estado === 'Observado') {
        $estadoClaseActual = 'observado';
    }

    $estadoPagoClase = 'observado';

    if ($encomienda->pago && $encomienda->pago->estado_pago === 'Pagado') {
        $estadoPagoClase = 'entregado';
    }
@endphp

<div class="page-header">
    <h1>Actualizar Estado</h1>
    <p>
        Actualiza la ubicación, estado logístico, estado del pago y observación de la encomienda seleccionada.
    </p>
</div>

@if ($errors->any())
    <div class="alert-error">
        Complete correctamente los campos obligatorios.
    </div>
@endif

<div class="panel">
    <h3>Código de seguimiento</h3>

    <p style="font-size:18px; margin-bottom:12px;">
        <strong>{{ $encomienda->codigo_seguimiento }}</strong>
    </p>

    <div class="actions-row">
        <span class="badge {{ $estadoClaseActual }}">
            Estado envío: {{ $encomienda->estado }}
        </span>

        @if ($encomienda->pago)
            <span class="badge {{ $estadoPagoClase }}">
                Pago: {{ $encomienda->pago->estado_pago }}
            </span>
        @else
            <span class="badge observado">
                Sin pago registrado
            </span>
        @endif
    </div>
</div>

<div class="panel-grid">
    <div class="panel">
        <h3>Datos principales</h3>

        <table>
            <tr>
                <td><strong>Remitente</strong></td>
                <td>{{ $encomienda->cliente->nombre ?? 'Sin remitente' }}</td>
            </tr>

            <tr>
                <td><strong>Destinatario</strong></td>
                <td>{{ $encomienda->nombre_destinatario ?? 'Sin destinatario' }}</td>
            </tr>

            <tr>
                <td><strong>Origen</strong></td>
                <td>{{ $encomienda->origen }}</td>
            </tr>

            <tr>
                <td><strong>Destino</strong></td>
                <td>{{ $encomienda->destino }}</td>
            </tr>
        </table>
    </div>

    <div class="panel">
        <h3>Datos del pago</h3>

        @if ($encomienda->pago)
            <table>
                <tr>
                    <td><strong>Monto</strong></td>
                    <td>S/ {{ number_format($encomienda->pago->monto, 2) }}</td>
                </tr>

                <tr>
                    <td><strong>Método</strong></td>
                    <td>{{ $encomienda->pago->metodo_pago }}</td>
                </tr>

                <tr>
                    <td><strong>Estado</strong></td>
                    <td>
                        <span class="badge {{ $encomienda->pago->estado_pago === 'Pagado' ? 'entregado' : 'observado' }}">
                            {{ $encomienda->pago->estado_pago }}
                        </span>
                    </td>
                </tr>
            </table>
        @else
            <p class="empty">Sin pago registrado.</p>
        @endif
    </div>
</div>

<div class="panel">
    <h3>Nueva actualización logística y de pago</h3>

    <form action="{{ route('admin.encomiendas.estado.update', $encomienda) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label>Nuevo estado logístico</label>
                <select name="estado" required>
                    <option value="Registrado" {{ old('estado', $encomienda->estado) === 'Registrado' ? 'selected' : '' }}>
                        Registrado
                    </option>

                    <option value="En tránsito" {{ old('estado', $encomienda->estado) === 'En tránsito' ? 'selected' : '' }}>
                        En tránsito
                    </option>

                    <option value="Entregado" {{ old('estado', $encomienda->estado) === 'Entregado' ? 'selected' : '' }}>
                        Entregado
                    </option>

                    <option value="Observado" {{ old('estado', $encomienda->estado) === 'Observado' ? 'selected' : '' }}>
                        Observado
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>Estado del pago</label>

                @if ($encomienda->pago)
                    <select name="estado_pago" required>
                        <option value="Pagado" {{ old('estado_pago', $encomienda->pago->estado_pago) === 'Pagado' ? 'selected' : '' }}>
                            Pagado
                        </option>

                        <option value="Pendiente" {{ old('estado_pago', $encomienda->pago->estado_pago) === 'Pendiente' ? 'selected' : '' }}>
                            Pendiente
                        </option>
                    </select>
                @else
                    <input type="text" class="form-control" value="Sin pago registrado" disabled>
                @endif
            </div>

            <div class="form-group">
                <label>Ubicación actual</label>
                <input 
                    type="text" 
                    name="ubicacion" 
                    class="form-control"
                    value="{{ old('ubicacion', $encomienda->origen) }}" 
                    required
                >
            </div>

            <div class="form-group full">
                <label>Observación</label>
                <textarea 
                    name="observacion" 
                    rows="4" 
                    placeholder="Ej. La encomienda salió hacia destino.">{{ old('observacion') }}</textarea>
            </div>
        </div>

        <div class="actions-row" style="margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Guardar actualización
            </button>

            <a href="{{ route('admin.encomiendas.index') }}" class="btn btn-dark">
                Cancelar
            </a>

            <a href="{{ route('seguimiento', ['codigo' => $encomienda->codigo_seguimiento]) }}" class="btn btn-warning">
                Ver seguimiento
            </a>
        </div>
    </form>
</div>

<div class="panel">
    <h3>Historial actual</h3>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Ubicación</th>
                    <th>Observación</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($encomienda->seguimientos as $seguimiento)
                    <tr>
                        <td>{{ $seguimiento->fecha_actualizacion }}</td>
                        <td>{{ $seguimiento->estado }}</td>
                        <td>{{ $seguimiento->ubicacion }}</td>
                        <td>{{ $seguimiento->observacion }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty">
                            No hay historial registrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection