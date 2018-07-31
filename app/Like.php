<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
     public function post(){

    	return $this->belongsTo('App\Post');
    }
        public function reaction(){

    	return $this->belongsTo('App\Reaction', 'post_id');
    }
}
