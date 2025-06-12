<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriqueRecherche extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'historiques_recherches';
    protected $fillable = ['id_patient', 'type_recherche', 'terme', 'date_recherche'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

}
