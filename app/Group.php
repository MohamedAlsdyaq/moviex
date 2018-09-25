<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Group extends Model
{
    //
     use SoftDeletes;
     public function users(){
        return $this->hasMany('App\User');
    }
         public function groupentries(){
        return $this->hasMany('App\Groupentries');
    }
         public function posts(){
        return $this->hasMany('App\Post');
    }
 
    	 
}
