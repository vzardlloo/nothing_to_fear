<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskInfo extends Model
{
    protected $table = 'task_info';
    protected $fillable = ['task_team_id','task_farmer_id','task_place_id','task_uav_id','task_area','task_work_time','task_name','task_status'];
}
