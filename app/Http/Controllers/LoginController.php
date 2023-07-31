<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        try {
            //Destructura los datos
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);
            if (Auth::attempt($credentials)) {
                //Creara un token basado en el id del usuario y lo mostrara
                $token = Auth::user()->createToken(Auth::id())->plainTextToken;

                return response()->json([
                    'token' => $token
                ]);
            } else {
                return response(["mensaje" => "Credenciales no validas"], Response::HTTP_UNAUTHORIZED);
            }
        } catch (\Exception $e) {
            // Manejador de errores
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
