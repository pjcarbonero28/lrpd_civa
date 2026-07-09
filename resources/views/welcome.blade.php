<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CIVACARGO - Transporte y Turismo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #062f24;
            color: #0b2f27;
        }

        .header {
            background: #0b3f30;
            padding: 28px 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .logo {
            font-size: 38px;
            font-weight: 900;
            color: white;
            letter-spacing: 2px;
        }

        .logo span {
            color: #d6a12f;
        }

        .user-info {
            position: absolute;
            right: 55px;
            top: 18px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.22);
            color: white;
            padding: 11px 17px;
            border-radius: 14px;
            display: flex;
            flex-direction: column;
            gap: 4px;
            min-width: 250px;
            box-shadow: 0 6px 18px rgba(0,0,0,.18);
        }

        .user-info span {
            font-size: 12px;
            color: #d7eadf;
        }

        .user-info strong {
            font-size: 14px;
            word-break: break-word;
        }

        .nav {
            background: white;
            min-height: 64px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 34px;
            box-shadow: 0 4px 14px rgba(0,0,0,.08);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav a {
            text-decoration: none;
            color: #0b2f27;
            font-weight: 800;
            font-size: 16px;
        }

        .nav a:hover {
            color: #d6a12f;
        }

        .nav .nav-registro {
            color: #0b3f30;
            background: #f1f5f3;
            padding: 10px 16px;
            border-radius: 10px;
            border: 1px solid #d6e3dc;
        }

        .nav .nav-registro:hover {
            background: #d6a12f;
            color: #072f24;
        }

        .hero-section {
            min-height: calc(100vh - 140px);
            background: linear-gradient(120deg, #062f24, #126346);
            padding: 70px 7%;
            display: grid;
            grid-template-columns: 1.15fr .9fr;
            gap: 45px;
            align-items: center;
        }

        .hero-card {
            min-height: 560px;
            border-radius: 22px;
            padding: 48px;
            color: white;
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(38, 151, 117, .78), rgba(38, 151, 117, .78));
            box-shadow: 0 25px 55px rgba(0,0,0,.22);
        }

        .tag {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 40px;
            border: 1px solid rgba(255,255,255,.45);
            background: rgba(255,255,255,.18);
            font-weight: 800;
            margin-bottom: 60px;
        }

        .hero-card h1 {
            font-size: 56px;
            line-height: 1.13;
            font-weight: 900;
            text-shadow: 0 8px 18px rgba(0,0,0,.35);
            margin-bottom: 24px;
        }

        .hero-card p {
            max-width: 720px;
            font-size: 20px;
            line-height: 1.55;
            text-shadow: 0 4px 12px rgba(0,0,0,.28);
            margin-bottom: 55px;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-block;
            background: #d6a12f;
            color: #072f24;
            padding: 15px 25px;
            border-radius: 12px;
            font-weight: 900;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-logout {
            background: #b91c1c;
            color: white;
            padding: 15px 25px;
            border-radius: 12px;
            font-weight: 900;
            border: none;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 8px 18px rgba(185, 28, 28, .25);
        }

        .btn-logout:hover {
            background: #dc2626;
        }

        .consulta-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 55px rgba(0,0,0,.22);
        }

        .tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            text-align: center;
        }

        .tab {
            padding: 20px;
            font-weight: 900;
            background: #edf3ef;
        }

        .tab.active {
            background: white;
            border-bottom: 4px solid #d6a12f;
        }

        .consulta-body {
            padding: 42px;
        }

        .consulta-body h2 {
            color: #0b3f30;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .line {
            width: 90px;
            height: 5px;
            background: #d6a12f;
            border-radius: 20px;
            margin-bottom: 28px;
        }

        .consulta-body p {
            color: #34433e;
            font-size: 17px;
            line-height: 1.55;
            margin-bottom: 25px;
        }

        .consulta-form {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
        }

        .consulta-form input {
            flex: 1;
            padding: 16px;
            border-radius: 12px;
            border: 1px solid #d3d8d5;
            font-size: 16px;
        }

        .consulta-form button {
            padding: 16px 28px;
            border-radius: 12px;
            border: none;
            background: #0b3f30;
            color: white;
            font-weight: 900;
            font-size: 16px;
            cursor: pointer;
        }

        .info-box {
            border-left: 5px solid #0b3f30;
            background: #f0f6f3;
            padding: 18px;
            border-radius: 12px;
            color: #34433e;
            line-height: 1.5;
        }

        .cards {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-top: 10px;
        }

        .mini-card {
            background: white;
            border-radius: 18px;
            padding: 28px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0,0,0,.12);
        }

        .mini-card .mini-icon {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            background: #0b3f30;
            color: white;
            display: grid;
            place-items: center;
            margin: auto;
            font-size: 28px;
            font-weight: 900;
        }

        .mini-card h3 {
            margin-top: 16px;
            color: #0b3f30;
        }

        .mini-card p {
            margin-top: 8px;
            color: #5b6662;
            font-size: 14px;
        }

        .section-extra {
            background: #f4f8f6;
            padding: 70px 7%;
        }

        .section-title {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-title h2 {
            color: #0b3f30;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #51605b;
            font-size: 17px;
        }

        .extra-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .extra-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 12px 30px rgba(0,0,0,.10);
        }

        .extra-card h3 {
            color: #0b3f30;
            margin-bottom: 14px;
            font-size: 23px;
        }

        .extra-card p {
            color: #4b5c56;
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .price-box {
            background: #edf7f2;
            border-left: 5px solid #0b3f30;
            padding: 14px;
            border-radius: 12px;
            font-weight: 800;
            color: #0b3f30;
        }

        .contact-btn {
            display: inline-block;
            margin-top: 12px;
            background: #0b3f30;
            color: white;
            padding: 13px 18px;
            border-radius: 12px;
            font-weight: 800;
            text-decoration: none;
        }

        @media (max-width: 1050px) {
            .hero-section {
                grid-template-columns: 1fr;
            }

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .extra-grid {
                grid-template-columns: 1fr;
            }

            .user-info {
                position: static;
                margin-top: 16px;
            }

            .header {
                flex-direction: column;
            }
        }

        @media (max-width: 650px) {
            .nav {
                flex-wrap: wrap;
                gap: 18px;
                padding: 18px;
            }

            .hero-section {
                padding: 35px 20px;
            }

            .hero-card {
                padding: 30px;
            }

            .hero-card h1 {
                font-size: 38px;
            }

            .consulta-form {
                flex-direction: column;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<header class="header" id="inicio">
    <div class="logo">CIVA<span>CARGO</span></div>

    @auth
        <div class="user-info">
            <span>Usuario conectado</span>
            <strong>{{ Auth::user()->email }}</strong>
        </div>
    @endauth
</header>

<nav class="nav">
    <a href="#inicio">Inicio</a>
    <a href="{{ route('cliente.registrar.envio') }}" class="nav-registro">Registrar mi envío</a>
    <a href="{{ route('seguimiento') }}">Seguimiento en vivo</a>
    <a href="#cotizador">Cotizador</a>
    <a href="#ubicamos">Ubícanos</a>
    <a href="#contactanos">Contáctanos</a>
</nav>

<main class="hero-section">

    <section class="hero-card">
        <div class="tag">Transporte • Encomiendas • Seguimiento</div>

        <h1>ENVÍA Y CONSULTA TUS ENCOMIENDAS CON CIVACARGO</h1>

        <p>
            Plataforma web orientada al cliente para consultar el estado de sus
            encomiendas, registrar un envío, conocer la ubicación de la agencia
            y solicitar información sobre encomiendas.
        </p>

        <div class="hero-actions">
            <a href="{{ route('seguimiento') }}" class="btn-primary">Consultar seguimiento</a>

            @auth
                <form action="{{ route('salir') }}" method="POST" onsubmit="return confirm('¿Estás seguro de cerrar sesión?');">
                    @csrf
                    <button type="submit" class="btn-logout">Cerrar sesión</button>
                </form>
            @endauth
        </div>
    </section>

    <section class="consulta-card">
        <div class="tabs">
            <div class="tab active">Seguimiento rápido</div>
            <div class="tab">Atención al cliente</div>
        </div>

        <div class="consulta-body">
            <h2>Consulta tu encomienda</h2>
            <div class="line"></div>

            <p>
                Ingresa el código de seguimiento entregado por el encargado al
                registrar tu encomienda.
            </p>

            <form class="consulta-form" action="{{ route('seguimiento') }}" method="GET">
                <input type="text" name="codigo" placeholder="Ej. ENC-20260708-4A839">
                <button type="submit">Consultar</button>
            </form>

            <div class="info-box">
                El cliente puede registrar un envío y consultar el estado o historial
                de su encomienda desde el sistema.
            </div>
        </div>
    </section>

    <section class="cards">
        <div class="mini-card">
            <div class="mini-icon">S</div>
            <h3>Seguro</h3>
            <p>Datos protegidos y seguimiento confiable.</p>
        </div>

        <div class="mini-card">
            <div class="mini-icon">R</div>
            <h3>Registro</h3>
            <p>Registra tu envío desde el menú superior.</p>
        </div>

        <div class="mini-card">
            <div class="mini-icon">U</div>
            <h3>Ubicación</h3>
            <p>Información clara sobre agencias y atención.</p>
        </div>

        <div class="mini-card">
            <div class="mini-icon">W</div>
            <h3>WhatsApp</h3>
            <p>Canal rápido para solicitar información.</p>
        </div>
    </section>

</main>

<section class="section-extra" id="cotizador">
    <div class="section-title">
        <h2>Cotizador</h2>
        <p>Consulta una referencia del costo de envío según destino y tipo de encomienda.</p>
    </div>

    <div class="extra-grid">
        <div class="extra-card">
            <h3>Envío local</h3>
            <p>Para encomiendas dentro de la misma ciudad o zonas cercanas.</p>
            <div class="price-box">Desde S/ 10.00</div>
        </div>

        <div class="extra-card">
            <h3>Envío interprovincial</h3>
            <p>Para paquetes enviados entre Chincha, Lima, Ica, Pisco y Cañete.</p>
            <div class="price-box">Desde S/ 25.00</div>
        </div>

        <div class="extra-card">
            <h3>Paquete especial</h3>
            <p>Para encomiendas frágiles, medianas o con atención personalizada.</p>
            <div class="price-box">Consultar tarifa</div>
        </div>
    </div>
</section>

<section class="section-extra" id="ubicamos">
    <div class="section-title">
        <h2>Ubícanos</h2>
        <p>Encuentra nuestras agencias principales para registrar o recoger encomiendas.</p>
    </div>

    <div class="extra-grid">
        <div class="extra-card">
            <h3>Agencia Chincha</h3>
            <p>Carr. Panamericana Sur 122. Es la agencia principal que atiende tanto la compra de pasajes como la recepción y entrega de encomiendas.</p>
            <p><strong>Horario:</strong> Lunes a sábado, 8:00 a.m. - 7:00 p.m.</p>
        </div>

        <div class="extra-card">
            <h3>Agencia Lima</h3>
            <p>La Victoria (Javier Prado): Av. Javier Prado Este 1155. Atiende las 24 horas para envío y entrega de carga.</p>
            <p><strong>Horario:</strong> Lunes a domingo, 8:00 a.m. - 8:00 p.m.</p>
        </div>

        <div class="extra-card">
            <h3>Agencia Ica</h3>
            <p> Calle Lambayeque 135. Oficina central en la ciudad de Ica para la gestión de carga y embarques.</p>
            <p><strong>Horario:</strong> Lunes a sábado, 8:00 a.m. - 6:00 p.m.</p>
        </div>
    </div>
</section>

<section class="section-extra" id="contactanos">
    <div class="section-title">
        <h2>Contáctanos</h2>
        <p>Comunícate con atención al cliente para resolver dudas sobre tus envíos.</p>
    </div>

    <div class="extra-grid">
        <div class="extra-card">
            <h3>Correo</h3>
            <p>transporteturismochinchan@gmail.com</p>
        </div>

        <div class="extra-card">
            <h3>WhatsApp</h3>
            <p>+51 920-825-776</p>
            <a href="#" class="contact-btn">Atención por WhatsApp</a>
        </div>

        <div class="extra-card">
            <h3>Atención</h3>
            <p>Realiza consultas sobre registro, seguimiento, pagos y estado de encomiendas.</p>
        </div>
    </div>
</section>

</body>
</html>