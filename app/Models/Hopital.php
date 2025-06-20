<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
class Hopital extends Model
{
    protected $connection = 'mongodb';
      protected $collection = 'hopitaux';

    protected $fillable = [
        'nom', 'email', 'telephone', 'adresse',
        'description', 'type_etablissement', 'statut'
    ];

}
