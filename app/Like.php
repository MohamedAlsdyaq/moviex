<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Like extends Model
{
    //
     use SoftDeletes;
     public function post(){

    	return $this->belongsTo('App\Post', 'post_id');
    }
         public function comment(){

    	return $this->belongsTo('App\Post', 'post_id');
    }
        public function reaction(){

    	return $this->belongsTo('App\Reaction', 'post_id');
    }
}
