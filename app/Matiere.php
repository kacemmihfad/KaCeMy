<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{   // Une Filiere
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
    // Plusieurs Professeurs
    public function professeurs()
    {
        return $this->hasMany(Professeur::class);
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

    // Plusieurs Notes
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public $timestamps = false;
}