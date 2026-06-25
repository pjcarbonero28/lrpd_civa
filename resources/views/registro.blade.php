<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Envíos - CIVA</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:Arial, Helvetica, sans-serif;}
        :root{
            --morado:#5b1ea8;
            --fucsia:#e91e9a;
            --azul:#1e88e5;
            --fondo:#f6f4fb;
        }
        body{background:var(--fondo);}
        .top{
            background:linear-gradient(90deg,var(--morado),var(--fucsia),var(--azul));
            color:white;
            padding:18px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
        }
        .logo{font-size:32px;font-weight:900;}
        .logo span{color:#ffd8f4;}
        .contact{font-size:14px;line-height:1.8;text-align:right;}
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
        }
        .nav a{text-decoration:none;color:#333;font-weight:bold;}
        .nav a:hover{color:var(--fucsia);}
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
            background:linear-gradient(135deg,var(--morado),var(--fucsia),var(--azul));
            color:white;
            padding:35px;
        }
        .banner h1{font-size:38px;margin-bottom:10px;}
        .banner p{line-height:1.8;max-width:850px;}
        .form-section{padding:35px;}
        .form-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:20px;
        }
        .form-group{display:flex;flex-direction:column;}
        .form-group label{
            font-weight:bold;
            margin-bottom:8px;
            color:#333;
        }
        .form-group input,
        .form-group select,
        .form-group textarea{
            padding:14px;
            border:1px solid #ccc;
            border-radius:12px;
            font-size:15px;
            outline:none;
        }
        .full{grid-column:1 / -1;}
        .btn{
            margin-top:25px;
            background:linear-gradient(90deg,var(--fucsia),var(--azul));
            color:white;
            border:none;
            padding:15px 24px;
            border-radius:12px;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
        }
        .btn:hover{opacity:.92;}
        footer{
            background:#180535;
            color:white;
            padding:30px 35px;
        }
        .footer-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
        }
        .footer-grid h4{margin-bottom:10px;color:#ffd8f4;}
        .footer-grid p{line-height:1.8;font-size:14px;color:#e9dcff;}
        @media(max-width:850px){
            .form-grid{grid-template-columns:1fr;}
            .footer-grid{grid-template-columns:1fr;}
            .contact{text-align:left;}
        }
    </style>
</head>
<body>

    <div class="top">
        <div class="logo">CIVA<span>CARGO</span></div>
        <div class="contact">
            <div><strong>Correo:</strong> transporteturismochinchan@gmail.com</div>
            <div><strong>Teléfono:</strong> +51 920-825-776</div>
        </div>
    </div>

    <nav class="nav">
        <a href="/">Inicio</a>
        <a href="/registro">Registro de envíos</a>
        <a href="/seguimiento">Seguimiento en vivo</a>
        <a href="#">Ubícanos</a>
        <a href="#">Contáctanos</a>
        <a href="#">Cotizador</a>
    </nav>

    <div class="container">
        <div class="banner">
            <h1>Registro de Envíos</h1>
            <p>Complete la información de la encomienda para registrar un nuevo envío dentro del sistema de CIVA Transporte y Turismo Chincha.</p>
        </div>

        <div class="form-section">
            <form>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Código de encomienda</label>
                        <input type="text" placeholder="Ej. ENC-001">
                    </div>

                    <div class="form-group">
                        <label>Fecha de envío</label>
                        <input type="date">
                    </div>

                    <div class="form-group">
                        <label>Nombre del remitente</label>
                        <input type="text" placeholder="Ingrese nombre del remitente">
                    </div>

                    <div class="form-group">
                        <label>DNI del remitente</label>
                        <input type="text" placeholder="Ingrese DNI del remitente">
                    </div>

                    <div class="form-group">
                        <label>Teléfono del remitente</label>
                        <input type="text" placeholder="Ingrese teléfono del remitente">
                    </div>

                    <div class="form-group">
                        <label>Nombre del destinatario</label>
                        <input type="text" placeholder="Ingrese nombre del destinatario">
                    </div>

                    <div class="form-group">
                        <label>DNI del destinatario</label>
                        <input type="text" placeholder="Ingrese DNI del destinatario">
                    </div>

                    <div class="form-group">
                        <label>Teléfono del destinatario</label>
                        <input type="text" placeholder="Ingrese teléfono del destinatario">
                    </div>

                    <div class="form-group">
                        <label>Origen</label>
                        <input type="text" placeholder="Ej. Chincha">
                    </div>

                    <div class="form-group">
                        <label>Destino</label>
                        <input type="text" placeholder="Ej. Lima">
                    </div>

                    <div class="form-group">
                        <label>Tipo de paquete</label>
                        <select>
                            <option>Documento</option>
                            <option>Caja</option>
                            <option>Sobre</option>
                            <option>Paquete</option>
                            <option>Otro</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Peso aproximado</label>
                        <input type="text" placeholder="Ej. 2 kg">
                    </div>

                    <div class="form-group">
                        <label>Estado de la encomienda</label>
                        <select>
                            <option>Registrado</option>
                            <option>En tránsito</option>
                            <option>Entregado</option>
                            <option>Observado</option>
                        </select>
                    </div>

                    <div class="form-group full">
                        <label>Descripción del contenido</label>
                        <textarea rows="4" placeholder="Ingrese una descripción breve de la encomienda"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn">Guardar registro</button>
            </form>
        </div>

        <footer>
            <div class="footer-grid">
                <div>
                    <h4>CIVACARGO</h4>
                    <p>Sistema web de registro de envíos y control logístico de encomiendas.</p>
                </div>
                <div>
                    <h4>Contacto</h4>
                    <p>transporteturismochinchan@gmail.com</p>
                    <p>+51 920-825-776</p>
                </div>
                <div>
                    <h4>Horario</h4>
                    <p>Todos los días</p>
                    <p>7:00 a.m. - 12:00 a.m.</p>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>