<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login | LRPD CIVA</title>
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
            background: radial-gradient(circle at top, #21004d, #050014 65%);
            color: white;
            overflow: hidden;
        }

        .container {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
        }

        .left {
            position: relative;
            padding: 60px;
            background:
                linear-gradient(rgba(5,0,20,.55), rgba(5,0,20,.9)),
                url('https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
        }

        .logo {
            font-size: 48px;
            font-weight: 900;
            letter-spacing: 2px;
        }

        .logo span {
            background: linear-gradient(90deg, #8a2cff, #ff7a18);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            margin-top: 5px;
            color: #ddd;
            font-size: 18px;
        }

        .hero {
            margin-top: 80px;
            max-width: 650px;
        }

        .hero h1 {
            font-size: 54px;
            line-height: 1.1;
            margin-bottom: 25px;
        }

        .hero h1 span {
            background: linear-gradient(90deg, #8a2cff, #ff4f8b, #ff7a18);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            color: #ddd;
            font-size: 20px;
            line-height: 1.6;
        }

        .features {
            margin-top: 60px;
            display: grid;
            gap: 18px;
            max-width: 420px;
        }

        .feature {
            display: flex;
            gap: 18px;
            align-items: center;
            padding: 18px;
            border-radius: 18px;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.12);
            backdrop-filter: blur(10px);
        }

        .icon {
            width: 55px;
            height: 55px;
            border-radius: 15px;
            display: grid;
            place-items: center;
            font-size: 28px;
            background: linear-gradient(135deg, #8a2cff, #ff7a18);
            box-shadow: 0 0 25px rgba(138,44,255,.7);
        }

        .right {
            display: grid;
            place-items: center;
            padding: 40px;
        }

        .login-card {
            width: 100%;
            max-width: 470px;
            padding: 45px;
            border-radius: 30px;
            background: rgba(12, 4, 34, .82);
            border: 1px solid rgba(180, 80, 255, .5);
            box-shadow: 0 0 50px rgba(138,44,255,.35);
            backdrop-filter: blur(20px);
        }

        .circle-logo {
            width: 110px;
            height: 110px;
            margin: auto;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 48px;
            background: linear-gradient(135deg, #8a2cff, #ff7a18);
            box-shadow: 0 0 35px rgba(255,122,24,.7);
        }

        .login-card h2 {
            text-align: center;
            font-size: 34px;
            margin-top: 25px;
        }

        .login-card p {
            text-align: center;
            color: #bbb;
            margin: 10px 0 35px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .input-group {
            margin-bottom: 22px;
        }

        input {
            width: 100%;
            padding: 16px 18px;
            border-radius: 12px;
            border: 1px solid #8a2cff;
            outline: none;
            background: rgba(255,255,255,.06);
            color: white;
            font-size: 16px;
        }

        input::placeholder {
            color: #aaa;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .row a {
            color: #b86cff;
            text-decoration: none;
        }

        .btn {
            width: 100%;
            padding: 17px;
            border: none;
            border-radius: 14px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            background: linear-gradient(90deg, #8a2cff, #ff4f8b, #ff7a18);
            box-shadow: 0 0 25px rgba(255,122,24,.35);
            transition: .3s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 35px rgba(255,122,24,.7);
        }

        .footer {
            text-align: center;
            color: #aaa;
            margin-top: 35px;
            font-size: 14px;
        }

        @media (max-width: 900px) {
            body {
                overflow: auto;
            }

            .container {
                grid-template-columns: 1fr;
            }

            .left {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <section class="left">
        <div class="logo">LRPD <span>CIVA</span></div>
        <div class="subtitle">Sistema de Gestión de Encomiendas</div>

        <div class="hero">
            <h1>Conectamos <span>destinos, entregamos confianza</span></h1>
            <p>
                Gestiona tus clientes, encomiendas, pagos y seguimientos
                de manera rápida, segura y eficiente.
            </p>
        </div>

        <div class="features">
            <div class="feature">
                <div class="icon">🛡️</div>
                <div>
                    <h3>Seguro</h3>
                    <p>Tus datos siempre protegidos.</p>
                </div>
            </div>

            <div class="feature">
                <div class="icon">⚡</div>
                <div>
                    <h3>Rápido</h3>
                    <p>Procesos ágiles y sin complicaciones.</p>
                </div>
            </div>

            <div class="feature">
                <div class="icon">📦</div>
                <div>
                    <h3>Eficiente</h3>
                    <p>Control total en un solo lugar.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="right">
        <div class="login-card">
            <div class="circle-logo">🚚</div>

            <h2>¡Bienvenido!</h2>
            <p>Inicia sesión para continuar</p>

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
                    <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
    <input type="checkbox" name="remember" style="width:auto;">
    Recordarme
</label>
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="btn">Iniciar Sesión →</button>
            </form>

            <div class="footer">
                © 2026 LRPD CIVA. Todos los derechos reservados.
            </div>
        </div>
    </section>

</div>
@if ($errors->any())
    <div style="
        background: rgba(255, 0, 70, .18);
        border: 1px solid #ff4f6d;
        color: #ffd6dd;
        padding: 14px;
        border-radius: 12px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: 600;
    ">
        {{ $errors->first() }}
    </div>
@endif

</body>
</html>