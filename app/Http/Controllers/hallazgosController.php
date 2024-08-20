<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use App\Models\hallazgo;
use App\Models\muestreo;
use App\Models\Playa;
use App\Models\residuo;
use App\Models\tipo_residuo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;
use PhpParser\Node\Stmt\Foreach_;
use Psy\Readline\Hoa\Console;

class hallazgosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('views_admin.muestreos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $playas=Playa::all();
        $residuos=tipo_residuo::all();
        $clasificaciones= Clasificacion::all();
        $residuosAgrupados = tipo_residuo::all()->groupBy('fk_clasificacion');
        return view('views_admin.muestreos.create_hallazgos',compact('playas','residuos','clasificaciones','residuosAgrupados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try{
            // Validar los datos del formulario de muestreo 
            $request->validate([
                'Nmuestreo' => 'required|integer',
                'playa' => 'required|integer',
                'date' => 'required|date',
                'dia' => 'required|string',
                'zona' => 'required|string',
            ]);
            
            // Crear el registro de muestreo
            $muestreo=new muestreo();
            $muestreo->num_muestreo=$request->Nmuestreo;
            $muestreo->zona=$request->zona;
            $muestreo->dia=$request->dia;
            $muestreo->fecha=$request->date;
            $muestreo->fk_playa=$request->playa;
            $muestreo->autorizado=true;
            $muestreo->fk_capturista=Auth::user()->id;
            $carbonDate = Carbon::parse($muestreo->fecha);
            // Obtner año
            $anio = $carbonDate->year;
            $muestreo->anio=$anio;
            $muestreo->save();
            $muestreo_id=$muestreo->id_muestreo;
//Guardar los registros de los muestreos 
            $cantidades=$request->input('cantidades',[]);
            $porcentajes=$request->input('porcentajes',[]);

            //filtrar solo los valores que no sean 0

            foreach ($cantidades as $id_tipo => $cantidad) {
                if($cantidad>0){
                    $porcentaje= isset($porcentajes[$id_tipo])? $porcentajes[$id_tipo]: '0%';
                    //quitar el %
                    $porcentaje=str_replace('%','',$porcentaje);

                    //guardar en la bd
                    $hallazgo= new hallazgo();
                    $hallazgo->fk_tipo=$id_tipo;
                    $hallazgo->cantidad=$cantidad;
                    $hallazgo->porcentaje=$porcentaje;
                    $hallazgo->fk_muestreo=$muestreo_id;
                    $hallazgo->save();
                    Log::info("Registro creado", $hallazgo->toArray());

                }
            }

            
            return redirect()->route('admin.hallazgos')->with('success', 'Registro creado correctamente.');

            }catch (\Exception $e) {
                // Imprimir el error en el registro
                Log::error('Error al crear el muestreo: ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return redirect()->route('admin.hallazgos')->with('error','Ocurrió un error al guardar el registro. Por favor, inténtalo de nuevo.');
            }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(hallazgo $hallazgo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hallazgo $hallazgo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hallazgo $hallazgo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hallazgo $hallazgo)
    {
        //
    }
}
