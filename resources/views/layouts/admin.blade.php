<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel Administrativo') - CIVACARGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        :root {
            --verde: #0f3d2e;
            --verde-oscuro: #08251c;
            --verde-claro: #1f6f50;
            --dorado: #c89b3c;
            --fondo: #f4f7f5;
            --blanco: #ffffff;
            --texto: #263238;
            --gris: #7b8494;
            --borde: #dfe8e2;
            --rojo: #d32f2f;
            --naranja: #ff9800;
            --azul: #1976d2;
            --exito: #2e7d32;
        }

        body {
            background: var(--fondo);
            color: var(--texto);
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, var(--verde), var(--verde-oscuro));
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 22px 0;
            z-index: 100;
            overflow-y: auto;
        }

        .brand {
            padding: 0 24px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, .12);
            margin-bottom: 22px;
        }

        .brand h2 {
            font-size: 25px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .brand h2 span {
            color: var(--dorado);
        }

        .brand p {
            font-size: 12px;
            color: #dbe8e1;
            margin-top: 5px;
        }

        .user-box {
            padding: 0 24px 22px;
            border-bottom: 1px solid rgba(255, 255, 255, .12);
            margin-bottom: 22px;
        }

        .user-box small {
            color: #cfe0d8;
            text-transform: uppercase;
            font-size: 11px;
        }

        .user-box strong {
            display: block;
            margin-top: 8px;
            font-size: 15px;
        }

        .user-box span {
            font-size: 12px;
            color: var(--dorado);
        }

        .menu-title {
            padding: 0 24px;
            color: #cfe0d8;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 18px 0 8px;
        }

        .menu {
            list-style: none;
        }

        .menu a,
        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 24px;
            color: #edf7f1;
            text-decoration: none;
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 15px;
            transition: .2s;
            text-align: left;
        }

        .menu a:hover,
        .logout-btn:hover {
            background: rgba(255, 255, 255, .10);
        }

        .menu a.active {
            background: rgba(255, 255, 255, .14);
            border-left: 5px solid var(--dorado);
            padding-left: 19px;
            color: white;
            font-weight: bold;
        }

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
        }

        .topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid var(--borde);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 4px 14px rgba(0, 0, 0, .04);
        }

        .topbar h1 {
            font-size: 22px;
            color: var(--verde);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: inherit;
            background: #f8fbf9;
            padding: 8px 12px;
            border-radius: 14px;
            border: 1px solid var(--borde);
            transition: .2s;
        }

        .topbar-right:hover {
            background: #eef6f1;
            transform: translateY(-1px);
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--verde), var(--dorado));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
        }

        .user-info strong {
            display: block;
            font-size: 14px;
            color: var(--texto);
        }

        .user-info span {
            color: var(--gris);
            font-size: 12px;
        }

        .content {
            padding: 28px;
        }

        .dashboard-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
            gap: 14px;
            flex-wrap: wrap;
        }

        .dashboard-title h2 {
            color: var(--verde);
            font-size: 28px;
        }

        .dashboard-title span {
            color: var(--gris);
            font-size: 14px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--borde);
            padding: 22px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .06);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--verde);
        }

        .stat-card.dorado::before {
            background: var(--dorado);
        }

        .stat-card.azul::before {
            background: var(--azul);
        }

        .stat-card.rojo::before {
            background: var(--rojo);
        }

        .stat-card h3 {
            color: var(--gris);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 12px;
        }

        .stat-card .number {
            font-size: 32px;
            font-weight: 900;
            color: var(--verde);
            word-break: break-word;
        }

        .stat-card.dorado .number {
            color: var(--dorado);
        }

        .stat-card.azul .number {
            color: var(--azul);
        }

        .stat-card.rojo .number {
            color: var(--rojo);
        }

        .stat-card p {
            color: var(--gris);
            font-size: 13px;
            margin-top: 8px;
        }

        .panel-grid {
            display: grid;
            grid-template-columns: 1.25fr .75fr;
            gap: 22px;
            margin-bottom: 24px;
        }

        .panel {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--borde);
            padding: 24px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .06);
            margin-bottom: 24px;
        }

        .panel h3 {
            color: var(--verde);
            margin-bottom: 18px;
            font-size: 18px;
        }

        .chart-box {
            height: 270px;
            border-radius: 14px;
            background:
                linear-gradient(to right, rgba(15, 61, 46, .06) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(15, 61, 46, .06) 1px, transparent 1px);
            background-size: 80px 55px;
            border: 1px solid var(--borde);
            position: relative;
            overflow: hidden;
        }

        .chart-line {
            position: absolute;
            left: 45px;
            right: 45px;
            bottom: 60px;
            height: 120px;
            border-bottom: 5px solid var(--verde-claro);
            border-radius: 60% 60% 0 0;
            transform: skewX(-18deg);
        }

        .chart-point {
            width: 14px;
            height: 14px;
            background: var(--dorado);
            border-radius: 50%;
            position: absolute;
            left: 48%;
            bottom: 172px;
            box-shadow: 0 0 0 5px rgba(200, 155, 60, .20);
        }

        .donut {
            width: 190px;
            height: 190px;
            border-radius: 50%;
            margin: 12px auto 20px;
            background: conic-gradient(
                var(--verde-claro) 0 45%,
                var(--dorado) 45% 70%,
                var(--azul) 70% 85%,
                var(--rojo) 85% 100%
            );
            position: relative;
        }

        .donut::after {
            content: "";
            position: absolute;
            inset: 48px;
            background: white;
            border-radius: 50%;
        }

        .legend {
            display: grid;
            gap: 10px;
            margin-top: 8px;
        }

        .legend-item {
            display: flex;
            justify-content: space-between;
            color: #4d5668;
            font-size: 14px;
        }

        .dot {
            width: 9px;
            height: 9px;
            display: inline-block;
            border-radius: 50%;
            margin-right: 7px;
        }

        .dot.green {
            background: var(--verde-claro);
        }

        .dot.gold {
            background: var(--dorado);
        }

        .dot.blue {
            background: var(--azul);
        }

        .dot.red {
            background: var(--rojo);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f5faf7;
            color: var(--verde);
            padding: 14px;
            text-align: left;
            font-size: 13px;
            text-transform: uppercase;
            border-bottom: 1px solid var(--borde);
            white-space: nowrap;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid var(--borde);
            color: #333;
            font-size: 14px;
            vertical-align: middle;
        }

        tr:hover {
            background: #f8fbf9;
        }

        .badge {
            padding: 7px 12px;
            border-radius: 999px;
            color: white;
            font-weight: bold;
            font-size: 12px;
            display: inline-block;
            white-space: nowrap;
        }

        .badge.registrado {
            background: var(--naranja);
        }

        .badge.transito {
            background: var(--azul);
        }

        .badge.entregado {
            background: var(--exito);
        }

        .badge.observado {
            background: var(--rojo);
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            border: none;
            border-radius: 10px;
            padding: 11px 15px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
            white-space: nowrap;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: var(--verde);
            color: white;
        }

        .btn-warning {
            background: var(--dorado);
            color: #1b1b1b;
        }

        .btn-dark {
            background: #263238;
            color: white;
        }

        .btn-danger {
            background: var(--rojo);
            color: white;
        }

        .btn-small {
            padding: 8px 11px;
            font-size: 13px;
        }

        .actions-row {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
        }

        .form-control,
        select,
        textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cfd8d3;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            background: white;
        }

        .form-control:focus,
        select:focus,
        textarea:focus {
            border-color: var(--verde);
            box-shadow: 0 0 0 3px rgba(15, 61, 46, .12);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        .full {
            grid-column: 1 / -1;
        }

        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-weight: bold;
            border-left: 6px solid var(--exito);
        }

        .alert-error {
            background: #f8d7da;
            color: #842029;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-weight: bold;
            border-left: 6px solid var(--rojo);
        }

        .empty {
            text-align: center;
            color: var(--gris);
            padding: 24px;
        }

        .pagination {
            margin-top: 20px;
        }

        @media(max-width:1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .panel-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width:850px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main {
                margin-left: 0;
                width: 100%;
            }

            .admin-layout {
                flex-direction: column;
            }

            .stats-grid,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: 1;
            }

            .topbar {
                height: auto;
                padding: 14px 18px;
                gap: 12px;
                flex-wrap: wrap;
            }
        }
    </style>

    @yield('styles')
</head>

<body>

    <div class="admin-layout">
        <aside class="sidebar">
            <div class="brand">
                <h2>CIVA<span>CARGO</span></h2>
                <p>Sistema de encomiendas</p>
            </div>

            <div class="user-box">
                <small>Sesión activa</small>
                <strong>{{ Auth::user()->name ?? 'Administrador' }}</strong>
                <span>Admin Sistema</span>
            </div>

            <div class="menu-title">Principal</div>

            <ul class="menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        📊 Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.encomiendas.index') }}" class="{{ request()->routeIs('admin.encomiendas.*') ? 'active' : '' }}">
                        🚚 Encomiendas
                    </a>
                </li>

                <li>
                    <a href="{{ route('registro') }}" class="{{ request()->routeIs('registro') ? 'active' : '' }}">
                        ➕ Registrar envío
                    </a>
                </li>
            </ul>

            <div class="menu-title">Administración</div>

            <ul class="menu">
                <li>
                    <a href="{{ route('admin.reportes') }}" class="{{ request()->routeIs('admin.reportes') ? 'active' : '' }}">
                        📄 Reportes
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.perfil') }}" class="{{ request()->routeIs('admin.perfil') ? 'active' : '' }}">
                        👤 Mi cuenta
                    </a>
                </li>
            </ul>

            <div class="menu-title">Sistema</div>

            <ul class="menu">
                <li>
                    <a href="{{ route('inicio') }}">
                        🌐 Página pública
                    </a>
                </li>

                <li>
                    <form action="{{ route('salir') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">
                            🚪 Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </aside>

        <main class="main">
            <header class="topbar">
                <h1>@yield('title', 'Dashboard')</h1>

                <a href="{{ route('admin.perfil') }}" class="topbar-right">
                    <div class="avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>

                    <div class="user-info">
                        <strong>{{ Auth::user()->name ?? 'Administrador' }}</strong>
                        <span>Administrador</span>
                    </div>
                </a>
            </header>

            <section class="content">
                @yield('content')
            </section>
        </main>
    </div>

    @yield('scripts')

</body>

</html>