<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function formularioLogin() {
        if(Auth::check()) {
            return redirect()->route('backoffice.dashboard');
        }

        return view('usuario.login');
    }

    public function formularioNuevo() {
        if(Auth::check()) {
            return redirect()->route('backoffice.dashboard');
        }

        return view('usuario.create');
    }

    public function login(Request $_request) {
        $mensajes = [
            'correo.required' => 'El email es obligatorio',
            'correo.email' => 'El email no tiene un formato válido',
            'password.required' => 'La contraseña es obligatoria' 
        ];

        $_request->validate([
            'correo' => 'required|email',
            'password' => 'required'
        ], $mensajes);

        $credenciales = $_request->only(['password', 'correo']);

        if (Auth::attempt($credenciales)) {
            // Verifica el usuario activo
            $user = Auth::user();

            if (!$user->activo) {
                Auth::logout();
                return redirect()->route('usuario.login')->withErrors(['message' => 'El usuario se encuentra desactivado']);
            }

            // Autenticación exitosa
            $_request->session()->regenerate();
            return redirect()->route('backoffice.dashboard');
        }
    }

    public function logout(Request $_request) {
        Auth::logout();
        $_request->session()->invalidate();
        $_request->session()->regenerateToken();
        return redirect()->route('usuario.login');
    }

    public function registrar(Request $_request) {
        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio',
            'correo.required' => 'El correo es obligatorio',
            'correo.email'    => 'El correo no tiene un formato válido',
            'password.required' => 'La contraseña es obligatoria',
            'rePassword.required' => 'Repetir la contraseña es obligatorio',
            'dayCode.required' => 'El código del día es obligatorio',
        ];

        $_request->validate([
            'nombre' => 'required|string|max:50',
            'correo' => 'required|email',
            'password' => 'required',
            'rePassword' => 'required',
            'dayCode' => 'required',
        ], $mensajes);

        $datos = $_request->only('nombre', 'correo', 'password', 'rePassword', 'dayCode');

        if($datos['password'] != $datos['rePassword']) {
            return back()->withErrors(['message' => 'Las contraseñas ingresadas no son iguales']);
        }

        // Código del día 
        date_default_timezone_set('UTC');

        if($datos['dayCode'] != date("d")) {
            return back()->withErrors(['message' => 'El código del día no es válido']);
        }

        try {
            User::create([
                'nombre' => $datos['nombre'],
                'correo' => $datos['correo'],
                'password' => $datos['password'],
            ]);

            return redirect()->route('usuario.login')->with('success', 'Usuario creado exitosamente :)');
        } catch (Exception $e) {
            return back()->withErrors(['message' => 'Error ' . $e->getMessage()]);
        }
    }
}
