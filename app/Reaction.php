<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
        //
       public function show(){
        return $this->belongsTo('App\Show');
    }
        //
          public function user(){
        return $this->belongsTo('App\User');
    }
              public function likes(){
        return $this->hasMany('App\Like', 'post_id')
          ->where('type', 2);
    }
                  public function comments(){
        return $this->belongsTo('App\Comment');
    }
 
}
