<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    // Tableau avec les colonnes remplissables automatiquement
    protected $fillable = ['email', 'password'];
}
