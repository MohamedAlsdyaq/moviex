<?php

namespace App;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    //
   use SoftDeletes, CascadeSoftDeletes;
       protected $cascadeDeletes = ['comments', 'likes', 'postcontents', 'wall'];

    protected $dates = ['deleted_at'];

    public function comments(){
        return $this->hasMany('App\Comment')->with('likes')->with('replies');
    }

 public function user(){
      return $this->belongsTo('App\User');
    }

 public function likes(){
        return $this->hasMany('App\Like', 'post_id')
          ->where('type', 'post');
    }
    
     public function tv(){
        return $this->belongsTo('App\Show', 'show_id')
          ->where('show_type', 'tv');
    }
         public function movie(){
        return $this->belongsTo('App\Show', 'show_id')
          ->where('show_type', 'movie');
    }
public function show(){
      return $this->belongsTo('App\Show', 'show_id');
    }
    public function postcontents(){
      return $this->hasMany('App\Postcontent');
    }
        public function wall(){
      return $this->hasOne('App\Wall')->where('type', 'post')
                ;
    }
 

}
