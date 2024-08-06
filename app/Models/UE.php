<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UE extends Model
{
    use HasFactory;

    protected $table = 'ues';

    protected $fillable = [
        'libelle',
        'date_debut',
        'date_fin',
        'coef',
    ];

    // Définir la relation avec Matiere
    public function matieres()
    {
        return $this->hasMany(Matiere::class, 'ue_id');
    }
}
