<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User  as Authenticatable;

class Patient extends Authenticatable
{
    protected $connection = 'mongodb';
    protected $collection = 'patients';
    protected $fillable = ['id_utilisateur', 'groupe_sanguin', 'historique_medical'];

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class, 'id_patient');
    }

    public function analyses()
    {
        return $this->hasMany(Analyse::class, 'id_patient');
    }

    public function teleconsultations()
    {
        return $this->hasMany(Teleconsultation::class, 'id_patient');
    }

    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class, 'id_patient');
    }

    public function dossierMedical()
    {
        return $this->hasOne(DossierMedical::class, 'id_patient');
    }

    public function factures()
    {
        return $this->hasMany(Facture::class, 'id_patient');
    }

    public function suggestions()
    {
        return $this->hasMany(Suggestion::class, 'id_patient');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'id_patient');
    }

}
