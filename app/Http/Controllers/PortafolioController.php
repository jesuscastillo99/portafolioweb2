<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    //
    public function mostrarPortafolio()
    {
        
        return view('usuario.portafolio');
    }
}
