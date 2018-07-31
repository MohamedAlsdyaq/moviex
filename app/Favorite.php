<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    	 public function show(){
        return $this->belongsTo('App\Show');
    }
 public function user(){
        return $this->belongsTo('App\User');
    }
}
