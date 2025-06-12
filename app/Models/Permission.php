<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'permissions';
    protected $fillable = ['nom', 'description'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, null, 'role_permission', 'id_permission', 'id_role');
    }

}
