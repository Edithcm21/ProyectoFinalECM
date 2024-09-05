<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\Console;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        
        //$users=User::all();
        //return view('login',compact('users'));
        return view('view_login');
        
    }

    //public function login(Request $request)
    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            $request->session()->regenerate();
            $user = Auth::user();
            //return redirect()->route('capturista');

        //Redireccionar al usuario según su rol
            if ($user->rol === 'admin') {
                Log::info('Usuario autenticado como admin.');
                return redirect()->route('admin');
            } elseif ($user->rol === 'capturista') {
                Log::info('Usuario autenticado como capturista.');
                return redirect()->route('capturista');
            }
        } else {
            // Autenticación fallida
            Log::info('Autenticación fallida para usuario: ' . $request->input('email'));
            return back()->withErrors(['email' => 'Las credenciales proporcionadas no son válidas']);
            
        } 
}



}