<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
	return function delegates() {
		return $this->hasMany('App\Delegate');
	}
}
