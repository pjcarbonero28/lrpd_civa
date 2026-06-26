<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Registrar Cliente</h2>

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf
    @include('clientes._form')
</form>

</body>
</html>