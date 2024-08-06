<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;

// Route protégée pour obtenir les informations de l'utilisateur authentifié
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes pour les étudiants protégées
Route::middleware('auth:api')->group(function () {
    Route::apiResource('students', StudentController::class);
    Route::patch('students/{id}/restore', [StudentController::class, 'restore']);
});

// Routes pour les notes protégées
Route::middleware('auth:api')->group(function () {
    Route::apiResource('grades', GradeController::class);
});

// Routes pour l'authentification
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');

