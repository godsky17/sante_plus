<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plainte extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'plaintes';

    protected $fillable = [
        'id_hopital',
        'objet',
        'description',
        'statut', // ouvert, en_cours, traité, archivé
        'created_at',
        'updated_at'
    ];

    public function hopital()
    {
        return $this->belongsTo(Hopital::class, 'id_hopital');
    }
}
