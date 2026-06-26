<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | LRPD CIVA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }

        body {
            min-height: 100vh;
            background: radial-gradient(circle at top left, #24004d, #050010 65%);
            color: #fff;
        }

        .layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            min-height: 100vh;
        }

        .sidebar {
            padding: 28px;
            background: rgba(10, 2, 30, .92);
            border-right: 1px solid rgba(162, 74, 255, .35);
        }

        .logo {
            font-size: 30px;
            font-weight: 900;
            margin-bottom: 8px;
        }

        .logo span {
            background: linear-gradient(90deg, #9b35ff, #ff7a18);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            color: #aaa;
            font-size: 14px;
            margin-bottom: 35px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: #ddd;
            padding: 14px 16px;
            margin-bottom: 12px;
            border-radius: 14px;
            transition: .3s;
        }

        .menu a:hover, .menu .active {
            background: linear-gradient(90deg, #7b22ff, #c23cff);
            color: white;
        }

        .logout {
            margin-top: 40px;
            color: #ff5c7a !important;
        }

        .main {
            padding: 35px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .header h1 {
            font-size: 34px;
        }

        .search {
            padding: 14px 18px;
            border-radius: 14px;
            border: 1px solid rgba(162, 74, 255, .5);
            background: rgba(255,255,255,.06);
            color: white;
            outline: none;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .card {
            padding: 25px;
            border-radius: 22px;
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.12);
            box-shadow: 0 0 30px rgba(123,34,255,.18);
        }

        .card h3 {
            color: #ccc;
            font-size: 16px;
            margin-bottom: 12px;
        }

        .card .number {
            font-size: 36px;
            font-weight: 900;
        }

        .purple { color: #a855f7; }
        .orange { color: #ff7a18; }
        .pink { color: #ff4f8b; }
        .green { color: #22c55e; }

        .content-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 22px;
        }

        .panel {
            padding: 25px;
            border-radius: 22px;
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.12);
        }

        .panel h2 {
            margin-bottom: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid rgba(255,255,255,.1);
            text-align: left;
        }

        th {
            color: #bbb;
            font-size: 14px;
        }

        .badge {
            padding: 7px 12px;
            border-radius: 20px;
            background: rgba(168,85,247,.2);
            color: #d8b4fe;
            font-size: 13px;
        }

        .quick {
            display: grid;
            gap: 14px;
        }

        .quick a {
            text-decoration: none;
            color: white;
            padding: 18px;
            border-radius: 18px;
            background: linear-gradient(90deg, rgba(123,34,255,.5), rgba(255,122,24,.35));
            border: 1px solid rgba(255,255,255,.15);
            transition: .3s;
        }

        .quick a:hover {
            transform: translateY(-3px);
        }

        @media(max-width: 1000px) {
            .layout { grid-template-columns: 1fr; }
            .sidebar { display: none; }
            .cards { grid-template-columns: repeat(2, 1fr); }
            .content-grid { grid-template-columns: 1fr; }
        }

        @media(max-width: 600px) {
            .cards { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="layout">

    <aside class="sidebar">
        <div class="logo">LRPD <span>CIVA</span></div>
        <div class="subtitle">Sistema de Gestión de Encomiendas</div>

        <nav class="menu">
            <a href="{{ route('dashboard') }}" class="active">📊 Dashboard</a>
            <a href="{{ route('clientes.index') }}">👥 Clientes</a>
            <a href="#">📦 Encomiendas</a>
            <a href="#">💳 Pagos</a>
            <a href="#">📍 Seguimientos</a>
            <a href="#">📈 Reportes</a>
            <a href="{{ route('logout') }}" class="logout">🚪 Cerrar sesión</a>
        </nav>
    </aside>

    <main class="main">
        <div class="header">
            <div>
                <h1>¡Bienvenido, Administrador! 👋</h1>
                <p>Resumen general del sistema LRPD CIVA</p>
            </div>

            <input class="search" type="text" placeholder="Buscar...">
        </div>

        <section class="cards">
            <div class="card">
                <h3>Clientes</h3>
                <div class="number purple">{{ $totalClientes }}</div>
            </div>

            <div class="card">
                <h3>Encomiendas</h3>
                <div class="number orange">{{ $totalEncomiendas }}</div>
            </div>

            <div class="card">
            <h3>En tránsito</h3>
            <div class="number green">{{ $enTransito }}</div>
        </div>

            <div class="card">
                <h3>Seguimientos</h3>
                <div class="number pink">{{ $totalSeguimientos }}</div>
            </div>
        </section>

        <section class="content-grid">
            <div class="panel">
                <h2>Encomiendas recientes</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Cliente</th>
                            <th>Ruta</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($encomiendasRecientes as $encomienda)
                            <tr>
                                <td>{{ $encomienda->codigo_seguimiento }}</td>
                                <td>{{ $encomienda->cliente->nombre ?? 'Sin cliente' }}</td>
                                <td>{{ $encomienda->origen }} → {{ $encomienda->destino }}</td>
                                <td><span class="badge">{{ $encomienda->estado }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel">
                <h2>Accesos rápidos</h2>

                <div class="quick">
                    <a href="{{ route('clientes.create') }}">➕ Nuevo cliente</a>
                    <a href="#">📦 Nueva encomienda</a>
                    <a href="#">💳 Registrar pago</a>
                    <a href="#">📍 Registrar seguimiento</a>
                    <a href="#">📈 Generar reporte</a>
                </div>
            </div>
        </section>
    </main>

</div>

</body>
</html>