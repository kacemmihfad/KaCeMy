<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }

    public function professeurs()
    {
        return $this->hasMany(Professeur::class);
    }

    public function administrations()
    {
        return $this->hasMany(Administration::class);
    } 
    public $timestamps = false;
}