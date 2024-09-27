{{-- <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <nav id="navbar" class="navbar navbar-expand-lg n-transparent navbar-dark fixed-top">
 
  <div class="container-fluid">
      <div class="row p-0 w-100">
          <div class="col-lg-1 col-sm-2">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
          </div>
          <div class="col-lg-2 col-sm-2">
              <div class="d-flex justify-content-center">
                  <img class="al img-fluid" style="max-height: 90px;" src="{{ asset('images/Logo.png') }}">
              </div>
          </div>
          <div class="col-lg-9 col-sm-8">
              <div class="row">
                  <div class="col-lg-12 text-sm-end p-0">
                      <img class="al img-fluid" style="max-height: 9vh;" src="{{ asset('images/logo_UAM.svg') }}">
                  </div>
              </div>
              <div class="row">
                  <div class="col">
                      <div class="collapse navbar-collapse" id="navbarText">
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                              <li class="nav-item">
                                  <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/">Inicio</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">Informacion</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">Quienes somos</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{route('resultados/{1}')}}">Consultas</a>
                              </li>
                          </ul>
                          <div class="nav-item" style="margin-right: 40px;">
                              Fecha de consulta
                          </div>
                          <div class="navbar-text">
                              <a href="{{ route('login') }}"><button type="button" class="btn btn-outline-danger">Iniciar sesión</button></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>    
  </div>
</nav> --}}

<nav id="navbar2" class="navbar navbar_inicio navbar-expand-lg navbar-ligth   ">
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
          <button id="navbutton" type="button" class=" btn-blue">Iniciar sesión</button>
         
  
        </a>
      </div>
    </div> 
  
  </nav>
  