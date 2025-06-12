<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DossierMedical extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'dossiers_medicaux';
    protected $fillable = ['id_patient', 'date_creation'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function documents()
{
    return $this->hasMany(DocumentMedical::class, 'id_dossier');
}


}
