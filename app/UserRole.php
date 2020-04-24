<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_role';

    protected $fillable = [
        'user_id', 'role_id'
    ];

    public function getRole()
    {
        return $this->hasOne('App\Roles','id','role_id');
    }
    public function getUser()
    {
        return $this->hasOne('App\User','id','user_id');
    }

}
