<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'utilisateurs';
    protected $fillable = [
        'nom', 'prenom', 'email', 'mot_de_passe', 'contact', 'adresse', 'genre', 'date_naissance', 'type_utilisateur'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, null, 'utilisateur_role', 'id_utilisateur', 'id_role');
    }

    public function historiqueRecherches()
    {
        return $this->hasMany(HistoriqueRecherche::class, 'id_utilisateur');
    }
}
