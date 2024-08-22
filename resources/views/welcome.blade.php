@extends('layouts.app')

@section('title', 'Inicio')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
  <div>
    @include('content_info')
  </div>
  <div class="row ">
    <div class="col-md-4 p-4" style="height: 100vh;">
    
      @include('content_consultas')
    </div>
    <div class="col-md-8 p-4"  style="height: 100vh;">
      @include('content_mapa')
    </div>
  </div>


@endsection
