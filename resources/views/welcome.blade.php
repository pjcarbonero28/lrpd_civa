<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVA Transporte y Turismo Chincha</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background:#f5f6fb;
            color:#222;
        }

        :root{
            --morado:#5b1ea8;
            --morado-oscuro:#3f0f7c;
            --fucsia:#e91e9a;
            --azul:#1e88e5;
            --azul-oscuro:#0d47a1;
            --blanco:#ffffff;
            --gris:#f4f4f4;
            --texto:#2c2c2c;
        }

        /* TOP HEADER */
        .top-header{
            background: linear-gradient(90deg, var(--morado), var(--fucsia), var(--azul));
            color:white;
            padding:18px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
        }

        .brand{
            font-size:34px;
            font-weight:900;
            letter-spacing:1px;
        }

        .brand span{
            color:#ffd6f2;
        }

        .top-right{
            display:flex;
            align-items:center;
            gap:20px;
            flex-wrap:wrap;
        }

        .top-contact{
            text-align:right;
            font-size:14px;
            line-height:1.7;
        }

        .zona-btn{
            background:rgba(255,255,255,0.18);
            color:white;
            text-decoration:none;
            padding:12px 18px;
            border-radius:10px;
            font-weight:bold;
            border:1px solid rgba(255,255,255,0.25);
        }

        .zona-btn:hover{
            background:rgba(255,255,255,0.28);
        }

        /* NAV */
        .navbar{
            width:90%;
            margin:-12px auto 0 auto;
            background:white;
            box-shadow:0 6px 18px rgba(0,0,0,0.15);
            border-radius:10px;
            padding:18px 28px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
            position:relative;
            z-index:20;
        }

        .nav-links{
            display:flex;
            gap:28px;
            flex-wrap:wrap;
        }

        .nav-links a{
            text-decoration:none;
            color:#333;
            font-weight:bold;
            font-size:15px;
        }

        .nav-links a:hover{
            color:var(--fucsia);
        }

        .phone-box{
            font-weight:bold;
            color:var(--azul-oscuro);
            font-size:16px;
        }

        /* HERO */
        .hero{
            width:100%;
            min-height:88vh;
            background:linear-gradient(135deg, #5b1ea8 0%, #7b1fa2 30%, #e91e9a 65%, #1e88e5 100%);
            padding:45px 35px 60px;
        }

        .hero-container{
            max-width:1300px;
            margin:0 auto;
            display:grid;
            grid-template-columns: 1.2fr 0.9fr;
            gap:25px;
            align-items:stretch;
        }

        /* LEFT SIDE */
        .hero-left{
            min-height:580px;
            border-radius:18px;
            overflow:hidden;
            position:relative;
            background:
                linear-gradient(135deg, rgba(255,255,255,0.10), rgba(255,255,255,0.02)),
                url('{{ asset('images/civa.jpg') }}');
            background-size:cover;
            background-position:center;
            box-shadow:0 10px 28px rgba(0,0,0,0.22);
        }

        .hero-left::before{
            content:"";
            position:absolute;
            inset:0;
            background:linear-gradient(135deg, rgba(63,15,124,0.25), rgba(233,30,154,0.15), rgba(30,136,229,0.12));
        }

        .hero-overlay{
            position:absolute;
            inset:0;
            padding:42px;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            color:white;
            z-index:2;
        }

        .hero-badge{
            display:inline-block;
            background:rgba(255,255,255,0.18);
            border:1px solid rgba(255,255,255,0.25);
            padding:10px 18px;
            border-radius:999px;
            font-weight:bold;
            width:max-content;
            backdrop-filter: blur(4px);
        }

        .hero-title{
            max-width:520px;
        }

        .hero-title h1{
            font-size:52px;
            line-height:1.05;
            margin-bottom:15px;
            font-weight:900;
            text-shadow:0 4px 14px rgba(0,0,0,0.25);
        }

        .hero-title p{
            font-size:18px;
            line-height:1.7;
            max-width:520px;
        }

        .hero-tag{
            display:inline-block;
            background:linear-gradient(90deg, var(--fucsia), #ff5db1);
            color:white;
            font-weight:bold;
            padding:14px 22px;
            border-radius:14px;
            width:max-content;
            box-shadow:0 8px 18px rgba(233,30,154,0.35);
        }

        /* RIGHT TRACKING PANEL */
        .hero-right{
            display:flex;
            align-items:center;
        }

        .tracking-card{
            width:100%;
            background:white;
            border-radius:18px;
            box-shadow:0 12px 30px rgba(0,0,0,0.18);
            overflow:hidden;
        }

        .tracking-tabs{
            display:flex;
            flex-wrap:wrap;
            background:#f0eef7;
        }

        .tracking-tab{
            flex:1;
            min-width:180px;
            padding:16px 18px;
            font-weight:bold;
            text-align:center;
            color:#444;
            border-right:1px solid #ddd;
        }

        .tracking-tab.active{
            background:white;
            color:var(--morado);
            border-bottom:4px solid var(--fucsia);
        }

        .tracking-body{
            padding:34px 28px;
        }

        .tracking-body h2{
            font-size:34px;
            color:var(--morado);
            margin-bottom:10px;
        }

        .tracking-line{
            width:80px;
            height:5px;
            background:linear-gradient(90deg, var(--fucsia), var(--azul));
            border-radius:20px;
            margin-bottom:25px;
        }

        .tracking-sub{
            color:#555;
            margin-bottom:20px;
            line-height:1.7;
        }

        .radio-row{
            display:flex;
            gap:30px;
            flex-wrap:wrap;
            margin-bottom:22px;
            color:#333;
            font-weight:bold;
        }

        .tracking-form{
            display:grid;
            grid-template-columns:1fr 140px;
            gap:12px;
            margin-bottom:14px;
        }

        .tracking-form input,
        .tracking-form select,
        .captcha-row input{
            width:100%;
            padding:14px 14px;
            border:1px solid #ccc;
            border-radius:10px;
            font-size:15px;
            outline:none;
        }

        .captcha-row{
            display:grid;
            grid-template-columns: 1fr 1fr 140px;
            gap:12px;
            align-items:center;
        }

        .captcha-box{
            background:linear-gradient(135deg, #ede7f6, #fce4ec);
            border:1px dashed #b39ddb;
            border-radius:10px;
            padding:14px;
            text-align:center;
            font-size:28px;
            font-weight:900;
            color:var(--morado);
            letter-spacing:3px;
        }

        .btn-main{
            background:linear-gradient(90deg, var(--fucsia), var(--azul));
            color:white;
            border:none;
            border-radius:10px;
            font-weight:bold;
            font-size:16px;
            cursor:pointer;
            padding:14px 18px;
        }

        .btn-main:hover{
            opacity:.92;
        }

        .quick-access{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:18px;
            max-width:1300px;
            margin:35px auto 0;
        }

        .quick-card{
            background:white;
            border-radius:16px;
            padding:22px;
            box-shadow:0 10px 22px rgba(0,0,0,0.12);
            text-align:center;
            transition:.25s;
        }

        .quick-card:hover{
            transform:translateY(-4px);
        }

        .quick-icon{
            width:62px;
            height:62px;
            margin:0 auto 14px;
            border-radius:16px;
            background:linear-gradient(135deg, var(--morado), var(--fucsia), var(--azul));
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:28px;
            font-weight:bold;
        }

        .quick-card h3{
            margin-bottom:10px;
            color:var(--morado);
        }

        .quick-card p{
            font-size:14px;
            color:#555;
            line-height:1.7;
            margin-bottom:12px;
        }

        .quick-card a{
            text-decoration:none;
            color:var(--azul);
            font-weight:bold;
        }

        /* INFO SECTION */
        .info-section{
            background:white;
            padding:70px 35px;
        }

        .info-container{
            max-width:1300px;
            margin:0 auto;
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:28px;
        }

        .info-box{
            background:linear-gradient(135deg, #ffffff, #f8f4ff);
            border:1px solid #ece6ff;
            border-radius:18px;
            padding:30px;
            box-shadow:0 8px 20px rgba(0,0,0,0.08);
        }

        .info-box h3{
            color:var(--morado);
            margin-bottom:14px;
            font-size:28px;
        }

        .info-box p{
            color:#555;
            line-height:1.8;
            margin-bottom:18px;
        }

        .info-box ul{
            padding-left:20px;
            color:#444;
            line-height:1.9;
        }

        /* APP SECTION */
        .app-section{
            background:linear-gradient(135deg, #2e0a66, #5b1ea8, #1e88e5);
            color:white;
            padding:65px 35px;
        }

        .app-container{
            max-width:1300px;
            margin:0 auto;
            display:grid;
            grid-template-columns:1.1fr 0.9fr;
            gap:30px;
            align-items:center;
        }

        .app-text h2{
            font-size:40px;
            margin-bottom:15px;
        }

        .app-text p{
            line-height:1.9;
            font-size:17px;
            margin-bottom:20px;
            color:#f0e9ff;
        }

        .store-buttons{
            display:flex;
            flex-wrap:wrap;
            gap:14px;
        }

        .store-btn{
            background:white;
            color:#222;
            text-decoration:none;
            padding:14px 20px;
            border-radius:12px;
            font-weight:bold;
            display:inline-block;
        }

        .app-card{
            background:rgba(255,255,255,0.10);
            border:1px solid rgba(255,255,255,0.18);
            border-radius:20px;
            padding:28px;
            backdrop-filter: blur(6px);
        }

        .app-card h3{
            margin-bottom:14px;
            font-size:28px;
        }

        .app-card p{
            line-height:1.8;
            color:#f3ecff;
            margin-bottom:16px;
        }

        .claim-btn{
            display:inline-block;
            text-decoration:none;
            background:linear-gradient(90deg, #ff4fa3, #7c4dff);
            color:white;
            padding:14px 20px;
            border-radius:12px;
            font-weight:bold;
        }

        /* FOOTER */
        footer{
            background:#12042c;
            color:white;
            padding:35px;
        }

        .footer-container{
            max-width:1300px;
            margin:0 auto;
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:24px;
        }

        .footer-box h4{
            margin-bottom:12px;
            font-size:20px;
            color:#ffd2f1;
        }

        .footer-box p,
        .footer-box li{
            color:#e5dcff;
            line-height:1.9;
            font-size:14px;
        }

        .footer-box ul{
            list-style:none;
        }

        .footer-copy{
            max-width:1300px;
            margin:25px auto 0;
            padding-top:20px;
            border-top:1px solid rgba(255,255,255,0.12);
            text-align:center;
            color:#d9d0ff;
            font-size:14px;
        }

        @media (max-width:1100px){
            .hero-container{
                grid-template-columns:1fr;
            }

            .quick-access{
                grid-template-columns:repeat(2,1fr);
            }

            .info-container,
            .app-container,
            .footer-container{
                grid-template-columns:1fr;
            }
        }

        @media (max-width:780px){
            .hero{
                padding:35px 18px 50px;
            }

            .top-header{
                padding:18px 20px;
            }

            .navbar{
                width:94%;
                padding:18px;
            }

            .hero-title h1{
                font-size:38px;
            }

            .tracking-form,
            .captcha-row{
                grid-template-columns:1fr;
            }

            .quick-access{
                grid-template-columns:1fr;
            }

            .hero-overlay{
                padding:26px;
            }

            .hero-left{
                min-height:420px;
            }
        }
    </style>
</head>
<body>

    <!-- HEADER SUPERIOR -->
    <header class="top-header">
        <div class="brand">CIVA<span>CARGO</span></div>

        <div class="top-right">
            <div class="top-contact">
                <div><strong>Correo:</strong> transporteturismochinchan@gmail.com</div>
                <div><strong>Teléfono:</strong> +51 920-825-776</div>
            </div>
            <a href="#" class="zona-btn">Zona Clientes</a>
        </div>
    </header>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-links">
            <a href="/">Inicio</a>
            <a href="/registro">Registro de envíos</a>
            <a href="/seguimiento">Seguimiento en vivo</a>
            <a href="#ubicacion">Ubícanos</a>
            <a href="#contacto">Contáctanos</a>
            <a href="#cotizador">Cotizador</a>
        </div>

        <div class="phone-box">Atención al cliente: +51 920-825-776</div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-container">

            <!-- IZQUIERDA -->
            <div class="hero-left">
                <div class="hero-overlay">
                    <div class="hero-badge">Transporte • Encomiendas • Seguimiento</div>

                    <div class="hero-title">
                        <h1>SI ENVÍAS TU ENCOMIENDA, HAZLO CON CIVA</h1>
                        <p>
                            Sistema web para registrar envíos, consultar su estado y mejorar el control
                            logístico de encomiendas en CIVA Transporte y Turismo Chincha.
                        </p>
                    </div>

                    <div class="hero-tag">REGISTRO DE ENVÍOS</div>
                </div>
            </div>

            <!-- DERECHA -->
            <div class="hero-right">
                <div class="tracking-card">
                    <div class="tracking-tabs">
                        <div class="tracking-tab active">Seguimiento en vivo</div>
                        <div class="tracking-tab">Registro de envíos</div>
                    </div>

                    <div class="tracking-body">
                        <h2>Realizar seguimiento</h2>
                        <div class="tracking-line"></div>

                        <p class="tracking-sub">
                            Consulta el estado de tu encomienda por número de tracking o por número de orden de servicio.
                        </p>

                        <div class="radio-row">
                            <label><input type="radio" checked> N° de Tracking</label>
                            <label><input type="radio"> N° de Orden de Servicio</label>
                        </div>

                        <div class="tracking-form">
                            <input type="text" placeholder="Ingrese el número de seguimiento">
                            <select>
                                <option>2026</option>
                                <option>2025</option>
                                <option>2024</option>
                            </select>
                        </div>

                        <div class="captcha-row">
                            <div class="captcha-box">J4r6A</div>
                            <input type="text" placeholder="Ingrese el texto">
                            <button class="btn-main">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ACCESOS RÁPIDOS -->
        <div class="quick-access">
            <div class="quick-card">
                <div class="quick-icon">R</div>
                <h3>Registro de envíos</h3>
                <p>Registra nuevas encomiendas con los datos del remitente, destinatario y estado del envío.</p>
                <a href="/registro">Ir al registro</a>
            </div>

            <div class="quick-card">
                <div class="quick-icon">S</div>
                <h3>Seguimiento en vivo</h3>
                <p>Consulta el estado de los envíos registrados y visualiza su avance dentro del sistema.</p>
                <a href="/seguimiento">Ver seguimiento</a>
            </div>

            <div class="quick-card" id="cotizador">
                <div class="quick-icon">C</div>
                <h3>Cotizador</h3>
                <p>Simula el costo aproximado de un envío según el origen, destino, tipo de paquete y peso.</p>
                <a href="#">Próximamente</a>
            </div>

            <div class="quick-card" id="ubicacion">
                <div class="quick-icon">U</div>
                <h3>Ubícanos</h3>
                <p>Encuentra información de atención, dirección referencial y canales de contacto de la empresa.</p>
                <a href="#contacto">Ver contacto</a>
            </div>
        </div>
    </section>

    <!-- INFORMACIÓN -->
    <section class="info-section">
        <div class="info-container">
            <div class="info-box">
                <h3>Registro de envíos</h3>
                <p>
                    El módulo de registro permite ingresar la información principal de cada encomienda:
                    remitente, destinatario, origen, destino, peso, descripción del paquete y estado actual.
                </p>
                <ul>
                    <li>Registro de código de encomienda</li>
                    <li>Datos del remitente y destinatario</li>
                    <li>Origen, destino y tipo de paquete</li>
                    <li>Estado de la encomienda</li>
                </ul>
            </div>

            <div class="info-box" id="contacto">
                <h3>Contáctanos</h3>
                <p>
                    Para consultas sobre envíos, seguimiento o atención al cliente, puedes comunicarte
                    mediante nuestros canales de contacto.
                </p>
                <ul>
                    <li><strong>Correo:</strong> transporteturismochinchan@gmail.com</li>
                    <li><strong>Teléfono:</strong> +51 920-825-776</li>
                    <li><strong>Horario:</strong> 7:00 a.m. - 12:00 a.m.</li>
                    <li><strong>Atención:</strong> Todos los días</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- APP / RECLAMACIONES -->
    <section class="app-section">
        <div class="app-container">
            <div class="app-text">
                <h2>Descarga nuestra app y gestiona tus envíos</h2>
                <p>
                    Accede a tu información de envíos, seguimiento y consultas desde una futura versión móvil
                    del sistema de CIVA Transporte y Turismo Chincha.
                </p>

                <div class="store-buttons">
                    <a href="#" class="store-btn">Google Play</a>
                    <a href="#" class="store-btn">App Store</a>
                </div>
            </div>

            <div class="app-card">
                <h3>Libro de reclamaciones</h3>
                <p>
                    Este espacio estará destinado para el registro de reclamos, observaciones o sugerencias
                    relacionadas con el servicio de encomiendas y atención al cliente.
                </p>
                <a href="#" class="claim-btn">Registrar reclamo</a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="footer-box">
                <h4>CIVACARGO</h4>
                <p>Sistema web de registro, seguimiento y control logístico de encomiendas.</p>
            </div>

            <div class="footer-box">
                <h4>Servicios</h4>
                <ul>
                    <li>Registro de envíos</li>
                    <li>Seguimiento en vivo</li>
                    <li>Cotizador</li>
                    <li>Zona clientes</li>
                </ul>
            </div>

            <div class="footer-box">
                <h4>Contacto</h4>
                <p>transporteturismochinchan@gmail.com</p>
                <p>+51 920-825-776</p>
                <p>7:00 a.m. - 12:00 a.m.</p>
            </div>

            <div class="footer-box">
                <h4>Información</h4>
                <ul>
                    <li>Ubícanos</li>
                    <li>Contáctanos</li>
                    <li>Libro de reclamaciones</li>
                    <li>Preguntas frecuentes</li>
                </ul>
            </div>
        </div>

        <div class="footer-copy">
            © 2026 CIVA Transporte y Turismo Chincha - Sistema de Encomiendas
        </div>
    </footer>

</body>
</html>
