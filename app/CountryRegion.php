<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryRegion extends Model
{
    protected $table = 'country_region';
    protected $fillable = ['town_id','country_name'];
}
