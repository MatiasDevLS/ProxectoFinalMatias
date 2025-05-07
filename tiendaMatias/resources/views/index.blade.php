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
    <form action="inicio.php" method="post">

        <p>Introduzca Sus Credenciales</p>
        
        <label for="email">Correo Electrónico:</label><br>
        <input  type="email" id="email" name="email"><br><br>

        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario"><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Entrar">

        <input type="checkbox" id="recordar" name="recordar" value="1">
        <label for="recordar">Recordar</label><br><br>
    </form>
    </div>
</body>
</html>