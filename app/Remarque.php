<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remarque extends Model
{
    // Une Matiere
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    // Un Eleve
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    // Un Professeur
    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
    public $timestamps = false;
}