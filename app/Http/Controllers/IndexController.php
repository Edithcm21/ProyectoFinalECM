<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Index;
use App\Models\Municipio; // Importa el modelo Municipio
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $estados = Estado::all();
        return view('welcome', compact('estados'));
   
    }

   
}
