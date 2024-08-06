<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::whereNull('deleted_at')->get();
        return response()->json([
            'success' => true,
            'message' => 'Étudiants récupérés avec succès',
            'data' => $students
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'matricule' => 'required|unique:students|max:255',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|unique:students',
            'adresse' => 'required|max:255',
            'telephone' => 'required|max:255',
            'photo' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Échec de la validation',
                'errors' => $validator->errors()
            ], 400);
        }

        $student = Student::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Étudiant créé avec succès',
            'data' => $student
        ], 201);
    }

    public function show(Student $student)
    {
        if ($student->deleted_at) {
            return response()->json([
                'success' => false,
                'message' => 'Étudiant non trouvé'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => "L'étudiant a été récupéré avec succès",
            'data' => $student
        ]);
    }

    public function update(Request $request, Student $student)
    {
        if ($student->deleted_at) {
            return response()->json([
                'success' => false,
                'message' => 'Étudiant non trouvé'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'matricule' => 'required|max:255|unique:students,matricule,' . $student->id,
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'adresse' => 'required|max:255',
            'telephone' => 'required|max:255',
            'photo' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Échec de la validation',
                'errors' => $validator->errors()
            ], 400);
        }

        $student->update($request->all());
        return response()->json([
            'success' => true,
            'message' => "Mise à jour réussie de l'étudiant",
            'data' => $student
        ]);
    }

    public function destroy(Student $student)
    {
        if ($student->deleted_at) {
            return response()->json([
                'success' => false,
                'message' => 'Étudiant déjà supprimé'
            ], 400);
        }

        $student->delete();
        return response()->json([
            'success' => true,
            'message' => 'Étudiant supprimé avec succès'
        ], 200);
    }

    public function restore($id)
    {
        $student = Student::onlyTrashed()->find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Étudiant non trouvé'
            ], 404);
        }

        $student->restore();
        return response()->json([
            'success' => true,
            'message' => "L'étudiant est rétabli avec succès",
            'data' => $student
        ]);
    }
}
