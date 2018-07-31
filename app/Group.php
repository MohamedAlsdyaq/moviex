<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
     public function users(){
        return $this->hasMany('App\User');
    }
         public function posts(){
        return $this->hasMany('App\Post');
    }
    public function users(){
    	return $this->belongsToMany('App\User');
    }
    	 
}
