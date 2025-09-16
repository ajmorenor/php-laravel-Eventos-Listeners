<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }
    /**
     * Handle the incoming request.
     */
    public function register(Request $request)
    {
        try {
            // Validar los datos de registro
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            // Crear el usuario
            $user = User::create($validated);

            // Disparar el evento UserRegistered
            event(new UserRegistered($user));

            Log::info('Usuario registrado: ' . $user->email);

            return back()->with('success', 'Usuario registrado exitosamente. Se enviará un correo de bienvenida.');

        }catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Error en la validacion: ' . $e->errors());
            return back()->withErrors($e->errors())->withInput();
        }catch (\Exception $e) {
            Log::error('Error de registro: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error durante el registro. Por favor, inténtelo de nuevo.');
        }
    }
}
