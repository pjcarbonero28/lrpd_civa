<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Administrativo - CIVACARGO</title>

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
            --exito:#2e7d32;
            --alerta:#fff3cd;
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
            max-width:1200px;
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
            max-width:900px;
            color:#e8f5ee;
        }

        .form-section{
            padding:35px;
        }

        .note-box{
            background:#f5faf7;
            border-left:6px solid var(--verde);
            padding:18px;
            border-radius:12px;
            margin-bottom:25px;
        }

        .note-box h3{
            color:var(--verde);
            margin-bottom:8px;
        }

        .note-box p{
            color:#555;
            line-height:1.7;
        }

        .form-title{
            margin:30px 0 18px;
            color:var(--verde);
            border-left:6px solid var(--dorado);
            padding-left:10px;
        }

        .form-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:20px;
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
            margin-top:25px;
            background:var(--verde);
            color:white;
            border:none;
            padding:15px 24px;
            border-radius:12px;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
        }

        .btn:hover{
            background:var(--verde-claro);
        }

        .btn-secondary{
            margin-top:25px;
            background:var(--dorado);
            color:#1b1b1b;
            text-decoration:none;
            padding:15px 24px;
            border-radius:12px;
            font-size:16px;
            font-weight:bold;
            display:inline-block;
        }

        .btn-dark{
            margin-top:25px;
            background:var(--verde-oscuro);
            color:white;
            text-decoration:none;
            padding:15px 24px;
            border-radius:12px;
            font-size:16px;
            font-weight:bold;
            display:inline-block;
        }

        .button-row{
            display:flex;
            gap:12px;
            flex-wrap:wrap;
            align-items:center;
        }

        .alert-success{
            background:#d1e7dd;
            color:#0f5132;
            padding:15px;
            border-radius:12px;
            margin-bottom:18px;
            font-weight:bold;
            border-left:6px solid var(--exito);
        }

        .alert-code{
            background:var(--alerta);
            color:#664d03;
            padding:15px;
            border-radius:12px;
            margin-bottom:18px;
            font-weight:bold;
            border-left:6px solid var(--dorado);
        }

        .alert-code a{
            color:#664d03;
            font-weight:bold;
            margin-right:10px;
        }

        .alert-error{
            background:#f8d7da;
            color:#842029;
            padding:15px;
            border-radius:12px;
            margin-bottom:18px;
            font-weight:bold;
            border-left:6px solid var(--rojo);
        }

        footer{
            background:var(--verde-oscuro);
            color:white;
            padding:30px 35px;
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
            .form-grid{
                grid-template-columns:1fr;
            }

            .footer-grid{
                grid-template-columns:1fr;
            }

            .contact{
                text-align:left;
            }

            .full{
                grid-column:1;
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
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.encomiendas.index') }}">Panel de encomiendas</a>
        <a href="{{ route('registro') }}">Registrar encomienda</a>
        <a href="{{ route('seguimiento') }}">Consultar seguimiento</a>
        <a href="{{ route('inicio') }}">Ver página pública</a>
    </nav>

    <div class="container">
        <div class="banner">
            <h1>Registro Administrativo de Encomiendas</h1>
            <p>
                Módulo interno utilizado por el encargado de la agencia para registrar encomiendas,
                ingresar los datos del remitente, destinatario, paquete y pago del servicio.
            </p>
        </div>

        <div class="form-section">

            <div class="note-box">
                <h3>Módulo del encargado</h3>
                <p>
                    El cliente no registra directamente su encomienda. El encargado de la agencia
                    recibe el paquete, verifica los datos, registra el pago del servicio y entrega el
                    código de seguimiento al cliente para que pueda consultar el estado desde la página pública.
                </p>
            </div>

            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('codigo'))
                <div class="alert-code">
                    Código de seguimiento generado:
                    <strong>{{ session('codigo') }}</strong>
                    <br><br>

                    <a href="{{ route('seguimiento', ['codigo' => session('codigo')]) }}">
                        Consultar esta encomienda
                    </a>

                    @if (session('encomienda_id'))
                        |
                        <a href="{{ route('admin.encomiendas.pdf', session('encomienda_id')) }}">
                            Descargar constancia PDF
                        </a>
                    @endif
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-error">
                    Complete correctamente los campos obligatorios, incluidos los datos del pago.
                </div>
            @endif

            <form action="{{ route('registro.store') }}" method="POST">
                @csrf

                <h3 class="form-title">Datos del remitente</h3>

                <div class="form-grid">
                    <div class="form-group">
                        <label>Fecha de envío</label>
                        <input type="date" name="fecha_envio" value="{{ old('fecha_envio') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Nombre del remitente</label>
                        <input type="text" name="nombre_remitente" placeholder="Ingrese nombre del remitente" value="{{ old('nombre_remitente') }}" required>
                    </div>

                    <div class="form-group">
                        <label>DNI del remitente</label>
                        <input type="text" name="dni_remitente" placeholder="Ingrese DNI del remitente" value="{{ old('dni_remitente') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Teléfono del remitente</label>
                        <input type="text" name="telefono_remitente" placeholder="Ingrese teléfono del remitente" value="{{ old('telefono_remitente') }}" required>
                    </div>
                </div>

                <h3 class="form-title">Datos del destinatario</h3>

                <div class="form-grid">
                    <div class="form-group">
                        <label>Nombre del destinatario</label>
                        <input type="text" name="nombre_destinatario" placeholder="Ingrese nombre del destinatario" value="{{ old('nombre_destinatario') }}" required>
                    </div>

                    <div class="form-group">
                        <label>DNI del destinatario</label>
                        <input type="text" name="dni_destinatario" placeholder="Ingrese DNI del destinatario" value="{{ old('dni_destinatario') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Teléfono del destinatario</label>
                        <input type="text" name="telefono_destinatario" placeholder="Ingrese teléfono del destinatario" value="{{ old('telefono_destinatario') }}" required>
                    </div>
                </div>

                <h3 class="form-title">Datos de la encomienda</h3>

                <div class="form-grid">
                    <div class="form-group">
                        <label>Origen</label>
                        <input type="text" name="origen" placeholder="Ej. Chincha" value="{{ old('origen') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Destino</label>
                        <input type="text" name="destino" placeholder="Ej. Lima" value="{{ old('destino') }}" required>
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
                        <input type="number" step="0.1" min="0.1" name="peso" placeholder="Ej. 2.5" value="{{ old('peso') }}" required>
                    </div>

                    <div class="form-group full">
                        <label>Descripción del contenido</label>
                        <textarea name="descripcion" rows="4" placeholder="Ingrese una descripción breve de la encomienda">{{ old('descripcion') }}</textarea>
                    </div>
                </div>

                <h3 class="form-title">Datos del pago</h3>

                <div class="form-grid">
                    <div class="form-group">
                        <label>Monto del envío</label>
                        <input 
                            type="number" 
                            step="0.10" 
                            min="0" 
                            name="monto" 
                            placeholder="Ej. 15.00" 
                            value="{{ old('monto') }}" 
                            required
                        >
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

                <div class="button-row">
                    <button type="submit" class="btn">
                        Guardar registro
                    </button>

                    <a href="{{ route('admin.encomiendas.index') }}" class="btn-secondary">
                        Ver panel de encomiendas
                    </a>

                    <a href="{{ route('seguimiento') }}" class="btn-dark">
                        Consultar seguimiento
                    </a>
                </div>
            </form>
        </div>

        <footer>
            <div class="footer-grid">
                <div>
                    <h4>CIVACARGO</h4>
                    <p>Sistema web administrativo para el registro, pago y control logístico de encomiendas.</p>
                </div>

                <div>
                    <h4>Módulo interno</h4>
                    <p>Registro de encomiendas</p>
                    <p>Registro del pago del servicio</p>
                    <p>Generación de código de seguimiento</p>
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