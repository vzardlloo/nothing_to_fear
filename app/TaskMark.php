<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskMark extends Model
{
    protected $fillable = ['task_id','task_weather','task_mark','task_common','task_during','task_chamical'];
}
