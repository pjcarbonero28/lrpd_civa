<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVACARGO - Transporte y Turismo Chincha</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f4f7f5;
            color: #1f2933;
        }

        :root {
            --verde: #0f3d2e;
            --verde-oscuro: #08251c;
            --verde-claro: #1f6f50;
            --dorado: #c89b3c;
            --blanco: #ffffff;
            --gris: #eef3f0;
            --texto: #263238;
        }

        .top-header {
            background: var(--verde);
            color: white;
            padding: 24px 40px 18px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .brand {
            font-size: 36px;
            font-weight: 900;
            letter-spacing: 1px;
            text-align: center;
        }

        .brand span {
            color: var(--dorado);
        }

        .navbar {
            width: 100%;
            background: white;
            box-shadow: 0 5px 16px rgba(0, 0, 0, 0.10);
            border-top: 1px solid rgba(15, 61, 46, 0.08);
            border-bottom: 1px solid rgba(15, 61, 46, 0.08);
            position: relative;
            z-index: 20;
        }

        .nav-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 15px 35px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #263238;
            font-weight: bold;
            font-size: 15px;
            padding: 6px 0;
            position: relative;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background: var(--dorado);
            transition: .25s;
        }

        .nav-links a:hover {
            color: var(--verde-claro);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .hero {
            width: 100%;
            min-height: 88vh;
            background: linear-gradient(135deg, var(--verde-oscuro), var(--verde), var(--verde-claro));
            padding: 55px 35px 60px;
        }

        .hero-container {
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.15fr .9fr;
            gap: 28px;
            align-items: stretch;
        }

        .hero-left {
            min-height: 560px;
            border-radius: 18px;
            overflow: hidden;
            position: relative;
            background:
                linear-gradient(135deg, rgba(8, 37, 28, 0.65), rgba(15, 61, 46, 0.38)),
                url('{{ asset('images/civa.jpg') }}');
            background-size: cover;
            background-position: center;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            padding: 42px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: white;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 10px 18px;
            border-radius: 999px;
            font-weight: bold;
            width: max-content;
        }

        .hero-title {
            max-width: 580px;
        }

        .hero-title h1 {
            font-size: 52px;
            line-height: 1.05;
            margin-bottom: 15px;
            font-weight: 900;
            text-shadow: 0 4px 14px rgba(0, 0, 0, 0.35);
        }

        .hero-title p {
            font-size: 18px;
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            align-items: center;
        }

        .hero-btn {
            text-decoration: none;
            font-weight: bold;
            padding: 14px 22px;
            border-radius: 13px;
            background: var(--dorado);
            color: #1b1b1b;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.22);
            transition: .25s ease;
        }

        .hero-btn:hover {
            transform: translateY(-2px);
        }

        .hero-btn.login {
            background: linear-gradient(135deg, #08251c, #0f3d2e);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.30);
            box-shadow:
                0 8px 18px rgba(0, 0, 0, 0.25),
                inset 0 0 0 1px rgba(200, 155, 60, 0.25);
            position: relative;
        }

        .hero-btn.login::before {
            content: "";
            position: absolute;
            inset: 4px;
            border-radius: 10px;
            border: 1px solid rgba(200, 155, 60, 0.20);
            pointer-events: none;
        }

        .hero-btn.login:hover {
            background: linear-gradient(135deg, #0f3d2e, #1f6f50);
            box-shadow:
                0 10px 22px rgba(0, 0, 0, 0.28),
                inset 0 0 0 1px rgba(200, 155, 60, 0.35);
        }

        .hero-right {
            display: flex;
            align-items: center;
        }

        .tracking-card {
            width: 100%;
            background: white;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
            overflow: hidden;
        }

        .tracking-tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #edf4ef;
        }

        .tracking-tab {
            padding: 16px 18px;
            font-weight: bold;
            text-align: center;
            color: #444;
            border-right: 1px solid #dfe8e2;
        }

        .tracking-tab.active {
            background: white;
            color: var(--verde);
            border-bottom: 4px solid var(--dorado);
        }

        .tracking-tab a {
            text-decoration: none;
            color: inherit;
        }

        .tracking-body {
            padding: 34px 28px;
        }

        .tracking-body h2 {
            font-size: 34px;
            color: var(--verde);
            margin-bottom: 10px;
        }

        .tracking-line {
            width: 80px;
            height: 5px;
            background: var(--dorado);
            border-radius: 20px;
            margin-bottom: 25px;
        }

        .tracking-sub {
            color: #555;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .tracking-form {
            display: grid;
            grid-template-columns: 1fr 130px;
            gap: 12px;
            margin-bottom: 14px;
        }

        .tracking-form input {
            width: 100%;
            padding: 15px;
            border: 1px solid #cfd8d3;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }

        .btn-main {
            background: var(--verde);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            padding: 14px 18px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-main:hover {
            background: var(--verde-claro);
        }

        .tracking-help {
            background: #f3f8f5;
            border-left: 5px solid var(--verde);
            padding: 14px;
            border-radius: 10px;
            color: #555;
            font-size: 14px;
            line-height: 1.7;
            margin-top: 18px;
        }

        .section {
            background: white;
            padding: 70px 35px;
        }

        .section.alt {
            background: #f4f7f5;
        }

        .section-container {
            max-width: 1300px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-title h2 {
            color: var(--verde);
            font-size: 38px;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #555;
            font-size: 17px;
            line-height: 1.7;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .service-card {
            background: linear-gradient(135deg, #ffffff, #f5faf7);
            border: 1px solid #dfe8e2;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .service-card h3 {
            color: var(--verde);
            margin-bottom: 12px;
        }

        .service-card p {
            color: #555;
            line-height: 1.7;
            font-size: 15px;
        }

        .cotizador-box {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            align-items: stretch;
        }

        .cotizador-form,
        .cotizador-result {
            background: white;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #dfe8e2;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        .form-group input,
        .form-group select {
            padding: 14px;
            border: 1px solid #cfd8d3;
            border-radius: 10px;
            font-size: 15px;
        }

        .result-card {
            background: linear-gradient(135deg, #f5faf7, #ffffff);
            border-radius: 16px;
            padding: 24px;
            height: 100%;
            border-left: 6px solid var(--verde);
        }

        .result-card h3 {
            color: var(--verde);
            font-size: 28px;
            margin-bottom: 15px;
        }

        .price {
            font-size: 44px;
            font-weight: 900;
            color: var(--verde-claro);
            margin: 18px 0;
        }

        .result-card p {
            color: #555;
            line-height: 1.8;
        }

        .location-grid {
            display: grid;
            grid-template-columns: .85fr 1.15fr;
            gap: 28px;
            align-items: stretch;
        }

        .location-info {
            background: white;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #dfe8e2;
        }

        .location-info h3 {
            color: var(--verde);
            font-size: 28px;
            margin-bottom: 18px;
        }

        .location-info p {
            color: #555;
            line-height: 1.9;
            margin-bottom: 12px;
        }

        .location-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 18px;
        }

        .map-box {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            min-height: 430px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #dfe8e2;
        }

        .map-box iframe {
            width: 100%;
            height: 100%;
            min-height: 430px;
            border: 0;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .contact-card {
            background: linear-gradient(135deg, #ffffff, #f5faf7);
            border: 1px solid #dfe8e2;
            border-radius: 18px;
            padding: 26px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .contact-card h3 {
            color: var(--verde);
            margin-bottom: 12px;
        }

        .contact-card p {
            color: #555;
            line-height: 1.7;
        }

        .contact-card a {
            color: var(--verde-claro);
            text-decoration: none;
            font-weight: bold;
        }

        footer {
            background: #061811;
            color: white;
            padding: 35px;
        }

        .footer-container {
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .footer-box h4 {
            margin-bottom: 12px;
            font-size: 20px;
            color: var(--dorado);
        }

        .footer-box p,
        .footer-box li {
            color: #e5eee9;
            line-height: 1.9;
            font-size: 14px;
        }

        .footer-box ul {
            list-style: none;
        }

        .footer-box a {
            color: #e5eee9;
            text-decoration: none;
        }

        .footer-box a:hover {
            color: white;
        }

        .footer-copy {
            max-width: 1300px;
            margin: 25px auto 0;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            text-align: center;
            color: #d7e6dd;
            font-size: 14px;
        }

        @media (max-width:1100px) {

            .hero-container,
            .cotizador-box,
            .location-grid {
                grid-template-columns: 1fr;
            }

            .services-grid,
            .footer-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width:780px) {
            .hero {
                padding: 35px 18px 50px;
            }

            .top-header {
                padding: 20px 18px;
            }

            .brand {
                font-size: 30px;
            }

            .nav-container {
                padding: 14px 18px;
            }

            .nav-links {
                gap: 16px;
            }

            .hero-title h1 {
                font-size: 38px;
            }

            .tracking-form,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .services-grid,
            .footer-container {
                grid-template-columns: 1fr;
            }

            .hero-overlay {
                padding: 26px;
            }

            .hero-left {
                min-height: 420px;
            }
        }
    </style>
</head>

<body>

    <header class="top-header">
        <div class="brand">CIVA<span>CARGO</span></div>
    </header>

    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-links">
                <a href="{{ route('inicio') }}">Inicio</a>
                <a href="{{ route('seguimiento') }}">Seguimiento en vivo</a>
                <a href="#cotizador">Cotizador</a>
                <a href="#ubicacion">Ubícanos</a>
                <a href="#contacto">Contáctanos</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-container">

            <div class="hero-left">
                <div class="hero-overlay">
                    <div class="hero-badge">Transporte • Encomiendas • Seguimiento</div>

                    <div class="hero-title">
                        <h1>ENVÍA Y CONSULTA TUS ENCOMIENDAS CON CIVACARGO</h1>
                        <p>
                            Plataforma web orientada al cliente para consultar el estado de sus encomiendas,
                            conocer la ubicación de la agencia y solicitar información sobre envíos.
                        </p>
                    </div>

                    <div class="hero-buttons">
                        <a href="{{ route('seguimiento') }}" class="hero-btn">
                            Consultar seguimiento
                        </a>

                        <a href="{{ route('login') }}" class="hero-btn login">
                            Iniciar sesión
                        </a>
                    </div>
                </div>
            </div>

            <div class="hero-right">
                <div class="tracking-card">
                    <div class="tracking-tabs">
                        <div class="tracking-tab active">Seguimiento rápido</div>
                        <div class="tracking-tab">
                            <a href="#contacto">Atención al cliente</a>
                        </div>
                    </div>

                    <div class="tracking-body">
                        <h2>Consulta tu encomienda</h2>
                        <div class="tracking-line"></div>

                        <p class="tracking-sub">
                            Ingresa el código de seguimiento entregado por el encargado al registrar tu encomienda.
                        </p>

                        <form action="{{ route('seguimiento') }}" method="GET" class="tracking-form">
                            <input
                                type="text"
                                name="codigo"
                                placeholder="Ej. ENC-20260708-4A839"
                                required>

                            <button type="submit" class="btn-main">
                                Consultar
                            </button>
                        </form>

                        <div class="tracking-help">
                            El cliente no modifica datos del envío. Solo consulta el estado y el historial de su encomienda.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-container">
            <div class="section-title">
                <h2>Servicios para el cliente</h2>
                <p>Opciones disponibles desde la página pública de CIVACARGO.</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <h3>Consulta de seguimiento</h3>
                    <p>
                        El cliente puede consultar el estado de su encomienda usando el código generado
                        durante el registro del envío.
                    </p>
                </div>

                <div class="service-card">
                    <h3>Cotización referencial</h3>
                    <p>
                        Permite calcular un monto aproximado según origen, destino, tipo de paquete y peso.
                    </p>
                </div>

                <div class="service-card">
                    <h3>Información de atención</h3>
                    <p>
                        Se muestra la ubicación, horario, teléfono, WhatsApp y correo para atención al cliente.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section alt" id="cotizador">
        <div class="section-container">
            <div class="section-title">
                <h2>Cotizador de envíos</h2>
                <p>Calcula un precio aproximado para mostrar una referencia al cliente.</p>
            </div>

            <div class="cotizador-box">
                <div class="cotizador-form">
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Origen</label>
                            <select id="origen">
                                <option value="Chincha">Chincha</option>
                                <option value="Ica">Ica</option>
                                <option value="Lima">Lima</option>
                                <option value="Pisco">Pisco</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Destino</label>
                            <select id="destino">
                                <option value="Ica">Ica</option>
                                <option value="Lima">Lima</option>
                                <option value="Pisco">Pisco</option>
                                <option value="Cañete">Cañete</option>
                                <option value="Chincha">Chincha</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tipo de paquete</label>
                            <select id="tipo">
                                <option value="Sobre">Sobre</option>
                                <option value="Caja">Caja</option>
                                <option value="Paquete frágil">Paquete frágil</option>
                                <option value="Objeto pesado">Objeto pesado</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Peso aproximado</label>
                            <input type="number" id="peso" min="0.1" step="0.1" placeholder="Ej. 10">
                        </div>

                        <div class="form-group full">
                            <button type="button" class="btn-main" onclick="calcularCotizacion()">
                                Calcular costo aproximado
                            </button>
                        </div>
                    </div>
                </div>

                <div class="cotizador-result">
                    <div class="result-card">
                        <h3>Resultado de cotización</h3>
                        <p>El monto mostrado es referencial y puede variar según las condiciones del servicio.</p>

                        <div class="price" id="precioCotizado">S/ 0.00</div>

                        <p id="detalleCotizacion">
                            Completa los datos del envío y presiona calcular.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="ubicacion">
        <div class="section-container">
            <div class="section-title">
                <h2>Ubícanos</h2>
                <p>Información de atención y ubicación referencial de CIVA Transporte y Turismo Chincha.</p>
            </div>

            <div class="location-grid">
                <div class="location-info">
                    <h3>CIVA | Transporte y Turismo Chincha</h3>

                    <p><strong>Dirección:</strong> Carr. Panamericana Sur 122, Chincha Alta 11702</p>
                    <p><strong>Teléfono:</strong> (01) 4181111</p>
                    <p><strong>WhatsApp:</strong> +51 920-825-776</p>
                    <p><strong>Horario:</strong> Abierto - Cierra a las 11 p.m.</p>
                    <p><strong>Servicio:</strong> Empresa de mensajería y encomiendas.</p>

                    <div class="location-actions">
                        <a
                            href="https://www.google.com/maps/search/?api=1&query=CIVA%20Transporte%20y%20Turismo%20Chincha%20Carr.%20Panamericana%20Sur%20122%20Chincha%20Alta%2011702"
                            target="_blank"
                            class="btn-main">
                            Cómo llegar
                        </a>

                        <a
                            href="https://wa.me/51920825776?text=Hola%2C%20quiero%20consultar%20sobre%20una%20encomienda%20en%20CIVA%20Chincha."
                            target="_blank"
                            class="btn-main">
                            Escribir por WhatsApp
                        </a>
                    </div>
                </div>

                <div class="map-box">
                    <iframe
                        src="https://www.google.com/maps?q=CIVA%20Transporte%20y%20Turismo%20Chincha%20Carr.%20Panamericana%20Sur%20122%20Chincha%20Alta%2011702&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="section alt" id="contacto">
        <div class="section-container">
            <div class="section-title">
                <h2>Contáctanos</h2>
                <p>Canales disponibles para consultas sobre seguimiento y atención al cliente.</p>
            </div>

            <div class="contact-grid">
                <div class="contact-card">
                    <h3>WhatsApp</h3>
                    <p>
                        <a href="https://wa.me/51920825776?text=Hola%2C%20necesito%20informaci%C3%B3n%20sobre%20mi%20encomienda." target="_blank">
                            +51 920-825-776
                        </a>
                    </p>
                    <p>Consulta sobre envíos y seguimiento.</p>
                </div>

                <div class="contact-card">
                    <h3>Teléfono</h3>
                    <p>(01) 4181111</p>
                    <p>Atención general de CIVA Chincha.</p>
                </div>

                <div class="contact-card">
                    <h3>Correo</h3>
                    <p>transporteturismochinchan@gmail.com</p>
                    <p>Consultas generales y soporte del servicio.</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-box">
                <h4>CIVACARGO</h4>
                <p>Sistema web de seguimiento e información de encomiendas para clientes.</p>
            </div>

            <div class="footer-box">
                <h4>Servicios</h4>
                <ul>
                    <li><a href="{{ route('seguimiento') }}">Seguimiento en vivo</a></li>
                    <li><a href="#cotizador">Cotizador</a></li>
                    <li><a href="#ubicacion">Ubícanos</a></li>
                    <li><a href="#contacto">Contáctanos</a></li>
                </ul>
            </div>

            <div class="footer-box">
                <h4>Contacto</h4>
                <p>WhatsApp: +51 920-825-776</p>
                <p>Teléfono: (01) 4181111</p>
                <p>Correo: transporteturismochinchan@gmail.com</p>
            </div>

            <div class="footer-box">
                <h4>Ubicación</h4>
                <p>Carr. Panamericana Sur 122</p>
                <p>Chincha Alta 11702</p>
                <p>Abierto - Cierra a las 11 p.m.</p>
            </div>
        </div>

        <div class="footer-copy">
            © 2026 CIVA Transporte y Turismo Chincha - Sistema de Encomiendas
        </div>
    </footer>

    <script>
        function calcularCotizacion() {
            const origen = document.getElementById('origen').value;
            const destino = document.getElementById('destino').value;
            const tipo = document.getElementById('tipo').value;
            const peso = parseFloat(document.getElementById('peso').value);

            const precio = document.getElementById('precioCotizado');
            const detalle = document.getElementById('detalleCotizacion');

            if (!peso || peso <= 0) {
                precio.textContent = 'S/ 0.00';
                detalle.textContent = 'Ingresa un peso válido para calcular el costo aproximado.';
                return;
            }

            let base = 8;

            if (destino === 'Lima') {
                base = 18;
            } else if (destino === 'Ica') {
                base = 12;
            } else if (destino === 'Pisco') {
                base = 10;
            } else if (destino === 'Cañete') {
                base = 15;
            } else if (destino === origen) {
                base = 7;
            }

            let adicionalPeso = peso * 1.5;
            let adicionalTipo = 0;

            if (tipo === 'Caja') {
                adicionalTipo = 4;
            } else if (tipo === 'Paquete frágil') {
                adicionalTipo = 7;
            } else if (tipo === 'Objeto pesado') {
                adicionalTipo = 10;
            }

            const total = base + adicionalPeso + adicionalTipo;

            precio.textContent = 'S/ ' + total.toFixed(2);

            detalle.textContent =
                'Ruta: ' + origen + ' → ' + destino +
                '. Tipo: ' + tipo +
                '. Peso: ' + peso + ' kg. Monto referencial calculado correctamente.';
        }
    </script>

</body>

</html>