<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Reaction extends Model
{
        //
   use SoftDeletes;
       public function show(){
        return $this->belongsTo('App\Show');
    }
        //
          public function user(){
        return $this->belongsTo('App\User');
    }
              public function likes(){
        return $this->hasMany('App\Like', 'post_id')
          ->where('type', 'reaction');
    }
                  public function comments(){
        return $this->belongsTo('App\Comment');
    }
 
}
