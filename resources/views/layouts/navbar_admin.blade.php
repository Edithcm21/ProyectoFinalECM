<nav class="navbar  navbar_admin navbar-expand-lg navbar-dark  ">
  <div class="container-fluid">
    <a class="navbar-brand active" >Administrador</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" ></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('admin.muestreos')}}">Muestreos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Articulos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.usuarios')}}">Usuarios</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Playas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('admin.Playas')}}">Playas</a></li>
            <li><a class="dropdown-item" href="{{route('admin.municipios')}}">Municipios</a></li>
            <li><a class="dropdown-item" href="{{route('admin.RegionMarina')}}">Region Marina</a></li>
            <li><a class="dropdown-item" href="{{route('admin.Tipo_residuos')}}">Residuos</a></li>
            <li><a class="dropdown-item" href="{{route('admin.Clasificacion')}}">Calsificación de residuos</a></li>
          </ul>
        </li>
      </ul>
      <span class="navbar-text" style="color: white; font-weight: bold;">
        {{ Auth::user()->name }}
      </span>
    </div>
  </div>
</nav>
