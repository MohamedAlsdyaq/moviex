<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function comments(){
        return $this->hasMany('App\Comment');
    }

 public function user(){
    	return $this->belongsTo('App\User');
    }

 public function likes(){
        return $this->hasMany('App\Like');
    }
public function show(){
      return $this->belongsTo('App\Show', 'show_id');
    }
    public function postcontents(){
      return $this->hasMany('App\Postcontent');
    }
 

}
