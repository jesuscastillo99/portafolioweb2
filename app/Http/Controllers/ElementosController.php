<?php

namespace App\Http\Controllers;
use App\Models\Elemento;
use App\Models\Direccion;
use App\Models\Evidencia;
use App\Models\ElementoDireccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElementosController extends Controller
{
    public function index()
    {
        $elementos = DB::table('elemento')
        ->select('idelemento', 'numelemento')
        ->get();

        // Obtener las direcciones para cada elemento
        $elementosConDirecciones = $elementos->map(function ($elemento) {
            $direcciones = DB::table('elemento_direccion')
                ->join('direccion', 'elemento_direccion.iddireccion', '=', 'direccion.iddireccion')
                ->where('elemento_direccion.idelemento', $elemento->idelemento)
                ->select('direccion.iddireccion', 'direccion.nombredire')
                ->get();

            $elemento->direcciones = $direcciones;
            return $elemento;
        });

        return view('layouts.elementos', [
            'elementos' => $elementosConDirecciones
        ]);
    }

    public function indexAsignarElemento($numelemento)
    {
        $direcciones = Direccion::all();
        return view('layouts.asignarelemento', [
            'numelemento' => $numelemento,
            'direcciones' => $direcciones
        ]);
    }
    
    public function asignarElemento(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'numelemento' => 'required|string',
            'direccion' => 'required|integer',
        ]);

        // Buscar el elemento en la tabla 'elemento'
        $elemento = Elemento::where('numelemento', $request->input('numelemento'))->first();

        if ($elemento) {
            // Buscar si ya existe un registro en 'elemento_direccion' para el elemento con esa dirección
            $elementoDireccion = ElementoDireccion::where('idelemento', $elemento->idelemento)
                                                ->where('iddireccion', $request->input('direccion'))
                                                ->first();

            if ($elementoDireccion) {
                // Si ya existe una relación con la misma dirección, puedes actualizar otros campos si los hay
                // Aquí solo se da un mensaje de éxito porque la combinación ya existe
                return redirect()->back()->with('success', 'El elemento ya está asignado a esta dirección.');
            } else {
                // Si no existe, crear un nuevo registro o actualizar uno existente
                ElementoDireccion::updateOrCreate(
                    ['idelemento' => $elemento->idelemento], // Condición de búsqueda
                    ['iddireccion' => $request->input('direccion')] // Valores para actualizar o crear
                );

                return redirect()->back()->with('success', 'Elemento asignado o actualizado exitosamente.');
            }
        } else {
            return redirect()->back()->with('error', 'Elemento no encontrado.');
        }
    }

  
   // Método para mostrar los elementos
   public function mostrarElementos($iddireccion, $idtrimestre)
   {
       // Obtener los elementos por iddireccion
       $elementos = Elemento::whereIn('idelemento', function($query) use ($iddireccion) {
           $query->select('idelemento')
               ->from('elemento_direccion')
               ->where('iddireccion', $iddireccion);
       })->get();
   
       // Verificar el estado de las evidencias para cada elemento
       foreach ($elementos as $elemento) {
           $evidencias = Evidencia::where('idelemento', $elemento->idelemento)
               ->where('iddireccion', $iddireccion)
               ->where('idtrimestre', $idtrimestre)
               ->get();
   
           // Verificar si hay evidencias y si todas tienen estadoap igual a 1
           $todasEstadoapUno = $evidencias->isNotEmpty() && $evidencias->every(function($evidencia) {
               return $evidencia->estadoap == 3;
           });
   
           // Añadir un atributo a cada elemento para la vista
           $elemento->isGreen = $todasEstadoapUno;
       }
   
       return view('layouts.elementos2', compact('elementos', 'iddireccion', 'idtrimestre'));
   }
   
//------------FUNCIONES PARA USUARIO-----------

public function index2()
    {
        $elementos = DB::table('elemento')
        ->select('idelemento', 'numelemento')
        ->get();

        // Obtener las direcciones para cada elemento
        $elementosConDirecciones = $elementos->map(function ($elemento) {
            $direcciones = DB::table('elemento_direccion')
                ->join('direccion', 'elemento_direccion.iddireccion', '=', 'direccion.iddireccion')
                ->where('elemento_direccion.idelemento', $elemento->idelemento)
                ->select('direccion.iddireccion', 'direccion.nombredire')
                ->get();

   

        $elemento->direcciones = $direcciones;
        return $elemento;
        });

        return view('usuario.elementos2', [
            'elementos' => $elementosConDirecciones
        ]);
    }

    public function indexAsignarElemento2($numelemento)
    {
        $direcciones = Direccion::all();
        return view('usuario.asignarelemento', [
            'numelemento' => $numelemento,
            'direcciones' => $direcciones
        ]);
    }


 // Método para mostrar los elementos
 public function mostrarElementos2($iddireccion, $idtrimestre)
 {
    
     // Obtener los elementos por iddireccion
     $elementos = Elemento::whereIn('idelemento', function($query) use ($iddireccion) {
         $query->select('idelemento')
             ->from('elemento_direccion')
             ->where('iddireccion', $iddireccion);
     })->get();
 
     // Verificar el estado de las evidencias para cada elemento
     foreach ($elementos as $elemento) {
         $evidencias = Evidencia::where('idelemento', $elemento->idelemento)
             ->where('iddireccion', $iddireccion)
             ->where('idtrimestre', $idtrimestre)
             ->get();
 
         // Verificar si hay evidencias y si todas tienen estadoap igual a 1
         $todasEstadoapUno = $evidencias->isNotEmpty() && $evidencias->every(function($evidencia) {
             return $evidencia->estadoap == 3;
         });
 
         // Añadir un atributo a cada elemento para la vista
         $elemento->isGreen = $todasEstadoapUno;
     }
     
     return view('usuario.elementos2', compact('elementos', 'iddireccion', 'idtrimestre'));
 }


}
