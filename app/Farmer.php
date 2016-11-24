<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $table = 'farmer';
    protected $fillable = ['farmer_name','phone_num','farmer_address','farmer_level'];
}
