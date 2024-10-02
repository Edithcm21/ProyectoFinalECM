@extends('views_admin.app')

@section('title', 'Editar Hallazgos')
@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('content' )
  <div class="row justify-content-center align-items-center p-4"  >
    <div class="col-md-10 p-2 " style=" background-color:white;min-height: 74vh  " >
        <div class="container  " >
            <div class="row">
                <div class="col-12 "  style=" height: 10vh">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show myAlert" role="alert" id="myAlert"> 
                             {{ session('error') }}
                        </div>
                    @endif
                    <!-- Mensajes de éxito -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show myAlert" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12 " >
                    <h3 style="color: #B72223">Editar registro</h3>
                </div>
            </div>
            <div class="row">
                    <div class="col-sm-2 mb-3" >
                        <label  class="form-label size15">Numero de muestreo:</label>
                        <input type="number" class="form-control"  name="Nmuestreo" placeholder="Numero de muestreo" required value="{{$muestreo->num_muestreo}}">
                    </div>
                    <div class=" col-sm-2 mb-3 ">
                        <label  class="form-label ">Playa:</label>
                        <select class="form-select" aria-label="Default select example" name="playa"  required>
                            <option  >Selecciona playa</option>
                            @foreach ( $playas as $playa)
                            <option value="{{$playa->id_playa}}">{{ $playa->nombre_playa}}</option>
                             @endforeach
                        </select>
                    </div>
                    <div class=" col-sm-2 mb-3" >
                        <label  class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="date" name="date" placeholder="Fecha" required value="{{$muestreo->fecha}}">
                    </div>
                    <div class=" col-sm-2 mb-3 ">
                        <label  class="form-label">Día:</label>
                        <select class="form-select" aria-label="Default select example" name="dia"  required>
                            <option  >Selecciona día</option>
                            <option value="sabado" {{$muestreo->dia=='sabado'?'selected':''}}>sabado</option>
                            <option value="domingo" {{$muestreo->dia=='domingo'?'selected':''}}>domingo</option>
                        </select>
                    </div>
                    <div class=" col-sm-3 mb-3 ">
                        <label  class="form-label">Zona:</label>
                        <select class="form-select" aria-label="Default select example" name="zona"  required>
                            <option value="Debajo pleamar" {{$muestreo->zona=='Debajo pleamar'?'selected':''}}>Debajo pleamar</option>
                            <option value="Encima pleamar" {{$muestreo->zona=='Encima pleamar'?'selected':''}}>Encima pleamar</option>
                            <option value="Encima de la pleamar, hasta estructura fija" {{$muestreo->zona=='Encima de la pleamar, hasta estructura fija'?'selected':''}}>Encima de la pleamar, hasta estructura fija</option>
                            <option value="Sobre y debajo de la pleamar" {{$muestreo->zona=='Sobre y debajo de la pleamar'?'selected':''}}>Sobre y debajo de la pleamar</option>
                        </select>
                    </div>
            </div> 
            <div class="row centrarh">
                <div class="col-sm-10 border  mb-3" >
                    <form id="residuosForm">
                        <div id="residuosContainer">
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <select name="residuos[]" class="form-select">
                                        <option value="" disabled selected>Selecciona un residuo</option>
                                        @foreach ($residuos as $residuo)
                                        <option value="{{$residuo->id_tipo}}">{{$residuo->nombre_tipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input class="inputC form-control " type="number" name="cantidades[] " value="0" min="0" onchange="updateTotals()">
                                    {{-- <input type="number" name="cantidad[]" class="form-control inputC"  value="0" min="0" onchange="updateTotals()"> --}}
                                </div>
                                <div class="col-md-2">
                                    {{-- <input type="text" name="porcentaje[]" class="form-control inputC"  value="0 %" min="0" onchange="updateTotals()"> --}}
                                    <input class="inputC  form-control " type="text"   name="porcentajes[]" value="0 %" min="0" onchange="updateTotals()">
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-danger btn-remove"  style="width:90%">Eliminar</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success" id="addMore">Agregar más</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
            
        </div>  
    </div>
  </div>

@endsection
<script>
    window.residuos = @json($residuos);
  </script>

<script>
    function updateTotals() {
        let totalCantidad = 0;
        let totalPorcentaje = 0;
        console.log('entro a la funcion de totales ');
        
    
        // Obtener todos los inputs de cantidad
        const cantidadInputs = document.querySelectorAll('input[type="number"][name^="cantidades"]');
        cantidadInputs.forEach(input => {
            totalCantidad += parseFloat(input.value) || 0; // Sumar las cantidades
        });
    
        // Actualizar los inputs de porcentaje basado en la cantidad total
        cantidadInputs.forEach(input => {
            const cantidad = parseFloat(input.value) || 0; // Obtener la cantidad
            const porcentaje = totalCantidad > 0 ? ((cantidad / totalCantidad) * 100).toFixed(2) : 0; // Calcular el porcentaje
            const porcentajeInput = input.closest('.row').querySelector('input[name^="p"]'); // Encontrar el input de porcentaje en la misma fila
            porcentajeInput.value = porcentaje + '%'; // Actualizar el valor del porcentaje
        });
    
        // Actualizar el total de cantidades
        // document.getElementById('totalC').innerText = totalCantidad;
    
        // Sumar el total de porcentajes para mostrarlo en la tabla total
        // document.getElementById('totalP').innerText = '100%';
    }

</script>

  