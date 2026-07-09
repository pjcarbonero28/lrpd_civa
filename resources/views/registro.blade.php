@extends('layouts.admin')

@section('title', 'Registrar Encomienda')

@section('content')

<div class="page-header">
    <h1>Registrar Encomienda</h1>
    <p>
        Registra los datos del remitente, destinatario, paquete y pago del servicio.
        El sistema generará automáticamente el código de seguimiento.
    </p>
</div>

@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('codigo'))
    <div class="panel" style="border-left:6px solid #c89b3c;">
        <h3>Código generado</h3>
        <p style="margin-bottom:15px;">
            Código de seguimiento:
            <strong>{{ session('codigo') }}</strong>
        </p>

        <div class="actions-row">
            <a href="{{ route('seguimiento', ['codigo' => session('codigo')]) }}" class="btn btn-dark">
                Consultar encomienda
            </a>

            @if (session('encomienda_id'))
                <a href="{{ route('admin.encomiendas.pdf', session('encomienda_id')) }}" class="btn btn-warning">
                    Descargar PDF
                </a>
            @endif
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="alert-error">
        Complete correctamente los campos obligatorios.
    </div>
@endif

<form action="{{ route('registro.store') }}" method="POST">
    @csrf

    <div class="panel">
        <h3>Datos del remitente</h3>

        <div class="form-grid">
            <div class="form-group">
                <label>Fecha de envío</label>
                <input type="date" name="fecha_envio" class="form-control" value="{{ old('fecha_envio') }}" required>
            </div>

            <div class="form-group">
                <label>Nombre del remitente</label>
                <input type="text" name="nombre_remitente" class="form-control" value="{{ old('nombre_remitente') }}" placeholder="Ingrese nombre del remitente" required>
            </div>

            <div class="form-group">
                <label>DNI del remitente</label>
                <input type="text" name="dni_remitente" class="form-control" value="{{ old('dni_remitente') }}" placeholder="Ingrese DNI del remitente" required>
            </div>

            <div class="form-group">
                <label>Teléfono del remitente</label>
                <input type="text" name="telefono_remitente" class="form-control" value="{{ old('telefono_remitente') }}" placeholder="Ingrese teléfono del remitente" required>
            </div>
        </div>
    </div>

    <div class="panel">
        <h3>Datos del destinatario</h3>

        <div class="form-grid">
            <div class="form-group">
                <label>Nombre del destinatario</label>
                <input type="text" name="nombre_destinatario" class="form-control" value="{{ old('nombre_destinatario') }}" placeholder="Ingrese nombre del destinatario" required>
            </div>

            <div class="form-group">
                <label>DNI del destinatario</label>
                <input type="text" name="dni_destinatario" class="form-control" value="{{ old('dni_destinatario') }}" placeholder="Ingrese DNI del destinatario" required>
            </div>

            <div class="form-group">
                <label>Teléfono del destinatario</label>
                <input type="text" name="telefono_destinatario" class="form-control" value="{{ old('telefono_destinatario') }}" placeholder="Ingrese teléfono del destinatario" required>
            </div>
        </div>
    </div>

    <div class="panel">
        <h3>Datos de la encomienda</h3>

        <div class="form-grid">
            <div class="form-group">
                <label>Origen</label>
                <input type="text" name="origen" class="form-control" value="{{ old('origen') }}" placeholder="Ej. Chincha" required>
            </div>

            <div class="form-group">
                <label>Destino</label>
                <input type="text" name="destino" class="form-control" value="{{ old('destino') }}" placeholder="Ej. Lima" required>
            </div>

            <div class="form-group">
                <label>Tipo de paquete</label>
                <select name="tipo_paquete" required>
                    <option value="">Seleccione una opción</option>
                    <option value="Documento" {{ old('tipo_paquete') === 'Documento' ? 'selected' : '' }}>Documento</option>
                    <option value="Caja" {{ old('tipo_paquete') === 'Caja' ? 'selected' : '' }}>Caja</option>
                    <option value="Sobre" {{ old('tipo_paquete') === 'Sobre' ? 'selected' : '' }}>Sobre</option>
                    <option value="Paquete" {{ old('tipo_paquete') === 'Paquete' ? 'selected' : '' }}>Paquete</option>
                    <option value="Objeto pesado" {{ old('tipo_paquete') === 'Objeto pesado' ? 'selected' : '' }}>Objeto pesado</option>
                    <option value="Paquete frágil" {{ old('tipo_paquete') === 'Paquete frágil' ? 'selected' : '' }}>Paquete frágil</option>
                    <option value="Otro" {{ old('tipo_paquete') === 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>

            <div class="form-group">
                <label>Peso aproximado</label>
                <input type="number" step="0.1" min="0.1" name="peso" class="form-control" value="{{ old('peso') }}" placeholder="Ej. 2.5" required>
            </div>

            <div class="form-group full">
                <label>Descripción del contenido</label>
                <textarea name="descripcion" rows="4" placeholder="Ingrese una descripción breve de la encomienda">{{ old('descripcion') }}</textarea>
            </div>
        </div>
    </div>

    <div class="panel">
        <h3>Datos del pago</h3>

        <div class="form-grid">
            <div class="form-group">
                <label>Monto del envío</label>
                <input type="number" step="0.10" min="0" name="monto" class="form-control" value="{{ old('monto') }}" placeholder="Ej. 15.00" required>
            </div>

            <div class="form-group">
                <label>Método de pago</label>
                <select name="metodo_pago" required>
                    <option value="">Seleccione una opción</option>
                    <option value="Efectivo" {{ old('metodo_pago') === 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                    <option value="Yape" {{ old('metodo_pago') === 'Yape' ? 'selected' : '' }}>Yape</option>
                    <option value="Plin" {{ old('metodo_pago') === 'Plin' ? 'selected' : '' }}>Plin</option>
                    <option value="Tarjeta" {{ old('metodo_pago') === 'Tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                </select>
            </div>

            <div class="form-group">
                <label>Estado del pago</label>
                <select name="estado_pago" required>
                    <option value="Pagado" {{ old('estado_pago') === 'Pagado' ? 'selected' : '' }}>Pagado</option>
                    <option value="Pendiente" {{ old('estado_pago') === 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                </select>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="actions-row">
            <button type="submit" class="btn btn-primary">
                Guardar registro
            </button>

            <a href="{{ route('admin.encomiendas.index') }}" class="btn btn-dark">
                Ver panel
            </a>

            <a href="{{ route('seguimiento') }}" class="btn btn-warning">
                Consultar seguimiento
            </a>
        </div>
    </div>
</form>

@endsection