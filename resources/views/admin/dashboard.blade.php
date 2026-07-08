<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Administrativo - CIVACARGO</title>
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

        .stats-grid{
            display:grid;
            grid-template-columns:repeat(5,1fr);
            gap:18px;
            margin-bottom:30px;
        }

        .stat-card{
            background:white;
            border:1px solid #dfe8e2;
            border-radius:18px;
            padding:24px;
            box-shadow:0 8px 20px rgba(0,0,0,.08);
            position:relative;
            overflow:hidden;
        }

        .stat-card::before{
            content:"";
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:6px;
            background:var(--verde);
        }

        .stat-card.total::before{
            background:var(--verde);
        }

        .stat-card.registradas::before{
            background:var(--naranja);
        }

        .stat-card.transito::before{
            background:var(--azul);
        }

        .stat-card.entregadas::before{
            background:var(--exito);
        }

        .stat-card.observadas::before{
            background:var(--rojo);
        }

        .stat-card h3{
            font-size:15px;
            color:#555;
            margin-bottom:12px;
        }

        .stat-card .number{
            font-size:38px;
            font-weight:900;
            color:var(--verde);
        }

        .stat-card .desc{
            margin-top:8px;
            font-size:13px;
            color:#777;
            line-height:1.5;
        }

        .actions-row{
            display:flex;
            gap:12px;
            flex-wrap:wrap;
            margin-bottom:30px;
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

        .btn-warning{
            background:var(--dorado);
            color:#1b1b1b;
        }

        .btn-warning:hover{
            opacity:.9;
        }

        .btn-dark{
            background:var(--verde-oscuro);
            color:white;
        }

        .btn-dark:hover{
            background:#061811;
        }

        .section-title{
            color:var(--texto);
            margin:25px 0 15px;
            border-left:6px solid var(--dorado);
            padding-left:10px;
        }

        .dashboard-grid{
            display:grid;
            grid-template-columns:1.1fr .9fr;
            gap:24px;
            margin-top:20px;
        }

        .panel-card{
            background:white;
            border:1px solid #dfe8e2;
            border-radius:18px;
            padding:24px;
            box-shadow:0 8px 20px rgba(0,0,0,.08);
        }

        .panel-card h3{
            color:var(--verde);
            margin-bottom:15px;
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
            padding:13px;
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

        .summary-list{
            list-style:none;
        }

        .summary-list li{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:14px 0;
            border-bottom:1px solid #e5ebe7;
            color:#555;
            font-weight:bold;
        }

        .summary-list li:last-child{
            border-bottom:none;
        }

        .summary-list span{
            background:#f5faf7;
            color:var(--verde);
            padding:7px 12px;
            border-radius:20px;
            font-weight:900;
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

        @media(max-width:1100px){
            .stats-grid{
                grid-template-columns:repeat(2,1fr);
            }

            .dashboard-grid{
                grid-template-columns:1fr;
            }
        }

        @media(max-width:700px){
            .stats-grid{
                grid-template-columns:1fr;
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
        <h1>Dashboard Administrativo</h1>
        <p>
            Resumen general del estado logístico de las encomiendas registradas.
            Esta vista permite al encargado visualizar indicadores principales del sistema.
        </p>
    </div>

    <div class="content">

        <div class="info-box">
            <h3>Resumen del sistema</h3>
            <p>
                El dashboard muestra la cantidad total de encomiendas y su distribución por estado.
                Esto ayuda al encargado a controlar rápidamente los envíos registrados, en tránsito,
                entregados u observados.
            </p>
        </div>

        <div class="stats-grid">
            <div class="stat-card total">
                <h3>Total de encomiendas</h3>
                <div class="number">{{ $totalEncomiendas }}</div>
                <div class="desc">Cantidad general registrada en el sistema.</div>
            </div>

            <div class="stat-card registradas">
                <h3>Registradas</h3>
                <div class="number">{{ $registradas }}</div>
                <div class="desc">Encomiendas ingresadas recientemente.</div>
            </div>

            <div class="stat-card transito">
                <h3>En tránsito</h3>
                <div class="number">{{ $enTransito }}</div>
                <div class="desc">Encomiendas que se encuentran en proceso de traslado.</div>
            </div>

            <div class="stat-card entregadas">
                <h3>Entregadas</h3>
                <div class="number">{{ $entregadas }}</div>
                <div class="desc">Encomiendas finalizadas correctamente.</div>
            </div>

            <div class="stat-card observadas">
                <h3>Observadas</h3>
                <div class="number">{{ $observadas }}</div>
                <div class="desc">Encomiendas con incidencia o revisión pendiente.</div>
            </div>
        </div>

        <div class="actions-row">
            <a href="{{ route('registro') }}" class="btn btn-warning">
                + Registrar nueva encomienda
            </a>

            <a href="{{ route('admin.encomiendas.index') }}" class="btn btn-primary">
                Ver panel de encomiendas
            </a>

            <a href="{{ route('seguimiento') }}" class="btn btn-dark">
                Consultar seguimiento
            </a>
        </div>

        <div class="dashboard-grid">
            <div class="panel-card">
                <h3>Últimas encomiendas registradas</h3>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Remitente</th>
                                <th>Destino</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($ultimasEncomiendas as $encomienda)
                                <tr>
                                    <td>{{ $encomienda->codigo_seguimiento }}</td>
                                    <td>{{ $encomienda->cliente->nombre ?? 'Sin remitente' }}</td>
                                    <td>{{ $encomienda->destino }}</td>
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty">
                                        No hay encomiendas registradas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="panel-card">
                <h3>Indicadores logísticos</h3>

                <ul class="summary-list">
                    <li>
                        Total de encomiendas
                        <span>{{ $totalEncomiendas }}</span>
                    </li>

                    <li>
                        Registradas
                        <span>{{ $registradas }}</span>
                    </li>

                    <li>
                        En tránsito
                        <span>{{ $enTransito }}</span>
                    </li>

                    <li>
                        Entregadas
                        <span>{{ $entregadas }}</span>
                    </li>

                    <li>
                        Observadas
                        <span>{{ $observadas }}</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <div class="footer-note">
        <div><span>CIVACARGO</span> - Dashboard administrativo del encargado</div>
        <div>Indicadores de registro y seguimiento de encomiendas</div>
    </div>
</div>

</body>
</html>