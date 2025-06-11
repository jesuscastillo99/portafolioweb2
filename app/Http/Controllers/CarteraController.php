<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarteraController extends Controller
{
    //
    public function mostrarCartera()
    {
        
        return view('usuario.cartera');
    }
}
