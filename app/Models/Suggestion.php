<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'suggestions';
    protected $fillable = ['id_patient', 'contenu', 'date_envoi'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

}
