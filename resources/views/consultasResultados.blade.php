<div class="row justify-content-center align-items-center">
  <div class="filters ">
    
    <form action="" method="GET" id="playaForm">
      <label for="residuo">Filtrar por playa</label>
      <select  id="playaSelect" onchange="submitFormWithId(this.value)">
          <option value="0">Selecciona playa</option>
          @foreach ($playas as $playa)
              <option value="{{ $playa->id_playa }}">{{ $playa->nombre_playa }}</option>
          @endforeach
          <option value="0">Todas</option>
          
      </select>
  </form>
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

<script>
  function submitFormWithId(playaId) {
      if (playaId) {
          let form = document.getElementById('playaForm');
          form.action = '/resultados/' + playaId; 
          form.submit(); 
      }
  }
</script>