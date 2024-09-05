@extends('layouts.app')

@section('title', 'Inicio')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
  <div class="container-fluid p-0 m-0" >
    @include('content_info')
  </div>
  <br><br><br>
  <div class="row p-0 m-0 justify-content-center  " style="background-color: #F0F3F4" >
    {{-- <img style="height: 20vh; width:100%" class="p-0 m-0" src="{{asset('images/triangulo-superior.jpg')}}" > --}}
      {{--<h1 class="text-blue text-center mb-4 fs-1">  de los muestreos realizados en playas mexicanas</h1> --}}
    {{-- <div class="col-md-4 p-3" style="height: 100vh;">
    
      @include('content_consultas')
    </div> --}}

    <div class="col-md-10 "  style="height: 100vh;">
      <h1 class="text-blue text-center m-4 fs-1 h1">Resultados</h1>
   
      @include('content_mapa')
    </div>
    
    {{-- <img style="height: 20vh; width:100%" class="p-0 m-0" src="{{asset('images/triangulo-inferior.jpg')}}" > --}}
  </div>


@endsection
