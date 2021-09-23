<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
    public $timestamps = false;
}