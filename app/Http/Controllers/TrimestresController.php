<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Elemento;
use App\Models\Direccion;
use App\Models\Trimestre;

class TrimestresController extends Controller
{
    // MOSTRAR ELEMENTOS POR DIRECCION
    public function index($iddireccion)
    {
       // Obtener todas las direcciones
        $trimestres = Trimestre::all();

        // Retornar las trimestres a la vista (o realizar otra operación según sea necesario)
        return view('layouts.trimestres', compact('iddireccion','trimestres'));
    }

    public function index2()
    {
        // Obtener el usuario autenticado
        $usuario = Auth::user();

        // Obtener la iddireccion del usuario autenticado
        $iddireccion = $usuario->iddireccion;

        // Obtener todas las direcciones
        $trimestres = Trimestre::all();
        //dd($iddireccion);
        // Retornar los trimestres filtrados a la vista
        return view('usuario.trimestreu', compact('iddireccion', 'trimestres'));
    }
}
