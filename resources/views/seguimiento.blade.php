<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento en Vivo - CIVA</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:Arial, Helvetica, sans-serif;}
        :root{
            --morado:#5b1ea8;
            --fucsia:#e91e9a;
            --azul:#1e88e5;
        }
        body{background:#f5f6fb;}
        .top{
            background:linear-gradient(90deg,var(--morado),var(--fucsia),var(--azul));
            color:white;
            padding:18px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
        }
        .logo{font-size:32px;font-weight:900;}
        .logo span{color:#ffd8f4;}
        .contact{font-size:14px;line-height:1.8;text-align:right;}
        .nav{
            width:90%;
            margin:-10px auto 0;
            background:white;
            border-radius:12px;
            padding:18px 24px;
            box-shadow:0 6px 16px rgba(0,0,0,.14);
            display:flex;
            gap:25px;
            flex-wrap:wrap;
            justify-content:center;
        }
        .nav a{text-decoration:none;color:#333;font-weight:bold;}
        .nav a:hover{color:var(--fucsia);}
        .container{
            width:92%;
            max-width:1250px;
            margin:40px auto;
            background:white;
            border-radius:20px;
            box-shadow:0 10px 24px rgba(0,0,0,.12);
            overflow:hidden;
        }
        .banner{
            background:linear-gradient(135deg,var(--morado),var(--fucsia),var(--azul));
            color:white;
            padding:35px;
        }
        .banner h1{font-size:38px;margin-bottom:10px;}
        .banner p{line-height:1.8;}
        .content{padding:35px;}
        .search-box{
            display:grid;
            grid-template-columns:1fr 160px;
            gap:12px;
            margin-bottom:25px;
        }
        .search-box input{
            padding:14px;
            border:1px solid #ccc;
            border-radius:12px;
            font-size:15px;
        }
        .search-box button{
            border:none;
            border-radius:12px;
            background:linear-gradient(90deg,var(--fucsia),var(--azul));
            color:white;
            font-weight:bold;
            cursor:pointer;
        }
        table{
            width:100%;
            border-collapse:collapse;
            overflow:hidden;
            border-radius:14px;
        }
        th,td{
            padding:14px;
            border:1px solid #eee;
            text-align:center;
        }
        th{
            background:linear-gradient(90deg,var(--morado),var(--azul));
            color:white;
        }
        tr:nth-child(even){background:#faf8ff;}
        .estado{
            padding:7px 12px;
            border-radius:20px;
            color:white;
            font-size:13px;
            font-weight:bold;
            display:inline-block;
        }
        .registrado{background:#ff9800;}
        .transito{background:#1e88e5;}
        .entregado{background:#43a047;}
        footer{
            background:#180535;
            color:white;
            padding:30px 35px;
            margin-top:30px;
        }
        .footer-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
        }
        .footer-grid h4{margin-bottom:10px;color:#ffd8f4;}
        .footer-grid p{line-height:1.8;font-size:14px;color:#e9dcff;}
        @media(max-width:850px){
            .search-box{grid-template-columns:1fr;}
            .footer-grid{grid-template-columns:1fr;}
            .contact{text-align:left;}
            .content{overflow-x:auto;}
        }
    </style>
</head>
<body>

    <div class="top">
        <div class="logo">CIVA<span>CARGO</span></div>
        <div class="contact">
            <div><strong>Correo:</strong> transporteturismochinchan@gmail.com</div>
            <div><strong>Teléfono:</strong> +51 920-825-776</div>
        </div>
    </div>

    <nav class="nav">
        <a href="/">Inicio</a>
        <a href="/registro">Registro de envíos</a>
        <a href="/seguimiento">Seguimiento en vivo</a>
        <a href="#">Ubícanos</a>
        <a href="#">Contáctanos</a>
        <a href="#">Cotizador</a>
    </nav>

    <div class="container">
        <div class="banner">
            <h1>Seguimiento en Vivo</h1>
            <p>Consulta el estado actual de las encomiendas registradas dentro del sistema.</p>
        </div>

        <div class="content">
            <div class="search-box">
                <input type="text" placeholder="Ingrese el código de encomienda o número de tracking">
                <button>Buscar</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Remitente</th>
                        <th>Destinatario</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ENC-001</td>
                        <td>Juan Pérez</td>
                        <td>María López</td>
                        <td>Chincha</td>
                        <td>Lima</td>
                        <td>24/06/2026</td>
                        <td><span class="estado transito">En tránsito</span></td>
                    </tr>
                    <tr>
                        <td>ENC-002</td>
                        <td>Ana Torres</td>
                        <td>Carlos Díaz</td>
                        <td>Ica</td>
                        <td>Arequipa</td>
                        <td>24/06/2026</td>
                        <td><span class="estado registrado">Registrado</span></td>
                    </tr>
                    <tr>
                        <td>ENC-003</td>
                        <td>Pedro Ramos</td>
                        <td>Lucía Fernández</td>
                        <td>Chincha</td>
                        <td>Cusco</td>
                        <td>24/06/2026</td>
                        <td><span class="estado entregado">Entregado</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <footer>
            <div class="footer-grid">
                <div>
                    <h4>CIVACARGO</h4>
                    <p>Sistema web de seguimiento y control de encomiendas.</p>
                </div>
                <div>
                    <h4>Contacto</h4>
                    <p>transporteturismochinchan@gmail.com</p>
                    <p>+51 920-825-776</p>
                </div>
                <div>
                    <h4>Horario</h4>
                    <p>Todos los días</p>
                    <p>7:00 a.m. - 12:00 a.m.</p>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>