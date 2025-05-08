<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminJardinOculto</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/productos">Lista Productos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/gestionProductos">Gestion Productos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/listaTipo">Lista Tipos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/gestionTipo">Gestion Tipos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/usuarios">Lista Usuarios</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/gestionUsuarios">Gestion Usuarios</a>
                </li>

            </ul>
            <ul style="padding-left: 60%;">
            <li >
                    <a class="navbar-brand"  href="#">
                        <img href="C:\Users\Usuario\Documents\Laravel\tiendaMatias\public\imgs\logo.png" width="30" height="30" alt="">
                    </a>
                </li>
            </ul>
            
        </div>
    </nav>
    <div>
        @yield('contenido')
    </div>
</body>

</html>