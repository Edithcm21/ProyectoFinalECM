@extends('layouts.app')

@section('title', 'Login')

@section('navbar')
    @include('layouts.navbar_login')
@endsection

@section('content')

  <div class="row ">
    <div class="col-md-12 p-0  " style="margin-top: 60px">
      <br><br>
        @include('login') {{-- Incluir la vista de usuarios --}}
    </div>
  </div>
@endsection
