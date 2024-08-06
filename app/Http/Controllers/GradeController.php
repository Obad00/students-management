<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with(['student', 'matiere'])->get();
        return response()->json([
            'success' => true,
            'message' => 'Notes récupérées avec succès',
            'data' => $grades
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|exists:students,id',
            'matiere_id' => 'required|exists:matieres,id',
            'value' => 'required|numeric|min:0|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Échec de la validation',
                'errors' => $validator->errors()
            ], 400);
        }

        $grade = Grade::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Note créé avec succès',
            'data' => $grade
        ], 201);
    }

    public function show(Grade $grade)
    {
        return response()->json([
            'success' => true,
            'message' => 'Note récupérée avec succès',
            'data' => $grade
        ]);
    }

    public function update(Request $request, Grade $grade)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|exists:students,id',
            'matiere_id' => 'required|exists:matieres,id',
            'value' => 'required|numeric|min:0|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Échec de la validation',
                'errors' => $validator->errors()
            ], 400);
        }

        $grade->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Mise à jour réussie de la notey',
            'data' => $grade
        ]);
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return response()->json([
            'success' => true,
            'message' => 'Note supprimée avec succès'
        ], 200);
    }
}
