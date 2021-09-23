<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
     // Un Groupe
     public function groupe()
     {
         return $this->belongsTo(Groupe::class);
     }
 
     // Plusieurs Remarques
     public function remarques()
     {
         return $this->hasMany(Remarque::class);
     }
 
     // Plusieurs Notes
     public function notes()
     {
         return $this->hasMany(Note::class);
     }
  
     // Un Utilisateur
     public function utilisateur()
     {
         return $this->belongsTo(Utilisateur::class);
     }
     public $timestamps = false;
}
