<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
	public function delegate() {
		return $this->hasMany('App\Delegate');
	}

	public function user() {
		return $this->hasOne('App\User');
	}
}
