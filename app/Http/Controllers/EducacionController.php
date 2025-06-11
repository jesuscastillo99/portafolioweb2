<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducacionController extends Controller
{
    //
    public function mostrarEducacion()
    {
        
        return view('usuario.educacion');
    }
}
