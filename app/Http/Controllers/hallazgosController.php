<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use App\Models\hallazgo;
use App\Models\Playa;
use App\Models\residuo;
use App\Models\tipo_residuo;
use Illuminate\Http\Request;

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
        //
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
