<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;

class InicioController extends Controller
{
    public function index(){
        return view('layouts.inicio');
    }

    public function mostrarPublicacionesRecientes()
    {
        // Obtener las 4 publicaciones más recientes
        $publicaciones = Publicacion::orderBy('fechap', 'desc')
                                    ->take(3)
                                    ->get();

        return view('layouts.inicio', compact('publicaciones'));
    }

    public function mostrarPublicacionesRecientes2()
    {
        // Obtener las 4 publicaciones más recientes
        $publicaciones = Publicacion::orderBy('fechap', 'desc')
                                    ->take(3)
                                    ->get();

        return view('usuario.inicio', compact('publicaciones'));
    }

    public function mostrarInicio()
    {
        

        return view('usuario.inicio');
    }

    
}
