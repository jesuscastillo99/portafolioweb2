<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    //
    public function mostrarSeguimiento()
    {
        
        return view('usuario.seguimiento');
    }
}
