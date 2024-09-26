<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
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
        ->select('id_playa','nombre_playa','latitud','longitud','nombre_municipio','nombre_estado', DB::raw('COUNT(DISTINCT `num_muestreo`) as muestreos'))
        ->join('playas', 'playas.id_playa', '=', 'muestreos.fk_playa')
        ->join('municipios', 'municipios.id_municipio', '=', 'playas.fk_municipio')
        ->join('estados', 'estados.id_estado', '=', 'municipios.fk_estado')
        ->groupBy( 'id_playa','nombre_playa','latitud','longitud','nombre_municipio','nombre_estado')
        ->get();
        return view('welcome', compact('puntos'));
      
    }
    public function getMuestreo($id_playa){
        $muestreos=Muestreo::where('fk_playa',$id_playa)->get();
        $num_muestreo= DB::table('muestreos')
            ->select('num_muestreo')->where('fk_playa',$id_playa)->groupBy('num_muestreo')->get();
        $zona= DB::table('muestreos')
            ->select('zona')->where('fk_playa',$id_playa)->groupBy('zona')->get();
        
        if($id_playa==0){
            $muestreos= Muestreo::all();
            $num_muestreo= DB::table('muestreos')
            ->select('num_muestreo')->groupBy('num_muestreo')
            ->get();
            $zona= DB::table('muestreos')
            ->select('zona')->groupBy('zona')
            ->get();
        }
        return response()->json([
            'muestreos' => $muestreos,
            'num_muestreo' => $num_muestreo,
            'zonas'=>$zona
        ]);


    }
    public function showResultados( $id){
        $playas= Playa::all();

        $hallazgos = DB::table('hallazgos')
        ->select('id_muestreo', 'id_tipo','cantidad', 'porcentaje')
        ->join('muestreos', 'fk_muestreo', '=', 'id_muestreo')
        ->join('playas', 'fk_playa', '=', 'id_playa')
        ->join('tipo_residuos', 'fk_tipo', '=', 'id_tipo')
        ->where('id_playa',$id)
        ->get();
        $muestreos =Muestreo::where('fk_playa', $id)->get();
        $residuos= tipo_residuo::all();
        $clasificaciones=Clasificacion::all();
        $num_muestreos= DB::table('muestreos')
            ->select('num_muestreo')->where('fk_playa',$id)->groupBy('num_muestreo')->get();
        $zonas= DB::table('muestreos')
            ->select('zona')->where('fk_playa',$id)->groupBy('zona')->get();
        
    return view('consultas',compact('playas','hallazgos','muestreos','residuos','clasificaciones','num_muestreos','zonas'));
    }

    public function showFilteredResults(Request $request){
        $id_playa = $request->playa;
        $id_clasificacion=$request->clasificacion;
        $num_muestreo = $request->muestreo;
        $id_zona = $request->zona;

        $playas= Playa::all();
        $hallazgos = DB::table('hallazgos')
        ->select('id_muestreo', 'id_tipo',  'cantidad', 'porcentaje')
        ->join('muestreos', 'fk_muestreo', '=', 'id_muestreo')
        ->join('playas', 'fk_playa', '=', 'id_playa')
        ->join('tipo_residuos', 'fk_tipo', '=', 'id_tipo');
        if($id_playa > 0){
            $hallazgos->where('id_playa',$id_playa);
        }
        if($num_muestreo > 0){
            $hallazgos->where('num_muestreo',$num_muestreo);
        }
        if($id_zona > 0){
            $hallazgos->where('zona',$id_zona);
        } 
        $hallazgos = $hallazgos->get();

        $muestreos =Muestreo::query();
        if($id_playa > 0){
            $muestreos->where('fk_playa',$id_playa);
        }
        if($num_muestreo > 0){
            $muestreos->where('num_muestreo',$num_muestreo);
        }
        if($id_zona > 0){
            $muestreos->where('zona',$id_zona);
        } 
        $muestreos = $muestreos->get();
        $residuos= tipo_residuo::query();
        if($id_clasificacion > 0){
            $residuos->where('fk_clasificacion',$id_clasificacion);
        }
        $residuos = $residuos->get();
        $clasificaciones=Clasificacion::all();
        $num_muestreos= DB::table('muestreos')
        ->select('num_muestreo')->where('fk_playa',$id_playa)->groupBy('num_muestreo')->get();
        $zonas= DB::table('muestreos')
        ->select('zona')->where('fk_playa',$id_playa)->groupBy('zona')->get();
        
    return view('consultas',compact('playas','hallazgos','muestreos','residuos','clasificaciones','num_muestreos','zonas'));

    }

   
}
