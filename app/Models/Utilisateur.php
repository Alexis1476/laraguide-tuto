<?php

namespace App\Models;

// Implémenter interface authentifiable
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model implements Authenticatable
{
    // Implementer les méthodes de l'interface par défaut
    use \Illuminate\Auth\Authenticatable;

    // ! Redefinir les functions si besoin en fonction des attributs

    // Tableau avec les colonnes remplissables automatiquement
    protected $fillable = ['email', 'password'];

}
