<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Récupérer l'utilisateur authentifié
        $user = JWTAuth::parseToken()->authenticate();

        // Retourner le token ainsi que les informations de l'utilisateur
        return response()->json([
            'token' => $token,
            'user' => [
                'name' => $user->name,
                'prenom' => $user->prenom,
                'email' => $user->email,
            ]
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Déconnexion réussie']);
    }
}
