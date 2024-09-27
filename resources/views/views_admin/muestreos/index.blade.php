@extends('views_admin.app')

@section('title', 'Muestreos')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('content' )
  <div class="row justify-content-center align-items-center p-4"  >
    <div class="col-md-10 p-2 " style=" background-color:white;min-height: 74vh  " >
        <div class="container  " >
            <div class="row"  >
                <div class="col-sm-8 col-lg-8 mt-4"   >
                    <h3 style="color: #B72223">Resultados de los muestreos</h3>
                   
                </div>
                <div class="col-sm-4 col-lg-4 mt-4"   >
                  <a href="/admin/hallazgos/create">
                    <button type="submit" class="btn  btn-outline-danger " style="width: 60%; ">Agregar muestreo</button> 
                  </a> 
              </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4 table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Playa</th>
                                <th>Region</th>
                                <th>Municipio</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>N° de muestreo</th>
                                <th>Zona</th>
                                <th>Fecha/año</th>
                                <th>dia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($muestreos as $muestreo)
                            <tr>
                                <td>{{$muestreo->id_muestreo}}</td>
                                <td>{{$muestreo->playa->nombre_playa}}</td>
                                <td>{{$muestreo->playa->region->nombre_region}}</td>
                                <td>{{$muestreo->playa->municipio->nombre_municipio}}</td>
                                <td>{{$muestreo->playa->latitud}}</td>
                                <td>{{$muestreo->playa->longitud}}</td>
                                <td>{{$muestreo->num_muestreo}}</td>
                                <td>{{$muestreo->zona}}</td>
                                <td>{{$muestreo->fecha}}</td>
                                <td>{{$muestreo->dia}}</td>
                                <td>mas...</td>
                            </tr>
                                
                            @endforeach 
                            
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal de advertencia  --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border: none">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>¿Estas seguro de eliminar el registro?</h6>
        
      </div>
      
      <div class="modal-footer" style="border: none">
        <form id="formDelete"  data-action="{{route('admin.Playas.delete',1)}}" method="POST">
          @csrf 
          <button type="submit" class="btn btn-secondary btn-sm" >Eliminar</button>
        </form>
        <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div> 
@endsection
