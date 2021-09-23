<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
     // Une Filiere
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
    // emplois
    public function emploi()
    {
        return $this->belongsTo(Emploi::class);
    }

    // Plusieurs Etudiants
    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }

    // Plusieurs Devoirs
    public function devoirs()
    {
        return $this->hasMany(Devoir::class);
    }
    public $timestamps = false;
}