<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    //Professeur 
    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
    // Un Etudiant
    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
    public $timestamps = false;
}
