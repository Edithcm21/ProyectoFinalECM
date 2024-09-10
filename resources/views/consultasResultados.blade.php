<div class="row justify-content-center align-items-center">
  <div class="filters ">
    <label for="year">Selecciona la playa</label>
      <select id="year" onchange="updateChart()">
        @foreach ($playas as $playa)
        <option value="{{$playa->id_playa}}">{{$playa->nombre_playa}}</option>
        @endforeach
      </select>
    <label for="year">Selecciona el año:</label>
    <select id="year" onchange="updateChart()">
        @foreach ($anios as $anio)
        <option value="{{$anio}}">{{$anio}}</option>
        @endforeach
    </select>
  
    <label for="muestreo">Número de muestreo:</label>
    <select id="muestreo" onchange="updateChart()">
        @foreach ($num_muestreos as $num_muestreo)
        <option value="{{$num_muestreo}}">{{$num_muestreo}}</option>
        @endforeach
    </select>
  
    

    <label  class="">Zona:</label>
    <select class=""  id="zona" onchange="updateChart()" aria-label="Default select example" name="zona"  required>
        @foreach ($zonas as $zona)
        <option value="{{$zona}}">{{$zona}}</option>
        @endforeach
     </select>
  
    <label for="residuo">Tipo de residuo:</label>
    <select id="residuo" onchange="updateChart()">
      <option value="total">Total residuos</option>
      <option value="palitos">Palitos de helado</option>
    </select>
  </div>
  <div class="col-sm-10 m-4">

    @php
  $totales = array_fill(0, count($muestreos) * 2, 0);
  @endphp
    <table class="table table-striped table-hover border text-center">
      <thead>
        <tr>
          <th scope="col text-center" rowspan="3">Residuo</th>
        </tr>
       
        <tr class="border">
          @foreach ($muestreos as $muestreo )
          <th class="border" colspan="2">{{$muestreo->anio}} {{$muestreo->dia}} <br>{{$muestreo->zona}}</th>
          @endforeach
        </tr>
        <tr class="border">
          @foreach ($muestreos as $muestreo )
          <th class="border">cantidad</th>
          <th class="border">porcentaje</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
      
        @foreach ($residuos as  $residuo)
        <tr>
          
            <td>{{$residuo->nombre_tipo}}</td>
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