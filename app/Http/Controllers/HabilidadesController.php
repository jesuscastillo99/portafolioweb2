<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HabilidadesController extends Controller
{
    //
    public function mostrarHabilidades()
    {
        
        return view('usuario.habilidades');
    }
}
