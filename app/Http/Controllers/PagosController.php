<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagosController extends Controller
{
    //
    public function mostrarPagos()
    {
        
        return view('usuario.pagos');
    }
}
