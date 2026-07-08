<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento en Vivo - CIVACARGO</title>

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
            padding:18px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
        }

        .logo{
            font-size:32px;
            font-weight:900;
            letter-spacing:1px;
        }

        .logo span{
            color:var(--dorado);
        }

        .contact{
            font-size:14px;
            line-height:1.8;
            text-align:right;
        }

        .contact a{
            color:white;
            text-decoration:none;
            font-weight:bold;
        }

        .nav{
            width:90%;
            margin:-10px auto 0;
            background:white;
            border-radius:12px;
            padding:18px 24px;
            box-shadow:0 6px 16px rgba(0,0,0,.14);
            display:flex;
            gap:25px;
            flex-wrap:wrap;
            justify-content:center;
            position:relative;
            z-index:10;
        }

        .nav a{
            text-decoration:none;
            color:#263238;
            font-weight:bold;
        }

        .nav a:hover{
            color:var(--verde-claro);
        }

        .container{
            width:92%;
            max-width:1250px;
            margin:40px auto;
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
            line-height:1.8;
            color:#e8f5ee;
        }

        .content{
            padding:35px;
        }

        .search-box{
            display:grid;
            grid-template-columns:1fr 160px;
            gap:12px;
            margin-bottom:25px;
        }

        .search-box input{
            padding:14px;
            border:1px solid #cfd8d3;
            border-radius:12px;
            font-size:15px;
            outline:none;
        }

        .search-box input:focus{
            border-color:var(--verde);
            box-shadow:0 0 0 3px rgba(15,61,46,.12);
        }

        .search-box button{
            border:none;
            border-radius:12px;
            background:var(--verde);
            color:white;
            font-weight:bold;
            cursor:pointer;
            font-size:15px;
        }

        .search-box button:hover{
            background:var(--verde-claro);
        }

        table{
            width:100%;
            border-collapse:collapse;
            overflow:hidden;
            border-radius:14px;
            margin-bottom:25px;
        }

        th,td{
            padding:14px;
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

        .alert-success{
            background:#d1e7dd;
            color:#0f5132;
            padding:15px;
            border-radius:12px;
            margin-bottom:20px;
            font-weight:bold;
            border-left:6px solid var(--exito);
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

        .section-title{
            color:var(--texto);
            margin:25px 0 15px;
            border-left:6px solid var(--dorado);
            padding-left:10px;
        }

        .actions-row{
            display:flex;
            flex-wrap:wrap;
            gap:12px;
            margin-bottom:22px;
        }

        .btn-action{
            text-decoration:none;
            background:var(--dorado);
            color:#1b1b1b;
            padding:12px 16px;
            border-radius:12px;
            font-weight:bold;
            display:inline-block;
        }

        .btn-action.secondary{
            background:var(--verde);
            color:white;
        }

        footer{
            background:var(--verde-oscuro);
            color:white;
            padding:30px 35px;
            margin-top:30px;
        }

        .footer-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
        }

        .footer-grid h4{
            margin-bottom:10px;
            color:var(--dorado);
        }

        .footer-grid p{
            line-height:1.8;
            font-size:14px;
            color:#e5eee9;
        }

        .footer-grid a{
            color:#e5eee9;
            text-decoration:none;
            font-weight:bold;
        }

        @media(max-width:850px){
            .search-box{
                grid-template-columns:1fr;
            }

            .footer-grid{
                grid-template-columns:1fr;
            }

            .contact{
                text-align:left;
            }

            .content{
                overflow-x:auto;
            }

            .top{
                padding:18px 22px;
            }

            .nav{
                width:94%;
                gap:15px;
            }
        }
    </style>
</head>
<body>

    <div class="top">
        <div class="logo">CIVA<span>CARGO</span></div>

        <div class="contact">
            <div><strong>Correo:</strong> transporteturismochinchan@gmail.com</div>
            <div>
                <strong>WhatsApp:</strong>
                <a href="https://wa.me/51920825776?text=Hola%2C%20quiero%20consultar%20sobre%20una%20encomienda%20en%20CIVACARGO." target="_blank">
                    +51 920-825-776
                </a>
            </div>
        </div>
    </div>

   <nav class="nav">
    <a href="{{ route('inicio') }}">Inicio</a>
    <a href="{{ route('seguimiento') }}">Seguimiento en vivo</a>
    <a href="{{ route('inicio') }}#cotizador">Cotizador</a>
    <a href="{{ route('inicio') }}#ubicacion">Ubícanos</a>
    <a href="{{ route('inicio') }}#contacto">Contáctanos</a>
</nav>

    <div class="container">
        <div class="banner">
            <h1>Seguimiento en Vivo</h1>
            <p>Consulta el estado actual de las encomiendas registradas dentro del sistema.</p>
        </div>

        <div class="content">

            <form action="{{ route('seguimiento') }}" method="GET" class="search-box">
                <input 
                    type="text" 
                    name="codigo"
                    placeholder="Ingrese el código de encomienda o número de tracking"
                    value="{{ $codigo ?? '' }}"
                    required
                >

                <button type="submit">
                    Buscar
                </button>
            </form>

            @if (!empty($codigo) && !$encomienda)
                <div class="alert-error">
                    No se encontró ninguna encomienda con el código: <strong>{{ $codigo }}</strong>
                </div>
            @endif

            @if ($encomienda)
                <div class="alert-success">
                    Encomienda encontrada correctamente.
                </div>

                <div class="info-box">
                    <h3>Código de seguimiento: {{ $encomienda->codigo_seguimiento }}</h3>
                    <p>
                        Esta información corresponde al último registro disponible de la encomienda consultada.
                    </p>
                </div>

                <div class="actions-row">
                    <a href="{{ route('seguimiento') }}" class="btn-action">
                        Nueva consulta
                    </a>

                    <a href="https://wa.me/51920825776?text=Hola%2C%20quiero%20consultar%20sobre%20mi%20encomienda%20con%20c%C3%B3digo%20{{ $encomienda->codigo_seguimiento }}" target="_blank" class="btn-action secondary">
                        Consultar por WhatsApp
                    </a>
                </div>

                <h3 class="section-title">Datos de la encomienda</h3>

                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Remitente</th>
                            <th>Destinatario</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{ $encomienda->codigo_seguimiento }}</td>
                            <td>{{ $encomienda->cliente->nombre ?? 'Sin remitente' }}</td>
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
                        </tr>
                    </tbody>
                </table>

                <h3 class="section-title">Detalle adicional</h3>

                <table>
                    <thead>
                        <tr>
                            <th>Tipo de paquete</th>
                            <th>Peso</th>
                            <th>DNI destinatario</th>
                            <th>Teléfono destinatario</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{ $encomienda->tipo_paquete ?? 'No registrado' }}</td>
                            <td>{{ $encomienda->peso }} kg</td>
                            <td>{{ $encomienda->dni_destinatario ?? 'No registrado' }}</td>
                            <td>{{ $encomienda->telefono_destinatario ?? 'No registrado' }}</td>
                            <td>{{ $encomienda->descripcion ?? 'Sin descripción' }}</td>
                        </tr>
                    </tbody>
                </table>

                <h3 class="section-title">Historial de seguimiento</h3>

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
            @else
                @if (empty($codigo))
                    <div class="info-box">
                        <h3>Consulta tu encomienda</h3>
                        <p>
                            Ingresa el código generado al registrar la encomienda para visualizar su estado actual,
                            destino, descripción e historial logístico.
                        </p>
                    </div>
                @endif
            @endif

        </div>

        <footer>
            <div class="footer-grid">
                <div>
                    <h4>CIVACARGO</h4>
                    <p>Sistema web de seguimiento y control de encomiendas.</p>
                </div>

                <div>
                    <h4>Contacto</h4>
                    <p>transporteturismochinchan@gmail.com</p>
                    <p>
                        <a href="https://wa.me/51920825776?text=Hola%2C%20necesito%20informaci%C3%B3n%20sobre%20mi%20encomienda." target="_blank">
                            WhatsApp: +51 920-825-776
                        </a>
                    </p>
                </div>

                <div>
                    <h4>Ubicación</h4>
                    <p>Carr. Panamericana Sur 122</p>
                    <p>Chincha Alta 11702</p>
                    <p>Abierto - Cierra a las 11 p.m.</p>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>