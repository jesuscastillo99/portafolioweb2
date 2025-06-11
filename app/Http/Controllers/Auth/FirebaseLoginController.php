<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected FirebaseService $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function showLoginForm()
    {
        return view('login'); // Tu vista con los inputs "correo" y "contraseña"
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contraseña' => 'required'
        ]);

        try {
            $user = $this->firebase->signIn($request->correo, $request->contraseña);

            // Guardamos info en sesión si quieres
            Session::put('user', [
                'uid' => $user->firebaseUserId(),
                'email' => $user->data()['email'],
            ]);

            return redirect()->route('inicio'); // o a donde quieras

        } catch (\Throwable $e) {
            return back()->withErrors(['login' => 'Correo o contraseña incorrectos']);
        }
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }
}

