<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeDomicile extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'demandes_domicile';
    protected $fillable = [
        'id_patient', 'id_medecin', 'adresse', 'statut', 'date_demande', 'date_intervention'
    ];
}
