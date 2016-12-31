<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    //用户角色
    public function roles()
    {
    	return $this->belongsToMany(AdminRole::class,'admin_role_user','role_id','user_id');
    }

    //判断用户是否具有某个角色
    public function hasRole($role)				
    {
    	if(is_string($role)){
    		return $this->roles->coutains('name',$role);
    	}

    	return !!$role->intersect($this->roles)->coun();
    }

    //判断用户是否具有某种权限
    public function hasPermission($permission)
    {
    	if(is_string($permission))	{
    		$permission = AdminPermission::where('name',$permission)->first();
    		if(!$permission){
    			return false;
    		}
    	}

    	return $this->hasRole($permission->roles);
    }

    //给用户分配角色
    public function assignRole($role)
    {
    	return $this->roles()->save($role);
    }

    //角色整体修改与添加
    public function giveRoleTo(array $RoleId)	
    {
    	$this->roles()->detach();
    	$roles = AdminRole::whereIn('id', $RoleId)->get();
    	foreach ($roles as $v) {
    		$this->assignRole($v);
    	}
    	return true;
    }
}
