@extends('layouts.admin')

@section('title', 'Mi cuenta')

@section('content')

<div class="dashboard-title">
    <h2>Mi cuenta</h2>
    <span>Administra los datos de acceso del sistema</span>
</div>

@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert-error">
        {{ $errors->first() }}
    </div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <h3>Usuario activo</h3>
        <div class="number">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
        <p>{{ Auth::user()->name }}</p>
    </div>

    <div class="stat-card dorado">
        <h3>Tipo de cuenta</h3>
        <div class="number">ADM</div>
        <p>Administrador del sistema</p>
    </div>

    <div class="stat-card azul">
        <h3>Correo</h3>
        <div style="font-size:18px; font-weight:900; color:#1976d2; word-break:break-word;">
            {{ Auth::user()->email }}
        </div>
        <p>Correo usado para iniciar sesión</p>
    </div>

    <div class="stat-card rojo">
        <h3>Estado</h3>
        <div class="number">ON</div>
        <p>Cuenta activa</p>
    </div>
</div>

<div class="panel-grid">
    <div class="panel">
        <h3>Actualizar datos de la cuenta</h3>

        <form action="{{ route('admin.perfil.datos') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group" style="margin-bottom:16px;">
                <label>Nombre del administrador</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    value="{{ old('name', Auth::user()->name) }}"
                    required
                >
            </div>

            <div class="form-group" style="margin-bottom:18px;">
                <label>Correo electrónico</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    value="{{ old('email', Auth::user()->email) }}"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary">
                Guardar cambios
            </button>
        </form>
    </div>

    <div class="panel">
        <h3>Cambiar contraseña</h3>

        <form action="{{ route('admin.perfil.password') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group" style="margin-bottom:16px;">
                <label>Contraseña actual</label>
                <input 
                    type="password" 
                    name="current_password" 
                    class="form-control" 
                    placeholder="Ingrese su contraseña actual"
                    required
                >
            </div>

            <div class="form-group" style="margin-bottom:16px;">
                <label>Nueva contraseña</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="Mínimo 8 caracteres"
                    required
                >
            </div>

            <div class="form-group" style="margin-bottom:18px;">
                <label>Confirmar nueva contraseña</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control" 
                    placeholder="Repita la nueva contraseña"
                    required
                >
            </div>

            <button type="submit" class="btn btn-warning">
                Actualizar contraseña
            </button>
        </form>
    </div>
</div>

<div class="panel">
    <h3>Sesión del sistema</h3>

    <table>
        <tr>
            <td><strong>Usuario conectado</strong></td>
            <td>{{ Auth::user()->name }}</td>
        </tr>

        <tr>
            <td><strong>Correo de acceso</strong></td>
            <td>{{ Auth::user()->email }}</td>
        </tr>

        <tr>
            <td><strong>Rol</strong></td>
            <td><span class="badge entregado">Administrador</span></td>
        </tr>

        <tr>
            <td><strong>Estado de sesión</strong></td>
            <td><span class="badge entregado">Activa</span></td>
        </tr>
    </table>

    <form action="{{ route('salir') }}" method="POST" style="margin-top:20px;">
        @csrf
        <button type="submit" class="btn btn-dark">
            Cerrar sesión
        </button>
    </form>
</div>

@endsection