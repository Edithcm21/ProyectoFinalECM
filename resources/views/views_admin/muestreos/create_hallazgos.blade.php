@extends('views_admin.app')

@section('title', 'Hallazgos')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('content' )
  <div class="row justify-content-center align-items-center p-4"  >
    <div class="col-md-10 p-2 " style=" background-color:white;min-height: 74vh  " >
        <div class="container  " >
            <div class="row">
                <div class="col-12 "  style=" height: 8vh">
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
            <h3 style="color: #B72223">Nuevo registro</h3>
            <form class=" mb-3"method="POST" action="{{route('admin.hallazgos.store')}}" >
                @csrf
                <div class="row"  >
                    <div class="col-sm-12 col-lg-12 mt-4"   >
                  
                        <div class="row">
                            <div class="col-sm-2 mb-3" >
                                <label  class="form-label size15">Numero de muestreo:</label>
                                <input type="number" class="form-control"  name="Nmuestreo" placeholder="Nmuestreo" required >
                            </div>
                            <div class=" col-sm-2 mb-3 ">
                                <label  class="form-label ">Playa:</label>
                                <select class="form-select" aria-label="Default select example" name="playa"  >
                                    <option  >Selecciona playa</option>
                                  @foreach ( $playas as $playa)
                                    <option value="{{$playa->id_playa}}">{{ $playa->nombre_playa}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class=" col-sm-2 mb-3" >
                                <label  class="form-label">Fecha:</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="Fecha" >
                            </div>
                            <div class=" col-sm-2 mb-3 ">
                                <label  class="form-label">Día:</label>
                                <select class="form-select" aria-label="Default select example" name="dia"  >
                                    <option  >Selecciona día</option>
                                    <option value="sabado">sabado</option>
                                    <option value="domingo">domingo</option>
                                </select>
                            </div>
                            <div class=" col-sm-3 mb-3 ">
                                <label  class="form-label">Zona:</label>
                                <select class="form-select" aria-label="Default select example" name="zona"  >
                                    <option  >Selecciona zona</option>
                                    <option value="1">Debajo pleamar</option>
                                    <option value="2">Encima pleamar</option>
                                    <option value="3">Encima de la pleamar, hasta estructura fija</option>
                                    <option value="4">Sobre y debajo de la pleamar</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="row centrarh ">
                    @foreach ($clasificaciones as $clasificacion)
                        <div class="col-sm-8 col-lg-8 " >
                            @if(isset($residuosAgrupados[$clasificacion->id_clasificacion]))
                            <table class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="bg-dark text-white">{{ $clasificacion->nombre_clasificacion }}</th>
                                    </tr>
                                    <tr>
                                        <th class="col-8">Residuo</th>
                                        <th class="col-2">Cantidad (pz)</th>
                                        <th class="col-2">Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($residuosAgrupados[$clasificacion->id_clasificacion] as $residuo)
                                    <tr class="size12">
                                        <td>{{ $residuo->nombre_tipo}}</td>
                                        <td><input class="inputC borde" type="number" name="c{{$residuo->id_tipo}} " value="0" min="0" onchange="updateTotals()"></td>
                                        <td><input class="inputC borde" type="text" name="p{{$residuo->id_tipo}}" value="0 %" min="0" onchange="updateTotals()"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    @endforeach
                    <div class="col-sm-8 col-lg-8 " >
                        <table class="table table-striped border">
                            <tr>
                                <th class="col-8">Total</th>
                                <td class="col-2" id="totalC"><label>0</label></td>
                                <td class="col-2" id="totalP"><label>0%</label></td>
                            </tr>
                        </table>

                    </div>
                    
                </div> 
                <div class="row  centrarh">
                    <div class="col-8 m-4  centrarh"  >
                        <button type="submit" class="btn  btn-outline-danger " style="width: 60%; ">Agregar</button> 
                    </div> 
                </div> 
            </form>
    </div>       
</div>
@endsection

<script>
    function updateTotals() {
        let totalCantidad = 0;
        let totalPorcentaje = 0;
    
        // Obtener todos los inputs de cantidad
        const cantidadInputs = document.querySelectorAll('input[type="number"][name^="c"]');
        cantidadInputs.forEach(input => {
            totalCantidad += parseFloat(input.value) || 0; // Sumar las cantidades
        });
    
        // Actualizar los inputs de porcentaje basado en la cantidad total
        cantidadInputs.forEach(input => {
            const cantidad = parseFloat(input.value) || 0; // Obtener la cantidad
            const porcentaje = totalCantidad > 0 ? ((cantidad / totalCantidad) * 100).toFixed(2) : 0; // Calcular el porcentaje
            const porcentajeInput = input.closest('tr').querySelector('input[name^="p"]'); // Encontrar el input de porcentaje en la misma fila
            porcentajeInput.value = porcentaje + '%'; // Actualizar el valor del porcentaje
        });
    
        // Actualizar el total de cantidades
        document.getElementById('totalC').innerText = totalCantidad;
    
        // Sumar el total de porcentajes para mostrarlo en la tabla total
        document.getElementById('totalP').innerText = '100%';
    }
    </script>
    

    
