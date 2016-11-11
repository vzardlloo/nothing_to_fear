<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $primaryKey = "user_log_id";
    protected $fillable = ['log_time','ip_address','log_info','user_id'];

    public function inner_user(){
    	
    	return $this->belongsTo(InnerUser::Class);
    }
    

}
