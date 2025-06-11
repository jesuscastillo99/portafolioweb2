<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;

class InicioController extends Controller
{
    public function index(){
        return view('layouts.inicio');
    }

    

    public function mostrarInicio()
    {
        

        return view('usuario.inicio');
    }

    
}
