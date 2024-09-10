<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\hallazgo;
use App\Models\Index;
use App\Models\Muestreo;
use App\Models\Municipio; // Importa el modelo Municipio
use App\Models\Playa;
use App\Models\tipo_residuo;
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
    public function showResultados(int $id){
        // $anios = DB::table('muestreos')->distinct()->pluck('anio');
        // $zonas = DB::table('muestreos')->distinct()->pluck('zona');
        // $dias = DB::table('muestreos')->distinct()->pluck('dia');
        // $num_muestreos = DB::table('muestreos')->distinct()->pluck('num_muestreo');
        $playas= Playa::all();

        // $hallazgos = DB::table('hallazgos')
        // ->select('nombre_playa','id_muestreo','zona','anio','dia', 'id_tipo', 'nombre_tipo', 'cantidad', 'porcentaje', 'num_muestreo',)
        // ->join('muestreos', 'fk_muestreo', '=', 'id_muestreo')
        // ->join('playas', 'fk_playa', '=', 'id_playa')
        // ->join('tipo_residuos', 'fk_tipo', '=', 'id_tipo')
        // ->get();
        $muestreos =Muestreo::where('fk_playa', $id)->get();
        $residuos= tipo_residuo::all();
        if($id==0){
            $muestreos =Muestreo::all();
        }
        $hallazgos= hallazgo::all();

        

    return view('consultas',compact('playas','hallazgos','muestreos','residuos'));
    }

   
}
