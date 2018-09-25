<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wall extends Model
{
    //
     public function post(){
        return $this->belongsTo('App\Post')->with('comments.user')
            ->with('postcontents')
            ->with('show')
             ->with('likes')
            ->with('user')  
            ;
    }
         public function user(){
        return $this->belongsTo('App\User');
    }
         public function library(){
        return $this->belongsTo('App\Library', 'post_id') 
             ->with('show')
             ->with('history')
            ->with('user') 
        ;
    }
         public function follow(){
        return $this->belongsTo('App\Follow', 'post_id');
    } 
}
