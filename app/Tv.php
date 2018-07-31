<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tv extends Model
{
    //
  protected $guarded = [];
        //
          public function posts(){
        return $this->hasMany('App\Post');
    }
          public function reactions(){
        return $this->hasMany('App\Reaction');
    }
              public function reviews(){
        return $this->hasMany('App\Review');
    }
                  public function library(){
        return $this->belongsTo('App\Library');
    }
                  public function list(){
        return $this->belongsTo('App\Laist');
    }
}
