<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evidencia;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    //FUNCION PARA GUARDAR COMENTARIO DEL ADMIN Y ESTADO DE APROBACION

    public function storeOrUpdate(Request $request, $id)
    {
        $fechahoy=now()->toDateString();
        // Busca la evidencia
        $evidencia = Evidencia::findOrFail($id);
        $idcomenadmin = $evidencia->comenadmin;
        // Verifica si ya existe un comentario para esta evidencia
        $comentario = Comentario::where('idcomentario', $idcomenadmin)->first();

        // Guardar input del estadoap
        $estadoap=$request->input('estadoap');

        if ($comentario) {
            // Actualiza el comentario existente
            $comentario->comentario = $request->input('comentario');
            // Actualiza la fecha
            $comentario->fecha = $fechahoy;
            $comentario->save();
            $evidencia->estadoap = $estadoap;
            $evidencia->save(); 
            return redirect()->back()->with('success', 'Comentario actualizado con éxito.');
        } else {
            // Crea un nuevo comentario
            $comentarionuevo=Comentario::create([
                'idevidencia' => $evidencia->idevidencia,
                'comentario' => $request->input('comentario'),
                'fecha' => $fechahoy,
                'tipocom' => 1,
            ]);
            // Actualiza el campo comenadmin en la evidencia con el ID del comentario creado
            $evidencia->comenadmin = $comentarionuevo->idcomentario;
            $evidencia->estadoap = $estadoap;
            $evidencia->save();
            return redirect()->back()->with('success', 'Comentario agregado con éxito.');  
        }

    }

    //FUNCION PARA GUARDAR COMENTARIO DEL USUARIO Y SU ARCHIVO DE EVIDENCIA

    public function storeOrUpdate2(Request $request, $id)
    {
        $fechahoy=now()->toDateString();
        $year=now()->format('Y');
        $request->validate([
            'comentario' => 'required|string|max:200',
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:10048', // Validación del archivo
        ]);
        // Busca la evidencia
        $evidencia = Evidencia::findOrFail($id);
        
        $idcomenusuario = $evidencia->comenusuario;

        // Verifica si ya existe un comentario para esta evidencia
        $comentario = Comentario::where('idcomentario', $idcomenusuario)->first();

        // Guardar el archivo
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = $archivo->getClientOriginalName();
            $rutaDestino = public_path('evidencias'); // Ruta de la carpeta 'evidencias' en la raíz del proyecto
            $archivo->move($rutaDestino, $nombreArchivo); // Mueve el archivo a la carpeta
            if ($comentario) {
                // Actualiza el comentario existente
                $comentario->comentario = $request->input('comentario');
                // Actualiza la fecha del comentario
                $comentario->fechasubida = $fechahoy;
                $comentario->save();
                //Actualiza el nombre del archivo subido
                $evidencia->archivoe = $nombreArchivo;
                //Actualiza la fecha de la evidencia
                $evidencia->fechasubida = $fechahoy;
                $evidencia->año = $year;
                $evidencia->save();
                return redirect()->back()->with('success', 'Comentario actualizado con éxito.');
            } else {
                // Crea un nuevo comentario
                $comentarionuevo=Comentario::create([
                    'idevidencia' => $evidencia->idevidencia,
                    'comentario' => $request->input('comentario'),
                    'fecha' => $fechahoy,
                    'tipocom' => 2,
                ]);
                // Actualiza el campo comenadmin en la evidencia con el ID del comentario creado
                $evidencia->comenusuario = $comentarionuevo->idcomentario;
                $evidencia->archivoe = $nombreArchivo;
                //Actualiza la fecha de la evidencia
                $evidencia->fechasubida = $fechahoy;
                $evidencia->año = $year;
                $evidencia->save();
                return redirect()->back()->with('success', 'Comentario agregado con éxito.');
            }
            
        }  else {
            return back()->withErrors(['error' => 'No se ha subido ningún archivo']);
        }
          
        
    }    

}
