<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function mostrarPromocion()
    {
        
        return view('usuario.promocion');
    }
}
