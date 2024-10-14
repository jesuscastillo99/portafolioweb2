<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;
use Illuminate\Support\Facades\DB;
class DireccionesController extends Controller
{
    public function index(Request $request)
    {
       // Obtener todas las direcciones
        $direcciones = Direccion::all();

        // Retornar las direcciones a la vista (o realizar otra operación según sea necesario)
        return view('layouts.direcciones', compact('direcciones'));
    }
}
