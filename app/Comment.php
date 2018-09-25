<?php

namespace App;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    //
     use SoftDeletes, CascadeSoftDeletes;
       protected $cascadeDeletes = ['replies', 'likes'];

    protected $dates = ['deleted_at'];

      public function post(){
        return $this->belongsTo('App\Post');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function replies(){
      return $this->hasMany('App\Reply')->with('likes')->with('user');
    }
 public function likes(){
        return $this->hasMany('App\Like', 'post_id')
          ->where('type', 'comment');
    }
}
