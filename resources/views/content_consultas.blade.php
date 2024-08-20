<div class="container" >
  <div class="card card_consultas" style="height: 74vh; margin-top: 50px;">
    <div class="card-body ">
      <label><h4>Filtros</h4> </label>
      <br>
      <br>

      <label class="mb-2">Selecciona Estado:</label>

      <select class="form-select mb-4" onchange="FiltrarMunicipios(this)" aria-label="Default select example" id="select_estado">
        <option selected>Selecciona Estado</option>
        
         @foreach($estados as $estado)
          <option value="{{$estado->id_estado}}">{{ $estado->nombre_estado }}</option>
        @endforeach 
       </select> 

      <label class="mb-2">Selecciona Municipio:</label>
      <br>
      
      <select id="select_municipio" class="form-select mb-4" aria-label="Default select example">
        <option selected>Selecciona Municipio</option>
      </select>

      <div class="row">
      <div class="row">
    <div class="col-auto me-auto"></div>
    <div class="col-auto">
    <button type="button" onclick="" class="btn btn-filtro ">Filtrar</button>
     
    </div>
  </div>
    </div>

    </div>
  </div>
</div>

<script>
  function FiltrarMunicipios(estados_select){
    // console.log(estados_select.value)
    let id_estado = estados_select.value;
    fetch(`estados/${id_estado}`)
    .then(function(response){
      return response.json();
    })
    .then(function (jsonData){
      console.log(jsonData[0]);
      buildMunicipiosSelected(jsonData);
    })
  }
  function buildMunicipiosSelected(jsonTeams) {
    let municipioTeam=document.getElementById('select_municipio');
    clearSelect(municipioTeam)
    jsonTeams.forEach(function (municipio){

      let optionTag=document.createElement('option');
      optionTag.value=municipio.id_municipio;
      optionTag.innerHTML=municipio.nombre_municipio;
      municipioTeam.append(optionTag);
    });
  }

  function clearSelect(select){
    while(select.options.length>1){
      select.remove(1);
    }
  }
</script>