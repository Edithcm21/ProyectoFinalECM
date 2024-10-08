<nav id="navbar2" class="navbar navbar_inicio navbar-expand-lg navbar-ligth   p-2">
    <div class="d-flex mr-3 col-sm-2  justify-content-center" >
        {{-- <img class="al img-fluid" style="max-height: 90px;" src="{{ asset('images/Logo3.png') }}"> --}}
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
                <a class="nav-link active" href="#">Quienes somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('consulta.filtro')}}">Resultados</a>
            </li>
        </ul>
        <div class="nav-item text" style="margin-right: 50px; " >
            {{ \Carbon\Carbon::parse(now()->toDateString())->locale('es')->isoFormat('D [de] MMMM [del] YYYY') }}
        </div>
        <div class="navbar-text">
            <div class=" justify-content-end  p-0"> 
                <img class="al img-fluid" style="max-height: 9vh;" src="{{ asset('images/logo_UAM.svg') }}">
            </div> 
        </div>
    </div>
  </nav>
  