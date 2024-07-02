<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // attemp() Verifica que las credenciales ingresadas coincidan con la base de datos
        // Devuelve un booleano.

        // Login Failed:
        // Para indicar que recuerde la sesión se puede pasar un segundo parámetro booleano.
        // En este caso se pasa la request del campo 'remember'
        if( !Auth::attempt($credentials, $request->boolean('remember')) ) {
            throw ValidationException::withMessages([
                'session' => __('auth.failed'),
            ]);
        }

        // Login Success:
        $request->session()->regenerate();
        return redirect()->intended()->with('success', 'Ingreso Correctamente');
    }


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('success', 'Hasta pronto 👋🏻');
    }
}
