<div class="mb-3">
    <label>DNI</label>
    <input type="text" name="dni" class="form-control" value="{{ old('dni', $cliente->dni ?? '') }}">
</div>

<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre ?? '') }}">
</div>

<div class="mb-3">
    <label>Teléfono</label>
    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono ?? '') }}">
</div>

<div class="mb-3">
    <label>Dirección</label>
    <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion ?? '') }}">
</div>

<div class="mb-3">
    <label>Correo</label>
    <input type="email" name="correo" class="form-control" value="{{ old('correo', $cliente->correo ?? '') }}">
</div>

<button class="btn btn-primary">Guardar</button>
<a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>