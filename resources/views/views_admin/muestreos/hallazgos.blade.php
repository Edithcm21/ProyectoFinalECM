@extends('views_admin.app')

@section('title', 'Hallazgo')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('content' )
  <div class="row justify-content-center align-items-center p-4"  >
    <div class="col-md-10 p-2 " style=" background-color:white;min-height: 74vh  " >
        <div class="container  " >
            <div class="row"  >
                <div class="col-sm-12 col-lg-12 mt-4"   >
                    <h3 style="color: #B72223">Playa---</h3>   
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-sm-3">
                    <label for="numMuestreo" class=""># de muestreo :</label>
                    <input type="text" readonly class="form-control" id="numMuestreo" value="{{$muestreo->num_muestreo}}">
                </div>
                <div class="mb-3 col-sm-3">
                    <label for="zona" class="">Zona :</label>
                    <input type="text" readonly class="form-control" id="zona" value="{{$muestreo->zona}}">
                </div>
                <div class="mb-3 col-sm-3">
                    <label for="fecha" class="">Fecha :</label>
                    <input type="text" readonly class="form-control" id="fecha" value="{{$muestreo->fecha}}">
                </div>
                <div class="mb-3 col-sm-3">
                    <label for="dia" class="">Día :</label>
                    <input type="text" readonly class="form-control" id="dia" value="{{$muestreo->dia}}">
                </div>
            </div>
            <div class="row centrarh">
                <div class="col-8 mt-4 ">
                    <table class="table table-striped table-responsive border">
                        <thead>
                            <tr >
                                <th>Clasificacion</th>
                                <th>Residuo</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($clasificaciones as $clasificacion) --}}
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                            {{-- @endforeach  --}}
                            
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
