<?php

namespace App\Http\Controllers;
use App\Mail\ActivationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;


class PublicacionController extends Controller
{

    // Mostrar todas las publicaciones, manejar creación y edición
    public function index(Request $request)
    {
       // Obtener solo 2 publicaciones ordenadas por fecha (más reciente primero)
        $publicaciones = Publicacion::orderBy('fechap', 'desc')->take(3)->get();

        // Variable para almacenar la publicación específica si se proporciona en el request
        $publicacion = null;

        // Si el request contiene la publicación, buscarla por su ID
        if ($request->has('publicacion')) {
            $publicacion = Publicacion::find($request->input('publicacion'));
        }

        // Retornar la vista con ambas variables
        return view('layouts.publicaciones', compact('publicaciones', 'publicacion'));
    }

    // Almacenar una nueva publicación
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'titulo' => 'required|string|max:255',
            'cuerpo' => 'required|string',
            'archivo' => 'nullable|image|max:2048', // Imagen opcional
            'enlace' => 'nullable|url',
            'fechap' => 'required|date',
            'año' => 'required|integer',
        ]);

        // Manejar la subida de la imagen si existe
        $archivoPath = null;
        if ($request->hasFile('archivo')) {
            $archivoPath = $request->file('archivo')->store('publicaciones', 'public');
            // Obtener el nombre del archivo
            $archivoName = basename($archivoPath);

            // Definir la ruta pública
            $publicPath = public_path('storage/publicaciones/' . $archivoName);

            // Copiar el archivo al directorio público
            copy(storage_path('app/public/publicaciones/' . $archivoName), $publicPath);
        }

        // Crear la nueva publicación
        $publicacion = Publicacion::create([
            'titulo' => $request->titulo,
            'cuerpo' => $request->cuerpo,
            'archivo' => $archivoPath,
            'enlace' => $request->enlace,
            'fechap' => $request->fechap,
            'año' => $request->año,
        ]);

        // Enviar correo a todos los usuarios
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        foreach ($usuarios as $usuario) {
            Mail::to($usuario->correo)->send(new ActivationMail($publicacion->titulo, $publicacion->cuerpo, $publicacion->enlace));
        }

        return redirect()->route('publicaciones.index')->with('success', 'Publicación creada exitosamente');
    }

    // Actualizar una publicación existente
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'titulo' => 'required|string|max:255',
            'cuerpo' => 'required|string',
            'archivo' => 'nullable|image|max:2048', 
            'enlace' => 'nullable|url',
            'fechap' => 'required|date',
            'año' => 'required|integer',
        ]);

        // Buscar la publicación y actualizarla
        $publicacion = Publicacion::findOrFail($id);

        // Manejar la subida de la imagen si existe
        if ($request->hasFile('archivo')) {
            $archivoPath = $request->file('archivo')->store('publicaciones', 'public');
            $publicacion->archivo = $archivoPath;
            // Obtener el nombre del archivo
            $archivoName = basename($archivoPath);

            // Definir la ruta pública
            $publicPath = public_path('storage/publicaciones/' . $archivoName);

            // Copiar el archivo al directorio público
            copy(storage_path('app/public/publicaciones/' . $archivoName), $publicPath);
        }

        $publicacion->update([
            'titulo' => $request->titulo,
            'cuerpo' => $request->cuerpo,
            'enlace' => $request->enlace,
            'fechap' => $request->fechap,
            'año' => $request->año,
        ]);

        return redirect()->route('publicaciones.index')->with('success', 'Publicación actualizada exitosamente');
    }

    // Eliminar una publicación
    public function destroy($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        $publicacion->delete();

        return redirect()->route('publicaciones.index')->with('success', 'Publicación eliminada exitosamente');
    }

    //Mostrar todas las publicaciones
    public function mostrarTodasPublicaciones(Request $request)
    {
       // Obtener todas las publicaciones ordenadas por fecha (más reciente primero)
       $publicaciones = Publicacion::orderBy('fechap', 'desc')->get();

       // Variable para almacenar la publicación específica si se proporciona en el request
       $publicacion = null;

       // Si el request contiene la publicación, buscarla por su ID
       if ($request->has('publicacion')) {
           $publicacion = Publicacion::find($request->input('publicacion'));
       }

       // Retornar la vista con ambas variables
       return view('layouts.mostrarpublis', compact('publicaciones', 'publicacion'));
    }
}
