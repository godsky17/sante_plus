<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'notes';

    protected $fillable = [
        'id_patient',
        'id_medecin',    // peut être null
        'id_hopital',    // peut être null
        'note',
        'commentaire',
        'cible', // 'medecin', 'hopital', 'app'
        'created_at',
        'updated_at'
    ];

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
