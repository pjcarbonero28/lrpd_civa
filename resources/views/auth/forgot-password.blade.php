<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar contraseña</title>
</head>
<body style="font-family: Arial; background:#090018; color:white; display:grid; place-items:center; min-height:100vh;">

    <form method="POST" action="{{ route('password.email') }}" style="background:#160038; padding:35px; border-radius:20px; width:360px;">
        @csrf

        <h2>Recuperar contraseña</h2>
        <p>Ingresa tu correo para recibir un enlace de recuperación.</p>

        @if (session('status'))
            <div style="background:#d4edda; color:#155724; padding:10px; border-radius:8px; margin-bottom:15px;">
                {{ session('status') }}
            </div>
        @endif

        @error('email')
            <div style="background:#ffdddd; color:#900; padding:10px; border-radius:8px; margin-bottom:15px;">
                {{ $message }}
            </div>
        @enderror

        <input type="email" name="email" placeholder="Correo electrónico" required
               style="width:100%; padding:14px; border-radius:10px; margin-bottom:15px;">

        <button type="submit" style="width:100%; padding:14px; border:none; border-radius:10px; background:#ff7a18; color:white; font-weight:bold;">
            Enviar enlace
        </button>

        <br><br>
        <a href="{{ route('login') }}" style="color:#b86cff;">Volver al login</a>
    </form>

</body>
</html>