<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'matiere_id',
        'value',
    ];

    // Relation avec le modèle Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Relation avec le modèle Matiere
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
