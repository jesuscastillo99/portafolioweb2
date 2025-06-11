<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    
    public function mostrarConsultas()
    {
        
        return view('usuario.consultas');
    }
}
