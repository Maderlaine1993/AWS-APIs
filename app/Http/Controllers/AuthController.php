<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ],
            [
                'name.required' => 'Es requerido el campo nombre  .',
                'email.required' => 'Es requerido el campo correo electrónico.',
                'email.email' => 'El correo electrónico tiene que ser una dirección de correo válida.',
                'email.unique' => 'Ya hay un usuario con el mismo correo electrónico.',
                'password.required' => 'Es requerido el campo contraseña.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'No se pudo registrar el ususario, verifiquepor favor los datos', 'errors' => $validator->errors()], 400);
        }

        $user = new \App\Models\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['message' => 'Registrado de Usuario con exito'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['message' => 'Login Aprobado, accedimos!', 'token' => $token], 200);
        } else {
            return response()->json(['message' => 'Error en registro, Verificar los campos por favor contraseña/correo'], 401);
        }
    }
}
