<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anneeScolaire extends Model
{
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public $timestamps = false;
}