<div class=" header-top">
    <div class="d-flex justify-content-start align-items-center me-2">
        <img class="al img-fluid me-1" style="max-height: 90px;" src="{{ asset('images/Logo-ResiPlay.png') }}">
        <img class="mt-0 pt-0" src="{{asset('images/nombre.png')}}" alt="" style="height: 40px">
        {{-- <h3 class="fw-bold ">Resi<strong class=" text-red">Play</strong></h4> --}}
    </div>
    <div class="buttons d-flex justify-content-end align-items-center">
        
        <div class="  " style="">
            <a href="{{route('login')}}">
                <button id="navbutton1" type="button" class="btn ">Iniciar sesión</button>
            </a>
        </div>
    </div>
</div>
<nav id="navbar3" class="navbar   navbar-expand-lg  navbar-dark1 " style="">
    <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">INICIO</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('Costas')}}">LAS PLAYAS </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('Residuos_playas')}}">RESIDUOS EN PLAYAS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('Monitoreos')}}">MONITOREOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('Integrantes')}}">¿QUIENES SOMOS?</a>
        </li>
        <li class="nav-item dropdown " >
          <a class="nav-link dropdown-toggle " href="{{route('consulta')}}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            RESULTADOS
          </a>
          <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item "  href="{{route('consulta')}}">Resultados</a></li>
            <li><a class="dropdown-item" href="{{route('publicaciones')}}">Publicaciones</a></li>
          </ul>
        </li>
      </ul>
      <div class="nav-item text ms-3 me-2" style=" " >
        {{ \Carbon\Carbon::parse(now()->toDateString())->locale('es')->isoFormat(' D [de] MMMM [del] YYYY') }}
      </div>
    </div> 
  
  </nav>
