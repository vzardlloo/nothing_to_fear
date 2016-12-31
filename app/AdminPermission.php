<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    public function roles()
    {
    	return $this->belongsToMany(AdminRole::class, 'admin_permission_role', 'permission_id','role_id');
    }
}
