<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Les informations d\'authentification sont incorrectes.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(compact('token'));
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Déconnexion réussie']);
    }

    // Méthode pour gérer les exceptions d'authentification
    public function renderException($request, \Throwable $exception)
    {
        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Vous devez être connecté pour accéder à cette ressource.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'error' => 'Erreur',
            'message' => 'Une erreur s\'est produite.'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
