<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    
    protected $table = 'matieres';

    protected $fillable = [
        'libelle',
        'date_debut',
        'date_fin',
        'ue_id', // Ajoutez ce champ
    ];

    // Définir la relation avec UE
    public function ue()
    {
        return $this->belongsTo(UE::class, 'ue_id');
    }

    // Relation avec le modèle Grade
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
