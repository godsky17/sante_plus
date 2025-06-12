<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'ordonnances';
    protected $fillable = ['id_consultation', 'id_patient', 'date_emission', 'contenu'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class, 'id_medecin');
    }

}
