<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class InnerUser extends Model
{
    protected $primaryKey = 'inner_user_id';
    protected $table = 'inner_user';
    protected $fillable = array('user_name','password', 'phone_num', 'role', 'level');

    public function user_log(){
    	return $this->hasMany(UserLog::Class);
    }

    //使用了上面的方法
    public function addLog(UserLog $user_log){
    	//$user_log->log_time = DateTime::now();
    	return $this->user_log()->save($user_log);
    }
}
