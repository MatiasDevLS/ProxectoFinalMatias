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

  <nav style="padding: 10px;" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="dropdown" style="margin-right: 3%;">
      <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Productos
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/listaProducto">Lista Productos</a></li>
        <li><a class="dropdown-item" href="/editarProducto">Editar Producto</a></li>
        <li><a class="dropdown-item" href="/registroProducto">Añadir Producto</a></li>
      </ul>
    </div>
    @if ( session('usuario_rol')==2 )
    <div class="dropdown" style="margin-right: 3%;">
      <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Tipos
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/listaTipo">Lista Tipos</a></li>
        <li><a class="dropdown-item" href="/editarTipo">Editar Tipo</a></li>
        <li><a class="dropdown-item" href="/registroTipo">Añadir Tipo</a></li>
      </ul>
    </div>

    <div class="dropdown">
      <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Usuarios
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/listaUsuario">Lista Usuarios</a></li>
        <li><a class="dropdown-item" href="/editarUsuario">Editar Usuario</a></li>
        <li><a class="dropdown-item" href="/registroUsuario">Añadir Usuario</a></li>
      </ul>
    </div>

    @endif    
          {{-- The key change is here: using ms-auto on the ul to push it to the right --}}
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> {{-- Added ms-auto and navbar-nav classes --}}
            <li class="nav-item"> {{-- Changed to nav-item for consistency --}}
                <a class="navbar-brand" href="/editarPerfil">
                    <img src="{{ session('usuario_imagen') }}" width="40" height="40" alt="Profile Image">
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