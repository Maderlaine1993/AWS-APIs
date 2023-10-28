<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registrar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5',
        ],
            [
                'name.required' => 'El nombre es requerido',
                'email.required' => 'El correo electrónico es requerido.',
                'email.email' => 'Dirección invalida de correo electrónico.',
                'email.unique' => 'Usuario ya registrado.',
                'password.required' => 'La contraseña es requerido.',
                'password.min' => 'La contraseña debe tener al menos 5 caracteres.',
            ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Registro Incorrecto, favor verifique nuevamente', 'errors' => $validator->errors()], 400);
        }

        $user = new \App\Models\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['message' => 'Usuario Registrado'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['message' => 'Login Exitoso, Bienvenido', 'token' => $token], 200);
        } else {
            return response()->json(['message' => 'Error, Verificar contraseña/correo'], 401);
        }
    }
}