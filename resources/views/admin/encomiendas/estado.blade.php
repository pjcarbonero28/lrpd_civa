<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Estado - CIVACARGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        :root{
            --verde:#0f3d2e;
            --verde-oscuro:#08251c;
            --verde-claro:#1f6f50;
            --dorado:#c89b3c;
            --blanco:#ffffff;
            --fondo:#f4f7f5;
            --gris:#eef3f0;
            --texto:#263238;
            --rojo:#d32f2f;
            --naranja:#ff9800;
            --azul:#1976d2;
            --exito:#2e7d32;
        }

        body{
            background:var(--fondo);
            color:var(--texto);
        }

        .top{
            background:var(--verde);
            color:white;
            padding:22px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
        }

        .logo{
            font-size:30px;
            font-weight:900;
            letter-spacing:1px;
        }

        .logo span{
            color:var(--dorado);
        }

        .top-links{
            display:flex;
            flex-wrap:wrap;
            gap:15px;
        }

        .top-links a{
            color:white;
            text-decoration:none;
            font-weight:bold;
        }

        .top-links a:hover{
            color:var(--dorado);
        }

        .container{
            width:92%;
            max-width:1050px;
            margin:35px auto;
            background:white;
            border-radius:20px;
            box-shadow:0 10px 24px rgba(0,0,0,.12);
            overflow:hidden;
        }

        .banner{
            background:linear-gradient(135deg,var(--verde-oscuro),var(--verde),var(--verde-claro));
            color:white;
            padding:38px;
        }

        .banner h1{
            font-size:34px;
            margin-bottom:10px;
        }

        .banner p{
            color:#e8f5ee;
            line-height:1.8;
        }

        .content{
            padding:30px;
        }

        .alert-error{
            background:#f8d7da;
            color:#842029;
            padding:15px;
            border-radius:12px;
            margin-bottom:20px;
            font-weight:bold;
            border-left:6px solid var(--rojo);
        }

        .info-box{
            background:#f5faf7;
            border-left:6px solid var(--verde);
            padding:18px;
            border-radius:12px;
            margin-bottom:25px;
        }

        .info-box h3{
            color:var(--verde);
            margin-bottom:8px;
        }

        .info-box p{
            color:#555;
            line-height:1.7;
        }

        .estado-actual{
            padding:7px 12px;
            border-radius:20px;
            color:white;
            font-size:13px;
            font-weight:bold;
            display:inline-block;
            margin-top:8px;
        }

        .registrado{
            background:var(--naranja);
        }

        .transito{
            background:var(--azul);
        }

        .entregado{
            background:var(--exito);
        }

        .observado{
            background:var(--rojo);
        }

        .grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:18px;
            margin-bottom:25px;
        }

        .card{
            background:#f7faf8;
            border:1px solid #dfe8e2;
            border-radius:14px;
            padding:16px;
        }

        .card strong{
            color:var(--verde);
            display:block;
            margin-bottom:6px;
        }

        .form-box{
            background:#ffffff;
            border:1px solid #dfe8e2;
            border-radius:16px;
            padding:24px;
            margin-bottom:28px;
            box-shadow:0 6px 16px rgba(0,0,0,.06);
        }

        .form-title{
            color:var(--verde);
            margin-bottom:18px;
            border-left:6px solid var(--dorado);
            padding-left:10px;
        }

        .form-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:18px;
        }

        .form-group{
            display:flex;
            flex-direction:column;
        }

        .form-group label{
            font-weight:bold;
            margin-bottom:8px;
            color:#333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea{
            padding:14px;
            border:1px solid #cfd8d3;
            border-radius:12px;
            font-size:15px;
            outline:none;
            background:white;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus{
            border-color:var(--verde);
            box-shadow:0 0 0 3px rgba(15,61,46,.12);
        }

        .full{
            grid-column:1 / -1;
        }

        .btn{
            border:none;
            border-radius:12px;
            padding:13px 18px;
            font-weight:bold;
            cursor:pointer;
            text-decoration:none;
            display:inline-block;
            margin-top:20px;
            font-size:14px;
        }

        .btn-primary{
            background:var(--verde);
            color:white;
        }

        .btn-primary:hover{
            background:var(--verde-claro);
        }

        .btn-dark{
            background:var(--verde-oscuro);
            color:white;
        }

        .btn-dark:hover{
            background:#061811;
        }

        .btn-warning{
            background:var(--dorado);
            color:#1b1b1b;
        }

        .btn-warning:hover{
            opacity:.9;
        }

        .button-row{
            display:flex;
            gap:12px;
            flex-wrap:wrap;
        }

        .section-title{
            color:var(--texto);
            margin-top:35px;
            margin-bottom:15px;
            border-left:6px solid var(--dorado);
            padding-left:10px;
        }

        .table-wrapper{
            width:100%;
            overflow-x:auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
        }

        th,td{
            padding:12px;
            border:1px solid #e5ebe7;
            text-align:center;
        }

        th{
            background:var(--verde);
            color:white;
        }

        tr:nth-child(even){
            background:#f7faf8;
        }

        tr:hover{
            background:#eef7f1;
        }

        .footer-note{
            background:var(--verde-oscuro);
            color:white;
            padding:22px 30px;
            display:flex;
            justify-content:space-between;
            flex-wrap:wrap;
            gap:12px;
            font-size:14px;
        }

        .footer-note span{
            color:var(--dorado);
            font-weight:bold;
        }

        @media(max-width:850px){
            .grid,
            .form-grid{
                grid-template-columns:1fr;
            }

            .full{
                grid-column:1;
            }

            .top{
                padding:20px 22px;
            }

            .top-links{
                margin-top:12px;
            }

            .content{
                overflow-x:auto;
            }
        }
    </style>
</head>
<body>

<div class="top">
    <div class="logo">CIVA<span>CARGO</span></div>

    <div class="top-links">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.encomiendas.index') }}">Panel de encomiendas</a>
    <a href="{{ route('registro') }}">Registrar encomienda</a>
    <a href="{{ route('seguimiento') }}">Consultar seguimiento</a>
    <a href="{{ route('inicio') }}">Ver página pública</a>
</div>
</div>

<div class="container">
    <div class="banner">
        <h1>Actualizar Estado</h1>
        <p>
            Actualiza la ubicación, estado y observación de la encomienda seleccionada.
            Cada cambio se guardará en el historial de seguimiento.
        </p>
    </div>

    <div class="content">

        @if ($errors->any())
            <div class="alert-error">
                Complete correctamente los campos obligatorios.
            </div>
        @endif

        @php
            $estadoClaseActual = 'registrado';

            if ($encomienda->estado === 'En tránsito') {
                $estadoClaseActual = 'transito';
            } elseif ($encomienda->estado === 'Entregado') {
                $estadoClaseActual = 'entregado';
            } elseif ($encomienda->estado === 'Observado') {
                $estadoClaseActual = 'observado';
            }
        @endphp

        <div class="info-box">
            <h3>Código de seguimiento: {{ $encomienda->codigo_seguimiento }}</h3>
            <p>Estado actual de la encomienda:</p>
            <span class="estado-actual {{ $estadoClaseActual }}">
                {{ $encomienda->estado }}
            </span>
        </div>

        <div class="grid">
            <div class="card">
                <strong>Remitente</strong>
                {{ $encomienda->cliente->nombre ?? 'Sin remitente' }}
            </div>

            <div class="card">
                <strong>Destinatario</strong>
                {{ $encomienda->nombre_destinatario ?? 'Sin destinatario' }}
            </div>

            <div class="card">
                <strong>Origen</strong>
                {{ $encomienda->origen }}
            </div>

            <div class="card">
                <strong>Destino</strong>
                {{ $encomienda->destino }}
            </div>
        </div>

        <div class="form-box">
            <h3 class="form-title">Nueva actualización logística</h3>

            <form action="{{ route('admin.encomiendas.estado.update', $encomienda) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label>Nuevo estado</label>
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
                        <label>Ubicación actual</label>
                        <input 
                            type="text" 
                            name="ubicacion" 
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

                <div class="button-row">
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

        <h3 class="section-title">Historial actual</h3>

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
                            <td colspan="4">
                                No hay historial registrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <div class="footer-note">
        <div><span>CIVACARGO</span> - Actualización logística de encomiendas</div>
        <div>Carr. Panamericana Sur 122, Chincha Alta 11702</div>
    </div>
</div>

</body>
</html>