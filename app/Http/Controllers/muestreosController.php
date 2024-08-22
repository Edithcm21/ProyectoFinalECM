<?php

namespace App\Http\Controllers;

use App\Models\muestreo;
use App\Models\Playa;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class muestreosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // $muestreos=muestreo::all();
    //     // return view('views_admin.muestreos.index',compact('muestreos'));
        
    // }
    public function index(Request $request)
    {
        $playaId = $request->input('playa');
        
        $query = Muestreo::query();
    
        if ($playaId) {
            $query->where('fk_playa', $playaId);
        }
        $muestreos = $query->get();
        $playas = Playa::all();
    
        return view('views_admin.muestreos.view_muestreo', compact('muestreos', 'playas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(muestreo $muestreo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(muestreo $muestreo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, muestreo $muestreo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(muestreo $muestreo)
    {
        //
    }
}
