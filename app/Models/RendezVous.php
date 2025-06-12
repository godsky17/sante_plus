<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'rendez_vous';
    protected $fillable = [
        'id_patient', 'id_medecin', 'type_rdv', 'date_heure', 'statut', 'motif', 'lieu', 'est_teleconsultation'
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
