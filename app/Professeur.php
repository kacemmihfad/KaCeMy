<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    // Plusieurs Matieres
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    // Plusieurs Emplois
    public function emploi()
    {
        return $this->belongsTo(Emploi::class);
    }

    // Plusieurs Absences
    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    // Plusieurs Remarques
    public function remarques()
    {
        return $this->hasMany(Remarque::class);
    }

    // Plusieurs Devoirs
    public function devoirs()
    {
        return $this->hasMany(Devoir::class);
    }

    // Un Utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    public $timestamps = false;
}