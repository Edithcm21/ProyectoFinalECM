<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Index;
use App\Models\Municipio; // Importa el modelo Municipio
use App\Models\Playa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puntos = DB::table('muestreos')
        ->select('nombre_playa','latitud','longitud','nombre_municipio','nombre_estado', DB::raw('COUNT(DISTINCT `num_muestreo`) as muestreos'))
        ->join('playas', 'playas.id_playa', '=', 'muestreos.fk_playa')
        ->join('municipios', 'municipios.id_municipio', '=', 'playas.fk_municipio')
        ->join('estados', 'estados.id_estado', '=', 'municipios.fk_estado')
        ->groupBy( 'nombre_playa','latitud','longitud','nombre_municipio','nombre_estado')
        ->get();
        // // $puntos = Playa::all();
        // $estados = Estado::all();
        return view('welcome', compact('puntos'));
      
    }

   
}
