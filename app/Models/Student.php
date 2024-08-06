<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

     // Ajouter des attributs à la date de suppression douce
     protected $dates = ['deleted_at'];

      // Relation avec le modèle Grade
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
