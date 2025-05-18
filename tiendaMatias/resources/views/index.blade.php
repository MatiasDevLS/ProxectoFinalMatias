<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminJardinOculto</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

</head>
<body>
    <div class="form">
    <form action="/login" method="post">

        <p>Introduzca Sus Credenciales</p>
        @csrf
        <label for="email">Correo Electrónico:</label><br>
        <input  type="email" id="email" name="correo" value="{{request()->cookie('usuario_correo')}}" required><br><br>

        <label for="usuario">Nombre:</label><br>
        <input type="text" id="usuario" name="nombre" value="{{request()->cookie('usuario_nombre')}}" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Entrar">

        <input type="checkbox" id="recordar" name="recordar" value="1">
        <label for="recordar">Recordar</label><br><br>
    </form>

    @if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

    </div>
</body>
</html>