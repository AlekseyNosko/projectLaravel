<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permissions_role';

    protected $fillable = [
        'name', 'description'
    ];

    public function getRole()
    {
        return $this->hasOne('App\Roles','id','role_id');
    }
    public function getPermission()
    {
        return $this->hasOne('App\Permission','id','permission_id');
    }
}
