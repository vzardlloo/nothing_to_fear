<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
	protected $fillable=[
		'farmer_name','farmer_phone','farmer_place','farmer_area'
	];
}
