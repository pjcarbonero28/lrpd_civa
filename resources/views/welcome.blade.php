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

        .btn-register {
            display: inline-block;
            background: #ffffff;
            color: #0b3f30;
            padding: 15px 25px;
            border-radius: 12px;
            font-weight: 900;
            text-decoration: none;
            border: 2px solid rgba(255,255,255,0.35);
            font-size: 16px;
        }

        .btn-register:hover {
            background: #f3f7f5;
        }

        .btn-secondary {
            display: inline-block;
            background: #0b3f30;
            color: white;
            padding: 15px 25px;
            border-radius: 12px;
            font-weight: 900;
            text-decoration: none;
            border: 2px solid rgba(255,255,255,0.25);
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

        @media (max-width: 1050px) {
            .hero-section {
                grid-template-columns: 1fr;
            }

            .cards {
                grid-template-columns: repeat(2, 1fr);
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

<header class="header">
    <div class="logo">CIVA<span>CARGO</span></div>

    @auth
        <div class="user-info">
            <span>Usuario conectado</span>
            <strong>{{ Auth::user()->email }}</strong>
        </div>
    @endauth
</header>

<nav class="nav">
    <a href="{{ route('cliente.inicio') }}">Inicio</a>
    <a href="{{ route('cliente.registrar.envio') }}" class="btn-register">
    Registrar mi envío
    <a href="{{ route('seguimiento') }}">Seguimiento en vivo</a>
    <a href="#">Cotizador</a>
    <a href="#">Ubícanos</a>
    <a href="#">Contáctanos</a>
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

            <a href="{{ route('cliente.registrar.envio') }}" class="btn-register">Registrar mi envío</a>

            @auth
                <form action="{{ route('salir') }}" method="POST" onsubmit="return confirm('¿Estás seguro de cerrar sesión?');">
                    @csrf
                    <button type="submit" class="btn-logout">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-secondary">Iniciar sesión</a>
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
            <p>Registra tu envío de forma rápida.</p>
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

</body>
</html>