<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Favorite extends Model
{
    //
     use SoftDeletes;
    	 public function show(){
        return $this->belongsTo('App\Show');
    }
 public function user(){
        return $this->belongsTo('App\User');
    }
}
