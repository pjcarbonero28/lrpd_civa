<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablecer contraseña</title>
</head>
<body style="font-family: Arial; background:#090018; color:white; display:grid; place-items:center; min-height:100vh;">

    <form method="POST" action="{{ route('password.update') }}" style="background:#160038; padding:35px; border-radius:20px; width:380px;">
        @csrf

        <h2>Nueva contraseña</h2>

        @if ($errors->any())
            <div style="background:#ffdddd; color:#900; padding:10px; border-radius:8px; margin-bottom:15px;">
                {{ $errors->first() }}
            </div>
        @endif

        <input type="hidden" name="token" value="{{ $token }}">

        <input type="email" name="email" placeholder="Correo electrónico" required
               style="width:100%; padding:14px; border-radius:10px; margin-bottom:15px;">

        <input type="password" name="password" placeholder="Nueva contraseña" required
               style="width:100%; padding:14px; border-radius:10px; margin-bottom:15px;">

        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required
               style="width:100%; padding:14px; border-radius:10px; margin-bottom:15px;">

        <button type="submit" style="width:100%; padding:14px; border:none; border-radius:10px; background:#ff7a18; color:white; font-weight:bold;">
            Cambiar contraseña
        </button>
    </form>

</body>
</html>