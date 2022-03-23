<?php

namespace App\Models;

// Implémenter interface authentifiable pour dire que la class est authentifiable
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model implements Authenticatable
{
    // Implementer les méthodes de l'interface par défaut
    use \Illuminate\Auth\Authenticatable;

    public function suivis()
    {
        // Rélation many to many 2 param = nom de rélation 3 param = Nom colonnes
        return $this->belongsToMany(Utilisateur::class, 't_suivre', 'suiveur_id', 'suivi_id');
    }
    // Avec paranthèses on obtient la rélation sur laquelle on peut éxecuter les requêtes;
    // Sans, on obtient les messages
    public function messages()
    {
        // L'user a plusieurs messages
        return $this->hasMany(Message::class)->latest();
    }

    // ! Redefinir les functions si besoin en fonction des attributs
    public function getRememberTokenName()
    {
        return '';
    }

    // Tableau avec les colonnes remplissables automatiquement
    protected $fillable = ['email', 'password'];

}
