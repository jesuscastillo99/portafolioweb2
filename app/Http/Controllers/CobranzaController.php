<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobranzaController extends Controller
{
    public function mostrarCobranza()
    {
        
        return view('usuario.cobranza');
    }
}
