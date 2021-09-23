<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    // Un Utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    public $timestamps = false;
}