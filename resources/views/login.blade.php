<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login | CIVA Transporte y Turismo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            background: #080015;
            color: white;
        }

        .container {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1.1fr .9fr;
        }

        .left {
            padding: 50px 65px;
            background:
                linear-gradient(90deg, rgba(3, 42, 68, .96), rgba(4, 12, 32, .88)),
                url('https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?auto=format&fit=crop&w=1400&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 35px;
            overflow: hidden;
        }

        .brand h1 {
            font-size: clamp(34px, 4vw, 52px);
            font-weight: 900;
            letter-spacing: 1px;
            line-height: 1.1;
        }

        .brand h1 span {
            background: linear-gradient(90deg, #a834ff, #ff4f8b, #ff7a18);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .brand p {
            margin-top: 10px;
            font-size: clamp(15px, 1.4vw, 19px);
            color: #dce8f1;
            line-height: 1.4;
            max-width: 760px;
        }

        .hero {
            max-width: 760px;
        }

        .hero h2 {
            font-size: clamp(36px, 4.4vw, 56px);
            line-height: 1.15;
            margin-bottom: 22px;
            font-weight: 900;
        }

        .hero h2 span {
            background: linear-gradient(90deg, #a834ff, #ff4f8b, #ff7a18);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero > p {
            font-size: clamp(16px, 1.5vw, 21px);
            line-height: 1.6;
            color: #ffffff;
            max-width: 720px;
        }

        .features {
            margin-top: 35px;
            display: grid;
            gap: 16px;
            max-width: 520px;
        }

        .feature {
            display: flex;
            gap: 18px;
            align-items: center;
            padding: 17px 19px;
            border-radius: 20px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.15);
            backdrop-filter: blur(10px);
        }

        .icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            font-size: 27px;
            background: linear-gradient(135deg, #8a2cff, #ff7a18);
            box-shadow: 0 0 25px rgba(138,44,255,.55);
            flex-shrink: 0;
        }

        .feature h3 {
            font-size: 19px;
            margin-bottom: 4px;
        }

        .feature p {
            color: #f1f1f1;
            font-size: 15px;
            line-height: 1.4;
        }

        .right {
            display: grid;
            place-items: center;
            padding: 35px;
            background: radial-gradient(circle at top left, #25005d, #070012 60%);
        }

        .login-card {
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: 30px;
            background: rgba(10, 2, 30, .92);
            border: 1px solid rgba(180, 80, 255, .55);
            box-shadow: 0 0 50px rgba(138,44,255,.28);
        }

        .circle-logo {
            width: 105px;
            height: 105px;
            margin: auto;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 46px;
            background: linear-gradient(135deg, #8a2cff, #ff7a18);
            box-shadow: 0 0 35px rgba(255,122,24,.6);
        }

        .login-card h2 {
            text-align: center;
            font-size: 35px;
            margin-top: 24px;
        }

        .login-card .sub {
            text-align: center;
            color: #cfc3df;
            margin: 12px 0 30px;
            font-size: 16px;
        }

        .alert-error, .alert-success {
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 700;
            font-size: 14px;
            line-height: 1.4;
        }

        .alert-error {
            background: rgba(255, 0, 70, .18);
            border: 1px solid #ff4f6d;
            color: #ffd6dd;
        }

        .alert-success {
            background: rgba(0, 180, 90, .18);
            border: 1px solid #00c878;
            color: #d6ffe8;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .input-group {
            margin-bottom: 21px;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 16px 18px;
            border-radius: 13px;
            border: 1px solid #8a2cff;
            outline: none;
            background: #eaf2ff;
            color: #111;
            font-size: 16px;
        }

        input::placeholder {
            color: #6b7280;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: white;
            margin-bottom: 0;
        }

        .remember input {
            width: auto;
        }

        .row a, .link {
            color: #c66cff;
            text-decoration: none;
            font-weight: 700;
        }

        .row a:hover, .link:hover {
            color: #ff7a18;
        }

        .btn {
            width: 100%;
            padding: 17px;
            border: none;
            border-radius: 15px;
            color: white;
            font-size: 18px;
            font-weight: 900;
            cursor: pointer;
            background: linear-gradient(90deg, #8a2cff, #ff4f8b, #ff7a18);
            box-shadow: 0 0 25px rgba(255,122,24,.30);
            transition: .25s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 35px rgba(255,122,24,.6);
        }

        .register-text {
            text-align: center;
            margin-top: 22px;
            color: #cfc3df;
        }

        .footer {
            text-align: center;
            color: #aaa;
            margin-top: 30px;
            font-size: 14px;
        }

        @media (max-width: 1050px) {
            .container {
                grid-template-columns: 1fr;
            }

            .left {
                display: none;
            }

            .right {
                min-height: 100vh;
            }
        }

        @media (max-height: 780px) and (min-width: 1051px) {
            .left {
                padding: 35px 60px;
                gap: 22px;
            }

            .features {
                margin-top: 22px;
                gap: 12px;
            }

            .feature {
                padding: 13px 15px;
            }

            .icon {
                width: 48px;
                height: 48px;
                font-size: 23px;
            }

            .login-card {
                padding: 32px;
            }

            .circle-logo {
                width: 88px;
                height: 88px;
                font-size: 38px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <section class="left">
        <div class="brand">
            <h1>CIVA <span>Transporte y Turismo</span></h1>
            <p>Gestión de encomiendas, seguimiento y atención al cliente</p>
        </div>

        <div class="hero">
            <h2>Conectamos <span>destinos, entregamos confianza</span></h2>
            <p>
                Administra envíos, consulta estados y mejora el control logístico
                de manera rápida, segura y eficiente.
            </p>

            <div class="features">
                <div class="feature">
                    <div class="icon">🛡️</div>
                    <div>
                        <h3>Seguridad</h3>
                        <p>Tus datos y registros siempre protegidos.</p>
                    </div>
                </div>

                <div class="feature">
                    <div class="icon">⚡</div>
                    <div>
                        <h3>Rapidez</h3>
                        <p>Procesos ágiles y atención inmediata.</p>
                    </div>
                </div>

                <div class="feature">
                    <div class="icon">📦</div>
                    <div>
                        <h3>Control total</h3>
                        <p>Consulta y gestión en un solo lugar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="right">
        <div class="login-card">
            <div class="circle-logo">🚚</div>

            <h2>¡Bienvenido!</h2>
            <p class="sub">Inicia sesión para acceder al sistema</p>

            @if ($errors->any())
                <div class="alert-error">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('status'))
                <div class="alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('ingresar') }}" method="POST">
                @csrf

                <div class="input-group">
                    <label>Correo electrónico</label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="Ingresa tu correo" 
                        required
                    >
                </div>

                <div class="input-group">
                    <label>Contraseña</label>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Ingresa tu contraseña" 
                        required
                    >
                </div>

                <div class="row">
                    <label class="remember">
                        <input type="checkbox" name="remember">
                        Recordarme
                    </label>

                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="btn">Iniciar Sesión →</button>
            </form>

            <div class="register-text">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="link">Regístrate aquí</a>
            </div>

            <div class="footer">
                © 2026 CIVA Transporte y Turismo. Todos los derechos reservados.
            </div>
        </div>
    </section>

</div>

</body>
</html>