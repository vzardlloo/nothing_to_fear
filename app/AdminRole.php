<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    public function permissions()
    {
    	return $this->belongsToMany(AdminPermission::class,'admin_permission_role','role_id','permission_id');
    }

    //给角色添加权限
    public function getPermissionTo($permission)
    {
    	return $this->permissions()->save($permission);
    }

    //角色权限整体添加与修改
    public function givePermissionsTo(array $permissionId)
    {
    	$this->permissions()->detach();
    	$permissions = AdminPermission::whereIn('id',$permissionId)-get();
    	foreach ($permissions as $v) {
    		$this->getPermissionTo($v);
    	}
    	return true;
    }
}
