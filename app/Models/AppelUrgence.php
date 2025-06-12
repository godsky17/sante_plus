<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppelUrgence extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'appels_urgence';

    protected $fillable = [
        'id_hopital',
        'localisation_appel',
        'statut', // en_attente, en_cours, transmis, terminé
        'rapport',
        'created_at',
        'updated_at'
    ];

    public function hopital()
    {
        return $this->belongsTo(Hopital::class, 'id_hopital');
    }
}
