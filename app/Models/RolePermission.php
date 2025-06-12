<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'role_permission';
    protected $fillable = ['id_role', 'id_permission'];
}
