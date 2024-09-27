<nav id="navbar" class="navbar navbar_inicio navbar-expand-lg navbar-dark fixed-top  ">
  <div class="d-flex mr-3 col-sm-4 justify-content-center" >
    <img class="al img-fluid" style="max-height: 90px;" src="{{ asset('images/Logo3.png') }}">
  </div>


  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Informacion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Quienes somos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="/consulta/filtro">Resultados</a>
      </li>
    </ul>
    <div class="nav-item text" style="margin-right: 50px; " >
          Fecha de consulta
    </div>
    <div class="navbar-item  " style="margin-right: 30px">
      <a href="{{ route('login') }}">
        <button id="navbutton" type="button" class=" btn-white">Iniciar sesión</button>
       

      </a>
    </div>
  </div> 

</nav>
