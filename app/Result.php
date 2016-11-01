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
}
