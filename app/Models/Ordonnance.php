<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Ordonnance extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'ordonances';

    protected $fillable = [
        'id_medecin',
        'id_patient',
        'id_consultation',
        'medicaments',
        'instructions',
        'date_edition'
    ];

    protected $casts = [
        'medicaments' => 'array',
        'date_edition' => 'datetime',
    ];

    public static function getOrdonances()
    {
        return self::all();
    }

}
