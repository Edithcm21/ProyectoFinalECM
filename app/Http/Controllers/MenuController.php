<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('views_admin.admin');
         
    }
}
