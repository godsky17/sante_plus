<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'factures';
    protected $fillable = [
        'id_utilisateur', 'type_facturation', 'montant', 'statut', 'date_emission', 'moyen_paiement'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

}
