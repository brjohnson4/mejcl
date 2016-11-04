<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{
    protected $table = 'Delegates';

    public function results() {
    	return $this->hasMany('App\Result', 'id', 'Studentid');
    }

    public function school() {
    	return $this->belongsTo('App\School');
    }
}
