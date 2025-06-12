<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'medecins';
    protected $fillable = [
        'id_utilisateur', 'specialite', 'numero_ordre', 'biographie', 'experience', 'disponibilite', 'id_hopital'
    ];

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class, 'id_medecin');
    }

    public function teleconsultations()
    {
        return $this->hasMany(Teleconsultation::class, 'id_medecin');
    }

    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class, 'id_medecin');
    }

    public function patientsSuivis()
    {
        return $this->belongsToMany(Patient::class, null, 'medecin_suivi', 'id_patient', 'id_medecin');
    }

    public function hopital()
    {
        return $this->belongsTo(Hopital::class, 'id_hopital');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'id_medecin');
    }

}
