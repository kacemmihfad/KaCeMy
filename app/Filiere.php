<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{   
    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }
    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
    public $timestamps = false;
}