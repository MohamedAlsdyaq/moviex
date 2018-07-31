<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laist extends Model
{
    //
     public function user(){
        return $this->belongsTo('App\User');
    }
    	 public function movie(){
        return $this->hasMany('App\Movie');
    }
       	 public function tv(){
        return $this->hasMany('App\Tv');
    }
}
