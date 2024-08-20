<nav class="navbar  navbar_admin navbar-expand-lg navbar-dark  ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Administrador</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" ></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Muestreos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin', ['opcion' => 'articulos']) }}">Articulos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.usuarios')}}">Usuarios</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="/" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Playas
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="{{ route('admin', ['opcion' => 'playas']) }}">Playas</a></li>
              <li><a class="dropdown-item" href="{{ route('admin', ['opcion' => 'municipios']) }}">Municipios</a></li>
              <li><a class="dropdown-item" href="{{ route('admin', ['opcion' => 'localidades']) }}">Localidades</a></li>
              <li><a class="dropdown-item" href="{{ route('admin', ['opcion' => 'residuos']) }}">Residuos</a></li>
              <li><a class="dropdown-item" href="{{ route('admin', ['opcion' => 'clasificacion_residuos']) }}">Calsificación de residuos</a></li>
            </ul>
          </li>
        </ul>
        <span class="navbar-text" style="color: white; font-weight: bold;">
          Nombre del usuario
        </span>
      </div>
    </div>
  </nav>