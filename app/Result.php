<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table="Results";

    protected $fillable=[
    	"Test",
    	"Studentid",
    	"Score",
    	"user_id",
    	];

    public function delegate() {
    	return $this->belongsTo('App\Delegate', 'Studentid', 'id');
    }
}
