<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    //
    public function mostrarCatalogos()
    {
        
        return view('usuario.catalogos');
    }
}
