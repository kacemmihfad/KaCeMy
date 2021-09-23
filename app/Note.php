<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // Une Matiere
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    // Un Etudiant
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    //Annee Scolaire
    public function anneeScolaire()
    {
        return $this->belongsTo(anneeScolaire::class);
    }
    public $timestamps = false;
}