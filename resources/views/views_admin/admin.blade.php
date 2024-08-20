@extends('layouts.app')

@section('title', 'Inicio')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('content')

  <div>
  </div>
  <div class="row ">
    <div class="col-md-12 p-4" style="height: 74vh;">
      <h1>Bienvenido</h1>
      {{-- @if($opcion == 'usuarios')
        @include('views_admin.users') 
      @elseif($opcion == 'playas')
        @include('views_admin.playas') 
      @elseif($opcion == 'articulos')
        @include('views_admin.articulos')
      @elseif($opcion == 'clasificacion_residuos')
        @include('views_admin.clasificacion_residuos')
      @elseif($opcion == 'localidades')
        @include('views_admin.localidades')
      @elseif($opcion == 'municipios')
        @include('views_admin.municipios')
      @elseif($opcion == 'residuos')
        @include('views_admin.residuos')
      @else
        Bienvenido
    @endif --}}
    </div>

  </div>


@endsection
