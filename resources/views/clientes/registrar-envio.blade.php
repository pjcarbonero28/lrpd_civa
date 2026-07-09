<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar mi envío | CIVACARGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(120deg, #062f24, #126346);
            min-height: 100vh;
            color: #0b2f27;
        }

        .header {
            background: #0b3f30;
            padding: 28px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .logo {
            font-size: 34px;
            font-weight: 900;
            letter-spacing: 2px;
        }

        .logo span {
            color: #d6a12f;
        }

        .user-box {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.20);
            padding: 10px 16px;
            border-radius: 14px;
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .user-box small {
            color: #d7eadf;
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

        .nav .active {
            color: #0b3f30;
            background: #f1f5f3;
            padding: 10px 16px;
            border-radius: 10px;
            border: 1px solid #d6e3dc;
        }

        .container {
            width: 90%;
            max-width: 1050px;
            margin: 55px auto;
        }

        .card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 55px rgba(0,0,0,.22);
        }

        .title {
            margin-bottom: 28px;
        }

        .title h1 {
            font-size: 34px;
            color: #0b3f30;
            margin-bottom: 8px;
        }

        .title p {
            color: #51605b;
            font-size: 17px;
            line-height: 1.5;
        }

        .alert-success {
            background: #dcfce7;
            color: #14532d;
            border: 1px solid #22c55e;
            padding: 16px;
            border-radius: 14px;
            font-weight: 800;
            margin-bottom: 22px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #ef4444;
            padding: 16px;
            border-radius: 14px;
            font-weight: 800;
            margin-bottom: 22px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-weight: 800;
            margin-bottom: 8px;
            color: #0b3f30;
        }

        input, select, textarea {
            width: 100%;
            padding: 15px 16px;
            border-radius: 13px;
            border: 1px solid #d0d7d3;
            font-size: 16px;
            outline: none;
            background: #f8fbfa;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #0b3f30;
            box-shadow: 0 0 0 3px rgba(11, 63, 48, .12);
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .readonly {
            background: #edf3ef;
            color: #41524c;
        }

        .actions {
            display: flex;
            gap: 14px;
            margin-top: 28px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: #d6a12f;
            color: #072f24;
            border: none;
            padding: 15px 25px;
            border-radius: 12px;
            font-weight: 900;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-secondary {
            background: #0b3f30;
            color: white;
            text-decoration: none;
            padding: 15px 25px;
            border-radius: 12px;
            font-weight: 900;
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
        }

        .info {
            margin-top: 25px;
            background: #f0f6f3;
            border-left: 5px solid #0b3f30;
            padding: 18px;
            border-radius: 12px;
            color: #34433e;
            line-height: 1.5;
        }

        @media (max-width: 750px) {
            .header {
                flex-direction: column;
                gap: 16px;
                text-align: center;
            }

            .nav {
                flex-wrap: wrap;
                gap: 18px;
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 28px;
            }
        }
    </style>
</head>
<body>

<header class="header">
    <div class="logo">CIVA<span>CARGO</span></div>

    <div class="user-box">
        <small>Cliente conectado</small>
        <strong>{{ Auth::user()->email }}</strong>
    </div>
</header>

<nav class="nav">
    <a href="{{ route('cliente.inicio') }}">Inicio</a>
    <a href="{{ route('cliente.registrar.envio') }}" class="active">Registrar mi envío</a>
    <a href="{{ route('seguimiento') }}">Seguimiento en vivo</a>
    <a href="#">Cotizador</a>
    <a href="#">Ubícanos</a>
    <a href="#">Contáctanos</a>
</nav>

<main class="container">
    <section class="card">

        <div class="title">
            <h1>Registrar mi envío</h1>
            <p>
                Completa los datos de tu encomienda. Al registrar el envío,
                se generará un código de seguimiento para consultar su estado.
            </p>
        </div>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('cliente.registrar.envio.store') }}" method="POST">
            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label>Remitente</label>
                    <input type="text" value="{{ Auth::user()->name }}" class="readonly" readonly>
                </div>

                <div class="form-group">
                    <label>Correo</label>
                    <input type="text" value="{{ Auth::user()->email }}" class="readonly" readonly>
                </div>

                <div class="form-group">
                    <label>DNI del remitente</label>
                    <input 
                        type="text" 
                        name="dni" 
                        value="{{ old('dni') }}" 
                        placeholder="Ej. 12345678"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Destinatario</label>
                    <input 
                        type="text" 
                        name="destinatario" 
                        value="{{ old('destinatario') }}" 
                        placeholder="Nombre del destinatario"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Origen</label>
                    <select name="origen" required>
                        <option value="">Seleccione origen</option>
                        <option value="Chincha" {{ old('origen') == 'Chincha' ? 'selected' : '' }}>Chincha</option>
                        <option value="Lima" {{ old('origen') == 'Lima' ? 'selected' : '' }}>Lima</option>
                        <option value="Ica" {{ old('origen') == 'Ica' ? 'selected' : '' }}>Ica</option>
                        <option value="Pisco" {{ old('origen') == 'Pisco' ? 'selected' : '' }}>Pisco</option>
                        <option value="Cañete" {{ old('origen') == 'Cañete' ? 'selected' : '' }}>Cañete</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Destino</label>
                    <select name="destino" required>
                        <option value="">Seleccione destino</option>
                        <option value="Chincha" {{ old('destino') == 'Chincha' ? 'selected' : '' }}>Chincha</option>
                        <option value="Lima" {{ old('destino') == 'Lima' ? 'selected' : '' }}>Lima</option>
                        <option value="Ica" {{ old('destino') == 'Ica' ? 'selected' : '' }}>Ica</option>
                        <option value="Pisco" {{ old('destino') == 'Pisco' ? 'selected' : '' }}>Pisco</option>
                        <option value="Cañete" {{ old('destino') == 'Cañete' ? 'selected' : '' }}>Cañete</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Monto de pago</label>
                    <input 
                        type="number" 
                        step="0.10" 
                        name="pago" 
                        value="{{ old('pago') }}" 
                        placeholder="Ej. 25.00"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Estado inicial</label>
                    <input type="text" value="Registrada" class="readonly" readonly>
                </div>

                <div class="form-group full">
                    <label>Descripción del envío</label>
                    <textarea 
                        name="descripcion" 
                        placeholder="Ej. Caja mediana con ropa, documentos o productos"
                        required
                    >{{ old('descripcion') }}</textarea>
                </div>

            </div>

            <div class="actions">
                <button type="submit" class="btn-primary">Registrar envío</button>
                <a href="{{ route('cliente.inicio') }}" class="btn-secondary">Volver al inicio</a>

                <form action="{{ route('salir') }}" method="POST" onsubmit="return confirm('¿Estás seguro de cerrar sesión?');">
                    @csrf
                    <button type="submit" class="btn-logout">Cerrar sesión</button>
                </form>
            </div>
        </form>

        <div class="info">
            El código de seguimiento se genera automáticamente después de registrar
            la encomienda. Guárdalo para consultar el estado de tu envío.
        </div>

    </section>
</main>

</body>
</html>