@extends('views_admin.app')

@section('title', 'Hallazgo')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('content' )
  <div class="row justify-content-center align-items-center p-4"  >
    <div class="col-md-10 p-2 " style=" background-color:white;min-height: 74vh  " >
        <div class="container  " >
            <div class="row m-4"  >
                <div class="col-sm-6 mt-4"   >
                    <h3 style="color: #B72223">Playa {{$muestreo->playa->nombre_playa}}</h3>   
                </div>
                <div class="col-sm-3  mt-4 "  >
                    <a href="/admin/hallazgos/edit/{{$muestreo->id_muestreo}}">
                        <button type="submit" class="btn  btn-secondary " style="width: 100%; ">Editar</button>
                    </a>
                </div> 
                <div class="col-sm-3 mt-4 "  >
                    <a href="">
                        <button type="submit" class="btn  btn-danger " style="width: 100%; ">Eliminar Registro</button>
                    </a>
                </div> 
            </div>
            <div class="row">
                <div class="mb-3 col-sm-2">
                    <label for="numMuestreo" class=""># de muestreo :</label>
                    <input type="text" readonly class="form-control" id="numMuestreo" value="{{$muestreo->num_muestreo}}">
                </div>
                <div class="mb-3 col-sm-3">
                    <label for="zona" class="">Zona :</label>
                    <input type="text" readonly class="form-control" id="zona" value="{{$muestreo->zona}}">
                </div>
                <div class="mb-3 col-sm-2">
                    <label for="fecha" class="">Fecha :</label>
                    <input type="text" readonly class="form-control" id="fecha" value="{{$muestreo->fecha}}">
                </div>
                <div class="mb-3 col-sm-2">
                    <label for="dia" class="">Día :</label>
                    <input type="text" readonly class="form-control" id="dia" value="{{$muestreo->dia}}">
                </div>
                <div class="mb-3 mt-1 col-sm-3 ">
                    <input type="text" readonly class="form-control text-center alert {{ $muestreo->autorizado == 1 ? 'alert-success' : 'alert-secondary' }}" id="autorizado" value="{{$autorizado}}" >
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
                                <th>Porcentaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($clasificaciones as $clasificacion)
                            @php
                            $hallazgosFiltrados = $hallazgos->where('id_clasificacion',$clasificacion->id_clasificacion);
                            $total=$hallazgosFiltrados->count();
                            $first = true; 
                            @endphp
                            @if($total>0)
                            @foreach ($hallazgosFiltrados as $hallazgo)
                            <tr style="">
                                @if ($first)
                                <td rowspan="{{$total}}">{{$clasificacion->nombre_clasificacion}} </td>
                                @php $first = false; @endphp 
                                @endif
                                <td>{{$hallazgo->nombre_tipo}}</td>
                                <td>{{$hallazgo->cantidad}}</td>
                                <td>{{$hallazgo->porcentaje}}</td>
                            </tr>
                            @endforeach
                            @endif
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
