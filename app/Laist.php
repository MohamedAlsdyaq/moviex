<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Laist extends Model
{
    //
     use SoftDeletes;
     public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
 
       	 public function listentries(){
        return $this->hasMany('App\Listentries');
    }
     public function likes(){
        return $this->hasMany('App\Like', 'post_id')
          ->where('type', 'list');
    }
}
