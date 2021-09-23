<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    public function professeurs()
    {
        return $this->hasMany(Professeur::class);
    }

    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
    public $timestamps = false;
}