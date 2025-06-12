<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'evaluations';
    protected $fillable = ['id_patient', 'cible_type', 'id_cible', 'note', 'commentaire', 'date_evaluation'];
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class, 'id_medecin');
    }

    public function hopital()
    {
        return $this->belongsTo(Hopital::class, 'id_hopital');
    }

}
