<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'roles';
    protected $fillable = ['nom', 'description'];

    public function utilisateurs()
{
    return $this->belongsToMany(Utilisateur::class, null, 'utilisateur_role', 'id_role', 'id_utilisateur');
}

public function permissions()
{
    return $this->belongsToMany(Permission::class, null, 'role_permission', 'id_role', 'id_permission');
}

}
