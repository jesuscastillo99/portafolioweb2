<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evidencia;
class EvidenciasController extends Controller
{
    public function mostrarEvidencias($iddireccion, $idtrimestre, $idelemento)
    {
        // Buscar las evidencias que coinciden con iddireccion, idtrimestre e idelemento
        $evidencias = Evidencia::where('iddireccion', $iddireccion)
                                ->where('idtrimestre', $idtrimestre)
                                ->where('idelemento', $idelemento)
                                ->with('comentario')
                                ->with('comentario2') // Incluye la relación con comentario
                                ->get();


        // Retornar la vista con las evidencias filtradas
        return view('layouts.evidencias', compact('evidencias', 'idtrimestre', 'idelemento', 'iddireccion'));
    }

    public function mostrarChat()
    {
        
        // Retornar la vista con las evidencias filtradas
        return view('layouts.noticiasadmin');
    }

    public function mostrarEvidencias2($iddireccion, $idtrimestre, $idelemento)
    {

        $evidencias = Evidencia::where('iddireccion', $iddireccion)
                                ->where('idtrimestre', $idtrimestre)
                                ->where('idelemento', $idelemento)
                                ->with('comentario')
                                ->with('comentario2') // Incluye la relación con comentario
                                ->get();

        $evidenciasCount = $evidencias->count(); // Contar los registros obtenidos

        // Retornar la vista con las evidencias filtradas
        return view('usuario.evidenciasu', compact('evidencias', 'idtrimestre', 'idelemento', 'iddireccion', 'evidenciasCount'));
    }

    public function agregarEvidencia($iddireccion, $idtrimestre, $idelemento){

        $nuevaEvidencia = new Evidencia();
        $nuevaEvidencia->iddireccion = $iddireccion;
        $nuevaEvidencia->idtrimestre = $idtrimestre;
        $nuevaEvidencia->idelemento = $idelemento;
        $nuevaEvidencia->save();
        return redirect()->back()->with('success', 'Evidencia agregada.');
    }
}
