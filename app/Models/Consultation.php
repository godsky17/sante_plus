<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'consultations';
    protected $fillable = [
        'id_rdv', 
        'id_medecin', 
        'observations', 
        'note_medecin', 
        'compte_rendu', 
        'statut'
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
