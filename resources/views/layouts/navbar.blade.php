<nav id="navbar1" class="navbar navbar_inicio navbar-expand-lg  fixed-top  ">
  <div class="d-flex mr-3 col-sm-4 justify-content-center" >
    <img class="al img-fluid" style="max-height: 90px;" src="{{ asset('images/Logo-ResiPlay.png') }}">
  </div>


  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Informacion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{route('Integrantes')}}">Quienes somos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{route('consulta')}}">Resultados</a>
      </li>
    </ul>
    <div class="nav-item text" style="margin-right: 50px; " >
      {{ \Carbon\Carbon::parse(now()->toDateString())->locale('es')->isoFormat('D [de] MMMM [del] YYYY') }}
    </div>
    <div class="navbar-item  " style="margin-right: 30px">
      <a href="{{route('login')}}">
        <button id="navbutton1" type="button" class=" btn-white">Iniciar sesión</button>
      </a>
    </div>
  </div> 

</nav>
