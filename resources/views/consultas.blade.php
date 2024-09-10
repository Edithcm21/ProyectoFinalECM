
@extends('layouts.app')

@section('title', 'Inicio')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
  <div class="container-fluid espacio " style="min-height: 80vh">
   @include('consultasResultados')
  </div>
@endsection