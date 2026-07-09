<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar contraseña | CIVA Transporte y Turismo</title>
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
            max-width: 540px;
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

        .steps {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 28px;
        }

        .step {
            width: 36px;
            height: 8px;
            border-radius: 20px;
            background: rgba(255,255,255,.18);
        }

        .step.active {
            background: linear-gradient(90deg, #8a2cff, #ff7a18);
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

        .alert-error,
        .alert-success,
        .notice {
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 700;
            line-height: 1.5;
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

        .notice {
            background: rgba(255, 186, 64, .15);
            border: 1px solid #ffba40;
            color: #ffe9b5;
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

        .small-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #ffba40;
            text-decoration: none;
            font-weight: 800;
        }
    </style>
</head>
<body>

@php
    $step = session('reset_step', 'email');
    $data = session('password_reset');
@endphp

<div class="card">

    @if ($step === 'email')
        <h2>Recuperar cuenta</h2>
        <p class="sub">
            Ingresa tu correo electrónico. Enviaremos un código de verificación
            por SMS al número celular registrado.
        </p>
    @elseif ($step === 'codigo')
        <h2>Verificar código</h2>
        <p class="sub">
            Ingresa el código de 6 dígitos enviado por SMS a tu celular registrado.
        </p>
    @else
        <h2>Nueva contraseña</h2>
        <p class="sub">
            Código verificado. Ahora crea una nueva contraseña segura.
        </p>
    @endif

    <div class="steps">
        <div class="step {{ $step === 'email' ? 'active' : '' }}"></div>
        <div class="step {{ $step === 'codigo' ? 'active' : '' }}"></div>
        <div class="step {{ $step === 'password' ? 'active' : '' }}"></div>
    </div>

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

    @if ($step === 'email')

        <form method="POST" action="{{ route('password.send.code') }}">
            @csrf

            <label>Correo electrónico</label>
            <input 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                placeholder="Ingresa tu correo registrado" 
                required
            >

            <button type="submit" class="btn">Enviar código</button>
        </form>

    @elseif ($step === 'codigo')

        @if ($data)
            <div class="notice">
                El código fue enviado por SMS al celular registrado.
                <br>

                @if (!empty($data['telefono']))
                    Celular: <strong>******{{ substr($data['telefono'], -3) }}</strong>
                @else
                    Celular: <strong>No registrado</strong>
                @endif

                <br><br>
                Por seguridad, el código no se muestra en pantalla.
            </div>
        @endif

        <form method="POST" action="{{ route('password.verify.code') }}">
            @csrf

            <label>Código de verificación</label>
            <input 
                type="text" 
                name="codigo" 
                placeholder="Ingresa el código de 6 dígitos" 
                required
            >

            <button type="submit" class="btn">Verificar código</button>
        </form>

        <a href="{{ route('password.request') }}" class="small-link">
            Solicitar otro código
        </a>

    @else

        <form method="POST" action="{{ route('password.change') }}">
            @csrf

            <label>Nueva contraseña</label>
            <input 
                type="password" 
                name="password" 
                placeholder="Mínimo 8 caracteres" 
                required
            >

            <label>Confirmar contraseña</label>
            <input 
                type="password" 
                name="password_confirmation" 
                placeholder="Repite tu nueva contraseña" 
                required
            >

            <button type="submit" class="btn">Actualizar contraseña</button>
        </form>

    @endif

    <div class="back">
        <a href="{{ route('login') }}">Volver al login</a>
    </div>
</div>

</body>
</html>