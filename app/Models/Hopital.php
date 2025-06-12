<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'hopitaux';
    protected $fillable = ['nom', 'email', 'telephone', 'adresse', 'description', 'statut_validation'];

    public function medecins()
    {
        return $this->hasMany(Medecin::class, 'id_hopital');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'id_hopital');
    }

    public function plaintes()
    {
        return $this->hasMany(Plainte::class, 'id_hopital');
    }

    public function appelsUrgence()
    {
        return $this->hasMany(AppelUrgence::class, 'id_hopital');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'id_hopital');
    }

}
