<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobremiController extends Controller
{
    public function mostrarSobremi()
    {
        
        return view('usuario.sobremi');
    }
}
