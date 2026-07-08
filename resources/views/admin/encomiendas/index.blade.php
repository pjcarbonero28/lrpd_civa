<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrativo - CIVACARGO</title>
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
            gap:18px;
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
            max-width:1400px;
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
            font-size:38px;
            margin-bottom:10px;
        }

        .banner p{
            color:#e8f5ee;
            line-height:1.8;
            max-width:1050px;
        }

        .content{
            padding:30px;
        }

        .alert-success{
            background:#d1e7dd;
            color:#0f5132;
            padding:15px;
            border-radius:12px;
            margin-bottom:20px;
            font-weight:bold;
            border-left:6px solid var(--exito);
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

        .actions{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:15px;
            margin-bottom:25px;
            flex-wrap:wrap;
        }

        .search-form{
            display:flex;
            gap:10px;
            flex:1;
            min-width:280px;
        }

        .search-form input{
            flex:1;
            padding:13px;
            border:1px solid #cfd8d3;
            border-radius:12px;
            font-size:15px;
            outline:none;
        }

        .search-form input:focus{
            border-color:var(--verde);
            box-shadow:0 0 0 3px rgba(15,61,46,.12);
        }

        .btn{
            border:none;
            border-radius:12px;
            padding:13px 18px;
            font-weight:bold;
            cursor:pointer;
            text-decoration:none;
            display:inline-block;
            text-align:center;
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

        .btn-small{
            padding:9px 12px;
            font-size:13px;
            white-space:nowrap;
        }

        .action-buttons{
            display:flex;
            justify-content:center;
            align-items:center;
            gap:8px;
            flex-wrap:wrap;
        }

        .table-wrapper{
            width:100%;
            overflow-x:auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
            overflow:hidden;
            border-radius:14px;
        }

        th,td{
            padding:14px;
            border:1px solid #e5ebe7;
            text-align:center;
            font-size:14px;
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

        .estado{
            padding:7px 12px;
            border-radius:20px;
            color:white;
            font-size:13px;
            font-weight:bold;
            display:inline-block;
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

        .pagination{
            margin-top:20px;
        }

        .empty{
            padding:25px;
            text-align:center;
            color:#777;
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
            .content{
                overflow-x:auto;
            }

            .actions{
                align-items:stretch;
            }

            .search-form{
                width:100%;
                flex-direction:column;
            }

            .top{
                padding:20px 22px;
            }

            .top-links{
                margin-top:12px;
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
        <h1>Panel Administrativo de Encomiendas</h1>
        <p>
            Módulo interno utilizado por el encargado para visualizar encomiendas registradas,
            buscar envíos por código, remitente, DNI o destinatario, y actualizar el estado logístico
            de cada encomienda.
        </p>
    </div>

    <div class="content">

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="info-box">
            <h3>Gestión del encargado</h3>
            <p>
                En esta sección se muestran las encomiendas registradas en el sistema.
                El encargado puede controlar el avance del envío, cambiar su estado y mantener
                actualizado el historial de seguimiento para que el cliente pueda consultarlo desde
                la página pública.
            </p>
        </div>

        <div class="actions">
            <form action="{{ route('admin.encomiendas.index') }}" method="GET" class="search-form">
                <input 
                    type="text" 
                    name="busqueda" 
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
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($encomiendas as $encomienda)
                        <tr>
                            <td>{{ $encomienda->codigo_seguimiento }}</td>
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

                                <span class="estado {{ $estadoClase }}">
                                    {{ $encomienda->estado }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.encomiendas.estado', $encomienda) }}" class="btn btn-primary btn-small">
                                        Actualizar estado
                                    </a>

                                    <a href="{{ route('admin.encomiendas.pdf', $encomienda) }}" class="btn btn-warning btn-small">
                                        Descargar PDF
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="empty">
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

    <div class="footer-note">
        <div><span>CIVACARGO</span> - Panel administrativo del encargado</div>
        <div>Registro, búsqueda y actualización de encomiendas</div>
    </div>
</div>

</body>
</html>