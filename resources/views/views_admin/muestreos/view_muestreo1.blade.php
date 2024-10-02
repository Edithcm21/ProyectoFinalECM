@extends('views_admin.app')

@section('title', 'Muestreos')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('content' )
<form method="GET" action="{{ route('admin.muestreos') }}">
    <div class="form-group">
        <label for="playa">Selecciona una Playa:</label>
        <select name="playa" id="playa" class="form-control">
            <option value="">Todas</option>
            @foreach($playas as $playa)
                <option value="{{ $playa->id_playa }}" {{ request('playa') == $playa->id_playa ? 'selected' : '' }}>
                    {{ $playa->nombre_playa }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Filtrar</button>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Playa</th>
            <th>Región</th>
            <th>Municipio</th>
            <th>Latitud</th>
            <th>Longitud</th>
            <th>N° de Muestreo</th>
            <th>Zona</th>
            <th>Fecha/Año</th>
            <th>Día</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($muestreos as $muestreo)
        <tr>
            <td>{{ $muestreo->id_muestreo }}</td>
            <td>{{ $muestreo->playa->nombre_playa }}</td>
            <td>{{ $muestreo->playa->region->nombre_region }}</td>
            <td>{{ $muestreo->playa->municipio->nombre_municipio }}</td>
            <td>{{ $muestreo->playa->latitud }}</td>
            <td>{{ $muestreo->playa->longitud }}</td>
            <td>{{ $muestreo->num_muestreo }}</td>
            <td>{{ $muestreo->zona }}</td>
            <td>{{ $muestreo->fecha }}</td>
            <td>{{ $muestreo->dia }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection