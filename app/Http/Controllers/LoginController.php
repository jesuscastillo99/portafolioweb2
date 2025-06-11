<?php
namespace App\Http\Controllers;
use App\resources\views\auth\login;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;
use RealRashid\SweetAlert\Facades\Alert;
class LoginController extends Controller
{
    //protected $redirectTo = 'inicio';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        // Validación de los campos 'correo' y 'contraseña'
        $request->validate([
            'correo' => 'required',
            'contra' => 'required',
        ]);

        // Obtener el usuario por 'correo' y 'contraseña'
        $usuario = Usuario::where('correo', $request->correo)
            ->where('contra', $request->contra)
            ->first();
        
        // Verificar si el usuario fue encontrado
        if (!$usuario) {
            return back()->withErrors(['error' => 'El nombre y la contraseña no coinciden.']);
        }

        // Autenticar al usuario manualmente
        Auth::login($usuario);
        alert()
            ->success('Inicio de sesión exitosa', 'Bienvenido al sistema')
            ->showConfirmButton('Comenzar', '#3085d6');
            return redirect()->route('inicio');
        // Verificar el rol del usuario y redirigir a la ruta correspondiente
        // if ($usuario->role == 1) {
        //     // Redirigir al administrador
        //     alert()
        //     ->success('Inicio de sesión exitosa', 'Bienvenido al sistema ADMINISTRADOR')
        //     ->showConfirmButton('Comenzar', '#3085d6');
        //     return redirect()->route('inicioadmin');
        // } else {
        //     // Redirigir al usuario común
        //     alert()
        //     ->success('Inicio de sesión exitosa', 'Bienvenido al sistema USUARIO')
        //     ->showConfirmButton('Comenzar', '#3085d6');
        //     return redirect()->route('iniciou');
        // }
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario
        $request->session()->invalidate(); // Invalida la sesión
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/login'); // Redirige al usuario a la página deseada después de cerrar sesión
    }
    
}
