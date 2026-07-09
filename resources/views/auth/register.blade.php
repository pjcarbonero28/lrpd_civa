<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear cuenta | CIVA Transporte y Turismo</title>
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
            display: grid;
            place-items: center;
            background: radial-gradient(circle at top, #26005e, #070012 65%);
            color: white;
            padding: 30px;
        }

        .card {
            width: 100%;
            max-width: 520px;
            padding: 42px;
            border-radius: 30px;
            background: rgba(10, 2, 30, .92);
            border: 1px solid rgba(180, 80, 255, .55);
            box-shadow: 0 0 45px rgba(138,44,255,.28);
        }

        h2 {
            text-align: center;
            font-size: 34px;
            margin-bottom: 12px;
        }

        .sub {
            text-align: center;
            color: #cfc3df;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
        }

        input {
            width: 100%;
            padding: 15px 17px;
            border-radius: 13px;
            border: 1px solid #8a2cff;
            margin-bottom: 20px;
            font-size: 16px;
            outline: none;
            background: #eaf2ff;
            color: #111;
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
            transition: .25s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .alert-error {
            background: rgba(255, 0, 70, .18);
            border: 1px solid #ff4f6d;
            color: #ffd6dd;
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 700;
        }

        .back {
            text-align: center;
            margin-top: 24px;
        }

        .back a {
            color: #c66cff;
            text-decoration: none;
            font-weight: 800;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Crear cuenta</h2>
    <p class="sub">
        Regístrate como cliente para consultar tus encomiendas
        y recibir información de seguimiento.
    </p>

    @if ($errors->any())
        <div class="alert-error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <label>Nombre completo</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Ingresa tu nombre completo" required>

        <label>Correo electrónico</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Ingresa tu correo" required>

        <label>Número celular</label>
        <input type="text" name="telefono" value="{{ old('telefono') }}" placeholder="Ej. 920825776" required>

        <label>Contraseña</label>
        <input type="password" name="password" placeholder="Mínimo 8 caracteres" required>

        <label>Confirmar contraseña</label>
        <input type="password" name="password_confirmation" placeholder="Repite tu contraseña" required>

        <button type="submit" class="btn">Registrarme</button>
    </form>

    <div class="back">
        <a href="{{ route('login') }}">Ya tengo cuenta</a>
    </div>
</div>

</body>
</html>