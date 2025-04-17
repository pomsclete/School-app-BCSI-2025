<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    // Autorisation des colonne pour un enregistrement en masse
    //protected $fillable = ['nomComplet','telephone','matiere'];

    // Colonne n'autorisant pas un enregistrement en masse
    protected $guarded = ['id'];
}
