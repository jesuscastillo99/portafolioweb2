<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContratosController extends Controller
{
    //
    public function mostrarContratos()
    {
        
        return view('usuario.contratos');
    }
}
