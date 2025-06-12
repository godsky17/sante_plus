<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'analyses';
    protected $fillable = [
        'id_patient', 
        'id_medecin', 
        'type_analyse', 
        'statut_analyse', 
        'date_demande', 
        'date_resultat', 
        'fichier_resultat'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class, 'id_medecin');
    }

}
