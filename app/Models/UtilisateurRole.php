<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UtilisateurRole extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'utilisateur_role';
    protected $fillable = ['id_utilisateur', 'id_role'];
}
