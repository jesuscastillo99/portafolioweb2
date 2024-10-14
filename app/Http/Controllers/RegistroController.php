<?php
namespace App\Http\Controllers;
use App\Models\Usuario; 
use App\Models\Persona;
use App\Models\Expediente;
use App\Models\Domicilio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ActivationMail;
use GuzzleHttp\Client;
use SimpleXMLElement;
use Illuminate\Support\Carbon;



class RegistroController extends Controller
{


    public function registro(Request $request)
    {
        //Solicitud al webservice
        $client = new Client();
        $correoValor = $request->correo;
        
        // Validación de datos del formulario
        $request->validate([
            'correo' => 'required|email|unique:usuarios,correo',
            'contraseña' => 'required|min:8',
        ]);

        // Generación del token
        $activationToken = Str::random(49);
        //PROCEDIMIENTO SQL SERVER INSERTAR SOLICITANTE

        $nombreProcedimiento1= 'insertarUsuario';
        $correo= $request->correo;
        $contraseña= $request->contraseña;
        $act_token = $activationToken; // Genera un token de activación
        $arraySolicitante = [$correo, $contraseña, $act_token];
        $procedimiento = new ContadorParametros();
        $resultados= $procedimiento->proceStatement($nombreProcedimiento1, $arraySolicitante);
        //dd($resultados[0]);
        // Verificar si se obtuvieron resultados para almacenar el id y la localidad de la personna (papá)
        // if (!empty($resultados)) {
        //     $correoUsuario = $resultados[0]->correo;
            
            
        // } else {
        //     // Si no se obtienen resultados
        //     return redirect()->route('login');
        // }


        /* codigo USANDO ELOQUENT */
        // // Crea una nueva instancia del modelo Usuario
        $nuevoUsuario = new Usuario;
        // $nuevoUsuario->curp = $xml->curp;
        // $nuevoUsuario->correo = $request->correo;
        // $nuevoUsuario->activo = 0; // Establece 'activo' en 0 (inactivo) por defecto
        // $nuevoUsuario->act_token = $activationToken; // Genera un token de activación
        // $nuevoUsuario->save();

        // //Generar el mismo idpersona para las demás tablas
        // $nuevoId=$nuevoUsuario->idlog;

        // // Crea una nueva instancia del modelo Persona
        // $nuevaPersona = new Persona;
        // $nuevaPersona->rfc = '';
        // $nuevaPersona->curp = $xml->curp;
        // $nuevaPersona->correo = $request->correo;
        // $nuevaPersona->paterno = $xml->paterno;
        // $nuevaPersona->materno = $xml->materno;
        // $nuevaPersona->nombre = $xml->nombre;
        // if ($xml->sexo == 'H') {
        //     $nuevaPersona->sexo = 1; // Hombre
        // } elseif ($xml->sexo == 'M') {
        //     $nuevaPersona->sexo = 0; // Mujer
        // }
        // $nuevaPersona->fechanac = Carbon::createFromFormat('d/m/Y', $xml->fn)->toDateString();
        // $nuevaPersona->locnac = '';
        // $nuevaPersona->fechaRegistro = Carbon::now();
        // $nuevaPersona->estadoCivil = '';
        // $nuevaPersona->save();

        // //Creando instancia del modelo Expediente
        // $nuevoExpediente = new Expediente;
        // $nuevoExpediente->idsolicitante = $nuevoId;
        // $nuevoExpediente->fecha = Carbon::now();
        // $nuevoExpediente->save();

        // Envía el correo de activación
        //Mail::to($correo)->send(new ActivationMail($nuevoUsuario, $activationToken));

        return redirect()->route('exito');
            
        
    }

}
