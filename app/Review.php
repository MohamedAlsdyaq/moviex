<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Review extends Model
{
    //
          public function tv(){
        return $this->belongsTo('App\Tv');
    }
          public function movie(){
        return $this->belongsTo('App\Movie');
    }
}
