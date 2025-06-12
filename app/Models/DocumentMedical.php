<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentMedical extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'documents_medicaux';
    protected $fillable = [
        'id_dossier', 'nom', 'type', 'origine', 'fichier_url', 'date_ajout', 'description'
    ];

    public function dossierMedical()
{
    return $this->belongsTo(DossierMedical::class, 'id_dossier');
}


}
