
@extends('layouts.app')

@section('title', 'Resultados')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
  <div class="container-fluid espacio " style="min-height: 80vh ; ">
    <div class="row justify-content-center align-items-center">
      <div class="filters col-sm-10 m-4">
        
        <form class="row " method="post" action="{{route('resultados.filtro')}}"  >
          @csrf
          <div class="col-sm-2 m-1 p-1 ">
            <label for="playaSelect">Playa</label>
            <select  id="playaSelect" class="form-select" name="playa">
              <option value="0">Selecciona playa</option>
              @foreach ($playas as $playa)
              <option value="{{ $playa->id_playa }}">{{ $playa->nombre_playa }}</option>
              @endforeach
              <option value="0">Todas</option>
            </select>
          </div>
          <div class="col-sm-2 m-1 p-1">
            <label for="clasificacionSelected">Clasificacion</label>
            <select id="clasificacionSelected"  class="form-select" name="clasificacion">
              <option value="0">Selecciona playa</option>
              @foreach ($clasificaciones as $clasificacion)
              <option value="{{ $clasificacion->id_clasificacion }}">{{ $clasificacion->nombre_clasificacion }}</option>
              @endforeach
              <option value="0">Todas</option>
            </select>
          </div>
          <div class="col-sm-2 m-1 p-1">
            <label for="muestreoSelected"># Muestreo</label>
            <select  id="muestreoSelected" class="form-select" name="muestreo">
              <option value="0">Selecciona muestreo</option>
              @foreach ($num_muestreos as $num_muestreo)
              <option value="{{ $num_muestreo->num_muestreo }}">{{ $num_muestreo->num_muestreo }}</option>
              @endforeach
              <option value="0">Todos</option>
            </select>
          </div>
          <div class="col-sm-3 m-1 p-1 ">
            <label for="zonaSelected">Zona</label><br>
            <select  id="zonaSelected" class="form-select" name="zona">
              <option value="0">Selecciona playa</option>
              @foreach ($zonas as $zona)
              <option value="{{ $zona->zona }}">{{ $zona->zona}}</option>
              @endforeach
              <option value="0">Todas</option>
            </select>
          </div>

          <div class="col-sm-2 m-1 p-1 " ><br>
            <button  type="submit" class=" btn-blue btn-largo" > Filtrar</button>
          </div>   
      </form>
      
      </div>
      <div class="col-sm-10 m-4 ">
    
        @php
      $totales = array_fill(0, count($muestreos) * 2, 0);
      @endphp
        <table class="table table-striped table-hover border text-center">
          <thead>
            <tr>
              <th scope="col text-center border " rowspan="5">Residuo</th>
            </tr>
            <tr class="border">
              @php
                  // Agrupo por playa
                  $muestreosPorPlaya = $muestreos->groupBy('fk_playa');
              @endphp
    
              @foreach ($muestreosPorPlaya as $playaId => $muestreosDePlaya)
                  @php
                      // Obtengo el primero nombre de esa playa
                      $nombrePlaya = $muestreosDePlaya->first()->playa->nombre_playa;
                      $totalMuestreos = $muestreosDePlaya->count();
                  @endphp
                  <th class="border text-center" colspan="{{ $totalMuestreos * 2 }}">
                     <p> Playa {{ $nombrePlaya }}</p> 
                  </th>
              @endforeach
          </tr>
            
            <tr class="border">
              @foreach ($muestreos as $muestreo )
              <th class="border" colspan="2">{{$muestreo->anio}} {{$muestreo->dia}} <br>{{$muestreo->zona}}</th>
              @endforeach
            </tr>
            <tr class="border">
              @foreach ($muestreos as $muestreo )
              <th class="border" colspan="2">{{$muestreo->num_muestreo}}</th>
              @endforeach
            </tr>
            <tr class="border">
              @foreach ($muestreos as $muestreo )
              <td class="border">cantidad</td>
              <td class="border">porcentaje</td>
              @endforeach
            </tr>
          </thead>
          <tbody>
          
            @foreach ($residuos as  $residuo)
            <tr>
              
                <td class="text-start">{{$residuo->nombre_tipo}}</td>
                @foreach ($muestreos as  $index => $muestreo)
    
                @php
                // Busca el hallazgo
                $hallazgo = $hallazgos->firstWhere(function ($h) use ($muestreo, $residuo) {
                    return $h->id_muestreo == $muestreo->id_muestreo && $h->id_tipo == $residuo->id_tipo;
                });
    
                $cantidad = $hallazgo ? $hallazgo->cantidad : 0;
                $porcentaje = $hallazgo ? $hallazgo->porcentaje : 0;
    
                    // Actualizar los totales
                    $totales[$index * 2] += $cantidad;
                    $totales[$index * 2 + 1] += $porcentaje;
    
                @endphp
                @if ($hallazgo)
                <td>{{ $hallazgo->cantidad }}</td>
                <td>{{ $hallazgo->porcentaje }}%</td>
                @else
                <td>0</td>
                <td>0</td>
                @endif
                @endforeach
                  
            </tr>
            @endforeach
            <tr>
              <td>Total</td>
              @foreach ($totales as $total)
              <td><strong>{{ $total }}</strong></td>
              @endforeach
            </tr>
          </tbody>
        </table>
      </div>
      
    
    </div>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function(){
    // Detecta cuando se selecciona una playa
    document.getElementById('playaSelect').addEventListener('change', function(){
      var playa_id = this.value;

      // Hace la llamada con fetch
      fetch('/getMuestreo/' + playa_id)
        .then(response => {
          if (!response.ok) {
            throw new Error('Error en la respuesta de la red');
          }
          return response.json();
        })
        .then(data => {
          // Limpiar el selector de muestreo y zona
          const muestreoSelected = document.getElementById('muestreoSelected');
          const zonaSelected = document.getElementById('zonaSelected');
          muestreoSelected.innerHTML = '<option value="0">Selecciona Muestreo</option>';
          zonaSelected.innerHTML = '<option value="0">Selecciona Zona</option>';
          console.log(data.num_muestreo);
          // Añade nuevas opciones
          data.num_muestreo.forEach(muestreo => {
            muestreoSelected.innerHTML += '<option value="' + muestreo.num_muestreo + '"> ' + muestreo.num_muestreo + '</option>';
          });
          data.zona.forEach(zona => {
            zonaSelected.innerHTML += '<option value="' + zona.zona + '"> ' + zona.zona + '</option>';
          });
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });
  });
</script>
